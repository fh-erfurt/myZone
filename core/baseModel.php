<?

namespace dwp\core;

use PDOException;

abstract class BaseModel
{
    const TYPE_INT      = 'int';
    const TYPE_TINYINT  = 'tinyint';
    const TYPE_DECIMAL  = 'decimal';
    const TYPE_STRING   = 'string';

    // contains types and length
    protected static $schema = [];
    // contains data
    protected $data = [];

    public function __construct($params)
    {
        $class = get_called_class();
        foreach($class::$schema as $key => $schemaOptions)
        {
            if(isset($params[$key]))
            {
                $this->{$key} = $params[$key];
            }
            else
            {
                $this->{$key} = null;
            }
        }
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->data))
        {
            return $this->data[$key];
        }
        throw new \Exception('You can not access property "'.$key.'" for the class "'.get_called_class().'".');
    }

    public function __set($key, $value)
    {
        $class = get_called_class();
        if(array_key_exists($key, $class::$schema))
        {
            $this->data[$key] = $value;
        }
        else throw new \Exception('You can not write to property "'.$key.'" for the class "'.get_called_class().'".');
    }

    # TODO probably not the best way to do it when there is a lot of traffic but will do for now
    public static function lastInsertedId()
    {
        return $results = $GLOBALS['db']->query('SELECT MAX(id) FROM '.self::tablename())->fetchAll()[0]['MAX(id)'];
    }

    public function save(&$errors)
    {
        if(!empty($this->data))
        {
            if($this->id === null)
            {
                $this->insert($errors);
            }
            else
            {
                $this->update($errors);
            }
        }
    }

    protected function insert(&$errors)
    {
        $db =  $GLOBALS['db'];
        $class = get_called_class();

        try
        {
            $sql = 'INSERT INTO '.self::tablename().' (';
            $valueString = ' VALUES (';

            foreach($class::$schema as $key => $schemaOptions)
            {
                // don't insert values that are equal to null since it generates errors when not null is set
                if($this->{$key} !== null)
                {
                    $sql .= $key.',';
                    $valueString .= $db->quote($this->{$key}).',';
                }
            }

            $valueString = trim($valueString, ',');
            $sql         = trim($sql, ',').')'.$valueString.');';
            $db->prepare($sql)->execute();

            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error inserting '.get_called_class().': '.$e->getMessage();
        }
        return false;
    }

    protected function update(&$errors)
    {
        $db = $GLOBALS['db'];
        try
        {
            $sql = 'UPDATE '.self::tablename().' SET ';

            foreach($this->data as $key => $value)
            {
                if($value !== null)
                {
                    $sql .= $key.' = '.$db->quote($value).',';
                }
            }

            $sql = trim($sql, ',').' WHERE id = '.$this->{'id'};
            $db->prepare($sql)->execute();

            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error updating '.get_called_class().': '.$e->getMessage();
        }
        return false;
    }

    public function delete(&$errors = null)
    {
        $db = $GLOBALS['db'];
        try
        {
            $db->exec('DELETE '.self::tablename().' FROM WHERE id = '.$this->{'id'});
            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error deleting '.get_called_class().': '.$e->getMessage();
        }
        return false;
    }

    public function validate(&$errors = null)
    {
        $class = get_called_class();
        foreach($class::$schema as $key => $schemaOptions)
        {
            if(isset($this->{$key}) && is_array($schemaOptions))
            {
                $valueErrors = $this->validateValue($key, $this->{$key}, $schemaOptions);

                if($valueErrors !== true)
                {
                    array_push($errors, ...$valueErrors);
                }
            }
        }

        return (count($errors) === 0);
    }

    protected function validateValue($attribute, &$value, &$schemaOptions)
    {
        $type = $schemaOptions['type'];
        $errors = [];

        switch($type)
        {
            case BaseModel::TYPE_INT:
            case BaseModel::TYPE_DECIMAL:
                break;
            case BaseModel::TYPE_STRING:
                {
                    if(isset($schemaOptions['min']) && mb_strlen($value) < $schemaOptions['min'])
                    {
                        $errors[] = $attribute.': String needs a minimun of '.$schemaOptions['min'].' characters.';
                    }

                    if(isset($schemaOptions['max']) && mb_strlen($value) > $schemaOptions['max'])
                    {
                        $errors[] = $attribute.': String can have a maximun of '.$schemaOptions['max'].' characters.';
                    }
                }
                break;
        }
        return count($errors) > 0 ? $errors : true;
    }

    public static function tablename()
    {
        $class = get_called_class();
        if(defined($class.'::TABLENAME')) return $class::TABLENAME;
        return null;
    }

    public static function selectWhere($where = '')
    {
        return get_called_class()::select('', empty($where) ? '' : 'WHERE '.$where);
    }

    /**
     * be careful with using this since it is easy to get syntax errors.
     * @param string $colsStr the columns you want to be returned
     * @param string $commands the additional commands to execute in the query
     * @return mixed
     */
    public static function select($colsStr = '', $commands = '')
    {
        $db = $GLOBALS['db'];
        $results = [];
        $class = get_called_class();

        try
        {
            $results = $db->query('SELECT '.(empty($colsStr) ? '*' : $colsStr).' FROM '.self::tablename().' '.$commands)->fetchAll();
            $l = count($results);
            for ($i = 0; $i < $l; $i++)
            {
                $results[$i] = new $class($results[$i]);
            }
        }
        catch(PDOException $e)
        {
            $results = $e->getMessage();
            // create a message which doesn't show the user what went wrong but an error code to report
            echo 'Leider ist ein Fehler aufgetreten (1)'; # TODO
        }
        finally
        {
            return $results;
        }
    }
}
?>
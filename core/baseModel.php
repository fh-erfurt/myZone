<?

namespace dwp\core;

abstract class BaseModel
{
    const TYPE_INT      = 'int';
    const TYPE_TINYINT  = 'tinyint';
    const TYPE_FLOAT    = 'float';
    const TYPE_STRING   = 'string';
    # TODO JGE
    # $this->data[$key] zu $this->{$key}

    protected $schema = []; # enthält Datentypen
    protected $data = [];   # enthält später Daten, wie in DB

    public function __construct($params) #TODO eventuell durch schema überprüfen
    {
        foreach($this->schema as $key => $schemaOptions)
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
        if(array_key_exists($key, $this->schema))
        {
            $this->data[$key] = $value;
        }
        else
        throw new \Exception('You can not write to property "'.$key.'" for the class "'.get_called_class().'".');
    }

    public function save(&$errors)
    {
        if($this->id === null) # gleich $this->data['id'] durch __get()
        {
            $this->insert($errors);
        }
        else
        {
            $this->update($errors);
        }
    }

    protected function insert(&$errors)
    {
        $db =  $GLOBALS['db'];

        try
        {
            $sql = 'INSERT INTO '.self::tablename().' (';
            $valueString = ' VALUES (';

            foreach($this->schema as $key => $schemaOptions)
            {
                $sql .= '`'.$key.'`,';

                if($this->data[$key] === null)
                {
                    $valueString .= 'NULL,';
                }
                else
                {
                    $valueString .= '`'.$db->quote($this->data[$key]).'`,';
                }
            }

            $valueString = trim($valueString, ',');
            $sql         = trim($sql, ',').')'.$valueString.');';
            $db->prepare($sql)->execute();

            return true;
        }
        catch(\PDOException $e)
        {
            #die('Message');
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

            # TODO JGE
            /*foreach($this->schema as $key => $schemaOptions)
            {
                if($this->data[$key] !== null)
                {
                    $sql .= $key.' = '.$db->quote($this->data[$key]).', ';
                }
            }*/
            foreach($this->data as $key => $value)
            {
                if($value !== null)
                {
                    # TODO if(schema type == BaseModel TYPE_INT) $db->quote(key)
                    # TODO auch bei insert etc
                    $sql .= $key.' = '.$db->quote($value).',';
                }
            }
            $sql = trim($sql, ',').' WHERE id = '.$this->data['id'];
            $_SESSION['sql'] = $sql; # TODO
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
            #$sql = 'DELETE '.self::tablename().' FROM WHERE id = '.$this->data['id'];
            #$db->exec($sql);
            $db->exec('DELETE '.self::tablename().' FROM WHERE id = '.$this->data['id']);
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
        foreach($this->schema as $key => $schemaOptions)
        {
            if(isset($this->data[$key]) && is_array($schemaOptions))
            {
                $valueErrors = $this->validateValue($key, data[$key], $schemaOptions);

                if($valueErrors !== true)
                {
                    array_push($errors, ...$valueErrors); # ... steht für elemente in array anhängen, nicht array selbst anhängen
                }
            }
        }
        if(count($errors) === 0)
        {
            return true;
        }
        return false;
    }

    protected function validateValue($attribute, &$value, &$schemaOptions)
    {
        $type = $schemaOptions['type'];
        $errors = [];

        switch($type)
        {
            case BaseModel::TYPE_INT:
                break;
            case BaseModel::TYPE_FLOAT:
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
                break; #eins hoch?
        }
        return count($errors) > 0 ? $errors : true;
    }

    public static function tablename()
    {
        $class = get_called_class();
        if(defined($class.'::TABLENAME'))
        {
            return $class::TABLENAME;
        }
        return null;
    }

    public static function select($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT * FROM '.self::tablename();
            if(!empty($where))
            {
                $sql .= ' WHERE '.$where.';';
            }
            $result = $db->query($sql)->fetchAll();
        }
        catch(PDOException $e)
        {
            die('Select statement failed: '.$e->getMessage());
        }
        return $result;
    }
}
?>
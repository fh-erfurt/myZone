<?

namespace dwp\core;

use PDOException;

abstract class JoinedModel extends BaseModel
{
    // contains rules for joins
    protected static $joinRules = [];

    public function bruh()
    {
        return self::joinedSelect();
    }

    # needs array as argument TODO
    public static function joinedSelect($where = '')
    {
        $db = $GLOBALS['db'];
        $class = get_called_class();
        $colsStr = '';
        foreach($class::$schema as $selectName => [$col, $table])
        {
            $colsStr .= $table.'.'.$col.' as '.$db->quote($selectName).', ';
        }
        $joinStr = '';
        foreach($class::$joinRules as $fk => $tableToJoin)
        {
            $joinStr .= ' JOIN '.$tableToJoin.' ON '.self::tablename().'.'.$fk.' = '.$tableToJoin.'.id';
        }
        $whereStr = empty($where) ? '' : ' WHERE '.$where;
        return self::select(trim($colsStr, ', '), $joinStr.$whereStr);
    }

    public static function selectWhere($where = '')
    {
        echo 'Hello World!';
    }
}
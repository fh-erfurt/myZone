<?

namespace dwp\core;

use PDOException;

abstract class JoinedModel extends BaseModel
{
    // contains rules for joins
    protected static $joinRules = [];

    # needs array as argument TODO
    public static function joinedSelect($commands = '')
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
        return self::select(trim($colsStr, ', '), $joinStr.$commands);
    }

    public static function selectWhere($where = '')
    {
        echo 'Hello World!';
    }
}
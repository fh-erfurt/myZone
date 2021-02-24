<?

namespace dwp\models;

use dwp\core\BaseModel;

class Color extends BaseModel
{
    const TABLENAME = '`colors`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'name'                   => ['type' => BaseModel::TYPE_STRING, 'max' => 45]
    ];
}
?>
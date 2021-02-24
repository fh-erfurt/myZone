<?

namespace dwp\models;

use dwp\core\BaseModel;

class Brand extends BaseModel
{
    const TABLENAME = '`brands`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'name'                   => ['type' => BaseModel::TYPE_STRING, 'max' => 45]
    ];
}
?>
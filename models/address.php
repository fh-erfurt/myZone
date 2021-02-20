<?

namespace dwp\models;

use dwp\core\BaseModel;

class Address extends BaseModel
{
    const TABLENAME = '`addresses`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'street'                 => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'number'                 => ['type' => BaseModel::TYPE_STRING, 'max' => 5],
        'city'                   => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'zipCode'                => ['type' => BaseModel::TYPE_STRING, 'max' => 5]
    ];
}
?>
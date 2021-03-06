<?

namespace dwp\models;

use dwp\core\BaseModel;

class Order extends BaseModel
{
    const TABLENAME = '`orders`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'shipmentDate'           => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'customer'               => ['type' => BaseModel::TYPE_INT]
    ];
}
?>
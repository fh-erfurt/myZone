<?

namespace dwp\models;

use dwp\core\BaseModel;

class OrderItem extends BaseModel
{
    const TABLENAME = '`orderItems`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'quantity'               => ['type' => BaseModel::TYPE_INT],
        'actualPrice'            => ['type' => BaseModel::TYPE_DECIMAL],
        '`order`'                => ['type' => BaseModel::TYPE_INT],
        'product'                => ['type' => BaseModel::TYPE_INT]
    ];
}
?>
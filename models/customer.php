<?

namespace dwp\models;

use dwp\core\BaseModel;

class Customer extends BaseModel
{
    const TABLENAME = '`customers`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'firstName'              => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'lastName'               => ['type' => BaseModel::TYPE_STRING, 'max' => 50],
        'email'                  => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'phone'                  => ['type' => BaseModel::TYPE_STRING, 'max' => 20],
        'deliveryAddress'        => ['type' => BaseModel::TYPE_INT]
    ];
}
?>
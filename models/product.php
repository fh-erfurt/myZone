<?

namespace dwp\models;

use dwp\core\BaseModel;

class Product extends BaseModel
{
    const TABLENAME = '`products`';

    protected static $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'name'                   => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'price'                  => ['type' => BaseModel::TYPE_FLOAT],
        'category'               => ['type' => BaseModel::TYPE_STRING, 'max' => 20],
        'brand'                  => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'color'                  => ['type' => BaseModel::TYPE_STRING, 'max' => 45],
        'descriptionColor'       => ['type' => BaseModel::TYPE_STRING, 'max' => 64],
        'description'            => ['type' => BaseModel::TYPE_STRING, 'max' => 1200]
    ];
}
?>
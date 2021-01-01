<?


namespace dwp\models;

use dwp\core\BaseModel;

class UserLogin extends BaseModel
{

    const TABLENAME = '`userLogins`';

    protected $schema = [
        'id'                     => ['type' => BaseModel::TYPE_INT],
        'createdAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'updatedAt'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'validated'              => ['type' => BaseModel::TYPE_TINYINT],
        'enabled'                => ['type' => BaseModel::TYPE_TINYINT],
        'username'               => ['type' => BaseModel::TYPE_STRING, 'max' => 25],
        'lastLogin'              => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'lastActive'             => ['type' => BaseModel::TYPE_STRING, 'max' => 10],
        'failedLoginCount'       => ['type' => BaseModel::TYPE_TINYINT],
        'passwordHash'           => ['type' => BaseModel::TYPE_STRING, 'max' => 255],
        'customer'               => ['type' => BaseModel::TYPE_INT]
    ];
}
?>
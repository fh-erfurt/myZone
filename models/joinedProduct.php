<?

namespace dwp\models;

use dwp\core\JoinedModel;

class JoinedProduct extends JoinedModel
{
    const TABLENAME = 'products';

    protected static $schema = [
        'id'               => ['id',               'products'],
        'name'             => ['name',             'products'],
        'price'            => ['price',            'products'],
        'category'         => ['name',             'categories'],
        'brand'            => ['name',             'brands'],
        'color'            => ['name',             'colors'],
        'descriptionColor' => ['descriptionColor', 'products'],
        'description'      => ['description',      'products']
    ];

    # tried to avoid duplicated code here but really didn't find a clean solution
    protected static $joinRules = [
        'category'         => 'categories',
        'brand'            => 'brands',
        'color'            => 'colors'
    ];
}
?>
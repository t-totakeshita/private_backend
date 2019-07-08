<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'product_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '在庫識別ID', 'autoIncrement' => true, 'precision' => null],
        'product_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '商品名', 'precision' => null, 'fixed' => null],
        'price' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '金額', 'precision' => null, 'autoIncrement' => null],
        'stock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '在庫数', 'precision' => null, 'autoIncrement' => null],
        'CREATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'UPDATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['product_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'product_id' => 1,
                'product_name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'stock' => 1,
                'CREATE_AT' => 1561516825,
                'UPDATE_AT' => 1561516825
            ],
        ];
        parent::init();
    }
}

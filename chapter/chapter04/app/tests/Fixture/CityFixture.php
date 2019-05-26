<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 */
class CityFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'city';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'prefecture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'citycode' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CREATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'UPDATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'prefecture_id' => ['type' => 'index', 'columns' => ['prefecture_id'], 'length' => []],
        ],
        '_constraints' => [
            'city_ibfk_1' => ['type' => 'foreign', 'columns' => ['prefecture_id'], 'references' => ['prefecture', 'prefecture_id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
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
                'prefecture_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'citycode' => 'Lorem ipsum dolor sit amet',
                'CREATE_AT' => 1558865427,
                'UPDATE_AT' => 1558865427
            ],
        ];
        parent::init();
    }
}

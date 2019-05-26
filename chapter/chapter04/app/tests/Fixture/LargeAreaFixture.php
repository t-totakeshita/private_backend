<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LargeAreaFixture
 */
class LargeAreaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'large_area';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'prefecture_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'prefecture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CREATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'UPDATE_AT' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'prefecture_id' => ['type' => 'index', 'columns' => ['prefecture_id'], 'length' => []],
            'name' => ['type' => 'index', 'columns' => ['name'], 'length' => []],
        ],
        '_constraints' => [
            'large_area_ibfk_1' => ['type' => 'foreign', 'columns' => ['prefecture_id'], 'references' => ['prefecture', 'prefecture_id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'large_area_ibfk_2' => ['type' => 'foreign', 'columns' => ['name'], 'references' => ['prefecture', 'name'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
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
                'prefecture_name' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'prefecture_id' => 1,
                'CREATE_AT' => 1558771316,
                'UPDATE_AT' => 1558771316
            ],
        ];
        parent::init();
    }
}

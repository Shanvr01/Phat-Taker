<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeasurementsFixture
 *
 */
class MeasurementsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_age' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_gender' => ['type' => 'string', 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_height' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_weight' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_bodyfat' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_notes' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'users_stats_fk1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'user_age' => 1,
            'user_gender' => 'Lorem ipsum dolor sit ame',
            'user_height' => 'Lorem ipsum dolor sit amet',
            'user_weight' => 'Lorem ipsum dolor sit amet',
            'user_bodyfat' => 'Lorem ipsum dolor sit amet',
            'user_notes' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}

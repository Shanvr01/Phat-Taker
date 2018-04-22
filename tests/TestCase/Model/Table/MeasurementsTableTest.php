<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeasurementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeasurementsTable Test Case
 */
class MeasurementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MeasurementsTable
     */
    public $Measurements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.measurements',
        'app.users',
        'app.roles',
        'app.programs',
        'app.trainers',
        'app.users_programs',
        'app.clients',
        'app.workouts',
        'app.exercises',
        'app.workouts_exercises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Measurements') ? [] : ['className' => MeasurementsTable::class];
        $this->Measurements = TableRegistry::get('Measurements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Measurements);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MeasurementsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MeasurementsController Test Case
 */
class MeasurementsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

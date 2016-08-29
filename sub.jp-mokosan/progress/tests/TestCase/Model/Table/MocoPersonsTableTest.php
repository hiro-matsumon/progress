<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MocoPersonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MocoPersonsTable Test Case
 */
class MocoPersonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MocoPersonsTable
     */
    public $MocoPersons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.moco_persons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MocoPersons') ? [] : ['className' => 'App\Model\Table\MocoPersonsTable'];
        $this->MocoPersons = TableRegistry::get('MocoPersons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MocoPersons);

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

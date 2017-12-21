<?php
namespace Users\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Users\Model\Table\GroupsTable;

/**
 * Users\Model\Table\GroupsTable Test Case
 */
class GroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Users\Model\Table\GroupsTable
     */
    public $Groups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.users.groups',
        'plugin.users.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Groups') ? [] : ['className' => GroupsTable::class];
        $this->Groups = TableRegistry::get('Groups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Groups);

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
}

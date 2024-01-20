<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TodoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TodoTable Test Case
 */
class TodoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TodoTable
     */
    public $Todo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Todo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Todo') ? [] : ['className' => TodoTable::class];
        $this->Todo = TableRegistry::getTableLocator()->get('Todo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Todo);

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

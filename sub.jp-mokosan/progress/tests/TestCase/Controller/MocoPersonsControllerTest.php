<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MocoPersonsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MocoPersonsController Test Case
 */
class MocoPersonsControllerTest extends IntegrationTestCase
{

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
        $this->MocoPersons = new MocoPersonsController();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        // INPUTリクエスト
        $data = [
            'name' => '鈴木 次郎',
            'email' => 'suzuki@example.com',
            'password' => '123456',
        ];
        // テスト実行
        $this->post('/mocoPersons/add', $data);

        // テスト結果(1)
        $this->assertResponseSuccess();

        // テスト結果(2)
        $articles = TableRegistry::get('MocoPersons');
        $query = $articles->find()->where(['name' => $data['name']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        // テスト実行
        $this->get('/mocoPersons');

        // テスト結果(1)
        $this->assertResponseSuccess();

        // テスト結果(2)
        $list = $this->viewVariable('mocoPersons')->all()->toArray();
        $this->assertTextEquals(1, $list[0]->id);
        $this->assertTextEquals('PHP Unit テスト', $list[0]->name);
        $this->assertTextEquals('php-unit-test@example.com', $list[0]->email);
        $this->assertTextEquals('test', $list[0]->password);
    }

    /**
     * Test search method
     *
     * @return void
     */
    public function testSearch()
    {
        // INPUTリクエスト
        $data = [
            'search' => 'テスト',
        ];
        // テスト実行
        $this->post('/mocoPersons/search', $data);

        // テスト結果(1)
        $this->assertResponseSuccess();

        // テスト結果(2)
        $list = $this->viewVariable('mocoPersons')->all()->toArray();

        $index = 0;
        $this->assertTextEquals(1, $list[$index]->id);
        $this->assertTextEquals('PHP Unit テスト', $list[$index]->name);
        $this->assertTextEquals('php-unit-test@example.com', $list[$index]->email);
        $this->assertTextEquals('test', $list[$index]->password);

        $index ++;
        $this->assertTextEquals(2, $list[$index]->id);
        $this->assertTextEquals('その他 テスト', $list[$index]->name);
        $this->assertTextEquals('other-test@example.com', $list[$index]->email);
        $this->assertTextEquals('test', $list[$index]->password);
    }
}

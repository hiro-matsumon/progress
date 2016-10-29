<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MocoLoginsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MocoLoginsController Test Case
 */
class MocoLoginsControllerTest extends IntegrationTestCase
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
        $this->MocoLogins = new MocoLoginsController();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        // INPUTリクエスト
        $data = [
            'email' => 'php-unit-test@example.com',
            'password' => 'test',
        ];
        // テスト実行
        $this->post('/mocoLogins', $data);

        // テスト結果(1)
        $this->assertResponseSuccess();

        // テスト結果(2)
        $articles = TableRegistry::get('MocoPersons');
        $query = $articles->find()->where(['email' => $data['email']]);
        $this->assertEquals(1, $query->count());
    }
}

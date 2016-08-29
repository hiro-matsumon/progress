<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MocoPersonsFixture
 *
 */
class MocoPersonsFixture extends TestFixture
{

    /**
     * テーブル定義をインポート
     *
     * @var array
     */
    public $import = [
            'table' => 'moco_persons',
            'connection' => 'default',
        ];

    /**
     * フィクスチャの初期化
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'PHP Unit テスト',
                'email' => 'php-unit-test@example.com',
                'password' => 'test',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'その他 テスト',
                'email' => 'other-test@example.com',
                'password' => 'test',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];
        parent::init();
    }
}

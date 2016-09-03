<?php
/**
 * MocoPersons アプリケーション コントローラ
 * @author h.matsuda
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Exception\MocoPersonsDBException;

/**
 * MocoPersons アプリケーション コントローラ
 * @package Controller
 */
class MocoPersonsController extends AppController
{

    /**
     * ページネーションを設定する.
     *
     * @var array
     */
    public $paginate = [
        'limit' => 5,
    ];

    /**
     * メッセージ
     *
     * @var array
     */
    private $message = [
        "addSuccess" => "会員を登録しました。",
        "addError" => "会員の登録に失敗しました。",
        "editSuccess" => "会員情報を変更しました。",
        "editError" => "会員情報の更新に失敗しました。",
        "deleteSuccess" => "会員を削除しました。",
        "deleteError" => "会員の削除に失敗しました。",
    ];

    /**
     * 初期処理を行う.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('PagingSupport', [
            'request' => $this->request,
        ]);
    }

    /**
     * 会員情報（リクエスト）をデータベースに登録する.
     *
     * @return \Cake\Network\Request indexアクション
     */
    public function add()
    {
        $this->set('title', '会員登録');

        // 入力チェックのためエンティティを設定
        $personEntity = $this->MocoPersons->newEntity();
        $this->set('mocoPerson', $personEntity);

        // パラメータチェック
        if (! $this->request->is('post')) {
            return $this->render();
        }
        // 登録処理
        $person = $this->MocoPersons->patchEntity($personEntity, $this->request->data);
        $result = $this->MocoPersons->save($person);

        // バリデーションエラー
        if (! $result && $person->errors()) {
            return $this->render();
        }
        // データベースエラー
        if (! $result) {
            throw new MocoPersonsDBException($this->message['addError']);
        }
        // 成功
        $this->Flash->success($this->message['addSuccess']);

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 会員情報（リクエスト）をデータベースを更新する.
     *
     * @param int $userId 会員ID
     * @return \Cake\Network\Request indexアクション
     */
    public function edit($userId)
    {
        $this->set('title', '会員編集');

        // 入力チェックのためエンティティを設定
        $personEntity = $this->MocoPersons->get($userId);
        $this->set('mocoPerson', $personEntity);

        // パラメータチェック
        if (! $this->request->is(['post', 'put'])) {
            return $this->render();
        }
        // 更新処理
        $person = $this->MocoPersons->patchEntity($personEntity, $this->request->data);
        $result = $this->MocoPersons->save($person);

        // バリデーションエラー
        if (! $result && $person->errors()) {
            return $this->render();
        }
        // データベースエラー
        if (! $result) {
            throw new MocoPersonsDBException($this->message['editError']);
        }
        // 成功
        $this->Flash->success($this->message['editSuccess']);

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 会員情報をデータベースから削除する.
     *
     * @param int $userId 会員ID
     * @return \Cake\Network\Request indexアクション
     */
    public function delete($userId)
    {
        $this->set('title', '会員削除');

        $personEntity = $this->MocoPersons->get($userId);

        // パラメータチェック
        if (! $this->request->is(['post', 'put'])) {
            return $this->render();
        }
        // 削除処理
        $result = $this->MocoPersons->delete($personEntity);
        // データベースエラー
        if (! $result) {
            throw new MocoPersonsDBException($this->message['deleteError']);
        }
        // 成功
        $this->Flash->success($this->message['deleteSuccess']);

        return $this->redirect(['action' => 'index']);
    }

    /**
     * 会員を一覧で表示する.
     *
     * @return \Cake\Network\Request indexアクション
     */
    public function index()
    {
        $this->set('title', '会員一覧');

        $persons = $this->MocoPersons->find('all');
        $this->set('mocoPersons', $this->paginate($persons));

        return $this->render();
    }

    /**
     * 検索を行い会員を一覧で表示する.
     *
     * @return \Cake\Network\Request indexアクション
     */
    public function search()
    {
        $this->set('title', '会員一覧');

        // 検索処理
        if ($this->request->is(['post', 'get'])) {
            $condText = $this->request->data('search');
            $persons = $this->MocoPersons->search($condText);
            $this->set('mocoPersons', $this->paginate($persons));
        }

        return $this->render('index');
    }
}

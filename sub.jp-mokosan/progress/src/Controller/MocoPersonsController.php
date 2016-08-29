<?php
/**
 * MocoPersons アプリケーション コントローラ
 * @author h.matsuda
 */
namespace App\Controller;

use App\Controller\AppController;

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
        // 入力チェックのためエンティティを設定
        $personEntity = $this->MocoPersons->newEntity();
        $this->set('mocoPerson', $personEntity);

        // 登録処理
        if ($this->request->is('post')) {
            $person = $this->MocoPersons->patchEntity($personEntity, $this->request->data);
            if ($this->MocoPersons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            return $this->render();
        }
    }

    /**
     * 会員情報（リクエスト）をデータベースを更新する.
     *
     * @param int $userId 会員ID
     * @return \Cake\Network\Request indexアクション
     */
    public function edit($userId)
    {
        // 入力チェックのためエンティティを設定
        $personEntity = $this->MocoPersons->get($userId);
        $this->set('mocoPerson', $personEntity);

        // 更新処理
        if ($this->request->is(['post', 'put'])) {
            $person = $this->MocoPersons->patchEntity($personEntity, $this->request->data);
            if ($this->MocoPersons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            return $this->render();
        }
    }

    /**
     * 会員情報をデータベースから削除する.
     *
     * @param int $userId 会員ID
     * @return \Cake\Network\Request indexアクション
     */
    public function delete($userId)
    {
        $personEntity = $this->MocoPersons->get($userId);

        // 削除処理
        if ($this->request->is(['post', 'put'])) {
            if ($this->MocoPersons->delete($personEntity)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        return $this->render();
    }

    /**
     * 会員を一覧で表示する.
     *
     * @return \Cake\Network\Request indexアクション
     */
    public function index()
    {
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
        // 検索処理
        if ($this->request->is(['post', 'get'])) {
            $condText = $this->request->data('search');
            $persons = $this->MocoPersons->search($condText);
            $this->set('mocoPersons', $this->paginate($persons));
        }

        return $this->render('index');
    }
}

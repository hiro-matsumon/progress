<?php
/**
 * MocoLogins アプリケーション コントローラ
 * @author h.matsuda
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Exception\MocoUnauthorizedException;

/**
 * MocoLogins アプリケーション コントローラ
 * @package Controller
 */
class MocoLoginsController extends AppController
{

    /**
     * メッセージ
     *
     * @var array
     */
    private $message = [
        "loginError" => "メールアドレスかパスワードが間違っています。",
    ];

    /**
     * 初期処理を行う.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('AccessLog');
    }

    /**
     * ログインを行う.
     *
     * @return \Cake\Network\Request ログイン後遷移先アクション
     */
    public function index()
    {
        $this->set('title', 'ログイン');
        // モード判定
        if (! $this->request->is(['post'])) {
            return $this->render();
        }

        // ログイン成否
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
        } else {
            throw new MocoUnauthorizedException($this->message['loginError']);
        }

        return $this->redirect($this->Auth->redirectUrl());
    }

    /**
     * ログアウトを行う.
     *
     * @return \Cake\Network\Request ログアウト後遷移先アクション
     */
    public function logout()
    {
        $this->request->session()->destroy();

        return $this->redirect($this->Auth->logout());
    }
}

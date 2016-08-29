<?php
/**
 * MocoPersons ページネーションサポート コンポーネント
 * @author h.matsuda
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;

/**
 * MocoPersons ページネーションサポート コンポーネント
 * @package Component
 */
class PagingSupportComponent extends Component
{

    private $requestData = null;
    private $sessionName = '';

    /**
     * 初期処理を行う.
     *
     * @param array $config The configuration settings provided to this component.
     * @return void
     */
    public function initialize(array $config)
    {
        // 検索条件
        $request = $config['request'];
        $this->requestData = $request->data;

        // ページ遷移有無
        $this->isPaging = isset($request->query) ? true : false;

        // セッション名
        $controllerName = $request->params['controller'];
        $actionName = $request->params['action'];
        $this->sessionName = 'pagingSupport_' . $controllerName . '_' . $actionName;

        parent::initialize($config);
    }

    /**
     * アクション前に処理を行う.
     *
     * 検索時には検索条件をセッションに保存し
     * ページ遷移時には検索条件をセッションから読み出す.
     *
     * @param \Cake\Event\Event $event イベントオブジェクト
     * @return void
     */
    public function startup(Event $event)
    {
        // 検索時
        if (! empty($this->requestData)) {
            $this->request->session()->write($this->sessionName, $this->requestData);
        // ページ遷移時
        } elseif ($this->isPaging && $this->request->session()->check($this->sessionName)) {
            $event->subject()->request->data = $this->request->session()->read($this->sessionName);
        // その他
        } else {
            $this->request->session()->delete($this->sessionName);
        }
    }
}

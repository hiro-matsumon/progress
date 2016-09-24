<?php
/**
 * MocoPersons アクセスログ コンポーネント
 * @author h.matsuda
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Log\Log;

/**
 * MocoPersons アクセスログ コンポーネント
 * @package Component
 */
class AccessLogComponent extends Component
{

    private $logFormat = '<%s> %s::%s (%s) GET%s POST%s';
    private $logScope = 'accessLog';

    /**
     * アクション前に処理を行う.
     *
     * アクセスログを記録する.
     *
     * @param \Cake\Event\Event $event イベントオブジェクト
     * @return void
     */
    public function startup(Event $event)
    {
        $request = $event->subject()->request;
        $controllerName = $request->params['controller']; // コントローラ
        $actionName = $request->params['action']; // アクション
        $status = $event->subject()->response->statusCode(); // ステータスコード
        $query = $request->query; // GETリクエスト
        $data = $request->data; // POSTリクエスト

        // アクセスログを記録
        $logMessage = sprintf(
            $this->logFormat,
            $request->clientIp(false),
            $controllerName,
            $actionName,
            $status,
            json_encode($query, JSON_UNESCAPED_UNICODE),
            json_encode($data, JSON_UNESCAPED_UNICODE)
        );
        Log::info($logMessage, $this->logScope);
    }
}

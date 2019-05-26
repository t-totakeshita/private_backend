<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LargeArea Controller
 *
 *
 * @method \App\Model\Entity\LargeArea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LargeAreaController extends AppController
{
    public function initialize()
    {
      // レイアウトを無効にする
      $this->viewBuilder()->layout(false);
    }

    public $paginate = [
      // 表示する件数
      'limit' => 100
    ];


    public function index()
    {
        // large_areaテーブルから全てのレコードを取得
        $res = $this->paginate();

        // viewに受け渡す
        $this->set(compact('res'));
    }
}

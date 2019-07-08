<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

    // 発注社員Action
    public function proper()
    {
        // statusが0であり、productsテーブル情報を取り出す
        $res_status = $this->Orders->find()
                    ->where(['status' => 0])
                    ->contain(['Products']);

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'res_status'));
    }

    // 受注者Action
    public function client()
    {
        // statusが1であり、productsテーブル情報を取り出す
        $res_status1 = $this->Orders->find()
                    ->where(['status' => 2])
                    ->contain(['Products']);

        $this->paginate = [
            'contain' => ['Products']
        ];

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'res_status1'));

    }

    // 管理者Action
    public function admin()
    {
        // statusが2であり、productsテーブル情報を取り出す
        $res_status2 = $this->Orders->find()
                    ->where(['status' => 1])
                    ->contain(['Products']);

        // statusが3であり、productsテーブル情報を取り出す
        $res_status3 = $this->Orders->find()
                    ->where(['status' => 3])
                    ->contain(['Products']);

        #$this->paginate = [
        #    'contain' => ['Products']
        #];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'res_status2', 'res_status3'));
    }

    // admin登録Action(status 1->2)
    public function adminconfirm($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products']
        ]);

        // URLのIDを取得
        $data = $this->request->pass[0];
        // DBからproduct_idに対応したレコードをを取得
        $sql = $this->Orders->find()
                    ->contain(['Products'])
                    ->where(['Products.product_id' => $data])
                    ->first();

        // レコードの在庫数のみ取得
        $current_stock = $sql->product->stock;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData(), ['associated' => ['Products']]);

              // バリデーション
              $this->set('order', $order);
              // DBの在庫数と在庫発注数を合計する
              $order->product->stock = $current_stock + $order->product->stock;
              if ($this->Orders->save($order)) {
                $this->Flash->success(__('発注情報を更新しました。'));

                return $this->redirect(['action' => 'admin']);
              }
            $this->Flash->error(__('登録情報に不備があります。'));
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products'));

    }

    // admin登録Action(status 3->0)
    public function admincomp($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products']
        ]);

        // URLのIDを取得
        $data = $this->request->pass[0];
        // DBからproduct_idに対応したレコードをを取得
        $sql = $this->Orders->find()
                    ->contain(['Products'])
                    ->where(['Products.product_id' => $data])
                    ->first();

        // レコードの在庫数のみ取得
        $current_stock = $sql->product->stock;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData(), ['associated' => ['Products']]);

              // バリデーション
              $this->set('order', $order);
              // DBの在庫数と在庫発注数を合計する
              $order->product->stock = $current_stock + $order->product->stock;
              if ($this->Orders->save($order)) {
                $this->Flash->success(__('発注情報を更新しました。'));

                return $this->redirect(['action' => 'admin']);
              }
            $this->Flash->error(__('登録情報に不備があります。'));
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products'));


    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }


    // 社員在庫登録Action
    public function properconfirm($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products']
        ]);

        // URLのIDを取得
        $data = $this->request->pass[0];
        // DBからproduct_idに対応したレコードをを取得
        $sql = $this->Orders->find()
                    ->contain(['Products'])
                    ->where(['Products.product_id' => $data])
                    ->first();

        // レコードの在庫数のみ取得
        $current_stock = $sql->product->stock;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData(), ['associated' => ['Products']]);

              // バリデーション
              $this->set('order', $order);
              // DBの在庫数と在庫発注数を合計する
              $order->product->stock = $current_stock + $order->product->stock;
              if ($this->Orders->save($order)) {
                $this->Flash->success(__('発注情報を更新しました。'));

                return $this->redirect(['action' => 'proper']);
              }
            $this->Flash->error(__('登録情報に不備があります。'));
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products'));
    }



    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('order', $order);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * 受注者登録Action
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData(), ['associated' => ['Products']]);
            // バリデーション
            $this->set('order', $order);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('発注情報を更新しました。'));

                return $this->redirect(['action' => 'client']);
            }
            $this->Flash->error(__('登録情報に不備があります。'));
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

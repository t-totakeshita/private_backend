<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('機能一覧') ?></li>
        <li><?= $this->Html->link(__('商品一覧'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('商品登録'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('商品一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('オーダーID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('商品ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('発注ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('商品名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('金額') ?></th>
                <th scope="col"><?= $this->Paginator->sort('在庫') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATE_AT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UPDATE_AT') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res_status as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->order_id) ?></td>
                <td><?= $order->has('product') ? $this->Html->link($order->product->product_id, ['controller' => 'Products', 'action' => 'view', $order->product->product_id]) : '' ?></td>
                <td><?= $this->Number->format($order->status) ?></td>
                <td><?= h($order->product->product_name) ?></td>
                <td><?= h($order->product->price) ?></td>
                <td><?= h($order->product->stock) ?></td>
                <td><?= h($order->CREATE_AT) ?></td>
                <td><?= h($order->UPDATE_AT) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('発注登録'), ['action' => 'properconfirm', $order->order_id]) ?>
                    <br></br>
                    <?= $this->Html->link(__('商品削除'), ['action' => 'delete', $order->product->product_id], ['confirm' => __("本当に削除して良いですか？" . $order->product->product_name, $order->product->product_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

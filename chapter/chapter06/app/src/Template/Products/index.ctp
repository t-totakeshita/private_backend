<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('機能一覧') ?></li>
        <li><?= $this->Html->link(__('商品追加'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('商品発注管理') ?></h3>

    <?php
      // ユーザの権限によって発注ボタン遷移が異なる
      $user_grand = $this->request->getSession()->read('Auth.User.user_grand');
      if ( $user_grand === 1 ) {
        echo $this->Html->link(
          '発注管理',
          '/orders/proper',
          ['class' => 'button']
        );
      } elseif( $user_grand === 2 ) {
        echo $this->Html->link(
          '発注管理',
          '/orders/client',
          ['class' => 'button']
        );
      } elseif( $user_grand === 3 ) {
        echo $this->Html->link(
          '発注管理',
          '/orders/admin',
          ['class' => 'button']
        );
      }
    ?>

    <?php 
      echo $this->Html->link(
        'CSVダウンロード',
        '/products/csv',
        ['class' => 'button']
      );
    ?>

    <h3><?= __('商品一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('商品ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('商品名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('単品金額') ?></th>
                <th scope="col"><?= $this->Paginator->sort('在庫') ?></th>
                <th scope="col"><?= $this->Paginator->sort('合計金額') ?></th>
                <th scope="col"><?= $this->Paginator->sort('作成時間') ?></th>
                <th scope="col"><?= $this->Paginator->sort('更新時間') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->product_id) ?></td>
                <td><?= h($product->product_name) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= $this->Number->format($product->stock) ?></td>
                <td><?= h($product->price * $product->stock) ?></td>
                <td><?= h($product->CREATE_AT) ?></td>
                <td><?= h($product->UPDATE_AT) ?></td>
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

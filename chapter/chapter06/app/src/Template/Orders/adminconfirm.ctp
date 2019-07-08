<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('商品一覧') ?></li>
        <li><?= $this->Form->postLink(
                __('商品削除'),
                ['action' => 'delete', $order->order_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('商品一覧'), ['controller' => 'Products', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('発注確認') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['label' => '商品ID(自動入力されます。)', 'options' => $products, 'empty' => true, 'disabled' => true]);
            echo $this->Form->control('status', ['label' => '商品ステータス(自動入力されます。)', 'value' => 2, 'readonly' => true]);
            echo $this->Form->control('product.product_name', ['label' => '商品名(自動入力されます。)', 'readonly' => true ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('発注確認')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="users form">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
    <?= $this->Form->control('user_name', ['label' => 'ユーザ名']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
  </fieldset>
  <?= $this->Form->button(__('ログイン')); ?>
  <?= $this->Form->end() ?>
</div>

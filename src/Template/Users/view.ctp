<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auth Token'), ['controller' => 'AuthToken', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth Token'), ['controller' => 'AuthToken', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Auth Token') ?></h4>
        <?php if (!empty($user->auth_token)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Access Token') ?></th>
                <th><?= __('Refresh Token') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->auth_token as $authToken): ?>
            <tr>
                <td><?= h($authToken->id) ?></td>
                <td><?= h($authToken->user_id) ?></td>
                <td><?= h($authToken->access_token) ?></td>
                <td><?= h($authToken->refresh_token) ?></td>
                <td><?= h($authToken->created) ?></td>
                <td><?= h($authToken->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AuthToken', 'action' => 'view', $authToken->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AuthToken', 'action' => 'edit', $authToken->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuthToken', 'action' => 'delete', $authToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authToken->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

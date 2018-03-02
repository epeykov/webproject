<!-- Main -->
<div id="main">
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<article class="post">
<div class="table-wrapper">
<!-- <div class="users form large-9 medium-8 columns content"> -->
    <?= $this->Form->create($user,array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
			
            echo $this->Form->input('username');
			if ($user['role']=='admin') {
            echo $this->Form->input('password');
			echo $this->Form->input('role');
			}
			echo $this->Form->input('email');
			echo $this->Form->input('fname');
			echo $this->Form->input('lname');
			echo $this->Form->input('mobile');
			echo $this->Form->input('avatar_up', array('type' => 'file'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</article>
</div>
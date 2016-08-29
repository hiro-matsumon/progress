<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Moco Test</a>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
<?=
    $this->Form->create(null, [
        'type' => 'post',
        'url' => ['controller' => 'Moco', 'action' => 'index'],
    ])
?>
<?= $this->Form->input('名前', [
        'name' => 'first',
        'type' => 'text',
        'placeholder' => 'Username',
    ])
?>
<?= $this->Form->input('パスワード', [
        'name' => 'second',
        'type' => 'password',
        'placeholder' => 'Password',
    ])
?>
<?= $this->Form->input('セレクトボックス', [
        'name' => 'third',
        'type' => 'select',
        'multiple' => true,
        'options' => [1, 2, 3, 4],
    ])
?>
<?= $this->Form->label('ラジオボタン') ?>
<?= $this->Form->input('fourth', [
        'type' => 'radio',
        'label' => false,
        'multiple' => true,
        'options' => ['A', 'B', 'C'],
    ])
?>
<?= $this->Form->input('チェックボックス', [
        'name' => 'fifth',
        'class' => 'checkbox',
        'options' => [1, 2, 3],
    ])
?>
<?= $this->Form->input('日付', [
        'name' => 'sixth',
        'type' => 'date',
        'dateFormat' => 'DMY',
        'monthNames' => false,
    ])
?>
<?= $this->Form->submit('次へ', [
        'class' => 'btn btn-primary',
    ])
?>
<?= $this->form->end() ?>
</div>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/mocoPersons">Moco Add Person</a>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <?=
        $this->Form->create($mocoPerson)
    ?>
    <fieldset>
        <?= $this->Form->input('name', [
                'label' => '名前',
                'type' => 'text',
                'placeholder' => '山田 太郎',
            ])
        ?>
        <?= $this->Form->input('email', [
                'label' => 'Eメール',
                'type' => 'text',
                'placeholder' => 'e-mail@example.com',
            ])
        ?>
        <?= $this->Form->input('password', [
                'label' => 'パスワード',
                'type' => 'password',
                'placeholder' => 'パスワード',
            ])
        ?>
    </fieldset>
    <?= $this->Form->submit('登録', [
            'class' => 'btn btn-primary',
        ])
    ?>
    <?= $this->form->end() ?>
</div>

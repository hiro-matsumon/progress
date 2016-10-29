<div class="container theme-showcase" role="main">
    <h6 class="title"><?= $title ?></h6>
    <?=
        $this->Form->create()
    ?>
    <fieldset>
        <?= $this->Form->input('email', [
                'label' => 'Eメール',
                'type' => 'text',
            ])
        ?>
        <?= $this->Form->input('password', [
                'label' => 'パスワード',
                'type' => 'password',
            ])
        ?>
    </fieldset>
    <fieldset>
    <?= $this->Form->button('&#xf00c; ログイン', [
            'class' => 'btn btn-primary i-button',
        ])
    ?>
    </fieldset>
    <fieldset>
        <div class="pull-right">
            <a href="/mocoPersons/add" class="btn btn-danger i-button">&#xf234; 会員登録</a>
        </div>
    </fieldset>
    <?= $this->form->end() ?>
</div>

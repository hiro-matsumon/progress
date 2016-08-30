<div class="container theme-showcase" role="main">
    <h6 class="title"><?= $title ?></h6>
    <?= $this->Form->create(null, [
            'url' => '/mocoPersons/search',
        ])
    ?>
    <fieldset>
        <?= $this->Form->input('search', [
                'label' => false,
                'type' => 'text',
                'placeholder' => '検索する名前もしくはEメールを入力',
            ])
        ?>
        <?= $this->Form->submit('検索', [
                'class' => 'btn btn-primary',
            ])
        ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <div class="table-responsive">
        <div class="pull-right">
            <a href="/mocoPersons/add" class="btn btn-danger">新規登録</a>
        </div>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>名前</th>
                <th>Eメール</th>
                <th>パスワード</th>
                <th>登録日時</th>
                <th>最終更新日時</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($mocoPersons as $person) : ?>
            <tr class="list-link" data-href="/mocoPersons/edit/<?= $person->id ?>">
                <td><?= $person->id ?></td>
                <td><?= h($person->name) ?></td>
                <td><?= h($person->email) ?></td>
                <td><?= h($person->password) ?></td>
                <td><?= h(date_format($person->created, 'Y/m/d H:i:s')) ?></td>
                <td><?= h(date_format($person->modified, 'Y/m/d H:i:s')) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <?= $this->element('pagination') ?>
    </div>
</div>

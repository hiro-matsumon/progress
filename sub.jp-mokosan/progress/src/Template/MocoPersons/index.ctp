<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;
?>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="sr-only">Toggle navigation</span>
    </button>
    <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse-01">
    <ul class="nav navbar-nav">
        <li class="nav-divider"></li>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Help</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="#" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
          <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form>
  </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->

<div class="container theme-showcase" role="main">
    <h4 class="title"><?= Configure::read('App.title') ?> Index</h4>
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
        <nav>
            <div>
                全 <?= $this->Paginator->param('count'); ?> 件
            </div>
            <ul class="pagination">
                <?= $this->Paginator->prev('<< ' . __('')); ?>
                <?= $this->Paginator->numbers(); ?>
                <?= $this->Paginator->next(__('') . ' >>'); ?>
            </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p><small>Copyright &copy;2016 by H.Matsuda. All rights reserved.</small></p>
    </div>
</footer>

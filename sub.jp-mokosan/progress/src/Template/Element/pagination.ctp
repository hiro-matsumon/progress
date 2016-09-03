<nav>
    <div>
        全 <?= $this->Paginator->param('count'); ?> 件
    </div>
    <ul class="pagination">
<?php if ($this->Paginator->param('pageCount') > 1) : ?>
        <?= $this->Paginator->prev('<< '); ?>
        <?= $this->Paginator->numbers(); ?>
        <?= $this->Paginator->next(' >>'); ?>
<?php endif ?>
    </ul>
</nav>

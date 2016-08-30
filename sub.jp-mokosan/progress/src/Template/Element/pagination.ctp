<nav>
    <div>
        全 <?= $this->Paginator->param('count'); ?> 件
    </div>
    <ul class="pagination">
        <?= $this->Paginator->prev('<< '); ?>
        <?= $this->Paginator->numbers(); ?>
        <?= $this->Paginator->next(' >>'); ?>
    </ul>
</nav>

<div class="page-changer pagination">
    <div class="pull-left">
        <span class="pull-left" style="padding-right: 5px">
            <?php echo l($self->per_page_changer_prefix) ?>
        </span>
        <ul>
            <?php foreach ($self->per_pages as $per_page): ?>
                <li <?php echo ($current_per_page == $per_page) ? 'class="selected active"' : '' ?>>
                    <a href="<?php echo $self->base_url ?>?per_page=<?php echo $per_page ?>"><?php echo $per_page ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
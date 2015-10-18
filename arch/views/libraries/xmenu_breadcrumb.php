<?php

function _get_bc_uri($bc) {
    if (empty($bc['uri'])) {
        if (!empty($bc['children'])) {
            foreach ($bc['children'] as $child) {
                return _get_bc_uri($child);
            }
        } else {
            return '#';
        }
    }
    return $bc['uri'];
}
$count = count($breadcrumb);
$i = 0;
?>
<ul class="breadcrumb">
    <li><a href="<?php echo ($self->home_url) ? site_url($self->home_url) : base_url() ?>"><?php echo l('Home') ?></a></li>
    <?php foreach ($breadcrumb as $bc): ?>
        <?php $bc_uri = _get_bc_uri($bc) ?>
        <li <?php echo (++$i == $count) ? 'class="active"' : '' ?>><a href="<?php echo site_url($bc_uri) ?>"><?php echo l($bc['title']) ?></a></li>
    <?php endforeach ?>
</ul>
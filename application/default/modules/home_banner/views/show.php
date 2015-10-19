<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri('listing'), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>
<div class="clearfix"></div>

<form action="<?php echo current_url() ?>" method="post" class="ajaxform" enctype="multipart/form-data">
    <fieldset>
        <legend><?php echo $title ?></legend>
            <div>
                <label><?php echo l('Name') ?></label>
                <input type="text" name="name" value="<?php echo set_value('name') ?>">
            </div>
            <div class="clearfix"></div>
            <?php if (!empty($_POST['image'])): ?>
                <div>
                    <label><?php echo l('Image') ?></label>
                    <img width="200" src="<?php echo base_url('data/home_banner/image/'.$_POST['image']) ?>">
                    <a href="<?php echo site_url('home_banner/delete_one_image/'.$_POST['id']) ?>">x</a>
                </div>
            <?php else: ?>
                <div>
                    <label><?php echo l('Image') ?></label>
                    <input type="file" name="image">
                </div>
            <?php endif ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>
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
                <label><?php echo l('Client Type') ?></label>
                <?php echo xform_lookup('client_type', 'client_type') ?>
            </div>
            <div class="clearfix"></div>
            <div>
                <label><?php echo l('Client Name') ?></label>
                <input type="text" name="client_name" value="<?php echo set_value('client_name') ?>" placeholder="Client Name">
            </div>
            <div class="clearfix"></div>
            <?php if (!empty($_POST['logo'])): ?>
                <div>
                    <label><?php echo l('Logo') ?></label>
                    <div class="thumbnail">
                        <img width="200" src="<?php echo base_url('data/portfolio/logo/'.$_POST['logo']) ?>">
                        <a class="link-thumbnail" href="<?php echo site_url('portfolio/delete_one_image/'.$_POST['id']) ?>">Delete</a>
                    </div>
                </div>
            <?php else: ?>
                <div>
                    <label><?php echo l('Logo') ?></label>
                    <input type="file" name="logo">
                </div>
            <?php endif ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>
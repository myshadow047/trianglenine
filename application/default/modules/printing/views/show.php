<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri($CI->uri->rsegments[2]), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>

<div class="clearfix"></div>

<form action="<?php echo current_url() ?>" method="post" class="ajaxform" enctype="multipart/form-data">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <div>
            <label>Printing Type</label>
            <?php echo form_dropdown('printing_type', $printing_type) ?>
        </div>
        <div>
            <label><?php echo l('Printing Name') ?></label>
            <input type="text" name="printing_name" value="<?php echo set_value('printing_name') ?>" placeholder="Product Name">
        </div>
        <div>
            <label><?php echo l('Printing Description') ?></label>
            <input type="text" name="description" value="<?php echo set_value('description') ?>" placeholder="Product Description">
        </div>
        <?php if(!empty($_POST['image'])): ?>
            <div>
                <label><?php echo l('Image') ?></label>
                <div class="thumbnail">
                    <img width="200" height="200" src="<?php echo base_url('data/printing/image/'.$_POST['image']) ?>">
                    <a class="link-thumbnail" href="<?php echo site_url('printing/delete_one_image/'.$id) ?>">Delete</a>
                </div>
            </div>
        <?php else: ?>
            <div>
                <label><?php echo l('Image') ?></label>
                <input type="file" name="image" multiple>
            </div>
        <?php endif ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>
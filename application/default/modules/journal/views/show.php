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
                <label><?php echo l('Category') ?></label>
                <?php echo form_dropdown('category', $category) ?>
            </div>

            <div>
                <label><?php echo l('Title') ?></label>
                <input type="text" name="title" value="<?php echo set_value('title') ?>">
            </div>

            <div class="clearfix"></div>

            <?php if (!empty($_POST['image'])): ?>
                <div>
                    <label><?php echo l('Image') ?></label>
                    <div class="thumbnail">
                        <img width="200" src="<?php echo base_url('data/journal/image/'.$_POST['image']) ?>">
                        <a class="link-thumbnail" href="<?php echo site_url('journal/delete_one_image/'.$_POST['id']) ?>">Delete</a>
                    </div>
                </div>
            <?php else: ?>
                <div>
                    <label><?php echo l('Image') ?></label>
                    <input type="file" name="image">
                </div>
            <?php endif ?>

            <div class="clearfix"></div>

            <div>
                <label><?php echo l('Content') ?></label>
                <textarea name="content" placeholder="Content"><?php echo set_value('content') ?></textarea>
            </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>

<script type="text/javascript">
    CKEDITOR.replace( 'content' );
</script>
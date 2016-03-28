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

        <?php if(!empty($images)): ?>
            <div>
                <label><?php echo l('Image') ?></label>

                <?php foreach($images as $image): ?>
                    <div class="thumbnail">
                        <img width="200" height="200" src="<?php echo base_url('data/price/image/'.$image['image']) ?>">
                        <a class="link-thumbnail" href="<?php echo site_url('price/delete_one_image/'.$image['id'].'/'.$id) ?>">Delete</a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div>
                <label><?php echo l('Image') ?></label>
                <input type="file" name="image[]" multiple>
            </div>
        <?php endif ?>

        <div class="clearfix"></div>

        <div>
            <label><?php echo l('Price Description') ?></label>
            <textarea name="price_description" placeholder="Price Description"><?php echo set_value('price_description') ?></textarea>
        </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>

<script type="text/javascript">
    CKEDITOR.replace( 'price_description' );
</script>
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
            <label><?php echo l('Product Category') ?></label>
            <?php echo form_dropdown('product_category', $product_category) ?>
        </div>

        <div>
            <label><?php echo l('Product Type') ?></label>
            <?php echo xform_lookup('product_type', 'product_type') ?>
        </div>

        <div>
            <label><?php echo l('Printing Type') ?></label>
            <?php echo form_dropdown('printing_type', $printing_type) ?>
        </div>

        <div>
            <label><?php echo l('Printing Name') ?></label>
            <?php echo form_dropdown('printing_name', $printing_name) ?>
        </div>

        <div>
            <label><?php echo l('Product Code') ?></label>
            <input type="text" name="product_code" value="<?php echo set_value('product_code') ?>" placeholder="Product Code">
        </div>

        <div>
            <label><?php echo l('Product Name') ?></label>
            <input type="text" name="product_name" value="<?php echo set_value('product_name') ?>" placeholder="Product Name">
        </div>

        <div>
            <label><?php echo l('Product Description') ?></label>
            <textarea name="product_description" placeholder="Product Description"><?php echo set_value('product_description') ?></textarea>
        </div>

        <div class="clearfix"></div>

        <?php if(!empty($images)): ?>
            <div>
                <label><?php echo l('Image') ?></label>

                <?php foreach($images as $image): ?>
                    <div class="thumbnail">
                        <img width="200" height="200" src="<?php echo base_url('data/product/image/'.$image['image_name']) ?>">
                        <a class="link-thumbnail" href="<?php echo site_url('product/delete_one_image/'.$image['id'].'/'.$id) ?>">Delete</a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div>
                <label><?php echo l('Image') ?></label>
                <input type="file" name="images[]" multiple>
            </div>
        <?php endif ?>


    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>

<script type="text/javascript">
    CKEDITOR.replace( 'product_description' );
</script>
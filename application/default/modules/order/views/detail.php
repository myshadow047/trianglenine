<?php $title = humanize(get_class($CI)). ' Detail' ?>
<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri('listing'), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>

<div class="clearfix"></div>
<fieldset>
    <legend><?php echo 'Special Order' ?></legend>
    <div>
        <label><?php echo l('Order Number') ?></label>
        <span><?php echo $data['code'] ?></span>
    </div>
    <div>
        <label><?php echo l('Name') ?></label>
        <span><?php echo $data['name'] ?></span>
    </div>
    <div>
        <label><?php echo l('Email') ?></label>
        <span><?php echo $data['email'] ?></span>
    </div>
    <div>
        <label><?php echo l('Phone') ?></label>
        <span><?php echo $data['phone'] ?></span>
    </div>
    <div>
        <label><?php echo l('Detail Order') ?></label>
        <span><?php echo $data['detail_order'] ?></span>
    </div>

    <div>
        <label><span class="label-image"><?php echo l('Images') ?></span></label>
        <span>
            <?php foreach($data['images'] as $image): ?>
                <div>
                    <a href="<?php echo base_url('data/order/image/'.$image['image']) ?>">
                        <div style="background-image: url(<?php echo base_url('data/order/image/'.$image['image']) ?>); background-size: contain;height: 100px;background-repeat: no-repeat;"></div>
                    </a>
                </div>
            <?php endforeach ?>
        </span>
    </div>
</fieldset>
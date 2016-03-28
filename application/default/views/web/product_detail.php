<article class="detail container row">
    <div class="titleArea row">
        <h3 class="title">Detail Product</h3>
    </div>
    <div class="row">
        <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
            <div class="wrapper">
                <div id="sync1" class="imageDetail">
                    <?php foreach ($products['images'] as $key => $images): ?>
                        <div class="easyzoom easyzoom--overlay">
                            <a href="<?php echo base_url('data/product/image/'.$images['image_name']) ?>">
                                <div class="image" style="background: url('<?php echo base_url('data/product/image/'.$images['image_name']) ?>') center no-repeat; background-size: 70%;"></div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div id="sync2" class="imagePagination">
                    <?php foreach ($products['images'] as $key => $images): ?>
                        <a href="#">
                            <div class="image" style="background: url('<?php echo base_url('data/product/image/'.$images['image_name']) ?>') #efeeef center no-repeat; background-size: 70%;"></div>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 detailContent">
            <div class="wrapper">
                <div class="detailDesc">
                    <div class="title">
                        <h3><?php echo $products['product_name'] ?></h3>
                    </div>
                    <h6>Product Description</h6>
                    <p>
                        <?php echo $products['product_description'] ?>
                    </p>
                    <hr>
                    <h6>Available Size</h6>
                    <ul>
                        <li>S</li>
                        <li>M</li>
                        <li>L</li>
                        <li>XL</li>
                    </ul>
                    <hr>
                    <h6>Share</h6>
                    <ul class="share flat">
                        <li>
                            <a href="#" class="button">
                                <i class="xn xn-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="button">
                                <i class="xn xn-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="button">
                                <i class="xn xn-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>

<link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/themes/css/easyzoom.css') ?>">
<script type="text/javascript" src="<?php echo theme_url('web/themes/js/easyzoom.js') ?>"></script>
<script>
    var $easyzoom = $('.easyzoom').easyZoom();
</script>
<article class="product container row">
    <div class="titleArea row">
        <h3 class="title"><?php echo $category ?></h3>
    </div>
    <div class="thumbArea">
        <div class="productThumb row animated fadeIn">
            <?php foreach ($products as $key => $product): ?>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="<?php echo site_url('web/product/'.$category.'/'.$product['product_identifier']) ?>">
                            <div class="img" style="background: url('<?php echo base_url('data/product/image/'.$product['images']['image_name']) ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge"><?php echo $product['product_code'] ?></span>
                    </div>
                    <div class="descArea row">
                        <a href="#" class="tagline"><?php echo format_param_short($product['product_type'], 'product_type') ?></a>
                        <h6>
                            <a href="<?php echo site_url('web/product/'.$category.'/'.$product['product_identifier']) ?>"><?php echo $product['product_name'] ?></a>
                        </h6>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- <ul class="pagination centered">
        <li><a href="#"><i class="xn xn-angle-double-left"></i></a></li>
        <li><a href="#"><i class="xn xn-left-open-big"></i></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#"><i class="xn xn-right-open-big"></i></a></li>
        <li><a href="#"><i class="xn xn-angle-double-right"></i></a></li>
    </ul> -->
</article>
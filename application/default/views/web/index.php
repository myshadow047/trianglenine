<article class="heroBanner">
    <?php foreach ($home_banner as $banner): ?>
        <div class="bannerSlide">
            <img src="<?php echo base_url('data/home_banner/image/' . $banner['image']) ?>" alt="<?php echo $banner['name'] ?>">
            <a href="#" class="banner" style="background: url('<?php echo base_url('data/home_banner/image/' . $banner['image']) ?>') center no-repeat; background-size: cover;"></a>
        </div>
    <?php endforeach ?>
</article>

<article id="product" class="product container">
    <div class="titleArea row">
        <h3 class="title">Product</h3>
    </div>
    <section class="thumbPreview">
        <ul class="resp-tabs-list">
            <?php foreach ($product_category as $key => $product): ?>
                <li class="title shirtButton">
                    <span class="icn"></span>
                    <?php echo $product['product_category_name'] ?>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="resp-tabs-container">
            <?php foreach ($products as $k => $prod): ?>
                <div class="productThumb row">
                    <?php foreach ($prod as $v): ?>
                        <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                            <div class="imageArea">
                                <a href="<?php echo site_url('web/product/'.$v['product_category'].'/'.$v['product_identifier']) ?>">
                                    <div class="img" style="background: url('<?php echo base_url('data/product/image/'.$v['images']['image_name']) ?>') center no-repeat; background-size: 80%;"></div>
                                </a>
                                <span class="badge"><?php echo $v['product_code'] ?></span>
                            </div>
                            <div class="descArea row">
                                <a href="<?php echo site_url('web/product/'.$v['product_category'].'/'.$v['product_identifier']) ?>" class="tagline"><?php echo format_param_short($v['product_type'], 'product_type') ?></a>
                                <h6>
                                    <a href="<?php echo site_url('web/product/'.$v['product_category'].'/'.$v['product_identifier']) ?>"><?php echo $v['product_name'] ?></</a>
                                </h6>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</article>

<article class="client">
    <div class="container">
        <div class="clientArea">
            <?php foreach ($portfolio as $port): ?>
                <div class="clientSlide">
                    <span style="background: url('<?php echo base_url('data/portfolio/logo/'.$port['logo']) ?>') center no-repeat; background-size: contain;"></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</article>

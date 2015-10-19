<article class="product container row">
    <div class="titleArea row">
        <h3 class="title">Portfolio</h3>
    </div>
    <div id="portfolio" class="thumbArea">
        <div class="productThumb row animated fadeIn">
            <?php foreach ($portfolio as $key => $value): ?>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <div class="img" style="background: url('<?php echo base_url('data/portfolio/logo/'.$value['logo']) ?>') center no-repeat; background-size: contain;"></div>
                    </div>
                    <div class="descArea row">
                        <span class="subTitle"><?php echo format_param_short($value['client_type'], 'client_type') ?></span>
                        <h4><?php echo $value['client_name'] ?></h4>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</article>
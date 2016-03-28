<article class="product container row">
    <div class="titleArea row">
        <h3 class="title"><?php echo str_replace('-', ' ', $printing_type) ?></h3>
    </div>
    <div class="thumbArea">
        <div class="productThumb print row animated fadeIn">
            <?php foreach ($printing as $key => $value): ?>
                <div class="thumb xlarge-6 large-6 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="<?php echo site_url('web/printing/'.$printing_type.'/'.$value['printing_identifier']) ?>">
                            <div class="img" style="background: url('<?php echo base_url('data/printing/image/'.$value['image']) ?>') center no-repeat; background-size: cover;"></div>
                        </a>
                    </div>
                    <div class="descArea row">
                        <a href="#" class="tagline"><?php echo $value['printing_name'] ?></a>
                        <h6>
                            <a href="detail-print.php"><?php echo $value['description'] ?></a>
                        </h6>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</article>
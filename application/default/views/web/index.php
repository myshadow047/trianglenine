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
            <li class="title shirtButton">
                <span class="icn"></span>
                T-Shirt
            </li>
            <li class="title jacketButton">
                <span class="icn"></span>
                Jacket
            </li>
            <li class="title sweatherButton">
                <span class="icn"></span>
                Sweather
            </li>
            <li class="title uniformButton">
                <span class="icn"></span>
                Uniform
            </li>
        </ul>
        <div class="resp-tabs-container">
            <div class="productThumb row">
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-001</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Lorem ipsum dolor sit amet, consectetur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-vneck2.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-002</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">V-Neck</a>
                        <h6>
                            <a href="detail.php">Ut enim ad minim veniam, quis</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-polo1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-003</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">Polo</a>
                        <h6>
                            <a href="detail.php">Aliquip ex ea commodo consequat. Duis aute irure</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt3.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-004</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Voluptate velit esse cillum dolore eu fugiat nulla pariatur</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="productThumb row">
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-polo1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-005</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">Polo</a>
                        <h6>
                            <a href="detail.php">Aliquip ex ea commodo consequat. Duis aute irure</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt3.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-006</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Voluptate velit esse cillum dolore eu fugiat nulla pariatur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-007</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Lorem ipsum dolor sit amet, consectetur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-vneck2.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-008</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">V-Neck</a>
                        <h6>
                            <a href="detail.php">Ut enim ad minim veniam, quis</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="productThumb row">
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-001</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Lorem ipsum dolor sit amet, consectetur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-vneck2.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-002</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">V-Neck</a>
                        <h6>
                            <a href="detail.php">Ut enim ad minim veniam, quis</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-polo1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-003</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">Polo</a>
                        <h6>
                            <a href="detail.php">Aliquip ex ea commodo consequat. Duis aute irure</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt3.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-004</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Voluptate velit esse cillum dolore eu fugiat nulla pariatur</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="productThumb row">
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-polo1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-005</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">Polo</a>
                        <h6>
                            <a href="detail.php">Aliquip ex ea commodo consequat. Duis aute irure</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt3.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-006</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Voluptate velit esse cillum dolore eu fugiat nulla pariatur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-shirt1.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-007</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">O-Neck</a>
                        <h6>
                            <a href="detail.php">Lorem ipsum dolor sit amet, consectetur</a>
                        </h6>
                    </div>
                </div>
                <div class="thumb xlarge-3 large-3 medium-6 small-12 tiny-12">
                    <div class="imageArea">
                        <a href="detail.php">
                            <div class="img" style="background: url('<?php echo theme_url('web/themes/img/img-vneck2.png') ?>') center no-repeat; background-size: 80%;"></div>
                        </a>
                        <span class="badge">T-008</span>
                    </div>
                    <div class="descArea row">
                        <a href="detail.php" class="tagline">V-Neck</a>
                        <h6>
                            <a href="detail.php">Ut enim ad minim veniam, quis</a>
                        </h6>
                    </div>
                </div>
            </div>
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

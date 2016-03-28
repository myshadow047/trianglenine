<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trianglenine Cloth</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="creator" content="Trianglenine" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Triangle, Trianglenine, Kaos, Kaos Polos, Sablon, Sablon Murah, Bordir, Bikin Kaos Bekasi, Sablon Kaos Bekasi, Bikin Baju Bekasi, Sablon Baju, Sablon Baju Bekasi, Bikin Jaket, Bikin Jaket Bekasi" />
    <meta name="description" content="Trianglenine adalah perusahaan jasa sablon kaos, jaket, sweather, seragam, bordir di Bekasi." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/naked-css/css/naked.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/lato/css/lato.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/jacket-awesome/dist/css/jacket-awesome.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/owl-carousel/owl-carousel/owl.carousel.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/owl-carousel/owl-carousel/owl.transitions.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/animate.css/animate.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/themes/fonts/typomoderno/stylesheet.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/vendor/Easy-Responsive-Tabs-to-Accordion/css/easy-responsive-tabs.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo theme_url('web/themes/css/main.css') ?>">

    <script type="text/javascript" src="<?php echo theme_url('web/vendor/jquery/dist/jquery.min.js') ?>"></script>

    <?php echo $map['js']; ?>
</head>

<body>
    <header>
        <nav class="nav-menu animated fadeIn">
            <h1 class="brand">
                <a href="<?php echo base_url() ?>">Trianglenine</a>
            </h1>

            <div class="toggleDown">
                <div class="menu-toggle-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="container row menuArea">
                <ul class="topbar pull-left">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li><a href="<?php echo site_url('web/about') ?>">About</a></li>
                    <li><a href="<?php echo site_url('web/portfolio') ?>">Portfolio</a></li>
                    <li><a href="<?php echo site_url('web/journal') ?>">Journal</a></li>
                </ul>
                <ul class="topbar pull-right">
                    <li>
                        <a href="#" class="down">Product <i class="xn xn-down-dir"></i></a>
                        <ul class="subMenu">
                            <?php foreach ($product_category as $pc): ?>
                                <li><a href="<?php echo site_url('web/product/'.$pc['product_category_identifier']) ?>"><?php echo $pc['product_category_name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="down">Printing Type <i class="xn xn-down-dir"></i></a>
                        <ul class="subMenu">
                            <?php foreach ($printing_types as $key => $print): ?>
                                <li><a href="<?php echo site_url('web/printing/'.$print['printing_type_identifier']) ?>"><?php echo $print['printing_type_name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('web/order_and_price') ?>">Order &amp; Price</a></li>
                </ul>
            </div>

            <ul class="toggleMenu">
                <li>
                    <a href="<?php echo base_url() ?>" class="row">
                        <span>Home</span>
                        <i class="xn xn-right-open-mini"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('web/about') ?>" class="row">
                        <span>About</span>
                        <i class="xn xn-right-open-mini"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('web/portfolio') ?>" class="row">
                        <span>Portfolio</span>
                        <i class="xn xn-right-open-mini"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('web/journal') ?>" class="row">
                        <span>Journal</span>
                        <i class="xn xn-right-open-mini"></i>
                    </a>
                </li>

                <?php foreach ($product_category as $pc): ?>
                    <li>
                        <a href="<?php echo site_url('web/product/'.$pc['product_category_identifier']) ?>" class="row">
                            <span><?php echo $pc['product_category_name'] ?></span>
                            <i class="xn xn-right-open-mini"></i>
                        </a>
                    </li>
                <?php endforeach ?>

                <?php foreach ($printing_types as $key => $print): ?>
                    <li>
                        <a href="<?php echo site_url('web/printing/'.$print['printing_type_identifier']) ?>" class="row">
                            <span><?php echo $print['printing_type_name'] ?></span>
                            <i class="xn xn-right-open-mini"></i>
                        </a>
                    </li>
                <?php endforeach ?>

                <li>
                    <a href="<?php echo site_url('web/order_and_price') ?>" class="row">
                        <span>Order &amp; Price</span>
                        <i class="xn xn-right-open-mini"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $this->load->view($CI->_view, $CI->_data, true) ?>

        <article class="storeContent">
            <div class="container">
                <?php foreach ($locations as $location): ?>
                    <div class="row">
                        <?php foreach ($location as $loc): ?>
                            <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
                                <div class="titleArea">
                                    <h3 class="title"><?php echo $loc['location_name'] ?></h3>
                                </div>
                                <h6 class="label">Address:</h6>
                                <h6>
                                    <?php echo $loc['address'] ?>
                                </h6>

                                <hr>
                                <h6 class="label">Phone:</h6>
                                <ul>
                                    <?php if ($loc['phone1']): ?>
                                        <li>
                                            <h6>
                                                <a href="<?php echo 'tel:'.$loc['phone1'] ?>"><?php echo $loc['phone1'] ?></a>
                                            </h6>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($loc['phone2']): ?>
                                        <li>
                                            <h6>
                                                <a href="<?php echo 'tel:'.$loc['phone2'] ?>"><?php echo $loc['phone2'] ?></a>
                                            </h6>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($loc['phone3']): ?>
                                        <li>
                                            <h6>
                                                <a href="<?php echo 'tel:'.$loc['phone3'] ?>"><?php echo $loc['phone3'] ?></a>
                                            </h6>
                                        </li>
                                    <?php endif ?>
                                </ul>

                                <hr>
                                <h6 class="label"><?php echo $loc['location_name'] . ' Office Hours:' ?></h6>
                                <h6>
                                    <?php echo $loc['office_hour'] ?>
                                </h6>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>

                <div class="word">
                    <h6>
                        Our Store will be closed on <strong class="red">Sunday</strong> and <strong class="red">Holidays</strong>,
                        but can still order via <strong>e-mail</strong> at <a href="mailto:<?php echo format_param_short('1', 'contact_email') ?>"><?php echo format_param_short('1', 'contact_email') ?></a>.
                    </h6>
                </div>
            </div>
            <div class="row mapArea">
                <?php echo $map['html']; ?>
            </div>
        </article>
    </main>

    <footer class="">
        <div class="container">
            <div class="row">
                <nav>
                    <ul class="social flat">
                        <li><a href="#" class="fb xn xn-facebook"></a></li>
                        <li><a href="#" class="twit xn xn-twitter"></a></li>
                        <li><a href="#" class="ins xn xn-linkedin"></a></li>
                    </ul>
                </nav>
                <p>Copyright © 2015 Trianglenine. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo theme_url('web/vendor/owl-carousel/owl-carousel/owl.carousel.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo theme_url('web/vendor/Easy-Responsive-Tabs-to-Accordion/js/easyResponsiveTabs.js') ?>"></script>
    <script type="text/javascript" src="<?php echo theme_url('web/themes/js/tshirt.js') ?>"></script>
    <script type="text/javascript" src="<?php echo theme_url('web/themes/js/main.js') ?>"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<?php include('part-head.php') ?>

<body>
    
    <?php include('part-header.php') ?>
    
    <main>
        <article class="detail container row">
            <div class="titleArea row">
                <h3 class="title">Detail Product</h3>
            </div>
            <div class="row">
                <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
                    <div class="wrapper">
                        <div id="sync1" class="imageDetail">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="themes/img/img-shirt1.png">
                                    <div class="image" style="background: url('themes/img/img-shirt1.png') center no-repeat; background-size: 70%;"></div>
                                </a>
                            </div>
                            <div class="easyzoom easyzoom--overlay">
                                <a href="themes/img/img-shirt2.png">
                                    <div class="image" style="background: url('themes/img/img-shirt2.png') center no-repeat; background-size: 70%;"></div>
                                </a>
                            </div>
                            <div class="easyzoom easyzoom--overlay">
                                <a href="themes/img/img-shirt3.png">
                                    <div class="image" style="background: url('themes/img/img-shirt3.png') center no-repeat; background-size: 70%;"></div>
                                </a>
                            </div>
                            <div class="easyzoom easyzoom--overlay">
                                <a href="themes/img/img-shirt4.png">
                                    <div class="image" style="background: url('themes/img/img-shirt4.png') center no-repeat; background-size: 70%;"></div>
                                </a>
                            </div>
                        </div>
                        <div id="sync2" class="imagePagination">
                            <a href="#">
                                <div class="image" style="background: url('themes/img/img-shirt1.png') #efeeef center no-repeat; background-size: 70%;"></div>
                            </a>
                            <a href="#">
                                <div class="image" style="background: url('themes/img/img-shirt2.png') #efeeef center no-repeat; background-size: 70%;"></div>
                            </a>
                            <a href="#">
                                <div class="image" style="background: url('themes/img/img-shirt3.png') #efeeef center no-repeat; background-size: 70%;"></div>
                            </a>
                            <a href="#">
                                <div class="image" style="background: url('themes/img/img-shirt4.png') #efeeef center no-repeat; background-size: 70%;"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 detailContent">
                    <div class="wrapper">
                        <div class="detailDesc">
                            <div class="title">
                                <h3>Product Name</h3>
                            </div>
                            <h6>Product Description</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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

        <?php include('part-store.php') ?>

    </main>

    <link rel="stylesheet" type="text/css" href="themes/css/easyzoom.css">
    <script type="text/javascript" src="themes/js/easyzoom.js"></script>
    <script>
        var $easyzoom = $('.easyzoom').easyZoom();
    </script>
    
    <?php include('part-footer.php') ?>
    
    <?php include('part-foot.php') ?>

</body>
</html>
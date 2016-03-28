<style>
    fieldset.dashboard { text-align:center }
    fieldset.dashboard .coloum2 { width:25%; float:left; text-align:center; margin-bottom: 50px; }
    h3 { text-transform: uppercase; }
    .the-content a:hover {
        text-decoration: none;
    }
</style>
<fieldset class="dashboard">
    <legend><?php echo l('Trianglenine Admin Navigation') ?></legend>

    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('home_banner') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/home_banner.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Home Banner') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('about') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/about.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('About') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('portfolio') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/portfolio.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Portfolio') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('journal') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/journal.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Journal') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('product') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/product.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Product') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('printing') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/printing.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Printing') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('order') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/order.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Order') ?></h3>
                </div>
            </a>
        </div>
    </div>
    <div class="coloum2" >
        <div class="middle">
            <a href="<?php echo site_url('location') ?>">
                <div class="icon">
                    <img src="<?php echo theme_url('img/home_icon/location.png') ?>" width="100" height="100" alt="" />
                    <h3><?php echo l('Location') ?></h3>
                </div>
            </a>
        </div>
    </div>







</fieldset>

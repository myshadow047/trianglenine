<!DOCTYPE html>
<html lang="en">

<?php include('part-head.php') ?>

<body>

    <?php include('part-header.php') ?>

    <main class="list">
        <article class="price container row">
            <div class="titleArea">
                <h3 class="title">Price</h3>
            </div>
            <div class="priceArea">
                <div class="row">
                    <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
                        <div class="wrapper">
                            <img src="themes/img/harga.png" alt="">
                        </div>
                    </div>
                    <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
                        <div class="wrapper">
                            <img src="themes/img/harga2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="priceContent">
                    <h4>
                        Harga untuk masing-masing kaos pesanan berbeda-beda, tergantung quantity, jenis sablon atau bordir, dan jenis bahan yang digunakan.
                    </h4>

                    <h4>KETERANGAN:</h4>
                    <ol>
                        <li>
                            <p>Minimum order adalah 24 pcs.</p>
                        </li>
                        <li>
                            <p>Kirimkan design anda ke email: <a href="mailto:giarswimm@yahoo.co.id">giarswimm@yahoo.co.id</a> dan kami akan menghitung biaya yang paling ekonomis untuk anda.</p>
                        </li>
                    </ol>
                    <p>
                        Untuk informasi lebih detail, konsultasi bahan, permintaan penawaran, dan pemesanan bisa dengan cara  email ke <a href="mailto:giarswimm@yahoo.co.id">giarswimm@yahoo.co.id</a>.
                    </p>
                </div>

            </div>
        </article>
        <article class="order container row">
            <div class="orderArea">
                <form action="">
                    <div class="row inputArea">
                        <div class="titleArea">
                            <h3 class="title">Order</h3>
                        </div>
                        <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 inputContent">
                            <div class="row">
                                <div class="input">
                                    <input type="text" placeholder="Enter your e-mail name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input">
                                    <input type="email" placeholder="Enter your e-mail address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input">
                                    <input type="text" placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input">
                                    <input type="text" placeholder="Enter ingredients">
                                </div>
                            </div>
                        </div>
                        <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 inputContent">
                            <div class="row">
                                <div class="input">
                                    <input type="text" placeholder="Enter dimensions">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Enter your detail request"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row uploadArea">
                        <div class="titleArea">
                            <h3 class="title">Upload Image</h3>
                        </div>
                        <ul class="flat">
                            <li>
                                <div class="imageArea">
                                    <div class="image empty" style="background: url('themes/img/banner3.jpg') center no-repeat; background-size: cover;"></div>
                                    <div class="bg">
                                        <a href="#" class="buttonUpload">+</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="imageArea">
                                    <div class="image empty" style="background: url('themes/img/banner3.jpg') center no-repeat; background-size: cover;"></div>
                                    <div class="bg">
                                        <a href="#" class="buttonUpload">+</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="imageArea">
                                    <div class="image empty" style="background: url('themes/img/banner3.jpg') center no-repeat; background-size: cover;"></div>
                                    <div class="bg">
                                        <a href="#" class="buttonUpload">+</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="imageArea">
                                    <div class="image empty" style="background: url('themes/img/banner3.jpg') center no-repeat; background-size: cover;"></div>
                                    <div class="bg">
                                        <a href="#" class="buttonUpload">+</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="submitArea">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </article>
        
        <?php include('part-store.php') ?>

    </main>

    <?php include('part-footer.php') ?>

    <?php include('part-foot.php') ?>

</body>
</html>
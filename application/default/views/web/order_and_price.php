<article class="price container row">
    <div class="titleArea">
        <h3 class="title">Price</h3>
    </div>
    <div class="priceArea">
        <div class="row">
            <?php foreach ($images as $key => $value): ?>
                <div class="xlarge-6 large-6 medium-6 small-12 tiny-12">
                    <div class="wrapper">
                        <img src="<?php echo base_url('data/price/image/'.$value['image']) ?>" alt="">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="priceContent">

            <h4 class="subTitle">KETERANGAN:</h4>
            <?php echo isset($data['price_description']) ? $data['price_description'] : ''?>
        </div>

    </div>
</article>
<article class="order container">
    <div class="orderArea">
        <form id="form-special-order" method="post" action="<?php echo site_url('order/add') ?>" enctype="multipart/form-data">
            <div class="row inputArea">
                <div class="titleArea">
                    <h3 class="title">Order</h3>
                </div>
                <div class="row">
                    <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 inputContent">
                        <div class="input">
                            <input type="text" placeholder="Enter your name" name="name">
                        </div>
                        <div class="input">
                            <input type="email" placeholder="Enter your e-mail address" name="email">
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Enter your phone number" name="phone">
                        </div>
                    </div>
                    <div class="xlarge-6 large-6 medium-6 small-12 tiny-12 inputContent">
                        <div class="input">
                            <input type="text" placeholder="Enter size" name="size">
                        </div>
                        <div class="input">
                            <textarea name="detail_order" id="" cols="30" rows="10" placeholder="Enter your detail request"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row uploadArea">
                <div class="titleArea">
                    <h3 class="title">Upload Image</h3>
                </div>
                <ul class="flat row">
                    <li class="xlarge-3 large-3 medium-6 small-6 tiny-6">
                        <div class="imageArea">
                            <input id="image1" type="file" name="image[]" style="display: none;">
                            <div class="image empty"></div>
                            <div class="bg">
                                <a class="buttonUpload">+</a>
                            </div>
                        </div>
                    </li>
                    <li class="xlarge-3 large-3 medium-6 small-6 tiny-6">
                        <div class="imageArea">
                            <input id="image2" type="file" name="image[]" style="display: none;">
                            <div class="image empty"></div>
                            <div class="bg">
                                <a class="buttonUpload">+</a>
                            </div>
                        </div>
                    </li>
                    <li class="xlarge-3 large-3 medium-6 small-6 tiny-6">
                        <div class="imageArea">
                            <input id="image3" type="file" name="image[]" style="display: none;">
                            <div class="image empty"></div>
                            <div class="bg">
                                <a class="buttonUpload">+</a>
                            </div>
                        </div>
                    </li>
                    <li class="xlarge-3 large-3 medium-6 small-6 tiny-6">
                        <div class="imageArea">
                            <input id="image4" type="file" name="image[]" style="display: none;">
                            <div class="image empty"></div>
                            <div class="bg">
                                <a class="buttonUpload">+</a>
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

<script type="text/javascript">
    $(function(){
        $('form#form-special-order').on('submit', function(e){
            var data = $(this).serializeArray();
            var error = 0;
            var names = [];

            $.each(data, function(k, v){
                if (v.value.trim() == ''){
                    error++;
                    names.push(v.name);
                }
            });

            if (error > 0) {
                $("html, body").animate({ scrollTop: $('form#form-special-order').offset().top });

                setTimeout(function(){
                    $.each(names, function(k, v){
                        $('input[name="'+v+'"], textarea[name="'+v+'"]').parent().addClass('animated shake error');
                    });
                }, 500);

                setTimeout(function(){
                    $.each(names, function(k, v){
                        $('input[name="'+v+'"], textarea[name="'+v+'"]').parent().removeClass('animated shake');
                    });
                }, 1000);

                return false;
            }
        });

        $('form#form-special-order input, form#form-special-order textarea').on('focus', function(e){
            $(e.target).parent().removeClass('animated shake error');
        });

        $('.imageArea a').off('click').on('click', function(){
            if ($(this).hasClass('not-trigger')) {
                    $(this).parent().parent().find('input[type="file"]').parent().find('div.image').addClass('empty');
                    $(this).parent().parent().find('input[type="file"]').parent().find('div.image').css({
                        'background-size': 'cover'
                    });
                    $(this).html('+');
                    $(this).removeClass('not-trigger');
            } else {
                $(this).parent().parent().find('input[type="file"]').trigger('click');
            }

            var those = this;
            $(this).parent().parent().find('input[type="file"]').change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    var that = this;
                    reader.onload = function(e){
                        $(that).parent().find('div.image').removeClass('empty');
                        $(that).parent().find('div.image').css({
                            'background': 'url('+e.target.result+') center no-repeat',
                            'background-size': 'cover'
                        });
                        $(those).html('-');
                        $(those).addClass('not-trigger');
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    });
</script>
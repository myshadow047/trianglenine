<!-- INSTANSIVE WIDGET -->
<script src="<?php echo theme_url('web/themes/js/instansive.js') ?>"></script>

<article class="journal container row">
    <div class="titleArea row">
        <h3 class="title">Detail Journal</h3>
    </div>
    <div class="row">
        <div class="journalContent xlarge-8 large-8 medium-8 small-12 tiny-12">
            <div class="row contentArea">
                <h4 class="subTitle">
                    <a href=""><?php echo $data_journal['title'] ?></a>
                </h4>
                <div class="dateShare row">
                    <h6 class="date pull-left"><?php echo date('l, d M Y', strtotime($data_journal['created_time'])) ?></h6>
                    <div class="shareToggle pull-right">
                        <h6 class="date share">
                            <span class="xn xn-share"></span>
                            <span class="text">Share</span>
                        </h6>
                        <ul class="context-menu right">
                            <li>
                                <a href="#">
                                    <span class="xn xn-facebook"></span>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="xn xn-pinterest"></span>
                                    Pinterest
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="xn xn-twitter"></span>
                                    Twitter
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <img src="<?php echo base_url('data/journal/image/'.$data_journal['image']) ?>" alt="<?php echo $data_journal['title'] ?>">
                <p>
                    <?php echo $data_journal['content'] ?>
                </p>
            </div>
        </div>
        <div class="journalSidebar xlarge-4 large-4 medium-4 small-12 tiny-12">
            <div class="row">
                <h4 class="subTitle">Categories</h3>
                 <ul>
                    <?php foreach ($journal_category as $cat): ?>
                        <li>
                            <a href="<?php echo site_url('web/journal/'.$cat['identifier']) ?>"><?php echo $cat['name'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="row">
                <h4 class="subTitle">Recent Posts</h3>
                <ul>
                    <?php foreach ($recent as $rec): ?>
                        <li>
                            <a href="<?php echo site_url('web/journal/'.$rec['category'].'/'.$rec['identifier']) ?>"><?php echo $rec['title'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="row">
                <h4 class="subTitle">Instagram Feed</h3>
                <iframe src="//instansive.com/widgets/1807fe4fb1e565dd469aa908f3a4e088fe70d807.html" id="instansive_1807fe4fb1" name="instansive_1807fe4fb1"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
            </div>
        </div>
    </div>
</article>
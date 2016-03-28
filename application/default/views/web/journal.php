<!-- INSTANSIVE WIDGET -->
<script src="<?php echo theme_url('web/themes/js/instansive.js') ?>"></script>

<article class="journal container row">
    <div class="titleArea row">
        <h3 class="title">Journal</h3>
    </div>
    <div class="row">
        <div class="journalContent xlarge-8 large-8 medium-8 small-12 tiny-12">
            <?php if ($data_journal): ?>
                <?php foreach ($data_journal as $key => $journal): ?>
                    <div class="row contentArea">
                        <h4 class="subTitle">
                            <a href="<?php echo site_url('web/journal/'.$journal['category'].'/'.$journal['identifier']) ?>"><?php echo $journal['title'] ?></a>
                        </h4>
                        <div class="dateShare row">
                            <h6 class="date"><?php echo date('l, d M Y', strtotime($journal['created_time'])) ?></h6>
                        </div>
                        <img src="<?php echo base_url('data/journal/image/'.$journal['image']) ?>" alt="<?php echo $journal['title'] ?>">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum...
                        </p>
                        <a href="<?php echo site_url('web/journal/'.$journal['category'].'/'.$journal['identifier']) ?>" class="more button">Read more</a>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="row contentArea">
                    <h4 class="subTitle">
                        Content not available
                    </h4>
                </div>
            <?php endif ?>
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
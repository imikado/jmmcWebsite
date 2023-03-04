<div class="row">

    <?php

    use MyWebsite\Helper\FormatHelper;

    foreach ($this->paramList['contentList'] as $i => $content) : ?>


        <div class="col s12 ">
            <a id="date<?php echo $content->publication_date ?>"></a>
            <h4><?php echo FormatHelper::formatLongDate($content->publication_date) ?>: <?php echo $content->title ?> </h4>

            <div class="card">



                <div class="card-content">

                    <p><?php echo ($content->content) ?></p>
                </div>



            </div>
        </div>


    <?php endforeach; ?>
</div>
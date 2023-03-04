<h2><?php echo $this->paramList['title'] ?></h2>
<div class="row">

    <?php

    use MyWebsite\Helper\FormatHelper;

    foreach ($this->paramList['contentList'] as $i => $content) : ?>


        <div class="col s12 ">
            <h4><?php echo $content->title ?> </h4>

            <div class="card">



                <div class="card-content">

                    <p><?php echo ($content->content) ?></p>
                </div>



            </div>
        </div>


    <?php endforeach; ?>
</div>
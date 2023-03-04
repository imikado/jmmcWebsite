<div class="row" style="margin-top:20px">
    <div class="carousel carousel-slider">

        <?php foreach ($this->paramList['imageList'] as $i => $imageLoop) : ?>

            <a class=" carousel-item" href="#image_<?php echo $i ?>"><img src="<?php echo $imageLoop ?>"></a>



        <?php endforeach; ?>

    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            "fullWidth": true
        };
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems, options);
    });
</script>
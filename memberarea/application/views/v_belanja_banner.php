<div class="row smooth">
    <div class="col-desk-12">
        <div class="carousel">
            <img class="image-carousel" style="display:block" src="<?=HOST_API_IMAGE?>get_img?file=banner/banner1.jpg" >
            <img class="image-carousel" src="<?=HOST_API_IMAGE?>get_img?file=banner/banner2.jpg" >
            <img class="image-carousel" src="<?=HOST_API_IMAGE?>get_img?file=banner/banner3.jpg" >
            <div id="get-carousel-left" class="button-carousel-left">
                <img src="<?php echo base_url() ?>images/asset/left.svg">
            </div>
            <div id="get-carousel-right" class="button-carousel-right">
                <img src="<?php echo base_url() ?>images/asset/right.svg">
            </div>
            <div class="button-carousel-indicator">
                <div onclick="indexBanner(0)" class="point" style="background:rgb(104, 101, 101)"></div>
                <div onclick="indexBanner(1)" class="point"></div>
                <div onclick="indexBanner(2)" class="point"></div>
            </div>
        </div>
    </div>
</div>

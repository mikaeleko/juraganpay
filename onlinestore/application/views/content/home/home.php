

<div class="col-desk-9 col-sm-9">

  <!-- <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="banner1-right">
              <a href="#"><img class="image" src="<?= API_IMG ?>banner/<?= $bannertop[0]->image_name ?>" alt=""></a>
              <button class="btn-shop-now">SHOP NOW</button>
          </div>
      </div>
  </div> -->

  <!-- ICON -->
  <div id="etalase-product">
        <div class="row" id="home-icon" >
            <div class="col-desk-12 col-md-12 col-sm-12">
                <div class="top-right-category">
                    <?php foreach($icon as $ic) {?>
                    <div class="item">
                    <img class="icon-category" src="<?=API_IMG?>category/<?= $ic->icon ?>" alt="" style="cursor:pointer;">
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
        <!-- END OF ICON -->

          <!-- BANNER TOP-->
        <div class="row" id="home-banner" >
            <div class="col-desk-6 col-md-6 col-sm-6">
                <div class="banner2-right-parent">
                    <a href="#"><img class="banner2-right" src="<?=API_IMG?>banner/<?= $bannertopleft[0]->image_name ?>" alt=""></a>
                </div>
            </div>
            <div class="col-desk-6 col-md-6 col-sm-6">
                <div class="banner3-right-parent">
                    <a href="#"><img class="banner3-right" src="<?=API_IMG?>banner/<?= $bannertopright[0]->image_name ?>" alt=""></a>
                </div>
            </div>
        </div>
        <!-- END OF BANNER TOP-->



        <!-- LIST PRODUCT 1-->
        <div class="row" id="home-product1" >
            <div class="col-desk-12 col-md-12 col-sm-12">
                  <div class="list-product" class="list-product">
                      <?php foreach($product as $prod){ ?>
                      <div class="item" onclick="detail_product(<?= $prod->product_id?>)">
                        <div class="" style="">
                          <a href="#"> <img class="image" src="<?=API_IMG?>products/<?=$prod->image1 ?>" alt="">  </a>
                        </div>
                        <img class="img-wish" src="<?=base_url() ?>assets/icons/heart-grey.png" alt="">
                        <div class="atribut">
                          <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                          <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                          <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                          <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                          <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt=""><br>
                          <span class="product-name"><?= $prod->product_name ?></span><br>
                          <!-- <span class="price">
                            Rp <?php //echo number_format($prod->price) ?>
                          </span> -->
                          <?php
                          if($prod->discount !=0){
                            echo "<span class='before-discount'>Rp ".number_format($prod->price)."</span><br>";
                            $disc = $prod->price - (($prod->discount/100)*$prod->price);
                            echo "<span class='after-discount'>Rp ".number_format($disc)."</span>";
                          }else{
                            $disc = $prod->price - ($prod->price * $prod->discount);
                            echo "<span class='price'>Rp ".number_format($disc);
                          }
                         ?>

                          <?php
                          if($prod->discount !=0){?>
                          <img class="img-discount" src="<?= base_url() ?>/assets/icons/discount.png" alt="" style="">
                        <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
            </div>
        </div>
        <!-- END OF LIST PTODUCT 1-->


        <!-- BNANNER MIDDLE -->
        <div class="row" id="home-banner2" >
            <div class="col-desk-12 col-md-12 col-sm-12">
                <div class="banner1-right">
                    <a href="#"><img class="image" src="<?=API_IMG?>banner/<?= $bannercenter[0]->image_name ?>" alt=""></a>
                </div>
            </div>
        </div>
        <!-- END OF BANNER MIDDLE-->


        <!-- LIST OF PRODUCT 2-->
        <div class="row" id="home-product2" >
            <div class="col-desk-12 col-md-12 col-sm-12">
                <div class="list-product">
                  <?php foreach($product as $prod){ ?>
                  <div class="item" onclick="detail_product(<?= $prod->product_id?>)">
                    <div class="" style="">
                      <a href="#"> <img class="image" src="<?=API_IMG?>products/<?=$prod->image1 ?>" alt="">  </a>
                    </div>
                      <div class="atribut">
                        <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                        <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                        <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                        <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                        <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt=""><br>
                        <span class="product-name"><?= $prod->product_name ?></span><br>
                        <span class="price">Rp <?= number_format($prod->price) ?></span>
                        <img class="img-wish" src="<?=base_url() ?>assets/icons/heart-grey.png" alt="">
                        <img class="img-discount" src="<?= base_url() ?>/assets/icons/discount.png" alt="" style="">
                      </div>
                  </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- ENND OF PRODUCT 2-->


        <!-- BNANNER BOTTOM -->
        <div class="row" id="home-banner3" >
            <div class="col-desk-6">
                <div class="banner2-right-parent">
                    <a href="#"><img class="banner2-right" src="<?=base_url()?>assets/icons/banner6.png" alt=""></a>
                </div>
            </div>
            <div class="col-desk-6">
                <div class="banner3-right-parent">
                    <a href="#"><img class="banner3-right" src="<?=base_url()?>assets/icons/banner7.png" alt=""></a>
                </div>
            </div>
        </div>
          <!-- END OF BANNER BOTTOM-->


        <!-- LIST OF PRODUCT 3-->
        <div class="row" id="home-product3">
            <div class="col-desk-12 col-md-12 col-sm-12">
              <div class="list-product">
                <?php foreach($product as $prod){ ?>
                <div class="item" onclick="detail_product(<?= $prod->product_id?>)">
                  <div class="" style="">
                    <a href="#"> <img class="image" src="<?=API_IMG?>products/<?=$prod->image1 ?>" alt="">  </a>
                  </div>
                    <div class="atribut">
                      <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                      <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                      <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                      <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                      <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt=""><br>
                      <span class="product-name"><?= $prod->product_name ?></span><br>
                      <span class="price">Rp <?= number_format($prod->price) ?></span>
                      <img class="img-wish" src="<?=base_url() ?>assets/icons/heart-grey.png" alt="">
                      <img class="img-discount" src="<?= base_url() ?>/assets/icons/discount.png" alt="" style="">
                    </div>
                </div>
              <?php } ?>
              </div>
            </div>
        </div>
        <!-- END OF LIST PRODUCT 3-->


        <div class="row" id="view-product" >
            <div class="col-desk-12 col-md-12 col-sm-12">
                <div id="list-product" class="list-product">

                </div>
            </div>
        </div>

        <?php include("product-detail.php") ?>

  </div>






</div>



</div>
</div>

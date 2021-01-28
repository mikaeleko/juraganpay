    <div class="col-desk-9 col-sm-9">

        <div class="row" id="view-product" >
          <div class="col-desk-12 col-md-12 col-sm-12">
            <div id="list-product" class="list-product">
              <?php foreach ($product as $product) {?>
                <div class="item" onclick="detail_product(<?=$product->product_id ?>)">
                  <div class="" style="">
                    <a href="#"> <img class="image" src="<?=API_IMG?>products/<?=$product->image1 ?>" alt="">  </a>
                  </div>
                  <img class="img-wish" src="<?=base_url() ?>assets/icons/heart-grey.png" alt="">
                  <div class="atribut">
                    <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                    <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                    <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                    <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                    <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt=""><br>
                    <span class="product-name"><?= $product->product_name ?></span><br>
                    
                    <?php
                    if($product->discount !=0){
                      echo "<span class='before-discount'>Rp ".number_format($product->price)."</span><br>";
                      $disc = $product->price - (($product->discount/100)*$product->price);
                      echo "<span class='after-discount'>Rp ".number_format($disc)."</span>";
                    }else{
                      $disc = $product->price - ($product->price * $product->discount);
                      echo "<span class='price'>Rp ".number_format($disc);
                    }
                   ?>

                    <?php
                    if($product->discount !=0){?>
                    <img class="img-discount" src="<?= base_url() ?>/assets/icons/discount.png" alt="" style="">
                  <?php } ?>
                  </div>
               </div>
             <?php } ?>
            </div>
          </div>
        </div>

        <?php include("product-detail.php") ?>

    </div>


  </div>
</div>

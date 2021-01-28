<!-- <!DOCTYPE html> -->
<html>
  <head>
    <title><?= TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style2.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style3.css" type="text/css">

    <style media="screen">
    h3{
      color:#404040;
    }

    .box-banner{
      display: flex;
      -webkit-flex-wrap: wrap;
      flex-wrap: wrap;
      -webkit-align-content: center;
      align-content: center;
      height: auto;
    }

    .box-footer{
      display: flex;
      -webkit-flex-wrap: wrap;
      flex-wrap: wrap;
      -webkit-align-content: center;
      align-content: center;
      height: auto;
      padding:20px;
      margin:0 10px 0 10px;
    }



    @media only screen and (max-width: 600px) {
      .box-login2{
        padding: 10px;
        box-shadow: 1px 1px 1px 1px #ccc;
        width:300px;
        height:auto;
        margin: auto;
        border-radius : 15px;
        background-color : rgb(248, 248, 248);
      }
    }

    .deskripsi{
      font-size: 25px;color:#868686;text-align:center;
    }

    .h5{
      color:#00AFE9;font-size: 15px;text-align: center;
    }
    .ph5{
      font-size:15px;text-align: center; vertical-align:middle;
    }

    /* .box-logo-desc{
      display: flex;
      -webkit-flex-wrap: wrap;
      flex-wrap: wrap;
      -webkit-align-content: center;
      align-content: center;
      height: auto;
      margin:30px;
    } */
    .logo{
      width: 120px;height:120px;
      margin: 20px 10px 0 20px;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      border-radius:10px;
    }

    @media only screen and (max-width: 600px) {
      .logo{
        width: 80px;height:80px;
        margin: 10px;
      }
      .deskripsi{
        font-size: 18px;color:#868686;text-align:center;
        margin-left:10px;
        margin-right:10px;
      }
    }

    @media only screen and (max-width: 1200px) {
      .logo{
        width: 120px;height:120px;
        margin: 10px;
      }
      .deskripsi{
        font-size: 20px;color:#868686;text-align:center;
        margin-left:10px;
        margin-right:10px;
      }
    }

    .box-deskripsi{
      margin-bottom:30px;
    }

    .body-container{
      width: 95%;
      margin:auto;
    }
    </style>
  </head>
  <body>
    <div class="container smooth">
      <?php include('menu2.php') ?>
      <div class="body-container" >
        <!-- <div class="row">
          <div class="col-desk-12">
            <div class="bingkai">
              <ul>
                <li style="background:url(<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner1.png); background-size:cover;"><h3>Banner1</h3></li>
                <li style="background:url(<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner2.png); background-size:cover;"><h3>Banner2</h3></li>
                <li style="background:url(<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner3.png); background-size:cover;"><h3>Banner3</h3></li>
              </ul>
            </div>
          </div>
        </div> -->

        <!-- <div class="w3-content w3-section" style="max-width:500px">
          <img class="mySlides w3-animate-fading" src="<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner1.png); background-size:cover;width:100%" >
          <img class="mySlides w3-animate-fading" src="<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner2.png); background-size:cover;">
          <img class="mySlides w3-animate-fading" src="<?php //echo HOST_API_IMAGE; ?>get_img?file=banner/banner3.png); background-size:cover;">
        </div> -->
        <!-- <script>
          var myIndex = 0;
          carousel();

          function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 9000);
          }
          </script> -->

        <div class="row">
            <div class="col-desk-12">
                <div class="carousel" style="z-index:1">
                    <!-- <img class="image-carousel" style="display:block" src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/banner-dev.png" > -->
                    <img class="image-carousel" style="display:block" src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/banner1.png" >
                    <img class="image-carousel" src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/banner2.png" >
                    <img class="image-carousel" src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/banner3.png" >
					<img class="image-carousel" src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/banner4.png" >
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
						<div onclick="indexBanner(3)" class="point"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="text-align:center">
          <!-- logo here-->
          <div class="col-desk-3">
              <img class="logo" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/logo1.png">
          </div>
          <div class="col-desk-3">
            <img class="logo" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/logo2.png">
          </div>
          <div class="col-desk-3">
            <img class="logo" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/logo3.png">
          </div>
          <div class="col-desk-3">
            <p style="padding:0;margin:0 auto;display:block;vertical-align:middle;font-size:15px;font-weight:bold;margin:15px 0 0 0;text-align:center;">Powered By :</p>
            <img src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/default-user.png" style="width:90px;height:90px;margin:0 0 0 10px;box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);border-radius:50px;">
          </div>

        </div>
        <div class="row">
          <div class="col-desk-12">
            <p class="deskripsi"> <?= DESCRIPTION ?> </p>
          </div>
        </div>
        <div class="footer">
          <div style="width:60%;margin:auto">
            <div class="row">
              <div class="col-desk-4">
                <div>
                  <img width="70" height="50" style="display:block;margin:auto;text-align:center;vertical-align:middle;"src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/assetwebsite-01.png" alt="">
                  <h5 class="h5">PENDAFTARAN GRATIS & MUDAH</h5>
                </div>
                <p class="ph5">Demi kenyamanan anda kami siap memantau & mengevalusai transaksi anda full 24Jam</p>
              </div>
              <div class="col-desk-4">
                <div>
                  <img width="60" height="50" style="display:block;margin:auto;text-align:center;vertical-align:middle;"src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/assetwebsite-02.png" alt="">
                  <h5 class="h5">TRANSAKSI LANCAR & CS 24Jam</h5>
                </div>
                <p class="ph5">Demi kenyamanan anda kami siap memantau & mengevalusai transaksi anda full 24Jam</p>
              </div>
              <div class="col-desk-4">
                <div>
                  <img width="70" height="50" style="display:block;margin:auto;text-align:center;vertical-align:middle;" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconlogo/Group 187.png" alt="">
                  <h5 class="h5">DEPOSIT MULAI DARI 50000</h5>
                </div>
                <p class="ph5">Cukup dengan Rp.50000 saja anda sudah dapat bertransaksi dengan kami</p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </body>
</html>

<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>memberarea/assets/js/carousel.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>

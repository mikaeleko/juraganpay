<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>ST24</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/Chart.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/Chart.min.css">
        <script src="<?php echo base_url() ?>assets/js/Chart.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/Chart.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/js/Chart.bundle.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/Chart.bundle.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <style media="screen">

        .label-akun, .label-pass, .label-tiket{
          cursor:pointer;
          color:#404040;
        }
        .label-akun:hover, .label-pass:hover, .label-tiket:hover{
          cursor:pointer;
          color:#404040;
          text-shadow: 5px 10px 20px #888888;
        }
        input[type=submit] {

            color: rgba(255,255,255,1);
            font-family: Segoe UI;
            padding: 8px;
            margin: 8px 0 8px 20px;;
            display: inline-block;
            border: 1px solid  rgba(0,175,233,1);
            border-radius: 10px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #ccc;
            cursor:pointer;
            font-size:18px;
            height: 40px;
            width: 150px;
        }

        input[type=reset] {
            background-color: rgb(255, 204, 0);
            color: rgba(255,255,255,1);
            font-family: Segoe UI;
            padding: 8px;
            margin: 8px 0 8px 20px;
            display: inline-block;
            border: 1px solid  rgb(255, 204, 0);
            border-radius: 10px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #ccc;
            cursor:pointer;
            font-size:18px;
            height: 40px;
            width: 150px;
        }

        .input-text {
          font-family: Segoe UI;
          padding: 8px 16px;
          margin: 8px;
          display: inline-block;
          border: 1px solid rgb(255, 255, 255);
          border-radius: 40px;
          box-sizing: border-box;
          box-shadow: 1px 1px 1px 1px #ccc;
          outline: none;
          width: 270px;
        }

        .button-with-image .button-image {
            width: 30px;
            height: 30px;
            position: absolute;
            left: 7;
            bottom: 5;
            top: 5;
        }
        .button-image {
            box-shadow: 3px 3px 3px #ccc;
            border-radius: 5px;
            border: none;
            background-color: rgba(248,248,248,1);
            font-family: Segoe UI;
            font-weight: bold;
            outline: none;
            color: white;
            width: 80px;
            height: 80px;
            position: relative;
            padding-left: 50px;
            padding-right: 20px;
            font-size: 15px;
            margin: 10px;
            cursor: pointer;
        }
        .label-form{
          font-size: 15px;
          width   : 200px;
          height: auto;
          padding: 5px;
          display: inline-block;
          font-weight: bold;
        }
        .label-menu{
          color :#808080;
          font-family: Segoe UI;
          cursor:pointer;
        }
        .input-form{
          font-family: Segoe UI;
          padding:0;
          display: inline-block;
          outline: none;

        }
        .box-form{
          box-shadow: 5px 10px 18px #888888;
          border-radius:10px;
          padding:0px;
          height:auto;
          margin: 20px;
          display:table;
          width: 520px;
        }
        form{
          padding:10px;
        }



        /* .msg-sukses{
          color: green;
          font-size:15px;
          text-align: left;
        } */
        </style>
    </head>
    <body>
        <div class="container smooth">

            <div class="header">
                <div class="row">
                    <div class="col-desk-2">
                        <div style="padding: 10px;">
                            <img width="50px" class="logo" height="50px" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png">
                            <img id="left-menu" onclick="openMenu()" src="<?php echo base_url() ?>/images/asset/menu-blue.png" class="nav-menu">
                            <img width="70%" style="cursor:pointer" onclick="home()" class="logo-st24" height="auto" src="<?php echo base_url() ?>/images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7">
                        <div style="padding: 10px;">
                            <div class="box-header"><span class="box-hrader-title">AKUN</span></div>
                        </div>
                    </div>
                    <div class="col-desk-3">
                        <div style="widht:100%;margin-right:20px;">
                            <div class="row">
                                <div class="col-desk-6">
                                    <div style="float:left; margin-top: 13px;">
                                        <span id="info-news-group">
                                        </span>
                                        <span id="info-notif-group">
                                        </span>

                                    </div>
                                </div>
                                <div class="col-desk-6">
                                    <div class="row">
                                        <div class="col-desk-9">
                                            <?php $this->load->view('profile'); ?>
                                        </div>

                                        <div class="col-desk-3">
                                            <div style="margin-top: 13px;">
                                                <a style="" href="#"> <img width="45px" height="45px" style="border-radius:50%" src="<?php echo base_url() ?>images/asset/assetwebsite-23.png"> </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-container">
                <div class="row">
                    <div class="col-desk-2">
                        <?php $this->load->view('navigation_left') ?>
                    </div>

                    <div class="col-desk-10" id="right-container-id">
                        <div class="body-right-container">
                            <div class="box-primary" style="padding-bottom:0">
                                <div class="row">
                                  <!--FORM REGISTER JABBER -->
                                  <div class="col-desk-6 jabber" >
                                      <div class="box-form">
                                        <span style="font-size:10px"><?= json_encode($_SESSION);?></span>
                                          <form class="form" method="POST" action="<?=base_url()?>jabber/prosesKapca">
                                            <image id="captcha" src="http://localhost/memberarea/securimage/securimage_show.php">
                                            <input id="capcode" type="text" name="captcha_code" size="15" placeholder=""/>
                                              <a href="#" onclick="refreshCaptcha()">
                                              <!-- <a href="#" onclick="window.location.reload();"> -->
                                              <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                                            </a>
                                            <hr>
                                            <input id="submit" class="right" type="submit" value="Submit">

                                          </form>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="row">
                    <div class="col-desk-12">
                        <div style="padding:20px; float:right">
                            site design / logo © 2019 PT Cipta Solusi Aplikasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/inbox.js"></script>
        <script src="<?php echo base_url() ?>assets/js/news.js"></script>

        <script>

        function refreshCaptcha(){
          document.getElementById('captcha').src = '<?=base_url()?>securimage/securimage_show.php?' + Math.random();
          return false
        }

        function getSessionImageSecure(){
          $.ajax({
              type: "GET",
              url:  "<?php echo base_url(); ?>" + "securimage/api.php",
              contentType: "application/json;",
              cache: false,
              success: function(result){
                  console.log(result);
              },
              error: function (request, status, error) {
                  //   console.log(request.responseText);
              }
          });
        }

        getSessionImageSecure();
        </script>
    </body>
</html>

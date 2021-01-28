<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>ST24</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">

        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <style media="screen">

        .label-akun, .label-pass, .label-tiket, .label-struk{
          cursor:pointer;
          color:#404040;
          border:1px solid #FFF;
          text-align:center;
          padding:10px;
          margin-right:5px;
          box-shadow:5px 10px 20px #888888;
          border-radius:10px;
        }
        .label-akun:hover, .label-pass:hover, .label-tiket:hover, .label-struk:hover{
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
          width: 240px;
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
        .label-form-topup{
          font-size: 15px;
          width   : 200px;
          height: auto;
          padding: 5px;
          display: inline-block;
          font-weight: bold;
          cursor:pointer;
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

        .box-radio{
          border-top:1px solid #000;
          border-left:1px solid #000;
          border-right:1px solid #000;
          padding:5px;
          height:auto;
          margin-left: 2px;
          display:table;
          width: 520px;
          font-size:14px;
          background-color:#fff;
        }

        .box-radio-bottom{
          border:1px solid #000;
          padding:5px;
          height:auto;
          margin-left: 2px;
          display:table;
          width: 520px;
          font-size:14px;
          background-color:#fff;
        }
        .box-bordered{
          border:1px solid #000;
          padding:5px;
          height:auto;
          margin-left: 2px;
          display:table;
          width: 520px;
          font-size:14px;
          background-color:#fff;
        }
        .radio-topup{
          width:18px;height:18px;
          display:inline-block;
          background-color:#fff;
          color:#fff;
          margin-left: 2px;
          margin-right:10px;

          float:left;
          font-size:14px;
          background-color:#fff;
          cursor:pointer;
          border:1px solid #000;
          border-radius:80px;
        }

        .sub-radio-topup{
          width:12px;height:12px;
          display:block;
          vertical-align:middle;
          margin:2px;;
          background-color:rgb(0, 175, 233);
          color:rgb(0, 175, 233);

          text-align:center;
          float:left;
          font-size:14px;

          cursor:pointer;
          border:1px solid #000;
          border-radius:80px;
        }

        .radio-ewallet{
          width:18px;height:18px;
          display:inline-block;
          background-color:#fff;
          color:#fff;
          margin-left: 2px;
          margin-right:10px;

          float:left;
          font-size:14px;
          background-color:#fff;
          cursor:pointer;
          border:1px solid #000;
          border-radius:80px;
        }




        .box-struk{
          /* box-shadow: 5px 10px 18px #888888; */
          border-radius:10px;
          padding:0px;
          height:auto;
          margin: 20px;
          display:table;
          width: 1040px;
        }

        .struk{
          /* box-shadow: 5px 10px 18px #888888; */
          border-radius:10px;
          padding:0px;
          height:auto;
          margin: 10px;
          display:table;

        }

        .div-form-struk{
          padding:20px;
          height:auto;
          margin: 20px 60px 20px 60px;
          display:block;
          width: 600px;
          background-color: #fff;
          font-size:10px !IMPORTANT;
        }

        .div-struk{
          padding:20px;
          height:auto;
          margin: 20px 20px 20px 200px;
          display:block;
          width: 300px;
          background-color: #fff;
          font-size:10px !IMPORTANT;
        }


        form{
          padding:10px;
        }
        .icon-bank, .icon-cvs{
          width: 100px;
          height: 30px;
          margin: 5px 5px 5px 12px;
          background-color: #fff;
          border-radius:5px;
        }
        .icon-bank:hover, .icon-cvs:hover{
          cursor:pointer;
          width: 100px;
          height: 30px;
          margin: 30px 5px 5px 12px;
          box-shadow: 5px 10px 18px #8888E3;
          border-radius:5px;
          margin: 5px 5px 5px 12px;
        }

        .icon-ewallet{
          width: 50px;
          height: 45px;
          margin: 5px 5px 5px 12px;
          background-color: #fff;
          border-radius:5px;
        }
        .icon-ewallet:hover{
          cursor:pointer;
          width: 50px;
          height: 45px;
          margin: 30px 5px 5px 12px;
          box-shadow: 5px 10px 18px #8888E3;
          border-radius:5px;
          margin: 5px 5px 5px 12px;
        }

        .propinsi, .kota, .kecamatan, .kelurahan{
          font-family: Segoe UI;
          padding: 8px 16px;
          margin: 8px;
          display: inline-block;
          border: 1px solid rgb(255, 255, 255);
          border-radius: 40px;
          box-sizing: border-box;
          box-shadow: 1px 1px 1px 1px #ccc;
          outline: none;
          width:240px;
        }

        /* .msg-sukses{
          color: green;
          font-size:15px;
          text-align: left;
        } */
        .container-tiket-modal .title-message{
          font-size:18px;
        }
        .container-tiket-modal .caption{
          font-size:18px;
        }
        .container-tiket-modal .text-value{
          margin-left:10px;
          font-family:monospace;
          font-size:21px;
        }
        .container-tiket-modal .image-bank{
          width:70px;
        }
        .full-width{
          width:100%;
        }
        .{
          text-align:center;
        }
        </style>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
    </head>
    <body>
        <div class="container">

              <div class="header">
                <div class="row">
                    <div class="col-desk-2 col-md-1">
                        <div class="header-left">
                            <img class="logo" width="50px" height="50px" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png">
                            <img class="nav-menu" id="left-menu" onclick="openMenu()" src="<?php echo base_url() ?>/images/asset/menu-blue.png">
                            <img class="logo-st24" onclick="home()" src="<?php echo base_url() ?>/images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7 col-md-4">
                        <div class="header-center">
                            <div class="box-header"><span class="box-header-title">TOPUP</span></div>
                        </div>
                    </div>
                    <div class="col-desk-3 col-md-6">
                        <div class="header-right">
                            <div class="notif-group">
                                <span id="info-news-group">
                                </span>
                                <span id="info-notif-group">
                                </span>
                            </div>
                            <a style="" href="#"> <img class="profile-logo" src="<?php echo base_url() ?>images/asset/assetwebsite-23.png"> </a>
                            <?php $this->load->view('profile'); ?>


                            <!-- <div class="row"> -->
                                <!-- <a id="info-inbox" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?php echo base_url() ?>/images/asset/assetwebsite-15.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">3</span> </a> -->
                                <!-- <a id="info-notif" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?php echo base_url() ?>/images/asset/assetwebsite-14.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">1</span></a> -->
                                <!-- <div class="box-primary box-msg-news" id="box-info-news">
                                    <a href="#"><span style="color:#707070">Transaksi Gagal</span></a> <hr>
                                    <a href="#"><span style="color:#707070">Server Down</span></a><hr>
                                    <a href="#"><span style="color:#707070">Member Baru</span></a>
                                    <a href="#"><span style="color:#707070">Transaksi Gagal</span></a> <hr>
                                    <a href="#"><span style="color:#707070">Server Down</span></a><hr>
                                    <a href="#"><span style="color:#707070">Member Baru</span></a>
                                </div>
                                <div class="box-primary box-msg-inbox" id="box-info-inbox">
                                    <a href="#"><span style="color:#707070">Transaksi Gagal</span></a> <hr>
                                    <a href="#"><span style="color:#707070">Server Down</span></a><hr>
                                    <a href="#"><span style="color:#707070">Member Baru</span></a>
                                </div>
                                <div class="box-primary box-msg-notif" id="box-info-notif">
                                    <a href="#"><span style="color:#707070">Transaksi Gagal</span></a> <hr>
                                </div> -->
                                <!-- <div class="col-desk-6"> -->

                                    <!-- <div style="float:right;margin-right:25">
                                        <div style="float:left;margin-top: 13px;margin-right:25">

                                        </div>
                                        <div style="margin-top: 13px;margin-right:25">

                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-container">
                <div id="modal-tiket" class="modal">
                <button style="position:absolute;right:10px;top:10px" class="button"><img width="30px" onclick="closeModalTiket()" src="<?=base_url()?>images/asset/close.svg" alt=""></button>
                  <div class="modal-body">
                    <div class="modal-title">
                        <p>Tiket Deposit</p>
                    </div>
                    <div style="padding:10px;text-align:left" align="center">
                        <div class="container-tiket-modal">
                          <span class="title-message label" id="title-message">-</span>
                          <br><br>
                          <span class="caption">Sejumlah :</span><br>
                          <span class="text-value" id="jumlah-transfer">-</span><br>
                          <hr>
                          <span class="caption">Ke No Rekening :</span><br>
                          <span class="text-value" id="no-rekening">-</span><br>
                          <hr>
                          <span class="caption">Detail Bank :</span><br>
                          <img class="image-bank" id="image-bank" src="" alt=""><span class="text-value" id="detail-bank">-</span>
                          <hr>
                          <div class="alert alert-info">
                            <span class="text-alert">
                            * Waktu kadaluarsa tiket deposit ini adalah 59 menit sejak request/permintaan tiket deposit
                            </span>
                          </div>
                        </div>
                    </div>

                    <div>
                        <input type="submit" id="btn-tutup" value="Tutup" onclick="closeModalTiket()">
                    </div>
                  </div>
                </div>

                <div id="modal-tiket2" class="modal">
                <button style="position:absolute;right:10px;top:10px" class="button"><img width="30px" onclick="closeModalTiket()" src="<?=base_url()?>images/asset/close.svg" alt=""></button>
                  <div class="modal-body">
                    <div class="modal-title">
                        <p>Top Up</p>
                    </div>
                    <div style="padding:10px;text-align:left" align="center">
                        <div class="container-tiket-modal">
                          <div id="textva" class="caption" style="text-align:center;font-size:16px;"></div>
                          <div id="textcvs" class="caption" style="text-align:center;font-size:16px;">Anda Melakukan Top Up Saldo sejumlah<br><span id="jumlah-transfer2" class="jumlah-transfer2" style="font-size:20px;font-weight:bold;"></span><br><span>silahkan melakukan pembayaran di:</span></div>
                          <div id="textewallet" class="caption" style="text-align:center;font-size:16px;">Anda Melakukan Top Up Saldo sejumlah<br><span id="jumlah-transfer2" class="jumlah-transfer2" style="font-size:20px;font-weight:bold;"></span><br><span>Silakan cek aplikasi OVO anda</span></div><br>

                          <img class="image-bank" id="image-bank2" src="" alt="" style="width:20%;text-align:center;display:block;vertical-align:middle;margin:0 auto;"><span class="text-value" id="detail-bank2"></span>
                          <div id="textpayment" class="caption" style="text-align:center;font-size:16px;">dengan Kode Pembayaran:</div>
                          <div class="text-value" id="va-number" style="text-align:center;font-size:40px;"> </div><br>


                          <hr>
                          <!-- <div class="alert alert-info">
                            <span class="text-alert">
                            * Waktu kadaluarsa tiket deposit ini adalah 59 menit sejak request/permintaan tiket deposit
                            </span>
                          </div> -->
                        </div>
                    </div>
                    <div>
                        <input type="submit" id="btn-tutup2" value="Tutup" onclick="closeModalTiket()">
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-desk-2">
                        <?php $this->load->view('navigation_left') ?>
                    </div>
                    <div class="col-desk-5 col-md-5 col-sm-5 " id="right-container-id">
                        <div class="body-right-container smooth">
                            <div class="box-primary" style="padding-bottom:0">
                                <div class="row">
                                  <!--FRAME TOP -->
                                  <div class="col-desk-12">
                                          <div id="loading-tiket" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                          <form class="form" autocomplete="off" >
                                            <div id='tiket_err_msg' style='display: none; '>
                                              <div id='content_result'>
                                                <div id='tiket_err_show' class="w3-text-red">
                                                  <div id='info_msg' style="border:1px; width:auto; height:auto; padding:2px; color:#000; font-size:15px;text-align:left;display:table;"> </div>
                                                  <div id='tiket_msg' style="border:1px; width:auto; height:auto; padding:2px; color:red; font-size:15px;text-align:left;display:table;"> </div>
                                                  <!-- <img id="img_err" src="<?php //echo base_url()?>assets/img/warning.png" style="width:30px; height:30px;"> -->
                                                </div>
                                              </div>
                                            </div>
                                            <div class="text-title" style="font-weight:bold;font-size:20px;">Top Up</div>
                                            <hr>
                                            <!-- <div class="label-form">
                                              <label>Nominal</label>
                                            </div>
                                            <div class="input-form">
                                              <input disabled id="nominal" type="text" class="form-input-topup" name="nominal" onclick="myNominal()" onkeyup="angka(this);">
                                              <input id="type" type="hidden" name="" value="">
                                            </div>
                                            <hr>
                                            -->
                                            <div class="text-title" style="font-weight:bold;font-size:16px;">Metode Pembayaran </div>
                                            <div class="box-radio">
                                              <div id="label-form-tiket" class="label-form-topup">
                                                <div id ="radio-tiket" class="radio-topup"><div id="sub1" class="sub"></div></div> Tiket Deposit
                                              </div>
                                            </div>
                                            <div id="bank" style="padding:10px;display:none;" >
                                              <img id="BCA" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-01.png" alt="">
                                              <img id="BRI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-02.png" alt="">
                                              <img id="BNI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-03.png" alt="">
                                              <img id="MANDIRI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-04.png" alt="">
                                              <input id="code" type="hidden" name="" value="">
                                            </div>
                                            <div class="box-radio">
                                              <div id="label-form-virtual" class="label-form-topup">
                                                <div id ="radio-virtual" class="radio-topup" ><div id="sub2" class="sub"></div></div>Virtual Account
                                              </div>
                                            </div>
                                            <div id="virtual-account" style="padding:10px;display:none;" >
                                              <label style="font-size:16px;">Pilih Penyedia Virtual Account</label> <br>
                                              <select id="VA" class="virtual-account" name="virtual-account" style="width:400px;height:30px;padding:5px;">
                                                <option value="">Pilih Bank</option>
                                                <option  value="BDIN">Bank Danamon</option>
                                                <option  value="BRIN">BRI</option>
                                                <option  value="CENA">BCA</option>
                                                <option  value="BNIN">BNI</option>
                                                <option  value="BNIA">CIMB Niaga</option>
                                                <option  value="HNBN">KEB Hana Indonesia</option>
                                                <option  value="BMRI">Mandiri</option>
                                                <option  value="BBBA">Bank Permata</option>
                                                <option  value="IBBK">Bank International Indonesia Maybank</option>
                                              </select>
                                            </div>
                                            <div class="box-radio">
                                              <div class="label-form-topup">
                                                <div id ="radio-convenience" class="radio-topup"><div id="sub3" class="sub"></div></div>Convenience Store
                                              </div>
                                            </div>
                                            <div id="convenience" style="padding:10px;display:none;" >
                                              <!-- <img id="INDO" class="icon-cvs" src="<?=base_url()?>assets/img/indomaret.png" alt=""> -->
                                              <img id="ALMA" class="icon-cvs" src="<?=base_url()?>assets/img/alfamart.png" alt="">

                                            </div>
                                            <div class="box-radio-bottom">
                                              <div class="label-form-topup">
                                                <div id ="radio-ewallet" class="radio-topup"><div id="sub4" class="sub"></div></div>E-Wallet
                                              </div>
                                            </div>
                                            <div id="ewallet" style="padding:10px;display:none;" >

                                              <div class="label-form-topup">
                                                <!-- <div id ="radio-ovo" class="radio-ewallet"><div id="sub-ovo" class="sub"></div></div> -->
                                                <img id="radio-ovo" class="icon-ewallet" src="<?=base_url()?>assets/img/ovo.jpg" alt="">

                                              </div><br>
                                              <!-- <div class="label-form-topup"> -->
                                                <!-- <div id ="radio-linkaja" class="radio-ewallet"><div id="sub-linkaja" class="sub"></div></div> -->
                                                <!-- <img id="radio-linkaja" class="icon-ewallet" src="<?php //echo base_url()?>assets/img/icon_link.png" alt=""> -->
                                              <!-- </div> -->
                                              <input id="walet" type="hidden" name="" value="">
                                              <input type="hidden" name="pm" value="" id="pm">
                                              <div class="input-form">
                                                <input id="nohp" placeholder="No. Handphone" type="text" class="form-input-topup" name="nohp" onkeyup="angka2(this);">
                                              </div>
                                            </div>

                                            <div id="div-label-nominal" class="label-form visibleno" style="margin-top:10px;margin-left:12px;">
                                              <label>Nominal</label>
                                            </div><br>
                                            <div id="div-nominal" class="input-form visibleno" style="margin-left:12px;">
                                              <input disabled id="nominal" type="text" class="form-input-topup" name="nominal" onclick="myNominal()" onkeyup="angka(this);">
                                              <input id="type" type="hidden" name="" value="">
                                            </div>

                                            <div id="boxemail" style="font-size:12px; font-weight:bold;padding:10px;margin-top:20px;display:none;color:blue;">
                                              Saat ini email anda belum terdaftar, untuk melanjutkan silahkan lengkapi email anda atau <a href='<?php echo base_url() ?>akun?x=warning' style='text-decoration:underline;color:red;font-weight:bold;'> klik link ini!</a><br>
                                              <form>
                                                <div id='err-email'style="color:red;font-style:italic;"></div>
                                                <input type='text' id='email' name='email' class='form-input-topup' placeholder='masukan email anda' style='float:left;'>
                                                <button class='button-primary-topup' id='submit-mail' style='border-radius:0px;;height:36px;width:70px;font-size:14px;text-align:center;margin-bottom:20px;background-color: rgba(0,175,233,1);'>Submit</button>
                                              </form>

                                              <div id="divmail" style="margin-left:12px;font-size:14px;font-weight:bold;margin-bottom:60px;">  </div>
                                            </div>



                                            <div id="div-alert" style="display:none;">
                                              <!-- <img id="img_err" src="<?php //echo base_url()?>assets/img/warning.png" style="width:20px; height:20px;"> -->
                                              <div id="alert" style="color:blue;font-size:12px;text-align:left;margin:20px;border:1px solid blue;padding:5px;text-align:center;border-radius:5px;"> </div>
                                            </div>

                                          </form>

                                          <div id='tiket_sukses_msg' style='display: none; padding: 10;'>
                                            <div id='content_result'>
                                              <div id='tiket_sukses_show' class="w3-text-red">
                                                <div id='tiket_sukses' style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;"> </div>
                                                <div id="ikon" style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;">
                                                  <img src="<?=base_url()?>assets/img/save.jpg" style="width:40px; height:40px;">
                                                </div>
                                                <button class="button-payment" onclick="openModalTIket()" id="view-tiket">Lihat Tiket</button>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-desk-5 col-md-5 col-sm-5">
                      <div class="body-right-container smooth">
                          <div class="box-primary" style="padding-bottom:0">
                            <div clas="row">
                              <!--Ringkasan TopUp -->
                              <div class="col-desk-12 col-md-12 col-sm-12">
                                <div class="text-title" style="font-weight:bold;font-size:20px;">Ringkasan Top Up </div>
                                <hr>
                                <table width="100%">
                                  <tr>
                                    <td width="38%"><div class="text-title" style="color:rgba(112,112,112,1);font-weight:bold;font-size:20px;margin:5px;">Metode Pembayaran</div></td>
                                    <td width="2%">: </td>
                                    <td width="60%"><span id="metode" class="text-title" style="color:rgba(112,112,112,1);font-weight:bold;font-size:20px;margin:5px;"></span> <img class="image-bank visibleno" id="metode-pembayaran" src="" alt="" style="width:20%;"></td>
                                  </tr>
                                  <tr>
                                    <td><div class="text-title" style="color:rgba(112,112,112,1);font-weight:bold;font-size:20px;margin:5px;">Total Top Up</div></td>
                                    <td>: </td>
                                    <td><span id="total-topup" style="color:rgba(112,112,112,1);font-weight:bold;font-size:30px;margin:5px;"></span></td>
                                  </tr>
                                  <!-- <tr>
                                    <td><div class="text-title" style="color:rgba(112,112,112,1);font-weight:bold;font-size:20px;margin:5px;">Biaya Layanan</div></td>
                                    <td>: </td>
                                    <td><span style="color:rgba(112,112,112,1);font-weight:bold;font-size:20px;margin:5px;">Rp. 0</span></td>
                                  </tr> -->
                                </table>
                                <hr>
                                <button id="topup" class="button-primary-topup">Kirim</button>
                              </div>


                            </div>

                            <div class="row">
                              <div class="col-desk-12 col-md-12 col-sm-12">

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
        <script src="<?php echo base_url() ?>assets/js/modal.js"></script>
        <script src="<?php echo base_url() ?>assets/js/sha256.js"></script>
        <script>
        var fileUploadPathImgTemp = '';
        function initial(){
          var urlTmp = document.URL;
          //$("#modal-tiket").show();
          if(urlTmp.includes('viewtiket')){
            $(".pass").hide();
            $(".akun").hide();
            $(".tiket").fadeIn("slow");
            $("#div-alert").hide();
            document.getElementById("nominal").value = "";
            // document.getElementById("pin").value = "";
            $("#err_msg").hide();
            $("#sukses_msg").hide();
          }else{
            $(".pass").hide();
            $(".tiket").hide();
            $(".akun").fadeIn("slow");
            $("#err_msg").hide();
            $("#sukses_msg").hide();
          }
        }
        initial();

        function tiketMessageParser(messageParam){
          var message = messageParam;
          var titleMessage = "";
          var splitRp = "";
          var splitNoRekening = "";
          var atasnama = "";

          try{
            titleMessage = message.split('.')[0];
              splitRp = message.split('Rp. ')[1].split(' , ')[0];
              splitNoRekening = message.split(" NO ")[1].split(" A/N ")[0];
              var splitDetailBank = '';
              try{
                  splitDetailBank = message.split(" KE REK ")[1].split(" NO ")[0];
              }catch(err){
                  splitDetailBank = message.split(" KE REC ")[1].split(" NO ")[0];
              }
              if(message.indexOf('*') >= 0 ){
                  atasnama = message.split(" A/N ")[1].split(" * ")[0];
              }else{
                  atasnama = message.split(" A/N ")[1];
              }
          }catch(err){
              console.log(err.toString());
              alert("Terjadi kesalahan saat menampilkan data.");
          }

          $('#jumlah-transfer').html(splitRp);
          $('#no-rekening').html(splitNoRekening);
          $('#detail-bank').html(splitDetailBank+" A/N "+atasnama);
          $('#title-message').html(titleMessage + ", silahkan melakukan deposit");
          var srcText = "";
          switch(splitDetailBank){
            case 'BCA':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-01.png';
            break;
            case 'BRI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-02.png';
            break;
            case 'BNI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-03.png';
            break;
            case 'MANDIRI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-04.png';
            break;
          }
          $('#image-bank').attr('src', srcText);

        }


        function tiketMessageParser2(messageParam){
          var message = messageParam;
          var titleMessage = "";
          var splitRp = "";
          var splitNoRekening = "";
          var atasnama = "";


          $('#va-number').html(splitRp);
          $('#detail-bank2').html(splitDetailBank+" A/N "+atasnama);
          $('#title-message2').html(titleMessage);
          var srcText = "";
          switch(splitDetailBank){
            case 'BCA':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-01.png';
            break;
            case 'BRI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-02.png';
            break;
            case 'BNI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-03.png';
            break;
            case 'MANDIRI':
              srcText = '<?=base_url()?>'+'assets/img/bankwithborder-04.png';
            break;
          }
          $('#image-bank').attr('src', srcText);

        }


        function closeModalTiket(){
          $('#modal-tiket').hide();
          $('#modal-tiket2').hide();
          document.getElementById("nohp").value = "";
          document.getElementById("nominal").value = "";
          document.getElementById("total-topup").value = "";
          $("#sub1").removeClass("sub-radio-topup");
          $("#sub2").removeClass("sub-radio-topup");
          $("#sub3").removeClass("sub-radio-topup");
          $("#sub4").removeClass("sub-radio-topup");
          $("#tiket_sukses_show").hide();
          $('#metode-pembayaran').hide();
          $('#nohp').hide();
          $('#nominal').hide();
          $('#total-topup').hide();
          $('#radio-ovo').hide();
          $('#alma').hide();
          $('#div-label-nominal').hide();
        }

        function openModalTIket() {
          $('#modal-tiket').show();
        }
        function openModalTopup() {
          $('#modal-topup').show();
        }
        var modal = document.getElementById("modal");

        function myNominal(){
          $("#div-alert").fadeIn();
          $("#img_err").show();
          $("#alert").html("Khusus Tiket Deposit, nilai request Deposit harus kelipatan Rp 10.000!");
        }

        //var rupiah = document.getElementById('nominal');
    		//rupiah.addEventListener('keyup', function(e){
    			// tambahkan 'Rp.' pada saat form di ketik
    			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    			//rupiah.value = formatRupiah(this.value, 'Rp. ');
    		//});


        function angka(e) {

          if (!/^[0-9]+$/.test(e.value)) {
            e.value = e.value.substring(0,e.value.length-1);
          } else {

            var bilangan = e.value;
            var	number_string = bilangan.toString(),
              	sisa 	  = number_string.length % 3,
              	rupiah 	= number_string.substr(0, sisa),
              	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
            	separator = sisa ? '.' : '';
            	rupiah += separator + ribuan.join('.');
            }

            // Cetak hasil
            //document.write(rupiah); // Hasil: 23.456.789
            //$("#nominal").html(rupiah);
            //e.value = rupiah;
            $("#total-topup").html("Rp "+ rupiah);

          }
        }



        function angka2(e, prefix) {
          if (!/^[0-9]+$/.test(e.value)) {
            e.value = e.value.substring(0,e.value.length-1);
          }
        }

        $(document).ready(function(){
          var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
          var akun  = document.getElementById("akun");
          var tiket = document.getElementById("tiket");


          $("#radio-tiket").click(function(){
            $("#boxemail").hide();
            $("#div-alert").hide();
            $("#div-label-nominal").removeClass("visibleyes");
            $("#div-label-nominal").addClass("visibleno");
            $("#div-nominal").removeClass("visibleyes");
            $("#div-nominal").addClass("visibleno");
            $("#metode-pembayaran").removeClass("visibleyes");
            $("#metode-pembayaran").addClass("visibleno");
            $("#tiket_sukses_msg").hide();
            $('#type').val("DEPOSIT");
            $("#tiket_err_msg").hide();
            $("#tiket_err_msg").html("");
            document.getElementById("nohp").value = "";
            //$(".box-radio").css("border-bottom","1px solid #000");
            document.getElementById("nominal").disabled = true;
            $(".box-radio").css("border-bottom","1px solid #000");
            //$(".box-radio").css("border-top-color","#fff");
            $("#ewallet").hide();
            $("#convenience").hide();
            $("#virtual-account").hide();
            $("#sub2").removeClass("sub-radio-topup");
            $("#sub3").removeClass("sub-radio-topup");
            $("#sub4").removeClass("sub-radio-topup");
            $("#sub-ovo").removeClass("sub-radio-topup");
            $("#sub-linkaja").removeClass("sub-radio-topup");
            $("#bank").fadeToggle();
            $("#sub1").addClass("sub-radio-topup");
          });

          $("#radio-virtual").click(function(){
            $("#boxemail").hide();
            document.getElementById("nohp").value = "";
            $("#div-alert").hide();
            $("#div-label-nominal").removeClass("visibleyes");
            $("#div-label-nominal").addClass("visibleno");
            $("#div-nominal").removeClass("visibleyes");
            $("#div-nominal").addClass("visibleno");
            $("#metode-pembayaran").removeClass("visibleyes");
            $("#metode-pembayaran").addClass("visibleno");
            $("#metode").addClass("visibleno");
            $("#nominal").focus();
            $("#tiket_sukses_msg").hide();
            $('#type').val("VA");
            $('#pm').val("02");
            $("#tiket_err_msg").hide();
            $("#tiket_err_msg").html("");
            $(this).addClass("border-bottom");
            $("#sub1").removeClass("sub-radio-topup");
            $("#sub3").removeClass("sub-radio-topup");
            $("#sub4").removeClass("sub-radio-topup");
            $("#sub2").addClass("sub-radio-topup");
            $("#sub-ovo").removeClass("sub-radio-topup");
            $("#sub-linkaja").removeClass("sub-radio-topup");
            $("#alert").html("");
            $("#total-topup").html("");
            $("#bank").hide();
            $("#ewallet").hide();
            $("#convenience").hide();
            $("#sub").addClass("sub-radio-topup");
            $("#virtual-account").fadeToggle();
          });

          $("#radio-convenience").click(function(){
            $("#div-label-nominal").hide();
            $("#nominal").hide();
            $("#boxemail").hide();
            document.getElementById("nohp").value = "";
            $("#div-alert").hide();
            document.getElementById("nominal").value="";
            document.getElementById("nominal").disabled=true;
            $("#tiket_sukses_msg").hide();
            $('#type').val("CVS");
            $('#pm').val("03");
            $("#tiket_err_msg").hide();
            $("#tiket_err_msg").html("");
            $(this).addClass("border-bottom");
            $("#sub1").removeClass("sub-radio-topup");
            $("#sub2").removeClass("sub-radio-topup");
            $("#sub4").removeClass("sub-radio-topup");
            $("#sub-ovo").removeClass("sub-radio-topup");
            $("#sub-linkaja").removeClass("sub-radio-topup");
            $("#metode-pembayaran").removeClass("visibleyes");
            $("#metode-pembayaran").addClass("visibleno");
            $("#metode").addClass("visibleno");
            $("#total-topup").html("");
            $("#alert").html("");
            $("#bank").hide();
            $("#virtual-account").hide();
            $("#ewallet").hide();
            $("#convenience").fadeToggle();
            $("#sub3").addClass("sub-radio-topup");
          });

          $("#radio-ewallet").click(function(){
            $("#radio-ovo").fadeIn();
            $("#nohp").hide();
            $("#boxemail").hide();
            document.getElementById("nohp").value = "";
            $("#div-alert").hide();
            $("#div-label-nominal").removeClass("visibleyes");
            $("#div-label-nominal").addClass("visibleno");
            $("#div-nominal").removeClass("visibleyes");
            $("#div-nominal").addClass("visibleno");
            $("#metode-pembayaran").removeClass("visibleyes");
            $("#metode-pembayaran").addClass("visibleno");
            $("#metode").addClass("visibleno");
            document.getElementById("nohp").disabled = true;
            document.getElementById("nominal").disabled = false;
            document.getElementById("nominal").value="";
            $("#nominal").focus();
            $("#tiket_sukses_msg").hide();
            $('#type').val("EWALLET");
            $('#pm').val("05");
            $("#tiket_err_msg").hide();
            $("#tiket_err_msg").html("");
            $(this).addClass("border-bottom");
            $("#sub1").removeClass("sub-radio-topup");
            $("#sub2").removeClass("sub-radio-topup");
            $("#sub3").removeClass("sub-radio-topup");
            $("#sub-ovo").removeClass("sub-radio-topup");
            $("#sub-linkaja").removeClass("sub-radio-topup");
            $("#alert").html("");
            $("#total-topup").html("");
            $("#bank").hide();
            $("#convenience").hide();
            $("#virtual-account").hide();
            $("#ewallet").fadeToggle();
            $("#sub4").addClass("sub-radio-topup");
            $("#nominal").show();
          });

          $("#radio-ovo, #sub-ovo").click(function(){
            $("#nohp").fadeIn();
            $("#nohp").focus();
            $("#div-alert").hide();
            $("#metode").removeClass("visibleno");
            $("#metode").addClass("visibleyes");
            // $("#metode").html("Payment Via ");
            $('#metode-pembayaran').removeClass("visibleno");
            $('#metode-pembayaran').addClass("visibleyes");
            document.getElementById("total-topup").innerHTML = "";
            $("#total-topup").show();

            var srcText = "";
            srcText = '<?=base_url()?>'+'assets/img/ovo.jpg';
            $('#metode-pembayaran').attr('src', srcText);

            document.getElementById("nohp").disabled = false;

            $("#div-label-nominal").removeClass("visibleno");
            $("#div-label-nominal").addClass("visibleyes");
            $("#div-nominal").removeClass("visibleno");
            $("#div-nominal").addClass("visibleyes");
            $("#nohp").focus();
            $('#walet').val("OVOE");
            $("#sub1").removeClass("sub-radio-topup");
            $("#sub2").removeClass("sub-radio-topup");
            $("#sub3").removeClass("sub-radio-topup");
            $("#sub-linkaja").removeClass("sub-radio-topup");
            $("#total-topup").html("");
            $("#alert").html("");
            $("#bank").hide();
            $("#convenience").hide();
            $("#virtual-account").hide();
            $("#sub-ovo").addClass("sub-radio-topup");
          });

          $("#radio-linkaja, #sub-linkaja").click(function(){
            $("#div-alert").hide();
            $("#div-label-nominal").removeClass("visibleno");
            $("#div-label-nominal").addClass("visibleyes");
            $("#div-nominal").removeClass("visibleno");
            $("#div-nominal").addClass("visibleyes");
            $("#nohp").focus();
            $('#walet').val("LINKAJA");
            $("#sub1").removeClass("sub-radio-topup");
            $("#sub2").removeClass("sub-radio-topup");
            $("#sub3").removeClass("sub-radio-topup");
            $("#sub-ovo").removeClass("sub-radio-topup");
            $("#total-topup").html("");
            $("#alert").html("");
            $("#bank").hide();
            $("#convenience").hide();
            $("#virtual-account").hide();
            $("#sub-linkaja").addClass("sub-radio-topup");
          });



          function getStrukData(){
            $.ajax({
            type: "GET",
            url:  "<?php echo base_url(); ?>" + "setting/getstruk",
            contentType: "application/json;",
            cache: false,
            success: function(data){
              var jsonResp = JSON.parse(data);
              $('input[name="nama_outlet"]').val(jsonResp.nama_outlet);
              $('input[name="alamat"]').val(jsonResp.alamat);
              $('input[name="no_telepon"]').val(jsonResp.no_telepon);
              $('input[name="web_link"]').val(jsonResp.web_link);
              $('input[name="facebook_link"]').val(jsonResp.facebook_link);
              $('input[name="instagram_link"]').val(jsonResp.instagram_link);
              $('input[name="twitter_link"]').val(jsonResp.twitter_link);
              $('textarea[name="note"]').val(jsonResp.note);

              if(data.includes("Login Web Report")){
                window.location = "<?=base_url()?>webreport/logout";
              }
            },
            error: function(error){
              alert('Gagal saat mendapatkan data struk');
            }
            });
          }


          $(".icon-bank").click(function(){
            $("#div-label-nominal").removeClass("visibleno");
            $("#div-label-nominal").addClass("visibleyes");
            $("#div-nominal").removeClass("visibleno");
            $("#div-nominal").addClass("visibleyes");
            $("#metode").removeClass("visibleno");
            $("#metode").addClass("visibleyes");
            $("#metode").html("Transfer Bank")
            document.getElementById("nominal").disabled = false;
            document.getElementById("nominal").value = "";
            document.getElementById("total-topup").innerHTML = "";
            $("#nominal").show();
            $('#total-topup').show();
            $('#div-label-nominal').show();
            $("#nominal").focus();
            $('#loading-tiket').show();
            $('#metode-pembayaran').show();
            var valuebank    = this.id;

            var srcText = "";
            switch(valuebank){
              case 'BCA':
                srcText = '<?=base_url()?>'+'assets/img/bankwithborder-01.png';
              break;
              case 'BRI':
                srcText = '<?=base_url()?>'+'assets/img/bankwithborder-02.png';
              break;
              case 'BNI':
                srcText = '<?=base_url()?>'+'assets/img/bankwithborder-03.png';
              break;
              case 'MANDIRI':
                srcText = '<?=base_url()?>'+'assets/img/bankwithborder-04.png';
              break;
            }

            $("#code").val(valuebank);
            $('#metode-pembayaran').removeClass("visibleno");
            $('#metode-pembayaran').addClass("visibleyes");
            $('#metode-pembayaran').attr('src', srcText);
            var bank    = $("#code").val();
            var nominal = $("#nominal").val();
            var t       = getDateTime();
            var h       = sha1(bank + nominal + t);

            if(nominal=='' && bank=='' ){
              $('#loading-tiket').hide();
              $("#tiket_sukses_msg").hide();
              $("#tiket_err_msg").show();
              $("#tiket_err_msg").html("Anda Belum Memasukan Apapun!");
              $("#nominal").focus();
            } else if(nominal==''){
              $('#loading-tiket').hide();
              $("#tiket_sukses_msg").hide();
              // $("#tiket_err_msg").show();
              // $("#info_msg").html("Silahkan Masukan Nominal Anda!");
              $("#div-alert").fadeIn();
              $("#img_err").show();
              $("#alert").html("Khusus Tiket Deposit, Nominal harus kelipatan Rp 10.000!");
              $("#img_err").hide();
              $("#nominal").focus();
            }
          });



          $(".icon-cvs").click(function(){
            $("#div-label-nominal").fadeIn();
            $("#nominal").fadeIn();
            $("#total-topup").show();
            document.getElementById("total-topup").innerHTML = "";
            var valuecvs    = this.id;
            var srcText = "";
            switch(valuecvs){
              case 'ALMA':
                srcText = '<?=base_url()?>'+'assets/img/alfamart.png';
              break;
              case 'INDO':
                srcText = '<?=base_url()?>'+'assets/img/indomaret.png';
              break;
            }
            $("#div-label-nominal").removeClass("visibleno");
            $("#div-label-nominal").addClass("visibleyes");
            $("#div-nominal").removeClass("visibleno");
            $("#div-nominal").addClass("visibleyes");
            $("#metode").removeClass("visibleno");
            $("#metode").addClass("visibleyes");
            $("#metode").html("Payment Via ")
            $('#metode-pembayaran').removeClass("visibleno");
            $('#metode-pembayaran').addClass("visibleyes");
            $('#metode-pembayaran').attr('src', srcText);
            $("#div-alert").hide();
            document.getElementById("nominal").disabled = false;
            $("#nominal").focus();
            $("#code").val(valuecvs);
            // $('#metode-pembayaran').removeClass("visibleno");
            // $('#metode-pembayaran').addClass("visibleyes");
            // $('#metode-pembayaran').attr('src', srcText);
            var bank    = $("#code").val();
            var nominal = $("#nominal").val();
            var t       = getDateTime();
            var h       = sha1(bank + nominal + t);

            if(nominal=='' && bank=='' ){
              $('#loading-tiket').hide();
              $("#tiket_sukses_msg").hide();
              $("#tiket_err_msg").show();
              $("#tiket_err_msg").html("Anda Belum Memasukan Apapun!");
              $("#nominal").focus();
            } else if(nominal==''){
              $('#loading-tiket').hide();
              $("#tiket_sukses_msg").hide();
              // $("#tiket_err_msg").show();
              // $("#info_msg").html("Silahkan Masukan Nominal Anda!");

              $("#img_err").hide();
              $("#nominal").focus();
            }
          });

          $('.virtual-account').change(function(){
              var va      = $(this).val();
              var nominal = $("#nominal").val();
              var type    = $("#type").val();
              var code    = $("#code").val();
              var t       = getDateTime();
              var pm      = $("#pm").val();
              var h       = sha1(type + pm + t);

              var srcText = "";
              switch(va){
                case 'CENA':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-01.png';
                break;
                case 'BRIN':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-02.png';
                break;
                case 'BNIN':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-03.png';
                break;
                case 'BMRI':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-04.png';
                break;
                case 'BDIN':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-05.png';
                break;
                case 'BNIA':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-06.png';
                break;
                case 'HNBN':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-07.png';
                break;
                case 'BBBA':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-08.png';
                break;
                case 'IBBK':
                  srcText = '<?=base_url()?>'+'assets/img/bankwithborder-09.png';
                break;
              }


              $.ajax({
                  type: "POST",
                  url:  "<?php echo base_url(); ?>" + "topup/send_topup",
                  data: JSON.stringify({
                                        type      : type,
                                        pm        : pm,
                                        cn        : '<?=$this->session->userdata('fullname')?>',
                                        va        : va,
                                        msisdn    : '<?=$this->session->userdata('msisdn')?>',
                                        store_id  : '<?=$this->session->userdata('store_id')?>',
                                        user_name : '<?=$this->session->userdata('username')?>',
                                        t: t,
                                        h: h
                                      }),
                  contentType: "application/x-www-form-urlencoded;",
                  cache: false,
                  success: function(resultTiket){
                      $('#loading-tiket').hide();
                      var resTiket = JSON.parse(resultTiket);
                      console.log(resTiket);
                      if(resTiket.status_code == '200'){
                        $("#textcvs").hide();
                        $("#textpayment").hide();
                        $("#textewallet").hide();
                        $('#image-bank2').attr('src', srcText);
                        $('#modal-tiket2').show();
                        $("#tiket_err_msg").hide();
                        $("#textva").show();
                        $("#title-message2").html(resTiket.message);
                        document.getElementById("nominal").value = "";
                        // $("#tiket_sukses_msg").show();
                        $("#ikon").show();
                        if(resTiket.va_number!=""){
                          $("#va-number").show();
                          $("#image-bank2").show();
                          $('#textva').html("Anda Melakukan Top Up Saldo <br>dengan Virtual Account Number:");
                          $("#va-number").html(resTiket.va_number);
                          // $("#tiket_sukses").html("VA Number : "+resTiket.va_number);
                        } else {
                          $("#textva").html("TIDAK TERSEDIA");
                          $("#va-number").hide();
                          $("#image-bank2").hide();
                        }
                        // document.getElementById("pin").value = "";
                      }else if(resTiket.status_code == '500'){
                        $("#tiket_sukses_msg").hide();
                        // $("#tiket_err_msg").show();
                        // $("#msg").html(resTiket.message);
                        $("#div-alert").fadeIn();
                        $("#alert").html(resTiket.message);
                      }else if(resTiket.status_code == '401'){
                        $("#nominal").focus();
                        $("#tiket_sukses_msg").hide();
                        // $("#tiket_err_msg").show();
                        // $("#msg").html(resTiket.message);
                        $("#div-alert").fadeIn();
                        $("#alert").html(resTiket.message);
                      }else{
                        $("#tiket_sukses_msg").hide();
                        // $("#tiket_err_msg").show();
                        // $("#tiket_msg").html(resTiket.message);
                        $("#div-alert").fadeIn();
                        $("#alert").html(resTiket.message);
                      }
                  },
                  error: function(resultTiket){
                    $('#loading-tiket').hide();
                  }
              });
          });


          $("#topup").click(function(){
            $('#boxemail').hide();

            // var bank    = $(".icon-bank").id();
            // var cvs     = $(".icon-cvs").id();
            var va      = $(".virtual-account").val();
            var nominal = $("#nominal").val();
            var type    = $("#type").val();
            var code    = $("#code").val();
            var t       = getDateTime();



            if(nominal==''){
              $('#loading-tiket').hide();
              $("#tiket_sukses_msg").hide();
              $("#tiket_err_msg").show();
              $("#tiket_msg").html("Metode Pembayaran belum Dipilih!");
              $("#img_err").hide();

            }
            // } else if(va==''){
            //   $('#loading-tiket').hide();
            //   $("#tiket_sukses_msg").hide();
            //   $("#tiket_err_msg").show();
            //   $("#tiket_msg").html("Belum Ada Bank Yang Anda Pilih!");
            //   $("#img_err").hide();
            //
            // } else if(cvs==''){
            //   $('#loading-tiket').hide();
            //   $("#tiket_sukses_msg").hide();
            //   $("#tiket_err_msg").show();
            //   $("#tiket_msg").html("Silahkan Pilih Convenience Store!");
            //   $("#img_err").hide();



                if(type == "DEPOSIT"){

                  if(nominal=='' ){

                    $('#loading-tiket').hide();
                    $("#tiket_sukses_msg").hide();
                    // $("#tiket_err_msg").show();
                    // $("#tiket_err_msg").html("Anda Belum Memilih Apapun!");
                    $("#div-alert").fadeIn();
                    $("#img_err").show();
                    $("#alert").html("Anda Belum Memilih Apapun!");

                  } else {
                          var msisdn = <?php echo $this->session->userdata('msisdn')?>;
                          var pin    = <?php echo $this->session->userdata('pin')?>;
                          var sha    = sha256("sha256"+msisdn+pin);

                          var h      = sha1(type + code + nominal + t);
                          if(nominal % 10000 == 0){
                            $('#loading-tiket').show();
                            $.ajax({
                                type: "POST",
                                url:  "<?php echo base_url(); ?>" + "topup/deposit",
                                data: JSON.stringify({
                                                      type      : type,
                                                      nominal   : nominal,
                                                      code      : code,
                                                      msisdn    : msisdn,
                                                      store_id  : '<?php echo $this->session->userdata('store_id')?>',
                                                      user_name : '<?php echo $this->session->userdata('username')?>',
                                                      pin       : pin,
                                                      sha       : sha,
                                                      t: t,
                                                      h: h
                                                    }),
                                contentType: "application/json;",
                                cache: false,
                                success: function(resultTiket){
                                    $('#loading-tiket').hide();
                                    var resTiket = JSON.parse(resultTiket);
                                    if(resTiket.Rows[0].RC == '00'){
                                      tiketMessageParser(resTiket.Rows[0].MESSAGE);
                                      $('#modal-tiket').show();
                                      $("#tiket_err_msg").hide();
                                      $("#tiket_sukses_msg").show();
                                      $("#ikon").hide();
                                      $("#view-tiket").hide();
                                      //$("#tiket_sukses").html(resTiket.Rows[0].MESSAGE);
                                      document.getElementById("nominal").value = "";
                                      // document.getElementById("pin").value = "";
                                    }else if(resTiket.Rows[0].RC == '63'){
                                      $("#tiket_sukses_msg").hide();
                                      // $("#tiket_err_msg").show();
                                      // $("#msg").html(resTiket.Rows[0].MESSAGE);
                                      $("#div-alert").fadeIn();
                                      $("#alert").html(resTiket.Rows[0].MESSAGE);
                                    }else if(resTiket.Rows[0].RC == '05'){
                                      $("#nominal").focus();
                                      $("#tiket_sukses_msg").hide();
                                      // $("#tiket_err_msg").show();
                                      // $("#msg").html(resTiket.Rows[0].MESSAGE);
                                      $("#div-alert").fadeIn();
                                      $("#alert").html(resTiket.Rows[0].MESSAGE);
                                    }else{
                                      // $("#tiket_sukses_msg").hide();
                                      // $("#tiket_err_msg").show();
                                      // $("#tiket_msg").html(resTiket.Rows[0].MESSAGE);
                                      $("#div-alert").fadeIn();
                                      $("#alert").html(resTiket.Rows[0].MESSAGE);
                                    }
                                },
                                error: function(resultTiket){
                                  $('#loading-tiket').hide();
                                }
                            });
                          } else {
                            $('#loading-tiket').hide();
                            $("#tiket_sukses_msg").hide();
                            // $("#tiket_err_msg").show();
                            // $("#tiket_msg").html("Nominal Harus Kelipatan 10000");
                            $("#div-alert").fadeIn();
                            $("#img_err").show();
                            $("#alert").html("Nominal Harus Kelipatan 10000")
                            $("#nominal").focus();
                          }
                  }

                } else if (type == "CVS"){
                  // var pm = $("#pm").val();
                  var pm = "03";
                  var mitra = $("#code").val();
                  var h       = sha1(type + pm +  t);

                  var srcText = "";
                  switch(mitra){
                    case 'ALMA':
                      srcText = '<?=base_url()?>'+'assets/img/alfamart.png';
                    break;
                    case 'INDO':
                      srcText = '<?=base_url()?>'+'assets/img/indomaret.png';
                    break;
                  }

                  if(nominal=='' ){
                    $('#loading-tiket').hide();
                    $("#tiket_sukses_msg").hide();
                    $("#div-alert").fadeIn();
                    $("#img_err").show();
                    $("#alert").html("Nominal belum diisi!");
                    $("#nominal").focus();
                  } else {
                      if(nominal < 10000 ){
                        $("#div-alert").fadeIn();
                        $("#img_err").show();
                        $("#alert").html("Besaran Nominal minimal senilai 10000");
                        $("#nominal").focus();
                      } else {
                        $("#div-alert").hide();
                        $("#img_err").hide();
                        $("#alert").hide("");
                        $('#loading-tiket').show();
                          $.ajax({
                              type: "POST",
                              url:  "<?php echo base_url(); ?>" + "topup/send_topup",
                              data: JSON.stringify({
                                                    type      : type,
                                                    nominal   : nominal,
                                                    pm        : pm,
                                                    mitra     : mitra,
                                                    // va        : va,
                                                    // code      : code,
                                                    msisdn    : '<?=$this->session->userdata('msisdn')?>',
                                                    store_id  : '<?=$this->session->userdata('store_id')?>',
                                                    user_name : '<?=$this->session->userdata('username')?>',
                                                    t: t,
                                                    h: h
                                                  }),
                              contentType: "application/x-www-form-urlencoded;",
                              cache: false,
                              success: function(resultTiket){
                                  $('#loading-tiket').hide();
                                  var resTiket = JSON.parse(resultTiket);
                                  var jsonStr = '';

                                  if(resTiket.json_str != ''){
                                    jsonStr = JSON.parse(resTiket.json_str);
                                  }

                                  if(resTiket.status_code == '200'){
                                    $("#textva").hide();
                                    $("#textewallet").hide();
                                    $("#detail-bank2").hide();
                                    $("#textcvs").show();
                                    $(".jumlah-transfer2").html("Rp. " + nominal);
                                    $("#va-number").html(resTiket.pay_no);
                                    $('#image-bank2').attr('src', srcText);
                                    $('#modal-tiket2').show();
                                    $("#tiket_err_msg").hide();
                                    $("#ikon").show();
                                    document.getElementById("nominal").value = "";
                                  }else if(resTiket.status_code == '401'){
                                    $("#tiket_sukses_msg").hide();
                                    $("#tiket_err_msg").show();
                                    $("#div-alert").fadeIn();
                                    $("#alert").html(resTiket.message);
                                  }else if(resTiket.status_code == '500'){

                                    if(jsonStr.resultCd == '9018'){
                                      $('#loading-tiket').hide();
                                      $("#boxemail").fadeIn();
                                      $("#email").focus();
                                      $("#div-alert").fadeIn();
                                      $("#alert").hide();
                                      //$("#alert").html("Email anda belum terdaftar, untuk melanjutkan silahkan lengkapi dengan <a href='<?php //echo base_url() ?>akun?x=warning' style='text-decoration:underline;color:red;font-weight:bold;'> klik link ini!</a>" );
                                    }else{
                                      $("#nominal").focus();
                                      $("#tiket_sukses_msg").hide();
                                      $("#tiket_err_msg").show();
                                      $("#div-alert").fadeIn();
                                      $("#alert").html(resTiket.message);
                                    }

                                  }else{
                                    $("#tiket_sukses_msg").hide();
                                    $("#tiket_err_msg").show();
                                    $("#tiket_msg").html(resTiket.message);
                                  }
                              },
                              error: function(resultTiket){
                                $('#loading-tiket').hide();
                              }
                          });
                      }
                  }

                } else if (type == "EWALLET"){
                    var itememail = "";
                    var divmail = document.getElementById("divmail");
                    // var pm = $("#pm").val();
                    var pm = "05";
                    var walet   = $("#walet").val();
                    var nohp    = $("#nohp").val();
                    var topup   = document.getElementById("total-topup").innerHTML;
                    //var inputmail ="";
                    var h       = sha1(type + pm +  t);

                    var srcText = "";
                    switch(walet){
                      case 'OVOE':
                        srcText = '<?=base_url()?>'+'assets/img/ovo.jpg';
                      break;
                      case 'LINKAJA':
                        srcText = '<?=base_url()?>'+'assets/img/linkaja.jpg';
                      break;
                    }
                    $('#loading-tiket').show();

                    if(nominal=='' ){
                      $('#loading-tiket').hide();
                      $("#tiket_sukses_msg").hide();
                      $("#img_err").show();
                      $("#alert").html("Nominal belum diisi!");
                      $("#nominal").focus();
                    } else {
                      if(nominal < 10000 ){
                        $("#div-alert").fadeIn();
                        $("#img_err").show();
                        $("#alert").html("Besaran Nominal minimal senilai 10000");
                        $("#nominal").focus();
                      } else {
                        $("#div-alert").hide();
                        $("#img_err").hide();
                        $("#alert").hide("");
                        $('#loading-tiket').show();
                          $.ajax({
                              type: "POST",
                              url:  "<?php echo base_url(); ?>" + "topup/send_topup",
                              data: JSON.stringify({
                                                    type      : type,
                                                    pm        : pm,
                                                    nohp      : nohp,
                                                    nominal   : nominal,
                                                    mitra     : mitra,
                                                    // va        : va,
                                                    walet     : walet,
                                                    msisdn    : '<?=$this->session->userdata('msisdn')?>',
                                                    store_id  : '<?=$this->session->userdata('store_id')?>',
                                                    user_name : '<?=$this->session->userdata('username')?>',
                                                    t: t,
                                                    h: h
                                                  }),
                              contentType: "application/x-www-form-urlencoded;",
                              cache: false,
                              success: function(resultTiket){
                                $('#loading-tiket').hide();
                                // itememail += '<div>Untuk transaksi ini dibutuhkan email<br>Email anda belum terdaftar, silahkan lengkapi email anda <br>' +
                                //               '<input id="inputmail" class="form-input-topup" placeholder="masukan email anda"><input type="submit" id="btn-mail" value="submit">'+
                                //              '</div>' ;

                                  $('#loading-tiket').hide();
                                  try{
                                    var resTiket = JSON.parse(resultTiket);
                                    var jsonStr = '';

                                    if(resTiket.json_str != ''){
                                      jsonStr = JSON.parse(resTiket.json_str);
                                    }

                                    if(resTiket.status_code == '200'){
                                      $("#textva").hide();
                                      $("#textcvs").hide();
                                      $("#textpayment").hide();
                                      $("#textewallet").show();
                                      $(".jumlah-transfer2").html(topup);
                                      $("#va-number").html(resTiket.pay_no);
                                      $('#image-bank2').attr('src', srcText);
                                      $('#modal-tiket2').show();
                                      $("#ikon").show();
                                      $("#tiket_sukses").html(resTiket.message);
                                      document.getElementById("nominal").value = "";
                                    }else if(resTiket.status_code == '401'){
                                      $("#div-alert").fadeIn();
                                      $("#img_err").show();
                                      $("#alert").html(resTiket.message);

                                    }else if(resTiket.status_code == '500'){
                                      if(jsonStr.resultCd == '9018'){
                                        $("#textva").hide();
                                        $("#textcvs").hide();
                                        $("#textpayment").hide();
                                        // $("#textewallet").hide();
                                        $('#image-bank2').hide();
                                        // $("#textewallet").html("Untuk transaksi ini dibutuhkan email<br>Email anda belum terdaftar, silahkan lengkapi email anda <br> <form><input type='text' id='inputmail' class='form-input-topup' placeholder='masukan email anda'><input type='submit' id='submit-mail' value='Submit' style='height:36px;width:70px;font-size:14px';text-align:center;margin:5px;background-color: rgba(0,175,233,1);></form><div id='err-email'></div>" );
                                        // $("#divmail").html("Untuk transaksi ini dibutuhkan email! <br>Email anda belum terdaftar, silahkan lengkapi email anda <br><form><input type='text' id='email' name='email' class='form-input-topup' placeholder='masukan email anda'><button class='button-primary-topup' id='submit-mail' style='height:36px;width:70px;font-size:14px';text-align:center;margin-bottom:20px;background-color: rgba(0,175,233,1);>Submit</button></form><div id='err-email'></div>" );
                                        // divmail.innerHtml = itememail;
                                        //$('#modal-tiket2').show();
                                        $("#boxemail").fadeIn();
                                        $("#email").focus();
                                        $("#div-alert").fadeIn();
                                        $("#alert").html("Email anda belum terdaftar, silahkan melengkapi dengan <a href='<?php echo base_url() ?>akun?x=warning' style='text-decoration:underline;color:red;font-weight:bold;'> klik link ini!</a>" );

                                      }else{
                                        $("#nominal").focus();
                                        $("#tiket_sukses_msg").hide();
                                        $("#div-alert").fadeIn();
                                        $("#alert").html(resTiket.message);
                                      }
                                    }else{
                                      $("#tiket_sukses_msg").hide();
                                      $("#tiket_err_msg").show();
                                      $("#tiket_msg").html(resTiket.message);
                                    }

                                  } catch(err){
                                    $("#nominal").focus();
                                    $("#tiket_sukses_msg").hide();
                                    $("#div-alert").fadeIn();
                                    $("#alert").html('Koneksi ke server gagal.')
                                  }
                              },
                              error: function(resultTiket){
                                $('#loading-tiket').hide();
                              }
                          });
                      }
                    }


                }

            return false;
          });




          $("#reset-tiket").click(function(){
            $("#tiket_sukses_msg").hide();
            $("#tiket_err_msg").hide();
          });


          // $("#submit-mail").click(function(){
          //   event.preventDefault();
          //   $('#loading-tiket').show();
          //   var email     = $("#email").val();
          //   var tt        = getDateTime();
          //   var hh        = sha1(email + tt);
          //   if(email == "" ) {
          //       $("#err-email").html("Email anda masih kosong!");
          //       $("#email").focus();
          //   } else {
          //
          //       $.ajax({
          //        type: "POST",
          //        url :  "<?php //echo base_url(); ?>" + "topup/send_email",
          //        data: JSON.stringify({email: email, user_name: '<?php //echo $this->session->userdata('username')?>',  store_id : '<?php //echo $this->session->userdata('store_id')?>', tt:tt,  hh: hh}),
          //        contentType: "application/json;",
          //        cache: false,
          //        success: function(result){
          //           var resultRes = JSON.parse(result);
          //            if(resultRes.status == 'SUKSES') {
          //              $("#email").hide();
          //              $("#boxemail").html("Email anda berhasil disimpan, silahkan melanjutkan Topup!");
          //              $("#submit-mail").hide();
          //            }
          //        }
          //       });
          //     }
          //     return false;
          // });


          $("#submit-mail").click(function(event){
            event.preventDefault();
            $('#loading-tiket').show();
            var email     = $("#email").val();
            var tt        = getDateTime();
            var hh        = sha1(email + tt);
            // var mitra     = $("#code").val();
            // var nominal   = $("#nominal").val();
            // var type      = $("#type").val();
            // var walet     = $("#walet").val();
            // var nohp      = $("#nohp").val();
            // var pm        = $("#pm").val();
            //var pm        = "05";

            if(email == "" ) {
                $("#err-email").html("Email anda masih kosong!");
                $("#email").focus();
            } else {
                  $.ajax({
                  type: "POST",
                  url :  "<?php //echo base_url(); ?>" + "topup/send_email",
                  data: JSON.stringify({
                                        // pm       : pm,
                                        // nohp       : nohp,
                                        // type     : type,
                                        // mitra    : mitra,
                                        // walet    : walet,
                                        // nominal  : nominal,
                                        email    : email,
                                        user_name: '<?php echo $this->session->userdata('username')?>',
                                        store_id : '<?php echo $this->session->userdata('store_id')?>',
                                        tt: tt,
                                        hh: hh
                                      }),
                  contentType: "application/json;",
                  cache: false,
                  success: function(resultUpdate){

                    var resUpdate = JSON.parse(resultUpdate);
                      // console.log(resultRes);
                      if(resUpdate.status == 'SUKSES'){
                        $('#loading-tiket').hide();
                        $("#email").hide();
                        $("#boxemail").html("Email anda berhasil disimpan, silahkan melanjutkan Topup!");
                        $("#submit-mail").hide();
                      }

                  },
                  error: function(resultTiket){
                    $('#loading-tiket').hide();
                  }

                  });
            }
            return false;
          });






        });

        </script>
    </body>
</html>

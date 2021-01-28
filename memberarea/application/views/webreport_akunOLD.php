<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>ST24</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">

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
        .icon-bank{
          width: 100px;
          height: 30px;
          margin: 5px 5px 5px 12px;

          border-radius:5px;
        }
        .icon-bank:hover{
          cursor:pointer;
          width: 100px;
          height: 30px;
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
                            <img class="nav-menu" id="left-menu" onclick="openMenu()" src="<?php echo base_url() ?>/images/asset/menu.svg">
                            <img class="logo-st24" onclick="home()" src="<?php echo base_url() ?>/images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7 col-md-4">
                        <div class="header-center">
                            <div class="box-header"><span class="box-header-title">AKUN</span></div>
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
                          <br><br><br>
                          <div class="alert alert-info">
                            <span class="text-alert">
                            * Waktu kadaluarsa tiket deposit ini adalah 59 menit sejak request/permintaan tiket deposit
                            </span>
                          </div>
                        </div>
                    </div>

                    <div>
                        <button id="btn-tutup" onclick="closeModalTiket()" class="button">TUTUP</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-desk-2">
                        <?php $this->load->view('navigation_left') ?>
                    </div>

                    <div class="col-desk-10" id="right-container-id">
                        <div class="body-right-container smooth">
                            <div class="box-primary" style="padding-bottom:0">
                                <div class="row">
                                    <div class="col-desk-4">
                                        <h3 class="label-akun">Setting Account</h3>

                                    </div>
                                    <div class="col-desk-4">
                                        <h3 class="label-pass">Ganti Password</h3>
                                    </div>
                                    <div class="col-desk-4">
                                        <h3  class="label-tiket">Tiket Deposit</h3>
                                    </div>
                                </div> <hr>
                                <div class="row">

                                  <!--FORM PASSWORD -->
                                  <div class="col-desk-6 pass" style="display:none;">
                                      <div class="box-form">
                                          <form>
                                              <div id='err_msg' style='display: none; '>
                                                <div id='content_result'>
                                                  <div id='err_show' class="w3-text-red">
                                                    <div id='msg' style="border:1px; width:auto; height:auto; padding:2px; color:red; font-size:15px;text-align:left;display:table;"> </div>
                                                    <img src="<?=base_url()?>assets/img/warning.png" style="width:30px; height:30px;">
                                                  </div>
                                                </div>
                                              </div>
                                              <div id='sukses_msg' style='display: none; '>
                                                <div id='content_result'>
                                                  <div id='sukses_show' class="w3-text-red">
                                                    <div id='sukses' style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;"> </div>
                                                    <img src="<?=base_url()?>assets/img/save.jpg" style="width:40px; height:40px;">
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="text-title" style="font-weight:bold;font-size:20px;">Ganti Password</div><hr>
                                              <div class="label-form">
                                                <label>Password Lama</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passold" type="password" name="passold" placeholder="Pasword Lama" autocomplete="off">
                                              </div><br>
                                              <div class="label-form">
                                                <label>Pasword Baru</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passnew" type="password" name="passnew" placeholder="Password Baru" autocomplete="off">
                                              </div> <br>
                                              <div class="label-form">
                                                <label>Ketik Ulang Password Baru</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passnew2" type="password" name="passnew2" placeholder="Konfirmasi Pasword Baru" autocomplete="off">
                                              </div> <hr>
                                              <div class="to-right">
                                                  <input class="right" class="right" type="reset" value="Reset">
                                                  <input id="submit-pass" class="right" type="submit">
                                              </div>
                                          </form>

                                      </div>
                                  </div>

                                  <!--FORM AKUN -->
                                  <div class="col-desk-6 akun" style='display:none'>
                                      <div class="box-form">
                                          <form class="form">
                                            <div id='akun_err_msg' style='display:none'>
                                              <div id='content_result'>
                                                <div id='akun_err_show' class="w3-text-red">
                                                  <div id='akun_msg' style="border:1px; width:auto; height:auto; padding:2px; color:red; font-size:15px;text-align:left;display:table;"> </div>
                                                  <img src="<?=base_url()?>assets/img/warning.png" style="width:30px; height:30px;">
                                                </div>
                                              </div>
                                            </div>
                                            <div id='akun_sukses_msg' style='display: none; '>
                                              <div id='content_result'>
                                                <div id='akun_sukses_show' class="w3-text-red">
                                                  <div id='akun_sukses' style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;"> </div>
                                                  <img src="<?=base_url()?>assets/img/save.jpg" style="width:40px; height:40px;">
                                                </div>
                                              </div>
                                            </div>

                                            <div class="text-title" style="font-weight:bold;font-size:20px;">Setting Account</div><hr>
                                            <div class="label-form">
                                              <label>Kode Agen</label>
                                            </div>
                                            <div class="input-form">
                                              <input id="kode" class="input-text" type="text" name="kode" value="<?= $this->session->userdata('username')?>" disabled>*
                                            </div>
                                            <br>
                                            <div class="label-form">
                                              <label>Nama</label>
                                            </div>
                                            <?php foreach($akun as $akun):?>
                                            <input id="nama" class="input-text" class="input-text" type="text" name="nama" value="<?php echo $akun->FULL_NAME;?>"> *
                                            <br>
                                            <div class="label-form">
                                              <label>Alamat 1</label>
                                            </div>
                                            <input id="alamat_1" class="input-text" type="text" name="alamat_1" value="<?php echo $akun->ADDRESS1;?>"> *
                                            <br>
                                            <div class="label-form">
                                              <label>Alamat 2</label>
                                            </div>
                                            <input id="alamat_2" class="input-text" type="text" name="alamat_2" value="<?php echo $akun->ADDRESS2;?>">
                                            <br>
                                            <div class="label-form">
                                              <label>Propinsi</label>
                                            </div>
                                            <select id="propinsi" class="propinsi" name="propinsi">
                                                <option value="<?php echo $akun->KODE_PROV;?>">
                                                  <?php echo $akun->PROV;?>
                                                </option>
                                                <?php foreach($propinsi as $propinsi):?>
                                                <option value="<?php echo $propinsi->ID;?>"> <?php echo $propinsi->NAME;?> </option>
                                                <?php endforeach;?>
                                            </select> *
                                            <br>
                                            <div class="label-form">
                                              <label>Kota/Kabupaten</label>
                                            </div>
                                            <select id="kota" class="kota" name="kota">
                                              <option value="<?php echo $akun->KODE_KOTA;?>">
                                                <?php echo $akun->KOTA;?>
                                              </option>
                                            </select> *
                                            <br>
                                            <div class="label-form">
                                              <label>Kecamatan</label>
                                            </div>
                                            <select id="kecamatan" class="kecamatan" name="kecamatan">
                                              <option value="<?php echo $akun->KODE_KEC;?>">
                                                <?php echo $akun->KEC;?>
                                              </option>
                                            </select> *
                                            <br>
                                            <div class="label-form">
                                              <label>Kelurahan</label>
                                            </div>
                                            <select id="kelurahan" class="kelurahan" name="kelurahan">
                                              <option value="<?php echo $akun->KODE_KEL_DES;?>">
                                                <?php echo $akun->KEL;?>
                                              </option>
                                            </select> *
                                            <br>
                                            <div class="label-form">
                                              <label>Kode Pos</label>
                                            </div>
                                            <input id="zip" class="input-text" type="text" name="zip" value="<?php echo $akun->KODE_POS;?>">
                                            <br>
                                            <div class="label-form">
                                              <label>No.KTP/SIM</label>
                                            </div>
                                            <input id="ktp" class="input-text" type="text" name="ktp" value="<?php echo $akun->KTP_SIM_PASPOR;?>">
                                            <br>
                                            <div class="label-form">
                                              <label>NPWP</label>
                                            </div>
                                            <input id="npwp" class="input-text" type="text" name="npwp" value="<?php echo $akun->NPWP;?>">
                                            <br>
                                            <div class="label-form">
                                              <label>Nama Wajib Pajak</label>
                                            </div>
                                            <input id="wp" class="input-text"   type="text" name="wp" value="<?php echo $akun->NAMA_WAJIB_PAJAK;?>">
                                            <?php endforeach;?>
                                            <hr>
                                            <input id="reset-akun" class="right" type="reset" name="" value="Reset">
                                            <input id="submit-akun" class="right" type="submit" value="Submit">
                                          </form>
                                      </div>
                                  </div>

                                  <!--FORM TIKET -->

                                  <div class="col-desk-6 tiket" style="display:none;">
                                      <div class="box-form">
                                        <div id="loading-tiket" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                          <form class="form" autocomplete="off">
                                            <div id='tiket_err_msg' style='display: none; '>
                                              <div id='content_result'>
                                                <div id='tiket_err_show' class="w3-text-red">
                                                  <div id='tiket_msg' style="border:1px; width:auto; height:auto; padding:2px; color:red; font-size:15px;text-align:left;display:table;"> </div>
                                                  <img src="<?=base_url()?>assets/img/warning.png" style="width:30px; height:30px;">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="text-title" style="font-weight:bold;font-size:20px;">Tiket Deposit</div><hr>
                                              <div class="label-form">
                                                <label>Nominal</label>
                                              </div>
                                            <div class="input-form">
                                              <input id="nominal" type="text" name="nominal" onclick="myNominal()" onkeyup="angka(this);">
                                            </div>
                                            <div id="alert" style="display:none;color:blue;font-size:12px;text-align:left;"> </div>
                                            <!-- <div class="label-form">
                                              <label>PIN</label>
                                            </div>
                                            <div class="input-form">
                                              <input id="pin" type="password" readonly onfocus="this.removeAttribute('readonly');" name="pin">
                                            </div> <br> -->
                                            <div class="label-form">
                                              <label>Silahkan Pilih Bank </label>
                                            </div>
                                            <br>
                                            <img id="BCA" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-01.png" alt="">
                                            <img id="BRI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-02.png" alt="">
                                            <img id="BNI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-03.png" alt="">
                                            <img id="MANDIRI" class="icon-bank" src="<?=base_url()?>assets/img/bankwithborder-04.png" alt="">
                                            <hr>
                                            <input id="reset-tiket" class="right" type="reset" name="" value="Reset">
                                            
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
        <script>

        function initial(){
          var urlTmp = document.URL;
          //$("#modal-tiket").show();
          if(urlTmp.includes('viewtiket')){
            $(".pass").hide();
            $(".akun").hide();
            $(".tiket").fadeIn("slow");
            $("#alert").hide();
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
          $('#title-message').html(titleMessage);
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
        }

        function openModalTIket() {
          $('#modal-tiket').show();
        }
        var modal = document.getElementById("modal");

        function myNominal(){
          $("#alert").show();
          $("#alert").html("Masukan nilai request ticket deposit kelipatan Rp 10.000, lalu tekan Icon bank yang dituju!");
        }

        function angka(e) {
          var x      ="";
          var hasil ="";
          if (!/^[0-9]+$/.test(e.value)) {
            e.value = e.value.substring(0,e.value.length-1);
          }
        }

        $(document).ready(function(){
          var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
          var akun  = document.getElementById("akun");
          var tiket = document.getElementById("tiket");

          $(".label-akun").click(function(){
              $(".pass").hide();
              $(".tiket").hide();
              $(".akun").fadeIn("slow");
              $("#err_msg").hide();
              $("#sukses_msg").hide();
          });

          $(".label-pass").click(function(){
              $(".tiket").hide();
              $(".akun").hide();
              $(".pass").fadeIn("slow");
              document.getElementById("passold").value = "";
              document.getElementById("passnew").value = "";
              document.getElementById("passnew2").value = "";
              $("#err_msg").hide();
              $("#sukses_msg").hide();

          });

          $(".label-tiket").click(function(){
              $(".pass").hide();
              $(".akun").hide();
              $(".tiket").fadeIn("slow");
              $("#alert").hide();
              document.getElementById("nominal").value = "";
              // document.getElementById("pin").value = "";
              $("#err_msg").hide();
              $("#sukses_msg").hide();
          });


          $('#propinsi').click(function(){
                var id_prop = $(this).val();
                $.ajax({
                    type   : "POST",
                    url    : "<?php echo base_url(); ?>" + "akun/get_kota",
                    data   : JSON.stringify({id_prop: id_prop }),
                    contentType : "application/json;",
                    success: function(data){
                      var html = '';
                        var result = JSON.parse(data);
                        if(result.status == 'SUKSES'){
                          var dataKota = result.affect;
                          for(var i=0; i<dataKota.length; i++){
                            html += '<option value='+dataKota[i].ID+'>'+dataKota[i].NAME+'</option>';
                          }
                          $("#kota").html(html);
                        }
                    },
                    error: function(error){

                    }
                });
                return false;
          });

          $('#kota').click(function(){
                var id_kota = $(this).val();
                $.ajax({
                    type   : "POST",
                    url    : "<?php echo base_url(); ?>" + "akun/get_kecamatan",
                    data   : JSON.stringify({id_kota: id_kota}),
                    contentType : "application/json;",
                    success: function(data){
                        var html = '';
                        var result = JSON.parse(data);
                        if(result.status == 'SUKSES'){
                          var dataKec = result.affect;
                          for(var i=0; i<dataKec.length; i++){
                              html += '<option value='+dataKec[i].ID+'>'+dataKec[i].NAME+'</option>';
                          }
                          $('#kecamatan').html(html);
                        }
                    },
                    error : function(error){
                    }
                });
                return false;
          });

          $('#kecamatan').click(function(){
                var id_kecamatan = $(this).val();
                $.ajax({
                    type   : "POST",
                    url    : "<?php echo base_url(); ?>" + "akun/get_kelurahan",
                    data   : JSON.stringify({id_kecamatan: id_kecamatan}),
                    contentType : "application/json;",
                    success: function(data){
                        var html = '';
                        var result = JSON.parse(data);
                        if(result.status == 'SUKSES'){
                          var dataKel = result.affect;
                          for(var i=0; i<dataKel.length; i++){
                              html += '<option value=' +dataKel[i].ID+ '>' +dataKel[i].NAME+ '</option>';
                          }
                          $('#kelurahan').html(html);
                        }
                    },
                    error: function(error){
                    }
                });
                return false;
          });


          $(".icon-bank").click(function(){
            var bank    = this.id;
            var nominal = $("#nominal").val();
            var t       = getDateTime();
            var h       = sha1(bank + nominal + t);

            if(nominal=='' && bank=='' ){
              $("#tiket_sukses_msg").hide();
              $("#tiket_err_msg").show();
              $("#tiket_err_msg").html("Anda Belum Memasukan Apapun!");
              $("#nominal").focus();
            } else if(nominal==''){
              $("#tiket_sukses_msg").hide();
              $("#tiket_err_msg").show();
              $("#tiket_msg").html("Anda Belum Memasukan Nominal!");
              $("#nominal").focus();
            } else {
              if(nominal % 10000 == 0){
                $.ajax({
                    type: "POST",
                    url:  "<?php echo base_url(); ?>" + "akun/get_tiket",
                    data: JSON.stringify({
                                          nominal: nominal,
                                          bank   : bank,
                                          msisdn : '<?=$this->session->userdata('msisdn')?>',
                                          store_id : '<?=$this->session->userdata('store_id')?>',
                                          user_name : '<?=$this->session->userdata('username')?>',
                                          t: t,
                                          h: h
                                        }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(resultTiket){
                        var resTiket = JSON.parse(resultTiket);
                        if(resTiket.Rows[0].RC == '00'){
                          tiketMessageParser(resTiket.Rows[0].MESSAGE);
                          $('#modal-tiket').show();
                          $("#tiket_err_msg").hide();
                          $("#tiket_sukses_msg").show();
                          $("#ikon").show();
                          $("#tiket_sukses").html(resTiket.Rows[0].MESSAGE);
                          document.getElementById("nominal").value = "";
                          // document.getElementById("pin").value = "";
                        }else if(resTiket.Rows[0].RC == '63'){
                          $("#tiket_sukses_msg").hide();
                          $("#tiket_err_msg").show();
                          $("#msg").html(resTiket.Rows[0].MESSAGE);
                        }else if(resTiket.Rows[0].RC == '05'){
                          $("#nominal").focus();
                          $("#tiket_sukses_msg").hide();
                          $("#tiket_err_msg").show();
                          $("#msg").html(resTiket.Rows[0].MESSAGE);
                        }else{
                          $("#tiket_sukses_msg").hide();
                          $("#tiket_err_msg").show();
                          $("#tiket_msg").html(resTiket.Rows[0].MESSAGE);
                        }
                    }
                });

              } else {
                $("#sukses_msg").hide();
                $("#err_msg").show();
                $("#msg").html("Nominal Harus Kelipatan 10000");
                $("#nominal").focus();
              }
            }
            return false;
          });

          $("#reset-tiket").click(function(){
            $("#sukses_msg").hide();
            $("#err_msg").hide();
          });


          $("#submit-pass").click(function(event){
            event.preventDefault();
            var passold    = $("#passold").val();
            var passnew    = $("#passnew").val();
            var passnew2   = $("#passnew2").val();
            var pasol      = document.getElementById('passold');
            var pason      = document.getElementById('passnew');
            var pason2     = document.getElementById('passnew2');
            var tt = getDateTime();
            var hh = sha1(passnew + passnew2 + tt);
            if(passold=='' && passnew=='' && passnew2=='')
              {
                $("#err_msg").show();
                $("#msg").html("Anda Belum Memasukan Apapun!");
                pasol.focus();
              } else if(passold==''){
                $("#err_msg").show();
                $("#msg").html("Anda Belum Memasukan Password Lama!");
                pasol.focus();
              } else if(passnew==''){
                $("#err_msg").show();
                $("#msg").html("Anda Belum Memasukan Password Baru!");
                pason.focus();
              }else if(passnew2==''){
                $("#err_msg").show();
                $("#msg").html("Anda Belum Memasukan Konfirmasi Password Baru!");
                pason2.focus();
              } else {
                if(passnew!=passnew2){
                  $("#err_msg").show();
                  $("#msg").html("Konfirmasi Pasword Tidak Sama");
                  $("#passnew2").focus();
                  die();
                }
                if(passnew.match(regex)) {
                      $.ajax({
                      type: "POST",
                      url:  "<?php echo base_url(); ?>" + "akun/ubah_pass",
                      data: JSON.stringify({
                                            passlama : passold,
                                            passbaru : passnew,
                                            passbaru2: passnew2,
                                            uname    : '<?=$this->session->userdata('username')?>',
                                            store_id : '<?=$this->session->userdata('store_id')?>',
                                            tt: tt,
                                            hh: hh
                                          }),
                      contentType: "application/json;",
                      cache: false,
                      success: function(resultUbah){
                          var resultResUbah = JSON.parse(resultUbah);
                          if(resultResUbah.status == 'SUKSES'){
                            $("#err_msg").hide();
                            $("#sukses_msg").fadeIn("slow");
                            $("#sukses_msg").fadeOut("slow");
                            document.getElementById('passold').value="";
                            document.getElementById('passnew').value="";
                            document.getElementById('passnew2').value="";
                            $("#sukses").html(resultResUbah.pesan);
                          }else{
                            $("#sukses_msg").hide();
                            $("#err_msg").show();
                            pasol.focus();
                            $("#msg").html(resultResUbah.pesan);
                          }
                      }
                      });

                } else {
                  $("#err_msg").show();
                  $("#msg").html("Password Baru minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
                  $("#passnew").focus();
                }
              }
            return false;
          });

          $("#submit-akun").click(function(){
            event.preventDefault();
            $(".pass").hide();
            $(".tiket").hide();
            $(".akun").show();

            var nm   = document.getElementById('nama');
            var ktp  = document.getElementById('ktp');
            var npwp = document.getElementById('npwp');
            var wp   = document.getElementById('wp');
            var ad1  = document.getElementById('alamat_1');
            var ad2  = document.getElementById('alamat_2');
            var pr   = document.getElementById('propinsi');
            var kt   = document.getElementById('kota');
            var kc   = document.getElementById('kecamatan');
            var kl   = document.getElementById('kelurahan');
            var z    = document.getElementById('zip');

            var nama        = $("#nama").val();
            var alamat_1    = $("#alamat_1").val();
            var alamat_2    = $("#alamat_2").val();
            var propinsi    = $("#propinsi").val();
            var kota        = $("#kota").val();
            var kecamatan   = $("#kecamatan").val();
            var kelurahan   = $("#kelurahan").val();
            var zip         = $("#zip").val();
            var ktp         = $("#ktp").val();
            var npwp        = $("#npwp").val();
            var wp          = $("#wp").val();
            var time = getDateTime();
            var hash = sha1(nama + alamat_1 + alamat_2 + propinsi + kota + kecamatan + kelurahan + zip  + ktp + npwp + wp + time);

        		if(nama=='' && alamat_1=='' && propinsi=='' && kota=='' && kecamatan=='' && kelurahan=='')
        			{
        				$("#err_msg").show();
        				$("#msg").html("Anda Belum Memasukan Apapun!");
                nm.focus();
              } else if (nama=='') {
                $("#err_msg").show();
                $("#msg").html("Anda Belum Memasukan Nama!");
                nm.focus();
              } else if (alamat_1=='') {
                $("#err_msg").show();
                $("#msg").html("Alamat Belum Diisi!");
                ad1.focus();
              } else if (propinsi=='') {
                $("#err_msg").show();
                $("#msg").html("Propinsi belum di pilih!");
                pr.focus();
        			} else {
                      $.ajax({
                          type: "POST",
                          url:  "<?php echo base_url(); ?>" + "akun/update_akun",
                          data: JSON.stringify({ nama:nama, alamat_1:alamat_1, alamat_2:alamat_2, propinsi:propinsi,
                                                  kota:kota, kecamatan:kecamatan, kelurahan:kelurahan, zip: zip, ktp: ktp,
                                                  npwp:npwp, wp: wp, uname: '<?=$this->session->userdata('username')?>',
                                                  store_id: '<?=$this->session->userdata('store_id')?>', time: time,
                                                  hash: hash
                                              }),
                      contentType: "application/json;",
                      cache: false,
                      success: function(resultAkun){
                          var rsAkun = JSON.parse(resultAkun);
                          //alert(rsAkun);
                          if(rsAkun.status == 'SUKSES'){
                            $("#akun_err_msg").hide();
                            //$("#sukses_msg").show();
                            $("#akun_sukses_msg").fadeIn("slow");
                            $("#akun_sukses_msg").fadeOut("slow");
                            $("#akun_sukses").html(rsAkun.pesan);
                          }else{
                            $("#akun_err_msg").fadeIn("slow");
                            $("#akun_msg").html(rsAkun.pesan);
                          }
                      }
                      });
              }
        		return false;
        	});
        });
        </script>
    </body>
</html>

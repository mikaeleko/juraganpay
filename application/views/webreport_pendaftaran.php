<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css" type="text/css">
        <style media="screen">
        body{
          font-family: segoe;
        }
        h3{
          color:#404040;
        }

        input[type=submit] {
          background-color: #5689DC;
          color: rgba(255,255,255,1);
          font-family: 'Segoe UI';
          padding: 8px;
          display: inline-block;
          border-radius: 10px;
          box-shadow: none;
          cursor: pointer;
          width: 150px;
        }

        #submit-aktifasi {
          background-color: #5689DC;
          color: rgba(255,255,255,1);
          font-family: 'Segoe UI';
          padding: 8px;
          margin: 0 auto;
          display: inline-block;
          border-radius: 10px;
          box-shadow: none;
          cursor: pointer;
          width: 70px;
          text-align: center;
          vertical-align: middle;
          margin:0 auto;
        }

        input[type=reset] {
            background-color: rgb(255, 204, 0);;
            color: rgba(255,255,255,1);
            font-family: 'Segoe UI';
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid  rgb(255, 204, 0);
            border-radius: 40px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #03030345;
            cursor:pointer;
            width:100px;
        }

        #err_msg{
          color: red;  font-size:15px;
          text-align: left;
          padding:5px; display: none;
          margin:10px auto;
        }
        #msg{
          width:430px; height:40px;
          padding:2px; color:red; font-size:15px;
          text-align:left; display:table;
        }

        #msg2{
          /* border:1px solid #000;  */
          width:400px; height:40px;
          padding:2px; color:red; font-size:15px;
          text-align:center; display:table;
          margin-left: 300px;
          font-weight: bold;
        }

        .img_error{
          width: 40px; height: 40px;
          /* float: right; */
          display: block; vertical-align: bottom;
          text-align: right;
        }

        #sukses_msg{
          color: green; font-size:15px;
          text-align: left;
          /* border:1px solid #000; */
          padding:5px; display: none;
          margin:10px auto;
        }

        #sukses_msg_aktifasi{
          color: green; font-size:15px;
          text-align: left;
          /* border:1px solid #000; */
          padding:5px; display: none;
          margin:10px auto;
          width: 200px;
          padding: 5px;
          height: 65px;
        }

        #sukses{
          width:430px; height:40px;
          padding:2px; color:green; font-size:15px;
          text-align:left;display:table;

        }
        #sukses_aktifasi{
          width:300px; height:40px;
          padding:2px; color:green; font-size:15px;
          text-align:left;display:table;

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
            font-family: 'Segoe UI';
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
          font-family: 'Segoe UI';
          cursor:pointer;
        }

        .input-form{
          margin-bottom:8px;
        }

        .input-form .span-jabber{
          font-family: 'Segoe UI';
          margin: 8px;border-radius: 5px;
          font-size:15px;background-color:#FFF;
          width:90px;height:7px;
          box-shadow: 1px 1px 1px 1px #03030345;
          border: 1px solid rgb(255, 255, 255);
          display: block;padding: 8px 16px;
        }

        @media only screen and (max-width: 600px) {
          .box-login2{
            padding: 10px;
            box-shadow: 1px 1px 1px 1px #03030345;
            width:300px;
            height:auto;
            margin: auto;
            border-radius : 15px;
            background-color : rgb(248, 248, 248);
          }
        }

        .box-keterangan{
          margin: 50px 100px 50px 100px;
          border-radius:5px;
          padding:0px;
          height:auto;
          margin: 20px;
        }

        .box-pendaftaran-kanan{
          background-color: rgba(0,175,233,1);
          border-radius:5px;
          height:auto;
          margin-top: 20px;
          margin-left: 20px;
          margin-right: 20px;
          padding:30px;
          min-width:350px;
        }

        .form-pendaftaram-kiri{
          display: flex; justify-content: flex-end;
        }

        .box-pendaftaran-kiri{
          border-radius:5px;
          height:auto;
          margin: 20px;
          overflow:auto;
        }

        .title{ padding:8px 8px 8px 8px;color:#fff;text-align: center;}
        .title-text{font-size:23px;color:#FFF;text-align:center;font-weight: bold;}
        .box-title{padding:10px;background-color:rgba(0,175,233,1);border: 1px solid #b2afaf;border-bottom:none}

        .box-desc{height:auto;border:1px solid #b2afaf;padding:10px;font-size:15px;}

        .box-notes{width:auto;height:auto;}


        .desc{font-size:20px;color:#868686;padding:5px;text-align: left;}

        .box-notes .notes{font-style: italic;font-size:10px;text-align:left;color:#FFF;}
        .box-notes .label-notes{
          font-weight: bold;
          font-size:18px;
          text-align:left;
          color:#FFF;
        }

        .box-title-input{
            background-color:#FFF;
            font-family: 'Segoe UI';
            border-radius: 5px;
            padding: 5px;
            margin: 8px 0 2px 57px;
            width:200px;
            display: inline-block;
            border: 1px solid rgb(255, 255, 255);
            box-shadow: 1px 1px 1px 1px #03030345;
            height:15px;
        }
        .title-input{font-size:15px;color:#868686;padding:0px;margin:0 auto;height:30px;width:300px;margin-left: 10px;}

        .logost24{
          /* box-shadow: 0px 1px 6px 0px #888888; */
          position: absolute;
          width: 40%;
          border-radius: 300px;
          margin: 150px 0 120px 350px;
          right: -25%;
        }

        .tombol{
          float:right;background-color: transparent;width:200px;
        }

        .captcha{
          margin-top:2px ;
        }
        .captcha .btn-daftar{
          margin:10px;
        }
        body{
          font-family:'Segoe UI';
        }

        .input-horizon{
            font-family: 'Segoe UI';
            padding: 8px 16px;
            margin: 8px;
            display: inline-block;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 5px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #03030345;
            outline: none;
            height:25px;
        }
        .input-captcha{
          display:flex;justify-content:flex-end;
          margin-top:10px;
        }
        .btn-submit{
          display:flex;justify-content:flex-end;
        }
        .input-location{
          text-transform:uppercase;
        }

        .modal {
            position: absolute;
            left: 500px;
            top: 100px;
            z-index: 10;
            background-color: rgb(0,0,0);
            width: 35%;
            height: 35%;
            background-color: transparent;
            display: none;
          }

          .modal-body {
              left: 30%;
              top: 17%;
              position: absolute;
              background-color: white;
              padding-left: 10px;
              padding-right: 10px;
              border-radius: 5px;
              animation-name: modalSlide;
              animation-duration: 0.4s;
          }

          .alert-info {
              color: green;
              background-color: rgba(0,175,233, 0.205);
          }

          .modal-title button {
              background-color: rgba(255,255,255,1);
              color: rgba(0,175,233,1);
              font-family: Segoe UI;
              font-size: 13;
              padding: 8px;
              display: inline-block;
              border: 1px solid rgba(255,255,255,1);
              border-radius: 30px;
              box-sizing: border-box;
              box-shadow: 1px 1px 1px 1px #ccc;
              cursor: pointer;
              margin:5px auto;
            }

            .modal-title p{
              font-family: 'Segoe UI';
              padding:5px;
              border-radius:2px;
            }
            .modal-title {
              border-radius:5px;
            }

            .img_error {
                width: 40px;
                height: 40px;
                /* float: right; */
                display: block;
                vertical-align: bottom;
                text-align: center;
                vertical-align: middle;
                margin: 0 auto;
            }

            .img_sukses {
                width: 40px;
                height: 40px;
                display: block;
                vertical-align: middle;
                text-align: center;
                margin: 0 auto;
                position: absolute;
                top: 165px;
                left: 180px;
            }

            .img_sukses_aktifasi {
              width: 40px;
              height: 40px;
              display: block;
              vertical-align: middle;
              text-align: center;
              margin: 0 auto;
              position: absolute;
              top: 130px;
              left: 220px;
            }

            #sukses {
                width: 430px;
                height: 40px;
                padding: 2px;
                color: green;
                font-size: 15px;
                text-align: center;
                display: table;
            }
            #msg {
                width: 430px;
                height: 40px;
                padding: 2px;
                color: red;
                font-size: 15px;
                text-align: center;
                display: table;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php include ("menu2.php"); ?>

            <div class="body-container smooth">
                <!-- ALERT MODAL -->
                <div id="modal-tiket" class="modal">

                  <div class="modal-body">
                    <div class="modal-title">
                        <p>Perhatian!
                        <button style="position:absolute;right:10px;top:10px" class="button"><img width="20px" onclick="closeModalTiket()" src="<?=base_url()?>images/asset/close.svg" alt=""></button>
                        </p>
                    </div>
                    <div style="padding:10px;text-align:center">
                        <div class="container-tiket-modal">
                          <div class="alert alert-info">
                            <span class="text-alert">

                              <div id='err_msg' style="font-weight:bold;">
                                <div id='content_result'>
                                  <div id='err_show' class="w3-text-red">
                                    <div style="">
                                      <img class="img_error" src="<?=base_url()?>/images/icon/warning.png">
                                    </div>
                                    <div id='msg'> </div>

                                  </div>
                                </div>
                              </div>

                              <div id='sukses_msg' style="display:none;font-weight:bold;">
                                <div id='content_result'>
                                  <div id='sukses_show' class="w3-text-red">
                                    <div>
                                      <img class="img_sukses" src="<?=base_url()?>/images/icon/save.png">
                                    </div>
                                    <div id='sukses'> </div>

                                  </div>
                                </div>
                              </div>

                            </span>
                          </div>
                        </div>
                        <div>
                            <input type="submit" id="btn-tutup" value="OK!" onclick="closeModalTiket()">
                        </div>
                    </div>


                  </div>
                </div>



                <div class="row">
                  <div class="col-desk-6">
                    <div class="row form-pendaftaram-kiri">
                      <div class="col-desk-7 col-md-12 col-sm-12">
                        <div class="box-pendaftaran-kiri">
                          <div class="box-title">
                            <span class="title">Pendaftaran</span>
                          </div>

                          <div class="box-desc">
                              <table width="100%" style="font-size:15px;color:#868686;">
                                <tr>
                                  <td colspan="3">
                                    <table width="100%" style="font-size:20px;color:#868686;">
                                      <tr>
                                        <td colspan="2">
                                              Silahkan hubungi Customer Service Kami
                                        </td>
                                        <td></td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="3" style="height:20px;"></td>
                                </tr>
                                <tr>
                                  <td width="20%">Telegram</td>
                                  <td>: <?= TELEGRAM ?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td width="20%">Add Number</td>
                                  <td>: <?= NUMBER ?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td width="20%">Office</td>
                                  <td>: <?= OFFICE ?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td width="20%">IT Solution</td>
                                  <td>: <?= IT ?></td>
                                  <td></td>
                                </tr>
								 <tr>
                                  <td width="20%">IT Solution</td>
                                  <td>: <?= IT ?></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td colspan="3" style="height:20px;"></td>
                                </tr>
                                <tr>
                                  <td colspan="3">
                                    Salam Sukses
                                  </td>
                                </tr>
                              </table>

                          </div>
                          <div class="box-title">
                            <span class="title">Deposit Saldo</span>
                          </div>
                          <div class="box-desc">
                            <table width="100%" style="font-size:15px;color:#868686;">
                              <tr>
                                <td colspan="3">
                                  <table width="100%" style="font-size:20px;color:#868686;">
                                    <tr>
                                      <td colspan="2">
                                            Deposit bisa dilakukan secara setor tunai ke kantor kami, atau bisa juga via tiket transfer bank :
                                      </td>
                                      <td></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" style="height:20px;"></td>
                              </tr>
                              <tr>
                                <td width="20%">Ketik</td>
                                <td>: TIKET.BANK.NOMINAL.PIN</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td width="20%">Contoh</td>
                                <td>: TIKET.BCA.1000000.1234</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td width="20%">Kirm Ke</td>
                                <td>: SMS CENTER</td>
                                <td></td>
                              </tr> 
							  <tr>
                                <td width="20%">Rekening Tujuan</td>
                                <td>: Bank Mandiri 1180007641698 a.n. PT. Surya Global Teknologi</td>
                                <td></td>
                              </tr>

                              <tr>
                                <td colspan="3" style="height:20px;"></td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                  <table width="100%" style="font-size:20px;color:#868686;">
                                    <tr>
                                      <td colspan="2">
                                            INGAT! Jumlah transfer dan rekening tujuan transfer harus sesuai dengan SMS notifikasi. Keterangan lebih lengkap, Hubungi Customer Service
                                      </td>
                                      <td></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class="box-title">
                            <span class="title">Transaksi</span>
                          </div>
                          <div class="box-desc">
                              <span class="desc">Setelah anda memiliki saldo deposit,<br>
                              anda sudah bisa melakukan transaksi via SMS.<br>
                              TELEGRAM, JABBER, IP XML, HTTP Get, ISO.</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-desk-6">
                    <div class="row">
                      <div class="col-desk-7">
                      <div class="box-pendaftaran-kanan" style="position:relative">
                        <img class="logost24" src="<?php echo base_url() ?>images/asset/default-user.png" alt="">
                          <div class="title">
                            <span class="title-text">PENDAFTARAN</span>
                          </div>
                          <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>


                          <!-- AKTIFASI KODE-->
                          <div id="box-aktifasi"style="display:none;margin:10px 0px 10px 0px;box-shadow: 0px 1px 6px 0px #fff;padding:20px;z-index:10000;border: 5px solid #FFF;border-radius: 5px;">
                            <div class="box-notes" style="">
                              <p class="notes" style="margin:0;font-size:18px;">Masukan Kode Aktifasi Anda Disini</p>
                            </div>
                            <div id='sukses_msg_aktifasi' style="background-color:rgb(255,255,255, 0.2);font-weight:bold;    margin: 0;width: auto;">
                              <div id='content_result'>
                                <div id='sukses_show_aktifasi' class="w3-text-red">
                                  <div>
                                    <img class="img_sukses_aktifasi" src="<?=base_url()?>/images/icon/save.png">
                                    <div id='sukses_aktifasi'> </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                            <form id="form-aktifasi" action="" method="post">
                              <div id="aktifasi" class="input-form" >
                                <input id="input_aktifasi" type="text" name="password" placeholder="..." style="width:180px;height:30px;" maxlength="4" onkeyup="angka(this);"><br>
                                <input id="uname_msisdn" type="hidden" name="uname_msisdn"><input id="stid" type="hidden" name="stid">
                                <!-- <input id="cancel" type="reset" value="<< Cancel" style="display:block;background-color: #5689DC;color: rgba(255,255,255,1);font-family: 'Segoe UI'; padding: 8px;margin: 8px 0;display: inline-block;border-radius: 40px;box-sizing: border-box; cursor: pointer; width: 100px;"> -->
                                <input id="submit-aktifasi" class="right" type="submit" value="Aktifasi" >
                                <input id="cancel" class="right" type="submit" value="<<Cancel" style="background-color:rgb(255, 204, 0);"><br>
                                <p id="resendcode" style="color:#fff; font-weight:bold;font-size:15px; font-style: italic;text-decoration:underline;cursor:pointer; text-align:center;">Kirim Ulang Kode Aktifasi</p>
                              </div>
                            </form>
                          </div>

                          <form style="display:block"; id="form-daftar" class="form" autocomplete="off">
                            <div class="input-form">
                              <input class="input input-location" id="nm_perusahaan" class="input" type="text" name="nm_perusahaan" placeholder="Nama Perusahaan*">
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="address1" type="text" name="address1" placeholder="Alamat 1*">
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="address2" type="text" name="address2" placeholder="Alamat 2">
                            </div>
                            <div class="input-form">
                              <select onclick="clear_select_border()" id="kd_prov" class="input input-location" name="kd_prov">
                                  <option value="">--Propinsi--</option>
                                  <?php foreach($propinsi as $propinsi):?>
                                  <option value="<?php echo $propinsi->ID;?>"> <?php echo $propinsi->NAME;?> </option>
                                  <?php endforeach;?>
                              </select>
                            </div>
                            <div class="input-form">
                              <select id="kd_kota" class="input input-location" name="kd_kota">
                                <option value="">--Kota/Kabupaten--</option>
                                <option value=""></option>
                              </select>
                            </div>
                            <div class="input-form">
                              <select id="kd_kec" class="input input-location" name="kd_kec">
                                <option value="">--Kecamatan--</option>
                                <option value=""> </option>
                              </select>
                            </div>
                            <div class="input-form">
                              <select id="kd_kel" class="input input-location" name="kd_kel">
                                <option value="">--Kelurahan--</option>
                                <option value=""> </option>
                              </select>
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="zip" type="text" name="zip" placeholder="Kode Pos" maxlength="5" onkeyup="angka(this);">
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="owner" type="text" name="owner" placeholder="Owner*">
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="msisdn" type="text" placeholder="No MSISDN*" name="msisdn" onkeyup="angka(this);">
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="npwp" type="text" name="npwp" placeholder="NPWP" onkeyup="angka(this);">
                            </div>
                            <div class=" box-notes">
                              <p class="notes">Bila membutuhkan faktur atau perusahaan PKP</p>
                            </div>
                            <div class="input-form">
                              <input class="input input-location" id="nm_wp" type="text" name="nm_wp" placeholder="Nama Wajib Pajak">
                            </div>

                            <div class="row">
                              <div class="col-desk-6">
                                <div class="input-form" >
                                  <input class="input input-small" id="password" type="password" name="password" placeholder="Web Password*">
                                </div>
                              </div>
                              <div class="col-desk-6">
                                <div class="input-form" >
                                  <input class="input input-small" id="password2" type="password" name="password2" placeholder="Confirm Web Password*">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input class="input input-small" id="pin" type="password" name="pin" placeholder="Pin*" maxlength="4" onkeyup="angka(this);">
                                </div>
                              </div>
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input class="input input-small" id="pin2" type="password" name="pin2" placeholder="Confirm Pin*" maxlength="4" onkeyup="angka(this);">
                                </div>
                              </div>
                            </div>

                            <div class="box-notes" >
                              <span class="label-notes">Jabber ID</span>
                            </div>
                            <div class="box-notes">
                              <span class="notes">Untuk keamanan bertransaksi diharapkan menggunakan IP2IP ter-encrypted</span>
                            </div>

                            <div class="row">
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="jabber1" type="text" name="jabber1" placeholder="Jabber #1" class="input input-small">
                                </div>
                              </div>
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="jabber2" type="text" name="jabber2" placeholder="Jabber #1" class="input input-small">
                                </div>
                              </div>
                            </div>

                            <div class=" box-notes">
                              <span class="label-notes">IP Statis</span>
                            </div>

                            <div class="row">
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="ips1" type="text" name="ips1" placeholder="IP Static #1" class="input input-small" onkeyup="angka(this);">
                                </div>
                              </div>
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="ips2" type="text" name="ips2" placeholder="IP Static #2" class="input input-small" onkeyup="angka(this);">
                                </div>
                              </div>
                            </div>

                            <div class="input-form">
                              <input id="ips3" type="text" name="ips3" placeholder="IP Static #3" class="input input-small" onkeyup="angka(this);">
                            </div>
                            <div class=" box-notes">
                              <span class="label-notes">Reverse URL</span>
                            </div>

                            <div class="row">
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="rurl1" type="text" name="rurl1" placeholder="Reverse URL #1" class="input input-small">
                                </div>
                              </div>
                              <div class="col-desk-6">
                                <div class="input-form">
                                  <input id="rurl2" type="text" name="rurl2" placeholder="Reverse URL #2" class="input input-small">
                                </div>
                              </div>
                            </div>

                            <div class="input-form" >
                              <input id="rurl3" type="text" name="rurl3" placeholder="Reverse URL #3" class="input input-small">
                            </div>
                            <div class="captcha">
                              <div class="row">
                                <div class="col-desk-12">
                                <img id="captcha" style="width:95%" src="<?=site_url('jabbers/securimage')?>" alt='captcha' />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-12">
                                  <div class="input-captcha">
                                    <input class="input"id="capcode" type="text" name="captcha_code" size="15" placeholder="Input Captcha" style="width:130px;">
                                      <img onclick="refreshCaptcha()" style="cursor:pointer;height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-12">
                                  <div class="btn-submit">
                                    <input id="submit" class="btn-daftar" type="submit" value="Daftar" >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script src="<?php echo base_url() ?>assets/js/modal.js"></script>
<script type="text/javascript">



function angka(e) {
  var x      ="";
  var hasil ="";
  if (!/^[0-9]+$/.test(e.value)) {
    e.value = e.value.substring(0,e.value.length-1);
  }
}


var username = "";
var store_id  = "";

function getDateTime() {

    var now     = new Date();
    var year    = now.getFullYear();
    var month   = now.getMonth()+1;
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
    return dateTime;
}

function clear_input(){
  document.getElementById('nm_perusahaan').value="";
  document.getElementById('address1').value="";
  document.getElementById('address2').value="";
  document.getElementById('zip').value="";
  document.getElementById('owner').value="";
  document.getElementById('msisdn').value="";
  document.getElementById('npwp').value="";
  document.getElementById('nm_wp').value="";
  document.getElementById('password').value="";
  document.getElementById('password2').value="";
  document.getElementById('pin').value="";
  document.getElementById('pin2').value="";
  document.getElementById('jabber1').value="";
  document.getElementById('jabber2').value="";
  document.getElementById('ips1').value="";
  document.getElementById('ips2').value="";
  document.getElementById('ips3').value="";
  document.getElementById('rurl1').value="";
  document.getElementById('rurl2').value="";
  document.getElementById('rurl3').value="";
}

function select_border(){
  var select = document.getElementById("kd_prov");
  select.style.border = "3px solid red";
}

function clear_select_border(){
  var select = document.getElementById("kd_prov");
  select.style.border = "none";

}

function refreshCaptcha(){
  // console.log("refresh captcha");
  $('#captcha').attr('src', "<?=site_url('pendaftaran/securimage')?>#"+new Date().getTime());
  $("#capcode").val("");
}


function closeModalTiket(){
  var x = document.getElementById("msg").innerHTML;

  if (x.includes("Apapun") ){
    $('#modal-tiket').hide();
    $("#nm_perusahaan").focus();
  }
  if (x.includes("ALAMAT") ){
    $('#modal-tiket').hide();
    $("#address1").focus();
  }
  if (x.includes("PROVINSI") ){
    $('#modal-tiket').hide();
    $("#kd_prov").focus();
  }
  if (x.includes("Nama OWNER belum di isi") ){
    $('#modal-tiket').hide();
    $("#owner").focus();
  }
  if (x.includes("Nomor MSISDN belum di isi") ){
    $('#modal-tiket').hide();
    $("#msisdn").focus();
  }
  if (x.includes("MSISDN SALAH") ){
    $('#modal-tiket').hide();
    $("#msisdn").focus();
  }
  if (x.includes("PASSWORD") ){
    $('#modal-tiket').hide();
    $("#password").focus();
  }
  if (x.includes("KONFIRMASI PASSWORD") ){
    $('#modal-tiket').hide();
    $("#password2").focus();
  }
  if (x.includes("PIN belum di isi") ){
    $('#modal-tiket').hide();
    $("#pin").focus();
  }
  if (x.includes("KONFIRMASI PIN") ){
    $('#modal-tiket').hide();
    $("#pin2").focus();
  }
  if (x.includes("CAPTCHA belum diisi") ){
    $('#modal-tiket').hide();
    $("#capcode").focus();
  }
  if (x.includes("PASSWORD tidak sama") ){
    $('#modal-tiket').hide();
    $("#password").focus();
  }
  if (x.includes("PIN tidak sama") ){
    $('#modal-tiket').hide();
    $("#pin").focus();
  }
  if (x.includes("Harap Refresh kembali Kode Captcha") ){
    $('#modal-tiket').hide();
    $("#capcode").focus();
  }
  if (x.includes("Password tidak sesuai") ){
    $('#modal-tiket').hide();
    $("#password").focus();
  }
  if (x.includes("MSISDN harus numeric") ){
    $('#modal-tiket').hide();
    $("#msisdn").focus();
  }
  if (x.includes("Nomor MSISDN Yang Anda Masukan") ){
    $('#modal-tiket').hide();
    $("#msisdn").focus();
  }
  if (x.includes("Selamat") ){
    location.reload();
  }
  if (x.includes("Kode Aktifasi Yang Anda Masukan Salah") ){
    $('#modal-tiket').hide();
    $("#input_aktifasi").focus();
  }
  if (x.includes("FORMAT IP STATIC #1 SALAH") ){
    $('#modal-tiket').hide();
    $("#ips1").focus();
  }
  if (x.includes("FORMAT IP STATIC #2 SALAH") ){
    $('#modal-tiket').hide();
    $("#ips2").focus();
  }
  if (x.includes("FORMAT IP STATIC #3 SALAH") ){
    $('#modal-tiket').hide();
    $("#ips3").focus();
  }
  if (x.includes("FORMAT RURL #1 SALAH") ){
    $('#modal-tiket').hide();
    $("#rurl1").focus();
  }
  if (x.includes("FORMAT RURL #2 SALAH") ){
    $('#modal-tiket').hide();
    $("#rurl2").focus();
  }
  if (x.includes("FORMAT RURL #3 SALAH") ){
    $('#modal-tiket').hide();
    $("#rurl3").focus();
  }

}

function openModalTIket(v) {
  if (v == 'SEMUA') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Anda Belum Memasukan Apapun!");
    return;
  } else if (v == 'ADDRESS') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("ALAMAT Masih Kosong!");
    return;
  } else if (v == 'PROV') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("PROVINSI belum di pilih!");
    return;
  } else if (v == 'OWNER') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Nama OWNER belum di isi!");
    return;
  } else if (v == 'MSISDN') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Nomor MSISDN belum di isi!");
    return;
  } else if (v == 'PASSWORD') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("PASSWORD belum di isi!");
    return;
  } else if (v == 'PASSWORD2') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("KONFIRMASI PASSWORD belum di isi!");
    return;
  } else if (v == 'PIN') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("PIN belum di isi!");
    return;
  } else if (v == 'PIN2') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("KONFIRMASI PIN belum di isi!");
    return;
  } else if (v == 'PIN BEDA') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("PIN tidak sama!");
    return;
  } else if (v == 'CAPCODE') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("CAPTCHA belum diisi!");
    return;
  } else if (v == 'PASSWORD BEDA') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("PASSWORD tidak sama!");
    return;
  } else if (v == 'CAPTCHA FAILED') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Harap Refresh kembali Kode Captcha!");
    return;
  } else if (v =='PASSWORD NOT MATCH REGEX') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Password tidak sesuai!, Minimal harus 8 karakter, mengandung huruf besar, huruf kecil dan angka");
    return;
  } else if (v == 'MSISDN NOT MATCH') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("MSISDN harus numeric & di awali dengan 62!");
    return;
  } else if (v == 'MSISDN SUDAH ADA') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Nomor MSISDN Yang Anda Masukan Sudah Terdaftar!");
    return;
  } else if (v == 'AKTIF') {
    $('#modal-tiket').show();
    $('#modal-title').hide();
    $("#err_msg").hide();
    $("#sukses_msg").show();
    $("#msg").html("Selamat, Akun Anda Sudah Aktif!");
  } else if (v == 'SALAH') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("Kode Aktifasi Yang Anda Masukan Salah, Harap Cek Kembali Inbox Anda!!");
  }
    else if (v == 'FORMAT IP STATIC #1') {
    $('#modal-tiket').show();
    $("#sukses_msg").hide();
    $("#err_msg").show();
    $("#msg").html("FORMAT IP STATIC #1 SALAH!!");
  }
  //else if (v == 'FORMAT IP STATIC #2') {
  //   $('#modal-tiket').show();
  //   $("#sukses_msg").hide();
  //   $("#err_msg").show();
  //   $("#msg").html("FORMAT IP STATIC #2 SALAH!!");
  // } else if (v == 'FORMAT IP STATIC #3') {
  //   $('#modal-tiket').show();
  //   $("#sukses_msg").hide();
  //   $("#err_msg").show();
  //   $("#msg").html("FORMAT IP STATIC #3 SALAH!!");
  // } else if (v == 'RURL #1') {
  //   $('#modal-tiket').show();
  //   $("#sukses_msg").hide();
  //   $("#err_msg").show();
  //   $("#msg").html("FORMAT URL #1 SALAH!!");
  // } else if (v == 'RURL #2') {
  //   $('#modal-tiket').show();
  //   $("#sukses_msg").hide();
  //   $("#err_msg").show();
  //   $("#msg").html("FORMAT URL #2 SALAH!!");
  // } else if (v == 'RURL #3') {
  //   $('#modal-tiket').show();
  //   $("#sukses_msg").hide();
  //   $("#err_msg").show();
  //   $("#msg").html("FORMAT URL #3 SALAH!!");
  // }


}
var modal = document.getElementById("modal");


$(document).ready(function(){


  $("#submit-aktifasi").click(function(event){
    event.preventDefault();
    var kode = $("#input_aktifasi").val();
    var stid = $("#stid").val();
    var uname_msisdn = $("#uname_msisdn").val();
    var t = getDateTime();
    var h = sha1(kode + t);

    if(kode==""){
      $("#cancel").hide();
      $("#err_msg").show();
      $("#msg").html("Silahkan Masukan Kode Aktifasi Anda!");
      $("#input_aktifasi").focus();
    } else {
      $.ajax({
        type: "POST",
        url :  "<?php echo base_url(); ?>" + "pendaftaran/aktifasi",
        data: JSON.stringify({
                              kode: kode,
                              stid:stid,
                              uname_msisdn:uname_msisdn,
                              t: t,
                              h: h
                            }),
        contentType: "application/json;",
        cache: false,
        success: function(resultAktif){
            $("#err_msg").hide();
            loading.display   = "none";
            var rsAktif = JSON.parse(resultAktif);
            if(rsAktif.status == 'SUKSES'){
              openModalTIket('AKTIF');
            } else {
              openModalTIket('SALAH');
              // $("#err_msg").show();
              // $("#msg").html(rsAktif.pesan);
            }
        }
      });
    }
  });


  $("#resendcode").click(function(){
      var msisdn = $("#uname_msisdn").val();
      var stid = $("#stid").val();
      var t = getDateTime();
      var h = sha1(msisdn + stid + t);

        $.ajax({
         type: "POST",
         url :  "<?php echo base_url(); ?>" + "pendaftaran/resendcode",
         data: JSON.stringify({msisdn: msisdn, stid:stid , t:t,  h: h}),
         contentType: "application/json;",
         cache: false,
         success: function(result){
            var resultRes = JSON.parse(result);
             if(resultRes.status == 'BERHASIL') {
               $("#err_msg").hide();
               $("#sukses_msg_aktifasi").fadeIn();
               $("#sukses_aktifasi").html("");
               $("#sukses_aktifasi").html(resultRes.pesan);
             } else if (resultRes.status == 'GAGAL') {
               $("#err_msg").show();
               $("#msg").html(resultRes.pesan);
               document.getElementById('resetcode').value="";
               $("#resetcode").focus();
             }
         }
        });
      return false;
  });


  $("#submit").click(function(event){
    event.preventDefault();
    var regpass=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    var regpin  = /\d{6}/ ;
    var regurl = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
    var regip   = /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    var regip2 = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    var reghp = /^(\\62)?([0-9]){2}([0-9]){10,12}/;
    var regip3 = /^([0-9]{1,2}|(0)[0-9]{1,2}|(1)[0-9]{1,2}|(2)[0-4]?[0-9]?|(2)(5)[0-5]?)\.([0-9]{1,2}|(0)[0-9]{1,2}|(1)[0-9]{1,2}|(2)[0-4]?[0-9]?|(2)(5)[0-5]?)$/;
     // ^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$

    var pass    = document.getElementById('password');
    var pass2   = document.getElementById('password2');
    var pin     = document.getElementById('pin');
    var pin2    = document.getElementById('pin2');
    var loading = document.getElementById('loading').style;
    var prov = document.getElementById('kd_prov').style;
    var submit = document.getElementById('submit');
    var refresh = document.getElementById('refresh');

    var nama = $("#nm_perusahaan").val();
    var address1 = $("#address1").val();
    var address2 = $("#address2").val();
    var kd_prov = $("#kd_prov").val();
    var kd_kota = $("#kd_kota").val();
    var kd_kec = $("#kd_kec").val();
    var kd_kel = $("#kd_kel").val();
    var zip = $("#zip").val();
    var owner = $("#owner").val();
    var msisdn = $("#msisdn").val();
    var npwp = $("#npwp").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    var pin = $("#pin").val();
    var pin2 = $("#pin2").val();
    var ips1 = $("#ips1").val();
    var ips2 = $("#ips2").val();
    var ips3 = $("#ips3").val();
    var rurl1 = $("#rurl1").val();
    var rurl2 = $("#rurl2").val();
    var rurl3 = $("#rurl3").val();
    var jabber1 = $("#jabber1").val();
    var jabber2 = $("#jabber2").val();
    var nm_wp = $("#nm_wp").val();
    var capcode = $("#capcode").val();
    var t = getDateTime();
    var hash = sha1(nama + owner + msisdn + npwp + nm_wp + password + pin + t);

    if(ips1 =='') {
      ips1 = "0.0.0.0";
    } else {
      if(!ips1.match(regip3)) {
        openModalTIket('FORMAT IP STATIC #1');
      }
    }

    if(ips2 =='') {
      ips2 = "0.0.0.0";
    } else {
      if(!ips2.match(regip3)) {
        openModalTIket('FORMAT IP STATIC #2');
      }
    }

    if(ips3 =='') {
      ips3 = "0.0.0.0";
    } else {
      if(!ips3.match(regip3)) {
        openModalTIket('FORMAT IP STATIC #3');
      }
    }

  if (rurl1=='') {
     rurl1 = null;
  } else {
    if(!rurl1.match(regurl)) {
      // $("#err_msg").show();
      // $("#msg").html("Format yang di masukan salah!");
      // $("#rurl1").focus();
      openModalTIket('RURL #1');
    }
  }

  if (rurl2=='') {
     rurl2 = null;
  } else {
    if(!rurl2.match(regurl)) {
      openModalTIket('RURL #2');
    }
  }

  if (rurl3=='') {
     rurl3 = null;
  } else {
    if(!rurl3.match(regurl)) {
      openModalTIket('RURL #3');
    }
  }

  if (jabber1=='') {
    jabber1 = null;
  }

  if (jabber2=='') {
    jabber2 = null;
  }




    if(nama==''&& address1=='' && owner=='' && capcode == '' && msisdn == '' && password == '' && password2 == '' && pin == '' && pin2 == '') {
      openModalTIket('SEMUA');
    } else if (nama=='') {
      openModalTIket('NAMA');
    } else if (address1=='') {
      openModalTIket('ADDRESS');
    } else if( !$('#kd_prov').val() ) {
      openModalTIket('PROV');
    } else if (owner=='') {
      openModalTIket('OWNER');
    } else if (msisdn=='') {
      openModalTIket('MSISDN');
    } else if (password=='') {
      openModalTIket('PASSWORD');
    } else if (password2=='') {
      openModalTIket('PASSWORD2');
    } else if (pin=='') {
      openModalTIket('PIN');
    } else if (pin2=='') {
      openModalTIket('PIN2');
    } else if (capcode=='') {
      openModalTIket('CAPCODE');
    } else {
       if(password!=password2){
         openModalTIket('PASSWORD BEDA');
       }
       if(pin!=pin2){
         openModalTIket('PIN BEDA');
       }

       //cek regex msisdn
       if(!msisdn.match(reghp) || !msisdn.startsWith('62')  ) {
         openModalTIket('MSISDN NOT MATCH');
       } else {
         //cek regex password
         if(password.match(regpass)) {
            $("#err_msg").hide();
            loading.display   = "block";
            $.ajax({
              type: "POST",
              url :  "<?php echo base_url(); ?>" + "pendaftaran/daftar?uname="+msisdn,
              data: JSON.stringify({
                                    nama: nama,
                                    address1: address1,
                                    address2: address2,
                                    kd_prov: kd_prov,
                                    kd_kota: kd_kota,
                                    kd_kec:kd_kec,
                                    kd_kel:kd_kel,
                                    zip:zip,
                                    owner : owner,
                                    msisdn : msisdn,
                                    npwp : npwp,
                                    nm_wp:nm_wp,
                                    password:password,
                                    pin:pin,
                                    pin2:pin2,
                                    jabber1 : jabber1,
                                    jabber2 : jabber2,
                                    ips1 : ips1,
                                    ips2 : ips2,
                                    ips3 : ips3,
                                    rurl1 : rurl1,
                                    rurl2 : rurl2,
                                    rurl3 : rurl3,
                                    capcode : capcode,
                                    t: t,
                                    hash: hash
                                  }),
              contentType: "application/json;",
              cache: false,
              success: function(resultDaftar){
                  $("#err_msg").hide();
                  loading.display   = "none";
                  var rsDaftar = JSON.parse(resultDaftar);
                  //alert(rsDaftar);
                  if(rsDaftar.status == 'SUKSES'){
                    document.getElementById('input_aktifasi').value="";
                    $("#err_msg").hide();
                    $("#sukses_msg").fadeIn();
                    $("#sukses_msg").fadeOut(3000);
                    $("#sukses").html(rsDaftar.pesan);
                    $("#form-daftar").hide();
                    $("#box-aktifasi").show();
                    $("#input_aktifasi").focus();
                    $("#uname_msisdn").val(rsDaftar.msisdn);
                    $("#stid").val(rsDaftar.stid);
                  }else if(rsDaftar.status == 'MSISDN'){
                    // $("#sukses_msg").hide();
                    // $("#err_msg").show();
                    // $("#msg").html(rsDaftar.pesan);
                    // $("#msisdn").focus();
                    openModalTIket('MSISDN SUDAH ADA');
                  } else if(rsDaftar.status == 'CAPTCHA FAILED'){
                    openModalTIket('CAPTCHA FAILED');
                  } else {
                    $("#err_msg").show();
                    $("#msg").html(rsDaftar.pesan);
                  }
              }
            });
          } else {
            // $("#err_msg").show();
            // $("#msg").html("Password tidak sesuai!, Minimal harus 8 karakter, mengandung huruf besar, huruf kecil dan angka");
            // $("#password").focus();

            openModalTIket('PASSWORD NOT MATCH REGEX');
          }

       }

      }
    return false;
  });


   $('#kd_prov').change(function(){
         var id_prop = $(this).val();
         $.ajax({
             type   : "POST",
             url    : "<?php echo base_url(); ?>" + "pendaftaran/get_kota",
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
                   $("#kd_kota").html(html);
                 }
             },
             error: function(error){

             }
         });
         return false;
   });

   $('#kd_kota').change(function(){
         var id_kota = $(this).val();
         $.ajax({
             type   : "POST",
             url    : "<?php echo base_url(); ?>" + "pendaftaran/get_kecamatan",
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
                   $('#kd_kec').html(html);
                 }
             },
             error : function(error){
             }
         });
         return false;
   });

   $('#kd_kec').change(function(){
         var id_kecamatan = $(this).val();
         $.ajax({
             type   : "POST",
             url    : "<?php echo base_url(); ?>" + "pendaftaran/get_kelurahan",
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
                   $('#kd_kel').html(html);
                 }
             },
             error: function(error){
             }
         });
         return false;
   });

});
</script>

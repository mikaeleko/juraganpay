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
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <style media="screen">

        .label-akun, .label-pass, .label-tiket{
          cursor:pointer;
          color:#404040;
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
          display:table-cell;
        }
        form{
          padding:10px;
        }
        .icon-bank{
          width: 100px;
          height: 80px;
          margin: 5px;
        }


        </style>
    </head>
    <body>
        <div class="container smooth">

            <div class="header">
                <div class="row">
                    <div class="col-desk-2">
                        <div style="padding: 10px;">
                            <img width="50px" class="logo" height="50px" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png">
                            <img id="left-menu" onclick="openMenu()" src="<?php echo base_url() ?>/images/asset/menu.svg" class="nav-menu">
                            <img width="70%" class="logo-st24" height="auto" src="<?php echo base_url() ?>/images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7">
                        <div style="padding: 10px;">
                            <div class="box-header"><span class="box-hrader-title">HOME</span></div>
                        </div>
                    </div>
                    <div class="col-desk-3">
                        <div style="widht:100%;margin-right:20px;">
                            <div class="row">
                                <div class="col-desk-6">
                                    <div style="float:left; margin-top: 13px;">
                                        <a id="info-news" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?php echo base_url() ?>/images/asset/assetwebsite-19.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">6</span></a>
                                        <a id="info-inbox" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?php echo base_url() ?>/images/asset/assetwebsite-15.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">3</span> </a>
                                        <!-- <a id="info-notif" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?php echo base_url() ?>/images/asset/assetwebsite-14.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">1</span></a> -->
                                        <div class="box-primary box-msg-news" id="box-info-news">
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
                                        </div>
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
                                    <!-- <div style="float:right;margin-right:25">
                                        <div style="float:left;margin-top: 13px;margin-right:25">

                                        </div>
                                        <div style="margin-top: 13px;margin-right:25">

                                        </div>
                                    </div> -->
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
                                    <div class="col-desk-4">
                                        <h3 class="label-akun">Seting Account</h3>
                                    </div>
                                    <div class="col-desk-4">
                                        <h3 class="label-pass">Ganti Password</h3>
                                    </div>
                                    <div class="col-desk-4">
                                        <h3 class="label-tiket">Tiket Deposit</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--FORM PASSWORD -->
                                  <div class="col-desk-6 pass" >
                                      <div class="box-form">
                                          <form>
                                              <div id='err_msg' style='display: none; '>
                                                <div id='content_result'>
                                                  <div id='err_show' class="w3-text-red">
                                                    <div id='msg' style="border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;"> </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="containerResponse" id="idResponse">
                                                  Selamat Datang
                                              </div>

                                              <div class="label-form">
                                                <label>Password Lama</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passold" type="password" name="passold">
                                              </div><br>
                                              <div class="label-form">
                                                <label>Pasword Baru</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passnew" type="text" name="passnew" >
                                              </div> <br>
                                              <div class="label-form">
                                                <label>Ketik Ulang Password Baru</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="passnew2" type="text" name="passnew2">
                                              </div> <hr>
                                              <div class="to-right">
                                                  <input class="right" type="reset" value="Reset">
                                                  <input id="submit-pass" type="submit">
                                              </div>
                                          </form>

                                      </div>
                                  </div>

                                  <!--FORM AKUN -->
                                  <div class="col-desk-6 akun" style="display:none;">
                                      <div class="box-form">
                                          <form class="form">
                                            <div class="label-form">
                                              <label>Kode Agen</label>
                                            </div>
                                            <div class="input-form">
                                              <input id="kode" type="text" name="kd_agen">
                                            </div>
                                            <br>
                                            <div class="label-form">
                                              <label>Nama</label>
                                            </div>
                                            <input id="nama" type="text" name="nama"><hr>
                                            <input class="right" type="reset" name="" value="Reset">
                                            <input id="submit-akun" class="right" type="submit" value="Submit">
                                          </form>
                                      </div>
                                  </div>

                                    <!--FORM TIKET -->
                                  <div class="col-desk-6 tiket" style="display:none;">
                                      <div class="box-form">
                                          <form class="form">
                                            <div class="label-form">
                                              <label>Nominal</label>
                                            </div>
                                            <div class="input-form">
                                              <input id="nominal" type="text" name="nominal" value="">
                                            </div> <br>
                                            <img class="icon-bank" src="<?=base_url()?>assets/img/bca.png" alt="">
                                            <img class="icon-bank" src="<?=base_url()?>assets/img/bri.png" alt="">
                                            <img class="icon-bank" src="<?=base_url()?>assets/img/bni.png" alt="">
                                            <img class="icon-bank" src="<?=base_url()?>assets/img/mandiri.png" alt="">
                                            <hr>
                                            <input class="right" type="submit" name="" value="Submit">
                                            <input id="submit-tiket" class="right" type="reset" name="" value="Reset">
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
        <script>

        // function PasswordRegex(inputStr){
        //     var passwordRegexStr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        //     var passwordRegex = new RegExp(passwordRegexStr);
        //     return passwordRegex.test(inputStr);
        // }
        //
        // function regClick(){
        //   var inputStr = document.getElementById("passnew").value;
        //   var Result = PasswordRegex(inputStr);
        //   var ResultStr = Result?"Password [" + inputStr + "] memenuhi syarat":
        //       "Password [" + inputStr + "] tidak memenuhi syarat. Password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka";
        //       document.getElementById("msg").innerHTML = ResultStr;
        //       document.getElementById("passnew").focus();
        // }

        // function testPasswordRegex(inputStr){
        //     var passwordRegexStr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        //     var passwordRegex = new RegExp(passwordRegexStr);
        //     return passwordRegex.test(inputStr);
        // }
        //
        // function testClick(){
        //     var inputStr = document.getElementById("passnew").value;
        //     var testResult = testPasswordRegex(inputStr);
        //     var testResultStr = testResult?"Password [" + inputStr + "] memenuhi syarat":
        //         "Password [" + inputStr + "] tidak memenuhi syarat. Minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka";
        //     document.getElementById("idResponse").innerHTML = testResultStr;
        //     document.getElementById("passnew").focus();
        // }

        $(document).ready(function(){

          var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

          var akun  = document.getElementById("akun");
          var tiket = document.getElementById("tiket");

          // $("#tombol_fade_out").click(function() {
          //    $("#box").fadeOut("slow");
          //  })
          $(".label-akun").click(function(){
              $(".akun").fadeIn("slow");
              $(".pass").hide();
              $(".tiket").hide();
          })
          $(".label-pass").click(function(){
              $(".pass").fadeIn("slow");
              $(".akun").hide();
              $(".tiket").hide();
          })
          $(".label-tiket").click(function(){
              $(".tiket").fadeIn("slow");
              $(".pass").hide();
              $(".akun").hide();
          })

        	$("#submit-pass").click(function(){
            var passold    = $("#passold").val();
            var passnew    = $("#passnew").val();
            var passnew2   = $("#passnew2").val();
            var pasol  = document.getElementById('passold');
            var pason  = document.getElementById('passnew');
            var pason2  = document.getElementById('passnew2');
            var t = getDateTime();
            var h = sha1(passnew + passnew2 + t);

        		if(passold=='' && passnew=='' && passnew2=='')
        			{
        				jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Apapun!");
                pasol.focus();
        			} else if(passold==''){
                jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Password Lama!");
                pasol.focus();
              }else if(passnew==''){
                jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Password Baru!");
                pason.focus();
              }else if(passnew2==''){
                jQuery("div#err_msg").show();
                jQuery("div#msg").html("Anda Belum Memasukan Konfirmasi Password Baru!");
                pason2.focus();
        			}else{
                if(passnew.match(regex) && passnew2.match(regex)) {
                      alert("sukses");

                      // if(passnew2 != passnew){
                      //   jQuery("div#err_msg").show();
                      //   jQuery("div#msg").html("Password yang anda konfirmasi Salah!");
                      //   pason2.focus();
                      // }else{
                      //   $.ajax({
                			// 	type: "POST",
                			// 	url:  "<?php echo base_url(); ?>" + "akun/ubah_pass",
                			// 	data: JSON.stringify({
                      //                         passlama: passold,
                      //                         passbaru: passnew,
                      //                         passbaru2: passnew2,
                      //                         uname    : '<?=$this->session->userdata('username')?>',
                      //                         store_id : '<?=$this->session->userdata('store_id')?>',
                      //                         t: t,
                      //                         h: h
                      //                       }),
                      //   contentType: "application/json;",
                			// 	cache: false,
                			// 	success: function(result){
                      //     var resultRes = JSON.parse(result);
                      //     // console.log(resultRes);
                      //     if(resultRes.status == 'SUKSES'){
                      //       window.location = "<?=base_url()?>";
                      //     }else{
                      //       jQuery("div#err_msg").show();
                      //       jQuery("div#msg").html(resultRes.pesan);
                      //     }
                      //
                			// 	   }
                			//   });
                      // }

                  } else {
                    jQuery("div#err_msg").show();
            				jQuery("div#msg").html("Password minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
                    $("#passnew2").focus();
                  }
                // if(passnew!= passnew2)
                // {
                //   jQuery("div#err_msg").show();
                //   jQuery("div#msg").html("Konfirmasi Password Tidak Sama");
                // } else{
                //
                // }

              }
        		return false;
        	});


          $("#submit-akun").click(function(){
            var kode    = $("#kode").val();
            var nama    = $("#nama").val();

            var nm  = document.getElementById('nama');
            var kd  = document.getElementById('kode');

            var t = getDateTime();
            var h = sha1(passnew + passnew2 + t);

        		if(kode=='' && nama=='')
        			{
        				jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Apapun!");
                kode.focus();
        			} else if(nama==''){
                jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Nama!");
                nama.focus();
              } else if(kode==''){
                jQuery("div#err_msg").show();
                jQuery("div#msg").html("Anda Belum Memasukan Kode Agen!");
                kode.focus();
        			}else{
                      $.ajax({
              				type: "POST",
              				url:  "<?php echo base_url(); ?>" + "akun/akun",
              				data: JSON.stringify({
                                            kode     : kode,
                                            nama     : nama,
                                            uname    : '<?=$this->session->userdata('username')?>',
                                            store_id : '<?=$this->session->userdata('store_id')?>',
                                            t: t,
                                            h: h
                                          }),
                      contentType: "application/json;",
              				cache: false,
              				success: function(result){
                        var resultRes = JSON.parse(result);
                        // console.log(resultRes);
                        if(resultRes.status == 'SUKSES'){
                          window.location = "<?=base_url()?>";
                        }else{
                          jQuery("div#err_msg").show();
                          jQuery("div#msg").html(resultRes.pesan);
                        }
              				   }
              			  });
              }
        		return false;
        	});


          $("#submit-tiket").click(function(){
            var nama   = $("#nama").val();
            var bca    = $("#bca").val();
            var bri    = $("#bri").val();
            var mandiri= $("#mandiri").val();
            var bni    = $("#bni").val();

            var nm  = document.getElementById('nama');
            var bc  = document.getElementById('bca');
            var bn  = document.getElementById('bni');
            var br  = document.getElementById('bri');
            var mn  = document.getElementById('mandiri');

            var t = getDateTime();
            var h = sha1(passnew + passnew2 + t);

        		if(passold=='' && passnew=='' && passnew2=='')
        			{
        				jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Apapun!");
                pasol.focus();
        			} else if(passnew==''){
                jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Password Baru!");
                pason.focus();
              }else if(passnew2==''){
                jQuery("div#err_msg").show();
        				jQuery("div#msg").html("Anda Belum Memasukan Konfirmasi Password Baru!");
                pason2.focus();
        			}else{
                if(passnew.match(regex) && passnew2.match(regex)) {
                      alert("sukses");

                      // $.ajax({
              				// type: "POST",
              				// url:  "<?php echo base_url(); ?>" + "akun/ubah_pass",
              				// data: JSON.stringify({
                      //                       passlama: passold,
                      //                       passbaru: passnew,
                      //                       passbaru2: passnew2,
                      //                       uname    : '<?=$this->session->userdata('username')?>',
                      //                       store_id : '<?=$this->session->userdata('store_id')?>',
                      //                       t: t,
                      //                       h: h
                      //                     }),
                      // contentType: "application/json;",
              				// cache: false,
              				// success: function(result){
                      //   var resultRes = JSON.parse(result);
                      //   // console.log(resultRes);
                      //   if(resultRes.status == 'SUKSES'){
                      //     window.location = "<?=base_url()?>";
                      //   }else{
                      //     jQuery("div#err_msg").show();
                      //     jQuery("div#msg").html(resultRes.pesan);
                      //   }
                      //
              				//    }
              			  // });



                  } else {
                    jQuery("div#err_msg").show();
            				jQuery("div#msg").html("Password minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
                    $("#passnew2").focus();
                  }
                // if(passnew!= passnew2)
                // {
                //   jQuery("div#err_msg").show();
                //   jQuery("div#msg").html("Konfirmasi Password Tidak Sama");
                // } else{
                //
                // }

              }
        		return false;
        	});

        });

        </script>
    </body>
</html>

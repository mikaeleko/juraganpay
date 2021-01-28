<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
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

        .input-jabber-user {
          font-family: Segoe UI;
          padding: 8px 16px;
          margin: 8px;
          display: inline-block;
          box-sizing: border-box;
          outline: none;
          width: 370px;
        }

        .input-jabber {
          font-family: Segoe UI;
          padding: 8px 16px;
          margin: 8px;
          display: inline-block;
          box-sizing: border-box;
          outline: none;
          width: 500px;
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
          padding:10px;
          height:auto;
          margin: 20px;
          display:table;
          width: 750px;
        }
        .notes{
          font-size: 14px;color:red;background-color:rgba(219,219,219,0.7);
          padding:10px; width:800px;margin:0 30px 0 30px; border-radius: 5px;
        }
        .form-regist{
          font-size: 14px;
          padding:5px; width:800px;margin:0 30px 0 30px; border-radius: 5px;
        }
        .captcha{
          font-size: 14px;float-right;display:table;
          padding:5px; width:250px;margin:0 30px 0 30px; border-radius: 5px;float:left;
        }
        .tombol{
          float:right;margin-right:300px;
        }
        .logo{
          margin:0 90px 10px 90px;float:right;
        }
        form{
          padding:10px;
        }

        #err_msg{
          color: red;  font-size:15px;
          text-align: left;
          /* border:1px solid #000; */
          padding:5px; display: none;
          margin:10px auto;
        }
        #msg{
          /* border:1px solid #000;  */
          width:430px; height:40px;
          padding:2px; color:red; font-size:15px;
          text-align:center; display:table;
          margin-left: 280px;
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

        #sukses{
          width:430px; height:40px;
          padding:2px; color:green; font-size:15px;
          text-align:center;display:table;
          margin-left: 280px;



        }
        .img_sukses{
          width: 40px; height: 40px;
          /* float: right; */
          display: block; vertical-align: bottom;
          text-align: right;
        }
        </style>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
    </head>
    <body>
        <div class="container smooth">

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
                            <div class="box-header"><span class="box-header-title">REGISTER JABBER</span></div>
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
                <div class="row">
                    <div class="col-desk-2">
                        <?php $this->load->view('navigation_left') ?>
                    </div>

                    <div class="col-desk-10" id="right-container-id">
                        <div class="body-right-container">
                            <div class="box-primary" style="padding-bottom:0">
                                <div class="row">
                                  <!--FORM REGISTER JABBER -->
                                  <div class="col-desk-6 jabber">
                                       <div class="logo">
                                         <img width="100" height="100" src="<?php echo base_url() ?>assets/img/xmpp.png" alt="">
                                       </div>
                                       <div class="logo">
                                         <img width="100" height="100" src="<?php echo base_url() ?>assets/img/mylogo.png" alt="">
                                       </div>
                                      <div class="box-form">
                                          <form class="form">
                                            <div class="text-title" style="font-size:25px;color:#000;margin:0 0 10px 40px;">Pendaftaran Jabber ST24</div>
                                            <div class="form-regist">
                                              <div class="label-form">
                                                <label>Jabber Id</label>
                                              </div>
                                              <div class="input-form">
                                                <input id="usr_jabber" class="input-jabber-user" type="text" name="usr_jabber" value="" autocomplete="OFF" onkeyup="saveValue('usr_jabber',this);"><b><?php echo "@".$_SERVER['SERVER_NAME'] ?></b>
                                              </div>
                                              <input id="srv_jabber" class="input-jabber" type="hidden" name="srv_jabber" value="localhost">
                                              <br>
                                              <div class="label-form">
                                                <label>Jabber Password</label>
                                              </div>
                                              <input id="pass_jabber" class="input-jabber" type="password" name="pass_jabber" value="" autocomplete="OFF" onkeyup="saveValue('pass_jabber',this);">
                                              <br>
                                              <div class="label-form">
                                                <label>Ulang Jabber Password</label>
                                              </div>
                                              <input id="pass_ver" class="input-jabber" type="password" name="pass_ver" value="" autocomplete="OFF" onkeyup="saveValue('pass_ver',this);">
                                            </div>
                                            <div class="notes">
                                              <p>Note<br>*Jabber ini dapat digunakan untuk umum<br>**Untuk keamanan bertransaksi diharapkan menggunakan IP2IP ter-encrypted</p>
                                            </div>

                                            <div class="captcha">
                                              <!--CAPTCHA INPUT -->
                                              <div class="label-form">
                                                <label>Input Captcha</label>
                                              </div><br>
                                              <img id="captcha" src="<?=site_url('jabber/securimage')?>" alt='captcha' /><br>
                                              <input id="capcode" type="text" name="captcha_code" size="15" placeholder=""/>
                                                <!-- <a href="#" onclick="refreshCaptcha()"> -->
                                                <a href="#" onclick="window.location.reload();">
                                                <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                                              </a>
                                            </div> <br><br><br>

                                            <div class="tombol">
                                              <input id="submit" class="right" type="submit" value="Daftar">
                                            </div>

                                            <div id='err_msg'>
                                              <div id='content_result'>
                                                <div id='err_show' class="w3-text-red">
                                                  <div style="margin: 0 100px 0px 480px;">
                                                    <img class="img_error" src="<?=base_url()?>assets/img/warning.png">
                                                  </div>
                                                  <div id='msg'> </div>
                                                  <div id='msg2'> </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div id='sukses_msg'>
                                              <div id='content_result'>
                                                <div id='sukses_show' class="w3-text-red">
                                                  <div style="margin: 0 100px 0px 480px;">
                                                    <img class="img_sukses" src="<?=base_url()?>assets/img/save.jpg">
                                                  </div>
                                                  <div id='sukses'> </div>

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

        function saveValue(uniqName,e){
            var val = e.value; // get the value.
            localStorage.setItem(uniqName,val);// Every time user writing something, the localStorage's value will override .
        }

        function loadValue(){
          document.getElementById("usr_jabber").value = <?=isset($_GET['pesan'])?'getSavedValue("usr_jabber")':'\'\'';?>;
          document.getElementById("pass_jabber").value = <?=isset($_GET['pesan'])?'getSavedValue("pass_jabber")':'\'\'';?>;
          document.getElementById("pass_ver").value = <?=isset($_GET['pesan'])?'getSavedValue("pass_ver")':'\'\'';?>;
        }

        // loadValue();

        function getSavedValue (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
        }

        $(document).ready(function(){
          var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
          $("#submit").click(function(){
            event.preventDefault();
            var usr   = document.getElementById('usr_jabber');
            var srv   = document.getElementById('srv_jabber');
            var pass  = document.getElementById('pass_jabber');
            var pass2 = document.getElementById('pass_ver');
            var cap = document.getElementById('capcode');
            var usr_jabber  = $("#usr_jabber").val();
            var srv_jabber  = $("#srv_jabber").val();
            var pass_jabber = $("#pass_jabber").val();
            var pass_ver    = $("#pass_ver").val();
            var capcode    = $("#capcode").val();
            var t = getDateTime();
            var hash = sha1(usr_jabber + srv_jabber + pass_jabber + t);

        		if(usr_jabber=='' && pass_jabber=='' && pass_ver=='')
        			{
                $("#msg2").hide();
        				$("#err_msg").show();
        				$("#msg").html("Anda Belum Memasukan Apapun!");
                usr.focus();
              } else if (usr_jabber=='') {
                $("#msg2").hide();
                $("#err_msg").show();
                $("#msg").html("Anda Belum Mengisi Username!");
                usr.focus();
              } else if (pass_jabber=='') {
                $("#msg2").hide();
                $("#err_msg").show();
                $("#msg").html("Password Belum Diisi!");
                pass.focus();
              } else if (pass_ver=='') {
                $("#msg2").hide();
                $("#err_msg").show();
                $("#msg").html("Verifikasi Password Belum Diisi!");
                pass2.focus();
              } else if (capcode=='') {
                $("#msg2").hide();
                $("#err_msg").show();
                $("#msg").html("Kode Captcha Belum Diisi!");
                cap.focus();
        			} else {
                if(pass_jabber!=pass_ver){
                  $("#msg2").hide();
                  $("#err_msg").show();
                  $("#msg").html("Konfirmasi Pasword Tidak Sama");
                  $("#pass_ver").focus();
                  die();
                }
                if(pass_jabber.match(regex)) {
                    $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url(); ?>" + "jabber/registrasi",
                        data: JSON.stringify({
                                                usr_jabber:usr_jabber,
                                                srv_jabber:srv_jabber,
                                                pass_jabber:pass_jabber,
                                                pass_ver:pass_ver,
                                                capcode:capcode,
                                                t:t,
                                                hash:hash
                                            }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(resultJabber){
                        var rsJabber = JSON.parse(resultJabber);
                        var server = location.protocol + '//' + location.host;
                        var path_error = "/memberarea/jabber?pesan=";
                        var param_error = rsJabber.pesan+"&command="+rsJabber.command;
                        var path_sukses = "/memberarea/jabber?preg=";
                        var param_sukses = rsJabber.preg+"&pesan="+rsJabber.pesan;

                        if(rsJabber.status == 'SUKSES'){
                          // alert(server+path_sukses+param_sukses);
                          $("#err_msg").hide();
                          $("#sukses_msg").fadeIn("slow");
                          $("#sukses").html(rsJabber.pesan);

                          document.getElementById("usr_jabber").value="";
                          document.getElementById("pass_jabber").value="";
                          document.getElementById("pass_ver").value="";
                          document.getElementById("capcode").value="";
                          window.location = server+path_sukses+param_sukses;
                          usr.focus();

                        }else if(rsJabber.status == 'GAGAL'){
                          $("#sukses_msg").hide();
                          $("#err_msg").fadeIn("slow");
                          $("#msg").show();
                          $("#msg2").show();
                          $("#msg").html(rsJabber.pesan);
                          $("#msg2").html(rsJabber.command );
                          window.location = server+path_error+param_error;

                        }else if(rsJabber.status == 'CAPTCHA FAILED'){
                          $("#capcode").focus();
                          document.getElementById("capcode").value="";
                          $("#sukses_msg").hide();
                          $("#err_msg").fadeIn("slow");
                          $("#msg2").hide();
                          $("#msg").html(rsJabber.pesan);
                        }else{
                          $("#sukses_msg").hide();
                          $("#err_msg").fadeIn("slow");
                          $("#msg").html(rsJabber.pesan);
                        }

                    }
                    });
                } else {
                  $("#err_msg").show();
                  $("#msg").html("Password Baru minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
                  $("#pass_jabber").focus();
                }
              }
        		return false;
        	});
        });

        // function refreshCaptcha(){
        //   document.getElementById('captcha').src = '<?=base_url()?>securimage/securimage_show.php?' + Math.random();
        //   return false
        // }

        function a(pesan,command){
          // var server = location.protocol + '//' + location.host;
          // var path = "/memberarea/jabber";
          // alert(server+path);
          console.log("this");
          // var counter = localStorage.getItem("counter");
          // console.log(counter);
          // if(counter == undefined || counter == null){
            $("#err_msg").show();
            $("#msg").show();
            $("#msg2").show();
            $("#msg").html(pesan);
            $("#msg2").html(command);

          // }else{
          //   // window.location = "http://192.168.100.101/memberarea/jabber";
          //   // server + "/memberarea/jabber";
          //   window.location = server + path;
          // }
          // jQuery("#usr_jabber").val(id);
          // jQuery("#pass_jabber").val(pass);
          // jQuery("#pass_ver").val(pass2);
          // localStorage.setItem("counter", 1);
        }

        function b(pesan){
          var server = location.protocol + '//' + location.host;
          var path = "/memberarea/jabber";
          var counter2 = localStorage.getItem("counter");
          console.log(counter2);
          if(counter2 == undefined || counter == null){
            $("#sukses_msg").show();
            $("#sukses").fadeIn();
            $("#sukses").html(pesan);
          }else{
            window.location = server + path;
          }
          localStorage.setItem("counter", 1);
        }

        function clearCounter(){
          localStorage.removeItem("counter");
        }
        //error
        <?php
        if(isset($_GET['pesan']) && isset($_GET['command'])){ ?>
          a("<?=$_GET['pesan']?>","<?=$_GET['command']?>");
          loadValue();
        <?php }else{ ?>
           clearCounter();
        <?php } ?>

        //sukses
        <?php
        if(isset($_GET['preg']) && isset($_GET['pesan'])){
            if($_GET['preg']==1) { ?>
              b("<?=$_GET['pesan']?>");
      <?php } ?>
  <?php }else{ ?>
           clearCounter();
        <?php } ?>

        </script>
    </body>
</html>

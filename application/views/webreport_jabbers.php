<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css" type="text/css">
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <style media="screen">
        h3{
          color:#404040;
        }

        .tombol{
          display:flex;
          justify-content:flex-end;
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

        .input-jabber-user {
          background-color:rgba(219,219,219,0.3);
          font-family: Segoe UI;
          padding: 8px 8px;
          margin: 4px;
          display: inline-block;
          box-sizing: border-box;
          outline: none;
          width: 100%;
        }

        .input-jabber {
          background-color:rgba(219,219,219,0.3);
          font-family: Segoe UI;
          padding: 8px 8px;
          margin: 4px;
          display: inline-block;
          box-sizing: border-box;
          outline: none;
          width:100%;
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
          font-size: 14px;
          margin-top:4px;
          color:#868686;
        }
        .text-server-name{
          font-size: 12px;
          font-weight:bold;
        }
        .label-menu{
          color :#808080;
          font-family: Segoe UI;
          cursor:pointer;
        }
        .input-form{
          font-family: Segoe UI;
          padding:0;
          outline: none;

        }
        .box-form{
          box-shadow: 5px 10px 18px #888888;
          border-radius:10px;
          padding:10px;
          margin: 20px;
        }
        .notes{
          font-size: 14px;color:red;background-color:rgba(219,219,219,0.3);margin:0 30px 0 30px; border-radius: 5px;
        }
        .form-regist{
          font-size: 14px;
          padding:20px;
        }
        .captcha{
          font-size: 14px;display:table;
          padding:5px; margin:0 30px 0 30px; border-radius: 5px;
        }
        .logo{
          margin:10px 90px 10px 90px;
        }
        form{
          padding:10px;
        }

        #err_msg{
          color: red;  font-size:15px;
          text-align: left;

          padding:5px; display: none;
          margin:10px auto;
        }
        .content_result{
          display:flex;
        }
        #msg{
          padding: 5px;
          color: red;
          font-size: 15px;
          text-align: left;
          display: table;
          /* box-shadow: 1px 1px 1px 1px #ccc; */
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
          display: flex;
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
          padding:2px; color:green; font-size:15px;
          text-align:center;display:table;
        }
        .img_sukses{
          width: 40px; height: 40px;
          /* float: right; */
          display: block; vertical-align: bottom;
          text-align: right;
        }

        #submit{
          background-color: #5689DC;
          color: rgba(255,255,255,1);
          font-family: Segoe UI;
          padding: 8px;
          border-radius: 10px;
          box-sizing: border-box;
          box-shadow: none;
          cursor:pointer;
          width:150px;
          border: 1px solid #5689DC;
          margin-top:5px;
        }
        </style>
    </head>
    <body>
      <div class="container">


        <?php include("menu2.php"); ?>

        <div class="body-container smooth">
          <div class="box-produk">
            <div class="row">
              <div class="col-desk-6 col-sm-12">
                <div class="body-left-container">
                  <div>
                      <img src="<?php echo HOST_API_IMAGE; ?>get_img?file=banner/mockupphone-01.png" style="width:70%;vertical-align: middle;text-align:center;margin:auto;display:block;">
                  </div>
                </div>
              </div>

              <div class="col-desk-6">
                <div class="body-left-container">
                  <div class="row" style="margin-top:40px;">
                    <!--FORM REGISTER JABBER -->
                    <div class="col-desk-12" >
                        <div class="row">
                          <div class="col-desk-6 col-sm-6">
                              <img width="120" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconproduk/tokenst24.png" style="display:block;text-align:center;vertical-align:middle;margin:0 auto;">
                          </div>
                          <div class="col-desk-6 col-sm-6">
                              <img width="100" height="100" src="<?php echo HOST_API_IMAGE; ?>get_img?file=xmpp.png" style="display :block;text-align:center;vertical-align:middle;margin:0 auto;">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-desk-10">
                            <div class="box-form" style="position:relative">
                                <div id="box-loading" style="position:absolute;background-color:#0000005e;width:96%;height:98%;display:none;">
                                  <div style="position:absolute;transform:translateY(-50%);top:50%;left:50%;transform:translateX(-50%);">
                                  <div class="loading-ring"><div></div><div></div><div></div><div></div></div>
                                  </div>
                                </div>
                                <form class="form">
                                  <div class="text-title" style="font-size:30px;color:#000;margin:0 0 10px 40px;">Pendaftaran Jabber ST24</div>
                                  <div class="form-regist">
                                    <div class="row">
                                      <div class="col-desk-4">
                                      <div class="label-form">Username</div>
                                      </div>
                                      <div class="col-desk-8">
                                        <input id="usr_jabber" class="input-jabber-user" type="text" name="usr_jabber" autocomplete="OFF" onkeyup="saveValue('usr_jabber',this);">
                                        <div style="margin:8px">
                                          <span id="username-display"></span><span class="text-server-name">@st24.co.id <?php //echo "@".$_SERVER['SERVER_NAME'] ?></span>
                                        </div>
                                        <input id="srv_jabber" class="input-jabber" type="hidden" name="srv_jabber" value="st24.co.id">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-desk-4">
                                      <div class="label-form">Password</div>
                                      </div>
                                      <div class="col-desk-8">
                                      <input id="pass_jabber" class="input-jabber" type="password" name="pass_jabber" autocomplete="OFF" onkeyup="saveValue('pass_jabber',this);">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-desk-4">
                                      <div class="label-form">Ulang Password</div>
                                      </div>
                                      <div class="col-desk-8">
                                      <input id="pass_ver" class="input-jabber" type="password" name="pass_ver" autocomplete="OFF" onkeyup="saveValue('pass_ver',this);">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-desk-12">
                                      <div class="notes">
                                        <p>Note<br>*Jabber ini dapat digunakan untuk umum<br>**Untuk keamanan bertransaksi diharapkan menggunakan IP2IP ter-encrypted</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-desk-12">
                                      <div id="err_msg" style="background-color:#ff000017;border-radius:4px;">
                                        <div id="content_result">
                                          <div id="err_show" class="w3-text-red">
                                            <div style="">
                                              <img class="img_error" src="<?=base_url();?>images/icon/warning.png">
                                              <span id="msg"> </span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="sukses_msg">
                                    <div style="background-color:#0080001a;border-radius:4px;padding:10px;" id="content_result">
                                      <div id="sukses_show" class="w3-text-red">
                                        <div >
                                          <img class="img_sukses" src="<?=base_url();?>images/icon/save.png">
                                        </div>
                                        <div id="sukses"> </div>
                                      </div>
                                    </div>
                                  </div>


                                  <div align="right">
                                    <img id="captcha" src="<?=site_url('jabbers/securimage')?>" alt='captcha' />
                                  </div>
                                  <div align="right">
                                    <span class="label-form" style="margin-right:85px;">Input Captcha</span>
                                  </div>
                                  <div class="row">
                                    <div class="col-desk-12">
                                      <div class="tombol">
                                        <input class="input-jabber"id="capcode" type="text" style="width:130px" name="captcha_code" size="15" placeholder="">
                                        <img onclick="refreshCaptcha()" style="height:32px;width:32px;cursor:pointer" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-desk-12">
                                      <div class="tombol">
                                        <input id="submit" type="submit" value="Daftar">
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
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script>

function saveValue(uniqName,e){
  if(uniqName == 'usr_jabber'){
    displayUsernameJaber(e.value);
  }
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
    $("#msg2").hide(100);
    $("#err_msg").hide(100);
    $("#sukses_msg").hide(100);
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
        $("#err_msg").show(100);
        $("#msg").html("Anda Belum Memasukan Apapun!");
        usr.focus();
        return;
      } else if (usr_jabber=='') {
        $("#err_msg").show(100);
        $("#msg").html("Anda Belum Mengisi Username!");
        usr.focus();
        return;
      } else if (pass_jabber=='') {
        $("#err_msg").show(100);
        $("#msg").html("Password Belum Diisi!");
        pass.focus();
        return;
      }else if(!pass_jabber.match(regex)) {
        $('#box-loading').hide(50);
        $("#err_msg").show(100);
        $("#msg").html("Password Baru minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
        $("#pass_jabber").focus();
        return;
      }else if (pass_ver=='') {
        $("#err_msg").show(100);
        $("#msg").html("Verifikasi Password Belum Diisi!");
        pass2.focus();
        return;
      }else if(pass_jabber!=pass_ver){
          $("#err_msg").show(100);
          $("#msg").html("Konfirmasi Pasword Tidak Sama");
          $("#pass_ver").focus();
          return;
      }else if (capcode=='') {
        $("#err_msg").show(100);
        $("#err_msg").fadeIn("slow");
        $("#msg").html("Kode Captcha Belum Diisi!");
        cap.focus();
        return;
      }else {
        $("#capcode").val("");
        $('#box-loading').show(50);
        $.ajax({
            type: "POST",
            url:  "<?php echo base_url(); ?>" + "jabbers/registrasiv2",
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
            $('#username-display').html("");
            $('#box-loading').hide(50);

            var rsJabber = JSON.parse(resultJabber);
            
            refreshCaptcha();

            //var param_sukses = rsJabber.preg+"&pesan="+rsJabber.pesan;
            //alert(rsJabber);
            if(rsJabber.status == 'SUKSES'){
              // alert(server+path_sukses+param_sukses);
              $("#err_msg").hide(100);
              $("#sukses_msg").fadeIn("slow");
              $("#sukses").html(rsJabber.pesan+" "+usr_jabber+'@'+srv_jabber);

              document.getElementById("usr_jabber").value="";
              document.getElementById("pass_jabber").value="";
              document.getElementById("pass_ver").value="";
              document.getElementById("capcode").value="";
              // window.location = server+path_sukses+param_sukses;
              usr.focus();

            }else if(rsJabber.status == 'GAGAL'){
              $("#sukses_msg").hide(100);
              $("#err_msg").fadeIn("slow");
              $("#msg").show(200);
              $("#msg2").show(100);
              $("#msg").html(rsJabber.pesan);
              $("#msg2").html(rsJabber.command );

            }else if(rsJabber.status == 'CAPTCHA FAILED'){
              $("#capcode").focus();
              document.getElementById("capcode").value="";
              $("#sukses_msg").hide(100);
              $("#err_msg").fadeIn("slow");
              $("#msg2").hide(100);
              $("#msg").html(rsJabber.pesan);
            }else{
              $("#sukses_msg").hide(100);
              $("#err_msg").fadeIn("slow");
              $("#msg").html(rsJabber.pesan);
            }

        },
        error: function(response){
          $('#username-display').html("");
          $('#box-loading').hide(50);

          refreshCaptcha();
          $("#sukses_msg").hide(100);
          $("#err_msg").fadeIn("slow");
          $("#msg").html("Terjadi kesalahan");
        }
        });
        
      }
    return false;
  });
});

function refreshCaptcha(){
  // console.log("refresh captcha");
  $('#captcha').attr('src', "<?=site_url('jabbers/securimage')?>#"+new Date().getTime());
  $("#capcode").val("");
}

function a(pesan,command){
  // var server = location.protocol + '//' + location.host;
  // var path = "/memberarea/index.php/jabber";
  // alert(server+path);
  console.log("this");
  // var counter = localStorage.getItem("counter");
  // console.log(counter);
  // if(counter == undefined || counter == null){
    $("#err_msg").show(100);
    $("#msg").show(200);
    $("#msg2").show(100);
    $("#msg").html(pesan);
    $("#msg2").html(command);

  // }else{
  //   // window.location = "http://192.168.100.101/memberarea/index.php/jabber";
  //   // server + "/memberarea/index.php/jabber";
  //   window.location = server + path;
  // }
  // jQuery("#usr_jabber").val(id);
  // jQuery("#pass_jabber").val(pass);
  // jQuery("#pass_ver").val(pass2);
  // localStorage.setItem("counter", 1);
}

function b(pesan){
  var server = location.protocol + '//' + location.host;
  var path = "/memberarea/index.php/jabber";
  var counter2 = localStorage.getItem("counter");
  console.log(counter2);
  if(counter2 == undefined || counter == null){
    $("#sukses_msg").show(100);
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
function displayUsernameJaber(text){
 document.getElementById('username-display').innerHTML = text;
}
</script>

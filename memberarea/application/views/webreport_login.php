<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style media="screen">
        h3{
          color:#404040;
        }
        input[type=submit] {
            background-color: rgba(0,175,233,1);
            color: rgba(255,255,255,1);
            font-family: Segoe UI;
            padding: 8px;
            margin: 8px 15px 0px 5px;;
            display: inline-block;
            border: 1px solid  rgba(0,175,233,1);
            border-radius: 40px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #ccc;
            cursor:pointer;
            width:100px;
        }

        input[type=reset] {
            background-color: rgb(255, 204, 0);;
            color: rgba(255,255,255,1);
            font-family: Segoe UI;
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid  rgb(255, 204, 0);
            border-radius: 40px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #ccc;
            cursor:pointer;
            width:100px;
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
        }
        .form-login{
          padding:10px;
          margin: 50px 50px 50px 50px;
        }
        .icon-bank{
          width: 100px;
          height: 80px;
          margin: 5px;
        }

        .box-ubah{
            opacity: 1;
            padding: 50px;
            background-color: rgba(248,248,248,1);
            width: 20%;
            margin: 0 auto;
            vertical-align: middle;
            margin-top: 90px;
            border-radius: 10px 10px 10px 10px;
            box-shadow: 1px 1px 1px 1px #ccc;
            text-align: center;
        }
        .box-ubah .text-title{
            font-family: Segoe UI;
            font-style: normal;
            font-weight: normal;
            font-size: 19px;
            color: rgba(134,134,134,1);
            margin-bottom: 20px;
        }
        .box-ubah .to-right{
            float: right;
        }

        .parent-box-login{
          display: flex;
          height: 70%;
        }

        .box-login2{
          padding: 10px;
          box-shadow: 1px 1px 1px 1px #ccc;
          width:400px;
          height:auto;
          margin: auto;
          border-radius : 15px;
          background-color : rgba(0, 175, 233, 0.04);
        }

        .box-forgot{
            opacity: 1;
            padding: 10px;
            background-color: rgba(248,248,248,1);
            width: 20%;
            display: table;
            margin: 0 auto;
            vertical-align: middle;
            margin-top: 150px;
            border-radius: 10px 10px 10px 10px;
            box-shadow: 1px 1px 1px 1px #ccc;
            text-align: center;
        }

        @media only screen and (max-width: 600px) {
          .box-login2{
            padding: 5px;
            box-shadow: 1px 1px 1px 1px #ccc;
            width:100%;
            margin: auto;
            margin-right:10px;
            margin-left:10px;
            margin-top:10px;
            border-radius : 15px;
          }
          .form-login{
            margin:0px;
          }
        }
        .navigation a{
          cursor:pointer;
        }
        body{
          font-family:'Segoe UI'
        }
        </style>
    </head>
    <body>
        <div class="container smooth">
            <div class="header2">
                <div class="header-logo">
                    <img src="<?=base_url()?>images/asset/default-logo-menu.png" style="width:50px; height:50px;vertical-align:middle;border-radius:50px;margin-top:15px;margin-left:10px">
                    <img style="vertical-align:middle;text-align:center;margin-top:15px" width="200px" height="50px" src="../images/LogoST24/whitest24.svg">
                </div>
                <div class="list-menu" id="list-menu-dashboard">
                  <a id="menulist1" href="<?=str_replace('/memberarea','',base_url())?>">HOME</a>
                  <a id="menulist2" href="<?=str_replace('/memberarea','',base_url())?>produk">PRODUK</a>
                  <a id="menulist3" href="<?=str_replace('/memberarea','',base_url())?>pendaftaran">PENDAFTARAN</a>
                  <a id="menulist4" class="menuActive" href="<?=base_url()?>">MEMBER AREA</a>
                  <a id="menulist5" href="<?=str_replace('/memberarea','',base_url())?>jabbers">JABBER</a>
                  <?php if(SHOW_ONLINE_STORE_MENU){ ?>
                  <a href="/onlinestore">TOKO ONLINE</a>
                  <?php } ?>
                    <a class="company-name-style" href="#"><span class="company-name-style"><?=COMPANY_NAME?></span></a>
                </div>
                <div class="image-menu">
                    <img src="<?php echo base_url() ?>/images/asset/menu.svg" alt="" onclick="showMenuDashboard()">
                </div>
            </div>
            <div class="body-container">
                <div class="parent-box-login">
                  <!--FORM LOGIN -->
                  <div id="box-login" class="box-login2">
                      <form class="form-login">
                          <div id='err_msg_login' style='display:none'>
                            <div id='content_result_err'>
                              <div id="err_show_login" class="alert alert-danger">
                                  <span id="eror_msg"></span>
                              </div>
                            </div>
                          </div>

                          <div id='sukses_msg_login' style='display: none; '>
                            <div id='content_result_sukses'>
                              <div id="sukses_show_login" class="alert alert-success">
                                  <span id="sukses_msg"></span>
                              </div>
                            </div>
                          </div>

                          <div class="text-title" style="width:100%;text-align:center">Login Web Report</div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="id" type="text" class="form-input-text" name="id" placeholder="ID/User Name" onkeyup="saveValue(this);">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="pwd" type="password" class="form-input-password" name="password" placeholder="Password" onkeyup="saveValue(this);">
                          </div>
                          <!--CAPTCHA INPUT -->
                          <div id="box-captcha" style="display: flex;justify-content: center;width:100%;">
                            <!-- <img id="captcha" src="<?=site_url('otentikasi/securimage')?>" alt='captcha' /> -->
                            <img id="captcha" src="" alt='captcha' />
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                            <input id="capcode" type="text" class="form-input-text" name="captcha_code" size="15" placeholder="Input Captcha"/>
                            <a href="javascript:void(0)" style="margin-top:12px;" onclick="refreshCaptcha()">
                              <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                            </a>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="cancel" type="reset" value="Cancel" style="display:none;">
                              <p id="forgot" class="button" >Forgot Password</p>
                              <input id="submit" type="submit">
                          </div>
                      </form>
                  </div>

                  <!-- FORGOT PASSWORD -->
                  <div id="box-forgot-password" class="box-login2" style="display:none">
                      <form class="form-login">
                          <div class="alert alert-danger" style="display:none" id="alert-danger-forgot-pass">
                              <span id="text-alert-danger-forgot-pass"></span>
                          </div>
                          <div class="alert alert-success" style="display:none" id="alert-success-forgot-pass">
                              <span id="text-alert-success-forgot-pass"></span>
                          </div>

                          <div class="text-title" style="width:100%;text-align:center">Forgot Password</div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="username-forgot-pass" type="text" class="form-input-text" name="id" placeholder="ID/User Name">
                          </div>
                          <div id="box-captcha-username" style="display: flex;justify-content: center;width:100%;">
                            <img id="captcha-username" src="<?=site_url('otentikasi/securimage')?>" alt='captcha' />
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                            <input id="capcode-username" type="text" class="form-input-text" name="captcha_code" size="15" placeholder="Input Captcha"/>
                            <a href="javascript:void(0)" style="margin-top:12px;" onclick="refreshCaptchaUsername()">
                              <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                            </a>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="back-to-login" style="margin-right:10px" type="reset" value="Back to login" >
                              <p id="submit-forgot-pass" class="button" >Submit</p>
                          </div>
                      </form>
                  </div>

                  <!--FORM RESET PASS -->
                  <div id="box-reset" class="box-login2" style='display:none'>
                      <form>
                          <div id='err_msg_reset' class="alert alert-danger" style='display:none'>
                            <span id='eror_reset' > </span>
                          </div>
                          <div id='sukses_msg_reset' class="alert alert-success" style='display: none; '>
                            <span id='sukses_reset' > </span>
                          </div>

                          <div class="text-title" style="width:100%;text-align:center">Reset Password</div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="idforgot" type="hidden" name="imgname" placeholder="ID/Username" value="">
                              <input id="username" type="hidden" name="username" value="">
                              <input id="store_id" type="hidden" name="store_id" value="">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="resetcode" type="text" class="form-input-text" name="imgname" placeholder="Reset Code">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="pwdnew" type="password" class="form-input-password" name="password" placeholder="New Password">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="pwdconf" type="password" class="form-input-password" name="password" placeholder="Confirm New Password">
                          </div>
                          <div id="box-captcha-reset-pass" style="display: flex;justify-content: center;width:100%;">
                            <img id="captcha-reset-pass" src="<?=site_url('otentikasi/securimage')?>" alt='captcha' />
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                            <input id="capcode-reset-pass" type="text" class="form-input-text" name="captcha_code" size="15" placeholder="Input Captcha"/>
                            <a href="javascript:void(0)" style="margin-top:12px;" onclick="refreshCaptchaResetPass()">
                              <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
                            </a>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="submit-cancel" type="reset" value="<< Cancel">
                              <input id="submit-forgot" type="submit">
                          </div>
                          <p style="text-align:center;">
                            <span id="resend" style="font-size:14px;">Code belum sampai? <a style="color:blue; font-size:14px; text-decoration:underline;cursor:pointer; ">Kirim Ulang Reset Code</a></span>
                          </p>
                          <p id="count-down-resend" style="display:none;text-align:center;"></p>
                      </form>
                  </div>

                  <!--FORM EXPIRED PASS -->
                  <div id="box-expired" class="box-login2" style='display:none'>
                      <form>
                          <div id='err_msg_expired' style='display:none'>
                            <div id='content_result_expired'>
                              <div id='err_show_expired' class="w3-text-red">
                                <div id='eror_expired' style="margin: 0 25px 0 30px;border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;border-radius:5px;"> </div>
                              </div>
                            </div>
                          </div>

                          <div id='sukses_msg_expired' style='display: none; '>
                            <div id='content_result_expired'>
                              <div id='sukses_show_expired' class="w3-text-red">
                                <div id='sukses_expired' style="margin: 0 25px 0 30px;border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:center;display:table;"> </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="text-title" style="width:100%;text-align:center; color:red;">Password Has Expired!</div> -->
                          <div class="alert alert-danger">
                              <span id="text-alert">Password Has Expired!</span>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="idexpired" type="text" class="form-input-text" name="imgname" placeholder="ID/User Name">
                          </div>

                          <div style="float:right">
                              <input id="expired" type="submit">
                          </div>
                      </form>
                  </div>


                  <!--FORM UBAH PASS -->
                  <div id="box-ubah" class="box-login2" style="display:none;">
                    <form>
                        <div style="display: flex;justify-content: center;width:100%;"><img src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                        <div class="text-title" style="font-weight:bold;font-size:15px;display: flex;justify-content: center;width:100%;">Ubah Password Anda Sekarang!</div>
                        <div id='err_msg_ubahpass' style='display: none; '>
                          <div id='content_result_ubahpass'>
                            <div id='err_show_ubahpass' class="w3-text-red">
                              <div id='eror_ubahpass' style="border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;"> </div>
                            </div>
                          </div>
                        </div>

                        <div style="display: flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passold" type="password" class="form-input-password" name="passold" placeholder="Password Lama">
                        </div>
                        <div style="display: flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passnew" type="password" class="form-input-password" name="passnew" placeholder="Password Baru" >
                        </div>
                        <div style="display:flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passnew2" type="password" class="form-input-password" name="passnew2" placeholder="Ulangi Password Baru" >
                        </div> <hr>
                        <div style="float:right">
                            <input class="right" type="reset" value="Reset">
                            <input id="ubah-pass" type="submit">
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>

<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sha256.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>

<script type="text/javascript">
document.getElementById("id").value = getSavedValue("id");    // set the value to this input
//document.getElementById("pwd").value = getSavedValue("pwd");   // set the value to this input
/* Here you can add more inputs to set value. if it's saved */

//Save the value function - save it to localStorage as (ID, VALUE)
function saveValue(e){
    var id = e.id;  // get the sender's id to save it .
    var val = e.value; // get the value.
    localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
}

//get the saved value function - return the value of "v" from localStorage.
function getSavedValue  (v){
    if (!localStorage.getItem(v)) {
        return "";// You can change this to your defualt value.
    }
    return localStorage.getItem(v);
}

function captcha(){
  $("#captcha").attr('src','<?= site_url() ?>otentikasi/securimage#'+new Date().getTime());
}
captcha();

function refreshCaptcha(){
  $('#captcha').attr('src', "<?=site_url('otentikasi/securimage')?>#"+new Date().getTime());
  $("#capcode").val("");
}

function refreshCaptchaResetPass(){
  $('#captcha-reset-pass').attr('src', "<?=site_url('forgotpass/securimage')?>#"+new Date().getTime());
  $("#capcode-reset-pass").val("");
}

function refreshCaptchaUsername(){
  $('#captcha-username').attr('src', "<?=site_url('forgotpass/securimage')?>#"+new Date().getTime());
  $("#capcode-username").val("");
}

var tempUserName = "";
var tempStoreId = "";

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

$(document).ready(function(){
   var regex2  = /\d{6}/ ;
   var regex   =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

   $("#submit").click(function(event){
     event.preventDefault();
     var id = $("#id").val();
     var pwd = $("#pwd").val();
     var sha = sha256(id+pwd);

     var capcode = $("#capcode").val();
     var t = getDateTime();
     var regexResult = 0;
     var h = sha1(id + sha + t);

     if(id==''&& pwd==''&& capcode=='')  {
         $("#err_msg").show(100);
         $("#msg").html("Belum Memasukan Apapun!");
         $("#id").focus();
       } else if (id=='') {
         $("#err_msg").show(100);
         $("#msg").html("Belum Memasukan ID!");
         $("#id").focus();
       } else if (pwd=='') {
         $("#err_msg").show(100);
         $("#msg").html("Belum Memasukan Password!");
         $("#pwd").focus();
       } else if (capcode=='') {
         $("#err_msg").show(100);
         $("#msg").html("Silahkan Input Captcha!");
         $("#capcode").focus();
       } else {
         regexResult = pwd.match(regex)?1:0;
         $.ajax({
           type: "POST",
           url :  "<?php echo base_url(); ?>" + "otentikasi/cek_login",
           data: JSON.stringify({
                                 id: id,
                                 pass: sha,
                                 capcode: capcode,
                                 regexResult: regexResult,
                                 t: t,
                                 h: h
                               }),
           contentType: "application/json;",
           cache: false,
           success: function(result){
             var resultRes = JSON.parse(result);
             refreshCaptcha();
             if(resultRes.status == 'SUCCSESS') {
               window.location = "<?=base_url()?>";
             } else if (resultRes.status == 'KONEKSI') {
               $("#err_msg_login").show(100);
               $("#eror_msg").html(resultRes.pesan);
             } else if (resultRes.status == 'WRONG ID') {
               $("#err_msg_login").show(100);
               $("#eror_msg").html(resultRes.pesan);
               $("#id").focus();
             } else if (resultRes.status == 'SHA256FAILED') {
               $("#err_msg_login").show(100);
               $("#eror_msg").html(resultRes.pesan);
               $("#pwd").focus();
               document.getElementById('pwd').value="";
             } else if (resultRes.status == 'CAPTCHA FAILED') {
               $("#capcode").focus();
               document.getElementById("capcode").value="";
               $("#err_msg_login").show(100);
               $("#eror_msg").html(resultRes.pesan);
             } else if (resultRes.status == 'CHANGE PASSWORD') {
               username = resultRes.username;
               store_id = resultRes.store_id;
               $("#err_msg_login").show(100);
               $("#eror_msg").html(resultRes.pesan);
               $("#box-login").hide();
               $("#box-ubah").show(100);
               $("#passold").focus();
             } else if (resultRes.status == 'EXPIRED PASS') {
                $("#box-login").hide();
                $("#box-forgot-password").fadeIn();
                $("#alert-danger-forgot-pass").hide(100);
                setTimeout(() => {
                  $('#username-forgot-pass').focus();
                  refreshCaptchaUsername()
                  $("#alert-danger-forgot-pass").show(100);
  				        $("#text-alert-danger-forgot-pass").html("Password anda kadaluarsa, Silakan lakukan reset password disini");
                }, 500);
             }
           }
         });
       }
     return false;
   });


   $("#cancel").click(function(){
     $(this).hide();
     document.getElementById("pwd").disabled = false;
     $("#submit").show(100);
     $("#forgot").show(100);
     $("#box-captcha").show(100);

     $("#box-reset").hide();
     $("#err_msg").hide();
     $("#sukses_msg_login").hide();
     $("#box-login").show(100);
     document.getElementById('id').value="";
     document.getElementById('id').focus();
   });


   $("#submit-cancel").click(function(){
     $("#box-reset").hide();
     $("#err_msg").hide();
     $("#sukses_msg_login").hide();
     $("#err_msg_login").hide();
     $("#box-login").show(100);
     setTimeout(() => {
      document.getElementById('id').value="";
      document.getElementById('id').focus();
      refreshCaptcha();
     }, 500);
   });


   $("#submit-forgot").click(function(event){
     event.preventDefault();
     $("#err_msg_reset").hide();
     $("#sukses_msg_reset").hide(50);
     var idforgot = $("#idforgot").val();
     var username = $("#username").val();
     var store_id = $("#store_id").val();
     var resetcode = $("#resetcode").val();
 		 var pwdnew   = $("#pwdnew").val();
 		 var pwdconf  = $("#pwdconf").val();
     var t = getDateTime();

     var h = sha1(idforgot + pwdnew + pwdconf + t);

 		if(resetcode=='' && pwdnew==''&& pwdconf=='')
 			{
 				$("#err_msg_reset").show(100);
 				$("#eror_reset").html("Anda Belum Memasukan Apapun!");
        $("#resetcode").focus();
      }else if(resetcode==''){
        $("#err_msg_reset").show(100);
 				$("#eror_reset").html("Reset Code Belum Diisi!");
        $("#resetcode").focus();
      }else if(pwdnew==''){
        $("#err_msg_reset").show(100);
        $("#eror_reset").html("Masukan Password Baru Anda!");
        $("#pwdnew").focus();
      }else if(pwdconf==''){
        $("#err_msg_reset").show(100);
        $("#eror_reset").html("Konfirmasi Password Baru Belum Diisi!");
        $("#pwdconf").focus();
 			} else {
         if(pwdnew!=pwdconf){
            $("#err_msg_reset").show(100);
            $("#eror_reset").html("Konfirmasi Pasword Tidak Sama");
            $("#pwdconf").focus();
            return;
         }


         if(resetcode.match(regex2)) {
           if(pwdnew.match(regex)) {
               $.ajax({
                 type: "POST",
                 url :  "<?php echo base_url(); ?>" + "forgotpass/forgot_pass",
                 data: JSON.stringify({
                                       idforgot : idforgot,
                                       username : tempUserName,
                                       store_id : tempStoreId,
                                       resetcode: resetcode,
                                       pwdnew   : pwdnew,
                                       pwdconf  : pwdconf,
                                       t: t,
                                       h: h,
                                       captcha : $("#capcode-reset-pass").val()
                                     }),
                 contentType: "application/json;",
                 cache: false,
                 success: function(result){
                    refreshCaptchaResetPass();
                    var resultRes = JSON.parse(result);
                    document.getElementById('pwd').value="";
                    if(resultRes.status == 'SUKSES') {
                      document.getElementById("pwd").disabled = false;
                      $("#sukses_msg_reset").show(100);
                      $("#cancel").hide();
                      $("#sukses_reset").html("Password Anda Berhasil Di Reset, Silakan login.  Halaman akan dialihkan..");
                      $("#submit-forgot").hide();

                      setTimeout(() => {
                        $("#box-reset").hide();
                        $("#err_msg_reset").hide();
                        $("#box-login").show(100);
                        document.getElementById('id').value="";
                        $("#id").focus();
                        setTimeout(() => {
                          refreshCaptcha();
                        }, 500);
                      }, 4000);
                    } else if (resultRes.status == 'GAGAL') {
                      $("#err_msg_reset").show(100);
                      $("#eror_reset").html(resultRes.pesan);
                      $("#resetcode").focus();
                    } else if (resultRes.status == 'GAGAL CAPTCHA') {
                      refreshCaptchaResetPass();
                      $("#err_msg_reset").show(100);
                      $("#eror_reset").html(resultRes.pesan);
                      $("#capcode-reset-pass").focus();
                    } else if (resultRes.status == 'SALAH') {
                      $("#sukses_msg_reset").hide();
                      $("#err_msg_reset").show(100);
                      $("#eror_reset").html(resultRes.pesan);
                      $("#resetcode").focus();
                    } else if (resultRes.status == 'EXPIRED') {
                      $("#err_msg_reset").show(100);
                      $("#eror_reset").html(resultRes.pesan);
                      $("#resetcode").focus();
                    }
                 }
               });

           } else {
             $("#err_msg_reset").show(100);
             $("#eror_reset").html("Password Minimal 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
             $("#pwdnew").focus();
          }
         }else{
           $("#sukses_msg_reset").hide();
           $("#err_msg_reset").show(100);
           $("#ero_reset").html("Pastikan Reset Code Anda Numeric & Berjumlah 6 Karakter!");
           $("#resetcode").focus();
         }


 			}
 		return false;
 	});

  $("#resend").click(function(){
    var countFrom = 60;
     $('#count-down-resend').show()
     $("#resend").hide(100);
     $('#count-down-resend').html(countFrom+'(s)')

      var intervalCountDown = setInterval(() => {
        var numb = countFrom --;
        if(numb == 0){
          clearInterval(intervalCountDown);
          $("#resend").show(100);
          $('#count-down-resend').hide(100);
        }
        document.getElementById("count-down-resend").innerHTML = numb + ' (s)';
      }, 1000);

      $("#sukses_msg_reset").hide(50);
      $("#sukses_msg_reset").show(100);
      $("#sukses_reset").html("Mengirim... ");
      var id = $("#idforgot").val();
      var t = getDateTime();
      var h = sha1(id + t);
      var regexResult = 0;

        $.ajax({
         type: "POST",
         url :  "<?php echo base_url(); ?>" + "forgotpass/resendCode?id="+id,
         data: JSON.stringify({
                              id: id,
                              t: t,
                              h: h
                              }),
         contentType: "application/json;",
         cache: false,
         success: function(result){
            var resultRes = JSON.parse(result);
             if(resultRes.status == 'SUKSES') {
                $("#box-reset").show(100);
                $("#sukses_msg_reset").show(100);
                $("#sukses_reset").html("Berhasil Mengirim Ulang Reset Code Ke ID/msisdn Anda ");
                setTimeout(() => {
                  $("#sukses_msg_reset").hide(100);
                }, 5000);
             } else if (resultRes.status == 'GAGAL') {
                $("#err_msg_reset").show(100);
                $("#eror_reset").html(resultRes.pesan);
                $("#sukses_msg_reset").hide(100);
                document.getElementById('resetcode').value="";
                $("#resetcode").focus();
             }
         }
        });
      return false;
  });

   $('#forgot').click(function(){
     $("#box-login").hide();
     $("#box-forgot-password").fadeIn();
     $("#alert-danger-forgot-pass").hide(100);
     setTimeout(() => {
       $('#username-forgot-pass').focus();
       refreshCaptchaUsername()
     }, 500);
    // $("#err_msg_login").show(100);
    // $("#eror_msg").html("Untuk Melakukan Reset Password Silahkan Hubungi Customer Service Kami!");
   });

   $('#back-to-login').click(function(){
    $('#box-login').show(100);
    $('#box-forgot-password').hide(100);
    setTimeout(() => {
       $('#id').focus();
       refreshCaptcha()
     }, 500);
   });

   $("#submit-forgot-pass").click(function(){

       $("#err_msg").hide();
       $("#sukses_msg").hide();
       $("#alert-danger-forgot-pass").hide(50);
       $("#sukses_msg_reset").hide(100);

       var id = $("#username-forgot-pass").val();
       var t = getDateTime();
       var h = sha1(id + t);

       if(id=='') {
  				$("#alert-danger-forgot-pass").show(100);
  				$("#text-alert-danger-forgot-pass").html("Silahkan input ID/Username Untuk Dapat Mereset Password!");
          $("#username-forgot-pass").focus();
       } else {
        <?php
          $timestamp = str_replace(' ','T',date('Y:m:d H:i:s'));
          $t_ar = str_split($timestamp);
          $getAlgoritmText = $t_ar[1].$t_ar[9].$t_ar[3].$t_ar[8].$t_ar[4].$t_ar[11].$t_ar[10].$t_ar[13].$t_ar[2].$t_ar[12].$t_ar[15].$t_ar[14].$t_ar[7].$t_ar[6].$t_ar[0].$t_ar[5];
          $algo = hash_hmac('sha256', $getAlgoritmText, 'C$PT4$0Lu$1');
        ?>

         regexResult = id.match(regex2)?1:0;
         $.ajax({
   				type: "POST",
          url :  "<?php echo base_url(); ?>" + "forgotpass",
          headers: {
              'timestamp':'<?=$timestamp?>',
              'sign': '<?=$algo?>',
              'Content-Type':'application/json'
          },
   				data: JSON.stringify({id: id, t: t,  h: h, captcha : $('#capcode-username').val()}),
   				cache: false,
   				success: function(result){
              refreshCaptchaUsername();
              var resultRes = JSON.parse(result);
              if(resultRes.status == 'SUKSES') {
                setTimeout(() => {
                  refreshCaptchaResetPass();
                }, 500);
                $("#username-forgot-pass").val("");
                $("#box-forgot-password").hide();
                $("#box-reset").show(100);
                var valforgot = document.getElementById("idforgot");
                var valuser = document.getElementById("username");
                var valstoreid = document.getElementById("store_id");
                valforgot.value = id;
                tempUserName    = resultRes.username;
                tempStoreId = resultRes.store_id;
                $("#sukses_msg").show(100);
                $("#sukses").html("Reset Code Telah Dikirim Ke ID/msisdn Anda");
                $("#resetcode").focus();
                $("#err_msg_reset").hide(100);
              } else if (resultRes.status == 'GAGAL') {
                $("#alert-danger-forgot-pass").show(100);
                $("#text-alert-danger-forgot-pass").html(resultRes.pesan);
                $("#username-forgot-pass").focus();
              } else if (resultRes.status == 'GAGAL CAPTCHA') {
                $("#alert-danger-forgot-pass").show(100);
                $("#text-alert-danger-forgot-pass").html(resultRes.pesan);
                $("#capcode-username").focus();
              }
   				}
 			   });
       }
       return false;
   });


   $("#expired").click(function(){
       document.getElementById('resetcode').value="";
       document.getElementById('pwdnew').value="";
       document.getElementById('pwdconf').value="";
       var id = $("#idexpired").val();
       var t = getDateTime();
       var h = sha1(id + t);
       var regexResult = 0;
       if(id=='') {
  				$("#err_msg_expired").show(100);
  				$("#eror_expired").html("Silahkan input ID/Username Untuk Dapat Mereset Password!");
          $("#idexpired").focus();
       } else {
         regexResult = id.match(regex2)?1:0;
         $.ajax({
   				type: "POST",
   				url :  "<?php echo base_url(); ?>" + "forgotpass?id="+id+"action=cek",
   				data: JSON.stringify({
                                id: id,
                                t: t,
                                h: h
                              }),
          contentType: "application/json;",
   				cache: false,
   				success: function(result){
             var resultRes = JSON.parse(result);
              if(resultRes.status == 'SUKSES') {
                var valforgot = document.getElementById("idforgot");
                var valuser = document.getElementById("username");
                var valstoreid = document.getElementById("store_id");
                valforgot.value = id;
                tempUserName = resultRes.username;
                tempStoreId = resultRes.store_id;
                $("#err_msg_expired").hide();
                $("#box-login").hide();
                $("#box-expired").hide();
                $("#box-reset").show(100);
                $("#sukses_msg_expired").show(100);
                $("#sukses_expired").html("Reset Code Telah Dikirim Ke ID/msisdn Anda");
                $("#resetcode").focus();
              } else if (resultRes.status == 'GAGAL') {
                $("#err_msg_expired").show(100);
                $("#eror_expired").html(resultRes.pesan);
                $("#id").focus();
              }
   				}
 			   });
       }
       return false;
   });




  $("#ubah-pass").click(function(event){
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
        $("#err_msg_ubahpass").show(100);
        $("#eror_ubahpass").html("Anda Belum Memasukan Apapun!");
        pasol.focus();
      } else if(passnew==''){
        $("#err_msg_ubahpass").show(100);
        $("#eror_ubahpass").html("Anda Belum Memasukan Password Baru!");
        pason.focus();
      }else if(passnew2==''){
        $("#err_msg_ubahpass").show(100);
        $("#eror_ubahpass").html("Anda Belum Memasukan Konfirmasi Password Baru!");
        pason2.focus();
      } else if(passnew!=passnew2){
        $("#err_msg_ubahpass").show(100);
        $("#eror_ubahpass").html("Konfirmasi Password Baru Salah!");
        pason2.focus();
      } else {
        if(passnew.match(regex) && passnew==passnew2) {
              $.ajax({
                  type: "POST",
                  url:  "<?php echo base_url(); ?>" + "ubahpass",
                  data: JSON.stringify({
                                        passlama : passold,
                                        passbaru : passnew,
                                        passbaru2: passnew2,
                                        uname    : username,
                                        store_id : store_id,
                                        tt: tt,
                                        hh: hh
                                      }),
                  contentType: "application/json;",
                  cache: false,
                  success: function(resultUbah){
                      var resultResUbah = JSON.parse(resultUbah);
                      if(resultResUbah.status == 'SUKSES'){
                        window.location = "<?=base_url()?>webreport";
                      }else{
                        $("#err_msg_ubahpass").show(100);
                        $("#eror_ubahpass").html(resultResUbah.pesan);
                        pasol.focus();
                      }
                  }
              });
        } else {
          $("#err_msg_ubahpass").show(100);
          $("#eror_ubahpass").html("Password minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
          $("#passnew2").focus();
        }
      }
    return false;
  });
});
</script>

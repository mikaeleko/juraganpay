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
            background-color: white;
            color: #00AFE9;
            font-family: Segoe UI;
            padding: 5px;
            margin: 5px 15px 0px 60px;;
            display: inline-block;
            border: 1px solid  rgba(0,175,233,1);
            box-sizing: border-box;
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
          /* padding:10px; */
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
          width:350px;
          height:450px;
          margin: auto;
          border-radius : 10px;
          background-color : #00AFE9;
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
                <!-- <div class="header-logo">
                    <img src="../images/asset/default-logo-menu.png" style="width:50px; height:50px;vertical-align:middle;border-radius:50px;margin-top:15px;margin-left:10px">
                    <img style="vertical-align:middle;text-align:center;margin-top:15px" width="200px" height="50px" src="../images/logoST24/whitest24.svg">
                </div> -->

            </div>
            <div class="body-container">
                <div class="parent-box-login">
                  <!--FORM LOGIN -->
                  <div id="box-login" class="box-login2">
                      <form class="form-login">
                          <div id='err_msg' style='display:none'>
                            <div id='content_result'>
                              <div id="err_show" class="alert alert-danger">
                                  <span id="msg"></span>
                              </div>
                            </div>
                          </div>

                          <div id='sukses_msg' style='display: none; '>
                            <div id='content_result'>
                              <div id="sukses_show" class="alert alert-success">
                                  <span id="sukses"></span>
                              </div>
                            </div>
                          </div>

                          <div style="text-align:center;color:#FFF;font-family:Futura Md BT;">
                            <h1>OTP</h1>
                            <p>We send unique code to your phone numbeer</p>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">

                            <?php for($x=1;$x<=5;$x++){ ?>
                              <input id="id" type="text" name="no_hp_<?=$x?>" placeholder="-" onkeyup="saveValue(this);" style="width:40px;height:30px;border:none;margin:5px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;">
                            <?php } ?>

                          </div>
                          <hr style="background-color:#FFF;height:2px;border:none;">
                          <div style="justify-content: center;width:100%;">
                              <p style="color:#fff;font-size:10px;">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea.
                              </p>
                          </div>


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
                              <input id="username-forgot-pass" type="text" name="id" placeholder="ID/User Name">
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
                            <span id='msg_reset' > </span>
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
                              <input id="resetcode" type="text" name="imgname" placeholder="Reset Code">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="pwdnew" type="password" name="password" placeholder="New Password">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="pwdconf" type="password" name="password" placeholder="Confirm New Password">
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="submit-cancel" type="reset" value="<< Cancel">
                              <input id="submit-forgot" type="submit">
                          </div>
                          <p id="resend" style="color:blue; font-size:15px; text-decoration:underline;cursor:pointer; text-align:center;">Kirim Ulang Reset Code</p>
                      </form>
                  </div>

                  <!--FORM EXPIRED PASS -->
                  <div id="box-expired" class="box-login2" style='display:none'>
                      <form>
                          <div id='err_msg' style='display:none'>
                            <div id='content_result'>
                              <div id='err_show' class="w3-text-red">
                                <div id='msg' style="margin: 0 25px 0 30px;border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;border-radius:5px;"> </div>
                              </div>
                            </div>
                          </div>

                          <div id='sukses_msg' style='display: none; '>
                            <div id='content_result'>
                              <div id='sukses_show' class="w3-text-red">
                                <div id='sukses' style="margin: 0 25px 0 30px;border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:center;display:table;"> </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="text-title" style="width:100%;text-align:center; color:red;">Password Has Expired!</div> -->
                          <div class="alert alert-danger">
                              <span id="text-alert">Password Has Expired!</span>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>
                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="idexpired" type="text" name="imgname" placeholder="ID/User Name">
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
                        <div id='err_msg_ubah' style='display: none; '>
                          <div id='content_result'>
                            <div id='err_show' class="w3-text-red">
                              <div id='msg_ubah' style="border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;"> </div>
                            </div>
                          </div>
                        </div>

                        <div style="display: flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passold" type="password" name="passold" placeholder="Password Lama">
                        </div>
                        <div style="display: flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passnew" type="password" name="passnew" placeholder="Password Baru" >
                        </div>
                        <div style="display:flex;justify-content: center;width:100%;" class="input-form">
                          <input  id="passnew2" type="password" name="passnew2" placeholder="Ulangi Password Baru" >
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

function refreshCaptcha(){
  // console.log("refresh captcha");
  $('#captcha').attr('src', "<?=site_url('jabber/securimage')?>");
  $("#capcode").val("");
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

$(document).ready(function(){
   var regex2  = /\d{6}/ ;
   var regex   =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
   //var regex2=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
   $("#submit").click(function(event){
     event.preventDefault();
     var id = $("#id").val();
     var pwd = $("#pwd").val();
     var capcode = $("#capcode").val();
     var t = getDateTime();
     var regexResult = 0;
     var h = sha1(id + pwd + t);

     if(id=='' && pwd=='' && capcode=='')
       {
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
                                 pass: pwd,
                                 capcode: capcode,
                                 regexResult: regexResult,
                                 t: t,
                                 h: h
                               }),
           contentType: "application/json;",
           cache: false,
           success: function(result){
             var resultRes = JSON.parse(result);
             console.log(resultRes);
             if(resultRes.status == 'SUCCSESS') {
               window.location = "<?=base_url()?>";
             } else if (resultRes.status == 'ID FAILED') {
               $("#err_msg").show(100);
               $("#msg").html(resultRes.message);
               $("#id").focus();
             } else if (resultRes.status == 'WRONG PASS') {
               $("#err_msg").show(100);
               $("#msg").html(resultRes.pesan);
               $("#pwd").focus();
             } else if (resultRes.status == 'CAPTCHA FAILED') {
               $("#capcode").focus();
               document.getElementById("capcode").value="";
               $("#err_msg").show(100);
               $("#msg").html(resultRes.pesan);
             } else if (resultRes.status == 'CHANGE PASSWORD') {
               username = resultRes.username;
               store_id = resultRes.store_id;
               $("#err_msg_ubah").show();
               $("#msg_ubah").html(resultRes.pesan);
               $("#box-login").hide();
               $("#box-ubah").show(100);
               $("#passold").focus();
             } else if (resultRes.status == 'EXPIRED PASS') {
               $("#box-login").hide();
               $("#sukses_msg").hide();
               $("#err_msg").show(100);
               $("#box-expired").show(100);
               $("#idexpired").focus();
               document.getElementById("idexpired").value="";
               // $("#err_msg").show(100);
               // $("#msg").html("Password Anda Telah Expired, Silahkan Reset Password Anda!");
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
     $("#sukses_msg").hide();
     $("#box-login").show(100);
     document.getElementById('id').value="";
     document.getElementById('id').focus();
   });


   $("#submit-cancel").click(function(){
    submit-cancel
     $("#box-reset").hide();
     $("#err_msg").hide();
     $("#sukses_msg").hide();
     $("#box-login").show(100);
     document.getElementById('id').value="";
     document.getElementById('id').focus();
   });


   $("#submit-forgot").click(function(event){
     event.preventDefault();
     $("#err_msg_reset").hide();
     var idforgot = $("#idforgot").val();
     var username = $("#username").val();
     var store_id = $("#store_id").val();
     var resetcode = $("#resetcode").val();
 		 var pwdnew   = $("#pwdnew").val();
 		 var pwdconf  = $("#pwdconf").val();
     var t = getDateTime();
     //var regexResult = 0;
     var h = sha1(idforgot + pwdnew + pwdconf + t);

 		if(resetcode=='' && pwdnew==''&& pwdconf=='')
 			{
 				$("#err_msg_reset").show(100);
 				$("#msg_reset").html("Anda Belum Memasukan Apapun!");
        $("#resetcode").focus();
      }else if(resetcode==''){
        $("#err_msg_reset").show(100);
 				$("#msg_reset").html("Reset Code Belum Diisi!");
        $("#resetcode").focus();
      }else if(pwdnew==''){
        $("#err_msg_reset").show(100);
        $("#msg_reset").html("Masukan Password Baru Anda!");
        $("#pwdnew").focus();
      }else if(pwdconf==''){
        $("#err_msg_reset").show(100);
        $("#msg_reset").html("Konfirmasi Password Baru Belum Diisi!");
        $("#pwdconf").focus();
 			} else {
         if(pwdnew!=pwdconf){
            $("#err_msg_reset").show(100);
            $("#msg_reset").html("Konfirmasi Pasword Tidak Sama");
            $("#pwdconf").focus();
            return;
         }
          //regexResult = pwdconf.match(regex)?1:0;

         if(resetcode.match(regex2)) {
           if(pwdnew.match(regex)) {
               $.ajax({
                 type: "POST",
                 url :  "<?php echo base_url(); ?>" + "forgotpass/forgot_pass",
                 data: JSON.stringify({
                                       idforgot : idforgot,
                                       username : username,
                                       store_id : store_id,
                                       resetcode: resetcode,
                                       pwdnew   : pwdnew,
                                       pwdconf  : pwdconf,
                                       //regexResult: regexResult,
                                       t: t,
                                       h: h
                                     }),
                 contentType: "application/json;",
                 cache: false,
                 success: function(result){
                    var resultRes = JSON.parse(result);
                    if(resultRes.status == 'SUKSES') {
                      $("#box-reset").hide();
                      $("#err_msg_reset").hide();
                      $("#box-login").show(100);
                      document.getElementById("pwd").disabled = false;
                      $("#sukses_msg_reset").show(100);
                      $("#cancel").hide();
                      $("#sukses").html("Password Anda Berhasil Di Reset!");
                      $("#submit-forgot").hide();
                      document.getElementById('id').value="";
                      document.getElementById('pwd').value="";
                      $("#id").focus();
                    } else if (resultRes.status == 'GAGAL') {
                      $("#err_msg_reset").show(100);
                      $("#msg_reset").html(resultRes.pesan);
                      $("#resetcode").focus();
                    } else if (resultRes.cek == 'SALAH') {
                      $("#sukses_msg_reset").hide();
                      $("#err_msg_reset").show(100);
                      $("#msg_reset").html(resultRes.memo);
                      $("#resetcode").focus();
                    } else if (resultRes.status == 'EXPIRED') {
                      $("#sukses_msg_reset").hide();
                      $("#err_msg_reset").show(100);
                      $("#msg_reset").html(resultRes.memo);
                      document.getElementById('resetcode').value="";
                      $("#resetcode").focus();
                    }
                 }
               });

           } else {
             $("#err_msg_reset").show(100);
             $("#msg_reset").html("Password Minimal 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
             $("#pwdnew").focus();
          }
         }else{
           $("#sukses_msg_reset").hide();
           $("#err_msg_reset").show(100);
           $("#msg").html("Pastikan Reset Code Anda Numeric & Berjumlah 6 Karakter!");
           $("#resetcode").focus();
         }


 			}
 		return false;
 	});

  $("#resend").click(function(){
      var id = $("#idforgot").val();
      var t = getDateTime();
      var h = sha1(id + t);
      var regexResult = 0;

        $.ajax({
         type: "POST",
         url :  "<?php echo base_url(); ?>" + "forgotpass/resendCode?id="+id,
         data: JSON.stringify({id: id, t: t,  h: h}),
         contentType: "application/json;",
         cache: false,
         success: function(result){
            var resultRes = JSON.parse(result);
             if(resultRes.status == 'SUKSES') {
               //window.location = "<?=base_url()?>forgotpass?id="+id;
               $("#box-reset").show(100);
               $("#sukses_show").show(100);
               $("#sukses").html("Berhasil Mengirim Ulang Reset Code Ke ID/msisdn Anda ");
             } else if (resultRes.status == 'GAGAL') {
               $("#err_msg").show(100);
               $("#msg").html(resultRes.pesan);
               document.getElementById('resetcode').value="";
               $("#resetcode").focus();
             }
         }
        });
      return false;
  });

   $('#forgot').click(function(){
    $('#box-login').hide(100);
    $('#box-forgot-password').show(100);
   });

   $('#back-to-login').click(function(){
    $('#box-login').show(100);
    $('#box-forgot-password').hide(100);
   });

   $("#submit-forgot-pass").click(function(){
       //$("#box-captcha").hide();
       $("#err_msg").hide();
       $("#sukses_msg").hide();
       $("#alert-danger-forgot-pass").hide(50);

       var id = $("#username-forgot-pass").val();
       var t = getDateTime();
       var h = sha1(id + t);
       //var regexResult = 0;
       if(id=='') {
  				$("#alert-danger-forgot-pass").show(100);
  				$("#text-alert-danger-forgot-pass").html("Silahkan input ID/Username Untuk Dapat Mereset Password!");
          $("#username-forgot-pass").focus();
       } else {
         regexResult = id.match(regex2)?1:0;
         $.ajax({
   				type: "POST",
   				url :  "<?php echo base_url(); ?>" + "forgotpass?id="+id,
   				data: JSON.stringify({id: id, t: t,  h: h}),
          contentType: "application/json;",
   				cache: false,
   				success: function(result){
             var resultRes = JSON.parse(result);
              if(resultRes.status == 'SUKSES') {
                $("#username-forgot-pass").val("");
                $("#box-forgot-password").hide();
                $("#box-reset").show(100);
                var valforgot = document.getElementById("idforgot");
                var valuser = document.getElementById("username");
                var valstoreid = document.getElementById("store_id");
                valforgot.value = id;
                valuser.value = resultRes.username;
                valstoreid.value = resultRes.store_id;

                $("#sukses_msg").show(100);
                $("#sukses").html("Reset Code Telah Dikirim Ke ID/msisdn Anda");
                $("#resetcode").focus();

              } else if (resultRes.status == 'GAGAL') {
                $("#alert-danger-forgot-pass").show(100);
                $("#text-alert-danger-forgot-pass").html(resultRes.pesan);
                $("#username-forgot-pass").focus();
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
  				$("#err_msg").show(100);
  				$("#msg").html("Silahkan input ID/Username Untuk Dapat Mereset Password!");
          $("#idexpired").focus();
       } else {
         regexResult = id.match(regex2)?1:0;
         $.ajax({
   				type: "POST",
   				url :  "<?php echo base_url(); ?>" + "forgotpass?id="+id+"action=cek",
   				data: JSON.stringify({id: id, t: t,  h: h}),
          contentType: "application/json;",
   				cache: false,
   				success: function(result){
             var resultRes = JSON.parse(result);
              if(resultRes.status == 'SUKSES') {
                var valforgot = document.getElementById("idforgot");
                var valuser = document.getElementById("username");
                var valstoreid = document.getElementById("store_id");
                valforgot.value = id;
                valuser.value = resultRes.username;
                valstoreid.value = resultRes.store_id;
                $("#err_msg").hide();
                $("#box-login").hide();
                $("#box-expired").hide();
                $("#box-reset").show(100);
                $("#sukses_msg").show(100);
                $("#sukses").html("Reset Code Telah Dikirim Ke ID/msisdn Anda");
                $("#resetcode").focus();
              } else if (resultRes.status == 'GAGAL') {
                $("#err_msg").show(100);
                $("#msg").html(resultRes.pesan);
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
        $("#err_msg_ubah").show(100);
        $("#msg_ubah").html("Anda Belum Memasukan Apapun!");
        pasol.focus();
      } else if(passnew==''){
        $("#err_msg_ubah").show(100);
        $("#msg_ubah").html("Anda Belum Memasukan Password Baru!");
        pason.focus();
      }else if(passnew2==''){
        $("#err_msg_ubah").show(100);
        $("#msg_ubah").html("Anda Belum Memasukan Konfirmasi Password Baru!");
        pason2.focus();
      } else if(passnew!=passnew2){

        $("#err_msg_ubah").show(100);
        $("#msg_ubah").html("Konfirmasi Password Baru Salah!");
        pason2.focus();
      } else {

        if(passnew.match(regex)) {
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
                        window.location = "<?=base_url()?>index.php/webreport";
                        pasol.focus();
                      }else{
                        $("#err_msg_ubah").show(100);
                        $("#msg_ubah").html(resultResUbah.pesan);
                        pasol.focus();
                      }
                  }
              });
        } else {
          $("#err_msg_ubah").show();
          $("#msg_ubah").html("Password minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
          $("#passnew2").focus();
        }
      }
    return false;
  });
});
</script>

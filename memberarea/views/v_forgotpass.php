<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
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
            margin: 8px 0;
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
        form{
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
          -webkit-flex-wrap: wrap;
          flex-wrap: wrap;
          -webkit-align-content: center;
          align-content: center;
          height: 70%;
        }

        .box-login2{
          padding: 10px;
          box-shadow: 1px 1px 1px 1px #ccc;
          width:400px;
          height:400px;
          margin: auto;
          border-radius : 15px;
          background-color : rgb(248, 248, 248);
        }

        @media only screen and (max-width: 600px) {
          .box-login2{
            padding: 10px;
            box-shadow: 1px 1px 1px 1px #ccc;
            width:300px;
            height:400px;
            margin: auto;
            border-radius : 15px;
            background-color : rgb(248, 248, 248);
          }
        }

        </style>
    </head>
    <body>
        <div class="container smooth">
        <div class="header2">
                <div class="header-logo">
                    <img src="../images/asset/default-user.png" style="width:85px; height:85px;vertical-align:middle;border-radius:50px;">
                    <img style="vertical-align:middle;text-align:center;" width="200px" height="50px" src="<?php echo base_url() ?>images/logoST24/whitest24.svg">
                </div>
                <div class="list-menu" id="list-menu-dashboard">
                  <a href="/">HOME</a>
                  <a href="/produk">PRODUK</a>
                  <a href="/pendaftaran">PENDAFTARAN</a>
                  <a href="/memberarea" target="_blank">WEB REPORT</a>
                  <a href="/jabbers">JABBER</a>
                  <a href="/onlinestore">TOKO ONLINE</a>
                    <a class="company-name-style" href="#"><span class="company-name-style"><?=COMPANY_NAME?></span></a>
                </div>
                <div class="image-menu">
                    <img src="<?php echo base_url() ?>/images/asset/menu-blue.png" alt="" onclick="showMenuDashboard()">
                </div>
            </div>
            <div class="body-container">
                <div class="parent-box-login">
                  <div id="box-forgot" class="box-forgot">
                      <form>
                          <div id='err_msg' style='display:none'>
                            <div id='content_result'>
                              <div id='err_show' class="w3-text-red">
                                <div id='msg' style="border:1px; width:auto; height:40px; padding:2px; color:red; font-size:15px;text-align:center;display:table;border-radius:5px;"> </div>
                              </div>
                            </div>
                          </div>
                          <div class="text-title" style="width:100%;text-align:center">Reset Your Password!</div>
                          <div style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:center;display:table;border-radius:5px;">
                            <p>Silahkan Masukan Reset Code Anda! <br> Reset Code telah dikirimkan ke ID/msisdn Anda</p>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;"><img style="width:60px;height:60px;" src="<?php echo base_url() ?>/images/logo_st24_nolabel.png"></div>

                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="idforgot" type="hidden" name="imgname" placeholder="ID/Username" value="<?php echo $id?>">
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
                          <div style="justify-content: ">
                              <input id="submit-forgot" type="submit">
                              <input id="reset-forgot" type="reset">
                              <p id="resend" style="color:blue; font-size:15px; text-decoration:underline;cursor:pointer;">Kirim Ulang Reset Code</p>
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

// Ajax post
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
   //var regex=  /^[0-9]{6,}$/;
   var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

   $("#submit-forgot").click(function(event){
     event.preventDefault();
     var idforgot = $("#idforgot").val();
     var resetcode = $("#resetcode").val();
 		 var pwdnew   = $("#pwdnew").val();
 		 var pwdconf  = $("#pwdconf").val();
     var t = getDateTime();
     var regexResult = 0;
     var h = sha1(idforgot + pwdnew + pwdconf + t);

 		if(resetcode=='' && pwdnew==''&& pwdconf=='')
 			{
 				$("#err_msg").show();
 				$("#msg").html("Anda Belum Memasukan Apapun!");
        $("#resetcode").focus();
      }else if(resetcode==''){
        $("#err_msg").show();
 				$("#msg").html("Reset Code Belum Diisi!");
        $("#resetcode").focus();
      }else if(pwdnew==''){
        $("#err_msg").show();
        $("#msg").html("Masukan Password Baru Anda!");
        $("#pwdnew").focus();
      }else if(pwdconf==''){
        $("#err_msg").show();
        $("#msg").html("Konfirmasi Password Baru Belum Diisi!");
        $("#pwdconf").focus();
 			} else {
         regexResult = pwdconf.match(regex)?1:0;
         //jika regex sesuai maka proses cek login
 				$.ajax({
   				type: "POST",
   				url :  "<?php echo base_url(); ?>" + "forgotpass/forgot_pass",
   				data: JSON.stringify({
                                idforgot : idforgot,
                                resetcode: resetcode,
                                pwdnew   : pwdnew,
                                pwdconf  : pwdconf,
                                regexResult: regexResult,
                                t: t,
                                h: h
                              }),
          contentType: "application/json;",
   				cache: false,
   				success: function(result){
             var resultRes = JSON.parse(result);

             if(resultRes.status == 'SUKSES') {
               window.location = "<?=base_url()?>webreport";
               document.getElementById('pwdnew').value="";
               document.getElementById('pwdconf').value="";
               $("#err_msg").show();
               $("#msg").html(resultRes.pesan);
             } else if (resultRes.status == 'GAGAL') {
               $("#err_msg").show();
               $("#msg").html(resultRes.pesan);
               $("#id").focus();
            }

   				}
 			  });

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
               //alert(resultRes.pesan);
               //window.location = "<?=base_url()?>forgotpass?id="+id;
             } else if (resultRes.status == 'GAGAL') {
               $("#err_msg").show();
               $("#msg").html(resultRes.pesan);
               $("#id").focus();
             }
         }
        });
      
      return false;
  });


	$("#submit").click(function(event){
    event.preventDefault();
		var id = $("#id").val();
		var pwd = $("#pwd").val();
    var t = getDateTime();
    var regexResult = 0;
    var h = sha1(id + pwd + t);

		if(id==''&& pwd=='')
			{
				$("#err_msg").show();
				$("#msg").html("Belum Memasukan Apapun!");
			} else {
        regexResult = pwd.match(regex)?1:0;
        //jika regex sesuai maka proses cek login
				$.ajax({
  				type: "POST",
  				url :  "<?php echo base_url(); ?>" + "otentikasi/cek_login",
  				data: JSON.stringify({id: id, pass: pwd, regexResult: regexResult, t: t, h: h}),
          contentType: "application/json;",
  				cache: false,
  				success: function(result){
            var resultRes = JSON.parse(result);
            if(resultRes.status == 'SUKSES') {
              window.location = "<?=base_url()?>";
            } else if (resultRes.status == 'GAGAL') {
              $("#err_msg").show();
              $("#msg").html(resultRes.pesan);
              $("#pass").focus();
            } else if (resultRes.status == 'GANTI PASSWORD') {
              username = resultRes.username;
              store_id = resultRes.store_id;

              $("#err_msg").show();
              $("#msg").html(resultRes.pesan);
              $("#box-login").hide();
              $("#box-ubah").show();
              $("#passold").focus();
            }
  				}
			  });
          //akhir cek login
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
        $("#err_msg").show();
        $("#msg").html("Anda Belum Memasukan Apapun!");
        pasol.focus();
      } else if(passnew==''){
        $("#err_msg").show();
        $("#msg").html("Anda Belum Memasukan Password Baru!");
        pason.focus();
      }else if(passnew2==''){
        $("#err_msg").show();
        $("#msg").html("Anda Belum Memasukan Konfirmasi Password Baru!");
        pason2.focus();
      }


      else{

        if(passnew.match(regex) && passnew==passnew2)

         {
             // alert(passnew + '/' + passnew2);

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
                      //alert(resultResUbah);
                      if(resultResUbah.status == 'SUKSES'){
                        //alert(resultResUbah.pesan);
                        window.location = "<?=base_url()?>webreport";
                      }else{
                        $("#err_msg").show();
                        $("#msg").html(resultResUbah.pesan);
                      }
                  }
              });
        } else {
          $("#err_msg").show();
          $("#msg").html("Password minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
          $("#passnew2").focus();
        }
      }
    return false;
  });
});
</script>

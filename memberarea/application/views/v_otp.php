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

        .button-otp{
            /* background-color:rgba(255,255,255,1); */
            /* color:  #868686; */
            background-color:rgba(0,175,233,1);
            color:  #FFF;
            font-family: Segoe UI;
            font-size: 17;
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid  rgba(255,255,255,1);
            border-radius: 30px;
            box-sizing: border-box;
            box-shadow: 1px 1px 1px 1px #ccc;
            cursor: pointer;
            width:300px; height:50px;line-height: 30px;
            text-align:center;
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
          background-color : #F8F8F8;
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

            <div class="body-container">
                <div class="parent-box-login">


                  <!-- BOX REQUEST OTP -->
                  <div id="box-request-otp" class="box-login2">
                      <form class="form-login">
                          <div class="alert alert-danger" style="display:none" id="alert-danger-forgot-pass">
                              <span id="text-alert-danger-forgot-pass"></span>
                          </div>
                          <div class="alert alert-success" style="display:none" id="alert-success-forgot-pass">
                              <span id="text-alert-success-forgot-pass"></span>
                          </div>
                          <div style="display: flex;justify-content: center;width:100%;margin-bottom:20px;">
                            <img style="width:150px;height:150px;" src="<?php echo base_url() ?>images/web_topup.png">
                          </div>
                          <div style="display: flex;justify-content:center;width:100%;">
                              <p id="request-otp" class="button-otp">Permintaan OTP Number</p>
                          </div>
                          <div style="justify-content: center;width:100%;">
                            <p id="request-otp" style="font-size:12px;text-align:center;">Kode OTP akan dikirim ke nomor MSISDN anda</p>
                          </div>

                      </form>
                  </div>

                  <!--BOX SEND OTP -->
                  <div id="box-send-otp" class="box-login2" style="display:none;">
                      <form>
                          <div id='err_msg_otp' style='display:none'>
                            <div id='content_result_err'>
                              <div id="err_show_login" class="alert alert-danger">
                                  <span id="eror_msg"></span>
                              </div>
                            </div>
                          </div>

                          <div id='err_msg_reset' class="alert alert-danger" style='display:none'>
                            <span id='eror_reset' > </span>
                          </div>
                          <div id='sukses_msg_reset' class="alert alert-success" style='display: none; '>
                            <span id='sukses_reset' > </span>
                          </div>

                          <div style="display: flex;justify-content: center;width:100%;margin-bottom:20px;">
                            <img style="width:150px;height:150px;" src="<?php echo base_url() ?>images/web_topup.png">
                          </div>

                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="otpcode" type="text" class="form-input-text" placeholder="OTP Code here.." value="" autocomplete="off">
                          </div>

                          <div style="display: flex;justify-content: center;width:100%;">
                              <input id="submit-otp" type="submit" value="Enter">
                          </div>
                          <p id="msg-otp" style="font-size:14px;text-align:center;margin:0;padding:0;"></p>
                          <p id="request-otp" style="font-size:14px;text-align:center;margin:0;padding:0;">Silahkan masukan kode aktifasi tersebut</p>

                          <div style="font-size:15px;  text-align:center;">
                            <p id='resend-otp' style="text-decoration:none;color:#0CCB6B;cursor:pointer;">Request Ulang kode OTP </p>
                            <span id="countdown" style="color:#000;"></span><span id="link" style="color:#000;"></span>
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

// var counter = 10;
// function countDown() {
//     if(counter>=0) {
//         document.getElementById("countdown").innerHTML = counter;
//     } else {
//         $("#countdown").hide();
//         ulang();
//         return;
//     }
//     counter -= 1;
//     var counter2 = setTimeout("countDown()",1000);
//     return;
// }
//
// function ulang() {
//     document.getElementById("link").innerHTML = "<p id='resend-otp' style='text-decoration:none;color:#0CCB6B;cursor:pointer;'>Request Ulang kode OTP </p>";
// }

$("#resend-otp").click(function(){
  countdown();
  var t = getDateTime();
  var h = sha1('<?php echo $this->session->userdata('username')?>' + t);
      $.ajax({
       type: "POST",
       url :  "<?php echo base_url(); ?>" + "belanja/request_otp",
       data: JSON.stringify({
                             t: t,
                             h: h
                           }),
       contentType: "application/json;",
       cache: false,
       success: function(result){
           var rs = JSON.parse(result);
           if(rs.RC == "00") {
             $("#otpcode").val("");
             $("#box-request-otp").hide();
             $("#box-send-otp").show(100);
             $("#msg-otp").html(rs.msg);
             $("#sukses_msg").show(100);
             $("#sukses").html("Kode OTP Telah Dikirim Ulang Ke ID/msisdn Anda");
             $("#otpcode").focus();
            //
             $(this).hide();
           } else {
             alert(rs.msg);
           }
        }
      });
});


function countdown(){
  var waktu = 60;
  var intervalResend = setInterval(function() {
    waktu -- ;
    if(waktu < 0) {
      clearInterval(intervalResend);
      $("#countdown").hide(100);
      $("#resend-otp").show(100);
    } else {
      $("#resend-otp").hide(100);
      $("#countdown").show(100);
      document.getElementById("countdown").innerHTML = waktu + ' (s)';
    }
  }, 1000);

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

   $("#request-otp").click(function(){
      countdown();

     var t = getDateTime();
     var h = sha1('<?php echo $this->session->userdata('username')?>' + t);
     var x = 1;
         $.ajax({
   				type: "POST",
   				url :  "<?php echo base_url(); ?>" + "belanja/request_otp",
   				data: JSON.stringify({
                                t: t,
                                h: h,
                                msisdn : '<?php echo $this->session->userdata('username')?>'
                              }),
          contentType: "application/json;",
   				cache: false,
   				success: function(result){
              var rs = JSON.parse(result);
              if(rs.RC == "00") {
                $("#otpcode").val("");
                $("#box-request-otp").hide();
                $("#box-send-otp").fadeIn();
                $("#msg-otp").html(rs.msg);
                $("#sukses_msg").show(100);
                $("#sukses").html("Kode OTP Telah Dikirim Ke ID/msisdn Anda");
                // $("#otpcode").focus();
                //
              } else {
                alert(rs.msg);
              }
   				 }
 			   });
   });

   $("#submit-otp").click(function(event){
        var otp = $("#otpcode").val();
        var t = getDateTime();
        var h   = sha1('<?=$this->session->userdata('username')?>' + t + otp);

         $.ajax({
           type: "POST",
           url :  "<?php echo base_url(); ?>" + "belanja/submit_otp",
           data: JSON.stringify({
                                 otp:otp,
                                 t: t,
                                 h: h
                               }),
           contentType: "application/json;",
           cache: false,
           success: function(result){
              var resultRes = JSON.parse(result);

              if(resultRes.RC == '00') {
                window.location.href = "<?=base_url()?>belanja";
              } else if(resultRes.RC == '30') {
                $("#err_msg_otp").show(100);
                $("#eror_msg").html(resultRes.msg);
                $("#otpcode").focus();
              } else {
                $("#err_msg_otp").show(100);
                $("#eror_msg").html("Anda belum memasukan Kode OTP!");
                $("#otpcode").focus();
              }
           }
         });

        return false;
 	 });


});
</script>

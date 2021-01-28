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
          width:350px;
          height:400px;
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
        .box-primary {
          opacity: 1;
          background-color: #FFF;
          border-radius: 2;
          padding: 5px;
          overflow: auto;
        }

        .status-sukses{
            background-image: url('<?php echo base_url() ?>images/asset/sukses.svg');
            padding: 10px;
            background-repeat: no-repeat;
            width: 6px;
            margin:auto;
            height: 6px;
        }
        .status-pending{
            background-image: url('<?php echo base_url() ?>images/asset/pending.svg');
            padding: 10px;
            background-repeat: no-repeat;
            width: 6px;
            height: 6px;
            margin:auto;
        }
        .status-gagal{
            background-image: url('<?php echo base_url() ?>images/asset/gagal.svg');
            padding: 10px;
            background-repeat: no-repeat;
            width: 6px;
            height: 6px;
            margin:auto;
        }
        .button-export{
            display:none;
            animation-name:showButton;
            animation-duration:0.5s;
        }
        .csv-export-img{
            animation-name:showCsvImg;
            animation-duration:0.5s;
        }
        </style>
    </head>
    <body>
      <!-- <div class="container" style="padding:30px;background-color:#00AFE9;"> -->
        <!-- <div class="row">
          <div class="col-desk-3">
            <div style="display: flex;width:100%;">
                <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">Trx ID System</span>
                <input id="trx_id" type="password" name="trxid" placeholder="Trx ID" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">

            </div>

          </div>
          <div class="col-desk-3">
              tes
          </div>
          <div class="col-desk-3">
              tes
          </div>
          <div class="col-desk-3">
              tes
          </div>

        </div>

      </div> -->


        <div class="container smooth">

            <div class="row" style="background-color:#00AFE9;padding:30px;min-height:200px;">
                <div class="col-desk-3 col-md-3 col-sm-3">
                  <div style="display: flex;width:100%;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">Trx ID System</span>
                      <input id="trx_id" type="password" name="trxid" placeholder="Trx ID" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                  </div>
                  <div style="display: flex;width:100%;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">Pengirim</span>
                      <input id="pengirim" type="password" name="trxid" placeholder="pengirim" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                  </div>
                  <div style="display: flex;width:100%;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">No Tujuan</span>
                      <input id="no_tujuan" type="password" name="np_tujuan" placeholder="pengirim" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                  </div>
                  <div style="display: flex;width:100%;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">Nama Toko</span>
                      <input id="nm_toko" type="password" name="nm_toko" placeholder="nm_toko" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                  </div>
                  <div style="display: flex;width:100%;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-weight:bold;font-style:italic;text-align:left;width:100px;">Kode Produk</span>
                      <input id="kd_produk" type="password" name="kd_produk" placeholder="kd_produk" onkeyup="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                  </div>
                  <div style="display: flex;width:100%;margin-top:5px;">
                      <select id="action" name="action" onchange="saveValue(this);" style="width:320px;height:20px;border:none;margin:1px;padding:2px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                        <option value="">Action</option>
                        <option value="gagal">Gagal Transaksi</option>
                        <option value="resend">Resend report</option>
                        <option value="proses">Proses Ulang Trx</option>
                        <option value="kirim_ke_modul_sama">Kirim Ulang Ke Modul Yang Sama</option>
                        <option value="alihkan_ke_modul_lain">Alihkan Ke Modul Lain</option>
                      </select>
                  </div>
                </div>

                <div class="col-desk-3 col-md-3 col-sm-3">
                  <div style="display: flex;width:100%;margin-top:5px;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-style:italic;text-align:left;width:100px;">Tgl Awal</span>
                      <select id="tgl_awal" name="tgl_awal" onchange="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:2px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                        <option value=""><?= date("Y/m/d")?></option>
                      </select>
                  </div>
                  <div style="display: flex;width:100%;margin-top:5px;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-style:italic;text-align:left;width:100px;">Tgl Awal</span>
                      <select id="tgl_akhir" name="tgl_akhir" onchange="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:2px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                        <option value=""><?= date("Y/m/d")?></option>
                      </select>
                  </div>


                  <div style="display: flex;width:100%;margin-top:40px;color:#FFF;">
                      <input id="auto_update" type="checkbox" name="auto_update" value="1" style="color: #FFF;width:20px;height:20px;margin:5px;padding:5px;color:#FFF;font-size:16px;text-align:center;font-size:12px;"> Auto Update
                  </div>
                  <div style="display: flex;width:100%;">
                      <button id="btn_refresh" onclick="refresh()"type="submit" name="refresh" style="background-color: #FFF;width:200px;height:20px;border:none;margin:1px;padding:5px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">Refresh</button>
                  </div>

                </div>

                <div class="col-desk-3 col-md-3 col-sm-3">
                  <div style="display: flex;width:100%;margin-top:5px;">
                      <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-style:italic;text-align:left;width:100px;">Filter Status</span>
                      <select id="filter_status" name="filter_status" onchange="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:2px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                        <option value="semua">Semua status</option>
                        <option value="berhasil">Berhasil</option>
                        <option value="pending">Pending</option>
                        <option value="gagal">Gagal</option>
                        <option value="kirim saldo">Kirim Saldo</option>
                        <option value="Tarik saldo">Kirim Saldo</option>
                        <option value="komplain">Komplain</option>
                      </select>
                  </div>
                  <div style="display: flex;width:100%;margin-top:5px;">
                    <span style="color:#fff;margin:2px 20px 2px 2px;font-size:12px;font-style:italic;text-align:left;width:100px;">Filter Status</span>
                    <select id="filter_modul" name="filter_modul" onchange="saveValue(this);" style="width:200px;height:20px;border:none;margin:1px;padding:2px;color:#00AFE9;font-size:16px;text-align:center;font-size:12px;">
                      <option value="semua">Semua status</option>
                      <option value="berhasil">Berhasil</option>
                      <option value="pending">Pending</option>
                      <option value="gagal">Gagal</option>
                      <option value="kirim saldo">Kirim Saldo</option>
                      <option value="Tarik saldo">Kirim Saldo</option>
                      <option value="komplain">Komplain</option>
                    </select>
                  </div>
                  <img src="<?=HOST_ROOT?>images/logost24/whitest24.svg" alt="" style="width:75%; margin-top:20px;">
                </div>

                <div class="col-desk-3 col-md-3 col-sm-3">
                  <div class="box-primary">
                    <div class="row">
                      <div class="col-desk-12 col-sm-12 col-md-12">
                        <p style="color:#00AFE9;text-align:center;padding:0;margin:0;font-size:18px;">Metro Reload</p>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-desk-4 col-md-4 col-sm4">
                        <p style="color:#00AFE9;text-align:center;padding:5px;margin:5px;font-size:18px;">12345</p>
                          <hr style="width:100px;height:10;background-color:#00AFE9;border:none">
                          <span style="color:#00AFE9;margin-left:50px;margin-right:50px;font-size:14px;">Sukses</span>
                      </div>
                      <div class="col-desk-4 col-md-4 col-sm4">
                        <p style="color:#FFBB00;text-align:center;padding:5px;margin:5px;font-size:18px;">32</p>
                        <hr style="width:100px;height:10;background-color:#FFBB00;border:none">
                        <span style="color:#FFBB00;margin-left:50px;margin-right:50px;font-size:14px;">Proses</span>
                      </div>
                      <div class="col-desk-4 col-md-4 col-sm4">
                        <p style="color:#EA474A;text-align:center;padding:5px;margin:5px;font-size:18px;">2</p>
                        <hr style="width:100px;height:10;background-color:#EA474A;border:none">
                        <span style="color:#EA474A;text-align:center;margin-left:50px;margin-right:50px;font-size:14px;">Gagal</span>
                      </div>
                    </div>

                  </div>
                </div>
            </div>


            <div class="row">
              <div class="row">
                  <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
              </div>
              <div class="alert alert-info" style="display:none" id="alertinfo">
                  <span id="text-alert"></span>
              </div>

              <div style="overflow-x:auto;">
                <table class="table" id="table">
                  <tr>
                    <td>No.</td>
                  </tr>
                </table>
              </div>

            </div>



        </div>
    </body>
</html>

<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>

<script type="text/javascript">
$( function() {
    $( "#tgl_awal" ).datepicker();
    $( "#tgl_akhir" ).datepicker();
  } );

$('#input_key').keypress(function (e) {
  if (e.which == 13) {
    cari();
    return false;    //<---- Add this line
  }
});

var offset = 1;
var limit  = 100;
function cariDataLanjutan(){
  offset += 100;
  limit  += 100;
  cari();
}

function cariDataSebelumnya(){
  offset -= 100;
  limit  -= 100;
  cari();
}

var trx_id = document.getElementById("trx_id");
var pengirim = document.getElementById("pengirim");
var no_tujuan = document.getElementById("no_tujuan");
var nm_toko = document.getElementById("nm_toko");
var kd_produk = document.getElementById("kd_produk");
var action = document.getElementById("action");
var tgl_awal = document.getElementById("tgl_awal");
var tgl_akhir   = document.getElementById("tgl_akhir");
var filter_status = document.getElementById("filter_status");
var filter_modul   = document.getElementById("filter_modul");
var auto_update   = document.getElementById("auto_update");
var loading   = document.getElementById("loading").style;
var alertinfo = document.getElementById("alertinfo").style;
var nextpage  = document.getElementById("nextpage").style;
var prevpage  = document.getElementById("prevpage").style;
var table     = document.getElementById("table");



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


function refresh(){
    var text_alert = document.getElementById("text-alert");
    alertinfo.display = "none";

    //cek tanggal
    if(tgl_awal.value == ""){
        text_alert.innerHTML = "Tanggal awal harus diisi";
        alertinfo.display = "block";
        tgl_awal.focus();
        return;
    }

    if(tgl_akhir.value == ""){
        text_alert.innerHTML = "Tanggal akhir harus diisi";
        alertinfo.display = "block";
        tgl_akhir.focus();
        return;
    }

    var from_startdate = new Date(tgl_awal.value);
    var to_enddate     = new Date(tgl_akhir.value);
    if(from_startdate > to_enddate){
        text_alert.innerHTML = "Tanggal awal harus lebih kecil dengan tanggal akhir";
        alertinfo.display = "block";
        return;
    }

    const date1 = new Date(tgl_awal.value);
    const date2 = new Date(tgl_akhir.value);
    const diffTime = Math.abs(date2.getTime() - date1.getTime());
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    //cek jarak tgl
    if(!(diffDays >= 0 && diffDays <=7)){
        text_alert.innerHTML = "Jarak tanggal awal ke tanggal akhir maksimal 7 hari";
        alertinfo.display = "block";
        return;
    }
    //end

    if(no_tujuan.value == ""){
      no_tujuan.value = "";
    } else {
      no_tujuan.value = no_tujuan.value;
    }

    var action = document.getElementById("action").value;
    var t = getDateTime();
    var h = sha1(trx_id.value + pengirim.value + no_tujuan.value + nm_toko.value + kd_produk.value + tgl_awal.value + tgl_akhir.value + filter_status.value + filter_modul.value + auto_update.value + action + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);
    loading.display   = "block";
    table.innerHTML   = "";
    loading.display   = "block";
    table.innerHTML   = "";

    $.ajax({
    type: "POST",
    url:  "<?php echo base_url(); ?>" + "histori/cari",
    data: JSON.stringify({
                          no_tujuan     : no_tujuan.value,
                          pengirim      : pengirim.value,
                          nm_toko       : nm_toko.value,
                          kd_produk     : kd_produk.value,
                          tgl_awal      : tgl_awal.value,
                          tgl_akhir     : tgl_akhir.value,
                          filter_status : filter_status.value,
                          filter_modul  : filter_modul.value,
                          auto_update   : auto_update.value,
                          action        : action,
                          store_id      : "<?=$this->session->userdata('store_id')?>",
                          uname         : '<?=$this->session->userdata('username')?>',
                          offset        :offset,
                          limit         :limit,
                          t             :t,
                          h             :h}),
    contentType: "application/json;",
    cache: false,
    success: function(result){

        loading.display = "none";

        var rs = JSON.parse(result);

        var trxBerhasil = 0;
        var trxPending = 0;
        var trxGagal = 0;
        for(var i=0;i<rs.chart_bottom.length;i++){
            if(rs.chart_bottom[i].STATUS == 'berhasil'){
                trxBerhasil = rs.chart_bottom[i].QTY;
            }else if(rs.chart_bottom[i].STATUS == 'pending'){
                trxPending = rs.chart_bottom[i].QTY;
            }else if(rs.chart_bottom[i].STATUS == 'gagal'){
                trxGagal = rs.chart_bottom[i].QTY;
            }
        }

        $('#trx_berhasil').html(trxBerhasil);
        $('#trx_pending').html(trxPending);
        $('#trx_gagal').html(trxGagal);

        rs = rs.result;
        for (var i = (rs.length-1); i >= 0; i--){
          createCellTable(
            table,
            rs[i].ROW_NUM,rs[i].MESSAGEID,rs[i].REQUESTID,rs[i].TIME_START,rs[i].NOM,rs[i].AMOUNT,rs[i].QTY,rs[i].TUJUAN,rs[i].PENGISI,rs[i].STORE_ID,rs[i].ENDING_BALANCE,rs[i].TRANS_STAT,rs[i].KET,rs[i].BERITA,rs[i].IS_HARI_INI);
        }
        if (rs.length>0) {
            exportButton.style.display = "block";
            createheaderTable(table);
        }else{

            exportButton.style.display = "none";
            text_alert.innerHTML = "Tidak ditemukan";
            alertinfo.display = "block";
        }

        if (rs.length>=100) {
          nextpage.display = "block";
        }else{
          nextpage.display = "none";
        }
        if (offset>100) {
          prevpage.display = "block";
        }else{
          prevpage.display = "none";
        }

      },
      error: function (request, status, error) {
          //console.log(request.responseText);
          offset = 1;
          limit = 100;
          loading.display = "none";
      }
    });
}

function createheaderTable(table){
  var row    = table.insertRow(0);
  var cell1  = row.insertCell(0);
  var cell2  = row.insertCell(1);
  var cell3  = row.insertCell(2);
  var cell4  = row.insertCell(3);
  var cell5  = row.insertCell(4);
  var cell6  = row.insertCell(5);
  var cell7  = row.insertCell(6);
  var cell8  = row.insertCell(7);
  var cell9  = row.insertCell(8);
  var cell10 = row.insertCell(9);
  var cell11 = row.insertCell(10);
  var cell12 = row.insertCell(11);
  var cell13 = row.insertCell(12);
  var cell14 = row.insertCell(13);
  // Add some text to the new cells

  cell1.outerHTML  = "<th>No.</th>";
  cell2.outerHTML  = "<th>Msg Id</th>";
  cell3.outerHTML  = "<th>Req id</th>";
  cell4.outerHTML  = "<th>Time Start</th>";
  cell5.outerHTML  = "<th>Nom</th>";
  cell6.outerHTML  = "<th>Amt</th>";
  cell7.outerHTML  = "<th>Qty</th>";
  cell8.outerHTML  = "<th>Tujuan</th>";
  cell9.outerHTML  = "<th>Pengisi</th>";
  cell10.outerHTML = "<th>Store Id</th>";
  cell11.outerHTML = "<th>Ending Balance</th>";
  cell12.outerHTML = "<th>Status</th>";
  cell13.outerHTML = "<th>Stat</th>";
  cell14.outerHTML = "<th>Berita</th>";
}

function createCellTable(table, col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11,col12,col13,col14,is_curent_date){
  var row    = table.insertRow(0);
  var cell1  = row.insertCell(0);
  var cell2  = row.insertCell(1);
  var cell3  = row.insertCell(2);
  var cell4  = row.insertCell(3);
  var cell5  = row.insertCell(4);
  var cell6  = row.insertCell(5);
  var cell7  = row.insertCell(6);
  var cell8  = row.insertCell(7);
  var cell9  = row.insertCell(8);
  var cell10 = row.insertCell(9);
  var cell11 = row.insertCell(10);
  var cell12 = row.insertCell(11);
  var cell13 = row.insertCell(12);
  var cell14 = row.insertCell(13);
  // Add some text to the new cells

  cell1.innerHTML  = col1;
  cell2.innerHTML  = col2;
  var current_date = "";
  if (is_curent_date.includes("HARI INI")) {
      current_date = '<span style="color:#223e92"><b>'+col4+'</b></div>';
  }else{
      current_date = '<span style="color:#7b7b7b"><b>'+col4+'</b></div>';
  }
  cell3.innerHTML  = col3;
  cell4.innerHTML  = current_date;
  cell5.innerHTML  = col5;
  cell6.innerHTML  = '<div style="width:100%;text-align:right">'+col6+'</div>';
  cell7.innerHTML  = '<div style="width:100%;text-align:right">'+col7+'</div>';
  cell8.innerHTML  = col8;
  cell9.innerHTML  = col9;
  cell10.innerHTML = col10;
  cell11.innerHTML = '<div style="width:100%;text-align:right">'+col11+'</div>';
  //cell12.innerHTML = col12;
  var status = "";
  if (col13.endsWith("SUKSES")) {
       status = '<div title="Transaksi Sukses" class="status-sukses"></div>';
  }else if(col13.endsWith("PENDING")){
      status = '<div title="Transaksi Pending" class="status-pending"></div>';
  }else if(col13.endsWith("GAGAL")){
       status = '<div title="Transaksi Gagal" class="status-gagal"></div>';
  }

  cell12.innerHTML = status;
  var berita = "";
  if (col14 != null) {
    if (col14.startsWith("SN=")) {
      if (col14.length > 3) {
          berita = '<div style="width:100%;text-align:left">'+'<button onclick="copy(\' '+ col14 +' \' , \' textcopy '+ col1+ ' \')">copy</button> '+col14+'</div>';
      }else{
          berita = '<span style="text-align:left">'+col14+'</span>';
      }
    }else{
        berita = '<span style="text-align:left">'+col14+'</span>';
    }
  }
  cell13.innerHTML = col12;
  cell14.innerHTML = berita;
}

function copy(text, id){
  var tmpId = id;
  var copyText = document.getElementById("textcopytmp");
  copyText.value = text;
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Text telah dicopy: " + copyText.value);

}
//cari();
var sampledata = [
['Foo', 'programmer'],
['Bar', 'bus driver'],
['Moo', 'Reindeer Hunter']
];


function export_csv() {
    syncExportData();
}

var dataExport = [];
function syncExportData(){
    loading.display   = "block";
    var input_trans_stat = document.getElementById("input_trans_stat").value;
    var t = getDateTime();
    var h = sha1(input_no_hp.value+ input_start_date.value + input_end_date.value + input_trans_stat + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);
    $.ajax({
        type: "POST",
        url:  "<?php echo base_url(); ?>" + "histori/exportdata",
        data: JSON.stringify({
  no_hp : input_no_hp.value,
            start_date : input_start_date.value,
            end_date   : input_end_date.value,
            trans_stat : input_trans_stat,
            store_id   : "<?=$this->session->userdata('store_id')?>",
            uname      : '<?=$this->session->userdata('username')?>',
            t:t,h:h}),
        contentType: "application/json;",
        cache: false,
        success: function(result){
            if(result.includes("Login Web Report")){
            window.location = "<?=base_url()?>index.php/webreport/logout";
            }

            loading.display = "none";
            var rs = JSON.parse(result);
            var columnAmount = 14;
            // console.log(rs);
            for (var i = (rs.length-1); i >= 0; i--){
                // dataExport[i] =

                var objColumn = [
                    rs[i].ROW_NUM,
                    rs[i].MESSAGEID,
                    rs[i].REQUESTID,
                    rs[i].TIME_START,
                    rs[i].NOM,
                    rs[i].AMOUNT,
                    rs[i].QTY,
                    rs[i].TUJUAN,
                    rs[i].PENGISI,
                    rs[i].STORE_ID,
                    rs[i].ENDING_BALANCE,
                    rs[i].TRANS_STAT,
                    rs[i].KET,
                    rs[i].BERITA
                ];
                dataExport[i] = objColumn;
            }

        // process
        var csv = 'No.,Msg Id,Req id,Time Start,Nom,Amt,Qty,Tujuan,Pengisi,Store Id,Ending Balance,Status,Stat,Berita\n';

        dataExport.forEach(function(row) {
                csv += row.join(',');
                csv += "\n";
        });

        console.log(csv);
        var hiddenElement = document.createElement('a');
        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
        hiddenElement.target = '_blank';

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '-' + dd + '-' + yyyy;
        var csvName = 'Histori_transaksi_'+today;
        hiddenElement.download = csvName+'.csv';
        hiddenElement.click();
        //end

      },
      error: function (request, status, error) {
          //console.log(request.responseText);
          loading.display = "none";
      }
});



</script>

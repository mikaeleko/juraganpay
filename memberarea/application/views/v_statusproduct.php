<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style>
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
                            <img class="nav-menu" id="left-menu" onclick="openMenu()" src="<?php echo base_url() ?>/images/asset/menu-blue.png">
                            <img class="logo-st24" onclick="home()" src="<?php echo base_url() ?>/images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7 col-md-4">
                        <div class="header-center">
                            <div class="box-header"><span class="box-header-title">STATUS PRODUK</span></div>
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
                        <div class="body-right-container smooth">
                          <div id="toast" class="toast">
                              <div class="toast-body">
                                  <span id="toast-text"></span>
                                  <img class="toast-close" onclick="closeToast()" title="Tutup" src="<?=base_url()?>/images/asset/remove.svg">
                              </div>
                          </div>
                            <div class="box-primary">
                                <div class="row">
                                    <div class="col-desk-12">
                                        <div>
                                          <!-- contoh 0856282829339 -->
                                            <input type="text" class="form-input-text" id="input_key" value="" placeholder="keterangan..">
                                            <select id="input_prv" class="select">
                                                <option value="" disabled>Pilih Provider<option>
                                                <?php foreach($prv as $option):?>
                                                <option value="<?php echo $option->KODE_PROVIDER;?>"><?php echo $option->KODE_PROVIDER;?></option>
                                                <?php endforeach;?>
                                            </select>


                                            <input type="submit" onClick="onClickCari()" value="Filter">
                                            <div style="float:right">
                                                <button onclick="export_csv()" id="button-export" title="Export ke csv" class="button button-export">
                                                    <img class="csv-export-img" style="width:25px;height:25px" src="<?=base_url()?>images/asset/csv.svg">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                </div>
                                <div class="alert alert-info" style="display:none" id="alertinfo">
                                    <span id="text-alert"></span>
                                </div>
                                <input type="text" style="position: fixed;bottom:0;right:0;pointer-events: none;opacity: 0;transform: scale(0);"  value="" id="textcopytmp">

                                <div  style="overflow-x:auto;">
                                  <div class="col-desk-12 col-sm-12 col-md-12">


                                      <div id="divProduk">

                                      </div>


                                  </div>

                                  <!-- <table class="table" id="table">
                                  </table> -->

                                </div>

                                <div class="pagination-parent">
                                    <a href="#" id="prevpage" style="display:none" onclick="cariDataSebelumnya()">
                                        <div class="pagination">
                                            <span><</span>
                                        </div>
                                    </a>
                                    <a href="#" id="nextpage" style="display:none" onclick="cariDataLanjutan()">
                                        <div class="pagination">
                                            <span>></span>
                                        </div>
                                    </a>
                                    <!-- <a href="#">
                                        <div class="pagination">
                                            <span>1</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pagination">
                                            <span>2</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pagination">
                                            <span>></span>
                                        </div>
                                    </a> -->
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
        <script src="<?php echo base_url() ?>assets/js/inbox.js"></script>
        <script src="<?php echo base_url() ?>assets/js/news.js"></script>
        <script>

        function angka(e) {
          var x      ="";
          var hasil ="";
          if (!/^[0-9]+$/.test(e.value)) {
            e.value = e.value.substring(0,e.value.length-1);
          }
        }

        var loading   = document.getElementById("loading").style;
        var alertinfo = document.getElementById("alertinfo").style;
        var nextpage  = document.getElementById("nextpage").style;
        var prevpage  = document.getElementById("prevpage").style;
        var table     = document.getElementById("table");
        var input_key = document.getElementById("input_key");
        var input_prv = document.getElementById("input_prv");
        var text_alert = document.getElementById("text-alert");
        var alertToast     = document.getElementById("toast");
        var alertToastText = document.getElementById("toast-text");

        function closeToast(){
            alertToast.style.display = "none";
        }

        $('#input_key').keypress(function (e) {
          if (e.which == 13) {
            divProduk.innerHTML = "";
            onClickCari();
            return false;    //<---- Add this line
          }
        });

        var offset = 1;
        var limit = 40;
        function cariDataLanjutan(){

          offset += 40;
          limit += 40;
          getdata();
        }
        function cariDataSebelumnya(){

          offset -= 40;
          limit -= 40;
          getdata();
        }

		function resetPagination(){
			offset = 1;
			limit  = 40;
		}

		function onClickCari(){
      divProduk.innerHTML = "";
			if(offset > 1) {
				resetPagination();
			}
			cari();
		}


        function cari(){
            if(offset>40){
              offset = 1;
              limit  = 40;
            }

            // if(input_key.value == ""){
            //     input_key.focus();
            //     text_alert.innerHTML = "Tidak boleh kosong";
            //     alertinfo.display = "block";
            //     return;
            // }
            getdata();
        }


        function getdata(){
            alertinfo.display = "none";
            loading.display   = "block";

            var t = getDateTime();

            if(input_prv.value!=""){
              var h = sha1(input_key.value + input_prv.value + '<?=$this->session->userdata('kd_price_plan')?>' + '<?=$this->session->userdata('lvl')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);
            } else {
              var h = sha1(input_key.value + '<?=$this->session->userdata('kd_price_plan')?>' + '<?=$this->session->userdata('lvl')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);
            }
            $.ajax({
    				type: "POST",
    				url:  "<?php echo base_url(); ?>" + "statusproduct/cari",
    				data: JSON.stringify({
                                  key   : input_key.value,
                                  prv   : input_prv.value,
                                  kode  : "<?=$this->session->userdata('kd_price_plan')?>",
                                  level : "<?=$this->session->userdata('lvl')?>",
                                  uname : '<?=$this->session->userdata('username')?>',
                                  offset:offset,
                                  limit :limit,
                                  t:t,
                                  h:h
                                }),

            contentType: "application/json;",
    				cache: false,
    				success: function(result){
                if(result.includes("Login Web Report")){
                  window.location = "<?=base_url()?>webreport/logout";
                }
                loading.display = "none";
                var rs = JSON.parse(result);

                var produk="";
                    header ="";
                    no = 0;
                    header +=
                       '<table width ="100%"> <tr style="background-color: rgba(0,175,233,1);color:#fff;"> <th>No.</th> <th> </th>  <th>Nom</th> <th>Produk</th> <th>Harga</th> <th>Harga Jual</th> <th>Margin</th> <th>Status</th> </tr>';
                for (var i = 0;i<rs.length; i++){
                  no++;

                  if(i % 2 == 0) {
                    color = "#FFF";
                  } else {
                    color = "#F1F1F1";
                  }
                  if (rs[i].STATUS=="OPEN"){
                    imgStatus = "save.png";
                  }else if(rs[i].STATUS=="CLOSE"){
                    imgStatus = "cross.png";
                  }
                  var inputId = 'form-input-hrgjual-'+i;
                  var f = "";
                  var str = rs[i].FEE.split(" ");
                  var admin = "";

                  if(rs[i].TAG == "#PEMBAYARAN"){
                    var FeeMarkup = '';
                    if(rs[i].PRICE == "0"){
                      FeeMarkup = 'Fee -';
                    }else if(rs[i].PRICE.startsWith('-')){
                      FeeMarkup = 'Fee '+(rs[i].PRICE.replace('-',''))
                    }else{
                      FeeMarkup = 'Markup '+rs[i].PRICE
                    }
                    console.log(FeeMarkup);
                    f = "<span style='font-size:14px;text-align:left;'>Admin  : " +(rs[i].FEE.replace('-',''))+ "<br>" + FeeMarkup+ "</span>";

                  } else if(rs[i].TAG != "#PEMBAYARAN"){
                      f = "<span style='font-size:14px;text-align:left;'>" + rs[i].HARGA+ "</span>";
                  }

                  produk +=  '<tr style="background-color:'+color+'">' +
                              '<td width="2%">'+rs[i].ROW_NUM+'</td>'+
                              '<td width="5%"> <img style="width:40px; height:40px; display:block; margin-left:auto; margin-right:auto; padding:3px;border-radius:0 10px 0 10px;" class="img-group" src="' + rs[i].IMG+' " > </td>'+
                              '<td width="5%">' + rs[i].NOM+' </td>'+
                              '<td width="20%"> <span style="font-weight:bold;font-size:16px;">'+ rs[i].SHORT_DSC + '</span>' +
                                '<br><span style="font-size:12px;">' + rs[i].KET + '</span>' +
                              '</td>'+
                              '<td width="10%">'+f+'</td>'+
                              '<td width="15%"> <span id="hrg-jual-'+i+'" class="hrjl">' + rs[i].HARGA_JUAL+'</span> <div style="width:160px;float:left;"><input class="form-input-hrgjual" id="'+inputId+'" onkeyup="angka(this);" type="text">  <button class="btn_apply" onclick="hrgJual(\''+rs[i].PRICE+'\',\'mrg-jual-'+i+'\' , \'hrg-jual-'+i+'\' , \''+inputId+'\' , \''+rs[i].NOM+'\');">Apply</button></div></td>' +
                              '<td width="10%"><span id="mrg-jual-'+i+'">'+rs[i].MARGIN+'</span></td>' +
                              '<td width="10%">'+rs[i].STATUS+
                              '<img style="width:20px; height:20px; display:block; padding:3px;border-radius: 0 10px 0 10px;text-align:center;vertical-align:middle;margin:0 auto;float:left;" src="<?php echo base_url(); ?>images/icon/'+imgStatus+' " >' +
                              '</td>' +
                            '</tr>' ;

                            divProduk.innerHTML = header+produk+'</table>';
                }

                    if (rs.length>0) {
                        //createheaderTable(table);
                    }else{
                        text_alert.innerHTML = "Tidak ditemukan";
                        alertinfo.display = "block";
                    }

                    if (rs.length>=40) {
                      nextpage.display = "block";
                    }else{
                      nextpage.display = "none";
                    }
                    if (offset>40) {
                      prevpage.display = "block";
                    }else{
                      prevpage.display = "none";
                    }

            },
              error: function (request, status, error) {
                  console.log(request.responseText);
                  loading.display = "none";
            }
    			  });
        }



        function hrgJual(hrgJual,mrgJualId,hrgJualId,inputId,nom){
          alertToast.style.display = "none";
          //var price = document.getElementsByClassName("form-input-hrgjual");
          var price = $("#"+inputId).val();
          console.log('price :'+price+' | hrgJual :'+hrgJual);
          var margin = parseInt(price)-parseInt(hrgJual);


              if (price == ""){
                alertToast.style.display = "block";
                alertToastText.innerHTML = "Silahkan Tentukan Harga Jual Anda";
                this.focus();
              }else{

              t = getDateTime();
              h = sha1('<?=$this->session->userdata('username')?>' + '<?=$this->session->userdata('store_id')?>' + nom + price + t);

                $.ajax({
                    type: "POST",
                    url:  "<?=base_url();?>" + "statusproduct/cekoutlet",
                    data: JSON.stringify({
                        username : '<?=$this->session->userdata('username')?>',
                        store_id : '<?=$this->session->userdata('store_id')?>',
                        nom      : nom,
                        price    : price,
                        t        : t,
                        h        : h
                    }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(result){

                        $('#'+hrgJualId).html('Rp. '+price);
                        $('#'+mrgJualId).html('Rp. '+margin);
                        document.getElementById(hrgJualId).value="";
                        var resultRes = JSON.parse(result);
                      
                        if(resultRes.status == 'SUKSES INSERT') {
                          alertToast.style.display = "block";
                          alertToastText.innerHTML = resultRes.pesan;

                        } else if (resultRes.status == 'SUKSES UPDATE') {
                          alertToast.style.display = "block";
                          alertToastText.innerHTML = resultRes.pesan;
                        }
                    }
                });
              }
          // return false;
        }

        getdata();

        var dataExport = [];
        function export_csv(){
            dataExport = [];
            loading.display   = "block";
            var t = getDateTime();
            var h = sha1(input_key.value + '<?=$this->session->userdata('username')?>' + '<?=$this->session->userdata('kd_price_plan')?>' + t);
            $.ajax({
              type: "POST",
              url:  "<?php echo base_url(); ?>" + "statusproduct/exportcsv",
              data: JSON.stringify({
                                key   : input_key.value,
                                prv   : input_prv.value,
                                kode  : "<?=$this->session->userdata('kd_price_plan')?>",
                                level : "<?=$this->session->userdata('lvl')?>",
                                uname : '<?=$this->session->userdata('username')?>',
                                t:t,
                                h:h
                              }),
              contentType: "application/json;",
              cache: false,
              success: function(result){
                if(result.includes("Login Web Report")){
                window.location = "<?=base_url()?>webreport/logout";
                }

                loading.display = "none";
                try{
                  var rs = JSON.parse(result);
                  var columnAmount = 5;
                  // console.log(rs);
                  for (var i = (rs.length-1); i >= 0; i--){
                      // dataExport[i] =
                      var price = "";
                      if(rs[i].TAG == "#PEMBAYARAN"){
                        var FeeMarkup = '';
                        if(rs[i].PRICE == "0"){
                          FeeMarkup = 'Fee : 0';
                        }else if(rs[i].PRICE.startsWith('-')){
                          FeeMarkup = 'Fee : Rp '+(rs[i].PRICE.replace('-',''))
                        }else{
                          FeeMarkup = 'Markup : Rp '+rs[i].PRICE
                        }
                        console.log(FeeMarkup);
                        price = "Admin  : " +(rs[i].FEE.replace('-',''))+ " " + FeeMarkup;

                      } else if(rs[i].TAG != "#PEMBAYARAN"){
                        price = rs[i].HARGA;
                      }

                      var objColumn = [
                        rs[i].ROW_NUM,rs[i].NOM,rs[i].SHORT_DSC,rs[i].KET,price,rs[i].STATUS
                      ];
                      dataExport[i] = objColumn;
                  }

                  // process
                  var csv = 'No.,Nom,Produk,Deskrpsi Produk,Harga, Status\n';

                  dataExport.forEach(function(row) {
                          csv += row.join(',');
                          csv += "\n";
                  });

                  //console.log(csv);
                  var hiddenElement = document.createElement('a');
                  hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                  hiddenElement.target = '_blank';

                  var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = mm + '-' + dd + '-' + yyyy;
                  var csvName = 'status_produk_'+today;
                  hiddenElement.download = csvName+'.csv';
                  hiddenElement.click();
                  //end
                }catch(err){
                  alert("Terjadi kesalahan");
                  return;
                }

              },
              error: function (request, status, error) {
                  //console.log(request.responseText);
                  loading.display = "none";
              }
    		    });
        }

        </script>
    </body>
</html>

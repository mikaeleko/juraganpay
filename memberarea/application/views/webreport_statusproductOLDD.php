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
            //table.innerHTML   = "";
            // divProduk.innerHTML = "";
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
                //console.log(rs);
                var produk="";
                    header ="";
                    no = 0;
                    header +=
                       '<table width ="100%"> <tr style="background-color: rgba(0,175,233,1);color:#fff;"> <th>No.</th> <th> </th>  <th>Produk</th> <th>Harga</th> <th>Harga Jual</th> <th>Margin</th> <th>Status</th> </tr>';
                for (var i = 0;i<rs.length; i++){
                  no++;
                  // createCellTable(
                  //   table,
                  //   rs[i].ROW_NUM, rs[i].TAG, rs[i].NOM, rs[i].KET, rs[i].HARGA, rs[i].STATUS, rs[i].IMG, rs[i].FEE, rs[i].DISCOUNT);
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
                  //var marginId = 'form-input-mrgjual-'+i;

                  produk +=  '<tr style="background-color:'+color+'">' +
                              '<td width="2%">'+no+'</td>'+
                              '<td width="5%"> <img style="width:40px; height:40px; display:block; margin-left:auto; margin-right:auto; padding:3px;border-radius:0 10px 0 10px;" class="img-group" src="' + rs[i].IMG+' " > </td>'+
                              '<td width="20%"> <span style="font-weight:bold;font-size:16px;">'+ rs[i].SHORT_DSC + '</span>' +
                                '<br><span style="font-size:12px;">' + rs[i].KET + '</span>' +
                              '</td>'+
                              '<td width="10%">'+rs[i].HARGA+'</td>'+
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
          //alert(margin);

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
                        // if(result.includes("Login Web Report")){
                        //     window.location = "<?=base_url()?>webreport/logout";
                        // }
                        $('#'+hrgJualId).html('Rp. '+price);
                        $('#'+mrgJualId).html('Rp. '+margin);
                        var resultRes = JSON.parse(result);
                        // console.log(resultRes);
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





        // function createheaderTable(table){
        //   var row = table.insertRow(0);
        //   var cell1  = row.insertCell(0);
        //   var cell2  = row.insertCell(1);
        //   var cell3  = row.insertCell(2);
        //   var cell4  = row.insertCell(3);
        //   var cell5  = row.insertCell(4);
        //   var cell6  = row.insertCell(5);
        //   var cell7  = row.insertCell(6);
        //   var cell8  = row.insertCell(7);
        //   //var cell9  = row.insertCell(8);
        //
        //   cell1.outerHTML = "<th>No.</th>";
        //   cell2.outerHTML = "<th></th>";
        //   cell3.outerHTML = "<th>Tag</th>";
        //   cell4.outerHTML = "<th>Nom</th>";
        //   cell5.outerHTML = "<th>Ket</th>";
        //   cell6.outerHTML = "<th>Harga</th>";
        //   cell7.outerHTML = "<th>Info</th>";
        //   cell8.outerHTML = "<th>Status</th>";
        //   //cell9.outerHTML = "<th>Discount</th>"
        // }
        //
        // function createCellTable(table, col1,col2,col3,col4,col5,col6,col7,col8,col9,col10){
        //   var row = table.insertRow(0);
        //   var cell1 = row.insertCell(0);
        //   var cell2 = row.insertCell(1);
        //   var cell3 = row.insertCell(2);
        //   var cell4 = row.insertCell(3);
        //   var cell5 = row.insertCell(4);
        //   var cell6 = row.insertCell(5);
        //   var cell7 = row.insertCell(6);
        //   var cell8 = row.insertCell(7);
        //   //var cell9 = row.insertCell(8);
        //
        //   cell1.innerHTML = col1
        //   cell2.innerHTML = '<img style="width:40px; height:40px; display:block; margin-left:auto; margin-right:auto; padding:3px;border-radius:0 10px 0 10px;" src="<?php echo HOST_API_IMAGE; ?>get_img?file=iconproduk/'+col7+'">';
        //   cell3.innerHTML = col2;
        //   cell4.innerHTML = col3;
        //   cell5.innerHTML = col4;
        //   //console.log(col2);
        //   if (col2=="#PEMBAYARAN"){
        //       col9    = col9.replace("Rp. ", "");
        //       col99    = col9.replace("-", "");
        //       var min = col9.endsWith("-");
        //
        //       if (min) {
        //           col8 = 'Adm = ' +col8 +', Disc = Rp. ' + col99;
        //       } else {
        //           col8 = 'Adm = ' +col8 + ((col99!='0')?(', Markup = Rp. ' + col99) : '');
        //       }
        //    } else {
        //      col8 = "";
        //    }
        //   cell6.innerHTML = '<div style="width:100%;text-align:right">'+col5+'</div>';
        //   cell7.innerHTML = col8;
        //   if (col6=="OPEN"){
        //     imgcol6 = "save.png";
        //   }else if(col6=="CLOSE"){
        //     imgcol6 = "cross.png";
        //   }
        //   cell8.innerHTML = '<div style="width:100%;">'+col6+'<img style="width:20px; height:20px; display:block; padding:3px;border-radius: 0 10px 0 10px;text-align:center;vertical-align:middle;margin:0 auto;float:right;" src="<?php echo base_url(); ?>images/icon/'+imgcol6+'"></div>';
        //   //cell9.innerHTML = '<div id="disc" style="width:100%;text-align:right">'+col9+'</div>';
        // }

        getdata();

        </script>
    </body>
</html>

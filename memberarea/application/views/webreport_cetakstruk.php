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
            <div id="modal" class="modal">
                <div class="modal-body">
                    <div id="box-ubah-harga" style="display:none;position:absolute;width:100%;background-color:#00000038;left:0px;height:100%;">
                        <div style="padding:10px;margin-top:25%;background-color:white">
                            <label>Ubah Harga :</label><br>
                            <input id="input-ubah-harga" type="text" class="form-input-text">
                            <button onclick="ubahHargaAction('simpan')" class="button">Simpan</button>
                            <button onclick="ubahHargaAction('batal')" class="button">Batal</button>
                        </div>
                    </div>
                    <div class="modal-title">
                        <p>Konfirmasi</p>
                    </div>
                    <div align="center">
                        <button id="button-ubah-harga" class="button" onclick="openBoxUbahHarga()">Ubah Harga</button>
                        <span id="text-print"></span>
                        <br>
                        <button onclick="printDiv('print-area')" id="btn-kirim" class="button">
                            <img style="width:25px;height:25px" src="<?=base_url()?>images/asset/print.svg">
                        </button>
                    </div>

                    <div>
                        <button onclick="closeModal()" class="button">Kembali</button>
                    </div>
                </div>
            </div>
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
                            <div class="box-header"><span class="box-header-title">CETAK STRUK</span></div>
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
                            <div class="box-primary">
                                <div class="row">
                                    <div class="col-desk-12">
                                        <div>
                                            <input type="text" class="form-input-text" id="input_key" value="" placeholder="no tujuan"><input type="submit" onclick="onClickCari()" value="Cari">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                </div>
                                <div class="alert alert-info" style="display:none" id="alertinfo">
                                    <span id="text-alert"></span>
                                </div>
                                <input type="text" style="
                                    position: fixed;
                                    bottom: 0;
                                    right: 0;
                                    pointer-events: none;
                                    opacity: 0;
                                    transform: scale(0);"  value="" id="textcopytmp">
                                <div style="overflow-x:auto;">
                                  <table class="table" id="table">
                                  </table>
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
        <script src="<?php echo base_url() ?>assets/js/modal.js"></script>
        <script src="<?php echo base_url() ?>assets/js/inbox.js"></script>
        <script src="<?php echo base_url() ?>assets/js/news.js"></script>
        <script>
        $('#input_key').keypress(function (e) {
          if (e.which == 13) {
            onClickCari();
            return false;    //<---- Add this line
          }
        });

        var offset = 1;
        var limit = 100;
        var strukArrayTemp = [];
        var resultDataDitemukan = [];
        function cariDataLanjutan(){
          offset += 100;
          limit += 100;
          cari();
        }
        function cariDataSebelumnya(){
          offset -= 100;
          limit -= 100;
          cari();
        }

		function resetPagination(){
			offset = 1;
			limit  = 100;
		}

		function onClickCari(){
			if(offset > 1) {
				resetPagination();
			}
			cari();
		}

        function cari(){
            var loading = document.getElementById("loading").style;
            var alertinfo = document.getElementById("alertinfo").style;
            var nextpage = document.getElementById("nextpage").style;
            var prevpage = document.getElementById("prevpage").style;
            var table = document.getElementById("table");
            var input_key = document.getElementById("input_key");
            var text_alert = document.getElementById("text-alert");
            if(input_key.value == ""){
                input_key.focus();
                text_alert.innerHTML = "Tidak boleh kosong";
                alertinfo.display = "block";
                return;
            }

            alertinfo.display = "none";
            loading.display = "block";
            table.innerHTML = "";

            var t = getDateTime();
            var h = sha1(input_key.value + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);

            $.ajax({
    				type: "POST",
    				url:  "<?php echo base_url(); ?>" + "cetakstruk/cari",
    				data: JSON.stringify({key: input_key.value, store_id : "<?=$this->session->userdata('store_id')?>", uname : '<?=$this->session->userdata('username')?>',offset:offset,limit:limit, t:t,h:h}),
            contentType: "application/json;",
    				cache: false,
    				success: function(result){
              if(result.includes("Login Web Report")){
                window.location = "<?=base_url()?>webreport/logout";
              }
                loading.display = "none";
                //console.log(result);
                var rs = JSON.parse(result);
                resultDataDitemukan = rs;
                //console.log(rs);
                //console.log(rs);
                for (var i = (rs.length-1); i >= 0; i--){
                    strukArrayTemp[i] = rs[i].STRUK_INFO;
                    createCellTable(
                        table,
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
                        rs[i].USER_NAME,
                        rs[i].KET,
                        rs[i].BERITA,
                        rs[i].IS_HARI_INI,
                        rs[i].PRODUCT_TYPE,
                        i,
						rs[i].T_RAW_STRUK
                    );
                }
                if (rs.length>0) {
                    createheaderTable(table);
                }else{
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
                //   console.log(request.responseText);
                  loading.display = "none";
              }
    			  });
        }

        function createheaderTable(table){
          var row = table.insertRow(0);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          var cell7 = row.insertCell(6);
          var cell8 = row.insertCell(7);
          var cell9 = row.insertCell(8);
          var cell10 = row.insertCell(9);
          var cell11 = row.insertCell(10);
          var cell12 = row.insertCell(11);
          //var cell13 = row.insertCell(12);
          var cell13 = row.insertCell(12);
          // Add some text to the new cells

          cell1.outerHTML = "<th>No.</th>";
          cell2.outerHTML = "<th>Msg</th>";
          cell3.outerHTML = "<th>Req id</th>";
          cell4.outerHTML = "<th>Time Start</th>";
          cell5.outerHTML = "<th>Nom</th>";
          cell6.outerHTML = "<th>Amt</th>";
          cell7.outerHTML = "<th>Qty</th>";
          cell8.outerHTML = "<th>Tujuan</th>";
          cell9.outerHTML = "<th>Pengisi</th>";
          cell10.outerHTML = "<th>Store Id</th>";
          cell11.outerHTML = "<th>Ending Balance</th>";
          cell12.outerHTML = "<th>Status</th>";
          cell13.outerHTML = "<th>Opsi</th>";
        }

		var tRawStruk = null;

        function createCellTable(table, col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11,col12,col13,col14,is_curent_date,productType,indexRow,tRawStrukParam){
		  var row = table.insertRow(0);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          var cell7 = row.insertCell(6);
          var cell8 = row.insertCell(7);
          var cell9 = row.insertCell(8);
          var cell10 = row.insertCell(9);
          var cell11 = row.insertCell(10);
          var cell12 = row.insertCell(11);
          var cell13 = row.insertCell(12);


          cell1.innerHTML = col1;
          cell2.innerHTML = col2;
          var current_date = "";
          if (is_curent_date.includes("HARI INI")) {
              current_date = '<span style="color:#223e92"><b>'+col4+'</b></div>';
          }else{
              current_date = '<span style="color:#7b7b7b"><b>'+col4+'</b></div>';
          }
          cell3.innerHTML = col3;
          cell4.innerHTML = current_date;
          cell5.innerHTML = col5;
          cell6.innerHTML = '<div style="width:100%;text-align:right">'+col6+'</div>';
          cell7.innerHTML = '<div style="width:100%;text-align:right">'+col7+'</div>';
          cell8.innerHTML = col8;
          cell9.innerHTML = col9;
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

          col14 = col14==null?"":col14;
          console.log(col14);
          if (col14.length > 3) {
              berita = '<div style="width:100%;text-align:left">'+'<button title="Cetak Struk" class="button" style="padding:4px;margin:2px;cursor:pointer" onclick="printView(\''+col14+'\','+indexRow+',\''+productType+'\')">'+
              '<img style="width:25px;height:25px" src="<?=base_url()?>images/asset/print.svg"></button>'+
              '</div>';
          }else{
              berita = '<span style="text-align:left">'+col14+'</span>';
          }
          cell13.innerHTML = berita;
        }

        var textTmp,indexTmp,productTypeTmp;

        function printView(text, index, productType){
            textTmp = text;
            indexTmp = index;
            productTypeTmp = productType;
            var modal = document.getElementById("modal");
            var textPrint = document.getElementById("text-print");
            var messageSplit = "";
            var printMessage = "";
            if(resultDataDitemukan[index].T_RAW_STRUK == null){
                $('#button-ubah-harga').show(500);
            }else{
                $('#button-ubah-harga').hide();
            }
            if(productType == "B"){
                var strukParse = JSON.parse(strukArrayTemp[index]);              
                messageSplit = strukParse.info.replace(/([|])/g,'<br>');

            }else{
                var dataPrintSelection = resultDataDitemukan[index];
                var textNonPay = "STRUK||Outlet:"+outletName+
                "|SN:"+dataPrintSelection.BERITA.replace("SN=","")+
                "|Kode Produk:"+dataPrintSelection.NOM+
                "|Tanggal:"+dataPrintSelection.TIME_START+
                "|No Tujuan:"+dataPrintSelection.TUJUAN+
                "|Harga:"+dataPrintSelection.AMOUNT;
                $('#input-ubah-harga').val(dataPrintSelection.AMOUNT);
				messageSplit = textNonPay.replace(/([|])/g,'<br>');
            }
            printMessage += '<div id="print-area">';
            printMessage += '<div style="font-family:monospace;font-size:12;text-align:left"><pre>';
            printMessage += (resultDataDitemukan[index].T_RAW_STRUK != null?(resultDataDitemukan[index].T_RAW_STRUK.STRUK):messageSplit)+'[CU]';

            printMessage += "</pre></div>";
            printMessage += "</div>";
            textPrint.innerHTML = printMessage;

            modal.style.display = "block";

        }
        function printDiv(idDiv) {
                w=window.open();
                w.document.write($('#'+idDiv).html());
                w.print();
                w.close();
        }

        function closeModal(){
            modal.style.display = "none";
        }

        function ubahHargaAction(action){
            if(action == 'simpan'){
                resultDataDitemukan[indexTmp].AMOUNT = $('#input-ubah-harga').val();;
                printView(textTmp,indexTmp,productTypeTmp);
                $('#box-ubah-harga').hide();
            }else if(action == 'batal'){
                $('#box-ubah-harga').hide();
            }
        }

        function openBoxUbahHarga(){
            $('#box-ubah-harga').show(100);
            $('#input-ubah-harga').focus();
        }
        </script>
    </body>
</html>

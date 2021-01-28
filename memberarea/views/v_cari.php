<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
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
                            <div class="box-header"><span class="box-header-title">CEK TRANSAKSI</span></div>
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
                                      <input type="text" class="form-input-text" id="input_key" value="" placeholder="no tujuan">
                                      <input type="date" class="form-input-date" id="input_start_date" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl awal">
                                      <input type="date" class="form-input-date" id="input_end_date" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl akhir">
                                      <input type="submit" onclick="onClickCari()" value="Cari">
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                </div>
                                <div class="alert alert-info" style="display:none" id="alertinfo">
                                    <span id="text-alert"></span>
                                </div>
                                <input type="text" style="
                                    bottom: 0;
                                    position:fixed;
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
            var h = sha1(input_key.value + input_start_date.value + input_end_date.value + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);

            $.ajax({
    				type: "POST",
    				url:  "<?php echo base_url(); ?>" + "cari/cari",
    				data: JSON.stringify({
                              key: input_key.value,
                              start_date : input_start_date.value,
                              end_date   : input_end_date.value,
                              store_id : "<?=$this->session->userdata('store_id')?>",
                              uname : '<?=$this->session->userdata('username')?>',
                              offset:offset,
                              limit:limit,
                              t:t,
                              h:h}),
            contentType: "application/json;",
    				cache: false,
    				success: function(result){
              if(result.includes("Login Web Report")){
                window.location = "<?=base_url()?>webreport/logout";
              }
                loading.display = "none";
                var rs = JSON.parse(result);

                for (var i = (rs.length-1); i >= 0; i--){
                  createCellTable(
                    table,
                    rs[i].ROW_NUM,rs[i].MESSAGEID,rs[i].REQUESTID,rs[i].TIME_START,rs[i].NOM,rs[i].AMOUNT,rs[i].QTY,rs[i].TUJUAN,rs[i].PENGISI,rs[i].STORE_ID,rs[i].ENDING_BALANCE,rs[i].USER_NAME,rs[i].KET,rs[i].BERITA,rs[i].IS_HARI_INI);
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
          cell13.outerHTML = "<th>Berita</th>";
        }

        function createCellTable(table, col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11,col12,col13,col14,is_curent_date){
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
              berita = '<div style="width:100%;text-align:left">'+'<button onclick="copy(\''+col14+'\',\'textcopy'+col1+'\')">copy</button> '+col14+'</div>';
          }else{
              berita = '<span style="text-align:left">'+col14+'</span>';
          }
          cell13.innerHTML = berita;
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
        </script>
    </body>
</html>
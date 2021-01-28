<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>ST24</title>
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
        .button-export{
            display:none;
            animation-name:showButton;
            animation-duration:0.5s;
        }
        .csv-export-img{
            animation-name:showCsvImg;
            animation-duration:0.5s;
        }

        @keyframes showCsvImg {
            from {opacity: 0;width:0px;height:0px;}
            to {opacity: 1;width:25px;height:25px;}
        }

        @keyframes showButton {
            from {opacity: 0;width:3px;height:3px;}
            to {opacity: 1;width:43px;height:43px;}
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
                            <div class="box-header"><span class="box-header-title">BALANCE DEBIT CREDIT</span></div>
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
                                          <!-- contoh 0856282829339 -->
                                            <input type="date" class="form-input-date" id="input_start_date" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl awal">
                                            <input type="date" class="form-input-date" id="input_end_date" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl akhir">
                                            <input type="submit" onclick="onClickCari()" value="Filter">
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
                                <input type="text" style="position:fixed; bottom:0; right:0; pointer-events:none; opacity:0; transform: scale(0);"  value="" id="textcopytmp">
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

        var input_start_date = document.getElementById("input_start_date");
        var input_end_date   = document.getElementById("input_end_date");
        var loading   = document.getElementById("loading").style;
        var alertinfo = document.getElementById("alertinfo").style;
        var nextpage  = document.getElementById("nextpage").style;
        var prevpage  = document.getElementById("prevpage").style;
        var table     = document.getElementById("table");
        var exportButton = document.getElementById("button-export");;
        function cari(){
            var text_alert = document.getElementById("text-alert");
            alertinfo.display = "none";

            //cek tanggal
            if(input_start_date.value == ""){
                exportButton.style.display = "none";
                text_alert.innerHTML = "Tanggal awal harus diisi";
                alertinfo.display = "block";
                input_start_date.focus();
                return;
            }
            if(input_end_date.value == ""){
                exportButton.style.display = "none";
                text_alert.innerHTML = "Tanggal akhir harus diisi";
                alertinfo.display = "block";
                input_end_date.focus();
                return;
            }

            var from_startdate = new Date(input_start_date.value);
            var to_enddate     = new Date(input_end_date.value);
            if(from_startdate > to_enddate){
                exportButton.style.display = "none";
                text_alert.innerHTML = "Tanggal awal harus lebih kecil dengan tanggal akhir";
                alertinfo.display = "block";
                return;
            }

            const date1 = new Date(input_start_date.value);
            const date2 = new Date(input_end_date.value);
            const diffTime = Math.abs(date2.getTime() - date1.getTime());
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            //cek jarak tgl
            if(!(diffDays >= 0 && diffDays <=7)){
                exportButton.style.display = "none";
                text_alert.innerHTML = "Jarak tanggal awal ke tanggal akhir maksimal 7 hari";
                alertinfo.display = "block";
                return;
            }
            //end
            var t = getDateTime();
            var h = sha1(input_start_date.value + input_end_date.value + '<?=$this->session->userdata('lvl')?>' + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);
            loading.display   = "block";
            table.innerHTML   = "";
            $.ajax({
    				type: "POST",
    				url:  "<?php echo base_url(); ?>" + "balancedebitcredit/cari",
    				data: JSON.stringify({start_date: input_start_date.value, end_date : input_end_date.value, lvl: '<?=$this->session->userdata('lvl')?>', store_id : "<?=$this->session->userdata('store_id')?>", uname : '<?=$this->session->userdata('username')?>',offset:offset,limit:limit, t:t,h:h}),
                    contentType: "application/json;",
    				cache: false,
    				success: function(result){
                if(result.includes("Login Web Report")){
                  window.location = "<?=base_url()?>webreport/logout";
                }

                loading.display = "none";
                var rs = JSON.parse(result);
                // console.log(rs);
                for (var i = (rs.length-1); i >= 0; i--){
                  createCellTable(
                    table,
                    rs[i].ROW_NUM,rs[i].MESSAGEID,rs[i].USER_NAME,rs[i].STORE_ID,rs[i].FULL_NAME,rs[i].TRANS_DATE,rs[i].DB,rs[i].CR,rs[i].BALANCE,rs[i].TRANS_STAT,rs[i].DSC);
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
          // Add some text to the new cells

          cell1.outerHTML  = "<th>No.</th>";
          cell2.outerHTML  = "<th>Msg Id</th>";
          cell3.outerHTML  = "<th>Username</th>";
          cell4.outerHTML  = "<th>Store Id</th>";
          cell5.outerHTML  = "<th>Full Name</th>";
          cell6.outerHTML  = "<th>Trans Date</th>";
          cell7.outerHTML  = "<th>(DB)</th>";
          cell8.outerHTML  = "<th>CR</th>";
          cell9.outerHTML = "<th>Balance</th>";
          cell10.outerHTML = "<th>Trans Stat</th>";
          cell11.outerHTML = "<th>Dsc</th>";
        }

        function createCellTable(table, col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11){
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
          // Add some text to the new cells

          cell1.innerHTML  = col1;
          cell2.innerHTML  = col2;

          cell3.innerHTML  = col3;
          cell4.innerHTML  = col4;
          cell5.innerHTML  = col5;
          cell6.innerHTML  = col6;
          cell7.outerHTML  = '<td '+(col7==null || col7==''?'':'style="background-color:#28bf28"')+'>'+(col7 == null || col7==''?'<div style="width:100%;text-align:center;color:black">-</div>':'<div style="width:100%;text-align:right;color:white">'+'('+col7.trim()+')'+'</div>')+'</td>';
          cell8.outerHTML  = '<td '+(col8==null || col8==''?'':'style="background-color:#223e92"')+'>'+(col8 == null || col8==''?'<div style="width:100%;text-align:center;color:black">-</div>':'<div style="width:100%;text-align:right;color:white">'+col8.trim()+'</div>')+'</td>';
          cell9.innerHTML = (col9 == null?'<div style="width:100%;text-align:center;color:black">-</div>':'<div style="width:100%;text-align:right">'+col9+'</div>');
          cell10.innerHTML = col10;
          cell11.innerHTML = col11;


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

        function export_csv() {
            syncExportData();
        }

        var dataExport = [];
        function syncExportData(){
            loading.display   = "block";
            var t = getDateTime();
            var h = sha1(input_start_date.value + input_end_date.value + '<?=$this->session->userdata('lvl')?>' + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);
            $.ajax({
                type: "POST",
                url:  "<?php echo base_url(); ?>" + "balancedebitcredit/exportdata",
                data: JSON.stringify({
                    start_date : input_start_date.value,
                    end_date   : input_end_date.value,
                    lvl : '<?=$this->session->userdata('lvl')?>',
                    store_id   : "<?=$this->session->userdata('store_id')?>",
                    uname      : '<?=$this->session->userdata('username')?>',
                    t:t,h:h}),
                contentType: "application/json;",
                cache: false,
                success: function(result){
                    if(result.includes("Login Web Report")){
                    window.location = "<?=base_url()?>webreport/logout";
                    }

                    loading.display = "none";
                    var rs = JSON.parse(result);
                    var columnAmount = 14;

                    for (var i = (rs.length-1); i >= 0; i--){

                        var objColumn = [
                            rs[i].ROW_NUM,rs[i].MESSAGEID,rs[i].USER_NAME,rs[i].STORE_ID,rs[i].FULL_NAME,rs[i].TRANS_DATE,rs[i].DB,rs[i].CR,rs[i].BALANCE,rs[i].TRANS_STAT,rs[i].DSC
                        ];
                        dataExport[i] = objColumn;
                    }

                // process
                var csv = 'No.,Msg Id,Username,Store Id,Full Name,Trans Date,(DB),CR,Balance,Trans Stat,Dsc\n';

                dataExport.forEach(function(row) {
                        csv += row.join(',');
                        csv += "\n";
                });


                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = mm + '-' + dd + '-' + yyyy;
                var csvName = 'Balance_debit_credit_'+today;
                hiddenElement.download = csvName+'.csv';
                hiddenElement.click();
                //end

              },
              error: function (request, status, error) {
                
                  loading.display = "none";
              }
    		});

        }
        </script>
    </body>
</html>

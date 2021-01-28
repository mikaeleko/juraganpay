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
                            <div class="box-header"><span class="box-header-title">BERITA BARU</span></div>
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
                                            <input type="date" class="form-input-date" id="input_start_date" value="<?=date('Y-m-d',strtotime("-7 day"))?>" placeholder="tgl awal">
                                            <input type="date" class="form-input-date" id="input_end_date" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl akhir">
                                            <input type="text" class="form-input-text" id="input_key" value="" placeholder="Cari">
                                            <input type="submit" onclick="onClickCari()" value="Filter">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                </div>
                                <input type="text" style="
                                    position: fixed;
                                    bottom: 0;
                                    right: 0;
                                    pointer-events: none;
                                    opacity: 0;
                                    transform: scale(0);"  value="" id="textcopytmp">
                                <div class="alert alert-info" style="display:none" id="alertinfo">
                                    <span id="text-alert">Tidak ditemukan</span>
                                </div>
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

        var dataBerita = [];

        function cari(){
            dataBerita = [];
            var loading   = document.getElementById("loading").style;
            var alertinfo = document.getElementById("alertinfo").style;
            var nextpage  = document.getElementById("nextpage").style;
            var prevpage  = document.getElementById("prevpage").style;
            var table     = document.getElementById("table");
            var text_alert = document.getElementById("text-alert");
            alertinfo.display = "none";

            var input_start_date = document.getElementById("input_start_date");
            var input_end_date   = document.getElementById("input_end_date");
            var input_key = document.getElementById("input_key").value;
            //cek tanggal
            if(input_start_date.value == ""){
                text_alert.innerHTML = "Tanggal awal harus diisi";
                alertinfo.display = "block";
                input_start_date.focus();
                return;
            }
            if(input_end_date.value == ""){
                text_alert.innerHTML = "Tanggal akhir harus diisi";
                alertinfo.display = "block";
                input_end_date.focus();
                return;
            }
            var from_startdate = new Date(input_start_date.value);
            var to_enddate = new Date(input_end_date.value);
            if(from_startdate > to_enddate){
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
                text_alert.innerHTML = "Jarak tanggal awal ke tanggal akhir maksimal 7 hari";
                alertinfo.display = "block";
                return;
            }
            //end

            var t = getDateTime();
            var h = sha1(input_start_date.value + input_end_date.value  + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ offset + limit + t);
            table.innerHTML   = "";
            loading.display   = "block";
            $.ajax({
    				type: "POST",
    				url:  "<?php echo base_url(); ?>" + "berita/cari",
    				data: JSON.stringify({
                        start_date: input_start_date.value,
                        end_date : input_end_date.value,
                        input_key : input_key,
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
                //console.log(rs);
                for (var i = (rs.length-1); i >= 0; i--){

                  createCellTable(
                    table,
                    rs[i].ROW_NUM,
                    rs[i].NEWS_DATE2,
                    rs[i].PIC,
                    rs[i].TEXT,
                    rs[i].IS_READ,
                    i)
                }
                dataBerita = rs;
                if (rs.length>0) {
                    //createheaderTable(table);
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
                  //console.log(request.responseText);
                  offset = 1;
                  limit = 100;
                  loading.display = "none";
              }
            });

            actionRead();
        }

        function createheaderTable(table){
          var row    = table.insertRow(0);
          var cell1  = row.insertCell(0);
          var cell2  = row.insertCell(1);
          var cell3  = row.insertCell(2);
          var cell4  = row.insertCell(3);
          var cell5  = row.insertCell(4);
          var cell6  = row.insertCell(5);

          // Add some text to the new cells

          cell1.outerHTML  = "<th>No.</th>";
          cell2.outerHTML  = "<th>Tanggal</th>";
          cell3.outerHTML  = "<th>Picture</th>";
          cell4.outerHTML  = "<th>Isi</th>";

        }

        function createCellTable(table, col1,col2,col3,col4,col5, index){
          var row    = table.insertRow(0);
          var cell1  = row.insertCell(0);
          //var cell2  = row.insertCell(1);
          //var cell3  = row.insertCell(2);
         //var cell4  = row.insertCell(3);

          // Add some text to the new cells
          var is_new = "";
          if(col5 == "0"){
            is_new = '<span style="font-weight:600;padding:3px;background-color:green;color:white;right:0;position:absolute">NEW</span>';
          }
          var contentBerita = '';
          var img_url = encodeURI('<?=HOST_API?>get_news_pic?news_date='+col2);
          contentBerita +=
          '<div style="background-color:white;position:relative">'+
            '<div style="margin-right:15px;float:left;width:300px">'+
                '<img style="width:300px" src="'+img_url+'">'+
            '</div>'+
            '<div style="float:left;width:65%;">'+
                '<span style="font-weight:600;margin-right:10px">'+col2+'</span>'+
                is_new+
                '<br>'+
                '<span title="Klik untuk lebih lengkap" style="cursor:pointer" onclick="onclickExpand(this,'+index+')">'+
                col4.substr(0,200)+(col4.length > 200?'...':'')+
                '</span>'+
            '</div>'+
          '</div>';

          cell1.innerHTML  = contentBerita;
          //cell2.innerHTML  = col2;
          //cell3.innerHTML  = '<img src="data:image/png;base64,'+col3+'">';
          //cell4.innerHTML  = col4.substr(0,100)+(col4.length > 100?'...':'');
        }

        function onclickExpand(param,index){
            //console.log(index);
            //console.log(param.innerHTML.length);

            if(param.innerHTML.length == 201){
                param.innerHTML = dataBerita[index].TEXT;
            }else{
                param.innerHTML = dataBerita[index].TEXT.substr(0,200)+(dataBerita[index].TEXT.length > 200?'...':'');
            }
        }

        function actionView(){
            var action = '<?=isset($_GET["action"])?$_GET["action"]:""?>';
            if(action == 'view'){
                cari();
                actionRead();
            }
        }
        actionView();

        function actionRead(){
            var t = getDateTime2();
            var h = sha1(t);
            $.ajax({
                type: "POST",
                url:  "<?=base_url()?>GrupNotifikasi/newsread",
                data: JSON.stringify({
                    t : t,
                    h : h
                }),
                contentType: "application/json;",
                cache: false,
                success: function(result){
                    var rs = JSON.parse(result);
                    //console.log(count);
                    // console.log(rs);
                },
                error: function (request, status, error) {
                    //console.log(request.responseText);
                }
            });
        }

        //cari();
        //actionRead();
        </script>
    </body>
</html>

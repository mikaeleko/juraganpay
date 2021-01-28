<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/Chart.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/Chart.min.css">
        <script src="<?php echo base_url() ?>assets/js/Chart.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/Chart.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/js/Chart.bundle.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/Chart.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
    </head>
    <body>
        <div class="container smooth">

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
                            <div class="box-header"><span class="box-header-title">HOME </span></div>

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
                        <div class="body-right-container">
                            <div class="box-primary">
                                <div class="row">
                                    <div class="col-desk-12">
                                        <a onclick="w1()" class="head-chart-filter click-area" href="#"><span id="mark-1" class="">1W</span></a>
                                        <a onclick="m1()" class="head-chart-filter click-area" href="#"><span id="mark-2" class="">1M</span></a>
                                        <a onclick="m3()" class="head-chart-filter click-area" href="#"><span id="mark-3" class="">3M</span></a>
                                        <a onclick="m6()" class="head-chart-filter click-area" href="#"><span id="mark-4" class="">6M</span></a>
                                        <a onclick="y1()" class="head-chart-filter click-area" href="#"><span id="mark-5" class="">1Y</span></a>
                                    </div>
                                    <!-- <div class="col-desk-1">
                                        <a class="head-chart-filter click-area" href="#"><span class="">ALL</span></a>
                                    </div> -->
                                    <div class="col-desk-6">
                                        <!-- <div style="float:right">
                                            <input style="width:200px" type="date">
                                            <input style="width:200px" type="date">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-desk-2 col-md-12">
                                        <div style="background-color:rgba(0,175,233,1);color: white; text-align: left; padding:10px">
                                            <label class="text-title-chart">Total Jumlah Trx</label><br>
                                            <label id="textJmlSelected" class="text-title-chart"></label>
                                        </div>
                                    </div>
                                    <div class="col-desk-10">
                                        <div style="background-color:rgb(7, 127, 224);color: white; text-align: left; padding:10px">
                                            <label class="text-title-chart">Total Nilai Trx</label><br>
                                            <label id="textNilaiSelected" class="text-title-chart"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-desk-12">
                                        <!-- <div class="chart-dashboard"> -->
                                        <canvas width="500" height="120" id="myChart"></canvas>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="box-primary" style="padding-bottom:0">
                                <div class="row">
                                    <div class="col-desk-4">
                                        <div>
                                            <span class="color-primary">Total Jumlah Trx Berhasil Hari Ini</span>
                                        </div>
                                        <div style="border-right: 1px solid #ccc;padding-bottom: 20px;">
                                            <h1><?=number_format($chart_bottom[0]->JUMLAH)?></h1>
                                            <p class="color-primary">Nilai Trx(Rp)</p>
                                            <label class="label sukses">Rp <?=number_format($chart_bottom[0]->NILAI)?></label>
                                        </div>
                                    </div>
                                    <div class="col-desk-4">
                                        <div>
                                            <span class="color-primary">Total Jumlah Trx Dalam Proses Hari Ini</span>
                                        </div>
                                        <div style="border-right: 1px solid #ccc;padding-bottom: 20px;">
                                            <h1><?=$chart_bottom[2]->JUMLAH?></h1>
                                            <p class="color-primary">Nilai Trx(Rp)</p>
                                            <label class="label sukses">Rp <?=number_format($chart_bottom[2]->NILAI)?></label>
                                        </div>
                                    </div>
                                    <div class="col-desk-4">
                                        <div>
                                            <span class="color-primary">Total Jumlah Trx Gagal Hari Ini</span>
                                        </div>
                                        <div style="padding-bottom: 20px;">
                                            <h1><?=$chart_bottom[1]->JUMLAH?></h1>
                                            <p class="color-primary">Nilai Trx(Rp)</p>
                                            <label class="label gagal">Rp <?=number_format($chart_bottom[1]->NILAI)?></label>
                                        </div>
                                    </div>
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
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/inbox.js"></script>
        <script src="<?php echo base_url() ?>assets/js/news.js"></script>
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
        <script>
            var data         = [];
            var dataNilai    = [];
            var labels       = [];
            var borderColors = [];
            var borderColorsNilai = [];
            var nilaiBySelected   = 0;
            var jumlahBySelected  = 0;
            //untuk grafik
            var data2      = [];
            var dataNilai2 = [];
            var day        = 7;
            var markOld    = "";

            function w1(){
                day = 7;
                var element = document.getElementById("mark-1");
                element.classList.add("active-text");

                if(markOld != "" && markOld != "mark-1"){
                    var elementOld = document.getElementById(markOld);
                    elementOld.classList.remove("active-text");
                }
                gettingChartLine();
                markOld = "mark-1";
            }

            function m1(){
                day = 30;
                var element = document.getElementById("mark-2");
                element.classList.add("active-text");

                if(markOld != "" && markOld != "mark-2"){
                    var elementOld = document.getElementById(markOld);
                    elementOld.classList.remove("active-text");
                }
                gettingChartLine();
                markOld = "mark-2";
            }

            function m3(){
                day = 90;
                var element = document.getElementById("mark-3");
                element.classList.add("active-text");

                if(markOld != "" && markOld != "mark-3"){
                    var elementOld = document.getElementById(markOld);
                    elementOld.classList.remove("active-text");
                }
                gettingChartLine();
                markOld = "mark-3";
            }

            function m6(){
                day = 180;
                var element = document.getElementById("mark-4");
                element.classList.add("active-text");

                if(markOld != "" && markOld != "mark-4"){
                    var elementOld = document.getElementById(markOld);
                    elementOld.classList.remove("active-text");
                }
                gettingChartLine();
                markOld = "mark-4";
            }

            function y1(){
                day = 360;
                var element = document.getElementById("mark-5");
                element.classList.add("active-text");

                if(markOld != "" && markOld != "mark-5"){
                    var elementOld = document.getElementById(markOld);
                    elementOld.classList.remove("active-text");
                    gettingChartLine();
                }
                markOld = "mark-5";
            }

            function gettingChartLine(){
                data       = [];
                dataNilai  = [];
                data2      = [];
                dataNilai2 = [];
                labels     = [];
                nilaiBySelected  = 0;
                jumlahBySelected = 0;
                var ctx = document.getElementById('myChart').getContext('2d');
                var t   = getDateTime();
                var h   = sha1('<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + day + t);
                $.ajax({
                    type: "POST",
                    url:  "<?php echo base_url(); ?>" + "webreport/chart_line",
                    data: JSON.stringify({
                        store_id : "<?=$this->session->userdata('store_id')?>",
                        uname    : "<?=$this->session->userdata('username')?>",
                        day      : day,
                        t        : t,
                        h        : h
                    }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(result){
                        if(result.includes("Login Web Report")){
                          window.location = "<?=base_url()?>webreport/logout";
                        }


                        var rs = JSON.parse(result);

                        for(var i = 0;i < rs.length; i++){
                            data[i]       = parseInt(rs[i].JUMLAH);
                            dataNilai[i]  = parseInt(rs[i].NILAI);
                            data2[i]      = parseInt(rs[i].JUMLAH);
                            dataNilai2[i] = parseInt(rs[i].NILAI)/10000;

                            jumlahBySelected += data[i];
                            nilaiBySelected  += dataNilai[i];
                            labels[i]        = rs[i].TANGGAL;
                        }

                        document.getElementById("textJmlSelected").innerHTML = numberWithCommas(jumlahBySelected);
                        document.getElementById("textNilaiSelected").innerHTML = "Rp "+numberWithCommas(nilaiBySelected);


                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: "Jumlah trx",
                                    fill:false,
                                    backgroundColor : "rgba(255, 60, 60, 0.21)",
                                    borderColor: "rgba(255, 60, 60, 0.938)",
                                    spanGaps: true,
                                    lineTension: 0,
                                    data: data
                                },
                                {
                                    label: "Nilai trx (x 10.000)",
                                    fill:false,
                                    backgroundColor : "rgba(7, 127, 224, 0.48)",
                                    borderColor: "rgb(7, 127, 224)",
                                    lineTension: 0,
                                    data: dataNilai2
                                }
                            ]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                            }
                        });

                    },
                    error: function (request, status, error) {
                        //   console.log(request.responseText);
                        // loading.display = "none";
                    }
                });
            }
            gettingChartLine();
        </script>
    </body>
</html>

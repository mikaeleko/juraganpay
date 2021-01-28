<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE."-TAGIHAN" ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style>
        html {
            scroll-behavior: smooth;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="activity-favorite" class="activity-no-favorite" style="position:fixed;width:300px;right:10px;top:80px">
                <div>
                    <div class="tool-bar" style="margin-top:20px;margin-bottom:5px;box-shadow: 0px 2px 2px 0px #ccc">
                        <img class="back-activity" title="Kembali" onclick="closeFavoriteBook()" src="<?php echo base_url() ?>images/asset/right.svg">
                        <span id="title-activity-payment" style="margin-left:20px">Nomor Favorit</span>
                    </div>
                    <div class="activity-content">
                        <form>
                            <input id="input-nama" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="onKeyUpNoFavorit(this)" onkeydown="if (event.keyCode == 13) { return false;}" type="text" class="form-input-text" autocomplete="off" value="" placeholder="Cari nama atau nomor">
                        </form>
                        <div id="list">
                        </div>
                    </div>
                </div>
            </div>
            <div id="toast" class="toast">
                <div class="toast-body">
                    <span id="toast-text"></span>
                    <img class="toast-close" onclick="closeToast()" title="Tutup" src="<?=base_url()?>/images/asset/remove.svg">
                </div>
            </div>
            <div id="modal" class="modal">
                <div class="modal-body">
                    <div class="modal-title">
                        <p>Konfirmasi</p>
                    </div>
                    <div style="padding-left:15%;padding-right:15%" align="center">
                        <div id="loading-transaction" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                        <table style="width:100%">
                            <tr>
                                <td>Id Pelanggan</td><td>:</td><td><div class="value-checkout"><span id="checkout-nohp"></span><div></td>
                            </tr>
                            <tr>
                                <td>Kode Produk</td><td>:</td><td><div class="value-checkout"><span id="checkout-kodeproduk"></span><div></td>
                            </tr>
                            <tr>
                                <td>Saldo</td><td>:</td><td><div class="value-checkout"><span id="saldo-awal"></span><div></td>
                            </tr>
                            <tr>
                                <td>Harga</td><td>:</td><td><div class="value-checkout"><span id="checkout-harga"></span><div></td>
                            </tr>
                            <tr>
                                <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                                <td>Sisa Saldo</td><td>:</td><td style="text-align:right"><span id="sisa-saldo"></span></td>
                            </tr>
                        </table>
                        <br>
                        <div style="text-align:right">
                            <input id="input-pin" type="password" style="font-familiy:Sogeo UI;font-size:18px;margin-right:0" placeholder="Masukan PIN">
                            <br>
                            <button id="btn-tutup" class="button">kembali</button>
                            <button id="btn-kirim" class="button">KIRIM</button>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-desk-3 col-md-3 col-sm-3 hidden">
                        ...
                      </div>
                      <div class="col-desk-6 col-md-6 col-sm-6">

                        <div id="sukses_msg" style="display:none;width:400px;margin:20px;background-color: #f1f1f1;border:1px solid #000;padding:5px;border-radius:5px;font-size:14px;font-family:Segoe UI;text-align:center;">
                          <div id="content_result">
                            <div id="sukses_show" class="w3-text-red">
                              <!-- <div>
                                <img class="img_sukses" src="<?=base_url()?>/images/icon/save.png">
                              </div> -->
                              <div id="sukses"> </div>

                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-desk-3 col-md-3 col-sm-3 hidden">
                        ...
                      </div>
                    </div>


                </div>
            </div>
            <div class="header-belanja sukses">
                <div class="row">
                    <div class="col-desk-4 col-md-4 col-sm-4">
                        <a href="<?php echo base_url() ?>"><img class="left-logo-belanja" src="<?php echo base_url() ?>images/LogoST24/whitest24.svg"></a>
                    </div>
                    <div class="col-desk-8 col-md-8 col-sm-8">
                        <div id="list-menu" class="header-nav-belanja-parent">
                           <a href="<?=base_url()?>statusproduct">
                               <div class="header-nav-belanja">
                                  <span class="font-nav-belanja">TopUp Saldo</span>
                               </div>
                           </a>
                            <a href="<?=base_url()?>statusproduct">
                                <div class="header-nav-belanja">
                                    <span class="font-nav-belanja">Daftar Produk</span>
                                </div>
                            </a>
                            <a href="<?=base_url()?>belanja/nomorfavorit">
                                <div class="header-nav-belanja">
                                    <span class="font-nav-belanja">Nomor Favorit</span>
                                </div>
                            </a>
                            <a href="<?=base_url()?>histori">
                                <div class="header-nav-belanja">
                                    <span class="font-nav-belanja">Daftar transaksi</span>
                                </div>
                            </a>
                            <a href="<?=base_url()?>belanja/logout_otp">
                                <div class="header-nav-belanja">
                                    <span class="font-nav-belanja">Logout</span>
                                </div>
                            </a>
                            <!-- <a href="#">
                                <div class="header-nav-belanja">
                                    <span class="font-nav-belanja">Tagihan Saya</span>
                                </div>
                            </a> -->
                        </div>
                        <div id="box-menu" class="box-menu">
                            <img style="width:30px;height:30px;" src="<?php echo base_url() ?>images/asset/menu.svg">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <div id="navigation-feature" class="navigation-feature">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <?php $this->load->view('webreport_belanja_banner');?>
                        <div class="container-belanja smooth">
                          <div class="row">
                            <div class="col-desk-3 col-md-3 col-sm-3 hidden">
                              ...
                            </div>
                            <div class="col-desk-6 col-md-6 col-sm-6">

                              <div id="err_msg" style="display:none;color:red;width:400px;margin:20px;background-color: #f1f1f1;border:1px solid #000;padding:5px;border-radius:5px;font-size:14px;font-family:Segoe UI;text-align:center;">
                                <div id="content_res">
                                  <div id="err_show" class="w3-text-red">


                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="col-desk-3 col-md-3 col-sm-3 hidden">
                              ...
                            </div>
                          </div>

                            <div class="row">
                                <div class="col-desk-12">
                                    <div>
                                        <h3 style="text-align:center"><?=$title?></h3>

                                        <div style="overflow: auto;">
                                            <div id="activity-inquiry" class="activity-inquiry">
                                                <div class="tool-bar">
                                                    <img class="back-activity" title="Kembali" onclick="backActivityInquiry()" src="<?php echo base_url() ?>images/asset/left.svg">
                                                    <span id="title-activity" style="margin-left:20px;margin-top: 9px"></span>
                                                </div>
                                                <div class="activity-content">
                                                    <p> ID Pelanggan <img title="Nomor Favorit" src="<?=base_url() ?>images/asset/favorite-books.svg" onclick="openFavoriteBook()" class="button-favorite-numb"></p>
                                                    <div style="display:flex;margin-bottom:15px">
                                                        <input id="input-id-pelanggan" onkeyup="onKeyUpInpuIdPelanggan(this)" maxlength="21" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="margin:0;width:90%; border:none; box-shadow: none;font-familiy:Sogeo UI;font-size:18px" type="number" class="form-input-number" placeholder="ketik disini"><span style="float:right" id="logo-operator"><hr>
                                                    </div>
                                                    <span id="price-info"></span><br><br>
                                                    <label>PIN Transaksi </label><br>
                                                    <input id="input-pin-trx-inquiry" onkeyup="onKeyUpInputPinTrxInq(this)" type="password" class="form-input-password" style="margin:0;margin-top:20px;" placeholder="Masukan PIN Transaksi">
                                                    <input id="pricefee" type="hidden" name="" value="">
                                                    <br>
                                                    <div id="loading-inquiry"style="background-color:white;border-radius:64px;margin-top:10px;float:right;display:none" class="loading-ring"><div></div><div></div><div></div><div></div></div>
                                                    <div id="btn-operation">

                                                    </div>
                                                </div>
                                            </div>

                                            <div id="activity-inquiry-bpjs" class="activity-inquiry-bpjs">
                                                <div class="tool-bar">
                                                    <img class="back-activity" title="Kembali" onclick="backActivityInquiryBpjs()" src="<?php echo base_url() ?>images/asset/left.svg">
                                                    <span id="title-activity" style="margin-left:20px"></span>
                                                </div>
                                                <div class="activity-content">
                                                    <span id="price-info-bpjs"></span>
                                                    <p> Nomor Virtual Account Keluarga <img title="Nomor Favorit" src="<?=base_url() ?>images/asset/favorite-books.svg" onclick="openFavoriteBook()" class="button-favorite-numb"></p>
                                                    <div style="display:flex">
                                                        <input id="input-NoVirAccKel" onkeyup="onKeyUpInpuNoVirAccKel(this)" maxlength="21" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="margin:0;width:90%; border:none; box-shadow: none;font-familiy:Sogeo UI;font-size:18px" type="number" class="form-input-number" placeholder="ketik disini">
                                                        <span style="float:right" id="logo-operator-bpjs"><hr>
                                                    </div>
                                                    <br>
                                                    <label>Pilih Bulan </label><br><br>
                                                    <select id="bulan" class="select" style="">
                                                        <option value="">-</option>
                                                        <option value="1">Januari</option>
                                                        <option value="1">Februari</option>
                                                        <option value="1">Maret</option>
                                                        <option value="1">April</option>
                                                        <option value="1">Mei</option>
                                                        <option value="1">Juni</option>
                                                        <option value="1">Juli</option>
                                                        <option value="1">Agustus</option>
                                                        <option value="1">September</option>
                                                        <option value="1">Oktober</option>
                                                        <option value="1">November</option>
                                                        <option value="1">Desember</option>
                                                    </select><br><br>
                                                    <label>PIN Transaksi </label><br>
                                                    <input id="input-pin-trx-inquiry-bpjs" onkeyup="onKeyUpInputPinTrxInq(this)" type="password" style="margin:0;margin-top:20px;" placeholder="Masukan PIN Transaksi">
                                                    <div id="loading-inquiry-bpjs" class="loading-ring" style="background-color:white;border-radius:64px;margin-top:10px;float:right;display:none"><div></div><div></div><div></div><div></div></div>
                                                    <br>
                                                    <button onclick="onclickBtnInqBpjs()" id="button-cek-tagihan-bpjs" class="button-cek-tagihan">Cek Tagihan</button>
                                                </div>
                                            </div>

                                            <div id="activity-pre-request" class="activity-pre-request">
                                                <div class="tool-bar">
                                                    <img class="back-activity" title="Kembali" onclick="backActivityPreRequest()" src="<?php echo base_url() ?>images/asset/left.svg"><span id="title-activity-payment" style="margin-left:20px">DETAIL</span>
                                                </div>
                                                <div class="activity-content">
                                                    <p id="text-pre-request" style="font-family: monospace; font-size:20px">
                                                    </p>
                                                    <br>
                                                    <div style="background-color:#fff;padding:10px;border-radius:5px;">
                                                      <strong>Detail Tagihan</strong>
                                                      <table style="width:100%">
                                                        <tr>
                                                          <td>Saldo Awal</td>
                                                          <td>:</td>
                                                          <td id="saldo" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Tagihan</td>
                                                          <td>:</td>
                                                          <td id="tagihan" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Fee/Perlembar</td>
                                                          <td>:</td>
                                                          <td id="fee" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Lembar</td>
                                                          <td>:</td>
                                                          <td id="lembar" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Total Fee/Admin</td>
                                                          <td>:</td>
                                                          <td id="ttl-fee" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Total Tagihan</td>
                                                          <td>:</td>
                                                          <td id="ttl-tagihan" style="text-align:right">-</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Sisa Saldo</td>
                                                          <td>:</td>
                                                          <td id="sisa" style="text-align:right">-</td>
                                                        </tr>
                                                      </table>
                                                    </div>
                                                    <div id="loading-payment" class="loading-ring" style="background-color:white;border-radius:64px;margin-top:10px;float:right;display:none"><div></div><div></div><div></div><div></div></div>
                                                    <br>
                                                    <button onclick="onclickBtnPay()" id="btn-pay" class="button-cek-tagihan">Bayar</button>
                                                </div>
                                            </div>
                                            <div id="activity-print" class="activity-print">
                                                <div class="tool-bar">
                                                    <img class="back-activity" title="Kembali" onclick="backActivityPrint()" src="<?php echo base_url() ?>images/asset/left.svg">
                                                    <span id="title-activity-payment" style="margin-left:20px">DETAIL PRINT</span>
                                                    <span title="PRINT" onclick="printDiv('print-area')" class="button-print">
                                                        <img src="<?php echo base_url() ?>images/asset/print.svg" style="width:20;height:20">
                                                    </span>
                                                </div>
                                                <div class="activity-content">
                                                    <p id="text-print" style="font-family: monospace; font-size:20px">
                                                    </p> <br>
                                                    <p id="text-print2" style="font-family: monospace; font-size:20px">
                                                    </p>

                                                </div>
                                            </div>

                                            <div style="overflow:auto">
                                                <div id="list-product-category" class="list-product-parent">
                                                </div>
                                            </div>

                                            <div style="overflow:auto;display:none;" id="product-activity" >
                                                <div id="loading" class="loading-ring" style="background-color:white;border-radius:64px;margin-top:10px;float:right;display:none"><div></div><div></div><div></div><div></div></div>
                                                <div style="background-color:#00afe9;padding:5px;margin-bottom:5px" id="back-button">
                                                    <img class="back-activity" style="width:40px;height:40px;float:left;margin:6px;" title="Kembali" onclick="onclickBackToCategory()" src="<?=base_url() ?>images/asset/left.svg">
                                                    <input id="input-search" type="text" class="form-input-text" onkeyUp="cariProduk(this)" placeholder="Cari produk tagihan..">
                                                </div>
                                                <div style="overflow:auto;height:500px">
                                                    <div id="list-product-parent" class="list-product-parent"></div>
                                                </div>
                                            </div>


                                        </div>
                                        <div style="overflow:hidden">
                                            <div class="row">
                                                <div class="col-desk-6">
                                                    <h4 id="price" class="left"></h4>
                                                </div>
                                                <div class="col-desk-6">
                                                    <button id="btn-bayar" class="button-payment right hidden">Kirim</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <div class="footer">
                            site design / logo © 2019 PT Cipta Solusi Aplikasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <script src="<?=base_url() ?>assets/js/sha256.js"></script>
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
        <script>

            var divNavigation = document.getElementById("navigation-feature");
            var priceText = document.getElementById("price");
            var btnBayar = document.getElementById("btn-bayar");
            var labelNom = document.getElementById("label-nominal");
            var inputSearch = document.getElementById("input-search");
            var divChildProduct = document.getElementById("child-product");
            var logoOperator = document.getElementById("logo-operator");
            var btnOperation = document.getElementById("btn-operation");
            var logoOperatorBpjs = document.getElementById("logo-operator-bpjs");
            var inputPin = document.getElementById("input-pin");
            var alertToast = document.getElementById("toast");
            var alertToastText = document.getElementById("toast-text");
            var ckNoHp = document.getElementById("checkout-nohp");
            var ckKodeProduk = document.getElementById("checkout-kodeproduk");
            var ckHarga = document.getElementById("checkout-harga");
            var divProductCategory = document.getElementById('list-product-category');
            var inputRO   = document.getElementById("input-ro");
            var saldoAwal = document.getElementById("saldo-awal");
            var sisaSaldo = document.getElementById("sisa-saldo");
            var hargaProduk = 0;
            var divParent = document.getElementById("list-product-parent");
            var hashtag = "#PEMBAYARAN";
            var dataProducts = [];
            var productItemChild = "";
            var oldIdChildSelected = "";
            var idChildTemp = "";
            var kodeProduk = "";
            var pinTransaksi = "";
            var tujuan = "";
            var jumlahInput = "";
            var productCategoryItem = "";
            var myBalance = '';
            function loadIcon(){
              var t = getDateTime();
              var h = sha1('<?=$this->session->userdata('username')?>' + "<?=$this->session->userdata('store_id')?>" + t);
              var iconItem = "";
                  icon ="";
              $.ajax({
                type: "POST",
                url:  "<?=base_url(); ?>" + "belanja/cariicon",
                data: JSON.stringify({
                    store_id : "<?=$this->session->userdata('store_id')?>",
                    uname    : '<?=$this->session->userdata('username')?>',
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

                    var cls ="active_menu";
                    var path = ""

                    for(var i = 0;i < rs.length; i++){

                      var x = rs[i].NAME.substr(1,5);
                          b = rs[i].NAME.substr(6);
                          c ="";
                          var category = rs[i].NAME.replace('#','').toLowerCase();
                          var cat = rs[i].NAME.replace('#','');
                      if(x == "PAKET"){
                          c = x + " " + b;
                      }else{
                        c = cat;
                      }

                      var category = rs[i].NAME.replace('#','').toLowerCase();
                      iconItem += '<button title="'+c+'" onclick="redirectTo(\'' +'<?php echo base_url()?>'+'belanja?category='+category+ '\')" class=" '+cls+' button-image color-white" >' +
                                      '<img class="image-inner" src="<?= HOST_API_IMAGE ?>get_img?file=icon_'+rs[i].NAME.substring(1)+'.png " ' +
                                  '</button><br><span class="caption-menu">'+c+'</span>' ;
                    }

                    icon += '<button title="TIKET PESAWAT" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja?category=pesawat' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_pesawat.png">'+
                            '<br><span class="caption-menu">TIKET PESAWAT</span></button>'+
                            '<button title="TIKET KERETA" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja?category=kereta' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_kereta.png">'+
                            '<br><span class="caption-menu">TIKET KERETA</span></button></div>';

                    divNavigation.innerHTML = iconItem + icon;
                }

              });
            }

            loadIcon();



            function onclickNoTujuan(){
                dataProducts = [];
            }

            function getProductCategory(){
                productCategoryItem = "";
                var t = getDateTime();
                var h = sha1(hashtag + '<?=$this->session->userdata('kd_price_plan')?>' + t);
                $.ajax({
                type: "POST",
                url:  "<?=base_url(); ?>" + "belanja/kategoriprodukhashtag",
                data: JSON.stringify({
                    hashtag : hashtag,
                    kode_price_plan : '<?=$this->session->userdata('kd_price_plan')?>',
                    t : t,
                    h : h
                }),
                contentType: "application/json;",
                cache: false,
                success: function(result){
                    if(result.includes("Login Web Report")){
                        window.location = "<?=base_url()?>webreport/logout";
                    }
                    var rs = JSON.parse(result);

                    for(var i = 0;i < rs.length; i++){
                        productCategoryItem += `<div onclick="getProductBySelectedCategory(this,'${rs[i].KODE_PROVIDER}',${i})" id="itemidcategory${i}" class="product-name" style="width:180px;padding:0px">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="image-item">
                                                                    <img src="${rs[i].IMG}" >
                                                                </div>
                                                            </td>
                                                            <td>
                                                              <span style="font-size:12px">${rs[i].KODE_PROVIDER.replace(/_/g,' ')}</span>
                                                            </td>
                                                        <tr>
                                                    </table>
                                                </div>`;
                    }
                    if(rs.length>0){
                        divProductCategory.innerHTML = productCategoryItem;
                    }else{
                        divProductCategory.innerHTML = "<p>Kategori produk belum tersedia</p>";
                    }

                },
                error: function (request, status, error) {
                    isExist = 0;

                    divParent.innerHTML = "";
                    priceText.innerHTML = "";
                    divLoading.display = "none";
                    btnBayar.classList.remove("show");
                    btnBayar.classList.add("hidden");
                    labelNom.classList.remove("show");
                    labelNom.classList.add("hidden");
                    inputSearch.classList.remove("show");
                    inputSearch.classList.add("hidden");
                    logoOperator.innerHTML = "";
                    dataProducts = [];
                }
                });


            }


            getProductCategory();

            function onclickBackToCategory(){
                $('#list-product-category').show(100);
                $('#product-activity').hide(100);
            }

            function getProductBySelectedCategory(obj,kodeProvider,index){
                $('#list-product-category').hide(100);
                $('#product-activity').show(100);

                var divLoading = document.getElementById("loading").style;
                var productItem = "";
                    var t = getDateTime();
                    var h = sha1(hashtag + '<?=$this->session->userdata('username')?>' + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('kd_price_plan')?>' + kodeProvider + t);
                    divLoading.display = "block";
                    $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url(); ?>" + "belanja/cariprodukhashtag",
                        data: JSON.stringify({
                            kode_price_plan : "<?=$this->session->userdata('kd_price_plan')?>",
                            username : '<?=$this->session->userdata('username')?>',
                            store_id : '<?=$this->session->userdata('store_id')?>',
                            kode_provider : kodeProvider,
                            hashtag : hashtag,
                            t : t,
                            h : h
                        }),
                        contentType: "application/json;",
                        cache: false,
                        success: function(result){
                            if(result.includes("Login Web Report")){
                                window.location = "<?=base_url()?>webreport/logout";
                            }
                            divLoading.display = "none";
                            var rs = JSON.parse(result);
                            //console.log(rs);
                            dataProducts = rs;
                            var lengthResp = rs.length;
                            for(var i = 0;i < lengthResp; i++){
                                productItem +=  `<div onclick="newActivityInquiry('${rs[i].NOM}','${rs[i].KET}','${rs[i].FEE}+','${rs[i].DISCOUNT}','${rs[i].IMG}','${rs[i].PRICE}')" class="list-item">
                                                    <div class="left">
                                                        <div class="image-item">
                                                            <img src="${rs[i].IMG}" >
                                                        </div>
                                                    </div>
                                                    <div class="left">
                                                        <span style="font-weight:700">${rs[i].NOM}</span><br>
                                                        <span style="color:#5e4b4b;font-size:13px">${rs[i].KET}</span><br>
                                                        <span>${rs[i].HARGA}</span>
                                                    </div>
                                                </div>`;
                            }

                            if(lengthResp>0){
                                divParent.innerHTML = productItem;
                            }else{
                                divParent.innerHTML = "<p>Produk tidak tersedia</p>";
                            }
                        },
                        error: function (request, status, error) {

                            divParent.innerHTML = "";
                            priceText.innerHTML = "";
                            divLoading.display = "none";
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");
                            labelNom.classList.remove("show");
                            labelNom.classList.add("hidden");
                            inputSearch.classList.remove("show");
                            inputSearch.classList.add("hidden");
                            logoOperator.innerHTML = "";
                            dataProducts = [];
                        }
                    });


            }
            //1
            //getProductTagihan();

            var activityInquiry = document.getElementById("activity-inquiry");
            //bpjs
            var activityInquiryBpjs = document.getElementById("activity-inquiry-bpjs");
            var bulan = document.getElementById("bulan");
            var activityPreRequest = document.getElementById("activity-pre-request");
            var activityPrint = document.getElementById("activity-print");
            var titleActivity = document.getElementById("title-activity");
            var priceInfo = document.getElementById("price-info");
            var priceInfoBpjs = document.getElementById("price-info-bpjs");
            var inputIdPelanggan = document.getElementById("input-id-pelanggan");
            var inputNoVirAccKel = document.getElementById("input-NoVirAccKel");
            var inputPricefee = document.getElementById("pricefee");

            var textPreRequest = document.getElementById("text-pre-request");
            var textPrint = document.getElementById("text-print");
            var textPrint2 = document.getElementById("text-print2");
            //2
            function newActivityInquiry(nom,ket,fee,discount,img,price){
              var t = getDateTime();
              var h = sha1('<?=$this->session->userdata('username')?>' + t);
              $.ajax({
                  type: "POST",
                  url:  "<?=base_url();?>" + "belanja/cek_price",
                  data: JSON.stringify({
                        nom      : nom,
                        price    : price,
                        username : '<?=$this->session->userdata('username')?>' ,
                        storeid  : <?=$this->session->userdata('store_id')?> ,
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

                      var hargaProduk = "";
                      if(rs.pesan =="Bukan Harga Outlet"){
                        hargaProduk = price;
                      } else{
                        hargaProduk = rs.hargajual;
                      }

                      inputIdPelanggan.value = "";
                      inputPinTrxInquiry.value = "";
                      inputPricefee.value = price;
                      titleActivity.innerHTML = nom;
                      kodeProduk = nom;
                      var min = discount.endsWith("-");
                      var pr = price.replace("-","");

                      if (min) {
                          hargaProduk = ' <img src="<?=base_url()?>images/asset/discount.svg" style="width:20;height:20">Discount <span><b> '+discount.replace("-","")+'</b></span><span>, Fee <b>Rp.'+pr+'</b></span>';
                      } else {
                          hargaProduk = ' <img src="<?=base_url()?>images/asset/markup.svg" style="width:20;height:20"> Markup <span> <b>'+discount.replace("-","")+'</b></span><span>, Fee <b>Rp.'+pr+'</b></span>';
                      }
                      if(nom.includes("BPJS") || ket.includes("BPJS")){
                          bulan.value = "";
                          activityInquiryBpjs.style.display = "block";
                          priceInfoBpjs.innerHTML = hargaProduk;
                          inputNoVirAccKel.focus();
                      }else{
                          activityInquiry.style.display = "block";
                          priceInfo.innerHTML = hargaProduk;
                          inputIdPelanggan.focus();
                      }

                      logoOperator.innerHTML = '<div class="image-item">'+
                                                    '<img src="'+img+'" >'+
                                                '</div>';
                      btnOperation.innerHTML ='<button id="button-cek-tagihan" onclick="onclickBtnInq('+price+')" class="button-cek-tagihan">Cek Tagihan</button>';

                   }
                });
            }


            var inputPinTrxInquiry = document.getElementById("input-pin-trx-inquiry");

            function onKeyUpInpuIdPelanggan(param){
                if (event.keyCode === 13) {
                    inputPinTrxInquiry.focus();
                }
            }

            var inputPinTrxInquiryBpjs = document.getElementById("input-pin-trx-inquiry-bpjs");

            function onKeyUpInpuNoVirAccKel(){
                if (event.keyCode === 13) {
                    inputPinTrxInquiryBpjs.focus();
                }
            }

            function onKeyUpInputPinTrxInq(){
                if (event.keyCode === 13) {
                     kirimTransaksiInquiry(inputPricefee.value);

                }
            }

            function backActivityInquiry(){
                activityInquiry.style.display = "none";
            }

            function backActivityInquiryBpjs(){
                activityInquiryBpjs.style.display = "none";
            }

            function backActivityPreRequest(){
                activityPreRequest.style.display = "none";
            }

            function backActivityPrint(){
                activityPrint.style.display = "none";
            }

            var modal = document.getElementById("modal");
            btnBayar.onclick = function() {
                modal.style.display = "block";
                inputPin.focus();
                gettingBalance();
                inputPin.value= "";
            }

            var btnTutup = document.getElementById("btn-tutup");
            btnTutup.onclick = function() {
                modal.style.display = "none";
                inputPin.value = "";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    inputPin.value = "";
                }
            }

            function redirectTo(param){
                window.location = param;
            }

            function onclickBtnInq(){
                kirimTransaksiInquiry(inputPricefee.value);

            }

            function onclickBtnInqBpjs(){
                kirimTransaksiInquiryBpjs(inputPinTrxInquiryBpjs.value);
            }


            inputPin.onkeyup = function(event){
                if (event.keyCode === 13) {
                    kirimTransaksiInquiry(inputPricefee.value);
                }
            }

            var loadingInquiry = document.getElementById("loading-inquiry");
            var loadingPayment = document.getElementById("loading-payment");
            var tempTextTag = "";

            function rupiah(a,b,c){
              var	ax = a.toString(),
                  bx = b.toString(),
                  cx = c.toString(),

                  sisa1 	        = ax.length % 3,
                  rupiah1 	      = ax.substr(0, sisa1),
                  ribuan1 	      = ax.substr(sisa1).match(/\d{3}/g);

                  sisa2 	        = bx.length % 3,
                  rupiah2 	      = bx.substr(0, sisa2),
                  ribuan2 	      = bx.substr(sisa2).match(/\d{3}/g);

                  sisa3 	        = cx.length % 3,
                  rupiah3 	      = cx.substr(0, sisa3),
                  ribuan3 	      = cx.substr(sisa3).match(/\d{3}/g);

              if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
              }
              if (ribuan2) {
                separator2 = sisa2 ? '.' : '';
                rupiah2 += separator2 + ribuan2.join('.');
              }
              if (ribuan3) {
                separator3 = sisa3 ? '.' : '';
                rupiah3 += separator3 + ribuan3.join('.');
              }

              document.getElementById("tagihan").innerHTML = "Rp "+ rupiah1;
              document.getElementById("ttl-tagihan").innerHTML = "Rp "+ rupiah2;
              document.getElementById("sisa").innerHTML = "Rp "+ rupiah3;
            }

            function kirimTransaksiInquiry(price){
                gettingBalance();
                var noTujuan     = inputIdPelanggan.value;
                var username     = <?php echo $this->session->userdata('username')?>;
                var pinTransaksi = inputPinTrxInquiry.value;
                var Pricefee     = price;
                var authpin      = sha256("sha256" + username + pinTransaksi);

                if(noTujuan == ""){
                    document.body.scrollTop = 0;
                    $("#err_msg").fadeIn();
                    $("#err_show").html("Id Pelanggan harus diisi");
                    inputIdPelanggan.focus();
                    return;
                }
                if(pinTransaksi == ""){
                    document.body.scrollTop = 0;
                    alertToast.style.display = "block";
                    alertToastText.innerHTML = "PIN Transaksi harus diisi.";
                    $("#err_msg").fadeIn();
                    $("#err_show").html("PIN Transaksi harus diisi");
                    inputPinTrxInquiry.focus();
                    return;
                }

                $("#err_msg").hide();
                loadingInquiry.style.display = "block";
                var text = "";
                if(kodeProduk.includes("PLN")){
                    text = 'TAG' + '.' + 'PLN' + '.' + noTujuan + '.';
                } else {
                    text = 'TAG' + '.' + kodeProduk.replace('PAY','') + '.' + noTujuan + '.';
                }

                tempTextTag = text;

                $('#button-cek-tagihan').hide(100);

                var t = getDateTime();
                var h = sha1('<?=$this->session->userdata('username')?>' + text + t);
                $.ajax({
                      type : "POST",
                      url  :  "<?php echo base_url();?>" + "transaksi",
                      data : JSON.stringify({
                                  type       : "TAGIHAN",
                                  authpin    : authpin,
                                  Pricefee   : Pricefee,
                                  kodeProduk : kodeProduk,
                                  no_Tujuan  : noTujuan,
                                  msisdn     : '<?=$this->session->userdata('msisdn')?>',
                                  user_name  : '<?=$this->session->userdata('username')?>',
                                  store_id   : '<?=$this->session->userdata('store_id')?>',
                                  text       : text,
                                  t          : t,
                                  h          : h
                      }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(result){
                        if(result.includes("Login Web Report")){
                            window.location = "<?=base_url()?>webreport/logout";
                        }
                        loadingInquiry.style.display = "none";
                        var rs = JSON.parse(result);

                        var message = decodeURIComponent(rs.Rows[0].MESSAGE).replace("rc:00","").replace('|','<br>');

                        if(rs.Rows[0].RC = "00" && !message.includes("PIN yang anda masukkan salah") && !message.includes("Transaksi anda sedang diproses")){

                            activityPreRequest.style.display = "block";

                            document.getElementById("saldo").innerHTML = "Rp. "+ myBalance;
                            document.getElementById("lembar").innerHTML  = rs.Rows[0].BILL_DATA.lembar;

                            var pr = price.replace('-', '');
                            document.getElementById("fee").innerHTML = "Rp. "+ parseInt(pr);
                            var ttlFee = parseInt(rs.Rows[0].BILL_DATA.lembar) * parseInt(pr);
                            document.getElementById("ttl-fee").innerHTML = "Rp. "+ parseInt(ttlFee);

                            var ttlTagihan = parseInt(rs.Rows[0].BILL_DATA.tagihan) + parseInt(ttlFee);
                            document.getElementById("ttl-tagihan").innerHTML = "Rp. "+ parseInt(ttlTagihan);

                            var saldo = myBalance.split('.').join('');
                            var sisa_saldo = parseInt(saldo) - parseInt(ttlTagihan);
                            var intSisaSaldo = parseInt(sisa_saldo);

                            rupiah(parseInt(rs.Rows[0].BILL_DATA.tagihan), parseInt(ttlTagihan), parseInt(sisa_saldo) ) ;

                            var messageSplit = message.split("|");
                            var printMessage = "";
                            printMessage += '<table style="font-family:monospace;font-size:17">';
                            for(var i=0;i<messageSplit.length;i++){
                                printMessage += '<tr>';
                                var splitTD = messageSplit[i].split(":");
                                for(var j=0;j<splitTD.length;j++){
                                    printMessage += '<td>' + splitTD[j] + '</td>';
                                }
                                printMessage += '<tr>';
                            }
                            printMessage += "</table>";
                            textPreRequest.innerHTML = printMessage;

                        } else {
                            alertToast.style.display = "block";
                            alertToastText.innerHTML = message;

                        }

                        document.body.scrollTop = 0;
                        $('#button-cek-tagihan').show(100);
                    },
                    error: function (request, status, error) {

                        loadingInquiry.style.display = "none";
                        alertToast.style.display = "block";
                        alertToastText.innerHTML = "Koneksi Gagal";

                        document.body.scrollTop = 0;
                        $('#button-cek-tagihan').show(100);
                    }
                });
            }

            var loadingInquiryBpjs = document.getElementById("loading-inquiry-bpjs");
            var tempTextTag = "";


            function kirimTransaksiInquiryBpjs(price){
              gettingBalance();
              var noTujuan     = inputIdPelanggan.value;
              var username     = <?php echo $this->session->userdata('username')?>;
              var pinTransaksi = inputPinTrxInquiry.value;
              var Pricefee = price;
              var authpin      = sha256("sha256" + username + pinTransaksi);
              var tujuan = inputNoVirAccKel.value;
              if(tujuan == ""){
                  document.body.scrollTop = 0;
                  $("#sukses_msg").fadeIn();
                  $("#sukses_show").html("Nomor Virtual Account Keluarga harus diisi");
                  inputNoVirAccKel.focus();
                  return;
              }

              if(bulan.value == ""){
                  document.body.scrollTop = 0;
                  $("#sukses_msg").fadeIn();
                  $("#sukses_show").html("Anda belum memilih bulan");
                  bulan.focus();
                  return;
              }

              if(pinTransaksi == ""){
                  document.body.scrollTop = 0;
                  $("#sukses_msg").fadeIn();
                  $("#sukses_show").html("PIN Transaksi harus diisi");
                  inputPinTrxInquiryBpjs.focus();
                  return;
              }

              $("#sukses_msg").hide();
              loadingInquiryBpjs.style.display = "block";
              // var text = 'TAG' + '.' + 'BPJS' + '.' + tujuan+ '-' + bulan.value + '.' + pinTransaksi;
              var text = 'TAG' + '.' + 'BPJS' + '.' + tujuan+ '-' + bulan.value + '.';

              tempTextTag = text;
              $('#button-cek-tagihan-bpjs').hide(100);

              var t = getDateTime();
              var h = sha1('<?=$this->session->userdata('username')?>' + text + t);
              $.ajax({
                  type: "POST",
                  // url:  "<?php //echo base_url();?>" + "transaksi?msisdn=<?php //echo $this->session->userdata('msisdn')?>&text="+text,
                  url        :  "<?php echo base_url();?>" + "transaksi",
                  data: JSON.stringify({
                          msisdn     : '<?=$this->session->userdata('msisdn')?>',
                          user_name  : '<?=$this->session->userdata('username')?>',
                          store_id   : '<?=$this->session->userdata('store_id')?>',
                          authpin    : authpin,
                          Pricefee   : Pricefee,
                          type       : "TAGIHAN",
                          text       : text,
                          no_Tujuan  : tujuan,
                          t    : t,
                          h    : h
                  }),
                  contentType: "application/json;",
                  cache: false,
                  success: function(result){
                      if(result.includes("Login Web Report")){
                          window.location = "<?=base_url()?>webreport/logout";
                      }

                      loadingInquiryBpjs.style.display = "none";
                      var rs = JSON.parse(result);

                        try{
                            if(rs.status == 'GAGAL'){
                                alert(rs.pesan);return;
                            }
                        }catch(err){

                        }

                      //Check valid phase
                          if(rs.Rows[0].PHASE !== 'AAA'){
                              alert('Anda harus submit kode OTP ulang');
                              return;
                          }
                      //end
                      var message = decodeURIComponent(rs.Rows[0].MESSAGE).replace("rc:00","").replace(/([|])/g,'<br>');;
                      if(rs.Rows[0].RC = "00" && !message.includes("PIN yang anda masukkan salah") && !message.includes("Transaksi anda sedang diproses")){
                        //Check valid phase
                            if(rs.Rows[0].PHASE !== 'AAA'){
                                alert('Anda harus submit kode OTP ulang');
                                // window.location = "<?php //echo base_url()?>belanja/page_otp";
                                return;
                            }
                        //end
                          activityPreRequest.style.display = "block";
                          document.getElementById("saldo").innerHTML = "Rp. "+ myBalance;

                          var messageSplit = message.split("|");
                          var printMessage = "";
                          printMessage += '<table style="font-family:monospace;font-size:17">';
                          for(var i=0;i<messageSplit.length;i++){
                              printMessage += '<tr>';
                              var splitTD = messageSplit[i].split(":");
                              for(var j=0;j<splitTD.length;j++){
                                  printMessage += '<td>' + splitTD[j] + '</td>';
                              }
                              printMessage += '<tr>';
                          }
                          printMessage += "</table>";
                          textPreRequest.innerHTML = printMessage;

                      }else{

                          $("#sukses_msg").fadeIn();
                          $("#sukses_show").html(message);
                      }

                      document.body.scrollTop = 0;
                      $('#button-cek-tagihan-bpjs').show(100);
                  },
                  error: function (request, status, error) {

                      loadingInquiryBpjs.style.display = "none";

                      $("#sukses_msg").fadeIn();
                      $("#sukses_show").html("Koneksi Gagal");
                      document.body.scrollTop = 0;
                      $('#button-cek-tagihan-bpjs').show(100);
                  }
              });
            }

            function onclickBtnPay(){
                  kirimTransaksiPayment();
            }

            function kirimTransaksiPayment(){
                var username     = <?php echo $this->session->userdata('username')?>;
                var pinTransaksi = inputPinTrxInquiry.value;
                var authpin      = sha256("sha256" + username + pinTransaksi);
                var tujuan = inputIdPelanggan.value;


                if(tujuan == ""){
                    document.body.scrollTop = 0;
                    alertToast.style.display = "block";
                    alertToastText.innerHTML = "Id Pelanggan harus diisi.";
                    inputIdPelanggan.focus();
                    return;
                }
                if(pinTransaksi == ""){
                    document.body.scrollTop = 0;
                    alertToast.style.display = "block";
                    alertToastText.innerHTML = "PIN Transaksi harus diisi.";
                    inputPinTrxInquiry.focus();
                    return;
                }

                alertToast.style.display = "none";
                loadingPayment.style.display = "block";

                var text = tempTextTag.replace("TAG","PAY");
                var username = '<?php echo $this->session->userdata('username')?>';
                var authpin      = sha256("sha256" + username + pinTransaksi);

                $('#btn-pay').hide(100);
                var t = getDateTime();
                var h = sha1('<?=$this->session->userdata('username')?>' + text + t);
                $.ajax({
                    type: "POST",
                    url:  "<?=base_url();?>" + "transaksi",
                    data: JSON.stringify({
                        type       : "TAGIHAN",
                        authpin    : authpin,
                        msisdn     : '<?php echo $this->session->userdata('msisdn')?>',
                        user_name  : '<?=$this->session->userdata('username')?>',
                        store_id   : '<?=$this->session->userdata('store_id')?>',
                        text : text,
                        t : t,
                        h : h
                    }),
                    contentType: "application/json;",
                    cache: false,
                    success: function(result){
                        if(result.includes("Login Web Report")){
                            window.location = "<?=base_url()?>webreport/logout";
                        }
                        loadingPayment.style.display = "none";
                        var rs = JSON.parse(result);
                        //Check valid phase
                            if(rs.Rows[0].PHASE !== 'AAA'){
                                alert('Anda harus submit kode OTP ulang');
                                return;
                            }
                        //end
                        document.body.scrollTop = 0;
                        var message = decodeURIComponent(rs.Rows[0].MESSAGE).replace(/([|])/g,'<br>');
                        var messageSplit = message.split("|");


                        if(rs.Rows[0].RC == "00"){
                            //Check valid phase
                            if(rs.Rows[0].PHASE !== 'AAA'){
                                alert('Anda harus submit kode OTP ulang');
                                window.location = "<?=base_url()?>belanja/page_otp";
                                return;
                            }
                            //end

                            alertToastText.innerHTML = "TRANSAKSI BERHASIL";
                            //parsing
                            //var messageSplit = message.split("|");
                            var printMessage = "";
                            var print = "";
                            printMessage += '<div id="print-area"><pre style="font-size: 13px;">';

                            printMessage +=  message;
                            printMessage += '</pre></div>';
                            textPrint.innerHTML = printMessage;
                            inputIdPelanggan.value = "";
                            inputPinTrxInquiry.value = "";
                            activityPrint.style.display = "block";
                            activityPreRequest.style.display = "none";
                            activityInquiry.style.display = "none";
                        }else{
                            alertToastText.innerHTML = decodeURIComponent(rs.Rows[0].MESSAGE).replace(/([|])/g,'<br>');;
                        }

                        alertToast.style.display = "block";
                        $('#btn-pay').show(100);
                    },
                    error: function (request, status, error) {
                        loadingPayment.style.display = "none";
                        alertToast.style.display = "block";
                        alertToastText.innerHTML = "Koneksi Gagal";
                        $('#btn-pay').show(100);
                    }
                });
            }

            function printDiv(idDiv) {
                w=window.open();
                w.document.write($('#'+idDiv).html());
                w.print();
                w.close();

            }

            function closeToast(){
                alertToast.style.display = "none";
            }

            function gettingBalance(){
                var t = getDateTime();
                var h = sha1('<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);

                $.ajax({
                    type: "POST",
                    url:  "<?php echo base_url(); ?>" + "webreport/get_profile",
                    data: JSON.stringify({
                        store_id : "<?=$this->session->userdata('store_id')?>",
                        uname    : "<?=$this->session->userdata('username')?>",
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

                        saldoAwal.innerHTML = "Rp "+rs.BALANCE;
                        var balance = rs.BALANCE;
                        myBalance = balance;
                        var balanceParsing = "";
                        var balanceArray = balance.split(".");
                        for(var i = 0;i<balanceArray.length;i++){
                            balanceParsing += balanceArray[i];
                        }
                        var endBalance = parseInt(balanceParsing) - hargaProduk;
                        if(endBalance < 0){
                            sisaSaldo.innerHTML =  "Rp " + numberWithCommas(endBalance)+ '<span style="color:red"> *)Saldo tidak cukup </span>';
                        }else{
                            sisaSaldo.innerHTML =  "Rp " + numberWithCommas(endBalance);
                        }

                    },
                    error: function (request, status, error) {

                        loading.display = "none";
                    }
                });
            }
            var dataSearchResults = [];
            var productItemSearch = "";
            function cariProduk(param){
                logoOperator.innerHTML = "";
                oldIdSelected = "";

                priceText.innerHTML = "";
                productItemSearch = "";
                dataSearchResults = [];
                var rs = dataProducts;
                for(var i = 0;i < rs.length; i++){
                    var keterangan = rs[i].KET.toUpperCase();
                    var kodeProduk = rs[i].NOM.toUpperCase();
                    var key = param.value.toUpperCase();

                    if(keterangan.includes(key) || kodeProduk.includes(key)){

                        dataSearchResults.push(rs[i]);
                    }
                }

                var dataSearchResultsLength = dataSearchResults.length;
                for(var i = 0;i < dataSearchResultsLength; i++){
                    productItemSearch += '<div onclick="newActivityInquiry(\''+dataSearchResults[i].NOM+'\',\''+dataSearchResults[i].KET+'\',\''+dataSearchResults[i].FEE+'\',\''+dataSearchResults[i].DISCOUNT+'\',\''+dataSearchResults[i].IMG+'\')" class="list-item">' +
                                                    '<div class="left">'+
                                                        '<div class="image-item">'+
                                                            '<img src="<?=HOST_API_IMAGE?>get_img?file='+dataSearchResults[i].IMG+'" >'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="left">'+
                                                        '<span style="font-weight:700">'+dataSearchResults[i].NOM+'</span><br>'+
                                                        '<span style="color:#5e4b4b;font-size:13px">'+dataSearchResults[i].KET+'</span><br>'+
                                                        '<span>'+dataSearchResults[i].FEE+'</span>'+
                                                    '</div>'+
                                                '</div>';
                }
                if(dataSearchResultsLength>0){
                    divParent.innerHTML = productItemSearch;
                }else{
                    divParent.innerHTML = "<p>Produk " + param.value + " tidak tersedia</p>";
                }
            }
        </script>
        <script src="<?php echo base_url() ?>assets/js/belanja_script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/carousel.js"></script>
    </body>
</html>

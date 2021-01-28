<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style>
            .value-checkout{
                text-align:right;
            }
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
                                <td>Nomor Hp</td><td>:</td><td><div class="value-checkout"><span id="checkout-nohp"></span><div></td>
                            </tr>
                            <tr>
                                <td>Nominal</td><td>:</td><td><div class="value-checkout"><span id="checkout-nom"></span><div></td>
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
                        <div style="text-align:right;">
                            <div>
                                <span style="font-weight:300">RO (Repeat Order)</span>
                                <select id="input-ro" class="select">
                                    <option value="">-</option>
                                    <option value=".1">1</option>
                                    <option value=".2">2</option>
                                    <option value=".3">3</option>
                                    <option value=".4">4</option>
                                    <option value=".5">5</option>
                                    <option value=".6">6</option>
                                    <option value=".7">7</option>
                                    <option value=".8">8</option>
                                    <option value=".9">9</option>
                                </select>
                            </div>
                            <div>
                                <input id="input-pin" type="password" class="form-input-number" style="font-familiy:Sogeo UI;font-size:18px;margin-right:0" placeholder="Masukan PIN"><br>
                                <button id="btn-kirim" class="button">KIRIM</button>
                            </div>
                        </div>

                    </div>

                    <div>
                        <button id="btn-tutup" class="button">kembali</button>
                    </div>
                </div>
            </div>

            <div id="modal-print" class="modal">
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
                        <p>Cetak Struk</p>
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

            <div class="header-belanja sukses">
                <div class="row">
                    <div class="col-desk-6 col-md-6 col-sm-6">
                        <a href="<?php echo base_url() ?>"><img class="left-logo-belanja" src="<?php echo base_url() ?>images/LogoST24/whitest24.svg"></a>
                    </div>
                    <div class="col-desk-6 col-md-6 col-sm-6">
                        <div id="list-menu" class="header-nav-belanja-parent">
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
                        <div class="navigation-feature">
                            <button title="Pulsa" onclick="redirectTo('<?=base_url()?>belanja')" class="button-image color-white" ><img class="image-inner" src="<?php echo base_url() ?>images/asset/assetwebsite-01.png"></button>
                            <button title="Paket Data" onclick="redirectTo('<?=base_url()?>belanja/paketdata')" class="button-image color-white active-menu"><img class="image-inner" src="<?php echo base_url() ?>images/asset/assetwebsite-02.png"></button>
                            <button title="Token Listrik" onclick="redirectTo('<?=base_url()?>belanja/tokenlistrik')" class="button-image color-white"><img class="image-inner" src="<?php echo base_url() ?>images/asset/assetwebsite-03.png"></button>
                            <button title="E-Money" onclick="redirectTo('<?=base_url()?>belanja/emoney')" class="button-image color-white"><img class="image-inner" src="<?php echo base_url() ?>images/icon/icon_emoney.png"></button>
                            <button title="Pembayaran" onclick="redirectTo('<?=base_url()?>belanja/tagihan')" class="button-image color-white"><img class="image-inner" src="<?php echo base_url() ?>images/icon/icon_pascabayar.png"></button>
                            <button title="Tiket Pesawat" onclick="redirectTo('<?=base_url()?>belanja/tiketpesawat')" class="button-image color-white"><img class="image-inner" src="<?php echo base_url() ?>images/asset/assetwebsite-04.png"></button>
                            <button title="Tiket Kereta" onclick="redirectTo('<?=base_url()?>belanja/tiketkereta')" class="button-image color-white"><img class="image-inner" src="<?php echo base_url() ?>images/asset/assetwebsite-13.png"></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <?php $this->load->view('webreport_belanja_banner');?>
                        <div class="container-belanja smooth">
                            <div class="row">
                                <div class="col-desk-12">
                                    <div>
                                        <h3>Beli Paket Data</h3>
                                        <label style="font-family:segoe UI">Nomor HP</label>
                                        <img title="Nomor Favorit" src="<?=base_url() ?>images/asset/favorite-books.svg" onclick="openFavoriteBook()" class="button-favorite-numb">
                                        <div style="position:relative">
                                            <span id="logo-operator"></span>
                                            <span id="label-alert" style="color:red;font-size:15"></span>
                                            <input id="input-no-tujuan" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyUp="onkeyUp(1)" style="margin:0;width:100%; border:none; box-shadow: none;font-familiy:Sogeo UI;font-size:18px" type="number" class="form-input-number" placeholder="ketik disini"><hr>
                                        </div>
                                        <div style="overflow: auto;">
                                            <p id="label-nominal" class="hidden">Nominal</p>
                                            <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                            <div id="list-product-parent" class="list-product-parent">
                                                <!-- <div class="product-name nominal-selected">5.000<br><span class="font-product-price">Rp 4.800</span></div>
                                                <div class="product-name">10.000<br><span class="font-product-price">Rp 9.800</span></div>
                                                <div class="product-name">20.000<br><span class="font-product-price">Rp 19.700</span> </div>
                                                <div class="product-name">50.000<br><span class="font-product-price">Rp 49.700</span> </div>
                                                <div class="product-name">100.000<br><span class="font-product-price">Rp 99.000</span> </div>
                                                <div class="product-name">200.000<br><span class="font-product-price">Rp 199.800</span> </div>
                                                <div class="product-name">500.000<br><span class="font-product-price">Rp 499.000</span> </div>
                                                <div class="product-name">1.000.000<br><span class="font-product-price">Rp 990.000</span> </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="child-product" id="child-product">
                                                    <div class="row">
                                                        <!-- <p style="margin-bottom:10px">Pilih Nominal</p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="overflow:hidden">
                                            <div class="row">
                                                <div class="col-desk-6">
                                                    <h4 id="price"></h4>
                                                    <h5 id="description"></h5>
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
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/modal.js"></script>
        <script>
            //document.getElementById("input_no_tujuan").addEventListener("onkeyup", onkeyUp);
            var priceText       = document.getElementById("price");
            var btnBayar        = document.getElementById("btn-bayar");
            var labelNom        = document.getElementById("label-nominal");
            var divChildProduct = document.getElementById("child-product");

            var logoOperator   = document.getElementById("logo-operator");
            var inputPin       = document.getElementById("input-pin");
            var alertToast     = document.getElementById("toast");
            var alertToastText = document.getElementById("toast-text");

            var ckNoHp       = document.getElementById("checkout-nohp");
            var ckNom        = document.getElementById("checkout-nom");
            var ckKodeProduk = document.getElementById("checkout-kodeproduk");
            var ckHarga      = document.getElementById("checkout-harga");

            var saldoAwal   = document.getElementById("saldo-awal");
            var sisaSaldo   = document.getElementById("sisa-saldo");
            var inputRO     = document.getElementById("input-ro");
            var inputNoTujuan = document.getElementById("input-no-tujuan");

            var labelAlert = document.getElementById("label-alert");
            var hargaProduk = 0;

            var description = document.getElementById("description");

            var hashtag = "#PAKETDATA";
            var dataProducts = [];
            var productItemChild   = "";
            var oldIdChildSelected = "";

            var idChildTemp  = "";
            var kodeProduk   = "";
            var pinTransaksi = "";
            var tujuan = "";
            var isExist = 0;
            function onkeyUp(val){
                alertToast.style.display = "none";
                labelAlert.style.display = "none";
                tujuan = inputNoTujuan.value;
                ckNoHp.innerHTML = tujuan;
                divChildProduct.innerHTML = "";
                oldIdChildSelected = "";
                var divParent   = document.getElementById("list-product-parent");
                var divLoading  = document.getElementById("loading").style;
                var productItem = "";

                if(inputNoTujuan.value.length >= 4 && (isExist == 0 || val == 0)){
                    //console.log(inputNoTujuan.value);
                    //get data
                    var t = getDateTime();
                    var h = sha1(inputNoTujuan.value.substr(0,4) + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ hashtag + t);

                    if(inputNoTujuan.value.length == 4){
                        divLoading.display = "block";
                    }

                    $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url(); ?>" + "belanja/cariprodukpaketdata",
                        data: JSON.stringify({
                            prefix: inputNoTujuan.value.substr(0,4), store_id : "<?=$this->session->userdata('store_id')?>",
                            uname : '<?=$this->session->userdata('username')?>',
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
                            dataProducts = rs;
                            var productItemChild = "";
                            for(var i = 0;i < rs.length; i++){
                                //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+')" id="itemid'+i+'" class="product-name">'+rs[i].DENOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                                //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+')" id="itemid'+i+'" class="product-name">'+rs[i].DENOM+'</div>'
                                // productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+')" id="itemid'+i+'" class="product-name" style="width:170px;">'+
                                //                     '<table>'+
                                //                         '<tr>'+
                                //                             '<td>'+
                                //                                 '<div class="image-item">'+
                                //                                     '<img src="<?=base_url()?>assets/img/'+rs[i].IMG_FILE_NAME+'" >'+
                                //                                 '</div>'+
                                //                             '</td>'+
                                //                             '<td>'+
                                //                             rs[i].DENOM+
                                //                             '</td>'+
                                //                         '<tr>'+
                                //                     '</table>'+
                                //                 '</div>'

                                productItemChild += '<div onclick="selectionChildItem(this,'+rs[i].PRICE+',\''+rs[i].NOM+'\',\''+rs[i].DENOM+'\',\''+rs[i].DSC+'\')" id="itemChildId'+i+'" class="product-name" style="width:170px;">'+
                                                        '<table>'+
                                                            '<tr>'+
                                                                '<td>'+
                                                                    '<div class="image-item">'+
                                                                        '<img src="<?=base_url()?>assets/img/'+rs[i].IMG_FILE_NAME+'" >'+
                                                                    '</div>'+
                                                                '</td>'+
                                                                '<td>'+'('+rs[i].NOM+')<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span>'+
                                                                '</td>'+
                                                            '<tr>'+
                                                        '</table>'+
                                                    '</div>';

                            }
                            if(rs.length>0){
                                isExist = 1;
                                labelNom.classList.remove("hidden");
                                labelNom.classList.add("show");
                                logoOperator.innerHTML = '<img class="img-operator" alt="No img" src="<?=base_url()?>assets/img/'+rs[0].IMG_FILE_NAME+'">'
                            }else{
                                isExist = 0;
                                labelAlert.style.display = "block";
                                labelAlert.innerHTML = "* Tidak ada produk untuk nomor/id yang anda input";
                            }
                            // divParent.innerHTML = productItem;
                            divParent.innerHTML = productItemChild;
                            //console.log(rs);
                        },
                        error: function (request, status, error) {
                            isExist = 0;
                            //console.log(request.responseText);
                            divParent.innerHTML = "";
                            priceText.innerHTML = "";
                            divLoading.display = "none";
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");
                            labelNom.classList.remove("show");
                            labelNom.classList.add("hidden");
                            logoOperator.innerHTML = "";
                            description.innerHTML = "";
                        }
                    });
                }else if(inputNoTujuan.value.length < 4){
                    isExist = 0;
                    divParent.innerHTML = "";
                    priceText.innerHTML = "";
                    description.innerHTML = "";
                    divChildProduct.innerHTML = "";
                    btnBayar.classList.remove("show");
                    btnBayar.classList.add("hidden");
                    labelNom.classList.remove("show");
                    labelNom.classList.add("hidden");
                    logoOperator.innerHTML = "";
                }

            }
            var oldIdSelected = "";

            function selectionItem(data,price,idxSelected){
                // console.log("idx",idxSelected);
                var idTemp = data.id;
                var selected = document.getElementById(idTemp);
                if(selected.className == "product-name nominal-selected"){
                    document.getElementById(idTemp).classList.remove("nominal-selected");

                    if(oldIdSelected != ""){
                        if(oldIdSelected != idTemp){
                            document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        }else{
                            divChildProduct.innerHTML = "";
                            priceText.innerHTML = "";
                            description.innerHTML = "";
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");
                        }
                    }
                }else{
                    if(oldIdSelected != idTemp && oldIdSelected != ""){
                        document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        priceText.innerHTML = "";
                        description.innerHTML = "";
                        btnBayar.classList.remove("show");
                        btnBayar.classList.add("hidden");
                    }
                    document.getElementById(idTemp).classList.add("nominal-selected");
                    viewChild(idxSelected);
                }

                oldIdSelected = idTemp;
                //priceText.innerHTML = "Rp "+numberWithCommas(price);
            }

            function selectionChildItem(data,price,kdProduk,denom,dsc){
                hargaProduk = price;
                kodeProduk = kdProduk;
                ckKodeProduk.innerHTML = kdProduk;
                ckNom.innerHTML = denom;
                idChildTemp = data.id;
                console.log(idChildTemp);
                var selected = document.getElementById(idChildTemp);
                if(selected.className == "product-name nominal-selected"){
                    document.getElementById(idChildTemp).classList.remove("nominal-selected");
                    btnBayar.classList.remove("show");
                    btnBayar.classList.add("hidden");
                    priceText.innerHTML = "";
                    description.innerHTML = "";

                    if(oldIdChildSelected != ""){
                        if(oldIdChildSelected != idChildTemp){
                            document.getElementById(oldIdChildSelected).classList.remove("nominal-selected");
                        }
                    }
                }else{
                    // console.log("old id",oldIdChildSelected);
                    if(oldIdChildSelected != "" && oldIdChildSelected != null){
                        if(oldIdChildSelected != idChildTemp){
                            document.getElementById(oldIdChildSelected).classList.remove("nominal-selected");
                        }
                    }
                    document.getElementById(idChildTemp).classList.add("nominal-selected");
                    btnBayar.classList.remove("hidden");
                    btnBayar.classList.add("show");
                }

                oldIdChildSelected = idChildTemp;
                priceText.innerHTML = "Rp "+numberWithCommas(price);
                ckHarga.innerHTML = "Rp "+numberWithCommas(price);
                description.innerHTML = dsc;
            }

            function viewChild(idxSelected){
                oldIdChildSelected = "";
                productItemChild = '<p style="margin-bottom:10px">Pilih Nominal</p>';
                var rs = dataProducts[idxSelected].child;
                for(var i = 0;i < rs.length; i++){
                    //productItemChild += '<div onclick="selectionChildItem(this,'+rs[i].PRICE+',\''+rs[i].NOM+'\',\''+rs[i].DENOM+'\',\''+rs[i].DSC+'\')" id="itemChildId'+i+'" class="product-name">'+rs[i].DENOM+'<br>('+rs[i].NOM+')<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                    productItemChild += '<div onclick="selectionChildItem(this,'+rs[i].PRICE+',\''+rs[i].NOM+'\',\''+rs[i].DENOM+'\',\''+rs[i].DSC+'\')" id="itemChildId'+i+'" class="product-name" style="width:170px;">'+
                                                    '<table>'+
                                                        '<tr>'+
                                                            '<td>'+
                                                                '<div class="image-item">'+
                                                                    '<img src="<?=base_url()?>assets/img/'+rs[i].IMG_FILE_NAME+'" >'+
                                                                '</div>'+
                                                            '</td>'+
                                                            '<td>'+
                                                            rs[i].DENOM+'<br>('+rs[i].NOM+')<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span>'+
                                                            '</td>'+
                                                        '<tr>'+
                                                    '</table>'+
                                                '</div>'
                }
                divChildProduct.innerHTML = productItemChild;
                //jika jumlah child ada 1 otomatis seleksi
                if(rs.length == 1){
                    var data = {id:'itemChildId0'};
                    selectionChildItem(data,rs[0].PRICE,rs[0].NOM,rs[0].DENOM,rs[0].DSC);
                }
                productItemChild = "";
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
            window.onload = function() {
                inputNoTujuan.focus();
            };
            //mulai transaksi
            var btnKirim = document.getElementById("btn-kirim");
            var loadingTransaction = document.getElementById("loading-transaction");
            btnKirim.onclick = function(){
                kirimTransaksi();
            }

            inputPin.onkeyup = function(event){
                if (event.keyCode === 13) {
                    kirimTransaksi();
                }
            }
            var cu = "";
            function kirimTransaksi(){
                alertToast.style.display = "none";
                loadingTransaction.style.display = "block";

                pinTransaksi = inputPin.value;
                var text = kodeProduk + '.' + tujuan + '.' + pinTransaksi + inputRO.value;
                //console.log("TEXT", text);
                var t = getDateTime();
                var h = sha1('<?=$this->session->userdata('username')?>' + text + t);
                $.ajax({
                    type: "POST",
                    url:  "<?=base_url();?>" + "transaksi?msisdn=<?=$this->session->userdata('msisdn')?>&text="+text,
                    data: JSON.stringify({
                        msisdn : '<?=$this->session->userdata('username')?>',
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
                        loadingTransaction.style.display = "none";
                        var rs = JSON.parse(result);
                        alertToast.style.display = "block";
                        alertToastText.innerHTML = rs.Rows[0].MESSAGE.replace(/([|])/g,'<br>');;
                        document.body.scrollTop = 0;
                        modal.style.display = "none";
                        if(rs.Rows[0].RC == "00"){
                            cu = "";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");
                            searchTrxByMessageId(tujuan,messageid);
                        }
                        if(rs.Rows[0].RC == "94" && rs.Rows[0].MESSAGE.includes('SUDAH BERHASIL')){
                            cu = "[CU]";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");;
                            searchTrxByMessageId(tujuan,messageid);
                        }
                        //console.log(rs);
                    },
                    error: function (request, status, error) {
                        //console.log(request.responseText);
                        loadingTransaction.style.display = "none";
                        alertToast.style.display = "block";
                        alertToastText.innerHTML = "Koneksi Gagal";
                    }
                });
            }

            function closeToast(){
                alertToast.style.display = "none";
            }
            var outletName = "";
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
                        // loading.display = "none";
                        var rs = JSON.parse(result);
                        //console.log(rs);
                        saldoAwal.innerHTML = "Rp "+rs.BALANCE;
                        outletName = rs.FULL_NAME;
                        var balance = rs.BALANCE;
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
                        //   console.log(request.responseText);
                        loading.display = "none";
                    }
                });
            }
        </script>
        <script>
            //print
            var modalPrint = document.getElementById("modal-print");
            var printResultResp = null;
            function searchTrxByMessageId(no_tujuan,messageid){
                var t = getDateTime();
                var h = sha1(messageid + no_tujuan + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);
                $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url(); ?>" + "cetakstruk/carimessageid",
                        data: JSON.stringify({messageid:messageid ,key: no_tujuan, store_id : "<?=$this->session->userdata('store_id')?>", uname : '<?=$this->session->userdata('username')?>', t:t,h:h}),
                contentType: "application/json;",
                        cache: false,
                        success: function(result){
                if(result.includes("Login Web Report")){
                    window.location = "<?=base_url()?>webreport/logout";
                }
                    var rs = JSON.parse(result);
                    printResultResp = rs;
                    printView(rs);

                },
                error: function (request, status, error) {
                    //   console.log(request.responseText);
                    loading.display = "none";
                }
                });
            }
            function printView(rowData){

                var textPrint = document.getElementById("text-print");
                var messageSplit = "";
                var printMessage = "";
                if(rowData.T_RAW_STRUK == null){
                    $('#button-ubah-harga').show(500);
                }else{
                    $('#button-ubah-harga').hide();
                }
                if(rowData.productType == "B"){
                    var strukParse = JSON.parse(rowData.STRUK_INFO);
                    // console.log("strukArrayTemp",strukParse);
                    messageSplit = strukParse.info.replace(/([|])/g,'<br>');

                }else{
                    var dataPrintSelection = rowData;
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
                printMessage += (rowData.T_RAW_STRUK != null?(rowData.T_RAW_STRUK.STRUK):messageSplit)+cu;

                printMessage += "</pre></div>";
                printMessage += "</div>";
                textPrint.innerHTML = printMessage;

                modalPrint.style.display = "block";

            }
            function printDiv(idDiv) {
                    w=window.open();
                    w.document.write($('#'+idDiv).html());
                    w.print();
                    w.close();
            }

            function closeModal(){
                modalPrint.style.display = "none";
            }

            var inputUbahHarga = document.getElementById('input-ubah-harga');
            inputUbahHarga.onkeyup = function(event){
                if (event.keyCode === 13) {
                    printResultResp.AMOUNT = $('#input-ubah-harga').val();;
                    printView(printResultResp);
                    $('#box-ubah-harga').hide();
                }
            }

            function ubahHargaAction(action){
                if(action == 'simpan'){
                    printResultResp.AMOUNT = $('#input-ubah-harga').val();;
                    printView(printResultResp);
                    $('#box-ubah-harga').hide();
                }else if(action == 'batal'){
                    $('#box-ubah-harga').hide();
                }
            }

            function openBoxUbahHarga(){
                $('#box-ubah-harga').show(100);
                $('#input-ubah-harga').focus();
            }
            //print end
        </script>
        <script src="<?php echo base_url() ?>assets/js/belanja_script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/carousel.js"></script>
    </body>
</html>

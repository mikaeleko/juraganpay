<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=base_url() ?>assets/css/style.css" type="text/css">
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
                        <img class="back-activity" title="Kembali" onclick="closeFavoriteBook()" src="<?=base_url() ?>images/asset/right.svg">
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
                            <input id="input-pin" type="password" class="form-input-text" style="font-familiy:Sogeo UI;font-size:18px;margin-right:0" placeholder="Masukan PIN">
                            <br>
                            <button id="btn-kirim" class="button">KIRIM</button>
                        </div>
                    </div>
                    <div>
                        <button id="btn-tutup" class="button">kembali</button>
                    </div>
                </div>
            </div>
            <div class="header-belanja sukses">
                <div class="row">
                    <div class="col-desk-6 col-md-6 col-sm-6">
                        <a href="<?=base_url() ?>"><img class="left-logo-belanja" src="<?=base_url() ?>images/LogoST24/whitest24.svg"></a>
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
                            <img style="width:30px;height:30px;" src="<?=base_url() ?>images/asset/menu.svg">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <div class="navigation-feature">
                            <button title="Pulsa" onclick="redirectTo('<?=base_url()?>belanja')" class="button-image color-white" ><img class="image-inner" src="<?=base_url() ?>images/asset/assetwebsite-01.png"></button>
                            <button title="Paket Data" onclick="redirectTo('<?=base_url()?>belanja/paketdata')" class="button-image color-white"><img class="image-inner" src="<?=base_url() ?>images/asset/assetwebsite-02.png"></button>
                            <button title="Token Listrik" onclick="redirectTo('<?=base_url()?>belanja/tokenlistrik')" class="button-image color-white"><img class="image-inner" src="<?=base_url() ?>images/asset/assetwebsite-03.png"></button>
                            <button title="E-Money" onclick="redirectTo('<?=base_url()?>belanja/emoney')" class="button-image color-white active-menu"><img class="image-inner" src="<?=base_url() ?>images/icon/icon_emoney.png"></button>
                            <button title="Pembayaran" onclick="redirectTo('<?=base_url()?>belanja/tagihan')" class="button-image color-white"><img class="image-inner" src="<?=base_url() ?>images/icon/icon_pascabayar.png"></button>
                            <button title="Tiket Pesawat" onclick="redirectTo('<?=base_url()?>belanja/tiketpesawat')" class="button-image color-white"><img class="image-inner" src="<?=base_url() ?>images/asset/assetwebsite-04.png"></button>
                            <button title="Tiket Kereta" onclick="redirectTo('<?=base_url()?>belanja/tiketkereta')" class="button-image color-white"><img class="image-inner" src="<?=base_url() ?>images/asset/assetwebsite-13.png"></button>
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
                                        <h3>E-Money</h3>
                                        <p>No. Tujuan/ No. Kartu <img title="Nomor Favorit" src="<?=base_url() ?>images/asset/favorite-books.svg" onclick="openFavoriteBook()" class="button-favorite-numb"></p>
                                        <!-- <label style="color:green;font-size:12px"><br>*) masukan 10 atau 11 digit</label> -->
                                        <div style="position:relative">
                                            <span id="logo-operator"></span>
                                            <input onclick="onclickNoTujuan()" id="input-no-tujuan" maxlength="21" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyUp="onkeyUp()" style="margin:0;width:100%; border:none; box-shadow: none;font-familiy:Sogeo UI;font-size:18px" type="number" class="form-input-number" placeholder="ketik disini"><hr>
                                        </div>
                                        <div style="overflow: auto;">
                                            <p id="label-nominal" class="hidden"> </p>
                                            <div id="list-product-category" class="list-product-parent">
                                            </div>
                                            <div style="overflow:auto;display:none" id="product-activity" >
                                                <div id="loading" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                                                <div style="background-color:#00afe9;padding:5px;margin-bottom:5px" id="back-button">
                                                    <img class="back-activity" style="width:40px;height:40px;float:left;margin:6px;" title="Kembali" onclick="onclickBackToCategory()" src="<?=base_url() ?>images/asset/left.svg">
                                                    <input id="input-search" type="text" class="form-input-text" onkeyUp="cariProduk(this)" placeholder="Cari produk e-money..">
                                                </div>
                                                <div id="list-product-parent" class="list-product-parent"></div>
                                            </div>

                                            <!-- <div class="list-item">
                                                <div class="left">
                                                    <div class="image-item">
                                                        <img src="<?=HOST_API_IMAGE?>get_img?file=icon_topup.png" >
                                                    </div>
                                                </div>
                                                <div class="left">
                                                    <span style="font-weight:700">OVO10</span><br>
                                                    <span style="color:#5e4b4b;font-size:13px">TOP UP OVO 10rb</span><br>
                                                    <span>Rp 9.300</span>
                                                </div>
                                            </div> -->

                                            <!-- <div id="list-product-parent" class="list-product-parent"> -->
                                                <!-- <div class="product-name" style="width:auto">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="image-item">
                                                                    <img src="<?=HOST_API_IMAGE?>get_img?file=icon_topup.png" >
                                                                </div>
                                                            </td>
                                                            <td>
                                                            10.000<br><span class="font-product-price">Rp 9.800</span>
                                                            </td>
                                                        <tr>
                                                    </table>
                                                </div> -->
                                            <!-- </div> -->
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
        <script src="<?=base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?=base_url() ?>assets/js-sha1/sha1.min.js"></script>
        <script src="<?=base_url() ?>assets/js/script.js"></script>
        <script>
            //document.getElementById("input_no_tujuan").addEventListener("onkeyup", onkeyUp);
            var priceText = document.getElementById("price");
            var btnBayar = document.getElementById("btn-bayar");
            var labelNom = document.getElementById("label-nominal");
            var inputSearch = document.getElementById("input-search");
            var divChildProduct = document.getElementById("child-product");

            var logoOperator = document.getElementById("logo-operator");
            var inputPin = document.getElementById("input-pin");
            var alertToast = document.getElementById("toast");
            var alertToastText = document.getElementById("toast-text");

            var ckNoHp = document.getElementById("checkout-nohp");
            var ckKodeProduk = document.getElementById("checkout-kodeproduk");
            var ckHarga = document.getElementById("checkout-harga");

            var inputRO   = document.getElementById("input-ro");

            var saldoAwal = document.getElementById("saldo-awal");
            var sisaSaldo = document.getElementById("sisa-saldo");
	        var inputNoTujuan = document.getElementById("input-no-tujuan");
            var hargaProduk = 0;

            var divParent = document.getElementById("list-product-parent");

            var divProductCategory = document.getElementById('list-product-category');

            var hashtag = "#EMONEY";
            var dataProducts = [];
            var productItemChild = "";
            var oldIdChildSelected = "";
            var productItem = "";
            var productCategoryItem = "";

            var idChildTemp = "";
            var kodeProduk = "";
            var pinTransaksi = "";
            var tujuan = "";
            var jumlahInput = "";

            var divLoading = document.getElementById("loading").style;

            function onclickNoTujuan(){
                dataProducts = [];
            }
	        var isExist = 0;
            function onkeyUp(){
                if (event.keyCode === 13) {
                    inputSearch.focus();
                }
                if(inputNoTujuan.value == ""){
                    dataProducts = [];
                    divParent.innerHTML = "";
                    priceText.innerHTML = "";
                    btnBayar.classList.remove("show");
                    btnBayar.classList.add("hidden");
                    labelNom.classList.remove("show");
                    labelNom.classList.add("hidden");
                    inputSearch.classList.remove("show");
                    inputSearch.classList.add("hidden");
                    logoOperator.innerHTML = "";
                    divProductCategory.innerHTML = "";
                    return;
                }
                $('#product-activity').hide(100);
                $('#list-product-category').show(100);

                inputSearch.value = "";
                tujuan = inputNoTujuan.value;
                ckNoHp.innerHTML = tujuan;
                productCategoryItem = "";
                oldIdChildSelected = "";

                jumlahInput = inputNoTujuan.value.length;

                if(dataProducts.length > 0 && jumlahInput > 0){
                    return;
                }
                if(jumlahInput > 0 && isExist == 0){
                    var t = getDateTime();
                    var h = sha1(hashtag + t);
                    $.ajax({
                    type: "POST",
                    url:  "<?=base_url(); ?>" + "belanja/kategoriprodukhashtag",
                    data: JSON.stringify({
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

                        for(var i = 0;i < rs.length; i++){
                            //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+',\''+rs[i].NOM+'\')" id="itemid'+i+'" class="product-name">'+rs[i].NOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                            productCategoryItem += '<div onclick="getProductBySelectedCategory(this,\''+rs[i].NAME+'\','+i+')" id="itemidcategory'+i+'" class="product-name" style="width:180px;padding:0px">'+
                                                        '<table>'+
                                                            '<tr>'+
                                                                '<td>'+
                                                                    '<div class="image-item-prd">'+
                                                                        '<img src="<?=HOST_API_IMAGE?>get_img?file=icon_'+rs[i].NAME.toLowerCase().trim()+'.png" >'+
                                                                    '</div>'+
                                                                '</td>'+
                                                                '<td>'+
                                                                '<span style="font-size:12px">'+ rs[i].NAME +'</span>' +
                                                                '</td>'+
                                                            '<tr>'+
                                                        '</table>'+
                                                    '</div>'
                        }
                        if(rs.length>0){
                            isExist = 1;
                            labelNom.classList.remove("hidden");
                            labelNom.classList.add("show");
                            inputSearch.classList.remove("hidden");
                            inputSearch.classList.add("show");
                        }else{
                            isExist = 0;
                        }
                        divProductCategory.innerHTML = productCategoryItem;
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
                        inputSearch.classList.remove("show");
                        inputSearch.classList.add("hidden");
                        logoOperator.innerHTML = "";
                        dataProducts = [];
                    }
                });
                }else{
                    isExist = 0;
                }

            }

            function onclickBackToCategory(){
                $('#list-product-category').show(100);
                $('#product-activity').hide(100);
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

            function getProductBySelectedCategory(obj,keyword,index){
                $('#list-product-category').hide(100);
                $('#product-activity').show(100);
                var hashtag = "#EMONEY";
                productItem = "";
                //get data
                var t = getDateTime();
                var h = sha1(hashtag + '<?=$this->session->userdata('lvl')?>' + '<?=$this->session->userdata('kd_price_plan')?>' + keyword + t);
                divLoading.display = "block";
                $.ajax({
                    type: "POST",
                    url:  "<?=base_url(); ?>" + "belanja/cariprodukhashtag",
                    data: JSON.stringify({
                        kode_price_plan : "<?=$this->session->userdata('kd_price_plan')?>",
                        level : "<?=$this->session->userdata('lvl')?>",
                        hashtag : hashtag,
                        keyword : keyword,
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

                        for(var i = 0;i < rs.length; i++){
                            //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+',\''+rs[i].NOM+'\')" id="itemid'+i+'" class="product-name">'+rs[i].NOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                            productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+',\''+rs[i].NOM+'\',\''+rs[i].IMG+'\')" id="itemid'+i+'" class="product-name" style="width:170px;;padding:0px">'+
                                                '<table>'+
                                                    '<tr>'+
                                                        '<td>'+
                                                            '<div class="image-item">'+
                                                                '<img src="<?=HOST_API_IMAGE?>get_img?file='+rs[i].IMG+'" >'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                        rs[i].NOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span>'+
                                                        '</td>'+
                                                    '<tr>'+
                                                '</table>'+
                                            '</div>'
                        }
                        if(rs.length>0){
                            isExist = 1;
                            labelNom.classList.remove("hidden");
                            labelNom.classList.add("show");
                            inputSearch.classList.remove("hidden");
                            inputSearch.classList.add("show");
                            divParent.innerHTML = productItem;
                        }else{
                            isExist = 0;
                            divParent.innerHTML = "<p>Produk tidak tersedia</p>";
                        }

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
                        inputSearch.classList.remove("show");
                        inputSearch.classList.add("hidden");
                        logoOperator.innerHTML = "";
                        dataProducts = [];
                    }
                });
            }
            var oldIdSelected = "";

            function selectionItem(data,price,idxSelected,kdProduk,imgName){
                hargaProduk = price;
                kodeProduk = kdProduk;
                ckKodeProduk.innerHTML = kdProduk;

                // console.log("idx",idxSelected);
                var idTemp = data.id;
                var selected = document.getElementById(idTemp);
                if(selected.className == "product-name nominal-selected"){
                    document.getElementById(idTemp).classList.remove("nominal-selected");
                    btnBayar.classList.remove("show");
                    btnBayar.classList.add("hidden");
                    priceText.innerHTML = "";
                    logoOperator.innerHTML = "";

                    if(oldIdSelected != ""){
                        if(oldIdSelected != idTemp){
                            document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        }else{
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");
                        }
                    }
                }else{
                    if(oldIdSelected != idTemp && oldIdSelected != ""){
                        document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        btnBayar.classList.remove("show");
                        btnBayar.classList.add("hidden");
                        priceText.innerHTML = "";
                        logoOperator.innerHTML = "";
                    }
                    document.getElementById(idTemp).classList.add("nominal-selected");
                    btnBayar.classList.remove("hidden");
                    btnBayar.classList.add("show");
                    logoOperator.innerHTML = '<img class="img-operator" alt="No img" src="<?=HOST_API_IMAGE?>get_img?file='+imgName+'">'
                    priceText.innerHTML = "Rp "+numberWithCommas(price);
                }

                oldIdSelected = idTemp;
                ckHarga.innerHTML = "Rp "+numberWithCommas(price);

                window.scrollTo(0,document.body.scrollHeight);
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
                document.getElementById("input-no-tujuan").focus();
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
                pinTransaksi = inputPin.value;
                if(pinTransaksi == ""){
                    document.body.scrollTop = 0;
                    inputPin.focus();
                    alertToast.style.display = "block";
                    alertToastText.innerHTML = "PIN Transaksi harus diisi.";
                    return;
                }
                alertToast.style.display = "none";
                loadingTransaction.style.display = "block";

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
                        document.body.scrollTop = 0;

                        alertToast.style.display = "block";
                        alertToastText.innerHTML = rs.Rows[0].MESSAGE.replace(/([|])/g,'<br>');;
                        document.body.scrollTop = 0;
                        if(rs.Rows[0].RC == "00"){
                            cu = "";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");
                            searchTrxByMessageId(tujuan,messageid);
                        }
                        //transaksi sudah berhasil
                        if(rs.Rows[0].RC == "94" && rs.Rows[0].MESSAGE.includes('SUDAH BERHASIL')){
                            cu = "[CU]";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");
                            searchTrxByMessageId(tujuan,messageid);
                        }
                        //console.log(rs);
                        //console.log(rs.Rows[0]);
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
                    url:  "<?=base_url(); ?>" + "webreport/get_profile",
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
            var dataSearchResults = [];
            var productItemSearch = "";
            function cariProduk(param){
                logoOperator.innerHTML = "";
                oldIdSelected = "";
                divParent.innerHTML = "";
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
                // console.log("Hasil pencarian",dataSearchResults);
                var dataSearchResultsLength = dataSearchResults.length;
                for(var i = 0;i < dataSearchResultsLength; i++){
                    productItemSearch += '<div onclick="selectionItem(this,'+dataSearchResults[i].PRICE+','+i+',\''+dataSearchResults[i].NOM+'\',\''+dataSearchResults[i].IMG+'\')" id="itemid'+i+'" class="product-name" style="width:170px;">'+
                                            '<table>'+
                                                '<tr>'+
                                                    '<td>'+
                                                        '<div class="image-item">'+
                                                            '<img src="<?=HOST_API_IMAGE?>get_img?file='+dataSearchResults[i].IMG+'" >'+
                                                        '</div>'+
                                                    '</td>'+
                                                    '<td>'+
                                                    dataSearchResults[i].NOM+'<br><span class="font-product-price">Rp '+numberWithCommas(dataSearchResults[i].PRICE)+'</span>'+
                                                    '</td>'+
                                                '<tr>'+
                                            '</table>'+
                                        '</div>'
                }
                if(dataSearchResultsLength>0){
                    divParent.innerHTML = productItemSearch;
                }else{
                    divParent.innerHTML = "<p>Produk " + param.value + " tidak tersedia</p>";
                }
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
                        url:  "<?=base_url(); ?>" + "cetakstruk/carimessageid",
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
        <script src="<?=base_url() ?>assets/js/belanja_script.js"></script>
        <script src="<?=base_url() ?>assets/js/carousel.js"></script>
    </body>
</html>

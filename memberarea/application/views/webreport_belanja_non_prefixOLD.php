<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=base_url() ?>assets/css/style.css" type="text/css">
        <style>
        html {
        scroll-behavior: smooth;
        font-family:Segoe UI;
        }
        .img-group {
              width: 30px;
             height: 30px;
             background-color: #fff;
             border-radius: 50%;
             padding: 3px;

             margin-top:4px;
             /* margin-bottom:4px; */
          }
          .span-group{
            margin: 10px 10px 5px 10px;
            vertical-align: middle;

            font-weight:bold;
          }
          #title-jnsproduk{
            background-color:rgba(0,175,233,1);
            height:auto;
            font-size:18px;
            text-align:center;
            color:#fff;
            box-shadow: 0px 2px 1px #888888;
            display: flex;
            align-items: center;
            padding:10px;
            justify-content: center;
          }
          .list-item-child{
            padding-left:0px;margin-left:0px;cursor:pointer;padding:2px;box-shadow: 1px 1px 3px #888888;
          }

          .list-item-child:hover{

            background-color: #5faeec2b !IMPORTANT;
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
                                <td>No. Tujuan</td><td>:</td><td><div class="value-checkout"><input placeholder="..." onkeydown="if (event.keyCode == 13) { return false;}" style="text-align:right;padding-top:5px;padding-bottom:5px;border:none;font-size:16px;font-family:Segoe UI;cursor:pointer" title="No Tujuan" id="checkout-nohp" type="text" ><div></td>
                            </tr>
                            <tr>
                                <td>Nominal</td><td>:</td><td><div class="value-checkout"><span id="checkout-nom"></span><div></td>
                            </tr>
                            <tr>
                                <td>Kode Produk</td><td>:</td><td><div class="value-checkout"><span id="checkout-kodeproduk"></span><div></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td><td>:</td><td><div class="value-checkout"><span id="checkout-keterangan"></span><div></td>
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
                            <input id="input-pin" type="password" class="form-input-text" style="font-family:Segoe UI;font-size:18px;margin-right:0" placeholder="Masukan PIN">
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

                        <div id='sukses_msg' style="display:none;width:400px;margin:20px;background-color: #f1f1f1;border:1px solid #000;padding:5px;border-radius:5px;font-size:14px;font-family:Segoe UI;text-align:center;">
                          <div id='content_result'>
                            <div id='sukses_show' class="w3-text-red">
                              <!-- <div>
                                <img class="img_sukses" src="<?=base_url()?>/images/icon/save.png">
                              </div> -->
                              <div id='sukses'> </div>

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
                        <button onclick="printDiv('print-area')" class="button">
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
                        <div id="navigation-feature" class="navigation-feature">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-desk-12">
                        <!-- Banner Corousel -->
                        <?php $this->load->view('webreport_belanja_banner');?>

                        <!-- START Container Inside for product-->
                        <div class="container-belanja smooth">
                            <!-- START ROW -->
                            <div class="row">

                                <div class="col-desk-12 child-product" id="child-product">
                                </div>

                                <div class="col-desk-12 col-sm-12 col-md-12">
                                  <h3 style="text-align:center;"><?=$title?></h3>
                                </div>

                                <!--BUTTON SEND HERE -->

                                <!--END OF BUTTON SEND HERE -->

                                <!-- PRODUCT HERE -->
                                <div class="col-desk-12">
                                  <div class="row list-product-parent"  style="margin:10px;">
                                    <div class="col-desk-12">
                                      <div class="navigation-feature" id="list-product-parent">
                                        <!-- list product here -->
                                      </div>
                                    </div>
                                  </div>



                                  <!-- detail product after click here -->


                                  <!-- detail product here -->
                                  <div class="col-desk-12" >
                                    <div>
                                      <center>
                                        <div class="loading-ring" id="loading" style="display:none;position:absolute;"><div></div><div></div><div></div><div></div></div>
                                      </center>
                                    </div>
                                    <div id="list-product-parent2">
                                      <!-- list detail product here -->
                                    </div>
                                  </div>
                                    <!-- End of detail product after click here -->

                                  <div class="row">
                                    <div class="col-desk-12 child-product" id="child-product">

                                    </div>
                                  </div>
                                </div>
                                <!-- End OF PRODUCT-->




                                <!-- <div class="col-desk-12">
                                      <div id="emoney" style="display:none">
                                        <h3>E-Money</h3>
                                        <p>No. Tujuan/ No. Kartu <img title="Nomor Favorit" src="<?=base_url() ?>images/asset/favorite-books.svg" onclick="openFavoriteBook()" class="button-favorite-numb"></p>
                                        <label style="color:green;font-size:12px"><br>*) masukan 10 atau 11 digit</label>
                                        <div style="position:relative">
                                            <span id="logo-operator"></span>
                                            <input onclick="onclickNoTujuan()" id="input-no-tujuan" maxlength="21" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyUp="onkeyUp()" style="margin:0;width:100%; border:none; box-shadow: none;font-familiy:Sogeo UI;font-size:18px" type="number" class="form-input-number" placeholder="ketik disini"><hr>
                                        </div>
                                      </div>

                                      <div class="col-desk-12 child-product" id="child-product">
                                      </div>

                                      <div class="col-desk-12" style="overflow:hidden">
                                        <div class="row" style="margin-top:50px;">
                                          <div class="col-desk-3 hidden">
                                            tes
                                          </div>
                                          <div class="col-desk-3">
                                            <h4 id="price" class="left"></h4>
                                          </div>
                                          <div class="col-desk-3">
                                            <button id="btn-bayar" class="button-payment right hidden">Kirim</button>
                                          </div>
                                          <div class="col-desk-3 hidden">
                                            tes
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


                                      <div id="list-product-parent2" class="list-product-parent2">

                                      </div>
                                      <div class="row">
                                          <div class="child-product" id="child-product">
                                              <div class="row">
                                                  <p style="margin-bottom:10px">Pilih Nominal</p>
                                              </div>
                                          </div>
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
                                    </div>

                                </div> -->

                            </div>
                            <!-- End of row -->
                        </div>
                        <!-- End OF container product inside -->
                    </div>
                </div>

                <!-- footer -->
                <div class="row">
                  <div class="col-desk-12">
                    <div class="footer">
                        site design / logo © 2019 PT Cipta Solusi Aplikasi
                    </div>
                  </div>
                </div>
                <!-- End of footer -->
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
            var divNavigation = document.getElementById("navigation-feature");
            var logoOperator = document.getElementById("logo-operator");
            var inputPin = document.getElementById("input-pin");
            var alertToast = document.getElementById("toast");
            var alertToastText = document.getElementById("toast-text");

            var ckNoHp       = document.getElementById("checkout-nohp");
            var ckNom        = document.getElementById("checkout-nom");
            var ckKodeProduk = document.getElementById("checkout-kodeproduk");
            var ckKeterangan = document.getElementById("checkout-keterangan");
            var ckHarga      = document.getElementById("checkout-harga");

            var inputRO   = document.getElementById("input-ro");

            var saldoAwal = document.getElementById("saldo-awal");
            var sisaSaldo = document.getElementById("sisa-saldo");
	          var inputNoTujuan = document.getElementById("input-no-tujuan");
            var hargaProduk = 0;

            var divParent = document.getElementById("list-product-parent");
            var divParent2 = document.getElementById("list-product-parent2");

            var divProductCategory = document.getElementById('list-product-category');

            var hashtag = "#<?=$this->input->get('category')?>".toUpperCase();
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

            var divLoading = document.getElementById("loading").style

            function onclickNoTujuan(){
                dataProducts = [];
            }
	        var isExist = 0;


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
                  console.log(rs);


                  var cls ="active_menu";
                  var path = "";


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


                    iconItem += '<button title="'+c+'" onclick="redirectTo(\'' +'<?php echo base_url()?>'+'belanja?category='+category+ '\')" class=" '+cls+' button-image color-white" >' +
                                    '<img class="image-inner" src="<?= HOST_API_IMAGE ?>get_img?file=icon_'+rs[i].NAME.substring(1)+'.png " ' +
                              '</button>' ;
                  }

                  icon += ' <button title="TIKET PESAWAT" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja/tiketpesawat' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_pesawat.png"></button>'+
                          ' <button title="TIKET KERETA" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja/tiketkereta' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_kereta.png"></button>';

                  divNavigation.innerHTML = iconItem + icon;
              }

            });
          }

          loadIcon();


          function loadProduct(){

              productCategoryItem = "";
              oldIdChildSelected = "";

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
                  //console.log(rs);

                  for(var i = 0;i < rs.length; i++){
                      //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+',\''+rs[i].NOM+'\')" id="itemid'+i+'" class="product-name">'+rs[i].NOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                      productItem += '<button title="'+rs[i].KODE_PROVIDER+'" onclick="detailProduk(this,\''+rs[i].KODE_PROVIDER+'\')" class="button-image color-white" >' +
                                        '<img class="image-inner" src="'+rs[i].IMG+'">' +
                                      '</button>' ;

                                    // '<div class="cold-desk-4 col-sm-4 col-md-4">' +
                                    //    '<div onclick="detailProduk(this,\''+rs[i].KODE_PROVIDER+'\')" id="itemidcategory'+i+'" class="product-emoney" style="width:80px;height:80px;padding:10px;margin-top:10px;">'+
                                    //       '<div class="image-item-emoney">'+
                                    //           '<img class="img-emoney"src="'+rs[i].IMG_FILE_NAME+'" >'+
                                    //       '</div>'+
                                    //    '</div>' +
                                    //  '</div>'

                  }


                  divParent.innerHTML = productItem;
                  //console.log(rs);
              },
              error: function (request, status, error) {
                  isExist = 0;
                  //console.log(request.responseText);
                  divParent.innerHTML = "";
                  priceText.innerHTML = "";
                  //divLoading.display = "none";
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

          loadProduct();


          function detailProduk(obj,kode_prov){
              $('#list-product-category').hide(100);
              //$('#product-activity').show(100);
              var productItem = "";
                  kdProv = kode_prov;
              //get data
              var t = getDateTime();
              var h = sha1(kdProv + hashtag + '<?=$this->session->userdata('username')?>' + "<?=$this->session->userdata('store_id')?>" + t);

              divLoading.display = "block";
              $.ajax({
                  type: "POST",
                  url:  "<?=base_url(); ?>" + "belanja/detailproduknonprefix",
                  data: JSON.stringify({
                      store_id : "<?=$this->session->userdata('store_id')?>",
                      uname : '<?=$this->session->userdata('username')?>',
                      kdProv  : kdProv,
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
                    var oprNameTmp = '';
                    var productItem = '';
                    for(var i = 0;i < rs.length; i++){
                      //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+')" id="itemid'+i+'" class="product-name">'+rs[i].DENOM+'<br><span class="font-product-price">Rp '+numberWithCommas(rs[i].PRICE)+'</span></div>'
                      //productItem += '<div onclick="selectionItem(this,'+rs[i].PRICE+','+i+')" id="itemid'+i+'" class="product-name">'+rs[i].DENOM+'</div>'
                      if(i % 2 == 0) {
                        color = "#FFF";
                      } else {
                        color = "#F1F1F1";
                      }
                      if(oprNameTmp!=rs[i].OPR_NAME){
                        productItem += '<div class="col-desk-12 col-sm-12 col-md-12">'+
                          '<div id="title-jnsproduk">'+
                            '<img class="img-group" src="'+rs[i].IMG_FILE_NAME+'" >'+
                            '<span class="span-group">'+rs[i].OPR_NAME +'</span>'+
                          '</div>' +
                        '</div>' ;

                      }

                      oprNameTmp = rs[i].OPR_NAME;
                      productItem +=    '<div style="background-color:'+color+';" class="list-item-child" onclick="selectionChildItem(this,'+rs[i].PRICE+',\''+rs[i].NOM+'\',\''+rs[i].DENOM+'\',\''+rs[i].DSC+'\','+i+')" id="itemChildId'+i+'" >'+
                                          '<table width="100%" style="margin-left:5px;background-color:transparent;">'+
                                              '<tr>'+
                                                  '<td width="1%">'+
                                                      '<div class="image-item-prd">'+
                                                          '<img class="img-pulsa" src="'+rs[i].IMG_FILE_NAME+'" >'+
                                                      '</div>'+
                                                  '</td>'+
                                                  '<td width="25%"><span style="color:#696969; font-weight:bold;font-size:16px;">'+rs[i].SHORT_DSC +
                                                  '</span><br><div style="font-size:12px;margin-top:2px">'+rs[i].DSC+'</div></td>'+
                                                  '<td width="5%" style="text-align:right;padding-right:10px"><font style="color:rgb(0,48,127);font-size:14px;font-weight:bold;">Rp. '+numberWithCommas(rs[i].PRICE)+'</font></td>'+
                                                  // <button id="btn-bayar" class="button-payment right hidden">Kirim</button>
                                              '<tr>'+
                                          '</table>'+
                                         '</div>';
                      }
                      if(rs.length>0){
                          isExist = 1;
                          // labelNom.classList.remove("hidden");
                          // labelNom.classList.add("show");
                          // logoOperator.innerHTML = '<img class="img-operator" alt="No img" src="'+rs[0].IMG_FILE_NAME+'">'
                      }else{
                          isExist = 0;
                          productItem += "<div>Produk tidak tersedia.</div>";
                          // labelAlert.style.display = "block";
                          // labelAlert.innerHTML = "* Tidak ada produk untuk nomor/id yang anda input";
                      }
                      divParent2.innerHTML = productItem;
                      //console.log(rs);

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

          function selectionChildItem(data,price,kdProduk,denom,dsc,index){
            gettingBalance();

            var dataSelected = dataProducts[index];

            modal.style.display = "block";
              // $('#input-pin').focus();
              ckNoHp.value = "";
              inputPin.value = "";
              ckNoHp.focus();
            // labelNom.classList.remove("hidden");
            // labelNom.classList.add("show");
              hargaProduk = price;
              kodeProduk = kdProduk;
              ckKodeProduk.innerHTML = kdProduk;
              ckNom.innerHTML = denom;
              ckKeterangan.innerHTML = dataSelected.SHORT_DSC;
              ckHarga.innerHTML = "Rp "+numberWithCommas(dataSelected.PRICE);
              idChildTemp = data.id;
              console.log(idChildTemp);
              var selected = document.getElementById(idChildTemp);
              if(selected.className == "product-name nominal-selected"){
                  document.getElementById(idChildTemp).classList.remove("nominal-selected");
                  btnBayar.classList.remove("show");
                  btnBayar.classList.add("hidden");
                  // priceText.innerHTML = "";

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
                  // btnBayar.classList.remove("hidden");
                  // btnBayar.classList.add("show");
              }

              oldIdChildSelected = idChildTemp;
              // priceText.innerHTML = "Rp "+numberWithCommas(price);
              // ckHarga.innerHTML   = "Rp "+numberWithCommas(price);
              ckKeterangan.innerHTML = dsc;
              // window.scrollTo(top);
          }


          var oldIdSelected = "";



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



            var modal = document.getElementById("modal");

            // btnBayar.onclick = function() {
            //     ckNoHp.innerHTML = inputNoTujuan.value;
            //     modal.style.display = "block";
            //     inputPin.focus();
            //     gettingBalance();
            //     inputPin.value= "";
            // }

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
                // document.getElementById("input-no-tujuan").focus();
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

            ckNoHp.onkeyup = function(event){
                if (event.keyCode === 13) {
                    inputPin.focus();
                }
            }

            var cu = "";
            function kirimTransaksi(){
                //alertToast.style.display = "none";
                $("#sukses_msg").hide();
                noTujuan = ckNoHp.value;
                pinTransaksi = inputPin.value;
                if(noTujuan == ""){
                    // document.body.scrollTop = 0;
                    ckNoHp.focus();
                    // alertToast.style.display = "block";
                    // alertToastText.innerHTML = "PIN Transaksi harus diisi.";
                    $("#sukses_msg").fadeIn();
                    $("#sukses_show").html("No Tujuan harus diisi!");
                    return;
                }
                if(pinTransaksi == ""){
                    // document.body.scrollTop = 0;
                    inputPin.focus();
                    // alertToast.style.display = "block";
                    // alertToastText.innerHTML = "PIN Transaksi harus diisi.";

                    $("#sukses_msg").fadeIn();
                    $("#sukses_show").html("PIN Transaksi harus diisi");
                    return;
                }
                //alertToast.style.display = "none";
                $("#sukses_msg").hide();
                loadingTransaction.style.display = "block";

                var text = kodeProduk + '.' + noTujuan + '.' + pinTransaksi + inputRO.value;
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
                        // document.body.scrollTop = 0;

                        // alertToast.style.display = "block";
                        // alertToastText.innerHTML = rs.Rows[0].MESSAGE.replace(/([|])/g,'<br>');
                        $("#sukses_msg").fadeIn();
                        $("#sukses_show").html(rs.Rows[0].MESSAGE.replace(/([|])/g,'<br>'));
                        // document.body.scrollTop = 0;

                        if(rs.Rows[0].RC == "00"){
                          $('#modal').hide(100);
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
                        // alertToast.style.display = "block";
                        // alertToastText.innerHTML = "Koneksi Gagal";
                        $("#sukses_msg").hide();
                        $("#sukses_show").html("Koneksi Gagal");
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
                var h = sha1(messageid + $('#checkout-nohp').val() + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);
                $.ajax({
                        type: "POST",
                        url:  "<?=base_url(); ?>" + "cetakstruk/carimessageid",
                        data: JSON.stringify({messageid:messageid ,key: $('#checkout-nohp').val(), store_id : "<?=$this->session->userdata('store_id')?>", uname : '<?=$this->session->userdata('username')?>', t:t,h:h}),
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
            // inputUbahHarga.onkeyup = function(event){
            //     if (event.keyCode === 13) {
            //         printResultResp.AMOUNT = $('#input-ubah-harga').val();;
            //         printView(printResultResp);
            //         $('#box-ubah-harga').hide();
            //     }
            // }
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

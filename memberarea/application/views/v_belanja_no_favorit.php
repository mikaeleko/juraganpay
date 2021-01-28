<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style>
            label{
                font-family:segoe UI;
            }
            .activity-inquiry{
                width:50%;height:400px;;
                animation-duration: 0.1s;
                animation-name:activityShow;
                position:absolute;
                z-index:1;
                display:none;
                background-color:#1b1e20b0;
            }
            .activity-inquiry-bpjs{
                width:50%;height:400px;;
                animation-duration: 0.1s;
                animation-name:activityShow;
                position:absolute;
                z-index:1;
                display:none;
                background-color:#1b1e20b0;
            }
            .activity-pre-request{
                width:50%;height:400px;;
                animation-duration: 0.1s;
                animation-name:activityShow;
                position:absolute;
                z-index:2;
                display:none;
                background-color:#1b1e20b0;
            }
            .activity-print{
                width:50%;height:400px;;
                animation-duration: 0.1s;
                animation-name:activityShow;
                position:absolute;
                z-index:3;
                display:none;
                background-color:#1b1e20b0;
            }
            .tool-bar{
                background-color:#00afe9; color:white; padding:10px;font-family:segoe UI; align-content: center; display: flex;
            }
            .back-activity{
                width:20px;height:20px;cursor:pointer;
                background-color: rgb(245, 249, 250);
                border-radius:4px;
            }
            .back-activity:hover{
                background-color:rgb(215, 239, 244);
                border-radius:5px;
            }
            .activity-content{
                padding:10px; overflow:auto;background-color:#d0e6f7;
            }
            .button-cek-tagihan{
                padding:10px;padding-left:30px;padding-right:30px;border-style:none;background-color:#fd6326;color:white;
                border-radius:5px;font-family:segoe UI;font-size:15px;
                float:right;
                outline:none;
            }
            .button-cek-tagihan:hover{
                background-color:#eb551a;
            }
            .button-cek-tagihan:active{
                background-color:#fc5412;
            }
            .button-print{
                right:10;position:absolute;padding:2px;background-color:white;border-radius:4px;padding-left:20;padding-right:20;
                box-shadow:1px 1px 1px 1px #ccc
            }
            .button-print:hover{
                background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 23%, rgba(246,246,246,1) 38%, rgba(246,246,246,1) 55%, rgba(246,246,246,1) 63%, rgba(246,246,246,1) 64%, rgba(246,246,246,1) 69%, rgba(246,246,246,1) 69%, rgba(142,147,153,1) 99%, rgba(142,147,153,1) 100%);
                cursor:pointer;
            }
            .button-print:active{
                background-color:white;
                box-shadow:0px 0px 0px 0px #ccc;
            }
            @keyframes activityShow {
                from {opacity: 0;width:0px;}
                to {opacity: 1;width:50%;}
            }
        </style>
    </head>
    <body>
        <div class="container">
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
                    <div align="center">
                        <div id="loading-transaction" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                        <table>
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
                                <td>Sisa Saldo</td><td>:</td><td><span id="sisa-saldo"></span></td>
                            </tr>
                        </table>
                        <input id="input-pin" type="password" style="font-familiy:Sogeo UI;font-size:18px;" placeholder="Masukan PIN"><button id="btn-kirim" class="button">KIRIM</button>
                    </div>
                    <div>
                        <button id="btn-tutup" class="button">kembali</button>
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
                        <?php $this->load->view('v_belanja_banner');?>
                        <div class="container-belanja smooth">
                            <div class="row">
                                <div class="col-desk-12">
                                    <div class="tool-bar" style="margin-top:20px;margin-bottom:5px;box-shadow: 0px 2px 2px 0px #ccc;position:relative">
                                        <img class="back-activity" style="width:40px;height:40px;" title="Kembali" onclick="javascript:window.history.back()" src="<?php echo base_url() ?>images/asset/left.svg">
                                        <span id="title-activity-payment" style="font-size:20px;position:absolute;margin-left:45px;top:15px;">Nomor Favorit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-desk-12">
                                    <div>
                                        <!-- <h3 style="text-align:center;">Nomor Favorit</h3> -->
                                        <input maxlength="25" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="nama" type="text" class="form-input-text" placeholder="Masukan Nama">
                                        <input onkeyup="onKeyUpNomor()" maxlength="25" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="nomor" type="number" class="form-input-text" placeholder="Masukan Nomor">

                                        <button class="button" id="btn-add" style="visibility: visible" onclick="save()"> Tambahkan </button>
                                        <button class="button" id="btn-simpan" style="visibility: hidden" onclick="update()"> Simpan </button>
                                        <br>
                                        <div id="list">
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
        <script>

            var nama = document.getElementById("nama");
            var nomor = document.getElementById("nomor");
            var btnSimpan = document.getElementById("btn-simpan");
            var btnAdd = document.getElementById("btn-add");
            var indexubah = "";
            function listNoFavorit(){
                var list = document.getElementById("list");
                var retrievedObject = localStorage.getItem('favoriteNumber');

                var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
                var content = "";
                for (var i = (dataExisting.length-1); i >= 0; i--){
                    content += '<div style="position:relative;font-family:segoe UI; box-shadow:1px 1px px 1px #ccc; background-color:#e9e9e9;padding:4px;margin-bottom:2px;padding-left:10px">'+
                                    '<span style="font-weight:600">'+dataExisting[i].nama+'</span><br>'+
                                    '<span>'+dataExisting[i].nomor+'</span>'+
                                    '<span style="float:right;position:absolute;top:30%;right:80px;"><a href="#" onclick="ubah('+i+')" style="color:#707070;">Ubah</a></span>'+
                                    '<span style="float:right;position:absolute;top:30%;right:20px;"><a href="#" onclick="deleteByIndex('+i+')" style="color:#707070;">Hapus</a></span>'+
                                '</div>';
                }
                list.innerHTML = content;
                nama.value = "";
                nomor.value = "";
            }

            function deleteByIndex(index){
                var retrievedObject = localStorage.getItem('favoriteNumber');
                var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
                var dataAfter = [];
                for(var i=0;i<dataExisting.length;i++){
                    if(i == index){
                        continue;
                    }
                    dataAfter.push({ 'nama': dataExisting[i].nama, 'nomor': dataExisting[i].nomor });
                }
                localStorage.setItem('favoriteNumber', JSON.stringify(dataAfter));
                listNoFavorit();
            }

            listNoFavorit();

            function save(){

                if(nama.value == ""){
                    nama.focus();
                    return;
                }
                if(nomor.value == ""){
                    nomor.focus();
                    return;
                }
                var retrievedObject = localStorage.getItem('favoriteNumber');
                var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
                var object = { 'nama': nama.value, 'nomor': nomor.value };
                dataExisting.push(object);

                localStorage.setItem('favoriteNumber', JSON.stringify(dataExisting));
                
                listNoFavorit();
            }

            function onKeyUpNomor(){
                if (event.keyCode === 13) {
                    console.log(btnAdd.style.display);
                    if(btnAdd.style.visibility == "visible"){
                        save();
                        nama.focus();
                    }else{
                        update()
                    }
                }
            }

            function ubah(i){
                indexubah = i;
                var retrievedObject = localStorage.getItem('favoriteNumber');
                var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
                nama.value = dataExisting[i].nama;
                nomor.value = dataExisting[i].nomor;
                btnSimpan.style.visibility = "visible";
                btnAdd.style.visibility = "hidden";
                btnAdd.style.display = "none";
            }

            function update(){
                var retrievedObject = localStorage.getItem('favoriteNumber');
                var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
                for(var i=0;i<dataExisting.length;i++){
                    if(i == indexubah){
                        dataExisting[i].nama = nama.value;
                        dataExisting[i].nomor = nomor.value;
                    }
                }
                localStorage.setItem('favoriteNumber', JSON.stringify(dataExisting));
                btnSimpan.style.visibility = "hidden";
                btnAdd.style.visibility = "visible";
                btnAdd.style.display = "inline";
                listNoFavorit();
            }
            listNoFavorit();
        </script>
        <script src="<?php echo base_url() ?>assets/js/belanja_script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/carousel.js"></script>
    </body>
</html>

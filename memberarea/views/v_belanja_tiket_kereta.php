<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE." - Tiket Pesawat" ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
        <style>
            .value-checkout{
                text-align:right;
            }
            html {
                scroll-behavior: smooth;
            }
            body{
              font-family: segoe UI;
            }

            .list-pulsa{
              padding-left:0px;margin-left:0px;cursor:pointer;padding:2px;box-shadow: 1px 1px 3px #888888;
            }
            .list-pulsa:hover{
              background-color: rgba(0,175,233,0.1) !IMPORTANT;
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

            .slidecontainer {
              width: 90%;
            }

            .slider {
              -webkit-appearance: none;
              width: 100%;
              height: 3px;
              background: #00AFE9;
              outline: none;
              opacity: 0.7;
              -webkit-transition: .2s;
              transition: opacity .2s;
            }

            .slider:hover {
              opacity: 1;
            }

            .slider::-webkit-slider-thumb {
              -webkit-appearance: none;
              appearance: none;
              width: 10px;
              height: 10px;
              border-radius:15px;
              background: #00307F;
              cursor: pointer;
            }

            .slider::-moz-range-thumb {
              width: 10px;
              height: 10px;
              border-radius:15px;
              background: #00307F;
              cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container smooth">
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
                                <td>Nomor Hp</td><td>:</td><td><div class="value-checkout"><input style="border-width:1;border-color: #d0d0d0;border-radius: 5px;margin-right: 0px;text-align:right;padding:5px;font-size:16px;font-family:Segoe UI;cursor:pointer" id="checkout-nohp" type="text" ><div></td>
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
                            <span style="font-weight:300;">RO (Repeat Order)</span>
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
                            <div>
                                <input id="input-pin" type="password" class="form-input-password" style="font-familiy:Sogeo UI;font-size:18px;margin-right:0" placeholder="Masukan PIN"><br>
                                <button id="btn-tutup" class="button">kembali</button>
                                <button id="btn-kirim" class="button">KIRIM</button>
                            </div>
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
                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                  <div class="col-desk-10">
                    <div class="body-right-container">
                      <div style="font-size:17px;font-weight:bold;opacity:0.6">
                        <span>1. Pesan</span><span> > </span><span>2. Pembayaran </span></span><span> > </span><span>3. Selesai </span>
                      </div>
                      <div class="box-menu-tiket">
                        <!--Page1 -->
                         <div id="page1" style="display:block;">
                          <div class="row">
                            <div class="col-desk-12">
                              <div class="box-inner-tiket">
                                <span>Dari</span><br>
                                <div class="div-form-tiket">
                                  <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/takein.png" alt="">
                                  <select id="dari" name="">
                                    <option value="">
                                      Nama Kota
                                    </option>
                                    <option value="">
                                      Nama Kota
                                    </option>
                                  </select>
                                </div>
                              </div>

                              <div class="icon-swap">
                                <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/swap.png" alt="">
                              </div>

                              <div class="box-inner-tiket">
                                <span>Tujuan</span><br>
                                <div class="div-form-tiket">
                                  <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/takeoff.png" alt="">
                                  <select id="tujuan" name="tujuan">
                                    <option value="">
                                      Nama Kota
                                    </option>
                                    <option value="">
                                      Nama Kota
                                    </option>
                                  </select>
                                </div>
                              </div>

                              <div class="box-inner-tiket" >
                                <span>Berangkat</span><br>
                                <div class="div-form-tiket">
                                  <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/date.png" alt="">
                                  <input type="date" id="berangkat_date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                              </div>

                              <div class="box-inner-tiket" >
                                <span>Pulang</span><br>
                                <div class="div-form-tiket">
                                  <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/date.png" alt="">
                                  <input type="date" id="pulang_date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                              </div>

                              <div class="box-inner-tiket">
                                <span>Penumpang & Kelas Kabin</span><br>
                                <div id="insert-penumpang" class="div-form-tiket" style="cursor:pointer;">
                                  <p>
                                    <span id="text-jmlpenumpang-bayi" style="margin:0;text-align:left;">0</span>
                                    <span id="text-usia-bayi" style="margin:0;text-align:left; display:none;">  </span>
                                    <span id="text-jmlpenumpang-anak" style="margin:0;text-align:left; display:none;" ></span>
                                    <span id="text-usia-anak" style="margin:0;text-align:left; display:none;">  </span>
                                    <span id="text-jmlpenumpang-dewasa" style="margin:0;text-align:left;  display:none;"></span>
                                    <span id="text-usia-dewasa" style="margin:0;text-align:left; display:none;"> </span>
                                    <span id="text-kelas-penumpang" style="margin:0;text-align:left;"></span>
                                  </p>

                                  <input type="hidden" id="input-usia-anak">
                                  <input type="hidden" id="input-usia-bayi">
                                  <input type="hidden" id="input-usia-dewasa">

                                  <input type="hidden" id="input-jmlpenumpang-bayi">
                                  <input type="hidden" id="input-jmlpenumpang-anak">
                                  <input type="hidden" id="input-jmlpenumpang-dewasa">

                                  <input type="hidden" id="input-kelas-penumpang" value="">
                                </div>

                                <div class="div-form-penumpang" id="div-form-penumpang" style="display:none;">
                                  <div class="box-penumpang">
                                    <div class="row">
                                      <div class="col-desk-8 col-md-8 col-xs-8">
                                        <div class="row">
                                          <div class="col-desk-12">
                                            <div style="margin-bottom:8px;">
                                              <span>Penumpang</span>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row" >
                                            <div class="col-desk-5 col-md-5 col-xs-5">
                                              <div style="margin-bottom:8px;text-align:left;">
                                               <span style="">Dewasa</span> <br> <span style="font-size:9px;">Lebih dari 12 tahun</span>
                                              </div>
                                            </div>
                                            <div class="col-desk-2 col-md-2 col-xs-2">
                                              <div class="adjust" id="min-dewasa" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                                -
                                              </div>
                                            </div>
                                            <div class="col-desk-2 col-md-2 col-xs-2">
                                              <div style="margin-bottom:8px;margin-top:8px;">
                                               <input id="input-dewasa" type="text" value="0" style="width:30px;text-align:center;">
                                              </div>
                                            </div>
                                            <div class="col-desk-2 col-md-2 col-xs-2">
                                              <div class="adjust" id="plus-dewasa" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;width:15px;line-height: 15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                                  +
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-desk-5 col-md-5 col-xs-5">
                                            <div style="margin-bottom:8px;text-align:left;">
                                             <span >Anak</span> <br> <span style="font-size:9px;">2 - 12 tahun</span>
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div class="adjust" id="min-anak" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                              -
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div style="margin-bottom:8px;margin-top:8px;">
                                             <input id="input-anak" type="text" value="0" style="width:30px;text-align:center;">
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div class="adjust" id="plus-anak" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;width:15px;line-height: 15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                                +
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-desk-5 col-md-5 col-xs-5">
                                            <div style="margin-bottom:8px;text-align:left;">
                                             <span >Bayi</span> <br> <span style="font-size:9px;">Dibawah 2 Tahun</span>
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div class="adjust" id="min-bayi" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                              -
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div style="margin-bottom:8px;margin-top:8px;">
                                             <input id="input-bayi" type="text" value="0" style="width:30px;text-align:center;">
                                            </div>
                                          </div>
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div class="adjust" id="plus-bayi" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;width:15px;line-height: 15px;min-height:15px;margin-bottom:8px;margin-top:8px;background-color:#00AFE9;border:1px solid #00AFE9;border-radius:15px;">
                                                +
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-desk-4 col-md-4 col-xs-4">
                                        <div class="row">
                                          <div class="col-desk-12">
                                            <div style="margin-bottom:8px;">
                                              <span>Kelas Kabin</span>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div id="ekonomi" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:12px;min-height:12px;margin-bottom:8px;margin-top:8px;border:1px solid #00AFE9;border-radius:12px;">
                                            </div>
                                          </div>
                                          <div class="col-desk-6 col-md-6 col-xs-6">
                                            <span style="text-align:left;margin-left:18px;top:2px;position:relative;">Ekonomi</span>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div id="bisnis" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:12px;min-height:12px;margin-bottom:8px;margin-top:8px;border:1px solid #00AFE9;border-radius:12px;">
                                            </div>
                                          </div>
                                          <div class="col-desk-6 col-md-6 col-xs-6">
                                            <span style="text-align:left;margin-left:18px;top:2px;position:relative;">Bisnis</span>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-desk-2 col-md-2 col-xs-2">
                                            <div id="utama" style="cursor:pointer;margin-left:12px;margin-right:12px;color:white;text-align: center;font-size:10px;line-height: 15px;width:12px;min-height:12px;margin-bottom:8px;margin-top:8px;border:1px solid #00AFE9;border-radius:12px;">
                                            </div>
                                          </div>
                                          <div class="col-desk-6 col-md-6 col-xs-6">
                                            <span style="text-align:left;margin-left:18px;top:2px;position:relative;">Utama</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-desk-8 col-md4 col-xs-4 hidden">
                                        ...
                                      </div>
                                      <div class="col-desk-4 col-md4 col-xs-4">
                                        <button style="cursor:pointer;" id="selesai" type="button" class="button-primary-tiket" name="button">Selesai</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-desk-12">
                              <button id="submit-cari" class="submit-cari" type="button" name="" value=""> Cari Tiket </button>
                            </div>
                          </div>
                         </div>
                        <!--Enf Of Page1 -->

                        <!--Page2 pilih -->
                         <div id="page2" style="display:block;">
                          <div class="row ">
                            <div class="col-desk-10">
                              <div class="row">
                                <div class="col-desk-12">
                                  <div class="">
                                    <img src="<?php echo base_url() ?>/assets/img/AssetKereta/train.png" alt="" style="width:40px;height:40px;margin:25px 0 12px 25px;justify:center;float:left;">
                                    <span style="margin:0 auto;vertical-align:middle;text-align:justify;font-family:Segoe UI;font-style:normal;font-size:18px;position:absolute;margin-top:35px;margin-left:5px;">Pilih Keberangkatan</span>
                                  </div>
                                </div>

                                <div class="col-desk-3">
                                  <div style="margin:12px 12px 12px 25px;">
                                    <span>Keberangkatan -> Tujuan</span>
                                  </div>
                                </div>
                                <div class="col-desk-3">
                                  <div style="margin:12px 12px 12px 25px;">
                                    <p style="margin-top:-38px;"><span style="margin-right: 5px;color:#707070;font-size:50px;font-weight:bold;">.</span> <span>Tanggal</span></p>
                                  </div>
                                </div>

                                <div class="col-desk-3">
                                  <div style="margin:12px 12px 12px 25px;">
                                    <p style="margin-top:-38px;"><span style="margin-right: 5px;color:#707070;font-size:50px;font-weight:bold;">.</span> <span>Jumlah Penumpang</span></p>
                                  </div>
                                </div>
                                <div class="col-desk-3">
                                  <div style="margin:12px 12px 12px 25px;">
                                    <p style="margin-top:-38px;"><span style="margin-right: 5px;color:#707070;font-size:50px;font-weight:bold;">.</span> <span>Kelas Kabin</span></p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-desk-2">
                            <div class="row">
                              <div class="col-desk-12 col-md-12 col-xs-12">
                                <div style="margin:55px 12px 12px 25px;cursor:pointer;">
                                  <span style="vertical-align:middle;margin:auto;text-align:center;display:block;line-height:20px;">Ubah Pencarian</span>
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                         </div>
                        <!--End Of Page2 pilih-->

                      </div>
                    </div>

                  </div>
                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                </div>

                <!-- page3 filter-->
                <div id="page3" style="display:block;">
                 <div class="row">
                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                  <div class="col-desk-2">
                    <div class="row">
                      <div class="col-desk-6">
                        <div style="padding:0 20px 0px 20px;float:left;">
                          <span style="color:#000;font-size:18px;">Filter</span>
                        </div>
                      </div>
                      <div class="col-desk-6">
                        <div style="padding: 0 0 20px 0;float:right;">
                          <span style="color:#00AFE9;font-size:18px;">RESET</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-desk-7">
                      <div style="padding-left:40px;">
                        <span style="color:#000;font-size:18px;">Menampilkan Jumlah Keberangkatan Terbaik</span>
                      </div>
                  </div>
                  <div class="col-desk-1">
                    <div style="padding-right:20px;">
                      <span style="color:#000;font-size:18px;float:right;padding-right:20px;">Urutkan</span>
                    </div>
                  </div>
                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                 </div>


                 <div class="row ">
                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                  <div class="col-desk-2" >
                    <div class="box-menu-tiket" style="margin:0;margin-bottom:40px;">
                      <div class="main-area list-menu" >
                        <div id="kelas">
                          <div class="item-category">
                            <div class="item-category">
                              <span> Kelas </span>
                              <img src="<?php echo base_url() ?>/assets/img/AssetKereta/dropdown.png" alt="" style="margin:10px;justify:center;float:right;width:12px;height:8px;">
                            </div>
                          </div>
                        </div>
                            <div id="list-transit" style="display:none;">
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> Ekonomi </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> Bisnis </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> Eksekutif </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                            </div>

                        <div id="waktu" class="waktu" >
                          <div class="item-category">
                            <div class="item-category">
                                <span> Waktu </span>
                                <img src="<?php echo base_url() ?>/assets/img/AssetKereta/dropdown.png" alt="" style="margin:10px;justify:center;float:right;width:12px;height:8px;">
                            </div>
                          </div>
                        </div>
                            <div id="list-waktu" style="display:none;">
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> 00.00 - 06.00 </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> 06.00 - 12.00 </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> 12.00 - 18.00 </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <span> 18.00 - 24.00 </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                            </div>

                        <div id="namakereta">
                          <div class="item-category">
                            <div class="item-category">
                                <span> Nama Kereta </span>
                                <img src="<?php echo base_url() ?>/assets/img/AssetKereta/dropdown.png" alt="" style="margin:10px;justify:center;float:right;width:12px;height:8px;">
                            </div>
                          </div>
                        </div>
                            <div id="list-kereta" style="display:none;">
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <img src="<?php echo base_url() ?>/assets/img/AssetKereta/LogoMaskapai/airasia.png" alt="">
                                    <span class="kereta"> Serayu </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>
                              <div class="item-inner-category">
                                <div class="item-inner-category">
                                    <img src="<?php echo base_url() ?>/assets/img/AssetPesawat/LogoMaskapai/airchina.png" alt="" >
                                    <span class="kereta"> Argo Perahyangan </span>
                                    <div style="border:0.5px solid #707070;margin:10px;justify:center;float:right;width:10px;height:10px;background-color:#fff;cursor:pointer;"></div>
                                </div>
                              </div>

                            </div>

                      </div>
                    </div>

                  </div>

                  <div class="col-desk-8">
                    <div class="body-right-container" style="height:auto;">
                      <div class="box-menu-tiket" style="margin-top:0px;margin-bottom:40px;">
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-12">
                              <span style="color:#00AFE9;">Nama Kereta</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-desk-2">
                            <div style="width:70px;height:20px;padding:20px;">
                              <img src="<?php echo base_url() ?>/assets/img/AssetKereta/LogoKereta/airasia.png" alt="" style="justify:center;width:60px;height:30px;display:block;margin:auto;vertical-align:middle;text-align:center;">
                            </div>
                          </div>
                          <div class="col-desk-4">
                            <div style="margin-top:20px;justify:center;vertical-align:middle;text-align:center;">
                              <span> D.Time From </span>
                              <img src="<?php echo base_url() ?>/assets/img/AssetKereta/line_29.png" alt="" style="justify:center;vertical-align:middle;text-align:center;">
                              <img src="<?php echo base_url() ?>/assets/img/AssetKereta/trainmini-right.png" alt="" style="width:16px;height:10px;justify:center;vertical-align:middle;text-align:center;">
                              <span> A.Time To </span>
                            </div>
                          </div>
                          <div class="col-desk-4">
                            <div style="width:70px;height:20px;padding:20px;">
                              <img src="<?php echo base_url() ?>/assets/img/AssetKereta/addbagasi.png" alt="" style="width:25px;height:28px;display:block;margin:auto;vertical-align:middle;text-align:left;">
                            </div>
                          </div>
                          <div class="col-desk-2">
                            <div style="width:auto;height:20px;padding:20px;">
                              <span>IDR Rp.12345</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-desk-2 hidden">
                            hide
                          </div>
                          <div class="col-desk-8">
                            <div style="width:auto;height:20px;padding:20px 5px 5px 0px;">
                              <span>Detail Penerbangan</span><span>Detail Harga</span><span>Kebijakan</span>
                            </div>
                          </div>
                          <div class="col-desk-2">
                            <div style="width:70px;height:20px;padding:20px;">
                              <button class="button-primary-tiket" type="button" name="button">Beli</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-desk-1 hidden">
                    hide
                  </div>
                 </div>
                </div>
                <!-- end of page3 filter-->

                <!-- page4 form penumpang-->
                <div id="page4" style="display:block;">
                 <div class="row ">
                  <div class="col-desk-1 hidden">
                    hide
                  </div>

                  <div class="col-desk-6 col-md-6 col-xs-6" >
                    <div class="box-menu-tiket" style="margin:0;">
                      <div class="main-area list-menu" >
                        <div id="detail-pesan">
                          <div class="item-category nobottomline">

                            <form class="" action="index.html" method="post">
                              <div class="row">
                                <div class="col-desk-1 col-md-1 col-xs-1">
                                  <div style="margin-bottom:17px;">
                                    <img src="<?= base_url() ?>assets/img/assetpesawat/formicon.png" alt="">
                                  </div>
                                </div>
                                <div class="col-desk-11 col-md-11 col-xs-11">
                                  <div style="margin-bottom:15px;">
                                    <span style="text-align: left; left: 80px;top: 25px;">Detail Pemesanan</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-2 col-md-2 col-xs-2">
                                  <div style="margin-top:10px;margin-bottom:10px;">
                                    <select class="" name="">
                                      <option value="">Title</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-desk-10 col-md-4 col-xs-2">
                                  <div style="margin-top:10px;margin-bottom:10px;margin-left:80px;">
                                    <input class="col-desk-12 col-md-12 col-xs-12" id="nama" type="text" name="" value="" placeholder="Nama Lengkap">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-12 col-md-12 col-xs-12">
                                  <div style="margin-top:10px;margin-bottom:65px;">
                                    <input class="col-desk-12 col-md-12 col-xs-12" id="email" type="text" name="" value="" placeholder="Alamat Email">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-2 col-md-2 col-xs-2">
                                  <div style="margin-bottom:10px;">
                                    <select class="" name="">
                                      <option value="">Kode Negara</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-desk-10 col-md-10 col-xs-10">
                                  <div style="margin-bottom:10px;margin-left:80px;">
                                    <input class="col-desk-12 col-md-12 col-xs-12" id="nama" type="text" name="" value="" placeholder="Nomor Telepon">
                                  </div>
                                </div>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-desk-4 col-md-4 col-xs-4">
                    <div class="body-right-container" style="height:auto;">
                      <div class="box-menu-tiket" style="margin-top:0;margin-bottom:40px;">

                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-12">
                              <span>Penerbangan</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-2">
                              <span>From</span>
                            </div>
                            <div class="col-desk-2">
                              <span>To</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-2">
                              <span>Logo</span>
                            </div>
                            <div class="col-desk-4">
                              <span>From-to</span>
                            </div>
                            <div class="col-desk-4">
                              <span>Date</span>
                            </div>
                            <div class="col-desk-2">
                              <span>Time</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-12">
                              <span>Kebjikan Tiket</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-1 col-md-1 col-xs-1">
                              <img src="<?= base_url() ?>assets/img/assetpesawat/refund.png" alt="">
                            </div>
                            <div class="col-desk-11">
                              <span>Bisa Refund</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-1 col-md-1 col-xs-1">
                              <img src="<?= base_url() ?>assets/img/assetpesawat/reschedule.png" alt="">
                            </div>
                            <div class="col-desk-11">
                              <span>Bisa Reschedule</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:5px;">
                            <hr>
                          </div>
                        </div>
                        <div class="row">
                          <div style="padding:10px;">
                            <div class="col-desk-8 col-md-8 col-xs-8">
                              <span>Total Pembayaran</span>
                            </div>
                            <div class="col-desk-4 col-md-4 col-xs-4">
                              <span style="float:right;color:#00AFE9;">Pembayaran</span>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>

                  <div class="col-desk-1 col-md-1 col-xs-1 hidden">
                    hide
                  </div>
                 </div>

                 <div class="row">
                  <div class="col-desk-1 col-md-1 col-xs-1 hidden">
                    hide
                  </div>
                  <div class="col-desk-6 col-md-6 col-xs-6">
                    <div class="box-menu-tiket" style="margin-bottom:10px;margin-top:-25px;">
                      <div class="main-area list-menu" >
                        <div id="detail-pesan">
                          <div class="item-category nobottomline">

                            <form class="" action="index.html" method="post">
                              <div class="row">
                                <div class="col-desk-1 col-md-1 col-xs-1">
                                  <div style="margin-top:15px;margin-bottom:10px;">
                                    <img src="<?= base_url() ?>assets/img/assetpesawat/biography.png" alt="">
                                  </div>
                                </div>
                                <div class="col-desk-11 col-md-11 col-xs-11">
                                  <div style="margin-top:10px;margin-bottom:10px;">
                                    <span style="text-align: left; left: 80px;top: 40px;">Detail Penumpang</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-2">
                                  <div style="margin-top:10px;margin-bottom:10px;">
                                    <select id="title-penumpang" class="" name="">
                                      <option value="">Title</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-desk-10 col-md-10 col-xs-10">
                                  <div style="margin-top:10px;margin-bottom:10px;margin-left:80px;">
                                    <input class="col-desk-12 col-md-12 col-xs-12" id="nama" type="text" name="" value="" placeholder="Nama Lengkap">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-12 col-md-12 col-xs-12">
                                  <div style="margin-top:10px;margin-bottom:52px;">
                                    <input class="col-desk-12 col-md-12 col-xs-12" id="email" type="text" name="" value="" placeholder="Alamat Email">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-desk-2 col-md-2 col-xs-2">
                                  <div style="margin-top:10px;margin-bottom:10px;">
                                    <select class="" name="">
                                      <option value="">Kewarganegaraan</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-desk-10 col-md-10 col-xs-10">
                                  <div style="margin-top:10px;margin-bottom:10px;margin-left:80px;">

                                  </div>
                                </div>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                 <div class="row ">
                  <div class="col-desk-1 hidden">
                    hide
                  </div>

                  <div class="col-desk-6 col-md-6 col-xs-6" >
                    <div class="box-menu-tiket" style="margin:0;">
                      <div class="main-area list-menu" >
                        <div id="detail-pesan">
                          <div class="item-category nobottomline">

                            <div class="row" >
                              <div class="col-desk-1 col-md-1 col-xs-1">
                                <div style="margin-bottom:20px;margin-top:10px;;">
                                 <img src="<?= base_url() ?>assets/img/assetpesawat/features.png" alt="">
                                </div>
                              </div>
                              <div class="col-desk-11 col-md-11 col-xs-11">
                                <div style="margin-top:15px;margin-bottom:20px;">
                                  <span style="text-align: left; left: 80px;top: 30px;">Fasilitas Extra</span>
                                </div>
                              </div>
                            </div>

                            <div class="row" >
                              <div class="col-desk-1 col-md-1 col-xs-1">
                                <div style="margin-bottom:20px;margin-top:10px;;">
                                 <img src="<?= base_url() ?>assets/img/assetpesawat/addbagasi.png" alt="">
                                </div>
                              </div>
                              <div class="col-desk-10 col-md-10 col-xs-10">
                                <div style="margin-top:15px;margin-bottom:20px;">
                                  <span style="text-align: left; left: 80px;top: 110px;">Bagasi</span>
                                </div>
                              </div>
                              <div class="col-desk-1">
                                <span style="top: 120px;color:#00AFE9;">BELI</span>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                 <div class="row ">
                  <div class="col-desk-3 hidden">
                    hide
                  </div>

                  <div class="col-desk-2" >
                    <div style="margin-bottom:10px;">
                      <button id="pilih-kursi" class="button-primary-bayar" type="button" name="button">PILIH KURSI</button>
                    </div>
                  </div>
                  <div class="col-desk-2" >
                    <div style="margin-bottom:10px;">
                      <button id="lanjut-bayar"class="button-primary-bayar" type="button" name="button">LANJUT PEMBAYARAN</button>
                    </div>
                  </div>

                 </div>
                </div>
                <!-- end of page4 form penumpang-->

                <!-- page5 gerbong-->
                <div id="page4" style="display:block;">
                 <div class="row ">
                  <div class="col-desk-1 hidden">
                    hide
                  </div>

                  <div class="col-desk-7 col-md-7 col-xs-7">
                    <div class="body-right-container" style="height:auto;">
                      <div class="box-menu-tiket" style="margin-top:0;margin-bottom:40px;">
                        <div class="row">
                            <div class="col-desk-12">
                              <div style="padding:10px;background-color:#fff;text-align:center;border-bottom:1px solid #707070;">
                              <span>Nama Gerbong</span>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-desk-8 hidden">
                            ...
                          </div>
                          <div class="col-desk-4">
                            <div style="padding:10px 0 0 10px;">
                            <span style="font-size:10px;">Gerbong/Kursi</span>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-desk-4 col-md-4 col-xs-4">
                            <div style="padding:10px;background-color:#fff;text-align:center;border-top:1px solid #707070;margin-top:56px;">
                            <span>Keterangan</span>
                            </div>
                          </div>
                          <div class="col-desk-2 col-md-2 col-xs-2">
                            <div style="font-size:12px;padding:10px;background-color:#fff;text-align:center;border-top:1px solid #707070;margin-top:56px;">
                            <span>Sedang dipilih</span>
                            </div>
                          </div>
                          <div class="col-desk-2 col-md-2 col-xs-2">
                            <div style="font-size:12px;padding:10px;background-color:#fff;text-align:center;border-top:1px solid #707070;margin-top:56px;">
                            <span>Tersedia</span>
                            </div>
                          </div>
                          <div class="col-desk-2 col-md-2 col-xs-2">
                            <div style="font-size:12px;padding:10px;background-color:#fff;text-align:center;border-top:1px solid #707070;margin-top:56px;">
                            <span>Pilihan anda</span>
                            </div>
                          </div>
                          <div class="col-desk-2 col-md-2 col-xs-2">
                            <div style="font-size:12px;padding:10px;background-color:#fff;text-align:center;border-top:1px solid #707070;margin-top:56px;">
                            <span>Terisi</span>
                            </div>
                          </div>
                        </div>



                      </div>

                    </div>
                  </div>

                  <div class="col-desk-3 col-md-3 col-xs-3">
                    <div class="body-right-container" style="height:auto;">
                      <div class="box-menu-tiket" style="margin-top:0;margin-bottom:40px;min-height:205px;">
                        <div class="row">
                            <div class="col-desk-12">
                              <div style="padding:10px;background-color:#fff;text-align:center;border-bottom:1px solid #707070;font-size:18px;">
                              <span >Penumpang</span>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-desk-9 hidden">
                            ...
                          </div>
                          <div class="col-desk-3">
                            <div style="padding:10px 0 0 10px;">
                            <span style="font-size:10px;">Gerbong/Kursi</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-desk-9">
                            <div style="padding:10px;font-size:14px;">
                            <span>1. Nama Penumpang</span>
                            </div>
                          </div>

                          <div class="col-desk-3">
                            <div style="padding:10px;font-size:14px;">
                            <span>Gerbong <span style="background-color:#2CC100;color:#fff;padding:2px;">4C</span></span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-desk-12">
                          <button style="margin-top:-27px;float:none;width:100%;" class="button-primary-bayar" type="button" name="button">LANJUT PEMBAYARAN</button>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="col-desk-1 col-md-1 col-xs-1 hidden">
                    hide
                  </div>

                 </div>




                 <div class="row">
                  <div class="col-desk-1 col-md-1 col-xs-1 hidden">
                    hide
                  </div>
                 </div>
                </div>
                <!-- end of page5 gerbong-->

                <!-- page6 final pembayaran-->
                <div id="page5" style="display:block;">
                 <div class="row ">
                  <div class="col-desk-4 col-md-4 col-xs-4 hidden">
                    hide
                  </div>

                  <div class="col-desk-4 col-md-4 col-xs-4">
                    <div class="body-right-container" style="height:auto;">
                      <div class="box-menu-tiket" style="margin-top:0;margin-bottom:40px;">

                        <div class="row">
                          <div style="padding:20px;margin-left:10px;">
                            <div class="col-desk-12">
                              <img style="width:60px;height:30px;margin:10px;;vertical-align:middle;"src="<?= base_url() ?>assets/img/assetpesawat/logomaskapai/airasia.png" alt="">
                              <span>Nama Maskapai</span>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div >
                            <div class="col-desk-2 col-md-2 col-xs-2">
                              <div class="">
                                <img style="width:20px;height:20px;margin-bottom:40px;display:block;margin:0 auto;"src="<?= base_url() ?>assets/img/assetpesawat/circle.png" alt="">
                                <hr style="transform: rotate(90deg); margin-bottom: 30px; margin-top: 30px; background-color: #000;">
                                <img style="width:20px;height:20px;margin-bottom:40px;display:block;margin:0 auto;"src="<?= base_url() ?>assets/img/assetpesawat/circle.png" alt="">
                              </div>
                            </div>
                            <div class="col-desk-10 col-md-10 col-xs-10">

                              <div class="row">
                                <div >
                                  <div class="col-desk-12 col-md-12 col-xs-12">
                                    <span style="margin-right:10px;font-size:10px;color:green;">Time</span> <span style="font-size:10px;">Date</span><br>
                                    <span style="font-size:20px;">Jakarta (CGK)</span><br>
                                    <span style="font-size:15px;opacity:0.5;">Soekarno Hatta</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div style="margin-bottom:10px;">
                                  <div class="col-desk-12 col-md-12 col-xs-12">
                                    <img style="width:15px;height:17px;line-height:10px;padding:2px;margin:0 auto;vertical-align:middle;"src="<?= base_url() ?>assets/img/assetpesawat/clock.png" alt="">
                                    <span style="opacity:0.5;">1 Jam 50 Menit</span>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div >
                                  <div class="col-desk-12 col-md-12 col-xs-12">
                                    <span style="margin-right:10px;font-size:10px;color:green;">Time</span> <span style="font-size:10px;">Date</span><br>
                                    <span style="font-size:20px;">Denpasar (DPS)</span><br>
                                    <span style="font-size:15px;opacity:0.5;">Ngurah Rai</span>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span>Dewasa 1x</span>
                            </div>
                            <div class="col-desk-6 col-md-6 col-xs-6 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;">Rp.657.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-5 col-md-5 col-xs-5">
                              <span>Biaya Fasilitas Tambahan</span>
                            </div>
                            <div class="col-desk-4 col-md-4 col-xs-4 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;">Rp.85.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span>Biaya Asuransi</span>
                            </div>
                            <div class="col-desk-6 col-md-6 col-xs-6 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;">Rp.40.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:2px;margin:0 20px 0 20px;">
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="font-size:20px;">Total Belanja</span>
                            </div>
                            <div class="col-desk-6 col-md-6 col-xs-6 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;font-size:20px;">Rp.40.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:2px;margin:0 20px 0 20px;">
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span>Saldo Metro Multipayment</span>
                            </div>
                            <div class="col-desk-6 col-md-6 col-xs-6 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;">Rp.1.800.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:2px;margin:0 20px 0 20px;">
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span>Sisa Saldo</span>
                            </div>
                            <div class="col-desk-6 col-md-6 col-xs-6 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <span style="float:right;color:red;">Rp.1.018.000</span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:5px;margin:0 20px 0 20px;">
                            <div class="col-desk-12col-md-12 col-xs-12">
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:10px;margin:0 20px 0 20px;">
                            <div class="col-desk-9 col-md-9 col-xs-9 hidden">
                              ...
                            </div>
                            <div class="col-desk-3 col-md-3 col-xs-3">
                              <div style="margin-top:5px;margin-bottom:10px;">
                                <input type="text" name="" value="" style="float:right;">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div style="padding:10px;margin:0 20px 0 20px;">
                            <div class="col-desk-12 col-md-12 col-xs-12">
                              <button type="button" class="button-primary-bayar col-desk-12" name="button">Bayar</button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>

                  <div class="col-desk-4 col-md-4 col-xs-4 hidden">
                    hide
                  </div>
                 </div>
                <div>
                <!-- end of page6 final pembayaran-->

                 <div class="row" >
                  <div class="col-desk-12">
                      <?php $this->load->view('v_belanja_banner');?>
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
        <script src="<?php echo base_url() ?>assets/js/modal.js"></script>
        <script>

            var divNavigation   = document.getElementById("navigation-feature");
            var divCaption   = document.getElementById("navigation-caption");
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
            var ckKeterangan = document.getElementById("checkout-keterangan");
            var ckHarga      = document.getElementById("checkout-harga");

            var saldoAwal   = document.getElementById("saldo-awal");
            var sisaSaldo   = document.getElementById("sisa-saldo");
            var inputRO     = document.getElementById("input-ro");
            var inputNoTujuan = document.getElementById("input-no-tujuan");
            var modal = document.getElementById("modal");
            var hargaProduk = 0;
            var hashtag      = "#<?=empty($this->input->get('category'))?'pulsa':$this->input->get('category');?>".toUpperCase();
            var dataProducts = [];
            var productItemChild   = "";
            var oldIdChildSelected = "";
            var idChildTemp  = "";
            var kodeProduk   = "";
            var pinTransaksi = "";
            var tujuan = "";
            var isExist = 0;


            function loadIcon(){
              var t = getDateTime();
              var h = sha1('<?=$this->session->userdata('username')?>' + "<?=$this->session->userdata('store_id')?>" + t);
              var iconItem = "";
                  icon ="";
                  caption ="";
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
                      } else {
                          c = cat;
                      }

                      var category = rs[i].NAME.replace('#','').toLowerCase();

                      iconItem += '<div><button title="'+c+'" onclick="redirectTo(\'' + '<?php echo base_url()?>' + 'belanja?category='+category+ '&producttype='+rs[i].PRODUCT_TYPE+'\')" class=" '+cls+' button-image color-white" >' +
                                  '<img class="image-inner" src="<?php echo HOST_API_IMAGE ?>get_img?file=icon_'+rs[i].NAME.substring(1).toLowerCase()+'.png " ' +
                                  '</button><br><span class="caption-menu">'+c+'</span>' ;


                    }

                    icon += ' <button title="TIKET PESAWAT" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja?category=pesawat' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_pesawat.png">'+
                            '<br><span class="caption-menu">TIKET PESAWAT</span></button>'+
                            ' <button title="TIKET KERETA" onclick="redirectTo(\'' + '<?=base_url()?>' + 'belanja?category=kereta' + ' \')" class="button-image color-white" ><img class="image-inner" src="<?=HOST_API_IMAGE?>get_img?file=icon_kereta.png">' +
                            '<br><span class="caption-menu">TIKET KERETA</span></button></div>';

                    divNavigation.innerHTML = iconItem + icon  ;

                }

              });
            }

            loadIcon();

            function fixdewasa(x,usia){

              document.getElementById("text-jmlpenumpang-dewasa").innerHTML = x;
              document.getElementById("text-usia-dewasa").innerHTML = usia;

            }
            function fixanak(x,usia){
              document.getElementById("text-jmlpenumpang-anak").innerHTML = x;
              document.getElementById("text-usia-anak").innerHTML = usia;

            }
            function fixbayi(x,usia){
              document.getElementById("text-jmlpenumpang-bayi").innerHTML = x;
              document.getElementById("text-usia-bayi").innerHTML = usia;
            }

            $("#insert-penumpang").click(function(){
              $("#div-form-penumpang").fadeToggle();
            });

            $("#min-dewasa").click(function(){
              bayi = document.getElementById("text-jmlpenumpang-bayi").innerHTML;
              anak = document.getElementById("text-usia-anak").innerHTML;
                var x = $("#input-dewasa").val();
                if(x > 0){
                  x --;
                  usia = "Dewasa, ";
                } else if(x == 0){
                  usia ="";
                }

                $("#input-dewasa").val(x);
                $("#input-usia-dewasa").val(usia);
                $("#input-jmlpenumpang-dewasa").val(x);
                $("#text-usia-dewasa").show();
                $("#text-jmlpenumpang-dewasa").show();
                fixdewasa(x,usia);
                if( bayi == 0 && anak ==0){
                  $("#text-jmlpenumpang-bayi").hide();
                  $("#text-jmlpenumpang-anak").hide();
                }else {
                  $("#text-jmlpenumpang-bayi").show();
                  $("#text-jmlpenumpang-anak").show();
                }
            });

            $("#plus-dewasa").click(function(){
              bayi = document.getElementById("text-jmlpenumpang-bayi").innerHTML;
              anak = document.getElementById("text-jmlpenumpang-anak").innerHTML;

                var x = $("#input-dewasa").val();
                if(x >= 0){
                  x ++;
                  usia = "Dewasa, ";
                }
                $("#text-usia-dewasa").show();
                $("#text-jmlpenumpang-dewasa").show();
                fixdewasa(x,usia);
                $("#input-dewasa").val(x);
                $("#input-jmlpenumpang-dewasa").val(x);

                if( bayi == 0 && anak ==0){
                  $("#text-jmlpenumpang-bayi").hide();
                  $("#text-jmlpenumpang-anak").hide();
                }else {
                  $("#text-jmlpenumpang-bayi").show();
                  $("#text-jmlpenumpang-anak").show();
                }
            });

            $("#min-anak").click(function(){
              bayi = document.getElementById("text-jmlpenumpang-bayi").innerHTML;
              dewasa = document.getElementById("text-usia-dewasa").innerHTML;
              var y = $("#input-anak").val();
              if(y > 0){
                y --;
                usia = "Anak, ";
              } else if(y == 0){
                usia ="";
              }
              $("#input-anak").val(y);
              $("#input-usia-anak").val(usia);
              $("#input-jmlpenumpang-anak").val(y);
              $("#text-usia-anak").show();
              $("#text-jmlpenumpang-anak").show();
              fixanak(y,usia);
              if( bayi == 0 && dewasa ==0){
                $("#text-jmlpenumpang-bayi").hide();
                $("#text-jmlpenumpang-dewasa").hide();
              }else {
                $("#text-jmlpenumpang-bayi").show();
                $("#text-jmlpenumpang-dewasa").show();
              }
            });

            $("#plus-anak").click(function(){
              bayi = document.getElementById("text-jmlpenumpang-bayi").innerHTML;
              dewasa = document.getElementById("text-jmlpenumpang-dewasa").innerHTML;
              var x = $("#input-anak").val();
              if(x >= 0){
                x ++;
                usia = "Anak, ";
              }

              $("#text-usia-anak").show();
              $("#text-jmlpenumpang-anak").show();
              fixanak(x,usia);
              $("#input-anak").val(x);
              $("#input-jmlpenumpang-anak").val(x);


              if( bayi == 0 && dewasa ==0){
                $("#text-jmlpenumpang-dewasa").hide();
                $("#text-jmlpenumpang-bayi").hide();
              }else {
                $("#text-jmlpenumpang-dewasa").show();
                $("#text-jmlpenumpang-bayi").show();
              }

            });

            $("#min-bayi").click(function(){
              anak = document.getElementById("text-jmlpenumpang-anak").innerHTML;
              dewasa = document.getElementById("text-usia-dewasa").innerHTML;
              var y = $("#input-bayi").val();
              if(y > 0){
                y --;
                usia = "Bayi, ";
              } else if(y == 0){
                usia ="";
              }
              $("#input-bayi").val(y);
              $("#input-usia-bayi").val(usia);
              $("#input-jmlpenumpang-bayi").val(y);
              $("#text-usia-bayi").show();
              $("#text-jmlpenumpang-bayi").show();
              fixbayi(y,usia);
              if( anak == 0 && dewasa ==0){
                $("#text-jmlpenumpang-dewasa").hide();
                $("#text-jmlpenumpang-anak").hide();
              }else {
                $("#text-jmlpenumpang-dewasa").show();
                $("#text-jmlpenumpang-anak").show();
              }
            });

            $("#plus-bayi").click(function(){
              anak = document.getElementById("text-jmlpenumpang-anak").innerHTML;
              dewasa = document.getElementById("text-jmlpenumpang-dewasa").innerHTML;
              var x = $("#input-bayi").val();
              if(x >= 0){
                x ++;
                usia = "Bayi, ";
              }

              $("#text-usia-bayi").show();
              $("#text-jmlpenumpang-bayi").show();
              fixbayi(x,usia);
              $("#input-bayi").val(x);
              $("#input-jmlpenumpang-bayi").val(x);

              if( anak == 0 && dewasa ==0 ){
                $("#text-jmlpenumpang-dewasa").hide();
                $("#text-jmlpenumpang-anak").hide();
              }else {
                $("#text-jmlpenumpang-dewasa").show();
                $("#text-jmlpenumpang-anak").show();
              }
            });


            $("#ekonomi").click(function(){
              $(this).addClass("selected");
              $("#bisnis").removeClass("selected");
              $("#utama").removeClass("selected");
              $("#input-kelas-penumpang").val("Ekonomi");
              document.getElementById("text-kelas-penumpang").innerHTML = "Ekonomi";
            });

            $("#bisnis").click(function(){
              $(this).addClass("selected");
              $("#ekonomi").removeClass("selected");
              $("#utama").removeClass("selected");

              $("#input-kelas-penumpang").val("Bisnis");
              $("#jml-penumpang-dewasa").val(x);
              $("#text-kelas-penumpang").show();
              document.getElementById("text-kelas-penumpang").innerHTML = "Bisnis";
            });

            $("#utama").click(function(){
              $(this).addClass("selected");
              $("#bisnis").removeClass("selected");
              $("#ekonomi").removeClass("selected");
              $("#input-kelas-penumpang").val("Utama");
              $("#text-kelas-penumpang").show();
              document.getElementById("text-kelas-penumpang").innerHTML = "Utama";
            });

            $("#selesai").click(function(){
                $("#div-form-penumpang").hide();
            });

            $("#kelas").click(function(){
                $("#list-transit").fadeToggle("fast");
            });
            $("#durasi").click(function(){
                $("#list-durasi").fadeToggle("fast");

            });
            $("#waktu").click(function(){
                $("#list-waktu").fadeToggle("fast");
            });
            $("#namakereta").click(function(){
                $("#list-kereta").fadeToggle("fast");
            });
            $("#fasilitas").click(function(){
                $("#list-fasilitas").fadeToggle("fast");
            });

            $("#submit-cari").click(function(){
                $("#page1").hide();
                $("#page2").show();
            });


            //slider range
            var slider = document.getElementById("myRange");
            var durasi = document.getElementById("input-durasi");
            durasi.innerHTML = slider.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
              durasi.value = this.value;
            }


            // $(".adjust").on("click", function() {
            //   var $adjust = $(this);
            //   var oldValue = $adjust.parent().find("input").val();
            //   alert(oldValue);
            //   if ($adjust.text() == "+") {
            // 	  var newVal = parseFloat(oldValue) + 1;
            // 	} else {
            //    // Don't allow decrementing below zero
            //     if (oldValue > 0) {
            //       var newVal = parseFloat(oldValue) - 1;
            //     } else {
            //       newVal = 0;
            //     }
            //   }
            //
            //   $adjust.parent().find("input").val(newVal);
            //
            // });

            $('#dari').change(function(){
                  var id_prop = $(this).val();
                  $.ajax({
                      type   : "POST",
                      url    : "<?php echo base_url(); ?>" + "belanja/get_dari",
                      data   : JSON.stringify({id_prop: id_prop }),
                      contentType : "application/json;",
                      success: function(data){
                        var html = '';
                          var result = JSON.parse(data);
                          if(result.status == 'SUKSES'){
                            var dataKota = result.affect;
                            for(var i=0; i<dataKota.length; i++){
                              html += '<option value='+dataKota[i].ID+'>'+dataKota[i].NAME+'</option>';
                            }
                            $("#kd_kota").html(html);
                          }
                      },
                      error: function(error){

                      }
                  });
                  return false;
            });




            function onkeyUp(val){
                alertToast.style.display = "none";
                // labelAlert.style.display = "none";
                tujuan = inputNoTujuan.value;
                ckNoHp.value = tujuan;
                divChildProduct.innerHTML = "";
                oldIdChildSelected = "";
                var divParent   = document.getElementById("list-product-parent");
                var divLoading  = document.getElementById("loading").style;
                var productItem = "";

                if(inputNoTujuan.value.length >= 4 && (isExist == 0 || val == 0) ){
                    var t = getDateTime();
                    var h = sha1(inputNoTujuan.value.substr(0,4) + '<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>'+ hashtag + t);

                    if(inputNoTujuan.value.length == 4){
                        divLoading.display = "block";
                    }

                    $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url(); ?>" + "belanja/carioperator",
                        data: JSON.stringify({
                            prefix: inputNoTujuan.value.substr(0,4),
                            store_id : "<?=$this->session->userdata('store_id')?>",
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
                            var oprNameTmp = '';
                            for(var i = 0;i < rs.length; i++){

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

                                productItem +=    '<div id="list-pulsa" style="background-color:'+color+';" class="list-pulsa" onclick="selectionChildItem(this, '+rs[i].PRICE+',\''+rs[i].NOM+'\',\''+rs[i].DENOM+'\',\''+rs[i].DSC+'\','+i+')" id="itemChildId'+i+'" >'+
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

                                                        '<tr>'+
                                                    '</table>'+
                                                   '</div>';
                            }
                            if(rs.length>0){
                                isExist = 1;
                                $('#text-info').hide(100);
                                logoOperator.innerHTML = '<img class="img-operator" alt="No img" src="'+rs[0].IMG_FILE_NAME+'">'
                                divParent.innerHTML = productItem;
                            }else{
                                isExist = 0;
                                $('#text-info').show(100);
                            }
                        },
                        error: function (request, status, error) {
                            isExist = 0;

                            divParent.innerHTML = "";
                            divLoading.display = "none";
                            btnBayar.classList.add("hidden");
                            logoOperator.innerHTML = "";
                        }
                    });
                }else if(inputNoTujuan.value.length < 4){
                    isExist = 0;
                    divParent.innerHTML = "";
                    divChildProduct.innerHTML = "";
                    logoOperator.innerHTML = "";
                }

            }

            var oldIdSelected = "";

            function selectionItem(data,price,idxSelected){
                var idTemp = data.id;
                var selected = document.getElementById(idTemp);
                if(selected.className == "product-name nominal-selected"){
                    document.getElementById(idTemp).classList.remove("nominal-selected");

                    if(oldIdSelected != ""){
                        if(oldIdSelected != idTemp){
                            document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        }else{
                            divChildProduct.innerHTML = "";
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");
                        }
                    }
                }else{
                    if(oldIdSelected != idTemp && oldIdSelected != ""){
                        document.getElementById(oldIdSelected).classList.remove("nominal-selected");
                        btnBayar.classList.remove("show");
                        btnBayar.classList.add("hidden");
                    }
                    document.getElementById(idTemp).classList.add("nominal-selected");
                    viewChild(idxSelected);
                }

                oldIdSelected = idTemp;
                window.scrollTo(0,document.body.scrollHeight);
            }


            function selectionChildItem(data,price,kdProduk,denom,dsc,index){
              var t = getDateTime();
              var h = sha1('<?=$this->session->userdata('username')?>' + t);
              $.ajax({
                  type: "POST",
                  url:  "<?=base_url();?>" + "belanja/cek_price",
                  data: JSON.stringify({
                      nom      : kdProduk,
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
                      

                      if(rs.pesan =="Bukan Harga Outlet"){
                        hargaProduk = price;
                      } else{
                        hargaProduk = rs.hargajual;
                      }

                      $("#sukses_msg").hide();
                      gettingBalance();

                      var dataSelected = dataProducts[index];

                      modal.style.display = "block";
                      $('#input-pin').focus();
                        kodeProduk = kdProduk;
                        ckKodeProduk.innerHTML = kdProduk;
                        ckNom.innerHTML = denom;
                        ckKeterangan.innerHTML = dataSelected.SHORT_DSC;
                        ckHarga.innerHTML = "Rp "+numberWithCommas(hargaProduk);
                        idChildTemp = data.id;
                        console.log(idChildTemp);
                        var selected = document.getElementById(idChildTemp);
                        if(selected.className == "product-name nominal-selected"){
                            document.getElementById(idChildTemp).classList.remove("nominal-selected");
                            btnBayar.classList.remove("show");
                            btnBayar.classList.add("hidden");

                            if(oldIdChildSelected != ""){
                                if(oldIdChildSelected != idChildTemp){
                                    document.getElementById(oldIdChildSelected).classList.remove("nominal-selected");
                                }
                            }
                        }else{
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
                        priceText.innerHTML = "Rp "+numberWithCommas(hargaProduk);
                        ckHarga.innerHTML   = "Rp "+numberWithCommas(hargaProduk);
                        ckKeterangan.innerHTML = dsc;

                  }
              });



              // $("#sukses_msg").hide();
              // gettingBalance();
              //
              // var dataSelected = dataProducts[index];
              //
              // modal.style.display = "block";
              // $('#input-pin').focus();
              // // labelNom.classList.remove("hidden");
              // // labelNom.classList.add("show");
              //   hargaProduk = price;
              //   kodeProduk = kdProduk;
              //   ckKodeProduk.innerHTML = kdProduk;
              //   ckNom.innerHTML = denom;
              //   ckKeterangan.innerHTML = dataSelected.SHORT_DSC;
              //   ckHarga.innerHTML = "Rp "+numberWithCommas(dataSelected.PRICE);
              //   idChildTemp = data.id;
              //   console.log(idChildTemp);
              //   var selected = document.getElementById(idChildTemp);
              //   if(selected.className == "product-name nominal-selected"){
              //       document.getElementById(idChildTemp).classList.remove("nominal-selected");
              //       btnBayar.classList.remove("show");
              //       btnBayar.classList.add("hidden");
              //       // priceText.innerHTML = "";
              //
              //       if(oldIdChildSelected != ""){
              //           if(oldIdChildSelected != idChildTemp){
              //               document.getElementById(oldIdChildSelected).classList.remove("nominal-selected");
              //           }
              //       }
              //   }else{
              //       // console.log("old id",oldIdChildSelected);
              //       if(oldIdChildSelected != "" && oldIdChildSelected != null){
              //           if(oldIdChildSelected != idChildTemp){
              //               document.getElementById(oldIdChildSelected).classList.remove("nominal-selected");
              //           }
              //       }
              //       document.getElementById(idChildTemp).classList.add("nominal-selected");
              //       btnBayar.classList.remove("hidden");
              //       btnBayar.classList.add("show");
              //   }
              //
              //   oldIdChildSelected = idChildTemp;
              //   priceText.innerHTML = "Rp "+numberWithCommas(price);
              //   // ckHarga.innerHTML   = "Rp "+numberWithCommas(price);
              //   ckKeterangan.innerHTML = dsc;
              //   // window.scrollTo(top);
            }


            var btnTutup = document.getElementById("btn-tutup");
            btnTutup.onclick = function() {
                modal.style.display = "none";
                inputPin.value = "";
            }

            function redirectTo(param){
                window.location = param;
            }
            window.onload = function() {
                inputNoTujuan.focus();
            };

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
                var noTujuan     = ckNoHp.value;
                var username     = '<?=$this->session->userdata('username')?>';
                var pinTransaksi = inputPin.value;
                var authpin      = sha256("sha256" + username + pinTransaksi);
                console.log(authpin);
                $("#sukses_msg").hide();

                loadingTransaction.style.display = "block";

                var text = kodeProduk + "." + noTujuan;
                console.log("TEXT", text);
                var t = getDateTime();
                var h = sha1('<?=$this->session->userdata('username')?>' + text + t);
                $.ajax({
                    type: "POST",
                    url :  "<?=base_url();?>" + "transaksi",
                    data: JSON.stringify({
                        type       : "NONTAGIHAN",
                        authpin    : authpin,
                        kodeProduk : kodeProduk,
                        no_Tujuan  : noTujuan,
                        input_RO   : inputRO.value,
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
                        loadingTransaction.style.display = "none";
                        var rs = JSON.parse(result);

                        //Check valid phase
                            if(rs.Rows[0].PHASE !== 'AAA'){
                                alert('Anda harus submit kode OTP ulang');
                                return;
                            }
                        //end

                        $("#sukses_msg").fadeIn();
                        $("#sukses_show").html(rs.Rows[0].MESSAGE.replace(/([|])/g,'<br>'));

                        if(rs.Rows[0].RC == "00"){
                            //Check valid phase
                                if(rs.Rows[0].PHASE !== 'AAA'){
                                    alert('Anda harus submit kode OTP ulang');
                                    // window.location = "<?php //echo base_url()?>belanja/page_otp";
                                    return;
                                }
                            //end
                            cu = "";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");
                            searchTrxByMessageId(tujuan,messageid);
                        }

                        if(rs.Rows[0].RC == "94" && rs.Rows[0].MESSAGE.includes('SUDAH BERHASIL')){
                            cu = "[CU]";
                            var messageid = rs.Rows[0].MESSAGE.split("ID=")[1].split(",")[0].replace(" * PLN Lancar","");
                            searchTrxByMessageId(tujuan,messageid);
                        }
                        $('#input-pin').val('');

                    },
                    error: function (request, status, error) {
                        loadingTransaction.style.display = "none";
                        $("#sukses_msg").fadeIn();
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
                    rs.AMOUNT = hargaProduk;
                    printView(rs);

                },
                error: function (request, status, error) {
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

        </script>
        <script src="<?php echo base_url() ?>assets/js/belanja_script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/carousel.js"></script>
    </body>
</html>

<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-desk-2">
                        <div style="padding: 10px;">
                            <img width="50px" class="logo" height="50px" src="<?=base_url()?>images/logo_st24_nolabel.png">
                            <img id="left-menu" onclick="openMenu()" src="<?=base_url()?>images/asset/menu-blue.png" class="nav-menu">
                            <img width="70%" style="cursor:pointer" onclick="home()" class="logo-st24" height="auto" src="<?=base_url()?>images/st24systemtopup24jam.png">
                        </div>
                    </div>
                    <div class="col-desk-7">
                        <div style="padding: 10px;">
                            <div class="box-header"></div>
                        </div>
                    </div>
                    <div class="col-desk-2">
                        <div style="width: 100%; margin-top: 13px; ">
                            <center>
                                <a id="info-news" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?=base_url()?>images/asset/assetwebsite-19.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">6</span></a>
                                <a id="info-inbox" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?=base_url()?>images/asset/assetwebsite-15.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">3</span> </a>
                                <a id="info-notif" class="info-group click-area" href="#"> <img width="40px" height="40px" src="<?=base_url()?>images/asset/assetwebsite-14.png"> <span style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">1</span></a>
                                <div class="box-primary box-msg-news" id="box-info-news">
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
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-desk-1">
                        <div style="width: 100%; margin-top: 10px;">
                            <center>
                                <a style="margin-left: 10px;" href=""> <img width="50px" height="50px" src="<?=base_url()?>images/profile.png"> </a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container">
                <div class="row">
                    <div class="col-desk-2">
                        <div class="left-container">
                            <div class="box-nav-left" id="box-nav-left-id">
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-18.png"><span class="text-style"> Home</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="webreport_history.html">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-20.png"><span class="text-style"> Histori</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-17.png"><span class="text-style"> Produk</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-21.png"><span class="text-style"> Cetak Struk</span>
                                        </a>
                                    </div>
                                </div>
                                <hr class="hr-style">
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-23.png"><span class="text-style"> Akun</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-14.png"><span class="text-style"> Notifikasi</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-15.png"><span class="text-style"> Pesan Masuk</span>
                                        </a>
                                    </div>
                                </div>
                                <hr class="hr-style">
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-05.png"><span class="text-style"> Status</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-19.png"><span class="text-style"> Berita Baru</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#">
                                            <img width="30px" height="30px" src="<?=base_url()?>images/asset/assetwebsite-28.png"><span class="text-style"> Bantuan</span>
                                        </a>
                                    </div>
                                </div>
                                <hr class="hr-style">
                                <div class="margin-btm-10">
                                    <div class="row">
                                        <a href="#" class="button-primary">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-desk-10" id="right-container-id">
                        <div class="body-right-container">
                            <div class="box-primary">
                                <label>Tabel</label>
                                <table class="table">
                                    <tr>
                                        <th>#id</th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Status</th>
                                        <th>Total tagihan</th>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>XL</td>
                                        <td>20 Jan 2019</td>
                                        <td>Sukses</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>XL</td>
                                        <td>20 Jan 2019</td>
                                        <td>Sukses</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>XL</td>
                                        <td>20 Jan 2019</td>
                                        <td>Sukses</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>XL</td>
                                        <td>20 Jan 2019</td>
                                        <td>Sukses</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                </table>
                                <div class="pagination-parent">
                                    <a href="#">
                                        <div class="pagination">
                                            <span><</span>
                                        </div>
                                    </a>
                                    <a href="#">
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
                                    </a>
                                </div>
                            </div>
                            <div class="box-primary">
                                <label>Form</label>
                                <div class="row">
                                    <div class="col-desk-3">
                                        <label style="font-size: 15">Username</label><br>
                                        <input type="text"><br>
                                        <label style="font-size: 15">Password</label><br>
                                        <input type="password"><br>
                                        <label style="font-size: 15">Umur</label><br>
                                        <select class="select">
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                        </select><br>
                                        <label style="font-size: 15">Jenis Kelamin</label><br>
                                        <label class="container-radio">One
                                            <input type="radio" checked="checked" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-radio">Two
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label style="font-size: 15">Ceklis</label><br>
                                        <label class="checkbox">
                                            <input type="checkbox" name="test"/>
                                            <span>One</span>
                                        </label>
                                        <br>
                                        <label style="font-size: 15">Tangal Lahir</label><br>
                                        <input type="date"><br>
                                        <label style="font-size: 15">Alamat</label><br>
                                        <textarea class="textarea">Indramayu</textarea><br>
                                        <input type="submit" value="Kirim">
                                    </div>
                                </div>
                            </div>

                            <div class="box-primary">
                                <label>Grid</label><br>
                                <label style="font-size: 17px">
                                    Gunakan class="row" untuk dijadikan row<br>
                                    Gunakan class="col-desk-(number)" untuk jadikan cell<br>
                                    col-desk maksimal numbernya adalah 12, contoh class="col-desk-10" <br>
                                    kodenya seperti ini :<br>
                                </label>
                                <textarea class="textarea" cols="100" rows="13">
<div class="row">
    <div class="col-desk-1">
            col-desk-1
    </div>
    <div class="col-desk-1">
            col-desk-1
    </div>
    <div class="col-desk-10">
            col-desk-10
    </div>
    <div class="col-desk-3">
            col-desk-3
    </div>
    <div class="col-desk-3">
            col-desk-3
    </div>
    <div class="col-desk-6">
            col-desk-10
    </div>
</div>
                                </textarea>
                                <br>
                                <label>Hasilnya Grid</label><br>
                                <div class="row">
                                    <div class="col-desk-1">
                                        <div style="background-color: #2196F3; font-size: 20">col-desk-1</div>
                                    </div>
                                    <div class="col-desk-1">
                                        <div style="background-color: rgb(89, 165, 228); font-size: 20">col-desk-1</div>
                                    </div>
                                    <div class="col-desk-10" style="background-color: rgb(183, 220, 250);">
                                        <div style=" font-size: 20px;">col-desk-10</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-desk-3">
                                        <div style="background-color: rgb(50, 142, 218); font-size: 20">col-desk-3</div>
                                    </div>
                                    <div class="col-desk-3">
                                        <div style="background-color: rgb(117, 174, 221); font-size: 20">col-desk-3</div>
                                    </div>
                                    <div class="col-desk-6" style="background-color: rgb(180, 204, 224);">
                                        <div style=" font-size: 20px;">col-desk-6</div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-primary">
                                <label>Button</label><br><hr>
                                <label style="font-size: 20">button submit</label><br>
                                <input type="submit"><br>
                                <label style="font-size: 20">button with image</label><br>
                                <button class="button-with-image" ><img class="button-image" src="<?=base_url()?>images/asset/sukses.svg">Submit</button>
                                <br>
                                <label>Loading</label><br><hr>
                                <div class="loading-ring"><div></div><div></div><div></div><div></div></div>
                                <br>
                                <label>Alert</label><br><hr>
                                <div class="alert gagal">
                                    <span>Gagal</span>
                                </div>
                                <div class="alert sukses">
                                    <span>Sukses</span>
                                </div>
                                <div class="alert pending">
                                    <span>Sukses</span>
                                </div>
                                <div class="alert alert-info">
                                    <span>Info</span>
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
        <script>
            document.getElementById("left-menu").addEventListener("click", openMenu);
            function openMenu(){
                var x= document.getElementById("box-nav-left-id").style;
                console.log(x.display);
                if (x.display == "" || x.display == "none") {
                    x.display = "block";
                } else {
                    x.display = "none";
                }
            }

            document.getElementById("info-news").addEventListener("click", onCLickinfoNews);
            function onCLickinfoNews(){
                var x= document.getElementById("box-info-news").style;
                var y= document.getElementById("box-info-inbox").style;
                var z= document.getElementById("box-info-notif").style;
                if (x.display == "" || x.display == "none") {
                    x.display = "block";
                    y.display = "none";
                    z.display = "none";
                } else {
                    x.display = "none";
                }
            }
            document.getElementById("info-inbox").addEventListener("click", onCLickinfoInbox);
            function onCLickinfoInbox(){
                var x= document.getElementById("box-info-news").style;
                var y= document.getElementById("box-info-inbox").style;
                var z= document.getElementById("box-info-notif").style;
                if (y.display == "" || y.display == "none") {
                    x.display = "none";
                    y.display = "block";
                    z.display = "none";
                } else {
                    y.display = "none";
                }
            }
            document.getElementById("info-notif").addEventListener("click", onCLickinfoNotif);
            function onCLickinfoNotif(){
                var x= document.getElementById("box-info-news").style;
                var y= document.getElementById("box-info-inbox").style;
                var z= document.getElementById("box-info-notif").style;
                if (z.display == "" || z.display == "none") {
                    x.display = "none";
                    y.display = "none";
                    z.display = "block";
                } else {
                    z.display = "none";
                }
            }
        </script>
    </body>
</html>

<div class="main-body">
    <div class="row">
        <div class="col-desk-3 col-sm-3">
            <div class="left-body">
                <div class="row">
                    <div class="col-desk-12 col-md-12 col-sm-12">
                        <div class="box-form">
                            <div id="home" class="title">
                            <a href="<?= base_url()?>">
                            <img style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Home
                            </a>
                            </div>
                        </div>
                        <div id="mp" class="box-form">
                            <div class="title">
                                <img style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Management Product
                            </div>
                            <div id="map"class="main-area" style="height:auto;">
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>category">Category</a></span>
                                </div>
                                <!-- <div class="item-category">
                                    <span><a href="<?= base_url() ?>sub_category">Sub Category</a></span>
                                </div> -->
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>banner">Banner</a></span>
                                </div>
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>products">Products</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-form">
                            <div id="mu" class="title">
                            <img style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Management User
                            </div>
                            <div id="mau" class="main-area" style="height:auto;">
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>member">Member</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-form">
                            <div id="mt" class="title">
                            <img id="icon-mt" style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Management Data & Informasi

                            </div>
                            <div id="mat" class="main-area" style="height:auto;">
                            <div class="item-category">
                                <span><a href="<?= base_url() ?>profile">Profile</a></span>
                            </div>

                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>favorit">Favorit</a></span>
                                </div>
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>wishlish">Wish list</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-form">
                            <div id="mt" class="title">
                            <img id="icon-mt" style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Management Transaksi
                            </div>
                            <div id="mat" class="main-area" style="height:auto;">
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>profile">Menunggu pembayaran</a></span>
                                </div>
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>brand">Pembayaran Selesai</a></span>
                                </div>
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>brand">Pesanan Diproses</a></span>
                                </div>
                                <div class="item-category">
                                    <span><a href="<?= base_url() ?>brand">Sampai Tujuan</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-form" onclick="onclickLogout()">
                            <div class="title">
                            <img style="width:4%;opacity:0.5;" src="<?=base_url()?>assets/icons/arrow.png" alt="">
                                Logout
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function onclickLogout(){
                console.log("logout");
                window.location = "<?=base_url()?>store/logout";
            }
        </script>

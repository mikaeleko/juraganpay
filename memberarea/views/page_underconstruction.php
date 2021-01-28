<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>ST24</title>
        <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
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
        .button-export{
            display:none;
            animation-name:showButton;
            animation-duration:0.5s;
        }
        .csv-export-img{
            animation-name:showCsvImg;
            animation-duration:0.5s;
        }

        @keyframes showCsvImg {
            from {opacity: 0;width:0px;height:0px;}
            to {opacity: 1;width:25px;height:25px;}
        }

        @keyframes showButton {
            from {opacity: 0;width:3px;height:3px;}
            to {opacity: 1;width:43px;height:43px;}
        }

        </style>
        <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="body-container">
                <div class="box-primary" style="margin : 13px;">
                    <div style="margin : 13px;display :flex">
                        <a style="" href="#"> </a>
                        <img width="45px" height="45px" src="<?php echo base_url() ?>images/asset/construction.svg"> 
                        <span style="margin-left:20px;">Sedang dalam pengembangan</span>
                    </div>
                    <button onclick="javascript:window.history.back()" class="button"><< Kembali</button>
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
    </body>
</html>

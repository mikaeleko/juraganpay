<html>
    <head>
    <title>Print Preview</title>
    <link rel="icon" type="image/png" href="<?=base_url()?>images/logo_st24_nolabel.png" />
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .print{
            word-wrap: break-word;white-space: pre-wrap;
            background-color: transparent;
            font-family: monospace;
            color:#000000; 
            font-weight: 100;
            font-family:  monospace;
            letter-spacing: 0.05px;
            padding: 0px 10px 0px 10px;
        }
        #print-title{
            text-align: center;
            font-family:monospace;
            font-weight: 800;
            padding: 10px 10px 0px 10px;
        }
        #printableArea{
            box-shadow: 2px 2px 2px 2px #15141473;
            background-color: rgb(254, 254, 254);margin:auto;display: block;
        }
        #print-footer{
            text-align: center;
            font-size: 8pt;
            padding: 0px 10px 10px 10px;
        }
        .print-font-size-10{
            font-size: 8pt;
        }
        .print-font-size-11{
            font-size: 9pt;
        }
        .print-font-size-12{
            font-size: 10pt;
        }
        .print-font-size-13{
            font-size: 11pt;
        }
        .print-font-size-14{
            font-size: 12pt;
        }
        
        .print-paper-size-1{
            width: 53mm;
        }
        .print-paper-size-2{
            width: 251px;
        }
        .print-paper-size-3{
            width: 85mm;
        }
        .print-area{
            margin: auto;
            width: 300px;
            background-color: #00afe975;
            padding:8px;
            position:relative;
            padding-bottom: 40px;
            box-shadow: 2px 2px 2px #dedede;
        }
        .set-biaya-admin{
            text-decoration:none;
            color:#2836dc;
        }
    </style>
    </head>
    <body>
        <div class="print-container">
            <div class="print-area">
                <strong>Setting :</strong>
                <div class="form-setting-print">
                    <form method="post" action="<?=base_url()?>belanja/savesettingprint">
                        <table>
                            <tr>
                                <td>
                                    Ukuran Font
                                </td>
                                <td> : </td>
                                <td>
                                    <input type="hidden" name="outlet_name" value="<?=$print_setting->outlet_name?>">
                                    <input type="hidden" name="address" value="<?=$print_setting->address?>">
                                    <input type="hidden" name="npwp" value="<?=$print_setting->npwp?>">
                                    <input type="hidden" name="web" value="<?=$print_setting->web?>">
                                    <input type="hidden" name="facebook" value="<?=$print_setting->facebook?>">
                                    <input type="hidden" name="instagram" value="<?=$print_setting->instagram?>">
                                    <input type="hidden" name="twitter" value="<?=$print_setting->twitter?>">
                                    <input type="hidden" name="phone_number" value="<?=$print_setting->phone_number?>">
                                    <input type="hidden" name="notes" value="<?=$print_setting->notes?>">
                                    <input type="hidden" name="image" value="<?=$print_setting->image?>">
                                    <select name="font_size" id="print-font-size-selection" onchange="onchangeChangeFontSizePrint(this)">
                                        <option <?=$print_setting->font_size=='print-font-size-12'?'selected':''?> value="print-font-size-12">default</option>
                                        <option <?=$print_setting->font_size=='print-font-size-10'?'selected':''?> value="print-font-size-10">10 px</option>
                                        <option <?=$print_setting->font_size=='print-font-size-11'?'selected':''?> value="print-font-size-11">11 px</option>
                                        <option <?=$print_setting->font_size=='print-font-size-12'?'selected':''?> value="print-font-size-12">12 px</option>
                                        <option <?=$print_setting->font_size=='print-font-size-13'?'selected':''?> value="print-font-size-13">13 px</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Paper Size
                                </td>
                                <td> : </td>
                                <td>
                                    <select name="paper_size" id="print-paper-size-selection" onchange="onchangeChangePaperSizePrint(this)">
                                        <option <?=$print_setting->paper_size=='print-paper-size-1'?'selected':''?> value="print-paper-size-1">default</option>
                                        <option <?=$print_setting->paper_size=='print-paper-size-1'?'selected':''?> value="print-paper-size-1">58 mm</option>
                                        <option <?=$print_setting->paper_size=='print-paper-size-2'?'selected':''?> value="print-paper-size-2">80 mm</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align:right"><button name="action" value="papersetting">Simpan</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <hr style="border: 1px solid #e5e5e5">
                <div id="div-set-biaya-admin" style="display:block;margin-bottom:10px">
                    Atur Biaya Admin :
                    <input type="number" id="input-biaya-admin" onkeyup="onKeyUpInputSetbiaya(this)">
                </div>
                <strong>Tampilan :</strong><br>
                <div id="printableArea" class="<?=$print_setting->paper_size?>">
                    <div style="display:block;text-align:center;margin-left:10px;margin-right:10px">
                    <?php
                    if($print_setting->image){ ?>
                        <img id="image-priview-print" src=".<?=$print_setting->image?>" style="width:80px;"><br>
                    <?php } ?>
                        <span class="<?=$print_setting->font_size?>" style="font-weight:400;font-family:monospace"><?=$print_setting->outlet_name?></span><br>
                        <span class="<?=$print_setting->font_size?>" style="font-weight:400;font-family:monospace"><?=$print_setting->address?></span><br>
                        <span class="<?=$print_setting->font_size?>" style="font-weight:400;font-family:monospace"><?=$print_setting->npwp?></span><br>
                        <span class="<?=$print_setting->font_size?>" style="font-family:monospace"><?=$print_setting->phone_number?></span>
                    </div>
                    <?php 
                    $textprint = str_replace("<br>","\n",$this->input->get('text')); 
                    $textprintOld = $textprint;
                    if (strpos($textprint, 'TAGIHAN') !== false) {
                        $textprint = substr($textprint,0,strpos($textprint,",\nSaldo anda saat ini"));
                        if($textprint == ""){
                            $textprint = $textprintOld;
                        }
                        
                    }
                    ?>
                    <pre id="content-print" class="print <?=$print_setting->font_size?>" id="print-text"><?=$textprint ?></pre>
                    <div style="margin-left:10px;margin-right:10px;display:block">
                        <table style="font-size:10px">
                            <?php if($print_setting->web){ ?>
                            <tr>
                                <td><img src="<?=base_url()?>images/icon/icon_small_web.png" title="web" style="width:15px;height:15px" alt=""></td>
                                <td><?=$print_setting->web?></td>
                            </tr>
                            <?php } ?>
                            <?php if($print_setting->facebook){ ?>
                            <tr>
                                <td><img src="<?=base_url()?>images/icon/icon_small_fb.png" title="facebook" style="width:15px;height:15px" alt=""></td>
                                <td><?=$print_setting->facebook?></td>
                            </tr>
                            <?php } ?>
                            <?php if($print_setting->instagram){ ?>
                            <tr>
                                <td><img src="<?=base_url()?>images/icon/icon_small_instagram.png" title="instagram" style="width:15px;height:15px" alt=""></td>
                                <td><?=$print_setting->instagram?></td>
                            </tr>
                            <?php } ?>
                            <?php if($print_setting->twitter){ ?>
                            <tr>
                                <td><img src="<?=base_url()?>images/icon/icon_small_twitter.png" title="twitter" style="width:15px;height:15px" alt=""></td>
                                <td><?=$print_setting->twitter?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div style="display:block;text-align:center"><?=$print_setting->notes?></div>
                </div>
                        
                <input type="button" style="position: absolute;right: 10px;bottom:10px" onclick="printDiv('printableArea')" value="PRINT" />
            </div>
        </div>
    </body>
    <script>
        var tmpLembar = "";
        var tmpTotalAdmin = "";
        var tmpTotalAdminOld = "";
        var contentPrintOldInner = "";
        var tmpTagihan = "";
        var tmpTotalOld = "";
        var inputBiayaAdmin = document.getElementById('input-biaya-admin');
        var contentPrint = document.getElementById("content-print");
        var divBiayaAdmin = document.getElementById('div-set-biaya-admin');
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        function onKeyUpTitle(obj){
            document.getElementById("print-title").innerHTML = obj.value;
        }

        function onKeyUpFooter(obj){
            document.getElementById("print-footer").innerHTML = obj.value;
        }

        function onchangeChangeFontSizePrint(obj){
            var textPrint = document.getElementById("print-text");
            for(var i=10;i<=13;i++){
                var id = 'print-font-size-'+i;
                textPrint.classList.remove(id);
            }
            textPrint.classList.add(obj.value);
        }

        function onchangeChangePaperSizePrint(obj){
            var paper = document.getElementById("printableArea");
            for(var i=1;i<=3;i++){
                var id = 'print-paper-size-'+i;
                paper.classList.remove(id);
            }
            paper.classList.add(obj.value);
        }

        function setBiayaAdmin(){

        }

        function onKeyUpInputSetbiaya(obj){
            var totalAdminNew = obj.value*tmpLembar;
            var totalAdminFormat = numberFormat(totalAdminNew);
            var spaceTotalAdmin = 12-totalAdminFormat.length;

            var totalNew = tmpTagihan+totalAdminNew;
            var totalFormat = numberFormat(totalNew);
            var spaceTotal = 12-totalFormat.length;

            var newPrintContent = contentPrintOldInner.replace(tmpTotalAdminOld,'Rp'+' '.repeat(spaceTotalAdmin)+totalAdminFormat).replace(tmpTotalOld,'Rp'+' '.repeat(spaceTotal)+totalFormat);
            contentPrint.innerHTML = newPrintContent;
        }

        function numberFormat(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function init(){
            if(contentPrint.innerHTML.includes('TAGIHAN')){
                divBiayaAdmin.style.display = "block";

                try{
                    contentPrintOldInner = contentPrint.innerHTML;
                    var parsingLembar = contentPrint.innerHTML.split("LEMBAR TAGIHAN : ")[1].split("\n")[0];
                    var lembar = parseInt(parsingLembar.replace( /\D/g, ''));
                    tmpLembar = lembar;
                    var parsingTotalAdmin = contentPrint.innerHTML.split("TOTAL ADMIN    : ")[1].split("\n")[0];
                    tmpTotalAdminOld = parsingTotalAdmin;
                    var totalAdmin = parseInt(parsingTotalAdmin.replace( /\D/g, ''));
                    tmpTotalAdmin = totalAdmin;
                    
                    var parsingTagihan = contentPrint.innerHTML.split("TAGIHAN        :")[1].split("\n")[0];
                    var tagihan = parseInt(parsingTagihan.replace( /\D/g, ''));
                    tmpTagihan = tagihan;
                    var parsingTotal = contentPrint.innerHTML.split("TOTAL          : ")[1].split("\n")[0];
                    tmpTotalOld = parsingTotal;
                    var parsingBiayaAdmin = contentPrint.innerHTML;
                    inputBiayaAdmin.value = totalAdmin/lembar;
                }catch(err){
                    alert("terjadi kesalahan saat menampilkan konten print");
                    console.error(err.toString());
                }
            }else{
                divBiayaAdmin.style.display = "none";
            }
        }

        init();
    </script>
</html>
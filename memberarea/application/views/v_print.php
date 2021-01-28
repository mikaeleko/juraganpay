<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Print View</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css"> -->
  <style>
      body{
        font-family:'Segoe UI';
      }
     /* sheet size */
    @page { 
        <?php 
            $height = 0;
            if($this->input->get('body')){
                $height = 4.5*count(explode("<br>",$this->input->get('body')));
            }
            ?>
        size: 58mm <?=$height?>mm;
        margin:0;
    } /* output size */
    @media print { 
        .sheet { 
            width: 58mm;
            /* height: 100%; */
            margin: auto;
            /* border: 0.5px solid; */
        } 
        #btnPrint{
            display:none;
        }
        pre{
            margin:0;
        }
    } /* fix for Chrome */

    .sheet { 
        width: 58mm;
        /* width: 100%; */
        margin: auto;
        /* border: 0.5px dashed; */
    }
    
    body.receipt{
        margin: 0;
        padding: 0;
        font-size: 10pt;
        font-family:monospace;
    }
    pre{
        margin:0;
    }
    .btn-print{
        background:green;
        color:white;
        width:100%;
        padding:10px;
        border:none;
        margin-top:10px;
    }
    .div-btn-print{
        width: 58mm;
        margin: auto;
    }
    .footer-text{
        text-align:center;
    }
    .center{
        text-align:center;
    }
    .div-setting{
        position:fixed;
        right:10px;
        top:10px;
        background:#dfdff5;
        padding:10px;
    }
    .btn-save-setting{
        background:green;
        color:white;
        width:100%;
        padding:10px;
        border:none;
        margin-top:10px;
    }
    .btn-cancel-setting{
        background:red;
        color:white;
        width:100%;
        padding:10px;
        border:none;
        margin-top:10px;
    }
    .hide{
        display:none
    }
    .show{
        display:block
    }
  </style>
</head>

<body id="bodyContent" class="receipt">
    <div id="printableArea" class="sheet">
        <pre><?=$this->input->get('body')?></pre>
        <div class="center hide">-----------------------------</div>
        <div class="footer-text hide">Terima Kasih</div>
    </div>
    <div class="div-btn-print">
        <input class="btn-print" type="button" id="btnPrint" onclick="printDiv('printableArea')" value="PRINT" />
    </div>

    <div class="div-setting hide">
        <div class="center">
            Setting
        </div>
        <form action="">
            <table>
                <tr>
                    <td>Size Width</td>
                    <td>:</td>
                    <td><input name="size_width" placeholder="58" type="number">mm</td>
                </tr>
                <tr>
                    <td>Size Height</td>
                    <td>:</td>
                    <td><input name="size_height" placeholder="40.5" type="number">mm</td>
                </tr>
                <tr>
                    <td>Font Size</td>
                    <td>:</td>
                    <td><input name="font_size" placeholder="10" type="number">pt</td>
                </tr>
                <tr>
                    <td>Garis footer</td>
                    <td>:</td>
                    <td><input name="line_footer" placeholder="YES/NO" type="text"></td>
                </tr>
                <tr>
                    <td>Border</td>
                    <td>:</td>
                    <td><input name="border" placeholder="YES/NO" type="text"></td>
                </tr>
                <tr>
                    <td>Text Footer</td>
                    <td>:</td>
                    <td><input name="text_footer" placeholder="Berupa ucapan biasanya" type="text"></td>
                </tr>
            </table>
            <button class="btn-save-setting">Simpan</button>
            <button class="btn-cancel-setting">Batal</button>
        </form>
    </div>
<script>
    function printDiv(divName) {
        var printContents = "";
        printContents += '<div id="printableArea" class="sheet">';
        printContents += document.getElementById(divName).innerHTML;
        printContents += '</div>';
        console.log(printContents);
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    // function textPlain(txt){
    //     var printWindow = window.open();
    //     printWindow.document.open('text/plain')
    //     printWindow.document.write(txt);
    //     printWindow.document.close();
    //     printWindow.focus();
    //     printWindow.print();
    //     printWindow.close();
    // }
</script>
</body>
</html>
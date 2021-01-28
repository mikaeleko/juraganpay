<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title><?= TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
        <style media="screen">
        h3{
          color:#404040;
        }

        .label-form{
          font-size: 15px;
          width   : 200px;
          height: auto;
          padding: 5px;
          display: inline-block;
          font-weight: bold;
        }
        .label-menu{
          color :#808080;
          font-family: 'Segoe UI';
          cursor:pointer;
        }

        .box-form{
          box-shadow: 5px 10px 18px #888888;
          border-radius:10px;
          padding:0px;
          height:auto;
          margin: 20px;
          display:table;
        }

        @media only screen and (max-width: 600px) {
          .box-login2{
            padding: 10px;
            box-shadow: 1px 1px 1px 1px #ccc;
            width:300px;
            height:auto;
            margin: auto;
            border-radius : 15px;
            background-color : rgb(248, 248, 248);
          }
        }

        .box-produk{
            margin: 20px 47px 0 47px;
            width: 100% auto;
            border-radius: 10px 10px 10px 10px;
            margin-bottom: 20px;
        }

        .produk{
          box-shadow: 2px 5px 5px 2px #888888;
          width:400px;
        }

        .title{
          background-color:rgba(0,175,233,1);
          font-size:20px; text-align:center;color:#FFF;
        }


        #item-produk, #jenis-produk{
          font-size:18px; text-align:center;
          height:800px;
          overflow: scroll;
        }

        #jenis-produk{
          box-shadow: 2px 7px 15px #888888;margin-left:20px;
        }

        #title-jnsproduk{
          background-color:rgba(0,175,233,1);
          height:auto;
          font-size:20px;
          text-align:center;
          color:#fff;
          display: flex;
          align-items: center;
          padding:6px;
          justify-content: center;
          box-shadow: 5px 5px 10px #888888;
        }

        #item-jnsproduk{
            width:400px;height:auto;text-align: left;color:#000;
        }
         .active{
           background-color: #5689DC;
         }

         .activestyle{
           background-color:rgba(0, 175, 233, 0.2) !IMPORTANT;
           color:rgba(0,175,233,1);
         }
         .image-item-group{
             width:50px;
             height:50px;
             background-color:#FFF;
             color:#FFF;
             border-radius:50%;
             margin:auto;
             padding:5px;
         }
         .image-item-group img {
             width:50px;height:50px;
             /* box-shadow: 1px 1px 3px #888888;border-radius:50px; */
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

         .image-item-grp{
             width:40px; height:40px;background-color:transparent;
             color:#FFF;float:left;
         }
         .image-item-grp img{
             width:40px;height:40px;
             /* box-shadow: 1px 1px 3px #888888;border-radius:50px; */
         }
        </style>
    </head>
    <body>
        <div class="container">

            <?php include("menu2.php"); ?>

            <div class="body-container smooth">

              <div id='div-koneksi' style='display:none'>
                <div id='content_koneksi'>
                  <div id="err_koneksi" class="alert alert-danger" style="text-align:center;">
                      <span id="koneksi_msg"></span>
                  </div>
                </div>
              </div>

              <div class="box-produk">

                <!-- <div class="row" style="position:absolute;">
                  <div class="col-desk-4 hidden" style="position:absolute;">
                    hidden
                  </div>
                  <div class="col-desk-4" style="text-align:center; position:absolute;">
                    tes
                  </div>
                  <div class="col-desk-4 hidden">
                      hidden
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-desk-2 col-md-12 produk">
                    <div class="title">
                      PRODUK
                    </div>
                    <div id="item-produk" class="smooth">

                    </div>
                  </div>

                  <div class="col-desk-10 col-md-12">
                    <div class="title">
                      JENIS PRODUK
                    </div>
                    <div id="loading-transaction" class="loading-ring" style="display:none"><div></div><div></div><div></div><div></div></div>
                    <div id="jenis-produk-parent">
                      <div class="row">

                        <div id="jenis-produk" class="col-desk-12 col-md-12 col-sm-12">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>

<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script type="text/javascript">

function getDateTime() {
    var now     = new Date();
    var year    = now.getFullYear();
    var month   = now.getMonth()+1;
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
    return dateTime;
}


var result = [];
$(document).ready(function(){

  function getMenuProduk(){
      $.ajax({
          type: "GET",
          url :  "<?php echo base_url(); ?>" + "produk/getProduk",
          success: function(result){
             // console.log(result);
             result = JSON.parse(result);
             if(!result.success && result.success != null) {
               //alert('koneksi gagal');
               $("#div-koneksi").show(100);
               $("#koneksi_msg").html("Gagal Koneksi Ke Server!");
             } else {
               var listProductLeft = "";
               var color = "";
               var aktif="";
               for(var i = 0;i < result.length;i++){
                 if(i % 2 == 0) {
                   color = "#FFF";
                 } else {
                   color = "#F1F1F1";
                 }
                   listProductLeft += "<div id=\"listprodukleft"+i+"\" onclick=\"prodClick(\'"+result[i].KODE_PROVIDER+"\','active',"+i+","+result.length+")\" style='cursor:pointer; box-shadow: 1px 1px 3px #888888; font-size:14px;font-weight:500;color:#000;padding:5px;background-color:"+color+"'>"+
                                      "<img  src='<?php echo HOST_API_IMAGE; ?>get_img?file=iconproduk/icon_"+result[i].KODE_PROVIDER.toLowerCase()+".png' style='width:50;height:50;display:block;text-align:center;vertical-align:middle;margin:0 auto;border-radius:0 10px 0 10px;box-shadow: 1px 1px 3px #888888;'><span>"
                                      +result[i].KODE_PROVIDER+
                                      "</span></div>";
               }

               $('#item-produk').html(listProductLeft);
               prodClick(result[0].KODE_PROVIDER,'nonactive','',0);
               $("#listprodukleft").addClass("activestyle");
             }
          }
      });
  }

  getMenuProduk();

});



function prodClick(param,paramActive,indexClick,totalProd){
  var loadingTransaction = document.getElementById("loading-transaction");


  if(paramActive == 'active'){
      $("#listprodukleft"+indexClick).addClass("activestyle");
  }

  if(indexClick == 0){
      $("#listprodukleft0").addClass("activestyle");
  }

  for(var i=0;i<totalProd;i++){
    if(i!=indexClick){
      $("#listprodukleft"+i).removeClass("activestyle");

    }
  }
  var opr = param;
  loadingTransaction.style.display = "block";
  $.ajax({
      type   : "POST",
      url    : "<?php echo base_url(); ?>" + "produk/getJenisProduk",
      data   : JSON.stringify({oper: opr }),
      contentType : "application/json;",
      success: function(data){
          loadingTransaction.style.display = "none";

          var list = '';
          var res = JSON.parse(data);
          if(res.status == 'SUKSES'){
            var dataJns = res.affect;
            //console.log(dataJns);
            var jenisProduk = document.getElementById("jenis-produk");
            var divJenis = "";
            for(var x=0; x<res.affect.length; x++){
              divJenis += '<div class="col-desk-4 col-sm-4 col-md-4 smooth"><div style="margin:10px">'+
                            '<div id="title-jnsproduk">'+
                            '<img class="img-group" src="'+res.affect[x].IMG_FILE_NAME+'" >'+
                            '<span class="span-group">'+ res.affect[x].OPR_NAME.replace('_',' ')+'</span>'+
                          '</div>';


              var listProduk = "";
              for(var y=0; y<res.affect[x].list_produk.length;y++){
                if(y % 2 == 0 ) {
                  color = "#FFF";
                } else {
                  color = "#F1F1F1";
                }

                var divPrice = '';
                if(res.affect[x].list_produk[y].HASHTAG == '#PEMBAYARAN'){
                  var feeOrMarkup = (res.affect[x].list_produk[y].PRICE.includes('-') || res.affect[x].list_produk[y].PRICE == '0' ?'Fee :<br>':'Markup :<br>')+'<font style="font-size:11px">'+( res.affect[x].list_produk[y].PRICE == '0'? '-' : ('Rp. '+numberWithCommas(res.affect[x].list_produk[y].PRICE.replace('-',''))) )+'</font>';
                  var price       = 'Admin :<br>'+(res.affect[x].list_produk[y].FEE == ''?'-': ('Rp. '+numberWithCommas(res.affect[x].list_produk[y].FEE)) )+'<br> '+feeOrMarkup;
                      divPrice    = '<td width="15%" style="text-align:right;padding-right:10px;"><font style="color:rgb(0,48,127);text-align:right;font-size:11px;font-weight:bold;">'+price+'</font></td>';
                }else{
                  divPrice        = '<td width="15%" style="text-align:right;padding-right:10px;"><font style="color:rgb(0,48,127);text-align:right;font-size:14px;font-weight:bold;">'+'Rp. '+numberWithCommas(res.affect[x].list_produk[y].PRICE)+'</font></td>';
                }
                listProduk +=  '<div style="background-color:'+color+';box-shadow: 1px 1px 3px #888888;position:relative;height:auto;">'+
                                '<table width="100%" style="margin-left:5px;background-color:transparent;">'+
                                    '<tr>'+
                                        '<td width="40%"><span style="color:#696969; font-weight:bold;font-size:16px;">'+res.affect[x].list_produk[y].SHORT_DSC+
                                        '</span><br><div style="font-size:12px;margin-top:2px">'+res.affect[x].list_produk[y].DSC+'</div></td>'+
                                        divPrice+
                                        // <button id="btn-bayar" class="button-payment right hidden">Kirim</button>
                                    '<tr>'+
                                '</table>'+
                               '</div>';
              }

              divJenis += listProduk + "</div></div>";


            }


            // console.log(jenisProduk);
            jenisProduk.innerHTML = divJenis;
            //$("#title-jnsproduksi").html(list);
            // $("#item-jnsproduksi").html(html);
          }
      },
      error: function(error){
      }
  });
  return false;
}
</script>

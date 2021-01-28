<div class="col-desk-9 col-sm-9">
  <?php
  $pop_msg = $this->session->flashdata('hasil');
  if($pop_msg != ""){
    echo $pop_msg;
  }
   ?>
          <div id="data-product" class="row" style="padding:30px;">
              <div onclick="add_product()" style="padding:15px;cursor:pointer;width:200px;;background-color:transparent;vertical-align:middle;margin-bottom:10px;">
                <img src="<?= base_url() ?>assets/icons/add.png" alt="" style="width:30px;height:30px;float:left;margin-right:10px;">Tambah Produk
              </div>
              <table class="display" id="products"  style="text-align:left;font-size:14px;">
                  <thead>
                      <tr>
                          <th >No</th>
                          <th >Gambar</th>
                          <th >Nama Produk</th>
                          <th >Kategori</th>
                          <th >Merek</th>
                          <th >Berat</th>
                          <th >Harga</th>
                          <th >Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=0;
                    foreach ($product as $prod) {
                    $x++;

                    ?>
                    <tr>
                      <td><?= $x ?></td>
                      <td>
                        <img width="50" height="50" src="<?= API_IMG.'products/'.$prod->image1 ?>" alt="">
                        <img width="50" height="50" src="<?= API_IMG.'products/'.$prod->image2 ?>" alt="">
                        <img width="50" height="50" src="<?= API_IMG.'products/'.$prod->image3 ?>" alt="">
                        <img width="50" height="50" src="<?= API_IMG.'products/'.$prod->image4 ?>" alt="">
                      </td>
                      <td><?= $prod->product_name ?></td>
                      <td><?= $prod->product_category_name ?></td>
                      <td><?= $prod->brand ?></td>
                      <td><?= $prod->weight ?> gram</td>
                      <td>Rp. <?= number_format($prod->price); ?></td>
                      <td>
                        <img onclick="get_product_by_id(<?= $prod->product_id ?>)" src="<?= base_url() ?>assets/icons/edits.jpg"  alt="" style="cursor:pointer;width:20px;height:20px;">
                        <img onclick="delete_product(<?= $prod->product_id ?>)" src="<?= base_url() ?>assets/icons/trash.png" alt=""  style="cursor:pointer;width:20px;height:20px;">
                    </td>
                    </tr>
                  <?php } ?>

                  </tbody>
              </table>
          </div>

          <!-- ADD PRODUCT-->
          <div id="add-product" class="row" style="padding:30px;display:none;">
            <div class="title"></div>
            <?php
              $time = date("Y-m-d H:i:s");
             ?>
            <form id="form-add-product" method="post" action="<?= base_url()?>products/ajax_add" enctype="multipart/form-data">
              <input type="hidden" name="time_start" value="<?= $time ?>">
              <table>
                  <tr>
                    <td>Kategori</td>
                    <td>
                      <input onclick="showCategory()" readonly placeholder="Kategori" class="input input-location"  type="text" value="" id="label-kategori">
                      <style>
                      .pilih-kategori{
                        cursor:pointer;
                        padding:4px;
                        border-radius:4px;
                        background-color:#ececec;
                        margin-right:4px;
                      }
                      .pilih-kategori:hover{
                        background-color:#e8e8e8;
                      }
                      .sub-category-item{
                        float:left;
                      }
                      .category-area{
                        display:none;
                        background-color:white;
                        box-shadow:2px 1px 1px grey;
                        padding:4px;
                        height:200px;
                        overflow:auto;
                        float:left;
                      }
                      </style>
                        <div style="position:absolute">
                          <div id="category-area" class="category-area">
                            <div id="product-category">
                            </div>
                          </div>
                          <div id="category-sub-area" class="category-area">
                            <div id="product-sub-category">
                            </div>
                          </div>
                        </div>
                        <input id="product-category-id"  type="hidden" name="product_category_id" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Produk</td>
                    <td>
                      <input placeholder="Nama Produk" class="input input-location"  type="text" name="product_name" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>Deskripsi Produk</td>
                    <td>
                      <textarea name="description" rows="5" cols="30"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>
                      <input placeholder="Harga Produk" class="input input-location"  type="number" name="price" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>
                      <input type="radio" name="product_condition" value="Baru"> Baru
                      <input type="radio" name="product_condition" value="Bekas"> Bekas
                    </td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>
                      <input placeholder="Berat Produk" class="input input-location"  type="number" name="weight" value=""> gram
                    </td>
                  </tr>
                  <tr>
                    <td>Merek</td>
                    <td><input placeholder="Merek Produk" class="input input-location"  type="text" name="brand" value=""></td>
                  </tr>
                  <tr>
                    <td>Diskon</td>
                    <td><input placeholder="Diskon Produk" class="input input-location"  type="number" name="discount" value=""></td>
                  </tr>
                  <tr>
                    <td>Produk Variant</td>
                    <td><input placeholder="Produk Variant" class="input input-location"  type="text" name="product_variant_id" value=""></td>
                  </tr>
                  <tr>
                    <td>Stok</td>
                    <td><input placeholder="Stok" class="input input-location"  type="number" name="stock" value=""> Pcs</td>
                  </tr>
                  <tr>
                    <td>Image Produk</td>
                    <td>
                      <?php for ($i=1; $i <=4 ; $i++) :?>
                        <input type="file" name="image<?php echo $i;?>"><br/>
                      <?php endfor;?>
                    </td>
                  </tr>
                  <!-- <tr>
                    <td>Image 2</td>
                    <td><input type="file" name="img2" value=""> </td>
                  </tr>
                  <tr>
                    <td>Image 3</td>
                    <td><input type="file" name="img3" value=""> </td>
                  </tr>
                  <tr>
                    <td>Image 4</td>
                    <td><input type="file" name="img4" value=""> </td>
                  </tr> -->
                  <tr>
                    <td colspan="2">
                      <?php echo anchor('products','Kembali');?>
                      <button id="btn-reset-add-form" type="reset" >Reset</button>
                      <button type="submit" name="submit" id="save-category">Save</button>
                    </td>
                  </tr>
              </table>
            </form>
          </div>
          <!-- END OF ADD PRODUCT -->


          <!-- EDIT PRODUCT -->
          <div id="edit-product" class="row" style="padding:30px;display:none;">
            <form id="form-edit-product" class="" action="<?= base_url() ?>products/ajax_update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="">
            <div class="title"> </div>
            <table>
                <tr>
                  <td>Kategori</td>
                  <td>
                    <input onclick="showCategoryEdit()" readonly placeholder="Kategori" class="input input-location"  type="text" value="" id="label-kategori-edit">
                      <div style="position:absolute">
                        <div id="category-area-edit" class="category-area">
                          <div id="product-category-edit">
                          </div>
                        </div>
                        <div id="category-sub-area-edit" class="category-area">
                          <div id="product-sub-category-edit">
                          </div>
                        </div>
                      </div>
                      <input id="product-category-id-edit"  type="hidden" name="product_category_id" value="">
                  </td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td>
                    <input placeholder="Nama Produk" class="input input-location"  type="text" name="product_name" value="">
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi Produk</td>
                  <td>
                    <textarea name="description" rows="5" cols="30"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>
                    <input placeholder="Harga Produk" class="input input-location"  type="text" name="price" value="">
                  </td>
                </tr>
                <tr>
                  <td>Kondisi</td>
                  <td>
                    <input type="radio" name="condision_edit" value="Baru"> Baru
                    <input type="radio" name="condision_edit" value="Bekas"> Bekas
                  </td>
                </tr>
                <tr>
                  <td>Berat</td>
                  <td>
                    <input placeholder="Berat Produk" class="input input-location"  type="text" name="weight" value=""> Gram
                  </td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td><input placeholder="Merek Produk" class="input input-location"  type="text" name="brand" value=""></td>
                </tr>
                <tr>
                  <td>Diskon</td>
                  <td><input placeholder="Diskon Produk" class="input input-location"  type="text" name="discount" value=""> Rp</td>
                </tr>
                <tr>
                  <td>Produk Variant</td>
                  <td><input placeholder="Produk Variant" class="input input-location"  type="text" name="product_variant_id" value=""></td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td><input placeholder="Stok" class="input input-location"  type="number" name="stock" value=""> Pcs</td>
                </tr>
                <tr>
                  <td>Image Produk</td>
                  <td>
                    <?php for ($i=1; $i <=4 ; $i++) :?>
                      <input id="image<?php echo $i;?>" type="file" name="image<?php echo $i;?>"><br/>
                  <?php endfor;?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <?php for ($i=1; $i <=4 ; $i++) :?>
                    <img id="img<?php echo $i;?>" alt="" style="width:100px;height:100px;">
                    <?php endfor;?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" name="submit" id="save-category">Save</button>
                    <button type="reset" >Cancel</button>
                    <?php echo anchor('products','Kembali');?>
                  </td>
                </tr>

            </table>
            </form>
          </div>
          <!-- END OF EDIT PRODUCT -->

      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
<script>
  var productCategory = <?=json_encode($allcategory->data)?>;

  var productCategrory = document.getElementById('category-area');
  var productSubCategrory = document.getElementById('product-sub-category');
  var labelKategori = document.getElementById('label-kategori');
  
  var productCategroryEdit = document.getElementById('category-area-edit');
  var productSubCategroryEdit = document.getElementById('product-sub-category-edit');
  var labelKategoriEdit = document.getElementById('label-kategori-edit');

  var html = "";
  var categoryForBackTemp = [];
  var subCategory = [];
  var htmlSub= "";

  function getProductCategory(){
    html = "<div style=\"float:left;height:200px;overflow:auto;\">";
    for(var i=0;i<productCategory.length;i++){
      html += "<div id=\"sub-category-group-"+0+"\" onclick=\"getSubCategory("+i+",1,0,this,'"+productCategory[i].product_category_id+"')\" class=\"pilih-kategori\">"+productCategory[i].product_category_name+" <img style=\"width:10px;height:10px\" src=\"<?=base_url().'assets/icons/right-chevron.svg'?>\"> </div>";
    }
    html += "</div>";
    
    productCategrory.innerHTML = html;

  }

  getProductCategory();

  var textMapCategory = [];
  function getSubCategory(index,isParent, idGroup, objectTag, productCatId ){

    if(isParent==1){
      subCategory = productCategory[index].sub_category;
      htmlSub = ""; //empty if parent click
      textMapCategory = [];
      if(subCategory.length == 0){
        var getCategoryGroup = parseInt(objectTag.id.replace('sub-category-group-',''));
        
        textMapCategory[getCategoryGroup] = productCategory[index].product_category_name;
        //set to label Kategori
        labelKategori.value = textMapCategory.toString().replace(/,/g,' > ');

        $('#product-category-id').val(productCatId);
        $('#category-area').hide(100);
        $('#category-sub-area').hide(100);
      }else{
        $('#category-sub-area').show(100);
      }
      textMapCategory.push(productCategory[index].product_category_name);
    }else{
      // console.log("subCategory",subCategory);

      var getCategoryGroup = parseInt(objectTag.id.replace('sub-category-group-',''))+1;
      textMapCategory[getCategoryGroup] = subCategory[index].product_category_name;
      
      subCategory = subCategory[index].sub_category;
      if(subCategory.length == 0){
        //set to label Kategori
        labelKategori.value = textMapCategory.toString().replace(/,/g,' > ');
        htmlSub = "";

        $('#product-category-id').val(productCatId);
        $('#category-area').hide(100);
        $('#category-sub-area').hide(100);
      }
    }
    // console.log(textMapCategory);
    
    htmlSub += "<div style=\"float:left;height:200px;overflow:auto;\">";
    for(var i=0;i<subCategory.length;i++){
      htmlSub += "<div id=\"sub-category-group-"+idGroup+"\" onclick=\"getSubCategory("+i+",0,"+(idGroup+1)+",this,'"+subCategory[i].product_category_id+"')\" class=\"pilih-kategori\">"+subCategory[i].product_category_name+" <img style=\"width:10px;height:10px\" src=\"<?=base_url().'assets/icons/right-chevron.svg'?>\"> </div>";
    }
    htmlSub += "</div>";
    productSubCategrory.innerHTML = htmlSub;
    // productCategrory.innerHTML = html;
  }

  function showCategory(){
    if(productCategory.length>0){
      $('#category-area').show(100);
      $('#category-sub-area').show(100);
    }else{
      alert('Harap isi data kategori produk lebih dulu');
    }
    
  }

  // EDIT

  function getProductCategoryEdit(){
    html = "<div style=\"float:left;height:200px;overflow:auto;\">";
    for(var i=0;i<productCategory.length;i++){
      html += "<div id=\"sub-category-group-"+0+"\" onclick=\"getSubCategoryEdit("+i+",1,0,this,'"+productCategory[i].product_category_id+"')\" class=\"pilih-kategori\">"+productCategory[i].product_category_name+" <img style=\"width:10px;height:10px\" src=\"<?=base_url().'assets/icons/right-chevron.svg'?>\"> </div>";
    }
    html += "</div>";
    
    productCategroryEdit.innerHTML = html;
    
    var textMapCategoryTmp = "";
    for(var i=0;i<productCategory.length;i++){
      getSubCategoryForEdit(productCategory[i].sub_category);
    }
    console.log(textMapCategoryTmp);
  }

  function getSubCategoryForEdit(subCategoryList){
    if(subCategoryList.length==0){
      return;
    }
    for(var i=0;i<productCategory.length;i++){
      if(productCategory[i].product_category_id == 23){
        console.log("STOP",productCategory[i].product_category_id);
        return;
      }
      getSubCategoryForEdit(productCategory[i].sub_category);
    }
  }



  getProductCategoryEdit();

  function getSubCategoryEdit(index,isParent, idGroup, objectTag, productCatId ){

    if(isParent==1){
      subCategory = productCategory[index].sub_category;
      htmlSub = ""; //empty if parent click
      textMapCategory = [];
      if(subCategory.length == 0){
        var getCategoryGroup = parseInt(objectTag.id.replace('sub-category-group-',''));
        
        textMapCategory[getCategoryGroup] = productCategory[index].product_category_name;
        //set to label Kategori
        labelKategoriEdit.value = textMapCategory.toString().replace(/,/g,' > ');

        $('#product-category-id').val(productCatId);
        $('#category-area').hide(100);
        $('#category-sub-area').hide(100);
      }else{
        $('#category-sub-area').show(100);
      }
      textMapCategory.push(productCategory[index].product_category_name);
    }else{
      // console.log("subCategory",subCategory);

      var getCategoryGroup = parseInt(objectTag.id.replace('sub-category-group-',''))+1;
      textMapCategory[getCategoryGroup] = subCategory[index].product_category_name;
      
      subCategory = subCategory[index].sub_category;
      if(subCategory.length == 0){
        //set to label Kategori
        labelKategoriEdit.value = textMapCategory.toString().replace(/,/g,' > ');
        htmlSub = "";

        $('#product-category-id-edit').val(productCatId);
        $('#category-area-edit').hide(100);
        $('#category-sub-area-edit').hide(100);
      }
    }
    // console.log(textMapCategory);

    htmlSub += "<div style=\"float:left;height:200px;overflow:auto;\">";
    for(var i=0;i<subCategory.length;i++){
      htmlSub += "<div id=\"sub-category-group-"+idGroup+"\" onclick=\"getSubCategoryEdit("+i+",0,"+(idGroup+1)+",this,'"+subCategory[i].product_category_id+"')\" class=\"pilih-kategori\">"+subCategory[i].product_category_name+" <img style=\"width:10px;height:10px\" src=\"<?=base_url().'assets/icons/right-chevron.svg'?>\"> </div>";
    }
    htmlSub += "</div>";
    productSubCategroryEdit.innerHTML = htmlSub;
    // productCategrory.innerHTML = html;
    }

  function showCategoryEdit(){
    if(productCategory.length>0){
      $('#category-area-edit').show(100);
      $('#category-sub-area-edit').show(100);
    }else{
      alert('Harap isi data kategori produk lebih dulu');
    }
    
  }
</script>
<script>
$(document).ready(function (e){
  $("#form-add-product").on('submit',(function(e){
    e.preventDefault();
    console.log(this);

    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: $(this).attr('action'),
      data:formData,
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
         try{
          var data = JSON.parse(data);
          if(data.code == 200){
            alert(data.message);
            $("#form-add-product")[0].reset()
          }else{
            alert(data.message);
          }
         }catch(err){
          alert('Gagal menambahkan produk, (409)');
          //console.log(data);
         }
         //location.reload();
      },
      error: function(){
        alert('Gagal menambahkan produk, (500)');
      }
    });
  }));
});

function get_product_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/products/';
  $.ajax({
    url : "<?php echo base_url('products/ajax_get_product_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        $('[name="product_id"]').val(data.product_id);
        $("#select_category_edit").val(data.product_category_id);
        $("#img1").attr("src", api_img+data.image1);
        $("#img2").attr("src", api_img+data.image2);
        $("#img3").attr("src", api_img+data.image3);
        $("#img4").attr("src", api_img+data.image4);
        $('[name="product_name"]').val(data.product_name);
        $('[name="description"]').val(data.description);
        $('[name="price"]').val(data.price);
        // $("input:radio[name=condision_edit][value=" + data[0].condision + "]").attr('checked', 'checked');
        // $("input[name='"+name+"'][value='"+value+"']").prop('checked', true);
        $('input[name="condision_edit"]').filter("[value=" +data.condision +"]").attr('checked', true);
        $('[name="weight"]').val(data.weight);
        $('[name="brand"]').val(data.brand);
        $('[name="discount"]').val(data.discount);

        $('#data-product').hide();
        $('#edit-product').fadeIn();
        $('#edit-product .title').html('<h2>Edit Produk</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}
</script>
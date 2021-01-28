<div class="col-desk-9 col-sm-9">

  <div class="row" style="padding:30px;">
    <button type="button" id="btn-add">+Add New Product</button>
      <table class="table table-striped" id="products" width="100%" style="text-align:left;font-size:12px;">
          <thead>
              <tr>
                  <th width="5%">No</th>
                  <th width="15%">Nama Product</th>
                  <th width="10%">Brand</th>
                  <th width="15%">Kategori</th>
                  <th width="10%">Berat Produk</th>
                  <th width="15%">Harga</th>
                  <th width="15%">Image</th>
                  <th width="10%">Action</th>
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
              <td><?= $prod->product_name ?></td>
              <td><?= $prod->brand ?></td>
              <td><?= $prod->product_category_id ?></td>
              <td><?= $prod->weight ?> Kg</td>
              <td><?= $prod->price ?></td>
              <td>
                <img width="40%"src="assets/icons/<?= $prod->image1 ?>" alt="">
              </td>
              <td>
                <?= anchor('category/edit/'.$prod->product_id,'Edit') ." | ".
                    anchor('category/delete/'.$prod->product_id,'Delete') ?>
            </td>
            </tr>
          <?php } ?>

          </tbody>
      </table>
  </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

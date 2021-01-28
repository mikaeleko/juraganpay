<div class="col-desk-9 col-sm-9">

  <div class="row" style="padding:30px;">
      <button type="button" id="btn-add">+Add New Category</button>
      <table class="table table-striped" id="products" width="100%" style="text-align:left;font-size:12px;">
          <thead>
              <tr>
                  <th width="5%">No</th>
                  <th width="15%">Kategori</th>
                  <th width="15%">Sub Kategori</th>
                  <th width="15%">Is Parent</th>
                  <th width="15%">Icon</th>
                  <th width="15%">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $x=0;
            foreach ($category as $cat) {
            $x++;

            ?>
            <tr>
              <td><?= $x ?></td>
              <td><?= $cat->product_category_name ?></td>
              <td><?= $cat->product_sub_category_id ?></td>
              <td><?= $cat->is_parent ?></td>
              <td><?= $cat->icon ?></td>
              <td><?= anchor('category/edit/'.$cat->product_category_id,'Edit') ." | ".
              anchor('category/delete/'.$cat->product_category_id,'Delete') ?></td>
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

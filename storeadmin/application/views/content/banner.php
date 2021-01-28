<div class="col-desk-9 col-sm-9">

  <div class="row" style="padding:30px;">
      <a href="<?= base_url()?>banner/create"><button type="button" id="btn-add">+Add New Banner</button></a>
      <table class="table table-striped" id="products" width="100%" style="text-align:left;font-size:12px;">
          <thead>
              <tr>
                  <th width="5%">No</th>
                  <th width="15%">Deskripsi Banner</th>
                  <th width="15%">Image Banner</th>
                  <th width="15%">Link Click</th>
                  <th width="15%">Time Start</th>
                  <th width="15%">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $x=0;
            foreach ($banner as $ban) {
            $x++;
            ?>
            <tr>
              <td><?= $x ?></td>
              <td><?= $ban->description ?></td>
              <td>
                <img width="40%"src="assets/icons/<?= $ban->image_name ?>" alt="">

              </td>
              <td><?= $ban->link_click ?></td>
              <td><?= $ban->time_start ?></td>
              <td><?= anchor('category/edit/'.$ban->banner_id,'Edit') ." | ".
              anchor('category/delete/'.$ban->banner_id,'Delete') ?></td>
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

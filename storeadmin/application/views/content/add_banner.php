      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">
          <?php echo form_open_multipart('banner/create');?>
          <table>
              <tr>
                <td>Image Banner</td>
                <td>
                  <input type="file" name="image" value="">                
                </td>
              </tr>
              <tr><td>Link Click</td><td><?php echo form_input('link');?></td></tr>
              <tr><td>Deskripsi Banner</td><td><?php echo form_input('description');?></td></tr>
              <tr><td colspan="2">
                  <?php echo form_submit('submit','Simpan');?>
                  <?php echo anchor('banner','Kembali');?></td></tr>
          </table>
          <?php
          echo form_close();
          ?>

        </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

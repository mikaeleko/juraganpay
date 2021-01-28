<div class="col-desk-9 col-sm-9">

        <div id="data-member" class="row" style="padding:30px;">
            <table class="display" id="member" width="100%" style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kontak</th>
                        <th>Tgl Daftar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php

                  $x=0;
                  foreach ($member as $mem) {
                  $x++;
                  ?>
                  <tr>
                    <td><?= $x ?></td>
                    <td><?= $mem->full_name ?></td>
                    <td><?= $mem->email ?></td>
                    <td><?= $mem->phone ?></td>
                    <td><?= date_format(date_create($mem->join_date),"d-m-Y") ?></td>
                    <td>
                      <img title="Lihat Detail" onclick="get_member_by_id(<?= $mem->member_id ?>)" src="<?= base_url() ?>assets/icons/view.png" width="10%" alt="" style="cursor:pointer;">
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- VIEW MEMBER -->
        <div id="view-member" class="row" style="padding:30px;display:none;">
          <div class="title"> </div>
          <a href="<?= base_url() ?>member">Back</a>
          <table >
              <tr>
                <td colspan="2">
                  <img id="img" src="" alt="" width="30%">
                </td>
              </tr>
              <tr>
                <td >
                  Nama Member
                </td>
                <td>
                  <span id="full_name"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Email
                </td>
                <td>
                  <span id="email"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Kontak
                </td>
                <td>
                  <span id="kontak"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Tanggal Daftar
                </td>
                <td>
                  <span id="join_date"></span>
                </td>
              </tr>
          </table>

        </div>
        <!-- END OF EDIT MEMBER -->



      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/jquery.dataTables.js'?>"></script>
<script>
function get_member_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/member/';
  $.ajax({
    url : "<?php echo base_url('member/ajax_get_member_by_id?id=')?>"+id,

    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        // console.log(data[0].icon);
        $("#img").attr("src", api_img+data[0].usr_img_name);
        $("#full_name").html(data[0].full_name);
        $("#email").html(data[0].email);
        $("#kontak").html(data[0].kontak);
        $("#join_date").html(data[0].join_date);


        $('#data-member').hide();
        $('#view-member').fadeIn();
        $('#view-member .title').html('<h2>Detail Member</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}
</script>
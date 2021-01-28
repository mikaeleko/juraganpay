
<div class="header2" >
    <div class="header-logo">
        <img src="<?php echo base_url() ?>images/asset/default-logo-menu.png" style="width:50px; height:50px;vertical-align:middle;border-radius:50px;margin-top:15px;margin-left:10px">
        <img style="vertical-align:middle;text-align:center;margin-top:15px" width="200px" height="50px" src="<?php echo base_url() ?>images/logoST24/whitest24.svg">
    </div>
    <div class="list-menu" id="list-menu-dashboard">
        <a id="menulist1" href="<?php echo base_url() ?>">HOME</a>
        <a id="menulist2" class="list" href="<?php echo base_url() ?>produk">PRODUK</a>
        <a id="menulist3" class="list" href="<?php echo base_url() ?>pendaftaran">PENDAFTARAN</a>
        <a id="menulist4" class="list" href="<?php echo MEMBER_AREA ?>" target="_blank">MEMBER AREA</a>
        <a id="menulist5" class="list" href="<?php echo base_url() ?>jabbers">JABBER</a>
        <?php if(SHOW_ONLINE_STORE_MENU){ ?>
        <a href="<?php echo ONLINE_STORE ?>" target="_blank">TOKO ONLINE</a>
        <?php } ?>

        <?php if(SHOW_ADMIN_WEB){ ?>
        <a href="<?php echo ADMIN_WEB ?>" target="_blank">ADMIN WEB</a>
        <?php } ?>

        <a class="company-name-style" href="#"><span class="company-name-style"><?=COMPANY_NAME?></span></a>
    </div>
    <div class="image-menu">
        <img src="<?php echo base_url() ?>/images/asset/menu.svg" alt="" onclick="showMenuDashboard()">
    </div>
</div>

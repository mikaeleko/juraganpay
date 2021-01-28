<!--CAPTCHA INPUT -->
<div id="box-captcha to-right" style="margin: 10px 30px 10px 30px;">
  <img id="captcha" src="<?=site_url('otentikasi/securimage')?>" alt='captcha' />
  <input id="capcode" type="text" name="captcha_code" size="15" placeholder="Input Captcha"/>
  <a href="#" onclick="window.location.reload();">
  <img style="height:32px;width:32px;margin:0 auto;vertical-align: middle;" src="<?php echo base_url() ?>/images/refreshblue2.png" alt="Refresh Captcha" onclick="this.blur()" style="border:0px;vertical-align:bottom;">
  </a>
</div>
<div style="">
  <input id="submit" type="submit">
</div>

<div id="alert" style="display:none;color:blue;font-size:12px;text-align:left;"> </div>

<div id='sukses_msg' style='display: none; '>
  <div id='content_result'>
    <div id='sukses_show' class="w3-text-red">
      <div id='sukses' style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;"> </div>
      <div id="ikon" style="border:1px; width:auto; height:40px; padding:2px; color:green; font-size:15px;text-align:left;display:table;">
        <img src="<?=base_url()?>/assets/img/save.jpg" style="width:40px; height:40px;">
      </div>
    </div>
  </div>
</div>

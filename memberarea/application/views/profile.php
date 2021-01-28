<div class="profile-info">
    <span id="text-name" class="segoe"></span><br>
    <span id="text-balance" class="segoe"></span><br>
    <a href="<?php echo base_url() ?>topup" type="button" class="button-topup" onclick="onClickTopup()" style="margin:0;background-color:rgb(0, 175, 233);color:white;font-weight:800;font-size:15px;">TOP UP</a>
</div>

<script>
    var outletName = "";//untuk outlet name cetak struk
    function gettingBalance(){
        var t = getDateTime2();
        var h = sha1('<?=$this->session->userdata('store_id')?>' + '<?=$this->session->userdata('username')?>' + t);

        $.ajax({
            type: "POST",
            url:  "<?php echo base_url(); ?>" + "webreport/get_profile",
            data: JSON.stringify({
                store_id : "<?=$this->session->userdata('store_id')?>",
                uname    : "<?=$this->session->userdata('username')?>",
                t        : t,
                h        : h
            }),
            contentType: "application/json;",
            cache: false,
            success: function(result){
                // loading.display = "none";
                var rs = JSON.parse(result);
                // console.log(rs);
                document.getElementById("text-balance").innerHTML = "Rp "+rs.BALANCE;
                // document.getElementById("text-name").innerHTML = rs.FULL_NAME;
                document.getElementById("text-name").innerHTML = "<?php echo $this->session->userdata('fullname')?>";
                outletName = rs.FULL_NAME;

            },
            error: function (request, status, error) {
                //   console.log(request.responseText);
                loading.display = "none";
            }
        });
    }

    function getDateTime2() {
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
    gettingBalance();

    function onClickTopup(){
        var base_url = "";
        var urlTmp = document.URL;
        var urlSplit = urlTmp.split("/");
        for(var i = 0; i< 4; i ++){
            base_url += urlSplit[i]+"/";
        }

    }

</script>

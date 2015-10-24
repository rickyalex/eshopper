<?php

$rs = $mysqli->query("SELECT * FROM social") or die(mysql_error());
if($row = $rs->fetch_array(MYSQLI_ASSOC))
{
    $bbm = $row['bbm'];
    $whatsapp = $row['whatsapp'];
    $line = $row['line'];
    $ym = $row['ym'];
    $sms = $row['sms'];
    $viber = $row['viber'];
    $kakao = $row['kakao'];
    $instagram = $row['instagram'];
    $twitter = $row['twitter'];
    $facebook = $row['facebook'];
    $gtalk = $row['gtalk'];
}
?>
    <?php if($bbm!='') { ?><div class="social_logo"><img src="images/icon-bbm.png" alt="" /></div><p><?php echo $bbm; ?></p><br /><?php } ?>
    <div class="clearfix"></div>
<?php if($whatsapp!='') { ?><div class="social_logo"><img src="images/icon-whatsapp.png" alt="" /></div><p><?php echo $whatsapp; ?></p><br /><?php } ?>
<div class="clearfix"></div>
<?php if($line!='') {  ?><div class="social_logo"><img src="images/icon-line.png" alt="" /></div><p><?php echo $line; ?></p><br /><?php } ?>
<div class="clearfix"></div>
<?php if($ym!='') {  ?><div class="social_logo"><img src="images/icon-ym.png" alt="" /></div><p><?php echo $ym; ?></p><br /><?php } ?>
<div class="clearfix"></div>
<?php if($sms!='') {  ?><div class="social_logo"><img src="images/icon-sms.png" alt="" /></div><p><?php echo $sms; ?></p><br /><?php } ?>
<div class="clearfix"></div>
<?php if($viber!='') {  ?><div class="social_logo"><img src="images/icon-viber.png" alt="" /></div><p><?php echo $viber; ?></p><br /><?php } ?>
<div class="clearfix"></div>
<?php if($kakao!='') {  ?><div class="social_logo"><img src="images/icon-kakao.png" alt="" /></div><p><?php echo $kakao; ?></p><br /><?php } ?>
<div class="clearfix"></div>

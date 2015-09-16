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
<?php if($bbm!='') { ?><img src="images/icon-bbm.png" alt="" /><p><?php echo $bbm; ?></p><br /><?php } ?>
<?php if($whatsapp!='') { ?><img src="images/icon-whatsapp.png" alt="" /><p><?php echo $whatsapp; ?></p><br /><?php } ?>
<?php if($line!='') {  ?><img src="images/icon-line.png" alt="" /><p><?php echo $line; ?></p><br /><?php } ?>
<?php if($ym!='') {  ?><img src="images/icon-ym.png" alt="" /><p><?php echo $ym; ?></p><br /><?php } ?>
<?php if($sms!='') {  ?><img src="images/icon-sms.png" alt="" /><p><?php echo $sms; ?></p><br /><?php } ?>
<?php if($viber!='') {  ?><img src="images/icon-viber.png" alt="" /><p><?php echo $viber; ?></p><br /><?php } ?>
<?php if($kakao!='') {  ?><img src="images/icon-kakao.png" alt="" /><p><?php echo $kakao; ?></p><br /><?php } ?>

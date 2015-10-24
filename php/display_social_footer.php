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
<div class="col-sm-12">
    <div class="social-footer-content">
        <img src="images/icon-bbm.png"/>
        <p><?php echo $bbm; ?></p>
        <span class="clearfix"></span>
        <img src="images/icon-line.png"/>
        <p><?php echo $line; ?></p>
        <span class="clearfix"></span>
        <img src="images/icon-whatsapp.png"/>
        <p><?php echo $whatsapp; ?></p>
        <span class="clearfix"></span>
        <img src="images/icon-ym.png"/>
        <p><?php echo $ym; ?></p>
        <span class="clearfix"></span>
    </div>
</div>

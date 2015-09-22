<?php
include('../inc/functions.php');
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$date = $thn."-".$bln."-".$tgl;
//die("dasd".$date);
$array = getListResi($date);
$x=0;
if(count($array) > 0){
?>
    <p><?php echo $date; ?></p>
    <ol>
        <?php while($x < count($array)){ ?>
            <li><?php echo $array["nomor_resi"]." ".$array["nama"]; ?></li>
        <?php } ?>    
    </ol>
<?php
}
else{
?>
    <p>No Results</p>
<?php
} 

?>
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
    <h3><b><?php echo $tgl." ".date('F', mktime(0, 0, 0, $bln, 10))." ".$thn; ?></b></h3><p>*Untuk mempermudah pencarian, tekan Ctrl+F</p>
    <table id="table_resi">
		<tr><td>No</td><td>Nomor Resi</td><td>Nama</td><td>Kota</td></tr>
        <?php while($x < count($array)){ ?>
			<tr><td><?php echo $x+1; ?></td><td><?php echo $array[$x]["nomor_resi"]; ?></td><td><?php echo $array[$x]["nama"]; ?></td><td><?php echo $array[$x]["remarks"]; ?></td></tr>
        <?php $x++; } ?>    
    </table>
<?php
}
else{
?>
    <p>No Results</p>
<?php
} 

?>

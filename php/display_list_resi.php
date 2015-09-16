<?php
$rs = $mysqli->query("SELECT distinct date_created as tgl FROM resi order by date_created desc") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['tgl'] = $row['tgl'];
			$i++;
		}
$x=0;
while($x < count($array)) {
?>
    <b><?php echo $array[$x]['tgl']; ?></b>
    <ol>
<?php
    $rs2 = $mysqli->query("SELECT nomor_resi, nama, remarks FROM resi WHERE date_created='".$array[$x]['tgl']."' order by date_created desc") or die(mysql_error());
    $y=0;
    $array=array();
    while($row = $rs2->fetch_array(MYSQLI_ASSOC))
    {    
?>
        <li><?php echo $row['nomor_resi']." ".$row['nama']." ".$row['remarks']; ?></li>
<?php
    }
}    
?>
</ol>

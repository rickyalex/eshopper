<?php
    $rs2 = $mysqli->query("SELECT * FROM testimoni order by date_created desc") or die(mysql_error());
    $y=0;
    $array=array();
    while($row = $rs2->fetch_array(MYSQLI_ASSOC))
    {    
?>
    <div class="col-sm-12">
        <div class="single-testimoni">
            <span><?php echo $row['nama']." - ".$row['kota']; ?></span>
            <p class="date"><?php echo $row['date_created']; ?></p>
            <p><?php echo $row['comment']; ?></p>
        </div>
    </div>    
<?php
    }    
?>

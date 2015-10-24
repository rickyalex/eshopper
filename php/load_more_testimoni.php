<?php
    include("../inc/functions.php");
    
    $content = $_POST['content'];
    $array = array();
    
    if($content=="list") {
        $array=getTestimoniList();
        $x = 0;
        $limit = 8;

        if (count($array) > $limit)
            $max = $limit;
        else
            $max = count($array);

        while ($x < $max) {
?>
                <div class="col-sm-12">
                    <div class="single-testimoni">
                        <span><?php echo $array[$x]['nama'] . " - " . $array[$x]['kota']; ?></span>
                        <p class="date"><?php echo $array[$x]['date_created']; ?></p>
                        <p><?php echo $array[$x]['comment']; ?></p>
                    </div>
                </div>    
<?php
            $x++;
        }
    }
    else{
        echo "asu";
    }
?>


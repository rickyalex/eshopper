<?php
function getDB(){
    //$mysqli = new mysqli("localhost", "nicholfa_public", "nicholfashion321", "nicholfa_fashion") or die(mysql_error()); 
    $mysqli = new mysqli("localhost", "nicholfa_public", "nicholfashionpublic321", "nicholfa_fashion") or die(mysql_error());
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
    
    return $mysqli;    
}

function urlize($name){
    if(str_word_count($name) > 1){
        $bits = explode(" ",$name);
        $count = count($bits);
        $str = "";
        for($x=0;$x+1<$count;$x++){
            $str .= $bits[$x]."-".$bits[$x+1];
        }
        
        $result = $str;
    }
    else $result = $name;
    
    return $result;
}

function updateViews($name){
    $mysqli = getDB();
    
    $rs = $mysqli->query("UPDATE items SET views=(views+10) where name='$name'") or die(mysql_error());
}

function insertStats($name){
    $mysqli = getDB();
    $sql = "INSERT INTO items_stats(item_id,view_date,browser) values('$name','".date('Y-m-d h:i:s')."','".$_SERVER['HTTP_USER_AGENT']."')";
    //echo "sql".$sql;
    $rs = $mysqli->query($sql) or die(mysql_error());
}

function randomNumber($length) {
    $result = '';
    
    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    
    return $result;
}

function countRows($table) {
    $mysqli = getDB();
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
    
    $rs = $mysqli->query("SELECT count(*) as count FROM $table") or die(mysql_error());
    $row = $rs->fetch_array(MYSQLI_ASSOC);
    $count = $row['count'];
    return $count;
}

function getAllSlider(){
    $active="1";
    $result=array();
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "select img from slider where active=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $active);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($img);
        /* fetch into variables */
        while($stmt->fetch())
        {
            $bindResults = array(
                "img" => $img
            );
            array_push($result, $bindResults);
        }
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getAllCategory(){
    $active="1";
    $result=array();
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "SELECT distinct category FROM items where active=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $active);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($category);
        /* fetch into variables */
        while($stmt->fetch())
        {
            $bindResults = array(
                "category" => $category
            );
            array_push($result, $bindResults);
        }
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getItemRating($id){
    /* retrieve database instance */
    $mysqli = getDB();
    $query = "SELECT rating FROM items where id=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($rating);
        /* fetch into variables */
        $stmt->fetch();
        $result = $rating;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function setItemRating($score,$id){
    /* retrieve database instance */
    $mysqli = getDB();
    $query = "SELECT rating FROM items where id=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($rating);
        /* fetch into variables */
        $stmt->fetch();
        $result = $rating;
    }
    
    $newRating = ($result + $score)/2;
    $mysqli->close();
    
    $mysqli = getDB();
    $query2 = "UPDATE items set rating=? where id=?";
    if ($stmt2 = $mysqli->prepare($query2)) {
        /* bind parameters for markers */
        $stmt2->bind_param('ss', $newRating, $id);
        /* execute query */
        $stmt2->execute();
        $result2 = $score;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result2;
}

function getItemCategory($id){
    /* retrieve database instance */
    $mysqli = getDB();
    $query = "SELECT category FROM items where id=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($category);
        /* fetch into variables */
        $stmt->fetch();
        $result = $category;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getItemCategorybyName($name){
    if(strpos($name,"_")==true) $realName = str_ireplace("_"," ",$name);
    else $realName = $name;
    /* retrieve database instance */
    $mysqli = getDB();
    $query = "SELECT category FROM items where name=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $realName);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($category);
        /* fetch into variables */
        $stmt->fetch();
        $result = $category;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getCategoryBar(){
    $result = array();
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    /* define limit */
    $limit = "6";
    
    $query = "SELECT distinct category FROM items where active=? order by date_created desc limit ?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('ss', $active, $limit);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($category);
        /* fetch into variables */
        while($stmt->fetch())
        {
            $bindResults = array(
                "category" => $category
            );
            array_push($result, $bindResults);
        }
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getItemDescription($id){
    /* retrieve database instance */
    $mysqli = getDB();
    $query = "SELECT description FROM items where id=?";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($description);
        /* fetch into variables */
        $stmt->fetch();
        $result = $description;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getProductDetails($id){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "SELECT id, name, sku, description, brand, size, color, price, category, active, img, flag_featured, date_created FROM items where id=?";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $sku, $description, $brand, $size, $color, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "sku" => $sku, 
                "description" => $description, 
                "brand" => $brand,
                "size" => $size,
                "color" => $color,  
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getProductDetailsbyName($name){
    $result=array();
    $x=0;
    
    if(strpos($name,"_")==true) $realName = str_ireplace("_"," ",$name);
    else $realName = $name;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "SELECT id, name, sku, description, brand, size, color, price, category, active, img, flag_featured, date_created FROM items where name=?";
    //die("query :".$realName);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $realName);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $sku, $description, $brand, $size, $color, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "sku" => $sku, 
                "description" => $description, 
                "brand" => $brand,
                "size" => $size,
                "color" => $color,  
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getNewItems(){
    $result=array();
    $x=0;
    $active = "1";
    $flag_featured = "1";
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "SELECT id, name, sku, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and flag_featured=? order by id desc, date_created desc limit 20";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('ss', $active, $flag_featured);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $sku, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "sku" => $sku, 
                "description" => $description, 
                "brand" => $brand, 
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;

}

function getSearchItems($mode,$content,$content2,$limit){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    ///* define default limit */
//    if($limit==null) $limit = 12;
    
    if($mode=='category'){
        if($content=='all'){
            $active = "1";
            //$query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by date_created desc limit ?";
            $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? order by id desc";
            if ($stmt = $mysqli->prepare($query)) {
                /* bind parameters for markers */
                //$stmt->bind_param('sss', $active, $content, $limit);
                $stmt->bind_param('s', $active);
                /* execute query */
                $stmt->execute();
                /* bind results */
                $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
                while ($stmt->fetch()) {
                    $bindResults = array(
                        "id" => $id,
                        "name" => $name,
                        "description" => $description,
                        "brand" => $brand,
                        "price" => $price,
                        "category" => $category,
                        "active" => $active,
                        "img" => $img,
                        "flag_featured" => $flag_featured,
                        "date_created" => $date_created
                    );
                    array_push($result, $bindResults);
                }
                /* close statement */
                $stmt->close();
                /* count total array and loop through it */
                //die(print_r($result));
            } else
                die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        }
        else{
            $active = "1";
            if ($content2 != '') {
                $bits = explode("_", $content2);
                $price_begin = $bits[0];
                $price_end = $bits[1];

                $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? and price between ? and ? order by id desc";
                $stmt = $mysqli->prepare($query);
                /* bind parameters for markers */
                $stmt->bind_param('ssss', $active, $content, $price_begin, $price_end);
            } else {
                $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by id desc";
                $stmt = $mysqli->prepare($query);
                /* bind parameters for markers */
                $stmt->bind_param('ss', $active, $content);
            }

            //$query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by date_created desc limit ?";
            /* execute query */
            $stmt->execute();
            /* bind results */
            $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
            while ($stmt->fetch()) {
                $bindResults = array(
                    "id" => $id,
                    "name" => $name,
                    "description" => $description,
                    "brand" => $brand,
                    "price" => $price,
                    "category" => $category,
                    "active" => $active,
                    "img" => $img,
                    "flag_featured" => $flag_featured,
                    "date_created" => $date_created
                );
                array_push($result, $bindResults);
            }
            /* close statement */
            $stmt->close();
            /* count total array and loop through it */
        } 
    }
    elseif($mode=='price'){
        $active = "1";
        $bits = explode("_",$content);
        $price_begin = $bits[0];
        $price_end = $bits[1];
        //die($content);
        //$query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by date_created desc limit ?";
        $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and price between ? and ? order by id desc";
        if ($stmt = $mysqli->prepare($query)) {
            /* bind parameters for markers */
            //$stmt->bind_param('sss', $active, $content, $limit);
            $stmt->bind_param('sss', $active, $price_begin, $price_end);
            /* execute query */
            $stmt->execute();
            /* bind results */
            $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
            while ($stmt->fetch()) {
                $bindResults = array(
                    "id" => $id,
                    "name" => $name,
                    "description" => $description,
                    "brand" => $brand,
                    "price" => $price,
                    "category" => $category,
                    "active" => $active,
                    "img" => $img,
                    "flag_featured" => $flag_featured,
                    "date_created" => $date_created
                );
                array_push($result, $bindResults);
            }
            /* close statement */
            $stmt->close();
            /* count total array and loop through it */
            //die(print_r($result));
        } else
            die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    }
    else{
        /* define parameter */
        $param = "%$content%";
        $active = "1";
        $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? having name like ? or brand like ? or category like ? order by id desc";
        //die("query :".$query);
        if ($stmt = $mysqli->prepare($query)) {
            /* bind parameters for markers */
            $stmt->bind_param('ssss', $active,$param,$param,$param);
            /* execute query */
            $stmt->execute();
            /* bind results */
            $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
            while($stmt->fetch())
            {
                $bindResults = array(
                    "id" => $id, 
                    "name" => $name, 
                    "description" => $description, 
                    "brand" => $brand, 
                    "price" => $price, 
                    "category" => $category, 
                    "active" => $active, 
                    "img" => $img, 
                    "flag_featured" => $flag_featured, 
                    "date_created" => $date_created
                );
                array_push($result, $bindResults);
            }
            /* close statement */
            $stmt->close();
            //die(print_r($result));
        }
        else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    }
    
    return $result;
}

function getOtherItems($id){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    /* get item category */
    $category = getItemCategory($id);
    
    $active = "1";
    $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? and id <> ? order by date_created desc limit 8";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('sss', $active,$category,$id);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "description" => $description, 
                "brand" => $brand, 
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getOtherItemsbyName($name){
    $result=array();
    $x=0;
    
    if(strpos($name,"_")==true) $realName = str_ireplace("_"," ",$name);
    else $realName = $name;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    /* get item category */
    $category = getItemCategorybyName($name);
    
    $active = "1";
    $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? and name <> ? order by date_created desc limit 8";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('sss', $active,$category,$name);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "description" => $description, 
                "brand" => $brand, 
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getRecommendedItemsIndex(){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    $bestseller = "1";
    $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and flag_bestseller=? order by id desc limit 12";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('ss', $active, $bestseller);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $name, $description, $brand, $price, $category, $active, $img, $flag_featured, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "name" => $name, 
                "description" => $description, 
                "brand" => $brand, 
                "price" => $price, 
                "category" => $category, 
                "active" => $active, 
                "img" => $img, 
                "flag_featured" => $flag_featured, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getTestimoniImages(){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    $query = "SELECT id, img, active, date_created FROM testimoni_images where active=? order by id desc";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $active);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($id, $img, $active, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
                "id" => $id, 
                "img" => $img, 
                "active" => $active, 
                "date_created" => $date_created
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getTestimoniList(){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = 1;
    $query = "SELECT nama, kota, date_created, comment FROM testimoni where active = ? order by date_created desc";
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $active);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($nama, $kota, $date_created, $comment);
        while($stmt->fetch())
        {
            $bindResults = array(
                "nama" => $nama, 
                "kota" => $kota, 
                "date_created" => $date_created,
                "comment" => $comment
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}

function getListResi($tgl){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    $query = "SELECT nomor_resi, tgl_resi, nama, remarks FROM resi where tgl_resi=? order by date_created desc";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $tgl);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($nomor_resi, $tgl_resi, $nama, $remarks);
        while($stmt->fetch())
        {
            $bindResults = array(
                "nomor_resi" => $nomor_resi, 
                "tgl_resi" => $tgl_resi, 
                "nama" => $nama,
                "remarks" => $remarks
            );
            array_push($result, $bindResults);
        }
        /* close statement */
        $stmt->close();
        //die(print_r($result));
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
}
?>

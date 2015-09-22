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

function randomNumber($length) {
    $result = '';
    
    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    
    return $result;
}

function countRows($table) {
    $mysqli = new mysqli("localhost", "root", "phpmyadmin777", "fashion") or die(mysql_error()); 
	
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

function setItemRating($score){
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
    
    $newRating = ($rating + $score)/2;
    
    $query2 = "UPDATE items set rating=? FROM items where id=?";
    if ($stmt2 = $mysqli->prepare($query2)) {
        /* bind parameters for markers */
        $stm2t->bind_param('ss', $newRating, $id);
        /* execute query */
        $stmt2->execute();
        $result2 = $score;
    }
    else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    
    return $result;
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

function getFeaturedItems(){
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

function getSearchItems($mode,$content,$limit){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    ///* define default limit */
//    if($limit==null) $limit = 12;
    
    if($mode=='category'){
        $active = "1";
        //$query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by date_created desc limit ?";
        $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by id desc";
        if ($stmt = $mysqli->prepare($query)) {
            /* bind parameters for markers */
            //$stmt->bind_param('sss', $active, $content, $limit);
            $stmt->bind_param('ss', $active, $content);
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
            /* count total array and loop through it */
            //die(print_r($result));
        }
        else die('prepare() failed: ' . htmlspecialchars($mysqli->error));
    }
    else{
        /* define parameter */
        $param = "%$content%";
        $active = "1";
        $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? having name like ? or brand like ? or category like ? order by date_created desc";
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

function getRecommendedItemsIndex(){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    $bestseller = "1";
    $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and flag_bestseller=? order by id desc limit 20";
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
    $query = "SELECT img, active, date_created FROM testimoni_images where active=? order by date_created desc limit 8";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $active);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($img, $active, $date_created);
        while($stmt->fetch())
        {
            $bindResults = array(
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

function getListResi($tgl){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $active = "1";
    $query = "SELECT nomor_resi, tgl_resi, nama FROM resi where tgl_resi=? order by date_created desc";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $tgl);
        /* execute query */
        $stmt->execute();
        /* bind results */
        $stmt->bind_result($nomor_resi, $tgl_resi, $nama);
        while($stmt->fetch())
        {
            $bindResults = array(
                "nomor_resi" => $nomor_resi, 
                "tgl_resi" => $tgl_resi, 
                "nama" => $nama
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
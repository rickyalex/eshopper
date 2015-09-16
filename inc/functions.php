<?php
function getDB(){
    $mysqli = new mysqli("localhost", "nicholfa_public", "", "fashion") or die(mysql_error()); 
	
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

function getProductDetails($id){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    $query = "SELECT id, name, sku, description, brand, price, category, active, img, flag_featured, date_created FROM items where id=?";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
        /* bind parameters for markers */
        $stmt->bind_param('s', $id);
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

function getSearchItems($mode,$content){
    $result=array();
    $x=0;
    
    /* retrieve database instance */
    $mysqli = getDB();
    
    if($mode=='category'){
        $active = "1";
        $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items where active=? and category=? order by date_created desc";
        if ($stmt = $mysqli->prepare($query)) {
            /* bind parameters for markers */
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
    $query = "SELECT id, name, description, brand, price, category, active, img, flag_featured, date_created FROM items order by date_created desc limit 12";
    //die("query :".$query);
    if ($stmt = $mysqli->prepare($query)) {
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
?>
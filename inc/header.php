<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="NicholFashion">
    <meta name="description" content="NicholFashion adalah toko fashion online wanita terlengkap di Indonesia. Barangnya murah, bagus dan terpercaya. Toko baju online, toko fashion online, butik online, busana wanita, fashion wanita terbaik di Indonesia">
    <meta name="generator" content="www.NicholFashion.com">
    <meta name="keywords" content="jual pakaian wanita, jual baju wanita, jual baju online">
    <meta name="robots" content="index,follow" />
    <meta property="og:title" content="NicholFashion : Toko Fashion Wanita Terlengkap di Indonesia">
    <meta property="og:description" content="NicholFashion : Toko Fashion Wanita Terlengkap di Indonesia | Murah, Bagus dan Terpercaya !">
    <meta property="og:url" content="http://www.NicholFashion.com"/>
    <meta property="og:site_name" content="www.NicholFashion.com.id"/>
    <meta property="og:type" content="website"/>
    <title>NicholFashion : Toko Fashion Wanita Terlengkap di Indonesia</title>
    <link rel="shortcut icon" href="images/logo.ico">
   	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="js/raty-2.7.0/lib/jquery.raty.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="//v2.zopim.com/?3MwgkIwtrWu0D4CZJnvbhai2uTRHyRrb";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->
</head><!--/head-->

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
                    <div class="col-sm-12">
						<div class="logo">
							<a href="index.php"><img src="images/nicholfashion_logo2.png" alt="NicholFashion" /></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Pakaian<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php include('php/display_category_dropdown.php'); ?>
                                    </ul>
                                </li>
								<li><a href="contact-us.php">Cara Pemesanan</a></li>
                                <li><a href="cek_ongkir.php">Cek Ongkir JNE</a></li>
                                <li><a href="testimoni.php">Testimoni</a></li>
                                <li><a href="list_resi.php">No Resi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input id="searchBox" type="text" placeholder="Search"/>
                            <button type="submit" onclick="submitSearch();"><img src="images/home/searchicon.png" alt="Search" /></button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
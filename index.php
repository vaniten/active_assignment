<?php
	ob_start();	// Fixes 'Headers already sent' issue when redirecting to error page - see corresponding ob_flush(); at end of page

	$srvUrl = 'http://'.$_SERVER['SERVER_NAME'];
	$srvUrl = $srvUrl.'/sandbox/active-assignment';	

	$page = addslashes(stripslashes(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_ENCODED)));
	$page = strip_tags($page);
	$page = str_replace('.', '', $page);
	$page = basename($page);
	
	if ($page != ''){
		$page = substr(filter_var($page, FILTER_SANITIZE_STRING),0,37);	
	}else{
		$page = 'home';
	}
	
	$pagesArray = array('ERR',
						'home');
				
	if (!(in_array($page,$pagesArray))){
		header('Location: '.$srvUrl.'/index.php?p=ERR&r=404');
		exit();
	}	

?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/LocalBusiness" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#" lang="en" xml:lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	<meta name="description" content="Tutorial Page" />
	<meta name="keywords" content="" />
	<title>TechStyles USA | Demo</title>
	<link rel="icon" href="./favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/core.css" />
	<link rel="stylesheet" type="text/css" href="css/handheld-1.0.dev.css" media="handheld, only screen and (max-device-width:480px)"/>
	<meta name="viewport" content="width=480, initial-scale=1.0, user-scalable=no">
	<!--[if IE 9]> <link type="text/css" href="css/ie9.css" rel="stylesheet" /> <![endif]--> 

	<script>
		if(navigator.userAgent.indexOf('Mac') != -1) {
			{document.write ('<link type="text/css" href="css/style-mac.css" rel="stylesheet" />');}
		}
	</script>

	<!-- LAB.js script loader -->
	<script type="text/javascript" src="js/LAB.min.js"></script>
	<script type="text/javascript">
		$LAB
		.script("http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js")
		.script("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js").wait()
		.script("./js/zGetRates.js");
	</script>
	<!-- END LAB.js script loader -->
		
</head>
<body>
	<a href="./"><img src="http://www.activenetwork.com/sites/37/templates/images/logo-header.gif" width=237 /></a>
	<?php include 'pages/'.$page.'.php'; ?>
</body>
</html>
<?php ob_flush(); ?>
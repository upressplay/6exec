<!doctype html>
<?php 

	$meta_title_default = "6 Degrees Search";
	$meta_title = $meta_title_default;

	$meta_desc_default = "As Chicagolands trusted accounting and finance staffing agency, 6 degrees matches accounting and financial professionals with quality opportunities in both large and small organizations in every industry.  We specialize in temporary staffing, executive search, retained search, and consulting.  Our staff are CPA’s, Accountants, and consultants themselves.  We have collectively serviced Chicagoland for over 100 years, and have placed over 1500 professionals in the area.  Our experience gives us the unique ability to truly understand the art of the financial hire.  We add value by saving time, and reducing risk.  ";
	$meta_desc = $meta_desc_default;

	$site_url = "http://" . $_SERVER['HTTP_HOST'];
	$meta_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	$meta_img_default = $site_url . '/images/6degrees.jpg';
	$meta_img = $meta_img_default;

	$about_data  = file_get_contents('http://6-degreesstaffing.com/6degreesinc.com/wordpress/api/sitedata/about/');
	$about_data = json_decode($about_data, true);	
	$about_data = $about_data['data'];

	$services_data  = file_get_contents('http://6-degreesstaffing.com/6degreesinc.com/wordpress/api/sitedata/services/');
	$services_data = json_decode($services_data, true);	
	$services_data = $services_data['data'];

	$team_data  = file_get_contents('http://6-degreesstaffing.com/6degreesinc.com/wordpress/api/sitedata/team/');
	$team_data = json_decode($team_data, true);	
	$team_data = $team_data['data'];

	$candidates_data  = file_get_contents('http://6-degreesstaffing.com/6degreesinc.com/wordpress/api/sitedata/candidates/');
	$candidates_data = json_decode($candidates_data, true);	
	$candidates_data = $candidates_data['data'];

	$news_data  = file_get_contents('http://6-degreesstaffing.com/6degreesinc.com/wordpress/api/sitedata/news/');
	$news_data = json_decode($news_data, true);	
	$news_data = $news_data['data'];


?>
<html lang="en">
<head>
  	<meta charset="utf-8">

  	<title><?php echo $meta_title; ?></title>
	<meta name="description" content="<?php echo $meta_desc; ?>"> 
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">

	<meta property="og:title" content="<?php echo $meta_title; ?>" />
	<meta property="og:description" content="<?php echo $meta_desc; ?>" />
	<meta property="og:url" content="<?php echo $meta_url; ?>"/>
	<meta property="og:image" content="<?php echo $meta_img; ?>" />
  	
  	<meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@6degreesinc">
    <meta name="twitter:creator" content="@6degreesinc">
    
    <meta name="twitter:description" content="{PlaintextCaption}">
    <meta name="twitter:image" content="{block:Photo}{PhotoURL-500}{/block:Photo}">

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 	<link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/site.css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/apply.css">
	<link rel="stylesheet" href="css/about.css">
	<link rel="stylesheet" href="css/services.css">
	<link rel="stylesheet" href="css/team.css">
	<link rel="stylesheet" href="css/candidates.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/instagram.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

	
</head>

<body>

	<?php 
		include 'includes/nav.php';
	?>
	<div id="site_holder">
		
		<div id="site_container">
			<?php 
				include 'includes/header.php';
				include 'includes/apply.php';
				include 'includes/about.php';
				include 'includes/services.php';
				include 'includes/team.php';
				include 'includes/candidates.php';
				include 'includes/instagram.php';

			?>
			

		</div><!-- site_container -->

		<?php 
			include 'includes/footer.php';
		?>
	</div><!-- site_holder -->

	
	
	<script src="js/lib/jquery-2.2.3.min.js"></script>
  	<script src="js/lib/TweenMax.min.js"></script>
  	<script src="js/lib/ScrollToPlugin.min.js"></script>
  	
  	<script src="js/site.js"></script>
  	<script src="js/home.js"></script>
  	<script src="js/services.js"></script>
  	<script src="js/nav.js"></script>
  	<script src="js/instagram.js"></script>
</body>
</html>
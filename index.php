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
  	

 	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 	<link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>

	<link rel="stylesheet" href="css/site.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">


	
</head>

<body>

	
	<div id="site_holder">
		<?php 
			include 'includes/nav.php';
		?>
		<div id="site_container">
			<div id="site_content">
			<?php 
				include 'includes/header_anim.php';
			?>
				
			</div><!-- site_content -->
			
			
			

			

		</div><!-- site_container -->

		<?php 
			include 'includes/footer.php';
		?>
	</div><!-- site_holder -->

	
	
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  	<script src="js/lib/TweenMax.min.js"></script>
  	<script src="js/lib/ScrollToPlugin.min.js"></script>
  	
  	<script src="js/site.js"></script>
  	
</body>
</html>
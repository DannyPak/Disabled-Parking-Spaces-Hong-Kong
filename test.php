<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Multi-Level Push Menu - Demo 3</title>
		<meta name="description" content="Multi-Level Push Menu: Off-screen navigation with multiple levels" />
		<meta name="keywords" content="multi-level, menu, navigation, off-canvas, off-screen, mobile, levels, nested, transform" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
				<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

		<script src="js/modernizr.custom.js"></script>
		<script src="test.js"></script>

</head>

<body>
	<div class="container">
			<!-- Push Wrapper -->
		<div class="mp-pusher" id="mp-pusher">
			<nav id="mp-menu" class="mp-menu">
				<div class="mp-level">
				<h2 class="icon">Region</h2>
						<ul>
							
								<?php include('dbconfig.php');
					
									$sql_Region = 'SELECT distinct reg_id, reg_c, reg_e FROM region';
									$result = mysqli_query($link,$sql_Region);
									
									if (!$result) {
									    echo "DB Error, could not query the database\n";
									    echo 'MySQL Error: ' . mysqli_error();
									    exit;
									}
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<li class="icon icon-arrow-left">';
									    echo '<a class="icon" href="#" id="'.$row['reg_id'].'" onfocus="getDistrict(this.id)">'.$row['reg_c'].'</a>';									    
									    echo '<div id="txtDist"></div>';
									    echo '</li>';
									}
									
									
									mysqli_free_result($result);
									
									mysqli_close($link);
										
								?>
						
					</ul>
				</div>
			</nav>

<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Tutorials/CircularNavigation/"><span>Previous Demo</span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=16252"><span>Back to the Codrops Article</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Multi-Level Push Menu <span>Off-screen navigation with multiple levels</span></h1>
						</header>
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a></p>
								<nav class="codrops-demos">
									<a href="index.html">Demo 1: Overlapping levels</a>
									<a href="index2.html">Demo 2: Covering levels</a>
									<a class="current-demo" href="index3.html">Demo 3: Overlapping levels with back links</a>
								</nav>
							</div>
							<span id="txtDist"></span>
							<div class="block block-60">
								<p><strong>Demo 3:</strong> Overlapping levels with back links</p>
								<p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
								<p>The next level can optionally overlap or cover the previous one.</p>
							</div>
							<div class="info">
								<p>If you enjoyed this you might also like:</p>
								<p><a href="http://goo.gl/JLJ4v5">Responsive Multi-Level Menu</a></p>
								<p><a href="http://goo.gl/qjbq9Y">Google Nexus Website Menu</a></p>
							</div>
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>

</body>

</html>

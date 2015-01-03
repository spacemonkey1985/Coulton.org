<?php 
	if (!isset($_SESSION)) {
    	session_start();
	}
	
	include('php/bingo_card.php') 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head profile="http://www.w3.org/2005/10/profile">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Coulton Family Story Bingo</title>
		<!-- Include meta tag to ensure proper rendering and touch zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Include bootstrap stylesheets -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Include my stylesheets -->
		<link rel="stylesheet" href="css/style.css">
        <!-- App icons -->
        <link rel="shortcut icon" type="image/png" href="http://bingo.coulton.org/images/favicon.png">
        <!-- <link href="http://bingo.coulton.org/apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="http://bingo.coulton.org/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
        <link href="http://bingo.coulton.org/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
        <link href="http://bingo.coulton.org/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
        <link href="http://bingo.coulton.org/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
        <link href="http://bingo.coulton.org/icon-hires.png" rel="icon" sizes="192x192" />
        <link href="http://bingo.coulton.org/icon-normal.png" rel="icon" sizes="128x128" />
        <link rel="shortcut icon" type="image/png" href="http://bingo.coulton.org/images/favicon.png">
        <meta name="msapplication-TileImage" content="http://bingo.coulton.org/apple-touch-icon-180x180.png">
		<meta name="msapplication-TileColor" content="#860001"> -->
    </head>
    <body>
    	<div class="container">
			<!-- <h1>Coulton Family Story Bingo</h1> -->
            <div class="logo"></div>
			
			<div class="panel-border">
            	<nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Menu</a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                            	<form action="index.php" method="post">
                                    <input type="hidden" name="new" value="true" />
                                    <button type="submit" class="btn btn-bingo btn-lg btn-block">
                                        <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;New
                                    </button>
                                </form>
                            </li>
                            <li class="dropdown">
                            	<button class="btn btn-bingo btn-lg btn-block" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="glyphicon glyphicon-question-sign"></i>&nbsp;&nbsp;Key
                                </button>
                                <ul class="dropdown-menu list-group" role="menu">
                                    <?php
										$items = GetItems();
										
										for($item = 0; $item < count($items); $item++) {
											echo "<li class='list-group-item'><span class='btn btn-lg' style='background-image: url(\"images/icons/" . $items[$item][1] . "\");'>&nbsp;</span>&nbsp;&nbsp;" . $items[$item][0] . "</li>";
										}
									?>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>

				<div class="panel-container">
					<?php Bingo(GetItems(), isset($_POST['new'])); ?>
				</div>
			</div>
        </div>
	<!-- JavaScript placed at the end of the document so the pages load faster -->
    <!-- Include the jQuery library -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Incorporate the Bootstrap JavaScript plugins -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Load my JavaScript -->
	<script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
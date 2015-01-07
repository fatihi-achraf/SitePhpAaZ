<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?php echo isset($title_for_layout) ? $title_for_layout : 'Mon Site' ; ?></title>

    	<!-- Bootstrap -->
    	<link href="<?php echo BASE;?>/css/bootstrap.css" rel="stylesheet">
    	<link href="<?php echo BASE;?>/css/style.css" rel="stylesheet">

    	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
	<body>
<div class="container">
		
      <nav class="navbar navbar-default">
        <ul class="nav navbar-nav pull-right">
         <?php foreach ($pages as $p):?>

          <li><a href="<?php echo BASE_URL.'/pages/view/'.$p->id ;?>"><?php echo $p->name ;?></a></li>

        <?php endforeach; ?>
              
        </ul>
      </nav>  

		<?php echo $content_fot_layout; ?>
	
	
</div>

	<script type="text/javascript" 
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<title>Snippets</title>	
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url( 'application/css'); ?>/desert.css">	
		<link rel="stylesheet" href="<?php echo base_url( 'application/js/select2'); ?>/select2.css">
		
		<link rel="stylesheet" href="<?php echo base_url( 'application/css'); ?>/style.css">	
	</head>

	<body>	
	
		<header>
			<div class="content"><?php echo $header; ?></div>
		</header>
	
      	<div id="wrapper">     
        	<div id="content">
           		<div id="listview">
           			<?php echo $view; ?>
            	</div>
        	   
		        <div id="preview">
		           <?php echo $preview; ?>
		        </div>
            </div>
      	</div>
  		
        <footer><p>just some feet | and no shoes</p></footer>
  		
  		<script src="<?php echo base_url( 'application/js' ); ?>/jquery-1.8.1.min.js" type="text/javascript"></script>
  		<script src="<?php echo base_url( 'application/js' ); ?>/knockout-latest.js" type="text/javascript"></script>
  		<script src="<?php echo base_url( 'application/js/highlighter' ); ?>/prettify.js" type="text/javascript"></script>
  		<script src="<?php echo base_url( 'application/js/select2' ); ?>/select2.js" type="text/javascript"></script>
  		
  		<script src="<?php echo base_url( 'application/js' ); ?>/script.js" type="text/javascript"></script>
	</body>

</html>

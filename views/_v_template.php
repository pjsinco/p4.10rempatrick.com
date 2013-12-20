<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui-1.10.3.custom.css" type="text/css">
					
	<!-- Controller Specific JS/CSS -->
    <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.js"></script>
 	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
  <div class='container_12'>
    

	<?php if(isset($content)) echo $content; ?>

  </div>
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>

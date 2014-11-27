<!DOCTYPE html>
<html class="site no-js" lang="en">
<head>

	<meta charset="utf-8"/>
	<title>Crappy CMS</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:900,400|Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- <link href="/bootstrap.css" rel="stylesheet" type="text/css" media="all" />	 -->


</head>

<body class="section">

 		<tr>
			<td><a href="../pages">Pages</a></td>
 			<td><a href="../images">Images</a></td>
			<td><a href="../posts">Posts</a></td>
			<td><a href="../logout">Logout</a></td>
		<tr>
	<div id="canvas">

			@yield('main')

		<div id="page-overlay">
					</div><!-- #nav-img -->

	  </div><!-- #page-overlay -->

 	</div><!-- #canvas -->

	<script type="text/javascript" src="/jquery.js"></script>
	<script type="text/javascript" src="/fitpic.js"></script>
	<script type="text/javascript" src="/script.js"></script>
</body>
</html>

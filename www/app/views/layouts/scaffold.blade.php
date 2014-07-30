<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Draggable Dual-View Slideshow</title>
		<meta name="description" content="Draggable Dual-View Slideshow: A Slideshow with two views and content area" />
		<meta name="keywords" content="draggable, slideshow, fullscreen, carousel, views, zoomed, 3d transform, perspective, dragdealer" />
		<meta name="author" content="Mat (based off a CoDrops demo)" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:900,400|Lato:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/dragdealer.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
  		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="codrops-top clearfix">
				
			</div>
			<header id="header" class="codrops-header">
				<h1>Draggable Dual-View Slideshow</h1>
				<span class="message">This mobile version does not have the slideshow switch</span>
				<button class="slider-switch">Switch view</button>
			</header>
			<div id="overlay" class="overlay">
				<div class="info">
					<h2>Demo interactions</h2>
					<span class="info-drag">Drag Sliders</span>
					<span class="info-keys">Use Arrows</span>
					<span class="info-switch">Switch view</span>
					<button>Got it!</button>	
				</div>
			</div>
				@yield ('main')
		</div><!-- /container --> 
		<script src="js/dragdealer.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/dragslideshow.js"></script>
		<script>
			(function() {

				var overlay = document.getElementById( 'overlay' ),
					overlayClose = overlay.querySelector( 'button' ),
					header = document.getElementById( 'header' )
					switchBtnn = header.querySelector( 'button.slider-switch' ),
					toggleBtnn = function() {
						if( slideshow.isFullscreen ) {
							classie.add( switchBtnn, 'view-maxi' );
						}
						else {
							classie.remove( switchBtnn, 'view-maxi' );
						}
					},
					toggleCtrls = function() {
						if( !slideshow.isContent ) {
							classie.add( header, 'hide' );
						}
					},
					toggleCompleteCtrls = function() {
						if( !slideshow.isContent ) {
							classie.remove( header, 'hide' );
						}
					},
					slideshow = new DragSlideshow( document.getElementById( 'slideshow' ), { 
						// toggle between fullscreen and minimized slideshow
						onToggle : toggleBtnn,
						// toggle the main image and the content view
						onToggleContent : toggleCtrls,
						// toggle the main image and the content view (triggered after the animation ends)
						onToggleContentComplete : toggleCompleteCtrls
					}),
					toggleSlideshow = function() {
						slideshow.toggle();
						toggleBtnn();
					},
					closeOverlay = function() {
						classie.add( overlay, 'hide' );
					};

				// toggle between fullscreen and small slideshow
				switchBtnn.addEventListener( 'click', toggleSlideshow );
				// close overlay
				overlayClose.addEventListener( 'click', closeOverlay );

			}());
		</script>
	</body>
</html>
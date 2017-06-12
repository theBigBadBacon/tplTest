<?php
	require_once('head.php');
	require_once('foot.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<title>Uncap IT - Welcome</title>
		<meta charset="UTF-8" />
		<meta name="theme-color" content="#5C3960">
		<meta name="description" content="Do you need a web related project? Look no further!" />
		<meta property="og:title" content="Uncap IT" />
		<meta property="og:description" content="Do you need a web related project? Look no further!" />
		<meta property="og:image" content="data/logo_new.png" />
		<link rel="icon" href="data/logo_new.png" type="image/png" />
		<link rel="stylesheet" type="text/css" href="data/all.css">
	</head>
	<body class="c10">

		<?= nav_bar(); ?>

		<div class="torso c30">
			<div class="loading">Loading</div>
		</div>

		<?= footer(); ?>

		<script type="text/javascript">
			$('.menu').on('click', '.necklace-pearl', function() {
				location.hash = $(this).attr('href');

				return false;
			});

			$(window).on('hashchange', function() {
				loadPage(location.hash.replace('#', ''));
			});

			$(function(){
				var hash = location.hash.replace('#', '');
				if (hash.length) {
					loadPage(hash);
				} else {
					location.hash = '#welcome';
				}
			});

			function loadPage(page) {
				var target = $('.torso'),
					links = $('.necklace'),
					title = page[0].toUpperCase() + page.substr(1);

				$.ajax({
					url: '/page/' + page + '.php',
					success: function(response) {
						$('title').text('Uncap IT - ' + title);
						var height = target.height();
						target.height('auto');
						target.html(response);

						var newHeight = target.height();
						target.height(height);

						links.find('.necklace-pearl[href="' + page + '"]')
							.removeClass('c1-active')
							.addClass('c1-active')
							.siblings().removeClass('c1-active');

						target.animate({ height: newHeight }, 600);
					},
					error: function(response) {
						if (response.status === 404) {
							location.hash = '#welcome';
						} else {
							console.log('Invalid link');
						}
					}
				});
			}
		</script>
	</body>
</html>

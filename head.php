<?php
function nav_bar() {
	$path = $_SERVER['REQUEST_URI'];

	switch ($path) {
		case '/page/projects':
			$projects = ' c1-active';
			break;

		case '/page/about':
			$about = ' c1-active';
			break;

		case '/page/contact':
			$contact = ' c1-active';
			break;

		default:
			$home = ' c1-active';
			break;
	} ?>
	<div class="top c32">
		<div class="hat">
			<a href="/" class="hat-logo"></a>
		</div>
	</div>
	<div class="menu c0">
		<div class="necklace">
			<a href="welcome" class="necklace-pearl c1 <?= $home ?>">Home</a>
			<a href="projects" class="necklace-pearl c1 <?= $projects ?>">Projects</a>
			<a href="about" class="necklace-pearl c1 <?= $about ?>">About us</a>
			<a href="contact" class="necklace-pearl c1 <?= $contact ?>">Contact us</a>
		</div>
	</div>
<?php } ?>
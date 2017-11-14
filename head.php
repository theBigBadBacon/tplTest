<?php
function nav_bar() {
	$path = $_SERVER['REQUEST_URI'];

	$pages = array();

	if ($handle = opendir('page')) {
		while (false !== ($file = readdir($handle))) {
			if (($file <> ".") && ($file <> "..")) {
				array_push($pages, substr($file, 0, -4));
			}
		}
	}

	asort($pages);
	$pages = array_reverse($pages);

	//$active_page = $path.split('/page/')[1];
	//$path = $active_page !== '/' ?: 'welcome';
	?>
	<div class="top c32">
		<div class="hat">
			<a href="/" class="hat-logo"></a>
		</div>
	</div>
	<div class="menu c0">
		<div class="necklace">
			<?php foreach($pages as $page): ?>
				<a href="<?= $page ?>" class="necklace-pearl c1 <?= $path == $page ? 'c1-active' : '' ?>"><?= ucfirst($page) ?></a>
			<?php endforeach; ?>
			<!--
			<a href="welcome" class="necklace-pearl c1 <?= $home ?>">Home</a>
			<a href="projects" class="necklace-pearl c1 <?= $projects ?>">Projects</a>
			<a href="about" class="necklace-pearl c1 <?= $about ?>">About us</a>
			<a href="contact" class="necklace-pearl c1 <?= $contact ?>">Contact us</a>
			-->
		</div>
	</div>
<?php } ?>
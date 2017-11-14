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
		</div>
	</div>
<?php } ?>
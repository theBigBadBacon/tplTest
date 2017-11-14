<?php
	$projects = array();

	if ($handle = opendir('../../lab/')) {
		while (false !== ($file = readdir($handle))) {
			if (($file <> ".") && ($file <> "..")) {
				array_push($projects, $file);
			}
		}
	}
?>
<div style="padding-bottom: 16px; /*Yes I know this looks bad. But hey, if you're reading this you owe me an email: uncapit@gmail.com*/">Here is an automatically updated list of hobby projects</div>
<?php foreach ($projects as $project): ?>
<div class="tattoo c32">
	<?= ucfirst($project) ?> - <a class="link" href="http://lab.uncapit.com/<?= $project ?>">Demo</a>
</div>
<?php endforeach; ?>

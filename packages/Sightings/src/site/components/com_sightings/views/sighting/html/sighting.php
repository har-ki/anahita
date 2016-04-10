<?php defined('KOOWA') or die('Restricted access') ?>

<div class="an-entity <?= $highlight ?>">
	<div class="clearfix">
		<div class="entity-portrait-square"><?= @avatar($sighting->author) ?></div>

		<div class="entity-container">
			<h4 class="author-name"><?= @name($sighting->author) ?></h4>
			<div class="an-meta">
				<?= @date($sighting->creationTime) ?>
			</div>
		</div>
	</div>

	<h3 class="entity-title"><?= @escape($sighting->title) ?></h3>

</div>
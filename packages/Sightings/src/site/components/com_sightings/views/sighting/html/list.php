<?php defined('KOOWA') or die ?>

<div class="an-entity <?= $highlight ?>">
	<div class="clearfix">
		<div class="entity-portrait-square">
			<?= @avatar($sighting->author) ?>
		</div>

		<div class="entity-container">
			<h4 class="author-name">
			    <?= @name($sighting->author) ?>
			</h4>

			<ul class="an-meta inline">
				<li><?= @date($sighting->creationTime) ?></li>
				<?php if (!$sighting->owner->eql($sighting->author)): ?>
				<li><?= @name($sighting->owner) ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<h3 class="entity-title">
		<a href="<?= @route($sighting->getURL()) ?>">
		    <?= @escape($sighting->title) ?>
		</a>
	</h3>

	<div class="entity-actions">
		<?= @helper('ui.commands', @commands('list')) ?>
	</div>
</div>
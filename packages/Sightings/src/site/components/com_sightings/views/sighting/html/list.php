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

	<?php if ($sighting->body): ?>
    	<div class="entity-description">
    		<?= @helper('text.truncate', @content($sighting->body), array('length' => 500, 'consider_html' => true, 'read_more' => true)); ?>
    	</div>
    	<?php endif; ?>

	<div class="entity-actions">
		<?= @helper('ui.commands', @commands('list')) ?>
	</div>
</div>
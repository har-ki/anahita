<?php defined('KOOWA') or die ?>

<div class="row">
	<div class="span8">
	<?= @helper('ui.header', array()); ?>
	<?= @template('sighting'); ?>
	<?php @commands('toolbar') ?>
	<?= @helper('ui.comments', $sighting, array('pagination' => true)); ?>
	</div>

	<div class="span4 visible-desktop">
		<h4 class="block-title">
		<?= @text('LIB-AN-META') ?>
		</h4>

		<div class="block-content">
		<ul class="an-meta">
			<?php if (isset($sighting->editor)) : ?>
			<li><?= sprintf(@text('LIB-AN-ENTITY-EDITOR'), @date($sighting->updateTime), @name($sighting->editor)) ?></li>
			<?php endif; ?>
			<?php if (!$sighting->open) : ?>
			<li>
				<?= sprintf(@text('COM-SIGHTINGS-SIGHTING-COMPLETED-BY-REPORT'), @date($sighting->openStatusChangeTime), @name($sighting->lastChanger)) ?>
			</li>
			<?php endif; ?>
			<li><?= sprintf(@text('LIB-AN-MEDIUM-NUMBER-OF-COMMENTS'), $sighting->numOfComments) ?></li>
		</ul>
		</div>

		<?php if(count($sighting->locations) || $sighting->authorize('edit')): ?>
		<h4 class="block-title">
			<?= @text('LIB-AN-ENTITY-LOCATIONS') ?>
		</h4>

		<div class="block-content">
		<?= @location($sighting) ?>
		</div>
		<?php endif; ?>

		<?php if ($actor->authorize('administration')): ?>
		<h4 class="block-title">
		    <?= @text('COM-SIGHTINGS-SIGHTING-PRIVACY') ?>
		</h4>

		<div class="block-content">
		    <?= @helper('ui.privacy', $sighting) ?>
		</div>
		<?php endif; ?>
	</div>
</div>

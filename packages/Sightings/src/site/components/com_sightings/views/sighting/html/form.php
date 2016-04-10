<?php defined('KOOWA') or die('Restricted access'); ?>

<?php $sighting = empty($sighting) ? @service('repos:sightings.sighting')->getEntity()->reset() : $sighting; ?>

<?php $url = $sighting->getURL().'&oid='.$actor->id; ?>

<form method="post" action="<?= @route($url) ?>" class="an-entity">
	<fieldset>
		<legend><?= ($sighting->persisted()) ? @text('COM-SIGHTINGS-SIGHTING-EDIT') : @text('COM-SIGHTINGS-SIGHTING-ADD') ?></legend>

		<div class="control-group">
			<label class="control-label" for="title"><?= @text('COM-SIGHTINGS-MEDIUM-TITLE') ?></label>
			<div class="controls">
				<input required name="title" class="input-block-level" value="<?= @escape($sighting->title) ?>" size="50" maxlength="255" type="text">
			</div>
		</div>

		<div class="form-actions">
			<?php if ($sighting->persisted()): ?>
				<?php if (KRequest::type() == 'AJAX'): ?>
				<a data-action="cancel" class="btn" href="<?= @route($url.'&layout=list') ?>">
					<?= @text('LIB-AN-ACTION-CANCEL') ?>
				</a>
				<?php else : ?>
				<a class="btn" href="<?= @route($url) ?>">
					<?= @text('LIB-AN-ACTION-CANCEL') ?>
				</a>
				<?php endif;?>

				<button type="submit" class="btn btn-primary" data-loading-text="<?= @text('LIB-AN-MEDIUM-UPDATING') ?>">
					<?= @text('LIB-AN-ACTION-UPDATE') ?>
				</button>
			<?php else : ?>
			<a data-trigger="CancelAdd" class="btn" href="<?= @route($url) ?>">
				<?= @text('LIB-AN-ACTION-CANCEL') ?>
			</a>

			<button data-trigger="Add" class="btn btn-primary" data-loading-text="<?= @text('LIB-AN-MEDIUM-POSTING') ?>">
				<?= @text('LIB-AN-ACTION-ADD') ?>
			</button>
			<?php endif;?>
		</div>
	</fieldset>
</form>
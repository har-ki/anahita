<?php defined('KOOWA') or die('Restricted access'); ?>

<?php $sighting = @service('repos:sightings.sighting')->getEntity()->reset() ?>

<form class="composer-form" method="post" action="<?= @route() ?>">
	<fieldset>
		<legend><?=@text('COM-SIGHTINGS-SIGHTING-ADD')?></legend>

		<div class="control-group">
			<label class="control-label" for="sighting-title"><?= @text('COM-SIGHTINGS-MEDIUM-TITLE') ?></label>
			<div class="controls">
				<input id="sighting-title" name="title" class="input-block-level" value="<?= @escape($sighting->title) ?>" size="50" maxlength="255" type="text" required autofocus />
			</div>
		</div>

		<div class="form-actions">
			<button type="submit" class="btn btn-primary" data-loading-text="<?= @text('LIB-AN-MEDIUM-POSTING') ?>">
				<?= @text('LIB-AN-ACTION-ADD') ?>
			</button>
		</div>
	</fieldset>
</form>
<?php defined('KOOWA') or die('Restricted access'); ?>

<?php $sighting = @service('repos:sightings.sighting')->getEntity()->reset() ?>

<form class="composer-form" method="post" action="<?= @route() ?>">
	<fieldset>
		<legend><?=@text('COM-SIGHTINGS-SIGHTING-SHARE')?></legend>

		<div class="control-group">
			<div class="controls">
				<textarea class="input-block-level" id="note-body" name="body" cols="5" rows="3" required maxlength="5000"></textarea>
			</div>
		</div>

		<button type="submit" class="btn btn-primary pull-right" data-loading-text="<?= @text('LIB-AN-MEDIUM-POSTING') ?>" >
			<?= @text('LIB-AN-ACTION-SHARE') ?>
		</button>
	</fieldset>
</form>
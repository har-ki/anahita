<?php defined('KOOWA') or die; ?>

<div class="row">
	<div class="span8">
		<?= @helper('ui.header', array()) ?>

		<?php if ($actor && $actor->authorize('action', 'sighting:add')) : ?>
		<div id="entity-form-wrapper" class="hide">
		<?= @view('sighting')->layout('form')->actor($actor) ?>
		</div>
		<?php endif; ?>

		<?= @helper('ui.filterbox', @route('layout=list')) ?>
		<?= @template('list') ?>
	</div>

</div>
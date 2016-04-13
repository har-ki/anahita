<?php defined('KOOWA') or die('Restricted access');?>

<?php if (!is_array($object)) : ?>
	<data name="title">
		<?= sprintf(@text('COM-SIGHTINGS-STORY-NEW-SIGHTING'), @name($subject), @route($object->getURL())) ?>
	</data>
	<data name="body">
		<div class="entity-body">
			<?= @helper('text.truncate', @content(nl2br($object->body), array('exclude' => 'gist')), array('length' => 200, 'consider_html' => true, 'read_more' => true)); ?>
		</div>
	</data>
<?php else : ?>
	<?php foreach ($object as $sighting) { ?>
		<data name="title">
			<?= sprintf(@text('COM-SIGHTINGS-STORY-NEW-SIGHTING'), @name($subject), @route($sighting->getURL())) ?>
		</data>
		<data name="body">
			<div class="entity-body">
				<?= @helper('text.truncate', @content(nl2br($sighting->body), array('exclude' => 'gist')), array('length' => 200, 'consider_html' => true, 'read_more' => true)); ?>
			</div>
		</data>
	<?php } ?>
<?php endif; ?>



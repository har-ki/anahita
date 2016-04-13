<?php defined('KOOWA') or die('Restricted access');?>

<?php if (count($sightings)) :?>
	<?php foreach ($sightings as $sighting) : ?>
	<?= @view('sighting')->layout('list')->sighting($sighting)->filter($filter) ?>
	<?php endforeach; ?>
<?php else: ?>
<?= @message(@text('COM-SIGHTINGS-EMPTY-LIST-MESSAGE')) ?>
<?php endif; ?>
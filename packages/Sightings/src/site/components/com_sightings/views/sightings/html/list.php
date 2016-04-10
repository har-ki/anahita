<?php defined('KOOWA') or die ?>

<div class="an-entities" id="an-entities-main">
<?php foreach ($sightings as $sighting) : ?>
	<?= @view('sighting')->layout('list')->sighting($sighting)->filter($filter) ?>
<?php endforeach; ?>
<?php if (count($sightings) == 0): ?>
<?= @message(@text('COM-SIGHTINGS-EMPTY-LIST-MESSAGE')) ?>
<?php endif; ?>
</div>

<?php
$url = 'layout=list';

if (!empty($sort)) {
    $url .= '&sort='.$sort;
}
?>

<?= @pagination($sightings, array('url' => @route($url))); ?>

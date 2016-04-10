<?php

/**
 * Actorbar.
 *
  */
class ComSightingsControllerToolbarActorbar extends ComMediumControllerToolbarActorbar
{
    /**
     * Before controller action.
     *
     * @param KEvent $event Event object
     *
     * @return string
     */
    public function onBeforeControllerGet(KEvent $event)
    {
        parent::onBeforeControllerGet($event);

        $data = $event->data;
        $viewer = get_viewer();
        $actor = pick($this->getController()->actor, $viewer);
        $layout = pick($this->getController()->layout, 'default');
        $name = $this->getController()->getIdentifier()->name;

        $this->setTitle(JText::sprintf('COM-SIGHTINGS-ACTOR-HEADER-'.strtoupper($name).'S', $actor->name));

        //create navigations
        $this->addNavigation('sightings', JText::_('COM-SIGHTINGS-LINK-SIGHTINGS'), array(
          'option' => 'com_sightings',
          'view' => 'sightings',
          'oid' => $actor->id, ), $name == 'sighting');
    }
}

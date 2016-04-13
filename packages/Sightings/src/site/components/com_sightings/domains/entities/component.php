<?php

/**
 * Component object.
 *
 */
class ComSightingsDomainEntityComponent extends ComMediumDomainEntityComponent
{
    /**
     * Initializes the default configuration for the object.
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param KConfig $config An optional KConfig object with configuration options.
     */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'story_aggregation' => array('sighting_add' => 'target'),
            'behaviors' => array(
                    'scopeable' => array('class' => 'ComSightingsDomainEntitySighting'),
                    'hashtagable' => array('class' => 'ComSightingsDomainEntitySighting'),
                ),
        ));

        parent::_initialize($config);
    }

    /**
     * {@inheritdoc}
     */
    protected function _setGadgets($actor, $gadgets, $mode)
    {
        if ($mode == 'profile') {
            $gadgets->insert('sightings-gadget-profile-sightings', array(
                'title' => JText::_('COM-SIGHTINGS-GADGET-ACTOR-SIGHTINGS'),
                'url' => 'option=com_sightings&view=sightings&layout=gadget&oid='.$actor->id,
                'action' => JText::_('LIB-AN-GADGET-VIEW-ALL'),
                'action_url' => 'option=com_sightings&view=sightings&oid='.$actor->id,
            ));
        } else {
            $gadgets->insert('sightings-gadget-profile-sightings', array(
                'title' => JText::_('COM-SIGHTINGS-GADGET-DASHBOARD-SIGHTINGS'),
                'url' => 'option=com_sightings&view=sightings&layout=gadget&filter=leaders',
                'action' => JText::_('LIB-AN-GADGET-VIEW-ALL'),
                'action_url' => 'option=com_sightings&view=sightings&filter=leaders',
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function _setComposers($actor, $composers, $mode)
    {
        if ($actor->authorize('action', 'com_sightings:sighting:add')) {
            $composers->insert('sightings-composer', array(
                'title' => JText::_('COM-SIGHTINGS-COMPOSER-SIGHTING'),
                'placeholder' => JText::_('COM-SIGHTINGS-SIGHTING-ADD'),
                'url' => 'option=com_sightings&view=sighting&layout=composer&oid='.$actor->id,
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function _setMenuLinks($actor, $menuItems)
    {
        $menuItems->insert('sightings-sightings', array(
            'title' => JText::_('COM-SIGHTINGS-MENU-ITEM-SIGHTINGS'),
            'url' => 'option=com_sightings&view=sightings&oid='.$actor->uniqueAlias,
        ));
    }
}

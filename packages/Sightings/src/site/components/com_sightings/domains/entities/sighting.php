<?php

/**
 * Sighting entity.
 */
class ComSightingsDomainEntitySighting extends ComMediumDomainEntityMedium
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
            'resources' => array('sightings_sightings'),
            'attributes' => array(
                'name' => array('required' => true)
             )
        ));

        parent::_initialize($config);
    }
}

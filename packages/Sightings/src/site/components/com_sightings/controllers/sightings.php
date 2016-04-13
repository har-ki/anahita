<?php

/**
 * Sighting Controller.
 *
 *
 */
class ComSightingsControllerSighting extends ComMediumControllerDefault
{
    /**
     * Constructor.
     *
     * @param KConfig $config An optional KConfig object with configuration options.
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->registerCallback(array(
            'before.enable',
            'before.disable', ),
            array($this, 'setLastChanger'));
        $this->registerCallback(array(
            'after.enable',
            'after.disable', ),
            array($this, 'createStoryCallback'));
    }

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
            'request' => array(
                'sort' => 'newest',
            ),
            'behaviors' => array(
                'enablable',
            ),
        ));

        parent::_initialize($config);
    }

    /**
     * Sets the value of lastChanger to the last person who opened or closed a Sighting.
     *
     * @param KCommandContext $context
     */
    public function setLastChanger($context)
    {
        $this->getItem()->setLastChanger(get_viewer());
    }

    /**
     * Browse Sightings.
     *
     * @param KCommandContext $context
     */
    protected function _actionBrowse($context)
    {
        if (!$context->query) {
            $context->query = $this->getRepository()->getQuery();
        }

        $query = $context->query;
        $query->order('open', 'DESC');

        if ($this->sort == 'priority') {
            $query->order('priority', 'DESC');
        }

        return parent::_actionBrowse($context);
    }
}

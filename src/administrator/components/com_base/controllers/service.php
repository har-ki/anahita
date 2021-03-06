<?php

/**
 * Resource Controller.
 *
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @link       http://www.GetAnahita.com
 */
class ComBaseControllerService extends ComBaseControllerResource
{
    /**
     * Initializes the default configuration for the object.
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param KConfig $config An optional KConfig object with configuration options.
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->registerActionAlias('apply', 'post');
        $this->registerActionAlias('save',  'post');
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
            'toolbars' => array('menubar', $this->getIdentifier()->name),
            'behaviors' => to_hash(array(
                'serviceable', 'persistable',
            )),
            'request' => array(
                'limit' => 20,
                'sort' => 'id',
                'direction' => 'ASC',
            ),
        ));

        parent::_initialize($config);
    }

    /**
     * Saves/Add an entity and then redirects.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return AnDomainEntitysetAbstract
     */
    protected function _actionPost(KCommandContext $context)
    {
        if ($context->action == 'save') {
            $context->response->setRedirect('option=com_'.$this->getIdentifier()->package.'&view='.KInflector::pluralize($this->getIdentifier()->name));
        }

        $data = $context->data;

        if ($this->getItem()) {
            $this->execute('edit', $context);
        } else {
            $this->execute('add',  $context);
        }

        return $this->getItem();
    }
}

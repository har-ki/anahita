<?php

/**
 * Sighting Authorizer.
 */
class ComSightingsDomainAuthorizerSighting extends ComMediumDomainAuthorizerDefault
{
    /**
     * Check if a node authroize being updated.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return bool
     */
    protected function _authorizeEdit($context)
    {
        $ret = parent::_authorizeEdit($context);

        if ($ret === false) {
            if ($this->_entity->isOwnable()) {
                $action = $this->_entity->component.':'.$this->_entity->getIdentifier()->name.':add';

                if ($this->_entity->owner->authorize('action', $action)) {
                    return true;
                }
            }
        }

        return $ret;
    }
}

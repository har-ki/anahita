<?php

/**
 * Modifying the node behavior. After deleting bunch of nodes we want to
 * set the sighting open_status_change_by to null.
 *
 */
class ComSightingsDomainBehaviorNode extends LibBaseDomainBehaviorNode
{
    /**
     * (non-PHPdoc).
     *
     * @see LibBaseDomainBehaviorNode::_afterRepositoryDeletenodes()
     */
    protected function _afterRepositoryDeletenodes(KCommandContext $context)
    {
        parent::_afterRepositoryDeletenodes($context);

        $this->_getRepositoryForTable('sightings_sightings')
             ->update(array('node_id' => $context['node_ids']));
    }
}

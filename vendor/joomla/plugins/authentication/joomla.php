<?php
/**
* @version      $Id: joomla.php 14401 2010-01-26 14:10:00Z louis $
* @package      Joomla
* @subpackage   JFramework
* @copyright    Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Joomla Authentication plugin
 *
 * @package     Joomla
 * @subpackage  JFramework
 * @since 1.5
 */
class plgAuthenticationJoomla extends JPlugin
{

    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @param object $subject The object to observe
     * @param array  $config  An array that holds the plugin configuration
     * @since 1.5
     */
    function plgAuthenticationJoomla(& $subject, $config) {
        parent::__construct($subject, $config);
    }

    /**
     * This method should handle any authentication and report back to the subject
     *
     * @access  public
     * @param   array   $credentials Array holding the user credentials
     * @param   array   $options     Array of extra options
     * @param   object  $response    Authentication response object
     * @return  boolean
     * @since 1.5
     */
    function onAuthenticate( &$credentials, $options, &$response )
    {
        jimport('joomla.user.helper');

        // Joomla does not like blank passwords
        if(empty($credentials['password']))
        {
            $response->status = JAUTHENTICATE_STATUS_FAILURE;
            $response->error_message = 'Empty password not allowed';
            return false;
        }

        // Initialize variables
        $conditions = '';

        // Get a database object
        $db =& JFactory::getDBO();
        $username = $db->Quote($credentials['username']);

        $query = 'SELECT `username`,`id`, `password`'
            . ' FROM `#__users`'
            . ' WHERE username=' . $username;

        //if an email
        if(strpos($username,'@'))
            $query .= ' OR email='.$username;

        $db->setQuery($query);

        $result = $db->loadObject();

        if($result)
        {
            //if login with email then set the username credential
            $credentials['username'] = $result->username;
            $parts  = explode( ':', $result->password );
            $crypt  = $parts[0];
            $salt   = @$parts[1];
            $testcrypt = JUserHelper::getCryptedPassword($credentials['password'], $salt);

            if($crypt == $testcrypt)
            {
                // Bring this in line with the rest of the system
                $user = JUser::getInstance($result->id);
                $response->email = $user->email;
                $response->fullname = $user->name;
                $response->status = JAUTHENTICATE_STATUS_SUCCESS;
                $response->error_message = '';
            }
            else
            {
                $response->status = JAUTHENTICATE_STATUS_FAILURE;
                $response->error_message = 'Invalid password';
            }
        }
        else
        {
            $response->status = JAUTHENTICATE_STATUS_FAILURE;
            $response->error_message = 'User does not exist';
        }
    }
}

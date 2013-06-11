<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Tweet
 *
 * @copyright   Copyright (C) 2013 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Joomla Tweet plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.Tweet
 * @since       3.1
 */
class PlgSystemTweet extends JPlugin
{
	/**
	 * Method to catch the onAfterDispatch event.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   3.1
	 */
	public function onAfterDispatch()
	{
		// Check that we are in the site application.
		if (JFactory::getApplication()->isAdmin())
		{
			return true;
		}

		// Register dependent classes.
		JLoader::register('JHtmlTweet', __DIR__ . '/helpers/html/tweet.php');

		// Register a function.
		JHtml::register('jquery.tweet', array('JHtmlTweet', 'tweet'));

		return true;
	}
}

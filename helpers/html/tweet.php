<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2013 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('JPATH_PLATFORM') or die;

/**
 * Tweet Utility class for jQuery JavaScript behaviors.
 *
 * @package     Joomla.Libraries
 * @subpackage  HTML
 * @since       3.1
 */
abstract class JHtmlTweet extends JHtmlJquery
{
	/**
	 * Method to load the jQuery Tweet into the document head.
	 *
	 * @param   string   $selector  The HTML selector.
	 * @param   boolean  $css       If true, load the default css.
	 * @param   boolean  $minified  If true, use the minified version.
	 * @param   mixed    $debug     Is debugging mode on? [optional]
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public static function tweet($selector = null, $css = false, $minified = true, $debug = null)
	{
		// Include jQuery.
		self::framework();

		// If no debugging value is set, use the configuration setting.
		if ($debug === null)
		{
			$config = JFactory::getConfig();
			$debug  = (boolean) $config->get('debug');
		}

		// Add Stylesheet.
		if ($css)
		{
			JHtml::stylesheet('plg_system_plugin/jquery.tweet.css', false, true, false);
		}

		// Add JavaScript.
		if ($minified)
		{
			JHtml::script('plg_system_plugin/jquery.tweet.min.js', false, true);
		}
		else
		{
			JHtml::script('plg_system_plugin/jquery.tweet.js', false, true);
		}

		if ($selector)
		{
			// Get the document object.
			$doc = JFactory::getDocument();

			// Build the script.
			$script = array();
			$script[] = 'jQuery(document).ready(function() {';
			$script[] = '	if ($.fn.fitVids) {';
			$script[] = '		$(\'' . $selector . '\').fitVids();';
			$script[] = '	}';
			$script[] = '});';

			// Add the script to the document head.
			$doc->addScriptDeclaration(implode("\n", $script));
		}

		return;
	}
}

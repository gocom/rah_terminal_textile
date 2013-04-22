<?php

/**
 * Generates HTML markup from supplied Textile markup.
 *
 * @package   rah_terminal
 * @author    Jukka Svahn
 * @copyright (c) 2012 Jukka Svahn
 * @date      2012-
 * @license   GNU GPLv2
 * @link      https://github.com/gocom/rah_terminal__textile
 *
 * Copyright (C) 2013 Jukka Svahn http://rahforum.biz
 * Licensed under GNU Genral Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

class rah_terminal__textile
{
	/**
	 * Constructor.
	 */

	public function __construct()
	{
		register_callback(array($this, 'register'), 'rah_terminal', '', 1);
	}

	/**
	 * Register a terminal option.
	 */

	public function register()
	{
		add_privs('rah_terminal.textile', '1,2,3,4');
		rah_terminal::get()->add_terminal('textile', 'Textile', array($this, 'process'));
	}

	/**
	 * Processes Textile markup and renders HTML.
	 *
	 * @param  string $markup Textile markup
	 * @return string HTML
	 */

	public function process($markup)
	{
		$textile = new Textpattern_Textile_Parser();
		return $textile->TextileThis($markup);
	}
}

new rah_terminal__textile();
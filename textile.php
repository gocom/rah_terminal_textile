<?php

/**
 * Generates HTML markup from supplied Textile markup.
 *
 * @package   rah_terminal
 * @author    Jukka Svahn
 * @copyright (c) 2012 Jukka Svahn
 * @date      2012-
 * @license   GNU GPLv2
 *
 * Copyright (C) 2012 Jukka Svahn http://rahforum.biz
 * Licensed under GNU Genral Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

	new rah_terminal__textile();

/**
 * Textile module.
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
		include_once txpath.'/lib/classTextile.php';
		$textile = new Textile(get_pref('doctype'));
		return $textile->TextileThis($markup);
	}
}
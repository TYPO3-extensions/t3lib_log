<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2012 Steffen Mueller <typo3@t3node.com>
 * (c) 2012 Ingo Renner <ingo@typo3.org>
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Triggers to autoload t3lib_log classes from Extension instead of t3lib/log/
 *
 * This class is registered in ext_autoload.php and will be found by the
 * regular TYPO3 core autoloader when called in ext_localconf.php
 *
 * ext_autoload.php however, also contains classes with a t3lib_log prefix and
 * will thus be available to the system, too when the autoloader file is loaded.
 *
 * Derived from EXT:solrgrouping
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @author Steffen Mueller <typo3@t3node.com>
 * @package TYPO3
 */
final class tx_t3liblog_utility_autoloader {

	/**
	 * Dummy method to trigger loading of the ext_autoload.php file.
	 *
	 * @return void
	 */
	public static function triggerClassAutoLoading() {}

}

?>
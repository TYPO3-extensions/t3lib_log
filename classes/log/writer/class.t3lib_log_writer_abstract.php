<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2011-2012 Ingo Renner (ingo@typo3.org)
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
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
 * Abstract implementation of a log writer
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage t3lib
 */
abstract class t3lib_log_writer_Abstract implements t3lib_log_writer_Writer {

	/**
	 * Constructs this log writer
	 *
	 * @param array $options Configuration options - depends on the actual log writer
	 * @throws InvalidArgumentException
	 */
	public function __construct(array $options = array()) {
		foreach ($options as $optionKey => $optionValue) {
			$methodName = 'set' . ucfirst($optionKey);

			if (method_exists($this, $methodName)) {
				$this->$methodName($optionValue);
			} else {
				throw new InvalidArgumentException(
					'Invalid log writer option "' . $optionKey . '" for log writer of type "' . get_class($this) . '"',
					1321696151
				);
			}
		}
	}

}

?>
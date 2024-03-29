<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2011-2012 Steffen Gebert (steffen.gebert@typo3.org)
 * (c) 2011-2012 Steffen Müller (typo3@t3node.com)
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
 * Log writer that writes the log records into a file.
 *
 * @author Steffen Gebert <steffen.gebert@typo3.org>
 * @author Steffen Müller <typo3@t3node.com>
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage t3lib
 */
class t3lib_log_writer_File extends t3lib_log_writer_Abstract {

	/**
	 * Log file path, relative to PATH_site
	 *
	 * @var string
	 */
	protected  $logFile = '';

	/**
	 * Default log file path
	 *
	 * @var string
	 */
	protected $defaultLogFile = 'typo3temp/logs/typo3.log';

	/**
	 * Log file handle
	 *
	 * @static
	 * @var resource
	 */
	static $logFileHandle = NULL;

	/**
	 * Constructor, opens the log file handle
	 *
	 * @param array $options
	 * @return t3lib_log_writer_File
	 */
	public function __construct(array $options = array()) {

			// the parent constructor reads $options and sets them
		parent::__construct($options);

		if (empty($options['logFile'])) {
			$this->setLogFile($this->defaultLogFile);
		}
	}

	/**
	 * Destructor, closes the log file handle
	 *
	 */
	public function __destruct() {
		$this->closeLogFile();
	}

	/**
	 * Sets the path to the log file.
	 *
	 * @param string $logFile path to the log file, relative to PATH_site
	 * @return t3lib_log_writer_Writer
	 * @throws InvalidArgumentException
	 */
	public function setLogFile($logFile) {
		if (is_resource(self::$logFileHandle)) {
			$this->closeLogFile();
		}

			// Skip handling if logFile is a stream resource
			// This is used by unit tests with vfs:// directories
		if (FALSE === strpos($logFile, '://')) {
			if (!t3lib_div::isAllowedAbsPath(PATH_site . $logFile)) {
				throw new InvalidArgumentException(
					'Log file path "' . $logFile . '" is not valid!',
					1326411176
				);
			}
			$logFile = t3lib_div::getFileAbsFileName($logFile);
		}

		$this->logFile = $logFile;
		$this->openLogFile();

		return $this;
	}

	/**
	 * Gets the path to the log file.
	 *
	 * @return string Path to the log file.
	 */
	public function getLogFile() {
		return $this->logFile;
	}

	/**
	 * Writes the log record
	 *
	 * @param t3lib_log_Record $record Log record
	 * @return t3lib_log_writer_Writer $this
	 * @throws RuntimeException
	 */
	public function writeLog(t3lib_log_Record $record) {
		if (FALSE === fwrite(self::$logFileHandle, $record . LF)) {
			throw new RuntimeException('Could not write log record to log file', 1345036335);
		}

		return $this;
	}

	/**
	 * Opens the log file handle
	 *
	 * @return void
	 * @throws RuntimeException if the log file can't be opened.
	 */
	protected function openLogFile() {
		$this->createLogFile();

		self::$logFileHandle = fopen($this->logFile, 'a');

		if (!is_resource(self::$logFileHandle)) {
			throw new RuntimeException('Could not open log file "' . $this->logFile . '"', 1321804422);
		}
	}

	/**
	 * Closes the log file handle.
	 *
	 * @return void
	 */
	protected function closeLogFile() {
		if (is_resource(self::$logFileHandle)) {
			fclose(self::$logFileHandle);
		}
	}

	/**
	 * Creates the log file with correct permissions
	 * and parent directories, if needed
	 *
	 * @return void
	 */
	protected function createLogFile() {
		if (file_exists($this->logFile)) {
			return;
		}

		$logFileDirectory = dirname($this->logFile);
		if (!@is_dir($logFileDirectory)) {
			if (t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version) < 4006000) {
				$logFileDirectory = substr($logFileDirectory, strlen(PATH_site));
				t3lib_div::mkdir_deep(PATH_site, $logFileDirectory);
			} else {
				t3lib_div::mkdir_deep($logFileDirectory);
			}

				// only create .htaccess, if we created the directory on our own
			$this->createHtaccessFile($logFileDirectory . '/.htaccess');
		}

			// create the log file
		t3lib_div::writeFile($this->logFile, '');
	}

	/**
	 * Creates .htaccess file inside a new directory to access protect it
	 *
	 * @param string $htaccessFile Path of .htaccess file
	 * @return void
	 */
	protected function createHtaccessFile($htaccessFile) {
			// write .htaccess file to protect the log file
		if (!empty($GLOBALS['TYPO3_CONF_VARS']['SYS']['generateApacheHtaccess']) && !file_exists($htaccessFile)) {
			t3lib_div::writeFile($htaccessFile, 'Deny From All');
		}
	}

}

?>
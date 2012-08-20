<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

	// trigger loading of ext_autoload.php
tx_t3liblog_utility_autoloader::triggerClassAutoLoading();

	// Provide a basis set of configuration
$GLOBALS['TYPO3_CONF_VARS']['LOG'] = array(
	'writerConfiguration' => array(
		t3lib_log_Level::DEBUG => array(
			't3lib_log_writer_File' => array(
				'logFile' => 'typo3temp/logs/typo3.log'
			),
		),
	),
);

?>
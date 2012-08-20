<?php

########################################################################
# Extension Manager/Repository config file for ext "t3lib_log".
#
# Auto generated 20-08-2012 15:09
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Logging API Backport',
	'description' => 'Backport of the Logging API for TYPO3 4.5 - 4.7',
	'category' => 'services',
	'author' => 'Steffen Müller',
	'author_email' => 'typo3@t3node.com',
	'author_company' => '',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-4.7.99',
		),
		'conflicts' => array(
			'typo3' => '6.0.0-99.99.99',
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:23:{s:16:"ext_autoload.php";s:4:"99a4";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"0021";s:37:"classes/log/class.t3lib_log_level.php";s:4:"9098";s:38:"classes/log/class.t3lib_log_logger.php";s:4:"4eb4";s:42:"classes/log/class.t3lib_log_logmanager.php";s:4:"98e0";s:38:"classes/log/class.t3lib_log_record.php";s:4:"331b";s:60:"classes/log/processor/class.t3lib_log_processor_abstract.php";s:4:"8bdb";s:66:"classes/log/processor/class.t3lib_log_processor_abstractmemory.php";s:4:"d11f";s:65:"classes/log/processor/class.t3lib_log_processor_introspection.php";s:4:"30cf";s:67:"classes/log/processor/class.t3lib_log_processor_memorypeakusage.php";s:4:"94a2";s:63:"classes/log/processor/class.t3lib_log_processor_memoryusage.php";s:4:"30ff";s:56:"classes/log/processor/class.t3lib_log_processor_null.php";s:4:"8c78";s:55:"classes/log/processor/class.t3lib_log_processor_web.php";s:4:"9034";s:76:"classes/log/processor/interfaces/interface.t3lib_log_processor_processor.php";s:4:"4dfd";s:54:"classes/log/writer/class.t3lib_log_writer_abstract.php";s:4:"b3ce";s:54:"classes/log/writer/class.t3lib_log_writer_database.php";s:4:"9406";s:50:"classes/log/writer/class.t3lib_log_writer_file.php";s:4:"bf99";s:50:"classes/log/writer/class.t3lib_log_writer_null.php";s:4:"a885";s:57:"classes/log/writer/class.t3lib_log_writer_phperrorlog.php";s:4:"4262";s:52:"classes/log/writer/class.t3lib_log_writer_syslog.php";s:4:"3366";s:67:"classes/log/writer/interfaces/interface.t3lib_log_writer_writer.php";s:4:"00ce";s:56:"classes/utility/class.tx_t3liblog_utility_autoloader.php";s:4:"400f";}',
);

?>
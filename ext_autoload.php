<?php

$extensionClassesPath = t3lib_extMgm::extPath('t3lib_log') . 'classes/';

return array(
	'tx_t3liblog_utility_autoloader' => $extensionClassesPath . 'utility/class.tx_t3liblog_utility_autoloader.php',
	'tx_t3liblog_utility_request' => $extensionClassesPath . 'utility/class.tx_t3liblog_utility_request.php',

	't3lib_log_level' => $extensionClassesPath . 'log/class.t3lib_log_level.php',
	't3lib_log_logger' => $extensionClassesPath . 'log/class.t3lib_log_logger.php',
	't3lib_log_logmanager' => $extensionClassesPath . 'log/class.t3lib_log_logmanager.php',
	't3lib_log_processor_abstract' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_abstract.php',
	't3lib_log_processor_abstractmemory' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_abstractmemory.php',
	't3lib_log_processor_introspection' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_introspection.php',
	't3lib_log_processor_memorypeakusage' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_memorypeakusage.php',
	't3lib_log_processor_memoryusage' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_memoryusage.php',
	't3lib_log_processor_null' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_null.php',
	't3lib_log_processor_processor' => $extensionClassesPath . 'log/processor/interfaces/interface.t3lib_log_processor_processor.php',
	't3lib_log_processor_web' => $extensionClassesPath . 'log/processor/class.t3lib_log_processor_web.php',
	't3lib_log_record' => $extensionClassesPath . 'log/class.t3lib_log_record.php',
	't3lib_log_writer_abstract' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_abstract.php',
	't3lib_log_writer_database' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_database.php',
	't3lib_log_writer_file' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_file.php',
	't3lib_log_writer_null' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_null.php',
	't3lib_log_writer_phperrorlog' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_phperrorlog.php',
	't3lib_log_writer_syslog' => $extensionClassesPath . 'log/writer/class.t3lib_log_writer_syslog.php',
	't3lib_log_writer_writer' => $extensionClassesPath . 'log/writer/interfaces/interface.t3lib_log_writer_writer.php',
);

?>
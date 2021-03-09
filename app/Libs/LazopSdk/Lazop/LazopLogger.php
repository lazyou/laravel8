<?php

namespace App\Libs\LazopSdk\Lazop;

class LazopLogger
{
	public function __construct()
	{
		if (!defined("LAZOP_SDK_WORK_DIR"))
		{
			define("LAZOP_SDK_WORK_DIR", dirname(__FILE__));
		}

		if (!defined("LAZOP_AUTOLOADER_PATH"))
		{
			define("LAZOP_AUTOLOADER_PATH", dirname(__FILE__));
		}
	}

	public $conf = array(
		"separator" => "\t",
		"log_file" => ""
	);

	private $fileHandle;

	protected function getFileHandle()
	{
		if (null === $this->fileHandle)
		{
			if (empty($this->conf["log_file"]))
			{
				trigger_error("no log file spcified.");
			}
			$logDir = dirname($this->conf["log_file"]);
			if (!is_dir($logDir))
			{
				mkdir($logDir, 0777, true);
			}
			$this->fileHandle = fopen($this->conf["log_file"], "a");
		}
		return $this->fileHandle;
	}

	public function log($logData)
	{
		if ("" == $logData || array() == $logData)
		{
			return false;
		}
		if (is_array($logData))
		{
			$logData = implode($this->conf["separator"], $logData);
		}
		$logData = $logData. "\n";
		fwrite($this->getFileHandle(), $logData);
	}
}
?>

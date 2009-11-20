<?php

namespace li3_bot\models;

use \DirectoryIterator;

class Log extends \lithium\core\StaticObject {

	public static $path = null;
	protected static $_pattern = null;

	public static function __init() {
		static::$path = LITHIUM_APP_PATH . '/tmp/logs/';
		static::$_pattern = '/^(?P<time>\d+:\d+(:\d+)?) : (?P<user>[^\s]+) : (?P<message>.*)/';
	}

	public static function save($data = null) {
		$file = static::$path . $data['channel'] . '/' . date('Y-m-d');
		if (!is_dir(static::$path . $data['channel'])) {
			mkdir(static::$path . $data['channel']);
		}
		$fp = !file_exists($file) ? fopen($file, 'x+') : fopen($file, 'a+');
		if (!is_resource($fp)) {
			return false;
		}
		$log = date('H:i:s') . " : {$data['user']} : {$data['message']}\n";
		fwrite($fp, $log);
		fclose($fp);
		return $data;
	}

	public static function read($date) {
		$fp = fopen(static::$path . $date, 'r+');
		$log = array();

		while (!feof($fp)) {
			$line = fgets($fp);
			if (preg_match(static::$_pattern, $line, $matches)) {
				$log[] = $matches;
			}
		}

		fclose($fp);
		return $log;
	}

	public static function find($type, $options = array()) {

		if (!empty($options['channel'])) {
			$path = static::$path . '#' . $options['channel'];
			return array_values(array_filter(scandir($path), function ($file) {
				if ($file[0] == '.') {
					return false;
				}
				return true;
			}));
		}

		$directory = new DirectoryIterator(static::$path);
		$results = array();
		foreach ($directory as $dir) {
			$name = $dir->getFilename();
			if (strpos($name, '#') === false) {
				continue;
			}
			$results[] = substr($name, 1);
		}
		return $results;
	}
}

?>

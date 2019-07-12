<?php

##eloom.licenca##

define('ELOOM_LOGGER_LEVEL', (isset($_SERVER['MAGE_IS_DEVELOPER_MODE']) ? 'DEBUG' : 'INFO'));
define('ELOOM_CONFIGURATION_FILE', Mage::getBaseDir('var') . DS . 'log' . DS . 'eloom-log4php.properties');
define('ELOOM_LOGGER_FILE', Mage::getBaseDir('var') . DS . 'log' . DS . 'eloom-%s.log');
define('ELOOM_LOGGER_DEFAULT_APPENDER', 'Eloom_Log4php_Appenders_LoggerAppenderDailyFile');

class Eloom_Bootstrap_Logger extends Eloom_Log4php_Logger {

  private static $configurationFile;
  private static $configured = false;
  private static $appenders = array('file' => array('log4php.appender.default.Threshold' => ELOOM_LOGGER_LEVEL,
          'log4php.appender.default' => ELOOM_LOGGER_DEFAULT_APPENDER,
          'log4php.appender.default.file' => ELOOM_LOGGER_FILE,
          'log4php.appender.default.datePattern' => 'Ymd',
          'log4php.appender.default.layout' => 'Eloom_Log4php_Layouts_LoggerLayoutPattern',
          'log4php.appender.default.layout.conversionPattern' => '"%d{Y-m-d H:i:s.u} %c:%L %-5p %m%n"'));

  public static function getLogger($name) {
    if (!self::$configured) {
      self::configureLog4php();
      self::$configured = true;
    }
    return parent::getLogger($name);
  }

  private static function configureLog4php() {
    if (self::$configured == false) {
      self::$configured = true;
      self::$configurationFile = ELOOM_CONFIGURATION_FILE;

      $configutations = self::fillAllAppenders();
      self::generateConfigFile($configutations);
      Eloom_Log4php_Logger::configure(self::$configurationFile);
    }
  }

  private static function generateConfigFile($content) {
    if (!file_exists(self::$configurationFile)) {
      $fh = fopen(self::$configurationFile, 'a', false) or die("Impossível abrir arquivo " . self::$configurationFile);
      foreach ($content as $key => $value) {
        fwrite($fh, $key . '=' . $value . "\n");
      }
      if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') {
        chmod(self::$configurationFile, 0777);
      }
      fclose($fh);
    }
  }

  private static function fillAllAppenders() {
    $configutations = array('log4php.rootLogger' => ELOOM_LOGGER_LEVEL . ', default');
    foreach (self::$appenders as $key => $value) {
      foreach ($value as $key2 => $value2) {
        $configutations[$key2] = $value2;
      }
    }
    return $configutations;
  }

}

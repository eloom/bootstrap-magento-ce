<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * 
 *		http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * @package log4php
 */

/**
 * This is the central class in the log4php package. All logging operations 
 * are done through this class.
 * 
 * The main logging methods are:
 * 	<ul>
 * 		<li>{@link trace()}</li>
 * 		<li>{@link debug()}</li>
 * 		<li>{@link info()}</li>
 * 		<li>{@link warn()}</li>
 * 		<li>{@link error()}</li>
 * 		<li>{@link fatal()}</li>
 * 	</ul>
 * 
 * @category   log4php
 * @package    log4php
 * @license	   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @version	   SVN: $Id: Logger.php 1137439 2011-06-19 21:13:04Z ihabunek $
 * @link	   http://logging.apache.org/log4php
 */
class Eloom_Log4php_Logger {
	
        /**
	 * Logger additivity. If set to true then child loggers will inherit
	 * the appenders of their ancestors by default.
	 * @var boolean
	 */
	private $additive = true;
	
	/** The Logger's fully qualified class name. */
	private $fqcn = 'Eloom_Log4php_Logger';

	/** The assigned Logger level. */
	private $level;
	
	/** The name of this Logger instance. */
	private $name;
	
	/** The parent logger. Set to null if this is the root logger. */
	private $parent;
	
	/**
	 * A collection of appenders associated with this logger.
	 * @see Eloom_Log4php_LoggerAppender
	 */
	private $appenders = array();

	/** The logger hierarchy used by log4php. */
	private static $hierarchy;
	
	/** 
	 * Name of the configurator class used to configure log4php. 
	 * Populated by {@link configure()} and used in {@link initialize()}.
	 */
	private static $configurationClass = 'Eloom_Log4php_Configurators_LoggerConfiguratorBasic';
	
	/** 
	 * Path to the configuration file which may be used by the configurator.
	 * Populated by {@link configure()} and used in {@link initialize()}. 
	 */
	private static $configurationFile;
	
	/** Inidicates if log4php has been initialized */
	private static $initialized = false;
	
	/**
	 * Constructor.
	 * @param string $name Name of the logger.	  
	 */
	public function __construct($name) {
		$this->name = $name;
	}
	
	/**
	 * Returns the logger name.
	 * @return string
	 */
	public function getName() {
		return $this->name;
	} 

	/**
	 * Returns the parent Logger. Can be null if this is the root logger.
	 * @return Logger
	 */
	public function getParent() {
		return $this->parent;
	}
	
	/**
	 * Returns the hierarchy used by this Logger.
	 * Caution: do not use this hierarchy unless you have called initialize().
	 * To get Loggers, use the Logger::getLogger and Logger::getRootLogger methods
	 * instead of operating on on the hierarchy directly.
	 * 
	 * @deprecated - will be moved to private
	 * @return Eloom_Log4php_LoggerHierarchy
	 */
	public static function getHierarchy() {
		if(!isset(self::$hierarchy)) {
			self::$hierarchy = new Eloom_Log4php_LoggerHierarchy(new Eloom_Log4php_LoggerRoot());
		}
		return self::$hierarchy;
	}
	
	/* Logging methods */
	/**
	 * Log a message object with the TRACE level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function trace($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelTrace(), $message, $caller);
	} 		
	
	/**
	 * Log a message object with the DEBUG level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function debug($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelDebug(), $message, $caller);
	} 


	/**
	 * Log a message object with the INFO Level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function info($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelInfo(), $message, $caller);
	}

	/**
	 * Log a message with the WARN level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function warn($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelWarn(), $message, $caller);
	}
	
	/**
	 * Log a message object with the ERROR level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function error($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelError(), $message, $caller);
	}
	
	/**
	 * Log a message object with the FATAL level.
	 *
	 * @param mixed $message message
	 * @param mixed $caller caller object or caller string id
	 */
	public function fatal($message, $caller = null) {
		$this->log(Eloom_Log4php_LoggerLevel::getLevelFatal(), $message, $caller);
	}
	
	/**
	 * This method creates a new logging event and logs the event without 
	 * further checks.
	 *
	 * It should not be called directly. Use {@link trace()}, {@link debug()},
	 * {@link info()}, {@link warn()}, {@link error()} and {@link fatal()} 
	 * wrappers.
	 *
	 * @param string $fqcn Fully qualified class name of the Logger
	 * @param mixed $caller caller object or caller string id
	 * @param Eloom_Log4php_LoggerLevel $level log level	   
	 * @param mixed $message message to log
	 */
	public function forcedLog($fqcn, $caller, $level, $message) {
		$throwable = ($caller !== null && $caller instanceof Exception) ? $caller : null;
		
		$this->callAppenders(new Eloom_Log4php_LoggerLoggingEvent($fqcn, $this, $level, $message, null, $throwable));
	} 
	
	
	/**
	 * Check whether this Logger is enabled for the DEBUG Level.
	 * @return boolean
	 */
	public function isDebugEnabled() {
		return $this->isEnabledFor(Eloom_Log4php_LoggerLevel::getLevelDebug());
	}		

	/**
	 * Check whether this Logger is enabled for a given Level passed as parameter.
	 *
	 * @param Eloom_Log4php_LoggerLevel level
	 * @return boolean
	 */
	public function isEnabledFor($level) {
		return (bool)($level->isGreaterOrEqual($this->getEffectiveLevel()));
	} 

	/**
	 * Check whether this Logger is enabled for the INFO Level.
	 * @return boolean
	 */
	public function isInfoEnabled() {
		return $this->isEnabledFor(Eloom_Log4php_LoggerLevel::getLevelInfo());
	} 

	/**
	 * Log a message using the provided logging level.
	 *
	 * @param Eloom_Log4php_LoggerLevel $priority The logging level.
	 * @param mixed $message Message to log.
	 * @param mixed $caller caller object or caller string id
	 */
	public function log($priority, $message, $caller = null) {
		if($this->isEnabledFor($priority)) {
			$this->forcedLog($this->fqcn, $caller, $priority, $message);
		}
	}
	
	/**
	 * If assertion parameter is false, then logs the message as an error.
	 *
	 * @param bool $assertion
	 * @param string $msg message to log
	 */
	public function assertLog($assertion = true, $msg = '') {
		if($assertion == false) {
			$this->error($msg);
		}
	}
	
	/* Factory methods */ 
	
	/**
	 * Get a Logger by name (Delegate to {@link Logger})
	 * 
	 * @param string $name logger name
	 * @param LoggerFactory $factory a {@link LoggerFactory} instance or null
	 * @return Logger
	 * @static 
	 */
	public static function getLogger($name) {
		if(!self::isInitialized()) {
			self::initialize();
		}
		return self::getHierarchy()->getLogger($name);
	}
	
	/**
	 * Get the Root Logger (Delegate to {@link Logger})
	 * @return Eloom_Log4php_LoggerRoot
	 * @static 
	 */	   
	public static function getRootLogger() {
		if(!self::isInitialized()) {
			self::initialize();
		}
		return self::getHierarchy()->getRootLogger();	  
	}
	
	/* Configuration methods */
	
	/**
	 * Add a new appender to the Logger.
	 *
	 * @param Eloom_Log4php_LoggerAppender $appender The appender to add.
	 */
	public function addAppender($appender) {
		$appenderName = $appender->getName();
		$this->appenders[$appenderName] = $appender;
	}
	
	/**
	 * Remove all previously added appenders from the Logger.
	 */
	public function removeAllAppenders() {
		$appenderNames = array_keys($this->appenders);
		$enumAppenders = count($appenderNames);
		for($i = 0; $i < $enumAppenders; $i++) {
			$this->removeAppender($appenderNames[$i]); 
		}
	} 
			
	/**
	 * Remove the appender passed as parameter form the Logger.
	 *
	 * @param string|Eloom_Log4php_LoggerAppender $appender an appender name or a {@link Eloom_Log4php_LoggerAppender} instance.
	 */
	public function removeAppender($appender) {
		if($appender instanceof Eloom_Log4php_LoggerAppender) {
			$appender->close();
			unset($this->appenders[$appender->getName()]);
		} else if (is_string($appender) and isset($this->appenders[$appender])) {
			$this->appenders[$appender]->close();
			unset($this->appenders[$appender]);
		}
	} 
			
	/**
	 * Forwards the given logging event to all appenders associated with the 
	 * Logger.
	 *
	 * @param Eloom_Log4php_LoggerLoggingEvent $event 
	 */
	public function callAppenders($event) {
		foreach($this->appenders as $appender) {
			$appender->doAppend($event);
		}
		
		if($this->parent != null and $this->getAdditivity()) {
			$this->parent->callAppenders($event);
		}
	}
	
	/**
	 * Get the appenders contained in this logger as an array.
	 * @return array collection of appender names
	 */
	public function getAllAppenders() {
		return array_values($this->appenders);
	}
	
	/**
	 * Get an appender by name.
	 * @return Eloom_Log4php_LoggerAppender
	 */
	public function getAppender($name) {
		return $this->appenders[$name];
	}
	
	/**
	 * Get the additivity flag.
	 * @return boolean
	 */
	public function getAdditivity() {
		return $this->additive;
	}
 
	/**
	 * Starting from this Logger, search the Logger hierarchy for a non-null level and return it.
	 * @see Eloom_Log4php_LoggerLevel
	 * @return Eloom_Log4php_LoggerLevel or null
	 */
	public function getEffectiveLevel() {
		for($c = $this; $c != null; $c = $c->parent) {
			if($c->getLevel() !== null) {
				return $c->getLevel();
			}
		}
		return null;
	}
  
	/**
	 * Get the assigned Logger level.
	 * @return Eloom_Log4php_LoggerLevel The assigned level or null if none is assigned. 
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Set the Logger level.
	 *
	 * @param Eloom_Log4php_LoggerLevel $level the level to set
	 */
	public function setLevel($level) {
		$this->level = $level;
	}
	
	/**
	 * Clears all Logger definitions from the logger hierarchy.
	 * 
	 * @static
	 * @return boolean 
	 */
	public static function clear() {
		return self::getHierarchy()->clear();	 
	}
	
	/**
	 * Destroy configurations for logger definitions
	 * 
	 * @static
	 * @return boolean 
	 */
	public static function resetConfiguration() {
		$result = self::getHierarchy()->resetConfiguration();
		self::$initialized = false;
		self::$configurationClass = 'Eloom_Log4php_Configurators_LoggerConfiguratorBasic';
		self::$configurationFile = null;
		return $result;	 
	}

	/**
	 * Safely close all appenders.
	 * 
	 * @deprecated This is no longer necessary due the appenders shutdown via
	 * destructors.
	 * @static
	 */
	public static function shutdown() {
		return self::getHierarchy()->shutdown();	   
	}
	
	/**
	 * check if a given logger exists.
	 * 
	 * @param string $name logger name 
	 * @static
	 * @return boolean
	 */
	public static function exists($name) {
		return self::getHierarchy()->exists($name);
	}
	
	/**
	 * Returns an array this whole Logger instances.
	 * 
	 * @static
	 * @see Logger
	 * @return array
	 */
	public static function getCurrentLoggers() {
		return self::getHierarchy()->getCurrentLoggers();
	}
	
	/**
	 * Checks whether an appender is attached to this logger instance.
	 *
	 * @param Eloom_Log4php_LoggerAppender $appender
	 * @return boolean
	 */
	public function isAttached(Eloom_Log4php_LoggerAppender $appender) {
		return isset($this->appenders[$appender->getName()]);
	} 
		   
	/**
	 * Sets the additivity flag.
	 * @param boolean $additive
	 */
	public function setAdditivity($additive) {
		$this->additive = (bool)$additive;
	}

	/**
	 * Sets the parent logger.
	 * @param Logger $logger
	 */
	public function setParent(Eloom_Log4php_Logger $logger) {
		$this->parent = $logger;
	} 
	
	/**
	 * Configures log4php by defining a configuration file and/or class.
	 * 
	 * This method needs to be called before the first logging event has 
	 * occured. If this method is not called before then, the standard 
	 * configuration takes place (@see Eloom_Log4php_Configurators_LoggerConfiguratorBasic).
	 * 
	 * If only the configuration file is given, the configurator class will
	 * be determined by the config file extension.  
	 * 
	 * If a custom configurator class is provided, the configuration file
	 * should either be null or contain the path to file used by the custom 
	 * configurator. Make sure the configurator class is already loaded, or
	 * that it can be included by PHP when necessary.
	 * 
	 * @param string $configurationFile path to the configuration file
	 * @param string $configurationClass name of the custom configurator class 
	 */
	public static function configure($configurationFile = null, $configurationClass = null ) {
		if($configurationClass === null && $configurationFile === null) {
			self::$configurationClass = 'Eloom_Log4php_Configurators_LoggerConfiguratorBasic';
			return;
		}
									 	
		if($configurationClass !== null) {
			self::$configurationFile = $configurationFile;
			self::$configurationClass = $configurationClass;
			return;
		}
		
		if (strtolower(substr( $configurationFile, -4 )) == '.xml') {
			self::$configurationFile = $configurationFile;
			self::$configurationClass = 'Eloom_Log4php_Configurators_LoggerConfiguratorXml';
		} else {
			self::$configurationFile = $configurationFile;
			self::$configurationClass = 'Eloom_Log4php_Configurators_LoggerConfiguratorIni';
		}
	}
	
	/**
	 * Returns the current {@link Logger::$configurationClass configurator class}.
	 * @return string the configurator class name
	 */
	public static function getConfigurationClass() {
		return self::$configurationClass;
	}
	
	/**
	 * Returns the current {@link Logger::$configurationFile configuration file}.
	 * @return string the configuration file
	 */
	public static function getConfigurationFile() {
		return self::$configurationFile;
	}
	
	/**
	 * Returns true if the log4php framework has been initialized.
	 * @return boolean 
	 */
	private static function isInitialized() {
		return self::$initialized;
	}
	
	/**
	 * Initializes the log4php framework using the provided {@link 
	 * Logger::$configurationClass configuration class}  and {@link 
	 * Logger::$configurationFile configuration file}.
	 * @return boolean
	 */
	public static function initialize() {
		self::$initialized = true;
		$instance = Eloom_Log4php_LoggerReflectionUtils::createObject(self::$configurationClass);
		$result = $instance->configure(self::getHierarchy(), self::$configurationFile);
		return $result;
	}
}

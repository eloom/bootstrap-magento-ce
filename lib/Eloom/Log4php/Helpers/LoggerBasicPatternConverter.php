<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 *	   http://www.apache.org/licenses/LICENSE-2.0
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
 * @package log4php
 * @subpackage helpers
 */
class Eloom_Log4php_Helpers_LoggerBasicPatternConverter extends Eloom_Log4php_Helpers_LoggerPatternConverter {

	/**
	 * @var integer
	 */
	private $type;

	/**
	 * Constructor
	 *
	 * @param string $formattingInfo
	 * @param integer $type
	 */
	public function __construct($formattingInfo, $type) {
		parent::__construct($formattingInfo);
		$this->type = $type;
	}

	/**
	 * @param Eloom_Log4php_LoggerLoggingEvent $event
	 * @return string
	 */
	public function convert($event) {
		switch($this->type) {
			case Eloom_Log4php_Helpers_LoggerPatternParser::RELATIVE_TIME_CONVERTER:
				$timeStamp = $event->getTimeStamp();
				$startTime = Eloom_Log4php_LoggerLoggingEvent::getStartTime();
				return (string)(int)($timeStamp * 1000 - $startTime * 1000);
				
			case Eloom_Log4php_Helpers_LoggerPatternParser::THREAD_CONVERTER:
				return $event->getThreadName();

			case Eloom_Log4php_Helpers_LoggerPatternParser::LEVEL_CONVERTER:
				$level = $event->getLevel();
				return $level->toString();

			case Eloom_Log4php_Helpers_LoggerPatternParser::NDC_CONVERTER:
				return $event->getNDC();

			case Eloom_Log4php_Helpers_LoggerPatternParser::MESSAGE_CONVERTER:
				return $event->getRenderedMessage();
				
			default: 
				return '';
		}
	}
}

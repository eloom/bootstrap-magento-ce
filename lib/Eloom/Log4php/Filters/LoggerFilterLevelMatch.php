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
 * This is a very simple filter based on level matching.
 *
 * <p>The filter admits two options <b><var>LevelToMatch</var></b> and
 * <b><var>AcceptOnMatch</var></b>. If there is an exact match between the value
 * of the <b><var>LevelToMatch</var></b> option and the level of the 
 * {@link Eloom_Log4php_LoggerLoggingEvent}, then the {@link decide()} method returns 
 * {@link Eloom_Log4php_LoggerFilter::ACCEPT} in case the <b><var>AcceptOnMatch</var></b> 
 * option value is set to <i>true</i>, if it is <i>false</i> then 
 * {@link Eloom_Log4php_LoggerFilter::DENY} is returned. If there is no match, 
 * {@link Eloom_Log4php_LoggerFilter::NEUTRAL} is returned.</p>
 * 
 * <p>
 * An example for this filter:
 * 
 * {@example ../../examples/php/filter_levelmatch.php 19}
 *
 * <p>
 * The corresponding XML file:
 * 
 * {@example ../../examples/resources/filter_levelmatch.xml 18}
 * 
 * @version $Revision: 1059292 $
 * @package log4php
 * @subpackage filters
 * @since 0.6
 */
class Eloom_Log4php_Filters_LoggerFilterLevelMatch extends Eloom_Log4php_LoggerFilter {
  
	/** 
	 * Indicates if this event should be accepted or denied on match
	 * @var boolean
	 */
	private $acceptOnMatch = true;

	/**
	 * The level, when to match
	 * @var Eloom_Log4php_LoggerLevel
	 */
	private $levelToMatch;
  
	/**
	 * @param boolean $acceptOnMatch
	 */
	public function setAcceptOnMatch($acceptOnMatch) {
		$this->acceptOnMatch = Eloom_Log4php_Helpers_LoggerOptionConverter::toBoolean($acceptOnMatch, true); 
	}
	
	/**
	 * @param string $l the level to match
	 */
	public function setLevelToMatch($l) {
		if($l instanceof Eloom_Log4php_LoggerLevel) {
			$this->levelToMatch = $l;
		} else {
			$this->levelToMatch = Eloom_Log4php_Helpers_LoggerOptionConverter::toLevel($l, null);
		}
	}

	/**
	 * Return the decision of this filter.
	 * 
	 * Returns {@link Eloom_Log4php_LoggerFilter::NEUTRAL} if the <b><var>LevelToMatch</var></b>
	 * option is not set or if there is not match.	Otherwise, if there is a
	 * match, then the returned decision is {@link Eloom_Log4php_LoggerFilter::ACCEPT} if the
	 * <b><var>AcceptOnMatch</var></b> property is set to <i>true</i>. The
	 * returned decision is {@link Eloom_Log4php_LoggerFilter::DENY} if the
	 * <b><var>AcceptOnMatch</var></b> property is set to <i>false</i>.
	 *
	 * @param Eloom_Log4php_LoggerLoggingEvent $event
	 * @return integer
	 */
	public function decide(Eloom_Log4php_LoggerLoggingEvent $event) {
		if($this->levelToMatch === null) {
			return Eloom_Log4php_LoggerFilter::NEUTRAL;
		}
		
		if($this->levelToMatch->equals($event->getLevel())) {	
			return $this->acceptOnMatch ? Eloom_Log4php_LoggerFilter::ACCEPT : Eloom_Log4php_LoggerFilter::DENY;
		} else {
			return Eloom_Log4php_LoggerFilter::NEUTRAL;
		}
	}
}

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
 * This is a very simple filter based on level matching, which can be
 * used to reject messages with priorities outside a certain range.
 *	
 * <p>The filter admits three options <b><var>LevelMin</var></b>, <b><var>LevelMax</var></b>
 * and <b><var>AcceptOnMatch</var></b>.</p>
 *
 * <p>If the level of the {@link Eloom_Log4php_LoggerLoggingEvent} is not between Min and Max
 * (inclusive), then {@link Eloom_Log4php_LoggerFilter::DENY} is returned.</p>
 *	
 * <p>If the Logging event level is within the specified range, then if
 * <b><var>AcceptOnMatch</var></b> is <i>true</i>, 
 * {@link Eloom_Log4php_LoggerFilter::ACCEPT} is returned, and if
 * <b><var>AcceptOnMatch</var></b> is <i>false</i>, 
 * {@link Eloom_Log4php_LoggerFilter::NEUTRAL} is returned.</p>
 *	
 * <p>If <b><var>LevelMin</var></b> is not defined, then there is no
 * minimum acceptable level (i.e. a level is never rejected for
 * being too "low"/unimportant).  If <b><var>LevelMax</var></b> is not
 * defined, then there is no maximum acceptable level (ie a
 * level is never rejected for being too "high"/important).</p>
 *
 * <p>Refer to the {@link Eloom_Log4php_LoggerAppender::setThreshold()} method
 * available to <b>all</b> appenders extending {@link Eloom_Log4php_LoggerAppender} 
 * for a more convenient way to filter out events by level.</p>
 *
 * <p>
 * An example for this filter:
 * 
 * {@example ../../examples/php/filter_levelrange.php 19}
 *
 * <p>
 * The corresponding XML file:
 * 
 * {@example ../../examples/resources/filter_levelrange.xml 18}
 *
 * @author Simon Kitching
 * @author based on the org.apache.log4j.varia.LevelRangeFilte Java code by Ceki G&uuml;lc&uuml; 
 *
 * @version $Revision: 1059292 $
 * @package log4php
 * @subpackage filters
 * @since 0.6
 */
class Eloom_Log4php_Filters_LoggerFilterLevelRange extends Eloom_Log4php_LoggerFilter {

	/**
	 * @var boolean
	 */
	private $acceptOnMatch = true;

	/**
	 * @var Eloom_Log4php_LoggerLevel
	 */
	private $levelMin;
  
	/**
	 * @var Eloom_Log4php_LoggerLevel
	 */
	private $levelMax;

	/**
	 * @param boolean $acceptOnMatch
	 */
	public function setAcceptOnMatch($acceptOnMatch) {
		$this->acceptOnMatch = Eloom_Log4php_Helpers_LoggerOptionConverter::toBoolean($acceptOnMatch, true); 
	}
	
	/**
	 * @param string $l the level min to match
	 */
	public function setLevelMin($l) {
		if($l instanceof Eloom_Log4php_LoggerLevel) {
			$this->levelMin = $l;
		} else {
			$this->levelMin = Eloom_Log4php_Helpers_LoggerOptionConverter::toLevel($l, null);
		}
	}

	/**
	 * @param string $l the level max to match
	 */
	public function setLevelMax($l) {
		if($l instanceof Eloom_Log4php_LoggerLevel) {
			$this->levelMax = $l;
		} else {
			$this->levelMax = Eloom_Log4php_Helpers_LoggerOptionConverter::toLevel($l, null);
		}
	}

	/**
	 * Return the decision of this filter.
	 *
	 * @param Eloom_Log4php_LoggerLoggingEvent $event
	 * @return integer
	 */
	public function decide(Eloom_Log4php_LoggerLoggingEvent $event) {
		$level = $event->getLevel();
		
		if($this->levelMin !== null) {
			if($level->isGreaterOrEqual($this->levelMin) == false) {
				// level of event is less than minimum
				return Eloom_Log4php_LoggerFilter::DENY;
			}
		}

		if($this->levelMax !== null) {
			if($level->toInt() > $this->levelMax->toInt()) {
				// level of event is greater than maximum
				// Alas, there is no Level.isGreater method. and using
				// a combo of isGreaterOrEqual && !Equal seems worse than
				// checking the int values of the level objects..
				return Eloom_Log4php_LoggerFilter::DENY;
			}
		}

		if($this->acceptOnMatch) {
			// this filter set up to bypass later filters and always return
			// accept if level in range
			return Eloom_Log4php_LoggerFilter::ACCEPT;
		} else {
			// event is ok for this filter; allow later filters to have a look..
			return Eloom_Log4php_LoggerFilter::NEUTRAL;
		}
	}
}

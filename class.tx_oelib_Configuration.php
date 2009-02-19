<?php
/***************************************************************
* Copyright notice
*
* (c) 2009 Oliver Klee <typo3-coding@oliverklee.de>
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class 'tx_oelib_Configuration' for the 'oelib' extension.
 *
 * This class represents a set of configuration options within a certain
 * namespace.
 *
 * @package TYPO3
 * @subpackage tx_oelib
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class tx_oelib_Configuration extends tx_oelib_PublicObject {
	/**
	 * @var array the data for this configuration
	 */
	private $data = array();

	/**
	 * The (empty) constructor.
	 *
	 * After instantiation, this configuration's data can be set via via
	 * setData() or set().
	 *
	 * @see setData
	 * @see set
	 */
	public function __construct() {
	}

	/**
	 * Frees as much memory that has been used by this object as possible.
	 */
	public function __destruct() {
		unset($this->data);
	}

	/**
	 * Sets the complete data for this configuration.
	 *
	 * This function can be called multiple times.
	 *
	 * @param array the data for this configuration, may be empty
	 */
	public function setData(array $data) {
		$this->data = $data;
	}

	/**
	 * Sets the value of the data item for the key $key.
	 *
	 * @param string the key of the data item to get, must not be empty
	 * @param mixed the data for the key $key
	 */
	public function set($key, $value) {
		if ($key == '') {
			throw new Exception('$key must not be empty.');
		}

		$this->data[$key] = $value;
	}

	/**
	 * Gets the value of the data item for the key $key.
	 *
	 * @param string the key of the data item to get, must not be empty
	 *
	 * @return mixed the data for the key $key, will be an empty string
	 *               if the key has not been set yet
	 */
	protected function get($key) {
		if (!$this->existsKey($key)) {
			return '';
		}

		return $this->data[$key];
	}

	/**
	 * Checks whether a data item with a certain key exists.
	 *
	 * @param string the key of the data item to check, must not be empty
	 *
	 * @return boolean true if a data item with the key $key exists, false
	 *                 otherwise
	 */
	protected function existsKey($key) {
		return isset($this->data[$key]);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/oelib/class.tx_oelib_Configuration.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/oelib/class.tx_oelib_Configuration.php']);
}
?>
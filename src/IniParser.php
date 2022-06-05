<?php
/*
 * Produced: Sat Dec 11 2021
 * Author: Alec M.
 * GitHub: https://amattu.com/links/github
 * Copyright: (C) 2021 Alec M.
 * License: License GNU Affero General Public License v3.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Class Namespace
namespace IniParser;

/*
 * Configuration/Ini file parser class
 */
class IniParser {
  /**
   * Holds the parsed configuration data
   *
   * @var array
   */
  protected $config;

  /**
   * An array of the sections found in the configuration file
   *
   * @var ?bool
   */
  protected $sections;

  /**
   * Configuration reader constructor
   *
   * @param string $file The path to the configuration file
   * @param ?bool $sections Whether to parse individual sections or not
   * @throws TypeError
   * @author Alec M.
   */
  public function __construct(string $filename, ?bool $sections = false)
  {
    // Variables
    $this->sections = $sections;
    $this->config = $this->read($filename);
  }

  /**
   * Get configuration file property
   *
   * @param string $key The property to get
   * @param string|null $section The section to get the property from
   * @param mixed|null value to return if the property is not found
   * @return mixed|null
   * @throws TypeError
   * @author Alec M.
   */
  public function get(string $key, ?string $section = null, $default = null)
  {
    if ($section && array_key_exists($section, $this->config) && array_key_exists($key, $this->config[$section])) {
      return $this->config[$section][$key];
    }
    if (array_key_exists($key, $this->config)) {
      return $this->config[$key];
    }

    // Return
    return $default;
  }

  /**
   * Read configuration file
   * @param string $file location
   * @return Array Parsed File
   * @throws TypeError
   * @author Alec M.
   */
  protected function read(string $file) : array
  {
    // Checks
    if (!file_exists($file)) {
      return Array();
    }
    if (!function_exists("parse_ini_file")) {
      return Array();
    }

    // Return
    return parse_ini_file($file, $this->sections) ?: Array();
  }
}

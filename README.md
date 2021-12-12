# Introduction
This is a basic configuration/`.ini` file parser built with PHP. It's designed to be error-safe, and provides the opportunity to use a default value if one is not found.

# Usage
## Setup

```PHP
require(__DIR__ . "/Parser.class.php");

$config = new amattu\Parser(__DIR__ . "/conf.ini");
```

## construct
The class constructor accepts the file location (path + name), and an optional boolean argument on parsing the individual sections (usually denoted by `[NAME]`).

### PHPDoc
```PHP
/**
 * Configuration reader constructor
 *
 * @param string $file The path to the configuration file
 * @param ?bool $sections Whether to parse individual sections or not
 * @throws TypeError
 * @author Alec M.
 */
public function __construct(string $filename, ?bool $sections = false)
```

___

## get
The `get` function will attempt to pull the value from the section specified (... if specified), and if not found, will return the default parameter. All of the arguments except `$key` are optional.

### Usage
```PHPDoc
$usernameOrDefault = $config->get("USERNAME", "GMAIL_SECTION", "defaultUserName");
```

### PHPDoc
```PHP
/**
 * Get configuration file property
 *
 * @param string $key The property to get
 * @param string|null $section The section to get the property from
 * @param ?mixed $default value to return if the property is not found
 * @return $config[$key] || $default || null
 * @throws TypeError
 * @author Alec M.
 */
public function get(string $key, ?string $section = null, ?mixed $default = null) : mixed
```

# Requirements & Dependencies
- PHP 7.x +
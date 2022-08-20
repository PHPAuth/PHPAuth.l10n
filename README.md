# PHPAuth :: Custom Dictionaries / Languages

```php

require_once __DIR__ . '/vendor/autoload.php';


// or 

$language_pack = (new \PHPAuth\PHPAuthLocalization('fr_FR'))->use();
// or
$language_pack = (new \PHPAuth\PHPAuthLocalization('fr_FR'))->use($pdo, 'custom_localization_table');

// use
var_dump($l);

// or

$config = new \PHPAuth\Config($pdo, null, \PHPAuth\Config::CONFIG_TYPE_SQL);

$config = $config->setLocalization( (new \PHPAuth\PHPAuthLocalization('ru_RU'))->use() );

$auth = new \PHPAuth\Auth($pdo, $config);

```
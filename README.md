# PHPAuth :: Custom Dictionaries / Languages

```php

require_once __DIR__ . '/vendor/autoload.php';


// or 

$language_pack = (new \PHPAuth\PHPAuthLocalization(('fr_FR'))->use();
// or
$language_pack = (new \PHPAuth\PHPAuthLocalization(('fr_FR'))->useDB($pdo);

// use
var_dump($l);

// or
// in the future
$config = new \PHPAuth\Config($pdo)->loadJSON('config.json')->setLanguage( $language_pack );
$auth = new \PHPAuth\Auth($pdo, $config->use());

// $phpauth_config = new \PHPAuth\Config($pdo, null, Config::CONFIG_TYPE_SQL, $language_pack));
// $phpauth = new \PHPAuth\Auth($pdo, $phpauth_config);

```
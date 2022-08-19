# PHPAuth :: Custom Dictionaries / Languages

```php

require_once __DIR__ . '/vendor/autoload.php';

$l = (new \PHPAuth\PHPAuthDictionary())->use('fr_FR');

var_dump($l);
// or 

$phpauth_config = new \PHPAuth\Config($pdo, null, Config::CONFIG_TYPE_SQL, (new \PHPAuth\PHPAuthDictionary())->use('fr_FR'));
$phpauth = new \PHPAuth\Auth($pdo, $phpauth_config);

```
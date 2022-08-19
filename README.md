# PHPAuth :: Custom Dictionaries / Languages

```php

require_once __DIR__ . '/vendor/autoload.php';

$l = (new \PHPAuth\PHPAuthLocalization())->use('fr_FR');

var_dump($l);
// or 

$language_pack = (new \PHPAuth\PHPAuthLocalization(('fr_FR'))->use();
// or
$language_pack = (new \PHPAuth\PHPAuthLocalization(('fr_FR'))->useDB($pdo);

$phpauth_config = new \PHPAuth\Config($pdo, null, Config::CONFIG_TYPE_SQL, $language_pack));
$phpauth = new \PHPAuth\Auth($pdo, $phpauth_config);

```
# MahanaBitfield
Bit masking to manage settings. Rather than having a few dozen flags on every table, bit masking can be used to reduce them to a single integer value.

## Installation


```
composer require jrmadsen67/mahana-bitmask
```

## Usage

Typically we would use this in conjunction with an MVC model class, so I will use that scenario as an example.

MahanaBitfield is an abstract class, so you will create a simple inherited class for each setting field you wish to have.

This means that if you have a Users table and want to store `settings` in a field, you would make a class like this example:

```
use jrmadsen67\MahanaBitfield\MahanaBitfield;

class UserSettings extends MahanaBitfield
{
    public $flags = [
        'flag1' => 0,
        'flag2' => 1,
        'flag3' => 2,
    ];
}
```

Notice that this DOES NOT work directly with your model; you will have to get/set the `settings` field yourself in a normal manner for your framework or code.

To initialize a class:

`$mbf = new UserSettings;`

To set a particular flag to true/false

`$mbf->flag1 = true;`

To get a particular setting value

`$flag1  = $mbf->flag1;`

To get the bitmask value

`$settings = $mbf->getValue();`

Use setFlags() & getFlags() to work with the whole array at once
```
$userSettings = new UserSettings;

$userSettings->setFlags([
    'flag2' => true,
    'flag3' => true,
]);
```

or
```
$setting_array = $userSettings->getFlags();

/*

var_dump($setting_array);

array(
    'flag2' => true,
    'flag3' => true,
);

*/
```

The tests can provide you with more examples. Questions and PRs welcome!

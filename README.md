Lesti_Smtp
==========

Installation
------------

Add `require` and `repositories` sections to your composer.json as shown in example below and run `composer update`.

*composer.json example*

```
{
    "minimum-stability": "dev",
    "repositories": [
        {"type": "composer", "url": "http://packages.firegento.com"},
        {"type": "git", "url": "https://github.com/GordonLesti/Lesti_Smtp"}
    ],

    "require": {
        "GordonLesti/Lesti_Smtp": "*"
    },
    "extra": {
        "magento-root-dir": "."
    }
}
```

Read more about [Magento Composer](https://github.com/kirchbergerknorr/magento/wiki)

Support
-------

Please [report new bugs](https://github.com/GordonLesti/Lesti_Smtp/issues/new).

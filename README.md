Core Component
==============

What is Core?
-------------

The Base Core provides classes that are strictly non-application-specific and either non-domain-specific or cross multiple domains.

Requirements
------------

Supported on PHP 5.4 and up and HHVM 3.2 and up.

Install in projects
-------------------

    $ composer require base/base-core dev-master

Test classes are autoloaded by default. These can be disabled with the `--no-dev` option


Running tests
-------------

You can run the unit tests with the following command:

    $ composer install
    $ phpunit


Contributing
------------

Follow PSR-1, PSR-2 and PSR-4.

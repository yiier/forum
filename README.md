forum
=====

forum based on yii2,this is an experimental product, not use for production, unless you know what you are doing


## forum feature.

community, wiki, edit Used markdown, unlimited categories, rbac, third-party login (weibo, qq)


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via github

~~~
clone https://github.com/yiier/forum.git
~~~

Then download [Composer](https://getcomposer.org/composer.phar)
take the composer.phar in the web root directory,using the following command:

~~~
php composer.phar update --prefer-dist
~~~

You can then access the application through the following URL:

~~~
http://localhost/forum/web/
~~~

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev yiier/forum forum
~~~

Now you should be able to access the application through the following URL, assuming `forum` is the directory
directly under the Web root.

~~~
http://localhost/forum/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host=127.0.0.1;dbname=forum', // Don't use localhost, Because IPv4/IPv6 recognition very slow to connect to mysql
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
];
```

**NOTE:** `forum.sql` in the config folder, import it into the database, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.

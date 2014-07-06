论坛
=====

基于Yii2的论坛。
注意：这是个体验项目，不要用于生产环境，除非你能自己搞定技术细节。


## 功能特性

社区、Wiki、markdown 编辑、标签分类、RBAC、第三方登录接入（weibo, qq）、信息发布


目录结构
-------------------

      assets/             包含图片CSS等资源
      commands/           包含控制台命令（控制器）
      config/             包含应用配置
      controllers/        包含控制器的类文件
      mail/               包含给emails使用的视图文件
      models/             包含模型类
      runtime/            包含运行环境生成的文件
      tests/              包含基础应用模版所需的测试文件
      vendor/             包含第三方依赖库
      views/              包含视图文件
      web/                包含Web资源的入口脚本



需求
------------

支持PHP 5.4.0以上的Web服务器.
内存限制不能小于 6 MB，建议使用默认数值 128 MB。 你可以在浏览器内打开根目录下的 `requirements.php` 文件来了解更多需求详情。


安装
------------

### 通过GitHub安装

~~~
clone https://github.com/yiier/forum.git
~~~

接着下载 [Composer](https://getcomposer.org/composer.phar)
把composer.phar放进web根目录，然后运行下面的命令：

~~~
php composer.phar update --prefer-dist
~~~

然后你可以通过以下URL访问论坛。

~~~
http://localhost/forum/web/
~~~

### 通过Composer安装

若你没有安装 [Composer](http://getcomposer.org/)，你可以参照下面的文档来安装下先 [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix)。

然后运行如下命令来安装：

~~~
php composer.phar create-project --prefer-dist --stability=dev yiier/forum forum
~~~

假定 `forum`在你的Web root根目录下，则现在可以通过如下URL访问该论坛了：

~~~
http://localhost/forum/web/
~~~


配置
-------------

### 数据库

用你当前的本地数据库链接信息，创建 `config/db-local.php` 文件，如：

```php
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host=127.0.0.1;dbname=forum', // 这里别放localhost，连接到Mysql时对IPv4/IPv6的检测非常慢
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
];
```

**NOTE:** 从前有个 `forum.sql` 静静地躺在根目录里，你必须在访问数据库之前，先手动导入这个文件（赋予论坛以灵魂）。

同样，你顺便也检查并修改下 `config/` 的其他文件，或其他段落，来自定义你自己的应用。

欢迎各位高手参与项目开发^-^

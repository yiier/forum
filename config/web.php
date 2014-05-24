<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
	'id' => 'Yiier',
	'basePath' => dirname(__DIR__),
	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
	'language' => 'zh-CN',
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mail' => [
			'class' => 'yii\swiftmailer\Mailer',
			'useFileTransport' => true,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

		'db' => $db,
	],
	'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'markdown' => [
	        // the module class
	        'class' => 'kartik\markdown\Module',

	        // the controller action route used for markdown editor preview
	        'previewAction' => '/markdown/parse/preview',

	        // the list of custom conversion patterns for post processing
	        'customConversion' => [
	            '<table>' => '<table class="table table-bordered table-striped">'
	        ],

	        // whether to use PHP SmartyPantsTypographer to process Markdown output
	        'smartyPants' => true
	    ],
    ],
	'params' => $params,
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;

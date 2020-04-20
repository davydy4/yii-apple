<?php
return [
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'formatter' => [
//            'class' => 'yii\i18n\Formatter',
//            'timeZone' => 'Europe/Moscow',
//            'dateFormat' => 'php:d F Y',
//            'timeFormat' => 'php:H:i',
//            'decimalSeparator' => ',',
//            'thousandSeparator' => ' ',
//            'currencyCode' => 'RUR',
//            'locale' => 'ru-RU'
//        ],
    ],

];

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class NoneAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/none.css',
    ];
    public $js = [
        'js/index.js',
    ];
    public $depends = [
    ];
}

<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace fiamma06\countdown;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CountDownAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/kbwood_countdown';

    /**
     * @var array
     */
    public $js = [
        'jquery.plugin.js',
        'jquery.countdown.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

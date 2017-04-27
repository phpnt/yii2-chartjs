<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 27.04.2017
 * Time: 7:59
 */

namespace phpnt\chartJS;

use yii\web\AssetBundle;

class ChartJSAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/chart.js';

    /**
     * @inherit
     */
    public $css = [

    ];

    /**
     * @inherit
     */
    public $js = [
        'dist/Chart.js'
    ];

    public function init()
    {
        parent::init();
    }
}
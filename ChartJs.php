<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 27.04.2017
 * Time: 9:26
 */

namespace phpnt\chartJS;

use yii\bootstrap\Widget;
use yii\helpers\Json;

class ChartJs extends Widget
{
    const TYPE_LINE             = 'line';
    const TYPE_BAR              = 'bar';
    const TYPE_RADAR            = 'radar';
    const TYPE_POLAR_AREA       = 'polarArea';
    const TYPE_PIE              = 'pie';
    const TYPE_DOUGHNUT         = 'doughnut';
    const TYPE_BUBBLE           = 'bubble';

    public $type;
    public $data                = [];
    public $options             = [];

    public function init()
    {
        parent::init();
        $this->type = $this->type ? $this->type : 'line';
        $this->data = Json::encode($this->data);
        $this->options = Json::encode($this->options);
    }

    public function run()
    {
        $this->registerScript();
        echo '<canvas id="'.$this->id.'"></canvas>';
    }

    public function registerScript()
    {
        $view = $this->getView();
        ChartJSAsset::register($view);

        $js = <<< JS
            var ctx = $("#$this->id");
            var myChart = new Chart(ctx, {
                type: '$this->type',
                data: $this->data,
                options: $this->options
            });
JS;
        $view->registerJs($js);
    }
}

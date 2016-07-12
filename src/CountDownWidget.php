<?php

namespace fiamma06\countdown;

use fiamma06\countdown\CountDownAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;
use yii\helpers\Json;

/**
 * Class CountDownWidget
 * @package fiamma06\countdown
 */
class CountDownWidget extends Widget
{
    /**
     * @var
     */
    public $until;

    /**
     * @var string
     */
    public $tag = 'span';

    /**
     * @var array
     */
    public $pluginOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        CountDownAsset::register($view);

        echo Html::tag($this->tag, '', $this->options);

        $options = ['until' => $this->until];

        if(!empty($this->pluginOptions)) {
            $options = array_merge($options, $this->pluginOptions);
        }

        $options = Json::encode($options);
        $view->registerJs(" $('#{$this->getId()}').countdown({$options}); ");
//        $view->registerJs("$.countdown.resync();");
    }

}
<?php

namespace fiamma06\countdown;

use frontend\assets\CountDownAsset;
use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class CountDownWidget
 * @package fiamma06\countdown
 */
class CountDownWidget extends Widget {

    /**
     * @var
     */
    public $until;

    /**
     * @var string
     */
    public $format = 'HMS';

    /**
     * @var string
     */
    public $layout = '{hnn}{sep}{mnn}{sep}{snn}';

    /**
     * @var string
     */
    public $onExpire = 'function() {}';

    /**
     * @var array
     */
    public $otherOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        CountDownAsset::register($view);

        $options = [
            'until' => $this->until,
            'format' => $this->format,
            'layout' => $this->layout,
            'onExpire' => $this->onExpire
        ];

        if(!empty($this->otherOptions)) {
            $options = array_merge($options, $this->otherOptions);
        }

        $options = Json::encode($options);
        $view->registerJs("$('#{$this->getId()}').countdown({$options});");
    }

}
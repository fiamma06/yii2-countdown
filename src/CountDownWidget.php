<?php

namespace fiamma06\countdown;

use frontend\assets\CountDownAsset;
use yii\base\Widget;

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
     * @var string
     */
    public $lang = 'en';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        CountDownAsset::register($view);

        $view->registerJs("
            $('#{$this->getId()}').countdown({
                until: {$this->until},
                format: '{$this->format}',
                layout: '{$this->layout}',
                onExpire: {$this->onExpire}
            });
        ");
    }

}
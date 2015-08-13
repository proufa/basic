<?php
namespace app\components;

use app\controllers\ArticleController;
use yii\base\Widget;
use yii\helpers\Html;
use app\controllers\Article;

class HelloWidget extends Widget
{
    public $message;


    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';

        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
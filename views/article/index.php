<?php

/**
 * @var $articles array
 * @var $pagination array
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1>Статьи</h1>
<ul>
    <? foreach ($articles as $Article): ?>

        <li>
            <?= Html::a(
                    "[{$Article->id}] {$Article->title}: {$Article->publish_date}",     // имя ссылки
                    ['/article/'.$Article->id]                                          // адрес ссылки
            ) ?>
        </li>

    <? endforeach ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
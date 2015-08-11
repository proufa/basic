<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$url=Url::base();
?>
<h1>статьи</h1>
<ul>
<?php foreach ($articles as $Article): 
$article_url="$url?r=article/view&post=$Article->id";
$article_url="$url/shows/$Article->id-$Article->publish_status";
//<a href="<?= print" $url?r=article/view&post=as"; Html::encode("{$Article->id}") 
?>
    <li>
<a href="<?print $article_url;?>">
        <?= Html::encode("[{$Article->id}] {$Article->title}") ?>:<?=  $Article->publish_date ?>
</a>
    </li>
<?php endforeach; ?>

</ul>


<?= LinkPager::widget(['pagination' => $pagination]) ?>
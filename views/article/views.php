<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<br> <br>id: <b> <?= $model['id']  ?></b>
<br> Категория ID:<b><?= $model['category_id'] ?></b>
<br> Категория :<b><?=  $modelcat
?></b>
<br> Категория2:<b>[<?= $model->LoadCat ?>]</b>
<br> Тема:<b><?= $model['title'] ?></b>

<br> Текст:<ul><b><?= $model['content'] ?></ul></b>

<br><br><br>


---------







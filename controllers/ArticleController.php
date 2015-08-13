<?php

namespace app\controllers;

use  yii\db\Command;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Article;
use app\models\Category;
use yii\helpers\Html;
use app\assets\AppAsset;

//------ Вывод списка статей с сортировкой по количеству

class ArticleController extends Controller
{


    public function actionPokaz()
    {
        return  'asdasd';
    }

    public function actionIndex()
    {
        $query = Article::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $articles= $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }







    public function actionView2($post)
    {
        $model = new Article();
        $ress = $model->findOne(['id' => $post])->toArray();    // получаем статью детально ввиде массива

//$CatRess = $model2->findOne(['id' => $ress['category_id']]); // Это я так баловался:)

        $CatRess = $model->LoadCat($ress['category_id']); //Загружаем из модели категорию с полученым ID, вытащить напрямую без указания не получилось


        return $this->render('views', [
                            'modelcat' => $CatRess,
                            'model' => $ress
        ]);
    }

    public function actionShowwidget($post)
    {
        $model = new Article();
        $ress = $model->findOne(['id' => $post])->toArray();    // получаем статью детально ввиде массива

//$CatRess = $model2->findOne(['id' => $ress['category_id']]); // Это я так баловался:)

        $CatRess = $model->LoadCat($ress['category_id']); //Загружаем из модели категорию с полученым ID, вытащить напрямую без указания не получилось


        return $this->render('views', [
            'modelcat' => $CatRess,
            'model' => $ress
        ]);
    }

//---------------------------- Тестовая функция, как не правильно: просто для сохранения
    public function actionView($post = '1')
    {
        $post=Html::encode($post);
        if (preg_match('/^\+?\d+$/', $post)) {}else{$post=1;}// защита от ошибки

        $model=new Article;

        $d=0;
        $db=\Yii::$app->db;
        $command=$db->createCommand("SELECT * FROM tbl_post WHERE id=".$post);

        $model = $command->queryOne();

        $command=$db->createCommand("SELECT * FROM tbl_category WHERE id=".$model['id']);// для вывода категории
        $categ = $command->queryOne();

        $model['content']=Article::close_tags($model['content']);

        $this->view->registerJsFile('path/to/file');// тест явы для картинок
        $this->view->registerCssFile('path/to/file');// тест явы для картинок

        return $this->render('views',
            ['modelcat'=>$categ,
                'model'=>$model,
            ]);
    }


}
<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;
use app\models\Category;

class Article extends ActiveRecord 
{



 public static function tableName()
    {
        return 'tbl_post';
    }

public function getId()
    {
        return $this->id;// тут нефига не выводит
    }

//-----------------------------связь с категориями-------------------------------------------------
 public function LoadCat($num)// работает только если принудительно принимать значение
    {
//$result= Category::findOne(['id'=>$num]);
$result = Category::find()->where(['id' => $num])->one();

return $result->title;
    }
//------------------------------------------------------------------------------

// Так для сейва.  убивашка тегов:)
 public static function close_tags($content)
    {
        $position = 0;
        $open_tags = array();
        //теги для игнорирования
        $ignored_tags = array('br', 'hr', 'img');
 
        while (($position = strpos($content, '<', $position)) !== FALSE)
        {
            //забираем все теги из контента
            if (preg_match("|^<(/?)([a-z\d]+)\b[^>]*>|i", substr($content, $position), $match))
            {
                $tag = strtolower($match[2]);
                //игнорируем все одиночные теги
                if (in_array($tag, $ignored_tags) == FALSE)
                {
                    //тег открыт
                    if (isset($match[1]) AND $match[1] == '')
                    {
                        if (isset($open_tags[$tag]))
                            $open_tags[$tag]++;
                        else
                            $open_tags[$tag] = 1;
                    }
                    //тег закрыт
                    if (isset($match[1]) AND $match[1] == '/')
                    {
                        if (isset($open_tags[$tag]))
                            $open_tags[$tag]--;
                    }
                }
                $position += strlen($match[0]);
            }
            else
                $position++;
        }
        //закрываем все теги
        foreach ($open_tags as $tag => $count_not_closed)
        {
            $content .= str_repeat("</{$tag}>", $count_not_closed);
        }
 
        return $content;
    }
}
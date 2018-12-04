<?php
namespace app\module\comment\widgets;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
//use app\module\comment\models\Comments;


class Cmtwidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message===null) {
            $this->message= 'Welcome User';
        } else {
            $this->message= 'Welcome '.$this->message;
        }
    }

    public function run()
    {
        //$model = \app\module\comment\models\Comments()::;
        //$data = Comments::find()->all();
        //print_r($data);
        //echo 'test';
        return $this->render('@app/module/comment/views/comments/comment'
       /* [
        'tree' => Comments::getTree(),
        ]*/
        );
        //return Html::encode($this->message);
    }
}

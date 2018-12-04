<?php

namespace app\module\comment\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $user_name
 * @property string $content
 * @property string $created_at
 */
class Comments extends \yii\db\ActiveRecord
{
    public $childs;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_name', 'created_at', 'content'], 'required'],
            [['parent_id'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'user_name' => 'User name',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    protected static function buildTree(&$data, $rootID = 0) {
        $tree = array();
        foreach ($data as $id => $node) {
            if ($node->parent_id == $rootID) {
                unset($data[$id]);
                $node->childs = self::buildTree($data, $node->id);
                $tree[] = $node;
            }
        }
        return $tree;
    }

    public function getTree()
    {
        $data = self::find()->all();
        return self::buildTree($data);
    }
}

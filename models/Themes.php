<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "themes".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int $user_id
 * @property int|null $viewed
 *
 * @property User $user
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'required'],
            [['user_id', 'viewed'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'date' => Yii::t('app', 'Date'),
            'image' => Yii::t('app', 'Image'),
            'user_id' => Yii::t('app', 'User ID'),
            'viewed' => Yii::t('app', 'Viewed'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

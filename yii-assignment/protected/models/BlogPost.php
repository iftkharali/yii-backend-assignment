<?php 

class BlogPost extends CActiveRecord
{
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    
    public function tableName()
    {
        return 'blog_posts';
    }


    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('title',$this->title,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('updated_at',$this->updated_at,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function rules()
    {
        return array(
            array('title, content, user_id', 'required'),
            array('is_public', 'boolean'),
            array('title', 'length', 'max'=>255),
            array('created_at, updated_at', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
            'is_public' => 'Public',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        );
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'likes' => array(self::HAS_MANY, 'Like', 'blog_post_id'),

        );
    }
}

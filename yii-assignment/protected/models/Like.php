<?php

class Like extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'likes';
    }

    public function rules()
    {
        return array(
            array('user_id, blog_post_id', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User ID',
            'blog_post_id' => 'Blog Post ID',
        );
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'blogPost' => array(self::BELONGS_TO, 'BlogPost', 'blog_post_id'),
        );
    }
}
/*

class Like extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'likes';
    }

    public function rules()
    {
        return array(
            array('user_id, blog_post_id', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User ID',
            'blog_post_id' => 'Blog Post ID',
        );
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'blogPost' => array(self::BELONGS_TO, 'BlogPost', 'blog_post_id'),
        );
    }
}
*/
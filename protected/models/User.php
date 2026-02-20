<?php
class User extends CActiveRecord{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName(){
        return 'user';
    }
    public function relations()
    {
        return array(
            'posts' => array(self::HAS_MANY, 'Post', 'user_id'),
        );
    }
}
<?php

class Post extends CActiveRecord
{
    // Required static method
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    // Map to table 'post'
    public function tableName()
    {
        return 'post';
    }

    // Optional: validation rules
    public function rules()
    {
        return array(
            array('title, content', 'required'),
            array('title', 'length', 'max'=>255),
        );
    }
    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('created_at',$this->created_at,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

}

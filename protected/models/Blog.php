<?php
class Blog extends CActiveRecord
{
    public $author_search;   // virtual attribute for author
    public $category_search; // virtual attribute for category filter
    public $uploadedFile;
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'blog';
    }

    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    public function rules() {
        return array(
            array('title, content, category', 'required'),
            array('author_search, category_search', 'safe', 'on'=>'search'),
            array('uploadedFile', 'file',
                'types'=>'jpg, png, gif, jpeg', // allowed types
                'maxSize'=>1024*1024*2,        // 2 MB
                'allowEmpty'=>true,
                'tooLarge'=>'File size must be less than 2 MB.'
            ),
            array('category', 'in', 'range'=>array('tech','life','news')),
        );
    }

    /**
     * Search function for CGridView
     */
    public function search() {
        $criteria = new CDbCriteria;

        if(!empty($this->title))
            $criteria->compare('title', $this->title, true);

        if(!empty($this->category_search))
            $criteria->compare('category', $this->category_search, true);

        if(!empty($this->content))
            $criteria->compare('content', $this->content, true);

        $criteria->with = array('user');
        if(!empty($this->author_search))
            $criteria->compare('user.username', $this->author_search, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>10),
            'sort'=>array('defaultOrder'=>'created_at DESC'),
        ));
    }

}

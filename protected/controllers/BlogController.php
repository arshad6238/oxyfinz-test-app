<?php
class BlogController extends Controller
{
    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('allow', // anyone can view blogs
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // logged-in users can create blogs
                'actions'=>array('create'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'expression' => 'Yii::app()->user->name === "admin"',
            ),
            array('deny',  // deny all others
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new Blog('search');
        $model->unsetAttributes();

        if(isset($_GET['Blog'])) {
            $model->attributes = $_GET['Blog'];
        }
        $blogs = Blog::model()->with('user')->findAll();
        $this->render('index', array('blogs'=>$blogs,'model'=>$model));
    }



    public function actionView($id) {
        $blog = Blog::model()->findByPk($id);
        $this->render('view', array('blog'=>$blog));
    }

    public function actionCreate() {
        $model = new Blog;
        if(isset($_POST['Blog'])) {
            $model->attributes=$_POST['Blog'];
            $model->user_id = 2;
//            $model->category =category $_POST['category'];
            // handle file upload
            $model->uploadedFile=CUploadedFile::getInstance($model,'uploadedFile');

            if($model->uploadedFile) {
                $filename = uniqid().'_'.$model->uploadedFile->name;
                $uploadPath = Yii::getPathOfAlias('webroot').'/uploads/'.$filename;

// Save file
                $model->uploadedFile->saveAs($uploadPath);
                $model->file = $filename; // store in DB

            }

            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
        $this->render('create', array('model'=>$model));


    }

    public function actionDelete($id) {
        Blog::model()->findByPk($id)->delete();
        $this->redirect(array('index'));
    }



}

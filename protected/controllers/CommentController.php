<?php

class CommentController extends Controller
{
    /* MAIN PAGE */
    public function actionView()
    {
        $model = new Comment();
        $comments = Comment::model()->findAll(array(
            'order' => 'created_at DESC'
        ));

        $this->render('view', array(
            'model' => $model,
            'comments' => $comments
        ));
    }

    /* AJAX SUBMIT */
    public function actionCreate()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(400);
        }

        $model = new Comment();
        $model->attributes = $_POST['Comment'];
        $model->created_at = date('Y-m-d H:i:s');

        if ($model->validate() && $model->save()) {
            //success
            echo CJSON::encode(array(
                'status' => 'success',
                'html' => $this->renderPartial('_single', array(
                    'comment' => $model
                ), true)
            ));

        } else {

            // validation failed → return errors
            echo CJSON::encode(array(
                'status' => 'error',
                'errors' => $model->getErrors()
            ));
        }

        Yii::app()->end();
    }
    /* AUTOCOMPLETE SEARCH */
    public function actionAutocomplete()
    {
        if (isset($_GET['term'])) {

            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('name', $_GET['term'], true, 'OR');
            $criteria->addSearchCondition('email', $_GET['term'], true, 'OR');
            $criteria->addSearchCondition('message', $_GET['term'], true, 'OR');
            $criteria->limit = 10;

            $comments = Comment::model()->findAll($criteria);

            $result = array();
            foreach ($comments as $c) {
                $result[] = array(
                    'label' => $c->name . ' (' . $c->email . ')',
                    'value' => $c->name,
                );
            }

            echo CJSON::encode($result);
            Yii::app()->end();
        }
    }
}
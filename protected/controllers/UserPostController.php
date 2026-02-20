<?php
class UserPostController extends Controller
{
    public function actionIndex()
    {
        $users = User::model()->with('posts')->findAll();

        // Render to a view
        $this->render('index', array(
            'users' => $users,
        ));
    }

    public function actionCreate()
    {

    }
}
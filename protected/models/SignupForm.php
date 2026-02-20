<?php

class SignupForm extends CFormModel
{
    public $username;
    public $email;
    public $password;

    // Validation rules
    public function rules()
    {
        return array(
            array('username, email, password', 'required'),
            array('username', 'match', 'pattern'=>'/^[a-zA-Z0-9_]+$/' ),
            array('email', 'email'),
            array('username, email', 'unique', 'className'=>'User'),
            array('password', 'length', 'min'=>8),
        );
    }


    public function attributeLabels()
    {
        return array(
            'username' => Yii::t('app','Username'),
            'email' => Yii::t('app','Email'),
            'password' => Yii::t('app','Password'),
        );
    }
}

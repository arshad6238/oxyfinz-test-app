<?php

require_once(Yii::getPathOfAlias('application.extensions.PHPMailer.PHPMailerAutoload') . '.php');


class SignupController extends Controller {
    public function actionSignup() {
        $model = new SignupForm();
        if (isset($_POST['SignupForm'])) {
            $model->attributes = $_POST['SignupForm'];
            if ($model->validate()) {
                $user = new User();
                $user->username = $model->username;
                $user->email = $model->email;
                $user->password = password_hash($model->password, PASSWORD_BCRYPT);
//                password_verify($inputPassword, $user->password);    when logging in use this
//                $user->save();
                if ($user->save()) {
                    $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username = Yii::app()->params['smtpUser'];
                        $mail->Password = Yii::app()->params['smtpPass'];
                        $mail->SMTPSecure = 'tls';
                        $mail->Port       = 587;

                        $mail->setFrom('arshadalikalathingal@gmail.com', 'Blog App');
                        $mail->addAddress($user->email, $user->username);

                        $mail->isHTML(true);
                        $mail->Subject = 'Welcome to Blog App ';
                        $mail->Body = '
                        <h2>Welcome, ' . CHtml::encode($user->username) . '</h2>
                        <p>Thanks for signing up!</p>
                    ';

                        $mail->send();
                    } catch (Exception $e) {
                        Yii::log('Mail error: ' . $mail->ErrorInfo, CLogger::LEVEL_ERROR);
                    }
                }
                echo "Signup Successful!"."<br>";
                echo "username : ".CHtml::encode($model->username)."<br>";
                echo "email : ".CHtml::encode($model->email)."<br>";
                Yii::app()->end();
            }
        }
        $this->render('signup', array('model' => $model));
    }
    public function actionMailTest()
    {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username = Yii::app()->params['smtpUser'];
            $mail->Password = Yii::app()->params['smtpPass'];
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // ✅ THIS is the part you asked about
            $mail->setFrom('arshadalikalathingal@gmail.com', 'Blog App');
            $mail->addAddress('arshadali12tnl@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'SMTP Test';
            $mail->Body    = '<p>SMTP setup successful 🎉</p>';

            $mail->send();
            echo 'Mail sent successfully';
        } catch (Exception $e) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
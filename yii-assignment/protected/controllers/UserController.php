<?php 
class UserController extends Controller
{
    public function actionSignup()
    {
        $model = new User;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->verify_token = md5(uniqid());
            if ($model->save()) {
                // Simulate sending verification email
                Yii::app()->user->setFlash('success', 'Account created! Use this token to verify your account: ' . $model->verify_token);
                $this->redirect(array('signin'));
            }
        }

        $this->render('signup', array('model' => $model));
    }

    public function actionSignin()
    {
        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('signin', array('model' => $model));
    }

    public function actionVerify($token)
    {
        $user = User::model()->findByAttributes(array('verify_token' => $token));

        if ($user !== null) {
            $user->verified = 1;
            $user->verify_token = null;
            if ($user->save(false)) {
                Yii::app()->user->setFlash('success', 'Account verified! You can now sign in.');
                $this->redirect(array('signin'));
            }
        } else {
            Yii::app()->user->setFlash('error', 'Invalid verification token.');
            $this->redirect(array('signup'));
        }
    }

    public function actionCheckEmail()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $exists = User::model()->exists('email=:email', array(':email' => $email));
            echo $exists ? 'false' : 'true';
        }
    }

}

<?php
class WebUser extends CWebUser
{
    public function isVerified()
    {
        $user = $this->loadUser(Yii::app()->user->id); // Adjust to load your user however you have implemented it
        return $user !== null && $user->verified == 1;
    }

    protected function loadUser($id = null)
    {
        if ($id === null) {
            return null;
        }
        return User::model()->findByPk($id); // Adjust based on your User model implementation
    }
}

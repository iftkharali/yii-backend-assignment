<?php


class User extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('username, email, password', 'required'),
            array('username, email', 'unique'),
            array('email', 'email'),
            array('username, email, password, verify_token', 'length', 'max'=>255),
            array('verified', 'boolean'),
            array('verify_token', 'safe'),
            array('email', 'checkEmailExists'), // Add this line for custom email validation
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'verified' => 'Verified',
            'verify_token' => 'Verify Token',
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->password = CPasswordHelper::hashPassword($this->password);
        }
        return parent::beforeSave();
    }

    // Custom validation method to check if email exists
    public function checkEmailExists($attribute, $params)
    {
        if ($this->isNewRecord && User::model()->exists('email=:email', array(':email' => $this->email))) {
            $this->addError($attribute, 'This email address is already registered.');
        }
    }

    public function isVerified()
    {
        return $this->verified == 1;
    }
}





// class User extends CActiveRecord
// {
//     public static function model($className=__CLASS__)
//     {
//         return parent::model($className);
//     }

//     public function tableName()
//     {
//         return 'users';
//     }

//     public function rules()
//     {
//         return array(
//             array('username, email, password', 'required'),
//             array('username, email', 'unique'),
//             array('email', 'email'),
//             array('username, email, password, verify_token', 'length', 'max'=>255),
//             array('verified', 'boolean'),
//             array('verify_token', 'safe'),
//         );
//     }

//     public function attributeLabels()
//     {
//         return array(
//             'id' => 'ID',
//             'username' => 'Username',
//             'email' => 'Email',
//             'password' => 'Password',
//             'verified' => 'Verified',
//             'verify_token' => 'Verify Token',
//         );
//     }

//     public function beforeSave()
//     {
//         if ($this->isNewRecord) {
//             $this->password = CPasswordHelper::hashPassword($this->password);
//         }
//         return parent::beforeSave();
//     }
// }


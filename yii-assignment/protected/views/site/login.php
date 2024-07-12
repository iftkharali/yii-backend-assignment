<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Login</h1>

            <p>Please fill out the following form with your login credentials:</p>

            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php if ($model->hasErrors()): ?>
                <div class="alert alert-danger">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'username'); ?>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group form-check">
                <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'form-check-input')); ?>
                <?php echo $form->label($model, 'rememberMe', array('class' => 'form-check-label')); ?>
                <?php echo $form->error($model, 'rememberMe', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

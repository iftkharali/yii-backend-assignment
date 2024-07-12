<?php

$this->pageTitle = Yii::app()->name . ' - Signin';
$this->breadcrumbs = array('Signin');

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Signin</h1>

            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array('class' => 'signin-form')
                )); ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php echo $form->errorSummary(array($model), null, null, array('class' => 'alert alert-danger')); ?>

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

                <div class="form-group">
                    <div class="form-check">
                        <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'form-check-input')); ?>
                        <?php echo $form->label($model, 'rememberMe', array('class' => 'form-check-label')); ?>
                    </div>
                    <?php echo $form->error($model, 'rememberMe', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Signin', array('class' => 'btn btn-primary')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>

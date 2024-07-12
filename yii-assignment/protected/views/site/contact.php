<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Contact Us</h1>

            <?php if(Yii::app()->user->hasFlash('contact')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('contact'); ?>
                </div>
            <?php else: ?>
                <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>

                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'contact-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions' => array('class' => 'contact-form')
                    )); ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php if($form->errorSummary($model)): ?>
                        <div class="alert alert-danger">
                            <?php echo $form->errorSummary($model); ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'name', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'email'); ?>
                        <?php echo $form->textField($model,'email', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'email', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'subject'); ?>
                        <?php echo $form->textField($model,'subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?>
                        <?php echo $form->error($model,'subject', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'body'); ?>
                        <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model,'body', array('class' => 'text-danger')); ?>
                    </div>

                    <?php if(CCaptcha::checkRequirements()): ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'verifyCode'); ?>
                            <div>
                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model,'verifyCode', array('class' => 'form-control')); ?>
                            </div>
                            <div class="hint">Please enter the letters as they are shown in the image above. Letters are not case-sensitive.</div>
                            <?php echo $form->error($model,'verifyCode', array('class' => 'text-danger')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div><!-- form -->
            <?php endif; ?>
        </div>
    </div>
</div>

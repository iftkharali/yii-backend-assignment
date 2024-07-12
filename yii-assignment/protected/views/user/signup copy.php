<?php
$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array('Signup',);
?>

<h1>Signup</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-signup-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Signup'); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'blog-post-form',
    'enableAjaxValidation' => false,
));
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <hr>

            <?php if ($model->hasErrors()): ?>
                <div class="alert alert-danger">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'content'); ?>
                <?php echo $form->textArea($model, 'content', array('class' => 'form-control', 'rows' => 6)); ?>
                <?php echo $form->error($model, 'content', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group form-check">
                <?php echo $form->labelEx($model, 'is_public', array('class' => 'form-check-label')); ?> &nbsp; &nbsp; &nbsp; &nbsp;
                <?php echo $form->checkBox($model, 'is_public', array('class' => 'form-check-input')); ?>
                <?php echo $form->error($model, 'is_public', array('class' => 'text-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                <?php echo CHtml::link('Back to List', array('index'), array('class' => 'btn btn-secondary')); ?>

            </div>

        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

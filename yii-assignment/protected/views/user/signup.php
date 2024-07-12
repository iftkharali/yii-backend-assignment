<?php
$this->pageTitle = Yii::app()->name . ' - Signup';
$this->breadcrumbs = array('Signup');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Signup</h1>

            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-signup-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array('class' => 'signup-form')
                )); ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php echo $form->errorSummary(array($model), null, null, array('class' => 'alert alert-danger')); ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Signup', array('class' => 'btn btn-primary')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div><!-- form -->

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#User_email').blur(function() {
                        var email = $(this).val();
                        $.ajax({
                            url: '<?php echo Yii::app()->createUrl("user/checkEmail"); ?>',
                            type: 'POST',
                            data: { email: email },
                            success: function(response) {
                                if (response === 'false') {
                                    $('#User_email_em_').text('This email address is already registered.').show();
                                } else {
                                    $('#User_email_em_').hide();
                                }
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>

<?php

// Check if the user is not verified and redirect them
if (!Yii::app()->user->isVerified()) {
    Yii::app()->user->setFlash('error', 'You must be a verified user to access this content.');
    $this->redirect(Yii::app()->homeUrl); // Redirect to home page or custom error page
}

$this->breadcrumbs = array(
    'Blog Posts',
);

$this->menu = array(
    array(
        'label' => 'Create BlogPost',
        'url' => array('create'),
        'visible' => Yii::app()->user->isVerified(),
        'linkOptions' => array('class' => 'btn btn-primary float-right')
    ),
);

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog Posts</h1>
            <hr>

            <!-- Create BlogPost Button -->
            <?php if (Yii::app()->user->isVerified()): ?>
                <div class="mb-4">
                    <?php echo CHtml::link('Create BlogPost', array('create'), array('class' => 'btn btn-primary')); ?>
                </div>
            <?php endif; ?>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'action' => Yii::app()->createUrl($this->route),
                'method' => 'get',
            )); ?>
            
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <?php echo $form->label($model, 'title'); ?>
                    <?php echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
                </div>

                <div class="form-group col-md-6">
                    <?php echo $form->label($model, 'content'); ?>
                    <?php echo $form->textField($model, 'content', array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary')); ?>
            </div>

            <?php $this->endWidget(); ?>

            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'blog-post-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'itemsCssClass' => 'table table-striped table-bordered',
                'columns' => array(
                    'id',
                    'title',
                    'content',
                    'is_public:boolean',
                    'created_at',
                    'updated_at',
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => array(
                            'view' => array(
                                'label' => 'View',
                                'options' => array('class' => 'btn btn-success btn-sm'),
                                'imageUrl' => false, // disable the default image
                            ),
                            'update' => array(
                                'label' => 'Edit',
                                'options' => array('class' => 'btn btn-warning btn-sm'),
                                'imageUrl' => false, // disable the default image
                                'visible' => 'Yii::app()->user->isVerified() && $data->user_id == Yii::app()->user->id',
                            ),
                            'delete' => array(
                                'label' => 'Delete',
                                'options' => array('class' => 'btn btn-danger btn-sm'),
                                'imageUrl' => false, // disable the default image
                                'visible' => 'Yii::app()->user->isVerified() && $data->user_id == Yii::app()->user->id',
                            ),
                        ),
                        'htmlOptions' => array('style' => 'width: 150px; text-align: center;'),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>

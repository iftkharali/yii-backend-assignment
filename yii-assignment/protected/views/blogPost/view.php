<?php
$this->breadcrumbs = array(
    'Blog Posts' => array('index'),
    CHtml::encode($model->title),
);

$this->menu = array(
    array('label' => 'List BlogPost', 'url' => array('index')),
    array('label' => 'Create BlogPost', 'url' => array('create'), 'visible' => Yii::app()->user->isVerified()),
    array('label' => 'Update BlogPost', 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->isVerified()),
    array('label' => 'Delete BlogPost', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isVerified()),
);

// AJAX URL for like action
$likeUrl = $this->createUrl('like', array('id' => $model->id));

// Register JS script for AJAX handling
Yii::app()->clientScript->registerScript('likePost', "
    $('#likeButton').click(function() {
        var button = $(this);

        $.ajax({
            type: 'POST',
            url: '{$likeUrl}',
            dataType: 'json',
            success: function(response) {
                if (response.action == 'liked') {
                    button.text('Unlike');
                    $('#likeCount').text(response.likeCount);
                } else if (response.action == 'unliked') {
                    button.text('Like');
                    $('#likeCount').text(response.likeCount);
                } else {
                    alert('Error occurred while processing your request.');
                }
            },
            error: function() {
                alert('Error occurred while processing your request.');
            }
        });
    });
");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1><?php echo CHtml::encode($model->title); ?></h1>
                </div>
                <div class="card-body">
                    <div class="post-content">
                        <?php echo nl2br(CHtml::encode($model->content)); ?>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span>Likes: <span id="likeCount"><?php echo count($model->likes); ?></span></span>
                        </div>
                        <div>
                            <?php
                            if (!Yii::app()->user->isGuest) {
                                $likeText = (Like::model()->exists('user_id=:userId AND blog_post_id=:postId', array(':userId' => Yii::app()->user->id, ':postId' => $model->id))) ? 'Unlike' : 'Like';
                                echo CHtml::link($likeText, 'javascript:void(0);', array('id' => 'likeButton', 'class' => 'btn btn-primary'));
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <?php echo CHtml::link('Back to List', array('index'), array('class' => 'btn btn-secondary')); ?>
            </div>
        </div>
    </div>
</div>

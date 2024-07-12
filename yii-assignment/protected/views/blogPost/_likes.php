<?php if (!empty($model->likes)): ?>
    <ul>
        <?php foreach ($model->likes as $like): ?>
            <li><?php echo CHtml::encode($like->user->username); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No likes yet.</p>
<?php endif; ?>

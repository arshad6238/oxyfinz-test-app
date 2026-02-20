<h1><?php echo CHtml::encode($blog->title); ?></h1>
<p>by <?php echo CHtml::encode($blog->user->username); ?></p>
<p><?php echo CHtml::encode($blog->content); ?></p>
<p><?php echo CHtml::encode($blog->category); ?></p>
<?php if($blog->file): ?>
    <p>
        <strong>File:</strong>
        <?php echo CHtml::link($blog->file, Yii::app()->baseUrl.'/uploads/'.$blog->file, array('target'=>'_blank')); ?>
    </p>
<?php endif; ?>

<p><?php echo CHtml::link('Back to list', array('index')); ?></p>
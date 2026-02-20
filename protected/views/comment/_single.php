<div class="comment-box">
    <strong><?php echo CHtml::encode($comment->name); ?></strong>
    (<?php echo CHtml::encode($comment->email); ?>)
    <br>
    <p><?php echo CHtml::encode($comment->message); ?></p>
    <small><?php echo $comment->created_at; ?></small>
    <hr>
</div>
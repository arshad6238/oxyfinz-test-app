<h1>Comments</h1>

<!-- 🔍 AUTOCOMPLETE SEARCH -->
<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl() .
    '/jui/css/base/jquery-ui.css'
);
?>

<input type="text" id="comment-search" placeholder="Search comments...">


<script>
    $('#comment-search').autocomplete({
        source: '<?php echo $this->createUrl("comment/autocomplete"); ?>',
        minLength: 2
    });
</script>

<hr>

<!-- 💬 COMMENT LIST -->
<div id="comment-list">
    <?php foreach ($comments as $c): ?>
        <?php $this->renderPartial('_single', array('comment'=>$c)); ?>
    <?php endforeach; ?>
</div>

<hr>

<!-- 📨 AJAX COMMENT FORM -->
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'comment-form',
)); ?>
<div id="comment-errors" style="color:red;"></div>
<div>
    <?php echo $form->textField($model, 'name', array('placeholder'=>'Your name')); ?>
    <?php echo $form->error($model,'name'); ?>
</div>

<div>
    <?php echo $form->textField($model, 'email', array('placeholder'=>'Your email')); ?>
    <?php echo $form->error($model,'email'); ?>
</div>

<div>
    <?php echo $form->textArea($model, 'message', array('placeholder'=>'Your comment')); ?>
    <?php echo $form->error($model,'message'); ?>
</div>

<?php
echo CHtml::ajaxSubmitButton(
    'Submit Comment',
    array('comment/create'),
    array(
        'type' => 'POST',
        'dataType' => 'json',
        'success' => 'function(response){

            $("#comment-errors").html("");

            if(response.status === "error") {

                var errors = "";
                $.each(response.errors, function(field, messages){
                    errors += messages[0] + "<br>";
                });

                $("#comment-errors").html(errors);

            } else {

                $("#comment-list").prepend(response.html);
                $("#comment-form")[0].reset();
            }
        }',
        'error' => 'function(xhr){
            alert("Server error");
        }'
    )
);
?>

<?php $this->endWidget(); ?>
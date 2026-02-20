<h1>Create Blog</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'blog-form',
        'enableClientValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'), // required for file upload
)); ?>

<div>
    <?php echo $form->labelEx($model,'title'); ?>
    <?php echo $form->textField($model,'title'); ?>
    <?php echo $form->error($model,'title'); ?>
</div>

<div>
    <?php echo $form->labelEx($model,'content'); ?>
    <?php echo $form->textArea($model,'content'); ?>
    <?php echo $form->error($model,'content'); ?>
</div>
<?php echo $form->labelEx($model,'category'); ?>
<?php echo $form->dropDownList(
        $model,
        'category',
        array(
                'tech'=>'Tech',
                'life'=>'Life',
                'news'=>'News'
        ),
        array('prompt'=>'Select a category')
); ?>
<?php echo $form->error($model,'category'); ?>


<div>
    <?php echo $form->labelEx($model,'uploadedFile'); ?>
    <?php echo $form->fileField($model,'uploadedFile'); ?>
    <?php echo $form->error($model,'uploadedFile'); ?>
</div>



<div>
    <?php echo CHtml::submitButton('Post'); ?>
</div>

<?php $this->endWidget(); ?>

<h1>Signup</h1>
<style>
    .errorMessage {
        color: red;

    }
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'signup-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<div>
    <?php echo $form->labelEx($model,'username'); ?>
    <?php echo $form->textField($model,'username'); ?>
    <?php echo $form->error($model,'username'); ?>
</div>
<!--Yii::t('app', 'Copyright')-->
<div>
    <?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model,'email'); ?>
    <?php echo $form->error($model,'email'); ?>
</div>

<div>
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->passwordField($model,'password'); ?>
    <?php echo $form->error($model,'password'); ?>
</div>

<div>
    <?php echo CHtml::submitButton(Yii::t('app','Signup')); ?>
</div>

<?php $this->endWidget(); ?>

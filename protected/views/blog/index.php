<h1>Blog Posts</h1>

<?php if(!Yii::app()->user->isGuest): ?>
    <p><?php echo CHtml::link('Create New Blog', array('create'), array('class'=>'btn btn-primary')); ?></p>
<?php endif; ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'blog-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
                array(
                        'name'=>'title',
                        'type'=>'raw',
                        'value'=>'CHtml::link(CHtml::encode($data->title), array("view","id"=>$data->id))',
                ),
                array(
                        'name'=>'author_search',
                        'value'=>'CHtml::encode($data->user->username)',
                        'filter'=>CHtml::activeTextField($model,'author_search'),
                ),
                array(
                        'name'=>'category_search',
                        'value'=>'CHtml::encode($data->category)',
                        'filter'=>CHtml::activeDropDownList(
                                $model,
                                'category_search',
                                array('tech'=>'Tech','life'=>'Life','news'=>'News'),
                                array('prompt'=>'All')
                        ),
                ),
                array(
                        'name'=>'content',
                        'type'=>'raw',
                        'value'=>'CHtml::encode(substr($data->content,0,50))."..."', // show snippet
                ),
                array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}{delete}',
                        'deleteConfirmation'=>'Are you sure?',
                        'visible'=>Yii::app()->user->name=='admin',
                ),
        ),
));
?>

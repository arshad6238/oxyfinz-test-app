<h1>Manage Blogs</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
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
            'value'=>'$data->user->username',
            'filter'=>CHtml::activeTextField($model,'author_search'),
        ),
        array(
            'name'=>'category_search',
            'value'=>'$data->category',
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
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view} {delete}',
            'deleteConfirmation'=>'Are you sure you want to delete this blog?',
            'visible'=>Yii::app()->user->name=='admin',
        ),
    ),
)); ?>

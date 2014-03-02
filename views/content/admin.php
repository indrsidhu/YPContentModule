<div class="container">
<h1>Manage Contents</h1>
<?php $this->widget('YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'content-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
		'name'=>'lang',
		'header'=>'Lang',
		'value'=>'CHtml::value($data,"lang")',
		'htmlOptions'=>array('style'=>'text-align:center'),
		),		//'slug',
		'content_title',
		//'content_description',
		array(
		'name'=>'content_description',
		'header'=>'Content description',
		'value'=>'substr(strip_tags(CHtml::value($data,"content_description")),0,255)'
		),
		array(
		'name'=>'is_active',
		'header'=>'Active',
		'value'=>'(CHtml::value($data,"is_active")==1) ? "Yes" : "No"',
		'htmlOptions'=>array('style'=>'text-align:center'),
		),
		//'meta_title',
		/*
		'meta_description',
		'meta_keywords',
		'created',
		'updated',
		*/
		array(
			'class'=>'CButtonColumn',
			'buttons' => array(
				'view' => array(
				'label' => 'View',
				'url' => 'Yii::app()->createUrl("content/content/view",array("slug"=>$data->slug))',
				),
			),			

		),
	),
)); ?>
</div>
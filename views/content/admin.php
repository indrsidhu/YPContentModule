<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'List content'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>'javascript:void(0)','active'=>true),
	array('label'=>'Create new Content', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Manage Contents</h1>

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
		),
	),
)); ?>

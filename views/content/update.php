<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


$this->menu=array(
	array('label'=>'List Content', 'url'=>array('admin')),
	array('label'=>'Create new Content', 'url'=>array('create')),
	array('label'=>'Update Content', 'url'=>'javascript:void(0)','active'=>true),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Content <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
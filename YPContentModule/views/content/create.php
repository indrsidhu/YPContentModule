<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('admin')),
	array('label'=>'Create new Content', 'url'=>'javascript:void(0)','active'=>true),
);
?>

<h1>Create Content</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
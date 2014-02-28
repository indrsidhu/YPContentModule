<?php
class YPMenuWidget extends CWidget{
	
	public $menu = array();
	public $menusub = array();

	function init(){

		$mainMenu=array(
			array('label'=>'Content dashboard', 'url'=>array('/content/default/index'),'active'=>(Yii::app()->controller->id=='default') ? true : false),
			array('label'=>'Manage Pages', 'url'=>array('/content/content/admin'),'active'=>(Yii::app()->controller->id=='content') ? true : false),
		);	
		
		$menusub = array();
		
		switch(Yii::app()->controller->id){
			case 'content':
			$menusub = array(
				array('label'=>'Manage content', 'url'=>array('/content/content/admin'),'active'=>(Yii::app()->controller->action->id=='admin') ? true : false),
				array('label'=>'Create content page', 'url'=>array('/content/content/create'),'active'=>(Yii::app()->controller->action->id=='create') ? true : false),
				array('label'=>'Update', 'url'=>'','active'=>(Yii::app()->controller->action->id=='update') ? true : false,'visible'=>(Yii::app()->controller->action->id=='update') ? true : false),
				array('label'=>'View', 'url'=>'','active'=>(Yii::app()->controller->action->id=='view') ? true : false,'visible'=>(Yii::app()->controller->action->id=='view') ? true : false),
			);	
			break;
		}
		
	
		$this->menu = $mainMenu;
		$this->menusub = $menusub;
		$this->render('YPMenuWidget');
	}
	
}
?>
<?php
class YPContentModule extends CWebModule
{
	public function init()
	{
	
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'ext.yiiplugins.YPContentModule.models.*',
			'ext.yiiplugins.YPContentModule.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$this->config($controller, $action);
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	function config($controller, $action){
	
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		Yii::app()->clientScript->registerCssFile($baseUrl.'/YPStyle.css');	
	
	
		/**
		 * Style and Layout Settings
		 */	
		 
		// If you are using bootstrap or your own stylesheet set this false, 
		$controller->YPStylesheet = true; // true|false
		 
		switch($action->id)
		{
			case 'admin':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'create':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'update':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'view':
			break;
		}	
	}
	
	function getContentLinks($slugs=''){
	
		$lang 	= Yii::app()->language;
		$lang 	= ($lang=='') ? 'en_us' : $lang;
	
		$slugs = explode(',',$slugs);
		$slugs = array_filter($slugs);
		
		$criteria = new CDbCriteria;
		$criteria->select = 't.id,t.slug,t.content_title';
		$criteria->addInCondition('t.slug',$slugs);
		$criteria->compare('t.lang',$lang);
	
		$model		=	new Content();
		$res		=	$model->findAll($criteria);
		$menu = array();
		foreach($res as $res){
			$item = array();
			$item['label']	=	$res->content_title;
			$item['url']	=	Yii::app()->createUrl('content/content/view',array('id'=>$res->slug));
			$menu[] = $item;
		}
		return $menu;
	}
	

	/*
		'/page/<id>'=>'content/content/view',
		'/admin/content/<action:\w+>/<id:\d+>'=>'content/content/<action>',
		'/admin/content/<action:\w+>'=>'content/content/<action>',
	*/
	
	
	
	
}


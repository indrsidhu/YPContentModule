<div class="YPContentMVC">
	<div class="form" role="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'content-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'lang'); ?>
			<?php echo $form::dropDownList($model,'lang',$model->getLocale(),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'lang'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'content_title'); ?>
			<?php echo $form->textField($model,'content_title',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'content_title'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form->labelEx($model,'slug'); ?>
			<?php echo $form->textField($model,'slug',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'slug'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'content_description'); ?>
			<?php $this->widget('YPContentModule.components.tinymce.ETinyMce', array(
				'model'=>$model,
				'attribute'=>'content_description',
				'editorTemplate'=>'full',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
				'options' => array(
                        'skin' => 'default',
                        'theme_advanced_buttons1' => 'preview,bold,italic,underline,fontselect,fontsizeselect,link,justifyfull,justifyleft,justifycenter,justifyright,pasteword,pastetext,table,image,|,bullist,numlist,|,undo,redo,|,code,fullscreen',
                        'theme_advanced_buttons2' => '',
                        'theme_advanced_buttons3' => '',
                    ),
			)); ?>
			<?php //echo $form->textArea($model,'content_description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'content_description'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'meta_title'); ?>
			<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'meta_title'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'meta_description'); ?>
			<?php echo $form->textarea($model,'meta_description',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'meta_description'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'meta_keywords'); ?>
			<?php echo $form->textField($model,'meta_keywords',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'meta_keywords'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form->labelEx($model,'is_active'); ?>
			<?php echo $form::dropDownList($model,'is_active',array('1'=>'Yes','0'=>'No'),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'is_active'); ?>
		</div>

		<div class="form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
</div>	


<?php
	$assets = dirname(__FILE__).'/../../assets';
	$baseUrl = Yii::app()->assetManager->publish($assets);
	if(is_dir($assets)){
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.slugify.js', CClientScript::POS_HEAD);
	} else {
		throw new Exception('Expancer - Error: Couldn\'t publish assets.');
	}

	Yii::app()->clientScript->registerScript('YPContentMVC_form','
	 $("#Content_slug").slugify("#Content_content_title");	
	',CClientScript::POS_READY);
?>	
<div class="container">
	<h1>Manage content pages</h1>
	<?php $this->widget('YPMenuWidget'); ?>
	<p>
	This is the view content for action "<?php echo $this->action->id; ?>".
	The action belongs to the controller "<?php echo get_class($this); ?>"
	in the "<?php echo $this->module->id; ?>" module.
	</p>
	<p>
	You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
	</p>
</div>
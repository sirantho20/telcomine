<?php
/* @var $this GeneratorsController */
/* @var $model Generators */
?>

<?php
$this->breadcrumbs=array(
	'Generators'=>array('index'),
	$model->generator_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Generators', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Generators', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Generators', 'url'=>array('update', 'id'=>$model->generator_id)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Generators', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->generator_id),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Generators', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Generators '.$model->generator_id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'generator_id',
		'serial_number',
		'model_number',
		'manufacturer_name',
		'manufacture_date',
		'supplier_name',
		'date_of_purchase',
		'date_of_first_use',
		'kva_capacity',
		'current_run_hours',
		'last_serviced_date',
		'engine_make',
		'engine_model',
		'fuel_tank_capacity',
	),
)); ?>
<?php
/* @var $this GeneratorsController */
/* @var $data Generators */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('generator_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->generator_id),array('view','id'=>$data->generator_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_number')); ?>:</b>
	<?php echo CHtml::encode($data->model_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacturer_name')); ?>:</b>
	<?php echo CHtml::encode($data->manufacturer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacture_date')); ?>:</b>
	<?php echo CHtml::encode($data->manufacture_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier_name')); ?>:</b>
	<?php echo CHtml::encode($data->supplier_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_purchase')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_purchase); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_first_use')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_first_use); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kva_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->kva_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_run_hours')); ?>:</b>
	<?php echo CHtml::encode($data->current_run_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_serviced_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_serviced_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_make')); ?>:</b>
	<?php echo CHtml::encode($data->engine_make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_model')); ?>:</b>
	<?php echo CHtml::encode($data->engine_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_tank_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_tank_capacity); ?>
	<br />

	*/ ?>

</div>
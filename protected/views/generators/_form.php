<?php
/* @var $this GeneratorsController */
/* @var $model Generators */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'generators-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'action' => $this->createUrl('create'),
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'generator_id',array('maxlength'=>15, 'class'=>'input-sm')); ?>
    <?php echo $form->textFieldControlGroup($model,'serial_number',array('maxlength'=>45, 'class'=>'input-sm')); ?>
    <?php echo $form->textFieldControlGroup($model,'model_number',array('maxlength'=>45, 'class'=>'input-sm')); ?>
    <?php echo $form->textFieldControlGroup($model,'manufacturer_name',array('maxlength'=>45, 'class'=>'input-sm')); ?>
    <?php echo $form->dateFieldControlGroup($model,'manufacture_date'); ?>
    <?php echo $form->textFieldControlGroup($model,'supplier_name',array('maxlength'=>45, 'class'=>'input-sm')); ?>
    <?php echo $form->dateFieldControlGroup($model,'date_of_purchase'); ?>
    <?php echo $form->textFieldControlGroup($model,'date_of_first_use'); ?>
    <?php echo $form->textFieldControlGroup($model,'kva_capacity'); ?>
    <?php echo $form->textFieldControlGroup($model,'current_run_hours'); ?>
    <?php echo $form->textFieldControlGroup($model,'last_serviced_date'); ?>
    <?php echo $form->textFieldControlGroup($model,'engine_make',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'engine_model',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'fuel_tank_capacity'); ?>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_DEFAULT, 'class'=>'btn-sm')); ?>
    <?php echo BsHtml::ajaxSubmitButton('Add', CHtml::normalizeUrl(array('generators/create')), 
            array(
                'dataType'=>'json',
                'type'=>'post',
                'success'=>'function(data){}',
                'error'=>'function(data){}',
                'beforeSend'=>'function(){}',
            ),
            array()
            ); ?>
<?php $this->endWidget(); ?>

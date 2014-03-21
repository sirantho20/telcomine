<?php
/* @var $this GeneratorsController */
/* @var $model Generators */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'layout'=>  BsHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <?php echo $form->textFieldControlGroup($model,'generator_id',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'serial_number',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'model_number',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'manufacturer_name',array('maxlength'=>45)); ?>
    <?php echo $form->textFieldControlGroup($model,'manufacture_date'); ?>
    <?php //echo $form->textFieldControlGroup($model,'supplier_name',array('maxlength'=>45)); ?>
    <?php //echo $form->textFieldControlGroup($model,'date_of_purchase'); ?>
    <?php //echo $form->textFieldControlGroup($model,'date_of_first_use'); ?>
    <?php //echo $form->textFieldControlGroup($model,'kva_capacity'); ?>
    <?php //echo $form->textFieldControlGroup($model,'current_run_hours'); ?>
    <?php //echo $form->textFieldControlGroup($model,'last_serviced_date'); ?>
    <?php //echo $form->textFieldControlGroup($model,'engine_make',array('maxlength'=>45)); ?>
    <?php //echo $form->textFieldControlGroup($model,'engine_model',array('maxlength'=>45)); ?>
    <?php //echo $form->textFieldControlGroup($model,'fuel_tank_capacity'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,'class'=>'btn-xs'));?>
    </div>

<?php $this->endWidget(); ?>

<?php
/* @var $this GeneratorsController */
/* @var $model Generators */


$this->breadcrumbs=array(
	'Generators'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>'List Generators', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'New Generator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#generators-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pagetitle = 'Manage Generators' ?>

    <!--    <div class="search-form" style="display:none">
            <div class="alert alert-info">
            <?php //$this->renderPartial('_search',array(
               // 'model'=>$model,
           // )); ?>
            </div>
        </div>
         search-form -->

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'generators-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        		'generator_id',
		'model_number',
		'manufacturer_name',
		'manufacture_date',
		'supplier_name',
		/*
		'date_of_purchase',
		'date_of_first_use',
		'kva_capacity',
		'current_run_hours',
		'last_serviced_date',
		'engine_make',
		'engine_model',
		'fuel_tank_capacity',
		*/
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>







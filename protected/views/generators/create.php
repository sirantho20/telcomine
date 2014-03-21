<?php
/* @var $this GeneratorsController */
/* @var $model Generators */
?>

<?php
$this->breadcrumbs=array(
	'Generators'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Generators', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Generators', 'url'=>array('admin')),
);
?>

<?php $this->pagetitle = 'New Generator' ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
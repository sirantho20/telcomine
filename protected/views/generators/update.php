<?php
/* @var $this GeneratorsController */
/* @var $model Generators */
?>

<?php
$this->breadcrumbs=array(
	'Generators'=>array('index'),
	$model->generator_id=>array('view','id'=>$model->generator_id),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Generators', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Generators', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Generators', 'url'=>array('view', 'id'=>$model->generator_id)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Generators', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Generators '.$model->generator_id) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
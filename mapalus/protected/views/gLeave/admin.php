<?php
/* @var $this GLeaveController */
/* @var $model gLeave */

$this->breadcrumbs=array(
	'G Leaves'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List gLeave', 'url'=>array('index')),
	array('label'=>'Create gLeave', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('g-leave-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage G Leaves</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'g-leave-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent_id',
		'n_cuti',
		'd_cuti',
		'd_dari',
		'd_sampai',
		/*
		'n_jmlhari',
		'c_h_masuk',
		'd_h_masuk',
		'r_cuti',
		'n_cutiii',
		'c_masal',
		'c_pribadi',
		'n_sisacuti',
		'c_ganti',
		'c_ajukan',
		'c_ketahui',
		'c_setuju',
		'd_ajukan',
		'd_ketahui',
		'd_setuju',
		't_keterangan',
		'tahunke',
		'approved_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this GLeaveController */
/* @var $model gLeave */

$this->breadcrumbs=array(
	'G Leaves'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List gLeave', 'url'=>array('index')),
	array('label'=>'Create gLeave', 'url'=>array('create')),
	array('label'=>'Update gLeave', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete gLeave', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage gLeave', 'url'=>array('admin')),
);
?>

<h1>View gLeave #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'n_cuti',
		'd_cuti',
		'd_dari',
		'd_sampai',
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
	),
)); ?>

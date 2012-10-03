<?php
/* @var $this GLeaveController */
/* @var $data gLeave */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_cuti')); ?>:</b>
	<?php echo CHtml::encode($data->n_cuti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_cuti')); ?>:</b>
	<?php echo CHtml::encode($data->d_cuti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_dari')); ?>:</b>
	<?php echo CHtml::encode($data->d_dari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_sampai')); ?>:</b>
	<?php echo CHtml::encode($data->d_sampai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_jmlhari')); ?>:</b>
	<?php echo CHtml::encode($data->n_jmlhari); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('c_h_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->c_h_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_h_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->d_h_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_cuti')); ?>:</b>
	<?php echo CHtml::encode($data->r_cuti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_cutiii')); ?>:</b>
	<?php echo CHtml::encode($data->n_cutiii); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_masal')); ?>:</b>
	<?php echo CHtml::encode($data->c_masal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_pribadi')); ?>:</b>
	<?php echo CHtml::encode($data->c_pribadi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_sisacuti')); ?>:</b>
	<?php echo CHtml::encode($data->n_sisacuti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_ganti')); ?>:</b>
	<?php echo CHtml::encode($data->c_ganti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_ajukan')); ?>:</b>
	<?php echo CHtml::encode($data->c_ajukan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_ketahui')); ?>:</b>
	<?php echo CHtml::encode($data->c_ketahui); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_setuju')); ?>:</b>
	<?php echo CHtml::encode($data->c_setuju); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_ajukan')); ?>:</b>
	<?php echo CHtml::encode($data->d_ajukan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_ketahui')); ?>:</b>
	<?php echo CHtml::encode($data->d_ketahui); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_setuju')); ?>:</b>
	<?php echo CHtml::encode($data->d_setuju); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->t_keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahunke')); ?>:</b>
	<?php echo CHtml::encode($data->tahunke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_id')); ?>:</b>
	<?php echo CHtml::encode($data->approved_id); ?>
	<br />

	*/ ?>

</div>
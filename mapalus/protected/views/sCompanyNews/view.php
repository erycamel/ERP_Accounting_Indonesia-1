<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Scompany News'=>array('index'),
	$model->title,
);

?>

<div class="page-header">
<h1><?php echo $model->title; ?></h1>
</div>

<?php 
echo "Posted By: ".$model->author_id;
echo "<br/>";
echo "Posted Date: ".$model->created_date;
echo "<br/>";

echo "<br/>";
echo $model->content;

 ?>

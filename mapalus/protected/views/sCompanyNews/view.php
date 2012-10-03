<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs=array(
	'Scompany News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Home', 'url'=>array('/sCompanyNews')),
);

$this->menu1=sCompanyNews::getTopUpdated();
//$this->menu2=sCompanyNews::getTopCreated();

?>

<div class="page-header">
<h1><?php echo $model->title; ?></h1>
</div>

<?php 
echo "Posted By: ".$model->created_by;
echo "<br/>";
echo "Posted Date: ".$model->created_date;
echo "<br/>";

echo "<br/>";
echo $model->content;

 ?>

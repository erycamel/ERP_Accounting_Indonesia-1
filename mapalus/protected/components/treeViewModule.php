<?php

Yii::import('zii.widgets.CPortlet');

class treeViewModule extends CPortlet
{
	public function init()
	{
		//$this->title='Tree View Module';
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('treeViewModule');
	}
}
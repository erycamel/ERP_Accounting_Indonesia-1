<?php

class SGalleryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainGuest';
	public $defaultAction = 'list';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				//'rights', // perform access control for CRUD operations
				'accessControl',
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to access 'index' and 'view' actions.
						'users'=>array('*'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$this->render('list',array(
		));
	}

}

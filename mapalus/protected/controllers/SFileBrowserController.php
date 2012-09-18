<?php
class SFileBrowserController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
				'accessControl',
				//'rights',
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
						'actions'=>array('systemFolder','connectorSystemFolder'),
						'users'=>array('*'),
				),
				array('allow',  // allow all users to access 'index' and 'view' actions.
						'actions'=>array('index','connectorPersonalFolder','publicFolder','connectorPublicFolder','systemFolder','connectorSystemFolder'),
						'users'=>array('@'),
				),
				array('allow',  // allow all users to access 'index' and 'view' actions.
						'actions'=>array('connectorSystemFolderAdmin','systemFolderAdmin'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	public function actions()
	{
		return array(
				//Admin Share for All Authenticated User
				'connectorSystemFolderAdmin' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.systemfolder'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/systemfolder/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
				//Admin Share for All Authenticated User
				'connectorSystemFolder' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.systemfolder'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/systemfolder/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
								//'uploadDeny'    => array(Yii::app()->user->name),
								'disabled'     => array('upload','mkdir','mkfile'),      // list of not allowed commands
									
						)
				),
				'connectorPublicFolder' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.publicfolder'),
								'URL' => Yii::app()->baseUrl . '/sharedocs/publicfolder/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
				'connectorPersonalFolder' => array(
						'class' => 'ext.elFinder.ElFinderConnectorAction',
						'settings' => array(
								'root' => Yii::getPathOfAlias('webroot.sharedocs.personalfolder').'/'.Yii::app()->user->name.'/',
								//'URL' => Yii::app()->baseUrl . '/personalfolder/'.Yii::app()->user->name,
								'rootAlias' => 'Home',
								'mimeDetect' => 'none',
						)
				),
		);
	}

	public function actionSystemFolderAdmin() {

		$this->render('systemFolderAdmin');
	}

	public function actionSystemFolder() {

		$this->render('systemFolder');
	}

	public function actionPublicFolder() {

		$this->render('publicFolder');
	}

	public function actionIndex() {   //index to Personal Folder
		if (!is_dir(Yii::getPathOfAlias('webroot.sharedocs.personalfolder') . '/'.Yii::app()->user->name))
			mkdir(Yii::getPathOfAlias('webroot.sharedocs.personalfolder') . '/'.Yii::app()->user->name);
			
		$this->render('personalFolder');
	}


}

/*
 //server file input
$this->widget('ext.elFinder.ServerFileInput', array(
		'model' => $model,
		'attribute' => 'serverFile',
		'connectorRoute' => 'admin/elfinder/connector',
)
);

// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
		'connectorRoute' => 'admin/elfinder/connector',
)
);

*/
?>
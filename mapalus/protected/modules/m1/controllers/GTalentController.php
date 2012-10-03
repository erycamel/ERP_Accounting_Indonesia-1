<?php

class GTalentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/*
	 public function filters()
	 {
	return array(
			'accessControl', // perform access control for CRUD operations
			'ajaxOnly + PersonAutoComplete',
			array(
					'COutputCache +index',
					// will expire in a year
					'duration'=>24*3600*365,
					'dependency'=>array(
							'class'=>'CChainedCacheDependency',
							'dependencies'=>array(
									new CGlobalStateCacheDependency('gperson'),
									new CDbCacheDependency('SELECT id FROM g_person
											ORDER BY id DESC LIMIT 1'),
							),
					),
			),
	);
	}
	*/

	/**
	 * @return array action filters
	 */

	public function filters()
	{
		return array(
				'rights',
				'ajaxOnly + PersonAutoComplete',
		);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$modelPerformance=$this->newPerformance($id);

		$this->render('view',array(
				'model'=>$model,
				'modelPerformance'=>$modelPerformance,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newPerformance($id)
	{
		$model=new gPersonPerformance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonPerformance']))
		{
			$model->attributes=$_POST['gPersonPerformance'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}
		
		return $model;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePerformance($id)
	{
		$model=$this->loadModelPerformance($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonPerformance']))
		{
			$model->attributes=$_POST['gPersonPerformance'];
			if($model->save())
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formPerformance',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeletePerformance($id)
	{
		$this->loadModelPerformance($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if (Yii::app()->user->name != "admin") {
			$criteria->with=array('company');
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		}

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('address1',$_GET['gPerson']['address1'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$dataProvider=new CActiveDataProvider('gPerson', array(
				'criteria'=>$criteria,
		)
		);

		$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$criteria=new CDbCriteria;

		if (Yii::app()->user->name != "admin") {
			$criteria->with=array('company');
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
				
		}

		$model=gPerson::model()->findByPk($id,$criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModelPerformance($id)
	{
		$model=gPersonPerformance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='g-person-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPersonAutoComplete()
	{
		$res =array();
		if (isset($_GET['term'])) {
			$qtxt ="SELECT employee_name as label, id FROM g_person WHERE employee_name LIKE :name ORDER BY employee_name LIMIT 20";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			//$res =$command->queryColumn();
			$res =$command->queryAll();

		}
		echo CJSON::encode($res);
	}

}

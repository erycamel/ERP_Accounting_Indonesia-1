<?php

class GLeaveController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'rights',
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new gLeave;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			//$model->parent_id=gPerson::model()->find('userid = '.Yii::app()->user->id)->id;  //default PETER
			$model->approved_id =1; ///request
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('view','id'=>gPerson::model()->find('userid = '.Yii::app()->user->id)->id));
				$this->redirect(array('/m1/gLeave'));
		}

		$this->render('createWithEmp',array(
				'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModelLeave($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gLeave']))
		{
			$model->attributes=$_POST['gLeave'];
			if($model->save())
				//$this->redirect(array('/m1/gLeave'));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formTEMPORARY',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelLeave($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionOnRecent()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('t_domalamat',$_GET['gPerson']['t_domalamat'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$this->render('OnRecent',array(
				'model'=>$model,
		));
	}

	public function actionOnLeave()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('t_domalamat',$_GET['gPerson']['t_domalamat'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$this->render('onLeave',array(
				'model'=>$model,
		));
	}

	public function actionOnPending()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('t_domalamat',$_GET['gPerson']['t_domalamat'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$this->render('onPending',array(
				'model'=>$model,
		));
	}

	public function actionOnApproved()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('t_domalamat',$_GET['gPerson']['t_domalamat'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$this->render('OnApproved',array(
				'model'=>$model,
		));
	}

	public function actionIndex()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		$criteria->mergeWith($criteria1);

		$this->render('index',array(
				'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$model=new gPerson('search');
		$model->unsetAttributes();

		$criteria=new CDbCriteria;
		$criteria1=new CDbCriteria;

		if(isset($_GET['gPerson'])) {
			$model->attributes=$_GET['gPerson'];

			$criteria1->compare('employee_name',$_GET['gPerson']['employee_name'],true,'OR');
			//$criteria1->compare('t_domalamat',$_GET['gPerson']['t_domalamat'],true,'OR');
		}

		$criteria->mergeWith($criteria1);

		$dataProvider=new CActiveDataProvider('gPerson', array(
				'criteria'=>$criteria,
		)
		);

		$this->render('list',array(
				'dataProvider'=>$dataProvider,
				'model'=>$model,
		));
	}

	public function actionApproved($id,$pid)
	{
		$model=$this->loadModelLeave($id);

		$modelBalance=gPerson::model()->with('leaveBalance')->findByPk($pid);
		$newmasal=$modelBalance->leaveBalance->mass_leave;
		$newpribadi=$modelBalance->leaveBalance->person_leave - $model->number_of_day;
		$newbalance=$modelBalance->leaveBalance->balance - $model->number_of_day;

		gLeave::model()->updateByPk((int)$id,array(
				'mass_leave'=>$newmasal,
				'person_leave'=>$newpribadi,
				'balance'=>$newbalance,
				'approved_id'=>2,
		));
	}

	public function actionUnblock($id,$pid)
	{

		gLeave::model()->updateByPk((int)$id,array(
				'approved_id'=>1,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=gPerson::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModelLeave($id)
	{
		$model=gLeave::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='g-cuti-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

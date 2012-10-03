<?php

class GPersonController extends Controller
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
		$modelCareer=$this->newCareer($model->id);
		$modelFamily=$this->newFamily($model->id);
		$modelEducation=$this->newEducation($model->id);
		$modelEducationNf=$this->newEducationNf($model->id);
		$modelExperience=$this->newExperience($model->id);
		$modelStatus=$this->newStatus($model->id);
		$modelOther=$this->newOther($model->id);

		$this->render('view',array(
				'model'=>$model,
				'modelCareer'=>$modelCareer,
				'modelFamily'=>$modelFamily,
				'modelEducation'=>$modelEducation,
				'modelEducationNf'=>$modelEducationNf,
				'modelExperience'=>$modelExperience,
				'modelStatus'=>$modelStatus,
				'modelOther'=>$modelOther,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newCareer($id)
	{
		$model=new gPersonCareer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonCareer']))
		{
			$model->attributes=$_POST['gPersonCareer'];
			$model->parent_id=$id;
				
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newFamily($id)
	{
		$model=new gPersonFamily;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonFamily']))
		{
			$model->attributes=$_POST['gPersonFamily'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newEducation($id)
	{
		$model=new gPersonEducation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonEducation']))
		{
			$model->attributes=$_POST['gPersonEducation'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	public function newEducationNf($id)
	{
		$model=new GPersonEducationNf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GPersonEducationNf']))
		{
			$model->attributes=$_POST['GPersonEducationNf'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newExperience($id)
	{
		$model=new gPersonExperience;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonExperience']))
		{
			$model->attributes=$_POST['gPersonExperience'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newStatus($id)
	{
		$model=new gPersonStatus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonStatus']))
		{
			$model->attributes=$_POST['gPersonStatus'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function newOther($id)
	{
		$model=new gPersonOther;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonOther']))
		{
			$model->attributes=$_POST['gPersonOther'];
			$model->parent_id=$id;
			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		return $model;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new gPerson;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPerson']))
		{
			$model->attributes=$_POST['gPerson'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPerson']))
		{
			$model->attributes=$_POST['gPerson'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
				'model'=>$model,
		));
	}

	public function actionUpdateCareer($id)
	{
		$model=$this->loadModelCareer($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonCareer']))
		{
			$model->attributes=$_POST['gPersonCareer'];
			if($model->save())
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formCareer',array('model'=>$model));
	}

	public function actionUpdateFamily($id)
	{
		$model=$this->loadModelFamily($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonFamily']))
		{
			$model->attributes=$_POST['gPersonFamily'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formFamily',array('model'=>$model));
	}

	public function actionUpdateEducation($id)
	{
		$model=$this->loadModelEducation($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonEducation']))
		{
			$model->attributes=$_POST['gPersonEducation'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formEducation',array('model'=>$model));
	}

	public function actionUpdateEducationNf($id)
	{
		$model=$this->loadModelEducationNf($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonEducationNf']))
		{
			$model->attributes=$_POST['gPersonEducationNf'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formEducationNf',array('model'=>$model));
	}

	public function actionUpdateExperience($id)
	{
		$model=$this->loadModelExperience($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonExperience']))
		{
			$model->attributes=$_POST['gPersonExperience'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formExperience',array('model'=>$model));
	}

	public function actionUpdateStatus($id)
	{
		$model=$this->loadModelStatus($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonStatus']))
		{
			$model->attributes=$_POST['gPersonStatus'];
			if($model->save())
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formStatus',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateOther($id)
	{
		$model=$this->loadModelOther($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['gPersonOther']))
		{
			$model->attributes=$_POST['gPersonOther'];
			if($model->save())
				EQuickDlgs::checkDialogJsScript();
		}

		EQuickDlgs::render('_formOther',array('model'=>$model));
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
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteCareer($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelCareer($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteFamily($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelFamily($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteEducation($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelEducation($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteEducationNf($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelEducationNf($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteExperience($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelExperience($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteStatus($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModelStatus($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view',"id"=>$model->parent_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteOther($id)
	{
		$this->loadModelOther($id)->delete();

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

	public function loadModelCareer($id)
	{
		$model=gPersonCareer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelFamily($id)
	{
		$model=gPersonFamily::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelEducation($id)
	{
		$model=gPersonEducation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelEducationNf($id)
	{
		$model=gPersonEducationNf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelExperience($id)
	{
		$model=gPersonExperience::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelStatus($id)
	{
		$model=gPersonStatus::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModelOther($id)
	{
		$model=gPersonOther::model()->findByPk($id);
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
			//$qtxt ="SELECT employee_name as label, id FROM g_person WHERE employee_name LIKE :name ORDER BY employee_name LIMIT 20";
			$qtxt ="SELECT DISTINCT employee_name FROM g_person WHERE employee_name LIKE :name ORDER BY employee_name LIMIT 20";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
			//$res =$command->queryAll();

		}
		echo CJSON::encode($res);
	}

	public function actionPersonAutoCompleteId()
	{
		$res =array();
		if (isset($_GET['term'])) {
			$qtxt ="SELECT employee_name as label, id FROM g_person WHERE employee_name LIKE :name ORDER BY employee_name LIMIT 20";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryAll();

		}
		echo CJSON::encode($res);
	}

	public function actionDeptUpdate() {
		$cat_id = $_POST['gPersonCareer']['company_id'];
		$models=aOrganization::model()->findAll(array('condition'=>'parent_id = '.$cat_id,'order'=>'id'));

		foreach($models as $model) {
			foreach($model->childs as $mod)
				foreach($mod->childs as $m)
				//$_items[$m->getparent->getparent->name ." - ". $m->getparent->name][$m->id]=$m->name;
				$_items[$m->id]=$m->name;
		}

		//$data=CHtml::listData($models,'id','name');

		foreach($_items as $value=>$dept)  {
			echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($dept),true);
		}



	}
	
	public function actionUpload($id) {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder='shareimages/hr/employee/';  // folder for uploaded files
        $allowedExtensions = array("jpg");  //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 5 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
		
		gPerson::model()->updateByPk($id,array('c_pathfoto'=>$fileName));
 
        echo $return;// it's array
	}	

}

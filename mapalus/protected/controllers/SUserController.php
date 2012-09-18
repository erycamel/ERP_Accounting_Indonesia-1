<?php

class SUserController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
				//'accessControl', // perform access control for CRUD operations
				'rights',
				'ajaxOnly + delete, deleteModule',
		);
	}

	public function accessRules()
	{
		return array(
				array('allow',
						'users'=>array('admin'),
				),
				array('allow',
						'actions'=>array('viewPublic'),
						'users'=>array('@'),
				),
				array('deny',
						'users'=>array('*'),
				),
		);
	}

	public function actionView($id)
	{
		$module=$this->newUserModule($id);
		$group=$this->newUserGroup($id);

		$this->render('view',array(
				'model'=>$this->loadModel($id),
				'modelModule'=>$module,
				'modelGroup'=>$group,
		));
	}

	public function actionViewPublic($id)
	{
		$this->layout="//layouts/column1";

		$this->render('viewPublic',array(
				'model'=>$this->loadModelPublic($id),
		));
	}

	public function newUser()
	{
		$model=new sUser;

		//$this->performAjaxValidation($model);

		if(isset($_POST['sUser']))
		{
			$model->attributes=$_POST['sUser'];
			if($model->save()) {
				Yii::app()->user->setFlash('success','<strong>Great!</strong> data has been saved successfully');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		return $model;
	}

	public function newUserModule($id)
	{
		$model=new sUserModule();

		if(isset($_POST['sUserModule']))
		{
			$model->attributes = $_POST['sUserModule'];
			if (is_array(@$_POST['sUserModule']['s_module_id'])) {

				foreach ($_POST['sUserModule']['s_module_id'] as $item) {
					$model=new sUserModule();
					$model->s_user_id = $id;
					$model->s_module_id = $item;
					$model->s_matrix_id = $_POST['sUserModule']['s_matrix_id'];
					$model->save();
				}
				$this->refresh();
			}

		}

		return $model;
	}

	public function newUserGroup($id)
	{
		$model=new sGroup();

		if(isset($_POST['sGroup']))
		{
			$model->attributes = $_POST['sGroup'];
			$model->parent_id = $id;
			$model->save();
			//$this->refresh();
			$this->redirect(array('view','id'=>$id,'#'=>'yw3_tab_2'));

		}

		return $model;
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// $this->performAjaxValidation($model);

		if(isset($_POST['sUser']))
		{
			$model->attributes=$_POST['sUser'];
			if($model->save()) {
				Yii::app()->user->setFlash('success','<strong>Great!</strong> data has been saved successfully');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
				'model'=>$model,
		));
	}

	public function actionUpdatePassword($id)
	{
		$model=$this->loadModel($id);

		// $this->performAjaxValidation($model);

		if(isset($_POST['sUser']))
		{
			$model->attributes=$_POST['sUser'];

			$_mysalt=sUser::model()->generateSalt();
			$model->salt=$_mysalt;
			$model->password = md5($_mysalt . $model->password);

			if($model->save()) {
				Yii::app()->user->setFlash('success','<strong>Great!</strong> data has been saved successfully');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('updatePassword',array(
				'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		$command=Yii::app()->db->createCommand('delete from s_user_module where s_user_id = :id');
		$command->bindParam(":id", $id, PDO::PARAM_STR);
		$command->execute();

	}

	public function actionDeleteModule($id)
	{
		$command=Yii::app()->db->createCommand('delete from s_user_module where id = :id');
		$command->bindParam(":id", $id, PDO::PARAM_STR);
		$command->execute();
	}

	public function actionIndex()
	{
		$user=$this->newUser();

		$model=new sUser('search');
		$model->unsetAttributes();
		if(isset($_GET['sUser']))
			$model->attributes=$_GET['sUser'];

		$this->render('index',array(
				'model'=>$model,
				'modeluser'=>$user,
		));
	}

	public function loadModel($id)
	{
		$model=sUser::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPublic($id)
	{
		$model=sUser::model()->findByPk((int)$id,array('condition'=>'id = '.Yii::app()->user->id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-module-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUpdateModule($id,$s_user_id)
	{
		//----- begin new code --------------------
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		//----- end new code --------------------

		$model1=$this->loadModel1($id);

		// $this->performAjaxValidation($model);

		if(isset($_POST['sUserModule']))
		{
			$model1->attributes=$_POST['sUserModule'];
			if($model1->save()) {
				Yii::app()->user->setFlash('success','<strong>Great!</strong> data has been saved successfully');
				$this->redirect(array('view','id'=>$s_user_id));
			}
		}

		$this->render('updateModule',array(
				'model'=>$model1,
				'sid'=>$s_user_id,
		));
	}

	public function loadModelUserModule($id)
	{
		$model=sUsersModule::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelUserGroup($id)
	{
		$model=sGroup::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionDeleteGroup($id)
	{
		$_mid=$this->loadModelUserGroup($id)->parent_id;
		$this->loadModelUserGroup($id)->delete();
		$this->redirect(array('view','id'=>$_mid));
	}
}

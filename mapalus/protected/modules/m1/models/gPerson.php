<?php

/**
 * This is the model class for table "g_person".
 *
 * The followings are the available columns in table 'g_person':
 * @property integer $id
 * @property string $employee_code
 * @property string $employee_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $sex_id
 * @property integer $religion_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $pos_code
 * @property string $identity_number
 * @property string $identity_valid
 * @property string $identity_address1
 * @property string $identity_address2
 * @property string $identity_address3
 * @property string $identity_pos_code
 * @property string $email
 * @property string $email2
 * @property string $blood_id
 * @property string $home_phone
 * @property string $handphone
 * @property string $handphone2
 * @property string $c_pathfoto
 * @property integer $userid
 * @property integer $t_status
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property GLeave[] $gLeaves
 * @property GPersonAbsence[] $gPersonAbsences
 * @property GPersonEducation[] $gPersonEducations
 * @property GPersonFamily[] $gPersonFamilies
 * @property GPersonKarir[] $gPersonKarirs
 */
class gPerson extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPerson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'g_person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('employee_name, birth_place, birth_date', 'required'),
				array('sex_id, religion_id, userid, t_status, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
				array('employee_code, address3, identity_address3, blood_id', 'length', 'max'=>10),
				array('VALID_INFO, employee_name, email, email2', 'length', 'max'=>100),
				array('birth_place', 'length', 'max'=>20),
				array('address1, identity_address1, c_pathfoto', 'length', 'max'=>255),
				array('address2, identity_address2, home_phone, handphone, handphone2', 'length', 'max'=>50),
				array('pos_code, identity_pos_code', 'length', 'max'=>5),
				array('identity_number', 'length', 'max'=>25),
				array('birth_date, identity_valid', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, employee_code, employee_name, birth_place, birth_date, sex_id, religion_id, address1, address2, address3, pos_code, identity_number, identity_valid, identity_address1, identity_address2, identity_address3, identity_pos_code, email, email2, blood_id, home_phone, handphone, handphone2, c_pathfoto, userid, t_status, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'religion' => array(self::BELONGS_TO, 'sParameter', array('religion_id'=>'code'),'condition'=>'type = \'cAgama\''),
				'sex' => array(self::BELONGS_TO, 'sParameter', array('sex_id'=>'code'),'condition'=>'type = \'cKelamin\''),
				'company' => array(self::HAS_ONE, 'gPersonCareer', 'parent_id','order' => 'start_date DESC'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'employee_code' => 'Employee Code',
				'employee_name' => 'Employee Name',
				'birth_place' => 'Birth Place',
				'birth_date' => 'Birth Date',
				'sex_id' => 'Sex',
				'religion_id' => 'Religion',
				'address1' => 'Address',
				'address2' => 'Address2',
				'address3' => 'Address3',
				'pos_code' => 'Pos Code',
				'identity_number' => 'Identity Number',
				'identity_valid' => 'Identity Valid',
				'identity_address1' => 'Identity Address1',
				'identity_address2' => 'Identity Address2',
				'identity_address3' => 'Identity Address3',
				'identity_pos_code' => 'Identity Pos Code',
				'email' => 'Email',
				'email2' => 'Email2',
				'blood_id' => 'Blood',
				'home_phone' => 'Home Phone',
				'handphone' => 'Handphone',
				'handphone2' => 'Handphone2',
				'c_pathfoto' => 'C Pathfoto',
				'userid' => 'Userid',
				't_status' => 'T Status',
				'created_date' => 'Created Date',
				'created_by' => 'Created By',
				'updated_date' => 'Updated Date',
				'updated_by' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->compare('company.department_id',$id);
		$criteria->order='company.level_id';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}


	public function listWaitingApproval()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('leave');
		$criteria->together=true;
		$criteria->compare('leave.approved_id',1);
		$criteria->compare('leave.d_dari>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}

	public function onPending()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('leave');
		$criteria->together=true;
		$criteria->compare('leave.approved_id',4);
		//$criteria->compare('leave.d_dari>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}

	public function onLeave()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('leave');
		$criteria->compare('leave.approved_id',2);
		$criteria->compare('leave.d_dari>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}

	public function recentLeave()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('leave');
		$criteria->compare('leave.approved_id',2);
		$criteria->order='leave.d_sampai DESC';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>50,
				),
		));
	}
	/*
	 public static function ListWaitingApproval()
	 {
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;

	//$criteria->with=array('leave');
	//$criteria->together=true;
	//$criteria->compare('leave.approved_id',1);
	//$criteria->compare('leave.d_dari>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

	$models=self::model()->findAll($criteria);

	$returnarray = array();

	foreach ($models as $model) {
	//$_nama= (strlen($model->employee_name) >15) ? substr($model->employee_name,0,15)."..." : $model->employee_name;
	//$_nama= $model->employee_name;
	$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('/m1/gLeave/view','id'=>$model->id));
	}

	return $returnarray;
	}
	*/

	public static function getTopCreated() {

		$models=self::model()->findAll(array('limit'=>10,'order'=>'created_date DESC'));

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >15) ? substr($model->employee_name,0,15)."..." : $model->employee_name;
			$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('/m1/gPerson/view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopUpdated() {

		$models=self::model()->findAll(array('limit'=>10,'order'=>'updated_date DESC'));

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >15) ? substr($model->employee_name,0,15)."..." : $model->employee_name;
			$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('/m1/gPerson/view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopRelated($name) {

		//$_related = self::model()->find((int)$id)->account_name;
		$_exp=explode(" ",$name);


		$criteria=new CDbCriteria;
		//$criteria->compare('account_name',$_related,true,'OR');

		if (isset($_exp[0]))
			$criteria->compare('account_name',$_exp[0],true,'OR');

		if (isset($_exp[1]))
			$criteria->compare('account_name',$_exp[1],true,'OR');
			
		$criteria->limit=10;
		$criteria->order='updated_date DESC';

		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$returnarray[] = array('id' => $model->account_name, 'label' => $model->employee_name, 'url' => array('/m1/gPerson/view','id'=>$model->id));
		}

		return $returnarray;
	}

}
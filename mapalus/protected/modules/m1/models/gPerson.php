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
				array('employee_name, email, email2', 'length', 'max'=>100),
				array('birth_place', 'length', 'max'=>20),
				array('address1, identity_address1, c_pathfoto', 'length', 'max'=>255),
				array('address2, identity_address2, home_phone, handphone, handphone2, account_number, account_name, bank_name', 'length', 'max'=>50),
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
				'company' => 
					array(self::HAS_ONE, 'gPersonCareer', 'parent_id',
						'order' => 'company.start_date DESC',
						'condition'=>'company.status_id <7',
					),
				'companyfirst' => array(self::HAS_ONE, 'gPersonCareer', 'parent_id','order' => 'companyfirst.start_date ASC','condition'=>'companyfirst.status_id =1'),
				'status' => array(self::HAS_ONE, 'gPersonStatus', 'parent_id','order' => 'status.start_date DESC'),
				'leave' => array(self::HAS_MANY, 'gLeave', 'parent_id'),
				'leaveBalance' => array(self::HAS_ONE, 'gLeave', 'parent_id','order' => 'leaveBalance.end_date DESC','condition'=>'leaveBalance.approved_id <> 1'),
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
				'account_number' => 'Account Number',
				'account_name' => 'Account Name',
				'bank_name' => 'Bank Name',
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
	public function sameDepartment($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->order='company.level_id, company.start_date ';
		
		$criteria1 = new CDbCriteria; //JOIN, JOIN CONTINUED, ROTATION
		$criteria1->condition = '(select status_id from g_person_career s where s.parent_id = t.id AND (s.status_id <7 OR s.status_id =15) ORDER BY start_date DESC LIMIT 1) <7';
		
		$criteria2 = new CDbCriteria;
		$criteria2->condition = '(select department_id from g_person_career s where s.parent_id = t.id AND (s.status_id <7 OR s.status_id =15) ORDER BY start_date DESC LIMIT 1) ='.$id;

		$criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
		$criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN(8,9,10)';

		$criteria->mergeWith($criteria1);
		$criteria->mergeWith($criteria2);
		$criteria->mergeWith($criteria3);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>array(
				//	'pageSize'=>20,
				//),
				'pagination'=>false,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function sameLevel($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->order='company.department_id ';
		$criteria->limit=20;
		
		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}
		
		$criteria1 = new CDbCriteria; //JOIN, JOIN CONTINUED, ROTATION
		$criteria1->condition = '(select status_id from g_person_career s where s.parent_id = t.id AND (s.status_id <7 OR s.status_id =15) ORDER BY start_date DESC LIMIT 1) <7';
		
		$criteria2 = new CDbCriteria;
		$criteria2->condition = '(select level_id from g_person_career s where s.parent_id = t.id AND (s.status_id <7 OR s.status_id =15) ORDER BY start_date DESC LIMIT 1) ='.$id;

		$criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
		$criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN(8,9,10)';

		$criteria->mergeWith($criteria1);
		$criteria->mergeWith($criteria2);
		$criteria->mergeWith($criteria3);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>20,
				),
				//'pagination'=>false,
		));
	}
	

	public static function getTopCreated() {

		$models=self::model()->findAll(array('limit'=>10,'order'=>'created_date DESC'));

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >12) ? substr($model->employee_name,0,12)."..." : $model->employee_name;
			$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('/m1/gPerson/view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopUpdated() {

		$models=self::model()->findAll(array('limit'=>10,'order'=>'updated_date DESC'));

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >12) ? substr($model->employee_name,0,12)."..." : $model->employee_name;
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
	
	public function countJoinDate()
	{
		if (isset($this->companyfirst)) {
			$diff = abs(strtotime($this->companyfirst->start_date) - time());
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			return $years." years, ". $months ." months, ".$days ." days";
		}	
	}

	public function countContract()
	{
		if (isset($this->status->end_date)) {
			$diff = abs(strtotime($this->mStatusEndDate()) - time());
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			if (strtotime($this->mStatusEndDate()) > time()) {
				if ($months ==0) {
					return $days ." days left";
				} else	
					return $months ." months, ".$days ." days left";
			} else {
				if ($months ==0) {
					return $days ." days expired";
				} else	
					return $months ." months, ".$days ." days expired";
			}
		}	
	}
	
	public function countBirthdate()
	{
		$diff = abs(strtotime(date('y').'-'.date('m',strtotime($this->birth_date)).'-'.date('d',strtotime($this->birth_date))) - time());
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		if ($days == 0) {
			$_value="Today";
		} elseif ($days == 1) {
			$_value="Tomorrow";
		} else
			$_value=$days." Days to go";
		
		return $_value;
	}

	public function countAge() //round up and round down
	{
		$diff = abs(strtotime($this->birth_date) - time());
		$years = round($diff / (365*60*60*24));

		return $years." years old";
	}
	
	public function countAgeRoundDown() //round down, exact_age
	{
		$diff = abs(strtotime($this->birth_date) - time());
		$years = floor($diff / (365*60*60*24));

		return $years;
	}

	public function compSex(){
		$_item=array();
		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		//$criteria->compare('status.status_id',8);

		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}

		$criteria1=new CDbCriteria;
		$criteria1->condition='sex_id =1';
		$criteria1->mergeWith($criteria);
		$count1=gPerson::model()->count($criteria1);
		$_item[]=(int)$count1;

		$criteria2=new CDbCriteria;
		$criteria2->condition='sex_id =2';
		$criteria2->mergeWith($criteria);
		$count2=gPerson::model()->count($criteria2);
		$_item[]=(int)$count2;
	
		return $_item;
	
	}
	
	public function compAge(){
		$_item=array();

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		//$criteria->compare('status.status_id',8);

		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}

		$criteria1=new CDbCriteria;
		$criteria1->condition='(YEAR(NOW())- YEAR(birth_date)) <=26 ';
		$criteria1->mergeWith($criteria);
		$count1=gPerson::model()->count($criteria1);
		$_item[]=(int)$count1;
		
		$criteria2=new CDbCriteria;
		$criteria2->condition='(YEAR(NOW())- YEAR(birth_date)) BETWEEN 26 AND 30';
		$criteria2->mergeWith($criteria);
		$count2=gPerson::model()->count($criteria2);
		$_item[]=(int)$count2;

		$criteria3=new CDbCriteria;
		$criteria3->condition='(YEAR(NOW())- YEAR(birth_date)) BETWEEN 31 AND 35';
		$criteria3->mergeWith($criteria);
		$count3=gPerson::model()->count($criteria3);
		$_item[]=(int)$count3;

		$criteria4=new CDbCriteria;
		$criteria4->condition='(YEAR(NOW())- YEAR(birth_date)) BETWEEN 36 AND 40';
		$criteria4->mergeWith($criteria);
		$count4=gPerson::model()->count($criteria4);
		$_item[]=(int)$count4;

		$criteria5=new CDbCriteria;
		$criteria5->condition='(YEAR(NOW())- YEAR(birth_date)) BETWEEN 41 AND 45';
		$criteria5->mergeWith($criteria);
		$count5=gPerson::model()->count($criteria5);
		$_item[]=(int)$count5;

		$criteria6=new CDbCriteria;
		$criteria6->condition='(YEAR(NOW())- YEAR(birth_date)) BETWEEN 46 AND 50';
		$criteria6->mergeWith($criteria);
		$count6=gPerson::model()->count($criteria6);
		$_item[]=(int)$count6;

		$criteria7=new CDbCriteria;
		$criteria7->condition='(YEAR(NOW())- YEAR(birth_date)) >50';
		$criteria7->mergeWith($criteria);
		$count7=gPerson::model()->count($criteria7);
		$_item[]=(int)$count7;
		
		return $_item;
	
	}
	
	public function employeeIn()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->compare('year(company.start_date)',date('Y'));
		$criteria->addInCondition('company.status_id',array(1,2));
		$criteria->order='company.start_date DESC';

		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}
		

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
	}

	public function employeeOut()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company','status');
		$criteria->compare('year(status.start_date)',date('Y'));
		$criteria->compare('status.status_id',8);
		$criteria->order='status.start_date DESC';

		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}
		

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
	}
	
	public function getPhotoPath() {
		if ($this->c_pathfoto != null) {
			$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$this->c_pathfoto, CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
		} else {
			$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophoto.jpg", CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
		}
		return $path;

	}
	
	public function companyly($limit=5) {
		$this->getDbCriteria()->mergeWith(array(
			'limit'=>$limit,
		));
		return $this;
	}

	public function mCompany() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->company->name;
		return $_value;
	}

	public function mJobTitle() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->job_title;
		return $_value;
	}

	public function mLevel() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->level->name;
		return $_value;
	}

	public function mLevelId() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->level_id;
		return $_value;
	}

	public function mDepartment() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->department->name;
		return $_value;
	}

	public function mDepartmentId() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria)->department_id;
		return $_value;
	}

	public function mStatus() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonStatus::model()->find($criteria)->status->name;
		return $_value;
	}

	public function mStatusEndDate() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonStatus::model()->find($criteria)->end_date;
		return $_value;
	}
	
	public function scopes()
    {
        return array(
            //'noResign'=>array(
            //    'condition'=>'status=1',
            //),
            //'noResign'=>array(
             //  'with'=>array('status'),
                //'limit'=>5,
            //),
        );
    }	
	
}
<?php

/**
 * This is the model class for table "g_person_career".
 *
 * The followings are the available columns in table 'g_person_career':
 * @property integer $id
 * @property integer $parent_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $status_id
 * @property integer $company_id
 * @property integer $department_id
 * @property integer $level_id
 * @property string $job_title
 * @property string $reason
 *
 * The followings are the available model relations:
 * @property GPerson $parent
 */
class gPersonCareer extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPersonCareer the static model class
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
		return 'g_person_career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('start_date, status_id, company_id, department_id, level_id, job_title', 'required'),
				array('parent_id, status_id, company_id, department_id, level_id', 'numerical', 'integerOnly'=>true),
				array('job_title, reason', 'length', 'max'=>100),
				array('start_date, end_date', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, start_date, end_date, status_id, company_id, department_id, level_id, job_title, reason', 'safe', 'on'=>'search'),
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
				'parent' => array(self::BELONGS_TO, 'GPerson', 'parent_id'),
				'company' => array(self::BELONGS_TO, 'aOrganization', 'company_id'),
				'department' => array(self::BELONGS_TO, 'aOrganization', 'department_id'),
				'level' => array(self::BELONGS_TO, 'gParamLevel', 'level_id'),
				'edulevel' => array(self::BELONGS_TO, 'sParameter', array('level_id'=>'code'),'condition'=>'type = \'EDU\''),
				'status' => array(self::BELONGS_TO, 'sParameter', array('status_id'=>'code'),'condition'=>'type = \'cPromotion\''),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'parent_id' => 'Parent',
				'start_date' => 'Start Date',
				'end_date' => 'End Date',
				'status_id' => 'Status',
				'company_id' => 'Company',
				'department_id' => 'Hierarchy',
				'level_id' => 'Level',
				'job_title' => 'Job Title',
				'reason' => 'Reason',
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

		$criteria->compare('parent_id',$id);
		$criteria->order='start_date DESC';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
	}


}
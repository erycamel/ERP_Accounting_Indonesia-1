<?php

/**
 * This is the model class for table "g_person_experience".
 *
 * The followings are the available columns in table 'g_person_experience':
 * @property integer $id
 * @property integer $parent_id
 * @property string $company_name
 * @property string $industries
 * @property string $start_date
 * @property string $end_date
 * @property string $job_title
 */
class gPersonExperience extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPersonExperience the static model class
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
		return 'g_person_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('company_name,job_title', 'required'),
				array('parent_id,year_length,month_length', 'numerical', 'integerOnly'=>true),
				array('company_name', 'length', 'max'=>300),
				array('industries', 'length', 'max'=>75),
				array('start_date, end_date', 'length', 'max'=>50),
				array('job_title', 'length', 'max'=>150),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, company_name, industries, start_date, end_date, job_title', 'safe', 'on'=>'search'),
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
				'company_name' => 'Company Name',
				'industries' => 'Industries',
				'start_date' => 'Start Date',
				'end_date' => 'End Date',
				'year_length' => 'Year Length',
				'month_length' => 'Month Length',
				'job_title' => 'Job Title',
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

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}
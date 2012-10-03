<?php

/**
 * This is the model class for table "g_leave".
 *
 * The followings are the available columns in table 'g_leave':
 * @property integer $id
 * @property integer $parent_id
 * @property string $input_date
 * @property integer $year_leave
 * @property string $start_date
 * @property string $end_date
 * @property integer $number_of_day
 * @property string $work_date
 * @property string $leave_reason
 * @property integer $mass_leave
 * @property integer $person_leave
 * @property integer $balance
 * @property string $replacement
 * @property string $remark
 * @property integer $approved_id
 *
 * The followings are the available model relations:
 * @property GPerson $parent
 */
class gLeave extends BaseModel
{
	public $parent_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gLeave the static model class
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
		return 'g_leave';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, approved_id', 'required'),
			array('parent_id, year_leave, number_of_day, mass_leave, person_leave, balance, approved_id', 'numerical', 'integerOnly'=>true),
			array('leave_reason', 'length', 'max'=>300),
			array('replacement', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>250),
			array('input_date, start_date, end_date, work_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, input_date, year_leave, start_date, end_date, number_of_day, work_date, leave_reason, mass_leave, person_leave, balance, replacement, remark, approved_id', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'gPerson', 'parent_id'),
			'approved' => array(self::BELONGS_TO, 'sParameter', array('approved_id'=>'code'),'condition'=>'type = \'cLeaveApproved\''),
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
			'parent_name' => 'Employee Name',
			'input_date' => 'Input Date',
			'year_leave' => 'Year Leave',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'number_of_day' => 'Number Of Day',
			'work_date' => 'Work Date',
			'leave_reason' => 'Leave Reason',
			'mass_leave' => 'Mass Leave',
			'person_leave' => 'Person Leave',
			'balance' => 'Balance',
			'replacement' => 'Replacement',
			'remark' => 'Remark',
			'approved_id' => 'Approved',
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

	public function onWaiting()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('person');
		$criteria->together=true;
		$criteria->compare('approved_id',1);
		$criteria->compare('start_date>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

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

		$criteria->with=array('person');
		$criteria->together=true;
		$criteria->compare('approved_id',4);
		$criteria->compare('start_date>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}

	public function OnApproved()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('person');
		$criteria->together=true;
		$criteria->compare('approved_id',2);
		$criteria->compare('start_date>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));

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

		$criteria->with=array('person');
		$criteria->together=true;
		$criteria->compare('approved_id',2);
		$criteria->condition='CURDATE() BETWEEN start_date AND end_date';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}

	public function OnRecent()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('person');
		$criteria->together=true;
		$criteria->compare('approved_id',2);
		$criteria->compare('YEAR(end_date)',date('Y',time()));
		$criteria->order='end_date DESC';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				//'pagination'=>false,
		));
	}
	
}
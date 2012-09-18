<?php

/**
 * This is the model class for table "g_person_status".
 *
 * The followings are the available columns in table 'g_person_status':
 * @property integer $id
 * @property integer $parent_id
 * @property string $cdate
 * @property integer $valid_id
 * @property integer $status_id
 * @property string $remark
 *
 * The followings are the available model relations:
 * @property GPerson $parent
 */
class gPersonStatus extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPersonStatus the static model class
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
		return 'g_person_status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('parent_id, valid_id', 'required'),
				array('parent_id, valid_id, status_id', 'numerical', 'integerOnly'=>true),
				array('remark', 'length', 'max'=>150),
				array('cdate', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, cdate, valid_id, status_id, remark', 'safe', 'on'=>'search'),
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
				'status' => array(self::BELONGS_TO, 'sParameter', array('status_id'=>'code'),'condition'=>'type = \'AK\''),
				'valid' => array(self::BELONGS_TO, 'sParameter', array('valid_id'=>'code'),'condition'=>'type = \'cValidState\''),
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
				'cdate' => 'Date',
				'valid_id' => 'Valid',
				'status_id' => 'Status',
				'remark' => 'Remark',
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
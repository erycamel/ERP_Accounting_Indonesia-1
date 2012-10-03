<?php

/**
 * This is the model class for table "g_person_family".
 *
 * The followings are the available columns in table 'g_person_family':
 * @property integer $id
 * @property integer $parent_id
 * @property string $f_name
 * @property integer $relation_id
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $sex_id
 * @property string $remark
 * @property integer $payroll_cover_id
 *
 * The followings are the available model relations:
 * @property GPerson $parent
 */
class gPersonFamily extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPersonFamily the static model class
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
		return 'g_person_family';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('f_name', 'required'),
				array('parent_id, relation_id, sex_id, payroll_cover_id', 'numerical', 'integerOnly'=>true),
				array('f_name, birth_place', 'length', 'max'=>50),
				array('remark', 'length', 'max'=>200),
				array('birth_date', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, f_name, relation_id, birth_place, birth_date, sex_id, remark, payroll_cover_id', 'safe', 'on'=>'search'),
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
				'relation' => array(self::BELONGS_TO, 'sParameter', array('relation_id'=>'code'),'condition'=>'type = \'HK\''),
				'sex' => array(self::BELONGS_TO, 'sParameter', array('sex_id'=>'code'),'condition'=>'type = \'ckelamin\''),
				'cover' => array(self::BELONGS_TO, 'sParameter', array('payroll_cover_id'=>'code'),'condition'=>'type = \'cCover\''),
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
				'f_name' => 'Name',
				'relation_id' => 'Relation',
				'birth_place' => 'Birth Place',
				'birth_date' => 'Birth Date',
				'sex_id' => 'Sex',
				'remark' => 'Remark',
				'payroll_cover_id' => 'Payroll Cover',
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
		$criteria->order='relation_id';

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}
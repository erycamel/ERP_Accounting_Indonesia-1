<?php

/**
 * This is the model class for table "g_education".
 *
 * The followings are the available columns in table 'g_education':
 * @property integer $id
 * @property integer $parent_id
 * @property string $level_id
 * @property string $school_name
 * @property string $city
 * @property string $interest
 * @property string $graduate
 * @property string $country
 * @property string $institution
 * @property string $ipk
 * @property string $category_id
 */
class gPersonEducation extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gEducation the static model class
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
		return 'g_person_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('parent_id', 'numerical', 'integerOnly'=>true),
				array('level_id, city, interest, country, category_id', 'length', 'max'=>10),
				array('school_name', 'length', 'max'=>50),
				array('graduate', 'length', 'max'=>4),
				array('institution', 'length', 'max'=>255),
				array('ipk', 'length', 'max'=>5),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, level_id, school_name, city, interest, graduate, country, institution, ipk, category_id', 'safe', 'on'=>'search'),
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
				'edulevel' => array(self::BELONGS_TO, 'sParameter', array('level_id'=>'code'),'condition'=>'type = \'EDU\''),
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
				'level_id' => 'Level',
				'school_name' => 'School Name',
				'city' => 'City',
				'interest' => 'Interest',
				'graduate' => 'Graduation Year',
				'country' => 'Country',
				'institution' => 'Institute',
				'ipk' => 'IPK',
				'category_id' => 'Category',
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
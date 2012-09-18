<?php

/**
 * This is the model class for table "g_param_level".
 *
 * The followings are the available columns in table 'g_param_level':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $sort
 * @property string $name
 * @property string $golongan
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 */
class gParamLevel extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gParamLevel the static model class
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
		return 'g_param_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('name', 'required'),
				array('parent_id, sort, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
				array('name', 'length', 'max'=>100),
				array('golongan', 'length', 'max'=>50),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, parent_id, sort, name, golongan, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
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
				'getparent' => array(self::BELONGS_TO, 'gParamLevel', 'parent_id'),
				'childs' => array(self::HAS_MANY, 'gParamLevel', 'parent_id', 'order' => 'id ASC'),
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
				'sort' => 'Sort',
				'name' => 'Name',
				'golongan' => 'Golongan',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('golongan',$this->golongan,true);
		$criteria->compare('created_date',$this->created_date);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_date',$this->updated_date);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	public static function levelDropDown()
	{
		$_items=array();

		$criteria=new CDbCriteria;
		$criteria->order='sort';
		$criteria->compare('parent_id',0);
		$models=self::model()->findAll($criteria);
		foreach($models as $model)
			foreach($model->childs as $mod)
			$_items[$mod->getparent->name][$mod->id]=$mod->name;

		return $_items;
	}


}
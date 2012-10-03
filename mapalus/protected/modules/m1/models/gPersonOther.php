<?php

/**
 * This is the model class for table "g_person_other".
 *
 * The followings are the available columns in table 'g_person_other':
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_name
 * @property string $document_number
 * @property string $issued_date
 * @property string $valid_to
 * @property string $custom_info1
 * @property string $custom_info2
 * @property string $custom_info3
 * @property string $remark
 */
class gPersonOther extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPersonOther the static model class
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
		return 'g_person_other';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, category_name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('category_name, document_number, custom_info1, custom_info2, custom_info3', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>300),
			array('issued_date, valid_to', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, category_name, document_number, issued_date, valid_to, custom_info1, custom_info2, custom_info3, remark', 'safe', 'on'=>'search'),
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
			'category_name' => 'Category Name',
			'document_number' => 'Document Number',
			'issued_date' => 'Issued Date',
			'valid_to' => 'Valid To',
			'custom_info1' => 'Custom Info1',
			'custom_info2' => 'Custom Info2',
			'custom_info3' => 'Custom Info3',
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
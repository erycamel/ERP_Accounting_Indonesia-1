<?php

/**
 * This is the model class for table "s_company_news".
 *
 * The followings are the available columns in table 's_company_news':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status_id
 * @property integer $created_date
 * @property integer $updated_date
 * @property integer $author_id
 */
class sCompanyNews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SCompanyNews the static model class
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
		return 's_company_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('title, content, status_id, author_id', 'required'),
				array('status_id, created_date, updated_date, author_id', 'numerical', 'integerOnly'=>true),
				array('title', 'length', 'max'=>128),
				array('tags', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, title, content, tags, status_id, created_date, updated_date, author_id', 'safe', 'on'=>'search'),
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
				'title' => 'Title',
				'content' => 'Content',
				'tags' => 'Tags',
				'status_id' => 'status_id',
				'created_date' => 'Create Time',
				'updated_date' => 'Update Time',
				'author_id' => 'Author',
		);
	}

}
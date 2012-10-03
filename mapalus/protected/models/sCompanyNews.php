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
 * @property integer $created_by
 */
class sCompanyNews extends BaseModel
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
				array('title, content, status_id', 'required'),
				array('status_id, created_date, updated_date, created_by, updated_by', 'numerical', 'integerOnly'=>true),
				array('title', 'length', 'max'=>128),
				array('tags', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, title, content, tags, status_id, created_date, updated_date, created_by, updated_by', 'safe', 'on'=>'search'),
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
				'created_by' => 'Author',
		);
	}

	public static function getTopCreated() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order='created_date DESC';


		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$returnarray[] = array('id' => $model->id, 'label' => substr($model->title,0,50).'...', 'icon'=>'list-alt', 'url' => array('view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopUpdated() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order='updated_date DESC';


		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$returnarray[] = array('id' => $model->id, 'label' => substr($model->title,0,50).'...', 'icon'=>'list-alt', 'url' => array('view','id'=>$model->id));
		}

		return $returnarray;
	}

	
}
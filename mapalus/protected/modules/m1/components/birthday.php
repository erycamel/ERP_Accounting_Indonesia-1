<?php

Yii::import('zii.widgets.CPortlet');

class birthday extends CPortlet
{
	public function getRecentData()
	{
		$criteria = new CDbCriteria;
		//$criteria->condition= 'SUBSTR(birth_date, 6, 5) <= SUBSTR(Date(Date_Add(current_date(), interval 7 day)), 6, 5) 
		//AND SUBSTR(birth_date, 6, 5) >= SUBSTR(Date(current_date()), 6, 5)';
		//$criteria->order= 'SUBSTR(birth_date, 6, 5)';
		
		$criteria->condition="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
		BETWEEN curdate() AND DATE_ADD(curdate(),INTERVAL 7 DAY)";
		$criteria->order="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))";
		
		if (Yii::app()->user->name != "admin") {
			$criteria->with=array('company');
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->with=array('company');
			$criteria->addInCondition('company.company_id',array(1100));
		}
		
		return gPerson::model()->findAll($criteria);
	}

	protected function renderContent()
	{
		$this->render('birthday');
	}
}
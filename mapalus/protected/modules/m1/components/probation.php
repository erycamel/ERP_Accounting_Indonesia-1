<?php

Yii::import('zii.widgets.CPortlet');

class probation extends CPortlet
{
	public function getRecentData()
	{
		$criteria = new CDbCriteria;
		
		$criteria->with=array('company','status');
		
		if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		} else {
			$criteria->addInCondition('company.company_id',array(1100));
		}

		$criteria->order='(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1)';

		$criteria1 = new CDbCriteria;
		$criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(4,5)';

		//$criteria2 = new CDbCriteria;
		//$criteria2->condition = '(select YEAR(start_date) from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) = YEAR(CURDATE())';

		$criteria->mergeWith($criteria1);
		//$criteria->mergeWith($criteria2);
		
		return gPerson::model()->findAll($criteria);
	}

	protected function renderContent()
	{
		$this->render('probation');
	}
}
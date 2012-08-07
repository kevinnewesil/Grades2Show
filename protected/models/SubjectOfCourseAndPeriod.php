<?php

/**
 * This is the model class for table "subjectofcourseandperiod".
 *
 * The followings are the available columns in table 'subjectofcourseandperiod':
 * @property string $subjectId
 * @property string $courseId
 * @property string $periodId
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Period $period
 * @property Subject $subject
 */
class SubjectOfCourseAndPeriod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubjectOfCourseAndPeriod the static model class
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
		return 'subjectofcourseandperiod';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subjectId, courseId, periodId', 'required'),
			array('subjectId, courseId, periodId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subjectId, courseId, periodId', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'courseId'),
			'period' => array(self::BELONGS_TO, 'Period', 'periodId'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subjectId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subjectId' => Yii::t('app','model.subjectofcourseandperiod.subjectId'),
			'courseId' => Yii::t('app','model.subjectofcourseandperiod.courseId'),
			'periodId' => Yii::t('app','model.subjectofcourseandperiod.periodId'),
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

		$criteria->compare('subjectId',$this->subjectId,true);
		$criteria->compare('courseId',$this->courseId,true);
		$criteria->compare('periodId',$this->periodId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
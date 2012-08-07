<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property string $courseId
 * @property string $createDate
 * @property string $abbr
 * @property string $name
 * @property string $crebo
 * @property string $start
 *
 * The followings are the available model relations:
 * @property Student[] $students
 * @property Subjectofcourseandperiod[] $subjectofcourseandperiods
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('createDate, name, start', 'required'),
			array('abbr, crebo', 'length', 'max'=>16),
			array('name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('courseId, createDate, abbr, name, crebo, start', 'safe', 'on'=>'search'),
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
			'students' => array(self::MANY_MANY, 'Student', 'courseofstudent(courseId, studentId)'),
			'subjectofcourseandperiods' => array(self::HAS_MANY, 'Subjectofcourseandperiod', 'courseId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'courseId' => Yii::t('app','model.course.courseId'),
			'createDate' => Yii::t('app','model.course.createDate'),
			'abbr' => Yii::t('app','model.course.abbr'),
			'name' => Yii::t('app','model.course.name'),
			'crebo' => Yii::t('app','model.course.crebo'),
			'start' => Yii::t('app','model.course.start'),
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

		$criteria->compare('courseId',$this->courseId,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('abbr',$this->abbr,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('crebo',$this->crebo,true);
		$criteria->compare('start',$this->start,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
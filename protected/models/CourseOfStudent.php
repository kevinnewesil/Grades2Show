<?php

/**
 * This is the model class for table "courseofstudent".
 *
 * The followings are the available columns in table 'courseofstudent':
 * @property string $studentId
 * @property string $courseId
 * @property integer $isPassed
 */
class CourseOfStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseOfStudent the static model class
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
		return 'courseofstudent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentId, courseId', 'required'),
			array('isPassed', 'numerical', 'integerOnly'=>true),
			array('studentId, courseId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('studentId, courseId, isPassed', 'safe', 'on'=>'search'),
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
			'studentId' => Yii::t('app','model.courseofstudent.studentId'),
			'courseId' => Yii::t('app','model.courseofstudent.courseId'),
			'isPassed' => Yii::t('app','model.courseofstudent.isPassed'),
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

		$criteria->compare('studentId',$this->studentId,true);
		$criteria->compare('courseId',$this->courseId,true);
		$criteria->compare('isPassed',$this->isPassed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
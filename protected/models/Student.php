<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property string $studentId
 * @property string $studentCode
 * @property string $dateOfBirth
 * @property integer $isAccessible
 * @property string $groupId
 * @property string $tempGroupId
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property Elder[] $elders
 * @property Grade[] $grades
 * @property Group $group
 * @property Group $tempGroup
 * @property User $student
 */
class Student extends User
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentCode', 'required'),
			array('isAccessible', 'numerical', 'integerOnly'=>true),
			array('studentId, groupId, tempGroupId', 'length', 'max'=>10),
			// Make fields default NULL
			array('groupId, tempGroupId', 'default', 'setOnEmpty'=> true, 'value'=> NULL),
			array('studentCode', 'length', 'max'=>16),
			array('dateOfBirth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('studentId, studentCode, dateOfBirth, isAccessible, groupId, tempGroupId', 'safe', 'on'=>'search'),
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
			'courses' => array(self::MANY_MANY, 'Course', 'courseofstudent(studentId, courseId)'),
			'elders' => array(self::MANY_MANY, 'Elder', 'elderofstudent(studentId, elderId)'),
			'grades' => array(self::HAS_MANY, 'Grade', 'studentId'),
			'group' => array(self::BELONGS_TO, 'Group', 'groupId'),
			'tempGroup' => array(self::BELONGS_TO, 'Group', 'tempGroupId'),
			'user' => array(self::BELONGS_TO, 'User', 'studentId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'studentId' => Yii::t('app','model.student.studentId'),
			'studentCode' => Yii::t('app','Student Code'),
			'dateOfBirth' => Yii::t('app','Date of birth'),
			'isAccessible' => Yii::t('app','Accessible grades by guardian'),
			'groupId' => Yii::t('app','Group'),
			'tempGroupId' => Yii::t('app','Group (temporary until next sync)'),
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
		$criteria->compare('studentCode',$this->studentCode,true);
		$criteria->compare('dateOfBirth',$this->dateOfBirth,true);
		$criteria->compare('isAccessible',$this->isAccessible);
		$criteria->compare('groupId',$this->groupId,true);
		$criteria->compare('tempGroupId',$this->tempGroupId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
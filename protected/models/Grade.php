<?php

/**
 * This is the model class for table "grade".
 *
 * The followings are the available columns in table 'grade':
 * @property string $periodId
 * @property string $subjectId
 * @property string $studentId
 * @property integer $retentionId
 * @property string $teacherId
 * @property string $gradeTests
 * @property string $gradeBehaviour
 * @property string $comments
 * @property string $lastEdit
 * @property integer $isClosed
 *
 * The followings are the available model relations:
 * @property Period $period
 * @property Retention $retention
 * @property Student $student
 * @property Subject $subject
 * @property Teacher $teacher
 */
class Grade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Grade the static model class
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
		return 'grade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periodId, subjectId, studentId, retentionId, teacherId, lastEdit', 'required'),
			array('retentionId, isClosed', 'numerical', 'integerOnly'=>true),
			array('periodId, subjectId, studentId, teacherId', 'length', 'max'=>10),
			array('gradeTests, gradeBehaviour', 'length', 'max'=>4),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('periodId, subjectId, studentId, retentionId, teacherId, gradeTests, gradeBehaviour, comments, lastEdit, isClosed', 'safe', 'on'=>'search'),
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
			'period' => array(self::BELONGS_TO, 'Period', 'periodId'),
			'retention' => array(self::BELONGS_TO, 'Retention', 'retentionId'),
			'student' => array(self::BELONGS_TO, 'Student', 'studentId'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subjectId'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacherId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'periodId' => Yii::t('app','Period ID'),
			'subjectId' => Yii::t('app','Subject ID'),
			'studentId' => Yii::t('app','Student ID'),
			'retentionId' => Yii::t('app','Retention ID'),
			'teacherId' => Yii::t('app','Teacher ID'),
			'gradeTests' => Yii::t('app','Grade for Tests'),
			'gradeBehaviour' => Yii::t('app','Grade for Behaviour'),
			'comments' => Yii::t('app','Comments'),
			'lastEdit' => Yii::t('app','Last Edit'),
			'isClosed' => Yii::t('app','Closed'),
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

		$criteria->compare('periodId',$this->periodId,true);
		$criteria->compare('subjectId',$this->subjectId,true);
		$criteria->compare('studentId',$this->studentId,true);
		$criteria->compare('retentionId',$this->retentionId);
		$criteria->compare('teacherId',$this->teacherId,true);
		$criteria->compare('gradeTests',$this->gradeTests,true);
		$criteria->compare('gradeBehaviour',$this->gradeBehaviour,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('lastEdit',$this->lastEdit,true);
		$criteria->compare('isClosed',$this->isClosed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "subject".
 *
 * The followings are the available columns in table 'subject':
 * @property string $subjectId
 * @property string $abbr
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 * @property Subjectofcourseandperiod[] $subjectofcourseandperiods
 */
class Subject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subject the static model class
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
		return 'subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('abbr, name', 'required'),
			array('abbr', 'length', 'max'=>8),
			array('name', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subjectId, abbr, name', 'safe', 'on'=>'search'),
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
			'grades' => array(self::HAS_MANY, 'Grade', 'subjectId'),
			'subjectofcourseandperiods' => array(self::HAS_MANY, 'Subjectofcourseandperiod', 'subjectId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subjectId' => Yii::t('app','model.subject.subjectId'),
			'abbr' => Yii::t('app','model.subject.abbr'),
			'name' => Yii::t('app','model.subject.name'),
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
		$criteria->compare('abbr',$this->abbr,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
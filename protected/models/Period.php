<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property string $periodId
 * @property integer $semester
 * @property integer $term
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 * @property Subjectofcourseandperiod[] $subjectofcourseandperiods
 */
class Period extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Period the static model class
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
		return 'period';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semester, term', 'required'),
			array('semester, term', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('periodId, semester, term', 'safe', 'on'=>'search'),
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
			'grades' => array(self::HAS_MANY, 'Grade', 'periodId'),
			'subjectofcourseandperiods' => array(self::HAS_MANY, 'Subjectofcourseandperiod', 'periodId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'periodId' => Yii::t('app','model.period.periodId'),
			'semester' => Yii::t('app','model.period.semester'),
			'term' => Yii::t('app','model.period.term'),
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
		$criteria->compare('semester',$this->semester);
		$criteria->compare('term',$this->term);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property string $teacherId
 * @property string $abbr
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 * @property User $teacher
 */
class Teacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'abbr',
				'length',
				'max' => 8
			),
			array(
				'abbr',
				'default',
				'setOnEmpty' => true,
				'value' => NULL,
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(
				'teacherId, abbr',
				'safe',
				'on' => 'search'
			),
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
			'grades' => array(
				self::HAS_MANY,
				'Grade',
				'teacherId'
			),
			'teacher' => array(
				self::BELONGS_TO,
				'User',
				'teacherId'
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teacherId' => Yii::t('app', 'Teacher ID'),
			'abbr' => Yii::t('app', 'Abbreviation'),
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

		$criteria = new CDbCriteria;

		$criteria -> compare('teacherId', $this -> teacherId, true);
		$criteria -> compare('abbr', $this -> abbr, true);

		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}

}

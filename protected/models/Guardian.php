<?php

/**
 * This is the model class for table "guardian".
 *
 * The followings are the available columns in table 'guardian':
 * @property string $guardianId
 *
 * The followings are the available model relations:
 * @property User $guardian
 * @property Student[] $students
 */
class Guardian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guardian the static model class
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
		return 'guardian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('guardianId', 'safe', 'on'=>'search'),
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
			'guardian' => array(self::BELONGS_TO, 'User', 'guardianId'),
			'students' => array(self::MANY_MANY, 'Student', 'guardianofstudent(guardianId, studentId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'guardianId' => Yii::t('app','Guardian ID'),
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

		$criteria->compare('guardianId',$this->guardianId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
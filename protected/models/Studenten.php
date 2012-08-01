<?php

/**
 * This is the model class for table "studenten".
 *
 * The followings are the available columns in table 'studenten':
 * @property string $userId
 * @property string $studentCode
 * @property string $fullName
 * @property string $listCodeName
 */
class Studenten extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Studenten the static model class
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
		return 'studenten';
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
			array('userId', 'length', 'max'=>10),
			array('studentCode', 'length', 'max'=>16),
			array('fullName', 'length', 'max'=>129),
			array('listCodeName', 'length', 'max'=>148),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userId, studentCode, fullName, listCodeName', 'safe', 'on'=>'search'),
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
			'userId' => Yii::t('app','model.studenten.userId'),
			'studentCode' => Yii::t('app','model.studenten.studentCode'),
			'fullName' => Yii::t('app','model.studenten.fullName'),
			'listCodeName' => Yii::t('app','model.studenten.listCodeName'),
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

		$criteria->compare('userId',$this->userId,true);
		$criteria->compare('studentCode',$this->studentCode,true);
		$criteria->compare('fullName',$this->fullName,true);
		$criteria->compare('listCodeName',$this->listCodeName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
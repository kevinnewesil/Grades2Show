<?php

/**
 * This is the model class for table "Group".
 *
 * The followings are the available columns in table 'group':
 * @property string $groupId
 * @property string $abbr
 *
 * The followings are the available model relations:
 * @property Student[] $students
 * @property Student[] $students1
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return 'group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('abbr', 'required'),
			array('abbr', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('groupId, abbr', 'safe', 'on'=>'search'),
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
			'students' => array(self::HAS_MANY, 'Student', 'groupId'),
			'students1' => array(self::HAS_MANY, 'Student', 'tempGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'groupId' => Yii::t('app','model.group.groupId'),
			'abbr' => Yii::t('app','model.group.abbr'),
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

		$criteria->compare('groupId',$this->groupId,true);
		$criteria->compare('abbr',$this->abbr,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
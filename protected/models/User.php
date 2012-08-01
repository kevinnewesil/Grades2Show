<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $userId
 * @property string $email
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property integer $isStudent
 * @property integer $isGuardian
 * @property integer $isTeacher
 * @property integer $isAdministrator
 * @property integer $isActive
 *
 * The followings are the available model relations:
 * @property Administrator $administrator
 * @property Guardian $guardian
 * @property Student $student
 * @property Teacher $teacher
 */
class User extends CActiveRecord
{

	// Extra fields for the view, not available in the database
	public $passwordNew;
	public $passwordCheck;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
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
				'email, firstName',
				'required'
			),
			array(
				'isStudent, isGuardian, isTeacher, isAdministrator, isActive',
				'numerical',
				'integerOnly' => true
			),
			array(
				'email',
				'length',
				'max' => 255
			),
			array(
				'email',
				'email',
				'allowEmpty' => FALSE,
				'pattern' => '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/',
			),
			//TODO: add all fields
			// Safe non database fields, also needed for comparing password fields
			//array(
				//'passwordNew, passwordCheck',
				//'safe',
			//),
			array(
				'passwordNew, passwordCheck',
				'required',
				'on' => 'create',
			),
			// Compare passwordCheck when creating or updating the password field
			array(
				'passwordCheck',
				'compare',
				'compareAttribute' => 'passwordNew',
			),
			array(
				'firstName, lastName',
				'length',
				'max' => 64
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(
				'email, firstName, lastName, isStudent, isGuardian, isTeacher, isActive',
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
			'administrator' => array(
				self::HAS_ONE,
				'Administrator',
				'administratorId'
			),
			'Guardian' => array(
				self::HAS_ONE,
				'Guardian',
				'guardianId'
			),
			'student' => array(
				self::HAS_ONE,
				'Student',
				'studentId'
			),
			'teacher' => array(
				self::HAS_ONE,
				'Teacher',
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
			'userId' => Yii::t('app', 'User ID'),
			'email' => Yii::t('app', 'E-mail address'),
			'password' => Yii::t('app', 'Password'),
			'passwordNew' => Yii::t('app', 'New Password'),
			'passwordCheck' => Yii::t('app', 'Password check'),
			'firstName' => Yii::t('app', 'First name'),
			'lastName' => Yii::t('app', 'Last name'),
			'isStudent' => Yii::t('app', 'Student'),
			'isGuardian' => Yii::t('app', 'Guardian'),
			'isTeacher' => Yii::t('app', 'Teacher'),
			'isAdministrator' => Yii::t('app', 'Administrator'),
			'isActive' => Yii::t('app', 'Active'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based
	 * on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria -> compare('userId', $this -> userId, true);
		$criteria -> compare('email', $this -> email, true);
		$criteria -> compare('firstName', $this -> firstName, true);
		$criteria -> compare('lastName', $this -> lastName, true);
		$criteria -> compare('isStudent', $this -> isStudent);
		$criteria -> compare('isGuardian', $this -> isGuardian);
		$criteria -> compare('isTeacher', $this -> isTeacher);
		$criteria -> compare('isAdministrator', $this -> isAdministrator);
		$criteria -> compare('isActive', $this -> isActive);

		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}

	public function beforeSave()
	{
		if (!empty($this -> passwordNew) && $this -> passwordNew == $this -> passwordCheck)
		{
			$ph = new PasswordHash(Yii::app() -> params['phpass']['iteration_count_log2'], Yii::app() -> params['phpass']['portable_hashes']);
			$this -> password = $ph -> HashPassword($this -> passwordNew);
		}
		return parent::beforeSave();
	}

}

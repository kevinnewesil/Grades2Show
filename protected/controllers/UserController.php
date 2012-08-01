<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2',
	 * meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array(
					'index',
					'view'
				),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'edit' actions
				'actions' => array(
					'create',
					'update'
				),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array(
					'admin',
					'delete'
				),
				'users' => array('@'),
			),
			array(
				'deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this -> render('view', array('model' => $this -> loadModel($id), ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$user = new User;
		$student = new Student;
		$teacher = new Teacher;
		$guardian = new Guardian;

		$group = Group::model() -> findAll(array('order' => 'abbr'));

		// Change scenario of rules to create, needed for password
		$user -> scenario = 'create';

		// Validation of multiple models
		$this -> performAjaxValidation(array(
			$user,
			$student,
			$teacher,
			$guardian,
		));

		if (isset($_POST['User']))
		{
			$user -> attributes = $_POST['User'];

			$valid = $user -> validate();

			// Validate student data when user is a student
			if ($user -> attributes['isStudent'] == 1 && isset($_POST['Student']))
			{
				$student -> attributes = $_POST['Student'];
				$valid = $student -> validate() && $valid;
			}
			// Validate teacher data when user is a teacher
			if ($user -> attributes['isTeacher'] == 1 && isset($_POST['Teacher']))
			{
				$teacher -> attributes = $_POST['Teacher'];
				$valid = $teacher -> validate() && $valid;
			}
			// Validate guardian data when user is a guardian
			if ($user -> attributes['isGuardian'] == 1 && isset($_POST['Guardian']))
			{
				$guardian -> attributes = $_POST['Guardian'];
				$valid = $guardian -> validate() && $valid;
			}

			if ($valid)
			{

				// Begin transaction
				$transaction = Yii::app() -> db -> beginTransaction();

				// Give the database process a try
				try
				{
					$user -> save();

					// Handle Student Model if needed
					if ($user -> attributes['isStudent'] == 1)
					{

						// Get userId as FK for studentId
						// Be sure to remove required rule from Student Model
						$student -> studentId = $user -> userId;

						$student -> save();
					}

					// Handle Teacher Model if needed
					if ($user -> attributes['isTeacher'] == 1)
					{

						// Get userId as FK for studentId
						// Be sure to remove required rule from Student Model
						$teacher -> teacherId = $user -> userId;

						$teacher -> save();
					}

					// Handle Guardian Model if needed
					if ($user -> attributes['isGuardian'] == 1)
					{
						$guardian -> guardianId = $user -> userId;
						$guardian -> save();
					}

					// Commit all database transactions if no error occurred
					$transaction -> commit();

					// Redirect page to the view on success
					$this -> redirect(array(
						'view',
						'id' => $user -> userId
					));

				}
				catch(Exception $e)
				{

					// Undo all database transactions performed inside the try-block
					$transaction -> rollBack();

					// Create a log message
					Yii::log($e -> getMessage(), 'error', 'application.controllers.user');

					// Send an error to the user
					Yii::app() -> user -> setFlash('error', Yii::t('app', 'Something went wrong, your administrator has been notified.'));

				}
			}
		}

		$this -> render('create', array(
			'user' => $user,
			'student' => $student,
			'group' => $group,
			'teacher' => $teacher,
			'guardian' => $guardian,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		// If no (NULL) user known by id, use own id
		$user = ($user = $this -> loadModel($id)) ? $user : $this -> loadModel(Yii::app() -> user -> _userId);
		// If no (NULL) student known by id, create a new student
		$student = ($student = Student::model() -> findByPk($id)) ? $student : new Student;
		// If no (NULL) teacher known by id, create a new teacher
		$teacher = ($teacher = Teacher::model() -> findByPk($id)) ? $teacher : new Teacher;
		// If no (NULL) guardian known by id, create a new guardian
		$guardian = ($guardian = Guardian::model() -> findByPk($id)) ? $guardian : new Guardian;
		$group = Group::model() -> findAll(array('order' => 'abbr'));

		// AJAX validation
		$this -> performAjaxValidation(array(
			$user,
			$student,
			$teacher,
			$guardian,
		));

		if (isset($_POST['User']))
		{
			$user -> attributes = $_POST['User'];

			$valid = $user -> validate();

			// Validate student data when user is a student
			if ($user -> attributes['isStudent'] == 1 && isset($_POST['Student']))
			{
				$student -> attributes = $_POST['Student'];
				$valid = $student -> validate() && $valid;
			}
			// Validate teacher data when user is a teacher
			if ($user -> attributes['isTeacher'] == 1 && isset($_POST['Teacher']))
			{
				$teacher -> attributes = $_POST['Teacher'];
				$valid = $teacher -> validate() && $valid;
			}
			// Validate guardian data when user is a guardian
			if ($user -> attributes['isGuardian'] == 1 && isset($_POST['Guardian']))
			{
				$guardian -> attributes = $_POST['Guardian'];
				$valid = $guardian -> validate() && $valid;
			}

			if ($valid)
			{

				// Begin transaction
				$transaction = Yii::app() -> db -> beginTransaction();

				// Give the db process a try
				try
				{
					$user -> save();

					// Handle Student Model if needed
					if ($user -> attributes['isStudent'] == 1)
					{
						// Get userId as FK for studentId
						// Be sure to remove required rule from Student Model
						$student -> studentId = $user -> userId;

						$student -> save();
					}
					elseif ($user -> isStudent == 0 && $student -> studentId == $user -> userId)
					{
						if (Yii::app() -> request -> isPostRequest)
						{
							// we only allow deletion via POST request
							$student -> delete();
						}
					}

					// Handle Teacher Model if needed
					if ($user -> attributes['isTeacher'] == 1)
					{
						// Get userId as FK for teacherId
						// Be sure to remove required rule from Teacher Model
						$teacher -> teacherId = $user -> userId;

						$teacher -> save();
					}
					elseif ($user -> isTeacher == 0 && $teacher -> teacherId == $user -> userId)
					{
						if (Yii::app() -> request -> isPostRequest)
						{
							// we only allow deletion via POST request
							$teacher -> delete();
						}
					}

					// Handle Guardian Model if needed
					if ($user -> attributes['isGuardian'] == 1)
					{
						// Get userId as FK for guardianId
						// Be sure to remove required rule from Teacher Model
						$guardian -> guardianId = $user -> userId;

						$guardian -> save();
					}
					elseif ($user -> isGuardian == 0 && $guardian -> guardianId == $user -> userId)
					{
						if (Yii::app() -> request -> isPostRequest)
						{
							// we only allow deletion via POST request
							$guardian -> delete();
						}
					}

					// Commit all database transactions if no error occured
					$transaction -> commit();

					// Redirect page to the view on succes
					$this -> redirect(array(
						'view',
						'id' => $user -> userId
					));

				}
				catch(Exception $e)
				{

					// Undo all database transactions performed inside the try-block
					$transaction -> rollBack();

					// Create a log message
					Yii::log($e -> getMessage(), 'error', 'application.controllers.user');

					// Send an error to the user
					Yii::app() -> user -> setFlash('error', Yii::t('app', 'Something went wrong, your administrator has been notified.'));

				}
			}
		}

		$this -> render('update', array(
			'user' => $user,
			'student' => $student,
			'group' => $group,
			'teacher' => $teacher,
			'guardian' => $guardian,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app() -> request -> isPostRequest)
		{
			// we only allow deletion via POST request
			$this -> loadModel($id) -> delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not
			// redirect the browser
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('User');
		$this -> render('index', array('dataProvider' => $dataProvider, ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new User('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['User']))
			$model -> attributes = $_GET['User'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = User::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

	public function studentInfo($data, $row)
	{
		$student = Student::model() -> findByPk($data -> userId);

		return $this -> renderPartial('../student/popup', array(
			'user' => $data,
			'student' => $student
		), TRUE);
		//set $return = true, don't display direct
	}

	public function teacherInfo($data, $row)
	{
		$teacher = Teacher::model() -> findByPk($data -> userId);

		return $this -> renderPartial('../teacher/view', array(
			'user' => $data,
			'teacher' => $teacher
		), TRUE);
		//set $return = true, don't display direct
	}

	public function guardianInfo($data, $row)
	{
		$guardian = Guardian::model() -> findByPk($data -> userId);

		return $this -> renderPartial('../guardian/view', array(
			'user' => $data,
			'guardian' => $guardian
		), TRUE);
		//set $return = true, don't display direct
	}

}

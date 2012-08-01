<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_userId;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the email and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model() -> findByAttributes(array('email' => $this -> username, 'isAdministrator' => 1));

		$ph = new PasswordHash(Yii::app() -> params['phpass']['iteration_count_log2'], Yii::app() -> params['phpass']['portable_hashes']);

		if ($user === NULL)
		{
			$this -> errorCode = self::ERROR_USERNAME_INVALID;
		}
		elseif (!$ph -> CheckPassword($this -> password, $user -> password))
		{
			$this -> errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			$this -> _userId = $user -> userId;
			$this -> setState('_firstName', $user -> firstName);
			$this -> setState('_userId', $user -> userId);
			$this -> errorCode = self::ERROR_NONE;
			fbtrace('valid');
		}
		return !$this -> errorCode;
	}

	public function getUserId()
	{
		return $this -> _userId;
	}

}

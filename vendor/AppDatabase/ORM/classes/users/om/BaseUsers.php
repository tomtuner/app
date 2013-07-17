<?php

namespace UsersORM\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use UsersORM\UsersPeer;
use UsersORM\UsersQuery;

/**
 * Base class that represents a row from the 'users' table.
 *
 * 
 *
 * @package    propel.generator.users.om
 */
abstract class BaseUsers extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UsersORM\\UsersPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UsersPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the uid field.
	 * @var        string
	 */
	protected $uid;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the first_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the last_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $last_name;

	/**
	 * The value for the hearing_impaired field.
	 * @var        string
	 */
	protected $hearing_impaired;

	/**
	 * The value for the pref_comm_method field.
	 * @var        string
	 */
	protected $pref_comm_method;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the screen_name field.
	 * @var        string
	 */
	protected $screen_name;

	/**
	 * The value for the middle_initial field.
	 * @var        string
	 */
	protected $middle_initial;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->first_name = '';
		$this->last_name = '';
	}

	/**
	 * Initializes internal state of BaseUsers object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [uid] column value.
	 * 
	 * @return     string
	 */
	public function getUid()
	{
		return $this->uid;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [first_name] column value.
	 * 
	 * @return     string
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [last_name] column value.
	 * 
	 * @return     string
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Get the [hearing_impaired] column value.
	 * 
	 * @return     string
	 */
	public function getHearingImpaired()
	{
		return $this->hearing_impaired;
	}

	/**
	 * Get the [pref_comm_method] column value.
	 * 
	 * @return     string
	 */
	public function getPrefCommMethod()
	{
		return $this->pref_comm_method;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [screen_name] column value.
	 * 
	 * @return     string
	 */
	public function getScreenName()
	{
		return $this->screen_name;
	}

	/**
	 * Get the [middle_initial] column value.
	 * 
	 * @return     string
	 */
	public function getMiddleInitial()
	{
		return $this->middle_initial;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsersPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [uid] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setUid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uid !== $v) {
			$this->uid = $v;
			$this->modifiedColumns[] = UsersPeer::UID;
		}

		return $this;
	} // setUid()

	/**
	 * Set the value of [username] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UsersPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = UsersPeer::FIRST_NAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = UsersPeer::LAST_NAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Set the value of [hearing_impaired] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setHearingImpaired($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hearing_impaired !== $v) {
			$this->hearing_impaired = $v;
			$this->modifiedColumns[] = UsersPeer::HEARING_IMPAIRED;
		}

		return $this;
	} // setHearingImpaired()

	/**
	 * Set the value of [pref_comm_method] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setPrefCommMethod($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pref_comm_method !== $v) {
			$this->pref_comm_method = $v;
			$this->modifiedColumns[] = UsersPeer::PREF_COMM_METHOD;
		}

		return $this;
	} // setPrefCommMethod()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsersPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = UsersPeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = UsersPeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [screen_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setScreenName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->screen_name !== $v) {
			$this->screen_name = $v;
			$this->modifiedColumns[] = UsersPeer::SCREEN_NAME;
		}

		return $this;
	} // setScreenName()

	/**
	 * Set the value of [middle_initial] column.
	 * 
	 * @param      string $v new value
	 * @return     Users The current object (for fluent API support)
	 */
	public function setMiddleInitial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->middle_initial !== $v) {
			$this->middle_initial = $v;
			$this->modifiedColumns[] = UsersPeer::MIDDLE_INITIAL;
		}

		return $this;
	} // setMiddleInitial()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->first_name !== '') {
				return false;
			}

			if ($this->last_name !== '') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->uid = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->username = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->first_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->last_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->hearing_impaired = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->pref_comm_method = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->phone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->address = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->screen_name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->middle_initial = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = UsersPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Users object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UsersPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = UsersQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				UsersPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = UsersPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsersPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(UsersPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(UsersPeer::UID)) {
			$modifiedColumns[':p' . $index++]  = '`UID`';
		}
		if ($this->isColumnModified(UsersPeer::USERNAME)) {
			$modifiedColumns[':p' . $index++]  = '`USERNAME`';
		}
		if ($this->isColumnModified(UsersPeer::FIRST_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`FIRST_NAME`';
		}
		if ($this->isColumnModified(UsersPeer::LAST_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`LAST_NAME`';
		}
		if ($this->isColumnModified(UsersPeer::HEARING_IMPAIRED)) {
			$modifiedColumns[':p' . $index++]  = '`HEARING_IMPAIRED`';
		}
		if ($this->isColumnModified(UsersPeer::PREF_COMM_METHOD)) {
			$modifiedColumns[':p' . $index++]  = '`PREF_COMM_METHOD`';
		}
		if ($this->isColumnModified(UsersPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(UsersPeer::PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`PHONE`';
		}
		if ($this->isColumnModified(UsersPeer::ADDRESS)) {
			$modifiedColumns[':p' . $index++]  = '`ADDRESS`';
		}
		if ($this->isColumnModified(UsersPeer::SCREEN_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`SCREEN_NAME`';
		}
		if ($this->isColumnModified(UsersPeer::MIDDLE_INITIAL)) {
			$modifiedColumns[':p' . $index++]  = '`MIDDLE_INITIAL`';
		}

		$sql = sprintf(
			'INSERT INTO `users` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`UID`':
						$stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
						break;
					case '`USERNAME`':
						$stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
						break;
					case '`FIRST_NAME`':
						$stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
						break;
					case '`LAST_NAME`':
						$stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
						break;
					case '`HEARING_IMPAIRED`':
						$stmt->bindValue($identifier, $this->hearing_impaired, PDO::PARAM_STR);
						break;
					case '`PREF_COMM_METHOD`':
						$stmt->bindValue($identifier, $this->pref_comm_method, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`PHONE`':
						$stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
						break;
					case '`ADDRESS`':
						$stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
						break;
					case '`SCREEN_NAME`':
						$stmt->bindValue($identifier, $this->screen_name, PDO::PARAM_STR);
						break;
					case '`MIDDLE_INITIAL`':
						$stmt->bindValue($identifier, $this->middle_initial, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = UsersPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUid();
				break;
			case 2:
				return $this->getUsername();
				break;
			case 3:
				return $this->getFirstName();
				break;
			case 4:
				return $this->getLastName();
				break;
			case 5:
				return $this->getHearingImpaired();
				break;
			case 6:
				return $this->getPrefCommMethod();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getPhone();
				break;
			case 9:
				return $this->getAddress();
				break;
			case 10:
				return $this->getScreenName();
				break;
			case 11:
				return $this->getMiddleInitial();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['Users'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Users'][$this->getPrimaryKey()] = true;
		$keys = UsersPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getUsername(),
			$keys[3] => $this->getFirstName(),
			$keys[4] => $this->getLastName(),
			$keys[5] => $this->getHearingImpaired(),
			$keys[6] => $this->getPrefCommMethod(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getPhone(),
			$keys[9] => $this->getAddress(),
			$keys[10] => $this->getScreenName(),
			$keys[11] => $this->getMiddleInitial(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUid($value);
				break;
			case 2:
				$this->setUsername($value);
				break;
			case 3:
				$this->setFirstName($value);
				break;
			case 4:
				$this->setLastName($value);
				break;
			case 5:
				$this->setHearingImpaired($value);
				break;
			case 6:
				$this->setPrefCommMethod($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setPhone($value);
				break;
			case 9:
				$this->setAddress($value);
				break;
			case 10:
				$this->setScreenName($value);
				break;
			case 11:
				$this->setMiddleInitial($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsersPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUsername($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFirstName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLastName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHearingImpaired($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPrefCommMethod($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPhone($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAddress($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setScreenName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMiddleInitial($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UsersPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsersPeer::ID)) $criteria->add(UsersPeer::ID, $this->id);
		if ($this->isColumnModified(UsersPeer::UID)) $criteria->add(UsersPeer::UID, $this->uid);
		if ($this->isColumnModified(UsersPeer::USERNAME)) $criteria->add(UsersPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UsersPeer::FIRST_NAME)) $criteria->add(UsersPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(UsersPeer::LAST_NAME)) $criteria->add(UsersPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(UsersPeer::HEARING_IMPAIRED)) $criteria->add(UsersPeer::HEARING_IMPAIRED, $this->hearing_impaired);
		if ($this->isColumnModified(UsersPeer::PREF_COMM_METHOD)) $criteria->add(UsersPeer::PREF_COMM_METHOD, $this->pref_comm_method);
		if ($this->isColumnModified(UsersPeer::EMAIL)) $criteria->add(UsersPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UsersPeer::PHONE)) $criteria->add(UsersPeer::PHONE, $this->phone);
		if ($this->isColumnModified(UsersPeer::ADDRESS)) $criteria->add(UsersPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(UsersPeer::SCREEN_NAME)) $criteria->add(UsersPeer::SCREEN_NAME, $this->screen_name);
		if ($this->isColumnModified(UsersPeer::MIDDLE_INITIAL)) $criteria->add(UsersPeer::MIDDLE_INITIAL, $this->middle_initial);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsersPeer::DATABASE_NAME);
		$criteria->add(UsersPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Users (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUid($this->getUid());
		$copyObj->setUsername($this->getUsername());
		$copyObj->setFirstName($this->getFirstName());
		$copyObj->setLastName($this->getLastName());
		$copyObj->setHearingImpaired($this->getHearingImpaired());
		$copyObj->setPrefCommMethod($this->getPrefCommMethod());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setPhone($this->getPhone());
		$copyObj->setAddress($this->getAddress());
		$copyObj->setScreenName($this->getScreenName());
		$copyObj->setMiddleInitial($this->getMiddleInitial());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Users Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     UsersPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->uid = null;
		$this->username = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->hearing_impaired = null;
		$this->pref_comm_method = null;
		$this->email = null;
		$this->phone = null;
		$this->address = null;
		$this->screen_name = null;
		$this->middle_initial = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UsersPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseUsers

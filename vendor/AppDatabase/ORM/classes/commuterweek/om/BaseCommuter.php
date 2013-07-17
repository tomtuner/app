<?php

namespace CommuterWeekORM\om;

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
use CommuterWeekORM\CommuterPeer;
use CommuterWeekORM\CommuterQuery;
use CommuterWeekORM\DwellingChoice;
use CommuterWeekORM\DwellingChoiceQuery;
use CommuterWeekORM\RitCollege;
use CommuterWeekORM\RitCollegeQuery;
use CommuterWeekORM\RoommateType;
use CommuterWeekORM\RoommateTypeQuery;

/**
 * Base class that represents a row from the 'commuter' table.
 *
 * 
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseCommuter extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CommuterWeekORM\\CommuterPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CommuterPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the commuter_id field.
	 * @var        int
	 */
	protected $commuter_id;

	/**
	 * The value for the first_name field.
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the last_name field.
	 * @var        string
	 */
	protected $last_name;

	/**
	 * The value for the local_address_one field.
	 * @var        string
	 */
	protected $local_address_one;

	/**
	 * The value for the local_address_two field.
	 * @var        string
	 */
	protected $local_address_two;

	/**
	 * The value for the city_name field.
	 * @var        string
	 */
	protected $city_name;

	/**
	 * The value for the state_code field.
	 * @var        string
	 */
	protected $state_code;

	/**
	 * The value for the zip_code field.
	 * @var        int
	 */
	protected $zip_code;

	/**
	 * The value for the graduation_class_year field.
	 * @var        int
	 */
	protected $graduation_class_year;

	/**
	 * The value for the rit_college_id field.
	 * @var        int
	 */
	protected $rit_college_id;

	/**
	 * The value for the apartment_complex_name field.
	 * @var        string
	 */
	protected $apartment_complex_name;

	/**
	 * The value for the dwelling_choice_id field.
	 * @var        int
	 */
	protected $dwelling_choice_id;

	/**
	 * The value for the roommate_type_id field.
	 * @var        int
	 */
	protected $roommate_type_id;

	/**
	 * The value for the email_address field.
	 * @var        string
	 */
	protected $email_address;

	/**
	 * @var        RoommateType
	 */
	protected $aRoommateType;

	/**
	 * @var        RitCollege
	 */
	protected $aRitCollege;

	/**
	 * @var        DwellingChoice
	 */
	protected $aDwellingChoice;

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
	 * Get the [commuter_id] column value.
	 * 
	 * @return     int
	 */
	public function getCommuterId()
	{
		return $this->commuter_id;
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
	 * Get the [local_address_one] column value.
	 * 
	 * @return     string
	 */
	public function getLocalAddressOne()
	{
		return $this->local_address_one;
	}

	/**
	 * Get the [local_address_two] column value.
	 * 
	 * @return     string
	 */
	public function getLocalAddressTwo()
	{
		return $this->local_address_two;
	}

	/**
	 * Get the [city_name] column value.
	 * 
	 * @return     string
	 */
	public function getCityName()
	{
		return $this->city_name;
	}

	/**
	 * Get the [state_code] column value.
	 * 
	 * @return     string
	 */
	public function getStateCode()
	{
		return $this->state_code;
	}

	/**
	 * Get the [zip_code] column value.
	 * 
	 * @return     int
	 */
	public function getZipCode()
	{
		return $this->zip_code;
	}

	/**
	 * Get the [graduation_class_year] column value.
	 * 
	 * @return     int
	 */
	public function getGraduationClassYear()
	{
		return $this->graduation_class_year;
	}

	/**
	 * Get the [rit_college_id] column value.
	 * 
	 * @return     int
	 */
	public function getRitCollegeId()
	{
		return $this->rit_college_id;
	}

	/**
	 * Get the [apartment_complex_name] column value.
	 * 
	 * @return     string
	 */
	public function getApartmentComplexName()
	{
		return $this->apartment_complex_name;
	}

	/**
	 * Get the [dwelling_choice_id] column value.
	 * 
	 * @return     int
	 */
	public function getDwellingChoiceId()
	{
		return $this->dwelling_choice_id;
	}

	/**
	 * Get the [roommate_type_id] column value.
	 * 
	 * @return     int
	 */
	public function getRoommateTypeId()
	{
		return $this->roommate_type_id;
	}

	/**
	 * Get the [email_address] column value.
	 * 
	 * @return     string
	 */
	public function getEmailAddress()
	{
		return $this->email_address;
	}

	/**
	 * Set the value of [commuter_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setCommuterId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->commuter_id !== $v) {
			$this->commuter_id = $v;
			$this->modifiedColumns[] = CommuterPeer::COMMUTER_ID;
		}

		return $this;
	} // setCommuterId()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = CommuterPeer::FIRST_NAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = CommuterPeer::LAST_NAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Set the value of [local_address_one] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setLocalAddressOne($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->local_address_one !== $v) {
			$this->local_address_one = $v;
			$this->modifiedColumns[] = CommuterPeer::LOCAL_ADDRESS_ONE;
		}

		return $this;
	} // setLocalAddressOne()

	/**
	 * Set the value of [local_address_two] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setLocalAddressTwo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->local_address_two !== $v) {
			$this->local_address_two = $v;
			$this->modifiedColumns[] = CommuterPeer::LOCAL_ADDRESS_TWO;
		}

		return $this;
	} // setLocalAddressTwo()

	/**
	 * Set the value of [city_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setCityName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->city_name !== $v) {
			$this->city_name = $v;
			$this->modifiedColumns[] = CommuterPeer::CITY_NAME;
		}

		return $this;
	} // setCityName()

	/**
	 * Set the value of [state_code] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setStateCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->state_code !== $v) {
			$this->state_code = $v;
			$this->modifiedColumns[] = CommuterPeer::STATE_CODE;
		}

		return $this;
	} // setStateCode()

	/**
	 * Set the value of [zip_code] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setZipCode($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->zip_code !== $v) {
			$this->zip_code = $v;
			$this->modifiedColumns[] = CommuterPeer::ZIP_CODE;
		}

		return $this;
	} // setZipCode()

	/**
	 * Set the value of [graduation_class_year] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setGraduationClassYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->graduation_class_year !== $v) {
			$this->graduation_class_year = $v;
			$this->modifiedColumns[] = CommuterPeer::GRADUATION_CLASS_YEAR;
		}

		return $this;
	} // setGraduationClassYear()

	/**
	 * Set the value of [rit_college_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setRitCollegeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rit_college_id !== $v) {
			$this->rit_college_id = $v;
			$this->modifiedColumns[] = CommuterPeer::RIT_COLLEGE_ID;
		}

		if ($this->aRitCollege !== null && $this->aRitCollege->getRitCollegeId() !== $v) {
			$this->aRitCollege = null;
		}

		return $this;
	} // setRitCollegeId()

	/**
	 * Set the value of [apartment_complex_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setApartmentComplexName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apartment_complex_name !== $v) {
			$this->apartment_complex_name = $v;
			$this->modifiedColumns[] = CommuterPeer::APARTMENT_COMPLEX_NAME;
		}

		return $this;
	} // setApartmentComplexName()

	/**
	 * Set the value of [dwelling_choice_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setDwellingChoiceId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dwelling_choice_id !== $v) {
			$this->dwelling_choice_id = $v;
			$this->modifiedColumns[] = CommuterPeer::DWELLING_CHOICE_ID;
		}

		if ($this->aDwellingChoice !== null && $this->aDwellingChoice->getDwellingChoiceId() !== $v) {
			$this->aDwellingChoice = null;
		}

		return $this;
	} // setDwellingChoiceId()

	/**
	 * Set the value of [roommate_type_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setRoommateTypeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->roommate_type_id !== $v) {
			$this->roommate_type_id = $v;
			$this->modifiedColumns[] = CommuterPeer::ROOMMATE_TYPE_ID;
		}

		if ($this->aRoommateType !== null && $this->aRoommateType->getRoommateTypeId() !== $v) {
			$this->aRoommateType = null;
		}

		return $this;
	} // setRoommateTypeId()

	/**
	 * Set the value of [email_address] column.
	 * 
	 * @param      string $v new value
	 * @return     Commuter The current object (for fluent API support)
	 */
	public function setEmailAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_address !== $v) {
			$this->email_address = $v;
			$this->modifiedColumns[] = CommuterPeer::EMAIL_ADDRESS;
		}

		return $this;
	} // setEmailAddress()

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

			$this->commuter_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->first_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->last_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->local_address_one = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->local_address_two = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->city_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->state_code = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->zip_code = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->graduation_class_year = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->rit_college_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->apartment_complex_name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->dwelling_choice_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->roommate_type_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->email_address = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 14; // 14 = CommuterPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Commuter object", $e);
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

		if ($this->aRitCollege !== null && $this->rit_college_id !== $this->aRitCollege->getRitCollegeId()) {
			$this->aRitCollege = null;
		}
		if ($this->aDwellingChoice !== null && $this->dwelling_choice_id !== $this->aDwellingChoice->getDwellingChoiceId()) {
			$this->aDwellingChoice = null;
		}
		if ($this->aRoommateType !== null && $this->roommate_type_id !== $this->aRoommateType->getRoommateTypeId()) {
			$this->aRoommateType = null;
		}
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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CommuterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aRoommateType = null;
			$this->aRitCollege = null;
			$this->aDwellingChoice = null;
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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CommuterQuery::create()
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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CommuterPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aRoommateType !== null) {
				if ($this->aRoommateType->isModified() || $this->aRoommateType->isNew()) {
					$affectedRows += $this->aRoommateType->save($con);
				}
				$this->setRoommateType($this->aRoommateType);
			}

			if ($this->aRitCollege !== null) {
				if ($this->aRitCollege->isModified() || $this->aRitCollege->isNew()) {
					$affectedRows += $this->aRitCollege->save($con);
				}
				$this->setRitCollege($this->aRitCollege);
			}

			if ($this->aDwellingChoice !== null) {
				if ($this->aDwellingChoice->isModified() || $this->aDwellingChoice->isNew()) {
					$affectedRows += $this->aDwellingChoice->save($con);
				}
				$this->setDwellingChoice($this->aDwellingChoice);
			}

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

		$this->modifiedColumns[] = CommuterPeer::COMMUTER_ID;
		if (null !== $this->commuter_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CommuterPeer::COMMUTER_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CommuterPeer::COMMUTER_ID)) {
			$modifiedColumns[':p' . $index++]  = '`COMMUTER_ID`';
		}
		if ($this->isColumnModified(CommuterPeer::FIRST_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`FIRST_NAME`';
		}
		if ($this->isColumnModified(CommuterPeer::LAST_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`LAST_NAME`';
		}
		if ($this->isColumnModified(CommuterPeer::LOCAL_ADDRESS_ONE)) {
			$modifiedColumns[':p' . $index++]  = '`LOCAL_ADDRESS_ONE`';
		}
		if ($this->isColumnModified(CommuterPeer::LOCAL_ADDRESS_TWO)) {
			$modifiedColumns[':p' . $index++]  = '`LOCAL_ADDRESS_TWO`';
		}
		if ($this->isColumnModified(CommuterPeer::CITY_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`CITY_NAME`';
		}
		if ($this->isColumnModified(CommuterPeer::STATE_CODE)) {
			$modifiedColumns[':p' . $index++]  = '`STATE_CODE`';
		}
		if ($this->isColumnModified(CommuterPeer::ZIP_CODE)) {
			$modifiedColumns[':p' . $index++]  = '`ZIP_CODE`';
		}
		if ($this->isColumnModified(CommuterPeer::GRADUATION_CLASS_YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`GRADUATION_CLASS_YEAR`';
		}
		if ($this->isColumnModified(CommuterPeer::RIT_COLLEGE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`RIT_COLLEGE_ID`';
		}
		if ($this->isColumnModified(CommuterPeer::APARTMENT_COMPLEX_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`APARTMENT_COMPLEX_NAME`';
		}
		if ($this->isColumnModified(CommuterPeer::DWELLING_CHOICE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`DWELLING_CHOICE_ID`';
		}
		if ($this->isColumnModified(CommuterPeer::ROOMMATE_TYPE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ROOMMATE_TYPE_ID`';
		}
		if ($this->isColumnModified(CommuterPeer::EMAIL_ADDRESS)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL_ADDRESS`';
		}

		$sql = sprintf(
			'INSERT INTO `commuter` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`COMMUTER_ID`':
						$stmt->bindValue($identifier, $this->commuter_id, PDO::PARAM_INT);
						break;
					case '`FIRST_NAME`':
						$stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
						break;
					case '`LAST_NAME`':
						$stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
						break;
					case '`LOCAL_ADDRESS_ONE`':
						$stmt->bindValue($identifier, $this->local_address_one, PDO::PARAM_STR);
						break;
					case '`LOCAL_ADDRESS_TWO`':
						$stmt->bindValue($identifier, $this->local_address_two, PDO::PARAM_STR);
						break;
					case '`CITY_NAME`':
						$stmt->bindValue($identifier, $this->city_name, PDO::PARAM_STR);
						break;
					case '`STATE_CODE`':
						$stmt->bindValue($identifier, $this->state_code, PDO::PARAM_STR);
						break;
					case '`ZIP_CODE`':
						$stmt->bindValue($identifier, $this->zip_code, PDO::PARAM_INT);
						break;
					case '`GRADUATION_CLASS_YEAR`':
						$stmt->bindValue($identifier, $this->graduation_class_year, PDO::PARAM_INT);
						break;
					case '`RIT_COLLEGE_ID`':
						$stmt->bindValue($identifier, $this->rit_college_id, PDO::PARAM_INT);
						break;
					case '`APARTMENT_COMPLEX_NAME`':
						$stmt->bindValue($identifier, $this->apartment_complex_name, PDO::PARAM_STR);
						break;
					case '`DWELLING_CHOICE_ID`':
						$stmt->bindValue($identifier, $this->dwelling_choice_id, PDO::PARAM_INT);
						break;
					case '`ROOMMATE_TYPE_ID`':
						$stmt->bindValue($identifier, $this->roommate_type_id, PDO::PARAM_INT);
						break;
					case '`EMAIL_ADDRESS`':
						$stmt->bindValue($identifier, $this->email_address, PDO::PARAM_STR);
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
		$this->setCommuterId($pk);

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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aRoommateType !== null) {
				if (!$this->aRoommateType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRoommateType->getValidationFailures());
				}
			}

			if ($this->aRitCollege !== null) {
				if (!$this->aRitCollege->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRitCollege->getValidationFailures());
				}
			}

			if ($this->aDwellingChoice !== null) {
				if (!$this->aDwellingChoice->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDwellingChoice->getValidationFailures());
				}
			}


			if (($retval = CommuterPeer::doValidate($this, $columns)) !== true) {
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
		$pos = CommuterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCommuterId();
				break;
			case 1:
				return $this->getFirstName();
				break;
			case 2:
				return $this->getLastName();
				break;
			case 3:
				return $this->getLocalAddressOne();
				break;
			case 4:
				return $this->getLocalAddressTwo();
				break;
			case 5:
				return $this->getCityName();
				break;
			case 6:
				return $this->getStateCode();
				break;
			case 7:
				return $this->getZipCode();
				break;
			case 8:
				return $this->getGraduationClassYear();
				break;
			case 9:
				return $this->getRitCollegeId();
				break;
			case 10:
				return $this->getApartmentComplexName();
				break;
			case 11:
				return $this->getDwellingChoiceId();
				break;
			case 12:
				return $this->getRoommateTypeId();
				break;
			case 13:
				return $this->getEmailAddress();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Commuter'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Commuter'][$this->getPrimaryKey()] = true;
		$keys = CommuterPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCommuterId(),
			$keys[1] => $this->getFirstName(),
			$keys[2] => $this->getLastName(),
			$keys[3] => $this->getLocalAddressOne(),
			$keys[4] => $this->getLocalAddressTwo(),
			$keys[5] => $this->getCityName(),
			$keys[6] => $this->getStateCode(),
			$keys[7] => $this->getZipCode(),
			$keys[8] => $this->getGraduationClassYear(),
			$keys[9] => $this->getRitCollegeId(),
			$keys[10] => $this->getApartmentComplexName(),
			$keys[11] => $this->getDwellingChoiceId(),
			$keys[12] => $this->getRoommateTypeId(),
			$keys[13] => $this->getEmailAddress(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aRoommateType) {
				$result['RoommateType'] = $this->aRoommateType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aRitCollege) {
				$result['RitCollege'] = $this->aRitCollege->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aDwellingChoice) {
				$result['DwellingChoice'] = $this->aDwellingChoice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
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
		$pos = CommuterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCommuterId($value);
				break;
			case 1:
				$this->setFirstName($value);
				break;
			case 2:
				$this->setLastName($value);
				break;
			case 3:
				$this->setLocalAddressOne($value);
				break;
			case 4:
				$this->setLocalAddressTwo($value);
				break;
			case 5:
				$this->setCityName($value);
				break;
			case 6:
				$this->setStateCode($value);
				break;
			case 7:
				$this->setZipCode($value);
				break;
			case 8:
				$this->setGraduationClassYear($value);
				break;
			case 9:
				$this->setRitCollegeId($value);
				break;
			case 10:
				$this->setApartmentComplexName($value);
				break;
			case 11:
				$this->setDwellingChoiceId($value);
				break;
			case 12:
				$this->setRoommateTypeId($value);
				break;
			case 13:
				$this->setEmailAddress($value);
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
		$keys = CommuterPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCommuterId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFirstName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLastName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLocalAddressOne($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLocalAddressTwo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCityName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStateCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setZipCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGraduationClassYear($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRitCollegeId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setApartmentComplexName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDwellingChoiceId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRoommateTypeId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEmailAddress($arr[$keys[13]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CommuterPeer::DATABASE_NAME);

		if ($this->isColumnModified(CommuterPeer::COMMUTER_ID)) $criteria->add(CommuterPeer::COMMUTER_ID, $this->commuter_id);
		if ($this->isColumnModified(CommuterPeer::FIRST_NAME)) $criteria->add(CommuterPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(CommuterPeer::LAST_NAME)) $criteria->add(CommuterPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(CommuterPeer::LOCAL_ADDRESS_ONE)) $criteria->add(CommuterPeer::LOCAL_ADDRESS_ONE, $this->local_address_one);
		if ($this->isColumnModified(CommuterPeer::LOCAL_ADDRESS_TWO)) $criteria->add(CommuterPeer::LOCAL_ADDRESS_TWO, $this->local_address_two);
		if ($this->isColumnModified(CommuterPeer::CITY_NAME)) $criteria->add(CommuterPeer::CITY_NAME, $this->city_name);
		if ($this->isColumnModified(CommuterPeer::STATE_CODE)) $criteria->add(CommuterPeer::STATE_CODE, $this->state_code);
		if ($this->isColumnModified(CommuterPeer::ZIP_CODE)) $criteria->add(CommuterPeer::ZIP_CODE, $this->zip_code);
		if ($this->isColumnModified(CommuterPeer::GRADUATION_CLASS_YEAR)) $criteria->add(CommuterPeer::GRADUATION_CLASS_YEAR, $this->graduation_class_year);
		if ($this->isColumnModified(CommuterPeer::RIT_COLLEGE_ID)) $criteria->add(CommuterPeer::RIT_COLLEGE_ID, $this->rit_college_id);
		if ($this->isColumnModified(CommuterPeer::APARTMENT_COMPLEX_NAME)) $criteria->add(CommuterPeer::APARTMENT_COMPLEX_NAME, $this->apartment_complex_name);
		if ($this->isColumnModified(CommuterPeer::DWELLING_CHOICE_ID)) $criteria->add(CommuterPeer::DWELLING_CHOICE_ID, $this->dwelling_choice_id);
		if ($this->isColumnModified(CommuterPeer::ROOMMATE_TYPE_ID)) $criteria->add(CommuterPeer::ROOMMATE_TYPE_ID, $this->roommate_type_id);
		if ($this->isColumnModified(CommuterPeer::EMAIL_ADDRESS)) $criteria->add(CommuterPeer::EMAIL_ADDRESS, $this->email_address);

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
		$criteria = new Criteria(CommuterPeer::DATABASE_NAME);
		$criteria->add(CommuterPeer::COMMUTER_ID, $this->commuter_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getCommuterId();
	}

	/**
	 * Generic method to set the primary key (commuter_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setCommuterId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getCommuterId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Commuter (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setFirstName($this->getFirstName());
		$copyObj->setLastName($this->getLastName());
		$copyObj->setLocalAddressOne($this->getLocalAddressOne());
		$copyObj->setLocalAddressTwo($this->getLocalAddressTwo());
		$copyObj->setCityName($this->getCityName());
		$copyObj->setStateCode($this->getStateCode());
		$copyObj->setZipCode($this->getZipCode());
		$copyObj->setGraduationClassYear($this->getGraduationClassYear());
		$copyObj->setRitCollegeId($this->getRitCollegeId());
		$copyObj->setApartmentComplexName($this->getApartmentComplexName());
		$copyObj->setDwellingChoiceId($this->getDwellingChoiceId());
		$copyObj->setRoommateTypeId($this->getRoommateTypeId());
		$copyObj->setEmailAddress($this->getEmailAddress());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setCommuterId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Commuter Clone of current object.
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
	 * @return     CommuterPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CommuterPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a RoommateType object.
	 *
	 * @param      RoommateType $v
	 * @return     Commuter The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRoommateType(RoommateType $v = null)
	{
		if ($v === null) {
			$this->setRoommateTypeId(NULL);
		} else {
			$this->setRoommateTypeId($v->getRoommateTypeId());
		}

		$this->aRoommateType = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the RoommateType object, it will not be re-added.
		if ($v !== null) {
			$v->addCommuter($this);
		}

		return $this;
	}


	/**
	 * Get the associated RoommateType object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     RoommateType The associated RoommateType object.
	 * @throws     PropelException
	 */
	public function getRoommateType(PropelPDO $con = null)
	{
		if ($this->aRoommateType === null && ($this->roommate_type_id !== null)) {
			$this->aRoommateType = RoommateTypeQuery::create()->findPk($this->roommate_type_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aRoommateType->addCommuters($this);
			 */
		}
		return $this->aRoommateType;
	}

	/**
	 * Declares an association between this object and a RitCollege object.
	 *
	 * @param      RitCollege $v
	 * @return     Commuter The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRitCollege(RitCollege $v = null)
	{
		if ($v === null) {
			$this->setRitCollegeId(NULL);
		} else {
			$this->setRitCollegeId($v->getRitCollegeId());
		}

		$this->aRitCollege = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the RitCollege object, it will not be re-added.
		if ($v !== null) {
			$v->addCommuter($this);
		}

		return $this;
	}


	/**
	 * Get the associated RitCollege object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     RitCollege The associated RitCollege object.
	 * @throws     PropelException
	 */
	public function getRitCollege(PropelPDO $con = null)
	{
		if ($this->aRitCollege === null && ($this->rit_college_id !== null)) {
			$this->aRitCollege = RitCollegeQuery::create()->findPk($this->rit_college_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aRitCollege->addCommuters($this);
			 */
		}
		return $this->aRitCollege;
	}

	/**
	 * Declares an association between this object and a DwellingChoice object.
	 *
	 * @param      DwellingChoice $v
	 * @return     Commuter The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDwellingChoice(DwellingChoice $v = null)
	{
		if ($v === null) {
			$this->setDwellingChoiceId(NULL);
		} else {
			$this->setDwellingChoiceId($v->getDwellingChoiceId());
		}

		$this->aDwellingChoice = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the DwellingChoice object, it will not be re-added.
		if ($v !== null) {
			$v->addCommuter($this);
		}

		return $this;
	}


	/**
	 * Get the associated DwellingChoice object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     DwellingChoice The associated DwellingChoice object.
	 * @throws     PropelException
	 */
	public function getDwellingChoice(PropelPDO $con = null)
	{
		if ($this->aDwellingChoice === null && ($this->dwelling_choice_id !== null)) {
			$this->aDwellingChoice = DwellingChoiceQuery::create()->findPk($this->dwelling_choice_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aDwellingChoice->addCommuters($this);
			 */
		}
		return $this->aDwellingChoice;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->commuter_id = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->local_address_one = null;
		$this->local_address_two = null;
		$this->city_name = null;
		$this->state_code = null;
		$this->zip_code = null;
		$this->graduation_class_year = null;
		$this->rit_college_id = null;
		$this->apartment_complex_name = null;
		$this->dwelling_choice_id = null;
		$this->roommate_type_id = null;
		$this->email_address = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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

		$this->aRoommateType = null;
		$this->aRitCollege = null;
		$this->aDwellingChoice = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CommuterPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCommuter

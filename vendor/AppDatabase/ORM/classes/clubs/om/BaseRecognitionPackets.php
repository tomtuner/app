<?php

namespace ClubsORM\om;

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
use ClubsORM\RecognitionPacketsPeer;
use ClubsORM\RecognitionPacketsQuery;

/**
 * Base class that represents a row from the 'recognition_packets' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseRecognitionPackets extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClubsORM\\RecognitionPacketsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RecognitionPacketsPeer
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
	 * The value for the year field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $year;

	/**
	 * The value for the organization_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $organization_id;

	/**
	 * The value for the advisor_list_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $advisor_list_id;

	/**
	 * The value for the officer_list_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $officer_list_id;

	/**
	 * The value for the member_list_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $member_list_id;

	/**
	 * The value for the club_meeting_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $club_meeting_id;

	/**
	 * The value for the club_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $club_name;

	/**
	 * The value for the acronym field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $acronym;

	/**
	 * The value for the url field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the email field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the advisor_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $advisor_id;

	/**
	 * The value for the advisor_office field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $advisor_office;

	/**
	 * The value for the advisor_department field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $advisor_department;

	/**
	 * The value for the target_membership field.
	 * @var        string
	 */
	protected $target_membership;

	/**
	 * The value for the num_members field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $num_members;

	/**
	 * The value for the fees field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $fees;

	/**
	 * The value for the expected_costs_year field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $expected_costs_year;

	/**
	 * The value for the expected_costs_future field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $expected_costs_future;

	/**
	 * The value for the promo field.
	 * @var        string
	 */
	protected $promo;

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
		$this->year = 0;
		$this->organization_id = 0;
		$this->advisor_list_id = 0;
		$this->officer_list_id = 0;
		$this->member_list_id = 0;
		$this->club_meeting_id = 0;
		$this->club_name = '';
		$this->acronym = '';
		$this->url = '';
		$this->email = '';
		$this->advisor_id = 0;
		$this->advisor_office = '';
		$this->advisor_department = '';
		$this->num_members = 0;
		$this->fees = '';
		$this->expected_costs_year = '';
		$this->expected_costs_future = '';
	}

	/**
	 * Initializes internal state of BaseRecognitionPackets object.
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
	 * Get the [year] column value.
	 * 
	 * @return     int
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Get the [organization_id] column value.
	 * 
	 * @return     int
	 */
	public function getOrganizationId()
	{
		return $this->organization_id;
	}

	/**
	 * Get the [advisor_list_id] column value.
	 * 
	 * @return     int
	 */
	public function getAdvisorListId()
	{
		return $this->advisor_list_id;
	}

	/**
	 * Get the [officer_list_id] column value.
	 * 
	 * @return     int
	 */
	public function getOfficerListId()
	{
		return $this->officer_list_id;
	}

	/**
	 * Get the [member_list_id] column value.
	 * 
	 * @return     int
	 */
	public function getMemberListId()
	{
		return $this->member_list_id;
	}

	/**
	 * Get the [club_meeting_id] column value.
	 * 
	 * @return     int
	 */
	public function getClubMeetingId()
	{
		return $this->club_meeting_id;
	}

	/**
	 * Get the [club_name] column value.
	 * 
	 * @return     string
	 */
	public function getClubName()
	{
		return $this->club_name;
	}

	/**
	 * Get the [acronym] column value.
	 * 
	 * @return     string
	 */
	public function getAcronym()
	{
		return $this->acronym;
	}

	/**
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
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
	 * Get the [advisor_id] column value.
	 * 
	 * @return     int
	 */
	public function getAdvisorId()
	{
		return $this->advisor_id;
	}

	/**
	 * Get the [advisor_office] column value.
	 * 
	 * @return     string
	 */
	public function getAdvisorOffice()
	{
		return $this->advisor_office;
	}

	/**
	 * Get the [advisor_department] column value.
	 * 
	 * @return     string
	 */
	public function getAdvisorDepartment()
	{
		return $this->advisor_department;
	}

	/**
	 * Get the [target_membership] column value.
	 * 
	 * @return     string
	 */
	public function getTargetMembership()
	{
		return $this->target_membership;
	}

	/**
	 * Get the [num_members] column value.
	 * 
	 * @return     int
	 */
	public function getNumMembers()
	{
		return $this->num_members;
	}

	/**
	 * Get the [fees] column value.
	 * 
	 * @return     string
	 */
	public function getFees()
	{
		return $this->fees;
	}

	/**
	 * Get the [expected_costs_year] column value.
	 * 
	 * @return     string
	 */
	public function getExpectedCostsYear()
	{
		return $this->expected_costs_year;
	}

	/**
	 * Get the [expected_costs_future] column value.
	 * 
	 * @return     string
	 */
	public function getExpectedCostsFuture()
	{
		return $this->expected_costs_future;
	}

	/**
	 * Get the [promo] column value.
	 * 
	 * @return     string
	 */
	public function getPromo()
	{
		return $this->promo;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [year] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::YEAR;
		}

		return $this;
	} // setYear()

	/**
	 * Set the value of [organization_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setOrganizationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->organization_id !== $v) {
			$this->organization_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ORGANIZATION_ID;
		}

		return $this;
	} // setOrganizationId()

	/**
	 * Set the value of [advisor_list_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setAdvisorListId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->advisor_list_id !== $v) {
			$this->advisor_list_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ADVISOR_LIST_ID;
		}

		return $this;
	} // setAdvisorListId()

	/**
	 * Set the value of [officer_list_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setOfficerListId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->officer_list_id !== $v) {
			$this->officer_list_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::OFFICER_LIST_ID;
		}

		return $this;
	} // setOfficerListId()

	/**
	 * Set the value of [member_list_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setMemberListId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->member_list_id !== $v) {
			$this->member_list_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::MEMBER_LIST_ID;
		}

		return $this;
	} // setMemberListId()

	/**
	 * Set the value of [club_meeting_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setClubMeetingId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->club_meeting_id !== $v) {
			$this->club_meeting_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::CLUB_MEETING_ID;
		}

		return $this;
	} // setClubMeetingId()

	/**
	 * Set the value of [club_name] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setClubName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->club_name !== $v) {
			$this->club_name = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::CLUB_NAME;
		}

		return $this;
	} // setClubName()

	/**
	 * Set the value of [acronym] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setAcronym($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->acronym !== $v) {
			$this->acronym = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ACRONYM;
		}

		return $this;
	} // setAcronym()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [advisor_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setAdvisorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->advisor_id !== $v) {
			$this->advisor_id = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ADVISOR_ID;
		}

		return $this;
	} // setAdvisorId()

	/**
	 * Set the value of [advisor_office] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setAdvisorOffice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->advisor_office !== $v) {
			$this->advisor_office = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ADVISOR_OFFICE;
		}

		return $this;
	} // setAdvisorOffice()

	/**
	 * Set the value of [advisor_department] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setAdvisorDepartment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->advisor_department !== $v) {
			$this->advisor_department = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::ADVISOR_DEPARTMENT;
		}

		return $this;
	} // setAdvisorDepartment()

	/**
	 * Set the value of [target_membership] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setTargetMembership($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target_membership !== $v) {
			$this->target_membership = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::TARGET_MEMBERSHIP;
		}

		return $this;
	} // setTargetMembership()

	/**
	 * Set the value of [num_members] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setNumMembers($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_members !== $v) {
			$this->num_members = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::NUM_MEMBERS;
		}

		return $this;
	} // setNumMembers()

	/**
	 * Set the value of [fees] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setFees($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fees !== $v) {
			$this->fees = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::FEES;
		}

		return $this;
	} // setFees()

	/**
	 * Set the value of [expected_costs_year] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setExpectedCostsYear($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->expected_costs_year !== $v) {
			$this->expected_costs_year = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::EXPECTED_COSTS_YEAR;
		}

		return $this;
	} // setExpectedCostsYear()

	/**
	 * Set the value of [expected_costs_future] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setExpectedCostsFuture($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->expected_costs_future !== $v) {
			$this->expected_costs_future = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE;
		}

		return $this;
	} // setExpectedCostsFuture()

	/**
	 * Set the value of [promo] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionPackets The current object (for fluent API support)
	 */
	public function setPromo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->promo !== $v) {
			$this->promo = $v;
			$this->modifiedColumns[] = RecognitionPacketsPeer::PROMO;
		}

		return $this;
	} // setPromo()

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
			if ($this->year !== 0) {
				return false;
			}

			if ($this->organization_id !== 0) {
				return false;
			}

			if ($this->advisor_list_id !== 0) {
				return false;
			}

			if ($this->officer_list_id !== 0) {
				return false;
			}

			if ($this->member_list_id !== 0) {
				return false;
			}

			if ($this->club_meeting_id !== 0) {
				return false;
			}

			if ($this->club_name !== '') {
				return false;
			}

			if ($this->acronym !== '') {
				return false;
			}

			if ($this->url !== '') {
				return false;
			}

			if ($this->email !== '') {
				return false;
			}

			if ($this->advisor_id !== 0) {
				return false;
			}

			if ($this->advisor_office !== '') {
				return false;
			}

			if ($this->advisor_department !== '') {
				return false;
			}

			if ($this->num_members !== 0) {
				return false;
			}

			if ($this->fees !== '') {
				return false;
			}

			if ($this->expected_costs_year !== '') {
				return false;
			}

			if ($this->expected_costs_future !== '') {
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
			$this->year = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->organization_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->advisor_list_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->officer_list_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->member_list_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->club_meeting_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->club_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->acronym = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->url = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->email = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->advisor_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->advisor_office = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->advisor_department = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->target_membership = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->num_members = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->fees = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->expected_costs_year = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->expected_costs_future = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->promo = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 20; // 20 = RecognitionPacketsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating RecognitionPackets object", $e);
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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RecognitionPacketsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RecognitionPacketsQuery::create()
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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RecognitionPacketsPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = RecognitionPacketsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RecognitionPacketsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RecognitionPacketsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`YEAR`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ORGANIZATION_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_LIST_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_LIST_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::OFFICER_LIST_ID)) {
			$modifiedColumns[':p' . $index++]  = '`OFFICER_LIST_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::MEMBER_LIST_ID)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBER_LIST_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::CLUB_MEETING_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLUB_MEETING_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::CLUB_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUB_NAME`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ACRONYM)) {
			$modifiedColumns[':p' . $index++]  = '`ACRONYM`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::URL)) {
			$modifiedColumns[':p' . $index++]  = '`URL`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_ID`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_OFFICE)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_OFFICE`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_DEPARTMENT)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_DEPARTMENT`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::TARGET_MEMBERSHIP)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_MEMBERSHIP`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::NUM_MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_MEMBERS`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::FEES)) {
			$modifiedColumns[':p' . $index++]  = '`FEES`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::EXPECTED_COSTS_YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`EXPECTED_COSTS_YEAR`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE)) {
			$modifiedColumns[':p' . $index++]  = '`EXPECTED_COSTS_FUTURE`';
		}
		if ($this->isColumnModified(RecognitionPacketsPeer::PROMO)) {
			$modifiedColumns[':p' . $index++]  = '`PROMO`';
		}

		$sql = sprintf(
			'INSERT INTO `recognition_packets` (%s) VALUES (%s)',
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
					case '`YEAR`':
						$stmt->bindValue($identifier, $this->year, PDO::PARAM_INT);
						break;
					case '`ORGANIZATION_ID`':
						$stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
						break;
					case '`ADVISOR_LIST_ID`':
						$stmt->bindValue($identifier, $this->advisor_list_id, PDO::PARAM_INT);
						break;
					case '`OFFICER_LIST_ID`':
						$stmt->bindValue($identifier, $this->officer_list_id, PDO::PARAM_INT);
						break;
					case '`MEMBER_LIST_ID`':
						$stmt->bindValue($identifier, $this->member_list_id, PDO::PARAM_INT);
						break;
					case '`CLUB_MEETING_ID`':
						$stmt->bindValue($identifier, $this->club_meeting_id, PDO::PARAM_INT);
						break;
					case '`CLUB_NAME`':
						$stmt->bindValue($identifier, $this->club_name, PDO::PARAM_STR);
						break;
					case '`ACRONYM`':
						$stmt->bindValue($identifier, $this->acronym, PDO::PARAM_STR);
						break;
					case '`URL`':
						$stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`ADVISOR_ID`':
						$stmt->bindValue($identifier, $this->advisor_id, PDO::PARAM_INT);
						break;
					case '`ADVISOR_OFFICE`':
						$stmt->bindValue($identifier, $this->advisor_office, PDO::PARAM_STR);
						break;
					case '`ADVISOR_DEPARTMENT`':
						$stmt->bindValue($identifier, $this->advisor_department, PDO::PARAM_STR);
						break;
					case '`TARGET_MEMBERSHIP`':
						$stmt->bindValue($identifier, $this->target_membership, PDO::PARAM_STR);
						break;
					case '`NUM_MEMBERS`':
						$stmt->bindValue($identifier, $this->num_members, PDO::PARAM_INT);
						break;
					case '`FEES`':
						$stmt->bindValue($identifier, $this->fees, PDO::PARAM_STR);
						break;
					case '`EXPECTED_COSTS_YEAR`':
						$stmt->bindValue($identifier, $this->expected_costs_year, PDO::PARAM_STR);
						break;
					case '`EXPECTED_COSTS_FUTURE`':
						$stmt->bindValue($identifier, $this->expected_costs_future, PDO::PARAM_STR);
						break;
					case '`PROMO`':
						$stmt->bindValue($identifier, $this->promo, PDO::PARAM_STR);
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


			if (($retval = RecognitionPacketsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = RecognitionPacketsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getYear();
				break;
			case 2:
				return $this->getOrganizationId();
				break;
			case 3:
				return $this->getAdvisorListId();
				break;
			case 4:
				return $this->getOfficerListId();
				break;
			case 5:
				return $this->getMemberListId();
				break;
			case 6:
				return $this->getClubMeetingId();
				break;
			case 7:
				return $this->getClubName();
				break;
			case 8:
				return $this->getAcronym();
				break;
			case 9:
				return $this->getUrl();
				break;
			case 10:
				return $this->getEmail();
				break;
			case 11:
				return $this->getAdvisorId();
				break;
			case 12:
				return $this->getAdvisorOffice();
				break;
			case 13:
				return $this->getAdvisorDepartment();
				break;
			case 14:
				return $this->getTargetMembership();
				break;
			case 15:
				return $this->getNumMembers();
				break;
			case 16:
				return $this->getFees();
				break;
			case 17:
				return $this->getExpectedCostsYear();
				break;
			case 18:
				return $this->getExpectedCostsFuture();
				break;
			case 19:
				return $this->getPromo();
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
		if (isset($alreadyDumpedObjects['RecognitionPackets'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['RecognitionPackets'][$this->getPrimaryKey()] = true;
		$keys = RecognitionPacketsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getYear(),
			$keys[2] => $this->getOrganizationId(),
			$keys[3] => $this->getAdvisorListId(),
			$keys[4] => $this->getOfficerListId(),
			$keys[5] => $this->getMemberListId(),
			$keys[6] => $this->getClubMeetingId(),
			$keys[7] => $this->getClubName(),
			$keys[8] => $this->getAcronym(),
			$keys[9] => $this->getUrl(),
			$keys[10] => $this->getEmail(),
			$keys[11] => $this->getAdvisorId(),
			$keys[12] => $this->getAdvisorOffice(),
			$keys[13] => $this->getAdvisorDepartment(),
			$keys[14] => $this->getTargetMembership(),
			$keys[15] => $this->getNumMembers(),
			$keys[16] => $this->getFees(),
			$keys[17] => $this->getExpectedCostsYear(),
			$keys[18] => $this->getExpectedCostsFuture(),
			$keys[19] => $this->getPromo(),
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
		$pos = RecognitionPacketsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setYear($value);
				break;
			case 2:
				$this->setOrganizationId($value);
				break;
			case 3:
				$this->setAdvisorListId($value);
				break;
			case 4:
				$this->setOfficerListId($value);
				break;
			case 5:
				$this->setMemberListId($value);
				break;
			case 6:
				$this->setClubMeetingId($value);
				break;
			case 7:
				$this->setClubName($value);
				break;
			case 8:
				$this->setAcronym($value);
				break;
			case 9:
				$this->setUrl($value);
				break;
			case 10:
				$this->setEmail($value);
				break;
			case 11:
				$this->setAdvisorId($value);
				break;
			case 12:
				$this->setAdvisorOffice($value);
				break;
			case 13:
				$this->setAdvisorDepartment($value);
				break;
			case 14:
				$this->setTargetMembership($value);
				break;
			case 15:
				$this->setNumMembers($value);
				break;
			case 16:
				$this->setFees($value);
				break;
			case 17:
				$this->setExpectedCostsYear($value);
				break;
			case 18:
				$this->setExpectedCostsFuture($value);
				break;
			case 19:
				$this->setPromo($value);
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
		$keys = RecognitionPacketsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrganizationId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAdvisorListId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOfficerListId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMemberListId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setClubMeetingId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setClubName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAcronym($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUrl($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAdvisorId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAdvisorOffice($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAdvisorDepartment($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTargetMembership($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumMembers($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFees($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setExpectedCostsYear($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setExpectedCostsFuture($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPromo($arr[$keys[19]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RecognitionPacketsPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecognitionPacketsPeer::ID)) $criteria->add(RecognitionPacketsPeer::ID, $this->id);
		if ($this->isColumnModified(RecognitionPacketsPeer::YEAR)) $criteria->add(RecognitionPacketsPeer::YEAR, $this->year);
		if ($this->isColumnModified(RecognitionPacketsPeer::ORGANIZATION_ID)) $criteria->add(RecognitionPacketsPeer::ORGANIZATION_ID, $this->organization_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_LIST_ID)) $criteria->add(RecognitionPacketsPeer::ADVISOR_LIST_ID, $this->advisor_list_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::OFFICER_LIST_ID)) $criteria->add(RecognitionPacketsPeer::OFFICER_LIST_ID, $this->officer_list_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::MEMBER_LIST_ID)) $criteria->add(RecognitionPacketsPeer::MEMBER_LIST_ID, $this->member_list_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::CLUB_MEETING_ID)) $criteria->add(RecognitionPacketsPeer::CLUB_MEETING_ID, $this->club_meeting_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::CLUB_NAME)) $criteria->add(RecognitionPacketsPeer::CLUB_NAME, $this->club_name);
		if ($this->isColumnModified(RecognitionPacketsPeer::ACRONYM)) $criteria->add(RecognitionPacketsPeer::ACRONYM, $this->acronym);
		if ($this->isColumnModified(RecognitionPacketsPeer::URL)) $criteria->add(RecognitionPacketsPeer::URL, $this->url);
		if ($this->isColumnModified(RecognitionPacketsPeer::EMAIL)) $criteria->add(RecognitionPacketsPeer::EMAIL, $this->email);
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_ID)) $criteria->add(RecognitionPacketsPeer::ADVISOR_ID, $this->advisor_id);
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_OFFICE)) $criteria->add(RecognitionPacketsPeer::ADVISOR_OFFICE, $this->advisor_office);
		if ($this->isColumnModified(RecognitionPacketsPeer::ADVISOR_DEPARTMENT)) $criteria->add(RecognitionPacketsPeer::ADVISOR_DEPARTMENT, $this->advisor_department);
		if ($this->isColumnModified(RecognitionPacketsPeer::TARGET_MEMBERSHIP)) $criteria->add(RecognitionPacketsPeer::TARGET_MEMBERSHIP, $this->target_membership);
		if ($this->isColumnModified(RecognitionPacketsPeer::NUM_MEMBERS)) $criteria->add(RecognitionPacketsPeer::NUM_MEMBERS, $this->num_members);
		if ($this->isColumnModified(RecognitionPacketsPeer::FEES)) $criteria->add(RecognitionPacketsPeer::FEES, $this->fees);
		if ($this->isColumnModified(RecognitionPacketsPeer::EXPECTED_COSTS_YEAR)) $criteria->add(RecognitionPacketsPeer::EXPECTED_COSTS_YEAR, $this->expected_costs_year);
		if ($this->isColumnModified(RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE)) $criteria->add(RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE, $this->expected_costs_future);
		if ($this->isColumnModified(RecognitionPacketsPeer::PROMO)) $criteria->add(RecognitionPacketsPeer::PROMO, $this->promo);

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
		$criteria = new Criteria(RecognitionPacketsPeer::DATABASE_NAME);
		$criteria->add(RecognitionPacketsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RecognitionPackets (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setYear($this->getYear());
		$copyObj->setOrganizationId($this->getOrganizationId());
		$copyObj->setAdvisorListId($this->getAdvisorListId());
		$copyObj->setOfficerListId($this->getOfficerListId());
		$copyObj->setMemberListId($this->getMemberListId());
		$copyObj->setClubMeetingId($this->getClubMeetingId());
		$copyObj->setClubName($this->getClubName());
		$copyObj->setAcronym($this->getAcronym());
		$copyObj->setUrl($this->getUrl());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setAdvisorId($this->getAdvisorId());
		$copyObj->setAdvisorOffice($this->getAdvisorOffice());
		$copyObj->setAdvisorDepartment($this->getAdvisorDepartment());
		$copyObj->setTargetMembership($this->getTargetMembership());
		$copyObj->setNumMembers($this->getNumMembers());
		$copyObj->setFees($this->getFees());
		$copyObj->setExpectedCostsYear($this->getExpectedCostsYear());
		$copyObj->setExpectedCostsFuture($this->getExpectedCostsFuture());
		$copyObj->setPromo($this->getPromo());
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
	 * @return     RecognitionPackets Clone of current object.
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
	 * @return     RecognitionPacketsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RecognitionPacketsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->year = null;
		$this->organization_id = null;
		$this->advisor_list_id = null;
		$this->officer_list_id = null;
		$this->member_list_id = null;
		$this->club_meeting_id = null;
		$this->club_name = null;
		$this->acronym = null;
		$this->url = null;
		$this->email = null;
		$this->advisor_id = null;
		$this->advisor_office = null;
		$this->advisor_department = null;
		$this->target_membership = null;
		$this->num_members = null;
		$this->fees = null;
		$this->expected_costs_year = null;
		$this->expected_costs_future = null;
		$this->promo = null;
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
		return (string) $this->exportTo(RecognitionPacketsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRecognitionPackets

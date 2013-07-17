<?php

namespace ArtRequestORM\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use ArtRequestORM\ArtRequest;
use ArtRequestORM\ArtRequestArtRequestType;
use ArtRequestORM\ArtRequestArtRequestTypeQuery;
use ArtRequestORM\ArtRequestAssignment;
use ArtRequestORM\ArtRequestAssignmentQuery;
use ArtRequestORM\ArtRequestAttachment;
use ArtRequestORM\ArtRequestAttachmentQuery;
use ArtRequestORM\ArtRequestPeer;
use ArtRequestORM\ArtRequestQuery;
use ArtRequestORM\ArtRequestor;
use ArtRequestORM\ArtRequestorQuery;
use ArtRequestORM\BannerArtRequest;
use ArtRequestORM\BannerArtRequestQuery;
use ArtRequestORM\Event;
use ArtRequestORM\EventQuery;
use ArtRequestORM\FlyerArtRequest;
use ArtRequestORM\FlyerArtRequestQuery;

/**
 * Base class that represents a row from the 'art_request' table.
 *
 *
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseArtRequest extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ArtRequestORM\\ArtRequestPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ArtRequestPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the art_request_id field.
     * @var        int
     */
    protected $art_request_id;

    /**
     * The value for the is_started field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_started;

    /**
     * The value for the is_completed field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_completed;

    /**
     * The value for the is_archived field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_archived;

    /**
     * The value for the due_date field.
     * @var        string
     */
    protected $due_date;

    /**
     * The value for the art_requestor_id field.
     * @var        int
     */
    protected $art_requestor_id;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the art_request_description field.
     * @var        string
     */
    protected $art_request_description;

    /**
     * The value for the submission_date field.
     * @var        string
     */
    protected $submission_date;

    /**
     * @var        ArtRequestor
     */
    protected $aArtRequestor;

    /**
     * @var        Event
     */
    protected $aEvent;

    /**
     * @var        PropelObjectCollection|ArtRequestArtRequestType[] Collection to store aggregation of ArtRequestArtRequestType objects.
     */
    protected $collArtRequestArtRequestTypes;
    protected $collArtRequestArtRequestTypesPartial;

    /**
     * @var        PropelObjectCollection|ArtRequestAssignment[] Collection to store aggregation of ArtRequestAssignment objects.
     */
    protected $collArtRequestAssignments;
    protected $collArtRequestAssignmentsPartial;

    /**
     * @var        PropelObjectCollection|ArtRequestAttachment[] Collection to store aggregation of ArtRequestAttachment objects.
     */
    protected $collArtRequestAttachments;
    protected $collArtRequestAttachmentsPartial;

    /**
     * @var        PropelObjectCollection|BannerArtRequest[] Collection to store aggregation of BannerArtRequest objects.
     */
    protected $collBannerArtRequests;
    protected $collBannerArtRequestsPartial;

    /**
     * @var        PropelObjectCollection|FlyerArtRequest[] Collection to store aggregation of FlyerArtRequest objects.
     */
    protected $collFlyerArtRequests;
    protected $collFlyerArtRequestsPartial;

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
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $artRequestArtRequestTypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $artRequestAssignmentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $artRequestAttachmentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bannerArtRequestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $flyerArtRequestsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_started = false;
        $this->is_completed = false;
        $this->is_archived = false;
    }

    /**
     * Initializes internal state of BaseArtRequest object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [art_request_id] column value.
     *
     * @return int
     */
    public function getArtRequestId()
    {
        return $this->art_request_id;
    }

    /**
     * Get the [is_started] column value.
     *
     * @return boolean
     */
    public function getIsStarted()
    {
        return $this->is_started;
    }

    /**
     * Get the [is_completed] column value.
     *
     * @return boolean
     */
    public function getIsCompleted()
    {
        return $this->is_completed;
    }

    /**
     * Get the [is_archived] column value.
     *
     * @return boolean
     */
    public function getIsArchived()
    {
        return $this->is_archived;
    }

    /**
     * Get the [optionally formatted] temporal [due_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDueDate($format = '%x')
    {
        if ($this->due_date === null) {
            return null;
        }

        if ($this->due_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->due_date);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->due_date, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [art_requestor_id] column value.
     *
     * @return int
     */
    public function getArtRequestorId()
    {
        return $this->art_requestor_id;
    }

    /**
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Get the [art_request_description] column value.
     *
     * @return string
     */
    public function getArtRequestDescription()
    {
        return $this->art_request_description;
    }

    /**
     * Get the [optionally formatted] temporal [submission_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSubmissionDate($format = 'Y-m-d H:i:s')
    {
        if ($this->submission_date === null) {
            return null;
        }

        if ($this->submission_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->submission_date);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->submission_date, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Set the value of [art_request_id] column.
     *
     * @param int $v new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setArtRequestId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->art_request_id !== $v) {
            $this->art_request_id = $v;
            $this->modifiedColumns[] = ArtRequestPeer::ART_REQUEST_ID;
        }


        return $this;
    } // setArtRequestId()

    /**
     * Sets the value of the [is_started] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setIsStarted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_started !== $v) {
            $this->is_started = $v;
            $this->modifiedColumns[] = ArtRequestPeer::IS_STARTED;
        }


        return $this;
    } // setIsStarted()

    /**
     * Sets the value of the [is_completed] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setIsCompleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_completed !== $v) {
            $this->is_completed = $v;
            $this->modifiedColumns[] = ArtRequestPeer::IS_COMPLETED;
        }


        return $this;
    } // setIsCompleted()

    /**
     * Sets the value of the [is_archived] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setIsArchived($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_archived !== $v) {
            $this->is_archived = $v;
            $this->modifiedColumns[] = ArtRequestPeer::IS_ARCHIVED;
        }


        return $this;
    } // setIsArchived()

    /**
     * Sets the value of [due_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setDueDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->due_date !== null || $dt !== null) {
            $currentDateAsString = ($this->due_date !== null && $tmpDt = new DateTime($this->due_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->due_date = $newDateAsString;
                $this->modifiedColumns[] = ArtRequestPeer::DUE_DATE;
            }
        } // if either are not null


        return $this;
    } // setDueDate()

    /**
     * Set the value of [art_requestor_id] column.
     *
     * @param int $v new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setArtRequestorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->art_requestor_id !== $v) {
            $this->art_requestor_id = $v;
            $this->modifiedColumns[] = ArtRequestPeer::ART_REQUESTOR_ID;
        }

        if ($this->aArtRequestor !== null && $this->aArtRequestor->getArtRequestorId() !== $v) {
            $this->aArtRequestor = null;
        }


        return $this;
    } // setArtRequestorId()

    /**
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = ArtRequestPeer::EVENT_ID;
        }

        if ($this->aEvent !== null && $this->aEvent->getEventId() !== $v) {
            $this->aEvent = null;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [art_request_description] column.
     *
     * @param string $v new value
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setArtRequestDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->art_request_description !== $v) {
            $this->art_request_description = $v;
            $this->modifiedColumns[] = ArtRequestPeer::ART_REQUEST_DESCRIPTION;
        }


        return $this;
    } // setArtRequestDescription()

    /**
     * Sets the value of [submission_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ArtRequest The current object (for fluent API support)
     */
    public function setSubmissionDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->submission_date !== null || $dt !== null) {
            $currentDateAsString = ($this->submission_date !== null && $tmpDt = new DateTime($this->submission_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->submission_date = $newDateAsString;
                $this->modifiedColumns[] = ArtRequestPeer::SUBMISSION_DATE;
            }
        } // if either are not null


        return $this;
    } // setSubmissionDate()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->is_started !== false) {
                return false;
            }

            if ($this->is_completed !== false) {
                return false;
            }

            if ($this->is_archived !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->art_request_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->is_started = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->is_completed = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->is_archived = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->due_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->art_requestor_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->event_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->art_request_description = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->submission_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = ArtRequestPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ArtRequest object", $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aArtRequestor !== null && $this->art_requestor_id !== $this->aArtRequestor->getArtRequestorId()) {
            $this->aArtRequestor = null;
        }
        if ($this->aEvent !== null && $this->event_id !== $this->aEvent->getEventId()) {
            $this->aEvent = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ArtRequestPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aArtRequestor = null;
            $this->aEvent = null;
            $this->collArtRequestArtRequestTypes = null;

            $this->collArtRequestAssignments = null;

            $this->collArtRequestAttachments = null;

            $this->collBannerArtRequests = null;

            $this->collFlyerArtRequests = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ArtRequestQuery::create()
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ArtRequestPeer::addInstanceToPool($this);
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
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

            if ($this->aArtRequestor !== null) {
                if ($this->aArtRequestor->isModified() || $this->aArtRequestor->isNew()) {
                    $affectedRows += $this->aArtRequestor->save($con);
                }
                $this->setArtRequestor($this->aArtRequestor);
            }

            if ($this->aEvent !== null) {
                if ($this->aEvent->isModified() || $this->aEvent->isNew()) {
                    $affectedRows += $this->aEvent->save($con);
                }
                $this->setEvent($this->aEvent);
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

            if ($this->artRequestArtRequestTypesScheduledForDeletion !== null) {
                if (!$this->artRequestArtRequestTypesScheduledForDeletion->isEmpty()) {
                    ArtRequestArtRequestTypeQuery::create()
                        ->filterByPrimaryKeys($this->artRequestArtRequestTypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->artRequestArtRequestTypesScheduledForDeletion = null;
                }
            }

            if ($this->collArtRequestArtRequestTypes !== null) {
                foreach ($this->collArtRequestArtRequestTypes as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->artRequestAssignmentsScheduledForDeletion !== null) {
                if (!$this->artRequestAssignmentsScheduledForDeletion->isEmpty()) {
                    ArtRequestAssignmentQuery::create()
                        ->filterByPrimaryKeys($this->artRequestAssignmentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->artRequestAssignmentsScheduledForDeletion = null;
                }
            }

            if ($this->collArtRequestAssignments !== null) {
                foreach ($this->collArtRequestAssignments as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->artRequestAttachmentsScheduledForDeletion !== null) {
                if (!$this->artRequestAttachmentsScheduledForDeletion->isEmpty()) {
                    ArtRequestAttachmentQuery::create()
                        ->filterByPrimaryKeys($this->artRequestAttachmentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->artRequestAttachmentsScheduledForDeletion = null;
                }
            }

            if ($this->collArtRequestAttachments !== null) {
                foreach ($this->collArtRequestAttachments as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bannerArtRequestsScheduledForDeletion !== null) {
                if (!$this->bannerArtRequestsScheduledForDeletion->isEmpty()) {
                    BannerArtRequestQuery::create()
                        ->filterByPrimaryKeys($this->bannerArtRequestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bannerArtRequestsScheduledForDeletion = null;
                }
            }

            if ($this->collBannerArtRequests !== null) {
                foreach ($this->collBannerArtRequests as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->flyerArtRequestsScheduledForDeletion !== null) {
                if (!$this->flyerArtRequestsScheduledForDeletion->isEmpty()) {
                    FlyerArtRequestQuery::create()
                        ->filterByPrimaryKeys($this->flyerArtRequestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->flyerArtRequestsScheduledForDeletion = null;
                }
            }

            if ($this->collFlyerArtRequests !== null) {
                foreach ($this->collFlyerArtRequests as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ArtRequestPeer::ART_REQUEST_ID;
        if (null !== $this->art_request_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ArtRequestPeer::ART_REQUEST_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ArtRequestPeer::ART_REQUEST_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ART_REQUEST_ID`';
        }
        if ($this->isColumnModified(ArtRequestPeer::IS_STARTED)) {
            $modifiedColumns[':p' . $index++]  = '`IS_STARTED`';
        }
        if ($this->isColumnModified(ArtRequestPeer::IS_COMPLETED)) {
            $modifiedColumns[':p' . $index++]  = '`IS_COMPLETED`';
        }
        if ($this->isColumnModified(ArtRequestPeer::IS_ARCHIVED)) {
            $modifiedColumns[':p' . $index++]  = '`IS_ARCHIVED`';
        }
        if ($this->isColumnModified(ArtRequestPeer::DUE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`DUE_DATE`';
        }
        if ($this->isColumnModified(ArtRequestPeer::ART_REQUESTOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`ART_REQUESTOR_ID`';
        }
        if ($this->isColumnModified(ArtRequestPeer::EVENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`EVENT_ID`';
        }
        if ($this->isColumnModified(ArtRequestPeer::ART_REQUEST_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`ART_REQUEST_DESCRIPTION`';
        }
        if ($this->isColumnModified(ArtRequestPeer::SUBMISSION_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`SUBMISSION_DATE`';
        }

        $sql = sprintf(
            'INSERT INTO `art_request` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ART_REQUEST_ID`':
                        $stmt->bindValue($identifier, $this->art_request_id, PDO::PARAM_INT);
                        break;
                    case '`IS_STARTED`':
                        $stmt->bindValue($identifier, (int) $this->is_started, PDO::PARAM_INT);
                        break;
                    case '`IS_COMPLETED`':
                        $stmt->bindValue($identifier, (int) $this->is_completed, PDO::PARAM_INT);
                        break;
                    case '`IS_ARCHIVED`':
                        $stmt->bindValue($identifier, (int) $this->is_archived, PDO::PARAM_INT);
                        break;
                    case '`DUE_DATE`':
                        $stmt->bindValue($identifier, $this->due_date, PDO::PARAM_STR);
                        break;
                    case '`ART_REQUESTOR_ID`':
                        $stmt->bindValue($identifier, $this->art_requestor_id, PDO::PARAM_INT);
                        break;
                    case '`EVENT_ID`':
                        $stmt->bindValue($identifier, $this->event_id, PDO::PARAM_INT);
                        break;
                    case '`ART_REQUEST_DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->art_request_description, PDO::PARAM_STR);
                        break;
                    case '`SUBMISSION_DATE`':
                        $stmt->bindValue($identifier, $this->submission_date, PDO::PARAM_STR);
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
        $this->setArtRequestId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
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
     * @return array ValidationFailed[]
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
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
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
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
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

            if ($this->aArtRequestor !== null) {
                if (!$this->aArtRequestor->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aArtRequestor->getValidationFailures());
                }
            }

            if ($this->aEvent !== null) {
                if (!$this->aEvent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEvent->getValidationFailures());
                }
            }


            if (($retval = ArtRequestPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collArtRequestArtRequestTypes !== null) {
                    foreach ($this->collArtRequestArtRequestTypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collArtRequestAssignments !== null) {
                    foreach ($this->collArtRequestAssignments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collArtRequestAttachments !== null) {
                    foreach ($this->collArtRequestAttachments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBannerArtRequests !== null) {
                    foreach ($this->collBannerArtRequests as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFlyerArtRequests !== null) {
                    foreach ($this->collFlyerArtRequests as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ArtRequestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getArtRequestId();
                break;
            case 1:
                return $this->getIsStarted();
                break;
            case 2:
                return $this->getIsCompleted();
                break;
            case 3:
                return $this->getIsArchived();
                break;
            case 4:
                return $this->getDueDate();
                break;
            case 5:
                return $this->getArtRequestorId();
                break;
            case 6:
                return $this->getEventId();
                break;
            case 7:
                return $this->getArtRequestDescription();
                break;
            case 8:
                return $this->getSubmissionDate();
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
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['ArtRequest'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ArtRequest'][$this->getPrimaryKey()] = true;
        $keys = ArtRequestPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getArtRequestId(),
            $keys[1] => $this->getIsStarted(),
            $keys[2] => $this->getIsCompleted(),
            $keys[3] => $this->getIsArchived(),
            $keys[4] => $this->getDueDate(),
            $keys[5] => $this->getArtRequestorId(),
            $keys[6] => $this->getEventId(),
            $keys[7] => $this->getArtRequestDescription(),
            $keys[8] => $this->getSubmissionDate(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aArtRequestor) {
                $result['ArtRequestor'] = $this->aArtRequestor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEvent) {
                $result['Event'] = $this->aEvent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collArtRequestArtRequestTypes) {
                $result['ArtRequestArtRequestTypes'] = $this->collArtRequestArtRequestTypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collArtRequestAssignments) {
                $result['ArtRequestAssignments'] = $this->collArtRequestAssignments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collArtRequestAttachments) {
                $result['ArtRequestAttachments'] = $this->collArtRequestAttachments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBannerArtRequests) {
                $result['BannerArtRequests'] = $this->collBannerArtRequests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFlyerArtRequests) {
                $result['FlyerArtRequests'] = $this->collFlyerArtRequests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ArtRequestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setArtRequestId($value);
                break;
            case 1:
                $this->setIsStarted($value);
                break;
            case 2:
                $this->setIsCompleted($value);
                break;
            case 3:
                $this->setIsArchived($value);
                break;
            case 4:
                $this->setDueDate($value);
                break;
            case 5:
                $this->setArtRequestorId($value);
                break;
            case 6:
                $this->setEventId($value);
                break;
            case 7:
                $this->setArtRequestDescription($value);
                break;
            case 8:
                $this->setSubmissionDate($value);
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
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ArtRequestPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setArtRequestId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIsStarted($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsCompleted($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsArchived($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDueDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setArtRequestorId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEventId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setArtRequestDescription($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSubmissionDate($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ArtRequestPeer::DATABASE_NAME);

        if ($this->isColumnModified(ArtRequestPeer::ART_REQUEST_ID)) $criteria->add(ArtRequestPeer::ART_REQUEST_ID, $this->art_request_id);
        if ($this->isColumnModified(ArtRequestPeer::IS_STARTED)) $criteria->add(ArtRequestPeer::IS_STARTED, $this->is_started);
        if ($this->isColumnModified(ArtRequestPeer::IS_COMPLETED)) $criteria->add(ArtRequestPeer::IS_COMPLETED, $this->is_completed);
        if ($this->isColumnModified(ArtRequestPeer::IS_ARCHIVED)) $criteria->add(ArtRequestPeer::IS_ARCHIVED, $this->is_archived);
        if ($this->isColumnModified(ArtRequestPeer::DUE_DATE)) $criteria->add(ArtRequestPeer::DUE_DATE, $this->due_date);
        if ($this->isColumnModified(ArtRequestPeer::ART_REQUESTOR_ID)) $criteria->add(ArtRequestPeer::ART_REQUESTOR_ID, $this->art_requestor_id);
        if ($this->isColumnModified(ArtRequestPeer::EVENT_ID)) $criteria->add(ArtRequestPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(ArtRequestPeer::ART_REQUEST_DESCRIPTION)) $criteria->add(ArtRequestPeer::ART_REQUEST_DESCRIPTION, $this->art_request_description);
        if ($this->isColumnModified(ArtRequestPeer::SUBMISSION_DATE)) $criteria->add(ArtRequestPeer::SUBMISSION_DATE, $this->submission_date);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ArtRequestPeer::DATABASE_NAME);
        $criteria->add(ArtRequestPeer::ART_REQUEST_ID, $this->art_request_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getArtRequestId();
    }

    /**
     * Generic method to set the primary key (art_request_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setArtRequestId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getArtRequestId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ArtRequest (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIsStarted($this->getIsStarted());
        $copyObj->setIsCompleted($this->getIsCompleted());
        $copyObj->setIsArchived($this->getIsArchived());
        $copyObj->setDueDate($this->getDueDate());
        $copyObj->setArtRequestorId($this->getArtRequestorId());
        $copyObj->setEventId($this->getEventId());
        $copyObj->setArtRequestDescription($this->getArtRequestDescription());
        $copyObj->setSubmissionDate($this->getSubmissionDate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getArtRequestArtRequestTypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addArtRequestArtRequestType($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getArtRequestAssignments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addArtRequestAssignment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getArtRequestAttachments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addArtRequestAttachment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBannerArtRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBannerArtRequest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFlyerArtRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFlyerArtRequest($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setArtRequestId(NULL); // this is a auto-increment column, so set to default value
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ArtRequest Clone of current object.
     * @throws PropelException
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
     * @return ArtRequestPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ArtRequestPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ArtRequestor object.
     *
     * @param             ArtRequestor $v
     * @return ArtRequest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setArtRequestor(ArtRequestor $v = null)
    {
        if ($v === null) {
            $this->setArtRequestorId(NULL);
        } else {
            $this->setArtRequestorId($v->getArtRequestorId());
        }

        $this->aArtRequestor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ArtRequestor object, it will not be re-added.
        if ($v !== null) {
            $v->addArtRequest($this);
        }


        return $this;
    }


    /**
     * Get the associated ArtRequestor object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return ArtRequestor The associated ArtRequestor object.
     * @throws PropelException
     */
    public function getArtRequestor(PropelPDO $con = null)
    {
        if ($this->aArtRequestor === null && ($this->art_requestor_id !== null)) {
            $this->aArtRequestor = ArtRequestorQuery::create()->findPk($this->art_requestor_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aArtRequestor->addArtRequests($this);
             */
        }

        return $this->aArtRequestor;
    }

    /**
     * Declares an association between this object and a Event object.
     *
     * @param             Event $v
     * @return ArtRequest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEvent(Event $v = null)
    {
        if ($v === null) {
            $this->setEventId(NULL);
        } else {
            $this->setEventId($v->getEventId());
        }

        $this->aEvent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Event object, it will not be re-added.
        if ($v !== null) {
            $v->addArtRequest($this);
        }


        return $this;
    }


    /**
     * Get the associated Event object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Event The associated Event object.
     * @throws PropelException
     */
    public function getEvent(PropelPDO $con = null)
    {
        if ($this->aEvent === null && ($this->event_id !== null)) {
            $this->aEvent = EventQuery::create()->findPk($this->event_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEvent->addArtRequests($this);
             */
        }

        return $this->aEvent;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ArtRequestArtRequestType' == $relationName) {
            $this->initArtRequestArtRequestTypes();
        }
        if ('ArtRequestAssignment' == $relationName) {
            $this->initArtRequestAssignments();
        }
        if ('ArtRequestAttachment' == $relationName) {
            $this->initArtRequestAttachments();
        }
        if ('BannerArtRequest' == $relationName) {
            $this->initBannerArtRequests();
        }
        if ('FlyerArtRequest' == $relationName) {
            $this->initFlyerArtRequests();
        }
    }

    /**
     * Clears out the collArtRequestArtRequestTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addArtRequestArtRequestTypes()
     */
    public function clearArtRequestArtRequestTypes()
    {
        $this->collArtRequestArtRequestTypes = null; // important to set this to null since that means it is uninitialized
        $this->collArtRequestArtRequestTypesPartial = null;
    }

    /**
     * reset is the collArtRequestArtRequestTypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialArtRequestArtRequestTypes($v = true)
    {
        $this->collArtRequestArtRequestTypesPartial = $v;
    }

    /**
     * Initializes the collArtRequestArtRequestTypes collection.
     *
     * By default this just sets the collArtRequestArtRequestTypes collection to an empty array (like clearcollArtRequestArtRequestTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initArtRequestArtRequestTypes($overrideExisting = true)
    {
        if (null !== $this->collArtRequestArtRequestTypes && !$overrideExisting) {
            return;
        }
        $this->collArtRequestArtRequestTypes = new PropelObjectCollection();
        $this->collArtRequestArtRequestTypes->setModel('ArtRequestArtRequestType');
    }

    /**
     * Gets an array of ArtRequestArtRequestType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ArtRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ArtRequestArtRequestType[] List of ArtRequestArtRequestType objects
     * @throws PropelException
     */
    public function getArtRequestArtRequestTypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestArtRequestTypesPartial && !$this->isNew();
        if (null === $this->collArtRequestArtRequestTypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collArtRequestArtRequestTypes) {
                // return empty collection
                $this->initArtRequestArtRequestTypes();
            } else {
                $collArtRequestArtRequestTypes = ArtRequestArtRequestTypeQuery::create(null, $criteria)
                    ->filterByArtRequest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collArtRequestArtRequestTypesPartial && count($collArtRequestArtRequestTypes)) {
                      $this->initArtRequestArtRequestTypes(false);

                      foreach($collArtRequestArtRequestTypes as $obj) {
                        if (false == $this->collArtRequestArtRequestTypes->contains($obj)) {
                          $this->collArtRequestArtRequestTypes->append($obj);
                        }
                      }

                      $this->collArtRequestArtRequestTypesPartial = true;
                    }

                    return $collArtRequestArtRequestTypes;
                }

                if($partial && $this->collArtRequestArtRequestTypes) {
                    foreach($this->collArtRequestArtRequestTypes as $obj) {
                        if($obj->isNew()) {
                            $collArtRequestArtRequestTypes[] = $obj;
                        }
                    }
                }

                $this->collArtRequestArtRequestTypes = $collArtRequestArtRequestTypes;
                $this->collArtRequestArtRequestTypesPartial = false;
            }
        }

        return $this->collArtRequestArtRequestTypes;
    }

    /**
     * Sets a collection of ArtRequestArtRequestType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $artRequestArtRequestTypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setArtRequestArtRequestTypes(PropelCollection $artRequestArtRequestTypes, PropelPDO $con = null)
    {
        $this->artRequestArtRequestTypesScheduledForDeletion = $this->getArtRequestArtRequestTypes(new Criteria(), $con)->diff($artRequestArtRequestTypes);

        foreach ($this->artRequestArtRequestTypesScheduledForDeletion as $artRequestArtRequestTypeRemoved) {
            $artRequestArtRequestTypeRemoved->setArtRequest(null);
        }

        $this->collArtRequestArtRequestTypes = null;
        foreach ($artRequestArtRequestTypes as $artRequestArtRequestType) {
            $this->addArtRequestArtRequestType($artRequestArtRequestType);
        }

        $this->collArtRequestArtRequestTypes = $artRequestArtRequestTypes;
        $this->collArtRequestArtRequestTypesPartial = false;
    }

    /**
     * Returns the number of related ArtRequestArtRequestType objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ArtRequestArtRequestType objects.
     * @throws PropelException
     */
    public function countArtRequestArtRequestTypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestArtRequestTypesPartial && !$this->isNew();
        if (null === $this->collArtRequestArtRequestTypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collArtRequestArtRequestTypes) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getArtRequestArtRequestTypes());
                }
                $query = ArtRequestArtRequestTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByArtRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collArtRequestArtRequestTypes);
        }
    }

    /**
     * Method called to associate a ArtRequestArtRequestType object to this object
     * through the ArtRequestArtRequestType foreign key attribute.
     *
     * @param    ArtRequestArtRequestType $l ArtRequestArtRequestType
     * @return ArtRequest The current object (for fluent API support)
     */
    public function addArtRequestArtRequestType(ArtRequestArtRequestType $l)
    {
        if ($this->collArtRequestArtRequestTypes === null) {
            $this->initArtRequestArtRequestTypes();
            $this->collArtRequestArtRequestTypesPartial = true;
        }
        if (!$this->collArtRequestArtRequestTypes->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddArtRequestArtRequestType($l);
        }

        return $this;
    }

    /**
     * @param	ArtRequestArtRequestType $artRequestArtRequestType The artRequestArtRequestType object to add.
     */
    protected function doAddArtRequestArtRequestType($artRequestArtRequestType)
    {
        $this->collArtRequestArtRequestTypes[]= $artRequestArtRequestType;
        $artRequestArtRequestType->setArtRequest($this);
    }

    /**
     * @param	ArtRequestArtRequestType $artRequestArtRequestType The artRequestArtRequestType object to remove.
     */
    public function removeArtRequestArtRequestType($artRequestArtRequestType)
    {
        if ($this->getArtRequestArtRequestTypes()->contains($artRequestArtRequestType)) {
            $this->collArtRequestArtRequestTypes->remove($this->collArtRequestArtRequestTypes->search($artRequestArtRequestType));
            if (null === $this->artRequestArtRequestTypesScheduledForDeletion) {
                $this->artRequestArtRequestTypesScheduledForDeletion = clone $this->collArtRequestArtRequestTypes;
                $this->artRequestArtRequestTypesScheduledForDeletion->clear();
            }
            $this->artRequestArtRequestTypesScheduledForDeletion[]= $artRequestArtRequestType;
            $artRequestArtRequestType->setArtRequest(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ArtRequest is new, it will return
     * an empty collection; or if this ArtRequest has previously
     * been saved, it will retrieve related ArtRequestArtRequestTypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ArtRequest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ArtRequestArtRequestType[] List of ArtRequestArtRequestType objects
     */
    public function getArtRequestArtRequestTypesJoinArtRequestType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ArtRequestArtRequestTypeQuery::create(null, $criteria);
        $query->joinWith('ArtRequestType', $join_behavior);

        return $this->getArtRequestArtRequestTypes($query, $con);
    }

    /**
     * Clears out the collArtRequestAssignments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addArtRequestAssignments()
     */
    public function clearArtRequestAssignments()
    {
        $this->collArtRequestAssignments = null; // important to set this to null since that means it is uninitialized
        $this->collArtRequestAssignmentsPartial = null;
    }

    /**
     * reset is the collArtRequestAssignments collection loaded partially
     *
     * @return void
     */
    public function resetPartialArtRequestAssignments($v = true)
    {
        $this->collArtRequestAssignmentsPartial = $v;
    }

    /**
     * Initializes the collArtRequestAssignments collection.
     *
     * By default this just sets the collArtRequestAssignments collection to an empty array (like clearcollArtRequestAssignments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initArtRequestAssignments($overrideExisting = true)
    {
        if (null !== $this->collArtRequestAssignments && !$overrideExisting) {
            return;
        }
        $this->collArtRequestAssignments = new PropelObjectCollection();
        $this->collArtRequestAssignments->setModel('ArtRequestAssignment');
    }

    /**
     * Gets an array of ArtRequestAssignment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ArtRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ArtRequestAssignment[] List of ArtRequestAssignment objects
     * @throws PropelException
     */
    public function getArtRequestAssignments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestAssignmentsPartial && !$this->isNew();
        if (null === $this->collArtRequestAssignments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collArtRequestAssignments) {
                // return empty collection
                $this->initArtRequestAssignments();
            } else {
                $collArtRequestAssignments = ArtRequestAssignmentQuery::create(null, $criteria)
                    ->filterByArtRequest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collArtRequestAssignmentsPartial && count($collArtRequestAssignments)) {
                      $this->initArtRequestAssignments(false);

                      foreach($collArtRequestAssignments as $obj) {
                        if (false == $this->collArtRequestAssignments->contains($obj)) {
                          $this->collArtRequestAssignments->append($obj);
                        }
                      }

                      $this->collArtRequestAssignmentsPartial = true;
                    }

                    return $collArtRequestAssignments;
                }

                if($partial && $this->collArtRequestAssignments) {
                    foreach($this->collArtRequestAssignments as $obj) {
                        if($obj->isNew()) {
                            $collArtRequestAssignments[] = $obj;
                        }
                    }
                }

                $this->collArtRequestAssignments = $collArtRequestAssignments;
                $this->collArtRequestAssignmentsPartial = false;
            }
        }

        return $this->collArtRequestAssignments;
    }

    /**
     * Sets a collection of ArtRequestAssignment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $artRequestAssignments A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setArtRequestAssignments(PropelCollection $artRequestAssignments, PropelPDO $con = null)
    {
        $this->artRequestAssignmentsScheduledForDeletion = $this->getArtRequestAssignments(new Criteria(), $con)->diff($artRequestAssignments);

        foreach ($this->artRequestAssignmentsScheduledForDeletion as $artRequestAssignmentRemoved) {
            $artRequestAssignmentRemoved->setArtRequest(null);
        }

        $this->collArtRequestAssignments = null;
        foreach ($artRequestAssignments as $artRequestAssignment) {
            $this->addArtRequestAssignment($artRequestAssignment);
        }

        $this->collArtRequestAssignments = $artRequestAssignments;
        $this->collArtRequestAssignmentsPartial = false;
    }

    /**
     * Returns the number of related ArtRequestAssignment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ArtRequestAssignment objects.
     * @throws PropelException
     */
    public function countArtRequestAssignments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestAssignmentsPartial && !$this->isNew();
        if (null === $this->collArtRequestAssignments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collArtRequestAssignments) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getArtRequestAssignments());
                }
                $query = ArtRequestAssignmentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByArtRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collArtRequestAssignments);
        }
    }

    /**
     * Method called to associate a ArtRequestAssignment object to this object
     * through the ArtRequestAssignment foreign key attribute.
     *
     * @param    ArtRequestAssignment $l ArtRequestAssignment
     * @return ArtRequest The current object (for fluent API support)
     */
    public function addArtRequestAssignment(ArtRequestAssignment $l)
    {
        if ($this->collArtRequestAssignments === null) {
            $this->initArtRequestAssignments();
            $this->collArtRequestAssignmentsPartial = true;
        }
        if (!$this->collArtRequestAssignments->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddArtRequestAssignment($l);
        }

        return $this;
    }

    /**
     * @param	ArtRequestAssignment $artRequestAssignment The artRequestAssignment object to add.
     */
    protected function doAddArtRequestAssignment($artRequestAssignment)
    {
        $this->collArtRequestAssignments[]= $artRequestAssignment;
        $artRequestAssignment->setArtRequest($this);
    }

    /**
     * @param	ArtRequestAssignment $artRequestAssignment The artRequestAssignment object to remove.
     */
    public function removeArtRequestAssignment($artRequestAssignment)
    {
        if ($this->getArtRequestAssignments()->contains($artRequestAssignment)) {
            $this->collArtRequestAssignments->remove($this->collArtRequestAssignments->search($artRequestAssignment));
            if (null === $this->artRequestAssignmentsScheduledForDeletion) {
                $this->artRequestAssignmentsScheduledForDeletion = clone $this->collArtRequestAssignments;
                $this->artRequestAssignmentsScheduledForDeletion->clear();
            }
            $this->artRequestAssignmentsScheduledForDeletion[]= $artRequestAssignment;
            $artRequestAssignment->setArtRequest(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ArtRequest is new, it will return
     * an empty collection; or if this ArtRequest has previously
     * been saved, it will retrieve related ArtRequestAssignments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ArtRequest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ArtRequestAssignment[] List of ArtRequestAssignment objects
     */
    public function getArtRequestAssignmentsJoinArtist($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ArtRequestAssignmentQuery::create(null, $criteria);
        $query->joinWith('Artist', $join_behavior);

        return $this->getArtRequestAssignments($query, $con);
    }

    /**
     * Clears out the collArtRequestAttachments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addArtRequestAttachments()
     */
    public function clearArtRequestAttachments()
    {
        $this->collArtRequestAttachments = null; // important to set this to null since that means it is uninitialized
        $this->collArtRequestAttachmentsPartial = null;
    }

    /**
     * reset is the collArtRequestAttachments collection loaded partially
     *
     * @return void
     */
    public function resetPartialArtRequestAttachments($v = true)
    {
        $this->collArtRequestAttachmentsPartial = $v;
    }

    /**
     * Initializes the collArtRequestAttachments collection.
     *
     * By default this just sets the collArtRequestAttachments collection to an empty array (like clearcollArtRequestAttachments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initArtRequestAttachments($overrideExisting = true)
    {
        if (null !== $this->collArtRequestAttachments && !$overrideExisting) {
            return;
        }
        $this->collArtRequestAttachments = new PropelObjectCollection();
        $this->collArtRequestAttachments->setModel('ArtRequestAttachment');
    }

    /**
     * Gets an array of ArtRequestAttachment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ArtRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ArtRequestAttachment[] List of ArtRequestAttachment objects
     * @throws PropelException
     */
    public function getArtRequestAttachments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestAttachmentsPartial && !$this->isNew();
        if (null === $this->collArtRequestAttachments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collArtRequestAttachments) {
                // return empty collection
                $this->initArtRequestAttachments();
            } else {
                $collArtRequestAttachments = ArtRequestAttachmentQuery::create(null, $criteria)
                    ->filterByArtRequest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collArtRequestAttachmentsPartial && count($collArtRequestAttachments)) {
                      $this->initArtRequestAttachments(false);

                      foreach($collArtRequestAttachments as $obj) {
                        if (false == $this->collArtRequestAttachments->contains($obj)) {
                          $this->collArtRequestAttachments->append($obj);
                        }
                      }

                      $this->collArtRequestAttachmentsPartial = true;
                    }

                    return $collArtRequestAttachments;
                }

                if($partial && $this->collArtRequestAttachments) {
                    foreach($this->collArtRequestAttachments as $obj) {
                        if($obj->isNew()) {
                            $collArtRequestAttachments[] = $obj;
                        }
                    }
                }

                $this->collArtRequestAttachments = $collArtRequestAttachments;
                $this->collArtRequestAttachmentsPartial = false;
            }
        }

        return $this->collArtRequestAttachments;
    }

    /**
     * Sets a collection of ArtRequestAttachment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $artRequestAttachments A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setArtRequestAttachments(PropelCollection $artRequestAttachments, PropelPDO $con = null)
    {
        $this->artRequestAttachmentsScheduledForDeletion = $this->getArtRequestAttachments(new Criteria(), $con)->diff($artRequestAttachments);

        foreach ($this->artRequestAttachmentsScheduledForDeletion as $artRequestAttachmentRemoved) {
            $artRequestAttachmentRemoved->setArtRequest(null);
        }

        $this->collArtRequestAttachments = null;
        foreach ($artRequestAttachments as $artRequestAttachment) {
            $this->addArtRequestAttachment($artRequestAttachment);
        }

        $this->collArtRequestAttachments = $artRequestAttachments;
        $this->collArtRequestAttachmentsPartial = false;
    }

    /**
     * Returns the number of related ArtRequestAttachment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ArtRequestAttachment objects.
     * @throws PropelException
     */
    public function countArtRequestAttachments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collArtRequestAttachmentsPartial && !$this->isNew();
        if (null === $this->collArtRequestAttachments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collArtRequestAttachments) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getArtRequestAttachments());
                }
                $query = ArtRequestAttachmentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByArtRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collArtRequestAttachments);
        }
    }

    /**
     * Method called to associate a ArtRequestAttachment object to this object
     * through the ArtRequestAttachment foreign key attribute.
     *
     * @param    ArtRequestAttachment $l ArtRequestAttachment
     * @return ArtRequest The current object (for fluent API support)
     */
    public function addArtRequestAttachment(ArtRequestAttachment $l)
    {
        if ($this->collArtRequestAttachments === null) {
            $this->initArtRequestAttachments();
            $this->collArtRequestAttachmentsPartial = true;
        }
        if (!$this->collArtRequestAttachments->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddArtRequestAttachment($l);
        }

        return $this;
    }

    /**
     * @param	ArtRequestAttachment $artRequestAttachment The artRequestAttachment object to add.
     */
    protected function doAddArtRequestAttachment($artRequestAttachment)
    {
        $this->collArtRequestAttachments[]= $artRequestAttachment;
        $artRequestAttachment->setArtRequest($this);
    }

    /**
     * @param	ArtRequestAttachment $artRequestAttachment The artRequestAttachment object to remove.
     */
    public function removeArtRequestAttachment($artRequestAttachment)
    {
        if ($this->getArtRequestAttachments()->contains($artRequestAttachment)) {
            $this->collArtRequestAttachments->remove($this->collArtRequestAttachments->search($artRequestAttachment));
            if (null === $this->artRequestAttachmentsScheduledForDeletion) {
                $this->artRequestAttachmentsScheduledForDeletion = clone $this->collArtRequestAttachments;
                $this->artRequestAttachmentsScheduledForDeletion->clear();
            }
            $this->artRequestAttachmentsScheduledForDeletion[]= $artRequestAttachment;
            $artRequestAttachment->setArtRequest(null);
        }
    }

    /**
     * Clears out the collBannerArtRequests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addBannerArtRequests()
     */
    public function clearBannerArtRequests()
    {
        $this->collBannerArtRequests = null; // important to set this to null since that means it is uninitialized
        $this->collBannerArtRequestsPartial = null;
    }

    /**
     * reset is the collBannerArtRequests collection loaded partially
     *
     * @return void
     */
    public function resetPartialBannerArtRequests($v = true)
    {
        $this->collBannerArtRequestsPartial = $v;
    }

    /**
     * Initializes the collBannerArtRequests collection.
     *
     * By default this just sets the collBannerArtRequests collection to an empty array (like clearcollBannerArtRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBannerArtRequests($overrideExisting = true)
    {
        if (null !== $this->collBannerArtRequests && !$overrideExisting) {
            return;
        }
        $this->collBannerArtRequests = new PropelObjectCollection();
        $this->collBannerArtRequests->setModel('BannerArtRequest');
    }

    /**
     * Gets an array of BannerArtRequest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ArtRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BannerArtRequest[] List of BannerArtRequest objects
     * @throws PropelException
     */
    public function getBannerArtRequests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBannerArtRequestsPartial && !$this->isNew();
        if (null === $this->collBannerArtRequests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBannerArtRequests) {
                // return empty collection
                $this->initBannerArtRequests();
            } else {
                $collBannerArtRequests = BannerArtRequestQuery::create(null, $criteria)
                    ->filterByArtRequest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBannerArtRequestsPartial && count($collBannerArtRequests)) {
                      $this->initBannerArtRequests(false);

                      foreach($collBannerArtRequests as $obj) {
                        if (false == $this->collBannerArtRequests->contains($obj)) {
                          $this->collBannerArtRequests->append($obj);
                        }
                      }

                      $this->collBannerArtRequestsPartial = true;
                    }

                    return $collBannerArtRequests;
                }

                if($partial && $this->collBannerArtRequests) {
                    foreach($this->collBannerArtRequests as $obj) {
                        if($obj->isNew()) {
                            $collBannerArtRequests[] = $obj;
                        }
                    }
                }

                $this->collBannerArtRequests = $collBannerArtRequests;
                $this->collBannerArtRequestsPartial = false;
            }
        }

        return $this->collBannerArtRequests;
    }

    /**
     * Sets a collection of BannerArtRequest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bannerArtRequests A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setBannerArtRequests(PropelCollection $bannerArtRequests, PropelPDO $con = null)
    {
        $this->bannerArtRequestsScheduledForDeletion = $this->getBannerArtRequests(new Criteria(), $con)->diff($bannerArtRequests);

        foreach ($this->bannerArtRequestsScheduledForDeletion as $bannerArtRequestRemoved) {
            $bannerArtRequestRemoved->setArtRequest(null);
        }

        $this->collBannerArtRequests = null;
        foreach ($bannerArtRequests as $bannerArtRequest) {
            $this->addBannerArtRequest($bannerArtRequest);
        }

        $this->collBannerArtRequests = $bannerArtRequests;
        $this->collBannerArtRequestsPartial = false;
    }

    /**
     * Returns the number of related BannerArtRequest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BannerArtRequest objects.
     * @throws PropelException
     */
    public function countBannerArtRequests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBannerArtRequestsPartial && !$this->isNew();
        if (null === $this->collBannerArtRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBannerArtRequests) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getBannerArtRequests());
                }
                $query = BannerArtRequestQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByArtRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collBannerArtRequests);
        }
    }

    /**
     * Method called to associate a BannerArtRequest object to this object
     * through the BannerArtRequest foreign key attribute.
     *
     * @param    BannerArtRequest $l BannerArtRequest
     * @return ArtRequest The current object (for fluent API support)
     */
    public function addBannerArtRequest(BannerArtRequest $l)
    {
        if ($this->collBannerArtRequests === null) {
            $this->initBannerArtRequests();
            $this->collBannerArtRequestsPartial = true;
        }
        if (!$this->collBannerArtRequests->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddBannerArtRequest($l);
        }

        return $this;
    }

    /**
     * @param	BannerArtRequest $bannerArtRequest The bannerArtRequest object to add.
     */
    protected function doAddBannerArtRequest($bannerArtRequest)
    {
        $this->collBannerArtRequests[]= $bannerArtRequest;
        $bannerArtRequest->setArtRequest($this);
    }

    /**
     * @param	BannerArtRequest $bannerArtRequest The bannerArtRequest object to remove.
     */
    public function removeBannerArtRequest($bannerArtRequest)
    {
        if ($this->getBannerArtRequests()->contains($bannerArtRequest)) {
            $this->collBannerArtRequests->remove($this->collBannerArtRequests->search($bannerArtRequest));
            if (null === $this->bannerArtRequestsScheduledForDeletion) {
                $this->bannerArtRequestsScheduledForDeletion = clone $this->collBannerArtRequests;
                $this->bannerArtRequestsScheduledForDeletion->clear();
            }
            $this->bannerArtRequestsScheduledForDeletion[]= $bannerArtRequest;
            $bannerArtRequest->setArtRequest(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ArtRequest is new, it will return
     * an empty collection; or if this ArtRequest has previously
     * been saved, it will retrieve related BannerArtRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ArtRequest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BannerArtRequest[] List of BannerArtRequest objects
     */
    public function getBannerArtRequestsJoinBannerLocation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BannerArtRequestQuery::create(null, $criteria);
        $query->joinWith('BannerLocation', $join_behavior);

        return $this->getBannerArtRequests($query, $con);
    }

    /**
     * Clears out the collFlyerArtRequests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFlyerArtRequests()
     */
    public function clearFlyerArtRequests()
    {
        $this->collFlyerArtRequests = null; // important to set this to null since that means it is uninitialized
        $this->collFlyerArtRequestsPartial = null;
    }

    /**
     * reset is the collFlyerArtRequests collection loaded partially
     *
     * @return void
     */
    public function resetPartialFlyerArtRequests($v = true)
    {
        $this->collFlyerArtRequestsPartial = $v;
    }

    /**
     * Initializes the collFlyerArtRequests collection.
     *
     * By default this just sets the collFlyerArtRequests collection to an empty array (like clearcollFlyerArtRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFlyerArtRequests($overrideExisting = true)
    {
        if (null !== $this->collFlyerArtRequests && !$overrideExisting) {
            return;
        }
        $this->collFlyerArtRequests = new PropelObjectCollection();
        $this->collFlyerArtRequests->setModel('FlyerArtRequest');
    }

    /**
     * Gets an array of FlyerArtRequest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ArtRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|FlyerArtRequest[] List of FlyerArtRequest objects
     * @throws PropelException
     */
    public function getFlyerArtRequests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFlyerArtRequestsPartial && !$this->isNew();
        if (null === $this->collFlyerArtRequests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFlyerArtRequests) {
                // return empty collection
                $this->initFlyerArtRequests();
            } else {
                $collFlyerArtRequests = FlyerArtRequestQuery::create(null, $criteria)
                    ->filterByArtRequest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFlyerArtRequestsPartial && count($collFlyerArtRequests)) {
                      $this->initFlyerArtRequests(false);

                      foreach($collFlyerArtRequests as $obj) {
                        if (false == $this->collFlyerArtRequests->contains($obj)) {
                          $this->collFlyerArtRequests->append($obj);
                        }
                      }

                      $this->collFlyerArtRequestsPartial = true;
                    }

                    return $collFlyerArtRequests;
                }

                if($partial && $this->collFlyerArtRequests) {
                    foreach($this->collFlyerArtRequests as $obj) {
                        if($obj->isNew()) {
                            $collFlyerArtRequests[] = $obj;
                        }
                    }
                }

                $this->collFlyerArtRequests = $collFlyerArtRequests;
                $this->collFlyerArtRequestsPartial = false;
            }
        }

        return $this->collFlyerArtRequests;
    }

    /**
     * Sets a collection of FlyerArtRequest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $flyerArtRequests A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setFlyerArtRequests(PropelCollection $flyerArtRequests, PropelPDO $con = null)
    {
        $this->flyerArtRequestsScheduledForDeletion = $this->getFlyerArtRequests(new Criteria(), $con)->diff($flyerArtRequests);

        foreach ($this->flyerArtRequestsScheduledForDeletion as $flyerArtRequestRemoved) {
            $flyerArtRequestRemoved->setArtRequest(null);
        }

        $this->collFlyerArtRequests = null;
        foreach ($flyerArtRequests as $flyerArtRequest) {
            $this->addFlyerArtRequest($flyerArtRequest);
        }

        $this->collFlyerArtRequests = $flyerArtRequests;
        $this->collFlyerArtRequestsPartial = false;
    }

    /**
     * Returns the number of related FlyerArtRequest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related FlyerArtRequest objects.
     * @throws PropelException
     */
    public function countFlyerArtRequests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFlyerArtRequestsPartial && !$this->isNew();
        if (null === $this->collFlyerArtRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFlyerArtRequests) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getFlyerArtRequests());
                }
                $query = FlyerArtRequestQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByArtRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collFlyerArtRequests);
        }
    }

    /**
     * Method called to associate a FlyerArtRequest object to this object
     * through the FlyerArtRequest foreign key attribute.
     *
     * @param    FlyerArtRequest $l FlyerArtRequest
     * @return ArtRequest The current object (for fluent API support)
     */
    public function addFlyerArtRequest(FlyerArtRequest $l)
    {
        if ($this->collFlyerArtRequests === null) {
            $this->initFlyerArtRequests();
            $this->collFlyerArtRequestsPartial = true;
        }
        if (!$this->collFlyerArtRequests->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddFlyerArtRequest($l);
        }

        return $this;
    }

    /**
     * @param	FlyerArtRequest $flyerArtRequest The flyerArtRequest object to add.
     */
    protected function doAddFlyerArtRequest($flyerArtRequest)
    {
        $this->collFlyerArtRequests[]= $flyerArtRequest;
        $flyerArtRequest->setArtRequest($this);
    }

    /**
     * @param	FlyerArtRequest $flyerArtRequest The flyerArtRequest object to remove.
     */
    public function removeFlyerArtRequest($flyerArtRequest)
    {
        if ($this->getFlyerArtRequests()->contains($flyerArtRequest)) {
            $this->collFlyerArtRequests->remove($this->collFlyerArtRequests->search($flyerArtRequest));
            if (null === $this->flyerArtRequestsScheduledForDeletion) {
                $this->flyerArtRequestsScheduledForDeletion = clone $this->collFlyerArtRequests;
                $this->flyerArtRequestsScheduledForDeletion->clear();
            }
            $this->flyerArtRequestsScheduledForDeletion[]= $flyerArtRequest;
            $flyerArtRequest->setArtRequest(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ArtRequest is new, it will return
     * an empty collection; or if this ArtRequest has previously
     * been saved, it will retrieve related FlyerArtRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ArtRequest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FlyerArtRequest[] List of FlyerArtRequest objects
     */
    public function getFlyerArtRequestsJoinFlyerSize($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FlyerArtRequestQuery::create(null, $criteria);
        $query->joinWith('FlyerSize', $join_behavior);

        return $this->getFlyerArtRequests($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ArtRequest is new, it will return
     * an empty collection; or if this ArtRequest has previously
     * been saved, it will retrieve related FlyerArtRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ArtRequest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|FlyerArtRequest[] List of FlyerArtRequest objects
     */
    public function getFlyerArtRequestsJoinFlyerFormat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FlyerArtRequestQuery::create(null, $criteria);
        $query->joinWith('FlyerFormat', $join_behavior);

        return $this->getFlyerArtRequests($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->art_request_id = null;
        $this->is_started = null;
        $this->is_completed = null;
        $this->is_archived = null;
        $this->due_date = null;
        $this->art_requestor_id = null;
        $this->event_id = null;
        $this->art_request_description = null;
        $this->submission_date = null;
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
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collArtRequestArtRequestTypes) {
                foreach ($this->collArtRequestArtRequestTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collArtRequestAssignments) {
                foreach ($this->collArtRequestAssignments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collArtRequestAttachments) {
                foreach ($this->collArtRequestAttachments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBannerArtRequests) {
                foreach ($this->collBannerArtRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFlyerArtRequests) {
                foreach ($this->collFlyerArtRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collArtRequestArtRequestTypes instanceof PropelCollection) {
            $this->collArtRequestArtRequestTypes->clearIterator();
        }
        $this->collArtRequestArtRequestTypes = null;
        if ($this->collArtRequestAssignments instanceof PropelCollection) {
            $this->collArtRequestAssignments->clearIterator();
        }
        $this->collArtRequestAssignments = null;
        if ($this->collArtRequestAttachments instanceof PropelCollection) {
            $this->collArtRequestAttachments->clearIterator();
        }
        $this->collArtRequestAttachments = null;
        if ($this->collBannerArtRequests instanceof PropelCollection) {
            $this->collBannerArtRequests->clearIterator();
        }
        $this->collBannerArtRequests = null;
        if ($this->collFlyerArtRequests instanceof PropelCollection) {
            $this->collFlyerArtRequests->clearIterator();
        }
        $this->collFlyerArtRequests = null;
        $this->aArtRequestor = null;
        $this->aEvent = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ArtRequestPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}

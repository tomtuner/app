<?php

namespace EVRRSSFeedORM\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Propel;
use \PropelDateTime;
use \PropelException;
use EVRRSSFeedORM\EVRRSSFeedView;
use EVRRSSFeedORM\EVRRSSFeedViewPeer;

/**
 * Base class that represents a row from the 'evr_rss_feed_view' table.
 *
 *
 *
 * @package    propel.generator.EVRRSSFeed.om
 */
abstract class BaseEVRRSSFeedView extends BaseObject
{
    /**
     * Peer class name
     */
    const PEER = 'EVRRSSFeedORM\\EVRRSSFeedViewPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EVRRSSFeedViewPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the event_id field.
     * @var        int
     */
    protected $event_id;

    /**
     * The value for the event_name field.
     * @var        string
     */
    protected $event_name;

    /**
     * The value for the event_description field.
     * @var        string
     */
    protected $event_description;

    /**
     * The value for the event_status field.
     * @var        string
     */
    protected $event_status;

    /**
     * The value for the event_responsible_representative_name field.
     * @var        string
     */
    protected $event_responsible_representative_name;

    /**
     * The value for the event_responsible_representative_email_address field.
     * @var        string
     */
    protected $event_responsible_representative_email_address;

    /**
     * The value for the event_start_time field.
     * @var        string
     */
    protected $event_start_time;

    /**
     * The value for the event_end_time field.
     * @var        string
     */
    protected $event_end_time;

    /**
     * The value for the event_location field.
     * @var        string
     */
    protected $event_location;

    /**
     * The value for the event_cost field.
     * @var        string
     */
    protected $event_cost;

    /**
     * The value for the event_start_time_filter field.
     * @var        string
     */
    protected $event_start_time_filter;

    /**
     * The value for the event_end_time_filter field.
     * @var        string
     */
    protected $event_end_time_filter;

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
     * Get the [event_id] column value.
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Get the [event_name] column value.
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->event_name;
    }

    /**
     * Get the [event_description] column value.
     *
     * @return string
     */
    public function getEventDescription()
    {
        return $this->event_description;
    }

    /**
     * Get the [event_status] column value.
     *
     * @return string
     */
    public function getEventStatus()
    {
        return $this->event_status;
    }

    /**
     * Get the [event_responsible_representative_name] column value.
     *
     * @return string
     */
    public function getEventResponsibleRepresentativeName()
    {
        return $this->event_responsible_representative_name;
    }

    /**
     * Get the [event_responsible_representative_email_address] column value.
     *
     * @return string
     */
    public function getEventResponsibleRepresentativeEmailAddress()
    {
        return $this->event_responsible_representative_email_address;
    }

    /**
     * Get the [event_start_time] column value.
     *
     * @return string
     */
    public function getEventStartTime()
    {
        return $this->event_start_time;
    }

    /**
     * Get the [event_end_time] column value.
     *
     * @return string
     */
    public function getEventEndTime()
    {
        return $this->event_end_time;
    }

    /**
     * Get the [event_location] column value.
     *
     * @return string
     */
    public function getEventLocation()
    {
        return $this->event_location;
    }

    /**
     * Get the [event_cost] column value.
     *
     * @return string
     */
    public function getEventCost()
    {
        return $this->event_cost;
    }

    /**
     * Get the [optionally formatted] temporal [event_start_time_filter] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEventStartTimeFilter($format = 'Y-m-d H:i:s')
    {
        if ($this->event_start_time_filter === null) {
            return null;
        }

        if ($this->event_start_time_filter === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->event_start_time_filter);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->event_start_time_filter, true), $x);
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
     * Get the [optionally formatted] temporal [event_end_time_filter] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEventEndTimeFilter($format = 'Y-m-d H:i:s')
    {
        if ($this->event_end_time_filter === null) {
            return null;
        }

        if ($this->event_end_time_filter === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->event_end_time_filter);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->event_end_time_filter, true), $x);
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
     * Set the value of [event_id] column.
     *
     * @param int $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->event_id !== $v) {
            $this->event_id = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_ID;
        }


        return $this;
    } // setEventId()

    /**
     * Set the value of [event_name] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_name !== $v) {
            $this->event_name = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_NAME;
        }


        return $this;
    } // setEventName()

    /**
     * Set the value of [event_description] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_description !== $v) {
            $this->event_description = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_DESCRIPTION;
        }


        return $this;
    } // setEventDescription()

    /**
     * Set the value of [event_status] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_status !== $v) {
            $this->event_status = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_STATUS;
        }


        return $this;
    } // setEventStatus()

    /**
     * Set the value of [event_responsible_representative_name] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventResponsibleRepresentativeName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_responsible_representative_name !== $v) {
            $this->event_responsible_representative_name = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_NAME;
        }


        return $this;
    } // setEventResponsibleRepresentativeName()

    /**
     * Set the value of [event_responsible_representative_email_address] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventResponsibleRepresentativeEmailAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_responsible_representative_email_address !== $v) {
            $this->event_responsible_representative_email_address = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS;
        }


        return $this;
    } // setEventResponsibleRepresentativeEmailAddress()

    /**
     * Set the value of [event_start_time] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventStartTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_start_time !== $v) {
            $this->event_start_time = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_START_TIME;
        }


        return $this;
    } // setEventStartTime()

    /**
     * Set the value of [event_end_time] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventEndTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_end_time !== $v) {
            $this->event_end_time = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_END_TIME;
        }


        return $this;
    } // setEventEndTime()

    /**
     * Set the value of [event_location] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_location !== $v) {
            $this->event_location = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_LOCATION;
        }


        return $this;
    } // setEventLocation()

    /**
     * Set the value of [event_cost] column.
     *
     * @param string $v new value
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event_cost !== $v) {
            $this->event_cost = $v;
            $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_COST;
        }


        return $this;
    } // setEventCost()

    /**
     * Sets the value of [event_start_time_filter] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventStartTimeFilter($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->event_start_time_filter !== null || $dt !== null) {
            $currentDateAsString = ($this->event_start_time_filter !== null && $tmpDt = new DateTime($this->event_start_time_filter)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->event_start_time_filter = $newDateAsString;
                $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER;
            }
        } // if either are not null


        return $this;
    } // setEventStartTimeFilter()

    /**
     * Sets the value of [event_end_time_filter] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return EVRRSSFeedView The current object (for fluent API support)
     */
    public function setEventEndTimeFilter($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->event_end_time_filter !== null || $dt !== null) {
            $currentDateAsString = ($this->event_end_time_filter !== null && $tmpDt = new DateTime($this->event_end_time_filter)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->event_end_time_filter = $newDateAsString;
                $this->modifiedColumns[] = EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER;
            }
        } // if either are not null


        return $this;
    } // setEventEndTimeFilter()

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

            $this->event_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->event_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->event_description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->event_status = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->event_responsible_representative_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->event_responsible_representative_email_address = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->event_start_time = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->event_end_time = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->event_location = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->event_cost = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->event_start_time_filter = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->event_end_time_filter = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = EVRRSSFeedViewPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EVRRSSFeedView object", $e);
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

    } // ensureConsistency

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


            if (($retval = EVRRSSFeedViewPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = EVRRSSFeedViewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getEventId();
                break;
            case 1:
                return $this->getEventName();
                break;
            case 2:
                return $this->getEventDescription();
                break;
            case 3:
                return $this->getEventStatus();
                break;
            case 4:
                return $this->getEventResponsibleRepresentativeName();
                break;
            case 5:
                return $this->getEventResponsibleRepresentativeEmailAddress();
                break;
            case 6:
                return $this->getEventStartTime();
                break;
            case 7:
                return $this->getEventEndTime();
                break;
            case 8:
                return $this->getEventLocation();
                break;
            case 9:
                return $this->getEventCost();
                break;
            case 10:
                return $this->getEventStartTimeFilter();
                break;
            case 11:
                return $this->getEventEndTimeFilter();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['EVRRSSFeedView'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EVRRSSFeedView'][$this->getPrimaryKey()] = true;
        $keys = EVRRSSFeedViewPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getEventId(),
            $keys[1] => $this->getEventName(),
            $keys[2] => $this->getEventDescription(),
            $keys[3] => $this->getEventStatus(),
            $keys[4] => $this->getEventResponsibleRepresentativeName(),
            $keys[5] => $this->getEventResponsibleRepresentativeEmailAddress(),
            $keys[6] => $this->getEventStartTime(),
            $keys[7] => $this->getEventEndTime(),
            $keys[8] => $this->getEventLocation(),
            $keys[9] => $this->getEventCost(),
            $keys[10] => $this->getEventStartTimeFilter(),
            $keys[11] => $this->getEventEndTimeFilter(),
        );

        return $result;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EVRRSSFeedViewPeer::DATABASE_NAME);

        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_ID)) $criteria->add(EVRRSSFeedViewPeer::EVENT_ID, $this->event_id);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_NAME)) $criteria->add(EVRRSSFeedViewPeer::EVENT_NAME, $this->event_name);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_DESCRIPTION)) $criteria->add(EVRRSSFeedViewPeer::EVENT_DESCRIPTION, $this->event_description);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_STATUS)) $criteria->add(EVRRSSFeedViewPeer::EVENT_STATUS, $this->event_status);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_NAME)) $criteria->add(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_NAME, $this->event_responsible_representative_name);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS)) $criteria->add(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS, $this->event_responsible_representative_email_address);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_START_TIME)) $criteria->add(EVRRSSFeedViewPeer::EVENT_START_TIME, $this->event_start_time);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_END_TIME)) $criteria->add(EVRRSSFeedViewPeer::EVENT_END_TIME, $this->event_end_time);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_LOCATION)) $criteria->add(EVRRSSFeedViewPeer::EVENT_LOCATION, $this->event_location);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_COST)) $criteria->add(EVRRSSFeedViewPeer::EVENT_COST, $this->event_cost);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER)) $criteria->add(EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER, $this->event_start_time_filter);
        if ($this->isColumnModified(EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER)) $criteria->add(EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER, $this->event_end_time_filter);

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
        $criteria = new Criteria(EVRRSSFeedViewPeer::DATABASE_NAME);
        $criteria->add(EVRRSSFeedViewPeer::EVENT_ID, $this->event_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getEventId();
    }

    /**
     * Generic method to set the primary key (event_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setEventId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getEventId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of EVRRSSFeedView (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEventName($this->getEventName());
        $copyObj->setEventDescription($this->getEventDescription());
        $copyObj->setEventStatus($this->getEventStatus());
        $copyObj->setEventResponsibleRepresentativeName($this->getEventResponsibleRepresentativeName());
        $copyObj->setEventResponsibleRepresentativeEmailAddress($this->getEventResponsibleRepresentativeEmailAddress());
        $copyObj->setEventStartTime($this->getEventStartTime());
        $copyObj->setEventEndTime($this->getEventEndTime());
        $copyObj->setEventLocation($this->getEventLocation());
        $copyObj->setEventCost($this->getEventCost());
        $copyObj->setEventStartTimeFilter($this->getEventStartTimeFilter());
        $copyObj->setEventEndTimeFilter($this->getEventEndTimeFilter());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setEventId(NULL); // this is a auto-increment column, so set to default value
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
     * @return EVRRSSFeedView Clone of current object.
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
     * @return EVRRSSFeedViewPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EVRRSSFeedViewPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->event_id = null;
        $this->event_name = null;
        $this->event_description = null;
        $this->event_status = null;
        $this->event_responsible_representative_name = null;
        $this->event_responsible_representative_email_address = null;
        $this->event_start_time = null;
        $this->event_end_time = null;
        $this->event_location = null;
        $this->event_cost = null;
        $this->event_start_time_filter = null;
        $this->event_end_time_filter = null;
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
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EVRRSSFeedViewPeer::DEFAULT_STRING_FORMAT);
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

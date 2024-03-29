<?php

namespace ArtRequestORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use ArtRequestORM\ArtRequest;
use ArtRequestORM\ArtRequestArtRequestTypePeer;
use ArtRequestORM\ArtRequestAssignmentPeer;
use ArtRequestORM\ArtRequestAttachmentPeer;
use ArtRequestORM\ArtRequestPeer;
use ArtRequestORM\ArtRequestorPeer;
use ArtRequestORM\BannerArtRequestPeer;
use ArtRequestORM\EventPeer;
use ArtRequestORM\FlyerArtRequestPeer;
use ArtRequestORM\map\ArtRequestTableMap;

/**
 * Base static class for performing query and update operations on the 'art_request' table.
 *
 *
 *
 * @package propel.generator.ArtRequest.om
 */
abstract class BaseArtRequestPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'art_request';

    /** the table name for this class */
    const TABLE_NAME = 'art_request';

    /** the related Propel class for this table */
    const OM_CLASS = 'ArtRequestORM\\ArtRequest';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ArtRequestTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the ART_REQUEST_ID field */
    const ART_REQUEST_ID = 'art_request.ART_REQUEST_ID';

    /** the column name for the IS_STARTED field */
    const IS_STARTED = 'art_request.IS_STARTED';

    /** the column name for the IS_COMPLETED field */
    const IS_COMPLETED = 'art_request.IS_COMPLETED';

    /** the column name for the IS_ARCHIVED field */
    const IS_ARCHIVED = 'art_request.IS_ARCHIVED';

    /** the column name for the DUE_DATE field */
    const DUE_DATE = 'art_request.DUE_DATE';

    /** the column name for the ART_REQUESTOR_ID field */
    const ART_REQUESTOR_ID = 'art_request.ART_REQUESTOR_ID';

    /** the column name for the EVENT_ID field */
    const EVENT_ID = 'art_request.EVENT_ID';

    /** the column name for the ART_REQUEST_DESCRIPTION field */
    const ART_REQUEST_DESCRIPTION = 'art_request.ART_REQUEST_DESCRIPTION';

    /** the column name for the SUBMISSION_DATE field */
    const SUBMISSION_DATE = 'art_request.SUBMISSION_DATE';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ArtRequest objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ArtRequest[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ArtRequestPeer::$fieldNames[ArtRequestPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('ArtRequestId', 'IsStarted', 'IsCompleted', 'IsArchived', 'DueDate', 'ArtRequestorId', 'EventId', 'ArtRequestDescription', 'SubmissionDate', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('artRequestId', 'isStarted', 'isCompleted', 'isArchived', 'dueDate', 'artRequestorId', 'eventId', 'artRequestDescription', 'submissionDate', ),
        BasePeer::TYPE_COLNAME => array (ArtRequestPeer::ART_REQUEST_ID, ArtRequestPeer::IS_STARTED, ArtRequestPeer::IS_COMPLETED, ArtRequestPeer::IS_ARCHIVED, ArtRequestPeer::DUE_DATE, ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestPeer::EVENT_ID, ArtRequestPeer::ART_REQUEST_DESCRIPTION, ArtRequestPeer::SUBMISSION_DATE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ART_REQUEST_ID', 'IS_STARTED', 'IS_COMPLETED', 'IS_ARCHIVED', 'DUE_DATE', 'ART_REQUESTOR_ID', 'EVENT_ID', 'ART_REQUEST_DESCRIPTION', 'SUBMISSION_DATE', ),
        BasePeer::TYPE_FIELDNAME => array ('art_request_id', 'is_started', 'is_completed', 'is_archived', 'due_date', 'art_requestor_id', 'event_id', 'art_request_description', 'submission_date', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ArtRequestPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('ArtRequestId' => 0, 'IsStarted' => 1, 'IsCompleted' => 2, 'IsArchived' => 3, 'DueDate' => 4, 'ArtRequestorId' => 5, 'EventId' => 6, 'ArtRequestDescription' => 7, 'SubmissionDate' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('artRequestId' => 0, 'isStarted' => 1, 'isCompleted' => 2, 'isArchived' => 3, 'dueDate' => 4, 'artRequestorId' => 5, 'eventId' => 6, 'artRequestDescription' => 7, 'submissionDate' => 8, ),
        BasePeer::TYPE_COLNAME => array (ArtRequestPeer::ART_REQUEST_ID => 0, ArtRequestPeer::IS_STARTED => 1, ArtRequestPeer::IS_COMPLETED => 2, ArtRequestPeer::IS_ARCHIVED => 3, ArtRequestPeer::DUE_DATE => 4, ArtRequestPeer::ART_REQUESTOR_ID => 5, ArtRequestPeer::EVENT_ID => 6, ArtRequestPeer::ART_REQUEST_DESCRIPTION => 7, ArtRequestPeer::SUBMISSION_DATE => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ART_REQUEST_ID' => 0, 'IS_STARTED' => 1, 'IS_COMPLETED' => 2, 'IS_ARCHIVED' => 3, 'DUE_DATE' => 4, 'ART_REQUESTOR_ID' => 5, 'EVENT_ID' => 6, 'ART_REQUEST_DESCRIPTION' => 7, 'SUBMISSION_DATE' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('art_request_id' => 0, 'is_started' => 1, 'is_completed' => 2, 'is_archived' => 3, 'due_date' => 4, 'art_requestor_id' => 5, 'event_id' => 6, 'art_request_description' => 7, 'submission_date' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ArtRequestPeer::getFieldNames($toType);
        $key = isset(ArtRequestPeer::$fieldKeys[$fromType][$name]) ? ArtRequestPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ArtRequestPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ArtRequestPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ArtRequestPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ArtRequestPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ArtRequestPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ArtRequestPeer::ART_REQUEST_ID);
            $criteria->addSelectColumn(ArtRequestPeer::IS_STARTED);
            $criteria->addSelectColumn(ArtRequestPeer::IS_COMPLETED);
            $criteria->addSelectColumn(ArtRequestPeer::IS_ARCHIVED);
            $criteria->addSelectColumn(ArtRequestPeer::DUE_DATE);
            $criteria->addSelectColumn(ArtRequestPeer::ART_REQUESTOR_ID);
            $criteria->addSelectColumn(ArtRequestPeer::EVENT_ID);
            $criteria->addSelectColumn(ArtRequestPeer::ART_REQUEST_DESCRIPTION);
            $criteria->addSelectColumn(ArtRequestPeer::SUBMISSION_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.ART_REQUEST_ID');
            $criteria->addSelectColumn($alias . '.IS_STARTED');
            $criteria->addSelectColumn($alias . '.IS_COMPLETED');
            $criteria->addSelectColumn($alias . '.IS_ARCHIVED');
            $criteria->addSelectColumn($alias . '.DUE_DATE');
            $criteria->addSelectColumn($alias . '.ART_REQUESTOR_ID');
            $criteria->addSelectColumn($alias . '.EVENT_ID');
            $criteria->addSelectColumn($alias . '.ART_REQUEST_DESCRIPTION');
            $criteria->addSelectColumn($alias . '.SUBMISSION_DATE');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 ArtRequest
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ArtRequestPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ArtRequestPeer::populateObjects(ArtRequestPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ArtRequestPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      ArtRequest $obj A ArtRequest object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getArtRequestId();
            } // if key === null
            ArtRequestPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A ArtRequest object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ArtRequest) {
                $key = (string) $value->getArtRequestId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ArtRequest object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ArtRequestPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ArtRequest Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ArtRequestPeer::$instances[$key])) {
                return ArtRequestPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        ArtRequestPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to art_request
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ArtRequestArtRequestTypePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ArtRequestArtRequestTypePeer::clearInstancePool();
        // Invalidate objects in ArtRequestAssignmentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ArtRequestAssignmentPeer::clearInstancePool();
        // Invalidate objects in ArtRequestAttachmentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ArtRequestAttachmentPeer::clearInstancePool();
        // Invalidate objects in BannerArtRequestPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BannerArtRequestPeer::clearInstancePool();
        // Invalidate objects in FlyerArtRequestPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FlyerArtRequestPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ArtRequestPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ArtRequestPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ArtRequestPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (ArtRequest object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ArtRequestPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ArtRequestPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ArtRequestPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ArtRequestPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ArtRequestPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related ArtRequestor table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinArtRequestor(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Event table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinEvent(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ArtRequest objects pre-filled with their ArtRequestor objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ArtRequest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinArtRequestor(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);
        }

        ArtRequestPeer::addSelectColumns($criteria);
        $startcol = ArtRequestPeer::NUM_HYDRATE_COLUMNS;
        ArtRequestorPeer::addSelectColumns($criteria);

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ArtRequestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ArtRequestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ArtRequestPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ArtRequestorPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ArtRequestorPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ArtRequestorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ArtRequestorPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ArtRequest) to $obj2 (ArtRequestor)
                $obj2->addArtRequest($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ArtRequest objects pre-filled with their Event objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ArtRequest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEvent(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);
        }

        ArtRequestPeer::addSelectColumns($criteria);
        $startcol = ArtRequestPeer::NUM_HYDRATE_COLUMNS;
        EventPeer::addSelectColumns($criteria);

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ArtRequestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ArtRequestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ArtRequestPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = EventPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = EventPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EventPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    EventPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ArtRequest) to $obj2 (Event)
                $obj2->addArtRequest($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of ArtRequest objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ArtRequest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);
        }

        ArtRequestPeer::addSelectColumns($criteria);
        $startcol2 = ArtRequestPeer::NUM_HYDRATE_COLUMNS;

        ArtRequestorPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ArtRequestorPeer::NUM_HYDRATE_COLUMNS;

        EventPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EventPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ArtRequestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ArtRequestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ArtRequestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ArtRequestor rows

            $key2 = ArtRequestorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ArtRequestorPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ArtRequestorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ArtRequestorPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ArtRequest) to the collection in $obj2 (ArtRequestor)
                $obj2->addArtRequest($obj1);
            } // if joined row not null

            // Add objects for joined Event rows

            $key3 = EventPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = EventPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = EventPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EventPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ArtRequest) to the collection in $obj3 (Event)
                $obj3->addArtRequest($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ArtRequestor table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptArtRequestor(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Event table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptEvent(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ArtRequestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ArtRequest objects pre-filled with all related objects except ArtRequestor.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ArtRequest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptArtRequestor(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);
        }

        ArtRequestPeer::addSelectColumns($criteria);
        $startcol2 = ArtRequestPeer::NUM_HYDRATE_COLUMNS;

        EventPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EventPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ArtRequestPeer::EVENT_ID, EventPeer::EVENT_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ArtRequestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ArtRequestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ArtRequestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Event rows

                $key2 = EventPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = EventPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = EventPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EventPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ArtRequest) to the collection in $obj2 (Event)
                $obj2->addArtRequest($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ArtRequest objects pre-filled with all related objects except Event.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ArtRequest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptEvent(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);
        }

        ArtRequestPeer::addSelectColumns($criteria);
        $startcol2 = ArtRequestPeer::NUM_HYDRATE_COLUMNS;

        ArtRequestorPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ArtRequestorPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ArtRequestPeer::ART_REQUESTOR_ID, ArtRequestorPeer::ART_REQUESTOR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ArtRequestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ArtRequestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ArtRequestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ArtRequestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ArtRequestor rows

                $key2 = ArtRequestorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ArtRequestorPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ArtRequestorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ArtRequestorPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ArtRequest) to the collection in $obj2 (ArtRequestor)
                $obj2->addArtRequest($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ArtRequestPeer::DATABASE_NAME)->getTable(ArtRequestPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseArtRequestPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseArtRequestPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ArtRequestTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return ArtRequestPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ArtRequest or Criteria object.
     *
     * @param      mixed $values Criteria or ArtRequest object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ArtRequest object
        }

        if ($criteria->containsKey(ArtRequestPeer::ART_REQUEST_ID) && $criteria->keyContainsValue(ArtRequestPeer::ART_REQUEST_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ArtRequestPeer::ART_REQUEST_ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a ArtRequest or Criteria object.
     *
     * @param      mixed $values Criteria or ArtRequest object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ArtRequestPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ArtRequestPeer::ART_REQUEST_ID);
            $value = $criteria->remove(ArtRequestPeer::ART_REQUEST_ID);
            if ($value) {
                $selectCriteria->add(ArtRequestPeer::ART_REQUEST_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ArtRequestPeer::TABLE_NAME);
            }

        } else { // $values is ArtRequest object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the art_request table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ArtRequestPeer::doOnDeleteCascade(new Criteria(ArtRequestPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ArtRequestPeer::TABLE_NAME, $con, ArtRequestPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArtRequestPeer::clearInstancePool();
            ArtRequestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ArtRequest or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ArtRequest object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ArtRequest) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ArtRequestPeer::DATABASE_NAME);
            $criteria->add(ArtRequestPeer::ART_REQUEST_ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ArtRequestPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ArtRequestPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ArtRequestPeer::clearInstancePool();
            } elseif ($values instanceof ArtRequest) { // it's a model object
                ArtRequestPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ArtRequestPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ArtRequestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = ArtRequestPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related ArtRequestArtRequestType objects
            $criteria = new Criteria(ArtRequestArtRequestTypePeer::DATABASE_NAME);

            $criteria->add(ArtRequestArtRequestTypePeer::ART_REQUEST_ID, $obj->getArtRequestId());
            $affectedRows += ArtRequestArtRequestTypePeer::doDelete($criteria, $con);

            // delete related ArtRequestAssignment objects
            $criteria = new Criteria(ArtRequestAssignmentPeer::DATABASE_NAME);

            $criteria->add(ArtRequestAssignmentPeer::ART_REQUEST_ID, $obj->getArtRequestId());
            $affectedRows += ArtRequestAssignmentPeer::doDelete($criteria, $con);

            // delete related ArtRequestAttachment objects
            $criteria = new Criteria(ArtRequestAttachmentPeer::DATABASE_NAME);

            $criteria->add(ArtRequestAttachmentPeer::ART_REQUEST_ID, $obj->getArtRequestId());
            $affectedRows += ArtRequestAttachmentPeer::doDelete($criteria, $con);

            // delete related BannerArtRequest objects
            $criteria = new Criteria(BannerArtRequestPeer::DATABASE_NAME);

            $criteria->add(BannerArtRequestPeer::ART_REQUEST_ID, $obj->getArtRequestId());
            $affectedRows += BannerArtRequestPeer::doDelete($criteria, $con);

            // delete related FlyerArtRequest objects
            $criteria = new Criteria(FlyerArtRequestPeer::DATABASE_NAME);

            $criteria->add(FlyerArtRequestPeer::ART_REQUEST_ID, $obj->getArtRequestId());
            $affectedRows += FlyerArtRequestPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given ArtRequest object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ArtRequest $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ArtRequestPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ArtRequestPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ArtRequestPeer::DATABASE_NAME, ArtRequestPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ArtRequest
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ArtRequestPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ArtRequestPeer::DATABASE_NAME);
        $criteria->add(ArtRequestPeer::ART_REQUEST_ID, $pk);

        $v = ArtRequestPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ArtRequest[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ArtRequestPeer::DATABASE_NAME);
            $criteria->add(ArtRequestPeer::ART_REQUEST_ID, $pks, Criteria::IN);
            $objs = ArtRequestPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseArtRequestPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseArtRequestPeer::buildTableMap();


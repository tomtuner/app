<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\QuarterlyData;
use NewClubsORM\QuarterlyDataPeer;
use NewClubsORM\map\QuarterlyDataTableMap;

/**
 * Base static class for performing query and update operations on the 'quarterly_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyDataPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'quarterly_data';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\QuarterlyData';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.QuarterlyData';

	/** the related TableMap class for this table */
	const TM_CLASS = 'QuarterlyDataTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 20;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 20;

	/** the column name for the ID field */
	const ID = 'quarterly_data.ID';

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'quarterly_data.REPORT_ID';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'quarterly_data.ORG_ID';

	/** the column name for the CLUBNAME field */
	const CLUBNAME = 'quarterly_data.CLUBNAME';

	/** the column name for the MEETING_PLACE field */
	const MEETING_PLACE = 'quarterly_data.MEETING_PLACE';

	/** the column name for the DAY field */
	const DAY = 'quarterly_data.DAY';

	/** the column name for the TIME field */
	const TIME = 'quarterly_data.TIME';

	/** the column name for the ACTIVE field */
	const ACTIVE = 'quarterly_data.ACTIVE';

	/** the column name for the ASSOCIATE field */
	const ASSOCIATE = 'quarterly_data.ASSOCIATE';

	/** the column name for the ATTENDANCE field */
	const ATTENDANCE = 'quarterly_data.ATTENDANCE';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'quarterly_data.MEMBERS';

	/** the column name for the EVENTS field */
	const EVENTS = 'quarterly_data.EVENTS';

	/** the column name for the UPCOMING field */
	const UPCOMING = 'quarterly_data.UPCOMING';

	/** the column name for the GOALS field */
	const GOALS = 'quarterly_data.GOALS';

	/** the column name for the REACHGOALS field */
	const REACHGOALS = 'quarterly_data.REACHGOALS';

	/** the column name for the HELP field */
	const HELP = 'quarterly_data.HELP';

	/** the column name for the ACCOMPLISHMENTS field */
	const ACCOMPLISHMENTS = 'quarterly_data.ACCOMPLISHMENTS';

	/** the column name for the BOARDCHANGES field */
	const BOARDCHANGES = 'quarterly_data.BOARDCHANGES';

	/** the column name for the SUBMITTED_BY field */
	const SUBMITTED_BY = 'quarterly_data.SUBMITTED_BY';

	/** the column name for the ADVISOR field */
	const ADVISOR = 'quarterly_data.ADVISOR';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of QuarterlyData objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array QuarterlyData[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ReportId', 'OrgId', 'Clubname', 'MeetingPlace', 'Day', 'Time', 'Active', 'Associate', 'Attendance', 'Members', 'Events', 'Upcoming', 'Goals', 'Reachgoals', 'Help', 'Accomplishments', 'Boardchanges', 'SubmittedBy', 'Advisor', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'reportId', 'orgId', 'clubname', 'meetingPlace', 'day', 'time', 'active', 'associate', 'attendance', 'members', 'events', 'upcoming', 'goals', 'reachgoals', 'help', 'accomplishments', 'boardchanges', 'submittedBy', 'advisor', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::REPORT_ID, self::ORG_ID, self::CLUBNAME, self::MEETING_PLACE, self::DAY, self::TIME, self::ACTIVE, self::ASSOCIATE, self::ATTENDANCE, self::MEMBERS, self::EVENTS, self::UPCOMING, self::GOALS, self::REACHGOALS, self::HELP, self::ACCOMPLISHMENTS, self::BOARDCHANGES, self::SUBMITTED_BY, self::ADVISOR, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'REPORT_ID', 'ORG_ID', 'CLUBNAME', 'MEETING_PLACE', 'DAY', 'TIME', 'ACTIVE', 'ASSOCIATE', 'ATTENDANCE', 'MEMBERS', 'EVENTS', 'UPCOMING', 'GOALS', 'REACHGOALS', 'HELP', 'ACCOMPLISHMENTS', 'BOARDCHANGES', 'SUBMITTED_BY', 'ADVISOR', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'report_id', 'org_id', 'clubname', 'meeting_place', 'day', 'time', 'active', 'associate', 'attendance', 'members', 'events', 'upcoming', 'goals', 'reachgoals', 'help', 'accomplishments', 'boardchanges', 'submitted_by', 'advisor', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ReportId' => 1, 'OrgId' => 2, 'Clubname' => 3, 'MeetingPlace' => 4, 'Day' => 5, 'Time' => 6, 'Active' => 7, 'Associate' => 8, 'Attendance' => 9, 'Members' => 10, 'Events' => 11, 'Upcoming' => 12, 'Goals' => 13, 'Reachgoals' => 14, 'Help' => 15, 'Accomplishments' => 16, 'Boardchanges' => 17, 'SubmittedBy' => 18, 'Advisor' => 19, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'reportId' => 1, 'orgId' => 2, 'clubname' => 3, 'meetingPlace' => 4, 'day' => 5, 'time' => 6, 'active' => 7, 'associate' => 8, 'attendance' => 9, 'members' => 10, 'events' => 11, 'upcoming' => 12, 'goals' => 13, 'reachgoals' => 14, 'help' => 15, 'accomplishments' => 16, 'boardchanges' => 17, 'submittedBy' => 18, 'advisor' => 19, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::REPORT_ID => 1, self::ORG_ID => 2, self::CLUBNAME => 3, self::MEETING_PLACE => 4, self::DAY => 5, self::TIME => 6, self::ACTIVE => 7, self::ASSOCIATE => 8, self::ATTENDANCE => 9, self::MEMBERS => 10, self::EVENTS => 11, self::UPCOMING => 12, self::GOALS => 13, self::REACHGOALS => 14, self::HELP => 15, self::ACCOMPLISHMENTS => 16, self::BOARDCHANGES => 17, self::SUBMITTED_BY => 18, self::ADVISOR => 19, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'REPORT_ID' => 1, 'ORG_ID' => 2, 'CLUBNAME' => 3, 'MEETING_PLACE' => 4, 'DAY' => 5, 'TIME' => 6, 'ACTIVE' => 7, 'ASSOCIATE' => 8, 'ATTENDANCE' => 9, 'MEMBERS' => 10, 'EVENTS' => 11, 'UPCOMING' => 12, 'GOALS' => 13, 'REACHGOALS' => 14, 'HELP' => 15, 'ACCOMPLISHMENTS' => 16, 'BOARDCHANGES' => 17, 'SUBMITTED_BY' => 18, 'ADVISOR' => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'report_id' => 1, 'org_id' => 2, 'clubname' => 3, 'meeting_place' => 4, 'day' => 5, 'time' => 6, 'active' => 7, 'associate' => 8, 'attendance' => 9, 'members' => 10, 'events' => 11, 'upcoming' => 12, 'goals' => 13, 'reachgoals' => 14, 'help' => 15, 'accomplishments' => 16, 'boardchanges' => 17, 'submitted_by' => 18, 'advisor' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
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
	 * @param      string $column The column name for current table. (i.e. QuarterlyDataPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(QuarterlyDataPeer::TABLE_NAME.'.', $alias.'.', $column);
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
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(QuarterlyDataPeer::ID);
			$criteria->addSelectColumn(QuarterlyDataPeer::REPORT_ID);
			$criteria->addSelectColumn(QuarterlyDataPeer::ORG_ID);
			$criteria->addSelectColumn(QuarterlyDataPeer::CLUBNAME);
			$criteria->addSelectColumn(QuarterlyDataPeer::MEETING_PLACE);
			$criteria->addSelectColumn(QuarterlyDataPeer::DAY);
			$criteria->addSelectColumn(QuarterlyDataPeer::TIME);
			$criteria->addSelectColumn(QuarterlyDataPeer::ACTIVE);
			$criteria->addSelectColumn(QuarterlyDataPeer::ASSOCIATE);
			$criteria->addSelectColumn(QuarterlyDataPeer::ATTENDANCE);
			$criteria->addSelectColumn(QuarterlyDataPeer::MEMBERS);
			$criteria->addSelectColumn(QuarterlyDataPeer::EVENTS);
			$criteria->addSelectColumn(QuarterlyDataPeer::UPCOMING);
			$criteria->addSelectColumn(QuarterlyDataPeer::GOALS);
			$criteria->addSelectColumn(QuarterlyDataPeer::REACHGOALS);
			$criteria->addSelectColumn(QuarterlyDataPeer::HELP);
			$criteria->addSelectColumn(QuarterlyDataPeer::ACCOMPLISHMENTS);
			$criteria->addSelectColumn(QuarterlyDataPeer::BOARDCHANGES);
			$criteria->addSelectColumn(QuarterlyDataPeer::SUBMITTED_BY);
			$criteria->addSelectColumn(QuarterlyDataPeer::ADVISOR);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.REPORT_ID');
			$criteria->addSelectColumn($alias . '.ORG_ID');
			$criteria->addSelectColumn($alias . '.CLUBNAME');
			$criteria->addSelectColumn($alias . '.MEETING_PLACE');
			$criteria->addSelectColumn($alias . '.DAY');
			$criteria->addSelectColumn($alias . '.TIME');
			$criteria->addSelectColumn($alias . '.ACTIVE');
			$criteria->addSelectColumn($alias . '.ASSOCIATE');
			$criteria->addSelectColumn($alias . '.ATTENDANCE');
			$criteria->addSelectColumn($alias . '.MEMBERS');
			$criteria->addSelectColumn($alias . '.EVENTS');
			$criteria->addSelectColumn($alias . '.UPCOMING');
			$criteria->addSelectColumn($alias . '.GOALS');
			$criteria->addSelectColumn($alias . '.REACHGOALS');
			$criteria->addSelectColumn($alias . '.HELP');
			$criteria->addSelectColumn($alias . '.ACCOMPLISHMENTS');
			$criteria->addSelectColumn($alias . '.BOARDCHANGES');
			$criteria->addSelectColumn($alias . '.SUBMITTED_BY');
			$criteria->addSelectColumn($alias . '.ADVISOR');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(QuarterlyDataPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			QuarterlyDataPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     QuarterlyData
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = QuarterlyDataPeer::doSelect($critcopy, $con);
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
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return QuarterlyDataPeer::populateObjects(QuarterlyDataPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			QuarterlyDataPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @param      QuarterlyData $value A QuarterlyData object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
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
	 * @param      mixed $value A QuarterlyData object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof QuarterlyData) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or QuarterlyData object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     QuarterlyData Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to quarterly_data
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
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
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = QuarterlyDataPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = QuarterlyDataPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = QuarterlyDataPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				QuarterlyDataPeer::addInstanceToPool($obj, $key);
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
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (QuarterlyData object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = QuarterlyDataPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = QuarterlyDataPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + QuarterlyDataPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = QuarterlyDataPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			QuarterlyDataPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseQuarterlyDataPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseQuarterlyDataPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new QuarterlyDataTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? QuarterlyDataPeer::CLASS_DEFAULT : QuarterlyDataPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a QuarterlyData or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyData object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from QuarterlyData object
		}

		if ($criteria->containsKey(QuarterlyDataPeer::ID) && $criteria->keyContainsValue(QuarterlyDataPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.QuarterlyDataPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a QuarterlyData or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyData object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(QuarterlyDataPeer::ID);
			$value = $criteria->remove(QuarterlyDataPeer::ID);
			if ($value) {
				$selectCriteria->add(QuarterlyDataPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(QuarterlyDataPeer::TABLE_NAME);
			}

		} else { // $values is QuarterlyData object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the quarterly_data table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(QuarterlyDataPeer::TABLE_NAME, $con, QuarterlyDataPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			QuarterlyDataPeer::clearInstancePool();
			QuarterlyDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a QuarterlyData or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or QuarterlyData object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			QuarterlyDataPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof QuarterlyData) { // it's a model object
			// invalidate the cache for this single object
			QuarterlyDataPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(QuarterlyDataPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				QuarterlyDataPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			QuarterlyDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given QuarterlyData object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      QuarterlyData $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(QuarterlyDataPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(QuarterlyDataPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(QuarterlyDataPeer::DATABASE_NAME, QuarterlyDataPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     QuarterlyData
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = QuarterlyDataPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(QuarterlyDataPeer::DATABASE_NAME);
		$criteria->add(QuarterlyDataPeer::ID, $pk);

		$v = QuarterlyDataPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(QuarterlyDataPeer::DATABASE_NAME);
			$criteria->add(QuarterlyDataPeer::ID, $pks, Criteria::IN);
			$objs = QuarterlyDataPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseQuarterlyDataPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseQuarterlyDataPeer::buildTableMap();


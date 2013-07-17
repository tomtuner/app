<?php

namespace ClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use ClubsORM\QuarterlyReports;
use ClubsORM\QuarterlyReportsPeer;
use ClubsORM\map\QuarterlyReportsTableMap;

/**
 * Base static class for performing query and update operations on the 'quarterly_reports' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseQuarterlyReportsPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'clubs';

	/** the table name for this class */
	const TABLE_NAME = 'quarterly_reports';

	/** the related Propel class for this table */
	const OM_CLASS = 'ClubsORM\\QuarterlyReports';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'clubs.QuarterlyReports';

	/** the related TableMap class for this table */
	const TM_CLASS = 'QuarterlyReportsTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 15;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 15;

	/** the column name for the ID field */
	const ID = 'quarterly_reports.ID';

	/** the column name for the YEAR field */
	const YEAR = 'quarterly_reports.YEAR';

	/** the column name for the QUARTER field */
	const QUARTER = 'quarterly_reports.QUARTER';

	/** the column name for the ORGANIZATION_ID field */
	const ORGANIZATION_ID = 'quarterly_reports.ORGANIZATION_ID';

	/** the column name for the MEMBER_LIST_ID field */
	const MEMBER_LIST_ID = 'quarterly_reports.MEMBER_LIST_ID';

	/** the column name for the CLUB_MEETING_ID field */
	const CLUB_MEETING_ID = 'quarterly_reports.CLUB_MEETING_ID';

	/** the column name for the CLUB_NAME field */
	const CLUB_NAME = 'quarterly_reports.CLUB_NAME';

	/** the column name for the NUM_ACTIVE_MEMBERS field */
	const NUM_ACTIVE_MEMBERS = 'quarterly_reports.NUM_ACTIVE_MEMBERS';

	/** the column name for the NUM_ASSOCIATE_MEMBERS field */
	const NUM_ASSOCIATE_MEMBERS = 'quarterly_reports.NUM_ASSOCIATE_MEMBERS';

	/** the column name for the AVG_MEETING_ATTENDANCE field */
	const AVG_MEETING_ATTENDANCE = 'quarterly_reports.AVG_MEETING_ATTENDANCE';

	/** the column name for the GOALS field */
	const GOALS = 'quarterly_reports.GOALS';

	/** the column name for the ACCOMPLISH_GOALS field */
	const ACCOMPLISH_GOALS = 'quarterly_reports.ACCOMPLISH_GOALS';

	/** the column name for the HELP field */
	const HELP = 'quarterly_reports.HELP';

	/** the column name for the OTHER field */
	const OTHER = 'quarterly_reports.OTHER';

	/** the column name for the BOARD_CHANGES field */
	const BOARD_CHANGES = 'quarterly_reports.BOARD_CHANGES';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of QuarterlyReports objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array QuarterlyReports[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Year', 'Quarter', 'OrganizationId', 'MemberListId', 'ClubMeetingId', 'ClubName', 'NumActiveMembers', 'NumAssociateMembers', 'AvgMeetingAttendance', 'Goals', 'AccomplishGoals', 'Help', 'Other', 'BoardChanges', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'year', 'quarter', 'organizationId', 'memberListId', 'clubMeetingId', 'clubName', 'numActiveMembers', 'numAssociateMembers', 'avgMeetingAttendance', 'goals', 'accomplishGoals', 'help', 'other', 'boardChanges', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::YEAR, self::QUARTER, self::ORGANIZATION_ID, self::MEMBER_LIST_ID, self::CLUB_MEETING_ID, self::CLUB_NAME, self::NUM_ACTIVE_MEMBERS, self::NUM_ASSOCIATE_MEMBERS, self::AVG_MEETING_ATTENDANCE, self::GOALS, self::ACCOMPLISH_GOALS, self::HELP, self::OTHER, self::BOARD_CHANGES, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'YEAR', 'QUARTER', 'ORGANIZATION_ID', 'MEMBER_LIST_ID', 'CLUB_MEETING_ID', 'CLUB_NAME', 'NUM_ACTIVE_MEMBERS', 'NUM_ASSOCIATE_MEMBERS', 'AVG_MEETING_ATTENDANCE', 'GOALS', 'ACCOMPLISH_GOALS', 'HELP', 'OTHER', 'BOARD_CHANGES', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'year', 'quarter', 'organization_id', 'member_list_id', 'club_meeting_id', 'club_name', 'num_active_members', 'num_associate_members', 'avg_meeting_attendance', 'goals', 'accomplish_goals', 'help', 'other', 'board_changes', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Year' => 1, 'Quarter' => 2, 'OrganizationId' => 3, 'MemberListId' => 4, 'ClubMeetingId' => 5, 'ClubName' => 6, 'NumActiveMembers' => 7, 'NumAssociateMembers' => 8, 'AvgMeetingAttendance' => 9, 'Goals' => 10, 'AccomplishGoals' => 11, 'Help' => 12, 'Other' => 13, 'BoardChanges' => 14, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'year' => 1, 'quarter' => 2, 'organizationId' => 3, 'memberListId' => 4, 'clubMeetingId' => 5, 'clubName' => 6, 'numActiveMembers' => 7, 'numAssociateMembers' => 8, 'avgMeetingAttendance' => 9, 'goals' => 10, 'accomplishGoals' => 11, 'help' => 12, 'other' => 13, 'boardChanges' => 14, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::YEAR => 1, self::QUARTER => 2, self::ORGANIZATION_ID => 3, self::MEMBER_LIST_ID => 4, self::CLUB_MEETING_ID => 5, self::CLUB_NAME => 6, self::NUM_ACTIVE_MEMBERS => 7, self::NUM_ASSOCIATE_MEMBERS => 8, self::AVG_MEETING_ATTENDANCE => 9, self::GOALS => 10, self::ACCOMPLISH_GOALS => 11, self::HELP => 12, self::OTHER => 13, self::BOARD_CHANGES => 14, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'YEAR' => 1, 'QUARTER' => 2, 'ORGANIZATION_ID' => 3, 'MEMBER_LIST_ID' => 4, 'CLUB_MEETING_ID' => 5, 'CLUB_NAME' => 6, 'NUM_ACTIVE_MEMBERS' => 7, 'NUM_ASSOCIATE_MEMBERS' => 8, 'AVG_MEETING_ATTENDANCE' => 9, 'GOALS' => 10, 'ACCOMPLISH_GOALS' => 11, 'HELP' => 12, 'OTHER' => 13, 'BOARD_CHANGES' => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'year' => 1, 'quarter' => 2, 'organization_id' => 3, 'member_list_id' => 4, 'club_meeting_id' => 5, 'club_name' => 6, 'num_active_members' => 7, 'num_associate_members' => 8, 'avg_meeting_attendance' => 9, 'goals' => 10, 'accomplish_goals' => 11, 'help' => 12, 'other' => 13, 'board_changes' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
	 * @param      string $column The column name for current table. (i.e. QuarterlyReportsPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(QuarterlyReportsPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(QuarterlyReportsPeer::ID);
			$criteria->addSelectColumn(QuarterlyReportsPeer::YEAR);
			$criteria->addSelectColumn(QuarterlyReportsPeer::QUARTER);
			$criteria->addSelectColumn(QuarterlyReportsPeer::ORGANIZATION_ID);
			$criteria->addSelectColumn(QuarterlyReportsPeer::MEMBER_LIST_ID);
			$criteria->addSelectColumn(QuarterlyReportsPeer::CLUB_MEETING_ID);
			$criteria->addSelectColumn(QuarterlyReportsPeer::CLUB_NAME);
			$criteria->addSelectColumn(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS);
			$criteria->addSelectColumn(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS);
			$criteria->addSelectColumn(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE);
			$criteria->addSelectColumn(QuarterlyReportsPeer::GOALS);
			$criteria->addSelectColumn(QuarterlyReportsPeer::ACCOMPLISH_GOALS);
			$criteria->addSelectColumn(QuarterlyReportsPeer::HELP);
			$criteria->addSelectColumn(QuarterlyReportsPeer::OTHER);
			$criteria->addSelectColumn(QuarterlyReportsPeer::BOARD_CHANGES);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.YEAR');
			$criteria->addSelectColumn($alias . '.QUARTER');
			$criteria->addSelectColumn($alias . '.ORGANIZATION_ID');
			$criteria->addSelectColumn($alias . '.MEMBER_LIST_ID');
			$criteria->addSelectColumn($alias . '.CLUB_MEETING_ID');
			$criteria->addSelectColumn($alias . '.CLUB_NAME');
			$criteria->addSelectColumn($alias . '.NUM_ACTIVE_MEMBERS');
			$criteria->addSelectColumn($alias . '.NUM_ASSOCIATE_MEMBERS');
			$criteria->addSelectColumn($alias . '.AVG_MEETING_ATTENDANCE');
			$criteria->addSelectColumn($alias . '.GOALS');
			$criteria->addSelectColumn($alias . '.ACCOMPLISH_GOALS');
			$criteria->addSelectColumn($alias . '.HELP');
			$criteria->addSelectColumn($alias . '.OTHER');
			$criteria->addSelectColumn($alias . '.BOARD_CHANGES');
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
		$criteria->setPrimaryTableName(QuarterlyReportsPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			QuarterlyReportsPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     QuarterlyReports
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = QuarterlyReportsPeer::doSelect($critcopy, $con);
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
		return QuarterlyReportsPeer::populateObjects(QuarterlyReportsPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			QuarterlyReportsPeer::addSelectColumns($criteria);
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
	 * @param      QuarterlyReports $value A QuarterlyReports object.
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
	 * @param      mixed $value A QuarterlyReports object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof QuarterlyReports) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or QuarterlyReports object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     QuarterlyReports Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to quarterly_reports
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
		$cls = QuarterlyReportsPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = QuarterlyReportsPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = QuarterlyReportsPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				QuarterlyReportsPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (QuarterlyReports object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = QuarterlyReportsPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = QuarterlyReportsPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + QuarterlyReportsPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = QuarterlyReportsPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			QuarterlyReportsPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseQuarterlyReportsPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseQuarterlyReportsPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new QuarterlyReportsTableMap());
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
		return $withPrefix ? QuarterlyReportsPeer::CLASS_DEFAULT : QuarterlyReportsPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a QuarterlyReports or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyReports object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from QuarterlyReports object
		}

		if ($criteria->containsKey(QuarterlyReportsPeer::ID) && $criteria->keyContainsValue(QuarterlyReportsPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.QuarterlyReportsPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a QuarterlyReports or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyReports object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(QuarterlyReportsPeer::ID);
			$value = $criteria->remove(QuarterlyReportsPeer::ID);
			if ($value) {
				$selectCriteria->add(QuarterlyReportsPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(QuarterlyReportsPeer::TABLE_NAME);
			}

		} else { // $values is QuarterlyReports object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the quarterly_reports table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(QuarterlyReportsPeer::TABLE_NAME, $con, QuarterlyReportsPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			QuarterlyReportsPeer::clearInstancePool();
			QuarterlyReportsPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a QuarterlyReports or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or QuarterlyReports object or primary key or array of primary keys
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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			QuarterlyReportsPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof QuarterlyReports) { // it's a model object
			// invalidate the cache for this single object
			QuarterlyReportsPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(QuarterlyReportsPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				QuarterlyReportsPeer::removeInstanceFromPool($singleval);
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
			QuarterlyReportsPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given QuarterlyReports object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      QuarterlyReports $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(QuarterlyReportsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(QuarterlyReportsPeer::TABLE_NAME);

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

		return BasePeer::doValidate(QuarterlyReportsPeer::DATABASE_NAME, QuarterlyReportsPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     QuarterlyReports
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = QuarterlyReportsPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(QuarterlyReportsPeer::DATABASE_NAME);
		$criteria->add(QuarterlyReportsPeer::ID, $pk);

		$v = QuarterlyReportsPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(QuarterlyReportsPeer::DATABASE_NAME);
			$criteria->add(QuarterlyReportsPeer::ID, $pks, Criteria::IN);
			$objs = QuarterlyReportsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseQuarterlyReportsPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseQuarterlyReportsPeer::buildTableMap();


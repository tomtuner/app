<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\YearlyData;
use NewClubsORM\YearlyDataPeer;
use NewClubsORM\map\YearlyDataTableMap;

/**
 * Base static class for performing query and update operations on the 'yearly_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseYearlyDataPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'yearly_data';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\YearlyData';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.YearlyData';

	/** the related TableMap class for this table */
	const TM_CLASS = 'YearlyDataTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 16;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 16;

	/** the column name for the ORG_ID field */
	const ORG_ID = 'yearly_data.ORG_ID';

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'yearly_data.REPORT_ID';

	/** the column name for the RECOGNIZED field */
	const RECOGNIZED = 'yearly_data.RECOGNIZED';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'yearly_data.MEMBERS';

	/** the column name for the FALL_PARTICIPATION field */
	const FALL_PARTICIPATION = 'yearly_data.FALL_PARTICIPATION';

	/** the column name for the WINTER_PARTICIPATION field */
	const WINTER_PARTICIPATION = 'yearly_data.WINTER_PARTICIPATION';

	/** the column name for the SPRING_PARTICIPATION field */
	const SPRING_PARTICIPATION = 'yearly_data.SPRING_PARTICIPATION';

	/** the column name for the FALL_FUND field */
	const FALL_FUND = 'yearly_data.FALL_FUND';

	/** the column name for the WINTER_FUND field */
	const WINTER_FUND = 'yearly_data.WINTER_FUND';

	/** the column name for the SPRING_FUND field */
	const SPRING_FUND = 'yearly_data.SPRING_FUND';

	/** the column name for the FALL_CS field */
	const FALL_CS = 'yearly_data.FALL_CS';

	/** the column name for the WINTER_CS field */
	const WINTER_CS = 'yearly_data.WINTER_CS';

	/** the column name for the SPRING_CS field */
	const SPRING_CS = 'yearly_data.SPRING_CS';

	/** the column name for the ACHIEVEMENTS field */
	const ACHIEVEMENTS = 'yearly_data.ACHIEVEMENTS';

	/** the column name for the SUBMITTER field */
	const SUBMITTER = 'yearly_data.SUBMITTER';

	/** the column name for the DATE field */
	const DATE = 'yearly_data.DATE';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of YearlyData objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array YearlyData[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('OrgId', 'ReportId', 'Recognized', 'Members', 'FallParticipation', 'WinterParticipation', 'SpringParticipation', 'FallFund', 'WinterFund', 'SpringFund', 'FallCs', 'WinterCs', 'SpringCs', 'Achievements', 'Submitter', 'Date', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('orgId', 'reportId', 'recognized', 'members', 'fallParticipation', 'winterParticipation', 'springParticipation', 'fallFund', 'winterFund', 'springFund', 'fallCs', 'winterCs', 'springCs', 'achievements', 'submitter', 'date', ),
		BasePeer::TYPE_COLNAME => array (self::ORG_ID, self::REPORT_ID, self::RECOGNIZED, self::MEMBERS, self::FALL_PARTICIPATION, self::WINTER_PARTICIPATION, self::SPRING_PARTICIPATION, self::FALL_FUND, self::WINTER_FUND, self::SPRING_FUND, self::FALL_CS, self::WINTER_CS, self::SPRING_CS, self::ACHIEVEMENTS, self::SUBMITTER, self::DATE, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ORG_ID', 'REPORT_ID', 'RECOGNIZED', 'MEMBERS', 'FALL_PARTICIPATION', 'WINTER_PARTICIPATION', 'SPRING_PARTICIPATION', 'FALL_FUND', 'WINTER_FUND', 'SPRING_FUND', 'FALL_CS', 'WINTER_CS', 'SPRING_CS', 'ACHIEVEMENTS', 'SUBMITTER', 'DATE', ),
		BasePeer::TYPE_FIELDNAME => array ('org_id', 'report_id', 'recognized', 'members', 'fall_participation', 'winter_participation', 'spring_participation', 'fall_fund', 'winter_fund', 'spring_fund', 'fall_cs', 'winter_cs', 'spring_cs', 'achievements', 'submitter', 'date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('OrgId' => 0, 'ReportId' => 1, 'Recognized' => 2, 'Members' => 3, 'FallParticipation' => 4, 'WinterParticipation' => 5, 'SpringParticipation' => 6, 'FallFund' => 7, 'WinterFund' => 8, 'SpringFund' => 9, 'FallCs' => 10, 'WinterCs' => 11, 'SpringCs' => 12, 'Achievements' => 13, 'Submitter' => 14, 'Date' => 15, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('orgId' => 0, 'reportId' => 1, 'recognized' => 2, 'members' => 3, 'fallParticipation' => 4, 'winterParticipation' => 5, 'springParticipation' => 6, 'fallFund' => 7, 'winterFund' => 8, 'springFund' => 9, 'fallCs' => 10, 'winterCs' => 11, 'springCs' => 12, 'achievements' => 13, 'submitter' => 14, 'date' => 15, ),
		BasePeer::TYPE_COLNAME => array (self::ORG_ID => 0, self::REPORT_ID => 1, self::RECOGNIZED => 2, self::MEMBERS => 3, self::FALL_PARTICIPATION => 4, self::WINTER_PARTICIPATION => 5, self::SPRING_PARTICIPATION => 6, self::FALL_FUND => 7, self::WINTER_FUND => 8, self::SPRING_FUND => 9, self::FALL_CS => 10, self::WINTER_CS => 11, self::SPRING_CS => 12, self::ACHIEVEMENTS => 13, self::SUBMITTER => 14, self::DATE => 15, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ORG_ID' => 0, 'REPORT_ID' => 1, 'RECOGNIZED' => 2, 'MEMBERS' => 3, 'FALL_PARTICIPATION' => 4, 'WINTER_PARTICIPATION' => 5, 'SPRING_PARTICIPATION' => 6, 'FALL_FUND' => 7, 'WINTER_FUND' => 8, 'SPRING_FUND' => 9, 'FALL_CS' => 10, 'WINTER_CS' => 11, 'SPRING_CS' => 12, 'ACHIEVEMENTS' => 13, 'SUBMITTER' => 14, 'DATE' => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('org_id' => 0, 'report_id' => 1, 'recognized' => 2, 'members' => 3, 'fall_participation' => 4, 'winter_participation' => 5, 'spring_participation' => 6, 'fall_fund' => 7, 'winter_fund' => 8, 'spring_fund' => 9, 'fall_cs' => 10, 'winter_cs' => 11, 'spring_cs' => 12, 'achievements' => 13, 'submitter' => 14, 'date' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
	 * @param      string $column The column name for current table. (i.e. YearlyDataPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(YearlyDataPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(YearlyDataPeer::ORG_ID);
			$criteria->addSelectColumn(YearlyDataPeer::REPORT_ID);
			$criteria->addSelectColumn(YearlyDataPeer::RECOGNIZED);
			$criteria->addSelectColumn(YearlyDataPeer::MEMBERS);
			$criteria->addSelectColumn(YearlyDataPeer::FALL_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataPeer::WINTER_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataPeer::SPRING_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataPeer::FALL_FUND);
			$criteria->addSelectColumn(YearlyDataPeer::WINTER_FUND);
			$criteria->addSelectColumn(YearlyDataPeer::SPRING_FUND);
			$criteria->addSelectColumn(YearlyDataPeer::FALL_CS);
			$criteria->addSelectColumn(YearlyDataPeer::WINTER_CS);
			$criteria->addSelectColumn(YearlyDataPeer::SPRING_CS);
			$criteria->addSelectColumn(YearlyDataPeer::ACHIEVEMENTS);
			$criteria->addSelectColumn(YearlyDataPeer::SUBMITTER);
			$criteria->addSelectColumn(YearlyDataPeer::DATE);
		} else {
			$criteria->addSelectColumn($alias . '.ORG_ID');
			$criteria->addSelectColumn($alias . '.REPORT_ID');
			$criteria->addSelectColumn($alias . '.RECOGNIZED');
			$criteria->addSelectColumn($alias . '.MEMBERS');
			$criteria->addSelectColumn($alias . '.FALL_PARTICIPATION');
			$criteria->addSelectColumn($alias . '.WINTER_PARTICIPATION');
			$criteria->addSelectColumn($alias . '.SPRING_PARTICIPATION');
			$criteria->addSelectColumn($alias . '.FALL_FUND');
			$criteria->addSelectColumn($alias . '.WINTER_FUND');
			$criteria->addSelectColumn($alias . '.SPRING_FUND');
			$criteria->addSelectColumn($alias . '.FALL_CS');
			$criteria->addSelectColumn($alias . '.WINTER_CS');
			$criteria->addSelectColumn($alias . '.SPRING_CS');
			$criteria->addSelectColumn($alias . '.ACHIEVEMENTS');
			$criteria->addSelectColumn($alias . '.SUBMITTER');
			$criteria->addSelectColumn($alias . '.DATE');
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
		$criteria->setPrimaryTableName(YearlyDataPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			YearlyDataPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     YearlyData
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = YearlyDataPeer::doSelect($critcopy, $con);
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
		return YearlyDataPeer::populateObjects(YearlyDataPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			YearlyDataPeer::addSelectColumns($criteria);
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
	 * @param      YearlyData $value A YearlyData object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getOrgId(), (string) $obj->getReportId()));
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
	 * @param      mixed $value A YearlyData object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof YearlyData) {
				$key = serialize(array((string) $value->getOrgId(), (string) $value->getReportId()));
			} elseif (is_array($value) && count($value) === 2) {
				// assume we've been passed a primary key
				$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or YearlyData object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     YearlyData Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to yearly_data
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
		if ($row[$startcol] === null && $row[$startcol + 1] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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
		return array((int) $row[$startcol], (int) $row[$startcol + 1]);
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
		$cls = YearlyDataPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = YearlyDataPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = YearlyDataPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				YearlyDataPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (YearlyData object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = YearlyDataPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = YearlyDataPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + YearlyDataPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = YearlyDataPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			YearlyDataPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseYearlyDataPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseYearlyDataPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new YearlyDataTableMap());
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
		return $withPrefix ? YearlyDataPeer::CLASS_DEFAULT : YearlyDataPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a YearlyData or Criteria object.
	 *
	 * @param      mixed $values Criteria or YearlyData object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from YearlyData object
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
	 * Performs an UPDATE on the database, given a YearlyData or Criteria object.
	 *
	 * @param      mixed $values Criteria or YearlyData object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(YearlyDataPeer::ORG_ID);
			$value = $criteria->remove(YearlyDataPeer::ORG_ID);
			if ($value) {
				$selectCriteria->add(YearlyDataPeer::ORG_ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(YearlyDataPeer::TABLE_NAME);
			}

			$comparison = $criteria->getComparison(YearlyDataPeer::REPORT_ID);
			$value = $criteria->remove(YearlyDataPeer::REPORT_ID);
			if ($value) {
				$selectCriteria->add(YearlyDataPeer::REPORT_ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(YearlyDataPeer::TABLE_NAME);
			}

		} else { // $values is YearlyData object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the yearly_data table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(YearlyDataPeer::TABLE_NAME, $con, YearlyDataPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			YearlyDataPeer::clearInstancePool();
			YearlyDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a YearlyData or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or YearlyData object or primary key or array of primary keys
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
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			YearlyDataPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof YearlyData) { // it's a model object
			// invalidate the cache for this single object
			YearlyDataPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			// primary key is composite; we therefore, expect
			// the primary key passed to be an array of pkey values
			if (count($values) == count($values, COUNT_RECURSIVE)) {
				// array is not multi-dimensional
				$values = array($values);
			}
			foreach ($values as $value) {
				$criterion = $criteria->getNewCriterion(YearlyDataPeer::ORG_ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(YearlyDataPeer::REPORT_ID, $value[1]));
				$criteria->addOr($criterion);
				// we can invalidate the cache for this single PK
				YearlyDataPeer::removeInstanceFromPool($value);
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
			YearlyDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given YearlyData object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      YearlyData $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(YearlyDataPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(YearlyDataPeer::TABLE_NAME);

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

		return BasePeer::doValidate(YearlyDataPeer::DATABASE_NAME, YearlyDataPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve object using using composite pkey values.
	 * @param      int $org_id
	 * @param      int $report_id
	 * @param      PropelPDO $con
	 * @return     YearlyData
	 */
	public static function retrieveByPK($org_id, $report_id, PropelPDO $con = null) {
		$_instancePoolKey = serialize(array((string) $org_id, (string) $report_id));
 		if (null !== ($obj = YearlyDataPeer::getInstanceFromPool($_instancePoolKey))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(YearlyDataPeer::DATABASE_NAME);
		$criteria->add(YearlyDataPeer::ORG_ID, $org_id);
		$criteria->add(YearlyDataPeer::REPORT_ID, $report_id);
		$v = YearlyDataPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} // BaseYearlyDataPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseYearlyDataPeer::buildTableMap();


<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\YearlyDataArchive;
use NewClubsORM\YearlyDataArchivePeer;
use NewClubsORM\map\YearlyDataArchiveTableMap;

/**
 * Base static class for performing query and update operations on the 'yearly_data_archive' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseYearlyDataArchivePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'yearly_data_archive';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\YearlyDataArchive';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.YearlyDataArchive';

	/** the related TableMap class for this table */
	const TM_CLASS = 'YearlyDataArchiveTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 17;

	/** the column name for the ID field */
	const ID = 'yearly_data_archive.ID';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'yearly_data_archive.ORG_ID';

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'yearly_data_archive.REPORT_ID';

	/** the column name for the RECOGNIZED field */
	const RECOGNIZED = 'yearly_data_archive.RECOGNIZED';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'yearly_data_archive.MEMBERS';

	/** the column name for the FALL_PARTICIPATION field */
	const FALL_PARTICIPATION = 'yearly_data_archive.FALL_PARTICIPATION';

	/** the column name for the WINTER_PARTICIPATION field */
	const WINTER_PARTICIPATION = 'yearly_data_archive.WINTER_PARTICIPATION';

	/** the column name for the SPRING_PARTICIPATION field */
	const SPRING_PARTICIPATION = 'yearly_data_archive.SPRING_PARTICIPATION';

	/** the column name for the FALL_FUND field */
	const FALL_FUND = 'yearly_data_archive.FALL_FUND';

	/** the column name for the WINTER_FUND field */
	const WINTER_FUND = 'yearly_data_archive.WINTER_FUND';

	/** the column name for the SPRING_FUND field */
	const SPRING_FUND = 'yearly_data_archive.SPRING_FUND';

	/** the column name for the FALL_CS field */
	const FALL_CS = 'yearly_data_archive.FALL_CS';

	/** the column name for the WINTER_CS field */
	const WINTER_CS = 'yearly_data_archive.WINTER_CS';

	/** the column name for the SPRING_CS field */
	const SPRING_CS = 'yearly_data_archive.SPRING_CS';

	/** the column name for the ACHIEVEMENTS field */
	const ACHIEVEMENTS = 'yearly_data_archive.ACHIEVEMENTS';

	/** the column name for the SUBMITTER field */
	const SUBMITTER = 'yearly_data_archive.SUBMITTER';

	/** the column name for the DATE field */
	const DATE = 'yearly_data_archive.DATE';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of YearlyDataArchive objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array YearlyDataArchive[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'OrgId', 'ReportId', 'Recognized', 'Members', 'FallParticipation', 'WinterParticipation', 'SpringParticipation', 'FallFund', 'WinterFund', 'SpringFund', 'FallCs', 'WinterCs', 'SpringCs', 'Achievements', 'Submitter', 'Date', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'orgId', 'reportId', 'recognized', 'members', 'fallParticipation', 'winterParticipation', 'springParticipation', 'fallFund', 'winterFund', 'springFund', 'fallCs', 'winterCs', 'springCs', 'achievements', 'submitter', 'date', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ORG_ID, self::REPORT_ID, self::RECOGNIZED, self::MEMBERS, self::FALL_PARTICIPATION, self::WINTER_PARTICIPATION, self::SPRING_PARTICIPATION, self::FALL_FUND, self::WINTER_FUND, self::SPRING_FUND, self::FALL_CS, self::WINTER_CS, self::SPRING_CS, self::ACHIEVEMENTS, self::SUBMITTER, self::DATE, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORG_ID', 'REPORT_ID', 'RECOGNIZED', 'MEMBERS', 'FALL_PARTICIPATION', 'WINTER_PARTICIPATION', 'SPRING_PARTICIPATION', 'FALL_FUND', 'WINTER_FUND', 'SPRING_FUND', 'FALL_CS', 'WINTER_CS', 'SPRING_CS', 'ACHIEVEMENTS', 'SUBMITTER', 'DATE', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'org_id', 'report_id', 'recognized', 'members', 'fall_participation', 'winter_participation', 'spring_participation', 'fall_fund', 'winter_fund', 'spring_fund', 'fall_cs', 'winter_cs', 'spring_cs', 'achievements', 'submitter', 'date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OrgId' => 1, 'ReportId' => 2, 'Recognized' => 3, 'Members' => 4, 'FallParticipation' => 5, 'WinterParticipation' => 6, 'SpringParticipation' => 7, 'FallFund' => 8, 'WinterFund' => 9, 'SpringFund' => 10, 'FallCs' => 11, 'WinterCs' => 12, 'SpringCs' => 13, 'Achievements' => 14, 'Submitter' => 15, 'Date' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'orgId' => 1, 'reportId' => 2, 'recognized' => 3, 'members' => 4, 'fallParticipation' => 5, 'winterParticipation' => 6, 'springParticipation' => 7, 'fallFund' => 8, 'winterFund' => 9, 'springFund' => 10, 'fallCs' => 11, 'winterCs' => 12, 'springCs' => 13, 'achievements' => 14, 'submitter' => 15, 'date' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ORG_ID => 1, self::REPORT_ID => 2, self::RECOGNIZED => 3, self::MEMBERS => 4, self::FALL_PARTICIPATION => 5, self::WINTER_PARTICIPATION => 6, self::SPRING_PARTICIPATION => 7, self::FALL_FUND => 8, self::WINTER_FUND => 9, self::SPRING_FUND => 10, self::FALL_CS => 11, self::WINTER_CS => 12, self::SPRING_CS => 13, self::ACHIEVEMENTS => 14, self::SUBMITTER => 15, self::DATE => 16, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORG_ID' => 1, 'REPORT_ID' => 2, 'RECOGNIZED' => 3, 'MEMBERS' => 4, 'FALL_PARTICIPATION' => 5, 'WINTER_PARTICIPATION' => 6, 'SPRING_PARTICIPATION' => 7, 'FALL_FUND' => 8, 'WINTER_FUND' => 9, 'SPRING_FUND' => 10, 'FALL_CS' => 11, 'WINTER_CS' => 12, 'SPRING_CS' => 13, 'ACHIEVEMENTS' => 14, 'SUBMITTER' => 15, 'DATE' => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'org_id' => 1, 'report_id' => 2, 'recognized' => 3, 'members' => 4, 'fall_participation' => 5, 'winter_participation' => 6, 'spring_participation' => 7, 'fall_fund' => 8, 'winter_fund' => 9, 'spring_fund' => 10, 'fall_cs' => 11, 'winter_cs' => 12, 'spring_cs' => 13, 'achievements' => 14, 'submitter' => 15, 'date' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
	 * @param      string $column The column name for current table. (i.e. YearlyDataArchivePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(YearlyDataArchivePeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(YearlyDataArchivePeer::ID);
			$criteria->addSelectColumn(YearlyDataArchivePeer::ORG_ID);
			$criteria->addSelectColumn(YearlyDataArchivePeer::REPORT_ID);
			$criteria->addSelectColumn(YearlyDataArchivePeer::RECOGNIZED);
			$criteria->addSelectColumn(YearlyDataArchivePeer::MEMBERS);
			$criteria->addSelectColumn(YearlyDataArchivePeer::FALL_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataArchivePeer::WINTER_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataArchivePeer::SPRING_PARTICIPATION);
			$criteria->addSelectColumn(YearlyDataArchivePeer::FALL_FUND);
			$criteria->addSelectColumn(YearlyDataArchivePeer::WINTER_FUND);
			$criteria->addSelectColumn(YearlyDataArchivePeer::SPRING_FUND);
			$criteria->addSelectColumn(YearlyDataArchivePeer::FALL_CS);
			$criteria->addSelectColumn(YearlyDataArchivePeer::WINTER_CS);
			$criteria->addSelectColumn(YearlyDataArchivePeer::SPRING_CS);
			$criteria->addSelectColumn(YearlyDataArchivePeer::ACHIEVEMENTS);
			$criteria->addSelectColumn(YearlyDataArchivePeer::SUBMITTER);
			$criteria->addSelectColumn(YearlyDataArchivePeer::DATE);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
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
		$criteria->setPrimaryTableName(YearlyDataArchivePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			YearlyDataArchivePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     YearlyDataArchive
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = YearlyDataArchivePeer::doSelect($critcopy, $con);
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
		return YearlyDataArchivePeer::populateObjects(YearlyDataArchivePeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			YearlyDataArchivePeer::addSelectColumns($criteria);
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
	 * @param      YearlyDataArchive $value A YearlyDataArchive object.
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
	 * @param      mixed $value A YearlyDataArchive object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof YearlyDataArchive) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or YearlyDataArchive object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     YearlyDataArchive Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to yearly_data_archive
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
		$cls = YearlyDataArchivePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = YearlyDataArchivePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = YearlyDataArchivePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				YearlyDataArchivePeer::addInstanceToPool($obj, $key);
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
	 * @return     array (YearlyDataArchive object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = YearlyDataArchivePeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = YearlyDataArchivePeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + YearlyDataArchivePeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = YearlyDataArchivePeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			YearlyDataArchivePeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseYearlyDataArchivePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseYearlyDataArchivePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new YearlyDataArchiveTableMap());
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
		return $withPrefix ? YearlyDataArchivePeer::CLASS_DEFAULT : YearlyDataArchivePeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a YearlyDataArchive or Criteria object.
	 *
	 * @param      mixed $values Criteria or YearlyDataArchive object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from YearlyDataArchive object
		}

		if ($criteria->containsKey(YearlyDataArchivePeer::ID) && $criteria->keyContainsValue(YearlyDataArchivePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.YearlyDataArchivePeer::ID.')');
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
	 * Performs an UPDATE on the database, given a YearlyDataArchive or Criteria object.
	 *
	 * @param      mixed $values Criteria or YearlyDataArchive object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(YearlyDataArchivePeer::ID);
			$value = $criteria->remove(YearlyDataArchivePeer::ID);
			if ($value) {
				$selectCriteria->add(YearlyDataArchivePeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(YearlyDataArchivePeer::TABLE_NAME);
			}

		} else { // $values is YearlyDataArchive object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the yearly_data_archive table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(YearlyDataArchivePeer::TABLE_NAME, $con, YearlyDataArchivePeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			YearlyDataArchivePeer::clearInstancePool();
			YearlyDataArchivePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a YearlyDataArchive or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or YearlyDataArchive object or primary key or array of primary keys
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
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			YearlyDataArchivePeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof YearlyDataArchive) { // it's a model object
			// invalidate the cache for this single object
			YearlyDataArchivePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(YearlyDataArchivePeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				YearlyDataArchivePeer::removeInstanceFromPool($singleval);
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
			YearlyDataArchivePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given YearlyDataArchive object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      YearlyDataArchive $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(YearlyDataArchivePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(YearlyDataArchivePeer::TABLE_NAME);

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

		return BasePeer::doValidate(YearlyDataArchivePeer::DATABASE_NAME, YearlyDataArchivePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     YearlyDataArchive
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = YearlyDataArchivePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(YearlyDataArchivePeer::DATABASE_NAME);
		$criteria->add(YearlyDataArchivePeer::ID, $pk);

		$v = YearlyDataArchivePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(YearlyDataArchivePeer::DATABASE_NAME);
			$criteria->add(YearlyDataArchivePeer::ID, $pks, Criteria::IN);
			$objs = YearlyDataArchivePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseYearlyDataArchivePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseYearlyDataArchivePeer::buildTableMap();


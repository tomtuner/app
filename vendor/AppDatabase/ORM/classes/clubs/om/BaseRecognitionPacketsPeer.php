<?php

namespace ClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use ClubsORM\RecognitionPackets;
use ClubsORM\RecognitionPacketsPeer;
use ClubsORM\map\RecognitionPacketsTableMap;

/**
 * Base static class for performing query and update operations on the 'recognition_packets' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseRecognitionPacketsPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'clubs';

	/** the table name for this class */
	const TABLE_NAME = 'recognition_packets';

	/** the related Propel class for this table */
	const OM_CLASS = 'ClubsORM\\RecognitionPackets';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'clubs.RecognitionPackets';

	/** the related TableMap class for this table */
	const TM_CLASS = 'RecognitionPacketsTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 20;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 20;

	/** the column name for the ID field */
	const ID = 'recognition_packets.ID';

	/** the column name for the YEAR field */
	const YEAR = 'recognition_packets.YEAR';

	/** the column name for the ORGANIZATION_ID field */
	const ORGANIZATION_ID = 'recognition_packets.ORGANIZATION_ID';

	/** the column name for the ADVISOR_LIST_ID field */
	const ADVISOR_LIST_ID = 'recognition_packets.ADVISOR_LIST_ID';

	/** the column name for the OFFICER_LIST_ID field */
	const OFFICER_LIST_ID = 'recognition_packets.OFFICER_LIST_ID';

	/** the column name for the MEMBER_LIST_ID field */
	const MEMBER_LIST_ID = 'recognition_packets.MEMBER_LIST_ID';

	/** the column name for the CLUB_MEETING_ID field */
	const CLUB_MEETING_ID = 'recognition_packets.CLUB_MEETING_ID';

	/** the column name for the CLUB_NAME field */
	const CLUB_NAME = 'recognition_packets.CLUB_NAME';

	/** the column name for the ACRONYM field */
	const ACRONYM = 'recognition_packets.ACRONYM';

	/** the column name for the URL field */
	const URL = 'recognition_packets.URL';

	/** the column name for the EMAIL field */
	const EMAIL = 'recognition_packets.EMAIL';

	/** the column name for the ADVISOR_ID field */
	const ADVISOR_ID = 'recognition_packets.ADVISOR_ID';

	/** the column name for the ADVISOR_OFFICE field */
	const ADVISOR_OFFICE = 'recognition_packets.ADVISOR_OFFICE';

	/** the column name for the ADVISOR_DEPARTMENT field */
	const ADVISOR_DEPARTMENT = 'recognition_packets.ADVISOR_DEPARTMENT';

	/** the column name for the TARGET_MEMBERSHIP field */
	const TARGET_MEMBERSHIP = 'recognition_packets.TARGET_MEMBERSHIP';

	/** the column name for the NUM_MEMBERS field */
	const NUM_MEMBERS = 'recognition_packets.NUM_MEMBERS';

	/** the column name for the FEES field */
	const FEES = 'recognition_packets.FEES';

	/** the column name for the EXPECTED_COSTS_YEAR field */
	const EXPECTED_COSTS_YEAR = 'recognition_packets.EXPECTED_COSTS_YEAR';

	/** the column name for the EXPECTED_COSTS_FUTURE field */
	const EXPECTED_COSTS_FUTURE = 'recognition_packets.EXPECTED_COSTS_FUTURE';

	/** the column name for the PROMO field */
	const PROMO = 'recognition_packets.PROMO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of RecognitionPackets objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array RecognitionPackets[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Year', 'OrganizationId', 'AdvisorListId', 'OfficerListId', 'MemberListId', 'ClubMeetingId', 'ClubName', 'Acronym', 'Url', 'Email', 'AdvisorId', 'AdvisorOffice', 'AdvisorDepartment', 'TargetMembership', 'NumMembers', 'Fees', 'ExpectedCostsYear', 'ExpectedCostsFuture', 'Promo', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'year', 'organizationId', 'advisorListId', 'officerListId', 'memberListId', 'clubMeetingId', 'clubName', 'acronym', 'url', 'email', 'advisorId', 'advisorOffice', 'advisorDepartment', 'targetMembership', 'numMembers', 'fees', 'expectedCostsYear', 'expectedCostsFuture', 'promo', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::YEAR, self::ORGANIZATION_ID, self::ADVISOR_LIST_ID, self::OFFICER_LIST_ID, self::MEMBER_LIST_ID, self::CLUB_MEETING_ID, self::CLUB_NAME, self::ACRONYM, self::URL, self::EMAIL, self::ADVISOR_ID, self::ADVISOR_OFFICE, self::ADVISOR_DEPARTMENT, self::TARGET_MEMBERSHIP, self::NUM_MEMBERS, self::FEES, self::EXPECTED_COSTS_YEAR, self::EXPECTED_COSTS_FUTURE, self::PROMO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'YEAR', 'ORGANIZATION_ID', 'ADVISOR_LIST_ID', 'OFFICER_LIST_ID', 'MEMBER_LIST_ID', 'CLUB_MEETING_ID', 'CLUB_NAME', 'ACRONYM', 'URL', 'EMAIL', 'ADVISOR_ID', 'ADVISOR_OFFICE', 'ADVISOR_DEPARTMENT', 'TARGET_MEMBERSHIP', 'NUM_MEMBERS', 'FEES', 'EXPECTED_COSTS_YEAR', 'EXPECTED_COSTS_FUTURE', 'PROMO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'year', 'organization_id', 'advisor_list_id', 'officer_list_id', 'member_list_id', 'club_meeting_id', 'club_name', 'acronym', 'url', 'email', 'advisor_id', 'advisor_office', 'advisor_department', 'target_membership', 'num_members', 'fees', 'expected_costs_year', 'expected_costs_future', 'promo', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Year' => 1, 'OrganizationId' => 2, 'AdvisorListId' => 3, 'OfficerListId' => 4, 'MemberListId' => 5, 'ClubMeetingId' => 6, 'ClubName' => 7, 'Acronym' => 8, 'Url' => 9, 'Email' => 10, 'AdvisorId' => 11, 'AdvisorOffice' => 12, 'AdvisorDepartment' => 13, 'TargetMembership' => 14, 'NumMembers' => 15, 'Fees' => 16, 'ExpectedCostsYear' => 17, 'ExpectedCostsFuture' => 18, 'Promo' => 19, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'year' => 1, 'organizationId' => 2, 'advisorListId' => 3, 'officerListId' => 4, 'memberListId' => 5, 'clubMeetingId' => 6, 'clubName' => 7, 'acronym' => 8, 'url' => 9, 'email' => 10, 'advisorId' => 11, 'advisorOffice' => 12, 'advisorDepartment' => 13, 'targetMembership' => 14, 'numMembers' => 15, 'fees' => 16, 'expectedCostsYear' => 17, 'expectedCostsFuture' => 18, 'promo' => 19, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::YEAR => 1, self::ORGANIZATION_ID => 2, self::ADVISOR_LIST_ID => 3, self::OFFICER_LIST_ID => 4, self::MEMBER_LIST_ID => 5, self::CLUB_MEETING_ID => 6, self::CLUB_NAME => 7, self::ACRONYM => 8, self::URL => 9, self::EMAIL => 10, self::ADVISOR_ID => 11, self::ADVISOR_OFFICE => 12, self::ADVISOR_DEPARTMENT => 13, self::TARGET_MEMBERSHIP => 14, self::NUM_MEMBERS => 15, self::FEES => 16, self::EXPECTED_COSTS_YEAR => 17, self::EXPECTED_COSTS_FUTURE => 18, self::PROMO => 19, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'YEAR' => 1, 'ORGANIZATION_ID' => 2, 'ADVISOR_LIST_ID' => 3, 'OFFICER_LIST_ID' => 4, 'MEMBER_LIST_ID' => 5, 'CLUB_MEETING_ID' => 6, 'CLUB_NAME' => 7, 'ACRONYM' => 8, 'URL' => 9, 'EMAIL' => 10, 'ADVISOR_ID' => 11, 'ADVISOR_OFFICE' => 12, 'ADVISOR_DEPARTMENT' => 13, 'TARGET_MEMBERSHIP' => 14, 'NUM_MEMBERS' => 15, 'FEES' => 16, 'EXPECTED_COSTS_YEAR' => 17, 'EXPECTED_COSTS_FUTURE' => 18, 'PROMO' => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'year' => 1, 'organization_id' => 2, 'advisor_list_id' => 3, 'officer_list_id' => 4, 'member_list_id' => 5, 'club_meeting_id' => 6, 'club_name' => 7, 'acronym' => 8, 'url' => 9, 'email' => 10, 'advisor_id' => 11, 'advisor_office' => 12, 'advisor_department' => 13, 'target_membership' => 14, 'num_members' => 15, 'fees' => 16, 'expected_costs_year' => 17, 'expected_costs_future' => 18, 'promo' => 19, ),
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
	 * @param      string $column The column name for current table. (i.e. RecognitionPacketsPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RecognitionPacketsPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(RecognitionPacketsPeer::ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::YEAR);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ORGANIZATION_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ADVISOR_LIST_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::OFFICER_LIST_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::MEMBER_LIST_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::CLUB_MEETING_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::CLUB_NAME);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ACRONYM);
			$criteria->addSelectColumn(RecognitionPacketsPeer::URL);
			$criteria->addSelectColumn(RecognitionPacketsPeer::EMAIL);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ADVISOR_ID);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ADVISOR_OFFICE);
			$criteria->addSelectColumn(RecognitionPacketsPeer::ADVISOR_DEPARTMENT);
			$criteria->addSelectColumn(RecognitionPacketsPeer::TARGET_MEMBERSHIP);
			$criteria->addSelectColumn(RecognitionPacketsPeer::NUM_MEMBERS);
			$criteria->addSelectColumn(RecognitionPacketsPeer::FEES);
			$criteria->addSelectColumn(RecognitionPacketsPeer::EXPECTED_COSTS_YEAR);
			$criteria->addSelectColumn(RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE);
			$criteria->addSelectColumn(RecognitionPacketsPeer::PROMO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.YEAR');
			$criteria->addSelectColumn($alias . '.ORGANIZATION_ID');
			$criteria->addSelectColumn($alias . '.ADVISOR_LIST_ID');
			$criteria->addSelectColumn($alias . '.OFFICER_LIST_ID');
			$criteria->addSelectColumn($alias . '.MEMBER_LIST_ID');
			$criteria->addSelectColumn($alias . '.CLUB_MEETING_ID');
			$criteria->addSelectColumn($alias . '.CLUB_NAME');
			$criteria->addSelectColumn($alias . '.ACRONYM');
			$criteria->addSelectColumn($alias . '.URL');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.ADVISOR_ID');
			$criteria->addSelectColumn($alias . '.ADVISOR_OFFICE');
			$criteria->addSelectColumn($alias . '.ADVISOR_DEPARTMENT');
			$criteria->addSelectColumn($alias . '.TARGET_MEMBERSHIP');
			$criteria->addSelectColumn($alias . '.NUM_MEMBERS');
			$criteria->addSelectColumn($alias . '.FEES');
			$criteria->addSelectColumn($alias . '.EXPECTED_COSTS_YEAR');
			$criteria->addSelectColumn($alias . '.EXPECTED_COSTS_FUTURE');
			$criteria->addSelectColumn($alias . '.PROMO');
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
		$criteria->setPrimaryTableName(RecognitionPacketsPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RecognitionPacketsPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     RecognitionPackets
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RecognitionPacketsPeer::doSelect($critcopy, $con);
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
		return RecognitionPacketsPeer::populateObjects(RecognitionPacketsPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RecognitionPacketsPeer::addSelectColumns($criteria);
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
	 * @param      RecognitionPackets $value A RecognitionPackets object.
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
	 * @param      mixed $value A RecognitionPackets object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RecognitionPackets) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RecognitionPackets object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     RecognitionPackets Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to recognition_packets
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
		$cls = RecognitionPacketsPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RecognitionPacketsPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RecognitionPacketsPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RecognitionPacketsPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (RecognitionPackets object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = RecognitionPacketsPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = RecognitionPacketsPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + RecognitionPacketsPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = RecognitionPacketsPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			RecognitionPacketsPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseRecognitionPacketsPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseRecognitionPacketsPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new RecognitionPacketsTableMap());
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
		return $withPrefix ? RecognitionPacketsPeer::CLASS_DEFAULT : RecognitionPacketsPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a RecognitionPackets or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionPackets object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from RecognitionPackets object
		}

		if ($criteria->containsKey(RecognitionPacketsPeer::ID) && $criteria->keyContainsValue(RecognitionPacketsPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RecognitionPacketsPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a RecognitionPackets or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionPackets object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RecognitionPacketsPeer::ID);
			$value = $criteria->remove(RecognitionPacketsPeer::ID);
			if ($value) {
				$selectCriteria->add(RecognitionPacketsPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(RecognitionPacketsPeer::TABLE_NAME);
			}

		} else { // $values is RecognitionPackets object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the recognition_packets table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RecognitionPacketsPeer::TABLE_NAME, $con, RecognitionPacketsPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			RecognitionPacketsPeer::clearInstancePool();
			RecognitionPacketsPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a RecognitionPackets or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or RecognitionPackets object or primary key or array of primary keys
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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RecognitionPacketsPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof RecognitionPackets) { // it's a model object
			// invalidate the cache for this single object
			RecognitionPacketsPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RecognitionPacketsPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				RecognitionPacketsPeer::removeInstanceFromPool($singleval);
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
			RecognitionPacketsPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given RecognitionPackets object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      RecognitionPackets $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecognitionPacketsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecognitionPacketsPeer::TABLE_NAME);

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

		return BasePeer::doValidate(RecognitionPacketsPeer::DATABASE_NAME, RecognitionPacketsPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     RecognitionPackets
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RecognitionPacketsPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RecognitionPacketsPeer::DATABASE_NAME);
		$criteria->add(RecognitionPacketsPeer::ID, $pk);

		$v = RecognitionPacketsPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RecognitionPacketsPeer::DATABASE_NAME);
			$criteria->add(RecognitionPacketsPeer::ID, $pks, Criteria::IN);
			$objs = RecognitionPacketsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRecognitionPacketsPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRecognitionPacketsPeer::buildTableMap();


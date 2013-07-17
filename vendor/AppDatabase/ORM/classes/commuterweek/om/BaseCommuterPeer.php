<?php

namespace CommuterWeekORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use CommuterWeekORM\Commuter;
use CommuterWeekORM\CommuterPeer;
use CommuterWeekORM\DwellingChoicePeer;
use CommuterWeekORM\RitCollegePeer;
use CommuterWeekORM\RoommateTypePeer;
use CommuterWeekORM\map\CommuterTableMap;

/**
 * Base static class for performing query and update operations on the 'commuter' table.
 *
 * 
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseCommuterPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'commuter_week';

	/** the table name for this class */
	const TABLE_NAME = 'commuter';

	/** the related Propel class for this table */
	const OM_CLASS = 'CommuterWeekORM\\Commuter';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'commuterweek.Commuter';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CommuterTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 14;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 14;

	/** the column name for the COMMUTER_ID field */
	const COMMUTER_ID = 'commuter.COMMUTER_ID';

	/** the column name for the FIRST_NAME field */
	const FIRST_NAME = 'commuter.FIRST_NAME';

	/** the column name for the LAST_NAME field */
	const LAST_NAME = 'commuter.LAST_NAME';

	/** the column name for the LOCAL_ADDRESS_ONE field */
	const LOCAL_ADDRESS_ONE = 'commuter.LOCAL_ADDRESS_ONE';

	/** the column name for the LOCAL_ADDRESS_TWO field */
	const LOCAL_ADDRESS_TWO = 'commuter.LOCAL_ADDRESS_TWO';

	/** the column name for the CITY_NAME field */
	const CITY_NAME = 'commuter.CITY_NAME';

	/** the column name for the STATE_CODE field */
	const STATE_CODE = 'commuter.STATE_CODE';

	/** the column name for the ZIP_CODE field */
	const ZIP_CODE = 'commuter.ZIP_CODE';

	/** the column name for the GRADUATION_CLASS_YEAR field */
	const GRADUATION_CLASS_YEAR = 'commuter.GRADUATION_CLASS_YEAR';

	/** the column name for the RIT_COLLEGE_ID field */
	const RIT_COLLEGE_ID = 'commuter.RIT_COLLEGE_ID';

	/** the column name for the APARTMENT_COMPLEX_NAME field */
	const APARTMENT_COMPLEX_NAME = 'commuter.APARTMENT_COMPLEX_NAME';

	/** the column name for the DWELLING_CHOICE_ID field */
	const DWELLING_CHOICE_ID = 'commuter.DWELLING_CHOICE_ID';

	/** the column name for the ROOMMATE_TYPE_ID field */
	const ROOMMATE_TYPE_ID = 'commuter.ROOMMATE_TYPE_ID';

	/** the column name for the EMAIL_ADDRESS field */
	const EMAIL_ADDRESS = 'commuter.EMAIL_ADDRESS';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Commuter objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Commuter[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CommuterId', 'FirstName', 'LastName', 'LocalAddressOne', 'LocalAddressTwo', 'CityName', 'StateCode', 'ZipCode', 'GraduationClassYear', 'RitCollegeId', 'ApartmentComplexName', 'DwellingChoiceId', 'RoommateTypeId', 'EmailAddress', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('commuterId', 'firstName', 'lastName', 'localAddressOne', 'localAddressTwo', 'cityName', 'stateCode', 'zipCode', 'graduationClassYear', 'ritCollegeId', 'apartmentComplexName', 'dwellingChoiceId', 'roommateTypeId', 'emailAddress', ),
		BasePeer::TYPE_COLNAME => array (self::COMMUTER_ID, self::FIRST_NAME, self::LAST_NAME, self::LOCAL_ADDRESS_ONE, self::LOCAL_ADDRESS_TWO, self::CITY_NAME, self::STATE_CODE, self::ZIP_CODE, self::GRADUATION_CLASS_YEAR, self::RIT_COLLEGE_ID, self::APARTMENT_COMPLEX_NAME, self::DWELLING_CHOICE_ID, self::ROOMMATE_TYPE_ID, self::EMAIL_ADDRESS, ),
		BasePeer::TYPE_RAW_COLNAME => array ('COMMUTER_ID', 'FIRST_NAME', 'LAST_NAME', 'LOCAL_ADDRESS_ONE', 'LOCAL_ADDRESS_TWO', 'CITY_NAME', 'STATE_CODE', 'ZIP_CODE', 'GRADUATION_CLASS_YEAR', 'RIT_COLLEGE_ID', 'APARTMENT_COMPLEX_NAME', 'DWELLING_CHOICE_ID', 'ROOMMATE_TYPE_ID', 'EMAIL_ADDRESS', ),
		BasePeer::TYPE_FIELDNAME => array ('commuter_id', 'first_name', 'last_name', 'local_address_one', 'local_address_two', 'city_name', 'state_code', 'zip_code', 'graduation_class_year', 'rit_college_id', 'apartment_complex_name', 'dwelling_choice_id', 'roommate_type_id', 'email_address', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CommuterId' => 0, 'FirstName' => 1, 'LastName' => 2, 'LocalAddressOne' => 3, 'LocalAddressTwo' => 4, 'CityName' => 5, 'StateCode' => 6, 'ZipCode' => 7, 'GraduationClassYear' => 8, 'RitCollegeId' => 9, 'ApartmentComplexName' => 10, 'DwellingChoiceId' => 11, 'RoommateTypeId' => 12, 'EmailAddress' => 13, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('commuterId' => 0, 'firstName' => 1, 'lastName' => 2, 'localAddressOne' => 3, 'localAddressTwo' => 4, 'cityName' => 5, 'stateCode' => 6, 'zipCode' => 7, 'graduationClassYear' => 8, 'ritCollegeId' => 9, 'apartmentComplexName' => 10, 'dwellingChoiceId' => 11, 'roommateTypeId' => 12, 'emailAddress' => 13, ),
		BasePeer::TYPE_COLNAME => array (self::COMMUTER_ID => 0, self::FIRST_NAME => 1, self::LAST_NAME => 2, self::LOCAL_ADDRESS_ONE => 3, self::LOCAL_ADDRESS_TWO => 4, self::CITY_NAME => 5, self::STATE_CODE => 6, self::ZIP_CODE => 7, self::GRADUATION_CLASS_YEAR => 8, self::RIT_COLLEGE_ID => 9, self::APARTMENT_COMPLEX_NAME => 10, self::DWELLING_CHOICE_ID => 11, self::ROOMMATE_TYPE_ID => 12, self::EMAIL_ADDRESS => 13, ),
		BasePeer::TYPE_RAW_COLNAME => array ('COMMUTER_ID' => 0, 'FIRST_NAME' => 1, 'LAST_NAME' => 2, 'LOCAL_ADDRESS_ONE' => 3, 'LOCAL_ADDRESS_TWO' => 4, 'CITY_NAME' => 5, 'STATE_CODE' => 6, 'ZIP_CODE' => 7, 'GRADUATION_CLASS_YEAR' => 8, 'RIT_COLLEGE_ID' => 9, 'APARTMENT_COMPLEX_NAME' => 10, 'DWELLING_CHOICE_ID' => 11, 'ROOMMATE_TYPE_ID' => 12, 'EMAIL_ADDRESS' => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('commuter_id' => 0, 'first_name' => 1, 'last_name' => 2, 'local_address_one' => 3, 'local_address_two' => 4, 'city_name' => 5, 'state_code' => 6, 'zip_code' => 7, 'graduation_class_year' => 8, 'rit_college_id' => 9, 'apartment_complex_name' => 10, 'dwelling_choice_id' => 11, 'roommate_type_id' => 12, 'email_address' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
	 * @param      string $column The column name for current table. (i.e. CommuterPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CommuterPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(CommuterPeer::COMMUTER_ID);
			$criteria->addSelectColumn(CommuterPeer::FIRST_NAME);
			$criteria->addSelectColumn(CommuterPeer::LAST_NAME);
			$criteria->addSelectColumn(CommuterPeer::LOCAL_ADDRESS_ONE);
			$criteria->addSelectColumn(CommuterPeer::LOCAL_ADDRESS_TWO);
			$criteria->addSelectColumn(CommuterPeer::CITY_NAME);
			$criteria->addSelectColumn(CommuterPeer::STATE_CODE);
			$criteria->addSelectColumn(CommuterPeer::ZIP_CODE);
			$criteria->addSelectColumn(CommuterPeer::GRADUATION_CLASS_YEAR);
			$criteria->addSelectColumn(CommuterPeer::RIT_COLLEGE_ID);
			$criteria->addSelectColumn(CommuterPeer::APARTMENT_COMPLEX_NAME);
			$criteria->addSelectColumn(CommuterPeer::DWELLING_CHOICE_ID);
			$criteria->addSelectColumn(CommuterPeer::ROOMMATE_TYPE_ID);
			$criteria->addSelectColumn(CommuterPeer::EMAIL_ADDRESS);
		} else {
			$criteria->addSelectColumn($alias . '.COMMUTER_ID');
			$criteria->addSelectColumn($alias . '.FIRST_NAME');
			$criteria->addSelectColumn($alias . '.LAST_NAME');
			$criteria->addSelectColumn($alias . '.LOCAL_ADDRESS_ONE');
			$criteria->addSelectColumn($alias . '.LOCAL_ADDRESS_TWO');
			$criteria->addSelectColumn($alias . '.CITY_NAME');
			$criteria->addSelectColumn($alias . '.STATE_CODE');
			$criteria->addSelectColumn($alias . '.ZIP_CODE');
			$criteria->addSelectColumn($alias . '.GRADUATION_CLASS_YEAR');
			$criteria->addSelectColumn($alias . '.RIT_COLLEGE_ID');
			$criteria->addSelectColumn($alias . '.APARTMENT_COMPLEX_NAME');
			$criteria->addSelectColumn($alias . '.DWELLING_CHOICE_ID');
			$criteria->addSelectColumn($alias . '.ROOMMATE_TYPE_ID');
			$criteria->addSelectColumn($alias . '.EMAIL_ADDRESS');
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
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Commuter
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CommuterPeer::doSelect($critcopy, $con);
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
		return CommuterPeer::populateObjects(CommuterPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CommuterPeer::addSelectColumns($criteria);
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
	 * @param      Commuter $value A Commuter object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getCommuterId();
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
	 * @param      mixed $value A Commuter object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Commuter) {
				$key = (string) $value->getCommuterId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Commuter object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Commuter Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to commuter
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
		$cls = CommuterPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CommuterPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CommuterPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Commuter object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = CommuterPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = CommuterPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + CommuterPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = CommuterPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			CommuterPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related RoommateType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinRoommateType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related RitCollege table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinRitCollege(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related DwellingChoice table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinDwellingChoice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

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
	 * Selects a collection of Commuter objects pre-filled with their RoommateType objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinRoommateType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol = CommuterPeer::NUM_HYDRATE_COLUMNS;
		RoommateTypePeer::addSelectColumns($criteria);

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = RoommateTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RoommateTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RoommateTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RoommateTypePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Commuter) to $obj2 (RoommateType)
				$obj2->addCommuter($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Commuter objects pre-filled with their RitCollege objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinRitCollege(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol = CommuterPeer::NUM_HYDRATE_COLUMNS;
		RitCollegePeer::addSelectColumns($criteria);

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = RitCollegePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RitCollegePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RitCollegePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RitCollegePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Commuter) to $obj2 (RitCollege)
				$obj2->addCommuter($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Commuter objects pre-filled with their DwellingChoice objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDwellingChoice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol = CommuterPeer::NUM_HYDRATE_COLUMNS;
		DwellingChoicePeer::addSelectColumns($criteria);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DwellingChoicePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DwellingChoicePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DwellingChoicePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DwellingChoicePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Commuter) to $obj2 (DwellingChoice)
				$obj2->addCommuter($obj1);

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
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

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
	 * Selects a collection of Commuter objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol2 = CommuterPeer::NUM_HYDRATE_COLUMNS;

		RoommateTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + RoommateTypePeer::NUM_HYDRATE_COLUMNS;

		RitCollegePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + RitCollegePeer::NUM_HYDRATE_COLUMNS;

		DwellingChoicePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + DwellingChoicePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined RoommateType rows

			$key2 = RoommateTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = RoommateTypePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RoommateTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RoommateTypePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Commuter) to the collection in $obj2 (RoommateType)
				$obj2->addCommuter($obj1);
			} // if joined row not null

			// Add objects for joined RitCollege rows

			$key3 = RitCollegePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = RitCollegePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = RitCollegePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					RitCollegePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Commuter) to the collection in $obj3 (RitCollege)
				$obj3->addCommuter($obj1);
			} // if joined row not null

			// Add objects for joined DwellingChoice rows

			$key4 = DwellingChoicePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = DwellingChoicePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = DwellingChoicePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DwellingChoicePeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Commuter) to the collection in $obj4 (DwellingChoice)
				$obj4->addCommuter($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related RoommateType table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptRoommateType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related RitCollege table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptRitCollege(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related DwellingChoice table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDwellingChoice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CommuterPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

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
	 * Selects a collection of Commuter objects pre-filled with all related objects except RoommateType.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptRoommateType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol2 = CommuterPeer::NUM_HYDRATE_COLUMNS;

		RitCollegePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + RitCollegePeer::NUM_HYDRATE_COLUMNS;

		DwellingChoicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + DwellingChoicePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined RitCollege rows

				$key2 = RitCollegePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RitCollegePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RitCollegePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RitCollegePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj2 (RitCollege)
				$obj2->addCommuter($obj1);

			} // if joined row is not null

				// Add objects for joined DwellingChoice rows

				$key3 = DwellingChoicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DwellingChoicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DwellingChoicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DwellingChoicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj3 (DwellingChoice)
				$obj3->addCommuter($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Commuter objects pre-filled with all related objects except RitCollege.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptRitCollege(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol2 = CommuterPeer::NUM_HYDRATE_COLUMNS;

		RoommateTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + RoommateTypePeer::NUM_HYDRATE_COLUMNS;

		DwellingChoicePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + DwellingChoicePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::DWELLING_CHOICE_ID, DwellingChoicePeer::DWELLING_CHOICE_ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined RoommateType rows

				$key2 = RoommateTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RoommateTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RoommateTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RoommateTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj2 (RoommateType)
				$obj2->addCommuter($obj1);

			} // if joined row is not null

				// Add objects for joined DwellingChoice rows

				$key3 = DwellingChoicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DwellingChoicePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DwellingChoicePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DwellingChoicePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj3 (DwellingChoice)
				$obj3->addCommuter($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Commuter objects pre-filled with all related objects except DwellingChoice.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Commuter objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDwellingChoice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CommuterPeer::addSelectColumns($criteria);
		$startcol2 = CommuterPeer::NUM_HYDRATE_COLUMNS;

		RoommateTypePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + RoommateTypePeer::NUM_HYDRATE_COLUMNS;

		RitCollegePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + RitCollegePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CommuterPeer::ROOMMATE_TYPE_ID, RoommateTypePeer::ROOMMATE_TYPE_ID, $join_behavior);

		$criteria->addJoin(CommuterPeer::RIT_COLLEGE_ID, RitCollegePeer::RIT_COLLEGE_ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CommuterPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CommuterPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CommuterPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CommuterPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined RoommateType rows

				$key2 = RoommateTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RoommateTypePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RoommateTypePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RoommateTypePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj2 (RoommateType)
				$obj2->addCommuter($obj1);

			} // if joined row is not null

				// Add objects for joined RitCollege rows

				$key3 = RitCollegePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = RitCollegePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = RitCollegePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					RitCollegePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Commuter) to the collection in $obj3 (RitCollege)
				$obj3->addCommuter($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
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
	  $dbMap = Propel::getDatabaseMap(BaseCommuterPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCommuterPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CommuterTableMap());
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
		return $withPrefix ? CommuterPeer::CLASS_DEFAULT : CommuterPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Commuter or Criteria object.
	 *
	 * @param      mixed $values Criteria or Commuter object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Commuter object
		}

		if ($criteria->containsKey(CommuterPeer::COMMUTER_ID) && $criteria->keyContainsValue(CommuterPeer::COMMUTER_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CommuterPeer::COMMUTER_ID.')');
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
	 * Performs an UPDATE on the database, given a Commuter or Criteria object.
	 *
	 * @param      mixed $values Criteria or Commuter object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CommuterPeer::COMMUTER_ID);
			$value = $criteria->remove(CommuterPeer::COMMUTER_ID);
			if ($value) {
				$selectCriteria->add(CommuterPeer::COMMUTER_ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(CommuterPeer::TABLE_NAME);
			}

		} else { // $values is Commuter object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the commuter table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CommuterPeer::TABLE_NAME, $con, CommuterPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CommuterPeer::clearInstancePool();
			CommuterPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Commuter or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Commuter object or primary key or array of primary keys
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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			CommuterPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Commuter) { // it's a model object
			// invalidate the cache for this single object
			CommuterPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CommuterPeer::COMMUTER_ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				CommuterPeer::removeInstanceFromPool($singleval);
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
			CommuterPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Commuter object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Commuter $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CommuterPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CommuterPeer::TABLE_NAME);

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

		return BasePeer::doValidate(CommuterPeer::DATABASE_NAME, CommuterPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Commuter
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CommuterPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CommuterPeer::DATABASE_NAME);
		$criteria->add(CommuterPeer::COMMUTER_ID, $pk);

		$v = CommuterPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CommuterPeer::DATABASE_NAME);
			$criteria->add(CommuterPeer::COMMUTER_ID, $pks, Criteria::IN);
			$objs = CommuterPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseCommuterPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCommuterPeer::buildTableMap();


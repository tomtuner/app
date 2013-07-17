<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubDay;
use NewClubsORM\ClubDayPeer;
use NewClubsORM\ClubDayQuery;

/**
 * Base class that represents a query for the 'club_day' table.
 *
 * 
 *
 * @method     ClubDayQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubDayQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ClubDayQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ClubDayQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ClubDayQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     ClubDayQuery orderBySize($order = Criteria::ASC) Order by the size column
 *
 * @method     ClubDayQuery groupById() Group by the id column
 * @method     ClubDayQuery groupByDate() Group by the date column
 * @method     ClubDayQuery groupByLocation() Group by the location column
 * @method     ClubDayQuery groupByStartTime() Group by the start_time column
 * @method     ClubDayQuery groupByEndTime() Group by the end_time column
 * @method     ClubDayQuery groupBySize() Group by the size column
 *
 * @method     ClubDayQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubDayQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubDayQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubDay findOne(PropelPDO $con = null) Return the first ClubDay matching the query
 * @method     ClubDay findOneOrCreate(PropelPDO $con = null) Return the first ClubDay matching the query, or a new ClubDay object populated from the query conditions when no match is found
 *
 * @method     ClubDay findOneById(int $id) Return the first ClubDay filtered by the id column
 * @method     ClubDay findOneByDate(string $date) Return the first ClubDay filtered by the date column
 * @method     ClubDay findOneByLocation(string $location) Return the first ClubDay filtered by the location column
 * @method     ClubDay findOneByStartTime(string $start_time) Return the first ClubDay filtered by the start_time column
 * @method     ClubDay findOneByEndTime(string $end_time) Return the first ClubDay filtered by the end_time column
 * @method     ClubDay findOneBySize(int $size) Return the first ClubDay filtered by the size column
 *
 * @method     array findById(int $id) Return ClubDay objects filtered by the id column
 * @method     array findByDate(string $date) Return ClubDay objects filtered by the date column
 * @method     array findByLocation(string $location) Return ClubDay objects filtered by the location column
 * @method     array findByStartTime(string $start_time) Return ClubDay objects filtered by the start_time column
 * @method     array findByEndTime(string $end_time) Return ClubDay objects filtered by the end_time column
 * @method     array findBySize(int $size) Return ClubDay objects filtered by the size column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubDayQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubDayQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubDay', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubDayQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubDayQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubDayQuery) {
			return $criteria;
		}
		$query = new ClubDayQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClubDay|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubDayPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubDayPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    ClubDay A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DATE`, `LOCATION`, `START_TIME`, `END_TIME`, `SIZE` FROM `club_day` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new ClubDay();
			$obj->hydrate($row);
			ClubDayPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    ClubDay|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubDayPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubDayPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubDayPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
	 * $query->filterByDate('now'); // WHERE date = '2011-03-14'
	 * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $date The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(ClubDayPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(ClubDayPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubDayPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the location column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
	 * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $location The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByLocation($location = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($location)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $location)) {
				$location = str_replace('*', '%', $location);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubDayPeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the start_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStartTime('fooValue');   // WHERE start_time = 'fooValue'
	 * $query->filterByStartTime('%fooValue%'); // WHERE start_time LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $startTime The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByStartTime($startTime = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($startTime)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $startTime)) {
				$startTime = str_replace('*', '%', $startTime);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubDayPeer::START_TIME, $startTime, $comparison);
	}

	/**
	 * Filter the query on the end_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEndTime('fooValue');   // WHERE end_time = 'fooValue'
	 * $query->filterByEndTime('%fooValue%'); // WHERE end_time LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $endTime The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterByEndTime($endTime = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($endTime)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $endTime)) {
				$endTime = str_replace('*', '%', $endTime);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubDayPeer::END_TIME, $endTime, $comparison);
	}

	/**
	 * Filter the query on the size column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySize(1234); // WHERE size = 1234
	 * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
	 * $query->filterBySize(array('min' => 12)); // WHERE size > 12
	 * </code>
	 *
	 * @param     mixed $size The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function filterBySize($size = null, $comparison = null)
	{
		if (is_array($size)) {
			$useMinMax = false;
			if (isset($size['min'])) {
				$this->addUsingAlias(ClubDayPeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($size['max'])) {
				$this->addUsingAlias(ClubDayPeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubDayPeer::SIZE, $size, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubDay $clubDay Object to remove from the list of results
	 *
	 * @return    ClubDayQuery The current query, for fluid interface
	 */
	public function prune($clubDay = null)
	{
		if ($clubDay) {
			$this->addUsingAlias(ClubDayPeer::ID, $clubDay->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubDayQuery
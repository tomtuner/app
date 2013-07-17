<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Evrdates;
use NewClubsORM\EvrdatesPeer;
use NewClubsORM\EvrdatesQuery;

/**
 * Base class that represents a query for the 'evrdates' table.
 *
 * 
 *
 * @method     EvrdatesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EvrdatesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     EvrdatesQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     EvrdatesQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     EvrdatesQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     EvrdatesQuery orderByYear($order = Criteria::ASC) Order by the year column
 *
 * @method     EvrdatesQuery groupById() Group by the id column
 * @method     EvrdatesQuery groupByDate() Group by the date column
 * @method     EvrdatesQuery groupByStartTime() Group by the start_time column
 * @method     EvrdatesQuery groupByEndTime() Group by the end_time column
 * @method     EvrdatesQuery groupByLocation() Group by the location column
 * @method     EvrdatesQuery groupByYear() Group by the year column
 *
 * @method     EvrdatesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EvrdatesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EvrdatesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Evrdates findOne(PropelPDO $con = null) Return the first Evrdates matching the query
 * @method     Evrdates findOneOrCreate(PropelPDO $con = null) Return the first Evrdates matching the query, or a new Evrdates object populated from the query conditions when no match is found
 *
 * @method     Evrdates findOneById(int $id) Return the first Evrdates filtered by the id column
 * @method     Evrdates findOneByDate(string $date) Return the first Evrdates filtered by the date column
 * @method     Evrdates findOneByStartTime(string $start_time) Return the first Evrdates filtered by the start_time column
 * @method     Evrdates findOneByEndTime(string $end_time) Return the first Evrdates filtered by the end_time column
 * @method     Evrdates findOneByLocation(string $location) Return the first Evrdates filtered by the location column
 * @method     Evrdates findOneByYear(string $year) Return the first Evrdates filtered by the year column
 *
 * @method     array findById(int $id) Return Evrdates objects filtered by the id column
 * @method     array findByDate(string $date) Return Evrdates objects filtered by the date column
 * @method     array findByStartTime(string $start_time) Return Evrdates objects filtered by the start_time column
 * @method     array findByEndTime(string $end_time) Return Evrdates objects filtered by the end_time column
 * @method     array findByLocation(string $location) Return Evrdates objects filtered by the location column
 * @method     array findByYear(string $year) Return Evrdates objects filtered by the year column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseEvrdatesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEvrdatesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Evrdates', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EvrdatesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EvrdatesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EvrdatesQuery) {
			return $criteria;
		}
		$query = new EvrdatesQuery();
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
	 * @return    Evrdates|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EvrdatesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EvrdatesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Evrdates A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DATE`, `START_TIME`, `END_TIME`, `LOCATION`, `YEAR` FROM `evrdates` WHERE `ID` = :p0';
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
			$obj = new Evrdates();
			$obj->hydrate($row);
			EvrdatesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Evrdates|array|mixed the result, formatted by the current formatter
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
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EvrdatesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EvrdatesPeer::ID, $keys, Criteria::IN);
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
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EvrdatesPeer::ID, $id, $comparison);
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
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(EvrdatesPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(EvrdatesPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EvrdatesPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the start_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStartTime('2011-03-14'); // WHERE start_time = '2011-03-14'
	 * $query->filterByStartTime('now'); // WHERE start_time = '2011-03-14'
	 * $query->filterByStartTime(array('max' => 'yesterday')); // WHERE start_time > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $startTime The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByStartTime($startTime = null, $comparison = null)
	{
		if (is_array($startTime)) {
			$useMinMax = false;
			if (isset($startTime['min'])) {
				$this->addUsingAlias(EvrdatesPeer::START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startTime['max'])) {
				$this->addUsingAlias(EvrdatesPeer::START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EvrdatesPeer::START_TIME, $startTime, $comparison);
	}

	/**
	 * Filter the query on the end_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEndTime('2011-03-14'); // WHERE end_time = '2011-03-14'
	 * $query->filterByEndTime('now'); // WHERE end_time = '2011-03-14'
	 * $query->filterByEndTime(array('max' => 'yesterday')); // WHERE end_time > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $endTime The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByEndTime($endTime = null, $comparison = null)
	{
		if (is_array($endTime)) {
			$useMinMax = false;
			if (isset($endTime['min'])) {
				$this->addUsingAlias(EvrdatesPeer::END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endTime['max'])) {
				$this->addUsingAlias(EvrdatesPeer::END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EvrdatesPeer::END_TIME, $endTime, $comparison);
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
	 * @return    EvrdatesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EvrdatesPeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByYear('fooValue');   // WHERE year = 'fooValue'
	 * $query->filterByYear('%fooValue%'); // WHERE year LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $year The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($year)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $year)) {
				$year = str_replace('*', '%', $year);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EvrdatesPeer::YEAR, $year, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Evrdates $evrdates Object to remove from the list of results
	 *
	 * @return    EvrdatesQuery The current query, for fluid interface
	 */
	public function prune($evrdates = null)
	{
		if ($evrdates) {
			$this->addUsingAlias(EvrdatesPeer::ID, $evrdates->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEvrdatesQuery
<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Log;
use NewClubsORM\LogPeer;
use NewClubsORM\LogQuery;

/**
 * Base class that represents a query for the 'log' table.
 *
 * 
 *
 * @method     LogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LogQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     LogQuery orderByMode($order = Criteria::ASC) Order by the mode column
 * @method     LogQuery orderByPage($order = Criteria::ASC) Order by the page column
 * @method     LogQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     LogQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     LogQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     LogQuery groupById() Group by the id column
 * @method     LogQuery groupByUserid() Group by the userid column
 * @method     LogQuery groupByMode() Group by the mode column
 * @method     LogQuery groupByPage() Group by the page column
 * @method     LogQuery groupByData() Group by the data column
 * @method     LogQuery groupByDate() Group by the date column
 * @method     LogQuery groupByTime() Group by the time column
 *
 * @method     LogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Log findOne(PropelPDO $con = null) Return the first Log matching the query
 * @method     Log findOneOrCreate(PropelPDO $con = null) Return the first Log matching the query, or a new Log object populated from the query conditions when no match is found
 *
 * @method     Log findOneById(int $id) Return the first Log filtered by the id column
 * @method     Log findOneByUserid(string $userid) Return the first Log filtered by the userid column
 * @method     Log findOneByMode(string $mode) Return the first Log filtered by the mode column
 * @method     Log findOneByPage(string $page) Return the first Log filtered by the page column
 * @method     Log findOneByData(string $data) Return the first Log filtered by the data column
 * @method     Log findOneByDate(string $date) Return the first Log filtered by the date column
 * @method     Log findOneByTime(string $time) Return the first Log filtered by the time column
 *
 * @method     array findById(int $id) Return Log objects filtered by the id column
 * @method     array findByUserid(string $userid) Return Log objects filtered by the userid column
 * @method     array findByMode(string $mode) Return Log objects filtered by the mode column
 * @method     array findByPage(string $page) Return Log objects filtered by the page column
 * @method     array findByData(string $data) Return Log objects filtered by the data column
 * @method     array findByDate(string $date) Return Log objects filtered by the date column
 * @method     array findByTime(string $time) Return Log objects filtered by the time column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseLogQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Log', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LogQuery) {
			return $criteria;
		}
		$query = new LogQuery();
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
	 * @return    Log|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Log A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USERID`, `MODE`, `PAGE`, `DATA`, `DATE`, `TIME` FROM `log` WHERE `ID` = :p0';
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
			$obj = new Log();
			$obj->hydrate($row);
			LogPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Log|array|mixed the result, formatted by the current formatter
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
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LogPeer::ID, $keys, Criteria::IN);
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
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(LogPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(LogPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the userid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserid('fooValue');   // WHERE userid = 'fooValue'
	 * $query->filterByUserid('%fooValue%'); // WHERE userid LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $userid The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userid)) {
				$userid = str_replace('*', '%', $userid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the mode column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMode('fooValue');   // WHERE mode = 'fooValue'
	 * $query->filterByMode('%fooValue%'); // WHERE mode LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mode The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByMode($mode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mode)) {
				$mode = str_replace('*', '%', $mode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogPeer::MODE, $mode, $comparison);
	}

	/**
	 * Filter the query on the page column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPage('fooValue');   // WHERE page = 'fooValue'
	 * $query->filterByPage('%fooValue%'); // WHERE page LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $page The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByPage($page = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($page)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $page)) {
				$page = str_replace('*', '%', $page);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogPeer::PAGE, $page, $comparison);
	}

	/**
	 * Filter the query on the data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
	 * $query->filterByData('%fooValue%'); // WHERE data LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $data The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($data)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $data)) {
				$data = str_replace('*', '%', $data);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LogPeer::DATA, $data, $comparison);
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
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(LogPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(LogPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LogPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTime('2011-03-14'); // WHERE time = '2011-03-14'
	 * $query->filterByTime('now'); // WHERE time = '2011-03-14'
	 * $query->filterByTime(array('max' => 'yesterday')); // WHERE time > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $time The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByTime($time = null, $comparison = null)
	{
		if (is_array($time)) {
			$useMinMax = false;
			if (isset($time['min'])) {
				$this->addUsingAlias(LogPeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($time['max'])) {
				$this->addUsingAlias(LogPeer::TIME, $time['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LogPeer::TIME, $time, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Log $log Object to remove from the list of results
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function prune($log = null)
	{
		if ($log) {
			$this->addUsingAlias(LogPeer::ID, $log->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLogQuery
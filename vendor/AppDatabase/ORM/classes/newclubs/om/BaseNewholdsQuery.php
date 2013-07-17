<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Newholds;
use NewClubsORM\NewholdsPeer;
use NewClubsORM\NewholdsQuery;

/**
 * Base class that represents a query for the 'newholds' table.
 *
 * 
 *
 * @method     NewholdsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewholdsQuery orderByClubId($order = Criteria::ASC) Order by the club_id column
 * @method     NewholdsQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     NewholdsQuery orderByBeginDate($order = Criteria::ASC) Order by the begin_date column
 * @method     NewholdsQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     NewholdsQuery orderByRestricted($order = Criteria::ASC) Order by the restricted column
 *
 * @method     NewholdsQuery groupById() Group by the id column
 * @method     NewholdsQuery groupByClubId() Group by the club_id column
 * @method     NewholdsQuery groupByReason() Group by the reason column
 * @method     NewholdsQuery groupByBeginDate() Group by the begin_date column
 * @method     NewholdsQuery groupByEndDate() Group by the end_date column
 * @method     NewholdsQuery groupByRestricted() Group by the restricted column
 *
 * @method     NewholdsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewholdsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewholdsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Newholds findOne(PropelPDO $con = null) Return the first Newholds matching the query
 * @method     Newholds findOneOrCreate(PropelPDO $con = null) Return the first Newholds matching the query, or a new Newholds object populated from the query conditions when no match is found
 *
 * @method     Newholds findOneById(int $id) Return the first Newholds filtered by the id column
 * @method     Newholds findOneByClubId(int $club_id) Return the first Newholds filtered by the club_id column
 * @method     Newholds findOneByReason(string $reason) Return the first Newholds filtered by the reason column
 * @method     Newholds findOneByBeginDate(string $begin_date) Return the first Newholds filtered by the begin_date column
 * @method     Newholds findOneByEndDate(string $end_date) Return the first Newholds filtered by the end_date column
 * @method     Newholds findOneByRestricted(int $restricted) Return the first Newholds filtered by the restricted column
 *
 * @method     array findById(int $id) Return Newholds objects filtered by the id column
 * @method     array findByClubId(int $club_id) Return Newholds objects filtered by the club_id column
 * @method     array findByReason(string $reason) Return Newholds objects filtered by the reason column
 * @method     array findByBeginDate(string $begin_date) Return Newholds objects filtered by the begin_date column
 * @method     array findByEndDate(string $end_date) Return Newholds objects filtered by the end_date column
 * @method     array findByRestricted(int $restricted) Return Newholds objects filtered by the restricted column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseNewholdsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNewholdsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Newholds', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewholdsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewholdsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewholdsQuery) {
			return $criteria;
		}
		$query = new NewholdsQuery();
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
	 * @return    Newholds|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NewholdsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NewholdsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Newholds A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLUB_ID`, `REASON`, `BEGIN_DATE`, `END_DATE`, `RESTRICTED` FROM `newholds` WHERE `ID` = :p0';
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
			$obj = new Newholds();
			$obj->hydrate($row);
			NewholdsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Newholds|array|mixed the result, formatted by the current formatter
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
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NewholdsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NewholdsPeer::ID, $keys, Criteria::IN);
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
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewholdsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the club_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubId(1234); // WHERE club_id = 1234
	 * $query->filterByClubId(array(12, 34)); // WHERE club_id IN (12, 34)
	 * $query->filterByClubId(array('min' => 12)); // WHERE club_id > 12
	 * </code>
	 *
	 * @param     mixed $clubId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByClubId($clubId = null, $comparison = null)
	{
		if (is_array($clubId)) {
			$useMinMax = false;
			if (isset($clubId['min'])) {
				$this->addUsingAlias(NewholdsPeer::CLUB_ID, $clubId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubId['max'])) {
				$this->addUsingAlias(NewholdsPeer::CLUB_ID, $clubId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewholdsPeer::CLUB_ID, $clubId, $comparison);
	}

	/**
	 * Filter the query on the reason column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReason('fooValue');   // WHERE reason = 'fooValue'
	 * $query->filterByReason('%fooValue%'); // WHERE reason LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reason The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByReason($reason = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reason)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reason)) {
				$reason = str_replace('*', '%', $reason);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewholdsPeer::REASON, $reason, $comparison);
	}

	/**
	 * Filter the query on the begin_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBeginDate('2011-03-14'); // WHERE begin_date = '2011-03-14'
	 * $query->filterByBeginDate('now'); // WHERE begin_date = '2011-03-14'
	 * $query->filterByBeginDate(array('max' => 'yesterday')); // WHERE begin_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $beginDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByBeginDate($beginDate = null, $comparison = null)
	{
		if (is_array($beginDate)) {
			$useMinMax = false;
			if (isset($beginDate['min'])) {
				$this->addUsingAlias(NewholdsPeer::BEGIN_DATE, $beginDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($beginDate['max'])) {
				$this->addUsingAlias(NewholdsPeer::BEGIN_DATE, $beginDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewholdsPeer::BEGIN_DATE, $beginDate, $comparison);
	}

	/**
	 * Filter the query on the end_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
	 * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
	 * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $endDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByEndDate($endDate = null, $comparison = null)
	{
		if (is_array($endDate)) {
			$useMinMax = false;
			if (isset($endDate['min'])) {
				$this->addUsingAlias(NewholdsPeer::END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endDate['max'])) {
				$this->addUsingAlias(NewholdsPeer::END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewholdsPeer::END_DATE, $endDate, $comparison);
	}

	/**
	 * Filter the query on the restricted column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRestricted(1234); // WHERE restricted = 1234
	 * $query->filterByRestricted(array(12, 34)); // WHERE restricted IN (12, 34)
	 * $query->filterByRestricted(array('min' => 12)); // WHERE restricted > 12
	 * </code>
	 *
	 * @param     mixed $restricted The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function filterByRestricted($restricted = null, $comparison = null)
	{
		if (is_array($restricted)) {
			$useMinMax = false;
			if (isset($restricted['min'])) {
				$this->addUsingAlias(NewholdsPeer::RESTRICTED, $restricted['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($restricted['max'])) {
				$this->addUsingAlias(NewholdsPeer::RESTRICTED, $restricted['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewholdsPeer::RESTRICTED, $restricted, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Newholds $newholds Object to remove from the list of results
	 *
	 * @return    NewholdsQuery The current query, for fluid interface
	 */
	public function prune($newholds = null)
	{
		if ($newholds) {
			$this->addUsingAlias(NewholdsPeer::ID, $newholds->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseNewholdsQuery
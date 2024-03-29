<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Holds;
use NewClubsORM\HoldsPeer;
use NewClubsORM\HoldsQuery;

/**
 * Base class that represents a query for the 'holds' table.
 *
 * 
 *
 * @method     HoldsQuery orderByHoldId($order = Criteria::ASC) Order by the hold_id column
 * @method     HoldsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     HoldsQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     HoldsQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     HoldsQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 *
 * @method     HoldsQuery groupByHoldId() Group by the hold_id column
 * @method     HoldsQuery groupByOrgId() Group by the org_id column
 * @method     HoldsQuery groupByStartDate() Group by the start_date column
 * @method     HoldsQuery groupByReason() Group by the reason column
 * @method     HoldsQuery groupByEndDate() Group by the end_date column
 *
 * @method     HoldsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HoldsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HoldsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Holds findOne(PropelPDO $con = null) Return the first Holds matching the query
 * @method     Holds findOneOrCreate(PropelPDO $con = null) Return the first Holds matching the query, or a new Holds object populated from the query conditions when no match is found
 *
 * @method     Holds findOneByHoldId(int $hold_id) Return the first Holds filtered by the hold_id column
 * @method     Holds findOneByOrgId(int $org_id) Return the first Holds filtered by the org_id column
 * @method     Holds findOneByStartDate(string $start_date) Return the first Holds filtered by the start_date column
 * @method     Holds findOneByReason(string $reason) Return the first Holds filtered by the reason column
 * @method     Holds findOneByEndDate(string $end_date) Return the first Holds filtered by the end_date column
 *
 * @method     array findByHoldId(int $hold_id) Return Holds objects filtered by the hold_id column
 * @method     array findByOrgId(int $org_id) Return Holds objects filtered by the org_id column
 * @method     array findByStartDate(string $start_date) Return Holds objects filtered by the start_date column
 * @method     array findByReason(string $reason) Return Holds objects filtered by the reason column
 * @method     array findByEndDate(string $end_date) Return Holds objects filtered by the end_date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseHoldsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseHoldsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Holds', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new HoldsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    HoldsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof HoldsQuery) {
			return $criteria;
		}
		$query = new HoldsQuery();
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
	 * @return    Holds|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = HoldsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(HoldsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Holds A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `HOLD_ID`, `ORG_ID`, `START_DATE`, `REASON`, `END_DATE` FROM `holds` WHERE `HOLD_ID` = :p0';
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
			$obj = new Holds();
			$obj->hydrate($row);
			HoldsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Holds|array|mixed the result, formatted by the current formatter
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
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(HoldsPeer::HOLD_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(HoldsPeer::HOLD_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the hold_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHoldId(1234); // WHERE hold_id = 1234
	 * $query->filterByHoldId(array(12, 34)); // WHERE hold_id IN (12, 34)
	 * $query->filterByHoldId(array('min' => 12)); // WHERE hold_id > 12
	 * </code>
	 *
	 * @param     mixed $holdId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByHoldId($holdId = null, $comparison = null)
	{
		if (is_array($holdId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(HoldsPeer::HOLD_ID, $holdId, $comparison);
	}

	/**
	 * Filter the query on the org_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrgId(1234); // WHERE org_id = 1234
	 * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
	 * $query->filterByOrgId(array('min' => 12)); // WHERE org_id > 12
	 * </code>
	 *
	 * @param     mixed $orgId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(HoldsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(HoldsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the start_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStartDate('2011-03-14'); // WHERE start_date = '2011-03-14'
	 * $query->filterByStartDate('now'); // WHERE start_date = '2011-03-14'
	 * $query->filterByStartDate(array('max' => 'yesterday')); // WHERE start_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $startDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByStartDate($startDate = null, $comparison = null)
	{
		if (is_array($startDate)) {
			$useMinMax = false;
			if (isset($startDate['min'])) {
				$this->addUsingAlias(HoldsPeer::START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startDate['max'])) {
				$this->addUsingAlias(HoldsPeer::START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::START_DATE, $startDate, $comparison);
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
	 * @return    HoldsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(HoldsPeer::REASON, $reason, $comparison);
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
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByEndDate($endDate = null, $comparison = null)
	{
		if (is_array($endDate)) {
			$useMinMax = false;
			if (isset($endDate['min'])) {
				$this->addUsingAlias(HoldsPeer::END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endDate['max'])) {
				$this->addUsingAlias(HoldsPeer::END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::END_DATE, $endDate, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Holds $holds Object to remove from the list of results
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function prune($holds = null)
	{
		if ($holds) {
			$this->addUsingAlias(HoldsPeer::HOLD_ID, $holds->getHoldId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseHoldsQuery
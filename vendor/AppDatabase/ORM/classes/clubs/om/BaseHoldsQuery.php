<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\Holds;
use ClubsORM\HoldsPeer;
use ClubsORM\HoldsQuery;

/**
 * Base class that represents a query for the 'holds' table.
 *
 * 
 *
 * @method     HoldsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     HoldsQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     HoldsQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     HoldsQuery orderByStartAt($order = Criteria::ASC) Order by the start_at column
 * @method     HoldsQuery orderByEndAt($order = Criteria::ASC) Order by the end_at column
 *
 * @method     HoldsQuery groupById() Group by the id column
 * @method     HoldsQuery groupByOrganizationId() Group by the organization_id column
 * @method     HoldsQuery groupByReason() Group by the reason column
 * @method     HoldsQuery groupByStartAt() Group by the start_at column
 * @method     HoldsQuery groupByEndAt() Group by the end_at column
 *
 * @method     HoldsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HoldsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HoldsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Holds findOne(PropelPDO $con = null) Return the first Holds matching the query
 * @method     Holds findOneOrCreate(PropelPDO $con = null) Return the first Holds matching the query, or a new Holds object populated from the query conditions when no match is found
 *
 * @method     Holds findOneById(int $id) Return the first Holds filtered by the id column
 * @method     Holds findOneByOrganizationId(int $organization_id) Return the first Holds filtered by the organization_id column
 * @method     Holds findOneByReason(string $reason) Return the first Holds filtered by the reason column
 * @method     Holds findOneByStartAt(string $start_at) Return the first Holds filtered by the start_at column
 * @method     Holds findOneByEndAt(string $end_at) Return the first Holds filtered by the end_at column
 *
 * @method     array findById(int $id) Return Holds objects filtered by the id column
 * @method     array findByOrganizationId(int $organization_id) Return Holds objects filtered by the organization_id column
 * @method     array findByReason(string $reason) Return Holds objects filtered by the reason column
 * @method     array findByStartAt(string $start_at) Return Holds objects filtered by the start_at column
 * @method     array findByEndAt(string $end_at) Return Holds objects filtered by the end_at column
 *
 * @package    propel.generator.clubs.om
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
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\Holds', $modelAlias = null)
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
		$sql = 'SELECT `ID`, `ORGANIZATION_ID`, `REASON`, `START_AT`, `END_AT` FROM `holds` WHERE `ID` = :p0';
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
		return $this->addUsingAlias(HoldsPeer::ID, $key, Criteria::EQUAL);
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
		return $this->addUsingAlias(HoldsPeer::ID, $keys, Criteria::IN);
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
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(HoldsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(HoldsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the organization_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrganizationId(1234); // WHERE organization_id = 1234
	 * $query->filterByOrganizationId(array(12, 34)); // WHERE organization_id IN (12, 34)
	 * $query->filterByOrganizationId(array('min' => 12)); // WHERE organization_id > 12
	 * </code>
	 *
	 * @param     mixed $organizationId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(HoldsPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(HoldsPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::ORGANIZATION_ID, $organizationId, $comparison);
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
	 * Filter the query on the start_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStartAt('2011-03-14'); // WHERE start_at = '2011-03-14'
	 * $query->filterByStartAt('now'); // WHERE start_at = '2011-03-14'
	 * $query->filterByStartAt(array('max' => 'yesterday')); // WHERE start_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $startAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByStartAt($startAt = null, $comparison = null)
	{
		if (is_array($startAt)) {
			$useMinMax = false;
			if (isset($startAt['min'])) {
				$this->addUsingAlias(HoldsPeer::START_AT, $startAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startAt['max'])) {
				$this->addUsingAlias(HoldsPeer::START_AT, $startAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::START_AT, $startAt, $comparison);
	}

	/**
	 * Filter the query on the end_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEndAt('2011-03-14'); // WHERE end_at = '2011-03-14'
	 * $query->filterByEndAt('now'); // WHERE end_at = '2011-03-14'
	 * $query->filterByEndAt(array('max' => 'yesterday')); // WHERE end_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $endAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HoldsQuery The current query, for fluid interface
	 */
	public function filterByEndAt($endAt = null, $comparison = null)
	{
		if (is_array($endAt)) {
			$useMinMax = false;
			if (isset($endAt['min'])) {
				$this->addUsingAlias(HoldsPeer::END_AT, $endAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endAt['max'])) {
				$this->addUsingAlias(HoldsPeer::END_AT, $endAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HoldsPeer::END_AT, $endAt, $comparison);
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
			$this->addUsingAlias(HoldsPeer::ID, $holds->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseHoldsQuery
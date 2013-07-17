<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Memberlog;
use NewClubsORM\MemberlogPeer;
use NewClubsORM\MemberlogQuery;

/**
 * Base class that represents a query for the 'memberlog' table.
 *
 * 
 *
 * @method     MemberlogQuery orderByLogId($order = Criteria::ASC) Order by the log_id column
 * @method     MemberlogQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     MemberlogQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     MemberlogQuery orderByPositionId($order = Criteria::ASC) Order by the position_id column
 * @method     MemberlogQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     MemberlogQuery groupByLogId() Group by the log_id column
 * @method     MemberlogQuery groupByUserId() Group by the user_id column
 * @method     MemberlogQuery groupByOrgId() Group by the org_id column
 * @method     MemberlogQuery groupByPositionId() Group by the position_id column
 * @method     MemberlogQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     MemberlogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MemberlogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MemberlogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Memberlog findOne(PropelPDO $con = null) Return the first Memberlog matching the query
 * @method     Memberlog findOneOrCreate(PropelPDO $con = null) Return the first Memberlog matching the query, or a new Memberlog object populated from the query conditions when no match is found
 *
 * @method     Memberlog findOneByLogId(int $log_id) Return the first Memberlog filtered by the log_id column
 * @method     Memberlog findOneByUserId(int $user_id) Return the first Memberlog filtered by the user_id column
 * @method     Memberlog findOneByOrgId(int $org_id) Return the first Memberlog filtered by the org_id column
 * @method     Memberlog findOneByPositionId(int $position_id) Return the first Memberlog filtered by the position_id column
 * @method     Memberlog findOneByTimestamp(double $timestamp) Return the first Memberlog filtered by the timestamp column
 *
 * @method     array findByLogId(int $log_id) Return Memberlog objects filtered by the log_id column
 * @method     array findByUserId(int $user_id) Return Memberlog objects filtered by the user_id column
 * @method     array findByOrgId(int $org_id) Return Memberlog objects filtered by the org_id column
 * @method     array findByPositionId(int $position_id) Return Memberlog objects filtered by the position_id column
 * @method     array findByTimestamp(double $timestamp) Return Memberlog objects filtered by the timestamp column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseMemberlogQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMemberlogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Memberlog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MemberlogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MemberlogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MemberlogQuery) {
			return $criteria;
		}
		$query = new MemberlogQuery();
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
	 * @return    Memberlog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MemberlogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MemberlogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Memberlog A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `LOG_ID`, `USER_ID`, `ORG_ID`, `POSITION_ID`, `TIMESTAMP` FROM `memberlog` WHERE `LOG_ID` = :p0';
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
			$obj = new Memberlog();
			$obj->hydrate($row);
			MemberlogPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Memberlog|array|mixed the result, formatted by the current formatter
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
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MemberlogPeer::LOG_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MemberlogPeer::LOG_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the log_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLogId(1234); // WHERE log_id = 1234
	 * $query->filterByLogId(array(12, 34)); // WHERE log_id IN (12, 34)
	 * $query->filterByLogId(array('min' => 12)); // WHERE log_id > 12
	 * </code>
	 *
	 * @param     mixed $logId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByLogId($logId = null, $comparison = null)
	{
		if (is_array($logId)) {
			$useMinMax = false;
			if (isset($logId['min'])) {
				$this->addUsingAlias(MemberlogPeer::LOG_ID, $logId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($logId['max'])) {
				$this->addUsingAlias(MemberlogPeer::LOG_ID, $logId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlogPeer::LOG_ID, $logId, $comparison);
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(MemberlogPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(MemberlogPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlogPeer::USER_ID, $userId, $comparison);
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
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(MemberlogPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(MemberlogPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlogPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the position_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPositionId(1234); // WHERE position_id = 1234
	 * $query->filterByPositionId(array(12, 34)); // WHERE position_id IN (12, 34)
	 * $query->filterByPositionId(array('min' => 12)); // WHERE position_id > 12
	 * </code>
	 *
	 * @param     mixed $positionId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByPositionId($positionId = null, $comparison = null)
	{
		if (is_array($positionId)) {
			$useMinMax = false;
			if (isset($positionId['min'])) {
				$this->addUsingAlias(MemberlogPeer::POSITION_ID, $positionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($positionId['max'])) {
				$this->addUsingAlias(MemberlogPeer::POSITION_ID, $positionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlogPeer::POSITION_ID, $positionId, $comparison);
	}

	/**
	 * Filter the query on the timestamp column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTimestamp(1234); // WHERE timestamp = 1234
	 * $query->filterByTimestamp(array(12, 34)); // WHERE timestamp IN (12, 34)
	 * $query->filterByTimestamp(array('min' => 12)); // WHERE timestamp > 12
	 * </code>
	 *
	 * @param     mixed $timestamp The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function filterByTimestamp($timestamp = null, $comparison = null)
	{
		if (is_array($timestamp)) {
			$useMinMax = false;
			if (isset($timestamp['min'])) {
				$this->addUsingAlias(MemberlogPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestamp['max'])) {
				$this->addUsingAlias(MemberlogPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlogPeer::TIMESTAMP, $timestamp, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Memberlog $memberlog Object to remove from the list of results
	 *
	 * @return    MemberlogQuery The current query, for fluid interface
	 */
	public function prune($memberlog = null)
	{
		if ($memberlog) {
			$this->addUsingAlias(MemberlogPeer::LOG_ID, $memberlog->getLogId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMemberlogQuery
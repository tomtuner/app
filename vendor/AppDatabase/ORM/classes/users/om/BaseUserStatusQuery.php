<?php

namespace UsersORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use UsersORM\UserStatus;
use UsersORM\UserStatusPeer;
use UsersORM\UserStatusQuery;

/**
 * Base class that represents a query for the 'user_status' table.
 *
 * 
 *
 * @method     UserStatusQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     UserStatusQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     UserStatusQuery orderByVerified($order = Criteria::ASC) Order by the Verified column
 *
 * @method     UserStatusQuery groupByUserId() Group by the user_id column
 * @method     UserStatusQuery groupByStatusId() Group by the status_id column
 * @method     UserStatusQuery groupByVerified() Group by the Verified column
 *
 * @method     UserStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserStatus findOne(PropelPDO $con = null) Return the first UserStatus matching the query
 * @method     UserStatus findOneOrCreate(PropelPDO $con = null) Return the first UserStatus matching the query, or a new UserStatus object populated from the query conditions when no match is found
 *
 * @method     UserStatus findOneByUserId(int $user_id) Return the first UserStatus filtered by the user_id column
 * @method     UserStatus findOneByStatusId(int $status_id) Return the first UserStatus filtered by the status_id column
 * @method     UserStatus findOneByVerified(int $Verified) Return the first UserStatus filtered by the Verified column
 *
 * @method     array findByUserId(int $user_id) Return UserStatus objects filtered by the user_id column
 * @method     array findByStatusId(int $status_id) Return UserStatus objects filtered by the status_id column
 * @method     array findByVerified(int $Verified) Return UserStatus objects filtered by the Verified column
 *
 * @package    propel.generator.users.om
 */
abstract class BaseUserStatusQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUserStatusQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'users', $modelName = 'UsersORM\\UserStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserStatusQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserStatusQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserStatusQuery) {
			return $criteria;
		}
		$query = new UserStatusQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$user_id, $status_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    UserStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UserStatusPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UserStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    UserStatus A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `STATUS_ID`, `VERIFIED` FROM `user_status` WHERE `USER_ID` = :p0 AND `STATUS_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new UserStatus();
			$obj->hydrate($row);
			UserStatusPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    UserStatus|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(UserStatusPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(UserStatusPeer::STATUS_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(UserStatusPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(UserStatusPeer::STATUS_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(UserStatusPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(UserStatusPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserStatusPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatusId(1234); // WHERE status_id = 1234
	 * $query->filterByStatusId(array(12, 34)); // WHERE status_id IN (12, 34)
	 * $query->filterByStatusId(array('min' => 12)); // WHERE status_id > 12
	 * </code>
	 *
	 * @param     mixed $statusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function filterByStatusId($statusId = null, $comparison = null)
	{
		if (is_array($statusId)) {
			$useMinMax = false;
			if (isset($statusId['min'])) {
				$this->addUsingAlias(UserStatusPeer::STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($statusId['max'])) {
				$this->addUsingAlias(UserStatusPeer::STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserStatusPeer::STATUS_ID, $statusId, $comparison);
	}

	/**
	 * Filter the query on the Verified column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVerified(1234); // WHERE Verified = 1234
	 * $query->filterByVerified(array(12, 34)); // WHERE Verified IN (12, 34)
	 * $query->filterByVerified(array('min' => 12)); // WHERE Verified > 12
	 * </code>
	 *
	 * @param     mixed $verified The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function filterByVerified($verified = null, $comparison = null)
	{
		if (is_array($verified)) {
			$useMinMax = false;
			if (isset($verified['min'])) {
				$this->addUsingAlias(UserStatusPeer::VERIFIED, $verified['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($verified['max'])) {
				$this->addUsingAlias(UserStatusPeer::VERIFIED, $verified['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserStatusPeer::VERIFIED, $verified, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserStatus $userStatus Object to remove from the list of results
	 *
	 * @return    UserStatusQuery The current query, for fluid interface
	 */
	public function prune($userStatus = null)
	{
		if ($userStatus) {
			$this->addCond('pruneCond0', $this->getAliasedColName(UserStatusPeer::USER_ID), $userStatus->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(UserStatusPeer::STATUS_ID), $userStatus->getStatusId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseUserStatusQuery
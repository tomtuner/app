<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Notifications;
use NewClubsORM\NotificationsPeer;
use NewClubsORM\NotificationsQuery;

/**
 * Base class that represents a query for the 'notifications' table.
 *
 * 
 *
 * @method     NotificationsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     NotificationsQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 *
 * @method     NotificationsQuery groupByOrgId() Group by the org_id column
 * @method     NotificationsQuery groupByMemberId() Group by the member_id column
 *
 * @method     NotificationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NotificationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NotificationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Notifications findOne(PropelPDO $con = null) Return the first Notifications matching the query
 * @method     Notifications findOneOrCreate(PropelPDO $con = null) Return the first Notifications matching the query, or a new Notifications object populated from the query conditions when no match is found
 *
 * @method     Notifications findOneByOrgId(int $org_id) Return the first Notifications filtered by the org_id column
 * @method     Notifications findOneByMemberId(int $member_id) Return the first Notifications filtered by the member_id column
 *
 * @method     array findByOrgId(int $org_id) Return Notifications objects filtered by the org_id column
 * @method     array findByMemberId(int $member_id) Return Notifications objects filtered by the member_id column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseNotificationsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNotificationsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Notifications', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NotificationsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NotificationsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NotificationsQuery) {
			return $criteria;
		}
		$query = new NotificationsQuery();
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
	 * @param     array[$org_id, $member_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Notifications|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NotificationsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Notifications A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ORG_ID`, `MEMBER_ID` FROM `notifications` WHERE `ORG_ID` = :p0 AND `MEMBER_ID` = :p1';
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
			$obj = new Notifications();
			$obj->hydrate($row);
			NotificationsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    Notifications|array|mixed the result, formatted by the current formatter
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
	 * @return    NotificationsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(NotificationsPeer::ORG_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(NotificationsPeer::MEMBER_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NotificationsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(NotificationsPeer::ORG_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(NotificationsPeer::MEMBER_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    NotificationsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(NotificationsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(NotificationsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificationsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the member_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMemberId(1234); // WHERE member_id = 1234
	 * $query->filterByMemberId(array(12, 34)); // WHERE member_id IN (12, 34)
	 * $query->filterByMemberId(array('min' => 12)); // WHERE member_id > 12
	 * </code>
	 *
	 * @param     mixed $memberId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificationsQuery The current query, for fluid interface
	 */
	public function filterByMemberId($memberId = null, $comparison = null)
	{
		if (is_array($memberId)) {
			$useMinMax = false;
			if (isset($memberId['min'])) {
				$this->addUsingAlias(NotificationsPeer::MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($memberId['max'])) {
				$this->addUsingAlias(NotificationsPeer::MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificationsPeer::MEMBER_ID, $memberId, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Notifications $notifications Object to remove from the list of results
	 *
	 * @return    NotificationsQuery The current query, for fluid interface
	 */
	public function prune($notifications = null)
	{
		if ($notifications) {
			$this->addCond('pruneCond0', $this->getAliasedColName(NotificationsPeer::ORG_ID), $notifications->getOrgId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(NotificationsPeer::MEMBER_ID), $notifications->getMemberId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseNotificationsQuery
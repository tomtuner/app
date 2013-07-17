<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Members;
use OrganizationsORM\MembersPeer;
use OrganizationsORM\MembersQuery;

/**
 * Base class that represents a query for the 'members' table.
 *
 * 
 *
 * @method     MembersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MembersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     MembersQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     MembersQuery orderByPositionId($order = Criteria::ASC) Order by the position_id column
 * @method     MembersQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     MembersQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     MembersQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     MembersQuery groupById() Group by the id column
 * @method     MembersQuery groupByUserId() Group by the user_id column
 * @method     MembersQuery groupByOrgId() Group by the org_id column
 * @method     MembersQuery groupByPositionId() Group by the position_id column
 * @method     MembersQuery groupByStatusId() Group by the status_id column
 * @method     MembersQuery groupByLastUpdated() Group by the last_updated column
 * @method     MembersQuery groupByDateAdded() Group by the date_added column
 *
 * @method     MembersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MembersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MembersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Members findOne(PropelPDO $con = null) Return the first Members matching the query
 * @method     Members findOneOrCreate(PropelPDO $con = null) Return the first Members matching the query, or a new Members object populated from the query conditions when no match is found
 *
 * @method     Members findOneById(int $id) Return the first Members filtered by the id column
 * @method     Members findOneByUserId(int $user_id) Return the first Members filtered by the user_id column
 * @method     Members findOneByOrgId(int $org_id) Return the first Members filtered by the org_id column
 * @method     Members findOneByPositionId(int $position_id) Return the first Members filtered by the position_id column
 * @method     Members findOneByStatusId(int $status_id) Return the first Members filtered by the status_id column
 * @method     Members findOneByLastUpdated(int $last_updated) Return the first Members filtered by the last_updated column
 * @method     Members findOneByDateAdded(int $date_added) Return the first Members filtered by the date_added column
 *
 * @method     array findById(int $id) Return Members objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return Members objects filtered by the user_id column
 * @method     array findByOrgId(int $org_id) Return Members objects filtered by the org_id column
 * @method     array findByPositionId(int $position_id) Return Members objects filtered by the position_id column
 * @method     array findByStatusId(int $status_id) Return Members objects filtered by the status_id column
 * @method     array findByLastUpdated(int $last_updated) Return Members objects filtered by the last_updated column
 * @method     array findByDateAdded(int $date_added) Return Members objects filtered by the date_added column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseMembersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMembersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Members', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MembersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MembersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MembersQuery) {
			return $criteria;
		}
		$query = new MembersQuery();
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
	 * @return    Members|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MembersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MembersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Members A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USER_ID`, `ORG_ID`, `POSITION_ID`, `STATUS_ID`, `LAST_UPDATED`, `DATE_ADDED` FROM `members` WHERE `ID` = :p0';
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
			$obj = new Members();
			$obj->hydrate($row);
			MembersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Members|array|mixed the result, formatted by the current formatter
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MembersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MembersPeer::ID, $keys, Criteria::IN);
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MembersPeer::ID, $id, $comparison);
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(MembersPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(MembersPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::USER_ID, $userId, $comparison);
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(MembersPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(MembersPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::ORG_ID, $orgId, $comparison);
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByPositionId($positionId = null, $comparison = null)
	{
		if (is_array($positionId)) {
			$useMinMax = false;
			if (isset($positionId['min'])) {
				$this->addUsingAlias(MembersPeer::POSITION_ID, $positionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($positionId['max'])) {
				$this->addUsingAlias(MembersPeer::POSITION_ID, $positionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::POSITION_ID, $positionId, $comparison);
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
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByStatusId($statusId = null, $comparison = null)
	{
		if (is_array($statusId)) {
			$useMinMax = false;
			if (isset($statusId['min'])) {
				$this->addUsingAlias(MembersPeer::STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($statusId['max'])) {
				$this->addUsingAlias(MembersPeer::STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::STATUS_ID, $statusId, $comparison);
	}

	/**
	 * Filter the query on the last_updated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastUpdated(1234); // WHERE last_updated = 1234
	 * $query->filterByLastUpdated(array(12, 34)); // WHERE last_updated IN (12, 34)
	 * $query->filterByLastUpdated(array('min' => 12)); // WHERE last_updated > 12
	 * </code>
	 *
	 * @param     mixed $lastUpdated The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByLastUpdated($lastUpdated = null, $comparison = null)
	{
		if (is_array($lastUpdated)) {
			$useMinMax = false;
			if (isset($lastUpdated['min'])) {
				$this->addUsingAlias(MembersPeer::LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastUpdated['max'])) {
				$this->addUsingAlias(MembersPeer::LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::LAST_UPDATED, $lastUpdated, $comparison);
	}

	/**
	 * Filter the query on the date_added column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateAdded(1234); // WHERE date_added = 1234
	 * $query->filterByDateAdded(array(12, 34)); // WHERE date_added IN (12, 34)
	 * $query->filterByDateAdded(array('min' => 12)); // WHERE date_added > 12
	 * </code>
	 *
	 * @param     mixed $dateAdded The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByDateAdded($dateAdded = null, $comparison = null)
	{
		if (is_array($dateAdded)) {
			$useMinMax = false;
			if (isset($dateAdded['min'])) {
				$this->addUsingAlias(MembersPeer::DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateAdded['max'])) {
				$this->addUsingAlias(MembersPeer::DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::DATE_ADDED, $dateAdded, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Members $members Object to remove from the list of results
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function prune($members = null)
	{
		if ($members) {
			$this->addUsingAlias(MembersPeer::ID, $members->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMembersQuery
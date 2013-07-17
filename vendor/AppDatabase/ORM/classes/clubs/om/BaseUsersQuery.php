<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\Users;
use ClubsORM\UsersPeer;
use ClubsORM\UsersQuery;

/**
 * Base class that represents a query for the 'users' table.
 *
 * 
 *
 * @method     UsersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     UsersQuery orderByLevel($order = Criteria::ASC) Order by the level column
 *
 * @method     UsersQuery groupByUserId() Group by the user_id column
 * @method     UsersQuery groupByLevel() Group by the level column
 *
 * @method     UsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Users findOne(PropelPDO $con = null) Return the first Users matching the query
 * @method     Users findOneOrCreate(PropelPDO $con = null) Return the first Users matching the query, or a new Users object populated from the query conditions when no match is found
 *
 * @method     Users findOneByUserId(int $user_id) Return the first Users filtered by the user_id column
 * @method     Users findOneByLevel(int $level) Return the first Users filtered by the level column
 *
 * @method     array findByUserId(int $user_id) Return Users objects filtered by the user_id column
 * @method     array findByLevel(int $level) Return Users objects filtered by the level column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseUsersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\Users', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UsersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UsersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UsersQuery) {
			return $criteria;
		}
		$query = new UsersQuery();
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
	 * @return    Users|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UsersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Users A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `LEVEL` FROM `users` WHERE `USER_ID` = :p0';
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
			$obj = new Users();
			$obj->hydrate($row);
			UsersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Users|array|mixed the result, formatted by the current formatter
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
	 * @return    UsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UsersPeer::USER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UsersPeer::USER_ID, $keys, Criteria::IN);
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
	 * @return    UsersQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(UsersPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(UsersPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsersPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the level column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLevel(1234); // WHERE level = 1234
	 * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
	 * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
	 * </code>
	 *
	 * @param     mixed $level The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsersQuery The current query, for fluid interface
	 */
	public function filterByLevel($level = null, $comparison = null)
	{
		if (is_array($level)) {
			$useMinMax = false;
			if (isset($level['min'])) {
				$this->addUsingAlias(UsersPeer::LEVEL, $level['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($level['max'])) {
				$this->addUsingAlias(UsersPeer::LEVEL, $level['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsersPeer::LEVEL, $level, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Users $users Object to remove from the list of results
	 *
	 * @return    UsersQuery The current query, for fluid interface
	 */
	public function prune($users = null)
	{
		if ($users) {
			$this->addUsingAlias(UsersPeer::USER_ID, $users->getUserId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsersQuery
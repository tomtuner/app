<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Userlog;
use NewClubsORM\UserlogPeer;
use NewClubsORM\UserlogQuery;

/**
 * Base class that represents a query for the 'userlog' table.
 *
 * 
 *
 * @method     UserlogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserlogQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     UserlogQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     UserlogQuery groupById() Group by the id column
 * @method     UserlogQuery groupByUsername() Group by the username column
 * @method     UserlogQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     UserlogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserlogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserlogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Userlog findOne(PropelPDO $con = null) Return the first Userlog matching the query
 * @method     Userlog findOneOrCreate(PropelPDO $con = null) Return the first Userlog matching the query, or a new Userlog object populated from the query conditions when no match is found
 *
 * @method     Userlog findOneById(int $id) Return the first Userlog filtered by the id column
 * @method     Userlog findOneByUsername(string $username) Return the first Userlog filtered by the username column
 * @method     Userlog findOneByTimestamp(string $timestamp) Return the first Userlog filtered by the timestamp column
 *
 * @method     array findById(int $id) Return Userlog objects filtered by the id column
 * @method     array findByUsername(string $username) Return Userlog objects filtered by the username column
 * @method     array findByTimestamp(string $timestamp) Return Userlog objects filtered by the timestamp column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseUserlogQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUserlogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Userlog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserlogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserlogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserlogQuery) {
			return $criteria;
		}
		$query = new UserlogQuery();
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
	 * @return    Userlog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UserlogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UserlogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Userlog A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USERNAME`, `TIMESTAMP` FROM `userlog` WHERE `ID` = :p0';
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
			$obj = new Userlog();
			$obj->hydrate($row);
			UserlogPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Userlog|array|mixed the result, formatted by the current formatter
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
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserlogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserlogPeer::ID, $keys, Criteria::IN);
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
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(UserlogPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(UserlogPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserlogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
	 * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $username The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserlogPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the timestamp column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTimestamp('fooValue');   // WHERE timestamp = 'fooValue'
	 * $query->filterByTimestamp('%fooValue%'); // WHERE timestamp LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $timestamp The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function filterByTimestamp($timestamp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($timestamp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $timestamp)) {
				$timestamp = str_replace('*', '%', $timestamp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserlogPeer::TIMESTAMP, $timestamp, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Userlog $userlog Object to remove from the list of results
	 *
	 * @return    UserlogQuery The current query, for fluid interface
	 */
	public function prune($userlog = null)
	{
		if ($userlog) {
			$this->addUsingAlias(UserlogPeer::ID, $userlog->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUserlogQuery
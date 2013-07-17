<?php

namespace UsersORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use UsersORM\GcUsersAdmin;
use UsersORM\GcUsersAdminPeer;
use UsersORM\GcUsersAdminQuery;

/**
 * Base class that represents a query for the 'gc_users_admin' table.
 *
 * 
 *
 * @method     GcUsersAdminQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     GcUsersAdminQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     GcUsersAdminQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     GcUsersAdminQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 *
 * @method     GcUsersAdminQuery groupByUserId() Group by the user_id column
 * @method     GcUsersAdminQuery groupByUsername() Group by the username column
 * @method     GcUsersAdminQuery groupByFirstname() Group by the firstname column
 * @method     GcUsersAdminQuery groupByLastname() Group by the lastname column
 *
 * @method     GcUsersAdminQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GcUsersAdminQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GcUsersAdminQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GcUsersAdmin findOne(PropelPDO $con = null) Return the first GcUsersAdmin matching the query
 * @method     GcUsersAdmin findOneOrCreate(PropelPDO $con = null) Return the first GcUsersAdmin matching the query, or a new GcUsersAdmin object populated from the query conditions when no match is found
 *
 * @method     GcUsersAdmin findOneByUserId(int $user_id) Return the first GcUsersAdmin filtered by the user_id column
 * @method     GcUsersAdmin findOneByUsername(string $username) Return the first GcUsersAdmin filtered by the username column
 * @method     GcUsersAdmin findOneByFirstname(string $firstname) Return the first GcUsersAdmin filtered by the firstname column
 * @method     GcUsersAdmin findOneByLastname(string $lastname) Return the first GcUsersAdmin filtered by the lastname column
 *
 * @method     array findByUserId(int $user_id) Return GcUsersAdmin objects filtered by the user_id column
 * @method     array findByUsername(string $username) Return GcUsersAdmin objects filtered by the username column
 * @method     array findByFirstname(string $firstname) Return GcUsersAdmin objects filtered by the firstname column
 * @method     array findByLastname(string $lastname) Return GcUsersAdmin objects filtered by the lastname column
 *
 * @package    propel.generator.users.om
 */
abstract class BaseGcUsersAdminQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseGcUsersAdminQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'users', $modelName = 'UsersORM\\GcUsersAdmin', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GcUsersAdminQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GcUsersAdminQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GcUsersAdminQuery) {
			return $criteria;
		}
		$query = new GcUsersAdminQuery();
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
	 * @return    GcUsersAdmin|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = GcUsersAdminPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(GcUsersAdminPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    GcUsersAdmin A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `USERNAME`, `FIRSTNAME`, `LASTNAME` FROM `gc_users_admin` WHERE `USER_ID` = :p0';
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
			$obj = new GcUsersAdmin();
			$obj->hydrate($row);
			GcUsersAdminPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    GcUsersAdmin|array|mixed the result, formatted by the current formatter
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
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GcUsersAdminPeer::USER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GcUsersAdminPeer::USER_ID, $keys, Criteria::IN);
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
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(GcUsersAdminPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(GcUsersAdminPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GcUsersAdminPeer::USER_ID, $userId, $comparison);
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
	 * @return    GcUsersAdminQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GcUsersAdminPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the firstname column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
	 * $query->filterByFirstname('%fooValue%'); // WHERE firstname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $firstname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function filterByFirstname($firstname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstname)) {
				$firstname = str_replace('*', '%', $firstname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GcUsersAdminPeer::FIRSTNAME, $firstname, $comparison);
	}

	/**
	 * Filter the query on the lastname column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
	 * $query->filterByLastname('%fooValue%'); // WHERE lastname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $lastname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function filterByLastname($lastname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastname)) {
				$lastname = str_replace('*', '%', $lastname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GcUsersAdminPeer::LASTNAME, $lastname, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     GcUsersAdmin $gcUsersAdmin Object to remove from the list of results
	 *
	 * @return    GcUsersAdminQuery The current query, for fluid interface
	 */
	public function prune($gcUsersAdmin = null)
	{
		if ($gcUsersAdmin) {
			$this->addUsingAlias(GcUsersAdminPeer::USER_ID, $gcUsersAdmin->getUserId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseGcUsersAdminQuery
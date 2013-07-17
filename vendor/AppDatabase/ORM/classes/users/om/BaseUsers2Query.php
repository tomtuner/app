<?php

namespace UsersORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use UsersORM\Users2;
use UsersORM\Users2Peer;
use UsersORM\Users2Query;

/**
 * Base class that represents a query for the 'users2' table.
 *
 * 
 *
 * @method     Users2Query orderById($order = Criteria::ASC) Order by the id column
 * @method     Users2Query orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     Users2Query orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     Users2Query orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     Users2Query orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     Users2Query orderByHearingImpaired($order = Criteria::ASC) Order by the hearing_impaired column
 * @method     Users2Query orderByPrefCommMethod($order = Criteria::ASC) Order by the pref_comm_method column
 * @method     Users2Query orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     Users2Query orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     Users2Query orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     Users2Query orderByScreenName($order = Criteria::ASC) Order by the screen_name column
 * @method     Users2Query orderByMiddleInitial($order = Criteria::ASC) Order by the middle_initial column
 *
 * @method     Users2Query groupById() Group by the id column
 * @method     Users2Query groupByUid() Group by the uid column
 * @method     Users2Query groupByUsername() Group by the username column
 * @method     Users2Query groupByFirstName() Group by the first_name column
 * @method     Users2Query groupByLastName() Group by the last_name column
 * @method     Users2Query groupByHearingImpaired() Group by the hearing_impaired column
 * @method     Users2Query groupByPrefCommMethod() Group by the pref_comm_method column
 * @method     Users2Query groupByEmail() Group by the email column
 * @method     Users2Query groupByPhone() Group by the phone column
 * @method     Users2Query groupByAddress() Group by the address column
 * @method     Users2Query groupByScreenName() Group by the screen_name column
 * @method     Users2Query groupByMiddleInitial() Group by the middle_initial column
 *
 * @method     Users2Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Users2Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Users2Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Users2 findOne(PropelPDO $con = null) Return the first Users2 matching the query
 * @method     Users2 findOneOrCreate(PropelPDO $con = null) Return the first Users2 matching the query, or a new Users2 object populated from the query conditions when no match is found
 *
 * @method     Users2 findOneById(int $id) Return the first Users2 filtered by the id column
 * @method     Users2 findOneByUid(string $uid) Return the first Users2 filtered by the uid column
 * @method     Users2 findOneByUsername(string $username) Return the first Users2 filtered by the username column
 * @method     Users2 findOneByFirstName(string $first_name) Return the first Users2 filtered by the first_name column
 * @method     Users2 findOneByLastName(string $last_name) Return the first Users2 filtered by the last_name column
 * @method     Users2 findOneByHearingImpaired(string $hearing_impaired) Return the first Users2 filtered by the hearing_impaired column
 * @method     Users2 findOneByPrefCommMethod(string $pref_comm_method) Return the first Users2 filtered by the pref_comm_method column
 * @method     Users2 findOneByEmail(string $email) Return the first Users2 filtered by the email column
 * @method     Users2 findOneByPhone(string $phone) Return the first Users2 filtered by the phone column
 * @method     Users2 findOneByAddress(string $address) Return the first Users2 filtered by the address column
 * @method     Users2 findOneByScreenName(string $screen_name) Return the first Users2 filtered by the screen_name column
 * @method     Users2 findOneByMiddleInitial(string $middle_initial) Return the first Users2 filtered by the middle_initial column
 *
 * @method     array findById(int $id) Return Users2 objects filtered by the id column
 * @method     array findByUid(string $uid) Return Users2 objects filtered by the uid column
 * @method     array findByUsername(string $username) Return Users2 objects filtered by the username column
 * @method     array findByFirstName(string $first_name) Return Users2 objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return Users2 objects filtered by the last_name column
 * @method     array findByHearingImpaired(string $hearing_impaired) Return Users2 objects filtered by the hearing_impaired column
 * @method     array findByPrefCommMethod(string $pref_comm_method) Return Users2 objects filtered by the pref_comm_method column
 * @method     array findByEmail(string $email) Return Users2 objects filtered by the email column
 * @method     array findByPhone(string $phone) Return Users2 objects filtered by the phone column
 * @method     array findByAddress(string $address) Return Users2 objects filtered by the address column
 * @method     array findByScreenName(string $screen_name) Return Users2 objects filtered by the screen_name column
 * @method     array findByMiddleInitial(string $middle_initial) Return Users2 objects filtered by the middle_initial column
 *
 * @package    propel.generator.users.om
 */
abstract class BaseUsers2Query extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsers2Query object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'users', $modelName = 'UsersORM\\Users2', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Users2Query object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Users2Query
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Users2Query) {
			return $criteria;
		}
		$query = new Users2Query();
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
	 * @return    Users2|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Users2Peer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Users2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Users2 A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `UID`, `USERNAME`, `FIRST_NAME`, `LAST_NAME`, `HEARING_IMPAIRED`, `PREF_COMM_METHOD`, `EMAIL`, `PHONE`, `ADDRESS`, `SCREEN_NAME`, `MIDDLE_INITIAL` FROM `users2` WHERE `ID` = :p0';
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
			$obj = new Users2();
			$obj->hydrate($row);
			Users2Peer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Users2|array|mixed the result, formatted by the current formatter
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
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Users2Peer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Users2Peer::ID, $keys, Criteria::IN);
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
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(Users2Peer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(Users2Peer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Users2Peer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the uid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
	 * $query->filterByUid('%fooValue%'); // WHERE uid LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $uid The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByUid($uid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($uid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $uid)) {
				$uid = str_replace('*', '%', $uid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::UID, $uid, $comparison);
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
	 * @return    Users2Query The current query, for fluid interface
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
		return $this->addUsingAlias(Users2Peer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
	 * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $firstName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
	 * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $lastName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the hearing_impaired column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHearingImpaired('fooValue');   // WHERE hearing_impaired = 'fooValue'
	 * $query->filterByHearingImpaired('%fooValue%'); // WHERE hearing_impaired LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hearingImpaired The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByHearingImpaired($hearingImpaired = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hearingImpaired)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hearingImpaired)) {
				$hearingImpaired = str_replace('*', '%', $hearingImpaired);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::HEARING_IMPAIRED, $hearingImpaired, $comparison);
	}

	/**
	 * Filter the query on the pref_comm_method column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrefCommMethod('fooValue');   // WHERE pref_comm_method = 'fooValue'
	 * $query->filterByPrefCommMethod('%fooValue%'); // WHERE pref_comm_method LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $prefCommMethod The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByPrefCommMethod($prefCommMethod = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($prefCommMethod)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $prefCommMethod)) {
				$prefCommMethod = str_replace('*', '%', $prefCommMethod);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::PREF_COMM_METHOD, $prefCommMethod, $comparison);
	}

	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
	 * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $phone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
	 * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $address The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the screen_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByScreenName('fooValue');   // WHERE screen_name = 'fooValue'
	 * $query->filterByScreenName('%fooValue%'); // WHERE screen_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $screenName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByScreenName($screenName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($screenName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $screenName)) {
				$screenName = str_replace('*', '%', $screenName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::SCREEN_NAME, $screenName, $comparison);
	}

	/**
	 * Filter the query on the middle_initial column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMiddleInitial('fooValue');   // WHERE middle_initial = 'fooValue'
	 * $query->filterByMiddleInitial('%fooValue%'); // WHERE middle_initial LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $middleInitial The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function filterByMiddleInitial($middleInitial = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($middleInitial)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $middleInitial)) {
				$middleInitial = str_replace('*', '%', $middleInitial);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Users2Peer::MIDDLE_INITIAL, $middleInitial, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Users2 $users2 Object to remove from the list of results
	 *
	 * @return    Users2Query The current query, for fluid interface
	 */
	public function prune($users2 = null)
	{
		if ($users2) {
			$this->addUsingAlias(Users2Peer::ID, $users2->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsers2Query
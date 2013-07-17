<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\UserProfile;
use NewClubsORM\UserProfilePeer;
use NewClubsORM\UserProfileQuery;

/**
 * Base class that represents a query for the 'user_profile' table.
 *
 * 
 *
 * @method     UserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     UserProfileQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     UserProfileQuery orderBySendEmail($order = Criteria::ASC) Order by the send_email column
 * @method     UserProfileQuery orderByPrefferedEmail($order = Criteria::ASC) Order by the preffered_email column
 * @method     UserProfileQuery orderByHomePhone($order = Criteria::ASC) Order by the home_phone column
 *
 * @method     UserProfileQuery groupByUserId() Group by the user_id column
 * @method     UserProfileQuery groupByType() Group by the type column
 * @method     UserProfileQuery groupBySendEmail() Group by the send_email column
 * @method     UserProfileQuery groupByPrefferedEmail() Group by the preffered_email column
 * @method     UserProfileQuery groupByHomePhone() Group by the home_phone column
 *
 * @method     UserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserProfile findOne(PropelPDO $con = null) Return the first UserProfile matching the query
 * @method     UserProfile findOneOrCreate(PropelPDO $con = null) Return the first UserProfile matching the query, or a new UserProfile object populated from the query conditions when no match is found
 *
 * @method     UserProfile findOneByUserId(int $user_id) Return the first UserProfile filtered by the user_id column
 * @method     UserProfile findOneByType(string $type) Return the first UserProfile filtered by the type column
 * @method     UserProfile findOneBySendEmail(int $send_email) Return the first UserProfile filtered by the send_email column
 * @method     UserProfile findOneByPrefferedEmail(string $preffered_email) Return the first UserProfile filtered by the preffered_email column
 * @method     UserProfile findOneByHomePhone(string $home_phone) Return the first UserProfile filtered by the home_phone column
 *
 * @method     array findByUserId(int $user_id) Return UserProfile objects filtered by the user_id column
 * @method     array findByType(string $type) Return UserProfile objects filtered by the type column
 * @method     array findBySendEmail(int $send_email) Return UserProfile objects filtered by the send_email column
 * @method     array findByPrefferedEmail(string $preffered_email) Return UserProfile objects filtered by the preffered_email column
 * @method     array findByHomePhone(string $home_phone) Return UserProfile objects filtered by the home_phone column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseUserProfileQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUserProfileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\UserProfile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserProfileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserProfileQuery) {
			return $criteria;
		}
		$query = new UserProfileQuery();
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
	 * @return    UserProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UserProfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UserProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    UserProfile A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `TYPE`, `SEND_EMAIL`, `PREFFERED_EMAIL`, `HOME_PHONE` FROM `user_profile` WHERE `USER_ID` = :p0';
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
			$obj = new UserProfile();
			$obj->hydrate($row);
			UserProfilePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    UserProfile|array|mixed the result, formatted by the current formatter
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
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserProfilePeer::USER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserProfilePeer::USER_ID, $keys, Criteria::IN);
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
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserProfilePeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
	 * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $type The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserProfilePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the send_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySendEmail(1234); // WHERE send_email = 1234
	 * $query->filterBySendEmail(array(12, 34)); // WHERE send_email IN (12, 34)
	 * $query->filterBySendEmail(array('min' => 12)); // WHERE send_email > 12
	 * </code>
	 *
	 * @param     mixed $sendEmail The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterBySendEmail($sendEmail = null, $comparison = null)
	{
		if (is_array($sendEmail)) {
			$useMinMax = false;
			if (isset($sendEmail['min'])) {
				$this->addUsingAlias(UserProfilePeer::SEND_EMAIL, $sendEmail['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($sendEmail['max'])) {
				$this->addUsingAlias(UserProfilePeer::SEND_EMAIL, $sendEmail['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserProfilePeer::SEND_EMAIL, $sendEmail, $comparison);
	}

	/**
	 * Filter the query on the preffered_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrefferedEmail('fooValue');   // WHERE preffered_email = 'fooValue'
	 * $query->filterByPrefferedEmail('%fooValue%'); // WHERE preffered_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $prefferedEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrefferedEmail($prefferedEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($prefferedEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $prefferedEmail)) {
				$prefferedEmail = str_replace('*', '%', $prefferedEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserProfilePeer::PREFFERED_EMAIL, $prefferedEmail, $comparison);
	}

	/**
	 * Filter the query on the home_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHomePhone('fooValue');   // WHERE home_phone = 'fooValue'
	 * $query->filterByHomePhone('%fooValue%'); // WHERE home_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $homePhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function filterByHomePhone($homePhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($homePhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $homePhone)) {
				$homePhone = str_replace('*', '%', $homePhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserProfilePeer::HOME_PHONE, $homePhone, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserProfile $userProfile Object to remove from the list of results
	 *
	 * @return    UserProfileQuery The current query, for fluid interface
	 */
	public function prune($userProfile = null)
	{
		if ($userProfile) {
			$this->addUsingAlias(UserProfilePeer::USER_ID, $userProfile->getUserId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUserProfileQuery
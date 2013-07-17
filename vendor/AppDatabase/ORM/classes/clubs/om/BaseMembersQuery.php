<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\Members;
use ClubsORM\MembersPeer;
use ClubsORM\MembersQuery;

/**
 * Base class that represents a query for the 'members' table.
 *
 * 
 *
 * @method     MembersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MembersQuery orderByMemberListId($order = Criteria::ASC) Order by the member_list_id column
 * @method     MembersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     MembersQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     MembersQuery orderBySendEmails($order = Criteria::ASC) Order by the send_emails column
 *
 * @method     MembersQuery groupById() Group by the id column
 * @method     MembersQuery groupByMemberListId() Group by the member_list_id column
 * @method     MembersQuery groupByUserId() Group by the user_id column
 * @method     MembersQuery groupByYear() Group by the year column
 * @method     MembersQuery groupBySendEmails() Group by the send_emails column
 *
 * @method     MembersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MembersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MembersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Members findOne(PropelPDO $con = null) Return the first Members matching the query
 * @method     Members findOneOrCreate(PropelPDO $con = null) Return the first Members matching the query, or a new Members object populated from the query conditions when no match is found
 *
 * @method     Members findOneById(int $id) Return the first Members filtered by the id column
 * @method     Members findOneByMemberListId(int $member_list_id) Return the first Members filtered by the member_list_id column
 * @method     Members findOneByUserId(int $user_id) Return the first Members filtered by the user_id column
 * @method     Members findOneByYear(int $year) Return the first Members filtered by the year column
 * @method     Members findOneBySendEmails(boolean $send_emails) Return the first Members filtered by the send_emails column
 *
 * @method     array findById(int $id) Return Members objects filtered by the id column
 * @method     array findByMemberListId(int $member_list_id) Return Members objects filtered by the member_list_id column
 * @method     array findByUserId(int $user_id) Return Members objects filtered by the user_id column
 * @method     array findByYear(int $year) Return Members objects filtered by the year column
 * @method     array findBySendEmails(boolean $send_emails) Return Members objects filtered by the send_emails column
 *
 * @package    propel.generator.clubs.om
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
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\Members', $modelAlias = null)
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
		$sql = 'SELECT `ID`, `MEMBER_LIST_ID`, `USER_ID`, `YEAR`, `SEND_EMAILS` FROM `members` WHERE `ID` = :p0';
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
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(MembersPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(MembersPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the member_list_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMemberListId(1234); // WHERE member_list_id = 1234
	 * $query->filterByMemberListId(array(12, 34)); // WHERE member_list_id IN (12, 34)
	 * $query->filterByMemberListId(array('min' => 12)); // WHERE member_list_id > 12
	 * </code>
	 *
	 * @param     mixed $memberListId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByMemberListId($memberListId = null, $comparison = null)
	{
		if (is_array($memberListId)) {
			$useMinMax = false;
			if (isset($memberListId['min'])) {
				$this->addUsingAlias(MembersPeer::MEMBER_LIST_ID, $memberListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($memberListId['max'])) {
				$this->addUsingAlias(MembersPeer::MEMBER_LIST_ID, $memberListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::MEMBER_LIST_ID, $memberListId, $comparison);
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
	 * Filter the query on the year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByYear(1234); // WHERE year = 1234
	 * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
	 * $query->filterByYear(array('min' => 12)); // WHERE year > 12
	 * </code>
	 *
	 * @param     mixed $year The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (is_array($year)) {
			$useMinMax = false;
			if (isset($year['min'])) {
				$this->addUsingAlias(MembersPeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($year['max'])) {
				$this->addUsingAlias(MembersPeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembersPeer::YEAR, $year, $comparison);
	}

	/**
	 * Filter the query on the send_emails column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySendEmails(true); // WHERE send_emails = true
	 * $query->filterBySendEmails('yes'); // WHERE send_emails = true
	 * </code>
	 *
	 * @param     boolean|string $sendEmails The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembersQuery The current query, for fluid interface
	 */
	public function filterBySendEmails($sendEmails = null, $comparison = null)
	{
		if (is_string($sendEmails)) {
			$send_emails = in_array(strtolower($sendEmails), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembersPeer::SEND_EMAILS, $sendEmails, $comparison);
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
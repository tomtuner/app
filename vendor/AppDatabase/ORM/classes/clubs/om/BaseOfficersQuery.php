<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\Officers;
use ClubsORM\OfficersPeer;
use ClubsORM\OfficersQuery;

/**
 * Base class that represents a query for the 'officers' table.
 *
 * 
 *
 * @method     OfficersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OfficersQuery orderByOfficerListId($order = Criteria::ASC) Order by the officer_list_id column
 * @method     OfficersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     OfficersQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     OfficersQuery orderBySendEmails($order = Criteria::ASC) Order by the send_emails column
 *
 * @method     OfficersQuery groupById() Group by the id column
 * @method     OfficersQuery groupByOfficerListId() Group by the officer_list_id column
 * @method     OfficersQuery groupByUserId() Group by the user_id column
 * @method     OfficersQuery groupByTitle() Group by the title column
 * @method     OfficersQuery groupBySendEmails() Group by the send_emails column
 *
 * @method     OfficersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OfficersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OfficersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Officers findOne(PropelPDO $con = null) Return the first Officers matching the query
 * @method     Officers findOneOrCreate(PropelPDO $con = null) Return the first Officers matching the query, or a new Officers object populated from the query conditions when no match is found
 *
 * @method     Officers findOneById(int $id) Return the first Officers filtered by the id column
 * @method     Officers findOneByOfficerListId(int $officer_list_id) Return the first Officers filtered by the officer_list_id column
 * @method     Officers findOneByUserId(int $user_id) Return the first Officers filtered by the user_id column
 * @method     Officers findOneByTitle(string $title) Return the first Officers filtered by the title column
 * @method     Officers findOneBySendEmails(boolean $send_emails) Return the first Officers filtered by the send_emails column
 *
 * @method     array findById(int $id) Return Officers objects filtered by the id column
 * @method     array findByOfficerListId(int $officer_list_id) Return Officers objects filtered by the officer_list_id column
 * @method     array findByUserId(int $user_id) Return Officers objects filtered by the user_id column
 * @method     array findByTitle(string $title) Return Officers objects filtered by the title column
 * @method     array findBySendEmails(boolean $send_emails) Return Officers objects filtered by the send_emails column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseOfficersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseOfficersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\Officers', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OfficersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OfficersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OfficersQuery) {
			return $criteria;
		}
		$query = new OfficersQuery();
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
	 * @return    Officers|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = OfficersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(OfficersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Officers A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `OFFICER_LIST_ID`, `USER_ID`, `TITLE`, `SEND_EMAILS` FROM `officers` WHERE `ID` = :p0';
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
			$obj = new Officers();
			$obj->hydrate($row);
			OfficersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Officers|array|mixed the result, formatted by the current formatter
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
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OfficersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OfficersPeer::ID, $keys, Criteria::IN);
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
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(OfficersPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(OfficersPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OfficersPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the officer_list_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOfficerListId(1234); // WHERE officer_list_id = 1234
	 * $query->filterByOfficerListId(array(12, 34)); // WHERE officer_list_id IN (12, 34)
	 * $query->filterByOfficerListId(array('min' => 12)); // WHERE officer_list_id > 12
	 * </code>
	 *
	 * @param     mixed $officerListId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterByOfficerListId($officerListId = null, $comparison = null)
	{
		if (is_array($officerListId)) {
			$useMinMax = false;
			if (isset($officerListId['min'])) {
				$this->addUsingAlias(OfficersPeer::OFFICER_LIST_ID, $officerListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($officerListId['max'])) {
				$this->addUsingAlias(OfficersPeer::OFFICER_LIST_ID, $officerListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OfficersPeer::OFFICER_LIST_ID, $officerListId, $comparison);
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
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(OfficersPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(OfficersPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OfficersPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
	 * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $title The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(OfficersPeer::TITLE, $title, $comparison);
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
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function filterBySendEmails($sendEmails = null, $comparison = null)
	{
		if (is_string($sendEmails)) {
			$send_emails = in_array(strtolower($sendEmails), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(OfficersPeer::SEND_EMAILS, $sendEmails, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Officers $officers Object to remove from the list of results
	 *
	 * @return    OfficersQuery The current query, for fluid interface
	 */
	public function prune($officers = null)
	{
		if ($officers) {
			$this->addUsingAlias(OfficersPeer::ID, $officers->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseOfficersQuery
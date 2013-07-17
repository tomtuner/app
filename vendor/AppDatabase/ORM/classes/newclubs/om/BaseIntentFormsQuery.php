<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\IntentForms;
use NewClubsORM\IntentFormsPeer;
use NewClubsORM\IntentFormsQuery;

/**
 * Base class that represents a query for the 'intent_forms' table.
 *
 * 
 *
 * @method     IntentFormsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     IntentFormsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     IntentFormsQuery orderByDateSubmitted($order = Criteria::ASC) Order by the date_submitted column
 * @method     IntentFormsQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     IntentFormsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     IntentFormsQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     IntentFormsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     IntentFormsQuery orderBySportsClub($order = Criteria::ASC) Order by the sports_club column
 * @method     IntentFormsQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     IntentFormsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     IntentFormsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     IntentFormsQuery orderByReason($order = Criteria::ASC) Order by the reason column
 *
 * @method     IntentFormsQuery groupById() Group by the id column
 * @method     IntentFormsQuery groupByOrgId() Group by the org_id column
 * @method     IntentFormsQuery groupByDateSubmitted() Group by the date_submitted column
 * @method     IntentFormsQuery groupByLastUpdated() Group by the last_updated column
 * @method     IntentFormsQuery groupByName() Group by the name column
 * @method     IntentFormsQuery groupByAcronym() Group by the acronym column
 * @method     IntentFormsQuery groupByDescription() Group by the description column
 * @method     IntentFormsQuery groupBySportsClub() Group by the sports_club column
 * @method     IntentFormsQuery groupByContact() Group by the contact column
 * @method     IntentFormsQuery groupByEmail() Group by the email column
 * @method     IntentFormsQuery groupByStatus() Group by the status column
 * @method     IntentFormsQuery groupByReason() Group by the reason column
 *
 * @method     IntentFormsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     IntentFormsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     IntentFormsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     IntentForms findOne(PropelPDO $con = null) Return the first IntentForms matching the query
 * @method     IntentForms findOneOrCreate(PropelPDO $con = null) Return the first IntentForms matching the query, or a new IntentForms object populated from the query conditions when no match is found
 *
 * @method     IntentForms findOneById(int $id) Return the first IntentForms filtered by the id column
 * @method     IntentForms findOneByOrgId(int $org_id) Return the first IntentForms filtered by the org_id column
 * @method     IntentForms findOneByDateSubmitted(string $date_submitted) Return the first IntentForms filtered by the date_submitted column
 * @method     IntentForms findOneByLastUpdated(string $last_updated) Return the first IntentForms filtered by the last_updated column
 * @method     IntentForms findOneByName(string $name) Return the first IntentForms filtered by the name column
 * @method     IntentForms findOneByAcronym(string $acronym) Return the first IntentForms filtered by the acronym column
 * @method     IntentForms findOneByDescription(string $description) Return the first IntentForms filtered by the description column
 * @method     IntentForms findOneBySportsClub(boolean $sports_club) Return the first IntentForms filtered by the sports_club column
 * @method     IntentForms findOneByContact(string $contact) Return the first IntentForms filtered by the contact column
 * @method     IntentForms findOneByEmail(string $email) Return the first IntentForms filtered by the email column
 * @method     IntentForms findOneByStatus(string $status) Return the first IntentForms filtered by the status column
 * @method     IntentForms findOneByReason(string $reason) Return the first IntentForms filtered by the reason column
 *
 * @method     array findById(int $id) Return IntentForms objects filtered by the id column
 * @method     array findByOrgId(int $org_id) Return IntentForms objects filtered by the org_id column
 * @method     array findByDateSubmitted(string $date_submitted) Return IntentForms objects filtered by the date_submitted column
 * @method     array findByLastUpdated(string $last_updated) Return IntentForms objects filtered by the last_updated column
 * @method     array findByName(string $name) Return IntentForms objects filtered by the name column
 * @method     array findByAcronym(string $acronym) Return IntentForms objects filtered by the acronym column
 * @method     array findByDescription(string $description) Return IntentForms objects filtered by the description column
 * @method     array findBySportsClub(boolean $sports_club) Return IntentForms objects filtered by the sports_club column
 * @method     array findByContact(string $contact) Return IntentForms objects filtered by the contact column
 * @method     array findByEmail(string $email) Return IntentForms objects filtered by the email column
 * @method     array findByStatus(string $status) Return IntentForms objects filtered by the status column
 * @method     array findByReason(string $reason) Return IntentForms objects filtered by the reason column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseIntentFormsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseIntentFormsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\IntentForms', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new IntentFormsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    IntentFormsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof IntentFormsQuery) {
			return $criteria;
		}
		$query = new IntentFormsQuery();
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
	 * @return    IntentForms|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = IntentFormsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(IntentFormsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    IntentForms A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `DATE_SUBMITTED`, `LAST_UPDATED`, `NAME`, `ACRONYM`, `DESCRIPTION`, `SPORTS_CLUB`, `CONTACT`, `EMAIL`, `STATUS`, `REASON` FROM `intent_forms` WHERE `ID` = :p0';
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
			$obj = new IntentForms();
			$obj->hydrate($row);
			IntentFormsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    IntentForms|array|mixed the result, formatted by the current formatter
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
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(IntentFormsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(IntentFormsPeer::ID, $keys, Criteria::IN);
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
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(IntentFormsPeer::ID, $id, $comparison);
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
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(IntentFormsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(IntentFormsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the date_submitted column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateSubmitted('2011-03-14'); // WHERE date_submitted = '2011-03-14'
	 * $query->filterByDateSubmitted('now'); // WHERE date_submitted = '2011-03-14'
	 * $query->filterByDateSubmitted(array('max' => 'yesterday')); // WHERE date_submitted > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dateSubmitted The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByDateSubmitted($dateSubmitted = null, $comparison = null)
	{
		if (is_array($dateSubmitted)) {
			$useMinMax = false;
			if (isset($dateSubmitted['min'])) {
				$this->addUsingAlias(IntentFormsPeer::DATE_SUBMITTED, $dateSubmitted['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateSubmitted['max'])) {
				$this->addUsingAlias(IntentFormsPeer::DATE_SUBMITTED, $dateSubmitted['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::DATE_SUBMITTED, $dateSubmitted, $comparison);
	}

	/**
	 * Filter the query on the last_updated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastUpdated('2011-03-14'); // WHERE last_updated = '2011-03-14'
	 * $query->filterByLastUpdated('now'); // WHERE last_updated = '2011-03-14'
	 * $query->filterByLastUpdated(array('max' => 'yesterday')); // WHERE last_updated > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $lastUpdated The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByLastUpdated($lastUpdated = null, $comparison = null)
	{
		if (is_array($lastUpdated)) {
			$useMinMax = false;
			if (isset($lastUpdated['min'])) {
				$this->addUsingAlias(IntentFormsPeer::LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastUpdated['max'])) {
				$this->addUsingAlias(IntentFormsPeer::LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::LAST_UPDATED, $lastUpdated, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the acronym column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAcronym('fooValue');   // WHERE acronym = 'fooValue'
	 * $query->filterByAcronym('%fooValue%'); // WHERE acronym LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $acronym The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByAcronym($acronym = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($acronym)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $acronym)) {
				$acronym = str_replace('*', '%', $acronym);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::ACRONYM, $acronym, $comparison);
	}

	/**
	 * Filter the query on the description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $description The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the sports_club column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySportsClub(true); // WHERE sports_club = true
	 * $query->filterBySportsClub('yes'); // WHERE sports_club = true
	 * </code>
	 *
	 * @param     boolean|string $sportsClub The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterBySportsClub($sportsClub = null, $comparison = null)
	{
		if (is_string($sportsClub)) {
			$sports_club = in_array(strtolower($sportsClub), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(IntentFormsPeer::SPORTS_CLUB, $sportsClub, $comparison);
	}

	/**
	 * Filter the query on the contact column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
	 * $query->filterByContact('%fooValue%'); // WHERE contact LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $contact The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByContact($contact = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contact)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contact)) {
				$contact = str_replace('*', '%', $contact);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::CONTACT, $contact, $comparison);
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
	 * @return    IntentFormsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(IntentFormsPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the status column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
	 * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $status The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the reason column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReason('fooValue');   // WHERE reason = 'fooValue'
	 * $query->filterByReason('%fooValue%'); // WHERE reason LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reason The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByReason($reason = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reason)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reason)) {
				$reason = str_replace('*', '%', $reason);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::REASON, $reason, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     IntentForms $intentForms Object to remove from the list of results
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function prune($intentForms = null)
	{
		if ($intentForms) {
			$this->addUsingAlias(IntentFormsPeer::ID, $intentForms->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseIntentFormsQuery
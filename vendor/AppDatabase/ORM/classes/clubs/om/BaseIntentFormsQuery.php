<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\IntentForms;
use ClubsORM\IntentFormsPeer;
use ClubsORM\IntentFormsQuery;

/**
 * Base class that represents a query for the 'intent_forms' table.
 *
 * 
 *
 * @method     IntentFormsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     IntentFormsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     IntentFormsQuery orderByClubName($order = Criteria::ASC) Order by the club_name column
 * @method     IntentFormsQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     IntentFormsQuery orderByContactId($order = Criteria::ASC) Order by the contact_id column
 * @method     IntentFormsQuery orderBySubmittedOn($order = Criteria::ASC) Order by the submitted_on column
 * @method     IntentFormsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     IntentFormsQuery groupById() Group by the id column
 * @method     IntentFormsQuery groupByStatus() Group by the status column
 * @method     IntentFormsQuery groupByClubName() Group by the club_name column
 * @method     IntentFormsQuery groupByAcronym() Group by the acronym column
 * @method     IntentFormsQuery groupByContactId() Group by the contact_id column
 * @method     IntentFormsQuery groupBySubmittedOn() Group by the submitted_on column
 * @method     IntentFormsQuery groupByDescription() Group by the description column
 *
 * @method     IntentFormsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     IntentFormsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     IntentFormsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     IntentForms findOne(PropelPDO $con = null) Return the first IntentForms matching the query
 * @method     IntentForms findOneOrCreate(PropelPDO $con = null) Return the first IntentForms matching the query, or a new IntentForms object populated from the query conditions when no match is found
 *
 * @method     IntentForms findOneById(int $id) Return the first IntentForms filtered by the id column
 * @method     IntentForms findOneByStatus(string $status) Return the first IntentForms filtered by the status column
 * @method     IntentForms findOneByClubName(string $club_name) Return the first IntentForms filtered by the club_name column
 * @method     IntentForms findOneByAcronym(string $acronym) Return the first IntentForms filtered by the acronym column
 * @method     IntentForms findOneByContactId(int $contact_id) Return the first IntentForms filtered by the contact_id column
 * @method     IntentForms findOneBySubmittedOn(string $submitted_on) Return the first IntentForms filtered by the submitted_on column
 * @method     IntentForms findOneByDescription(string $description) Return the first IntentForms filtered by the description column
 *
 * @method     array findById(int $id) Return IntentForms objects filtered by the id column
 * @method     array findByStatus(string $status) Return IntentForms objects filtered by the status column
 * @method     array findByClubName(string $club_name) Return IntentForms objects filtered by the club_name column
 * @method     array findByAcronym(string $acronym) Return IntentForms objects filtered by the acronym column
 * @method     array findByContactId(int $contact_id) Return IntentForms objects filtered by the contact_id column
 * @method     array findBySubmittedOn(string $submitted_on) Return IntentForms objects filtered by the submitted_on column
 * @method     array findByDescription(string $description) Return IntentForms objects filtered by the description column
 *
 * @package    propel.generator.clubs.om
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
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\IntentForms', $modelAlias = null)
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
		$sql = 'SELECT `ID`, `STATUS`, `CLUB_NAME`, `ACRONYM`, `CONTACT_ID`, `SUBMITTED_ON`, `DESCRIPTION` FROM `intent_forms` WHERE `ID` = :p0';
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
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(IntentFormsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(IntentFormsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::ID, $id, $comparison);
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
	 * Filter the query on the club_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubName('fooValue');   // WHERE club_name = 'fooValue'
	 * $query->filterByClubName('%fooValue%'); // WHERE club_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clubName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByClubName($clubName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clubName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clubName)) {
				$clubName = str_replace('*', '%', $clubName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::CLUB_NAME, $clubName, $comparison);
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
	 * Filter the query on the contact_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContactId(1234); // WHERE contact_id = 1234
	 * $query->filterByContactId(array(12, 34)); // WHERE contact_id IN (12, 34)
	 * $query->filterByContactId(array('min' => 12)); // WHERE contact_id > 12
	 * </code>
	 *
	 * @param     mixed $contactId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterByContactId($contactId = null, $comparison = null)
	{
		if (is_array($contactId)) {
			$useMinMax = false;
			if (isset($contactId['min'])) {
				$this->addUsingAlias(IntentFormsPeer::CONTACT_ID, $contactId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($contactId['max'])) {
				$this->addUsingAlias(IntentFormsPeer::CONTACT_ID, $contactId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::CONTACT_ID, $contactId, $comparison);
	}

	/**
	 * Filter the query on the submitted_on column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmittedOn('2011-03-14'); // WHERE submitted_on = '2011-03-14'
	 * $query->filterBySubmittedOn('now'); // WHERE submitted_on = '2011-03-14'
	 * $query->filterBySubmittedOn(array('max' => 'yesterday')); // WHERE submitted_on > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $submittedOn The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IntentFormsQuery The current query, for fluid interface
	 */
	public function filterBySubmittedOn($submittedOn = null, $comparison = null)
	{
		if (is_array($submittedOn)) {
			$useMinMax = false;
			if (isset($submittedOn['min'])) {
				$this->addUsingAlias(IntentFormsPeer::SUBMITTED_ON, $submittedOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($submittedOn['max'])) {
				$this->addUsingAlias(IntentFormsPeer::SUBMITTED_ON, $submittedOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IntentFormsPeer::SUBMITTED_ON, $submittedOn, $comparison);
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
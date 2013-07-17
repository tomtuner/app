<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubDidReports;
use NewClubsORM\ClubDidReportsPeer;
use NewClubsORM\ClubDidReportsQuery;

/**
 * Base class that represents a query for the 'club_did_reports' table.
 *
 * 
 *
 * @method     ClubDidReportsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     ClubDidReportsQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     ClubDidReportsQuery orderByDateSubmitted($order = Criteria::ASC) Order by the date_submitted column
 * @method     ClubDidReportsQuery orderByUniqueid($order = Criteria::ASC) Order by the uniqueid column
 * @method     ClubDidReportsQuery orderBySubmitType($order = Criteria::ASC) Order by the submit_type column
 * @method     ClubDidReportsQuery orderByAdvisorApproved($order = Criteria::ASC) Order by the advisor_approved column
 * @method     ClubDidReportsQuery orderByCclApproved($order = Criteria::ASC) Order by the ccl_approved column
 *
 * @method     ClubDidReportsQuery groupByOrgId() Group by the org_id column
 * @method     ClubDidReportsQuery groupByReportId() Group by the report_id column
 * @method     ClubDidReportsQuery groupByDateSubmitted() Group by the date_submitted column
 * @method     ClubDidReportsQuery groupByUniqueid() Group by the uniqueid column
 * @method     ClubDidReportsQuery groupBySubmitType() Group by the submit_type column
 * @method     ClubDidReportsQuery groupByAdvisorApproved() Group by the advisor_approved column
 * @method     ClubDidReportsQuery groupByCclApproved() Group by the ccl_approved column
 *
 * @method     ClubDidReportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubDidReportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubDidReportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubDidReports findOne(PropelPDO $con = null) Return the first ClubDidReports matching the query
 * @method     ClubDidReports findOneOrCreate(PropelPDO $con = null) Return the first ClubDidReports matching the query, or a new ClubDidReports object populated from the query conditions when no match is found
 *
 * @method     ClubDidReports findOneByOrgId(int $org_id) Return the first ClubDidReports filtered by the org_id column
 * @method     ClubDidReports findOneByReportId(int $report_id) Return the first ClubDidReports filtered by the report_id column
 * @method     ClubDidReports findOneByDateSubmitted(string $date_submitted) Return the first ClubDidReports filtered by the date_submitted column
 * @method     ClubDidReports findOneByUniqueid(string $uniqueid) Return the first ClubDidReports filtered by the uniqueid column
 * @method     ClubDidReports findOneBySubmitType(string $submit_type) Return the first ClubDidReports filtered by the submit_type column
 * @method     ClubDidReports findOneByAdvisorApproved(boolean $advisor_approved) Return the first ClubDidReports filtered by the advisor_approved column
 * @method     ClubDidReports findOneByCclApproved(boolean $ccl_approved) Return the first ClubDidReports filtered by the ccl_approved column
 *
 * @method     array findByOrgId(int $org_id) Return ClubDidReports objects filtered by the org_id column
 * @method     array findByReportId(int $report_id) Return ClubDidReports objects filtered by the report_id column
 * @method     array findByDateSubmitted(string $date_submitted) Return ClubDidReports objects filtered by the date_submitted column
 * @method     array findByUniqueid(string $uniqueid) Return ClubDidReports objects filtered by the uniqueid column
 * @method     array findBySubmitType(string $submit_type) Return ClubDidReports objects filtered by the submit_type column
 * @method     array findByAdvisorApproved(boolean $advisor_approved) Return ClubDidReports objects filtered by the advisor_approved column
 * @method     array findByCclApproved(boolean $ccl_approved) Return ClubDidReports objects filtered by the ccl_approved column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubDidReportsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubDidReportsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubDidReports', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubDidReportsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubDidReportsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubDidReportsQuery) {
			return $criteria;
		}
		$query = new ClubDidReportsQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$org_id, $report_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClubDidReports|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubDidReportsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubDidReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubDidReports A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ORG_ID`, `REPORT_ID`, `DATE_SUBMITTED`, `UNIQUEID`, `SUBMIT_TYPE`, `ADVISOR_APPROVED`, `CCL_APPROVED` FROM `club_did_reports` WHERE `ORG_ID` = :p0 AND `REPORT_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new ClubDidReports();
			$obj->hydrate($row);
			ClubDidReportsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    ClubDidReports|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ClubDidReportsPeer::ORG_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ClubDidReportsPeer::REPORT_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ClubDidReportsPeer::ORG_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ClubDidReportsPeer::REPORT_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubDidReportsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the report_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReportId(1234); // WHERE report_id = 1234
	 * $query->filterByReportId(array(12, 34)); // WHERE report_id IN (12, 34)
	 * $query->filterByReportId(array('min' => 12)); // WHERE report_id > 12
	 * </code>
	 *
	 * @param     mixed $reportId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubDidReportsPeer::REPORT_ID, $reportId, $comparison);
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
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByDateSubmitted($dateSubmitted = null, $comparison = null)
	{
		if (is_array($dateSubmitted)) {
			$useMinMax = false;
			if (isset($dateSubmitted['min'])) {
				$this->addUsingAlias(ClubDidReportsPeer::DATE_SUBMITTED, $dateSubmitted['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateSubmitted['max'])) {
				$this->addUsingAlias(ClubDidReportsPeer::DATE_SUBMITTED, $dateSubmitted['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubDidReportsPeer::DATE_SUBMITTED, $dateSubmitted, $comparison);
	}

	/**
	 * Filter the query on the uniqueid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUniqueid('fooValue');   // WHERE uniqueid = 'fooValue'
	 * $query->filterByUniqueid('%fooValue%'); // WHERE uniqueid LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $uniqueid The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByUniqueid($uniqueid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($uniqueid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $uniqueid)) {
				$uniqueid = str_replace('*', '%', $uniqueid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubDidReportsPeer::UNIQUEID, $uniqueid, $comparison);
	}

	/**
	 * Filter the query on the submit_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmitType('fooValue');   // WHERE submit_type = 'fooValue'
	 * $query->filterBySubmitType('%fooValue%'); // WHERE submit_type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $submitType The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterBySubmitType($submitType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submitType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submitType)) {
				$submitType = str_replace('*', '%', $submitType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubDidReportsPeer::SUBMIT_TYPE, $submitType, $comparison);
	}

	/**
	 * Filter the query on the advisor_approved column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorApproved(true); // WHERE advisor_approved = true
	 * $query->filterByAdvisorApproved('yes'); // WHERE advisor_approved = true
	 * </code>
	 *
	 * @param     boolean|string $advisorApproved The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorApproved($advisorApproved = null, $comparison = null)
	{
		if (is_string($advisorApproved)) {
			$advisor_approved = in_array(strtolower($advisorApproved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubDidReportsPeer::ADVISOR_APPROVED, $advisorApproved, $comparison);
	}

	/**
	 * Filter the query on the ccl_approved column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCclApproved(true); // WHERE ccl_approved = true
	 * $query->filterByCclApproved('yes'); // WHERE ccl_approved = true
	 * </code>
	 *
	 * @param     boolean|string $cclApproved The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function filterByCclApproved($cclApproved = null, $comparison = null)
	{
		if (is_string($cclApproved)) {
			$ccl_approved = in_array(strtolower($cclApproved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubDidReportsPeer::CCL_APPROVED, $cclApproved, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubDidReports $clubDidReports Object to remove from the list of results
	 *
	 * @return    ClubDidReportsQuery The current query, for fluid interface
	 */
	public function prune($clubDidReports = null)
	{
		if ($clubDidReports) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ClubDidReportsPeer::ORG_ID), $clubDidReports->getOrgId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ClubDidReportsPeer::REPORT_ID), $clubDidReports->getReportId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseClubDidReportsQuery
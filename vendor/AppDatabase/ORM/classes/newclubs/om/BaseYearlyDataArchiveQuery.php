<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\YearlyDataArchive;
use NewClubsORM\YearlyDataArchivePeer;
use NewClubsORM\YearlyDataArchiveQuery;

/**
 * Base class that represents a query for the 'yearly_data_archive' table.
 *
 * 
 *
 * @method     YearlyDataArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     YearlyDataArchiveQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     YearlyDataArchiveQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     YearlyDataArchiveQuery orderByRecognized($order = Criteria::ASC) Order by the recognized column
 * @method     YearlyDataArchiveQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     YearlyDataArchiveQuery orderByFallParticipation($order = Criteria::ASC) Order by the fall_participation column
 * @method     YearlyDataArchiveQuery orderByWinterParticipation($order = Criteria::ASC) Order by the winter_participation column
 * @method     YearlyDataArchiveQuery orderBySpringParticipation($order = Criteria::ASC) Order by the spring_participation column
 * @method     YearlyDataArchiveQuery orderByFallFund($order = Criteria::ASC) Order by the fall_fund column
 * @method     YearlyDataArchiveQuery orderByWinterFund($order = Criteria::ASC) Order by the winter_fund column
 * @method     YearlyDataArchiveQuery orderBySpringFund($order = Criteria::ASC) Order by the spring_fund column
 * @method     YearlyDataArchiveQuery orderByFallCs($order = Criteria::ASC) Order by the fall_cs column
 * @method     YearlyDataArchiveQuery orderByWinterCs($order = Criteria::ASC) Order by the winter_cs column
 * @method     YearlyDataArchiveQuery orderBySpringCs($order = Criteria::ASC) Order by the spring_cs column
 * @method     YearlyDataArchiveQuery orderByAchievements($order = Criteria::ASC) Order by the achievements column
 * @method     YearlyDataArchiveQuery orderBySubmitter($order = Criteria::ASC) Order by the submitter column
 * @method     YearlyDataArchiveQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     YearlyDataArchiveQuery groupById() Group by the id column
 * @method     YearlyDataArchiveQuery groupByOrgId() Group by the org_id column
 * @method     YearlyDataArchiveQuery groupByReportId() Group by the report_id column
 * @method     YearlyDataArchiveQuery groupByRecognized() Group by the recognized column
 * @method     YearlyDataArchiveQuery groupByMembers() Group by the members column
 * @method     YearlyDataArchiveQuery groupByFallParticipation() Group by the fall_participation column
 * @method     YearlyDataArchiveQuery groupByWinterParticipation() Group by the winter_participation column
 * @method     YearlyDataArchiveQuery groupBySpringParticipation() Group by the spring_participation column
 * @method     YearlyDataArchiveQuery groupByFallFund() Group by the fall_fund column
 * @method     YearlyDataArchiveQuery groupByWinterFund() Group by the winter_fund column
 * @method     YearlyDataArchiveQuery groupBySpringFund() Group by the spring_fund column
 * @method     YearlyDataArchiveQuery groupByFallCs() Group by the fall_cs column
 * @method     YearlyDataArchiveQuery groupByWinterCs() Group by the winter_cs column
 * @method     YearlyDataArchiveQuery groupBySpringCs() Group by the spring_cs column
 * @method     YearlyDataArchiveQuery groupByAchievements() Group by the achievements column
 * @method     YearlyDataArchiveQuery groupBySubmitter() Group by the submitter column
 * @method     YearlyDataArchiveQuery groupByDate() Group by the date column
 *
 * @method     YearlyDataArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     YearlyDataArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     YearlyDataArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     YearlyDataArchive findOne(PropelPDO $con = null) Return the first YearlyDataArchive matching the query
 * @method     YearlyDataArchive findOneOrCreate(PropelPDO $con = null) Return the first YearlyDataArchive matching the query, or a new YearlyDataArchive object populated from the query conditions when no match is found
 *
 * @method     YearlyDataArchive findOneById(int $id) Return the first YearlyDataArchive filtered by the id column
 * @method     YearlyDataArchive findOneByOrgId(int $org_id) Return the first YearlyDataArchive filtered by the org_id column
 * @method     YearlyDataArchive findOneByReportId(int $report_id) Return the first YearlyDataArchive filtered by the report_id column
 * @method     YearlyDataArchive findOneByRecognized(string $recognized) Return the first YearlyDataArchive filtered by the recognized column
 * @method     YearlyDataArchive findOneByMembers(string $members) Return the first YearlyDataArchive filtered by the members column
 * @method     YearlyDataArchive findOneByFallParticipation(string $fall_participation) Return the first YearlyDataArchive filtered by the fall_participation column
 * @method     YearlyDataArchive findOneByWinterParticipation(string $winter_participation) Return the first YearlyDataArchive filtered by the winter_participation column
 * @method     YearlyDataArchive findOneBySpringParticipation(string $spring_participation) Return the first YearlyDataArchive filtered by the spring_participation column
 * @method     YearlyDataArchive findOneByFallFund(string $fall_fund) Return the first YearlyDataArchive filtered by the fall_fund column
 * @method     YearlyDataArchive findOneByWinterFund(string $winter_fund) Return the first YearlyDataArchive filtered by the winter_fund column
 * @method     YearlyDataArchive findOneBySpringFund(string $spring_fund) Return the first YearlyDataArchive filtered by the spring_fund column
 * @method     YearlyDataArchive findOneByFallCs(string $fall_cs) Return the first YearlyDataArchive filtered by the fall_cs column
 * @method     YearlyDataArchive findOneByWinterCs(string $winter_cs) Return the first YearlyDataArchive filtered by the winter_cs column
 * @method     YearlyDataArchive findOneBySpringCs(string $spring_cs) Return the first YearlyDataArchive filtered by the spring_cs column
 * @method     YearlyDataArchive findOneByAchievements(string $achievements) Return the first YearlyDataArchive filtered by the achievements column
 * @method     YearlyDataArchive findOneBySubmitter(string $submitter) Return the first YearlyDataArchive filtered by the submitter column
 * @method     YearlyDataArchive findOneByDate(string $date) Return the first YearlyDataArchive filtered by the date column
 *
 * @method     array findById(int $id) Return YearlyDataArchive objects filtered by the id column
 * @method     array findByOrgId(int $org_id) Return YearlyDataArchive objects filtered by the org_id column
 * @method     array findByReportId(int $report_id) Return YearlyDataArchive objects filtered by the report_id column
 * @method     array findByRecognized(string $recognized) Return YearlyDataArchive objects filtered by the recognized column
 * @method     array findByMembers(string $members) Return YearlyDataArchive objects filtered by the members column
 * @method     array findByFallParticipation(string $fall_participation) Return YearlyDataArchive objects filtered by the fall_participation column
 * @method     array findByWinterParticipation(string $winter_participation) Return YearlyDataArchive objects filtered by the winter_participation column
 * @method     array findBySpringParticipation(string $spring_participation) Return YearlyDataArchive objects filtered by the spring_participation column
 * @method     array findByFallFund(string $fall_fund) Return YearlyDataArchive objects filtered by the fall_fund column
 * @method     array findByWinterFund(string $winter_fund) Return YearlyDataArchive objects filtered by the winter_fund column
 * @method     array findBySpringFund(string $spring_fund) Return YearlyDataArchive objects filtered by the spring_fund column
 * @method     array findByFallCs(string $fall_cs) Return YearlyDataArchive objects filtered by the fall_cs column
 * @method     array findByWinterCs(string $winter_cs) Return YearlyDataArchive objects filtered by the winter_cs column
 * @method     array findBySpringCs(string $spring_cs) Return YearlyDataArchive objects filtered by the spring_cs column
 * @method     array findByAchievements(string $achievements) Return YearlyDataArchive objects filtered by the achievements column
 * @method     array findBySubmitter(string $submitter) Return YearlyDataArchive objects filtered by the submitter column
 * @method     array findByDate(string $date) Return YearlyDataArchive objects filtered by the date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseYearlyDataArchiveQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseYearlyDataArchiveQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\YearlyDataArchive', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new YearlyDataArchiveQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    YearlyDataArchiveQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof YearlyDataArchiveQuery) {
			return $criteria;
		}
		$query = new YearlyDataArchiveQuery();
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
	 * @return    YearlyDataArchive|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = YearlyDataArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(YearlyDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    YearlyDataArchive A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `REPORT_ID`, `RECOGNIZED`, `MEMBERS`, `FALL_PARTICIPATION`, `WINTER_PARTICIPATION`, `SPRING_PARTICIPATION`, `FALL_FUND`, `WINTER_FUND`, `SPRING_FUND`, `FALL_CS`, `WINTER_CS`, `SPRING_CS`, `ACHIEVEMENTS`, `SUBMITTER`, `DATE` FROM `yearly_data_archive` WHERE `ID` = :p0';
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
			$obj = new YearlyDataArchive();
			$obj->hydrate($row);
			YearlyDataArchivePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    YearlyDataArchive|array|mixed the result, formatted by the current formatter
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
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(YearlyDataArchivePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(YearlyDataArchivePeer::ID, $keys, Criteria::IN);
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
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::ID, $id, $comparison);
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
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::ORG_ID, $orgId, $comparison);
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
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId)) {
			$useMinMax = false;
			if (isset($reportId['min'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::REPORT_ID, $reportId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($reportId['max'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::REPORT_ID, $reportId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::REPORT_ID, $reportId, $comparison);
	}

	/**
	 * Filter the query on the recognized column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRecognized('fooValue');   // WHERE recognized = 'fooValue'
	 * $query->filterByRecognized('%fooValue%'); // WHERE recognized LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $recognized The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByRecognized($recognized = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recognized)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recognized)) {
				$recognized = str_replace('*', '%', $recognized);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::RECOGNIZED, $recognized, $comparison);
	}

	/**
	 * Filter the query on the members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembers('fooValue');   // WHERE members = 'fooValue'
	 * $query->filterByMembers('%fooValue%'); // WHERE members LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $members The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByMembers($members = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($members)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $members)) {
				$members = str_replace('*', '%', $members);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::MEMBERS, $members, $comparison);
	}

	/**
	 * Filter the query on the fall_participation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFallParticipation('fooValue');   // WHERE fall_participation = 'fooValue'
	 * $query->filterByFallParticipation('%fooValue%'); // WHERE fall_participation LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fallParticipation The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByFallParticipation($fallParticipation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fallParticipation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fallParticipation)) {
				$fallParticipation = str_replace('*', '%', $fallParticipation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::FALL_PARTICIPATION, $fallParticipation, $comparison);
	}

	/**
	 * Filter the query on the winter_participation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWinterParticipation('fooValue');   // WHERE winter_participation = 'fooValue'
	 * $query->filterByWinterParticipation('%fooValue%'); // WHERE winter_participation LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $winterParticipation The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByWinterParticipation($winterParticipation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($winterParticipation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $winterParticipation)) {
				$winterParticipation = str_replace('*', '%', $winterParticipation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::WINTER_PARTICIPATION, $winterParticipation, $comparison);
	}

	/**
	 * Filter the query on the spring_participation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySpringParticipation('fooValue');   // WHERE spring_participation = 'fooValue'
	 * $query->filterBySpringParticipation('%fooValue%'); // WHERE spring_participation LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $springParticipation The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterBySpringParticipation($springParticipation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($springParticipation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $springParticipation)) {
				$springParticipation = str_replace('*', '%', $springParticipation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::SPRING_PARTICIPATION, $springParticipation, $comparison);
	}

	/**
	 * Filter the query on the fall_fund column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFallFund('fooValue');   // WHERE fall_fund = 'fooValue'
	 * $query->filterByFallFund('%fooValue%'); // WHERE fall_fund LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fallFund The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByFallFund($fallFund = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fallFund)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fallFund)) {
				$fallFund = str_replace('*', '%', $fallFund);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::FALL_FUND, $fallFund, $comparison);
	}

	/**
	 * Filter the query on the winter_fund column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWinterFund('fooValue');   // WHERE winter_fund = 'fooValue'
	 * $query->filterByWinterFund('%fooValue%'); // WHERE winter_fund LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $winterFund The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByWinterFund($winterFund = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($winterFund)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $winterFund)) {
				$winterFund = str_replace('*', '%', $winterFund);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::WINTER_FUND, $winterFund, $comparison);
	}

	/**
	 * Filter the query on the spring_fund column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySpringFund('fooValue');   // WHERE spring_fund = 'fooValue'
	 * $query->filterBySpringFund('%fooValue%'); // WHERE spring_fund LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $springFund The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterBySpringFund($springFund = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($springFund)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $springFund)) {
				$springFund = str_replace('*', '%', $springFund);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::SPRING_FUND, $springFund, $comparison);
	}

	/**
	 * Filter the query on the fall_cs column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFallCs('fooValue');   // WHERE fall_cs = 'fooValue'
	 * $query->filterByFallCs('%fooValue%'); // WHERE fall_cs LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fallCs The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByFallCs($fallCs = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fallCs)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fallCs)) {
				$fallCs = str_replace('*', '%', $fallCs);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::FALL_CS, $fallCs, $comparison);
	}

	/**
	 * Filter the query on the winter_cs column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWinterCs('fooValue');   // WHERE winter_cs = 'fooValue'
	 * $query->filterByWinterCs('%fooValue%'); // WHERE winter_cs LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $winterCs The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByWinterCs($winterCs = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($winterCs)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $winterCs)) {
				$winterCs = str_replace('*', '%', $winterCs);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::WINTER_CS, $winterCs, $comparison);
	}

	/**
	 * Filter the query on the spring_cs column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySpringCs('fooValue');   // WHERE spring_cs = 'fooValue'
	 * $query->filterBySpringCs('%fooValue%'); // WHERE spring_cs LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $springCs The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterBySpringCs($springCs = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($springCs)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $springCs)) {
				$springCs = str_replace('*', '%', $springCs);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::SPRING_CS, $springCs, $comparison);
	}

	/**
	 * Filter the query on the achievements column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAchievements('fooValue');   // WHERE achievements = 'fooValue'
	 * $query->filterByAchievements('%fooValue%'); // WHERE achievements LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $achievements The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByAchievements($achievements = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($achievements)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $achievements)) {
				$achievements = str_replace('*', '%', $achievements);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::ACHIEVEMENTS, $achievements, $comparison);
	}

	/**
	 * Filter the query on the submitter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmitter('fooValue');   // WHERE submitter = 'fooValue'
	 * $query->filterBySubmitter('%fooValue%'); // WHERE submitter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $submitter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterBySubmitter($submitter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submitter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submitter)) {
				$submitter = str_replace('*', '%', $submitter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::SUBMITTER, $submitter, $comparison);
	}

	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
	 * $query->filterByDate('now'); // WHERE date = '2011-03-14'
	 * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $date The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(YearlyDataArchivePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyDataArchivePeer::DATE, $date, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     YearlyDataArchive $yearlyDataArchive Object to remove from the list of results
	 *
	 * @return    YearlyDataArchiveQuery The current query, for fluid interface
	 */
	public function prune($yearlyDataArchive = null)
	{
		if ($yearlyDataArchive) {
			$this->addUsingAlias(YearlyDataArchivePeer::ID, $yearlyDataArchive->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseYearlyDataArchiveQuery
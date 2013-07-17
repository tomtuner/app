<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\QuarterlyReports;
use ClubsORM\QuarterlyReportsPeer;
use ClubsORM\QuarterlyReportsQuery;

/**
 * Base class that represents a query for the 'quarterly_reports' table.
 *
 * 
 *
 * @method     QuarterlyReportsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     QuarterlyReportsQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     QuarterlyReportsQuery orderByQuarter($order = Criteria::ASC) Order by the quarter column
 * @method     QuarterlyReportsQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     QuarterlyReportsQuery orderByMemberListId($order = Criteria::ASC) Order by the member_list_id column
 * @method     QuarterlyReportsQuery orderByClubMeetingId($order = Criteria::ASC) Order by the club_meeting_id column
 * @method     QuarterlyReportsQuery orderByClubName($order = Criteria::ASC) Order by the club_name column
 * @method     QuarterlyReportsQuery orderByNumActiveMembers($order = Criteria::ASC) Order by the num_active_members column
 * @method     QuarterlyReportsQuery orderByNumAssociateMembers($order = Criteria::ASC) Order by the num_associate_members column
 * @method     QuarterlyReportsQuery orderByAvgMeetingAttendance($order = Criteria::ASC) Order by the avg_meeting_attendance column
 * @method     QuarterlyReportsQuery orderByGoals($order = Criteria::ASC) Order by the goals column
 * @method     QuarterlyReportsQuery orderByAccomplishGoals($order = Criteria::ASC) Order by the accomplish_goals column
 * @method     QuarterlyReportsQuery orderByHelp($order = Criteria::ASC) Order by the help column
 * @method     QuarterlyReportsQuery orderByOther($order = Criteria::ASC) Order by the other column
 * @method     QuarterlyReportsQuery orderByBoardChanges($order = Criteria::ASC) Order by the board_changes column
 *
 * @method     QuarterlyReportsQuery groupById() Group by the id column
 * @method     QuarterlyReportsQuery groupByYear() Group by the year column
 * @method     QuarterlyReportsQuery groupByQuarter() Group by the quarter column
 * @method     QuarterlyReportsQuery groupByOrganizationId() Group by the organization_id column
 * @method     QuarterlyReportsQuery groupByMemberListId() Group by the member_list_id column
 * @method     QuarterlyReportsQuery groupByClubMeetingId() Group by the club_meeting_id column
 * @method     QuarterlyReportsQuery groupByClubName() Group by the club_name column
 * @method     QuarterlyReportsQuery groupByNumActiveMembers() Group by the num_active_members column
 * @method     QuarterlyReportsQuery groupByNumAssociateMembers() Group by the num_associate_members column
 * @method     QuarterlyReportsQuery groupByAvgMeetingAttendance() Group by the avg_meeting_attendance column
 * @method     QuarterlyReportsQuery groupByGoals() Group by the goals column
 * @method     QuarterlyReportsQuery groupByAccomplishGoals() Group by the accomplish_goals column
 * @method     QuarterlyReportsQuery groupByHelp() Group by the help column
 * @method     QuarterlyReportsQuery groupByOther() Group by the other column
 * @method     QuarterlyReportsQuery groupByBoardChanges() Group by the board_changes column
 *
 * @method     QuarterlyReportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     QuarterlyReportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     QuarterlyReportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     QuarterlyReports findOne(PropelPDO $con = null) Return the first QuarterlyReports matching the query
 * @method     QuarterlyReports findOneOrCreate(PropelPDO $con = null) Return the first QuarterlyReports matching the query, or a new QuarterlyReports object populated from the query conditions when no match is found
 *
 * @method     QuarterlyReports findOneById(int $id) Return the first QuarterlyReports filtered by the id column
 * @method     QuarterlyReports findOneByYear(int $year) Return the first QuarterlyReports filtered by the year column
 * @method     QuarterlyReports findOneByQuarter(int $quarter) Return the first QuarterlyReports filtered by the quarter column
 * @method     QuarterlyReports findOneByOrganizationId(int $organization_id) Return the first QuarterlyReports filtered by the organization_id column
 * @method     QuarterlyReports findOneByMemberListId(int $member_list_id) Return the first QuarterlyReports filtered by the member_list_id column
 * @method     QuarterlyReports findOneByClubMeetingId(int $club_meeting_id) Return the first QuarterlyReports filtered by the club_meeting_id column
 * @method     QuarterlyReports findOneByClubName(string $club_name) Return the first QuarterlyReports filtered by the club_name column
 * @method     QuarterlyReports findOneByNumActiveMembers(int $num_active_members) Return the first QuarterlyReports filtered by the num_active_members column
 * @method     QuarterlyReports findOneByNumAssociateMembers(int $num_associate_members) Return the first QuarterlyReports filtered by the num_associate_members column
 * @method     QuarterlyReports findOneByAvgMeetingAttendance(int $avg_meeting_attendance) Return the first QuarterlyReports filtered by the avg_meeting_attendance column
 * @method     QuarterlyReports findOneByGoals(string $goals) Return the first QuarterlyReports filtered by the goals column
 * @method     QuarterlyReports findOneByAccomplishGoals(string $accomplish_goals) Return the first QuarterlyReports filtered by the accomplish_goals column
 * @method     QuarterlyReports findOneByHelp(string $help) Return the first QuarterlyReports filtered by the help column
 * @method     QuarterlyReports findOneByOther(string $other) Return the first QuarterlyReports filtered by the other column
 * @method     QuarterlyReports findOneByBoardChanges(string $board_changes) Return the first QuarterlyReports filtered by the board_changes column
 *
 * @method     array findById(int $id) Return QuarterlyReports objects filtered by the id column
 * @method     array findByYear(int $year) Return QuarterlyReports objects filtered by the year column
 * @method     array findByQuarter(int $quarter) Return QuarterlyReports objects filtered by the quarter column
 * @method     array findByOrganizationId(int $organization_id) Return QuarterlyReports objects filtered by the organization_id column
 * @method     array findByMemberListId(int $member_list_id) Return QuarterlyReports objects filtered by the member_list_id column
 * @method     array findByClubMeetingId(int $club_meeting_id) Return QuarterlyReports objects filtered by the club_meeting_id column
 * @method     array findByClubName(string $club_name) Return QuarterlyReports objects filtered by the club_name column
 * @method     array findByNumActiveMembers(int $num_active_members) Return QuarterlyReports objects filtered by the num_active_members column
 * @method     array findByNumAssociateMembers(int $num_associate_members) Return QuarterlyReports objects filtered by the num_associate_members column
 * @method     array findByAvgMeetingAttendance(int $avg_meeting_attendance) Return QuarterlyReports objects filtered by the avg_meeting_attendance column
 * @method     array findByGoals(string $goals) Return QuarterlyReports objects filtered by the goals column
 * @method     array findByAccomplishGoals(string $accomplish_goals) Return QuarterlyReports objects filtered by the accomplish_goals column
 * @method     array findByHelp(string $help) Return QuarterlyReports objects filtered by the help column
 * @method     array findByOther(string $other) Return QuarterlyReports objects filtered by the other column
 * @method     array findByBoardChanges(string $board_changes) Return QuarterlyReports objects filtered by the board_changes column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseQuarterlyReportsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseQuarterlyReportsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\QuarterlyReports', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new QuarterlyReportsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    QuarterlyReportsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof QuarterlyReportsQuery) {
			return $criteria;
		}
		$query = new QuarterlyReportsQuery();
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
	 * @return    QuarterlyReports|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = QuarterlyReportsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    QuarterlyReports A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `YEAR`, `QUARTER`, `ORGANIZATION_ID`, `MEMBER_LIST_ID`, `CLUB_MEETING_ID`, `CLUB_NAME`, `NUM_ACTIVE_MEMBERS`, `NUM_ASSOCIATE_MEMBERS`, `AVG_MEETING_ATTENDANCE`, `GOALS`, `ACCOMPLISH_GOALS`, `HELP`, `OTHER`, `BOARD_CHANGES` FROM `quarterly_reports` WHERE `ID` = :p0';
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
			$obj = new QuarterlyReports();
			$obj->hydrate($row);
			QuarterlyReportsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    QuarterlyReports|array|mixed the result, formatted by the current formatter
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
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(QuarterlyReportsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(QuarterlyReportsPeer::ID, $keys, Criteria::IN);
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
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::ID, $id, $comparison);
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
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (is_array($year)) {
			$useMinMax = false;
			if (isset($year['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($year['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::YEAR, $year, $comparison);
	}

	/**
	 * Filter the query on the quarter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuarter(1234); // WHERE quarter = 1234
	 * $query->filterByQuarter(array(12, 34)); // WHERE quarter IN (12, 34)
	 * $query->filterByQuarter(array('min' => 12)); // WHERE quarter > 12
	 * </code>
	 *
	 * @param     mixed $quarter The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByQuarter($quarter = null, $comparison = null)
	{
		if (is_array($quarter)) {
			$useMinMax = false;
			if (isset($quarter['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::QUARTER, $quarter['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quarter['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::QUARTER, $quarter['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::QUARTER, $quarter, $comparison);
	}

	/**
	 * Filter the query on the organization_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrganizationId(1234); // WHERE organization_id = 1234
	 * $query->filterByOrganizationId(array(12, 34)); // WHERE organization_id IN (12, 34)
	 * $query->filterByOrganizationId(array('min' => 12)); // WHERE organization_id > 12
	 * </code>
	 *
	 * @param     mixed $organizationId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::ORGANIZATION_ID, $organizationId, $comparison);
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
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByMemberListId($memberListId = null, $comparison = null)
	{
		if (is_array($memberListId)) {
			$useMinMax = false;
			if (isset($memberListId['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::MEMBER_LIST_ID, $memberListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($memberListId['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::MEMBER_LIST_ID, $memberListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::MEMBER_LIST_ID, $memberListId, $comparison);
	}

	/**
	 * Filter the query on the club_meeting_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubMeetingId(1234); // WHERE club_meeting_id = 1234
	 * $query->filterByClubMeetingId(array(12, 34)); // WHERE club_meeting_id IN (12, 34)
	 * $query->filterByClubMeetingId(array('min' => 12)); // WHERE club_meeting_id > 12
	 * </code>
	 *
	 * @param     mixed $clubMeetingId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByClubMeetingId($clubMeetingId = null, $comparison = null)
	{
		if (is_array($clubMeetingId)) {
			$useMinMax = false;
			if (isset($clubMeetingId['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::CLUB_MEETING_ID, $clubMeetingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubMeetingId['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::CLUB_MEETING_ID, $clubMeetingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::CLUB_MEETING_ID, $clubMeetingId, $comparison);
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
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyReportsPeer::CLUB_NAME, $clubName, $comparison);
	}

	/**
	 * Filter the query on the num_active_members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumActiveMembers(1234); // WHERE num_active_members = 1234
	 * $query->filterByNumActiveMembers(array(12, 34)); // WHERE num_active_members IN (12, 34)
	 * $query->filterByNumActiveMembers(array('min' => 12)); // WHERE num_active_members > 12
	 * </code>
	 *
	 * @param     mixed $numActiveMembers The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByNumActiveMembers($numActiveMembers = null, $comparison = null)
	{
		if (is_array($numActiveMembers)) {
			$useMinMax = false;
			if (isset($numActiveMembers['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS, $numActiveMembers['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numActiveMembers['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS, $numActiveMembers['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS, $numActiveMembers, $comparison);
	}

	/**
	 * Filter the query on the num_associate_members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumAssociateMembers(1234); // WHERE num_associate_members = 1234
	 * $query->filterByNumAssociateMembers(array(12, 34)); // WHERE num_associate_members IN (12, 34)
	 * $query->filterByNumAssociateMembers(array('min' => 12)); // WHERE num_associate_members > 12
	 * </code>
	 *
	 * @param     mixed $numAssociateMembers The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByNumAssociateMembers($numAssociateMembers = null, $comparison = null)
	{
		if (is_array($numAssociateMembers)) {
			$useMinMax = false;
			if (isset($numAssociateMembers['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS, $numAssociateMembers['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numAssociateMembers['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS, $numAssociateMembers['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS, $numAssociateMembers, $comparison);
	}

	/**
	 * Filter the query on the avg_meeting_attendance column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAvgMeetingAttendance(1234); // WHERE avg_meeting_attendance = 1234
	 * $query->filterByAvgMeetingAttendance(array(12, 34)); // WHERE avg_meeting_attendance IN (12, 34)
	 * $query->filterByAvgMeetingAttendance(array('min' => 12)); // WHERE avg_meeting_attendance > 12
	 * </code>
	 *
	 * @param     mixed $avgMeetingAttendance The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByAvgMeetingAttendance($avgMeetingAttendance = null, $comparison = null)
	{
		if (is_array($avgMeetingAttendance)) {
			$useMinMax = false;
			if (isset($avgMeetingAttendance['min'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE, $avgMeetingAttendance['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($avgMeetingAttendance['max'])) {
				$this->addUsingAlias(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE, $avgMeetingAttendance['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE, $avgMeetingAttendance, $comparison);
	}

	/**
	 * Filter the query on the goals column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGoals('fooValue');   // WHERE goals = 'fooValue'
	 * $query->filterByGoals('%fooValue%'); // WHERE goals LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $goals The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByGoals($goals = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($goals)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $goals)) {
				$goals = str_replace('*', '%', $goals);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::GOALS, $goals, $comparison);
	}

	/**
	 * Filter the query on the accomplish_goals column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAccomplishGoals('fooValue');   // WHERE accomplish_goals = 'fooValue'
	 * $query->filterByAccomplishGoals('%fooValue%'); // WHERE accomplish_goals LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $accomplishGoals The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByAccomplishGoals($accomplishGoals = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($accomplishGoals)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $accomplishGoals)) {
				$accomplishGoals = str_replace('*', '%', $accomplishGoals);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::ACCOMPLISH_GOALS, $accomplishGoals, $comparison);
	}

	/**
	 * Filter the query on the help column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHelp('fooValue');   // WHERE help = 'fooValue'
	 * $query->filterByHelp('%fooValue%'); // WHERE help LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $help The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByHelp($help = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($help)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $help)) {
				$help = str_replace('*', '%', $help);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::HELP, $help, $comparison);
	}

	/**
	 * Filter the query on the other column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOther('fooValue');   // WHERE other = 'fooValue'
	 * $query->filterByOther('%fooValue%'); // WHERE other LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $other The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByOther($other = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($other)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $other)) {
				$other = str_replace('*', '%', $other);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::OTHER, $other, $comparison);
	}

	/**
	 * Filter the query on the board_changes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBoardChanges('fooValue');   // WHERE board_changes = 'fooValue'
	 * $query->filterByBoardChanges('%fooValue%'); // WHERE board_changes LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $boardChanges The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function filterByBoardChanges($boardChanges = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($boardChanges)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $boardChanges)) {
				$boardChanges = str_replace('*', '%', $boardChanges);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyReportsPeer::BOARD_CHANGES, $boardChanges, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     QuarterlyReports $quarterlyReports Object to remove from the list of results
	 *
	 * @return    QuarterlyReportsQuery The current query, for fluid interface
	 */
	public function prune($quarterlyReports = null)
	{
		if ($quarterlyReports) {
			$this->addUsingAlias(QuarterlyReportsPeer::ID, $quarterlyReports->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseQuarterlyReportsQuery
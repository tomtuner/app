<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\QuarterlyData;
use NewClubsORM\QuarterlyDataPeer;
use NewClubsORM\QuarterlyDataQuery;

/**
 * Base class that represents a query for the 'quarterly_data' table.
 *
 * 
 *
 * @method     QuarterlyDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     QuarterlyDataQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     QuarterlyDataQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     QuarterlyDataQuery orderByClubname($order = Criteria::ASC) Order by the clubname column
 * @method     QuarterlyDataQuery orderByMeetingPlace($order = Criteria::ASC) Order by the meeting_place column
 * @method     QuarterlyDataQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method     QuarterlyDataQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     QuarterlyDataQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     QuarterlyDataQuery orderByAssociate($order = Criteria::ASC) Order by the associate column
 * @method     QuarterlyDataQuery orderByAttendance($order = Criteria::ASC) Order by the attendance column
 * @method     QuarterlyDataQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     QuarterlyDataQuery orderByEvents($order = Criteria::ASC) Order by the events column
 * @method     QuarterlyDataQuery orderByUpcoming($order = Criteria::ASC) Order by the upcoming column
 * @method     QuarterlyDataQuery orderByGoals($order = Criteria::ASC) Order by the goals column
 * @method     QuarterlyDataQuery orderByReachgoals($order = Criteria::ASC) Order by the reachgoals column
 * @method     QuarterlyDataQuery orderByHelp($order = Criteria::ASC) Order by the help column
 * @method     QuarterlyDataQuery orderByAccomplishments($order = Criteria::ASC) Order by the accomplishments column
 * @method     QuarterlyDataQuery orderByBoardchanges($order = Criteria::ASC) Order by the boardchanges column
 * @method     QuarterlyDataQuery orderBySubmittedBy($order = Criteria::ASC) Order by the submitted_by column
 * @method     QuarterlyDataQuery orderByAdvisor($order = Criteria::ASC) Order by the advisor column
 *
 * @method     QuarterlyDataQuery groupById() Group by the id column
 * @method     QuarterlyDataQuery groupByReportId() Group by the report_id column
 * @method     QuarterlyDataQuery groupByOrgId() Group by the org_id column
 * @method     QuarterlyDataQuery groupByClubname() Group by the clubname column
 * @method     QuarterlyDataQuery groupByMeetingPlace() Group by the meeting_place column
 * @method     QuarterlyDataQuery groupByDay() Group by the day column
 * @method     QuarterlyDataQuery groupByTime() Group by the time column
 * @method     QuarterlyDataQuery groupByActive() Group by the active column
 * @method     QuarterlyDataQuery groupByAssociate() Group by the associate column
 * @method     QuarterlyDataQuery groupByAttendance() Group by the attendance column
 * @method     QuarterlyDataQuery groupByMembers() Group by the members column
 * @method     QuarterlyDataQuery groupByEvents() Group by the events column
 * @method     QuarterlyDataQuery groupByUpcoming() Group by the upcoming column
 * @method     QuarterlyDataQuery groupByGoals() Group by the goals column
 * @method     QuarterlyDataQuery groupByReachgoals() Group by the reachgoals column
 * @method     QuarterlyDataQuery groupByHelp() Group by the help column
 * @method     QuarterlyDataQuery groupByAccomplishments() Group by the accomplishments column
 * @method     QuarterlyDataQuery groupByBoardchanges() Group by the boardchanges column
 * @method     QuarterlyDataQuery groupBySubmittedBy() Group by the submitted_by column
 * @method     QuarterlyDataQuery groupByAdvisor() Group by the advisor column
 *
 * @method     QuarterlyDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     QuarterlyDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     QuarterlyDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     QuarterlyData findOne(PropelPDO $con = null) Return the first QuarterlyData matching the query
 * @method     QuarterlyData findOneOrCreate(PropelPDO $con = null) Return the first QuarterlyData matching the query, or a new QuarterlyData object populated from the query conditions when no match is found
 *
 * @method     QuarterlyData findOneById(int $id) Return the first QuarterlyData filtered by the id column
 * @method     QuarterlyData findOneByReportId(int $report_id) Return the first QuarterlyData filtered by the report_id column
 * @method     QuarterlyData findOneByOrgId(int $org_id) Return the first QuarterlyData filtered by the org_id column
 * @method     QuarterlyData findOneByClubname(string $clubname) Return the first QuarterlyData filtered by the clubname column
 * @method     QuarterlyData findOneByMeetingPlace(string $meeting_place) Return the first QuarterlyData filtered by the meeting_place column
 * @method     QuarterlyData findOneByDay(string $day) Return the first QuarterlyData filtered by the day column
 * @method     QuarterlyData findOneByTime(string $time) Return the first QuarterlyData filtered by the time column
 * @method     QuarterlyData findOneByActive(int $active) Return the first QuarterlyData filtered by the active column
 * @method     QuarterlyData findOneByAssociate(int $associate) Return the first QuarterlyData filtered by the associate column
 * @method     QuarterlyData findOneByAttendance(int $attendance) Return the first QuarterlyData filtered by the attendance column
 * @method     QuarterlyData findOneByMembers(string $members) Return the first QuarterlyData filtered by the members column
 * @method     QuarterlyData findOneByEvents(string $events) Return the first QuarterlyData filtered by the events column
 * @method     QuarterlyData findOneByUpcoming(string $upcoming) Return the first QuarterlyData filtered by the upcoming column
 * @method     QuarterlyData findOneByGoals(string $goals) Return the first QuarterlyData filtered by the goals column
 * @method     QuarterlyData findOneByReachgoals(string $reachgoals) Return the first QuarterlyData filtered by the reachgoals column
 * @method     QuarterlyData findOneByHelp(string $help) Return the first QuarterlyData filtered by the help column
 * @method     QuarterlyData findOneByAccomplishments(string $accomplishments) Return the first QuarterlyData filtered by the accomplishments column
 * @method     QuarterlyData findOneByBoardchanges(string $boardchanges) Return the first QuarterlyData filtered by the boardchanges column
 * @method     QuarterlyData findOneBySubmittedBy(string $submitted_by) Return the first QuarterlyData filtered by the submitted_by column
 * @method     QuarterlyData findOneByAdvisor(string $advisor) Return the first QuarterlyData filtered by the advisor column
 *
 * @method     array findById(int $id) Return QuarterlyData objects filtered by the id column
 * @method     array findByReportId(int $report_id) Return QuarterlyData objects filtered by the report_id column
 * @method     array findByOrgId(int $org_id) Return QuarterlyData objects filtered by the org_id column
 * @method     array findByClubname(string $clubname) Return QuarterlyData objects filtered by the clubname column
 * @method     array findByMeetingPlace(string $meeting_place) Return QuarterlyData objects filtered by the meeting_place column
 * @method     array findByDay(string $day) Return QuarterlyData objects filtered by the day column
 * @method     array findByTime(string $time) Return QuarterlyData objects filtered by the time column
 * @method     array findByActive(int $active) Return QuarterlyData objects filtered by the active column
 * @method     array findByAssociate(int $associate) Return QuarterlyData objects filtered by the associate column
 * @method     array findByAttendance(int $attendance) Return QuarterlyData objects filtered by the attendance column
 * @method     array findByMembers(string $members) Return QuarterlyData objects filtered by the members column
 * @method     array findByEvents(string $events) Return QuarterlyData objects filtered by the events column
 * @method     array findByUpcoming(string $upcoming) Return QuarterlyData objects filtered by the upcoming column
 * @method     array findByGoals(string $goals) Return QuarterlyData objects filtered by the goals column
 * @method     array findByReachgoals(string $reachgoals) Return QuarterlyData objects filtered by the reachgoals column
 * @method     array findByHelp(string $help) Return QuarterlyData objects filtered by the help column
 * @method     array findByAccomplishments(string $accomplishments) Return QuarterlyData objects filtered by the accomplishments column
 * @method     array findByBoardchanges(string $boardchanges) Return QuarterlyData objects filtered by the boardchanges column
 * @method     array findBySubmittedBy(string $submitted_by) Return QuarterlyData objects filtered by the submitted_by column
 * @method     array findByAdvisor(string $advisor) Return QuarterlyData objects filtered by the advisor column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyDataQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseQuarterlyDataQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\QuarterlyData', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new QuarterlyDataQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    QuarterlyDataQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof QuarterlyDataQuery) {
			return $criteria;
		}
		$query = new QuarterlyDataQuery();
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
	 * @return    QuarterlyData|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = QuarterlyDataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    QuarterlyData A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `REPORT_ID`, `ORG_ID`, `CLUBNAME`, `MEETING_PLACE`, `DAY`, `TIME`, `ACTIVE`, `ASSOCIATE`, `ATTENDANCE`, `MEMBERS`, `EVENTS`, `UPCOMING`, `GOALS`, `REACHGOALS`, `HELP`, `ACCOMPLISHMENTS`, `BOARDCHANGES`, `SUBMITTED_BY`, `ADVISOR` FROM `quarterly_data` WHERE `ID` = :p0';
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
			$obj = new QuarterlyData();
			$obj->hydrate($row);
			QuarterlyDataPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    QuarterlyData|array|mixed the result, formatted by the current formatter
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(QuarterlyDataPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(QuarterlyDataPeer::ID, $keys, Criteria::IN);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ID, $id, $comparison);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId)) {
			$useMinMax = false;
			if (isset($reportId['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::REPORT_ID, $reportId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($reportId['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::REPORT_ID, $reportId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::REPORT_ID, $reportId, $comparison);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the clubname column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubname('fooValue');   // WHERE clubname = 'fooValue'
	 * $query->filterByClubname('%fooValue%'); // WHERE clubname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clubname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByClubname($clubname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clubname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clubname)) {
				$clubname = str_replace('*', '%', $clubname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::CLUBNAME, $clubname, $comparison);
	}

	/**
	 * Filter the query on the meeting_place column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingPlace('fooValue');   // WHERE meeting_place = 'fooValue'
	 * $query->filterByMeetingPlace('%fooValue%'); // WHERE meeting_place LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetingPlace The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByMeetingPlace($meetingPlace = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetingPlace)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetingPlace)) {
				$meetingPlace = str_replace('*', '%', $meetingPlace);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::MEETING_PLACE, $meetingPlace, $comparison);
	}

	/**
	 * Filter the query on the day column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDay('fooValue');   // WHERE day = 'fooValue'
	 * $query->filterByDay('%fooValue%'); // WHERE day LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $day The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByDay($day = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($day)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $day)) {
				$day = str_replace('*', '%', $day);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::DAY, $day, $comparison);
	}

	/**
	 * Filter the query on the time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
	 * $query->filterByTime('%fooValue%'); // WHERE time LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $time The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByTime($time = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($time)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $time)) {
				$time = str_replace('*', '%', $time);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::TIME, $time, $comparison);
	}

	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(1234); // WHERE active = 1234
	 * $query->filterByActive(array(12, 34)); // WHERE active IN (12, 34)
	 * $query->filterByActive(array('min' => 12)); // WHERE active > 12
	 * </code>
	 *
	 * @param     mixed $active The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_array($active)) {
			$useMinMax = false;
			if (isset($active['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($active['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ACTIVE, $active['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the associate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAssociate(1234); // WHERE associate = 1234
	 * $query->filterByAssociate(array(12, 34)); // WHERE associate IN (12, 34)
	 * $query->filterByAssociate(array('min' => 12)); // WHERE associate > 12
	 * </code>
	 *
	 * @param     mixed $associate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByAssociate($associate = null, $comparison = null)
	{
		if (is_array($associate)) {
			$useMinMax = false;
			if (isset($associate['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ASSOCIATE, $associate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($associate['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ASSOCIATE, $associate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ASSOCIATE, $associate, $comparison);
	}

	/**
	 * Filter the query on the attendance column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAttendance(1234); // WHERE attendance = 1234
	 * $query->filterByAttendance(array(12, 34)); // WHERE attendance IN (12, 34)
	 * $query->filterByAttendance(array('min' => 12)); // WHERE attendance > 12
	 * </code>
	 *
	 * @param     mixed $attendance The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByAttendance($attendance = null, $comparison = null)
	{
		if (is_array($attendance)) {
			$useMinMax = false;
			if (isset($attendance['min'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ATTENDANCE, $attendance['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($attendance['max'])) {
				$this->addUsingAlias(QuarterlyDataPeer::ATTENDANCE, $attendance['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ATTENDANCE, $attendance, $comparison);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataPeer::MEMBERS, $members, $comparison);
	}

	/**
	 * Filter the query on the events column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEvents('fooValue');   // WHERE events = 'fooValue'
	 * $query->filterByEvents('%fooValue%'); // WHERE events LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $events The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByEvents($events = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($events)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $events)) {
				$events = str_replace('*', '%', $events);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::EVENTS, $events, $comparison);
	}

	/**
	 * Filter the query on the upcoming column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpcoming('fooValue');   // WHERE upcoming = 'fooValue'
	 * $query->filterByUpcoming('%fooValue%'); // WHERE upcoming LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $upcoming The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByUpcoming($upcoming = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($upcoming)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $upcoming)) {
				$upcoming = str_replace('*', '%', $upcoming);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::UPCOMING, $upcoming, $comparison);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataPeer::GOALS, $goals, $comparison);
	}

	/**
	 * Filter the query on the reachgoals column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReachgoals('fooValue');   // WHERE reachgoals = 'fooValue'
	 * $query->filterByReachgoals('%fooValue%'); // WHERE reachgoals LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reachgoals The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByReachgoals($reachgoals = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reachgoals)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reachgoals)) {
				$reachgoals = str_replace('*', '%', $reachgoals);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::REACHGOALS, $reachgoals, $comparison);
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
	 * @return    QuarterlyDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataPeer::HELP, $help, $comparison);
	}

	/**
	 * Filter the query on the accomplishments column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAccomplishments('fooValue');   // WHERE accomplishments = 'fooValue'
	 * $query->filterByAccomplishments('%fooValue%'); // WHERE accomplishments LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $accomplishments The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByAccomplishments($accomplishments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($accomplishments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $accomplishments)) {
				$accomplishments = str_replace('*', '%', $accomplishments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ACCOMPLISHMENTS, $accomplishments, $comparison);
	}

	/**
	 * Filter the query on the boardchanges column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBoardchanges('fooValue');   // WHERE boardchanges = 'fooValue'
	 * $query->filterByBoardchanges('%fooValue%'); // WHERE boardchanges LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $boardchanges The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByBoardchanges($boardchanges = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($boardchanges)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $boardchanges)) {
				$boardchanges = str_replace('*', '%', $boardchanges);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::BOARDCHANGES, $boardchanges, $comparison);
	}

	/**
	 * Filter the query on the submitted_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmittedBy('fooValue');   // WHERE submitted_by = 'fooValue'
	 * $query->filterBySubmittedBy('%fooValue%'); // WHERE submitted_by LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $submittedBy The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterBySubmittedBy($submittedBy = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submittedBy)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submittedBy)) {
				$submittedBy = str_replace('*', '%', $submittedBy);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::SUBMITTED_BY, $submittedBy, $comparison);
	}

	/**
	 * Filter the query on the advisor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisor('fooValue');   // WHERE advisor = 'fooValue'
	 * $query->filterByAdvisor('%fooValue%'); // WHERE advisor LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $advisor The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function filterByAdvisor($advisor = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($advisor)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $advisor)) {
				$advisor = str_replace('*', '%', $advisor);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyDataPeer::ADVISOR, $advisor, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     QuarterlyData $quarterlyData Object to remove from the list of results
	 *
	 * @return    QuarterlyDataQuery The current query, for fluid interface
	 */
	public function prune($quarterlyData = null)
	{
		if ($quarterlyData) {
			$this->addUsingAlias(QuarterlyDataPeer::ID, $quarterlyData->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseQuarterlyDataQuery
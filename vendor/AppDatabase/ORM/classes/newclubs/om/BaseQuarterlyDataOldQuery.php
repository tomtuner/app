<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\QuarterlyDataOld;
use NewClubsORM\QuarterlyDataOldPeer;
use NewClubsORM\QuarterlyDataOldQuery;

/**
 * Base class that represents a query for the 'quarterly_data_old' table.
 *
 * 
 *
 * @method     QuarterlyDataOldQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     QuarterlyDataOldQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     QuarterlyDataOldQuery orderByClubname($order = Criteria::ASC) Order by the clubname column
 * @method     QuarterlyDataOldQuery orderByMeetingPlace($order = Criteria::ASC) Order by the meeting_place column
 * @method     QuarterlyDataOldQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method     QuarterlyDataOldQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     QuarterlyDataOldQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     QuarterlyDataOldQuery orderByAssociate($order = Criteria::ASC) Order by the associate column
 * @method     QuarterlyDataOldQuery orderByAttendance($order = Criteria::ASC) Order by the attendance column
 * @method     QuarterlyDataOldQuery orderByCos($order = Criteria::ASC) Order by the COS column
 * @method     QuarterlyDataOldQuery orderByCias($order = Criteria::ASC) Order by the CIAS column
 * @method     QuarterlyDataOldQuery orderByCob($order = Criteria::ASC) Order by the COB column
 * @method     QuarterlyDataOldQuery orderByCoe($order = Criteria::ASC) Order by the COE column
 * @method     QuarterlyDataOldQuery orderByCla($order = Criteria::ASC) Order by the CLA column
 * @method     QuarterlyDataOldQuery orderByNtid($order = Criteria::ASC) Order by the NTID column
 * @method     QuarterlyDataOldQuery orderByGccis($order = Criteria::ASC) Order by the GCCIS column
 * @method     QuarterlyDataOldQuery orderByCast($order = Criteria::ASC) Order by the CAST column
 * @method     QuarterlyDataOldQuery orderByNonrit($order = Criteria::ASC) Order by the NonRIT column
 * @method     QuarterlyDataOldQuery orderByOne($order = Criteria::ASC) Order by the one column
 * @method     QuarterlyDataOldQuery orderByTwo($order = Criteria::ASC) Order by the two column
 * @method     QuarterlyDataOldQuery orderByThree($order = Criteria::ASC) Order by the three column
 * @method     QuarterlyDataOldQuery orderByFour($order = Criteria::ASC) Order by the four column
 * @method     QuarterlyDataOldQuery orderByFive($order = Criteria::ASC) Order by the five column
 * @method     QuarterlyDataOldQuery orderByG($order = Criteria::ASC) Order by the G column
 * @method     QuarterlyDataOldQuery orderByOtherYear($order = Criteria::ASC) Order by the other_year column
 * @method     QuarterlyDataOldQuery orderByAsian($order = Criteria::ASC) Order by the Asian column
 * @method     QuarterlyDataOldQuery orderByAfrican($order = Criteria::ASC) Order by the African column
 * @method     QuarterlyDataOldQuery orderByNative($order = Criteria::ASC) Order by the Native column
 * @method     QuarterlyDataOldQuery orderByLatino($order = Criteria::ASC) Order by the Latino column
 * @method     QuarterlyDataOldQuery orderByCaucasian($order = Criteria::ASC) Order by the Caucasian column
 * @method     QuarterlyDataOldQuery orderByInternational($order = Criteria::ASC) Order by the International column
 * @method     QuarterlyDataOldQuery orderByOther($order = Criteria::ASC) Order by the Other column
 * @method     QuarterlyDataOldQuery orderByMale($order = Criteria::ASC) Order by the Male column
 * @method     QuarterlyDataOldQuery orderByFemale($order = Criteria::ASC) Order by the Female column
 * @method     QuarterlyDataOldQuery orderByEvents($order = Criteria::ASC) Order by the events column
 * @method     QuarterlyDataOldQuery orderByUpcoming($order = Criteria::ASC) Order by the upcoming column
 * @method     QuarterlyDataOldQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     QuarterlyDataOldQuery orderByGoals($order = Criteria::ASC) Order by the goals column
 * @method     QuarterlyDataOldQuery orderByReachgoals($order = Criteria::ASC) Order by the reachgoals column
 * @method     QuarterlyDataOldQuery orderByHelp($order = Criteria::ASC) Order by the help column
 * @method     QuarterlyDataOldQuery orderByAccomplishments($order = Criteria::ASC) Order by the accomplishments column
 * @method     QuarterlyDataOldQuery orderByBoardchanges($order = Criteria::ASC) Order by the boardchanges column
 * @method     QuarterlyDataOldQuery orderBySubmittedBy($order = Criteria::ASC) Order by the submitted_by column
 * @method     QuarterlyDataOldQuery orderByAdvisor($order = Criteria::ASC) Order by the advisor column
 *
 * @method     QuarterlyDataOldQuery groupByReportId() Group by the report_id column
 * @method     QuarterlyDataOldQuery groupByOrgId() Group by the org_id column
 * @method     QuarterlyDataOldQuery groupByClubname() Group by the clubname column
 * @method     QuarterlyDataOldQuery groupByMeetingPlace() Group by the meeting_place column
 * @method     QuarterlyDataOldQuery groupByDay() Group by the day column
 * @method     QuarterlyDataOldQuery groupByTime() Group by the time column
 * @method     QuarterlyDataOldQuery groupByActive() Group by the active column
 * @method     QuarterlyDataOldQuery groupByAssociate() Group by the associate column
 * @method     QuarterlyDataOldQuery groupByAttendance() Group by the attendance column
 * @method     QuarterlyDataOldQuery groupByCos() Group by the COS column
 * @method     QuarterlyDataOldQuery groupByCias() Group by the CIAS column
 * @method     QuarterlyDataOldQuery groupByCob() Group by the COB column
 * @method     QuarterlyDataOldQuery groupByCoe() Group by the COE column
 * @method     QuarterlyDataOldQuery groupByCla() Group by the CLA column
 * @method     QuarterlyDataOldQuery groupByNtid() Group by the NTID column
 * @method     QuarterlyDataOldQuery groupByGccis() Group by the GCCIS column
 * @method     QuarterlyDataOldQuery groupByCast() Group by the CAST column
 * @method     QuarterlyDataOldQuery groupByNonrit() Group by the NonRIT column
 * @method     QuarterlyDataOldQuery groupByOne() Group by the one column
 * @method     QuarterlyDataOldQuery groupByTwo() Group by the two column
 * @method     QuarterlyDataOldQuery groupByThree() Group by the three column
 * @method     QuarterlyDataOldQuery groupByFour() Group by the four column
 * @method     QuarterlyDataOldQuery groupByFive() Group by the five column
 * @method     QuarterlyDataOldQuery groupByG() Group by the G column
 * @method     QuarterlyDataOldQuery groupByOtherYear() Group by the other_year column
 * @method     QuarterlyDataOldQuery groupByAsian() Group by the Asian column
 * @method     QuarterlyDataOldQuery groupByAfrican() Group by the African column
 * @method     QuarterlyDataOldQuery groupByNative() Group by the Native column
 * @method     QuarterlyDataOldQuery groupByLatino() Group by the Latino column
 * @method     QuarterlyDataOldQuery groupByCaucasian() Group by the Caucasian column
 * @method     QuarterlyDataOldQuery groupByInternational() Group by the International column
 * @method     QuarterlyDataOldQuery groupByOther() Group by the Other column
 * @method     QuarterlyDataOldQuery groupByMale() Group by the Male column
 * @method     QuarterlyDataOldQuery groupByFemale() Group by the Female column
 * @method     QuarterlyDataOldQuery groupByEvents() Group by the events column
 * @method     QuarterlyDataOldQuery groupByUpcoming() Group by the upcoming column
 * @method     QuarterlyDataOldQuery groupByMembers() Group by the members column
 * @method     QuarterlyDataOldQuery groupByGoals() Group by the goals column
 * @method     QuarterlyDataOldQuery groupByReachgoals() Group by the reachgoals column
 * @method     QuarterlyDataOldQuery groupByHelp() Group by the help column
 * @method     QuarterlyDataOldQuery groupByAccomplishments() Group by the accomplishments column
 * @method     QuarterlyDataOldQuery groupByBoardchanges() Group by the boardchanges column
 * @method     QuarterlyDataOldQuery groupBySubmittedBy() Group by the submitted_by column
 * @method     QuarterlyDataOldQuery groupByAdvisor() Group by the advisor column
 *
 * @method     QuarterlyDataOldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     QuarterlyDataOldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     QuarterlyDataOldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     QuarterlyDataOld findOne(PropelPDO $con = null) Return the first QuarterlyDataOld matching the query
 * @method     QuarterlyDataOld findOneOrCreate(PropelPDO $con = null) Return the first QuarterlyDataOld matching the query, or a new QuarterlyDataOld object populated from the query conditions when no match is found
 *
 * @method     QuarterlyDataOld findOneByReportId(int $report_id) Return the first QuarterlyDataOld filtered by the report_id column
 * @method     QuarterlyDataOld findOneByOrgId(int $org_id) Return the first QuarterlyDataOld filtered by the org_id column
 * @method     QuarterlyDataOld findOneByClubname(string $clubname) Return the first QuarterlyDataOld filtered by the clubname column
 * @method     QuarterlyDataOld findOneByMeetingPlace(string $meeting_place) Return the first QuarterlyDataOld filtered by the meeting_place column
 * @method     QuarterlyDataOld findOneByDay(string $day) Return the first QuarterlyDataOld filtered by the day column
 * @method     QuarterlyDataOld findOneByTime(string $time) Return the first QuarterlyDataOld filtered by the time column
 * @method     QuarterlyDataOld findOneByActive(int $active) Return the first QuarterlyDataOld filtered by the active column
 * @method     QuarterlyDataOld findOneByAssociate(int $associate) Return the first QuarterlyDataOld filtered by the associate column
 * @method     QuarterlyDataOld findOneByAttendance(int $attendance) Return the first QuarterlyDataOld filtered by the attendance column
 * @method     QuarterlyDataOld findOneByCos(int $COS) Return the first QuarterlyDataOld filtered by the COS column
 * @method     QuarterlyDataOld findOneByCias(int $CIAS) Return the first QuarterlyDataOld filtered by the CIAS column
 * @method     QuarterlyDataOld findOneByCob(int $COB) Return the first QuarterlyDataOld filtered by the COB column
 * @method     QuarterlyDataOld findOneByCoe(int $COE) Return the first QuarterlyDataOld filtered by the COE column
 * @method     QuarterlyDataOld findOneByCla(int $CLA) Return the first QuarterlyDataOld filtered by the CLA column
 * @method     QuarterlyDataOld findOneByNtid(int $NTID) Return the first QuarterlyDataOld filtered by the NTID column
 * @method     QuarterlyDataOld findOneByGccis(int $GCCIS) Return the first QuarterlyDataOld filtered by the GCCIS column
 * @method     QuarterlyDataOld findOneByCast(int $CAST) Return the first QuarterlyDataOld filtered by the CAST column
 * @method     QuarterlyDataOld findOneByNonrit(int $NonRIT) Return the first QuarterlyDataOld filtered by the NonRIT column
 * @method     QuarterlyDataOld findOneByOne(int $one) Return the first QuarterlyDataOld filtered by the one column
 * @method     QuarterlyDataOld findOneByTwo(int $two) Return the first QuarterlyDataOld filtered by the two column
 * @method     QuarterlyDataOld findOneByThree(int $three) Return the first QuarterlyDataOld filtered by the three column
 * @method     QuarterlyDataOld findOneByFour(int $four) Return the first QuarterlyDataOld filtered by the four column
 * @method     QuarterlyDataOld findOneByFive(int $five) Return the first QuarterlyDataOld filtered by the five column
 * @method     QuarterlyDataOld findOneByG(int $G) Return the first QuarterlyDataOld filtered by the G column
 * @method     QuarterlyDataOld findOneByOtherYear(int $other_year) Return the first QuarterlyDataOld filtered by the other_year column
 * @method     QuarterlyDataOld findOneByAsian(int $Asian) Return the first QuarterlyDataOld filtered by the Asian column
 * @method     QuarterlyDataOld findOneByAfrican(int $African) Return the first QuarterlyDataOld filtered by the African column
 * @method     QuarterlyDataOld findOneByNative(int $Native) Return the first QuarterlyDataOld filtered by the Native column
 * @method     QuarterlyDataOld findOneByLatino(int $Latino) Return the first QuarterlyDataOld filtered by the Latino column
 * @method     QuarterlyDataOld findOneByCaucasian(int $Caucasian) Return the first QuarterlyDataOld filtered by the Caucasian column
 * @method     QuarterlyDataOld findOneByInternational(int $International) Return the first QuarterlyDataOld filtered by the International column
 * @method     QuarterlyDataOld findOneByOther(int $Other) Return the first QuarterlyDataOld filtered by the Other column
 * @method     QuarterlyDataOld findOneByMale(int $Male) Return the first QuarterlyDataOld filtered by the Male column
 * @method     QuarterlyDataOld findOneByFemale(int $Female) Return the first QuarterlyDataOld filtered by the Female column
 * @method     QuarterlyDataOld findOneByEvents(string $events) Return the first QuarterlyDataOld filtered by the events column
 * @method     QuarterlyDataOld findOneByUpcoming(string $upcoming) Return the first QuarterlyDataOld filtered by the upcoming column
 * @method     QuarterlyDataOld findOneByMembers(string $members) Return the first QuarterlyDataOld filtered by the members column
 * @method     QuarterlyDataOld findOneByGoals(string $goals) Return the first QuarterlyDataOld filtered by the goals column
 * @method     QuarterlyDataOld findOneByReachgoals(string $reachgoals) Return the first QuarterlyDataOld filtered by the reachgoals column
 * @method     QuarterlyDataOld findOneByHelp(string $help) Return the first QuarterlyDataOld filtered by the help column
 * @method     QuarterlyDataOld findOneByAccomplishments(string $accomplishments) Return the first QuarterlyDataOld filtered by the accomplishments column
 * @method     QuarterlyDataOld findOneByBoardchanges(string $boardchanges) Return the first QuarterlyDataOld filtered by the boardchanges column
 * @method     QuarterlyDataOld findOneBySubmittedBy(string $submitted_by) Return the first QuarterlyDataOld filtered by the submitted_by column
 * @method     QuarterlyDataOld findOneByAdvisor(string $advisor) Return the first QuarterlyDataOld filtered by the advisor column
 *
 * @method     array findByReportId(int $report_id) Return QuarterlyDataOld objects filtered by the report_id column
 * @method     array findByOrgId(int $org_id) Return QuarterlyDataOld objects filtered by the org_id column
 * @method     array findByClubname(string $clubname) Return QuarterlyDataOld objects filtered by the clubname column
 * @method     array findByMeetingPlace(string $meeting_place) Return QuarterlyDataOld objects filtered by the meeting_place column
 * @method     array findByDay(string $day) Return QuarterlyDataOld objects filtered by the day column
 * @method     array findByTime(string $time) Return QuarterlyDataOld objects filtered by the time column
 * @method     array findByActive(int $active) Return QuarterlyDataOld objects filtered by the active column
 * @method     array findByAssociate(int $associate) Return QuarterlyDataOld objects filtered by the associate column
 * @method     array findByAttendance(int $attendance) Return QuarterlyDataOld objects filtered by the attendance column
 * @method     array findByCos(int $COS) Return QuarterlyDataOld objects filtered by the COS column
 * @method     array findByCias(int $CIAS) Return QuarterlyDataOld objects filtered by the CIAS column
 * @method     array findByCob(int $COB) Return QuarterlyDataOld objects filtered by the COB column
 * @method     array findByCoe(int $COE) Return QuarterlyDataOld objects filtered by the COE column
 * @method     array findByCla(int $CLA) Return QuarterlyDataOld objects filtered by the CLA column
 * @method     array findByNtid(int $NTID) Return QuarterlyDataOld objects filtered by the NTID column
 * @method     array findByGccis(int $GCCIS) Return QuarterlyDataOld objects filtered by the GCCIS column
 * @method     array findByCast(int $CAST) Return QuarterlyDataOld objects filtered by the CAST column
 * @method     array findByNonrit(int $NonRIT) Return QuarterlyDataOld objects filtered by the NonRIT column
 * @method     array findByOne(int $one) Return QuarterlyDataOld objects filtered by the one column
 * @method     array findByTwo(int $two) Return QuarterlyDataOld objects filtered by the two column
 * @method     array findByThree(int $three) Return QuarterlyDataOld objects filtered by the three column
 * @method     array findByFour(int $four) Return QuarterlyDataOld objects filtered by the four column
 * @method     array findByFive(int $five) Return QuarterlyDataOld objects filtered by the five column
 * @method     array findByG(int $G) Return QuarterlyDataOld objects filtered by the G column
 * @method     array findByOtherYear(int $other_year) Return QuarterlyDataOld objects filtered by the other_year column
 * @method     array findByAsian(int $Asian) Return QuarterlyDataOld objects filtered by the Asian column
 * @method     array findByAfrican(int $African) Return QuarterlyDataOld objects filtered by the African column
 * @method     array findByNative(int $Native) Return QuarterlyDataOld objects filtered by the Native column
 * @method     array findByLatino(int $Latino) Return QuarterlyDataOld objects filtered by the Latino column
 * @method     array findByCaucasian(int $Caucasian) Return QuarterlyDataOld objects filtered by the Caucasian column
 * @method     array findByInternational(int $International) Return QuarterlyDataOld objects filtered by the International column
 * @method     array findByOther(int $Other) Return QuarterlyDataOld objects filtered by the Other column
 * @method     array findByMale(int $Male) Return QuarterlyDataOld objects filtered by the Male column
 * @method     array findByFemale(int $Female) Return QuarterlyDataOld objects filtered by the Female column
 * @method     array findByEvents(string $events) Return QuarterlyDataOld objects filtered by the events column
 * @method     array findByUpcoming(string $upcoming) Return QuarterlyDataOld objects filtered by the upcoming column
 * @method     array findByMembers(string $members) Return QuarterlyDataOld objects filtered by the members column
 * @method     array findByGoals(string $goals) Return QuarterlyDataOld objects filtered by the goals column
 * @method     array findByReachgoals(string $reachgoals) Return QuarterlyDataOld objects filtered by the reachgoals column
 * @method     array findByHelp(string $help) Return QuarterlyDataOld objects filtered by the help column
 * @method     array findByAccomplishments(string $accomplishments) Return QuarterlyDataOld objects filtered by the accomplishments column
 * @method     array findByBoardchanges(string $boardchanges) Return QuarterlyDataOld objects filtered by the boardchanges column
 * @method     array findBySubmittedBy(string $submitted_by) Return QuarterlyDataOld objects filtered by the submitted_by column
 * @method     array findByAdvisor(string $advisor) Return QuarterlyDataOld objects filtered by the advisor column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyDataOldQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseQuarterlyDataOldQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\QuarterlyDataOld', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new QuarterlyDataOldQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    QuarterlyDataOldQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof QuarterlyDataOldQuery) {
			return $criteria;
		}
		$query = new QuarterlyDataOldQuery();
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
	 * @param     array[$report_id, $org_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    QuarterlyDataOld|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = QuarterlyDataOldPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    QuarterlyDataOld A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `REPORT_ID`, `ORG_ID`, `CLUBNAME`, `MEETING_PLACE`, `DAY`, `TIME`, `ACTIVE`, `ASSOCIATE`, `ATTENDANCE`, `COS`, `CIAS`, `COB`, `COE`, `CLA`, `NTID`, `GCCIS`, `CAST`, `NONRIT`, `ONE`, `TWO`, `THREE`, `FOUR`, `FIVE`, `G`, `OTHER_YEAR`, `ASIAN`, `AFRICAN`, `NATIVE`, `LATINO`, `CAUCASIAN`, `INTERNATIONAL`, `OTHER`, `MALE`, `FEMALE`, `EVENTS`, `UPCOMING`, `MEMBERS`, `GOALS`, `REACHGOALS`, `HELP`, `ACCOMPLISHMENTS`, `BOARDCHANGES`, `SUBMITTED_BY`, `ADVISOR` FROM `quarterly_data_old` WHERE `REPORT_ID` = :p0 AND `ORG_ID` = :p1';
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
			$obj = new QuarterlyDataOld();
			$obj->hydrate($row);
			QuarterlyDataOldPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    QuarterlyDataOld|array|mixed the result, formatted by the current formatter
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(QuarterlyDataOldPeer::REPORT_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(QuarterlyDataOldPeer::ORG_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(QuarterlyDataOldPeer::REPORT_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(QuarterlyDataOldPeer::ORG_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::REPORT_ID, $reportId, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ORG_ID, $orgId, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::CLUBNAME, $clubname, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::MEETING_PLACE, $meetingPlace, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::DAY, $day, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::TIME, $time, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_array($active)) {
			$useMinMax = false;
			if (isset($active['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($active['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ACTIVE, $active['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ACTIVE, $active, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByAssociate($associate = null, $comparison = null)
	{
		if (is_array($associate)) {
			$useMinMax = false;
			if (isset($associate['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ASSOCIATE, $associate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($associate['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ASSOCIATE, $associate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ASSOCIATE, $associate, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByAttendance($attendance = null, $comparison = null)
	{
		if (is_array($attendance)) {
			$useMinMax = false;
			if (isset($attendance['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ATTENDANCE, $attendance['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($attendance['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ATTENDANCE, $attendance['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ATTENDANCE, $attendance, $comparison);
	}

	/**
	 * Filter the query on the COS column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCos(1234); // WHERE COS = 1234
	 * $query->filterByCos(array(12, 34)); // WHERE COS IN (12, 34)
	 * $query->filterByCos(array('min' => 12)); // WHERE COS > 12
	 * </code>
	 *
	 * @param     mixed $cos The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCos($cos = null, $comparison = null)
	{
		if (is_array($cos)) {
			$useMinMax = false;
			if (isset($cos['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COS, $cos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cos['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COS, $cos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::COS, $cos, $comparison);
	}

	/**
	 * Filter the query on the CIAS column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCias(1234); // WHERE CIAS = 1234
	 * $query->filterByCias(array(12, 34)); // WHERE CIAS IN (12, 34)
	 * $query->filterByCias(array('min' => 12)); // WHERE CIAS > 12
	 * </code>
	 *
	 * @param     mixed $cias The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCias($cias = null, $comparison = null)
	{
		if (is_array($cias)) {
			$useMinMax = false;
			if (isset($cias['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CIAS, $cias['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cias['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CIAS, $cias['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::CIAS, $cias, $comparison);
	}

	/**
	 * Filter the query on the COB column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCob(1234); // WHERE COB = 1234
	 * $query->filterByCob(array(12, 34)); // WHERE COB IN (12, 34)
	 * $query->filterByCob(array('min' => 12)); // WHERE COB > 12
	 * </code>
	 *
	 * @param     mixed $cob The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCob($cob = null, $comparison = null)
	{
		if (is_array($cob)) {
			$useMinMax = false;
			if (isset($cob['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COB, $cob['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cob['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COB, $cob['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::COB, $cob, $comparison);
	}

	/**
	 * Filter the query on the COE column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCoe(1234); // WHERE COE = 1234
	 * $query->filterByCoe(array(12, 34)); // WHERE COE IN (12, 34)
	 * $query->filterByCoe(array('min' => 12)); // WHERE COE > 12
	 * </code>
	 *
	 * @param     mixed $coe The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCoe($coe = null, $comparison = null)
	{
		if (is_array($coe)) {
			$useMinMax = false;
			if (isset($coe['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COE, $coe['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($coe['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::COE, $coe['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::COE, $coe, $comparison);
	}

	/**
	 * Filter the query on the CLA column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCla(1234); // WHERE CLA = 1234
	 * $query->filterByCla(array(12, 34)); // WHERE CLA IN (12, 34)
	 * $query->filterByCla(array('min' => 12)); // WHERE CLA > 12
	 * </code>
	 *
	 * @param     mixed $cla The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCla($cla = null, $comparison = null)
	{
		if (is_array($cla)) {
			$useMinMax = false;
			if (isset($cla['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CLA, $cla['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cla['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CLA, $cla['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::CLA, $cla, $comparison);
	}

	/**
	 * Filter the query on the NTID column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNtid(1234); // WHERE NTID = 1234
	 * $query->filterByNtid(array(12, 34)); // WHERE NTID IN (12, 34)
	 * $query->filterByNtid(array('min' => 12)); // WHERE NTID > 12
	 * </code>
	 *
	 * @param     mixed $ntid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByNtid($ntid = null, $comparison = null)
	{
		if (is_array($ntid)) {
			$useMinMax = false;
			if (isset($ntid['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NTID, $ntid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ntid['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NTID, $ntid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::NTID, $ntid, $comparison);
	}

	/**
	 * Filter the query on the GCCIS column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGccis(1234); // WHERE GCCIS = 1234
	 * $query->filterByGccis(array(12, 34)); // WHERE GCCIS IN (12, 34)
	 * $query->filterByGccis(array('min' => 12)); // WHERE GCCIS > 12
	 * </code>
	 *
	 * @param     mixed $gccis The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByGccis($gccis = null, $comparison = null)
	{
		if (is_array($gccis)) {
			$useMinMax = false;
			if (isset($gccis['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::GCCIS, $gccis['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($gccis['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::GCCIS, $gccis['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::GCCIS, $gccis, $comparison);
	}

	/**
	 * Filter the query on the CAST column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCast(1234); // WHERE CAST = 1234
	 * $query->filterByCast(array(12, 34)); // WHERE CAST IN (12, 34)
	 * $query->filterByCast(array('min' => 12)); // WHERE CAST > 12
	 * </code>
	 *
	 * @param     mixed $cast The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCast($cast = null, $comparison = null)
	{
		if (is_array($cast)) {
			$useMinMax = false;
			if (isset($cast['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CAST, $cast['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cast['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CAST, $cast['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::CAST, $cast, $comparison);
	}

	/**
	 * Filter the query on the NonRIT column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNonrit(1234); // WHERE NonRIT = 1234
	 * $query->filterByNonrit(array(12, 34)); // WHERE NonRIT IN (12, 34)
	 * $query->filterByNonrit(array('min' => 12)); // WHERE NonRIT > 12
	 * </code>
	 *
	 * @param     mixed $nonrit The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByNonrit($nonrit = null, $comparison = null)
	{
		if (is_array($nonrit)) {
			$useMinMax = false;
			if (isset($nonrit['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NONRIT, $nonrit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nonrit['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NONRIT, $nonrit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::NONRIT, $nonrit, $comparison);
	}

	/**
	 * Filter the query on the one column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOne(1234); // WHERE one = 1234
	 * $query->filterByOne(array(12, 34)); // WHERE one IN (12, 34)
	 * $query->filterByOne(array('min' => 12)); // WHERE one > 12
	 * </code>
	 *
	 * @param     mixed $one The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByOne($one = null, $comparison = null)
	{
		if (is_array($one)) {
			$useMinMax = false;
			if (isset($one['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ONE, $one['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($one['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ONE, $one['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ONE, $one, $comparison);
	}

	/**
	 * Filter the query on the two column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTwo(1234); // WHERE two = 1234
	 * $query->filterByTwo(array(12, 34)); // WHERE two IN (12, 34)
	 * $query->filterByTwo(array('min' => 12)); // WHERE two > 12
	 * </code>
	 *
	 * @param     mixed $two The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByTwo($two = null, $comparison = null)
	{
		if (is_array($two)) {
			$useMinMax = false;
			if (isset($two['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::TWO, $two['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($two['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::TWO, $two['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::TWO, $two, $comparison);
	}

	/**
	 * Filter the query on the three column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByThree(1234); // WHERE three = 1234
	 * $query->filterByThree(array(12, 34)); // WHERE three IN (12, 34)
	 * $query->filterByThree(array('min' => 12)); // WHERE three > 12
	 * </code>
	 *
	 * @param     mixed $three The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByThree($three = null, $comparison = null)
	{
		if (is_array($three)) {
			$useMinMax = false;
			if (isset($three['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::THREE, $three['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($three['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::THREE, $three['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::THREE, $three, $comparison);
	}

	/**
	 * Filter the query on the four column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFour(1234); // WHERE four = 1234
	 * $query->filterByFour(array(12, 34)); // WHERE four IN (12, 34)
	 * $query->filterByFour(array('min' => 12)); // WHERE four > 12
	 * </code>
	 *
	 * @param     mixed $four The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByFour($four = null, $comparison = null)
	{
		if (is_array($four)) {
			$useMinMax = false;
			if (isset($four['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FOUR, $four['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($four['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FOUR, $four['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::FOUR, $four, $comparison);
	}

	/**
	 * Filter the query on the five column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFive(1234); // WHERE five = 1234
	 * $query->filterByFive(array(12, 34)); // WHERE five IN (12, 34)
	 * $query->filterByFive(array('min' => 12)); // WHERE five > 12
	 * </code>
	 *
	 * @param     mixed $five The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByFive($five = null, $comparison = null)
	{
		if (is_array($five)) {
			$useMinMax = false;
			if (isset($five['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FIVE, $five['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($five['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FIVE, $five['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::FIVE, $five, $comparison);
	}

	/**
	 * Filter the query on the G column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByG(1234); // WHERE G = 1234
	 * $query->filterByG(array(12, 34)); // WHERE G IN (12, 34)
	 * $query->filterByG(array('min' => 12)); // WHERE G > 12
	 * </code>
	 *
	 * @param     mixed $g The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByG($g = null, $comparison = null)
	{
		if (is_array($g)) {
			$useMinMax = false;
			if (isset($g['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::G, $g['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($g['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::G, $g['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::G, $g, $comparison);
	}

	/**
	 * Filter the query on the other_year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOtherYear(1234); // WHERE other_year = 1234
	 * $query->filterByOtherYear(array(12, 34)); // WHERE other_year IN (12, 34)
	 * $query->filterByOtherYear(array('min' => 12)); // WHERE other_year > 12
	 * </code>
	 *
	 * @param     mixed $otherYear The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByOtherYear($otherYear = null, $comparison = null)
	{
		if (is_array($otherYear)) {
			$useMinMax = false;
			if (isset($otherYear['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::OTHER_YEAR, $otherYear['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($otherYear['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::OTHER_YEAR, $otherYear['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::OTHER_YEAR, $otherYear, $comparison);
	}

	/**
	 * Filter the query on the Asian column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAsian(1234); // WHERE Asian = 1234
	 * $query->filterByAsian(array(12, 34)); // WHERE Asian IN (12, 34)
	 * $query->filterByAsian(array('min' => 12)); // WHERE Asian > 12
	 * </code>
	 *
	 * @param     mixed $asian The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByAsian($asian = null, $comparison = null)
	{
		if (is_array($asian)) {
			$useMinMax = false;
			if (isset($asian['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ASIAN, $asian['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($asian['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::ASIAN, $asian['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::ASIAN, $asian, $comparison);
	}

	/**
	 * Filter the query on the African column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAfrican(1234); // WHERE African = 1234
	 * $query->filterByAfrican(array(12, 34)); // WHERE African IN (12, 34)
	 * $query->filterByAfrican(array('min' => 12)); // WHERE African > 12
	 * </code>
	 *
	 * @param     mixed $african The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByAfrican($african = null, $comparison = null)
	{
		if (is_array($african)) {
			$useMinMax = false;
			if (isset($african['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::AFRICAN, $african['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($african['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::AFRICAN, $african['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::AFRICAN, $african, $comparison);
	}

	/**
	 * Filter the query on the Native column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNative(1234); // WHERE Native = 1234
	 * $query->filterByNative(array(12, 34)); // WHERE Native IN (12, 34)
	 * $query->filterByNative(array('min' => 12)); // WHERE Native > 12
	 * </code>
	 *
	 * @param     mixed $native The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByNative($native = null, $comparison = null)
	{
		if (is_array($native)) {
			$useMinMax = false;
			if (isset($native['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NATIVE, $native['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($native['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::NATIVE, $native['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::NATIVE, $native, $comparison);
	}

	/**
	 * Filter the query on the Latino column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLatino(1234); // WHERE Latino = 1234
	 * $query->filterByLatino(array(12, 34)); // WHERE Latino IN (12, 34)
	 * $query->filterByLatino(array('min' => 12)); // WHERE Latino > 12
	 * </code>
	 *
	 * @param     mixed $latino The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByLatino($latino = null, $comparison = null)
	{
		if (is_array($latino)) {
			$useMinMax = false;
			if (isset($latino['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::LATINO, $latino['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latino['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::LATINO, $latino['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::LATINO, $latino, $comparison);
	}

	/**
	 * Filter the query on the Caucasian column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCaucasian(1234); // WHERE Caucasian = 1234
	 * $query->filterByCaucasian(array(12, 34)); // WHERE Caucasian IN (12, 34)
	 * $query->filterByCaucasian(array('min' => 12)); // WHERE Caucasian > 12
	 * </code>
	 *
	 * @param     mixed $caucasian The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByCaucasian($caucasian = null, $comparison = null)
	{
		if (is_array($caucasian)) {
			$useMinMax = false;
			if (isset($caucasian['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CAUCASIAN, $caucasian['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($caucasian['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::CAUCASIAN, $caucasian['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::CAUCASIAN, $caucasian, $comparison);
	}

	/**
	 * Filter the query on the International column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInternational(1234); // WHERE International = 1234
	 * $query->filterByInternational(array(12, 34)); // WHERE International IN (12, 34)
	 * $query->filterByInternational(array('min' => 12)); // WHERE International > 12
	 * </code>
	 *
	 * @param     mixed $international The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByInternational($international = null, $comparison = null)
	{
		if (is_array($international)) {
			$useMinMax = false;
			if (isset($international['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::INTERNATIONAL, $international['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($international['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::INTERNATIONAL, $international['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::INTERNATIONAL, $international, $comparison);
	}

	/**
	 * Filter the query on the Other column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOther(1234); // WHERE Other = 1234
	 * $query->filterByOther(array(12, 34)); // WHERE Other IN (12, 34)
	 * $query->filterByOther(array('min' => 12)); // WHERE Other > 12
	 * </code>
	 *
	 * @param     mixed $other The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByOther($other = null, $comparison = null)
	{
		if (is_array($other)) {
			$useMinMax = false;
			if (isset($other['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::OTHER, $other['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($other['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::OTHER, $other['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::OTHER, $other, $comparison);
	}

	/**
	 * Filter the query on the Male column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMale(1234); // WHERE Male = 1234
	 * $query->filterByMale(array(12, 34)); // WHERE Male IN (12, 34)
	 * $query->filterByMale(array('min' => 12)); // WHERE Male > 12
	 * </code>
	 *
	 * @param     mixed $male The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByMale($male = null, $comparison = null)
	{
		if (is_array($male)) {
			$useMinMax = false;
			if (isset($male['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::MALE, $male['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($male['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::MALE, $male['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::MALE, $male, $comparison);
	}

	/**
	 * Filter the query on the Female column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFemale(1234); // WHERE Female = 1234
	 * $query->filterByFemale(array(12, 34)); // WHERE Female IN (12, 34)
	 * $query->filterByFemale(array('min' => 12)); // WHERE Female > 12
	 * </code>
	 *
	 * @param     mixed $female The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function filterByFemale($female = null, $comparison = null)
	{
		if (is_array($female)) {
			$useMinMax = false;
			if (isset($female['min'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FEMALE, $female['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($female['max'])) {
				$this->addUsingAlias(QuarterlyDataOldPeer::FEMALE, $female['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyDataOldPeer::FEMALE, $female, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::EVENTS, $events, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::UPCOMING, $upcoming, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::MEMBERS, $members, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::GOALS, $goals, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::REACHGOALS, $reachgoals, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::HELP, $help, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::ACCOMPLISHMENTS, $accomplishments, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::BOARDCHANGES, $boardchanges, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::SUBMITTED_BY, $submittedBy, $comparison);
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
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyDataOldPeer::ADVISOR, $advisor, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     QuarterlyDataOld $quarterlyDataOld Object to remove from the list of results
	 *
	 * @return    QuarterlyDataOldQuery The current query, for fluid interface
	 */
	public function prune($quarterlyDataOld = null)
	{
		if ($quarterlyDataOld) {
			$this->addCond('pruneCond0', $this->getAliasedColName(QuarterlyDataOldPeer::REPORT_ID), $quarterlyDataOld->getReportId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(QuarterlyDataOldPeer::ORG_ID), $quarterlyDataOld->getOrgId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseQuarterlyDataOldQuery
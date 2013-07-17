<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\YearlyReports;
use ClubsORM\YearlyReportsPeer;
use ClubsORM\YearlyReportsQuery;

/**
 * Base class that represents a query for the 'yearly_reports' table.
 *
 * 
 *
 * @method     YearlyReportsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     YearlyReportsQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     YearlyReportsQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     YearlyReportsQuery orderByRecognizedOn($order = Criteria::ASC) Order by the recognized_on column
 * @method     YearlyReportsQuery orderByNumMembers($order = Criteria::ASC) Order by the num_members column
 * @method     YearlyReportsQuery orderByEventsFall($order = Criteria::ASC) Order by the events_fall column
 * @method     YearlyReportsQuery orderByEventsWinter($order = Criteria::ASC) Order by the events_winter column
 * @method     YearlyReportsQuery orderByEventsSpring($order = Criteria::ASC) Order by the events_spring column
 * @method     YearlyReportsQuery orderByFundraisingFall($order = Criteria::ASC) Order by the fundraising_fall column
 * @method     YearlyReportsQuery orderByFundraisingWinter($order = Criteria::ASC) Order by the fundraising_winter column
 * @method     YearlyReportsQuery orderByFundraisingSpring($order = Criteria::ASC) Order by the fundraising_spring column
 * @method     YearlyReportsQuery orderByServiceFall($order = Criteria::ASC) Order by the service_fall column
 * @method     YearlyReportsQuery orderByServiceWinter($order = Criteria::ASC) Order by the service_winter column
 * @method     YearlyReportsQuery orderByServiceSpring($order = Criteria::ASC) Order by the service_spring column
 * @method     YearlyReportsQuery orderByAchievements($order = Criteria::ASC) Order by the achievements column
 *
 * @method     YearlyReportsQuery groupById() Group by the id column
 * @method     YearlyReportsQuery groupByYear() Group by the year column
 * @method     YearlyReportsQuery groupByOrganizationId() Group by the organization_id column
 * @method     YearlyReportsQuery groupByRecognizedOn() Group by the recognized_on column
 * @method     YearlyReportsQuery groupByNumMembers() Group by the num_members column
 * @method     YearlyReportsQuery groupByEventsFall() Group by the events_fall column
 * @method     YearlyReportsQuery groupByEventsWinter() Group by the events_winter column
 * @method     YearlyReportsQuery groupByEventsSpring() Group by the events_spring column
 * @method     YearlyReportsQuery groupByFundraisingFall() Group by the fundraising_fall column
 * @method     YearlyReportsQuery groupByFundraisingWinter() Group by the fundraising_winter column
 * @method     YearlyReportsQuery groupByFundraisingSpring() Group by the fundraising_spring column
 * @method     YearlyReportsQuery groupByServiceFall() Group by the service_fall column
 * @method     YearlyReportsQuery groupByServiceWinter() Group by the service_winter column
 * @method     YearlyReportsQuery groupByServiceSpring() Group by the service_spring column
 * @method     YearlyReportsQuery groupByAchievements() Group by the achievements column
 *
 * @method     YearlyReportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     YearlyReportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     YearlyReportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     YearlyReports findOne(PropelPDO $con = null) Return the first YearlyReports matching the query
 * @method     YearlyReports findOneOrCreate(PropelPDO $con = null) Return the first YearlyReports matching the query, or a new YearlyReports object populated from the query conditions when no match is found
 *
 * @method     YearlyReports findOneById(int $id) Return the first YearlyReports filtered by the id column
 * @method     YearlyReports findOneByYear(int $year) Return the first YearlyReports filtered by the year column
 * @method     YearlyReports findOneByOrganizationId(int $organization_id) Return the first YearlyReports filtered by the organization_id column
 * @method     YearlyReports findOneByRecognizedOn(string $recognized_on) Return the first YearlyReports filtered by the recognized_on column
 * @method     YearlyReports findOneByNumMembers(int $num_members) Return the first YearlyReports filtered by the num_members column
 * @method     YearlyReports findOneByEventsFall(string $events_fall) Return the first YearlyReports filtered by the events_fall column
 * @method     YearlyReports findOneByEventsWinter(string $events_winter) Return the first YearlyReports filtered by the events_winter column
 * @method     YearlyReports findOneByEventsSpring(string $events_spring) Return the first YearlyReports filtered by the events_spring column
 * @method     YearlyReports findOneByFundraisingFall(string $fundraising_fall) Return the first YearlyReports filtered by the fundraising_fall column
 * @method     YearlyReports findOneByFundraisingWinter(string $fundraising_winter) Return the first YearlyReports filtered by the fundraising_winter column
 * @method     YearlyReports findOneByFundraisingSpring(string $fundraising_spring) Return the first YearlyReports filtered by the fundraising_spring column
 * @method     YearlyReports findOneByServiceFall(string $service_fall) Return the first YearlyReports filtered by the service_fall column
 * @method     YearlyReports findOneByServiceWinter(string $service_winter) Return the first YearlyReports filtered by the service_winter column
 * @method     YearlyReports findOneByServiceSpring(string $service_spring) Return the first YearlyReports filtered by the service_spring column
 * @method     YearlyReports findOneByAchievements(string $achievements) Return the first YearlyReports filtered by the achievements column
 *
 * @method     array findById(int $id) Return YearlyReports objects filtered by the id column
 * @method     array findByYear(int $year) Return YearlyReports objects filtered by the year column
 * @method     array findByOrganizationId(int $organization_id) Return YearlyReports objects filtered by the organization_id column
 * @method     array findByRecognizedOn(string $recognized_on) Return YearlyReports objects filtered by the recognized_on column
 * @method     array findByNumMembers(int $num_members) Return YearlyReports objects filtered by the num_members column
 * @method     array findByEventsFall(string $events_fall) Return YearlyReports objects filtered by the events_fall column
 * @method     array findByEventsWinter(string $events_winter) Return YearlyReports objects filtered by the events_winter column
 * @method     array findByEventsSpring(string $events_spring) Return YearlyReports objects filtered by the events_spring column
 * @method     array findByFundraisingFall(string $fundraising_fall) Return YearlyReports objects filtered by the fundraising_fall column
 * @method     array findByFundraisingWinter(string $fundraising_winter) Return YearlyReports objects filtered by the fundraising_winter column
 * @method     array findByFundraisingSpring(string $fundraising_spring) Return YearlyReports objects filtered by the fundraising_spring column
 * @method     array findByServiceFall(string $service_fall) Return YearlyReports objects filtered by the service_fall column
 * @method     array findByServiceWinter(string $service_winter) Return YearlyReports objects filtered by the service_winter column
 * @method     array findByServiceSpring(string $service_spring) Return YearlyReports objects filtered by the service_spring column
 * @method     array findByAchievements(string $achievements) Return YearlyReports objects filtered by the achievements column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseYearlyReportsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseYearlyReportsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\YearlyReports', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new YearlyReportsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    YearlyReportsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof YearlyReportsQuery) {
			return $criteria;
		}
		$query = new YearlyReportsQuery();
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
	 * @return    YearlyReports|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = YearlyReportsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(YearlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    YearlyReports A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `YEAR`, `ORGANIZATION_ID`, `RECOGNIZED_ON`, `NUM_MEMBERS`, `EVENTS_FALL`, `EVENTS_WINTER`, `EVENTS_SPRING`, `FUNDRAISING_FALL`, `FUNDRAISING_WINTER`, `FUNDRAISING_SPRING`, `SERVICE_FALL`, `SERVICE_WINTER`, `SERVICE_SPRING`, `ACHIEVEMENTS` FROM `yearly_reports` WHERE `ID` = :p0';
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
			$obj = new YearlyReports();
			$obj->hydrate($row);
			YearlyReportsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    YearlyReports|array|mixed the result, formatted by the current formatter
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
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(YearlyReportsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(YearlyReportsPeer::ID, $keys, Criteria::IN);
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
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(YearlyReportsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(YearlyReportsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::ID, $id, $comparison);
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
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (is_array($year)) {
			$useMinMax = false;
			if (isset($year['min'])) {
				$this->addUsingAlias(YearlyReportsPeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($year['max'])) {
				$this->addUsingAlias(YearlyReportsPeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::YEAR, $year, $comparison);
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
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(YearlyReportsPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(YearlyReportsPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::ORGANIZATION_ID, $organizationId, $comparison);
	}

	/**
	 * Filter the query on the recognized_on column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRecognizedOn('fooValue');   // WHERE recognized_on = 'fooValue'
	 * $query->filterByRecognizedOn('%fooValue%'); // WHERE recognized_on LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $recognizedOn The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByRecognizedOn($recognizedOn = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recognizedOn)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recognizedOn)) {
				$recognizedOn = str_replace('*', '%', $recognizedOn);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::RECOGNIZED_ON, $recognizedOn, $comparison);
	}

	/**
	 * Filter the query on the num_members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumMembers(1234); // WHERE num_members = 1234
	 * $query->filterByNumMembers(array(12, 34)); // WHERE num_members IN (12, 34)
	 * $query->filterByNumMembers(array('min' => 12)); // WHERE num_members > 12
	 * </code>
	 *
	 * @param     mixed $numMembers The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByNumMembers($numMembers = null, $comparison = null)
	{
		if (is_array($numMembers)) {
			$useMinMax = false;
			if (isset($numMembers['min'])) {
				$this->addUsingAlias(YearlyReportsPeer::NUM_MEMBERS, $numMembers['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numMembers['max'])) {
				$this->addUsingAlias(YearlyReportsPeer::NUM_MEMBERS, $numMembers['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::NUM_MEMBERS, $numMembers, $comparison);
	}

	/**
	 * Filter the query on the events_fall column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEventsFall('fooValue');   // WHERE events_fall = 'fooValue'
	 * $query->filterByEventsFall('%fooValue%'); // WHERE events_fall LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $eventsFall The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByEventsFall($eventsFall = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eventsFall)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eventsFall)) {
				$eventsFall = str_replace('*', '%', $eventsFall);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::EVENTS_FALL, $eventsFall, $comparison);
	}

	/**
	 * Filter the query on the events_winter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEventsWinter('fooValue');   // WHERE events_winter = 'fooValue'
	 * $query->filterByEventsWinter('%fooValue%'); // WHERE events_winter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $eventsWinter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByEventsWinter($eventsWinter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eventsWinter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eventsWinter)) {
				$eventsWinter = str_replace('*', '%', $eventsWinter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::EVENTS_WINTER, $eventsWinter, $comparison);
	}

	/**
	 * Filter the query on the events_spring column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEventsSpring('fooValue');   // WHERE events_spring = 'fooValue'
	 * $query->filterByEventsSpring('%fooValue%'); // WHERE events_spring LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $eventsSpring The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByEventsSpring($eventsSpring = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eventsSpring)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eventsSpring)) {
				$eventsSpring = str_replace('*', '%', $eventsSpring);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::EVENTS_SPRING, $eventsSpring, $comparison);
	}

	/**
	 * Filter the query on the fundraising_fall column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFundraisingFall('fooValue');   // WHERE fundraising_fall = 'fooValue'
	 * $query->filterByFundraisingFall('%fooValue%'); // WHERE fundraising_fall LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fundraisingFall The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByFundraisingFall($fundraisingFall = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fundraisingFall)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fundraisingFall)) {
				$fundraisingFall = str_replace('*', '%', $fundraisingFall);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::FUNDRAISING_FALL, $fundraisingFall, $comparison);
	}

	/**
	 * Filter the query on the fundraising_winter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFundraisingWinter('fooValue');   // WHERE fundraising_winter = 'fooValue'
	 * $query->filterByFundraisingWinter('%fooValue%'); // WHERE fundraising_winter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fundraisingWinter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByFundraisingWinter($fundraisingWinter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fundraisingWinter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fundraisingWinter)) {
				$fundraisingWinter = str_replace('*', '%', $fundraisingWinter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::FUNDRAISING_WINTER, $fundraisingWinter, $comparison);
	}

	/**
	 * Filter the query on the fundraising_spring column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFundraisingSpring('fooValue');   // WHERE fundraising_spring = 'fooValue'
	 * $query->filterByFundraisingSpring('%fooValue%'); // WHERE fundraising_spring LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fundraisingSpring The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByFundraisingSpring($fundraisingSpring = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fundraisingSpring)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fundraisingSpring)) {
				$fundraisingSpring = str_replace('*', '%', $fundraisingSpring);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::FUNDRAISING_SPRING, $fundraisingSpring, $comparison);
	}

	/**
	 * Filter the query on the service_fall column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByServiceFall('fooValue');   // WHERE service_fall = 'fooValue'
	 * $query->filterByServiceFall('%fooValue%'); // WHERE service_fall LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $serviceFall The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByServiceFall($serviceFall = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($serviceFall)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $serviceFall)) {
				$serviceFall = str_replace('*', '%', $serviceFall);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::SERVICE_FALL, $serviceFall, $comparison);
	}

	/**
	 * Filter the query on the service_winter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByServiceWinter('fooValue');   // WHERE service_winter = 'fooValue'
	 * $query->filterByServiceWinter('%fooValue%'); // WHERE service_winter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $serviceWinter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByServiceWinter($serviceWinter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($serviceWinter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $serviceWinter)) {
				$serviceWinter = str_replace('*', '%', $serviceWinter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::SERVICE_WINTER, $serviceWinter, $comparison);
	}

	/**
	 * Filter the query on the service_spring column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByServiceSpring('fooValue');   // WHERE service_spring = 'fooValue'
	 * $query->filterByServiceSpring('%fooValue%'); // WHERE service_spring LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $serviceSpring The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function filterByServiceSpring($serviceSpring = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($serviceSpring)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $serviceSpring)) {
				$serviceSpring = str_replace('*', '%', $serviceSpring);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(YearlyReportsPeer::SERVICE_SPRING, $serviceSpring, $comparison);
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
	 * @return    YearlyReportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(YearlyReportsPeer::ACHIEVEMENTS, $achievements, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     YearlyReports $yearlyReports Object to remove from the list of results
	 *
	 * @return    YearlyReportsQuery The current query, for fluid interface
	 */
	public function prune($yearlyReports = null)
	{
		if ($yearlyReports) {
			$this->addUsingAlias(YearlyReportsPeer::ID, $yearlyReports->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseYearlyReportsQuery
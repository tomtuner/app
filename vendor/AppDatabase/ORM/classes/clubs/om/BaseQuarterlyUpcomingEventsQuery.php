<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\QuarterlyUpcomingEvents;
use ClubsORM\QuarterlyUpcomingEventsPeer;
use ClubsORM\QuarterlyUpcomingEventsQuery;

/**
 * Base class that represents a query for the 'quarterly_upcoming_events' table.
 *
 * 
 *
 * @method     QuarterlyUpcomingEventsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     QuarterlyUpcomingEventsQuery orderByQuarterlyReportId($order = Criteria::ASC) Order by the quarterly_report_id column
 * @method     QuarterlyUpcomingEventsQuery orderByHeldOn($order = Criteria::ASC) Order by the held_on column
 * @method     QuarterlyUpcomingEventsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     QuarterlyUpcomingEventsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     QuarterlyUpcomingEventsQuery orderByContact($order = Criteria::ASC) Order by the contact column
 *
 * @method     QuarterlyUpcomingEventsQuery groupById() Group by the id column
 * @method     QuarterlyUpcomingEventsQuery groupByQuarterlyReportId() Group by the quarterly_report_id column
 * @method     QuarterlyUpcomingEventsQuery groupByHeldOn() Group by the held_on column
 * @method     QuarterlyUpcomingEventsQuery groupByLocation() Group by the location column
 * @method     QuarterlyUpcomingEventsQuery groupByDescription() Group by the description column
 * @method     QuarterlyUpcomingEventsQuery groupByContact() Group by the contact column
 *
 * @method     QuarterlyUpcomingEventsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     QuarterlyUpcomingEventsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     QuarterlyUpcomingEventsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     QuarterlyUpcomingEvents findOne(PropelPDO $con = null) Return the first QuarterlyUpcomingEvents matching the query
 * @method     QuarterlyUpcomingEvents findOneOrCreate(PropelPDO $con = null) Return the first QuarterlyUpcomingEvents matching the query, or a new QuarterlyUpcomingEvents object populated from the query conditions when no match is found
 *
 * @method     QuarterlyUpcomingEvents findOneById(int $id) Return the first QuarterlyUpcomingEvents filtered by the id column
 * @method     QuarterlyUpcomingEvents findOneByQuarterlyReportId(int $quarterly_report_id) Return the first QuarterlyUpcomingEvents filtered by the quarterly_report_id column
 * @method     QuarterlyUpcomingEvents findOneByHeldOn(string $held_on) Return the first QuarterlyUpcomingEvents filtered by the held_on column
 * @method     QuarterlyUpcomingEvents findOneByLocation(string $location) Return the first QuarterlyUpcomingEvents filtered by the location column
 * @method     QuarterlyUpcomingEvents findOneByDescription(string $description) Return the first QuarterlyUpcomingEvents filtered by the description column
 * @method     QuarterlyUpcomingEvents findOneByContact(string $contact) Return the first QuarterlyUpcomingEvents filtered by the contact column
 *
 * @method     array findById(int $id) Return QuarterlyUpcomingEvents objects filtered by the id column
 * @method     array findByQuarterlyReportId(int $quarterly_report_id) Return QuarterlyUpcomingEvents objects filtered by the quarterly_report_id column
 * @method     array findByHeldOn(string $held_on) Return QuarterlyUpcomingEvents objects filtered by the held_on column
 * @method     array findByLocation(string $location) Return QuarterlyUpcomingEvents objects filtered by the location column
 * @method     array findByDescription(string $description) Return QuarterlyUpcomingEvents objects filtered by the description column
 * @method     array findByContact(string $contact) Return QuarterlyUpcomingEvents objects filtered by the contact column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseQuarterlyUpcomingEventsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseQuarterlyUpcomingEventsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\QuarterlyUpcomingEvents', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new QuarterlyUpcomingEventsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    QuarterlyUpcomingEventsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof QuarterlyUpcomingEventsQuery) {
			return $criteria;
		}
		$query = new QuarterlyUpcomingEventsQuery();
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
	 * @return    QuarterlyUpcomingEvents|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = QuarterlyUpcomingEventsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyUpcomingEventsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    QuarterlyUpcomingEvents A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `QUARTERLY_REPORT_ID`, `HELD_ON`, `LOCATION`, `DESCRIPTION`, `CONTACT` FROM `quarterly_upcoming_events` WHERE `ID` = :p0';
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
			$obj = new QuarterlyUpcomingEvents();
			$obj->hydrate($row);
			QuarterlyUpcomingEventsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    QuarterlyUpcomingEvents|array|mixed the result, formatted by the current formatter
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
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $keys, Criteria::IN);
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
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the quarterly_report_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuarterlyReportId(1234); // WHERE quarterly_report_id = 1234
	 * $query->filterByQuarterlyReportId(array(12, 34)); // WHERE quarterly_report_id IN (12, 34)
	 * $query->filterByQuarterlyReportId(array('min' => 12)); // WHERE quarterly_report_id > 12
	 * </code>
	 *
	 * @param     mixed $quarterlyReportId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterByQuarterlyReportId($quarterlyReportId = null, $comparison = null)
	{
		if (is_array($quarterlyReportId)) {
			$useMinMax = false;
			if (isset($quarterlyReportId['min'])) {
				$this->addUsingAlias(QuarterlyUpcomingEventsPeer::QUARTERLY_REPORT_ID, $quarterlyReportId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quarterlyReportId['max'])) {
				$this->addUsingAlias(QuarterlyUpcomingEventsPeer::QUARTERLY_REPORT_ID, $quarterlyReportId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::QUARTERLY_REPORT_ID, $quarterlyReportId, $comparison);
	}

	/**
	 * Filter the query on the held_on column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHeldOn('fooValue');   // WHERE held_on = 'fooValue'
	 * $query->filterByHeldOn('%fooValue%'); // WHERE held_on LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $heldOn The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterByHeldOn($heldOn = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($heldOn)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $heldOn)) {
				$heldOn = str_replace('*', '%', $heldOn);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::HELD_ON, $heldOn, $comparison);
	}

	/**
	 * Filter the query on the location column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
	 * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $location The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function filterByLocation($location = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($location)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $location)) {
				$location = str_replace('*', '%', $location);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::LOCATION, $location, $comparison);
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
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::DESCRIPTION, $description, $comparison);
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
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyUpcomingEventsPeer::CONTACT, $contact, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     QuarterlyUpcomingEvents $quarterlyUpcomingEvents Object to remove from the list of results
	 *
	 * @return    QuarterlyUpcomingEventsQuery The current query, for fluid interface
	 */
	public function prune($quarterlyUpcomingEvents = null)
	{
		if ($quarterlyUpcomingEvents) {
			$this->addUsingAlias(QuarterlyUpcomingEventsPeer::ID, $quarterlyUpcomingEvents->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseQuarterlyUpcomingEventsQuery
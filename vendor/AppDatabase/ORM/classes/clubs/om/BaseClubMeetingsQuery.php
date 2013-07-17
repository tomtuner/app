<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\ClubMeetings;
use ClubsORM\ClubMeetingsPeer;
use ClubsORM\ClubMeetingsQuery;

/**
 * Base class that represents a query for the 'club_meetings' table.
 *
 * 
 *
 * @method     ClubMeetingsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubMeetingsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ClubMeetingsQuery orderByStartsAt($order = Criteria::ASC) Order by the starts_at column
 * @method     ClubMeetingsQuery orderByEndsAt($order = Criteria::ASC) Order by the ends_at column
 * @method     ClubMeetingsQuery orderByMonday($order = Criteria::ASC) Order by the monday column
 * @method     ClubMeetingsQuery orderByTuesday($order = Criteria::ASC) Order by the tuesday column
 * @method     ClubMeetingsQuery orderByWednesday($order = Criteria::ASC) Order by the wednesday column
 * @method     ClubMeetingsQuery orderByThursday($order = Criteria::ASC) Order by the thursday column
 * @method     ClubMeetingsQuery orderByFriday($order = Criteria::ASC) Order by the friday column
 * @method     ClubMeetingsQuery orderBySaturday($order = Criteria::ASC) Order by the saturday column
 * @method     ClubMeetingsQuery orderBySunday($order = Criteria::ASC) Order by the sunday column
 * @method     ClubMeetingsQuery orderByOther($order = Criteria::ASC) Order by the other column
 *
 * @method     ClubMeetingsQuery groupById() Group by the id column
 * @method     ClubMeetingsQuery groupByLocation() Group by the location column
 * @method     ClubMeetingsQuery groupByStartsAt() Group by the starts_at column
 * @method     ClubMeetingsQuery groupByEndsAt() Group by the ends_at column
 * @method     ClubMeetingsQuery groupByMonday() Group by the monday column
 * @method     ClubMeetingsQuery groupByTuesday() Group by the tuesday column
 * @method     ClubMeetingsQuery groupByWednesday() Group by the wednesday column
 * @method     ClubMeetingsQuery groupByThursday() Group by the thursday column
 * @method     ClubMeetingsQuery groupByFriday() Group by the friday column
 * @method     ClubMeetingsQuery groupBySaturday() Group by the saturday column
 * @method     ClubMeetingsQuery groupBySunday() Group by the sunday column
 * @method     ClubMeetingsQuery groupByOther() Group by the other column
 *
 * @method     ClubMeetingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubMeetingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubMeetingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubMeetings findOne(PropelPDO $con = null) Return the first ClubMeetings matching the query
 * @method     ClubMeetings findOneOrCreate(PropelPDO $con = null) Return the first ClubMeetings matching the query, or a new ClubMeetings object populated from the query conditions when no match is found
 *
 * @method     ClubMeetings findOneById(int $id) Return the first ClubMeetings filtered by the id column
 * @method     ClubMeetings findOneByLocation(string $location) Return the first ClubMeetings filtered by the location column
 * @method     ClubMeetings findOneByStartsAt(string $starts_at) Return the first ClubMeetings filtered by the starts_at column
 * @method     ClubMeetings findOneByEndsAt(string $ends_at) Return the first ClubMeetings filtered by the ends_at column
 * @method     ClubMeetings findOneByMonday(boolean $monday) Return the first ClubMeetings filtered by the monday column
 * @method     ClubMeetings findOneByTuesday(boolean $tuesday) Return the first ClubMeetings filtered by the tuesday column
 * @method     ClubMeetings findOneByWednesday(boolean $wednesday) Return the first ClubMeetings filtered by the wednesday column
 * @method     ClubMeetings findOneByThursday(boolean $thursday) Return the first ClubMeetings filtered by the thursday column
 * @method     ClubMeetings findOneByFriday(boolean $friday) Return the first ClubMeetings filtered by the friday column
 * @method     ClubMeetings findOneBySaturday(boolean $saturday) Return the first ClubMeetings filtered by the saturday column
 * @method     ClubMeetings findOneBySunday(boolean $sunday) Return the first ClubMeetings filtered by the sunday column
 * @method     ClubMeetings findOneByOther(string $other) Return the first ClubMeetings filtered by the other column
 *
 * @method     array findById(int $id) Return ClubMeetings objects filtered by the id column
 * @method     array findByLocation(string $location) Return ClubMeetings objects filtered by the location column
 * @method     array findByStartsAt(string $starts_at) Return ClubMeetings objects filtered by the starts_at column
 * @method     array findByEndsAt(string $ends_at) Return ClubMeetings objects filtered by the ends_at column
 * @method     array findByMonday(boolean $monday) Return ClubMeetings objects filtered by the monday column
 * @method     array findByTuesday(boolean $tuesday) Return ClubMeetings objects filtered by the tuesday column
 * @method     array findByWednesday(boolean $wednesday) Return ClubMeetings objects filtered by the wednesday column
 * @method     array findByThursday(boolean $thursday) Return ClubMeetings objects filtered by the thursday column
 * @method     array findByFriday(boolean $friday) Return ClubMeetings objects filtered by the friday column
 * @method     array findBySaturday(boolean $saturday) Return ClubMeetings objects filtered by the saturday column
 * @method     array findBySunday(boolean $sunday) Return ClubMeetings objects filtered by the sunday column
 * @method     array findByOther(string $other) Return ClubMeetings objects filtered by the other column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseClubMeetingsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubMeetingsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\ClubMeetings', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubMeetingsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubMeetingsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubMeetingsQuery) {
			return $criteria;
		}
		$query = new ClubMeetingsQuery();
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
	 * @return    ClubMeetings|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubMeetingsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubMeetingsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubMeetings A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `LOCATION`, `STARTS_AT`, `ENDS_AT`, `MONDAY`, `TUESDAY`, `WEDNESDAY`, `THURSDAY`, `FRIDAY`, `SATURDAY`, `SUNDAY`, `OTHER` FROM `club_meetings` WHERE `ID` = :p0';
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
			$obj = new ClubMeetings();
			$obj->hydrate($row);
			ClubMeetingsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ClubMeetings|array|mixed the result, formatted by the current formatter
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
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubMeetingsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubMeetingsPeer::ID, $keys, Criteria::IN);
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
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(ClubMeetingsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(ClubMeetingsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingsPeer::ID, $id, $comparison);
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
	 * @return    ClubMeetingsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClubMeetingsPeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the starts_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStartsAt('2011-03-14'); // WHERE starts_at = '2011-03-14'
	 * $query->filterByStartsAt('now'); // WHERE starts_at = '2011-03-14'
	 * $query->filterByStartsAt(array('max' => 'yesterday')); // WHERE starts_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $startsAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByStartsAt($startsAt = null, $comparison = null)
	{
		if (is_array($startsAt)) {
			$useMinMax = false;
			if (isset($startsAt['min'])) {
				$this->addUsingAlias(ClubMeetingsPeer::STARTS_AT, $startsAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startsAt['max'])) {
				$this->addUsingAlias(ClubMeetingsPeer::STARTS_AT, $startsAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingsPeer::STARTS_AT, $startsAt, $comparison);
	}

	/**
	 * Filter the query on the ends_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEndsAt('2011-03-14'); // WHERE ends_at = '2011-03-14'
	 * $query->filterByEndsAt('now'); // WHERE ends_at = '2011-03-14'
	 * $query->filterByEndsAt(array('max' => 'yesterday')); // WHERE ends_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $endsAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByEndsAt($endsAt = null, $comparison = null)
	{
		if (is_array($endsAt)) {
			$useMinMax = false;
			if (isset($endsAt['min'])) {
				$this->addUsingAlias(ClubMeetingsPeer::ENDS_AT, $endsAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endsAt['max'])) {
				$this->addUsingAlias(ClubMeetingsPeer::ENDS_AT, $endsAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingsPeer::ENDS_AT, $endsAt, $comparison);
	}

	/**
	 * Filter the query on the monday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMonday(true); // WHERE monday = true
	 * $query->filterByMonday('yes'); // WHERE monday = true
	 * </code>
	 *
	 * @param     boolean|string $monday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByMonday($monday = null, $comparison = null)
	{
		if (is_string($monday)) {
			$monday = in_array(strtolower($monday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::MONDAY, $monday, $comparison);
	}

	/**
	 * Filter the query on the tuesday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTuesday(true); // WHERE tuesday = true
	 * $query->filterByTuesday('yes'); // WHERE tuesday = true
	 * </code>
	 *
	 * @param     boolean|string $tuesday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByTuesday($tuesday = null, $comparison = null)
	{
		if (is_string($tuesday)) {
			$tuesday = in_array(strtolower($tuesday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::TUESDAY, $tuesday, $comparison);
	}

	/**
	 * Filter the query on the wednesday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWednesday(true); // WHERE wednesday = true
	 * $query->filterByWednesday('yes'); // WHERE wednesday = true
	 * </code>
	 *
	 * @param     boolean|string $wednesday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByWednesday($wednesday = null, $comparison = null)
	{
		if (is_string($wednesday)) {
			$wednesday = in_array(strtolower($wednesday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::WEDNESDAY, $wednesday, $comparison);
	}

	/**
	 * Filter the query on the thursday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByThursday(true); // WHERE thursday = true
	 * $query->filterByThursday('yes'); // WHERE thursday = true
	 * </code>
	 *
	 * @param     boolean|string $thursday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByThursday($thursday = null, $comparison = null)
	{
		if (is_string($thursday)) {
			$thursday = in_array(strtolower($thursday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::THURSDAY, $thursday, $comparison);
	}

	/**
	 * Filter the query on the friday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFriday(true); // WHERE friday = true
	 * $query->filterByFriday('yes'); // WHERE friday = true
	 * </code>
	 *
	 * @param     boolean|string $friday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterByFriday($friday = null, $comparison = null)
	{
		if (is_string($friday)) {
			$friday = in_array(strtolower($friday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::FRIDAY, $friday, $comparison);
	}

	/**
	 * Filter the query on the saturday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySaturday(true); // WHERE saturday = true
	 * $query->filterBySaturday('yes'); // WHERE saturday = true
	 * </code>
	 *
	 * @param     boolean|string $saturday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterBySaturday($saturday = null, $comparison = null)
	{
		if (is_string($saturday)) {
			$saturday = in_array(strtolower($saturday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::SATURDAY, $saturday, $comparison);
	}

	/**
	 * Filter the query on the sunday column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySunday(true); // WHERE sunday = true
	 * $query->filterBySunday('yes'); // WHERE sunday = true
	 * </code>
	 *
	 * @param     boolean|string $sunday The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function filterBySunday($sunday = null, $comparison = null)
	{
		if (is_string($sunday)) {
			$sunday = in_array(strtolower($sunday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubMeetingsPeer::SUNDAY, $sunday, $comparison);
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
	 * @return    ClubMeetingsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClubMeetingsPeer::OTHER, $other, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubMeetings $clubMeetings Object to remove from the list of results
	 *
	 * @return    ClubMeetingsQuery The current query, for fluid interface
	 */
	public function prune($clubMeetings = null)
	{
		if ($clubMeetings) {
			$this->addUsingAlias(ClubMeetingsPeer::ID, $clubMeetings->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubMeetingsQuery
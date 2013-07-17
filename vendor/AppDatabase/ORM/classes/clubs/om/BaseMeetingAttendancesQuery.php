<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\MeetingAttendances;
use ClubsORM\MeetingAttendancesPeer;
use ClubsORM\MeetingAttendancesQuery;

/**
 * Base class that represents a query for the 'meeting_attendances' table.
 *
 * 
 *
 * @method     MeetingAttendancesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MeetingAttendancesQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     MeetingAttendancesQuery orderByMeetingId($order = Criteria::ASC) Order by the meeting_id column
 * @method     MeetingAttendancesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     MeetingAttendancesQuery groupById() Group by the id column
 * @method     MeetingAttendancesQuery groupByOrganizationId() Group by the organization_id column
 * @method     MeetingAttendancesQuery groupByMeetingId() Group by the meeting_id column
 * @method     MeetingAttendancesQuery groupByStatus() Group by the status column
 *
 * @method     MeetingAttendancesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MeetingAttendancesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MeetingAttendancesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MeetingAttendances findOne(PropelPDO $con = null) Return the first MeetingAttendances matching the query
 * @method     MeetingAttendances findOneOrCreate(PropelPDO $con = null) Return the first MeetingAttendances matching the query, or a new MeetingAttendances object populated from the query conditions when no match is found
 *
 * @method     MeetingAttendances findOneById(int $id) Return the first MeetingAttendances filtered by the id column
 * @method     MeetingAttendances findOneByOrganizationId(int $organization_id) Return the first MeetingAttendances filtered by the organization_id column
 * @method     MeetingAttendances findOneByMeetingId(int $meeting_id) Return the first MeetingAttendances filtered by the meeting_id column
 * @method     MeetingAttendances findOneByStatus(string $status) Return the first MeetingAttendances filtered by the status column
 *
 * @method     array findById(int $id) Return MeetingAttendances objects filtered by the id column
 * @method     array findByOrganizationId(int $organization_id) Return MeetingAttendances objects filtered by the organization_id column
 * @method     array findByMeetingId(int $meeting_id) Return MeetingAttendances objects filtered by the meeting_id column
 * @method     array findByStatus(string $status) Return MeetingAttendances objects filtered by the status column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseMeetingAttendancesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMeetingAttendancesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\MeetingAttendances', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MeetingAttendancesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MeetingAttendancesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MeetingAttendancesQuery) {
			return $criteria;
		}
		$query = new MeetingAttendancesQuery();
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
	 * @return    MeetingAttendances|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MeetingAttendancesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MeetingAttendancesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    MeetingAttendances A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORGANIZATION_ID`, `MEETING_ID`, `STATUS` FROM `meeting_attendances` WHERE `ID` = :p0';
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
			$obj = new MeetingAttendances();
			$obj->hydrate($row);
			MeetingAttendancesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    MeetingAttendances|array|mixed the result, formatted by the current formatter
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
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MeetingAttendancesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MeetingAttendancesPeer::ID, $keys, Criteria::IN);
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
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MeetingAttendancesPeer::ID, $id, $comparison);
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
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MeetingAttendancesPeer::ORGANIZATION_ID, $organizationId, $comparison);
	}

	/**
	 * Filter the query on the meeting_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingId(1234); // WHERE meeting_id = 1234
	 * $query->filterByMeetingId(array(12, 34)); // WHERE meeting_id IN (12, 34)
	 * $query->filterByMeetingId(array('min' => 12)); // WHERE meeting_id > 12
	 * </code>
	 *
	 * @param     mixed $meetingId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function filterByMeetingId($meetingId = null, $comparison = null)
	{
		if (is_array($meetingId)) {
			$useMinMax = false;
			if (isset($meetingId['min'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::MEETING_ID, $meetingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($meetingId['max'])) {
				$this->addUsingAlias(MeetingAttendancesPeer::MEETING_ID, $meetingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MeetingAttendancesPeer::MEETING_ID, $meetingId, $comparison);
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
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MeetingAttendancesPeer::STATUS, $status, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MeetingAttendances $meetingAttendances Object to remove from the list of results
	 *
	 * @return    MeetingAttendancesQuery The current query, for fluid interface
	 */
	public function prune($meetingAttendances = null)
	{
		if ($meetingAttendances) {
			$this->addUsingAlias(MeetingAttendancesPeer::ID, $meetingAttendances->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMeetingAttendancesQuery
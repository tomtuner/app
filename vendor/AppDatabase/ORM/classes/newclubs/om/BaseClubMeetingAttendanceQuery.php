<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubMeetingAttendance;
use NewClubsORM\ClubMeetingAttendancePeer;
use NewClubsORM\ClubMeetingAttendanceQuery;

/**
 * Base class that represents a query for the 'club_meeting_attendance' table.
 *
 * 
 *
 * @method     ClubMeetingAttendanceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubMeetingAttendanceQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     ClubMeetingAttendanceQuery orderByMeetingId($order = Criteria::ASC) Order by the meeting_id column
 * @method     ClubMeetingAttendanceQuery orderByMadeUp($order = Criteria::ASC) Order by the made_up column
 *
 * @method     ClubMeetingAttendanceQuery groupById() Group by the id column
 * @method     ClubMeetingAttendanceQuery groupByOrgId() Group by the org_id column
 * @method     ClubMeetingAttendanceQuery groupByMeetingId() Group by the meeting_id column
 * @method     ClubMeetingAttendanceQuery groupByMadeUp() Group by the made_up column
 *
 * @method     ClubMeetingAttendanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubMeetingAttendanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubMeetingAttendanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubMeetingAttendance findOne(PropelPDO $con = null) Return the first ClubMeetingAttendance matching the query
 * @method     ClubMeetingAttendance findOneOrCreate(PropelPDO $con = null) Return the first ClubMeetingAttendance matching the query, or a new ClubMeetingAttendance object populated from the query conditions when no match is found
 *
 * @method     ClubMeetingAttendance findOneById(int $id) Return the first ClubMeetingAttendance filtered by the id column
 * @method     ClubMeetingAttendance findOneByOrgId(int $org_id) Return the first ClubMeetingAttendance filtered by the org_id column
 * @method     ClubMeetingAttendance findOneByMeetingId(int $meeting_id) Return the first ClubMeetingAttendance filtered by the meeting_id column
 * @method     ClubMeetingAttendance findOneByMadeUp(int $made_up) Return the first ClubMeetingAttendance filtered by the made_up column
 *
 * @method     array findById(int $id) Return ClubMeetingAttendance objects filtered by the id column
 * @method     array findByOrgId(int $org_id) Return ClubMeetingAttendance objects filtered by the org_id column
 * @method     array findByMeetingId(int $meeting_id) Return ClubMeetingAttendance objects filtered by the meeting_id column
 * @method     array findByMadeUp(int $made_up) Return ClubMeetingAttendance objects filtered by the made_up column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubMeetingAttendanceQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubMeetingAttendanceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubMeetingAttendance', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubMeetingAttendanceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubMeetingAttendanceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubMeetingAttendanceQuery) {
			return $criteria;
		}
		$query = new ClubMeetingAttendanceQuery();
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
	 * @return    ClubMeetingAttendance|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubMeetingAttendancePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubMeetingAttendancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubMeetingAttendance A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `MEETING_ID`, `MADE_UP` FROM `club_meeting_attendance` WHERE `ID` = :p0';
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
			$obj = new ClubMeetingAttendance();
			$obj->hydrate($row);
			ClubMeetingAttendancePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ClubMeetingAttendance|array|mixed the result, formatted by the current formatter
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
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubMeetingAttendancePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubMeetingAttendancePeer::ID, $keys, Criteria::IN);
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
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingAttendancePeer::ID, $id, $comparison);
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
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingAttendancePeer::ORG_ID, $orgId, $comparison);
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
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterByMeetingId($meetingId = null, $comparison = null)
	{
		if (is_array($meetingId)) {
			$useMinMax = false;
			if (isset($meetingId['min'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::MEETING_ID, $meetingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($meetingId['max'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::MEETING_ID, $meetingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingAttendancePeer::MEETING_ID, $meetingId, $comparison);
	}

	/**
	 * Filter the query on the made_up column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMadeUp(1234); // WHERE made_up = 1234
	 * $query->filterByMadeUp(array(12, 34)); // WHERE made_up IN (12, 34)
	 * $query->filterByMadeUp(array('min' => 12)); // WHERE made_up > 12
	 * </code>
	 *
	 * @param     mixed $madeUp The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function filterByMadeUp($madeUp = null, $comparison = null)
	{
		if (is_array($madeUp)) {
			$useMinMax = false;
			if (isset($madeUp['min'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::MADE_UP, $madeUp['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($madeUp['max'])) {
				$this->addUsingAlias(ClubMeetingAttendancePeer::MADE_UP, $madeUp['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubMeetingAttendancePeer::MADE_UP, $madeUp, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubMeetingAttendance $clubMeetingAttendance Object to remove from the list of results
	 *
	 * @return    ClubMeetingAttendanceQuery The current query, for fluid interface
	 */
	public function prune($clubMeetingAttendance = null)
	{
		if ($clubMeetingAttendance) {
			$this->addUsingAlias(ClubMeetingAttendancePeer::ID, $clubMeetingAttendance->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubMeetingAttendanceQuery
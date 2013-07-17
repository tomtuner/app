<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubDayClubs;
use NewClubsORM\ClubDayClubsPeer;
use NewClubsORM\ClubDayClubsQuery;

/**
 * Base class that represents a query for the 'club_day_clubs' table.
 *
 * 
 *
 * @method     ClubDayClubsQuery orderByClubDayId($order = Criteria::ASC) Order by the club_day_id column
 * @method     ClubDayClubsQuery orderByClubId($order = Criteria::ASC) Order by the club_id column
 * @method     ClubDayClubsQuery orderByAttended($order = Criteria::ASC) Order by the attended column
 *
 * @method     ClubDayClubsQuery groupByClubDayId() Group by the club_day_id column
 * @method     ClubDayClubsQuery groupByClubId() Group by the club_id column
 * @method     ClubDayClubsQuery groupByAttended() Group by the attended column
 *
 * @method     ClubDayClubsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubDayClubsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubDayClubsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubDayClubs findOne(PropelPDO $con = null) Return the first ClubDayClubs matching the query
 * @method     ClubDayClubs findOneOrCreate(PropelPDO $con = null) Return the first ClubDayClubs matching the query, or a new ClubDayClubs object populated from the query conditions when no match is found
 *
 * @method     ClubDayClubs findOneByClubDayId(int $club_day_id) Return the first ClubDayClubs filtered by the club_day_id column
 * @method     ClubDayClubs findOneByClubId(int $club_id) Return the first ClubDayClubs filtered by the club_id column
 * @method     ClubDayClubs findOneByAttended(int $attended) Return the first ClubDayClubs filtered by the attended column
 *
 * @method     array findByClubDayId(int $club_day_id) Return ClubDayClubs objects filtered by the club_day_id column
 * @method     array findByClubId(int $club_id) Return ClubDayClubs objects filtered by the club_id column
 * @method     array findByAttended(int $attended) Return ClubDayClubs objects filtered by the attended column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubDayClubsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubDayClubsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubDayClubs', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubDayClubsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubDayClubsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubDayClubsQuery) {
			return $criteria;
		}
		$query = new ClubDayClubsQuery();
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
	 * @param     array[$club_day_id, $club_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClubDayClubs|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubDayClubsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubDayClubsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubDayClubs A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `CLUB_DAY_ID`, `CLUB_ID`, `ATTENDED` FROM `club_day_clubs` WHERE `CLUB_DAY_ID` = :p0 AND `CLUB_ID` = :p1';
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
			$obj = new ClubDayClubs();
			$obj->hydrate($row);
			ClubDayClubsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    ClubDayClubs|array|mixed the result, formatted by the current formatter
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
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ClubDayClubsPeer::CLUB_DAY_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ClubDayClubsPeer::CLUB_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ClubDayClubsPeer::CLUB_DAY_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ClubDayClubsPeer::CLUB_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the club_day_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubDayId(1234); // WHERE club_day_id = 1234
	 * $query->filterByClubDayId(array(12, 34)); // WHERE club_day_id IN (12, 34)
	 * $query->filterByClubDayId(array('min' => 12)); // WHERE club_day_id > 12
	 * </code>
	 *
	 * @param     mixed $clubDayId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function filterByClubDayId($clubDayId = null, $comparison = null)
	{
		if (is_array($clubDayId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubDayClubsPeer::CLUB_DAY_ID, $clubDayId, $comparison);
	}

	/**
	 * Filter the query on the club_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubId(1234); // WHERE club_id = 1234
	 * $query->filterByClubId(array(12, 34)); // WHERE club_id IN (12, 34)
	 * $query->filterByClubId(array('min' => 12)); // WHERE club_id > 12
	 * </code>
	 *
	 * @param     mixed $clubId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function filterByClubId($clubId = null, $comparison = null)
	{
		if (is_array($clubId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubDayClubsPeer::CLUB_ID, $clubId, $comparison);
	}

	/**
	 * Filter the query on the attended column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAttended(1234); // WHERE attended = 1234
	 * $query->filterByAttended(array(12, 34)); // WHERE attended IN (12, 34)
	 * $query->filterByAttended(array('min' => 12)); // WHERE attended > 12
	 * </code>
	 *
	 * @param     mixed $attended The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function filterByAttended($attended = null, $comparison = null)
	{
		if (is_array($attended)) {
			$useMinMax = false;
			if (isset($attended['min'])) {
				$this->addUsingAlias(ClubDayClubsPeer::ATTENDED, $attended['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($attended['max'])) {
				$this->addUsingAlias(ClubDayClubsPeer::ATTENDED, $attended['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubDayClubsPeer::ATTENDED, $attended, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubDayClubs $clubDayClubs Object to remove from the list of results
	 *
	 * @return    ClubDayClubsQuery The current query, for fluid interface
	 */
	public function prune($clubDayClubs = null)
	{
		if ($clubDayClubs) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ClubDayClubsPeer::CLUB_DAY_ID), $clubDayClubs->getClubDayId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ClubDayClubsPeer::CLUB_ID), $clubDayClubs->getClubId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseClubDayClubsQuery
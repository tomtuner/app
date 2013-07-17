<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\QuarterlyEvents;
use NewClubsORM\QuarterlyEventsPeer;
use NewClubsORM\QuarterlyEventsQuery;

/**
 * Base class that represents a query for the 'quarterly_events' table.
 *
 * 
 *
 * @method     QuarterlyEventsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     QuarterlyEventsQuery orderByQuarterlyDataId($order = Criteria::ASC) Order by the quarterly_data_id column
 * @method     QuarterlyEventsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     QuarterlyEventsQuery orderByHeldOn($order = Criteria::ASC) Order by the held_on column
 * @method     QuarterlyEventsQuery orderByNumMembers($order = Criteria::ASC) Order by the num_members column
 * @method     QuarterlyEventsQuery orderByNumOutside($order = Criteria::ASC) Order by the num_outside column
 * @method     QuarterlyEventsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     QuarterlyEventsQuery groupById() Group by the id column
 * @method     QuarterlyEventsQuery groupByQuarterlyDataId() Group by the quarterly_data_id column
 * @method     QuarterlyEventsQuery groupByType() Group by the type column
 * @method     QuarterlyEventsQuery groupByHeldOn() Group by the held_on column
 * @method     QuarterlyEventsQuery groupByNumMembers() Group by the num_members column
 * @method     QuarterlyEventsQuery groupByNumOutside() Group by the num_outside column
 * @method     QuarterlyEventsQuery groupByDescription() Group by the description column
 *
 * @method     QuarterlyEventsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     QuarterlyEventsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     QuarterlyEventsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     QuarterlyEvents findOne(PropelPDO $con = null) Return the first QuarterlyEvents matching the query
 * @method     QuarterlyEvents findOneOrCreate(PropelPDO $con = null) Return the first QuarterlyEvents matching the query, or a new QuarterlyEvents object populated from the query conditions when no match is found
 *
 * @method     QuarterlyEvents findOneById(int $id) Return the first QuarterlyEvents filtered by the id column
 * @method     QuarterlyEvents findOneByQuarterlyDataId(int $quarterly_data_id) Return the first QuarterlyEvents filtered by the quarterly_data_id column
 * @method     QuarterlyEvents findOneByType(string $type) Return the first QuarterlyEvents filtered by the type column
 * @method     QuarterlyEvents findOneByHeldOn(string $held_on) Return the first QuarterlyEvents filtered by the held_on column
 * @method     QuarterlyEvents findOneByNumMembers(int $num_members) Return the first QuarterlyEvents filtered by the num_members column
 * @method     QuarterlyEvents findOneByNumOutside(int $num_outside) Return the first QuarterlyEvents filtered by the num_outside column
 * @method     QuarterlyEvents findOneByDescription(string $description) Return the first QuarterlyEvents filtered by the description column
 *
 * @method     array findById(int $id) Return QuarterlyEvents objects filtered by the id column
 * @method     array findByQuarterlyDataId(int $quarterly_data_id) Return QuarterlyEvents objects filtered by the quarterly_data_id column
 * @method     array findByType(string $type) Return QuarterlyEvents objects filtered by the type column
 * @method     array findByHeldOn(string $held_on) Return QuarterlyEvents objects filtered by the held_on column
 * @method     array findByNumMembers(int $num_members) Return QuarterlyEvents objects filtered by the num_members column
 * @method     array findByNumOutside(int $num_outside) Return QuarterlyEvents objects filtered by the num_outside column
 * @method     array findByDescription(string $description) Return QuarterlyEvents objects filtered by the description column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyEventsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseQuarterlyEventsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\QuarterlyEvents', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new QuarterlyEventsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    QuarterlyEventsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof QuarterlyEventsQuery) {
			return $criteria;
		}
		$query = new QuarterlyEventsQuery();
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
	 * @return    QuarterlyEvents|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = QuarterlyEventsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyEventsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    QuarterlyEvents A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `QUARTERLY_DATA_ID`, `TYPE`, `HELD_ON`, `NUM_MEMBERS`, `NUM_OUTSIDE`, `DESCRIPTION` FROM `quarterly_events` WHERE `ID` = :p0';
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
			$obj = new QuarterlyEvents();
			$obj->hydrate($row);
			QuarterlyEventsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    QuarterlyEvents|array|mixed the result, formatted by the current formatter
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
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(QuarterlyEventsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(QuarterlyEventsPeer::ID, $keys, Criteria::IN);
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
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyEventsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the quarterly_data_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuarterlyDataId(1234); // WHERE quarterly_data_id = 1234
	 * $query->filterByQuarterlyDataId(array(12, 34)); // WHERE quarterly_data_id IN (12, 34)
	 * $query->filterByQuarterlyDataId(array('min' => 12)); // WHERE quarterly_data_id > 12
	 * </code>
	 *
	 * @param     mixed $quarterlyDataId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByQuarterlyDataId($quarterlyDataId = null, $comparison = null)
	{
		if (is_array($quarterlyDataId)) {
			$useMinMax = false;
			if (isset($quarterlyDataId['min'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::QUARTERLY_DATA_ID, $quarterlyDataId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quarterlyDataId['max'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::QUARTERLY_DATA_ID, $quarterlyDataId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyEventsPeer::QUARTERLY_DATA_ID, $quarterlyDataId, $comparison);
	}

	/**
	 * Filter the query on the type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
	 * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $type The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(QuarterlyEventsPeer::TYPE, $type, $comparison);
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
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyEventsPeer::HELD_ON, $heldOn, $comparison);
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
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByNumMembers($numMembers = null, $comparison = null)
	{
		if (is_array($numMembers)) {
			$useMinMax = false;
			if (isset($numMembers['min'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::NUM_MEMBERS, $numMembers['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numMembers['max'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::NUM_MEMBERS, $numMembers['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyEventsPeer::NUM_MEMBERS, $numMembers, $comparison);
	}

	/**
	 * Filter the query on the num_outside column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumOutside(1234); // WHERE num_outside = 1234
	 * $query->filterByNumOutside(array(12, 34)); // WHERE num_outside IN (12, 34)
	 * $query->filterByNumOutside(array('min' => 12)); // WHERE num_outside > 12
	 * </code>
	 *
	 * @param     mixed $numOutside The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function filterByNumOutside($numOutside = null, $comparison = null)
	{
		if (is_array($numOutside)) {
			$useMinMax = false;
			if (isset($numOutside['min'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::NUM_OUTSIDE, $numOutside['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numOutside['max'])) {
				$this->addUsingAlias(QuarterlyEventsPeer::NUM_OUTSIDE, $numOutside['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(QuarterlyEventsPeer::NUM_OUTSIDE, $numOutside, $comparison);
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
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(QuarterlyEventsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     QuarterlyEvents $quarterlyEvents Object to remove from the list of results
	 *
	 * @return    QuarterlyEventsQuery The current query, for fluid interface
	 */
	public function prune($quarterlyEvents = null)
	{
		if ($quarterlyEvents) {
			$this->addUsingAlias(QuarterlyEventsPeer::ID, $quarterlyEvents->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseQuarterlyEventsQuery
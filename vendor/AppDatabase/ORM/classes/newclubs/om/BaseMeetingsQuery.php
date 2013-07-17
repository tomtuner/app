<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Meetings;
use NewClubsORM\MeetingsPeer;
use NewClubsORM\MeetingsQuery;

/**
 * Base class that represents a query for the 'meetings' table.
 *
 * 
 *
 * @method     MeetingsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MeetingsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     MeetingsQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     MeetingsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     MeetingsQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     MeetingsQuery groupById() Group by the id column
 * @method     MeetingsQuery groupByDate() Group by the date column
 * @method     MeetingsQuery groupByYear() Group by the year column
 * @method     MeetingsQuery groupByDescription() Group by the description column
 * @method     MeetingsQuery groupByType() Group by the type column
 *
 * @method     MeetingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MeetingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MeetingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Meetings findOne(PropelPDO $con = null) Return the first Meetings matching the query
 * @method     Meetings findOneOrCreate(PropelPDO $con = null) Return the first Meetings matching the query, or a new Meetings object populated from the query conditions when no match is found
 *
 * @method     Meetings findOneById(int $id) Return the first Meetings filtered by the id column
 * @method     Meetings findOneByDate(string $date) Return the first Meetings filtered by the date column
 * @method     Meetings findOneByYear(string $year) Return the first Meetings filtered by the year column
 * @method     Meetings findOneByDescription(string $description) Return the first Meetings filtered by the description column
 * @method     Meetings findOneByType(int $type) Return the first Meetings filtered by the type column
 *
 * @method     array findById(int $id) Return Meetings objects filtered by the id column
 * @method     array findByDate(string $date) Return Meetings objects filtered by the date column
 * @method     array findByYear(string $year) Return Meetings objects filtered by the year column
 * @method     array findByDescription(string $description) Return Meetings objects filtered by the description column
 * @method     array findByType(int $type) Return Meetings objects filtered by the type column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseMeetingsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMeetingsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Meetings', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MeetingsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MeetingsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MeetingsQuery) {
			return $criteria;
		}
		$query = new MeetingsQuery();
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
	 * @return    Meetings|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MeetingsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MeetingsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Meetings A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DATE`, `YEAR`, `DESCRIPTION`, `TYPE` FROM `meetings` WHERE `ID` = :p0';
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
			$obj = new Meetings();
			$obj->hydrate($row);
			MeetingsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Meetings|array|mixed the result, formatted by the current formatter
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
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MeetingsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MeetingsPeer::ID, $keys, Criteria::IN);
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
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MeetingsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
	 * $query->filterByDate('now'); // WHERE date = '2011-03-14'
	 * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $date The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(MeetingsPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(MeetingsPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MeetingsPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByYear('fooValue');   // WHERE year = 'fooValue'
	 * $query->filterByYear('%fooValue%'); // WHERE year LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $year The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($year)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $year)) {
				$year = str_replace('*', '%', $year);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MeetingsPeer::YEAR, $year, $comparison);
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
	 * @return    MeetingsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MeetingsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByType(1234); // WHERE type = 1234
	 * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
	 * $query->filterByType(array('min' => 12)); // WHERE type > 12
	 * </code>
	 *
	 * @param     mixed $type The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(MeetingsPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(MeetingsPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MeetingsPeer::TYPE, $type, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Meetings $meetings Object to remove from the list of results
	 *
	 * @return    MeetingsQuery The current query, for fluid interface
	 */
	public function prune($meetings = null)
	{
		if ($meetings) {
			$this->addUsingAlias(MeetingsPeer::ID, $meetings->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMeetingsQuery
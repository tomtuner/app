<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Philcomreports;
use OrganizationsORM\PhilcomreportsPeer;
use OrganizationsORM\PhilcomreportsQuery;

/**
 * Base class that represents a query for the 'philcomreports' table.
 *
 * 
 *
 * @method     PhilcomreportsQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     PhilcomreportsQuery orderByOrgId($order = Criteria::ASC) Order by the ORG_ID column
 * @method     PhilcomreportsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PhilcomreportsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     PhilcomreportsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     PhilcomreportsQuery orderByNummem($order = Criteria::ASC) Order by the nummem column
 * @method     PhilcomreportsQuery orderByHours($order = Criteria::ASC) Order by the hours column
 * @method     PhilcomreportsQuery orderByDollars($order = Criteria::ASC) Order by the dollars column
 * @method     PhilcomreportsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     PhilcomreportsQuery orderByViewed($order = Criteria::ASC) Order by the viewed column
 *
 * @method     PhilcomreportsQuery groupById() Group by the ID column
 * @method     PhilcomreportsQuery groupByOrgId() Group by the ORG_ID column
 * @method     PhilcomreportsQuery groupByName() Group by the name column
 * @method     PhilcomreportsQuery groupByDate() Group by the date column
 * @method     PhilcomreportsQuery groupByDescription() Group by the description column
 * @method     PhilcomreportsQuery groupByNummem() Group by the nummem column
 * @method     PhilcomreportsQuery groupByHours() Group by the hours column
 * @method     PhilcomreportsQuery groupByDollars() Group by the dollars column
 * @method     PhilcomreportsQuery groupByType() Group by the type column
 * @method     PhilcomreportsQuery groupByViewed() Group by the viewed column
 *
 * @method     PhilcomreportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PhilcomreportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PhilcomreportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Philcomreports findOne(PropelPDO $con = null) Return the first Philcomreports matching the query
 * @method     Philcomreports findOneOrCreate(PropelPDO $con = null) Return the first Philcomreports matching the query, or a new Philcomreports object populated from the query conditions when no match is found
 *
 * @method     Philcomreports findOneById(int $ID) Return the first Philcomreports filtered by the ID column
 * @method     Philcomreports findOneByOrgId(int $ORG_ID) Return the first Philcomreports filtered by the ORG_ID column
 * @method     Philcomreports findOneByName(string $name) Return the first Philcomreports filtered by the name column
 * @method     Philcomreports findOneByDate(string $date) Return the first Philcomreports filtered by the date column
 * @method     Philcomreports findOneByDescription(string $description) Return the first Philcomreports filtered by the description column
 * @method     Philcomreports findOneByNummem(int $nummem) Return the first Philcomreports filtered by the nummem column
 * @method     Philcomreports findOneByHours(int $hours) Return the first Philcomreports filtered by the hours column
 * @method     Philcomreports findOneByDollars(double $dollars) Return the first Philcomreports filtered by the dollars column
 * @method     Philcomreports findOneByType(string $type) Return the first Philcomreports filtered by the type column
 * @method     Philcomreports findOneByViewed(boolean $viewed) Return the first Philcomreports filtered by the viewed column
 *
 * @method     array findById(int $ID) Return Philcomreports objects filtered by the ID column
 * @method     array findByOrgId(int $ORG_ID) Return Philcomreports objects filtered by the ORG_ID column
 * @method     array findByName(string $name) Return Philcomreports objects filtered by the name column
 * @method     array findByDate(string $date) Return Philcomreports objects filtered by the date column
 * @method     array findByDescription(string $description) Return Philcomreports objects filtered by the description column
 * @method     array findByNummem(int $nummem) Return Philcomreports objects filtered by the nummem column
 * @method     array findByHours(int $hours) Return Philcomreports objects filtered by the hours column
 * @method     array findByDollars(double $dollars) Return Philcomreports objects filtered by the dollars column
 * @method     array findByType(string $type) Return Philcomreports objects filtered by the type column
 * @method     array findByViewed(boolean $viewed) Return Philcomreports objects filtered by the viewed column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BasePhilcomreportsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePhilcomreportsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Philcomreports', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PhilcomreportsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhilcomreportsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhilcomreportsQuery) {
			return $criteria;
		}
		$query = new PhilcomreportsQuery();
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
	 * @return    Philcomreports|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PhilcomreportsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PhilcomreportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Philcomreports A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `NAME`, `DATE`, `DESCRIPTION`, `NUMMEM`, `HOURS`, `DOLLARS`, `TYPE`, `VIEWED` FROM `philcomreports` WHERE `ID` = :p0';
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
			$obj = new Philcomreports();
			$obj->hydrate($row);
			PhilcomreportsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Philcomreports|array|mixed the result, formatted by the current formatter
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
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PhilcomreportsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PhilcomreportsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the ID column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE ID = 1234
	 * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE ID > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the ORG_ID column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrgId(1234); // WHERE ORG_ID = 1234
	 * $query->filterByOrgId(array(12, 34)); // WHERE ORG_ID IN (12, 34)
	 * $query->filterByOrgId(array('min' => 12)); // WHERE ORG_ID > 12
	 * </code>
	 *
	 * @param     mixed $orgId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::NAME, $name, $comparison);
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
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::DATE, $date, $comparison);
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
	 * @return    PhilcomreportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PhilcomreportsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the nummem column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNummem(1234); // WHERE nummem = 1234
	 * $query->filterByNummem(array(12, 34)); // WHERE nummem IN (12, 34)
	 * $query->filterByNummem(array('min' => 12)); // WHERE nummem > 12
	 * </code>
	 *
	 * @param     mixed $nummem The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByNummem($nummem = null, $comparison = null)
	{
		if (is_array($nummem)) {
			$useMinMax = false;
			if (isset($nummem['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::NUMMEM, $nummem['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nummem['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::NUMMEM, $nummem['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::NUMMEM, $nummem, $comparison);
	}

	/**
	 * Filter the query on the hours column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHours(1234); // WHERE hours = 1234
	 * $query->filterByHours(array(12, 34)); // WHERE hours IN (12, 34)
	 * $query->filterByHours(array('min' => 12)); // WHERE hours > 12
	 * </code>
	 *
	 * @param     mixed $hours The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByHours($hours = null, $comparison = null)
	{
		if (is_array($hours)) {
			$useMinMax = false;
			if (isset($hours['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::HOURS, $hours['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hours['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::HOURS, $hours['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::HOURS, $hours, $comparison);
	}

	/**
	 * Filter the query on the dollars column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDollars(1234); // WHERE dollars = 1234
	 * $query->filterByDollars(array(12, 34)); // WHERE dollars IN (12, 34)
	 * $query->filterByDollars(array('min' => 12)); // WHERE dollars > 12
	 * </code>
	 *
	 * @param     mixed $dollars The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByDollars($dollars = null, $comparison = null)
	{
		if (is_array($dollars)) {
			$useMinMax = false;
			if (isset($dollars['min'])) {
				$this->addUsingAlias(PhilcomreportsPeer::DOLLARS, $dollars['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dollars['max'])) {
				$this->addUsingAlias(PhilcomreportsPeer::DOLLARS, $dollars['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhilcomreportsPeer::DOLLARS, $dollars, $comparison);
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
	 * @return    PhilcomreportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PhilcomreportsPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the viewed column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByViewed(true); // WHERE viewed = true
	 * $query->filterByViewed('yes'); // WHERE viewed = true
	 * </code>
	 *
	 * @param     boolean|string $viewed The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function filterByViewed($viewed = null, $comparison = null)
	{
		if (is_string($viewed)) {
			$viewed = in_array(strtolower($viewed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PhilcomreportsPeer::VIEWED, $viewed, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Philcomreports $philcomreports Object to remove from the list of results
	 *
	 * @return    PhilcomreportsQuery The current query, for fluid interface
	 */
	public function prune($philcomreports = null)
	{
		if ($philcomreports) {
			$this->addUsingAlias(PhilcomreportsPeer::ID, $philcomreports->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePhilcomreportsQuery
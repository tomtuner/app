<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Progreports;
use OrganizationsORM\ProgreportsPeer;
use OrganizationsORM\ProgreportsQuery;

/**
 * Base class that represents a query for the 'progreports' table.
 *
 * 
 *
 * @method     ProgreportsQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ProgreportsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     ProgreportsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ProgreportsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ProgreportsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ProgreportsQuery orderByNummem($order = Criteria::ASC) Order by the nummem column
 * @method     ProgreportsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ProgreportsQuery orderByParticipation($order = Criteria::ASC) Order by the participation column
 * @method     ProgreportsQuery orderByViewed($order = Criteria::ASC) Order by the viewed column
 *
 * @method     ProgreportsQuery groupById() Group by the ID column
 * @method     ProgreportsQuery groupByOrgId() Group by the org_id column
 * @method     ProgreportsQuery groupByDate() Group by the date column
 * @method     ProgreportsQuery groupByName() Group by the name column
 * @method     ProgreportsQuery groupByDescription() Group by the description column
 * @method     ProgreportsQuery groupByNummem() Group by the nummem column
 * @method     ProgreportsQuery groupByType() Group by the type column
 * @method     ProgreportsQuery groupByParticipation() Group by the participation column
 * @method     ProgreportsQuery groupByViewed() Group by the viewed column
 *
 * @method     ProgreportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProgreportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProgreportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Progreports findOne(PropelPDO $con = null) Return the first Progreports matching the query
 * @method     Progreports findOneOrCreate(PropelPDO $con = null) Return the first Progreports matching the query, or a new Progreports object populated from the query conditions when no match is found
 *
 * @method     Progreports findOneById(int $ID) Return the first Progreports filtered by the ID column
 * @method     Progreports findOneByOrgId(int $org_id) Return the first Progreports filtered by the org_id column
 * @method     Progreports findOneByDate(string $date) Return the first Progreports filtered by the date column
 * @method     Progreports findOneByName(string $name) Return the first Progreports filtered by the name column
 * @method     Progreports findOneByDescription(string $description) Return the first Progreports filtered by the description column
 * @method     Progreports findOneByNummem(int $nummem) Return the first Progreports filtered by the nummem column
 * @method     Progreports findOneByType(int $type) Return the first Progreports filtered by the type column
 * @method     Progreports findOneByParticipation(int $participation) Return the first Progreports filtered by the participation column
 * @method     Progreports findOneByViewed(boolean $viewed) Return the first Progreports filtered by the viewed column
 *
 * @method     array findById(int $ID) Return Progreports objects filtered by the ID column
 * @method     array findByOrgId(int $org_id) Return Progreports objects filtered by the org_id column
 * @method     array findByDate(string $date) Return Progreports objects filtered by the date column
 * @method     array findByName(string $name) Return Progreports objects filtered by the name column
 * @method     array findByDescription(string $description) Return Progreports objects filtered by the description column
 * @method     array findByNummem(int $nummem) Return Progreports objects filtered by the nummem column
 * @method     array findByType(int $type) Return Progreports objects filtered by the type column
 * @method     array findByParticipation(int $participation) Return Progreports objects filtered by the participation column
 * @method     array findByViewed(boolean $viewed) Return Progreports objects filtered by the viewed column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseProgreportsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProgreportsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Progreports', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProgreportsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProgreportsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProgreportsQuery) {
			return $criteria;
		}
		$query = new ProgreportsQuery();
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
	 * @return    Progreports|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProgreportsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProgreportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Progreports A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `DATE`, `NAME`, `DESCRIPTION`, `NUMMEM`, `TYPE`, `PARTICIPATION`, `VIEWED` FROM `progreports` WHERE `ID` = :p0';
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
			$obj = new Progreports();
			$obj->hydrate($row);
			ProgreportsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Progreports|array|mixed the result, formatted by the current formatter
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProgreportsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProgreportsPeer::ID, $keys, Criteria::IN);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProgreportsPeer::ID, $id, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(ProgreportsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(ProgreportsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProgreportsPeer::ORG_ID, $orgId, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(ProgreportsPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(ProgreportsPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProgreportsPeer::DATE, $date, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProgreportsPeer::NAME, $name, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProgreportsPeer::DESCRIPTION, $description, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByNummem($nummem = null, $comparison = null)
	{
		if (is_array($nummem)) {
			$useMinMax = false;
			if (isset($nummem['min'])) {
				$this->addUsingAlias(ProgreportsPeer::NUMMEM, $nummem['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nummem['max'])) {
				$this->addUsingAlias(ProgreportsPeer::NUMMEM, $nummem['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProgreportsPeer::NUMMEM, $nummem, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(ProgreportsPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(ProgreportsPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProgreportsPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the participation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParticipation(1234); // WHERE participation = 1234
	 * $query->filterByParticipation(array(12, 34)); // WHERE participation IN (12, 34)
	 * $query->filterByParticipation(array('min' => 12)); // WHERE participation > 12
	 * </code>
	 *
	 * @param     mixed $participation The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByParticipation($participation = null, $comparison = null)
	{
		if (is_array($participation)) {
			$useMinMax = false;
			if (isset($participation['min'])) {
				$this->addUsingAlias(ProgreportsPeer::PARTICIPATION, $participation['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($participation['max'])) {
				$this->addUsingAlias(ProgreportsPeer::PARTICIPATION, $participation['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProgreportsPeer::PARTICIPATION, $participation, $comparison);
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
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function filterByViewed($viewed = null, $comparison = null)
	{
		if (is_string($viewed)) {
			$viewed = in_array(strtolower($viewed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ProgreportsPeer::VIEWED, $viewed, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Progreports $progreports Object to remove from the list of results
	 *
	 * @return    ProgreportsQuery The current query, for fluid interface
	 */
	public function prune($progreports = null)
	{
		if ($progreports) {
			$this->addUsingAlias(ProgreportsPeer::ID, $progreports->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProgreportsQuery
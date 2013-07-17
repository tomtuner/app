<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Restrictions;
use NewClubsORM\RestrictionsPeer;
use NewClubsORM\RestrictionsQuery;

/**
 * Base class that represents a query for the 'restrictions' table.
 *
 * 
 *
 * @method     RestrictionsQuery orderByRestrictionId($order = Criteria::ASC) Order by the restriction_id column
 * @method     RestrictionsQuery orderByRestrictions($order = Criteria::ASC) Order by the restrictions column
 *
 * @method     RestrictionsQuery groupByRestrictionId() Group by the restriction_id column
 * @method     RestrictionsQuery groupByRestrictions() Group by the restrictions column
 *
 * @method     RestrictionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RestrictionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RestrictionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Restrictions findOne(PropelPDO $con = null) Return the first Restrictions matching the query
 * @method     Restrictions findOneOrCreate(PropelPDO $con = null) Return the first Restrictions matching the query, or a new Restrictions object populated from the query conditions when no match is found
 *
 * @method     Restrictions findOneByRestrictionId(int $restriction_id) Return the first Restrictions filtered by the restriction_id column
 * @method     Restrictions findOneByRestrictions(string $restrictions) Return the first Restrictions filtered by the restrictions column
 *
 * @method     array findByRestrictionId(int $restriction_id) Return Restrictions objects filtered by the restriction_id column
 * @method     array findByRestrictions(string $restrictions) Return Restrictions objects filtered by the restrictions column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRestrictionsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRestrictionsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Restrictions', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RestrictionsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RestrictionsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RestrictionsQuery) {
			return $criteria;
		}
		$query = new RestrictionsQuery();
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
	 * @return    Restrictions|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RestrictionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RestrictionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Restrictions A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `RESTRICTION_ID`, `RESTRICTIONS` FROM `restrictions` WHERE `RESTRICTION_ID` = :p0';
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
			$obj = new Restrictions();
			$obj->hydrate($row);
			RestrictionsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Restrictions|array|mixed the result, formatted by the current formatter
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
	 * @return    RestrictionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RestrictionsPeer::RESTRICTION_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RestrictionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RestrictionsPeer::RESTRICTION_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the restriction_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRestrictionId(1234); // WHERE restriction_id = 1234
	 * $query->filterByRestrictionId(array(12, 34)); // WHERE restriction_id IN (12, 34)
	 * $query->filterByRestrictionId(array('min' => 12)); // WHERE restriction_id > 12
	 * </code>
	 *
	 * @param     mixed $restrictionId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RestrictionsQuery The current query, for fluid interface
	 */
	public function filterByRestrictionId($restrictionId = null, $comparison = null)
	{
		if (is_array($restrictionId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RestrictionsPeer::RESTRICTION_ID, $restrictionId, $comparison);
	}

	/**
	 * Filter the query on the restrictions column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRestrictions('fooValue');   // WHERE restrictions = 'fooValue'
	 * $query->filterByRestrictions('%fooValue%'); // WHERE restrictions LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $restrictions The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RestrictionsQuery The current query, for fluid interface
	 */
	public function filterByRestrictions($restrictions = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($restrictions)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $restrictions)) {
				$restrictions = str_replace('*', '%', $restrictions);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RestrictionsPeer::RESTRICTIONS, $restrictions, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Restrictions $restrictions Object to remove from the list of results
	 *
	 * @return    RestrictionsQuery The current query, for fluid interface
	 */
	public function prune($restrictions = null)
	{
		if ($restrictions) {
			$this->addUsingAlias(RestrictionsPeer::RESTRICTION_ID, $restrictions->getRestrictionId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRestrictionsQuery
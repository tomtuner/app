<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Clusters;
use NewClubsORM\ClustersPeer;
use NewClubsORM\ClustersQuery;

/**
 * Base class that represents a query for the 'clusters' table.
 *
 * 
 *
 * @method     ClustersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClustersQuery orderByCluster($order = Criteria::ASC) Order by the cluster column
 *
 * @method     ClustersQuery groupById() Group by the id column
 * @method     ClustersQuery groupByCluster() Group by the cluster column
 *
 * @method     ClustersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClustersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClustersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Clusters findOne(PropelPDO $con = null) Return the first Clusters matching the query
 * @method     Clusters findOneOrCreate(PropelPDO $con = null) Return the first Clusters matching the query, or a new Clusters object populated from the query conditions when no match is found
 *
 * @method     Clusters findOneById(int $id) Return the first Clusters filtered by the id column
 * @method     Clusters findOneByCluster(string $cluster) Return the first Clusters filtered by the cluster column
 *
 * @method     array findById(int $id) Return Clusters objects filtered by the id column
 * @method     array findByCluster(string $cluster) Return Clusters objects filtered by the cluster column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClustersQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClustersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Clusters', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClustersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClustersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClustersQuery) {
			return $criteria;
		}
		$query = new ClustersQuery();
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
	 * @return    Clusters|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClustersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClustersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Clusters A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLUSTER` FROM `clusters` WHERE `ID` = :p0';
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
			$obj = new Clusters();
			$obj->hydrate($row);
			ClustersPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Clusters|array|mixed the result, formatted by the current formatter
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
	 * @return    ClustersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClustersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClustersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClustersPeer::ID, $keys, Criteria::IN);
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
	 * @return    ClustersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(ClustersPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(ClustersPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClustersPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the cluster column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCluster('fooValue');   // WHERE cluster = 'fooValue'
	 * $query->filterByCluster('%fooValue%'); // WHERE cluster LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cluster The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClustersQuery The current query, for fluid interface
	 */
	public function filterByCluster($cluster = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cluster)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cluster)) {
				$cluster = str_replace('*', '%', $cluster);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClustersPeer::CLUSTER, $cluster, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Clusters $clusters Object to remove from the list of results
	 *
	 * @return    ClustersQuery The current query, for fluid interface
	 */
	public function prune($clusters = null)
	{
		if ($clusters) {
			$this->addUsingAlias(ClustersPeer::ID, $clusters->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClustersQuery
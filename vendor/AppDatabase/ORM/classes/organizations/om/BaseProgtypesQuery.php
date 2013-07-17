<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Progtypes;
use OrganizationsORM\ProgtypesPeer;
use OrganizationsORM\ProgtypesQuery;

/**
 * Base class that represents a query for the 'progtypes' table.
 *
 * 
 *
 * @method     ProgtypesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProgtypesQuery orderByTypename($order = Criteria::ASC) Order by the TypeName column
 *
 * @method     ProgtypesQuery groupById() Group by the id column
 * @method     ProgtypesQuery groupByTypename() Group by the TypeName column
 *
 * @method     ProgtypesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProgtypesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProgtypesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Progtypes findOne(PropelPDO $con = null) Return the first Progtypes matching the query
 * @method     Progtypes findOneOrCreate(PropelPDO $con = null) Return the first Progtypes matching the query, or a new Progtypes object populated from the query conditions when no match is found
 *
 * @method     Progtypes findOneById(int $id) Return the first Progtypes filtered by the id column
 * @method     Progtypes findOneByTypename(string $TypeName) Return the first Progtypes filtered by the TypeName column
 *
 * @method     array findById(int $id) Return Progtypes objects filtered by the id column
 * @method     array findByTypename(string $TypeName) Return Progtypes objects filtered by the TypeName column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseProgtypesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProgtypesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Progtypes', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProgtypesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProgtypesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProgtypesQuery) {
			return $criteria;
		}
		$query = new ProgtypesQuery();
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
	 * @return    Progtypes|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProgtypesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProgtypesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Progtypes A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TYPENAME` FROM `progtypes` WHERE `ID` = :p0';
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
			$obj = new Progtypes();
			$obj->hydrate($row);
			ProgtypesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Progtypes|array|mixed the result, formatted by the current formatter
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
	 * @return    ProgtypesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProgtypesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProgtypesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProgtypesPeer::ID, $keys, Criteria::IN);
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
	 * @return    ProgtypesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProgtypesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the TypeName column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTypename('fooValue');   // WHERE TypeName = 'fooValue'
	 * $query->filterByTypename('%fooValue%'); // WHERE TypeName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $typename The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProgtypesQuery The current query, for fluid interface
	 */
	public function filterByTypename($typename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($typename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $typename)) {
				$typename = str_replace('*', '%', $typename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProgtypesPeer::TYPENAME, $typename, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Progtypes $progtypes Object to remove from the list of results
	 *
	 * @return    ProgtypesQuery The current query, for fluid interface
	 */
	public function prune($progtypes = null)
	{
		if ($progtypes) {
			$this->addUsingAlias(ProgtypesPeer::ID, $progtypes->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProgtypesQuery
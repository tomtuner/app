<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Positions;
use OrganizationsORM\PositionsPeer;
use OrganizationsORM\PositionsQuery;

/**
 * Base class that represents a query for the 'positions' table.
 *
 * 
 *
 * @method     PositionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PositionsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     PositionsQuery groupById() Group by the id column
 * @method     PositionsQuery groupByPosition() Group by the position column
 *
 * @method     PositionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PositionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PositionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Positions findOne(PropelPDO $con = null) Return the first Positions matching the query
 * @method     Positions findOneOrCreate(PropelPDO $con = null) Return the first Positions matching the query, or a new Positions object populated from the query conditions when no match is found
 *
 * @method     Positions findOneById(int $id) Return the first Positions filtered by the id column
 * @method     Positions findOneByPosition(string $position) Return the first Positions filtered by the position column
 *
 * @method     array findById(int $id) Return Positions objects filtered by the id column
 * @method     array findByPosition(string $position) Return Positions objects filtered by the position column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BasePositionsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePositionsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Positions', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PositionsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PositionsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PositionsQuery) {
			return $criteria;
		}
		$query = new PositionsQuery();
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
	 * @return    Positions|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PositionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PositionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Positions A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `POSITION` FROM `positions` WHERE `ID` = :p0';
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
			$obj = new Positions();
			$obj->hydrate($row);
			PositionsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Positions|array|mixed the result, formatted by the current formatter
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
	 * @return    PositionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PositionsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PositionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PositionsPeer::ID, $keys, Criteria::IN);
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
	 * @return    PositionsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PositionsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the position column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosition('fooValue');   // WHERE position = 'fooValue'
	 * $query->filterByPosition('%fooValue%'); // WHERE position LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $position The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PositionsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($position)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $position)) {
				$position = str_replace('*', '%', $position);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PositionsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Positions $positions Object to remove from the list of results
	 *
	 * @return    PositionsQuery The current query, for fluid interface
	 */
	public function prune($positions = null)
	{
		if ($positions) {
			$this->addUsingAlias(PositionsPeer::ID, $positions->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePositionsQuery
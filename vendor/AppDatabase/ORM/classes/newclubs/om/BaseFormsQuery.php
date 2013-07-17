<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Forms;
use NewClubsORM\FormsPeer;
use NewClubsORM\FormsQuery;

/**
 * Base class that represents a query for the 'forms' table.
 *
 * 
 *
 * @method     FormsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FormsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     FormsQuery orderByDescrip($order = Criteria::ASC) Order by the descrip column
 * @method     FormsQuery orderByDbName($order = Criteria::ASC) Order by the db_name column
 *
 * @method     FormsQuery groupById() Group by the id column
 * @method     FormsQuery groupByName() Group by the name column
 * @method     FormsQuery groupByDescrip() Group by the descrip column
 * @method     FormsQuery groupByDbName() Group by the db_name column
 *
 * @method     FormsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FormsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FormsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Forms findOne(PropelPDO $con = null) Return the first Forms matching the query
 * @method     Forms findOneOrCreate(PropelPDO $con = null) Return the first Forms matching the query, or a new Forms object populated from the query conditions when no match is found
 *
 * @method     Forms findOneById(int $id) Return the first Forms filtered by the id column
 * @method     Forms findOneByName(string $name) Return the first Forms filtered by the name column
 * @method     Forms findOneByDescrip(string $descrip) Return the first Forms filtered by the descrip column
 * @method     Forms findOneByDbName(string $db_name) Return the first Forms filtered by the db_name column
 *
 * @method     array findById(int $id) Return Forms objects filtered by the id column
 * @method     array findByName(string $name) Return Forms objects filtered by the name column
 * @method     array findByDescrip(string $descrip) Return Forms objects filtered by the descrip column
 * @method     array findByDbName(string $db_name) Return Forms objects filtered by the db_name column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseFormsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFormsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Forms', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FormsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FormsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FormsQuery) {
			return $criteria;
		}
		$query = new FormsQuery();
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
	 * @return    Forms|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FormsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FormsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Forms A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `DESCRIP`, `DB_NAME` FROM `forms` WHERE `ID` = :p0';
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
			$obj = new Forms();
			$obj->hydrate($row);
			FormsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Forms|array|mixed the result, formatted by the current formatter
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
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FormsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FormsPeer::ID, $keys, Criteria::IN);
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
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FormsPeer::ID, $id, $comparison);
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
	 * @return    FormsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(FormsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the descrip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescrip('fooValue');   // WHERE descrip = 'fooValue'
	 * $query->filterByDescrip('%fooValue%'); // WHERE descrip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descrip The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function filterByDescrip($descrip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descrip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descrip)) {
				$descrip = str_replace('*', '%', $descrip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormsPeer::DESCRIP, $descrip, $comparison);
	}

	/**
	 * Filter the query on the db_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDbName('fooValue');   // WHERE db_name = 'fooValue'
	 * $query->filterByDbName('%fooValue%'); // WHERE db_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dbName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function filterByDbName($dbName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dbName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dbName)) {
				$dbName = str_replace('*', '%', $dbName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormsPeer::DB_NAME, $dbName, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Forms $forms Object to remove from the list of results
	 *
	 * @return    FormsQuery The current query, for fluid interface
	 */
	public function prune($forms = null)
	{
		if ($forms) {
			$this->addUsingAlias(FormsPeer::ID, $forms->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFormsQuery
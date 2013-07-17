<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\NewFinancecerts;
use NewClubsORM\NewFinancecertsPeer;
use NewClubsORM\NewFinancecertsQuery;

/**
 * Base class that represents a query for the 'new_financecerts' table.
 *
 * 
 *
 * @method     NewFinancecertsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     NewFinancecertsQuery orderByCertDate($order = Criteria::ASC) Order by the cert_date column
 * @method     NewFinancecertsQuery orderByScore($order = Criteria::ASC) Order by the score column
 *
 * @method     NewFinancecertsQuery groupByUserId() Group by the user_id column
 * @method     NewFinancecertsQuery groupByCertDate() Group by the cert_date column
 * @method     NewFinancecertsQuery groupByScore() Group by the score column
 *
 * @method     NewFinancecertsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewFinancecertsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewFinancecertsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewFinancecerts findOne(PropelPDO $con = null) Return the first NewFinancecerts matching the query
 * @method     NewFinancecerts findOneOrCreate(PropelPDO $con = null) Return the first NewFinancecerts matching the query, or a new NewFinancecerts object populated from the query conditions when no match is found
 *
 * @method     NewFinancecerts findOneByUserId(int $user_id) Return the first NewFinancecerts filtered by the user_id column
 * @method     NewFinancecerts findOneByCertDate(string $cert_date) Return the first NewFinancecerts filtered by the cert_date column
 * @method     NewFinancecerts findOneByScore(double $score) Return the first NewFinancecerts filtered by the score column
 *
 * @method     array findByUserId(int $user_id) Return NewFinancecerts objects filtered by the user_id column
 * @method     array findByCertDate(string $cert_date) Return NewFinancecerts objects filtered by the cert_date column
 * @method     array findByScore(double $score) Return NewFinancecerts objects filtered by the score column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseNewFinancecertsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNewFinancecertsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\NewFinancecerts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewFinancecertsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewFinancecertsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewFinancecertsQuery) {
			return $criteria;
		}
		$query = new NewFinancecertsQuery();
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
	 * @param     array[$user_id, $cert_date] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    NewFinancecerts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NewFinancecertsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NewFinancecertsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    NewFinancecerts A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `USER_ID`, `CERT_DATE`, `SCORE` FROM `new_financecerts` WHERE `USER_ID` = :p0 AND `CERT_DATE` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new NewFinancecerts();
			$obj->hydrate($row);
			NewFinancecertsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    NewFinancecerts|array|mixed the result, formatted by the current formatter
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
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(NewFinancecertsPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(NewFinancecertsPeer::CERT_DATE, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(NewFinancecertsPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(NewFinancecertsPeer::CERT_DATE, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewFinancecertsPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the cert_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCertDate('2011-03-14'); // WHERE cert_date = '2011-03-14'
	 * $query->filterByCertDate('now'); // WHERE cert_date = '2011-03-14'
	 * $query->filterByCertDate(array('max' => 'yesterday')); // WHERE cert_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $certDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function filterByCertDate($certDate = null, $comparison = null)
	{
		if (is_array($certDate)) {
			$useMinMax = false;
			if (isset($certDate['min'])) {
				$this->addUsingAlias(NewFinancecertsPeer::CERT_DATE, $certDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($certDate['max'])) {
				$this->addUsingAlias(NewFinancecertsPeer::CERT_DATE, $certDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewFinancecertsPeer::CERT_DATE, $certDate, $comparison);
	}

	/**
	 * Filter the query on the score column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByScore(1234); // WHERE score = 1234
	 * $query->filterByScore(array(12, 34)); // WHERE score IN (12, 34)
	 * $query->filterByScore(array('min' => 12)); // WHERE score > 12
	 * </code>
	 *
	 * @param     mixed $score The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function filterByScore($score = null, $comparison = null)
	{
		if (is_array($score)) {
			$useMinMax = false;
			if (isset($score['min'])) {
				$this->addUsingAlias(NewFinancecertsPeer::SCORE, $score['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($score['max'])) {
				$this->addUsingAlias(NewFinancecertsPeer::SCORE, $score['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewFinancecertsPeer::SCORE, $score, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NewFinancecerts $newFinancecerts Object to remove from the list of results
	 *
	 * @return    NewFinancecertsQuery The current query, for fluid interface
	 */
	public function prune($newFinancecerts = null)
	{
		if ($newFinancecerts) {
			$this->addCond('pruneCond0', $this->getAliasedColName(NewFinancecertsPeer::USER_ID), $newFinancecerts->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(NewFinancecertsPeer::CERT_DATE), $newFinancecerts->getCertDate(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseNewFinancecertsQuery
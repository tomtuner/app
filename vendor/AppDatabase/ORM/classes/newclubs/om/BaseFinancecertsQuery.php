<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Financecerts;
use NewClubsORM\FinancecertsPeer;
use NewClubsORM\FinancecertsQuery;

/**
 * Base class that represents a query for the 'financecerts' table.
 *
 * 
 *
 * @method     FinancecertsQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 * @method     FinancecertsQuery orderByCertDate($order = Criteria::ASC) Order by the cert_date column
 * @method     FinancecertsQuery orderByScore($order = Criteria::ASC) Order by the score column
 *
 * @method     FinancecertsQuery groupByMemberId() Group by the member_id column
 * @method     FinancecertsQuery groupByCertDate() Group by the cert_date column
 * @method     FinancecertsQuery groupByScore() Group by the score column
 *
 * @method     FinancecertsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FinancecertsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FinancecertsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Financecerts findOne(PropelPDO $con = null) Return the first Financecerts matching the query
 * @method     Financecerts findOneOrCreate(PropelPDO $con = null) Return the first Financecerts matching the query, or a new Financecerts object populated from the query conditions when no match is found
 *
 * @method     Financecerts findOneByMemberId(int $member_id) Return the first Financecerts filtered by the member_id column
 * @method     Financecerts findOneByCertDate(string $cert_date) Return the first Financecerts filtered by the cert_date column
 * @method     Financecerts findOneByScore(double $score) Return the first Financecerts filtered by the score column
 *
 * @method     array findByMemberId(int $member_id) Return Financecerts objects filtered by the member_id column
 * @method     array findByCertDate(string $cert_date) Return Financecerts objects filtered by the cert_date column
 * @method     array findByScore(double $score) Return Financecerts objects filtered by the score column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseFinancecertsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFinancecertsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Financecerts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FinancecertsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FinancecertsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FinancecertsQuery) {
			return $criteria;
		}
		$query = new FinancecertsQuery();
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
	 * @return    Financecerts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FinancecertsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FinancecertsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Financecerts A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `MEMBER_ID`, `CERT_DATE`, `SCORE` FROM `financecerts` WHERE `MEMBER_ID` = :p0';
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
			$obj = new Financecerts();
			$obj->hydrate($row);
			FinancecertsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Financecerts|array|mixed the result, formatted by the current formatter
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
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FinancecertsPeer::MEMBER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FinancecertsPeer::MEMBER_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the member_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMemberId(1234); // WHERE member_id = 1234
	 * $query->filterByMemberId(array(12, 34)); // WHERE member_id IN (12, 34)
	 * $query->filterByMemberId(array('min' => 12)); // WHERE member_id > 12
	 * </code>
	 *
	 * @param     mixed $memberId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function filterByMemberId($memberId = null, $comparison = null)
	{
		if (is_array($memberId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FinancecertsPeer::MEMBER_ID, $memberId, $comparison);
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
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function filterByCertDate($certDate = null, $comparison = null)
	{
		if (is_array($certDate)) {
			$useMinMax = false;
			if (isset($certDate['min'])) {
				$this->addUsingAlias(FinancecertsPeer::CERT_DATE, $certDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($certDate['max'])) {
				$this->addUsingAlias(FinancecertsPeer::CERT_DATE, $certDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FinancecertsPeer::CERT_DATE, $certDate, $comparison);
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
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function filterByScore($score = null, $comparison = null)
	{
		if (is_array($score)) {
			$useMinMax = false;
			if (isset($score['min'])) {
				$this->addUsingAlias(FinancecertsPeer::SCORE, $score['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($score['max'])) {
				$this->addUsingAlias(FinancecertsPeer::SCORE, $score['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FinancecertsPeer::SCORE, $score, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Financecerts $financecerts Object to remove from the list of results
	 *
	 * @return    FinancecertsQuery The current query, for fluid interface
	 */
	public function prune($financecerts = null)
	{
		if ($financecerts) {
			$this->addUsingAlias(FinancecertsPeer::MEMBER_ID, $financecerts->getMemberId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFinancecertsQuery
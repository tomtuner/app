<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Budgets;
use NewClubsORM\BudgetsPeer;
use NewClubsORM\BudgetsQuery;

/**
 * Base class that represents a query for the 'budgets' table.
 *
 * 
 *
 * @method     BudgetsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BudgetsQuery orderByClubId($order = Criteria::ASC) Order by the club_id column
 * @method     BudgetsQuery orderByDateSubmitted($order = Criteria::ASC) Order by the date_submitted column
 * @method     BudgetsQuery orderByAmountRequested($order = Criteria::ASC) Order by the amount_requested column
 * @method     BudgetsQuery orderByAmountApproved($order = Criteria::ASC) Order by the amount_approved column
 * @method     BudgetsQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     BudgetsQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 *
 * @method     BudgetsQuery groupById() Group by the id column
 * @method     BudgetsQuery groupByClubId() Group by the club_id column
 * @method     BudgetsQuery groupByDateSubmitted() Group by the date_submitted column
 * @method     BudgetsQuery groupByAmountRequested() Group by the amount_requested column
 * @method     BudgetsQuery groupByAmountApproved() Group by the amount_approved column
 * @method     BudgetsQuery groupByYear() Group by the year column
 * @method     BudgetsQuery groupByNotes() Group by the notes column
 *
 * @method     BudgetsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BudgetsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BudgetsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Budgets findOne(PropelPDO $con = null) Return the first Budgets matching the query
 * @method     Budgets findOneOrCreate(PropelPDO $con = null) Return the first Budgets matching the query, or a new Budgets object populated from the query conditions when no match is found
 *
 * @method     Budgets findOneById(int $id) Return the first Budgets filtered by the id column
 * @method     Budgets findOneByClubId(int $club_id) Return the first Budgets filtered by the club_id column
 * @method     Budgets findOneByDateSubmitted(string $date_submitted) Return the first Budgets filtered by the date_submitted column
 * @method     Budgets findOneByAmountRequested(double $amount_requested) Return the first Budgets filtered by the amount_requested column
 * @method     Budgets findOneByAmountApproved(double $amount_approved) Return the first Budgets filtered by the amount_approved column
 * @method     Budgets findOneByYear(string $year) Return the first Budgets filtered by the year column
 * @method     Budgets findOneByNotes(string $notes) Return the first Budgets filtered by the notes column
 *
 * @method     array findById(int $id) Return Budgets objects filtered by the id column
 * @method     array findByClubId(int $club_id) Return Budgets objects filtered by the club_id column
 * @method     array findByDateSubmitted(string $date_submitted) Return Budgets objects filtered by the date_submitted column
 * @method     array findByAmountRequested(double $amount_requested) Return Budgets objects filtered by the amount_requested column
 * @method     array findByAmountApproved(double $amount_approved) Return Budgets objects filtered by the amount_approved column
 * @method     array findByYear(string $year) Return Budgets objects filtered by the year column
 * @method     array findByNotes(string $notes) Return Budgets objects filtered by the notes column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseBudgetsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseBudgetsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Budgets', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BudgetsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BudgetsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BudgetsQuery) {
			return $criteria;
		}
		$query = new BudgetsQuery();
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
	 * @return    Budgets|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = BudgetsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(BudgetsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Budgets A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLUB_ID`, `DATE_SUBMITTED`, `AMOUNT_REQUESTED`, `AMOUNT_APPROVED`, `YEAR`, `NOTES` FROM `budgets` WHERE `ID` = :p0';
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
			$obj = new Budgets();
			$obj->hydrate($row);
			BudgetsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Budgets|array|mixed the result, formatted by the current formatter
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
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BudgetsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BudgetsPeer::ID, $keys, Criteria::IN);
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
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BudgetsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the club_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubId(1234); // WHERE club_id = 1234
	 * $query->filterByClubId(array(12, 34)); // WHERE club_id IN (12, 34)
	 * $query->filterByClubId(array('min' => 12)); // WHERE club_id > 12
	 * </code>
	 *
	 * @param     mixed $clubId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByClubId($clubId = null, $comparison = null)
	{
		if (is_array($clubId)) {
			$useMinMax = false;
			if (isset($clubId['min'])) {
				$this->addUsingAlias(BudgetsPeer::CLUB_ID, $clubId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubId['max'])) {
				$this->addUsingAlias(BudgetsPeer::CLUB_ID, $clubId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BudgetsPeer::CLUB_ID, $clubId, $comparison);
	}

	/**
	 * Filter the query on the date_submitted column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateSubmitted('2011-03-14'); // WHERE date_submitted = '2011-03-14'
	 * $query->filterByDateSubmitted('now'); // WHERE date_submitted = '2011-03-14'
	 * $query->filterByDateSubmitted(array('max' => 'yesterday')); // WHERE date_submitted > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dateSubmitted The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByDateSubmitted($dateSubmitted = null, $comparison = null)
	{
		if (is_array($dateSubmitted)) {
			$useMinMax = false;
			if (isset($dateSubmitted['min'])) {
				$this->addUsingAlias(BudgetsPeer::DATE_SUBMITTED, $dateSubmitted['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateSubmitted['max'])) {
				$this->addUsingAlias(BudgetsPeer::DATE_SUBMITTED, $dateSubmitted['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BudgetsPeer::DATE_SUBMITTED, $dateSubmitted, $comparison);
	}

	/**
	 * Filter the query on the amount_requested column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAmountRequested(1234); // WHERE amount_requested = 1234
	 * $query->filterByAmountRequested(array(12, 34)); // WHERE amount_requested IN (12, 34)
	 * $query->filterByAmountRequested(array('min' => 12)); // WHERE amount_requested > 12
	 * </code>
	 *
	 * @param     mixed $amountRequested The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByAmountRequested($amountRequested = null, $comparison = null)
	{
		if (is_array($amountRequested)) {
			$useMinMax = false;
			if (isset($amountRequested['min'])) {
				$this->addUsingAlias(BudgetsPeer::AMOUNT_REQUESTED, $amountRequested['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($amountRequested['max'])) {
				$this->addUsingAlias(BudgetsPeer::AMOUNT_REQUESTED, $amountRequested['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BudgetsPeer::AMOUNT_REQUESTED, $amountRequested, $comparison);
	}

	/**
	 * Filter the query on the amount_approved column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAmountApproved(1234); // WHERE amount_approved = 1234
	 * $query->filterByAmountApproved(array(12, 34)); // WHERE amount_approved IN (12, 34)
	 * $query->filterByAmountApproved(array('min' => 12)); // WHERE amount_approved > 12
	 * </code>
	 *
	 * @param     mixed $amountApproved The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByAmountApproved($amountApproved = null, $comparison = null)
	{
		if (is_array($amountApproved)) {
			$useMinMax = false;
			if (isset($amountApproved['min'])) {
				$this->addUsingAlias(BudgetsPeer::AMOUNT_APPROVED, $amountApproved['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($amountApproved['max'])) {
				$this->addUsingAlias(BudgetsPeer::AMOUNT_APPROVED, $amountApproved['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BudgetsPeer::AMOUNT_APPROVED, $amountApproved, $comparison);
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
	 * @return    BudgetsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BudgetsPeer::YEAR, $year, $comparison);
	}

	/**
	 * Filter the query on the notes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
	 * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $notes The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function filterByNotes($notes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($notes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $notes)) {
				$notes = str_replace('*', '%', $notes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BudgetsPeer::NOTES, $notes, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Budgets $budgets Object to remove from the list of results
	 *
	 * @return    BudgetsQuery The current query, for fluid interface
	 */
	public function prune($budgets = null)
	{
		if ($budgets) {
			$this->addUsingAlias(BudgetsPeer::ID, $budgets->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseBudgetsQuery
<?php

namespace CommuterWeekORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelPDO;
use CommuterWeekORM\Commuter;
use CommuterWeekORM\DwellingChoice;
use CommuterWeekORM\DwellingChoicePeer;
use CommuterWeekORM\DwellingChoiceQuery;

/**
 * Base class that represents a query for the 'dwelling_choice' table.
 *
 * 
 *
 * @method     DwellingChoiceQuery orderByDwellingChoiceId($order = Criteria::ASC) Order by the dwelling_choice_id column
 * @method     DwellingChoiceQuery orderByDwellingChoiceType($order = Criteria::ASC) Order by the dwelling_choice_type column
 *
 * @method     DwellingChoiceQuery groupByDwellingChoiceId() Group by the dwelling_choice_id column
 * @method     DwellingChoiceQuery groupByDwellingChoiceType() Group by the dwelling_choice_type column
 *
 * @method     DwellingChoiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DwellingChoiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DwellingChoiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DwellingChoiceQuery leftJoinCommuter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Commuter relation
 * @method     DwellingChoiceQuery rightJoinCommuter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Commuter relation
 * @method     DwellingChoiceQuery innerJoinCommuter($relationAlias = null) Adds a INNER JOIN clause to the query using the Commuter relation
 *
 * @method     DwellingChoice findOne(PropelPDO $con = null) Return the first DwellingChoice matching the query
 * @method     DwellingChoice findOneOrCreate(PropelPDO $con = null) Return the first DwellingChoice matching the query, or a new DwellingChoice object populated from the query conditions when no match is found
 *
 * @method     DwellingChoice findOneByDwellingChoiceId(int $dwelling_choice_id) Return the first DwellingChoice filtered by the dwelling_choice_id column
 * @method     DwellingChoice findOneByDwellingChoiceType(string $dwelling_choice_type) Return the first DwellingChoice filtered by the dwelling_choice_type column
 *
 * @method     array findByDwellingChoiceId(int $dwelling_choice_id) Return DwellingChoice objects filtered by the dwelling_choice_id column
 * @method     array findByDwellingChoiceType(string $dwelling_choice_type) Return DwellingChoice objects filtered by the dwelling_choice_type column
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseDwellingChoiceQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseDwellingChoiceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'commuter_week', $modelName = 'CommuterWeekORM\\DwellingChoice', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DwellingChoiceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DwellingChoiceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DwellingChoiceQuery) {
			return $criteria;
		}
		$query = new DwellingChoiceQuery();
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
	 * @return    DwellingChoice|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = DwellingChoicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(DwellingChoicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    DwellingChoice A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `DWELLING_CHOICE_ID`, `DWELLING_CHOICE_TYPE` FROM `dwelling_choice` WHERE `DWELLING_CHOICE_ID` = :p0';
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
			$obj = new DwellingChoice();
			$obj->hydrate($row);
			DwellingChoicePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    DwellingChoice|array|mixed the result, formatted by the current formatter
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
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the dwelling_choice_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDwellingChoiceId(1234); // WHERE dwelling_choice_id = 1234
	 * $query->filterByDwellingChoiceId(array(12, 34)); // WHERE dwelling_choice_id IN (12, 34)
	 * $query->filterByDwellingChoiceId(array('min' => 12)); // WHERE dwelling_choice_id > 12
	 * </code>
	 *
	 * @param     mixed $dwellingChoiceId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function filterByDwellingChoiceId($dwellingChoiceId = null, $comparison = null)
	{
		if (is_array($dwellingChoiceId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_ID, $dwellingChoiceId, $comparison);
	}

	/**
	 * Filter the query on the dwelling_choice_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDwellingChoiceType('fooValue');   // WHERE dwelling_choice_type = 'fooValue'
	 * $query->filterByDwellingChoiceType('%fooValue%'); // WHERE dwelling_choice_type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dwellingChoiceType The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function filterByDwellingChoiceType($dwellingChoiceType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dwellingChoiceType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dwellingChoiceType)) {
				$dwellingChoiceType = str_replace('*', '%', $dwellingChoiceType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_TYPE, $dwellingChoiceType, $comparison);
	}

	/**
	 * Filter the query by a related Commuter object
	 *
	 * @param     Commuter $commuter  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function filterByCommuter($commuter, $comparison = null)
	{
		if ($commuter instanceof Commuter) {
			return $this
				->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_ID, $commuter->getDwellingChoiceId(), $comparison);
		} elseif ($commuter instanceof PropelCollection) {
			return $this
				->useCommuterQuery()
				->filterByPrimaryKeys($commuter->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCommuter() only accepts arguments of type Commuter or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Commuter relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function joinCommuter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Commuter');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Commuter');
		}

		return $this;
	}

	/**
	 * Use the Commuter relation Commuter object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \CommuterWeekORM\CommuterQuery A secondary query class using the current class as primary query
	 */
	public function useCommuterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCommuter($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Commuter', '\CommuterWeekORM\CommuterQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     DwellingChoice $dwellingChoice Object to remove from the list of results
	 *
	 * @return    DwellingChoiceQuery The current query, for fluid interface
	 */
	public function prune($dwellingChoice = null)
	{
		if ($dwellingChoice) {
			$this->addUsingAlias(DwellingChoicePeer::DWELLING_CHOICE_ID, $dwellingChoice->getDwellingChoiceId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseDwellingChoiceQuery
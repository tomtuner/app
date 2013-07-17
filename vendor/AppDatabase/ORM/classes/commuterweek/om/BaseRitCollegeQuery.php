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
use CommuterWeekORM\RitCollege;
use CommuterWeekORM\RitCollegePeer;
use CommuterWeekORM\RitCollegeQuery;

/**
 * Base class that represents a query for the 'rit_college' table.
 *
 * 
 *
 * @method     RitCollegeQuery orderByRitCollegeId($order = Criteria::ASC) Order by the rit_college_id column
 * @method     RitCollegeQuery orderByRitCollegeName($order = Criteria::ASC) Order by the rit_college_name column
 *
 * @method     RitCollegeQuery groupByRitCollegeId() Group by the rit_college_id column
 * @method     RitCollegeQuery groupByRitCollegeName() Group by the rit_college_name column
 *
 * @method     RitCollegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RitCollegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RitCollegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RitCollegeQuery leftJoinCommuter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Commuter relation
 * @method     RitCollegeQuery rightJoinCommuter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Commuter relation
 * @method     RitCollegeQuery innerJoinCommuter($relationAlias = null) Adds a INNER JOIN clause to the query using the Commuter relation
 *
 * @method     RitCollege findOne(PropelPDO $con = null) Return the first RitCollege matching the query
 * @method     RitCollege findOneOrCreate(PropelPDO $con = null) Return the first RitCollege matching the query, or a new RitCollege object populated from the query conditions when no match is found
 *
 * @method     RitCollege findOneByRitCollegeId(int $rit_college_id) Return the first RitCollege filtered by the rit_college_id column
 * @method     RitCollege findOneByRitCollegeName(string $rit_college_name) Return the first RitCollege filtered by the rit_college_name column
 *
 * @method     array findByRitCollegeId(int $rit_college_id) Return RitCollege objects filtered by the rit_college_id column
 * @method     array findByRitCollegeName(string $rit_college_name) Return RitCollege objects filtered by the rit_college_name column
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseRitCollegeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRitCollegeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'commuter_week', $modelName = 'CommuterWeekORM\\RitCollege', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RitCollegeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RitCollegeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RitCollegeQuery) {
			return $criteria;
		}
		$query = new RitCollegeQuery();
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
	 * @return    RitCollege|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RitCollegePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RitCollegePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RitCollege A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `RIT_COLLEGE_ID`, `RIT_COLLEGE_NAME` FROM `rit_college` WHERE `RIT_COLLEGE_ID` = :p0';
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
			$obj = new RitCollege();
			$obj->hydrate($row);
			RitCollegePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RitCollege|array|mixed the result, formatted by the current formatter
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
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RitCollegePeer::RIT_COLLEGE_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RitCollegePeer::RIT_COLLEGE_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the rit_college_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRitCollegeId(1234); // WHERE rit_college_id = 1234
	 * $query->filterByRitCollegeId(array(12, 34)); // WHERE rit_college_id IN (12, 34)
	 * $query->filterByRitCollegeId(array('min' => 12)); // WHERE rit_college_id > 12
	 * </code>
	 *
	 * @param     mixed $ritCollegeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function filterByRitCollegeId($ritCollegeId = null, $comparison = null)
	{
		if (is_array($ritCollegeId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RitCollegePeer::RIT_COLLEGE_ID, $ritCollegeId, $comparison);
	}

	/**
	 * Filter the query on the rit_college_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRitCollegeName('fooValue');   // WHERE rit_college_name = 'fooValue'
	 * $query->filterByRitCollegeName('%fooValue%'); // WHERE rit_college_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ritCollegeName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function filterByRitCollegeName($ritCollegeName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ritCollegeName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ritCollegeName)) {
				$ritCollegeName = str_replace('*', '%', $ritCollegeName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RitCollegePeer::RIT_COLLEGE_NAME, $ritCollegeName, $comparison);
	}

	/**
	 * Filter the query by a related Commuter object
	 *
	 * @param     Commuter $commuter  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function filterByCommuter($commuter, $comparison = null)
	{
		if ($commuter instanceof Commuter) {
			return $this
				->addUsingAlias(RitCollegePeer::RIT_COLLEGE_ID, $commuter->getRitCollegeId(), $comparison);
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
	 * @return    RitCollegeQuery The current query, for fluid interface
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
	 * @param     RitCollege $ritCollege Object to remove from the list of results
	 *
	 * @return    RitCollegeQuery The current query, for fluid interface
	 */
	public function prune($ritCollege = null)
	{
		if ($ritCollege) {
			$this->addUsingAlias(RitCollegePeer::RIT_COLLEGE_ID, $ritCollege->getRitCollegeId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRitCollegeQuery
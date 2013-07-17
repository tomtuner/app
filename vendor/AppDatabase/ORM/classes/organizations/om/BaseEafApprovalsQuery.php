<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelPDO;
use OrganizationsORM\EafApprovals;
use OrganizationsORM\EafApprovalsPeer;
use OrganizationsORM\EafApprovalsQuery;
use OrganizationsORM\EafFormInfo;

/**
 * Base class that represents a query for the 'eaf_approvals' table.
 *
 * 
 *
 * @method     EafApprovalsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EafApprovalsQuery orderByEafFormNo($order = Criteria::ASC) Order by the eaf_form_no column
 * @method     EafApprovalsQuery orderByAdvisorName($order = Criteria::ASC) Order by the advisor_name column
 * @method     EafApprovalsQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     EafApprovalsQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     EafApprovalsQuery orderByApprovalDate($order = Criteria::ASC) Order by the approval_date column
 *
 * @method     EafApprovalsQuery groupById() Group by the id column
 * @method     EafApprovalsQuery groupByEafFormNo() Group by the eaf_form_no column
 * @method     EafApprovalsQuery groupByAdvisorName() Group by the advisor_name column
 * @method     EafApprovalsQuery groupByApproved() Group by the approved column
 * @method     EafApprovalsQuery groupByNotes() Group by the notes column
 * @method     EafApprovalsQuery groupByApprovalDate() Group by the approval_date column
 *
 * @method     EafApprovalsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EafApprovalsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EafApprovalsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EafApprovalsQuery leftJoinEafFormInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the EafFormInfo relation
 * @method     EafApprovalsQuery rightJoinEafFormInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EafFormInfo relation
 * @method     EafApprovalsQuery innerJoinEafFormInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the EafFormInfo relation
 *
 * @method     EafApprovals findOne(PropelPDO $con = null) Return the first EafApprovals matching the query
 * @method     EafApprovals findOneOrCreate(PropelPDO $con = null) Return the first EafApprovals matching the query, or a new EafApprovals object populated from the query conditions when no match is found
 *
 * @method     EafApprovals findOneById(int $id) Return the first EafApprovals filtered by the id column
 * @method     EafApprovals findOneByEafFormNo(int $eaf_form_no) Return the first EafApprovals filtered by the eaf_form_no column
 * @method     EafApprovals findOneByAdvisorName(string $advisor_name) Return the first EafApprovals filtered by the advisor_name column
 * @method     EafApprovals findOneByApproved(string $approved) Return the first EafApprovals filtered by the approved column
 * @method     EafApprovals findOneByNotes(string $notes) Return the first EafApprovals filtered by the notes column
 * @method     EafApprovals findOneByApprovalDate(string $approval_date) Return the first EafApprovals filtered by the approval_date column
 *
 * @method     array findById(int $id) Return EafApprovals objects filtered by the id column
 * @method     array findByEafFormNo(int $eaf_form_no) Return EafApprovals objects filtered by the eaf_form_no column
 * @method     array findByAdvisorName(string $advisor_name) Return EafApprovals objects filtered by the advisor_name column
 * @method     array findByApproved(string $approved) Return EafApprovals objects filtered by the approved column
 * @method     array findByNotes(string $notes) Return EafApprovals objects filtered by the notes column
 * @method     array findByApprovalDate(string $approval_date) Return EafApprovals objects filtered by the approval_date column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseEafApprovalsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEafApprovalsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\EafApprovals', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EafApprovalsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EafApprovalsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EafApprovalsQuery) {
			return $criteria;
		}
		$query = new EafApprovalsQuery();
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
	 * @return    EafApprovals|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EafApprovalsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EafApprovalsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    EafApprovals A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `EAF_FORM_NO`, `ADVISOR_NAME`, `APPROVED`, `NOTES`, `APPROVAL_DATE` FROM `eaf_approvals` WHERE `ID` = :p0';
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
			$obj = new EafApprovals();
			$obj->hydrate($row);
			EafApprovalsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    EafApprovals|array|mixed the result, formatted by the current formatter
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
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EafApprovalsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EafApprovalsPeer::ID, $keys, Criteria::IN);
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
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EafApprovalsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the eaf_form_no column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEafFormNo(1234); // WHERE eaf_form_no = 1234
	 * $query->filterByEafFormNo(array(12, 34)); // WHERE eaf_form_no IN (12, 34)
	 * $query->filterByEafFormNo(array('min' => 12)); // WHERE eaf_form_no > 12
	 * </code>
	 *
	 * @see       filterByEafFormInfo()
	 *
	 * @param     mixed $eafFormNo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByEafFormNo($eafFormNo = null, $comparison = null)
	{
		if (is_array($eafFormNo)) {
			$useMinMax = false;
			if (isset($eafFormNo['min'])) {
				$this->addUsingAlias(EafApprovalsPeer::EAF_FORM_NO, $eafFormNo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($eafFormNo['max'])) {
				$this->addUsingAlias(EafApprovalsPeer::EAF_FORM_NO, $eafFormNo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafApprovalsPeer::EAF_FORM_NO, $eafFormNo, $comparison);
	}

	/**
	 * Filter the query on the advisor_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorName('fooValue');   // WHERE advisor_name = 'fooValue'
	 * $query->filterByAdvisorName('%fooValue%'); // WHERE advisor_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $advisorName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorName($advisorName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($advisorName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $advisorName)) {
				$advisorName = str_replace('*', '%', $advisorName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafApprovalsPeer::ADVISOR_NAME, $advisorName, $comparison);
	}

	/**
	 * Filter the query on the approved column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApproved('fooValue');   // WHERE approved = 'fooValue'
	 * $query->filterByApproved('%fooValue%'); // WHERE approved LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $approved The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByApproved($approved = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($approved)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $approved)) {
				$approved = str_replace('*', '%', $approved);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafApprovalsPeer::APPROVED, $approved, $comparison);
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
	 * @return    EafApprovalsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EafApprovalsPeer::NOTES, $notes, $comparison);
	}

	/**
	 * Filter the query on the approval_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApprovalDate('2011-03-14'); // WHERE approval_date = '2011-03-14'
	 * $query->filterByApprovalDate('now'); // WHERE approval_date = '2011-03-14'
	 * $query->filterByApprovalDate(array('max' => 'yesterday')); // WHERE approval_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $approvalDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByApprovalDate($approvalDate = null, $comparison = null)
	{
		if (is_array($approvalDate)) {
			$useMinMax = false;
			if (isset($approvalDate['min'])) {
				$this->addUsingAlias(EafApprovalsPeer::APPROVAL_DATE, $approvalDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($approvalDate['max'])) {
				$this->addUsingAlias(EafApprovalsPeer::APPROVAL_DATE, $approvalDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafApprovalsPeer::APPROVAL_DATE, $approvalDate, $comparison);
	}

	/**
	 * Filter the query by a related EafFormInfo object
	 *
	 * @param     EafFormInfo|PropelCollection $eafFormInfo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function filterByEafFormInfo($eafFormInfo, $comparison = null)
	{
		if ($eafFormInfo instanceof EafFormInfo) {
			return $this
				->addUsingAlias(EafApprovalsPeer::EAF_FORM_NO, $eafFormInfo->getEafFormNo(), $comparison);
		} elseif ($eafFormInfo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(EafApprovalsPeer::EAF_FORM_NO, $eafFormInfo->toKeyValue('PrimaryKey', 'EafFormNo'), $comparison);
		} else {
			throw new PropelException('filterByEafFormInfo() only accepts arguments of type EafFormInfo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the EafFormInfo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function joinEafFormInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EafFormInfo');

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
			$this->addJoinObject($join, 'EafFormInfo');
		}

		return $this;
	}

	/**
	 * Use the EafFormInfo relation EafFormInfo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \OrganizationsORM\EafFormInfoQuery A secondary query class using the current class as primary query
	 */
	public function useEafFormInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEafFormInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EafFormInfo', '\OrganizationsORM\EafFormInfoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     EafApprovals $eafApprovals Object to remove from the list of results
	 *
	 * @return    EafApprovalsQuery The current query, for fluid interface
	 */
	public function prune($eafApprovals = null)
	{
		if ($eafApprovals) {
			$this->addUsingAlias(EafApprovalsPeer::ID, $eafApprovals->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEafApprovalsQuery
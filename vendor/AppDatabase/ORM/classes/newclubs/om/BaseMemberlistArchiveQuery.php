<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\MemberlistArchive;
use NewClubsORM\MemberlistArchivePeer;
use NewClubsORM\MemberlistArchiveQuery;

/**
 * Base class that represents a query for the 'memberlist_archive' table.
 *
 * 
 *
 * @method     MemberlistArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MemberlistArchiveQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     MemberlistArchiveQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     MemberlistArchiveQuery orderBySubmitter($order = Criteria::ASC) Order by the submitter column
 * @method     MemberlistArchiveQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     MemberlistArchiveQuery groupById() Group by the id column
 * @method     MemberlistArchiveQuery groupByOrgId() Group by the org_id column
 * @method     MemberlistArchiveQuery groupByMembers() Group by the members column
 * @method     MemberlistArchiveQuery groupBySubmitter() Group by the submitter column
 * @method     MemberlistArchiveQuery groupByDate() Group by the date column
 *
 * @method     MemberlistArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MemberlistArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MemberlistArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MemberlistArchive findOne(PropelPDO $con = null) Return the first MemberlistArchive matching the query
 * @method     MemberlistArchive findOneOrCreate(PropelPDO $con = null) Return the first MemberlistArchive matching the query, or a new MemberlistArchive object populated from the query conditions when no match is found
 *
 * @method     MemberlistArchive findOneById(int $id) Return the first MemberlistArchive filtered by the id column
 * @method     MemberlistArchive findOneByOrgId(int $org_id) Return the first MemberlistArchive filtered by the org_id column
 * @method     MemberlistArchive findOneByMembers(string $members) Return the first MemberlistArchive filtered by the members column
 * @method     MemberlistArchive findOneBySubmitter(string $submitter) Return the first MemberlistArchive filtered by the submitter column
 * @method     MemberlistArchive findOneByDate(string $date) Return the first MemberlistArchive filtered by the date column
 *
 * @method     array findById(int $id) Return MemberlistArchive objects filtered by the id column
 * @method     array findByOrgId(int $org_id) Return MemberlistArchive objects filtered by the org_id column
 * @method     array findByMembers(string $members) Return MemberlistArchive objects filtered by the members column
 * @method     array findBySubmitter(string $submitter) Return MemberlistArchive objects filtered by the submitter column
 * @method     array findByDate(string $date) Return MemberlistArchive objects filtered by the date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseMemberlistArchiveQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMemberlistArchiveQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\MemberlistArchive', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MemberlistArchiveQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MemberlistArchiveQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MemberlistArchiveQuery) {
			return $criteria;
		}
		$query = new MemberlistArchiveQuery();
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
	 * @return    MemberlistArchive|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MemberlistArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MemberlistArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    MemberlistArchive A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `MEMBERS`, `SUBMITTER`, `DATE` FROM `memberlist_archive` WHERE `ID` = :p0';
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
			$obj = new MemberlistArchive();
			$obj->hydrate($row);
			MemberlistArchivePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    MemberlistArchive|array|mixed the result, formatted by the current formatter
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
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MemberlistArchivePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MemberlistArchivePeer::ID, $keys, Criteria::IN);
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
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MemberlistArchivePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the org_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrgId(1234); // WHERE org_id = 1234
	 * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
	 * $query->filterByOrgId(array('min' => 12)); // WHERE org_id > 12
	 * </code>
	 *
	 * @param     mixed $orgId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(MemberlistArchivePeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(MemberlistArchivePeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlistArchivePeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembers('fooValue');   // WHERE members = 'fooValue'
	 * $query->filterByMembers('%fooValue%'); // WHERE members LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $members The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterByMembers($members = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($members)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $members)) {
				$members = str_replace('*', '%', $members);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberlistArchivePeer::MEMBERS, $members, $comparison);
	}

	/**
	 * Filter the query on the submitter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmitter('fooValue');   // WHERE submitter = 'fooValue'
	 * $query->filterBySubmitter('%fooValue%'); // WHERE submitter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $submitter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterBySubmitter($submitter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submitter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submitter)) {
				$submitter = str_replace('*', '%', $submitter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberlistArchivePeer::SUBMITTER, $submitter, $comparison);
	}

	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
	 * $query->filterByDate('now'); // WHERE date = '2011-03-14'
	 * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $date The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(MemberlistArchivePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(MemberlistArchivePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberlistArchivePeer::DATE, $date, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MemberlistArchive $memberlistArchive Object to remove from the list of results
	 *
	 * @return    MemberlistArchiveQuery The current query, for fluid interface
	 */
	public function prune($memberlistArchive = null)
	{
		if ($memberlistArchive) {
			$this->addUsingAlias(MemberlistArchivePeer::ID, $memberlistArchive->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMemberlistArchiveQuery
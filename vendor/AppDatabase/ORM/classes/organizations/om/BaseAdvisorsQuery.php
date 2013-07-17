<?php

namespace OrganizationsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use OrganizationsORM\Advisors;
use OrganizationsORM\AdvisorsPeer;
use OrganizationsORM\AdvisorsQuery;

/**
 * Base class that represents a query for the 'advisors' table.
 *
 * 
 *
 * @method     AdvisorsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdvisorsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     AdvisorsQuery orderByCampusPhone($order = Criteria::ASC) Order by the campus_phone column
 * @method     AdvisorsQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     AdvisorsQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method     AdvisorsQuery groupById() Group by the id column
 * @method     AdvisorsQuery groupByUserId() Group by the user_id column
 * @method     AdvisorsQuery groupByCampusPhone() Group by the campus_phone column
 * @method     AdvisorsQuery groupByOrgId() Group by the org_id column
 * @method     AdvisorsQuery groupByActive() Group by the active column
 *
 * @method     AdvisorsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvisorsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvisorsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Advisors findOne(PropelPDO $con = null) Return the first Advisors matching the query
 * @method     Advisors findOneOrCreate(PropelPDO $con = null) Return the first Advisors matching the query, or a new Advisors object populated from the query conditions when no match is found
 *
 * @method     Advisors findOneById(int $id) Return the first Advisors filtered by the id column
 * @method     Advisors findOneByUserId(int $user_id) Return the first Advisors filtered by the user_id column
 * @method     Advisors findOneByCampusPhone(string $campus_phone) Return the first Advisors filtered by the campus_phone column
 * @method     Advisors findOneByOrgId(int $org_id) Return the first Advisors filtered by the org_id column
 * @method     Advisors findOneByActive(int $active) Return the first Advisors filtered by the active column
 *
 * @method     array findById(int $id) Return Advisors objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return Advisors objects filtered by the user_id column
 * @method     array findByCampusPhone(string $campus_phone) Return Advisors objects filtered by the campus_phone column
 * @method     array findByOrgId(int $org_id) Return Advisors objects filtered by the org_id column
 * @method     array findByActive(int $active) Return Advisors objects filtered by the active column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseAdvisorsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvisorsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\Advisors', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvisorsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvisorsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvisorsQuery) {
			return $criteria;
		}
		$query = new AdvisorsQuery();
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
	 * @return    Advisors|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvisorsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvisorsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Advisors A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USER_ID`, `CAMPUS_PHONE`, `ORG_ID`, `ACTIVE` FROM `advisors` WHERE `ID` = :p0';
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
			$obj = new Advisors();
			$obj->hydrate($row);
			AdvisorsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Advisors|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdvisorsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdvisorsPeer::ID, $keys, Criteria::IN);
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
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvisorsPeer::ID, $id, $comparison);
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
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(AdvisorsPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(AdvisorsPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvisorsPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the campus_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCampusPhone('fooValue');   // WHERE campus_phone = 'fooValue'
	 * $query->filterByCampusPhone('%fooValue%'); // WHERE campus_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $campusPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByCampusPhone($campusPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($campusPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $campusPhone)) {
				$campusPhone = str_replace('*', '%', $campusPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdvisorsPeer::CAMPUS_PHONE, $campusPhone, $comparison);
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
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(AdvisorsPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(AdvisorsPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvisorsPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(1234); // WHERE active = 1234
	 * $query->filterByActive(array(12, 34)); // WHERE active IN (12, 34)
	 * $query->filterByActive(array('min' => 12)); // WHERE active > 12
	 * </code>
	 *
	 * @param     mixed $active The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_array($active)) {
			$useMinMax = false;
			if (isset($active['min'])) {
				$this->addUsingAlias(AdvisorsPeer::ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($active['max'])) {
				$this->addUsingAlias(AdvisorsPeer::ACTIVE, $active['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvisorsPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Advisors $advisors Object to remove from the list of results
	 *
	 * @return    AdvisorsQuery The current query, for fluid interface
	 */
	public function prune($advisors = null)
	{
		if ($advisors) {
			$this->addUsingAlias(AdvisorsPeer::ID, $advisors->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAdvisorsQuery
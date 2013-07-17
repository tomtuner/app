<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\FairRequests;
use NewClubsORM\FairRequestsPeer;
use NewClubsORM\FairRequestsQuery;

/**
 * Base class that represents a query for the 'fair_requests' table.
 *
 * 
 *
 * @method     FairRequestsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FairRequestsQuery orderByOrganizationName($order = Criteria::ASC) Order by the organization_name column
 * @method     FairRequestsQuery orderByResponsibleRep($order = Criteria::ASC) Order by the responsible_rep column
 * @method     FairRequestsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     FairRequestsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     FairRequestsQuery orderByPowerSource($order = Criteria::ASC) Order by the power_source column
 * @method     FairRequestsQuery orderByInterpServices($order = Criteria::ASC) Order by the interp_services column
 * @method     FairRequestsQuery orderByOtherRequests($order = Criteria::ASC) Order by the other_requests column
 * @method     FairRequestsQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     FairRequestsQuery groupById() Group by the id column
 * @method     FairRequestsQuery groupByOrganizationName() Group by the organization_name column
 * @method     FairRequestsQuery groupByResponsibleRep() Group by the responsible_rep column
 * @method     FairRequestsQuery groupByEmail() Group by the email column
 * @method     FairRequestsQuery groupByPhone() Group by the phone column
 * @method     FairRequestsQuery groupByPowerSource() Group by the power_source column
 * @method     FairRequestsQuery groupByInterpServices() Group by the interp_services column
 * @method     FairRequestsQuery groupByOtherRequests() Group by the other_requests column
 * @method     FairRequestsQuery groupByDate() Group by the date column
 *
 * @method     FairRequestsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FairRequestsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FairRequestsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FairRequests findOne(PropelPDO $con = null) Return the first FairRequests matching the query
 * @method     FairRequests findOneOrCreate(PropelPDO $con = null) Return the first FairRequests matching the query, or a new FairRequests object populated from the query conditions when no match is found
 *
 * @method     FairRequests findOneById(int $id) Return the first FairRequests filtered by the id column
 * @method     FairRequests findOneByOrganizationName(string $organization_name) Return the first FairRequests filtered by the organization_name column
 * @method     FairRequests findOneByResponsibleRep(string $responsible_rep) Return the first FairRequests filtered by the responsible_rep column
 * @method     FairRequests findOneByEmail(string $email) Return the first FairRequests filtered by the email column
 * @method     FairRequests findOneByPhone(string $phone) Return the first FairRequests filtered by the phone column
 * @method     FairRequests findOneByPowerSource(int $power_source) Return the first FairRequests filtered by the power_source column
 * @method     FairRequests findOneByInterpServices(int $interp_services) Return the first FairRequests filtered by the interp_services column
 * @method     FairRequests findOneByOtherRequests(string $other_requests) Return the first FairRequests filtered by the other_requests column
 * @method     FairRequests findOneByDate(string $date) Return the first FairRequests filtered by the date column
 *
 * @method     array findById(int $id) Return FairRequests objects filtered by the id column
 * @method     array findByOrganizationName(string $organization_name) Return FairRequests objects filtered by the organization_name column
 * @method     array findByResponsibleRep(string $responsible_rep) Return FairRequests objects filtered by the responsible_rep column
 * @method     array findByEmail(string $email) Return FairRequests objects filtered by the email column
 * @method     array findByPhone(string $phone) Return FairRequests objects filtered by the phone column
 * @method     array findByPowerSource(int $power_source) Return FairRequests objects filtered by the power_source column
 * @method     array findByInterpServices(int $interp_services) Return FairRequests objects filtered by the interp_services column
 * @method     array findByOtherRequests(string $other_requests) Return FairRequests objects filtered by the other_requests column
 * @method     array findByDate(string $date) Return FairRequests objects filtered by the date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseFairRequestsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFairRequestsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\FairRequests', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FairRequestsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FairRequestsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FairRequestsQuery) {
			return $criteria;
		}
		$query = new FairRequestsQuery();
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
	 * @return    FairRequests|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FairRequestsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FairRequestsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    FairRequests A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORGANIZATION_NAME`, `RESPONSIBLE_REP`, `EMAIL`, `PHONE`, `POWER_SOURCE`, `INTERP_SERVICES`, `OTHER_REQUESTS`, `DATE` FROM `fair_requests` WHERE `ID` = :p0';
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
			$obj = new FairRequests();
			$obj->hydrate($row);
			FairRequestsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    FairRequests|array|mixed the result, formatted by the current formatter
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
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FairRequestsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FairRequestsPeer::ID, $keys, Criteria::IN);
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
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(FairRequestsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(FairRequestsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the organization_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrganizationName('fooValue');   // WHERE organization_name = 'fooValue'
	 * $query->filterByOrganizationName('%fooValue%'); // WHERE organization_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $organizationName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByOrganizationName($organizationName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($organizationName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $organizationName)) {
				$organizationName = str_replace('*', '%', $organizationName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::ORGANIZATION_NAME, $organizationName, $comparison);
	}

	/**
	 * Filter the query on the responsible_rep column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByResponsibleRep('fooValue');   // WHERE responsible_rep = 'fooValue'
	 * $query->filterByResponsibleRep('%fooValue%'); // WHERE responsible_rep LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $responsibleRep The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByResponsibleRep($responsibleRep = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($responsibleRep)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $responsibleRep)) {
				$responsibleRep = str_replace('*', '%', $responsibleRep);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::RESPONSIBLE_REP, $responsibleRep, $comparison);
	}

	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
	 * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $phone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the power_source column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPowerSource(1234); // WHERE power_source = 1234
	 * $query->filterByPowerSource(array(12, 34)); // WHERE power_source IN (12, 34)
	 * $query->filterByPowerSource(array('min' => 12)); // WHERE power_source > 12
	 * </code>
	 *
	 * @param     mixed $powerSource The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByPowerSource($powerSource = null, $comparison = null)
	{
		if (is_array($powerSource)) {
			$useMinMax = false;
			if (isset($powerSource['min'])) {
				$this->addUsingAlias(FairRequestsPeer::POWER_SOURCE, $powerSource['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($powerSource['max'])) {
				$this->addUsingAlias(FairRequestsPeer::POWER_SOURCE, $powerSource['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::POWER_SOURCE, $powerSource, $comparison);
	}

	/**
	 * Filter the query on the interp_services column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInterpServices(1234); // WHERE interp_services = 1234
	 * $query->filterByInterpServices(array(12, 34)); // WHERE interp_services IN (12, 34)
	 * $query->filterByInterpServices(array('min' => 12)); // WHERE interp_services > 12
	 * </code>
	 *
	 * @param     mixed $interpServices The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByInterpServices($interpServices = null, $comparison = null)
	{
		if (is_array($interpServices)) {
			$useMinMax = false;
			if (isset($interpServices['min'])) {
				$this->addUsingAlias(FairRequestsPeer::INTERP_SERVICES, $interpServices['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($interpServices['max'])) {
				$this->addUsingAlias(FairRequestsPeer::INTERP_SERVICES, $interpServices['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::INTERP_SERVICES, $interpServices, $comparison);
	}

	/**
	 * Filter the query on the other_requests column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOtherRequests('fooValue');   // WHERE other_requests = 'fooValue'
	 * $query->filterByOtherRequests('%fooValue%'); // WHERE other_requests LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $otherRequests The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByOtherRequests($otherRequests = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($otherRequests)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $otherRequests)) {
				$otherRequests = str_replace('*', '%', $otherRequests);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::OTHER_REQUESTS, $otherRequests, $comparison);
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
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(FairRequestsPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(FairRequestsPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FairRequestsPeer::DATE, $date, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FairRequests $fairRequests Object to remove from the list of results
	 *
	 * @return    FairRequestsQuery The current query, for fluid interface
	 */
	public function prune($fairRequests = null)
	{
		if ($fairRequests) {
			$this->addUsingAlias(FairRequestsPeer::ID, $fairRequests->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFairRequestsQuery
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
use CommuterWeekORM\CommuterPeer;
use CommuterWeekORM\CommuterQuery;
use CommuterWeekORM\DwellingChoice;
use CommuterWeekORM\RitCollege;
use CommuterWeekORM\RoommateType;

/**
 * Base class that represents a query for the 'commuter' table.
 *
 * 
 *
 * @method     CommuterQuery orderByCommuterId($order = Criteria::ASC) Order by the commuter_id column
 * @method     CommuterQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     CommuterQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     CommuterQuery orderByLocalAddressOne($order = Criteria::ASC) Order by the local_address_one column
 * @method     CommuterQuery orderByLocalAddressTwo($order = Criteria::ASC) Order by the local_address_two column
 * @method     CommuterQuery orderByCityName($order = Criteria::ASC) Order by the city_name column
 * @method     CommuterQuery orderByStateCode($order = Criteria::ASC) Order by the state_code column
 * @method     CommuterQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method     CommuterQuery orderByGraduationClassYear($order = Criteria::ASC) Order by the graduation_class_year column
 * @method     CommuterQuery orderByRitCollegeId($order = Criteria::ASC) Order by the rit_college_id column
 * @method     CommuterQuery orderByApartmentComplexName($order = Criteria::ASC) Order by the apartment_complex_name column
 * @method     CommuterQuery orderByDwellingChoiceId($order = Criteria::ASC) Order by the dwelling_choice_id column
 * @method     CommuterQuery orderByRoommateTypeId($order = Criteria::ASC) Order by the roommate_type_id column
 * @method     CommuterQuery orderByEmailAddress($order = Criteria::ASC) Order by the email_address column
 *
 * @method     CommuterQuery groupByCommuterId() Group by the commuter_id column
 * @method     CommuterQuery groupByFirstName() Group by the first_name column
 * @method     CommuterQuery groupByLastName() Group by the last_name column
 * @method     CommuterQuery groupByLocalAddressOne() Group by the local_address_one column
 * @method     CommuterQuery groupByLocalAddressTwo() Group by the local_address_two column
 * @method     CommuterQuery groupByCityName() Group by the city_name column
 * @method     CommuterQuery groupByStateCode() Group by the state_code column
 * @method     CommuterQuery groupByZipCode() Group by the zip_code column
 * @method     CommuterQuery groupByGraduationClassYear() Group by the graduation_class_year column
 * @method     CommuterQuery groupByRitCollegeId() Group by the rit_college_id column
 * @method     CommuterQuery groupByApartmentComplexName() Group by the apartment_complex_name column
 * @method     CommuterQuery groupByDwellingChoiceId() Group by the dwelling_choice_id column
 * @method     CommuterQuery groupByRoommateTypeId() Group by the roommate_type_id column
 * @method     CommuterQuery groupByEmailAddress() Group by the email_address column
 *
 * @method     CommuterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CommuterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CommuterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CommuterQuery leftJoinRoommateType($relationAlias = null) Adds a LEFT JOIN clause to the query using the RoommateType relation
 * @method     CommuterQuery rightJoinRoommateType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RoommateType relation
 * @method     CommuterQuery innerJoinRoommateType($relationAlias = null) Adds a INNER JOIN clause to the query using the RoommateType relation
 *
 * @method     CommuterQuery leftJoinRitCollege($relationAlias = null) Adds a LEFT JOIN clause to the query using the RitCollege relation
 * @method     CommuterQuery rightJoinRitCollege($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RitCollege relation
 * @method     CommuterQuery innerJoinRitCollege($relationAlias = null) Adds a INNER JOIN clause to the query using the RitCollege relation
 *
 * @method     CommuterQuery leftJoinDwellingChoice($relationAlias = null) Adds a LEFT JOIN clause to the query using the DwellingChoice relation
 * @method     CommuterQuery rightJoinDwellingChoice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DwellingChoice relation
 * @method     CommuterQuery innerJoinDwellingChoice($relationAlias = null) Adds a INNER JOIN clause to the query using the DwellingChoice relation
 *
 * @method     Commuter findOne(PropelPDO $con = null) Return the first Commuter matching the query
 * @method     Commuter findOneOrCreate(PropelPDO $con = null) Return the first Commuter matching the query, or a new Commuter object populated from the query conditions when no match is found
 *
 * @method     Commuter findOneByCommuterId(int $commuter_id) Return the first Commuter filtered by the commuter_id column
 * @method     Commuter findOneByFirstName(string $first_name) Return the first Commuter filtered by the first_name column
 * @method     Commuter findOneByLastName(string $last_name) Return the first Commuter filtered by the last_name column
 * @method     Commuter findOneByLocalAddressOne(string $local_address_one) Return the first Commuter filtered by the local_address_one column
 * @method     Commuter findOneByLocalAddressTwo(string $local_address_two) Return the first Commuter filtered by the local_address_two column
 * @method     Commuter findOneByCityName(string $city_name) Return the first Commuter filtered by the city_name column
 * @method     Commuter findOneByStateCode(string $state_code) Return the first Commuter filtered by the state_code column
 * @method     Commuter findOneByZipCode(int $zip_code) Return the first Commuter filtered by the zip_code column
 * @method     Commuter findOneByGraduationClassYear(int $graduation_class_year) Return the first Commuter filtered by the graduation_class_year column
 * @method     Commuter findOneByRitCollegeId(int $rit_college_id) Return the first Commuter filtered by the rit_college_id column
 * @method     Commuter findOneByApartmentComplexName(string $apartment_complex_name) Return the first Commuter filtered by the apartment_complex_name column
 * @method     Commuter findOneByDwellingChoiceId(int $dwelling_choice_id) Return the first Commuter filtered by the dwelling_choice_id column
 * @method     Commuter findOneByRoommateTypeId(int $roommate_type_id) Return the first Commuter filtered by the roommate_type_id column
 * @method     Commuter findOneByEmailAddress(string $email_address) Return the first Commuter filtered by the email_address column
 *
 * @method     array findByCommuterId(int $commuter_id) Return Commuter objects filtered by the commuter_id column
 * @method     array findByFirstName(string $first_name) Return Commuter objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return Commuter objects filtered by the last_name column
 * @method     array findByLocalAddressOne(string $local_address_one) Return Commuter objects filtered by the local_address_one column
 * @method     array findByLocalAddressTwo(string $local_address_two) Return Commuter objects filtered by the local_address_two column
 * @method     array findByCityName(string $city_name) Return Commuter objects filtered by the city_name column
 * @method     array findByStateCode(string $state_code) Return Commuter objects filtered by the state_code column
 * @method     array findByZipCode(int $zip_code) Return Commuter objects filtered by the zip_code column
 * @method     array findByGraduationClassYear(int $graduation_class_year) Return Commuter objects filtered by the graduation_class_year column
 * @method     array findByRitCollegeId(int $rit_college_id) Return Commuter objects filtered by the rit_college_id column
 * @method     array findByApartmentComplexName(string $apartment_complex_name) Return Commuter objects filtered by the apartment_complex_name column
 * @method     array findByDwellingChoiceId(int $dwelling_choice_id) Return Commuter objects filtered by the dwelling_choice_id column
 * @method     array findByRoommateTypeId(int $roommate_type_id) Return Commuter objects filtered by the roommate_type_id column
 * @method     array findByEmailAddress(string $email_address) Return Commuter objects filtered by the email_address column
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseCommuterQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCommuterQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'commuter_week', $modelName = 'CommuterWeekORM\\Commuter', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CommuterQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CommuterQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CommuterQuery) {
			return $criteria;
		}
		$query = new CommuterQuery();
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
	 * @return    Commuter|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CommuterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CommuterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Commuter A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `COMMUTER_ID`, `FIRST_NAME`, `LAST_NAME`, `LOCAL_ADDRESS_ONE`, `LOCAL_ADDRESS_TWO`, `CITY_NAME`, `STATE_CODE`, `ZIP_CODE`, `GRADUATION_CLASS_YEAR`, `RIT_COLLEGE_ID`, `APARTMENT_COMPLEX_NAME`, `DWELLING_CHOICE_ID`, `ROOMMATE_TYPE_ID`, `EMAIL_ADDRESS` FROM `commuter` WHERE `COMMUTER_ID` = :p0';
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
			$obj = new Commuter();
			$obj->hydrate($row);
			CommuterPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Commuter|array|mixed the result, formatted by the current formatter
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
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CommuterPeer::COMMUTER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CommuterPeer::COMMUTER_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the commuter_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCommuterId(1234); // WHERE commuter_id = 1234
	 * $query->filterByCommuterId(array(12, 34)); // WHERE commuter_id IN (12, 34)
	 * $query->filterByCommuterId(array('min' => 12)); // WHERE commuter_id > 12
	 * </code>
	 *
	 * @param     mixed $commuterId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByCommuterId($commuterId = null, $comparison = null)
	{
		if (is_array($commuterId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CommuterPeer::COMMUTER_ID, $commuterId, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
	 * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $firstName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
	 * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $lastName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the local_address_one column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocalAddressOne('fooValue');   // WHERE local_address_one = 'fooValue'
	 * $query->filterByLocalAddressOne('%fooValue%'); // WHERE local_address_one LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $localAddressOne The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByLocalAddressOne($localAddressOne = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($localAddressOne)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $localAddressOne)) {
				$localAddressOne = str_replace('*', '%', $localAddressOne);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::LOCAL_ADDRESS_ONE, $localAddressOne, $comparison);
	}

	/**
	 * Filter the query on the local_address_two column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocalAddressTwo('fooValue');   // WHERE local_address_two = 'fooValue'
	 * $query->filterByLocalAddressTwo('%fooValue%'); // WHERE local_address_two LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $localAddressTwo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByLocalAddressTwo($localAddressTwo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($localAddressTwo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $localAddressTwo)) {
				$localAddressTwo = str_replace('*', '%', $localAddressTwo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::LOCAL_ADDRESS_TWO, $localAddressTwo, $comparison);
	}

	/**
	 * Filter the query on the city_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCityName('fooValue');   // WHERE city_name = 'fooValue'
	 * $query->filterByCityName('%fooValue%'); // WHERE city_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cityName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByCityName($cityName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cityName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cityName)) {
				$cityName = str_replace('*', '%', $cityName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::CITY_NAME, $cityName, $comparison);
	}

	/**
	 * Filter the query on the state_code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStateCode('fooValue');   // WHERE state_code = 'fooValue'
	 * $query->filterByStateCode('%fooValue%'); // WHERE state_code LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $stateCode The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByStateCode($stateCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($stateCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $stateCode)) {
				$stateCode = str_replace('*', '%', $stateCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::STATE_CODE, $stateCode, $comparison);
	}

	/**
	 * Filter the query on the zip_code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByZipCode(1234); // WHERE zip_code = 1234
	 * $query->filterByZipCode(array(12, 34)); // WHERE zip_code IN (12, 34)
	 * $query->filterByZipCode(array('min' => 12)); // WHERE zip_code > 12
	 * </code>
	 *
	 * @param     mixed $zipCode The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByZipCode($zipCode = null, $comparison = null)
	{
		if (is_array($zipCode)) {
			$useMinMax = false;
			if (isset($zipCode['min'])) {
				$this->addUsingAlias(CommuterPeer::ZIP_CODE, $zipCode['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($zipCode['max'])) {
				$this->addUsingAlias(CommuterPeer::ZIP_CODE, $zipCode['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CommuterPeer::ZIP_CODE, $zipCode, $comparison);
	}

	/**
	 * Filter the query on the graduation_class_year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGraduationClassYear(1234); // WHERE graduation_class_year = 1234
	 * $query->filterByGraduationClassYear(array(12, 34)); // WHERE graduation_class_year IN (12, 34)
	 * $query->filterByGraduationClassYear(array('min' => 12)); // WHERE graduation_class_year > 12
	 * </code>
	 *
	 * @param     mixed $graduationClassYear The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByGraduationClassYear($graduationClassYear = null, $comparison = null)
	{
		if (is_array($graduationClassYear)) {
			$useMinMax = false;
			if (isset($graduationClassYear['min'])) {
				$this->addUsingAlias(CommuterPeer::GRADUATION_CLASS_YEAR, $graduationClassYear['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($graduationClassYear['max'])) {
				$this->addUsingAlias(CommuterPeer::GRADUATION_CLASS_YEAR, $graduationClassYear['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CommuterPeer::GRADUATION_CLASS_YEAR, $graduationClassYear, $comparison);
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
	 * @see       filterByRitCollege()
	 *
	 * @param     mixed $ritCollegeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByRitCollegeId($ritCollegeId = null, $comparison = null)
	{
		if (is_array($ritCollegeId)) {
			$useMinMax = false;
			if (isset($ritCollegeId['min'])) {
				$this->addUsingAlias(CommuterPeer::RIT_COLLEGE_ID, $ritCollegeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ritCollegeId['max'])) {
				$this->addUsingAlias(CommuterPeer::RIT_COLLEGE_ID, $ritCollegeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CommuterPeer::RIT_COLLEGE_ID, $ritCollegeId, $comparison);
	}

	/**
	 * Filter the query on the apartment_complex_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApartmentComplexName('fooValue');   // WHERE apartment_complex_name = 'fooValue'
	 * $query->filterByApartmentComplexName('%fooValue%'); // WHERE apartment_complex_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $apartmentComplexName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByApartmentComplexName($apartmentComplexName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($apartmentComplexName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $apartmentComplexName)) {
				$apartmentComplexName = str_replace('*', '%', $apartmentComplexName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::APARTMENT_COMPLEX_NAME, $apartmentComplexName, $comparison);
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
	 * @see       filterByDwellingChoice()
	 *
	 * @param     mixed $dwellingChoiceId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByDwellingChoiceId($dwellingChoiceId = null, $comparison = null)
	{
		if (is_array($dwellingChoiceId)) {
			$useMinMax = false;
			if (isset($dwellingChoiceId['min'])) {
				$this->addUsingAlias(CommuterPeer::DWELLING_CHOICE_ID, $dwellingChoiceId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dwellingChoiceId['max'])) {
				$this->addUsingAlias(CommuterPeer::DWELLING_CHOICE_ID, $dwellingChoiceId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CommuterPeer::DWELLING_CHOICE_ID, $dwellingChoiceId, $comparison);
	}

	/**
	 * Filter the query on the roommate_type_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRoommateTypeId(1234); // WHERE roommate_type_id = 1234
	 * $query->filterByRoommateTypeId(array(12, 34)); // WHERE roommate_type_id IN (12, 34)
	 * $query->filterByRoommateTypeId(array('min' => 12)); // WHERE roommate_type_id > 12
	 * </code>
	 *
	 * @see       filterByRoommateType()
	 *
	 * @param     mixed $roommateTypeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByRoommateTypeId($roommateTypeId = null, $comparison = null)
	{
		if (is_array($roommateTypeId)) {
			$useMinMax = false;
			if (isset($roommateTypeId['min'])) {
				$this->addUsingAlias(CommuterPeer::ROOMMATE_TYPE_ID, $roommateTypeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($roommateTypeId['max'])) {
				$this->addUsingAlias(CommuterPeer::ROOMMATE_TYPE_ID, $roommateTypeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CommuterPeer::ROOMMATE_TYPE_ID, $roommateTypeId, $comparison);
	}

	/**
	 * Filter the query on the email_address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmailAddress('fooValue');   // WHERE email_address = 'fooValue'
	 * $query->filterByEmailAddress('%fooValue%'); // WHERE email_address LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $emailAddress The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByEmailAddress($emailAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($emailAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $emailAddress)) {
				$emailAddress = str_replace('*', '%', $emailAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CommuterPeer::EMAIL_ADDRESS, $emailAddress, $comparison);
	}

	/**
	 * Filter the query by a related RoommateType object
	 *
	 * @param     RoommateType|PropelCollection $roommateType The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByRoommateType($roommateType, $comparison = null)
	{
		if ($roommateType instanceof RoommateType) {
			return $this
				->addUsingAlias(CommuterPeer::ROOMMATE_TYPE_ID, $roommateType->getRoommateTypeId(), $comparison);
		} elseif ($roommateType instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CommuterPeer::ROOMMATE_TYPE_ID, $roommateType->toKeyValue('PrimaryKey', 'RoommateTypeId'), $comparison);
		} else {
			throw new PropelException('filterByRoommateType() only accepts arguments of type RoommateType or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the RoommateType relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function joinRoommateType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RoommateType');

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
			$this->addJoinObject($join, 'RoommateType');
		}

		return $this;
	}

	/**
	 * Use the RoommateType relation RoommateType object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \CommuterWeekORM\RoommateTypeQuery A secondary query class using the current class as primary query
	 */
	public function useRoommateTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRoommateType($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RoommateType', '\CommuterWeekORM\RoommateTypeQuery');
	}

	/**
	 * Filter the query by a related RitCollege object
	 *
	 * @param     RitCollege|PropelCollection $ritCollege The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByRitCollege($ritCollege, $comparison = null)
	{
		if ($ritCollege instanceof RitCollege) {
			return $this
				->addUsingAlias(CommuterPeer::RIT_COLLEGE_ID, $ritCollege->getRitCollegeId(), $comparison);
		} elseif ($ritCollege instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CommuterPeer::RIT_COLLEGE_ID, $ritCollege->toKeyValue('PrimaryKey', 'RitCollegeId'), $comparison);
		} else {
			throw new PropelException('filterByRitCollege() only accepts arguments of type RitCollege or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the RitCollege relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function joinRitCollege($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RitCollege');

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
			$this->addJoinObject($join, 'RitCollege');
		}

		return $this;
	}

	/**
	 * Use the RitCollege relation RitCollege object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \CommuterWeekORM\RitCollegeQuery A secondary query class using the current class as primary query
	 */
	public function useRitCollegeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRitCollege($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RitCollege', '\CommuterWeekORM\RitCollegeQuery');
	}

	/**
	 * Filter the query by a related DwellingChoice object
	 *
	 * @param     DwellingChoice|PropelCollection $dwellingChoice The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function filterByDwellingChoice($dwellingChoice, $comparison = null)
	{
		if ($dwellingChoice instanceof DwellingChoice) {
			return $this
				->addUsingAlias(CommuterPeer::DWELLING_CHOICE_ID, $dwellingChoice->getDwellingChoiceId(), $comparison);
		} elseif ($dwellingChoice instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CommuterPeer::DWELLING_CHOICE_ID, $dwellingChoice->toKeyValue('PrimaryKey', 'DwellingChoiceId'), $comparison);
		} else {
			throw new PropelException('filterByDwellingChoice() only accepts arguments of type DwellingChoice or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the DwellingChoice relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function joinDwellingChoice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DwellingChoice');

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
			$this->addJoinObject($join, 'DwellingChoice');
		}

		return $this;
	}

	/**
	 * Use the DwellingChoice relation DwellingChoice object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \CommuterWeekORM\DwellingChoiceQuery A secondary query class using the current class as primary query
	 */
	public function useDwellingChoiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDwellingChoice($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DwellingChoice', '\CommuterWeekORM\DwellingChoiceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Commuter $commuter Object to remove from the list of results
	 *
	 * @return    CommuterQuery The current query, for fluid interface
	 */
	public function prune($commuter = null)
	{
		if ($commuter) {
			$this->addUsingAlias(CommuterPeer::COMMUTER_ID, $commuter->getCommuterId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCommuterQuery
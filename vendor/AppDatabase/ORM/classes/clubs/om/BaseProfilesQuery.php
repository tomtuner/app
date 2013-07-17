<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\Profiles;
use ClubsORM\ProfilesPeer;
use ClubsORM\ProfilesQuery;

/**
 * Base class that represents a query for the 'profiles' table.
 *
 * 
 *
 * @method     ProfilesQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     ProfilesQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ProfilesQuery orderByClubMeetingId($order = Criteria::ASC) Order by the club_meeting_id column
 * @method     ProfilesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ProfilesQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ProfilesQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ProfilesQuery orderByProjectNum($order = Criteria::ASC) Order by the project_num column
 * @method     ProfilesQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method     ProfilesQuery groupByOrganizationId() Group by the organization_id column
 * @method     ProfilesQuery groupByCategoryId() Group by the category_id column
 * @method     ProfilesQuery groupByClubMeetingId() Group by the club_meeting_id column
 * @method     ProfilesQuery groupByDescription() Group by the description column
 * @method     ProfilesQuery groupByUrl() Group by the url column
 * @method     ProfilesQuery groupByEmail() Group by the email column
 * @method     ProfilesQuery groupByProjectNum() Group by the project_num column
 * @method     ProfilesQuery groupByActive() Group by the active column
 *
 * @method     ProfilesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProfilesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProfilesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Profiles findOne(PropelPDO $con = null) Return the first Profiles matching the query
 * @method     Profiles findOneOrCreate(PropelPDO $con = null) Return the first Profiles matching the query, or a new Profiles object populated from the query conditions when no match is found
 *
 * @method     Profiles findOneByOrganizationId(int $organization_id) Return the first Profiles filtered by the organization_id column
 * @method     Profiles findOneByCategoryId(int $category_id) Return the first Profiles filtered by the category_id column
 * @method     Profiles findOneByClubMeetingId(int $club_meeting_id) Return the first Profiles filtered by the club_meeting_id column
 * @method     Profiles findOneByDescription(string $description) Return the first Profiles filtered by the description column
 * @method     Profiles findOneByUrl(string $url) Return the first Profiles filtered by the url column
 * @method     Profiles findOneByEmail(string $email) Return the first Profiles filtered by the email column
 * @method     Profiles findOneByProjectNum(string $project_num) Return the first Profiles filtered by the project_num column
 * @method     Profiles findOneByActive(boolean $active) Return the first Profiles filtered by the active column
 *
 * @method     array findByOrganizationId(int $organization_id) Return Profiles objects filtered by the organization_id column
 * @method     array findByCategoryId(int $category_id) Return Profiles objects filtered by the category_id column
 * @method     array findByClubMeetingId(int $club_meeting_id) Return Profiles objects filtered by the club_meeting_id column
 * @method     array findByDescription(string $description) Return Profiles objects filtered by the description column
 * @method     array findByUrl(string $url) Return Profiles objects filtered by the url column
 * @method     array findByEmail(string $email) Return Profiles objects filtered by the email column
 * @method     array findByProjectNum(string $project_num) Return Profiles objects filtered by the project_num column
 * @method     array findByActive(boolean $active) Return Profiles objects filtered by the active column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseProfilesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProfilesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\Profiles', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProfilesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProfilesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProfilesQuery) {
			return $criteria;
		}
		$query = new ProfilesQuery();
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
	 * @return    Profiles|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProfilesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Profiles A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ORGANIZATION_ID`, `CATEGORY_ID`, `CLUB_MEETING_ID`, `DESCRIPTION`, `URL`, `EMAIL`, `PROJECT_NUM`, `ACTIVE` FROM `profiles` WHERE `ORGANIZATION_ID` = :p0';
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
			$obj = new Profiles();
			$obj->hydrate($row);
			ProfilesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Profiles|array|mixed the result, formatted by the current formatter
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
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the organization_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrganizationId(1234); // WHERE organization_id = 1234
	 * $query->filterByOrganizationId(array(12, 34)); // WHERE organization_id IN (12, 34)
	 * $query->filterByOrganizationId(array('min' => 12)); // WHERE organization_id > 12
	 * </code>
	 *
	 * @param     mixed $organizationId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $organizationId, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoryId(1234); // WHERE category_id = 1234
	 * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
	 * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
	 * </code>
	 *
	 * @param     mixed $categoryId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId)) {
			$useMinMax = false;
			if (isset($categoryId['min'])) {
				$this->addUsingAlias(ProfilesPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoryId['max'])) {
				$this->addUsingAlias(ProfilesPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the club_meeting_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubMeetingId(1234); // WHERE club_meeting_id = 1234
	 * $query->filterByClubMeetingId(array(12, 34)); // WHERE club_meeting_id IN (12, 34)
	 * $query->filterByClubMeetingId(array('min' => 12)); // WHERE club_meeting_id > 12
	 * </code>
	 *
	 * @param     mixed $clubMeetingId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByClubMeetingId($clubMeetingId = null, $comparison = null)
	{
		if (is_array($clubMeetingId)) {
			$useMinMax = false;
			if (isset($clubMeetingId['min'])) {
				$this->addUsingAlias(ProfilesPeer::CLUB_MEETING_ID, $clubMeetingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubMeetingId['max'])) {
				$this->addUsingAlias(ProfilesPeer::CLUB_MEETING_ID, $clubMeetingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::CLUB_MEETING_ID, $clubMeetingId, $comparison);
	}

	/**
	 * Filter the query on the description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $description The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
	 * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $url The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::URL, $url, $comparison);
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
	 * @return    ProfilesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProfilesPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the project_num column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProjectNum('fooValue');   // WHERE project_num = 'fooValue'
	 * $query->filterByProjectNum('%fooValue%'); // WHERE project_num LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $projectNum The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByProjectNum($projectNum = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($projectNum)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $projectNum)) {
				$projectNum = str_replace('*', '%', $projectNum);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProfilesPeer::PROJECT_NUM, $projectNum, $comparison);
	}

	/**
	 * Filter the query on the active column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActive(true); // WHERE active = true
	 * $query->filterByActive('yes'); // WHERE active = true
	 * </code>
	 *
	 * @param     boolean|string $active The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ProfilesPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Profiles $profiles Object to remove from the list of results
	 *
	 * @return    ProfilesQuery The current query, for fluid interface
	 */
	public function prune($profiles = null)
	{
		if ($profiles) {
			$this->addUsingAlias(ProfilesPeer::ORGANIZATION_ID, $profiles->getOrganizationId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProfilesQuery
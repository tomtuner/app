<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubProfile;
use NewClubsORM\ClubProfilePeer;
use NewClubsORM\ClubProfileQuery;

/**
 * Base class that represents a query for the 'club_profile' table.
 *
 * 
 *
 * @method     ClubProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubProfileQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     ClubProfileQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     ClubProfileQuery orderByListname($order = Criteria::ASC) Order by the listname column
 * @method     ClubProfileQuery orderByProject($order = Criteria::ASC) Order by the project column
 * @method     ClubProfileQuery orderByDateFormed($order = Criteria::ASC) Order by the date_formed column
 * @method     ClubProfileQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ClubProfileQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ClubProfileQuery orderByClusterId($order = Criteria::ASC) Order by the cluster_id column
 * @method     ClubProfileQuery orderBySecondClusterId($order = Criteria::ASC) Order by the second_cluster_id column
 * @method     ClubProfileQuery orderByWebSite($order = Criteria::ASC) Order by the web_site column
 * @method     ClubProfileQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ClubProfileQuery orderByConstitutionDate($order = Criteria::ASC) Order by the constitution_date column
 * @method     ClubProfileQuery orderByLastmodifiedCcl($order = Criteria::ASC) Order by the lastmodified_ccl column
 * @method     ClubProfileQuery orderByLastmodifiedClub($order = Criteria::ASC) Order by the lastmodified_club column
 * @method     ClubProfileQuery orderByInitialMeeting($order = Criteria::ASC) Order by the initial_meeting column
 * @method     ClubProfileQuery orderByInactive($order = Criteria::ASC) Order by the inactive column
 * @method     ClubProfileQuery orderByRecognized($order = Criteria::ASC) Order by the recognized column
 * @method     ClubProfileQuery orderByShowWeb($order = Criteria::ASC) Order by the show_web column
 * @method     ClubProfileQuery orderByMeetingDay($order = Criteria::ASC) Order by the meeting_day column
 * @method     ClubProfileQuery orderByMeetingTime($order = Criteria::ASC) Order by the meeting_time column
 * @method     ClubProfileQuery orderByMeetingLoc($order = Criteria::ASC) Order by the meeting_loc column
 * @method     ClubProfileQuery orderByMeetingFreq($order = Criteria::ASC) Order by the meeting_freq column
 * @method     ClubProfileQuery orderByFinancialTier($order = Criteria::ASC) Order by the financial_tier column
 * @method     ClubProfileQuery orderByFinancialTierDate($order = Criteria::ASC) Order by the financial_tier_date column
 * @method     ClubProfileQuery orderByCrbExempt($order = Criteria::ASC) Order by the crb_exempt column
 * @method     ClubProfileQuery orderBySportsClub($order = Criteria::ASC) Order by the sports_club column
 * @method     ClubProfileQuery orderBySeason($order = Criteria::ASC) Order by the season column
 * @method     ClubProfileQuery orderByCfirst($order = Criteria::ASC) Order by the cfirst column
 * @method     ClubProfileQuery orderByClast($order = Criteria::ASC) Order by the clast column
 * @method     ClubProfileQuery orderByCphone($order = Criteria::ASC) Order by the cphone column
 * @method     ClubProfileQuery orderByCemail($order = Criteria::ASC) Order by the cemail column
 * @method     ClubProfileQuery orderByLeague($order = Criteria::ASC) Order by the league column
 * @method     ClubProfileQuery orderByLeaguefees($order = Criteria::ASC) Order by the leaguefees column
 * @method     ClubProfileQuery orderBySportsTravel($order = Criteria::ASC) Order by the sports_travel column
 * @method     ClubProfileQuery orderBySportsexpenses($order = Criteria::ASC) Order by the sportsexpenses column
 *
 * @method     ClubProfileQuery groupById() Group by the id column
 * @method     ClubProfileQuery groupByOrgId() Group by the org_id column
 * @method     ClubProfileQuery groupByAcronym() Group by the acronym column
 * @method     ClubProfileQuery groupByListname() Group by the listname column
 * @method     ClubProfileQuery groupByProject() Group by the project column
 * @method     ClubProfileQuery groupByDateFormed() Group by the date_formed column
 * @method     ClubProfileQuery groupByDescription() Group by the description column
 * @method     ClubProfileQuery groupByCategoryId() Group by the category_id column
 * @method     ClubProfileQuery groupByClusterId() Group by the cluster_id column
 * @method     ClubProfileQuery groupBySecondClusterId() Group by the second_cluster_id column
 * @method     ClubProfileQuery groupByWebSite() Group by the web_site column
 * @method     ClubProfileQuery groupByEmail() Group by the email column
 * @method     ClubProfileQuery groupByConstitutionDate() Group by the constitution_date column
 * @method     ClubProfileQuery groupByLastmodifiedCcl() Group by the lastmodified_ccl column
 * @method     ClubProfileQuery groupByLastmodifiedClub() Group by the lastmodified_club column
 * @method     ClubProfileQuery groupByInitialMeeting() Group by the initial_meeting column
 * @method     ClubProfileQuery groupByInactive() Group by the inactive column
 * @method     ClubProfileQuery groupByRecognized() Group by the recognized column
 * @method     ClubProfileQuery groupByShowWeb() Group by the show_web column
 * @method     ClubProfileQuery groupByMeetingDay() Group by the meeting_day column
 * @method     ClubProfileQuery groupByMeetingTime() Group by the meeting_time column
 * @method     ClubProfileQuery groupByMeetingLoc() Group by the meeting_loc column
 * @method     ClubProfileQuery groupByMeetingFreq() Group by the meeting_freq column
 * @method     ClubProfileQuery groupByFinancialTier() Group by the financial_tier column
 * @method     ClubProfileQuery groupByFinancialTierDate() Group by the financial_tier_date column
 * @method     ClubProfileQuery groupByCrbExempt() Group by the crb_exempt column
 * @method     ClubProfileQuery groupBySportsClub() Group by the sports_club column
 * @method     ClubProfileQuery groupBySeason() Group by the season column
 * @method     ClubProfileQuery groupByCfirst() Group by the cfirst column
 * @method     ClubProfileQuery groupByClast() Group by the clast column
 * @method     ClubProfileQuery groupByCphone() Group by the cphone column
 * @method     ClubProfileQuery groupByCemail() Group by the cemail column
 * @method     ClubProfileQuery groupByLeague() Group by the league column
 * @method     ClubProfileQuery groupByLeaguefees() Group by the leaguefees column
 * @method     ClubProfileQuery groupBySportsTravel() Group by the sports_travel column
 * @method     ClubProfileQuery groupBySportsexpenses() Group by the sportsexpenses column
 *
 * @method     ClubProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubProfile findOne(PropelPDO $con = null) Return the first ClubProfile matching the query
 * @method     ClubProfile findOneOrCreate(PropelPDO $con = null) Return the first ClubProfile matching the query, or a new ClubProfile object populated from the query conditions when no match is found
 *
 * @method     ClubProfile findOneById(int $id) Return the first ClubProfile filtered by the id column
 * @method     ClubProfile findOneByOrgId(int $org_id) Return the first ClubProfile filtered by the org_id column
 * @method     ClubProfile findOneByAcronym(string $acronym) Return the first ClubProfile filtered by the acronym column
 * @method     ClubProfile findOneByListname(string $listname) Return the first ClubProfile filtered by the listname column
 * @method     ClubProfile findOneByProject(int $project) Return the first ClubProfile filtered by the project column
 * @method     ClubProfile findOneByDateFormed(string $date_formed) Return the first ClubProfile filtered by the date_formed column
 * @method     ClubProfile findOneByDescription(string $description) Return the first ClubProfile filtered by the description column
 * @method     ClubProfile findOneByCategoryId(int $category_id) Return the first ClubProfile filtered by the category_id column
 * @method     ClubProfile findOneByClusterId(int $cluster_id) Return the first ClubProfile filtered by the cluster_id column
 * @method     ClubProfile findOneBySecondClusterId(int $second_cluster_id) Return the first ClubProfile filtered by the second_cluster_id column
 * @method     ClubProfile findOneByWebSite(string $web_site) Return the first ClubProfile filtered by the web_site column
 * @method     ClubProfile findOneByEmail(string $email) Return the first ClubProfile filtered by the email column
 * @method     ClubProfile findOneByConstitutionDate(string $constitution_date) Return the first ClubProfile filtered by the constitution_date column
 * @method     ClubProfile findOneByLastmodifiedCcl(string $lastmodified_ccl) Return the first ClubProfile filtered by the lastmodified_ccl column
 * @method     ClubProfile findOneByLastmodifiedClub(string $lastmodified_club) Return the first ClubProfile filtered by the lastmodified_club column
 * @method     ClubProfile findOneByInitialMeeting(int $initial_meeting) Return the first ClubProfile filtered by the initial_meeting column
 * @method     ClubProfile findOneByInactive(int $inactive) Return the first ClubProfile filtered by the inactive column
 * @method     ClubProfile findOneByRecognized(string $recognized) Return the first ClubProfile filtered by the recognized column
 * @method     ClubProfile findOneByShowWeb(int $show_web) Return the first ClubProfile filtered by the show_web column
 * @method     ClubProfile findOneByMeetingDay(string $meeting_day) Return the first ClubProfile filtered by the meeting_day column
 * @method     ClubProfile findOneByMeetingTime(string $meeting_time) Return the first ClubProfile filtered by the meeting_time column
 * @method     ClubProfile findOneByMeetingLoc(string $meeting_loc) Return the first ClubProfile filtered by the meeting_loc column
 * @method     ClubProfile findOneByMeetingFreq(string $meeting_freq) Return the first ClubProfile filtered by the meeting_freq column
 * @method     ClubProfile findOneByFinancialTier(string $financial_tier) Return the first ClubProfile filtered by the financial_tier column
 * @method     ClubProfile findOneByFinancialTierDate(string $financial_tier_date) Return the first ClubProfile filtered by the financial_tier_date column
 * @method     ClubProfile findOneByCrbExempt(boolean $crb_exempt) Return the first ClubProfile filtered by the crb_exempt column
 * @method     ClubProfile findOneBySportsClub(boolean $sports_club) Return the first ClubProfile filtered by the sports_club column
 * @method     ClubProfile findOneBySeason(string $season) Return the first ClubProfile filtered by the season column
 * @method     ClubProfile findOneByCfirst(string $cfirst) Return the first ClubProfile filtered by the cfirst column
 * @method     ClubProfile findOneByClast(string $clast) Return the first ClubProfile filtered by the clast column
 * @method     ClubProfile findOneByCphone(string $cphone) Return the first ClubProfile filtered by the cphone column
 * @method     ClubProfile findOneByCemail(string $cemail) Return the first ClubProfile filtered by the cemail column
 * @method     ClubProfile findOneByLeague(string $league) Return the first ClubProfile filtered by the league column
 * @method     ClubProfile findOneByLeaguefees(string $leaguefees) Return the first ClubProfile filtered by the leaguefees column
 * @method     ClubProfile findOneBySportsTravel(boolean $sports_travel) Return the first ClubProfile filtered by the sports_travel column
 * @method     ClubProfile findOneBySportsexpenses(string $sportsexpenses) Return the first ClubProfile filtered by the sportsexpenses column
 *
 * @method     array findById(int $id) Return ClubProfile objects filtered by the id column
 * @method     array findByOrgId(int $org_id) Return ClubProfile objects filtered by the org_id column
 * @method     array findByAcronym(string $acronym) Return ClubProfile objects filtered by the acronym column
 * @method     array findByListname(string $listname) Return ClubProfile objects filtered by the listname column
 * @method     array findByProject(int $project) Return ClubProfile objects filtered by the project column
 * @method     array findByDateFormed(string $date_formed) Return ClubProfile objects filtered by the date_formed column
 * @method     array findByDescription(string $description) Return ClubProfile objects filtered by the description column
 * @method     array findByCategoryId(int $category_id) Return ClubProfile objects filtered by the category_id column
 * @method     array findByClusterId(int $cluster_id) Return ClubProfile objects filtered by the cluster_id column
 * @method     array findBySecondClusterId(int $second_cluster_id) Return ClubProfile objects filtered by the second_cluster_id column
 * @method     array findByWebSite(string $web_site) Return ClubProfile objects filtered by the web_site column
 * @method     array findByEmail(string $email) Return ClubProfile objects filtered by the email column
 * @method     array findByConstitutionDate(string $constitution_date) Return ClubProfile objects filtered by the constitution_date column
 * @method     array findByLastmodifiedCcl(string $lastmodified_ccl) Return ClubProfile objects filtered by the lastmodified_ccl column
 * @method     array findByLastmodifiedClub(string $lastmodified_club) Return ClubProfile objects filtered by the lastmodified_club column
 * @method     array findByInitialMeeting(int $initial_meeting) Return ClubProfile objects filtered by the initial_meeting column
 * @method     array findByInactive(int $inactive) Return ClubProfile objects filtered by the inactive column
 * @method     array findByRecognized(string $recognized) Return ClubProfile objects filtered by the recognized column
 * @method     array findByShowWeb(int $show_web) Return ClubProfile objects filtered by the show_web column
 * @method     array findByMeetingDay(string $meeting_day) Return ClubProfile objects filtered by the meeting_day column
 * @method     array findByMeetingTime(string $meeting_time) Return ClubProfile objects filtered by the meeting_time column
 * @method     array findByMeetingLoc(string $meeting_loc) Return ClubProfile objects filtered by the meeting_loc column
 * @method     array findByMeetingFreq(string $meeting_freq) Return ClubProfile objects filtered by the meeting_freq column
 * @method     array findByFinancialTier(string $financial_tier) Return ClubProfile objects filtered by the financial_tier column
 * @method     array findByFinancialTierDate(string $financial_tier_date) Return ClubProfile objects filtered by the financial_tier_date column
 * @method     array findByCrbExempt(boolean $crb_exempt) Return ClubProfile objects filtered by the crb_exempt column
 * @method     array findBySportsClub(boolean $sports_club) Return ClubProfile objects filtered by the sports_club column
 * @method     array findBySeason(string $season) Return ClubProfile objects filtered by the season column
 * @method     array findByCfirst(string $cfirst) Return ClubProfile objects filtered by the cfirst column
 * @method     array findByClast(string $clast) Return ClubProfile objects filtered by the clast column
 * @method     array findByCphone(string $cphone) Return ClubProfile objects filtered by the cphone column
 * @method     array findByCemail(string $cemail) Return ClubProfile objects filtered by the cemail column
 * @method     array findByLeague(string $league) Return ClubProfile objects filtered by the league column
 * @method     array findByLeaguefees(string $leaguefees) Return ClubProfile objects filtered by the leaguefees column
 * @method     array findBySportsTravel(boolean $sports_travel) Return ClubProfile objects filtered by the sports_travel column
 * @method     array findBySportsexpenses(string $sportsexpenses) Return ClubProfile objects filtered by the sportsexpenses column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubProfileQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubProfileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubProfile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubProfileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubProfileQuery) {
			return $criteria;
		}
		$query = new ClubProfileQuery();
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
	 * @return    ClubProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubProfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubProfile A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ORG_ID`, `ACRONYM`, `LISTNAME`, `PROJECT`, `DATE_FORMED`, `DESCRIPTION`, `CATEGORY_ID`, `CLUSTER_ID`, `SECOND_CLUSTER_ID`, `WEB_SITE`, `EMAIL`, `CONSTITUTION_DATE`, `LASTMODIFIED_CCL`, `LASTMODIFIED_CLUB`, `INITIAL_MEETING`, `INACTIVE`, `RECOGNIZED`, `SHOW_WEB`, `MEETING_DAY`, `MEETING_TIME`, `MEETING_LOC`, `MEETING_FREQ`, `FINANCIAL_TIER`, `FINANCIAL_TIER_DATE`, `CRB_EXEMPT`, `SPORTS_CLUB`, `SEASON`, `CFIRST`, `CLAST`, `CPHONE`, `CEMAIL`, `LEAGUE`, `LEAGUEFEES`, `SPORTS_TRAVEL`, `SPORTSEXPENSES` FROM `club_profile` WHERE `ID` = :p0';
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
			$obj = new ClubProfile();
			$obj->hydrate($row);
			ClubProfilePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ClubProfile|array|mixed the result, formatted by the current formatter
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
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubProfilePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubProfilePeer::ID, $keys, Criteria::IN);
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
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(ClubProfilePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(ClubProfilePeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::ID, $id, $comparison);
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
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(ClubProfilePeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(ClubProfilePeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the acronym column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAcronym('fooValue');   // WHERE acronym = 'fooValue'
	 * $query->filterByAcronym('%fooValue%'); // WHERE acronym LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $acronym The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByAcronym($acronym = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($acronym)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $acronym)) {
				$acronym = str_replace('*', '%', $acronym);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::ACRONYM, $acronym, $comparison);
	}

	/**
	 * Filter the query on the listname column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByListname('fooValue');   // WHERE listname = 'fooValue'
	 * $query->filterByListname('%fooValue%'); // WHERE listname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $listname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByListname($listname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($listname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $listname)) {
				$listname = str_replace('*', '%', $listname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::LISTNAME, $listname, $comparison);
	}

	/**
	 * Filter the query on the project column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProject(1234); // WHERE project = 1234
	 * $query->filterByProject(array(12, 34)); // WHERE project IN (12, 34)
	 * $query->filterByProject(array('min' => 12)); // WHERE project > 12
	 * </code>
	 *
	 * @param     mixed $project The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByProject($project = null, $comparison = null)
	{
		if (is_array($project)) {
			$useMinMax = false;
			if (isset($project['min'])) {
				$this->addUsingAlias(ClubProfilePeer::PROJECT, $project['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($project['max'])) {
				$this->addUsingAlias(ClubProfilePeer::PROJECT, $project['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::PROJECT, $project, $comparison);
	}

	/**
	 * Filter the query on the date_formed column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateFormed('2011-03-14'); // WHERE date_formed = '2011-03-14'
	 * $query->filterByDateFormed('now'); // WHERE date_formed = '2011-03-14'
	 * $query->filterByDateFormed(array('max' => 'yesterday')); // WHERE date_formed > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dateFormed The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByDateFormed($dateFormed = null, $comparison = null)
	{
		if (is_array($dateFormed)) {
			$useMinMax = false;
			if (isset($dateFormed['min'])) {
				$this->addUsingAlias(ClubProfilePeer::DATE_FORMED, $dateFormed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateFormed['max'])) {
				$this->addUsingAlias(ClubProfilePeer::DATE_FORMED, $dateFormed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::DATE_FORMED, $dateFormed, $comparison);
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
	 * @return    ClubProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClubProfilePeer::DESCRIPTION, $description, $comparison);
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
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId)) {
			$useMinMax = false;
			if (isset($categoryId['min'])) {
				$this->addUsingAlias(ClubProfilePeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoryId['max'])) {
				$this->addUsingAlias(ClubProfilePeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the cluster_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClusterId(1234); // WHERE cluster_id = 1234
	 * $query->filterByClusterId(array(12, 34)); // WHERE cluster_id IN (12, 34)
	 * $query->filterByClusterId(array('min' => 12)); // WHERE cluster_id > 12
	 * </code>
	 *
	 * @param     mixed $clusterId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByClusterId($clusterId = null, $comparison = null)
	{
		if (is_array($clusterId)) {
			$useMinMax = false;
			if (isset($clusterId['min'])) {
				$this->addUsingAlias(ClubProfilePeer::CLUSTER_ID, $clusterId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clusterId['max'])) {
				$this->addUsingAlias(ClubProfilePeer::CLUSTER_ID, $clusterId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CLUSTER_ID, $clusterId, $comparison);
	}

	/**
	 * Filter the query on the second_cluster_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySecondClusterId(1234); // WHERE second_cluster_id = 1234
	 * $query->filterBySecondClusterId(array(12, 34)); // WHERE second_cluster_id IN (12, 34)
	 * $query->filterBySecondClusterId(array('min' => 12)); // WHERE second_cluster_id > 12
	 * </code>
	 *
	 * @param     mixed $secondClusterId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterBySecondClusterId($secondClusterId = null, $comparison = null)
	{
		if (is_array($secondClusterId)) {
			$useMinMax = false;
			if (isset($secondClusterId['min'])) {
				$this->addUsingAlias(ClubProfilePeer::SECOND_CLUSTER_ID, $secondClusterId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($secondClusterId['max'])) {
				$this->addUsingAlias(ClubProfilePeer::SECOND_CLUSTER_ID, $secondClusterId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::SECOND_CLUSTER_ID, $secondClusterId, $comparison);
	}

	/**
	 * Filter the query on the web_site column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWebSite('fooValue');   // WHERE web_site = 'fooValue'
	 * $query->filterByWebSite('%fooValue%'); // WHERE web_site LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $webSite The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByWebSite($webSite = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($webSite)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $webSite)) {
				$webSite = str_replace('*', '%', $webSite);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::WEB_SITE, $webSite, $comparison);
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
	 * @return    ClubProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClubProfilePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the constitution_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByConstitutionDate('2011-03-14'); // WHERE constitution_date = '2011-03-14'
	 * $query->filterByConstitutionDate('now'); // WHERE constitution_date = '2011-03-14'
	 * $query->filterByConstitutionDate(array('max' => 'yesterday')); // WHERE constitution_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $constitutionDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByConstitutionDate($constitutionDate = null, $comparison = null)
	{
		if (is_array($constitutionDate)) {
			$useMinMax = false;
			if (isset($constitutionDate['min'])) {
				$this->addUsingAlias(ClubProfilePeer::CONSTITUTION_DATE, $constitutionDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($constitutionDate['max'])) {
				$this->addUsingAlias(ClubProfilePeer::CONSTITUTION_DATE, $constitutionDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CONSTITUTION_DATE, $constitutionDate, $comparison);
	}

	/**
	 * Filter the query on the lastmodified_ccl column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastmodifiedCcl('2011-03-14'); // WHERE lastmodified_ccl = '2011-03-14'
	 * $query->filterByLastmodifiedCcl('now'); // WHERE lastmodified_ccl = '2011-03-14'
	 * $query->filterByLastmodifiedCcl(array('max' => 'yesterday')); // WHERE lastmodified_ccl > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $lastmodifiedCcl The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByLastmodifiedCcl($lastmodifiedCcl = null, $comparison = null)
	{
		if (is_array($lastmodifiedCcl)) {
			$useMinMax = false;
			if (isset($lastmodifiedCcl['min'])) {
				$this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CCL, $lastmodifiedCcl['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastmodifiedCcl['max'])) {
				$this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CCL, $lastmodifiedCcl['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CCL, $lastmodifiedCcl, $comparison);
	}

	/**
	 * Filter the query on the lastmodified_club column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastmodifiedClub('2011-03-14'); // WHERE lastmodified_club = '2011-03-14'
	 * $query->filterByLastmodifiedClub('now'); // WHERE lastmodified_club = '2011-03-14'
	 * $query->filterByLastmodifiedClub(array('max' => 'yesterday')); // WHERE lastmodified_club > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $lastmodifiedClub The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByLastmodifiedClub($lastmodifiedClub = null, $comparison = null)
	{
		if (is_array($lastmodifiedClub)) {
			$useMinMax = false;
			if (isset($lastmodifiedClub['min'])) {
				$this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CLUB, $lastmodifiedClub['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastmodifiedClub['max'])) {
				$this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CLUB, $lastmodifiedClub['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::LASTMODIFIED_CLUB, $lastmodifiedClub, $comparison);
	}

	/**
	 * Filter the query on the initial_meeting column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInitialMeeting(1234); // WHERE initial_meeting = 1234
	 * $query->filterByInitialMeeting(array(12, 34)); // WHERE initial_meeting IN (12, 34)
	 * $query->filterByInitialMeeting(array('min' => 12)); // WHERE initial_meeting > 12
	 * </code>
	 *
	 * @param     mixed $initialMeeting The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByInitialMeeting($initialMeeting = null, $comparison = null)
	{
		if (is_array($initialMeeting)) {
			$useMinMax = false;
			if (isset($initialMeeting['min'])) {
				$this->addUsingAlias(ClubProfilePeer::INITIAL_MEETING, $initialMeeting['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($initialMeeting['max'])) {
				$this->addUsingAlias(ClubProfilePeer::INITIAL_MEETING, $initialMeeting['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::INITIAL_MEETING, $initialMeeting, $comparison);
	}

	/**
	 * Filter the query on the inactive column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInactive(1234); // WHERE inactive = 1234
	 * $query->filterByInactive(array(12, 34)); // WHERE inactive IN (12, 34)
	 * $query->filterByInactive(array('min' => 12)); // WHERE inactive > 12
	 * </code>
	 *
	 * @param     mixed $inactive The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByInactive($inactive = null, $comparison = null)
	{
		if (is_array($inactive)) {
			$useMinMax = false;
			if (isset($inactive['min'])) {
				$this->addUsingAlias(ClubProfilePeer::INACTIVE, $inactive['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($inactive['max'])) {
				$this->addUsingAlias(ClubProfilePeer::INACTIVE, $inactive['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::INACTIVE, $inactive, $comparison);
	}

	/**
	 * Filter the query on the recognized column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRecognized('2011-03-14'); // WHERE recognized = '2011-03-14'
	 * $query->filterByRecognized('now'); // WHERE recognized = '2011-03-14'
	 * $query->filterByRecognized(array('max' => 'yesterday')); // WHERE recognized > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $recognized The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByRecognized($recognized = null, $comparison = null)
	{
		if (is_array($recognized)) {
			$useMinMax = false;
			if (isset($recognized['min'])) {
				$this->addUsingAlias(ClubProfilePeer::RECOGNIZED, $recognized['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($recognized['max'])) {
				$this->addUsingAlias(ClubProfilePeer::RECOGNIZED, $recognized['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::RECOGNIZED, $recognized, $comparison);
	}

	/**
	 * Filter the query on the show_web column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowWeb(1234); // WHERE show_web = 1234
	 * $query->filterByShowWeb(array(12, 34)); // WHERE show_web IN (12, 34)
	 * $query->filterByShowWeb(array('min' => 12)); // WHERE show_web > 12
	 * </code>
	 *
	 * @param     mixed $showWeb The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByShowWeb($showWeb = null, $comparison = null)
	{
		if (is_array($showWeb)) {
			$useMinMax = false;
			if (isset($showWeb['min'])) {
				$this->addUsingAlias(ClubProfilePeer::SHOW_WEB, $showWeb['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showWeb['max'])) {
				$this->addUsingAlias(ClubProfilePeer::SHOW_WEB, $showWeb['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::SHOW_WEB, $showWeb, $comparison);
	}

	/**
	 * Filter the query on the meeting_day column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingDay('fooValue');   // WHERE meeting_day = 'fooValue'
	 * $query->filterByMeetingDay('%fooValue%'); // WHERE meeting_day LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetingDay The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByMeetingDay($meetingDay = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetingDay)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetingDay)) {
				$meetingDay = str_replace('*', '%', $meetingDay);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::MEETING_DAY, $meetingDay, $comparison);
	}

	/**
	 * Filter the query on the meeting_time column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingTime('fooValue');   // WHERE meeting_time = 'fooValue'
	 * $query->filterByMeetingTime('%fooValue%'); // WHERE meeting_time LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetingTime The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByMeetingTime($meetingTime = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetingTime)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetingTime)) {
				$meetingTime = str_replace('*', '%', $meetingTime);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::MEETING_TIME, $meetingTime, $comparison);
	}

	/**
	 * Filter the query on the meeting_loc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingLoc('fooValue');   // WHERE meeting_loc = 'fooValue'
	 * $query->filterByMeetingLoc('%fooValue%'); // WHERE meeting_loc LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetingLoc The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByMeetingLoc($meetingLoc = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetingLoc)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetingLoc)) {
				$meetingLoc = str_replace('*', '%', $meetingLoc);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::MEETING_LOC, $meetingLoc, $comparison);
	}

	/**
	 * Filter the query on the meeting_freq column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetingFreq('fooValue');   // WHERE meeting_freq = 'fooValue'
	 * $query->filterByMeetingFreq('%fooValue%'); // WHERE meeting_freq LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetingFreq The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByMeetingFreq($meetingFreq = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetingFreq)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetingFreq)) {
				$meetingFreq = str_replace('*', '%', $meetingFreq);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::MEETING_FREQ, $meetingFreq, $comparison);
	}

	/**
	 * Filter the query on the financial_tier column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFinancialTier('fooValue');   // WHERE financial_tier = 'fooValue'
	 * $query->filterByFinancialTier('%fooValue%'); // WHERE financial_tier LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $financialTier The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByFinancialTier($financialTier = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($financialTier)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $financialTier)) {
				$financialTier = str_replace('*', '%', $financialTier);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::FINANCIAL_TIER, $financialTier, $comparison);
	}

	/**
	 * Filter the query on the financial_tier_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFinancialTierDate('2011-03-14'); // WHERE financial_tier_date = '2011-03-14'
	 * $query->filterByFinancialTierDate('now'); // WHERE financial_tier_date = '2011-03-14'
	 * $query->filterByFinancialTierDate(array('max' => 'yesterday')); // WHERE financial_tier_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $financialTierDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByFinancialTierDate($financialTierDate = null, $comparison = null)
	{
		if (is_array($financialTierDate)) {
			$useMinMax = false;
			if (isset($financialTierDate['min'])) {
				$this->addUsingAlias(ClubProfilePeer::FINANCIAL_TIER_DATE, $financialTierDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($financialTierDate['max'])) {
				$this->addUsingAlias(ClubProfilePeer::FINANCIAL_TIER_DATE, $financialTierDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::FINANCIAL_TIER_DATE, $financialTierDate, $comparison);
	}

	/**
	 * Filter the query on the crb_exempt column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCrbExempt(true); // WHERE crb_exempt = true
	 * $query->filterByCrbExempt('yes'); // WHERE crb_exempt = true
	 * </code>
	 *
	 * @param     boolean|string $crbExempt The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByCrbExempt($crbExempt = null, $comparison = null)
	{
		if (is_string($crbExempt)) {
			$crb_exempt = in_array(strtolower($crbExempt), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubProfilePeer::CRB_EXEMPT, $crbExempt, $comparison);
	}

	/**
	 * Filter the query on the sports_club column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySportsClub(true); // WHERE sports_club = true
	 * $query->filterBySportsClub('yes'); // WHERE sports_club = true
	 * </code>
	 *
	 * @param     boolean|string $sportsClub The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterBySportsClub($sportsClub = null, $comparison = null)
	{
		if (is_string($sportsClub)) {
			$sports_club = in_array(strtolower($sportsClub), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubProfilePeer::SPORTS_CLUB, $sportsClub, $comparison);
	}

	/**
	 * Filter the query on the season column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySeason('fooValue');   // WHERE season = 'fooValue'
	 * $query->filterBySeason('%fooValue%'); // WHERE season LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $season The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterBySeason($season = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($season)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $season)) {
				$season = str_replace('*', '%', $season);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::SEASON, $season, $comparison);
	}

	/**
	 * Filter the query on the cfirst column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCfirst('fooValue');   // WHERE cfirst = 'fooValue'
	 * $query->filterByCfirst('%fooValue%'); // WHERE cfirst LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cfirst The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByCfirst($cfirst = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cfirst)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cfirst)) {
				$cfirst = str_replace('*', '%', $cfirst);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CFIRST, $cfirst, $comparison);
	}

	/**
	 * Filter the query on the clast column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClast('fooValue');   // WHERE clast = 'fooValue'
	 * $query->filterByClast('%fooValue%'); // WHERE clast LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clast The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByClast($clast = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clast)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clast)) {
				$clast = str_replace('*', '%', $clast);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CLAST, $clast, $comparison);
	}

	/**
	 * Filter the query on the cphone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCphone('fooValue');   // WHERE cphone = 'fooValue'
	 * $query->filterByCphone('%fooValue%'); // WHERE cphone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cphone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByCphone($cphone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cphone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cphone)) {
				$cphone = str_replace('*', '%', $cphone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CPHONE, $cphone, $comparison);
	}

	/**
	 * Filter the query on the cemail column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCemail('fooValue');   // WHERE cemail = 'fooValue'
	 * $query->filterByCemail('%fooValue%'); // WHERE cemail LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cemail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByCemail($cemail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cemail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cemail)) {
				$cemail = str_replace('*', '%', $cemail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::CEMAIL, $cemail, $comparison);
	}

	/**
	 * Filter the query on the league column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLeague('fooValue');   // WHERE league = 'fooValue'
	 * $query->filterByLeague('%fooValue%'); // WHERE league LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $league The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByLeague($league = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($league)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $league)) {
				$league = str_replace('*', '%', $league);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::LEAGUE, $league, $comparison);
	}

	/**
	 * Filter the query on the leaguefees column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLeaguefees('fooValue');   // WHERE leaguefees = 'fooValue'
	 * $query->filterByLeaguefees('%fooValue%'); // WHERE leaguefees LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $leaguefees The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterByLeaguefees($leaguefees = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($leaguefees)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $leaguefees)) {
				$leaguefees = str_replace('*', '%', $leaguefees);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::LEAGUEFEES, $leaguefees, $comparison);
	}

	/**
	 * Filter the query on the sports_travel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySportsTravel(true); // WHERE sports_travel = true
	 * $query->filterBySportsTravel('yes'); // WHERE sports_travel = true
	 * </code>
	 *
	 * @param     boolean|string $sportsTravel The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterBySportsTravel($sportsTravel = null, $comparison = null)
	{
		if (is_string($sportsTravel)) {
			$sports_travel = in_array(strtolower($sportsTravel), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClubProfilePeer::SPORTS_TRAVEL, $sportsTravel, $comparison);
	}

	/**
	 * Filter the query on the sportsexpenses column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySportsexpenses('fooValue');   // WHERE sportsexpenses = 'fooValue'
	 * $query->filterBySportsexpenses('%fooValue%'); // WHERE sportsexpenses LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sportsexpenses The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function filterBySportsexpenses($sportsexpenses = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sportsexpenses)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sportsexpenses)) {
				$sportsexpenses = str_replace('*', '%', $sportsexpenses);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubProfilePeer::SPORTSEXPENSES, $sportsexpenses, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubProfile $clubProfile Object to remove from the list of results
	 *
	 * @return    ClubProfileQuery The current query, for fluid interface
	 */
	public function prune($clubProfile = null)
	{
		if ($clubProfile) {
			$this->addUsingAlias(ClubProfilePeer::ID, $clubProfile->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubProfileQuery
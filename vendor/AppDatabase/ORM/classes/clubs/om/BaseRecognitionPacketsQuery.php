<?php

namespace ClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use ClubsORM\RecognitionPackets;
use ClubsORM\RecognitionPacketsPeer;
use ClubsORM\RecognitionPacketsQuery;

/**
 * Base class that represents a query for the 'recognition_packets' table.
 *
 * 
 *
 * @method     RecognitionPacketsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RecognitionPacketsQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     RecognitionPacketsQuery orderByOrganizationId($order = Criteria::ASC) Order by the organization_id column
 * @method     RecognitionPacketsQuery orderByAdvisorListId($order = Criteria::ASC) Order by the advisor_list_id column
 * @method     RecognitionPacketsQuery orderByOfficerListId($order = Criteria::ASC) Order by the officer_list_id column
 * @method     RecognitionPacketsQuery orderByMemberListId($order = Criteria::ASC) Order by the member_list_id column
 * @method     RecognitionPacketsQuery orderByClubMeetingId($order = Criteria::ASC) Order by the club_meeting_id column
 * @method     RecognitionPacketsQuery orderByClubName($order = Criteria::ASC) Order by the club_name column
 * @method     RecognitionPacketsQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     RecognitionPacketsQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     RecognitionPacketsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     RecognitionPacketsQuery orderByAdvisorId($order = Criteria::ASC) Order by the advisor_id column
 * @method     RecognitionPacketsQuery orderByAdvisorOffice($order = Criteria::ASC) Order by the advisor_office column
 * @method     RecognitionPacketsQuery orderByAdvisorDepartment($order = Criteria::ASC) Order by the advisor_department column
 * @method     RecognitionPacketsQuery orderByTargetMembership($order = Criteria::ASC) Order by the target_membership column
 * @method     RecognitionPacketsQuery orderByNumMembers($order = Criteria::ASC) Order by the num_members column
 * @method     RecognitionPacketsQuery orderByFees($order = Criteria::ASC) Order by the fees column
 * @method     RecognitionPacketsQuery orderByExpectedCostsYear($order = Criteria::ASC) Order by the expected_costs_year column
 * @method     RecognitionPacketsQuery orderByExpectedCostsFuture($order = Criteria::ASC) Order by the expected_costs_future column
 * @method     RecognitionPacketsQuery orderByPromo($order = Criteria::ASC) Order by the promo column
 *
 * @method     RecognitionPacketsQuery groupById() Group by the id column
 * @method     RecognitionPacketsQuery groupByYear() Group by the year column
 * @method     RecognitionPacketsQuery groupByOrganizationId() Group by the organization_id column
 * @method     RecognitionPacketsQuery groupByAdvisorListId() Group by the advisor_list_id column
 * @method     RecognitionPacketsQuery groupByOfficerListId() Group by the officer_list_id column
 * @method     RecognitionPacketsQuery groupByMemberListId() Group by the member_list_id column
 * @method     RecognitionPacketsQuery groupByClubMeetingId() Group by the club_meeting_id column
 * @method     RecognitionPacketsQuery groupByClubName() Group by the club_name column
 * @method     RecognitionPacketsQuery groupByAcronym() Group by the acronym column
 * @method     RecognitionPacketsQuery groupByUrl() Group by the url column
 * @method     RecognitionPacketsQuery groupByEmail() Group by the email column
 * @method     RecognitionPacketsQuery groupByAdvisorId() Group by the advisor_id column
 * @method     RecognitionPacketsQuery groupByAdvisorOffice() Group by the advisor_office column
 * @method     RecognitionPacketsQuery groupByAdvisorDepartment() Group by the advisor_department column
 * @method     RecognitionPacketsQuery groupByTargetMembership() Group by the target_membership column
 * @method     RecognitionPacketsQuery groupByNumMembers() Group by the num_members column
 * @method     RecognitionPacketsQuery groupByFees() Group by the fees column
 * @method     RecognitionPacketsQuery groupByExpectedCostsYear() Group by the expected_costs_year column
 * @method     RecognitionPacketsQuery groupByExpectedCostsFuture() Group by the expected_costs_future column
 * @method     RecognitionPacketsQuery groupByPromo() Group by the promo column
 *
 * @method     RecognitionPacketsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RecognitionPacketsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RecognitionPacketsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RecognitionPackets findOne(PropelPDO $con = null) Return the first RecognitionPackets matching the query
 * @method     RecognitionPackets findOneOrCreate(PropelPDO $con = null) Return the first RecognitionPackets matching the query, or a new RecognitionPackets object populated from the query conditions when no match is found
 *
 * @method     RecognitionPackets findOneById(int $id) Return the first RecognitionPackets filtered by the id column
 * @method     RecognitionPackets findOneByYear(int $year) Return the first RecognitionPackets filtered by the year column
 * @method     RecognitionPackets findOneByOrganizationId(int $organization_id) Return the first RecognitionPackets filtered by the organization_id column
 * @method     RecognitionPackets findOneByAdvisorListId(int $advisor_list_id) Return the first RecognitionPackets filtered by the advisor_list_id column
 * @method     RecognitionPackets findOneByOfficerListId(int $officer_list_id) Return the first RecognitionPackets filtered by the officer_list_id column
 * @method     RecognitionPackets findOneByMemberListId(int $member_list_id) Return the first RecognitionPackets filtered by the member_list_id column
 * @method     RecognitionPackets findOneByClubMeetingId(int $club_meeting_id) Return the first RecognitionPackets filtered by the club_meeting_id column
 * @method     RecognitionPackets findOneByClubName(string $club_name) Return the first RecognitionPackets filtered by the club_name column
 * @method     RecognitionPackets findOneByAcronym(string $acronym) Return the first RecognitionPackets filtered by the acronym column
 * @method     RecognitionPackets findOneByUrl(string $url) Return the first RecognitionPackets filtered by the url column
 * @method     RecognitionPackets findOneByEmail(string $email) Return the first RecognitionPackets filtered by the email column
 * @method     RecognitionPackets findOneByAdvisorId(int $advisor_id) Return the first RecognitionPackets filtered by the advisor_id column
 * @method     RecognitionPackets findOneByAdvisorOffice(string $advisor_office) Return the first RecognitionPackets filtered by the advisor_office column
 * @method     RecognitionPackets findOneByAdvisorDepartment(string $advisor_department) Return the first RecognitionPackets filtered by the advisor_department column
 * @method     RecognitionPackets findOneByTargetMembership(string $target_membership) Return the first RecognitionPackets filtered by the target_membership column
 * @method     RecognitionPackets findOneByNumMembers(int $num_members) Return the first RecognitionPackets filtered by the num_members column
 * @method     RecognitionPackets findOneByFees(string $fees) Return the first RecognitionPackets filtered by the fees column
 * @method     RecognitionPackets findOneByExpectedCostsYear(string $expected_costs_year) Return the first RecognitionPackets filtered by the expected_costs_year column
 * @method     RecognitionPackets findOneByExpectedCostsFuture(string $expected_costs_future) Return the first RecognitionPackets filtered by the expected_costs_future column
 * @method     RecognitionPackets findOneByPromo(string $promo) Return the first RecognitionPackets filtered by the promo column
 *
 * @method     array findById(int $id) Return RecognitionPackets objects filtered by the id column
 * @method     array findByYear(int $year) Return RecognitionPackets objects filtered by the year column
 * @method     array findByOrganizationId(int $organization_id) Return RecognitionPackets objects filtered by the organization_id column
 * @method     array findByAdvisorListId(int $advisor_list_id) Return RecognitionPackets objects filtered by the advisor_list_id column
 * @method     array findByOfficerListId(int $officer_list_id) Return RecognitionPackets objects filtered by the officer_list_id column
 * @method     array findByMemberListId(int $member_list_id) Return RecognitionPackets objects filtered by the member_list_id column
 * @method     array findByClubMeetingId(int $club_meeting_id) Return RecognitionPackets objects filtered by the club_meeting_id column
 * @method     array findByClubName(string $club_name) Return RecognitionPackets objects filtered by the club_name column
 * @method     array findByAcronym(string $acronym) Return RecognitionPackets objects filtered by the acronym column
 * @method     array findByUrl(string $url) Return RecognitionPackets objects filtered by the url column
 * @method     array findByEmail(string $email) Return RecognitionPackets objects filtered by the email column
 * @method     array findByAdvisorId(int $advisor_id) Return RecognitionPackets objects filtered by the advisor_id column
 * @method     array findByAdvisorOffice(string $advisor_office) Return RecognitionPackets objects filtered by the advisor_office column
 * @method     array findByAdvisorDepartment(string $advisor_department) Return RecognitionPackets objects filtered by the advisor_department column
 * @method     array findByTargetMembership(string $target_membership) Return RecognitionPackets objects filtered by the target_membership column
 * @method     array findByNumMembers(int $num_members) Return RecognitionPackets objects filtered by the num_members column
 * @method     array findByFees(string $fees) Return RecognitionPackets objects filtered by the fees column
 * @method     array findByExpectedCostsYear(string $expected_costs_year) Return RecognitionPackets objects filtered by the expected_costs_year column
 * @method     array findByExpectedCostsFuture(string $expected_costs_future) Return RecognitionPackets objects filtered by the expected_costs_future column
 * @method     array findByPromo(string $promo) Return RecognitionPackets objects filtered by the promo column
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseRecognitionPacketsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRecognitionPacketsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'clubs', $modelName = 'ClubsORM\\RecognitionPackets', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RecognitionPacketsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RecognitionPacketsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RecognitionPacketsQuery) {
			return $criteria;
		}
		$query = new RecognitionPacketsQuery();
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
	 * @return    RecognitionPackets|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RecognitionPacketsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RecognitionPacketsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RecognitionPackets A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `YEAR`, `ORGANIZATION_ID`, `ADVISOR_LIST_ID`, `OFFICER_LIST_ID`, `MEMBER_LIST_ID`, `CLUB_MEETING_ID`, `CLUB_NAME`, `ACRONYM`, `URL`, `EMAIL`, `ADVISOR_ID`, `ADVISOR_OFFICE`, `ADVISOR_DEPARTMENT`, `TARGET_MEMBERSHIP`, `NUM_MEMBERS`, `FEES`, `EXPECTED_COSTS_YEAR`, `EXPECTED_COSTS_FUTURE`, `PROMO` FROM `recognition_packets` WHERE `ID` = :p0';
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
			$obj = new RecognitionPackets();
			$obj->hydrate($row);
			RecognitionPacketsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RecognitionPackets|array|mixed the result, formatted by the current formatter
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RecognitionPacketsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RecognitionPacketsPeer::ID, $keys, Criteria::IN);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id)) {
			$useMinMax = false;
			if (isset($id['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByYear(1234); // WHERE year = 1234
	 * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
	 * $query->filterByYear(array('min' => 12)); // WHERE year > 12
	 * </code>
	 *
	 * @param     mixed $year The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByYear($year = null, $comparison = null)
	{
		if (is_array($year)) {
			$useMinMax = false;
			if (isset($year['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($year['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::YEAR, $year, $comparison);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByOrganizationId($organizationId = null, $comparison = null)
	{
		if (is_array($organizationId)) {
			$useMinMax = false;
			if (isset($organizationId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ORGANIZATION_ID, $organizationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($organizationId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ORGANIZATION_ID, $organizationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ORGANIZATION_ID, $organizationId, $comparison);
	}

	/**
	 * Filter the query on the advisor_list_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorListId(1234); // WHERE advisor_list_id = 1234
	 * $query->filterByAdvisorListId(array(12, 34)); // WHERE advisor_list_id IN (12, 34)
	 * $query->filterByAdvisorListId(array('min' => 12)); // WHERE advisor_list_id > 12
	 * </code>
	 *
	 * @param     mixed $advisorListId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorListId($advisorListId = null, $comparison = null)
	{
		if (is_array($advisorListId)) {
			$useMinMax = false;
			if (isset($advisorListId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_LIST_ID, $advisorListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advisorListId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_LIST_ID, $advisorListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_LIST_ID, $advisorListId, $comparison);
	}

	/**
	 * Filter the query on the officer_list_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOfficerListId(1234); // WHERE officer_list_id = 1234
	 * $query->filterByOfficerListId(array(12, 34)); // WHERE officer_list_id IN (12, 34)
	 * $query->filterByOfficerListId(array('min' => 12)); // WHERE officer_list_id > 12
	 * </code>
	 *
	 * @param     mixed $officerListId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByOfficerListId($officerListId = null, $comparison = null)
	{
		if (is_array($officerListId)) {
			$useMinMax = false;
			if (isset($officerListId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::OFFICER_LIST_ID, $officerListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($officerListId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::OFFICER_LIST_ID, $officerListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::OFFICER_LIST_ID, $officerListId, $comparison);
	}

	/**
	 * Filter the query on the member_list_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMemberListId(1234); // WHERE member_list_id = 1234
	 * $query->filterByMemberListId(array(12, 34)); // WHERE member_list_id IN (12, 34)
	 * $query->filterByMemberListId(array('min' => 12)); // WHERE member_list_id > 12
	 * </code>
	 *
	 * @param     mixed $memberListId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByMemberListId($memberListId = null, $comparison = null)
	{
		if (is_array($memberListId)) {
			$useMinMax = false;
			if (isset($memberListId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::MEMBER_LIST_ID, $memberListId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($memberListId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::MEMBER_LIST_ID, $memberListId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::MEMBER_LIST_ID, $memberListId, $comparison);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByClubMeetingId($clubMeetingId = null, $comparison = null)
	{
		if (is_array($clubMeetingId)) {
			$useMinMax = false;
			if (isset($clubMeetingId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::CLUB_MEETING_ID, $clubMeetingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubMeetingId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::CLUB_MEETING_ID, $clubMeetingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::CLUB_MEETING_ID, $clubMeetingId, $comparison);
	}

	/**
	 * Filter the query on the club_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubName('fooValue');   // WHERE club_name = 'fooValue'
	 * $query->filterByClubName('%fooValue%'); // WHERE club_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clubName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByClubName($clubName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clubName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clubName)) {
				$clubName = str_replace('*', '%', $clubName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::CLUB_NAME, $clubName, $comparison);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionPacketsPeer::ACRONYM, $acronym, $comparison);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionPacketsPeer::URL, $url, $comparison);
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
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionPacketsPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the advisor_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorId(1234); // WHERE advisor_id = 1234
	 * $query->filterByAdvisorId(array(12, 34)); // WHERE advisor_id IN (12, 34)
	 * $query->filterByAdvisorId(array('min' => 12)); // WHERE advisor_id > 12
	 * </code>
	 *
	 * @param     mixed $advisorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorId($advisorId = null, $comparison = null)
	{
		if (is_array($advisorId)) {
			$useMinMax = false;
			if (isset($advisorId['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_ID, $advisorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advisorId['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_ID, $advisorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_ID, $advisorId, $comparison);
	}

	/**
	 * Filter the query on the advisor_office column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorOffice('fooValue');   // WHERE advisor_office = 'fooValue'
	 * $query->filterByAdvisorOffice('%fooValue%'); // WHERE advisor_office LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $advisorOffice The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorOffice($advisorOffice = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($advisorOffice)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $advisorOffice)) {
				$advisorOffice = str_replace('*', '%', $advisorOffice);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_OFFICE, $advisorOffice, $comparison);
	}

	/**
	 * Filter the query on the advisor_department column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvisorDepartment('fooValue');   // WHERE advisor_department = 'fooValue'
	 * $query->filterByAdvisorDepartment('%fooValue%'); // WHERE advisor_department LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $advisorDepartment The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByAdvisorDepartment($advisorDepartment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($advisorDepartment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $advisorDepartment)) {
				$advisorDepartment = str_replace('*', '%', $advisorDepartment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::ADVISOR_DEPARTMENT, $advisorDepartment, $comparison);
	}

	/**
	 * Filter the query on the target_membership column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetMembership('fooValue');   // WHERE target_membership = 'fooValue'
	 * $query->filterByTargetMembership('%fooValue%'); // WHERE target_membership LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $targetMembership The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByTargetMembership($targetMembership = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetMembership)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetMembership)) {
				$targetMembership = str_replace('*', '%', $targetMembership);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::TARGET_MEMBERSHIP, $targetMembership, $comparison);
	}

	/**
	 * Filter the query on the num_members column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumMembers(1234); // WHERE num_members = 1234
	 * $query->filterByNumMembers(array(12, 34)); // WHERE num_members IN (12, 34)
	 * $query->filterByNumMembers(array('min' => 12)); // WHERE num_members > 12
	 * </code>
	 *
	 * @param     mixed $numMembers The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByNumMembers($numMembers = null, $comparison = null)
	{
		if (is_array($numMembers)) {
			$useMinMax = false;
			if (isset($numMembers['min'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::NUM_MEMBERS, $numMembers['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numMembers['max'])) {
				$this->addUsingAlias(RecognitionPacketsPeer::NUM_MEMBERS, $numMembers['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::NUM_MEMBERS, $numMembers, $comparison);
	}

	/**
	 * Filter the query on the fees column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFees('fooValue');   // WHERE fees = 'fooValue'
	 * $query->filterByFees('%fooValue%'); // WHERE fees LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fees The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByFees($fees = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fees)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fees)) {
				$fees = str_replace('*', '%', $fees);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::FEES, $fees, $comparison);
	}

	/**
	 * Filter the query on the expected_costs_year column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExpectedCostsYear('fooValue');   // WHERE expected_costs_year = 'fooValue'
	 * $query->filterByExpectedCostsYear('%fooValue%'); // WHERE expected_costs_year LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $expectedCostsYear The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByExpectedCostsYear($expectedCostsYear = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($expectedCostsYear)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $expectedCostsYear)) {
				$expectedCostsYear = str_replace('*', '%', $expectedCostsYear);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::EXPECTED_COSTS_YEAR, $expectedCostsYear, $comparison);
	}

	/**
	 * Filter the query on the expected_costs_future column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExpectedCostsFuture('fooValue');   // WHERE expected_costs_future = 'fooValue'
	 * $query->filterByExpectedCostsFuture('%fooValue%'); // WHERE expected_costs_future LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $expectedCostsFuture The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByExpectedCostsFuture($expectedCostsFuture = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($expectedCostsFuture)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $expectedCostsFuture)) {
				$expectedCostsFuture = str_replace('*', '%', $expectedCostsFuture);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::EXPECTED_COSTS_FUTURE, $expectedCostsFuture, $comparison);
	}

	/**
	 * Filter the query on the promo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPromo('fooValue');   // WHERE promo = 'fooValue'
	 * $query->filterByPromo('%fooValue%'); // WHERE promo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $promo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function filterByPromo($promo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($promo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $promo)) {
				$promo = str_replace('*', '%', $promo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionPacketsPeer::PROMO, $promo, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RecognitionPackets $recognitionPackets Object to remove from the list of results
	 *
	 * @return    RecognitionPacketsQuery The current query, for fluid interface
	 */
	public function prune($recognitionPackets = null)
	{
		if ($recognitionPackets) {
			$this->addUsingAlias(RecognitionPacketsPeer::ID, $recognitionPackets->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRecognitionPacketsQuery
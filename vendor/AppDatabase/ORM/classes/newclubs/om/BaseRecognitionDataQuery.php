<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\RecognitionData;
use NewClubsORM\RecognitionDataPeer;
use NewClubsORM\RecognitionDataQuery;

/**
 * Base class that represents a query for the 'recognition_data' table.
 *
 * 
 *
 * @method     RecognitionDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RecognitionDataQuery orderByClubtype($order = Criteria::ASC) Order by the clubtype column
 * @method     RecognitionDataQuery orderByItf($order = Criteria::ASC) Order by the itf column
 * @method     RecognitionDataQuery orderByClubname($order = Criteria::ASC) Order by the clubname column
 * @method     RecognitionDataQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     RecognitionDataQuery orderBySportsClub($order = Criteria::ASC) Order by the sports_club column
 * @method     RecognitionDataQuery orderBySeason($order = Criteria::ASC) Order by the season column
 * @method     RecognitionDataQuery orderByCfirst($order = Criteria::ASC) Order by the cfirst column
 * @method     RecognitionDataQuery orderByClast($order = Criteria::ASC) Order by the clast column
 * @method     RecognitionDataQuery orderByCphone($order = Criteria::ASC) Order by the cphone column
 * @method     RecognitionDataQuery orderByCemail($order = Criteria::ASC) Order by the cemail column
 * @method     RecognitionDataQuery orderByLeague($order = Criteria::ASC) Order by the league column
 * @method     RecognitionDataQuery orderByLeaguefees($order = Criteria::ASC) Order by the leaguefees column
 * @method     RecognitionDataQuery orderBySportsTravel($order = Criteria::ASC) Order by the sports_travel column
 * @method     RecognitionDataQuery orderBySportsexpenses($order = Criteria::ASC) Order by the sportsexpenses column
 * @method     RecognitionDataQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     RecognitionDataQuery orderByGenEmail($order = Criteria::ASC) Order by the gen_email column
 * @method     RecognitionDataQuery orderBySubmitter($order = Criteria::ASC) Order by the submitter column
 * @method     RecognitionDataQuery orderBySPosition($order = Criteria::ASC) Order by the s_position column
 * @method     RecognitionDataQuery orderBySEmail($order = Criteria::ASC) Order by the s_email column
 * @method     RecognitionDataQuery orderByAFirst($order = Criteria::ASC) Order by the a_first column
 * @method     RecognitionDataQuery orderByALast($order = Criteria::ASC) Order by the a_last column
 * @method     RecognitionDataQuery orderByACphone($order = Criteria::ASC) Order by the a_cphone column
 * @method     RecognitionDataQuery orderByAHphone($order = Criteria::ASC) Order by the a_hphone column
 * @method     RecognitionDataQuery orderByAOffice($order = Criteria::ASC) Order by the a_office column
 * @method     RecognitionDataQuery orderByADept($order = Criteria::ASC) Order by the a_dept column
 * @method     RecognitionDataQuery orderByAEmail($order = Criteria::ASC) Order by the a_email column
 * @method     RecognitionDataQuery orderByTarget($order = Criteria::ASC) Order by the target column
 * @method     RecognitionDataQuery orderByMeetings($order = Criteria::ASC) Order by the meetings column
 * @method     RecognitionDataQuery orderByMembercount($order = Criteria::ASC) Order by the membercount column
 * @method     RecognitionDataQuery orderByFees($order = Criteria::ASC) Order by the fees column
 * @method     RecognitionDataQuery orderByElections($order = Criteria::ASC) Order by the elections column
 * @method     RecognitionDataQuery orderBySPhone($order = Criteria::ASC) Order by the s_phone column
 * @method     RecognitionDataQuery orderByPurpose($order = Criteria::ASC) Order by the purpose column
 * @method     RecognitionDataQuery orderBySignature($order = Criteria::ASC) Order by the signature column
 * @method     RecognitionDataQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     RecognitionDataQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     RecognitionDataQuery orderByPresident($order = Criteria::ASC) Order by the president column
 * @method     RecognitionDataQuery orderByVice($order = Criteria::ASC) Order by the vice column
 * @method     RecognitionDataQuery orderByTreasurer($order = Criteria::ASC) Order by the treasurer column
 * @method     RecognitionDataQuery orderBySecretary($order = Criteria::ASC) Order by the secretary column
 * @method     RecognitionDataQuery orderByBoard($order = Criteria::ASC) Order by the board column
 * @method     RecognitionDataQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     RecognitionDataQuery orderByFall($order = Criteria::ASC) Order by the fall column
 * @method     RecognitionDataQuery orderByWinter($order = Criteria::ASC) Order by the winter column
 * @method     RecognitionDataQuery orderBySpring($order = Criteria::ASC) Order by the spring column
 * @method     RecognitionDataQuery orderBySummer($order = Criteria::ASC) Order by the summer column
 * @method     RecognitionDataQuery orderByOpenHouse($order = Criteria::ASC) Order by the open_house column
 * @method     RecognitionDataQuery orderByPromo($order = Criteria::ASC) Order by the promo column
 * @method     RecognitionDataQuery orderBySigPres($order = Criteria::ASC) Order by the sig_pres column
 * @method     RecognitionDataQuery orderBySigAdv($order = Criteria::ASC) Order by the sig_adv column
 * @method     RecognitionDataQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     RecognitionDataQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     RecognitionDataQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     RecognitionDataQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     RecognitionDataQuery groupById() Group by the id column
 * @method     RecognitionDataQuery groupByClubtype() Group by the clubtype column
 * @method     RecognitionDataQuery groupByItf() Group by the itf column
 * @method     RecognitionDataQuery groupByClubname() Group by the clubname column
 * @method     RecognitionDataQuery groupByAcronym() Group by the acronym column
 * @method     RecognitionDataQuery groupBySportsClub() Group by the sports_club column
 * @method     RecognitionDataQuery groupBySeason() Group by the season column
 * @method     RecognitionDataQuery groupByCfirst() Group by the cfirst column
 * @method     RecognitionDataQuery groupByClast() Group by the clast column
 * @method     RecognitionDataQuery groupByCphone() Group by the cphone column
 * @method     RecognitionDataQuery groupByCemail() Group by the cemail column
 * @method     RecognitionDataQuery groupByLeague() Group by the league column
 * @method     RecognitionDataQuery groupByLeaguefees() Group by the leaguefees column
 * @method     RecognitionDataQuery groupBySportsTravel() Group by the sports_travel column
 * @method     RecognitionDataQuery groupBySportsexpenses() Group by the sportsexpenses column
 * @method     RecognitionDataQuery groupByUrl() Group by the url column
 * @method     RecognitionDataQuery groupByGenEmail() Group by the gen_email column
 * @method     RecognitionDataQuery groupBySubmitter() Group by the submitter column
 * @method     RecognitionDataQuery groupBySPosition() Group by the s_position column
 * @method     RecognitionDataQuery groupBySEmail() Group by the s_email column
 * @method     RecognitionDataQuery groupByAFirst() Group by the a_first column
 * @method     RecognitionDataQuery groupByALast() Group by the a_last column
 * @method     RecognitionDataQuery groupByACphone() Group by the a_cphone column
 * @method     RecognitionDataQuery groupByAHphone() Group by the a_hphone column
 * @method     RecognitionDataQuery groupByAOffice() Group by the a_office column
 * @method     RecognitionDataQuery groupByADept() Group by the a_dept column
 * @method     RecognitionDataQuery groupByAEmail() Group by the a_email column
 * @method     RecognitionDataQuery groupByTarget() Group by the target column
 * @method     RecognitionDataQuery groupByMeetings() Group by the meetings column
 * @method     RecognitionDataQuery groupByMembercount() Group by the membercount column
 * @method     RecognitionDataQuery groupByFees() Group by the fees column
 * @method     RecognitionDataQuery groupByElections() Group by the elections column
 * @method     RecognitionDataQuery groupBySPhone() Group by the s_phone column
 * @method     RecognitionDataQuery groupByPurpose() Group by the purpose column
 * @method     RecognitionDataQuery groupBySignature() Group by the signature column
 * @method     RecognitionDataQuery groupByOrgId() Group by the org_id column
 * @method     RecognitionDataQuery groupByReportId() Group by the report_id column
 * @method     RecognitionDataQuery groupByPresident() Group by the president column
 * @method     RecognitionDataQuery groupByVice() Group by the vice column
 * @method     RecognitionDataQuery groupByTreasurer() Group by the treasurer column
 * @method     RecognitionDataQuery groupBySecretary() Group by the secretary column
 * @method     RecognitionDataQuery groupByBoard() Group by the board column
 * @method     RecognitionDataQuery groupByMembers() Group by the members column
 * @method     RecognitionDataQuery groupByFall() Group by the fall column
 * @method     RecognitionDataQuery groupByWinter() Group by the winter column
 * @method     RecognitionDataQuery groupBySpring() Group by the spring column
 * @method     RecognitionDataQuery groupBySummer() Group by the summer column
 * @method     RecognitionDataQuery groupByOpenHouse() Group by the open_house column
 * @method     RecognitionDataQuery groupByPromo() Group by the promo column
 * @method     RecognitionDataQuery groupBySigPres() Group by the sig_pres column
 * @method     RecognitionDataQuery groupBySigAdv() Group by the sig_adv column
 * @method     RecognitionDataQuery groupByReason() Group by the reason column
 * @method     RecognitionDataQuery groupByStatus() Group by the status column
 * @method     RecognitionDataQuery groupByLastUpdated() Group by the last_updated column
 * @method     RecognitionDataQuery groupByDate() Group by the date column
 *
 * @method     RecognitionDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RecognitionDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RecognitionDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RecognitionData findOne(PropelPDO $con = null) Return the first RecognitionData matching the query
 * @method     RecognitionData findOneOrCreate(PropelPDO $con = null) Return the first RecognitionData matching the query, or a new RecognitionData object populated from the query conditions when no match is found
 *
 * @method     RecognitionData findOneById(int $id) Return the first RecognitionData filtered by the id column
 * @method     RecognitionData findOneByClubtype(string $clubtype) Return the first RecognitionData filtered by the clubtype column
 * @method     RecognitionData findOneByItf(string $itf) Return the first RecognitionData filtered by the itf column
 * @method     RecognitionData findOneByClubname(string $clubname) Return the first RecognitionData filtered by the clubname column
 * @method     RecognitionData findOneByAcronym(string $acronym) Return the first RecognitionData filtered by the acronym column
 * @method     RecognitionData findOneBySportsClub(boolean $sports_club) Return the first RecognitionData filtered by the sports_club column
 * @method     RecognitionData findOneBySeason(string $season) Return the first RecognitionData filtered by the season column
 * @method     RecognitionData findOneByCfirst(string $cfirst) Return the first RecognitionData filtered by the cfirst column
 * @method     RecognitionData findOneByClast(string $clast) Return the first RecognitionData filtered by the clast column
 * @method     RecognitionData findOneByCphone(string $cphone) Return the first RecognitionData filtered by the cphone column
 * @method     RecognitionData findOneByCemail(string $cemail) Return the first RecognitionData filtered by the cemail column
 * @method     RecognitionData findOneByLeague(string $league) Return the first RecognitionData filtered by the league column
 * @method     RecognitionData findOneByLeaguefees(string $leaguefees) Return the first RecognitionData filtered by the leaguefees column
 * @method     RecognitionData findOneBySportsTravel(boolean $sports_travel) Return the first RecognitionData filtered by the sports_travel column
 * @method     RecognitionData findOneBySportsexpenses(string $sportsexpenses) Return the first RecognitionData filtered by the sportsexpenses column
 * @method     RecognitionData findOneByUrl(string $url) Return the first RecognitionData filtered by the url column
 * @method     RecognitionData findOneByGenEmail(string $gen_email) Return the first RecognitionData filtered by the gen_email column
 * @method     RecognitionData findOneBySubmitter(string $submitter) Return the first RecognitionData filtered by the submitter column
 * @method     RecognitionData findOneBySPosition(string $s_position) Return the first RecognitionData filtered by the s_position column
 * @method     RecognitionData findOneBySEmail(string $s_email) Return the first RecognitionData filtered by the s_email column
 * @method     RecognitionData findOneByAFirst(string $a_first) Return the first RecognitionData filtered by the a_first column
 * @method     RecognitionData findOneByALast(string $a_last) Return the first RecognitionData filtered by the a_last column
 * @method     RecognitionData findOneByACphone(string $a_cphone) Return the first RecognitionData filtered by the a_cphone column
 * @method     RecognitionData findOneByAHphone(string $a_hphone) Return the first RecognitionData filtered by the a_hphone column
 * @method     RecognitionData findOneByAOffice(string $a_office) Return the first RecognitionData filtered by the a_office column
 * @method     RecognitionData findOneByADept(string $a_dept) Return the first RecognitionData filtered by the a_dept column
 * @method     RecognitionData findOneByAEmail(string $a_email) Return the first RecognitionData filtered by the a_email column
 * @method     RecognitionData findOneByTarget(string $target) Return the first RecognitionData filtered by the target column
 * @method     RecognitionData findOneByMeetings(string $meetings) Return the first RecognitionData filtered by the meetings column
 * @method     RecognitionData findOneByMembercount(string $membercount) Return the first RecognitionData filtered by the membercount column
 * @method     RecognitionData findOneByFees(string $fees) Return the first RecognitionData filtered by the fees column
 * @method     RecognitionData findOneByElections(string $elections) Return the first RecognitionData filtered by the elections column
 * @method     RecognitionData findOneBySPhone(string $s_phone) Return the first RecognitionData filtered by the s_phone column
 * @method     RecognitionData findOneByPurpose(string $purpose) Return the first RecognitionData filtered by the purpose column
 * @method     RecognitionData findOneBySignature(string $signature) Return the first RecognitionData filtered by the signature column
 * @method     RecognitionData findOneByOrgId(int $org_id) Return the first RecognitionData filtered by the org_id column
 * @method     RecognitionData findOneByReportId(int $report_id) Return the first RecognitionData filtered by the report_id column
 * @method     RecognitionData findOneByPresident(string $president) Return the first RecognitionData filtered by the president column
 * @method     RecognitionData findOneByVice(string $vice) Return the first RecognitionData filtered by the vice column
 * @method     RecognitionData findOneByTreasurer(string $treasurer) Return the first RecognitionData filtered by the treasurer column
 * @method     RecognitionData findOneBySecretary(string $secretary) Return the first RecognitionData filtered by the secretary column
 * @method     RecognitionData findOneByBoard(string $board) Return the first RecognitionData filtered by the board column
 * @method     RecognitionData findOneByMembers(string $members) Return the first RecognitionData filtered by the members column
 * @method     RecognitionData findOneByFall(string $fall) Return the first RecognitionData filtered by the fall column
 * @method     RecognitionData findOneByWinter(string $winter) Return the first RecognitionData filtered by the winter column
 * @method     RecognitionData findOneBySpring(string $spring) Return the first RecognitionData filtered by the spring column
 * @method     RecognitionData findOneBySummer(string $summer) Return the first RecognitionData filtered by the summer column
 * @method     RecognitionData findOneByOpenHouse(string $open_house) Return the first RecognitionData filtered by the open_house column
 * @method     RecognitionData findOneByPromo(string $promo) Return the first RecognitionData filtered by the promo column
 * @method     RecognitionData findOneBySigPres(string $sig_pres) Return the first RecognitionData filtered by the sig_pres column
 * @method     RecognitionData findOneBySigAdv(string $sig_adv) Return the first RecognitionData filtered by the sig_adv column
 * @method     RecognitionData findOneByReason(string $reason) Return the first RecognitionData filtered by the reason column
 * @method     RecognitionData findOneByStatus(string $status) Return the first RecognitionData filtered by the status column
 * @method     RecognitionData findOneByLastUpdated(string $last_updated) Return the first RecognitionData filtered by the last_updated column
 * @method     RecognitionData findOneByDate(string $date) Return the first RecognitionData filtered by the date column
 *
 * @method     array findById(int $id) Return RecognitionData objects filtered by the id column
 * @method     array findByClubtype(string $clubtype) Return RecognitionData objects filtered by the clubtype column
 * @method     array findByItf(string $itf) Return RecognitionData objects filtered by the itf column
 * @method     array findByClubname(string $clubname) Return RecognitionData objects filtered by the clubname column
 * @method     array findByAcronym(string $acronym) Return RecognitionData objects filtered by the acronym column
 * @method     array findBySportsClub(boolean $sports_club) Return RecognitionData objects filtered by the sports_club column
 * @method     array findBySeason(string $season) Return RecognitionData objects filtered by the season column
 * @method     array findByCfirst(string $cfirst) Return RecognitionData objects filtered by the cfirst column
 * @method     array findByClast(string $clast) Return RecognitionData objects filtered by the clast column
 * @method     array findByCphone(string $cphone) Return RecognitionData objects filtered by the cphone column
 * @method     array findByCemail(string $cemail) Return RecognitionData objects filtered by the cemail column
 * @method     array findByLeague(string $league) Return RecognitionData objects filtered by the league column
 * @method     array findByLeaguefees(string $leaguefees) Return RecognitionData objects filtered by the leaguefees column
 * @method     array findBySportsTravel(boolean $sports_travel) Return RecognitionData objects filtered by the sports_travel column
 * @method     array findBySportsexpenses(string $sportsexpenses) Return RecognitionData objects filtered by the sportsexpenses column
 * @method     array findByUrl(string $url) Return RecognitionData objects filtered by the url column
 * @method     array findByGenEmail(string $gen_email) Return RecognitionData objects filtered by the gen_email column
 * @method     array findBySubmitter(string $submitter) Return RecognitionData objects filtered by the submitter column
 * @method     array findBySPosition(string $s_position) Return RecognitionData objects filtered by the s_position column
 * @method     array findBySEmail(string $s_email) Return RecognitionData objects filtered by the s_email column
 * @method     array findByAFirst(string $a_first) Return RecognitionData objects filtered by the a_first column
 * @method     array findByALast(string $a_last) Return RecognitionData objects filtered by the a_last column
 * @method     array findByACphone(string $a_cphone) Return RecognitionData objects filtered by the a_cphone column
 * @method     array findByAHphone(string $a_hphone) Return RecognitionData objects filtered by the a_hphone column
 * @method     array findByAOffice(string $a_office) Return RecognitionData objects filtered by the a_office column
 * @method     array findByADept(string $a_dept) Return RecognitionData objects filtered by the a_dept column
 * @method     array findByAEmail(string $a_email) Return RecognitionData objects filtered by the a_email column
 * @method     array findByTarget(string $target) Return RecognitionData objects filtered by the target column
 * @method     array findByMeetings(string $meetings) Return RecognitionData objects filtered by the meetings column
 * @method     array findByMembercount(string $membercount) Return RecognitionData objects filtered by the membercount column
 * @method     array findByFees(string $fees) Return RecognitionData objects filtered by the fees column
 * @method     array findByElections(string $elections) Return RecognitionData objects filtered by the elections column
 * @method     array findBySPhone(string $s_phone) Return RecognitionData objects filtered by the s_phone column
 * @method     array findByPurpose(string $purpose) Return RecognitionData objects filtered by the purpose column
 * @method     array findBySignature(string $signature) Return RecognitionData objects filtered by the signature column
 * @method     array findByOrgId(int $org_id) Return RecognitionData objects filtered by the org_id column
 * @method     array findByReportId(int $report_id) Return RecognitionData objects filtered by the report_id column
 * @method     array findByPresident(string $president) Return RecognitionData objects filtered by the president column
 * @method     array findByVice(string $vice) Return RecognitionData objects filtered by the vice column
 * @method     array findByTreasurer(string $treasurer) Return RecognitionData objects filtered by the treasurer column
 * @method     array findBySecretary(string $secretary) Return RecognitionData objects filtered by the secretary column
 * @method     array findByBoard(string $board) Return RecognitionData objects filtered by the board column
 * @method     array findByMembers(string $members) Return RecognitionData objects filtered by the members column
 * @method     array findByFall(string $fall) Return RecognitionData objects filtered by the fall column
 * @method     array findByWinter(string $winter) Return RecognitionData objects filtered by the winter column
 * @method     array findBySpring(string $spring) Return RecognitionData objects filtered by the spring column
 * @method     array findBySummer(string $summer) Return RecognitionData objects filtered by the summer column
 * @method     array findByOpenHouse(string $open_house) Return RecognitionData objects filtered by the open_house column
 * @method     array findByPromo(string $promo) Return RecognitionData objects filtered by the promo column
 * @method     array findBySigPres(string $sig_pres) Return RecognitionData objects filtered by the sig_pres column
 * @method     array findBySigAdv(string $sig_adv) Return RecognitionData objects filtered by the sig_adv column
 * @method     array findByReason(string $reason) Return RecognitionData objects filtered by the reason column
 * @method     array findByStatus(string $status) Return RecognitionData objects filtered by the status column
 * @method     array findByLastUpdated(string $last_updated) Return RecognitionData objects filtered by the last_updated column
 * @method     array findByDate(string $date) Return RecognitionData objects filtered by the date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionDataQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRecognitionDataQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\RecognitionData', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RecognitionDataQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RecognitionDataQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RecognitionDataQuery) {
			return $criteria;
		}
		$query = new RecognitionDataQuery();
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
	 * @return    RecognitionData|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RecognitionDataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RecognitionData A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLUBTYPE`, `ITF`, `CLUBNAME`, `ACRONYM`, `SPORTS_CLUB`, `SEASON`, `CFIRST`, `CLAST`, `CPHONE`, `CEMAIL`, `LEAGUE`, `LEAGUEFEES`, `SPORTS_TRAVEL`, `SPORTSEXPENSES`, `URL`, `GEN_EMAIL`, `SUBMITTER`, `S_POSITION`, `S_EMAIL`, `A_FIRST`, `A_LAST`, `A_CPHONE`, `A_HPHONE`, `A_OFFICE`, `A_DEPT`, `A_EMAIL`, `TARGET`, `MEETINGS`, `MEMBERCOUNT`, `FEES`, `ELECTIONS`, `S_PHONE`, `PURPOSE`, `SIGNATURE`, `ORG_ID`, `REPORT_ID`, `PRESIDENT`, `VICE`, `TREASURER`, `SECRETARY`, `BOARD`, `MEMBERS`, `FALL`, `WINTER`, `SPRING`, `SUMMER`, `OPEN_HOUSE`, `PROMO`, `SIG_PRES`, `SIG_ADV`, `REASON`, `STATUS`, `LAST_UPDATED`, `DATE` FROM `recognition_data` WHERE `ID` = :p0';
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
			$obj = new RecognitionData();
			$obj->hydrate($row);
			RecognitionDataPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RecognitionData|array|mixed the result, formatted by the current formatter
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RecognitionDataPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RecognitionDataPeer::ID, $keys, Criteria::IN);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RecognitionDataPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the clubtype column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubtype('fooValue');   // WHERE clubtype = 'fooValue'
	 * $query->filterByClubtype('%fooValue%'); // WHERE clubtype LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clubtype The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByClubtype($clubtype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clubtype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clubtype)) {
				$clubtype = str_replace('*', '%', $clubtype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::CLUBTYPE, $clubtype, $comparison);
	}

	/**
	 * Filter the query on the itf column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByItf('fooValue');   // WHERE itf = 'fooValue'
	 * $query->filterByItf('%fooValue%'); // WHERE itf LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $itf The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByItf($itf = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($itf)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $itf)) {
				$itf = str_replace('*', '%', $itf);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::ITF, $itf, $comparison);
	}

	/**
	 * Filter the query on the clubname column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubname('fooValue');   // WHERE clubname = 'fooValue'
	 * $query->filterByClubname('%fooValue%'); // WHERE clubname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $clubname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByClubname($clubname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($clubname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $clubname)) {
				$clubname = str_replace('*', '%', $clubname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::CLUBNAME, $clubname, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::ACRONYM, $acronym, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySportsClub($sportsClub = null, $comparison = null)
	{
		if (is_string($sportsClub)) {
			$sports_club = in_array(strtolower($sportsClub), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(RecognitionDataPeer::SPORTS_CLUB, $sportsClub, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::SEASON, $season, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::CFIRST, $cfirst, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::CLAST, $clast, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::CPHONE, $cphone, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::CEMAIL, $cemail, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::LEAGUE, $league, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::LEAGUEFEES, $leaguefees, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySportsTravel($sportsTravel = null, $comparison = null)
	{
		if (is_string($sportsTravel)) {
			$sports_travel = in_array(strtolower($sportsTravel), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(RecognitionDataPeer::SPORTS_TRAVEL, $sportsTravel, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::SPORTSEXPENSES, $sportsexpenses, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the gen_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGenEmail('fooValue');   // WHERE gen_email = 'fooValue'
	 * $query->filterByGenEmail('%fooValue%'); // WHERE gen_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $genEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByGenEmail($genEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($genEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $genEmail)) {
				$genEmail = str_replace('*', '%', $genEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::GEN_EMAIL, $genEmail, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::SUBMITTER, $submitter, $comparison);
	}

	/**
	 * Filter the query on the s_position column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySPosition('fooValue');   // WHERE s_position = 'fooValue'
	 * $query->filterBySPosition('%fooValue%'); // WHERE s_position LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sPosition The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySPosition($sPosition = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sPosition)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sPosition)) {
				$sPosition = str_replace('*', '%', $sPosition);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::S_POSITION, $sPosition, $comparison);
	}

	/**
	 * Filter the query on the s_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySEmail('fooValue');   // WHERE s_email = 'fooValue'
	 * $query->filterBySEmail('%fooValue%'); // WHERE s_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySEmail($sEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sEmail)) {
				$sEmail = str_replace('*', '%', $sEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::S_EMAIL, $sEmail, $comparison);
	}

	/**
	 * Filter the query on the a_first column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAFirst('fooValue');   // WHERE a_first = 'fooValue'
	 * $query->filterByAFirst('%fooValue%'); // WHERE a_first LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aFirst The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByAFirst($aFirst = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aFirst)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aFirst)) {
				$aFirst = str_replace('*', '%', $aFirst);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_FIRST, $aFirst, $comparison);
	}

	/**
	 * Filter the query on the a_last column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByALast('fooValue');   // WHERE a_last = 'fooValue'
	 * $query->filterByALast('%fooValue%'); // WHERE a_last LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aLast The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByALast($aLast = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aLast)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aLast)) {
				$aLast = str_replace('*', '%', $aLast);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_LAST, $aLast, $comparison);
	}

	/**
	 * Filter the query on the a_cphone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByACphone('fooValue');   // WHERE a_cphone = 'fooValue'
	 * $query->filterByACphone('%fooValue%'); // WHERE a_cphone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aCphone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByACphone($aCphone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aCphone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aCphone)) {
				$aCphone = str_replace('*', '%', $aCphone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_CPHONE, $aCphone, $comparison);
	}

	/**
	 * Filter the query on the a_hphone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAHphone('fooValue');   // WHERE a_hphone = 'fooValue'
	 * $query->filterByAHphone('%fooValue%'); // WHERE a_hphone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aHphone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByAHphone($aHphone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aHphone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aHphone)) {
				$aHphone = str_replace('*', '%', $aHphone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_HPHONE, $aHphone, $comparison);
	}

	/**
	 * Filter the query on the a_office column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAOffice('fooValue');   // WHERE a_office = 'fooValue'
	 * $query->filterByAOffice('%fooValue%'); // WHERE a_office LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aOffice The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByAOffice($aOffice = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aOffice)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aOffice)) {
				$aOffice = str_replace('*', '%', $aOffice);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_OFFICE, $aOffice, $comparison);
	}

	/**
	 * Filter the query on the a_dept column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByADept('fooValue');   // WHERE a_dept = 'fooValue'
	 * $query->filterByADept('%fooValue%'); // WHERE a_dept LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aDept The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByADept($aDept = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aDept)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aDept)) {
				$aDept = str_replace('*', '%', $aDept);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_DEPT, $aDept, $comparison);
	}

	/**
	 * Filter the query on the a_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAEmail('fooValue');   // WHERE a_email = 'fooValue'
	 * $query->filterByAEmail('%fooValue%'); // WHERE a_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByAEmail($aEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aEmail)) {
				$aEmail = str_replace('*', '%', $aEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::A_EMAIL, $aEmail, $comparison);
	}

	/**
	 * Filter the query on the target column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTarget('fooValue');   // WHERE target = 'fooValue'
	 * $query->filterByTarget('%fooValue%'); // WHERE target LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $target The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByTarget($target = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($target)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $target)) {
				$target = str_replace('*', '%', $target);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::TARGET, $target, $comparison);
	}

	/**
	 * Filter the query on the meetings column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMeetings('fooValue');   // WHERE meetings = 'fooValue'
	 * $query->filterByMeetings('%fooValue%'); // WHERE meetings LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $meetings The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByMeetings($meetings = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($meetings)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $meetings)) {
				$meetings = str_replace('*', '%', $meetings);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::MEETINGS, $meetings, $comparison);
	}

	/**
	 * Filter the query on the membercount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembercount('fooValue');   // WHERE membercount = 'fooValue'
	 * $query->filterByMembercount('%fooValue%'); // WHERE membercount LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $membercount The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByMembercount($membercount = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($membercount)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $membercount)) {
				$membercount = str_replace('*', '%', $membercount);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::MEMBERCOUNT, $membercount, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::FEES, $fees, $comparison);
	}

	/**
	 * Filter the query on the elections column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByElections('fooValue');   // WHERE elections = 'fooValue'
	 * $query->filterByElections('%fooValue%'); // WHERE elections LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $elections The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByElections($elections = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($elections)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $elections)) {
				$elections = str_replace('*', '%', $elections);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::ELECTIONS, $elections, $comparison);
	}

	/**
	 * Filter the query on the s_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySPhone('fooValue');   // WHERE s_phone = 'fooValue'
	 * $query->filterBySPhone('%fooValue%'); // WHERE s_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySPhone($sPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sPhone)) {
				$sPhone = str_replace('*', '%', $sPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::S_PHONE, $sPhone, $comparison);
	}

	/**
	 * Filter the query on the purpose column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurpose('fooValue');   // WHERE purpose = 'fooValue'
	 * $query->filterByPurpose('%fooValue%'); // WHERE purpose LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $purpose The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByPurpose($purpose = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($purpose)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $purpose)) {
				$purpose = str_replace('*', '%', $purpose);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::PURPOSE, $purpose, $comparison);
	}

	/**
	 * Filter the query on the signature column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySignature('fooValue');   // WHERE signature = 'fooValue'
	 * $query->filterBySignature('%fooValue%'); // WHERE signature LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $signature The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySignature($signature = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($signature)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $signature)) {
				$signature = str_replace('*', '%', $signature);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SIGNATURE, $signature, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(RecognitionDataPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(RecognitionDataPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::ORG_ID, $orgId, $comparison);
	}

	/**
	 * Filter the query on the report_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReportId(1234); // WHERE report_id = 1234
	 * $query->filterByReportId(array(12, 34)); // WHERE report_id IN (12, 34)
	 * $query->filterByReportId(array('min' => 12)); // WHERE report_id > 12
	 * </code>
	 *
	 * @param     mixed $reportId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId)) {
			$useMinMax = false;
			if (isset($reportId['min'])) {
				$this->addUsingAlias(RecognitionDataPeer::REPORT_ID, $reportId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($reportId['max'])) {
				$this->addUsingAlias(RecognitionDataPeer::REPORT_ID, $reportId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::REPORT_ID, $reportId, $comparison);
	}

	/**
	 * Filter the query on the president column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPresident('fooValue');   // WHERE president = 'fooValue'
	 * $query->filterByPresident('%fooValue%'); // WHERE president LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $president The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByPresident($president = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($president)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $president)) {
				$president = str_replace('*', '%', $president);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::PRESIDENT, $president, $comparison);
	}

	/**
	 * Filter the query on the vice column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVice('fooValue');   // WHERE vice = 'fooValue'
	 * $query->filterByVice('%fooValue%'); // WHERE vice LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $vice The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByVice($vice = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($vice)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $vice)) {
				$vice = str_replace('*', '%', $vice);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::VICE, $vice, $comparison);
	}

	/**
	 * Filter the query on the treasurer column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTreasurer('fooValue');   // WHERE treasurer = 'fooValue'
	 * $query->filterByTreasurer('%fooValue%'); // WHERE treasurer LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $treasurer The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByTreasurer($treasurer = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($treasurer)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $treasurer)) {
				$treasurer = str_replace('*', '%', $treasurer);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::TREASURER, $treasurer, $comparison);
	}

	/**
	 * Filter the query on the secretary column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySecretary('fooValue');   // WHERE secretary = 'fooValue'
	 * $query->filterBySecretary('%fooValue%'); // WHERE secretary LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $secretary The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySecretary($secretary = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($secretary)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $secretary)) {
				$secretary = str_replace('*', '%', $secretary);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SECRETARY, $secretary, $comparison);
	}

	/**
	 * Filter the query on the board column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBoard('fooValue');   // WHERE board = 'fooValue'
	 * $query->filterByBoard('%fooValue%'); // WHERE board LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $board The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByBoard($board = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($board)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $board)) {
				$board = str_replace('*', '%', $board);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::BOARD, $board, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::MEMBERS, $members, $comparison);
	}

	/**
	 * Filter the query on the fall column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFall('fooValue');   // WHERE fall = 'fooValue'
	 * $query->filterByFall('%fooValue%'); // WHERE fall LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fall The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByFall($fall = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fall)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fall)) {
				$fall = str_replace('*', '%', $fall);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::FALL, $fall, $comparison);
	}

	/**
	 * Filter the query on the winter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWinter('fooValue');   // WHERE winter = 'fooValue'
	 * $query->filterByWinter('%fooValue%'); // WHERE winter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $winter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByWinter($winter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($winter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $winter)) {
				$winter = str_replace('*', '%', $winter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::WINTER, $winter, $comparison);
	}

	/**
	 * Filter the query on the spring column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySpring('fooValue');   // WHERE spring = 'fooValue'
	 * $query->filterBySpring('%fooValue%'); // WHERE spring LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $spring The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySpring($spring = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($spring)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $spring)) {
				$spring = str_replace('*', '%', $spring);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SPRING, $spring, $comparison);
	}

	/**
	 * Filter the query on the summer column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySummer('fooValue');   // WHERE summer = 'fooValue'
	 * $query->filterBySummer('%fooValue%'); // WHERE summer LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $summer The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySummer($summer = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($summer)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $summer)) {
				$summer = str_replace('*', '%', $summer);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SUMMER, $summer, $comparison);
	}

	/**
	 * Filter the query on the open_house column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOpenHouse('fooValue');   // WHERE open_house = 'fooValue'
	 * $query->filterByOpenHouse('%fooValue%'); // WHERE open_house LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $openHouse The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByOpenHouse($openHouse = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($openHouse)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $openHouse)) {
				$openHouse = str_replace('*', '%', $openHouse);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::OPEN_HOUSE, $openHouse, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataPeer::PROMO, $promo, $comparison);
	}

	/**
	 * Filter the query on the sig_pres column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySigPres('fooValue');   // WHERE sig_pres = 'fooValue'
	 * $query->filterBySigPres('%fooValue%'); // WHERE sig_pres LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sigPres The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySigPres($sigPres = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sigPres)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sigPres)) {
				$sigPres = str_replace('*', '%', $sigPres);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SIG_PRES, $sigPres, $comparison);
	}

	/**
	 * Filter the query on the sig_adv column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySigAdv('fooValue');   // WHERE sig_adv = 'fooValue'
	 * $query->filterBySigAdv('%fooValue%'); // WHERE sig_adv LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sigAdv The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterBySigAdv($sigAdv = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sigAdv)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sigAdv)) {
				$sigAdv = str_replace('*', '%', $sigAdv);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::SIG_ADV, $sigAdv, $comparison);
	}

	/**
	 * Filter the query on the reason column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReason('fooValue');   // WHERE reason = 'fooValue'
	 * $query->filterByReason('%fooValue%'); // WHERE reason LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reason The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByReason($reason = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reason)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reason)) {
				$reason = str_replace('*', '%', $reason);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::REASON, $reason, $comparison);
	}

	/**
	 * Filter the query on the status column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
	 * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $status The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the last_updated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastUpdated('2011-03-14'); // WHERE last_updated = '2011-03-14'
	 * $query->filterByLastUpdated('now'); // WHERE last_updated = '2011-03-14'
	 * $query->filterByLastUpdated(array('max' => 'yesterday')); // WHERE last_updated > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $lastUpdated The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByLastUpdated($lastUpdated = null, $comparison = null)
	{
		if (is_array($lastUpdated)) {
			$useMinMax = false;
			if (isset($lastUpdated['min'])) {
				$this->addUsingAlias(RecognitionDataPeer::LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastUpdated['max'])) {
				$this->addUsingAlias(RecognitionDataPeer::LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::LAST_UPDATED, $lastUpdated, $comparison);
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
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(RecognitionDataPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(RecognitionDataPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataPeer::DATE, $date, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RecognitionData $recognitionData Object to remove from the list of results
	 *
	 * @return    RecognitionDataQuery The current query, for fluid interface
	 */
	public function prune($recognitionData = null)
	{
		if ($recognitionData) {
			$this->addUsingAlias(RecognitionDataPeer::ID, $recognitionData->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRecognitionDataQuery
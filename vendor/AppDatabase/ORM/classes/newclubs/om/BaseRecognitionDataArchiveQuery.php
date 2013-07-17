<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\RecognitionDataArchive;
use NewClubsORM\RecognitionDataArchivePeer;
use NewClubsORM\RecognitionDataArchiveQuery;

/**
 * Base class that represents a query for the 'recognition_data_archive' table.
 *
 * 
 *
 * @method     RecognitionDataArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RecognitionDataArchiveQuery orderByClubtype($order = Criteria::ASC) Order by the clubtype column
 * @method     RecognitionDataArchiveQuery orderByItf($order = Criteria::ASC) Order by the itf column
 * @method     RecognitionDataArchiveQuery orderByClubname($order = Criteria::ASC) Order by the clubname column
 * @method     RecognitionDataArchiveQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     RecognitionDataArchiveQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     RecognitionDataArchiveQuery orderByGenEmail($order = Criteria::ASC) Order by the gen_email column
 * @method     RecognitionDataArchiveQuery orderBySubmitter($order = Criteria::ASC) Order by the submitter column
 * @method     RecognitionDataArchiveQuery orderBySPosition($order = Criteria::ASC) Order by the s_position column
 * @method     RecognitionDataArchiveQuery orderBySEmail($order = Criteria::ASC) Order by the s_email column
 * @method     RecognitionDataArchiveQuery orderByAFirst($order = Criteria::ASC) Order by the a_first column
 * @method     RecognitionDataArchiveQuery orderByALast($order = Criteria::ASC) Order by the a_last column
 * @method     RecognitionDataArchiveQuery orderByACphone($order = Criteria::ASC) Order by the a_cphone column
 * @method     RecognitionDataArchiveQuery orderByAHphone($order = Criteria::ASC) Order by the a_hphone column
 * @method     RecognitionDataArchiveQuery orderByAOffice($order = Criteria::ASC) Order by the a_office column
 * @method     RecognitionDataArchiveQuery orderByADept($order = Criteria::ASC) Order by the a_dept column
 * @method     RecognitionDataArchiveQuery orderByAEmail($order = Criteria::ASC) Order by the a_email column
 * @method     RecognitionDataArchiveQuery orderByTarget($order = Criteria::ASC) Order by the target column
 * @method     RecognitionDataArchiveQuery orderByMeetings($order = Criteria::ASC) Order by the meetings column
 * @method     RecognitionDataArchiveQuery orderByMembercount($order = Criteria::ASC) Order by the membercount column
 * @method     RecognitionDataArchiveQuery orderByFees($order = Criteria::ASC) Order by the fees column
 * @method     RecognitionDataArchiveQuery orderByElections($order = Criteria::ASC) Order by the elections column
 * @method     RecognitionDataArchiveQuery orderBySPhone($order = Criteria::ASC) Order by the s_phone column
 * @method     RecognitionDataArchiveQuery orderByPurpose($order = Criteria::ASC) Order by the purpose column
 * @method     RecognitionDataArchiveQuery orderBySignature($order = Criteria::ASC) Order by the signature column
 * @method     RecognitionDataArchiveQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method     RecognitionDataArchiveQuery orderByReportId($order = Criteria::ASC) Order by the report_id column
 * @method     RecognitionDataArchiveQuery orderByPresident($order = Criteria::ASC) Order by the president column
 * @method     RecognitionDataArchiveQuery orderByVice($order = Criteria::ASC) Order by the vice column
 * @method     RecognitionDataArchiveQuery orderByTreasurer($order = Criteria::ASC) Order by the treasurer column
 * @method     RecognitionDataArchiveQuery orderBySecretary($order = Criteria::ASC) Order by the secretary column
 * @method     RecognitionDataArchiveQuery orderByBoard($order = Criteria::ASC) Order by the board column
 * @method     RecognitionDataArchiveQuery orderByMembers($order = Criteria::ASC) Order by the members column
 * @method     RecognitionDataArchiveQuery orderByFall($order = Criteria::ASC) Order by the fall column
 * @method     RecognitionDataArchiveQuery orderByWinter($order = Criteria::ASC) Order by the winter column
 * @method     RecognitionDataArchiveQuery orderBySpring($order = Criteria::ASC) Order by the spring column
 * @method     RecognitionDataArchiveQuery orderBySummer($order = Criteria::ASC) Order by the summer column
 * @method     RecognitionDataArchiveQuery orderByOpenHouse($order = Criteria::ASC) Order by the open_house column
 * @method     RecognitionDataArchiveQuery orderByPromo($order = Criteria::ASC) Order by the promo column
 * @method     RecognitionDataArchiveQuery orderBySigPres($order = Criteria::ASC) Order by the sig_pres column
 * @method     RecognitionDataArchiveQuery orderBySigAdv($order = Criteria::ASC) Order by the sig_adv column
 * @method     RecognitionDataArchiveQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     RecognitionDataArchiveQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     RecognitionDataArchiveQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     RecognitionDataArchiveQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     RecognitionDataArchiveQuery groupById() Group by the id column
 * @method     RecognitionDataArchiveQuery groupByClubtype() Group by the clubtype column
 * @method     RecognitionDataArchiveQuery groupByItf() Group by the itf column
 * @method     RecognitionDataArchiveQuery groupByClubname() Group by the clubname column
 * @method     RecognitionDataArchiveQuery groupByAcronym() Group by the acronym column
 * @method     RecognitionDataArchiveQuery groupByUrl() Group by the url column
 * @method     RecognitionDataArchiveQuery groupByGenEmail() Group by the gen_email column
 * @method     RecognitionDataArchiveQuery groupBySubmitter() Group by the submitter column
 * @method     RecognitionDataArchiveQuery groupBySPosition() Group by the s_position column
 * @method     RecognitionDataArchiveQuery groupBySEmail() Group by the s_email column
 * @method     RecognitionDataArchiveQuery groupByAFirst() Group by the a_first column
 * @method     RecognitionDataArchiveQuery groupByALast() Group by the a_last column
 * @method     RecognitionDataArchiveQuery groupByACphone() Group by the a_cphone column
 * @method     RecognitionDataArchiveQuery groupByAHphone() Group by the a_hphone column
 * @method     RecognitionDataArchiveQuery groupByAOffice() Group by the a_office column
 * @method     RecognitionDataArchiveQuery groupByADept() Group by the a_dept column
 * @method     RecognitionDataArchiveQuery groupByAEmail() Group by the a_email column
 * @method     RecognitionDataArchiveQuery groupByTarget() Group by the target column
 * @method     RecognitionDataArchiveQuery groupByMeetings() Group by the meetings column
 * @method     RecognitionDataArchiveQuery groupByMembercount() Group by the membercount column
 * @method     RecognitionDataArchiveQuery groupByFees() Group by the fees column
 * @method     RecognitionDataArchiveQuery groupByElections() Group by the elections column
 * @method     RecognitionDataArchiveQuery groupBySPhone() Group by the s_phone column
 * @method     RecognitionDataArchiveQuery groupByPurpose() Group by the purpose column
 * @method     RecognitionDataArchiveQuery groupBySignature() Group by the signature column
 * @method     RecognitionDataArchiveQuery groupByOrgId() Group by the org_id column
 * @method     RecognitionDataArchiveQuery groupByReportId() Group by the report_id column
 * @method     RecognitionDataArchiveQuery groupByPresident() Group by the president column
 * @method     RecognitionDataArchiveQuery groupByVice() Group by the vice column
 * @method     RecognitionDataArchiveQuery groupByTreasurer() Group by the treasurer column
 * @method     RecognitionDataArchiveQuery groupBySecretary() Group by the secretary column
 * @method     RecognitionDataArchiveQuery groupByBoard() Group by the board column
 * @method     RecognitionDataArchiveQuery groupByMembers() Group by the members column
 * @method     RecognitionDataArchiveQuery groupByFall() Group by the fall column
 * @method     RecognitionDataArchiveQuery groupByWinter() Group by the winter column
 * @method     RecognitionDataArchiveQuery groupBySpring() Group by the spring column
 * @method     RecognitionDataArchiveQuery groupBySummer() Group by the summer column
 * @method     RecognitionDataArchiveQuery groupByOpenHouse() Group by the open_house column
 * @method     RecognitionDataArchiveQuery groupByPromo() Group by the promo column
 * @method     RecognitionDataArchiveQuery groupBySigPres() Group by the sig_pres column
 * @method     RecognitionDataArchiveQuery groupBySigAdv() Group by the sig_adv column
 * @method     RecognitionDataArchiveQuery groupByReason() Group by the reason column
 * @method     RecognitionDataArchiveQuery groupByStatus() Group by the status column
 * @method     RecognitionDataArchiveQuery groupByLastUpdated() Group by the last_updated column
 * @method     RecognitionDataArchiveQuery groupByDate() Group by the date column
 *
 * @method     RecognitionDataArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RecognitionDataArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RecognitionDataArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RecognitionDataArchive findOne(PropelPDO $con = null) Return the first RecognitionDataArchive matching the query
 * @method     RecognitionDataArchive findOneOrCreate(PropelPDO $con = null) Return the first RecognitionDataArchive matching the query, or a new RecognitionDataArchive object populated from the query conditions when no match is found
 *
 * @method     RecognitionDataArchive findOneById(int $id) Return the first RecognitionDataArchive filtered by the id column
 * @method     RecognitionDataArchive findOneByClubtype(string $clubtype) Return the first RecognitionDataArchive filtered by the clubtype column
 * @method     RecognitionDataArchive findOneByItf(string $itf) Return the first RecognitionDataArchive filtered by the itf column
 * @method     RecognitionDataArchive findOneByClubname(string $clubname) Return the first RecognitionDataArchive filtered by the clubname column
 * @method     RecognitionDataArchive findOneByAcronym(string $acronym) Return the first RecognitionDataArchive filtered by the acronym column
 * @method     RecognitionDataArchive findOneByUrl(string $url) Return the first RecognitionDataArchive filtered by the url column
 * @method     RecognitionDataArchive findOneByGenEmail(string $gen_email) Return the first RecognitionDataArchive filtered by the gen_email column
 * @method     RecognitionDataArchive findOneBySubmitter(string $submitter) Return the first RecognitionDataArchive filtered by the submitter column
 * @method     RecognitionDataArchive findOneBySPosition(string $s_position) Return the first RecognitionDataArchive filtered by the s_position column
 * @method     RecognitionDataArchive findOneBySEmail(string $s_email) Return the first RecognitionDataArchive filtered by the s_email column
 * @method     RecognitionDataArchive findOneByAFirst(string $a_first) Return the first RecognitionDataArchive filtered by the a_first column
 * @method     RecognitionDataArchive findOneByALast(string $a_last) Return the first RecognitionDataArchive filtered by the a_last column
 * @method     RecognitionDataArchive findOneByACphone(string $a_cphone) Return the first RecognitionDataArchive filtered by the a_cphone column
 * @method     RecognitionDataArchive findOneByAHphone(string $a_hphone) Return the first RecognitionDataArchive filtered by the a_hphone column
 * @method     RecognitionDataArchive findOneByAOffice(string $a_office) Return the first RecognitionDataArchive filtered by the a_office column
 * @method     RecognitionDataArchive findOneByADept(string $a_dept) Return the first RecognitionDataArchive filtered by the a_dept column
 * @method     RecognitionDataArchive findOneByAEmail(string $a_email) Return the first RecognitionDataArchive filtered by the a_email column
 * @method     RecognitionDataArchive findOneByTarget(string $target) Return the first RecognitionDataArchive filtered by the target column
 * @method     RecognitionDataArchive findOneByMeetings(string $meetings) Return the first RecognitionDataArchive filtered by the meetings column
 * @method     RecognitionDataArchive findOneByMembercount(string $membercount) Return the first RecognitionDataArchive filtered by the membercount column
 * @method     RecognitionDataArchive findOneByFees(string $fees) Return the first RecognitionDataArchive filtered by the fees column
 * @method     RecognitionDataArchive findOneByElections(string $elections) Return the first RecognitionDataArchive filtered by the elections column
 * @method     RecognitionDataArchive findOneBySPhone(string $s_phone) Return the first RecognitionDataArchive filtered by the s_phone column
 * @method     RecognitionDataArchive findOneByPurpose(string $purpose) Return the first RecognitionDataArchive filtered by the purpose column
 * @method     RecognitionDataArchive findOneBySignature(string $signature) Return the first RecognitionDataArchive filtered by the signature column
 * @method     RecognitionDataArchive findOneByOrgId(int $org_id) Return the first RecognitionDataArchive filtered by the org_id column
 * @method     RecognitionDataArchive findOneByReportId(int $report_id) Return the first RecognitionDataArchive filtered by the report_id column
 * @method     RecognitionDataArchive findOneByPresident(string $president) Return the first RecognitionDataArchive filtered by the president column
 * @method     RecognitionDataArchive findOneByVice(string $vice) Return the first RecognitionDataArchive filtered by the vice column
 * @method     RecognitionDataArchive findOneByTreasurer(string $treasurer) Return the first RecognitionDataArchive filtered by the treasurer column
 * @method     RecognitionDataArchive findOneBySecretary(string $secretary) Return the first RecognitionDataArchive filtered by the secretary column
 * @method     RecognitionDataArchive findOneByBoard(string $board) Return the first RecognitionDataArchive filtered by the board column
 * @method     RecognitionDataArchive findOneByMembers(string $members) Return the first RecognitionDataArchive filtered by the members column
 * @method     RecognitionDataArchive findOneByFall(string $fall) Return the first RecognitionDataArchive filtered by the fall column
 * @method     RecognitionDataArchive findOneByWinter(string $winter) Return the first RecognitionDataArchive filtered by the winter column
 * @method     RecognitionDataArchive findOneBySpring(string $spring) Return the first RecognitionDataArchive filtered by the spring column
 * @method     RecognitionDataArchive findOneBySummer(string $summer) Return the first RecognitionDataArchive filtered by the summer column
 * @method     RecognitionDataArchive findOneByOpenHouse(string $open_house) Return the first RecognitionDataArchive filtered by the open_house column
 * @method     RecognitionDataArchive findOneByPromo(string $promo) Return the first RecognitionDataArchive filtered by the promo column
 * @method     RecognitionDataArchive findOneBySigPres(string $sig_pres) Return the first RecognitionDataArchive filtered by the sig_pres column
 * @method     RecognitionDataArchive findOneBySigAdv(string $sig_adv) Return the first RecognitionDataArchive filtered by the sig_adv column
 * @method     RecognitionDataArchive findOneByReason(string $reason) Return the first RecognitionDataArchive filtered by the reason column
 * @method     RecognitionDataArchive findOneByStatus(string $status) Return the first RecognitionDataArchive filtered by the status column
 * @method     RecognitionDataArchive findOneByLastUpdated(string $last_updated) Return the first RecognitionDataArchive filtered by the last_updated column
 * @method     RecognitionDataArchive findOneByDate(string $date) Return the first RecognitionDataArchive filtered by the date column
 *
 * @method     array findById(int $id) Return RecognitionDataArchive objects filtered by the id column
 * @method     array findByClubtype(string $clubtype) Return RecognitionDataArchive objects filtered by the clubtype column
 * @method     array findByItf(string $itf) Return RecognitionDataArchive objects filtered by the itf column
 * @method     array findByClubname(string $clubname) Return RecognitionDataArchive objects filtered by the clubname column
 * @method     array findByAcronym(string $acronym) Return RecognitionDataArchive objects filtered by the acronym column
 * @method     array findByUrl(string $url) Return RecognitionDataArchive objects filtered by the url column
 * @method     array findByGenEmail(string $gen_email) Return RecognitionDataArchive objects filtered by the gen_email column
 * @method     array findBySubmitter(string $submitter) Return RecognitionDataArchive objects filtered by the submitter column
 * @method     array findBySPosition(string $s_position) Return RecognitionDataArchive objects filtered by the s_position column
 * @method     array findBySEmail(string $s_email) Return RecognitionDataArchive objects filtered by the s_email column
 * @method     array findByAFirst(string $a_first) Return RecognitionDataArchive objects filtered by the a_first column
 * @method     array findByALast(string $a_last) Return RecognitionDataArchive objects filtered by the a_last column
 * @method     array findByACphone(string $a_cphone) Return RecognitionDataArchive objects filtered by the a_cphone column
 * @method     array findByAHphone(string $a_hphone) Return RecognitionDataArchive objects filtered by the a_hphone column
 * @method     array findByAOffice(string $a_office) Return RecognitionDataArchive objects filtered by the a_office column
 * @method     array findByADept(string $a_dept) Return RecognitionDataArchive objects filtered by the a_dept column
 * @method     array findByAEmail(string $a_email) Return RecognitionDataArchive objects filtered by the a_email column
 * @method     array findByTarget(string $target) Return RecognitionDataArchive objects filtered by the target column
 * @method     array findByMeetings(string $meetings) Return RecognitionDataArchive objects filtered by the meetings column
 * @method     array findByMembercount(string $membercount) Return RecognitionDataArchive objects filtered by the membercount column
 * @method     array findByFees(string $fees) Return RecognitionDataArchive objects filtered by the fees column
 * @method     array findByElections(string $elections) Return RecognitionDataArchive objects filtered by the elections column
 * @method     array findBySPhone(string $s_phone) Return RecognitionDataArchive objects filtered by the s_phone column
 * @method     array findByPurpose(string $purpose) Return RecognitionDataArchive objects filtered by the purpose column
 * @method     array findBySignature(string $signature) Return RecognitionDataArchive objects filtered by the signature column
 * @method     array findByOrgId(int $org_id) Return RecognitionDataArchive objects filtered by the org_id column
 * @method     array findByReportId(int $report_id) Return RecognitionDataArchive objects filtered by the report_id column
 * @method     array findByPresident(string $president) Return RecognitionDataArchive objects filtered by the president column
 * @method     array findByVice(string $vice) Return RecognitionDataArchive objects filtered by the vice column
 * @method     array findByTreasurer(string $treasurer) Return RecognitionDataArchive objects filtered by the treasurer column
 * @method     array findBySecretary(string $secretary) Return RecognitionDataArchive objects filtered by the secretary column
 * @method     array findByBoard(string $board) Return RecognitionDataArchive objects filtered by the board column
 * @method     array findByMembers(string $members) Return RecognitionDataArchive objects filtered by the members column
 * @method     array findByFall(string $fall) Return RecognitionDataArchive objects filtered by the fall column
 * @method     array findByWinter(string $winter) Return RecognitionDataArchive objects filtered by the winter column
 * @method     array findBySpring(string $spring) Return RecognitionDataArchive objects filtered by the spring column
 * @method     array findBySummer(string $summer) Return RecognitionDataArchive objects filtered by the summer column
 * @method     array findByOpenHouse(string $open_house) Return RecognitionDataArchive objects filtered by the open_house column
 * @method     array findByPromo(string $promo) Return RecognitionDataArchive objects filtered by the promo column
 * @method     array findBySigPres(string $sig_pres) Return RecognitionDataArchive objects filtered by the sig_pres column
 * @method     array findBySigAdv(string $sig_adv) Return RecognitionDataArchive objects filtered by the sig_adv column
 * @method     array findByReason(string $reason) Return RecognitionDataArchive objects filtered by the reason column
 * @method     array findByStatus(string $status) Return RecognitionDataArchive objects filtered by the status column
 * @method     array findByLastUpdated(string $last_updated) Return RecognitionDataArchive objects filtered by the last_updated column
 * @method     array findByDate(string $date) Return RecognitionDataArchive objects filtered by the date column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionDataArchiveQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRecognitionDataArchiveQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\RecognitionDataArchive', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RecognitionDataArchiveQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RecognitionDataArchiveQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RecognitionDataArchiveQuery) {
			return $criteria;
		}
		$query = new RecognitionDataArchiveQuery();
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
	 * @return    RecognitionDataArchive|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RecognitionDataArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RecognitionDataArchive A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLUBTYPE`, `ITF`, `CLUBNAME`, `ACRONYM`, `URL`, `GEN_EMAIL`, `SUBMITTER`, `S_POSITION`, `S_EMAIL`, `A_FIRST`, `A_LAST`, `A_CPHONE`, `A_HPHONE`, `A_OFFICE`, `A_DEPT`, `A_EMAIL`, `TARGET`, `MEETINGS`, `MEMBERCOUNT`, `FEES`, `ELECTIONS`, `S_PHONE`, `PURPOSE`, `SIGNATURE`, `ORG_ID`, `REPORT_ID`, `PRESIDENT`, `VICE`, `TREASURER`, `SECRETARY`, `BOARD`, `MEMBERS`, `FALL`, `WINTER`, `SPRING`, `SUMMER`, `OPEN_HOUSE`, `PROMO`, `SIG_PRES`, `SIG_ADV`, `REASON`, `STATUS`, `LAST_UPDATED`, `DATE` FROM `recognition_data_archive` WHERE `ID` = :p0';
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
			$obj = new RecognitionDataArchive();
			$obj->hydrate($row);
			RecognitionDataArchivePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RecognitionDataArchive|array|mixed the result, formatted by the current formatter
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RecognitionDataArchivePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RecognitionDataArchivePeer::ID, $keys, Criteria::IN);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RecognitionDataArchivePeer::ID, $id, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::CLUBTYPE, $clubtype, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::ITF, $itf, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::CLUBNAME, $clubname, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::ACRONYM, $acronym, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::URL, $url, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::GEN_EMAIL, $genEmail, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SUBMITTER, $submitter, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::S_POSITION, $sPosition, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::S_EMAIL, $sEmail, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_FIRST, $aFirst, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_LAST, $aLast, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_CPHONE, $aCphone, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_HPHONE, $aHphone, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_OFFICE, $aOffice, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_DEPT, $aDept, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::A_EMAIL, $aEmail, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::TARGET, $target, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::MEETINGS, $meetings, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::MEMBERCOUNT, $membercount, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::FEES, $fees, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::ELECTIONS, $elections, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::S_PHONE, $sPhone, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::PURPOSE, $purpose, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SIGNATURE, $signature, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByOrgId($orgId = null, $comparison = null)
	{
		if (is_array($orgId)) {
			$useMinMax = false;
			if (isset($orgId['min'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orgId['max'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataArchivePeer::ORG_ID, $orgId, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByReportId($reportId = null, $comparison = null)
	{
		if (is_array($reportId)) {
			$useMinMax = false;
			if (isset($reportId['min'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::REPORT_ID, $reportId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($reportId['max'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::REPORT_ID, $reportId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataArchivePeer::REPORT_ID, $reportId, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::PRESIDENT, $president, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::VICE, $vice, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::TREASURER, $treasurer, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SECRETARY, $secretary, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::BOARD, $board, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::MEMBERS, $members, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::FALL, $fall, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::WINTER, $winter, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SPRING, $spring, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SUMMER, $summer, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::OPEN_HOUSE, $openHouse, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::PROMO, $promo, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SIG_PRES, $sigPres, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::SIG_ADV, $sigAdv, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::REASON, $reason, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RecognitionDataArchivePeer::STATUS, $status, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByLastUpdated($lastUpdated = null, $comparison = null)
	{
		if (is_array($lastUpdated)) {
			$useMinMax = false;
			if (isset($lastUpdated['min'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastUpdated['max'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataArchivePeer::LAST_UPDATED, $lastUpdated, $comparison);
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
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(RecognitionDataArchivePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RecognitionDataArchivePeer::DATE, $date, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RecognitionDataArchive $recognitionDataArchive Object to remove from the list of results
	 *
	 * @return    RecognitionDataArchiveQuery The current query, for fluid interface
	 */
	public function prune($recognitionDataArchive = null)
	{
		if ($recognitionDataArchive) {
			$this->addUsingAlias(RecognitionDataArchivePeer::ID, $recognitionDataArchive->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRecognitionDataArchiveQuery
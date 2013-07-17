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
use OrganizationsORM\EafFormInfo;
use OrganizationsORM\EafFormInfoPeer;
use OrganizationsORM\EafFormInfoQuery;

/**
 * Base class that represents a query for the 'eaf_form_info' table.
 *
 * 
 *
 * @method     EafFormInfoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EafFormInfoQuery orderByEafFormNo($order = Criteria::ASC) Order by the eaf_form_no column
 * @method     EafFormInfoQuery orderByVisaNo($order = Criteria::ASC) Order by the visa_no column
 * @method     EafFormInfoQuery orderByTxnDueDate($order = Criteria::ASC) Order by the txn_due_date column
 * @method     EafFormInfoQuery orderByReqName($order = Criteria::ASC) Order by the req_name column
 * @method     EafFormInfoQuery orderByEafDate($order = Criteria::ASC) Order by the eaf_date column
 * @method     EafFormInfoQuery orderByReqEmail($order = Criteria::ASC) Order by the req_email column
 * @method     EafFormInfoQuery orderByReqPhone($order = Criteria::ASC) Order by the req_phone column
 * @method     EafFormInfoQuery orderByReqClubName($order = Criteria::ASC) Order by the req_club_name column
 * @method     EafFormInfoQuery orderByAltReqName($order = Criteria::ASC) Order by the alt_req_name column
 * @method     EafFormInfoQuery orderByAltReqPhone($order = Criteria::ASC) Order by the alt_req_phone column
 * @method     EafFormInfoQuery orderByAltReqEmail($order = Criteria::ASC) Order by the alt_req_email column
 * @method     EafFormInfoQuery orderByAccountNo($order = Criteria::ASC) Order by the account_no column
 * @method     EafFormInfoQuery orderByCashNeeded($order = Criteria::ASC) Order by the cash_needed column
 * @method     EafFormInfoQuery orderByCheckPayment($order = Criteria::ASC) Order by the check_payment column
 * @method     EafFormInfoQuery orderByVehicleRental($order = Criteria::ASC) Order by the vehicle_rental column
 * @method     EafFormInfoQuery orderByHub($order = Criteria::ASC) Order by the hub column
 * @method     EafFormInfoQuery orderByVisa($order = Criteria::ASC) Order by the visa column
 * @method     EafFormInfoQuery orderByAfafAtfAwardNo($order = Criteria::ASC) Order by the afaf_atf_award_no column
 * @method     EafFormInfoQuery orderByTransFunds($order = Criteria::ASC) Order by the trans_funds column
 * @method     EafFormInfoQuery orderByOffMaxPurchase($order = Criteria::ASC) Order by the off_max_purchase column
 * @method     EafFormInfoQuery orderByCheckMailed($order = Criteria::ASC) Order by the check_mailed column
 * @method     EafFormInfoQuery orderByTravel($order = Criteria::ASC) Order by the travel column
 * @method     EafFormInfoQuery orderByCheckPicked($order = Criteria::ASC) Order by the check_picked column
 * @method     EafFormInfoQuery orderByEventName($order = Criteria::ASC) Order by the event_name column
 * @method     EafFormInfoQuery orderByDestination($order = Criteria::ASC) Order by the destination column
 * @method     EafFormInfoQuery orderByEventDate($order = Criteria::ASC) Order by the event_date column
 * @method     EafFormInfoQuery orderByCompName($order = Criteria::ASC) Order by the comp_name column
 * @method     EafFormInfoQuery orderByCompAddress($order = Criteria::ASC) Order by the comp_address column
 * @method     EafFormInfoQuery orderByCompCity($order = Criteria::ASC) Order by the comp_city column
 * @method     EafFormInfoQuery orderByCompState($order = Criteria::ASC) Order by the comp_state column
 * @method     EafFormInfoQuery orderByCompZip($order = Criteria::ASC) Order by the comp_zip column
 * @method     EafFormInfoQuery orderByCompPhone($order = Criteria::ASC) Order by the comp_phone column
 * @method     EafFormInfoQuery orderByCompFax($order = Criteria::ASC) Order by the comp_fax column
 * @method     EafFormInfoQuery orderByStudentId($order = Criteria::ASC) Order by the student_id column
 * @method     EafFormInfoQuery orderByPurchaseDesc($order = Criteria::ASC) Order by the purchase_desc column
 * @method     EafFormInfoQuery orderByTotal($order = Criteria::ASC) Order by the total column
 *
 * @method     EafFormInfoQuery groupById() Group by the id column
 * @method     EafFormInfoQuery groupByEafFormNo() Group by the eaf_form_no column
 * @method     EafFormInfoQuery groupByVisaNo() Group by the visa_no column
 * @method     EafFormInfoQuery groupByTxnDueDate() Group by the txn_due_date column
 * @method     EafFormInfoQuery groupByReqName() Group by the req_name column
 * @method     EafFormInfoQuery groupByEafDate() Group by the eaf_date column
 * @method     EafFormInfoQuery groupByReqEmail() Group by the req_email column
 * @method     EafFormInfoQuery groupByReqPhone() Group by the req_phone column
 * @method     EafFormInfoQuery groupByReqClubName() Group by the req_club_name column
 * @method     EafFormInfoQuery groupByAltReqName() Group by the alt_req_name column
 * @method     EafFormInfoQuery groupByAltReqPhone() Group by the alt_req_phone column
 * @method     EafFormInfoQuery groupByAltReqEmail() Group by the alt_req_email column
 * @method     EafFormInfoQuery groupByAccountNo() Group by the account_no column
 * @method     EafFormInfoQuery groupByCashNeeded() Group by the cash_needed column
 * @method     EafFormInfoQuery groupByCheckPayment() Group by the check_payment column
 * @method     EafFormInfoQuery groupByVehicleRental() Group by the vehicle_rental column
 * @method     EafFormInfoQuery groupByHub() Group by the hub column
 * @method     EafFormInfoQuery groupByVisa() Group by the visa column
 * @method     EafFormInfoQuery groupByAfafAtfAwardNo() Group by the afaf_atf_award_no column
 * @method     EafFormInfoQuery groupByTransFunds() Group by the trans_funds column
 * @method     EafFormInfoQuery groupByOffMaxPurchase() Group by the off_max_purchase column
 * @method     EafFormInfoQuery groupByCheckMailed() Group by the check_mailed column
 * @method     EafFormInfoQuery groupByTravel() Group by the travel column
 * @method     EafFormInfoQuery groupByCheckPicked() Group by the check_picked column
 * @method     EafFormInfoQuery groupByEventName() Group by the event_name column
 * @method     EafFormInfoQuery groupByDestination() Group by the destination column
 * @method     EafFormInfoQuery groupByEventDate() Group by the event_date column
 * @method     EafFormInfoQuery groupByCompName() Group by the comp_name column
 * @method     EafFormInfoQuery groupByCompAddress() Group by the comp_address column
 * @method     EafFormInfoQuery groupByCompCity() Group by the comp_city column
 * @method     EafFormInfoQuery groupByCompState() Group by the comp_state column
 * @method     EafFormInfoQuery groupByCompZip() Group by the comp_zip column
 * @method     EafFormInfoQuery groupByCompPhone() Group by the comp_phone column
 * @method     EafFormInfoQuery groupByCompFax() Group by the comp_fax column
 * @method     EafFormInfoQuery groupByStudentId() Group by the student_id column
 * @method     EafFormInfoQuery groupByPurchaseDesc() Group by the purchase_desc column
 * @method     EafFormInfoQuery groupByTotal() Group by the total column
 *
 * @method     EafFormInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EafFormInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EafFormInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EafFormInfoQuery leftJoinEafApprovals($relationAlias = null) Adds a LEFT JOIN clause to the query using the EafApprovals relation
 * @method     EafFormInfoQuery rightJoinEafApprovals($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EafApprovals relation
 * @method     EafFormInfoQuery innerJoinEafApprovals($relationAlias = null) Adds a INNER JOIN clause to the query using the EafApprovals relation
 *
 * @method     EafFormInfo findOne(PropelPDO $con = null) Return the first EafFormInfo matching the query
 * @method     EafFormInfo findOneOrCreate(PropelPDO $con = null) Return the first EafFormInfo matching the query, or a new EafFormInfo object populated from the query conditions when no match is found
 *
 * @method     EafFormInfo findOneById(int $id) Return the first EafFormInfo filtered by the id column
 * @method     EafFormInfo findOneByEafFormNo(int $eaf_form_no) Return the first EafFormInfo filtered by the eaf_form_no column
 * @method     EafFormInfo findOneByVisaNo(int $visa_no) Return the first EafFormInfo filtered by the visa_no column
 * @method     EafFormInfo findOneByTxnDueDate(string $txn_due_date) Return the first EafFormInfo filtered by the txn_due_date column
 * @method     EafFormInfo findOneByReqName(string $req_name) Return the first EafFormInfo filtered by the req_name column
 * @method     EafFormInfo findOneByEafDate(string $eaf_date) Return the first EafFormInfo filtered by the eaf_date column
 * @method     EafFormInfo findOneByReqEmail(string $req_email) Return the first EafFormInfo filtered by the req_email column
 * @method     EafFormInfo findOneByReqPhone(string $req_phone) Return the first EafFormInfo filtered by the req_phone column
 * @method     EafFormInfo findOneByReqClubName(string $req_club_name) Return the first EafFormInfo filtered by the req_club_name column
 * @method     EafFormInfo findOneByAltReqName(string $alt_req_name) Return the first EafFormInfo filtered by the alt_req_name column
 * @method     EafFormInfo findOneByAltReqPhone(string $alt_req_phone) Return the first EafFormInfo filtered by the alt_req_phone column
 * @method     EafFormInfo findOneByAltReqEmail(string $alt_req_email) Return the first EafFormInfo filtered by the alt_req_email column
 * @method     EafFormInfo findOneByAccountNo(string $account_no) Return the first EafFormInfo filtered by the account_no column
 * @method     EafFormInfo findOneByCashNeeded(string $cash_needed) Return the first EafFormInfo filtered by the cash_needed column
 * @method     EafFormInfo findOneByCheckPayment(string $check_payment) Return the first EafFormInfo filtered by the check_payment column
 * @method     EafFormInfo findOneByVehicleRental(string $vehicle_rental) Return the first EafFormInfo filtered by the vehicle_rental column
 * @method     EafFormInfo findOneByHub(string $hub) Return the first EafFormInfo filtered by the hub column
 * @method     EafFormInfo findOneByVisa(string $visa) Return the first EafFormInfo filtered by the visa column
 * @method     EafFormInfo findOneByAfafAtfAwardNo(string $afaf_atf_award_no) Return the first EafFormInfo filtered by the afaf_atf_award_no column
 * @method     EafFormInfo findOneByTransFunds(string $trans_funds) Return the first EafFormInfo filtered by the trans_funds column
 * @method     EafFormInfo findOneByOffMaxPurchase(string $off_max_purchase) Return the first EafFormInfo filtered by the off_max_purchase column
 * @method     EafFormInfo findOneByCheckMailed(string $check_mailed) Return the first EafFormInfo filtered by the check_mailed column
 * @method     EafFormInfo findOneByTravel(string $travel) Return the first EafFormInfo filtered by the travel column
 * @method     EafFormInfo findOneByCheckPicked(string $check_picked) Return the first EafFormInfo filtered by the check_picked column
 * @method     EafFormInfo findOneByEventName(string $event_name) Return the first EafFormInfo filtered by the event_name column
 * @method     EafFormInfo findOneByDestination(string $destination) Return the first EafFormInfo filtered by the destination column
 * @method     EafFormInfo findOneByEventDate(string $event_date) Return the first EafFormInfo filtered by the event_date column
 * @method     EafFormInfo findOneByCompName(string $comp_name) Return the first EafFormInfo filtered by the comp_name column
 * @method     EafFormInfo findOneByCompAddress(string $comp_address) Return the first EafFormInfo filtered by the comp_address column
 * @method     EafFormInfo findOneByCompCity(string $comp_city) Return the first EafFormInfo filtered by the comp_city column
 * @method     EafFormInfo findOneByCompState(string $comp_state) Return the first EafFormInfo filtered by the comp_state column
 * @method     EafFormInfo findOneByCompZip(string $comp_zip) Return the first EafFormInfo filtered by the comp_zip column
 * @method     EafFormInfo findOneByCompPhone(string $comp_phone) Return the first EafFormInfo filtered by the comp_phone column
 * @method     EafFormInfo findOneByCompFax(string $comp_fax) Return the first EafFormInfo filtered by the comp_fax column
 * @method     EafFormInfo findOneByStudentId(int $student_id) Return the first EafFormInfo filtered by the student_id column
 * @method     EafFormInfo findOneByPurchaseDesc(string $purchase_desc) Return the first EafFormInfo filtered by the purchase_desc column
 * @method     EafFormInfo findOneByTotal(int $total) Return the first EafFormInfo filtered by the total column
 *
 * @method     array findById(int $id) Return EafFormInfo objects filtered by the id column
 * @method     array findByEafFormNo(int $eaf_form_no) Return EafFormInfo objects filtered by the eaf_form_no column
 * @method     array findByVisaNo(int $visa_no) Return EafFormInfo objects filtered by the visa_no column
 * @method     array findByTxnDueDate(string $txn_due_date) Return EafFormInfo objects filtered by the txn_due_date column
 * @method     array findByReqName(string $req_name) Return EafFormInfo objects filtered by the req_name column
 * @method     array findByEafDate(string $eaf_date) Return EafFormInfo objects filtered by the eaf_date column
 * @method     array findByReqEmail(string $req_email) Return EafFormInfo objects filtered by the req_email column
 * @method     array findByReqPhone(string $req_phone) Return EafFormInfo objects filtered by the req_phone column
 * @method     array findByReqClubName(string $req_club_name) Return EafFormInfo objects filtered by the req_club_name column
 * @method     array findByAltReqName(string $alt_req_name) Return EafFormInfo objects filtered by the alt_req_name column
 * @method     array findByAltReqPhone(string $alt_req_phone) Return EafFormInfo objects filtered by the alt_req_phone column
 * @method     array findByAltReqEmail(string $alt_req_email) Return EafFormInfo objects filtered by the alt_req_email column
 * @method     array findByAccountNo(string $account_no) Return EafFormInfo objects filtered by the account_no column
 * @method     array findByCashNeeded(string $cash_needed) Return EafFormInfo objects filtered by the cash_needed column
 * @method     array findByCheckPayment(string $check_payment) Return EafFormInfo objects filtered by the check_payment column
 * @method     array findByVehicleRental(string $vehicle_rental) Return EafFormInfo objects filtered by the vehicle_rental column
 * @method     array findByHub(string $hub) Return EafFormInfo objects filtered by the hub column
 * @method     array findByVisa(string $visa) Return EafFormInfo objects filtered by the visa column
 * @method     array findByAfafAtfAwardNo(string $afaf_atf_award_no) Return EafFormInfo objects filtered by the afaf_atf_award_no column
 * @method     array findByTransFunds(string $trans_funds) Return EafFormInfo objects filtered by the trans_funds column
 * @method     array findByOffMaxPurchase(string $off_max_purchase) Return EafFormInfo objects filtered by the off_max_purchase column
 * @method     array findByCheckMailed(string $check_mailed) Return EafFormInfo objects filtered by the check_mailed column
 * @method     array findByTravel(string $travel) Return EafFormInfo objects filtered by the travel column
 * @method     array findByCheckPicked(string $check_picked) Return EafFormInfo objects filtered by the check_picked column
 * @method     array findByEventName(string $event_name) Return EafFormInfo objects filtered by the event_name column
 * @method     array findByDestination(string $destination) Return EafFormInfo objects filtered by the destination column
 * @method     array findByEventDate(string $event_date) Return EafFormInfo objects filtered by the event_date column
 * @method     array findByCompName(string $comp_name) Return EafFormInfo objects filtered by the comp_name column
 * @method     array findByCompAddress(string $comp_address) Return EafFormInfo objects filtered by the comp_address column
 * @method     array findByCompCity(string $comp_city) Return EafFormInfo objects filtered by the comp_city column
 * @method     array findByCompState(string $comp_state) Return EafFormInfo objects filtered by the comp_state column
 * @method     array findByCompZip(string $comp_zip) Return EafFormInfo objects filtered by the comp_zip column
 * @method     array findByCompPhone(string $comp_phone) Return EafFormInfo objects filtered by the comp_phone column
 * @method     array findByCompFax(string $comp_fax) Return EafFormInfo objects filtered by the comp_fax column
 * @method     array findByStudentId(int $student_id) Return EafFormInfo objects filtered by the student_id column
 * @method     array findByPurchaseDesc(string $purchase_desc) Return EafFormInfo objects filtered by the purchase_desc column
 * @method     array findByTotal(int $total) Return EafFormInfo objects filtered by the total column
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseEafFormInfoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEafFormInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'organizations', $modelName = 'OrganizationsORM\\EafFormInfo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EafFormInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EafFormInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EafFormInfoQuery) {
			return $criteria;
		}
		$query = new EafFormInfoQuery();
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
	 * @return    EafFormInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EafFormInfoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    EafFormInfo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `EAF_FORM_NO`, `VISA_NO`, `TXN_DUE_DATE`, `REQ_NAME`, `EAF_DATE`, `REQ_EMAIL`, `REQ_PHONE`, `REQ_CLUB_NAME`, `ALT_REQ_NAME`, `ALT_REQ_PHONE`, `ALT_REQ_EMAIL`, `ACCOUNT_NO`, `CASH_NEEDED`, `CHECK_PAYMENT`, `VEHICLE_RENTAL`, `HUB`, `VISA`, `AFAF_ATF_AWARD_NO`, `TRANS_FUNDS`, `OFF_MAX_PURCHASE`, `CHECK_MAILED`, `TRAVEL`, `CHECK_PICKED`, `EVENT_NAME`, `DESTINATION`, `EVENT_DATE`, `COMP_NAME`, `COMP_ADDRESS`, `COMP_CITY`, `COMP_STATE`, `COMP_ZIP`, `COMP_PHONE`, `COMP_FAX`, `STUDENT_ID`, `PURCHASE_DESC`, `TOTAL` FROM `eaf_form_info` WHERE `ID` = :p0';
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
			$obj = new EafFormInfo();
			$obj->hydrate($row);
			EafFormInfoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    EafFormInfo|array|mixed the result, formatted by the current formatter
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
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EafFormInfoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EafFormInfoPeer::ID, $keys, Criteria::IN);
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
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EafFormInfoPeer::ID, $id, $comparison);
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
	 * @param     mixed $eafFormNo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByEafFormNo($eafFormNo = null, $comparison = null)
	{
		if (is_array($eafFormNo)) {
			$useMinMax = false;
			if (isset($eafFormNo['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::EAF_FORM_NO, $eafFormNo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($eafFormNo['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::EAF_FORM_NO, $eafFormNo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::EAF_FORM_NO, $eafFormNo, $comparison);
	}

	/**
	 * Filter the query on the visa_no column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVisaNo(1234); // WHERE visa_no = 1234
	 * $query->filterByVisaNo(array(12, 34)); // WHERE visa_no IN (12, 34)
	 * $query->filterByVisaNo(array('min' => 12)); // WHERE visa_no > 12
	 * </code>
	 *
	 * @param     mixed $visaNo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByVisaNo($visaNo = null, $comparison = null)
	{
		if (is_array($visaNo)) {
			$useMinMax = false;
			if (isset($visaNo['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::VISA_NO, $visaNo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($visaNo['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::VISA_NO, $visaNo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::VISA_NO, $visaNo, $comparison);
	}

	/**
	 * Filter the query on the txn_due_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTxnDueDate('2011-03-14'); // WHERE txn_due_date = '2011-03-14'
	 * $query->filterByTxnDueDate('now'); // WHERE txn_due_date = '2011-03-14'
	 * $query->filterByTxnDueDate(array('max' => 'yesterday')); // WHERE txn_due_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $txnDueDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByTxnDueDate($txnDueDate = null, $comparison = null)
	{
		if (is_array($txnDueDate)) {
			$useMinMax = false;
			if (isset($txnDueDate['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::TXN_DUE_DATE, $txnDueDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($txnDueDate['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::TXN_DUE_DATE, $txnDueDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::TXN_DUE_DATE, $txnDueDate, $comparison);
	}

	/**
	 * Filter the query on the req_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReqName('fooValue');   // WHERE req_name = 'fooValue'
	 * $query->filterByReqName('%fooValue%'); // WHERE req_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reqName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByReqName($reqName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reqName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reqName)) {
				$reqName = str_replace('*', '%', $reqName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::REQ_NAME, $reqName, $comparison);
	}

	/**
	 * Filter the query on the eaf_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEafDate('2011-03-14'); // WHERE eaf_date = '2011-03-14'
	 * $query->filterByEafDate('now'); // WHERE eaf_date = '2011-03-14'
	 * $query->filterByEafDate(array('max' => 'yesterday')); // WHERE eaf_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $eafDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByEafDate($eafDate = null, $comparison = null)
	{
		if (is_array($eafDate)) {
			$useMinMax = false;
			if (isset($eafDate['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::EAF_DATE, $eafDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($eafDate['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::EAF_DATE, $eafDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::EAF_DATE, $eafDate, $comparison);
	}

	/**
	 * Filter the query on the req_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReqEmail('fooValue');   // WHERE req_email = 'fooValue'
	 * $query->filterByReqEmail('%fooValue%'); // WHERE req_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reqEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByReqEmail($reqEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reqEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reqEmail)) {
				$reqEmail = str_replace('*', '%', $reqEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::REQ_EMAIL, $reqEmail, $comparison);
	}

	/**
	 * Filter the query on the req_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReqPhone('fooValue');   // WHERE req_phone = 'fooValue'
	 * $query->filterByReqPhone('%fooValue%'); // WHERE req_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reqPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByReqPhone($reqPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reqPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reqPhone)) {
				$reqPhone = str_replace('*', '%', $reqPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::REQ_PHONE, $reqPhone, $comparison);
	}

	/**
	 * Filter the query on the req_club_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReqClubName('fooValue');   // WHERE req_club_name = 'fooValue'
	 * $query->filterByReqClubName('%fooValue%'); // WHERE req_club_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $reqClubName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByReqClubName($reqClubName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reqClubName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reqClubName)) {
				$reqClubName = str_replace('*', '%', $reqClubName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::REQ_CLUB_NAME, $reqClubName, $comparison);
	}

	/**
	 * Filter the query on the alt_req_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAltReqName('fooValue');   // WHERE alt_req_name = 'fooValue'
	 * $query->filterByAltReqName('%fooValue%'); // WHERE alt_req_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $altReqName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByAltReqName($altReqName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($altReqName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $altReqName)) {
				$altReqName = str_replace('*', '%', $altReqName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::ALT_REQ_NAME, $altReqName, $comparison);
	}

	/**
	 * Filter the query on the alt_req_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAltReqPhone('fooValue');   // WHERE alt_req_phone = 'fooValue'
	 * $query->filterByAltReqPhone('%fooValue%'); // WHERE alt_req_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $altReqPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByAltReqPhone($altReqPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($altReqPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $altReqPhone)) {
				$altReqPhone = str_replace('*', '%', $altReqPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::ALT_REQ_PHONE, $altReqPhone, $comparison);
	}

	/**
	 * Filter the query on the alt_req_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAltReqEmail('fooValue');   // WHERE alt_req_email = 'fooValue'
	 * $query->filterByAltReqEmail('%fooValue%'); // WHERE alt_req_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $altReqEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByAltReqEmail($altReqEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($altReqEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $altReqEmail)) {
				$altReqEmail = str_replace('*', '%', $altReqEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::ALT_REQ_EMAIL, $altReqEmail, $comparison);
	}

	/**
	 * Filter the query on the account_no column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAccountNo('fooValue');   // WHERE account_no = 'fooValue'
	 * $query->filterByAccountNo('%fooValue%'); // WHERE account_no LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $accountNo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByAccountNo($accountNo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($accountNo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $accountNo)) {
				$accountNo = str_replace('*', '%', $accountNo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::ACCOUNT_NO, $accountNo, $comparison);
	}

	/**
	 * Filter the query on the cash_needed column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCashNeeded('fooValue');   // WHERE cash_needed = 'fooValue'
	 * $query->filterByCashNeeded('%fooValue%'); // WHERE cash_needed LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cashNeeded The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCashNeeded($cashNeeded = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cashNeeded)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cashNeeded)) {
				$cashNeeded = str_replace('*', '%', $cashNeeded);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::CASH_NEEDED, $cashNeeded, $comparison);
	}

	/**
	 * Filter the query on the check_payment column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCheckPayment('fooValue');   // WHERE check_payment = 'fooValue'
	 * $query->filterByCheckPayment('%fooValue%'); // WHERE check_payment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $checkPayment The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCheckPayment($checkPayment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($checkPayment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $checkPayment)) {
				$checkPayment = str_replace('*', '%', $checkPayment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::CHECK_PAYMENT, $checkPayment, $comparison);
	}

	/**
	 * Filter the query on the vehicle_rental column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVehicleRental('fooValue');   // WHERE vehicle_rental = 'fooValue'
	 * $query->filterByVehicleRental('%fooValue%'); // WHERE vehicle_rental LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $vehicleRental The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByVehicleRental($vehicleRental = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($vehicleRental)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $vehicleRental)) {
				$vehicleRental = str_replace('*', '%', $vehicleRental);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::VEHICLE_RENTAL, $vehicleRental, $comparison);
	}

	/**
	 * Filter the query on the hub column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHub('fooValue');   // WHERE hub = 'fooValue'
	 * $query->filterByHub('%fooValue%'); // WHERE hub LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hub The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByHub($hub = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hub)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hub)) {
				$hub = str_replace('*', '%', $hub);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::HUB, $hub, $comparison);
	}

	/**
	 * Filter the query on the visa column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVisa('fooValue');   // WHERE visa = 'fooValue'
	 * $query->filterByVisa('%fooValue%'); // WHERE visa LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $visa The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByVisa($visa = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($visa)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $visa)) {
				$visa = str_replace('*', '%', $visa);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::VISA, $visa, $comparison);
	}

	/**
	 * Filter the query on the afaf_atf_award_no column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAfafAtfAwardNo('fooValue');   // WHERE afaf_atf_award_no = 'fooValue'
	 * $query->filterByAfafAtfAwardNo('%fooValue%'); // WHERE afaf_atf_award_no LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $afafAtfAwardNo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByAfafAtfAwardNo($afafAtfAwardNo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($afafAtfAwardNo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $afafAtfAwardNo)) {
				$afafAtfAwardNo = str_replace('*', '%', $afafAtfAwardNo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::AFAF_ATF_AWARD_NO, $afafAtfAwardNo, $comparison);
	}

	/**
	 * Filter the query on the trans_funds column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTransFunds('fooValue');   // WHERE trans_funds = 'fooValue'
	 * $query->filterByTransFunds('%fooValue%'); // WHERE trans_funds LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $transFunds The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByTransFunds($transFunds = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($transFunds)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $transFunds)) {
				$transFunds = str_replace('*', '%', $transFunds);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::TRANS_FUNDS, $transFunds, $comparison);
	}

	/**
	 * Filter the query on the off_max_purchase column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOffMaxPurchase('fooValue');   // WHERE off_max_purchase = 'fooValue'
	 * $query->filterByOffMaxPurchase('%fooValue%'); // WHERE off_max_purchase LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $offMaxPurchase The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByOffMaxPurchase($offMaxPurchase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($offMaxPurchase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $offMaxPurchase)) {
				$offMaxPurchase = str_replace('*', '%', $offMaxPurchase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::OFF_MAX_PURCHASE, $offMaxPurchase, $comparison);
	}

	/**
	 * Filter the query on the check_mailed column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCheckMailed('fooValue');   // WHERE check_mailed = 'fooValue'
	 * $query->filterByCheckMailed('%fooValue%'); // WHERE check_mailed LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $checkMailed The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCheckMailed($checkMailed = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($checkMailed)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $checkMailed)) {
				$checkMailed = str_replace('*', '%', $checkMailed);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::CHECK_MAILED, $checkMailed, $comparison);
	}

	/**
	 * Filter the query on the travel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTravel('fooValue');   // WHERE travel = 'fooValue'
	 * $query->filterByTravel('%fooValue%'); // WHERE travel LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $travel The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByTravel($travel = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($travel)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $travel)) {
				$travel = str_replace('*', '%', $travel);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::TRAVEL, $travel, $comparison);
	}

	/**
	 * Filter the query on the check_picked column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCheckPicked('fooValue');   // WHERE check_picked = 'fooValue'
	 * $query->filterByCheckPicked('%fooValue%'); // WHERE check_picked LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $checkPicked The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCheckPicked($checkPicked = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($checkPicked)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $checkPicked)) {
				$checkPicked = str_replace('*', '%', $checkPicked);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::CHECK_PICKED, $checkPicked, $comparison);
	}

	/**
	 * Filter the query on the event_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEventName('fooValue');   // WHERE event_name = 'fooValue'
	 * $query->filterByEventName('%fooValue%'); // WHERE event_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $eventName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByEventName($eventName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eventName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eventName)) {
				$eventName = str_replace('*', '%', $eventName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::EVENT_NAME, $eventName, $comparison);
	}

	/**
	 * Filter the query on the destination column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDestination('fooValue');   // WHERE destination = 'fooValue'
	 * $query->filterByDestination('%fooValue%'); // WHERE destination LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $destination The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByDestination($destination = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($destination)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $destination)) {
				$destination = str_replace('*', '%', $destination);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::DESTINATION, $destination, $comparison);
	}

	/**
	 * Filter the query on the event_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEventDate('2011-03-14'); // WHERE event_date = '2011-03-14'
	 * $query->filterByEventDate('now'); // WHERE event_date = '2011-03-14'
	 * $query->filterByEventDate(array('max' => 'yesterday')); // WHERE event_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $eventDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByEventDate($eventDate = null, $comparison = null)
	{
		if (is_array($eventDate)) {
			$useMinMax = false;
			if (isset($eventDate['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::EVENT_DATE, $eventDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($eventDate['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::EVENT_DATE, $eventDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::EVENT_DATE, $eventDate, $comparison);
	}

	/**
	 * Filter the query on the comp_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompName('fooValue');   // WHERE comp_name = 'fooValue'
	 * $query->filterByCompName('%fooValue%'); // WHERE comp_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompName($compName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compName)) {
				$compName = str_replace('*', '%', $compName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_NAME, $compName, $comparison);
	}

	/**
	 * Filter the query on the comp_address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompAddress('fooValue');   // WHERE comp_address = 'fooValue'
	 * $query->filterByCompAddress('%fooValue%'); // WHERE comp_address LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compAddress The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompAddress($compAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compAddress)) {
				$compAddress = str_replace('*', '%', $compAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_ADDRESS, $compAddress, $comparison);
	}

	/**
	 * Filter the query on the comp_city column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompCity('fooValue');   // WHERE comp_city = 'fooValue'
	 * $query->filterByCompCity('%fooValue%'); // WHERE comp_city LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compCity The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompCity($compCity = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compCity)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compCity)) {
				$compCity = str_replace('*', '%', $compCity);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_CITY, $compCity, $comparison);
	}

	/**
	 * Filter the query on the comp_state column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompState('fooValue');   // WHERE comp_state = 'fooValue'
	 * $query->filterByCompState('%fooValue%'); // WHERE comp_state LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compState The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompState($compState = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compState)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compState)) {
				$compState = str_replace('*', '%', $compState);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_STATE, $compState, $comparison);
	}

	/**
	 * Filter the query on the comp_zip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompZip('fooValue');   // WHERE comp_zip = 'fooValue'
	 * $query->filterByCompZip('%fooValue%'); // WHERE comp_zip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compZip The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompZip($compZip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compZip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compZip)) {
				$compZip = str_replace('*', '%', $compZip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_ZIP, $compZip, $comparison);
	}

	/**
	 * Filter the query on the comp_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompPhone('fooValue');   // WHERE comp_phone = 'fooValue'
	 * $query->filterByCompPhone('%fooValue%'); // WHERE comp_phone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compPhone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompPhone($compPhone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compPhone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compPhone)) {
				$compPhone = str_replace('*', '%', $compPhone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_PHONE, $compPhone, $comparison);
	}

	/**
	 * Filter the query on the comp_fax column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompFax('fooValue');   // WHERE comp_fax = 'fooValue'
	 * $query->filterByCompFax('%fooValue%'); // WHERE comp_fax LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $compFax The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByCompFax($compFax = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($compFax)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $compFax)) {
				$compFax = str_replace('*', '%', $compFax);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::COMP_FAX, $compFax, $comparison);
	}

	/**
	 * Filter the query on the student_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStudentId(1234); // WHERE student_id = 1234
	 * $query->filterByStudentId(array(12, 34)); // WHERE student_id IN (12, 34)
	 * $query->filterByStudentId(array('min' => 12)); // WHERE student_id > 12
	 * </code>
	 *
	 * @param     mixed $studentId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByStudentId($studentId = null, $comparison = null)
	{
		if (is_array($studentId)) {
			$useMinMax = false;
			if (isset($studentId['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::STUDENT_ID, $studentId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($studentId['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::STUDENT_ID, $studentId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::STUDENT_ID, $studentId, $comparison);
	}

	/**
	 * Filter the query on the purchase_desc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurchaseDesc('fooValue');   // WHERE purchase_desc = 'fooValue'
	 * $query->filterByPurchaseDesc('%fooValue%'); // WHERE purchase_desc LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $purchaseDesc The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByPurchaseDesc($purchaseDesc = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($purchaseDesc)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $purchaseDesc)) {
				$purchaseDesc = str_replace('*', '%', $purchaseDesc);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::PURCHASE_DESC, $purchaseDesc, $comparison);
	}

	/**
	 * Filter the query on the total column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTotal(1234); // WHERE total = 1234
	 * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
	 * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
	 * </code>
	 *
	 * @param     mixed $total The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null)
	{
		if (is_array($total)) {
			$useMinMax = false;
			if (isset($total['min'])) {
				$this->addUsingAlias(EafFormInfoPeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($total['max'])) {
				$this->addUsingAlias(EafFormInfoPeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EafFormInfoPeer::TOTAL, $total, $comparison);
	}

	/**
	 * Filter the query by a related EafApprovals object
	 *
	 * @param     EafApprovals $eafApprovals  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function filterByEafApprovals($eafApprovals, $comparison = null)
	{
		if ($eafApprovals instanceof EafApprovals) {
			return $this
				->addUsingAlias(EafFormInfoPeer::EAF_FORM_NO, $eafApprovals->getEafFormNo(), $comparison);
		} elseif ($eafApprovals instanceof PropelCollection) {
			return $this
				->useEafApprovalsQuery()
				->filterByPrimaryKeys($eafApprovals->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByEafApprovals() only accepts arguments of type EafApprovals or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the EafApprovals relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function joinEafApprovals($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EafApprovals');

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
			$this->addJoinObject($join, 'EafApprovals');
		}

		return $this;
	}

	/**
	 * Use the EafApprovals relation EafApprovals object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \OrganizationsORM\EafApprovalsQuery A secondary query class using the current class as primary query
	 */
	public function useEafApprovalsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEafApprovals($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EafApprovals', '\OrganizationsORM\EafApprovalsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     EafFormInfo $eafFormInfo Object to remove from the list of results
	 *
	 * @return    EafFormInfoQuery The current query, for fluid interface
	 */
	public function prune($eafFormInfo = null)
	{
		if ($eafFormInfo) {
			$this->addUsingAlias(EafFormInfoPeer::ID, $eafFormInfo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEafFormInfoQuery
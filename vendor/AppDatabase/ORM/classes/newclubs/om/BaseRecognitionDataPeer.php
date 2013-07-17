<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\RecognitionData;
use NewClubsORM\RecognitionDataPeer;
use NewClubsORM\map\RecognitionDataTableMap;

/**
 * Base static class for performing query and update operations on the 'recognition_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionDataPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'recognition_data';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\RecognitionData';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.RecognitionData';

	/** the related TableMap class for this table */
	const TM_CLASS = 'RecognitionDataTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 55;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 55;

	/** the column name for the ID field */
	const ID = 'recognition_data.ID';

	/** the column name for the CLUBTYPE field */
	const CLUBTYPE = 'recognition_data.CLUBTYPE';

	/** the column name for the ITF field */
	const ITF = 'recognition_data.ITF';

	/** the column name for the CLUBNAME field */
	const CLUBNAME = 'recognition_data.CLUBNAME';

	/** the column name for the ACRONYM field */
	const ACRONYM = 'recognition_data.ACRONYM';

	/** the column name for the SPORTS_CLUB field */
	const SPORTS_CLUB = 'recognition_data.SPORTS_CLUB';

	/** the column name for the SEASON field */
	const SEASON = 'recognition_data.SEASON';

	/** the column name for the CFIRST field */
	const CFIRST = 'recognition_data.CFIRST';

	/** the column name for the CLAST field */
	const CLAST = 'recognition_data.CLAST';

	/** the column name for the CPHONE field */
	const CPHONE = 'recognition_data.CPHONE';

	/** the column name for the CEMAIL field */
	const CEMAIL = 'recognition_data.CEMAIL';

	/** the column name for the LEAGUE field */
	const LEAGUE = 'recognition_data.LEAGUE';

	/** the column name for the LEAGUEFEES field */
	const LEAGUEFEES = 'recognition_data.LEAGUEFEES';

	/** the column name for the SPORTS_TRAVEL field */
	const SPORTS_TRAVEL = 'recognition_data.SPORTS_TRAVEL';

	/** the column name for the SPORTSEXPENSES field */
	const SPORTSEXPENSES = 'recognition_data.SPORTSEXPENSES';

	/** the column name for the URL field */
	const URL = 'recognition_data.URL';

	/** the column name for the GEN_EMAIL field */
	const GEN_EMAIL = 'recognition_data.GEN_EMAIL';

	/** the column name for the SUBMITTER field */
	const SUBMITTER = 'recognition_data.SUBMITTER';

	/** the column name for the S_POSITION field */
	const S_POSITION = 'recognition_data.S_POSITION';

	/** the column name for the S_EMAIL field */
	const S_EMAIL = 'recognition_data.S_EMAIL';

	/** the column name for the A_FIRST field */
	const A_FIRST = 'recognition_data.A_FIRST';

	/** the column name for the A_LAST field */
	const A_LAST = 'recognition_data.A_LAST';

	/** the column name for the A_CPHONE field */
	const A_CPHONE = 'recognition_data.A_CPHONE';

	/** the column name for the A_HPHONE field */
	const A_HPHONE = 'recognition_data.A_HPHONE';

	/** the column name for the A_OFFICE field */
	const A_OFFICE = 'recognition_data.A_OFFICE';

	/** the column name for the A_DEPT field */
	const A_DEPT = 'recognition_data.A_DEPT';

	/** the column name for the A_EMAIL field */
	const A_EMAIL = 'recognition_data.A_EMAIL';

	/** the column name for the TARGET field */
	const TARGET = 'recognition_data.TARGET';

	/** the column name for the MEETINGS field */
	const MEETINGS = 'recognition_data.MEETINGS';

	/** the column name for the MEMBERCOUNT field */
	const MEMBERCOUNT = 'recognition_data.MEMBERCOUNT';

	/** the column name for the FEES field */
	const FEES = 'recognition_data.FEES';

	/** the column name for the ELECTIONS field */
	const ELECTIONS = 'recognition_data.ELECTIONS';

	/** the column name for the S_PHONE field */
	const S_PHONE = 'recognition_data.S_PHONE';

	/** the column name for the PURPOSE field */
	const PURPOSE = 'recognition_data.PURPOSE';

	/** the column name for the SIGNATURE field */
	const SIGNATURE = 'recognition_data.SIGNATURE';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'recognition_data.ORG_ID';

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'recognition_data.REPORT_ID';

	/** the column name for the PRESIDENT field */
	const PRESIDENT = 'recognition_data.PRESIDENT';

	/** the column name for the VICE field */
	const VICE = 'recognition_data.VICE';

	/** the column name for the TREASURER field */
	const TREASURER = 'recognition_data.TREASURER';

	/** the column name for the SECRETARY field */
	const SECRETARY = 'recognition_data.SECRETARY';

	/** the column name for the BOARD field */
	const BOARD = 'recognition_data.BOARD';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'recognition_data.MEMBERS';

	/** the column name for the FALL field */
	const FALL = 'recognition_data.FALL';

	/** the column name for the WINTER field */
	const WINTER = 'recognition_data.WINTER';

	/** the column name for the SPRING field */
	const SPRING = 'recognition_data.SPRING';

	/** the column name for the SUMMER field */
	const SUMMER = 'recognition_data.SUMMER';

	/** the column name for the OPEN_HOUSE field */
	const OPEN_HOUSE = 'recognition_data.OPEN_HOUSE';

	/** the column name for the PROMO field */
	const PROMO = 'recognition_data.PROMO';

	/** the column name for the SIG_PRES field */
	const SIG_PRES = 'recognition_data.SIG_PRES';

	/** the column name for the SIG_ADV field */
	const SIG_ADV = 'recognition_data.SIG_ADV';

	/** the column name for the REASON field */
	const REASON = 'recognition_data.REASON';

	/** the column name for the STATUS field */
	const STATUS = 'recognition_data.STATUS';

	/** the column name for the LAST_UPDATED field */
	const LAST_UPDATED = 'recognition_data.LAST_UPDATED';

	/** the column name for the DATE field */
	const DATE = 'recognition_data.DATE';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of RecognitionData objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array RecognitionData[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Clubtype', 'Itf', 'Clubname', 'Acronym', 'SportsClub', 'Season', 'Cfirst', 'Clast', 'Cphone', 'Cemail', 'League', 'Leaguefees', 'SportsTravel', 'Sportsexpenses', 'Url', 'GenEmail', 'Submitter', 'SPosition', 'SEmail', 'AFirst', 'ALast', 'ACphone', 'AHphone', 'AOffice', 'ADept', 'AEmail', 'Target', 'Meetings', 'Membercount', 'Fees', 'Elections', 'SPhone', 'Purpose', 'Signature', 'OrgId', 'ReportId', 'President', 'Vice', 'Treasurer', 'Secretary', 'Board', 'Members', 'Fall', 'Winter', 'Spring', 'Summer', 'OpenHouse', 'Promo', 'SigPres', 'SigAdv', 'Reason', 'Status', 'LastUpdated', 'Date', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'clubtype', 'itf', 'clubname', 'acronym', 'sportsClub', 'season', 'cfirst', 'clast', 'cphone', 'cemail', 'league', 'leaguefees', 'sportsTravel', 'sportsexpenses', 'url', 'genEmail', 'submitter', 'sPosition', 'sEmail', 'aFirst', 'aLast', 'aCphone', 'aHphone', 'aOffice', 'aDept', 'aEmail', 'target', 'meetings', 'membercount', 'fees', 'elections', 'sPhone', 'purpose', 'signature', 'orgId', 'reportId', 'president', 'vice', 'treasurer', 'secretary', 'board', 'members', 'fall', 'winter', 'spring', 'summer', 'openHouse', 'promo', 'sigPres', 'sigAdv', 'reason', 'status', 'lastUpdated', 'date', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CLUBTYPE, self::ITF, self::CLUBNAME, self::ACRONYM, self::SPORTS_CLUB, self::SEASON, self::CFIRST, self::CLAST, self::CPHONE, self::CEMAIL, self::LEAGUE, self::LEAGUEFEES, self::SPORTS_TRAVEL, self::SPORTSEXPENSES, self::URL, self::GEN_EMAIL, self::SUBMITTER, self::S_POSITION, self::S_EMAIL, self::A_FIRST, self::A_LAST, self::A_CPHONE, self::A_HPHONE, self::A_OFFICE, self::A_DEPT, self::A_EMAIL, self::TARGET, self::MEETINGS, self::MEMBERCOUNT, self::FEES, self::ELECTIONS, self::S_PHONE, self::PURPOSE, self::SIGNATURE, self::ORG_ID, self::REPORT_ID, self::PRESIDENT, self::VICE, self::TREASURER, self::SECRETARY, self::BOARD, self::MEMBERS, self::FALL, self::WINTER, self::SPRING, self::SUMMER, self::OPEN_HOUSE, self::PROMO, self::SIG_PRES, self::SIG_ADV, self::REASON, self::STATUS, self::LAST_UPDATED, self::DATE, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CLUBTYPE', 'ITF', 'CLUBNAME', 'ACRONYM', 'SPORTS_CLUB', 'SEASON', 'CFIRST', 'CLAST', 'CPHONE', 'CEMAIL', 'LEAGUE', 'LEAGUEFEES', 'SPORTS_TRAVEL', 'SPORTSEXPENSES', 'URL', 'GEN_EMAIL', 'SUBMITTER', 'S_POSITION', 'S_EMAIL', 'A_FIRST', 'A_LAST', 'A_CPHONE', 'A_HPHONE', 'A_OFFICE', 'A_DEPT', 'A_EMAIL', 'TARGET', 'MEETINGS', 'MEMBERCOUNT', 'FEES', 'ELECTIONS', 'S_PHONE', 'PURPOSE', 'SIGNATURE', 'ORG_ID', 'REPORT_ID', 'PRESIDENT', 'VICE', 'TREASURER', 'SECRETARY', 'BOARD', 'MEMBERS', 'FALL', 'WINTER', 'SPRING', 'SUMMER', 'OPEN_HOUSE', 'PROMO', 'SIG_PRES', 'SIG_ADV', 'REASON', 'STATUS', 'LAST_UPDATED', 'DATE', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'clubtype', 'itf', 'clubname', 'acronym', 'sports_club', 'season', 'cfirst', 'clast', 'cphone', 'cemail', 'league', 'leaguefees', 'sports_travel', 'sportsexpenses', 'url', 'gen_email', 'submitter', 's_position', 's_email', 'a_first', 'a_last', 'a_cphone', 'a_hphone', 'a_office', 'a_dept', 'a_email', 'target', 'meetings', 'membercount', 'fees', 'elections', 's_phone', 'purpose', 'signature', 'org_id', 'report_id', 'president', 'vice', 'treasurer', 'secretary', 'board', 'members', 'fall', 'winter', 'spring', 'summer', 'open_house', 'promo', 'sig_pres', 'sig_adv', 'reason', 'status', 'last_updated', 'date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Clubtype' => 1, 'Itf' => 2, 'Clubname' => 3, 'Acronym' => 4, 'SportsClub' => 5, 'Season' => 6, 'Cfirst' => 7, 'Clast' => 8, 'Cphone' => 9, 'Cemail' => 10, 'League' => 11, 'Leaguefees' => 12, 'SportsTravel' => 13, 'Sportsexpenses' => 14, 'Url' => 15, 'GenEmail' => 16, 'Submitter' => 17, 'SPosition' => 18, 'SEmail' => 19, 'AFirst' => 20, 'ALast' => 21, 'ACphone' => 22, 'AHphone' => 23, 'AOffice' => 24, 'ADept' => 25, 'AEmail' => 26, 'Target' => 27, 'Meetings' => 28, 'Membercount' => 29, 'Fees' => 30, 'Elections' => 31, 'SPhone' => 32, 'Purpose' => 33, 'Signature' => 34, 'OrgId' => 35, 'ReportId' => 36, 'President' => 37, 'Vice' => 38, 'Treasurer' => 39, 'Secretary' => 40, 'Board' => 41, 'Members' => 42, 'Fall' => 43, 'Winter' => 44, 'Spring' => 45, 'Summer' => 46, 'OpenHouse' => 47, 'Promo' => 48, 'SigPres' => 49, 'SigAdv' => 50, 'Reason' => 51, 'Status' => 52, 'LastUpdated' => 53, 'Date' => 54, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'clubtype' => 1, 'itf' => 2, 'clubname' => 3, 'acronym' => 4, 'sportsClub' => 5, 'season' => 6, 'cfirst' => 7, 'clast' => 8, 'cphone' => 9, 'cemail' => 10, 'league' => 11, 'leaguefees' => 12, 'sportsTravel' => 13, 'sportsexpenses' => 14, 'url' => 15, 'genEmail' => 16, 'submitter' => 17, 'sPosition' => 18, 'sEmail' => 19, 'aFirst' => 20, 'aLast' => 21, 'aCphone' => 22, 'aHphone' => 23, 'aOffice' => 24, 'aDept' => 25, 'aEmail' => 26, 'target' => 27, 'meetings' => 28, 'membercount' => 29, 'fees' => 30, 'elections' => 31, 'sPhone' => 32, 'purpose' => 33, 'signature' => 34, 'orgId' => 35, 'reportId' => 36, 'president' => 37, 'vice' => 38, 'treasurer' => 39, 'secretary' => 40, 'board' => 41, 'members' => 42, 'fall' => 43, 'winter' => 44, 'spring' => 45, 'summer' => 46, 'openHouse' => 47, 'promo' => 48, 'sigPres' => 49, 'sigAdv' => 50, 'reason' => 51, 'status' => 52, 'lastUpdated' => 53, 'date' => 54, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CLUBTYPE => 1, self::ITF => 2, self::CLUBNAME => 3, self::ACRONYM => 4, self::SPORTS_CLUB => 5, self::SEASON => 6, self::CFIRST => 7, self::CLAST => 8, self::CPHONE => 9, self::CEMAIL => 10, self::LEAGUE => 11, self::LEAGUEFEES => 12, self::SPORTS_TRAVEL => 13, self::SPORTSEXPENSES => 14, self::URL => 15, self::GEN_EMAIL => 16, self::SUBMITTER => 17, self::S_POSITION => 18, self::S_EMAIL => 19, self::A_FIRST => 20, self::A_LAST => 21, self::A_CPHONE => 22, self::A_HPHONE => 23, self::A_OFFICE => 24, self::A_DEPT => 25, self::A_EMAIL => 26, self::TARGET => 27, self::MEETINGS => 28, self::MEMBERCOUNT => 29, self::FEES => 30, self::ELECTIONS => 31, self::S_PHONE => 32, self::PURPOSE => 33, self::SIGNATURE => 34, self::ORG_ID => 35, self::REPORT_ID => 36, self::PRESIDENT => 37, self::VICE => 38, self::TREASURER => 39, self::SECRETARY => 40, self::BOARD => 41, self::MEMBERS => 42, self::FALL => 43, self::WINTER => 44, self::SPRING => 45, self::SUMMER => 46, self::OPEN_HOUSE => 47, self::PROMO => 48, self::SIG_PRES => 49, self::SIG_ADV => 50, self::REASON => 51, self::STATUS => 52, self::LAST_UPDATED => 53, self::DATE => 54, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CLUBTYPE' => 1, 'ITF' => 2, 'CLUBNAME' => 3, 'ACRONYM' => 4, 'SPORTS_CLUB' => 5, 'SEASON' => 6, 'CFIRST' => 7, 'CLAST' => 8, 'CPHONE' => 9, 'CEMAIL' => 10, 'LEAGUE' => 11, 'LEAGUEFEES' => 12, 'SPORTS_TRAVEL' => 13, 'SPORTSEXPENSES' => 14, 'URL' => 15, 'GEN_EMAIL' => 16, 'SUBMITTER' => 17, 'S_POSITION' => 18, 'S_EMAIL' => 19, 'A_FIRST' => 20, 'A_LAST' => 21, 'A_CPHONE' => 22, 'A_HPHONE' => 23, 'A_OFFICE' => 24, 'A_DEPT' => 25, 'A_EMAIL' => 26, 'TARGET' => 27, 'MEETINGS' => 28, 'MEMBERCOUNT' => 29, 'FEES' => 30, 'ELECTIONS' => 31, 'S_PHONE' => 32, 'PURPOSE' => 33, 'SIGNATURE' => 34, 'ORG_ID' => 35, 'REPORT_ID' => 36, 'PRESIDENT' => 37, 'VICE' => 38, 'TREASURER' => 39, 'SECRETARY' => 40, 'BOARD' => 41, 'MEMBERS' => 42, 'FALL' => 43, 'WINTER' => 44, 'SPRING' => 45, 'SUMMER' => 46, 'OPEN_HOUSE' => 47, 'PROMO' => 48, 'SIG_PRES' => 49, 'SIG_ADV' => 50, 'REASON' => 51, 'STATUS' => 52, 'LAST_UPDATED' => 53, 'DATE' => 54, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'clubtype' => 1, 'itf' => 2, 'clubname' => 3, 'acronym' => 4, 'sports_club' => 5, 'season' => 6, 'cfirst' => 7, 'clast' => 8, 'cphone' => 9, 'cemail' => 10, 'league' => 11, 'leaguefees' => 12, 'sports_travel' => 13, 'sportsexpenses' => 14, 'url' => 15, 'gen_email' => 16, 'submitter' => 17, 's_position' => 18, 's_email' => 19, 'a_first' => 20, 'a_last' => 21, 'a_cphone' => 22, 'a_hphone' => 23, 'a_office' => 24, 'a_dept' => 25, 'a_email' => 26, 'target' => 27, 'meetings' => 28, 'membercount' => 29, 'fees' => 30, 'elections' => 31, 's_phone' => 32, 'purpose' => 33, 'signature' => 34, 'org_id' => 35, 'report_id' => 36, 'president' => 37, 'vice' => 38, 'treasurer' => 39, 'secretary' => 40, 'board' => 41, 'members' => 42, 'fall' => 43, 'winter' => 44, 'spring' => 45, 'summer' => 46, 'open_house' => 47, 'promo' => 48, 'sig_pres' => 49, 'sig_adv' => 50, 'reason' => 51, 'status' => 52, 'last_updated' => 53, 'date' => 54, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. RecognitionDataPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RecognitionDataPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(RecognitionDataPeer::ID);
			$criteria->addSelectColumn(RecognitionDataPeer::CLUBTYPE);
			$criteria->addSelectColumn(RecognitionDataPeer::ITF);
			$criteria->addSelectColumn(RecognitionDataPeer::CLUBNAME);
			$criteria->addSelectColumn(RecognitionDataPeer::ACRONYM);
			$criteria->addSelectColumn(RecognitionDataPeer::SPORTS_CLUB);
			$criteria->addSelectColumn(RecognitionDataPeer::SEASON);
			$criteria->addSelectColumn(RecognitionDataPeer::CFIRST);
			$criteria->addSelectColumn(RecognitionDataPeer::CLAST);
			$criteria->addSelectColumn(RecognitionDataPeer::CPHONE);
			$criteria->addSelectColumn(RecognitionDataPeer::CEMAIL);
			$criteria->addSelectColumn(RecognitionDataPeer::LEAGUE);
			$criteria->addSelectColumn(RecognitionDataPeer::LEAGUEFEES);
			$criteria->addSelectColumn(RecognitionDataPeer::SPORTS_TRAVEL);
			$criteria->addSelectColumn(RecognitionDataPeer::SPORTSEXPENSES);
			$criteria->addSelectColumn(RecognitionDataPeer::URL);
			$criteria->addSelectColumn(RecognitionDataPeer::GEN_EMAIL);
			$criteria->addSelectColumn(RecognitionDataPeer::SUBMITTER);
			$criteria->addSelectColumn(RecognitionDataPeer::S_POSITION);
			$criteria->addSelectColumn(RecognitionDataPeer::S_EMAIL);
			$criteria->addSelectColumn(RecognitionDataPeer::A_FIRST);
			$criteria->addSelectColumn(RecognitionDataPeer::A_LAST);
			$criteria->addSelectColumn(RecognitionDataPeer::A_CPHONE);
			$criteria->addSelectColumn(RecognitionDataPeer::A_HPHONE);
			$criteria->addSelectColumn(RecognitionDataPeer::A_OFFICE);
			$criteria->addSelectColumn(RecognitionDataPeer::A_DEPT);
			$criteria->addSelectColumn(RecognitionDataPeer::A_EMAIL);
			$criteria->addSelectColumn(RecognitionDataPeer::TARGET);
			$criteria->addSelectColumn(RecognitionDataPeer::MEETINGS);
			$criteria->addSelectColumn(RecognitionDataPeer::MEMBERCOUNT);
			$criteria->addSelectColumn(RecognitionDataPeer::FEES);
			$criteria->addSelectColumn(RecognitionDataPeer::ELECTIONS);
			$criteria->addSelectColumn(RecognitionDataPeer::S_PHONE);
			$criteria->addSelectColumn(RecognitionDataPeer::PURPOSE);
			$criteria->addSelectColumn(RecognitionDataPeer::SIGNATURE);
			$criteria->addSelectColumn(RecognitionDataPeer::ORG_ID);
			$criteria->addSelectColumn(RecognitionDataPeer::REPORT_ID);
			$criteria->addSelectColumn(RecognitionDataPeer::PRESIDENT);
			$criteria->addSelectColumn(RecognitionDataPeer::VICE);
			$criteria->addSelectColumn(RecognitionDataPeer::TREASURER);
			$criteria->addSelectColumn(RecognitionDataPeer::SECRETARY);
			$criteria->addSelectColumn(RecognitionDataPeer::BOARD);
			$criteria->addSelectColumn(RecognitionDataPeer::MEMBERS);
			$criteria->addSelectColumn(RecognitionDataPeer::FALL);
			$criteria->addSelectColumn(RecognitionDataPeer::WINTER);
			$criteria->addSelectColumn(RecognitionDataPeer::SPRING);
			$criteria->addSelectColumn(RecognitionDataPeer::SUMMER);
			$criteria->addSelectColumn(RecognitionDataPeer::OPEN_HOUSE);
			$criteria->addSelectColumn(RecognitionDataPeer::PROMO);
			$criteria->addSelectColumn(RecognitionDataPeer::SIG_PRES);
			$criteria->addSelectColumn(RecognitionDataPeer::SIG_ADV);
			$criteria->addSelectColumn(RecognitionDataPeer::REASON);
			$criteria->addSelectColumn(RecognitionDataPeer::STATUS);
			$criteria->addSelectColumn(RecognitionDataPeer::LAST_UPDATED);
			$criteria->addSelectColumn(RecognitionDataPeer::DATE);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CLUBTYPE');
			$criteria->addSelectColumn($alias . '.ITF');
			$criteria->addSelectColumn($alias . '.CLUBNAME');
			$criteria->addSelectColumn($alias . '.ACRONYM');
			$criteria->addSelectColumn($alias . '.SPORTS_CLUB');
			$criteria->addSelectColumn($alias . '.SEASON');
			$criteria->addSelectColumn($alias . '.CFIRST');
			$criteria->addSelectColumn($alias . '.CLAST');
			$criteria->addSelectColumn($alias . '.CPHONE');
			$criteria->addSelectColumn($alias . '.CEMAIL');
			$criteria->addSelectColumn($alias . '.LEAGUE');
			$criteria->addSelectColumn($alias . '.LEAGUEFEES');
			$criteria->addSelectColumn($alias . '.SPORTS_TRAVEL');
			$criteria->addSelectColumn($alias . '.SPORTSEXPENSES');
			$criteria->addSelectColumn($alias . '.URL');
			$criteria->addSelectColumn($alias . '.GEN_EMAIL');
			$criteria->addSelectColumn($alias . '.SUBMITTER');
			$criteria->addSelectColumn($alias . '.S_POSITION');
			$criteria->addSelectColumn($alias . '.S_EMAIL');
			$criteria->addSelectColumn($alias . '.A_FIRST');
			$criteria->addSelectColumn($alias . '.A_LAST');
			$criteria->addSelectColumn($alias . '.A_CPHONE');
			$criteria->addSelectColumn($alias . '.A_HPHONE');
			$criteria->addSelectColumn($alias . '.A_OFFICE');
			$criteria->addSelectColumn($alias . '.A_DEPT');
			$criteria->addSelectColumn($alias . '.A_EMAIL');
			$criteria->addSelectColumn($alias . '.TARGET');
			$criteria->addSelectColumn($alias . '.MEETINGS');
			$criteria->addSelectColumn($alias . '.MEMBERCOUNT');
			$criteria->addSelectColumn($alias . '.FEES');
			$criteria->addSelectColumn($alias . '.ELECTIONS');
			$criteria->addSelectColumn($alias . '.S_PHONE');
			$criteria->addSelectColumn($alias . '.PURPOSE');
			$criteria->addSelectColumn($alias . '.SIGNATURE');
			$criteria->addSelectColumn($alias . '.ORG_ID');
			$criteria->addSelectColumn($alias . '.REPORT_ID');
			$criteria->addSelectColumn($alias . '.PRESIDENT');
			$criteria->addSelectColumn($alias . '.VICE');
			$criteria->addSelectColumn($alias . '.TREASURER');
			$criteria->addSelectColumn($alias . '.SECRETARY');
			$criteria->addSelectColumn($alias . '.BOARD');
			$criteria->addSelectColumn($alias . '.MEMBERS');
			$criteria->addSelectColumn($alias . '.FALL');
			$criteria->addSelectColumn($alias . '.WINTER');
			$criteria->addSelectColumn($alias . '.SPRING');
			$criteria->addSelectColumn($alias . '.SUMMER');
			$criteria->addSelectColumn($alias . '.OPEN_HOUSE');
			$criteria->addSelectColumn($alias . '.PROMO');
			$criteria->addSelectColumn($alias . '.SIG_PRES');
			$criteria->addSelectColumn($alias . '.SIG_ADV');
			$criteria->addSelectColumn($alias . '.REASON');
			$criteria->addSelectColumn($alias . '.STATUS');
			$criteria->addSelectColumn($alias . '.LAST_UPDATED');
			$criteria->addSelectColumn($alias . '.DATE');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(RecognitionDataPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RecognitionDataPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     RecognitionData
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RecognitionDataPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RecognitionDataPeer::populateObjects(RecognitionDataPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RecognitionDataPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      RecognitionData $value A RecognitionData object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A RecognitionData object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RecognitionData) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RecognitionData object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     RecognitionData Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to recognition_data
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = RecognitionDataPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RecognitionDataPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RecognitionDataPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RecognitionDataPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (RecognitionData object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = RecognitionDataPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = RecognitionDataPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + RecognitionDataPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = RecognitionDataPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			RecognitionDataPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseRecognitionDataPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseRecognitionDataPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new RecognitionDataTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? RecognitionDataPeer::CLASS_DEFAULT : RecognitionDataPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a RecognitionData or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionData object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from RecognitionData object
		}

		if ($criteria->containsKey(RecognitionDataPeer::ID) && $criteria->keyContainsValue(RecognitionDataPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RecognitionDataPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a RecognitionData or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionData object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RecognitionDataPeer::ID);
			$value = $criteria->remove(RecognitionDataPeer::ID);
			if ($value) {
				$selectCriteria->add(RecognitionDataPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(RecognitionDataPeer::TABLE_NAME);
			}

		} else { // $values is RecognitionData object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the recognition_data table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RecognitionDataPeer::TABLE_NAME, $con, RecognitionDataPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			RecognitionDataPeer::clearInstancePool();
			RecognitionDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a RecognitionData or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or RecognitionData object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RecognitionDataPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof RecognitionData) { // it's a model object
			// invalidate the cache for this single object
			RecognitionDataPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RecognitionDataPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				RecognitionDataPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			RecognitionDataPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given RecognitionData object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      RecognitionData $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecognitionDataPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecognitionDataPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(RecognitionDataPeer::DATABASE_NAME, RecognitionDataPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     RecognitionData
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RecognitionDataPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RecognitionDataPeer::DATABASE_NAME);
		$criteria->add(RecognitionDataPeer::ID, $pk);

		$v = RecognitionDataPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RecognitionDataPeer::DATABASE_NAME);
			$criteria->add(RecognitionDataPeer::ID, $pks, Criteria::IN);
			$objs = RecognitionDataPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRecognitionDataPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRecognitionDataPeer::buildTableMap();


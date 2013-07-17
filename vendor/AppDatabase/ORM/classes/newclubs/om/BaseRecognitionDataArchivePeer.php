<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\RecognitionDataArchive;
use NewClubsORM\RecognitionDataArchivePeer;
use NewClubsORM\map\RecognitionDataArchiveTableMap;

/**
 * Base static class for performing query and update operations on the 'recognition_data_archive' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionDataArchivePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'recognition_data_archive';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\RecognitionDataArchive';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.RecognitionDataArchive';

	/** the related TableMap class for this table */
	const TM_CLASS = 'RecognitionDataArchiveTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 45;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 45;

	/** the column name for the ID field */
	const ID = 'recognition_data_archive.ID';

	/** the column name for the CLUBTYPE field */
	const CLUBTYPE = 'recognition_data_archive.CLUBTYPE';

	/** the column name for the ITF field */
	const ITF = 'recognition_data_archive.ITF';

	/** the column name for the CLUBNAME field */
	const CLUBNAME = 'recognition_data_archive.CLUBNAME';

	/** the column name for the ACRONYM field */
	const ACRONYM = 'recognition_data_archive.ACRONYM';

	/** the column name for the URL field */
	const URL = 'recognition_data_archive.URL';

	/** the column name for the GEN_EMAIL field */
	const GEN_EMAIL = 'recognition_data_archive.GEN_EMAIL';

	/** the column name for the SUBMITTER field */
	const SUBMITTER = 'recognition_data_archive.SUBMITTER';

	/** the column name for the S_POSITION field */
	const S_POSITION = 'recognition_data_archive.S_POSITION';

	/** the column name for the S_EMAIL field */
	const S_EMAIL = 'recognition_data_archive.S_EMAIL';

	/** the column name for the A_FIRST field */
	const A_FIRST = 'recognition_data_archive.A_FIRST';

	/** the column name for the A_LAST field */
	const A_LAST = 'recognition_data_archive.A_LAST';

	/** the column name for the A_CPHONE field */
	const A_CPHONE = 'recognition_data_archive.A_CPHONE';

	/** the column name for the A_HPHONE field */
	const A_HPHONE = 'recognition_data_archive.A_HPHONE';

	/** the column name for the A_OFFICE field */
	const A_OFFICE = 'recognition_data_archive.A_OFFICE';

	/** the column name for the A_DEPT field */
	const A_DEPT = 'recognition_data_archive.A_DEPT';

	/** the column name for the A_EMAIL field */
	const A_EMAIL = 'recognition_data_archive.A_EMAIL';

	/** the column name for the TARGET field */
	const TARGET = 'recognition_data_archive.TARGET';

	/** the column name for the MEETINGS field */
	const MEETINGS = 'recognition_data_archive.MEETINGS';

	/** the column name for the MEMBERCOUNT field */
	const MEMBERCOUNT = 'recognition_data_archive.MEMBERCOUNT';

	/** the column name for the FEES field */
	const FEES = 'recognition_data_archive.FEES';

	/** the column name for the ELECTIONS field */
	const ELECTIONS = 'recognition_data_archive.ELECTIONS';

	/** the column name for the S_PHONE field */
	const S_PHONE = 'recognition_data_archive.S_PHONE';

	/** the column name for the PURPOSE field */
	const PURPOSE = 'recognition_data_archive.PURPOSE';

	/** the column name for the SIGNATURE field */
	const SIGNATURE = 'recognition_data_archive.SIGNATURE';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'recognition_data_archive.ORG_ID';

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'recognition_data_archive.REPORT_ID';

	/** the column name for the PRESIDENT field */
	const PRESIDENT = 'recognition_data_archive.PRESIDENT';

	/** the column name for the VICE field */
	const VICE = 'recognition_data_archive.VICE';

	/** the column name for the TREASURER field */
	const TREASURER = 'recognition_data_archive.TREASURER';

	/** the column name for the SECRETARY field */
	const SECRETARY = 'recognition_data_archive.SECRETARY';

	/** the column name for the BOARD field */
	const BOARD = 'recognition_data_archive.BOARD';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'recognition_data_archive.MEMBERS';

	/** the column name for the FALL field */
	const FALL = 'recognition_data_archive.FALL';

	/** the column name for the WINTER field */
	const WINTER = 'recognition_data_archive.WINTER';

	/** the column name for the SPRING field */
	const SPRING = 'recognition_data_archive.SPRING';

	/** the column name for the SUMMER field */
	const SUMMER = 'recognition_data_archive.SUMMER';

	/** the column name for the OPEN_HOUSE field */
	const OPEN_HOUSE = 'recognition_data_archive.OPEN_HOUSE';

	/** the column name for the PROMO field */
	const PROMO = 'recognition_data_archive.PROMO';

	/** the column name for the SIG_PRES field */
	const SIG_PRES = 'recognition_data_archive.SIG_PRES';

	/** the column name for the SIG_ADV field */
	const SIG_ADV = 'recognition_data_archive.SIG_ADV';

	/** the column name for the REASON field */
	const REASON = 'recognition_data_archive.REASON';

	/** the column name for the STATUS field */
	const STATUS = 'recognition_data_archive.STATUS';

	/** the column name for the LAST_UPDATED field */
	const LAST_UPDATED = 'recognition_data_archive.LAST_UPDATED';

	/** the column name for the DATE field */
	const DATE = 'recognition_data_archive.DATE';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of RecognitionDataArchive objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array RecognitionDataArchive[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Clubtype', 'Itf', 'Clubname', 'Acronym', 'Url', 'GenEmail', 'Submitter', 'SPosition', 'SEmail', 'AFirst', 'ALast', 'ACphone', 'AHphone', 'AOffice', 'ADept', 'AEmail', 'Target', 'Meetings', 'Membercount', 'Fees', 'Elections', 'SPhone', 'Purpose', 'Signature', 'OrgId', 'ReportId', 'President', 'Vice', 'Treasurer', 'Secretary', 'Board', 'Members', 'Fall', 'Winter', 'Spring', 'Summer', 'OpenHouse', 'Promo', 'SigPres', 'SigAdv', 'Reason', 'Status', 'LastUpdated', 'Date', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'clubtype', 'itf', 'clubname', 'acronym', 'url', 'genEmail', 'submitter', 'sPosition', 'sEmail', 'aFirst', 'aLast', 'aCphone', 'aHphone', 'aOffice', 'aDept', 'aEmail', 'target', 'meetings', 'membercount', 'fees', 'elections', 'sPhone', 'purpose', 'signature', 'orgId', 'reportId', 'president', 'vice', 'treasurer', 'secretary', 'board', 'members', 'fall', 'winter', 'spring', 'summer', 'openHouse', 'promo', 'sigPres', 'sigAdv', 'reason', 'status', 'lastUpdated', 'date', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CLUBTYPE, self::ITF, self::CLUBNAME, self::ACRONYM, self::URL, self::GEN_EMAIL, self::SUBMITTER, self::S_POSITION, self::S_EMAIL, self::A_FIRST, self::A_LAST, self::A_CPHONE, self::A_HPHONE, self::A_OFFICE, self::A_DEPT, self::A_EMAIL, self::TARGET, self::MEETINGS, self::MEMBERCOUNT, self::FEES, self::ELECTIONS, self::S_PHONE, self::PURPOSE, self::SIGNATURE, self::ORG_ID, self::REPORT_ID, self::PRESIDENT, self::VICE, self::TREASURER, self::SECRETARY, self::BOARD, self::MEMBERS, self::FALL, self::WINTER, self::SPRING, self::SUMMER, self::OPEN_HOUSE, self::PROMO, self::SIG_PRES, self::SIG_ADV, self::REASON, self::STATUS, self::LAST_UPDATED, self::DATE, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CLUBTYPE', 'ITF', 'CLUBNAME', 'ACRONYM', 'URL', 'GEN_EMAIL', 'SUBMITTER', 'S_POSITION', 'S_EMAIL', 'A_FIRST', 'A_LAST', 'A_CPHONE', 'A_HPHONE', 'A_OFFICE', 'A_DEPT', 'A_EMAIL', 'TARGET', 'MEETINGS', 'MEMBERCOUNT', 'FEES', 'ELECTIONS', 'S_PHONE', 'PURPOSE', 'SIGNATURE', 'ORG_ID', 'REPORT_ID', 'PRESIDENT', 'VICE', 'TREASURER', 'SECRETARY', 'BOARD', 'MEMBERS', 'FALL', 'WINTER', 'SPRING', 'SUMMER', 'OPEN_HOUSE', 'PROMO', 'SIG_PRES', 'SIG_ADV', 'REASON', 'STATUS', 'LAST_UPDATED', 'DATE', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'clubtype', 'itf', 'clubname', 'acronym', 'url', 'gen_email', 'submitter', 's_position', 's_email', 'a_first', 'a_last', 'a_cphone', 'a_hphone', 'a_office', 'a_dept', 'a_email', 'target', 'meetings', 'membercount', 'fees', 'elections', 's_phone', 'purpose', 'signature', 'org_id', 'report_id', 'president', 'vice', 'treasurer', 'secretary', 'board', 'members', 'fall', 'winter', 'spring', 'summer', 'open_house', 'promo', 'sig_pres', 'sig_adv', 'reason', 'status', 'last_updated', 'date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Clubtype' => 1, 'Itf' => 2, 'Clubname' => 3, 'Acronym' => 4, 'Url' => 5, 'GenEmail' => 6, 'Submitter' => 7, 'SPosition' => 8, 'SEmail' => 9, 'AFirst' => 10, 'ALast' => 11, 'ACphone' => 12, 'AHphone' => 13, 'AOffice' => 14, 'ADept' => 15, 'AEmail' => 16, 'Target' => 17, 'Meetings' => 18, 'Membercount' => 19, 'Fees' => 20, 'Elections' => 21, 'SPhone' => 22, 'Purpose' => 23, 'Signature' => 24, 'OrgId' => 25, 'ReportId' => 26, 'President' => 27, 'Vice' => 28, 'Treasurer' => 29, 'Secretary' => 30, 'Board' => 31, 'Members' => 32, 'Fall' => 33, 'Winter' => 34, 'Spring' => 35, 'Summer' => 36, 'OpenHouse' => 37, 'Promo' => 38, 'SigPres' => 39, 'SigAdv' => 40, 'Reason' => 41, 'Status' => 42, 'LastUpdated' => 43, 'Date' => 44, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'clubtype' => 1, 'itf' => 2, 'clubname' => 3, 'acronym' => 4, 'url' => 5, 'genEmail' => 6, 'submitter' => 7, 'sPosition' => 8, 'sEmail' => 9, 'aFirst' => 10, 'aLast' => 11, 'aCphone' => 12, 'aHphone' => 13, 'aOffice' => 14, 'aDept' => 15, 'aEmail' => 16, 'target' => 17, 'meetings' => 18, 'membercount' => 19, 'fees' => 20, 'elections' => 21, 'sPhone' => 22, 'purpose' => 23, 'signature' => 24, 'orgId' => 25, 'reportId' => 26, 'president' => 27, 'vice' => 28, 'treasurer' => 29, 'secretary' => 30, 'board' => 31, 'members' => 32, 'fall' => 33, 'winter' => 34, 'spring' => 35, 'summer' => 36, 'openHouse' => 37, 'promo' => 38, 'sigPres' => 39, 'sigAdv' => 40, 'reason' => 41, 'status' => 42, 'lastUpdated' => 43, 'date' => 44, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CLUBTYPE => 1, self::ITF => 2, self::CLUBNAME => 3, self::ACRONYM => 4, self::URL => 5, self::GEN_EMAIL => 6, self::SUBMITTER => 7, self::S_POSITION => 8, self::S_EMAIL => 9, self::A_FIRST => 10, self::A_LAST => 11, self::A_CPHONE => 12, self::A_HPHONE => 13, self::A_OFFICE => 14, self::A_DEPT => 15, self::A_EMAIL => 16, self::TARGET => 17, self::MEETINGS => 18, self::MEMBERCOUNT => 19, self::FEES => 20, self::ELECTIONS => 21, self::S_PHONE => 22, self::PURPOSE => 23, self::SIGNATURE => 24, self::ORG_ID => 25, self::REPORT_ID => 26, self::PRESIDENT => 27, self::VICE => 28, self::TREASURER => 29, self::SECRETARY => 30, self::BOARD => 31, self::MEMBERS => 32, self::FALL => 33, self::WINTER => 34, self::SPRING => 35, self::SUMMER => 36, self::OPEN_HOUSE => 37, self::PROMO => 38, self::SIG_PRES => 39, self::SIG_ADV => 40, self::REASON => 41, self::STATUS => 42, self::LAST_UPDATED => 43, self::DATE => 44, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CLUBTYPE' => 1, 'ITF' => 2, 'CLUBNAME' => 3, 'ACRONYM' => 4, 'URL' => 5, 'GEN_EMAIL' => 6, 'SUBMITTER' => 7, 'S_POSITION' => 8, 'S_EMAIL' => 9, 'A_FIRST' => 10, 'A_LAST' => 11, 'A_CPHONE' => 12, 'A_HPHONE' => 13, 'A_OFFICE' => 14, 'A_DEPT' => 15, 'A_EMAIL' => 16, 'TARGET' => 17, 'MEETINGS' => 18, 'MEMBERCOUNT' => 19, 'FEES' => 20, 'ELECTIONS' => 21, 'S_PHONE' => 22, 'PURPOSE' => 23, 'SIGNATURE' => 24, 'ORG_ID' => 25, 'REPORT_ID' => 26, 'PRESIDENT' => 27, 'VICE' => 28, 'TREASURER' => 29, 'SECRETARY' => 30, 'BOARD' => 31, 'MEMBERS' => 32, 'FALL' => 33, 'WINTER' => 34, 'SPRING' => 35, 'SUMMER' => 36, 'OPEN_HOUSE' => 37, 'PROMO' => 38, 'SIG_PRES' => 39, 'SIG_ADV' => 40, 'REASON' => 41, 'STATUS' => 42, 'LAST_UPDATED' => 43, 'DATE' => 44, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'clubtype' => 1, 'itf' => 2, 'clubname' => 3, 'acronym' => 4, 'url' => 5, 'gen_email' => 6, 'submitter' => 7, 's_position' => 8, 's_email' => 9, 'a_first' => 10, 'a_last' => 11, 'a_cphone' => 12, 'a_hphone' => 13, 'a_office' => 14, 'a_dept' => 15, 'a_email' => 16, 'target' => 17, 'meetings' => 18, 'membercount' => 19, 'fees' => 20, 'elections' => 21, 's_phone' => 22, 'purpose' => 23, 'signature' => 24, 'org_id' => 25, 'report_id' => 26, 'president' => 27, 'vice' => 28, 'treasurer' => 29, 'secretary' => 30, 'board' => 31, 'members' => 32, 'fall' => 33, 'winter' => 34, 'spring' => 35, 'summer' => 36, 'open_house' => 37, 'promo' => 38, 'sig_pres' => 39, 'sig_adv' => 40, 'reason' => 41, 'status' => 42, 'last_updated' => 43, 'date' => 44, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
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
	 * @param      string $column The column name for current table. (i.e. RecognitionDataArchivePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RecognitionDataArchivePeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(RecognitionDataArchivePeer::ID);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::CLUBTYPE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::ITF);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::CLUBNAME);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::ACRONYM);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::URL);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::GEN_EMAIL);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SUBMITTER);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::S_POSITION);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::S_EMAIL);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_FIRST);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_LAST);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_CPHONE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_HPHONE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_OFFICE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_DEPT);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::A_EMAIL);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::TARGET);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::MEETINGS);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::MEMBERCOUNT);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::FEES);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::ELECTIONS);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::S_PHONE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::PURPOSE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SIGNATURE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::ORG_ID);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::REPORT_ID);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::PRESIDENT);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::VICE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::TREASURER);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SECRETARY);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::BOARD);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::MEMBERS);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::FALL);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::WINTER);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SPRING);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SUMMER);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::OPEN_HOUSE);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::PROMO);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SIG_PRES);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::SIG_ADV);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::REASON);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::STATUS);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::LAST_UPDATED);
			$criteria->addSelectColumn(RecognitionDataArchivePeer::DATE);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CLUBTYPE');
			$criteria->addSelectColumn($alias . '.ITF');
			$criteria->addSelectColumn($alias . '.CLUBNAME');
			$criteria->addSelectColumn($alias . '.ACRONYM');
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
		$criteria->setPrimaryTableName(RecognitionDataArchivePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RecognitionDataArchivePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     RecognitionDataArchive
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RecognitionDataArchivePeer::doSelect($critcopy, $con);
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
		return RecognitionDataArchivePeer::populateObjects(RecognitionDataArchivePeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RecognitionDataArchivePeer::addSelectColumns($criteria);
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
	 * @param      RecognitionDataArchive $value A RecognitionDataArchive object.
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
	 * @param      mixed $value A RecognitionDataArchive object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RecognitionDataArchive) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RecognitionDataArchive object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     RecognitionDataArchive Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to recognition_data_archive
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
		$cls = RecognitionDataArchivePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RecognitionDataArchivePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RecognitionDataArchivePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RecognitionDataArchivePeer::addInstanceToPool($obj, $key);
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
	 * @return     array (RecognitionDataArchive object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = RecognitionDataArchivePeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = RecognitionDataArchivePeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + RecognitionDataArchivePeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = RecognitionDataArchivePeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			RecognitionDataArchivePeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseRecognitionDataArchivePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseRecognitionDataArchivePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new RecognitionDataArchiveTableMap());
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
		return $withPrefix ? RecognitionDataArchivePeer::CLASS_DEFAULT : RecognitionDataArchivePeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a RecognitionDataArchive or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionDataArchive object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from RecognitionDataArchive object
		}

		if ($criteria->containsKey(RecognitionDataArchivePeer::ID) && $criteria->keyContainsValue(RecognitionDataArchivePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RecognitionDataArchivePeer::ID.')');
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
	 * Performs an UPDATE on the database, given a RecognitionDataArchive or Criteria object.
	 *
	 * @param      mixed $values Criteria or RecognitionDataArchive object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RecognitionDataArchivePeer::ID);
			$value = $criteria->remove(RecognitionDataArchivePeer::ID);
			if ($value) {
				$selectCriteria->add(RecognitionDataArchivePeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(RecognitionDataArchivePeer::TABLE_NAME);
			}

		} else { // $values is RecognitionDataArchive object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the recognition_data_archive table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RecognitionDataArchivePeer::TABLE_NAME, $con, RecognitionDataArchivePeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			RecognitionDataArchivePeer::clearInstancePool();
			RecognitionDataArchivePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a RecognitionDataArchive or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or RecognitionDataArchive object or primary key or array of primary keys
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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RecognitionDataArchivePeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof RecognitionDataArchive) { // it's a model object
			// invalidate the cache for this single object
			RecognitionDataArchivePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RecognitionDataArchivePeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				RecognitionDataArchivePeer::removeInstanceFromPool($singleval);
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
			RecognitionDataArchivePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given RecognitionDataArchive object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      RecognitionDataArchive $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RecognitionDataArchivePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RecognitionDataArchivePeer::TABLE_NAME);

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

		return BasePeer::doValidate(RecognitionDataArchivePeer::DATABASE_NAME, RecognitionDataArchivePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     RecognitionDataArchive
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RecognitionDataArchivePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RecognitionDataArchivePeer::DATABASE_NAME);
		$criteria->add(RecognitionDataArchivePeer::ID, $pk);

		$v = RecognitionDataArchivePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RecognitionDataArchivePeer::DATABASE_NAME);
			$criteria->add(RecognitionDataArchivePeer::ID, $pks, Criteria::IN);
			$objs = RecognitionDataArchivePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRecognitionDataArchivePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRecognitionDataArchivePeer::buildTableMap();


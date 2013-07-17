<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\QuarterlyDataOld;
use NewClubsORM\QuarterlyDataOldPeer;
use NewClubsORM\map\QuarterlyDataOldTableMap;

/**
 * Base static class for performing query and update operations on the 'quarterly_data_old' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyDataOldPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'quarterly_data_old';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\QuarterlyDataOld';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.QuarterlyDataOld';

	/** the related TableMap class for this table */
	const TM_CLASS = 'QuarterlyDataOldTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 44;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 44;

	/** the column name for the REPORT_ID field */
	const REPORT_ID = 'quarterly_data_old.REPORT_ID';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'quarterly_data_old.ORG_ID';

	/** the column name for the CLUBNAME field */
	const CLUBNAME = 'quarterly_data_old.CLUBNAME';

	/** the column name for the MEETING_PLACE field */
	const MEETING_PLACE = 'quarterly_data_old.MEETING_PLACE';

	/** the column name for the DAY field */
	const DAY = 'quarterly_data_old.DAY';

	/** the column name for the TIME field */
	const TIME = 'quarterly_data_old.TIME';

	/** the column name for the ACTIVE field */
	const ACTIVE = 'quarterly_data_old.ACTIVE';

	/** the column name for the ASSOCIATE field */
	const ASSOCIATE = 'quarterly_data_old.ASSOCIATE';

	/** the column name for the ATTENDANCE field */
	const ATTENDANCE = 'quarterly_data_old.ATTENDANCE';

	/** the column name for the COS field */
	const COS = 'quarterly_data_old.COS';

	/** the column name for the CIAS field */
	const CIAS = 'quarterly_data_old.CIAS';

	/** the column name for the COB field */
	const COB = 'quarterly_data_old.COB';

	/** the column name for the COE field */
	const COE = 'quarterly_data_old.COE';

	/** the column name for the CLA field */
	const CLA = 'quarterly_data_old.CLA';

	/** the column name for the NTID field */
	const NTID = 'quarterly_data_old.NTID';

	/** the column name for the GCCIS field */
	const GCCIS = 'quarterly_data_old.GCCIS';

	/** the column name for the CAST field */
	const CAST = 'quarterly_data_old.CAST';

	/** the column name for the NONRIT field */
	const NONRIT = 'quarterly_data_old.NONRIT';

	/** the column name for the ONE field */
	const ONE = 'quarterly_data_old.ONE';

	/** the column name for the TWO field */
	const TWO = 'quarterly_data_old.TWO';

	/** the column name for the THREE field */
	const THREE = 'quarterly_data_old.THREE';

	/** the column name for the FOUR field */
	const FOUR = 'quarterly_data_old.FOUR';

	/** the column name for the FIVE field */
	const FIVE = 'quarterly_data_old.FIVE';

	/** the column name for the G field */
	const G = 'quarterly_data_old.G';

	/** the column name for the OTHER_YEAR field */
	const OTHER_YEAR = 'quarterly_data_old.OTHER_YEAR';

	/** the column name for the ASIAN field */
	const ASIAN = 'quarterly_data_old.ASIAN';

	/** the column name for the AFRICAN field */
	const AFRICAN = 'quarterly_data_old.AFRICAN';

	/** the column name for the NATIVE field */
	const NATIVE = 'quarterly_data_old.NATIVE';

	/** the column name for the LATINO field */
	const LATINO = 'quarterly_data_old.LATINO';

	/** the column name for the CAUCASIAN field */
	const CAUCASIAN = 'quarterly_data_old.CAUCASIAN';

	/** the column name for the INTERNATIONAL field */
	const INTERNATIONAL = 'quarterly_data_old.INTERNATIONAL';

	/** the column name for the OTHER field */
	const OTHER = 'quarterly_data_old.OTHER';

	/** the column name for the MALE field */
	const MALE = 'quarterly_data_old.MALE';

	/** the column name for the FEMALE field */
	const FEMALE = 'quarterly_data_old.FEMALE';

	/** the column name for the EVENTS field */
	const EVENTS = 'quarterly_data_old.EVENTS';

	/** the column name for the UPCOMING field */
	const UPCOMING = 'quarterly_data_old.UPCOMING';

	/** the column name for the MEMBERS field */
	const MEMBERS = 'quarterly_data_old.MEMBERS';

	/** the column name for the GOALS field */
	const GOALS = 'quarterly_data_old.GOALS';

	/** the column name for the REACHGOALS field */
	const REACHGOALS = 'quarterly_data_old.REACHGOALS';

	/** the column name for the HELP field */
	const HELP = 'quarterly_data_old.HELP';

	/** the column name for the ACCOMPLISHMENTS field */
	const ACCOMPLISHMENTS = 'quarterly_data_old.ACCOMPLISHMENTS';

	/** the column name for the BOARDCHANGES field */
	const BOARDCHANGES = 'quarterly_data_old.BOARDCHANGES';

	/** the column name for the SUBMITTED_BY field */
	const SUBMITTED_BY = 'quarterly_data_old.SUBMITTED_BY';

	/** the column name for the ADVISOR field */
	const ADVISOR = 'quarterly_data_old.ADVISOR';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of QuarterlyDataOld objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array QuarterlyDataOld[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ReportId', 'OrgId', 'Clubname', 'MeetingPlace', 'Day', 'Time', 'Active', 'Associate', 'Attendance', 'Cos', 'Cias', 'Cob', 'Coe', 'Cla', 'Ntid', 'Gccis', 'Cast', 'Nonrit', 'One', 'Two', 'Three', 'Four', 'Five', 'G', 'OtherYear', 'Asian', 'African', 'Native', 'Latino', 'Caucasian', 'International', 'Other', 'Male', 'Female', 'Events', 'Upcoming', 'Members', 'Goals', 'Reachgoals', 'Help', 'Accomplishments', 'Boardchanges', 'SubmittedBy', 'Advisor', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('reportId', 'orgId', 'clubname', 'meetingPlace', 'day', 'time', 'active', 'associate', 'attendance', 'cos', 'cias', 'cob', 'coe', 'cla', 'ntid', 'gccis', 'cast', 'nonrit', 'one', 'two', 'three', 'four', 'five', 'g', 'otherYear', 'asian', 'african', 'native', 'latino', 'caucasian', 'international', 'other', 'male', 'female', 'events', 'upcoming', 'members', 'goals', 'reachgoals', 'help', 'accomplishments', 'boardchanges', 'submittedBy', 'advisor', ),
		BasePeer::TYPE_COLNAME => array (self::REPORT_ID, self::ORG_ID, self::CLUBNAME, self::MEETING_PLACE, self::DAY, self::TIME, self::ACTIVE, self::ASSOCIATE, self::ATTENDANCE, self::COS, self::CIAS, self::COB, self::COE, self::CLA, self::NTID, self::GCCIS, self::CAST, self::NONRIT, self::ONE, self::TWO, self::THREE, self::FOUR, self::FIVE, self::G, self::OTHER_YEAR, self::ASIAN, self::AFRICAN, self::NATIVE, self::LATINO, self::CAUCASIAN, self::INTERNATIONAL, self::OTHER, self::MALE, self::FEMALE, self::EVENTS, self::UPCOMING, self::MEMBERS, self::GOALS, self::REACHGOALS, self::HELP, self::ACCOMPLISHMENTS, self::BOARDCHANGES, self::SUBMITTED_BY, self::ADVISOR, ),
		BasePeer::TYPE_RAW_COLNAME => array ('REPORT_ID', 'ORG_ID', 'CLUBNAME', 'MEETING_PLACE', 'DAY', 'TIME', 'ACTIVE', 'ASSOCIATE', 'ATTENDANCE', 'COS', 'CIAS', 'COB', 'COE', 'CLA', 'NTID', 'GCCIS', 'CAST', 'NONRIT', 'ONE', 'TWO', 'THREE', 'FOUR', 'FIVE', 'G', 'OTHER_YEAR', 'ASIAN', 'AFRICAN', 'NATIVE', 'LATINO', 'CAUCASIAN', 'INTERNATIONAL', 'OTHER', 'MALE', 'FEMALE', 'EVENTS', 'UPCOMING', 'MEMBERS', 'GOALS', 'REACHGOALS', 'HELP', 'ACCOMPLISHMENTS', 'BOARDCHANGES', 'SUBMITTED_BY', 'ADVISOR', ),
		BasePeer::TYPE_FIELDNAME => array ('report_id', 'org_id', 'clubname', 'meeting_place', 'day', 'time', 'active', 'associate', 'attendance', 'COS', 'CIAS', 'COB', 'COE', 'CLA', 'NTID', 'GCCIS', 'CAST', 'NonRIT', 'one', 'two', 'three', 'four', 'five', 'G', 'other_year', 'Asian', 'African', 'Native', 'Latino', 'Caucasian', 'International', 'Other', 'Male', 'Female', 'events', 'upcoming', 'members', 'goals', 'reachgoals', 'help', 'accomplishments', 'boardchanges', 'submitted_by', 'advisor', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ReportId' => 0, 'OrgId' => 1, 'Clubname' => 2, 'MeetingPlace' => 3, 'Day' => 4, 'Time' => 5, 'Active' => 6, 'Associate' => 7, 'Attendance' => 8, 'Cos' => 9, 'Cias' => 10, 'Cob' => 11, 'Coe' => 12, 'Cla' => 13, 'Ntid' => 14, 'Gccis' => 15, 'Cast' => 16, 'Nonrit' => 17, 'One' => 18, 'Two' => 19, 'Three' => 20, 'Four' => 21, 'Five' => 22, 'G' => 23, 'OtherYear' => 24, 'Asian' => 25, 'African' => 26, 'Native' => 27, 'Latino' => 28, 'Caucasian' => 29, 'International' => 30, 'Other' => 31, 'Male' => 32, 'Female' => 33, 'Events' => 34, 'Upcoming' => 35, 'Members' => 36, 'Goals' => 37, 'Reachgoals' => 38, 'Help' => 39, 'Accomplishments' => 40, 'Boardchanges' => 41, 'SubmittedBy' => 42, 'Advisor' => 43, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('reportId' => 0, 'orgId' => 1, 'clubname' => 2, 'meetingPlace' => 3, 'day' => 4, 'time' => 5, 'active' => 6, 'associate' => 7, 'attendance' => 8, 'cos' => 9, 'cias' => 10, 'cob' => 11, 'coe' => 12, 'cla' => 13, 'ntid' => 14, 'gccis' => 15, 'cast' => 16, 'nonrit' => 17, 'one' => 18, 'two' => 19, 'three' => 20, 'four' => 21, 'five' => 22, 'g' => 23, 'otherYear' => 24, 'asian' => 25, 'african' => 26, 'native' => 27, 'latino' => 28, 'caucasian' => 29, 'international' => 30, 'other' => 31, 'male' => 32, 'female' => 33, 'events' => 34, 'upcoming' => 35, 'members' => 36, 'goals' => 37, 'reachgoals' => 38, 'help' => 39, 'accomplishments' => 40, 'boardchanges' => 41, 'submittedBy' => 42, 'advisor' => 43, ),
		BasePeer::TYPE_COLNAME => array (self::REPORT_ID => 0, self::ORG_ID => 1, self::CLUBNAME => 2, self::MEETING_PLACE => 3, self::DAY => 4, self::TIME => 5, self::ACTIVE => 6, self::ASSOCIATE => 7, self::ATTENDANCE => 8, self::COS => 9, self::CIAS => 10, self::COB => 11, self::COE => 12, self::CLA => 13, self::NTID => 14, self::GCCIS => 15, self::CAST => 16, self::NONRIT => 17, self::ONE => 18, self::TWO => 19, self::THREE => 20, self::FOUR => 21, self::FIVE => 22, self::G => 23, self::OTHER_YEAR => 24, self::ASIAN => 25, self::AFRICAN => 26, self::NATIVE => 27, self::LATINO => 28, self::CAUCASIAN => 29, self::INTERNATIONAL => 30, self::OTHER => 31, self::MALE => 32, self::FEMALE => 33, self::EVENTS => 34, self::UPCOMING => 35, self::MEMBERS => 36, self::GOALS => 37, self::REACHGOALS => 38, self::HELP => 39, self::ACCOMPLISHMENTS => 40, self::BOARDCHANGES => 41, self::SUBMITTED_BY => 42, self::ADVISOR => 43, ),
		BasePeer::TYPE_RAW_COLNAME => array ('REPORT_ID' => 0, 'ORG_ID' => 1, 'CLUBNAME' => 2, 'MEETING_PLACE' => 3, 'DAY' => 4, 'TIME' => 5, 'ACTIVE' => 6, 'ASSOCIATE' => 7, 'ATTENDANCE' => 8, 'COS' => 9, 'CIAS' => 10, 'COB' => 11, 'COE' => 12, 'CLA' => 13, 'NTID' => 14, 'GCCIS' => 15, 'CAST' => 16, 'NONRIT' => 17, 'ONE' => 18, 'TWO' => 19, 'THREE' => 20, 'FOUR' => 21, 'FIVE' => 22, 'G' => 23, 'OTHER_YEAR' => 24, 'ASIAN' => 25, 'AFRICAN' => 26, 'NATIVE' => 27, 'LATINO' => 28, 'CAUCASIAN' => 29, 'INTERNATIONAL' => 30, 'OTHER' => 31, 'MALE' => 32, 'FEMALE' => 33, 'EVENTS' => 34, 'UPCOMING' => 35, 'MEMBERS' => 36, 'GOALS' => 37, 'REACHGOALS' => 38, 'HELP' => 39, 'ACCOMPLISHMENTS' => 40, 'BOARDCHANGES' => 41, 'SUBMITTED_BY' => 42, 'ADVISOR' => 43, ),
		BasePeer::TYPE_FIELDNAME => array ('report_id' => 0, 'org_id' => 1, 'clubname' => 2, 'meeting_place' => 3, 'day' => 4, 'time' => 5, 'active' => 6, 'associate' => 7, 'attendance' => 8, 'COS' => 9, 'CIAS' => 10, 'COB' => 11, 'COE' => 12, 'CLA' => 13, 'NTID' => 14, 'GCCIS' => 15, 'CAST' => 16, 'NonRIT' => 17, 'one' => 18, 'two' => 19, 'three' => 20, 'four' => 21, 'five' => 22, 'G' => 23, 'other_year' => 24, 'Asian' => 25, 'African' => 26, 'Native' => 27, 'Latino' => 28, 'Caucasian' => 29, 'International' => 30, 'Other' => 31, 'Male' => 32, 'Female' => 33, 'events' => 34, 'upcoming' => 35, 'members' => 36, 'goals' => 37, 'reachgoals' => 38, 'help' => 39, 'accomplishments' => 40, 'boardchanges' => 41, 'submitted_by' => 42, 'advisor' => 43, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
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
	 * @param      string $column The column name for current table. (i.e. QuarterlyDataOldPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(QuarterlyDataOldPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(QuarterlyDataOldPeer::REPORT_ID);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ORG_ID);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::CLUBNAME);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::MEETING_PLACE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::DAY);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::TIME);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ACTIVE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ASSOCIATE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ATTENDANCE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::COS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::CIAS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::COB);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::COE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::CLA);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::NTID);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::GCCIS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::CAST);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::NONRIT);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ONE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::TWO);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::THREE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::FOUR);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::FIVE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::G);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::OTHER_YEAR);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ASIAN);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::AFRICAN);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::NATIVE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::LATINO);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::CAUCASIAN);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::INTERNATIONAL);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::OTHER);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::MALE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::FEMALE);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::EVENTS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::UPCOMING);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::MEMBERS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::GOALS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::REACHGOALS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::HELP);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ACCOMPLISHMENTS);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::BOARDCHANGES);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::SUBMITTED_BY);
			$criteria->addSelectColumn(QuarterlyDataOldPeer::ADVISOR);
		} else {
			$criteria->addSelectColumn($alias . '.REPORT_ID');
			$criteria->addSelectColumn($alias . '.ORG_ID');
			$criteria->addSelectColumn($alias . '.CLUBNAME');
			$criteria->addSelectColumn($alias . '.MEETING_PLACE');
			$criteria->addSelectColumn($alias . '.DAY');
			$criteria->addSelectColumn($alias . '.TIME');
			$criteria->addSelectColumn($alias . '.ACTIVE');
			$criteria->addSelectColumn($alias . '.ASSOCIATE');
			$criteria->addSelectColumn($alias . '.ATTENDANCE');
			$criteria->addSelectColumn($alias . '.COS');
			$criteria->addSelectColumn($alias . '.CIAS');
			$criteria->addSelectColumn($alias . '.COB');
			$criteria->addSelectColumn($alias . '.COE');
			$criteria->addSelectColumn($alias . '.CLA');
			$criteria->addSelectColumn($alias . '.NTID');
			$criteria->addSelectColumn($alias . '.GCCIS');
			$criteria->addSelectColumn($alias . '.CAST');
			$criteria->addSelectColumn($alias . '.NONRIT');
			$criteria->addSelectColumn($alias . '.ONE');
			$criteria->addSelectColumn($alias . '.TWO');
			$criteria->addSelectColumn($alias . '.THREE');
			$criteria->addSelectColumn($alias . '.FOUR');
			$criteria->addSelectColumn($alias . '.FIVE');
			$criteria->addSelectColumn($alias . '.G');
			$criteria->addSelectColumn($alias . '.OTHER_YEAR');
			$criteria->addSelectColumn($alias . '.ASIAN');
			$criteria->addSelectColumn($alias . '.AFRICAN');
			$criteria->addSelectColumn($alias . '.NATIVE');
			$criteria->addSelectColumn($alias . '.LATINO');
			$criteria->addSelectColumn($alias . '.CAUCASIAN');
			$criteria->addSelectColumn($alias . '.INTERNATIONAL');
			$criteria->addSelectColumn($alias . '.OTHER');
			$criteria->addSelectColumn($alias . '.MALE');
			$criteria->addSelectColumn($alias . '.FEMALE');
			$criteria->addSelectColumn($alias . '.EVENTS');
			$criteria->addSelectColumn($alias . '.UPCOMING');
			$criteria->addSelectColumn($alias . '.MEMBERS');
			$criteria->addSelectColumn($alias . '.GOALS');
			$criteria->addSelectColumn($alias . '.REACHGOALS');
			$criteria->addSelectColumn($alias . '.HELP');
			$criteria->addSelectColumn($alias . '.ACCOMPLISHMENTS');
			$criteria->addSelectColumn($alias . '.BOARDCHANGES');
			$criteria->addSelectColumn($alias . '.SUBMITTED_BY');
			$criteria->addSelectColumn($alias . '.ADVISOR');
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
		$criteria->setPrimaryTableName(QuarterlyDataOldPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			QuarterlyDataOldPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     QuarterlyDataOld
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = QuarterlyDataOldPeer::doSelect($critcopy, $con);
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
		return QuarterlyDataOldPeer::populateObjects(QuarterlyDataOldPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			QuarterlyDataOldPeer::addSelectColumns($criteria);
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
	 * @param      QuarterlyDataOld $value A QuarterlyDataOld object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getReportId(), (string) $obj->getOrgId()));
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
	 * @param      mixed $value A QuarterlyDataOld object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof QuarterlyDataOld) {
				$key = serialize(array((string) $value->getReportId(), (string) $value->getOrgId()));
			} elseif (is_array($value) && count($value) === 2) {
				// assume we've been passed a primary key
				$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or QuarterlyDataOld object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     QuarterlyDataOld Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to quarterly_data_old
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
		if ($row[$startcol] === null && $row[$startcol + 1] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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
		return array((int) $row[$startcol], (int) $row[$startcol + 1]);
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
		$cls = QuarterlyDataOldPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = QuarterlyDataOldPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = QuarterlyDataOldPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				QuarterlyDataOldPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (QuarterlyDataOld object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = QuarterlyDataOldPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = QuarterlyDataOldPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + QuarterlyDataOldPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = QuarterlyDataOldPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			QuarterlyDataOldPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseQuarterlyDataOldPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseQuarterlyDataOldPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new QuarterlyDataOldTableMap());
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
		return $withPrefix ? QuarterlyDataOldPeer::CLASS_DEFAULT : QuarterlyDataOldPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a QuarterlyDataOld or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyDataOld object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from QuarterlyDataOld object
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
	 * Performs an UPDATE on the database, given a QuarterlyDataOld or Criteria object.
	 *
	 * @param      mixed $values Criteria or QuarterlyDataOld object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(QuarterlyDataOldPeer::REPORT_ID);
			$value = $criteria->remove(QuarterlyDataOldPeer::REPORT_ID);
			if ($value) {
				$selectCriteria->add(QuarterlyDataOldPeer::REPORT_ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(QuarterlyDataOldPeer::TABLE_NAME);
			}

			$comparison = $criteria->getComparison(QuarterlyDataOldPeer::ORG_ID);
			$value = $criteria->remove(QuarterlyDataOldPeer::ORG_ID);
			if ($value) {
				$selectCriteria->add(QuarterlyDataOldPeer::ORG_ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(QuarterlyDataOldPeer::TABLE_NAME);
			}

		} else { // $values is QuarterlyDataOld object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the quarterly_data_old table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(QuarterlyDataOldPeer::TABLE_NAME, $con, QuarterlyDataOldPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			QuarterlyDataOldPeer::clearInstancePool();
			QuarterlyDataOldPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a QuarterlyDataOld or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or QuarterlyDataOld object or primary key or array of primary keys
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
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			QuarterlyDataOldPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof QuarterlyDataOld) { // it's a model object
			// invalidate the cache for this single object
			QuarterlyDataOldPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			// primary key is composite; we therefore, expect
			// the primary key passed to be an array of pkey values
			if (count($values) == count($values, COUNT_RECURSIVE)) {
				// array is not multi-dimensional
				$values = array($values);
			}
			foreach ($values as $value) {
				$criterion = $criteria->getNewCriterion(QuarterlyDataOldPeer::REPORT_ID, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(QuarterlyDataOldPeer::ORG_ID, $value[1]));
				$criteria->addOr($criterion);
				// we can invalidate the cache for this single PK
				QuarterlyDataOldPeer::removeInstanceFromPool($value);
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
			QuarterlyDataOldPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given QuarterlyDataOld object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      QuarterlyDataOld $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(QuarterlyDataOldPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(QuarterlyDataOldPeer::TABLE_NAME);

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

		return BasePeer::doValidate(QuarterlyDataOldPeer::DATABASE_NAME, QuarterlyDataOldPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve object using using composite pkey values.
	 * @param      int $report_id
	 * @param      int $org_id
	 * @param      PropelPDO $con
	 * @return     QuarterlyDataOld
	 */
	public static function retrieveByPK($report_id, $org_id, PropelPDO $con = null) {
		$_instancePoolKey = serialize(array((string) $report_id, (string) $org_id));
 		if (null !== ($obj = QuarterlyDataOldPeer::getInstanceFromPool($_instancePoolKey))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(QuarterlyDataOldPeer::DATABASE_NAME);
		$criteria->add(QuarterlyDataOldPeer::REPORT_ID, $report_id);
		$criteria->add(QuarterlyDataOldPeer::ORG_ID, $org_id);
		$v = QuarterlyDataOldPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} // BaseQuarterlyDataOldPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseQuarterlyDataOldPeer::buildTableMap();


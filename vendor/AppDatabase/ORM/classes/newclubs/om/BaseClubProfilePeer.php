<?php

namespace NewClubsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use NewClubsORM\ClubProfile;
use NewClubsORM\ClubProfilePeer;
use NewClubsORM\map\ClubProfileTableMap;

/**
 * Base static class for performing query and update operations on the 'club_profile' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubProfilePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'newclubs';

	/** the table name for this class */
	const TABLE_NAME = 'club_profile';

	/** the related Propel class for this table */
	const OM_CLASS = 'NewClubsORM\\ClubProfile';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'newclubs.ClubProfile';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ClubProfileTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 36;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 36;

	/** the column name for the ID field */
	const ID = 'club_profile.ID';

	/** the column name for the ORG_ID field */
	const ORG_ID = 'club_profile.ORG_ID';

	/** the column name for the ACRONYM field */
	const ACRONYM = 'club_profile.ACRONYM';

	/** the column name for the LISTNAME field */
	const LISTNAME = 'club_profile.LISTNAME';

	/** the column name for the PROJECT field */
	const PROJECT = 'club_profile.PROJECT';

	/** the column name for the DATE_FORMED field */
	const DATE_FORMED = 'club_profile.DATE_FORMED';

	/** the column name for the DESCRIPTION field */
	const DESCRIPTION = 'club_profile.DESCRIPTION';

	/** the column name for the CATEGORY_ID field */
	const CATEGORY_ID = 'club_profile.CATEGORY_ID';

	/** the column name for the CLUSTER_ID field */
	const CLUSTER_ID = 'club_profile.CLUSTER_ID';

	/** the column name for the SECOND_CLUSTER_ID field */
	const SECOND_CLUSTER_ID = 'club_profile.SECOND_CLUSTER_ID';

	/** the column name for the WEB_SITE field */
	const WEB_SITE = 'club_profile.WEB_SITE';

	/** the column name for the EMAIL field */
	const EMAIL = 'club_profile.EMAIL';

	/** the column name for the CONSTITUTION_DATE field */
	const CONSTITUTION_DATE = 'club_profile.CONSTITUTION_DATE';

	/** the column name for the LASTMODIFIED_CCL field */
	const LASTMODIFIED_CCL = 'club_profile.LASTMODIFIED_CCL';

	/** the column name for the LASTMODIFIED_CLUB field */
	const LASTMODIFIED_CLUB = 'club_profile.LASTMODIFIED_CLUB';

	/** the column name for the INITIAL_MEETING field */
	const INITIAL_MEETING = 'club_profile.INITIAL_MEETING';

	/** the column name for the INACTIVE field */
	const INACTIVE = 'club_profile.INACTIVE';

	/** the column name for the RECOGNIZED field */
	const RECOGNIZED = 'club_profile.RECOGNIZED';

	/** the column name for the SHOW_WEB field */
	const SHOW_WEB = 'club_profile.SHOW_WEB';

	/** the column name for the MEETING_DAY field */
	const MEETING_DAY = 'club_profile.MEETING_DAY';

	/** the column name for the MEETING_TIME field */
	const MEETING_TIME = 'club_profile.MEETING_TIME';

	/** the column name for the MEETING_LOC field */
	const MEETING_LOC = 'club_profile.MEETING_LOC';

	/** the column name for the MEETING_FREQ field */
	const MEETING_FREQ = 'club_profile.MEETING_FREQ';

	/** the column name for the FINANCIAL_TIER field */
	const FINANCIAL_TIER = 'club_profile.FINANCIAL_TIER';

	/** the column name for the FINANCIAL_TIER_DATE field */
	const FINANCIAL_TIER_DATE = 'club_profile.FINANCIAL_TIER_DATE';

	/** the column name for the CRB_EXEMPT field */
	const CRB_EXEMPT = 'club_profile.CRB_EXEMPT';

	/** the column name for the SPORTS_CLUB field */
	const SPORTS_CLUB = 'club_profile.SPORTS_CLUB';

	/** the column name for the SEASON field */
	const SEASON = 'club_profile.SEASON';

	/** the column name for the CFIRST field */
	const CFIRST = 'club_profile.CFIRST';

	/** the column name for the CLAST field */
	const CLAST = 'club_profile.CLAST';

	/** the column name for the CPHONE field */
	const CPHONE = 'club_profile.CPHONE';

	/** the column name for the CEMAIL field */
	const CEMAIL = 'club_profile.CEMAIL';

	/** the column name for the LEAGUE field */
	const LEAGUE = 'club_profile.LEAGUE';

	/** the column name for the LEAGUEFEES field */
	const LEAGUEFEES = 'club_profile.LEAGUEFEES';

	/** the column name for the SPORTS_TRAVEL field */
	const SPORTS_TRAVEL = 'club_profile.SPORTS_TRAVEL';

	/** the column name for the SPORTSEXPENSES field */
	const SPORTSEXPENSES = 'club_profile.SPORTSEXPENSES';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of ClubProfile objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ClubProfile[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'OrgId', 'Acronym', 'Listname', 'Project', 'DateFormed', 'Description', 'CategoryId', 'ClusterId', 'SecondClusterId', 'WebSite', 'Email', 'ConstitutionDate', 'LastmodifiedCcl', 'LastmodifiedClub', 'InitialMeeting', 'Inactive', 'Recognized', 'ShowWeb', 'MeetingDay', 'MeetingTime', 'MeetingLoc', 'MeetingFreq', 'FinancialTier', 'FinancialTierDate', 'CrbExempt', 'SportsClub', 'Season', 'Cfirst', 'Clast', 'Cphone', 'Cemail', 'League', 'Leaguefees', 'SportsTravel', 'Sportsexpenses', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'orgId', 'acronym', 'listname', 'project', 'dateFormed', 'description', 'categoryId', 'clusterId', 'secondClusterId', 'webSite', 'email', 'constitutionDate', 'lastmodifiedCcl', 'lastmodifiedClub', 'initialMeeting', 'inactive', 'recognized', 'showWeb', 'meetingDay', 'meetingTime', 'meetingLoc', 'meetingFreq', 'financialTier', 'financialTierDate', 'crbExempt', 'sportsClub', 'season', 'cfirst', 'clast', 'cphone', 'cemail', 'league', 'leaguefees', 'sportsTravel', 'sportsexpenses', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ORG_ID, self::ACRONYM, self::LISTNAME, self::PROJECT, self::DATE_FORMED, self::DESCRIPTION, self::CATEGORY_ID, self::CLUSTER_ID, self::SECOND_CLUSTER_ID, self::WEB_SITE, self::EMAIL, self::CONSTITUTION_DATE, self::LASTMODIFIED_CCL, self::LASTMODIFIED_CLUB, self::INITIAL_MEETING, self::INACTIVE, self::RECOGNIZED, self::SHOW_WEB, self::MEETING_DAY, self::MEETING_TIME, self::MEETING_LOC, self::MEETING_FREQ, self::FINANCIAL_TIER, self::FINANCIAL_TIER_DATE, self::CRB_EXEMPT, self::SPORTS_CLUB, self::SEASON, self::CFIRST, self::CLAST, self::CPHONE, self::CEMAIL, self::LEAGUE, self::LEAGUEFEES, self::SPORTS_TRAVEL, self::SPORTSEXPENSES, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ORG_ID', 'ACRONYM', 'LISTNAME', 'PROJECT', 'DATE_FORMED', 'DESCRIPTION', 'CATEGORY_ID', 'CLUSTER_ID', 'SECOND_CLUSTER_ID', 'WEB_SITE', 'EMAIL', 'CONSTITUTION_DATE', 'LASTMODIFIED_CCL', 'LASTMODIFIED_CLUB', 'INITIAL_MEETING', 'INACTIVE', 'RECOGNIZED', 'SHOW_WEB', 'MEETING_DAY', 'MEETING_TIME', 'MEETING_LOC', 'MEETING_FREQ', 'FINANCIAL_TIER', 'FINANCIAL_TIER_DATE', 'CRB_EXEMPT', 'SPORTS_CLUB', 'SEASON', 'CFIRST', 'CLAST', 'CPHONE', 'CEMAIL', 'LEAGUE', 'LEAGUEFEES', 'SPORTS_TRAVEL', 'SPORTSEXPENSES', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'org_id', 'acronym', 'listname', 'project', 'date_formed', 'description', 'category_id', 'cluster_id', 'second_cluster_id', 'web_site', 'email', 'constitution_date', 'lastmodified_ccl', 'lastmodified_club', 'initial_meeting', 'inactive', 'recognized', 'show_web', 'meeting_day', 'meeting_time', 'meeting_loc', 'meeting_freq', 'financial_tier', 'financial_tier_date', 'crb_exempt', 'sports_club', 'season', 'cfirst', 'clast', 'cphone', 'cemail', 'league', 'leaguefees', 'sports_travel', 'sportsexpenses', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'OrgId' => 1, 'Acronym' => 2, 'Listname' => 3, 'Project' => 4, 'DateFormed' => 5, 'Description' => 6, 'CategoryId' => 7, 'ClusterId' => 8, 'SecondClusterId' => 9, 'WebSite' => 10, 'Email' => 11, 'ConstitutionDate' => 12, 'LastmodifiedCcl' => 13, 'LastmodifiedClub' => 14, 'InitialMeeting' => 15, 'Inactive' => 16, 'Recognized' => 17, 'ShowWeb' => 18, 'MeetingDay' => 19, 'MeetingTime' => 20, 'MeetingLoc' => 21, 'MeetingFreq' => 22, 'FinancialTier' => 23, 'FinancialTierDate' => 24, 'CrbExempt' => 25, 'SportsClub' => 26, 'Season' => 27, 'Cfirst' => 28, 'Clast' => 29, 'Cphone' => 30, 'Cemail' => 31, 'League' => 32, 'Leaguefees' => 33, 'SportsTravel' => 34, 'Sportsexpenses' => 35, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'orgId' => 1, 'acronym' => 2, 'listname' => 3, 'project' => 4, 'dateFormed' => 5, 'description' => 6, 'categoryId' => 7, 'clusterId' => 8, 'secondClusterId' => 9, 'webSite' => 10, 'email' => 11, 'constitutionDate' => 12, 'lastmodifiedCcl' => 13, 'lastmodifiedClub' => 14, 'initialMeeting' => 15, 'inactive' => 16, 'recognized' => 17, 'showWeb' => 18, 'meetingDay' => 19, 'meetingTime' => 20, 'meetingLoc' => 21, 'meetingFreq' => 22, 'financialTier' => 23, 'financialTierDate' => 24, 'crbExempt' => 25, 'sportsClub' => 26, 'season' => 27, 'cfirst' => 28, 'clast' => 29, 'cphone' => 30, 'cemail' => 31, 'league' => 32, 'leaguefees' => 33, 'sportsTravel' => 34, 'sportsexpenses' => 35, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ORG_ID => 1, self::ACRONYM => 2, self::LISTNAME => 3, self::PROJECT => 4, self::DATE_FORMED => 5, self::DESCRIPTION => 6, self::CATEGORY_ID => 7, self::CLUSTER_ID => 8, self::SECOND_CLUSTER_ID => 9, self::WEB_SITE => 10, self::EMAIL => 11, self::CONSTITUTION_DATE => 12, self::LASTMODIFIED_CCL => 13, self::LASTMODIFIED_CLUB => 14, self::INITIAL_MEETING => 15, self::INACTIVE => 16, self::RECOGNIZED => 17, self::SHOW_WEB => 18, self::MEETING_DAY => 19, self::MEETING_TIME => 20, self::MEETING_LOC => 21, self::MEETING_FREQ => 22, self::FINANCIAL_TIER => 23, self::FINANCIAL_TIER_DATE => 24, self::CRB_EXEMPT => 25, self::SPORTS_CLUB => 26, self::SEASON => 27, self::CFIRST => 28, self::CLAST => 29, self::CPHONE => 30, self::CEMAIL => 31, self::LEAGUE => 32, self::LEAGUEFEES => 33, self::SPORTS_TRAVEL => 34, self::SPORTSEXPENSES => 35, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ORG_ID' => 1, 'ACRONYM' => 2, 'LISTNAME' => 3, 'PROJECT' => 4, 'DATE_FORMED' => 5, 'DESCRIPTION' => 6, 'CATEGORY_ID' => 7, 'CLUSTER_ID' => 8, 'SECOND_CLUSTER_ID' => 9, 'WEB_SITE' => 10, 'EMAIL' => 11, 'CONSTITUTION_DATE' => 12, 'LASTMODIFIED_CCL' => 13, 'LASTMODIFIED_CLUB' => 14, 'INITIAL_MEETING' => 15, 'INACTIVE' => 16, 'RECOGNIZED' => 17, 'SHOW_WEB' => 18, 'MEETING_DAY' => 19, 'MEETING_TIME' => 20, 'MEETING_LOC' => 21, 'MEETING_FREQ' => 22, 'FINANCIAL_TIER' => 23, 'FINANCIAL_TIER_DATE' => 24, 'CRB_EXEMPT' => 25, 'SPORTS_CLUB' => 26, 'SEASON' => 27, 'CFIRST' => 28, 'CLAST' => 29, 'CPHONE' => 30, 'CEMAIL' => 31, 'LEAGUE' => 32, 'LEAGUEFEES' => 33, 'SPORTS_TRAVEL' => 34, 'SPORTSEXPENSES' => 35, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'org_id' => 1, 'acronym' => 2, 'listname' => 3, 'project' => 4, 'date_formed' => 5, 'description' => 6, 'category_id' => 7, 'cluster_id' => 8, 'second_cluster_id' => 9, 'web_site' => 10, 'email' => 11, 'constitution_date' => 12, 'lastmodified_ccl' => 13, 'lastmodified_club' => 14, 'initial_meeting' => 15, 'inactive' => 16, 'recognized' => 17, 'show_web' => 18, 'meeting_day' => 19, 'meeting_time' => 20, 'meeting_loc' => 21, 'meeting_freq' => 22, 'financial_tier' => 23, 'financial_tier_date' => 24, 'crb_exempt' => 25, 'sports_club' => 26, 'season' => 27, 'cfirst' => 28, 'clast' => 29, 'cphone' => 30, 'cemail' => 31, 'league' => 32, 'leaguefees' => 33, 'sports_travel' => 34, 'sportsexpenses' => 35, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
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
	 * @param      string $column The column name for current table. (i.e. ClubProfilePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ClubProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(ClubProfilePeer::ID);
			$criteria->addSelectColumn(ClubProfilePeer::ORG_ID);
			$criteria->addSelectColumn(ClubProfilePeer::ACRONYM);
			$criteria->addSelectColumn(ClubProfilePeer::LISTNAME);
			$criteria->addSelectColumn(ClubProfilePeer::PROJECT);
			$criteria->addSelectColumn(ClubProfilePeer::DATE_FORMED);
			$criteria->addSelectColumn(ClubProfilePeer::DESCRIPTION);
			$criteria->addSelectColumn(ClubProfilePeer::CATEGORY_ID);
			$criteria->addSelectColumn(ClubProfilePeer::CLUSTER_ID);
			$criteria->addSelectColumn(ClubProfilePeer::SECOND_CLUSTER_ID);
			$criteria->addSelectColumn(ClubProfilePeer::WEB_SITE);
			$criteria->addSelectColumn(ClubProfilePeer::EMAIL);
			$criteria->addSelectColumn(ClubProfilePeer::CONSTITUTION_DATE);
			$criteria->addSelectColumn(ClubProfilePeer::LASTMODIFIED_CCL);
			$criteria->addSelectColumn(ClubProfilePeer::LASTMODIFIED_CLUB);
			$criteria->addSelectColumn(ClubProfilePeer::INITIAL_MEETING);
			$criteria->addSelectColumn(ClubProfilePeer::INACTIVE);
			$criteria->addSelectColumn(ClubProfilePeer::RECOGNIZED);
			$criteria->addSelectColumn(ClubProfilePeer::SHOW_WEB);
			$criteria->addSelectColumn(ClubProfilePeer::MEETING_DAY);
			$criteria->addSelectColumn(ClubProfilePeer::MEETING_TIME);
			$criteria->addSelectColumn(ClubProfilePeer::MEETING_LOC);
			$criteria->addSelectColumn(ClubProfilePeer::MEETING_FREQ);
			$criteria->addSelectColumn(ClubProfilePeer::FINANCIAL_TIER);
			$criteria->addSelectColumn(ClubProfilePeer::FINANCIAL_TIER_DATE);
			$criteria->addSelectColumn(ClubProfilePeer::CRB_EXEMPT);
			$criteria->addSelectColumn(ClubProfilePeer::SPORTS_CLUB);
			$criteria->addSelectColumn(ClubProfilePeer::SEASON);
			$criteria->addSelectColumn(ClubProfilePeer::CFIRST);
			$criteria->addSelectColumn(ClubProfilePeer::CLAST);
			$criteria->addSelectColumn(ClubProfilePeer::CPHONE);
			$criteria->addSelectColumn(ClubProfilePeer::CEMAIL);
			$criteria->addSelectColumn(ClubProfilePeer::LEAGUE);
			$criteria->addSelectColumn(ClubProfilePeer::LEAGUEFEES);
			$criteria->addSelectColumn(ClubProfilePeer::SPORTS_TRAVEL);
			$criteria->addSelectColumn(ClubProfilePeer::SPORTSEXPENSES);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ORG_ID');
			$criteria->addSelectColumn($alias . '.ACRONYM');
			$criteria->addSelectColumn($alias . '.LISTNAME');
			$criteria->addSelectColumn($alias . '.PROJECT');
			$criteria->addSelectColumn($alias . '.DATE_FORMED');
			$criteria->addSelectColumn($alias . '.DESCRIPTION');
			$criteria->addSelectColumn($alias . '.CATEGORY_ID');
			$criteria->addSelectColumn($alias . '.CLUSTER_ID');
			$criteria->addSelectColumn($alias . '.SECOND_CLUSTER_ID');
			$criteria->addSelectColumn($alias . '.WEB_SITE');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.CONSTITUTION_DATE');
			$criteria->addSelectColumn($alias . '.LASTMODIFIED_CCL');
			$criteria->addSelectColumn($alias . '.LASTMODIFIED_CLUB');
			$criteria->addSelectColumn($alias . '.INITIAL_MEETING');
			$criteria->addSelectColumn($alias . '.INACTIVE');
			$criteria->addSelectColumn($alias . '.RECOGNIZED');
			$criteria->addSelectColumn($alias . '.SHOW_WEB');
			$criteria->addSelectColumn($alias . '.MEETING_DAY');
			$criteria->addSelectColumn($alias . '.MEETING_TIME');
			$criteria->addSelectColumn($alias . '.MEETING_LOC');
			$criteria->addSelectColumn($alias . '.MEETING_FREQ');
			$criteria->addSelectColumn($alias . '.FINANCIAL_TIER');
			$criteria->addSelectColumn($alias . '.FINANCIAL_TIER_DATE');
			$criteria->addSelectColumn($alias . '.CRB_EXEMPT');
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
		$criteria->setPrimaryTableName(ClubProfilePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClubProfilePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     ClubProfile
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ClubProfilePeer::doSelect($critcopy, $con);
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
		return ClubProfilePeer::populateObjects(ClubProfilePeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ClubProfilePeer::addSelectColumns($criteria);
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
	 * @param      ClubProfile $value A ClubProfile object.
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
	 * @param      mixed $value A ClubProfile object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ClubProfile) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ClubProfile object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     ClubProfile Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to club_profile
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
		$cls = ClubProfilePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ClubProfilePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ClubProfilePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ClubProfilePeer::addInstanceToPool($obj, $key);
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
	 * @return     array (ClubProfile object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ClubProfilePeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ClubProfilePeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ClubProfilePeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = ClubProfilePeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ClubProfilePeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseClubProfilePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseClubProfilePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ClubProfileTableMap());
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
		return $withPrefix ? ClubProfilePeer::CLASS_DEFAULT : ClubProfilePeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a ClubProfile or Criteria object.
	 *
	 * @param      mixed $values Criteria or ClubProfile object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ClubProfile object
		}

		if ($criteria->containsKey(ClubProfilePeer::ID) && $criteria->keyContainsValue(ClubProfilePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClubProfilePeer::ID.')');
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
	 * Performs an UPDATE on the database, given a ClubProfile or Criteria object.
	 *
	 * @param      mixed $values Criteria or ClubProfile object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ClubProfilePeer::ID);
			$value = $criteria->remove(ClubProfilePeer::ID);
			if ($value) {
				$selectCriteria->add(ClubProfilePeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ClubProfilePeer::TABLE_NAME);
			}

		} else { // $values is ClubProfile object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the club_profile table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ClubProfilePeer::TABLE_NAME, $con, ClubProfilePeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ClubProfilePeer::clearInstancePool();
			ClubProfilePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a ClubProfile or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ClubProfile object or primary key or array of primary keys
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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ClubProfilePeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ClubProfile) { // it's a model object
			// invalidate the cache for this single object
			ClubProfilePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ClubProfilePeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ClubProfilePeer::removeInstanceFromPool($singleval);
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
			ClubProfilePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ClubProfile object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ClubProfile $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ClubProfilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ClubProfilePeer::TABLE_NAME);

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

		return BasePeer::doValidate(ClubProfilePeer::DATABASE_NAME, ClubProfilePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ClubProfile
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ClubProfilePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ClubProfilePeer::DATABASE_NAME);
		$criteria->add(ClubProfilePeer::ID, $pk);

		$v = ClubProfilePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ClubProfilePeer::DATABASE_NAME);
			$criteria->add(ClubProfilePeer::ID, $pks, Criteria::IN);
			$objs = ClubProfilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseClubProfilePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClubProfilePeer::buildTableMap();


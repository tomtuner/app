<?php

namespace ArtRequestORM\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use ArtRequestORM\ArtRequest;
use ArtRequestORM\Event;
use ArtRequestORM\EventPeer;
use ArtRequestORM\EventQuery;

/**
 * Base class that represents a query for the 'event' table.
 *
 *
 *
 * @method EventQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EventQuery orderByEventTitle($order = Criteria::ASC) Order by the event_title column
 * @method EventQuery orderByEventDescription($order = Criteria::ASC) Order by the event_description column
 * @method EventQuery orderByEventLocation($order = Criteria::ASC) Order by the event_location column
 * @method EventQuery orderByEventSponsorName($order = Criteria::ASC) Order by the event_sponsor_name column
 * @method EventQuery orderByEventStartTime($order = Criteria::ASC) Order by the event_start_time column
 * @method EventQuery orderByEventEndTime($order = Criteria::ASC) Order by the event_end_time column
 * @method EventQuery orderByEventStartDate($order = Criteria::ASC) Order by the event_start_date column
 * @method EventQuery orderByEventEndDate($order = Criteria::ASC) Order by the event_end_date column
 * @method EventQuery orderByEventPricingMember($order = Criteria::ASC) Order by the event_pricing_member column
 * @method EventQuery orderByEventPricingStaff($order = Criteria::ASC) Order by the event_pricing_staff column
 * @method EventQuery orderByEventPricingStudent($order = Criteria::ASC) Order by the event_pricing_student column
 * @method EventQuery orderByEventPricingPublic($order = Criteria::ASC) Order by the event_pricing_public column
 *
 * @method EventQuery groupByEventId() Group by the event_id column
 * @method EventQuery groupByEventTitle() Group by the event_title column
 * @method EventQuery groupByEventDescription() Group by the event_description column
 * @method EventQuery groupByEventLocation() Group by the event_location column
 * @method EventQuery groupByEventSponsorName() Group by the event_sponsor_name column
 * @method EventQuery groupByEventStartTime() Group by the event_start_time column
 * @method EventQuery groupByEventEndTime() Group by the event_end_time column
 * @method EventQuery groupByEventStartDate() Group by the event_start_date column
 * @method EventQuery groupByEventEndDate() Group by the event_end_date column
 * @method EventQuery groupByEventPricingMember() Group by the event_pricing_member column
 * @method EventQuery groupByEventPricingStaff() Group by the event_pricing_staff column
 * @method EventQuery groupByEventPricingStudent() Group by the event_pricing_student column
 * @method EventQuery groupByEventPricingPublic() Group by the event_pricing_public column
 *
 * @method EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventQuery leftJoinArtRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequest relation
 * @method EventQuery rightJoinArtRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequest relation
 * @method EventQuery innerJoinArtRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequest relation
 *
 * @method Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method Event findOneByEventId(int $event_id) Return the first Event filtered by the event_id column
 * @method Event findOneByEventTitle(string $event_title) Return the first Event filtered by the event_title column
 * @method Event findOneByEventDescription(string $event_description) Return the first Event filtered by the event_description column
 * @method Event findOneByEventLocation(string $event_location) Return the first Event filtered by the event_location column
 * @method Event findOneByEventSponsorName(string $event_sponsor_name) Return the first Event filtered by the event_sponsor_name column
 * @method Event findOneByEventStartTime(string $event_start_time) Return the first Event filtered by the event_start_time column
 * @method Event findOneByEventEndTime(string $event_end_time) Return the first Event filtered by the event_end_time column
 * @method Event findOneByEventStartDate(string $event_start_date) Return the first Event filtered by the event_start_date column
 * @method Event findOneByEventEndDate(string $event_end_date) Return the first Event filtered by the event_end_date column
 * @method Event findOneByEventPricingMember(string $event_pricing_member) Return the first Event filtered by the event_pricing_member column
 * @method Event findOneByEventPricingStaff(string $event_pricing_staff) Return the first Event filtered by the event_pricing_staff column
 * @method Event findOneByEventPricingStudent(string $event_pricing_student) Return the first Event filtered by the event_pricing_student column
 * @method Event findOneByEventPricingPublic(string $event_pricing_public) Return the first Event filtered by the event_pricing_public column
 *
 * @method array findByEventId(int $event_id) Return Event objects filtered by the event_id column
 * @method array findByEventTitle(string $event_title) Return Event objects filtered by the event_title column
 * @method array findByEventDescription(string $event_description) Return Event objects filtered by the event_description column
 * @method array findByEventLocation(string $event_location) Return Event objects filtered by the event_location column
 * @method array findByEventSponsorName(string $event_sponsor_name) Return Event objects filtered by the event_sponsor_name column
 * @method array findByEventStartTime(string $event_start_time) Return Event objects filtered by the event_start_time column
 * @method array findByEventEndTime(string $event_end_time) Return Event objects filtered by the event_end_time column
 * @method array findByEventStartDate(string $event_start_date) Return Event objects filtered by the event_start_date column
 * @method array findByEventEndDate(string $event_end_date) Return Event objects filtered by the event_end_date column
 * @method array findByEventPricingMember(string $event_pricing_member) Return Event objects filtered by the event_pricing_member column
 * @method array findByEventPricingStaff(string $event_pricing_staff) Return Event objects filtered by the event_pricing_staff column
 * @method array findByEventPricingStudent(string $event_pricing_student) Return Event objects filtered by the event_pricing_student column
 * @method array findByEventPricingPublic(string $event_pricing_public) Return Event objects filtered by the event_pricing_public column
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseEventQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'art_request', $modelName = 'ArtRequestORM\\Event', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EventQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventQuery) {
            return $criteria;
        }
        $query = new EventQuery();
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
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Event|Event[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Event A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `EVENT_ID`, `EVENT_TITLE`, `EVENT_DESCRIPTION`, `EVENT_LOCATION`, `EVENT_SPONSOR_NAME`, `EVENT_START_TIME`, `EVENT_END_TIME`, `EVENT_START_DATE`, `EVENT_END_DATE`, `EVENT_PRICING_MEMBER`, `EVENT_PRICING_STAFF`, `EVENT_PRICING_STUDENT`, `EVENT_PRICING_PUBLIC` FROM `event` WHERE `EVENT_ID` = :p0';
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
            $obj = new Event();
            $obj->hydrate($row);
            EventPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Event|Event[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Event[]|mixed the list of results, formatted by the current formatter
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventPeer::EVENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventPeer::EVENT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id > 12
     * </code>
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EventPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the event_title column
     *
     * Example usage:
     * <code>
     * $query->filterByEventTitle('fooValue');   // WHERE event_title = 'fooValue'
     * $query->filterByEventTitle('%fooValue%'); // WHERE event_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventTitle($eventTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventTitle)) {
                $eventTitle = str_replace('*', '%', $eventTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_TITLE, $eventTitle, $comparison);
    }

    /**
     * Filter the query on the event_description column
     *
     * Example usage:
     * <code>
     * $query->filterByEventDescription('fooValue');   // WHERE event_description = 'fooValue'
     * $query->filterByEventDescription('%fooValue%'); // WHERE event_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventDescription($eventDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventDescription)) {
                $eventDescription = str_replace('*', '%', $eventDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_DESCRIPTION, $eventDescription, $comparison);
    }

    /**
     * Filter the query on the event_location column
     *
     * Example usage:
     * <code>
     * $query->filterByEventLocation('fooValue');   // WHERE event_location = 'fooValue'
     * $query->filterByEventLocation('%fooValue%'); // WHERE event_location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventLocation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventLocation($eventLocation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventLocation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventLocation)) {
                $eventLocation = str_replace('*', '%', $eventLocation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_LOCATION, $eventLocation, $comparison);
    }

    /**
     * Filter the query on the event_sponsor_name column
     *
     * Example usage:
     * <code>
     * $query->filterByEventSponsorName('fooValue');   // WHERE event_sponsor_name = 'fooValue'
     * $query->filterByEventSponsorName('%fooValue%'); // WHERE event_sponsor_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventSponsorName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventSponsorName($eventSponsorName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventSponsorName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventSponsorName)) {
                $eventSponsorName = str_replace('*', '%', $eventSponsorName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_SPONSOR_NAME, $eventSponsorName, $comparison);
    }

    /**
     * Filter the query on the event_start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEventStartTime('fooValue');   // WHERE event_start_time = 'fooValue'
     * $query->filterByEventStartTime('%fooValue%'); // WHERE event_start_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventStartTime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventStartTime($eventStartTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventStartTime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventStartTime)) {
                $eventStartTime = str_replace('*', '%', $eventStartTime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_START_TIME, $eventStartTime, $comparison);
    }

    /**
     * Filter the query on the event_end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEventEndTime('fooValue');   // WHERE event_end_time = 'fooValue'
     * $query->filterByEventEndTime('%fooValue%'); // WHERE event_end_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventEndTime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventEndTime($eventEndTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventEndTime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventEndTime)) {
                $eventEndTime = str_replace('*', '%', $eventEndTime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_END_TIME, $eventEndTime, $comparison);
    }

    /**
     * Filter the query on the event_start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEventStartDate('2011-03-14'); // WHERE event_start_date = '2011-03-14'
     * $query->filterByEventStartDate('now'); // WHERE event_start_date = '2011-03-14'
     * $query->filterByEventStartDate(array('max' => 'yesterday')); // WHERE event_start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $eventStartDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventStartDate($eventStartDate = null, $comparison = null)
    {
        if (is_array($eventStartDate)) {
            $useMinMax = false;
            if (isset($eventStartDate['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_START_DATE, $eventStartDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventStartDate['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_START_DATE, $eventStartDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_START_DATE, $eventStartDate, $comparison);
    }

    /**
     * Filter the query on the event_end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEventEndDate('2011-03-14'); // WHERE event_end_date = '2011-03-14'
     * $query->filterByEventEndDate('now'); // WHERE event_end_date = '2011-03-14'
     * $query->filterByEventEndDate(array('max' => 'yesterday')); // WHERE event_end_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $eventEndDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventEndDate($eventEndDate = null, $comparison = null)
    {
        if (is_array($eventEndDate)) {
            $useMinMax = false;
            if (isset($eventEndDate['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_END_DATE, $eventEndDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventEndDate['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_END_DATE, $eventEndDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_END_DATE, $eventEndDate, $comparison);
    }

    /**
     * Filter the query on the event_pricing_member column
     *
     * Example usage:
     * <code>
     * $query->filterByEventPricingMember(1234); // WHERE event_pricing_member = 1234
     * $query->filterByEventPricingMember(array(12, 34)); // WHERE event_pricing_member IN (12, 34)
     * $query->filterByEventPricingMember(array('min' => 12)); // WHERE event_pricing_member > 12
     * </code>
     *
     * @param     mixed $eventPricingMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventPricingMember($eventPricingMember = null, $comparison = null)
    {
        if (is_array($eventPricingMember)) {
            $useMinMax = false;
            if (isset($eventPricingMember['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_MEMBER, $eventPricingMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventPricingMember['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_MEMBER, $eventPricingMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_PRICING_MEMBER, $eventPricingMember, $comparison);
    }

    /**
     * Filter the query on the event_pricing_staff column
     *
     * Example usage:
     * <code>
     * $query->filterByEventPricingStaff(1234); // WHERE event_pricing_staff = 1234
     * $query->filterByEventPricingStaff(array(12, 34)); // WHERE event_pricing_staff IN (12, 34)
     * $query->filterByEventPricingStaff(array('min' => 12)); // WHERE event_pricing_staff > 12
     * </code>
     *
     * @param     mixed $eventPricingStaff The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventPricingStaff($eventPricingStaff = null, $comparison = null)
    {
        if (is_array($eventPricingStaff)) {
            $useMinMax = false;
            if (isset($eventPricingStaff['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_STAFF, $eventPricingStaff['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventPricingStaff['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_STAFF, $eventPricingStaff['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_PRICING_STAFF, $eventPricingStaff, $comparison);
    }

    /**
     * Filter the query on the event_pricing_student column
     *
     * Example usage:
     * <code>
     * $query->filterByEventPricingStudent(1234); // WHERE event_pricing_student = 1234
     * $query->filterByEventPricingStudent(array(12, 34)); // WHERE event_pricing_student IN (12, 34)
     * $query->filterByEventPricingStudent(array('min' => 12)); // WHERE event_pricing_student > 12
     * </code>
     *
     * @param     mixed $eventPricingStudent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventPricingStudent($eventPricingStudent = null, $comparison = null)
    {
        if (is_array($eventPricingStudent)) {
            $useMinMax = false;
            if (isset($eventPricingStudent['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_STUDENT, $eventPricingStudent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventPricingStudent['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_STUDENT, $eventPricingStudent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_PRICING_STUDENT, $eventPricingStudent, $comparison);
    }

    /**
     * Filter the query on the event_pricing_public column
     *
     * Example usage:
     * <code>
     * $query->filterByEventPricingPublic(1234); // WHERE event_pricing_public = 1234
     * $query->filterByEventPricingPublic(array(12, 34)); // WHERE event_pricing_public IN (12, 34)
     * $query->filterByEventPricingPublic(array('min' => 12)); // WHERE event_pricing_public > 12
     * </code>
     *
     * @param     mixed $eventPricingPublic The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventPricingPublic($eventPricingPublic = null, $comparison = null)
    {
        if (is_array($eventPricingPublic)) {
            $useMinMax = false;
            if (isset($eventPricingPublic['min'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_PUBLIC, $eventPricingPublic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventPricingPublic['max'])) {
                $this->addUsingAlias(EventPeer::EVENT_PRICING_PUBLIC, $eventPricingPublic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENT_PRICING_PUBLIC, $eventPricingPublic, $comparison);
    }

    /**
     * Filter the query by a related ArtRequest object
     *
     * @param   ArtRequest|PropelObjectCollection $artRequest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EventQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequest($artRequest, $comparison = null)
    {
        if ($artRequest instanceof ArtRequest) {
            return $this
                ->addUsingAlias(EventPeer::EVENT_ID, $artRequest->getEventId(), $comparison);
        } elseif ($artRequest instanceof PropelObjectCollection) {
            return $this
                ->useArtRequestQuery()
                ->filterByPrimaryKeys($artRequest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArtRequest() only accepts arguments of type ArtRequest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinArtRequest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequest');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ArtRequest');
        }

        return $this;
    }

    /**
     * Use the ArtRequest relation ArtRequest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequest', '\ArtRequestORM\ArtRequestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Event $event Object to remove from the list of results
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function prune($event = null)
    {
        if ($event) {
            $this->addUsingAlias(EventPeer::EVENT_ID, $event->getEventId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php

namespace EVRRSSFeedORM\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use EVRRSSFeedORM\EVRRSSFeedView;
use EVRRSSFeedORM\EVRRSSFeedViewPeer;
use EVRRSSFeedORM\EVRRSSFeedViewQuery;

/**
 * Base class that represents a query for the 'evr_rss_feed_view' table.
 *
 *
 *
 * @method EVRRSSFeedViewQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EVRRSSFeedViewQuery orderByEventName($order = Criteria::ASC) Order by the event_name column
 * @method EVRRSSFeedViewQuery orderByEventDescription($order = Criteria::ASC) Order by the event_description column
 * @method EVRRSSFeedViewQuery orderByEventStatus($order = Criteria::ASC) Order by the event_status column
 * @method EVRRSSFeedViewQuery orderByEventResponsibleRepresentativeName($order = Criteria::ASC) Order by the event_responsible_representative_name column
 * @method EVRRSSFeedViewQuery orderByEventResponsibleRepresentativeEmailAddress($order = Criteria::ASC) Order by the event_responsible_representative_email_address column
 * @method EVRRSSFeedViewQuery orderByEventStartTime($order = Criteria::ASC) Order by the event_start_time column
 * @method EVRRSSFeedViewQuery orderByEventEndTime($order = Criteria::ASC) Order by the event_end_time column
 * @method EVRRSSFeedViewQuery orderByEventLocation($order = Criteria::ASC) Order by the event_location column
 * @method EVRRSSFeedViewQuery orderByEventCost($order = Criteria::ASC) Order by the event_cost column
 * @method EVRRSSFeedViewQuery orderByEventStartTimeFilter($order = Criteria::ASC) Order by the event_start_time_filter column
 * @method EVRRSSFeedViewQuery orderByEventEndTimeFilter($order = Criteria::ASC) Order by the event_end_time_filter column
 *
 * @method EVRRSSFeedViewQuery groupByEventId() Group by the event_id column
 * @method EVRRSSFeedViewQuery groupByEventName() Group by the event_name column
 * @method EVRRSSFeedViewQuery groupByEventDescription() Group by the event_description column
 * @method EVRRSSFeedViewQuery groupByEventStatus() Group by the event_status column
 * @method EVRRSSFeedViewQuery groupByEventResponsibleRepresentativeName() Group by the event_responsible_representative_name column
 * @method EVRRSSFeedViewQuery groupByEventResponsibleRepresentativeEmailAddress() Group by the event_responsible_representative_email_address column
 * @method EVRRSSFeedViewQuery groupByEventStartTime() Group by the event_start_time column
 * @method EVRRSSFeedViewQuery groupByEventEndTime() Group by the event_end_time column
 * @method EVRRSSFeedViewQuery groupByEventLocation() Group by the event_location column
 * @method EVRRSSFeedViewQuery groupByEventCost() Group by the event_cost column
 * @method EVRRSSFeedViewQuery groupByEventStartTimeFilter() Group by the event_start_time_filter column
 * @method EVRRSSFeedViewQuery groupByEventEndTimeFilter() Group by the event_end_time_filter column
 *
 * @method EVRRSSFeedViewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EVRRSSFeedViewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EVRRSSFeedViewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EVRRSSFeedView findOne(PropelPDO $con = null) Return the first EVRRSSFeedView matching the query
 * @method EVRRSSFeedView findOneOrCreate(PropelPDO $con = null) Return the first EVRRSSFeedView matching the query, or a new EVRRSSFeedView object populated from the query conditions when no match is found
 *
 * @method EVRRSSFeedView findOneByEventId(int $event_id) Return the first EVRRSSFeedView filtered by the event_id column
 * @method EVRRSSFeedView findOneByEventName(string $event_name) Return the first EVRRSSFeedView filtered by the event_name column
 * @method EVRRSSFeedView findOneByEventDescription(string $event_description) Return the first EVRRSSFeedView filtered by the event_description column
 * @method EVRRSSFeedView findOneByEventStatus(string $event_status) Return the first EVRRSSFeedView filtered by the event_status column
 * @method EVRRSSFeedView findOneByEventResponsibleRepresentativeName(string $event_responsible_representative_name) Return the first EVRRSSFeedView filtered by the event_responsible_representative_name column
 * @method EVRRSSFeedView findOneByEventResponsibleRepresentativeEmailAddress(string $event_responsible_representative_email_address) Return the first EVRRSSFeedView filtered by the event_responsible_representative_email_address column
 * @method EVRRSSFeedView findOneByEventStartTime(string $event_start_time) Return the first EVRRSSFeedView filtered by the event_start_time column
 * @method EVRRSSFeedView findOneByEventEndTime(string $event_end_time) Return the first EVRRSSFeedView filtered by the event_end_time column
 * @method EVRRSSFeedView findOneByEventLocation(string $event_location) Return the first EVRRSSFeedView filtered by the event_location column
 * @method EVRRSSFeedView findOneByEventCost(string $event_cost) Return the first EVRRSSFeedView filtered by the event_cost column
 * @method EVRRSSFeedView findOneByEventStartTimeFilter(string $event_start_time_filter) Return the first EVRRSSFeedView filtered by the event_start_time_filter column
 * @method EVRRSSFeedView findOneByEventEndTimeFilter(string $event_end_time_filter) Return the first EVRRSSFeedView filtered by the event_end_time_filter column
 *
 * @method array findByEventId(int $event_id) Return EVRRSSFeedView objects filtered by the event_id column
 * @method array findByEventName(string $event_name) Return EVRRSSFeedView objects filtered by the event_name column
 * @method array findByEventDescription(string $event_description) Return EVRRSSFeedView objects filtered by the event_description column
 * @method array findByEventStatus(string $event_status) Return EVRRSSFeedView objects filtered by the event_status column
 * @method array findByEventResponsibleRepresentativeName(string $event_responsible_representative_name) Return EVRRSSFeedView objects filtered by the event_responsible_representative_name column
 * @method array findByEventResponsibleRepresentativeEmailAddress(string $event_responsible_representative_email_address) Return EVRRSSFeedView objects filtered by the event_responsible_representative_email_address column
 * @method array findByEventStartTime(string $event_start_time) Return EVRRSSFeedView objects filtered by the event_start_time column
 * @method array findByEventEndTime(string $event_end_time) Return EVRRSSFeedView objects filtered by the event_end_time column
 * @method array findByEventLocation(string $event_location) Return EVRRSSFeedView objects filtered by the event_location column
 * @method array findByEventCost(string $event_cost) Return EVRRSSFeedView objects filtered by the event_cost column
 * @method array findByEventStartTimeFilter(string $event_start_time_filter) Return EVRRSSFeedView objects filtered by the event_start_time_filter column
 * @method array findByEventEndTimeFilter(string $event_end_time_filter) Return EVRRSSFeedView objects filtered by the event_end_time_filter column
 *
 * @package    propel.generator.EVRRSSFeed.om
 */
abstract class BaseEVRRSSFeedViewQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEVRRSSFeedViewQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'evr', $modelName = 'EVRRSSFeedORM\\EVRRSSFeedView', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EVRRSSFeedViewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EVRRSSFeedViewQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EVRRSSFeedViewQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EVRRSSFeedViewQuery) {
            return $criteria;
        }
        $query = new EVRRSSFeedViewQuery();
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
     * @return   EVRRSSFeedView|EVRRSSFeedView[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EVRRSSFeedViewPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EVRRSSFeedViewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EVRRSSFeedView A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `EVENT_ID`, `EVENT_NAME`, `EVENT_DESCRIPTION`, `EVENT_STATUS`, `EVENT_RESPONSIBLE_REPRESENTATIVE_NAME`, `EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS`, `EVENT_START_TIME`, `EVENT_END_TIME`, `EVENT_LOCATION`, `EVENT_COST`, `EVENT_START_TIME_FILTER`, `EVENT_END_TIME_FILTER` FROM `evr_rss_feed_view` WHERE `EVENT_ID` = :p0';
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
            $obj = new EVRRSSFeedView();
            $obj->hydrate($row);
            EVRRSSFeedViewPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EVRRSSFeedView|EVRRSSFeedView[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EVRRSSFeedView[]|mixed the list of results, formatted by the current formatter
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $keys, Criteria::IN);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $eventId, $comparison);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_NAME, $eventName, $comparison);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_DESCRIPTION, $eventDescription, $comparison);
    }

    /**
     * Filter the query on the event_status column
     *
     * Example usage:
     * <code>
     * $query->filterByEventStatus('fooValue');   // WHERE event_status = 'fooValue'
     * $query->filterByEventStatus('%fooValue%'); // WHERE event_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventStatus($eventStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventStatus)) {
                $eventStatus = str_replace('*', '%', $eventStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_STATUS, $eventStatus, $comparison);
    }

    /**
     * Filter the query on the event_responsible_representative_name column
     *
     * Example usage:
     * <code>
     * $query->filterByEventResponsibleRepresentativeName('fooValue');   // WHERE event_responsible_representative_name = 'fooValue'
     * $query->filterByEventResponsibleRepresentativeName('%fooValue%'); // WHERE event_responsible_representative_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventResponsibleRepresentativeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventResponsibleRepresentativeName($eventResponsibleRepresentativeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventResponsibleRepresentativeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventResponsibleRepresentativeName)) {
                $eventResponsibleRepresentativeName = str_replace('*', '%', $eventResponsibleRepresentativeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_NAME, $eventResponsibleRepresentativeName, $comparison);
    }

    /**
     * Filter the query on the event_responsible_representative_email_address column
     *
     * Example usage:
     * <code>
     * $query->filterByEventResponsibleRepresentativeEmailAddress('fooValue');   // WHERE event_responsible_representative_email_address = 'fooValue'
     * $query->filterByEventResponsibleRepresentativeEmailAddress('%fooValue%'); // WHERE event_responsible_representative_email_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventResponsibleRepresentativeEmailAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventResponsibleRepresentativeEmailAddress($eventResponsibleRepresentativeEmailAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventResponsibleRepresentativeEmailAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventResponsibleRepresentativeEmailAddress)) {
                $eventResponsibleRepresentativeEmailAddress = str_replace('*', '%', $eventResponsibleRepresentativeEmailAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS, $eventResponsibleRepresentativeEmailAddress, $comparison);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_START_TIME, $eventStartTime, $comparison);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_END_TIME, $eventEndTime, $comparison);
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
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_LOCATION, $eventLocation, $comparison);
    }

    /**
     * Filter the query on the event_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByEventCost('fooValue');   // WHERE event_cost = 'fooValue'
     * $query->filterByEventCost('%fooValue%'); // WHERE event_cost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventCost The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventCost($eventCost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventCost)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventCost)) {
                $eventCost = str_replace('*', '%', $eventCost);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_COST, $eventCost, $comparison);
    }

    /**
     * Filter the query on the event_start_time_filter column
     *
     * Example usage:
     * <code>
     * $query->filterByEventStartTimeFilter('2011-03-14'); // WHERE event_start_time_filter = '2011-03-14'
     * $query->filterByEventStartTimeFilter('now'); // WHERE event_start_time_filter = '2011-03-14'
     * $query->filterByEventStartTimeFilter(array('max' => 'yesterday')); // WHERE event_start_time_filter > '2011-03-13'
     * </code>
     *
     * @param     mixed $eventStartTimeFilter The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventStartTimeFilter($eventStartTimeFilter = null, $comparison = null)
    {
        if (is_array($eventStartTimeFilter)) {
            $useMinMax = false;
            if (isset($eventStartTimeFilter['min'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER, $eventStartTimeFilter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventStartTimeFilter['max'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER, $eventStartTimeFilter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_START_TIME_FILTER, $eventStartTimeFilter, $comparison);
    }

    /**
     * Filter the query on the event_end_time_filter column
     *
     * Example usage:
     * <code>
     * $query->filterByEventEndTimeFilter('2011-03-14'); // WHERE event_end_time_filter = '2011-03-14'
     * $query->filterByEventEndTimeFilter('now'); // WHERE event_end_time_filter = '2011-03-14'
     * $query->filterByEventEndTimeFilter(array('max' => 'yesterday')); // WHERE event_end_time_filter > '2011-03-13'
     * </code>
     *
     * @param     mixed $eventEndTimeFilter The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function filterByEventEndTimeFilter($eventEndTimeFilter = null, $comparison = null)
    {
        if (is_array($eventEndTimeFilter)) {
            $useMinMax = false;
            if (isset($eventEndTimeFilter['min'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER, $eventEndTimeFilter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventEndTimeFilter['max'])) {
                $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER, $eventEndTimeFilter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_END_TIME_FILTER, $eventEndTimeFilter, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EVRRSSFeedView $eVRRSSFeedView Object to remove from the list of results
     *
     * @return EVRRSSFeedViewQuery The current query, for fluid interface
     */
    public function prune($eVRRSSFeedView = null)
    {
        if ($eVRRSSFeedView) {
            $this->addUsingAlias(EVRRSSFeedViewPeer::EVENT_ID, $eVRRSSFeedView->getEventId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

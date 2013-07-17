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
use ArtRequestORM\ArtRequestArtRequestType;
use ArtRequestORM\ArtRequestAssignment;
use ArtRequestORM\ArtRequestAttachment;
use ArtRequestORM\ArtRequestPeer;
use ArtRequestORM\ArtRequestQuery;
use ArtRequestORM\ArtRequestor;
use ArtRequestORM\BannerArtRequest;
use ArtRequestORM\Event;
use ArtRequestORM\FlyerArtRequest;

/**
 * Base class that represents a query for the 'art_request' table.
 *
 *
 *
 * @method ArtRequestQuery orderByArtRequestId($order = Criteria::ASC) Order by the art_request_id column
 * @method ArtRequestQuery orderByIsStarted($order = Criteria::ASC) Order by the is_started column
 * @method ArtRequestQuery orderByIsCompleted($order = Criteria::ASC) Order by the is_completed column
 * @method ArtRequestQuery orderByIsArchived($order = Criteria::ASC) Order by the is_archived column
 * @method ArtRequestQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method ArtRequestQuery orderByArtRequestorId($order = Criteria::ASC) Order by the art_requestor_id column
 * @method ArtRequestQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method ArtRequestQuery orderByArtRequestDescription($order = Criteria::ASC) Order by the art_request_description column
 * @method ArtRequestQuery orderBySubmissionDate($order = Criteria::ASC) Order by the submission_date column
 *
 * @method ArtRequestQuery groupByArtRequestId() Group by the art_request_id column
 * @method ArtRequestQuery groupByIsStarted() Group by the is_started column
 * @method ArtRequestQuery groupByIsCompleted() Group by the is_completed column
 * @method ArtRequestQuery groupByIsArchived() Group by the is_archived column
 * @method ArtRequestQuery groupByDueDate() Group by the due_date column
 * @method ArtRequestQuery groupByArtRequestorId() Group by the art_requestor_id column
 * @method ArtRequestQuery groupByEventId() Group by the event_id column
 * @method ArtRequestQuery groupByArtRequestDescription() Group by the art_request_description column
 * @method ArtRequestQuery groupBySubmissionDate() Group by the submission_date column
 *
 * @method ArtRequestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArtRequestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArtRequestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArtRequestQuery leftJoinArtRequestor($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestor relation
 * @method ArtRequestQuery rightJoinArtRequestor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestor relation
 * @method ArtRequestQuery innerJoinArtRequestor($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestor relation
 *
 * @method ArtRequestQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method ArtRequestQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method ArtRequestQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method ArtRequestQuery leftJoinArtRequestArtRequestType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestArtRequestType relation
 * @method ArtRequestQuery rightJoinArtRequestArtRequestType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestArtRequestType relation
 * @method ArtRequestQuery innerJoinArtRequestArtRequestType($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestArtRequestType relation
 *
 * @method ArtRequestQuery leftJoinArtRequestAssignment($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestAssignment relation
 * @method ArtRequestQuery rightJoinArtRequestAssignment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestAssignment relation
 * @method ArtRequestQuery innerJoinArtRequestAssignment($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestAssignment relation
 *
 * @method ArtRequestQuery leftJoinArtRequestAttachment($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestAttachment relation
 * @method ArtRequestQuery rightJoinArtRequestAttachment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestAttachment relation
 * @method ArtRequestQuery innerJoinArtRequestAttachment($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestAttachment relation
 *
 * @method ArtRequestQuery leftJoinBannerArtRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the BannerArtRequest relation
 * @method ArtRequestQuery rightJoinBannerArtRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BannerArtRequest relation
 * @method ArtRequestQuery innerJoinBannerArtRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the BannerArtRequest relation
 *
 * @method ArtRequestQuery leftJoinFlyerArtRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlyerArtRequest relation
 * @method ArtRequestQuery rightJoinFlyerArtRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlyerArtRequest relation
 * @method ArtRequestQuery innerJoinFlyerArtRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the FlyerArtRequest relation
 *
 * @method ArtRequest findOne(PropelPDO $con = null) Return the first ArtRequest matching the query
 * @method ArtRequest findOneOrCreate(PropelPDO $con = null) Return the first ArtRequest matching the query, or a new ArtRequest object populated from the query conditions when no match is found
 *
 * @method ArtRequest findOneByArtRequestId(int $art_request_id) Return the first ArtRequest filtered by the art_request_id column
 * @method ArtRequest findOneByIsStarted(boolean $is_started) Return the first ArtRequest filtered by the is_started column
 * @method ArtRequest findOneByIsCompleted(boolean $is_completed) Return the first ArtRequest filtered by the is_completed column
 * @method ArtRequest findOneByIsArchived(boolean $is_archived) Return the first ArtRequest filtered by the is_archived column
 * @method ArtRequest findOneByDueDate(string $due_date) Return the first ArtRequest filtered by the due_date column
 * @method ArtRequest findOneByArtRequestorId(int $art_requestor_id) Return the first ArtRequest filtered by the art_requestor_id column
 * @method ArtRequest findOneByEventId(int $event_id) Return the first ArtRequest filtered by the event_id column
 * @method ArtRequest findOneByArtRequestDescription(string $art_request_description) Return the first ArtRequest filtered by the art_request_description column
 * @method ArtRequest findOneBySubmissionDate(string $submission_date) Return the first ArtRequest filtered by the submission_date column
 *
 * @method array findByArtRequestId(int $art_request_id) Return ArtRequest objects filtered by the art_request_id column
 * @method array findByIsStarted(boolean $is_started) Return ArtRequest objects filtered by the is_started column
 * @method array findByIsCompleted(boolean $is_completed) Return ArtRequest objects filtered by the is_completed column
 * @method array findByIsArchived(boolean $is_archived) Return ArtRequest objects filtered by the is_archived column
 * @method array findByDueDate(string $due_date) Return ArtRequest objects filtered by the due_date column
 * @method array findByArtRequestorId(int $art_requestor_id) Return ArtRequest objects filtered by the art_requestor_id column
 * @method array findByEventId(int $event_id) Return ArtRequest objects filtered by the event_id column
 * @method array findByArtRequestDescription(string $art_request_description) Return ArtRequest objects filtered by the art_request_description column
 * @method array findBySubmissionDate(string $submission_date) Return ArtRequest objects filtered by the submission_date column
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseArtRequestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArtRequestQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'art_request', $modelName = 'ArtRequestORM\\ArtRequest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArtRequestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ArtRequestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArtRequestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArtRequestQuery) {
            return $criteria;
        }
        $query = new ArtRequestQuery();
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
     * @return   ArtRequest|ArtRequest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArtRequestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ArtRequest A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ART_REQUEST_ID`, `IS_STARTED`, `IS_COMPLETED`, `IS_ARCHIVED`, `DUE_DATE`, `ART_REQUESTOR_ID`, `EVENT_ID`, `ART_REQUEST_DESCRIPTION`, `SUBMISSION_DATE` FROM `art_request` WHERE `ART_REQUEST_ID` = :p0';
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
            $obj = new ArtRequest();
            $obj->hydrate($row);
            ArtRequestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ArtRequest|ArtRequest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ArtRequest[]|mixed the list of results, formatted by the current formatter
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
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the art_request_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtRequestId(1234); // WHERE art_request_id = 1234
     * $query->filterByArtRequestId(array(12, 34)); // WHERE art_request_id IN (12, 34)
     * $query->filterByArtRequestId(array('min' => 12)); // WHERE art_request_id > 12
     * </code>
     *
     * @param     mixed $artRequestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByArtRequestId($artRequestId = null, $comparison = null)
    {
        if (is_array($artRequestId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $artRequestId, $comparison);
    }

    /**
     * Filter the query on the is_started column
     *
     * Example usage:
     * <code>
     * $query->filterByIsStarted(true); // WHERE is_started = true
     * $query->filterByIsStarted('yes'); // WHERE is_started = true
     * </code>
     *
     * @param     boolean|string $isStarted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByIsStarted($isStarted = null, $comparison = null)
    {
        if (is_string($isStarted)) {
            $is_started = in_array(strtolower($isStarted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ArtRequestPeer::IS_STARTED, $isStarted, $comparison);
    }

    /**
     * Filter the query on the is_completed column
     *
     * Example usage:
     * <code>
     * $query->filterByIsCompleted(true); // WHERE is_completed = true
     * $query->filterByIsCompleted('yes'); // WHERE is_completed = true
     * </code>
     *
     * @param     boolean|string $isCompleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByIsCompleted($isCompleted = null, $comparison = null)
    {
        if (is_string($isCompleted)) {
            $is_completed = in_array(strtolower($isCompleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ArtRequestPeer::IS_COMPLETED, $isCompleted, $comparison);
    }

    /**
     * Filter the query on the is_archived column
     *
     * Example usage:
     * <code>
     * $query->filterByIsArchived(true); // WHERE is_archived = true
     * $query->filterByIsArchived('yes'); // WHERE is_archived = true
     * </code>
     *
     * @param     boolean|string $isArchived The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByIsArchived($isArchived = null, $comparison = null)
    {
        if (is_string($isArchived)) {
            $is_archived = in_array(strtolower($isArchived), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ArtRequestPeer::IS_ARCHIVED, $isArchived, $comparison);
    }

    /**
     * Filter the query on the due_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDueDate('2011-03-14'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate('now'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate(array('max' => 'yesterday')); // WHERE due_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $dueDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByDueDate($dueDate = null, $comparison = null)
    {
        if (is_array($dueDate)) {
            $useMinMax = false;
            if (isset($dueDate['min'])) {
                $this->addUsingAlias(ArtRequestPeer::DUE_DATE, $dueDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dueDate['max'])) {
                $this->addUsingAlias(ArtRequestPeer::DUE_DATE, $dueDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArtRequestPeer::DUE_DATE, $dueDate, $comparison);
    }

    /**
     * Filter the query on the art_requestor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtRequestorId(1234); // WHERE art_requestor_id = 1234
     * $query->filterByArtRequestorId(array(12, 34)); // WHERE art_requestor_id IN (12, 34)
     * $query->filterByArtRequestorId(array('min' => 12)); // WHERE art_requestor_id > 12
     * </code>
     *
     * @see       filterByArtRequestor()
     *
     * @param     mixed $artRequestorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByArtRequestorId($artRequestorId = null, $comparison = null)
    {
        if (is_array($artRequestorId)) {
            $useMinMax = false;
            if (isset($artRequestorId['min'])) {
                $this->addUsingAlias(ArtRequestPeer::ART_REQUESTOR_ID, $artRequestorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artRequestorId['max'])) {
                $this->addUsingAlias(ArtRequestPeer::ART_REQUESTOR_ID, $artRequestorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArtRequestPeer::ART_REQUESTOR_ID, $artRequestorId, $comparison);
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
     * @see       filterByEvent()
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(ArtRequestPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(ArtRequestPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArtRequestPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the art_request_description column
     *
     * Example usage:
     * <code>
     * $query->filterByArtRequestDescription('fooValue');   // WHERE art_request_description = 'fooValue'
     * $query->filterByArtRequestDescription('%fooValue%'); // WHERE art_request_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artRequestDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterByArtRequestDescription($artRequestDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artRequestDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artRequestDescription)) {
                $artRequestDescription = str_replace('*', '%', $artRequestDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArtRequestPeer::ART_REQUEST_DESCRIPTION, $artRequestDescription, $comparison);
    }

    /**
     * Filter the query on the submission_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySubmissionDate('2011-03-14'); // WHERE submission_date = '2011-03-14'
     * $query->filterBySubmissionDate('now'); // WHERE submission_date = '2011-03-14'
     * $query->filterBySubmissionDate(array('max' => 'yesterday')); // WHERE submission_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $submissionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function filterBySubmissionDate($submissionDate = null, $comparison = null)
    {
        if (is_array($submissionDate)) {
            $useMinMax = false;
            if (isset($submissionDate['min'])) {
                $this->addUsingAlias(ArtRequestPeer::SUBMISSION_DATE, $submissionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($submissionDate['max'])) {
                $this->addUsingAlias(ArtRequestPeer::SUBMISSION_DATE, $submissionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArtRequestPeer::SUBMISSION_DATE, $submissionDate, $comparison);
    }

    /**
     * Filter the query by a related ArtRequestor object
     *
     * @param   ArtRequestor|PropelObjectCollection $artRequestor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestor($artRequestor, $comparison = null)
    {
        if ($artRequestor instanceof ArtRequestor) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUESTOR_ID, $artRequestor->getArtRequestorId(), $comparison);
        } elseif ($artRequestor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUESTOR_ID, $artRequestor->toKeyValue('PrimaryKey', 'ArtRequestorId'), $comparison);
        } else {
            throw new PropelException('filterByArtRequestor() only accepts arguments of type ArtRequestor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequestor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinArtRequestor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequestor');

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
            $this->addJoinObject($join, 'ArtRequestor');
        }

        return $this;
    }

    /**
     * Use the ArtRequestor relation ArtRequestor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestorQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequestor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequestor', '\ArtRequestORM\ArtRequestorQuery');
    }

    /**
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(ArtRequestPeer::EVENT_ID, $event->getEventId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestPeer::EVENT_ID, $event->toKeyValue('PrimaryKey', 'EventId'), $comparison);
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type Event or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

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
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', '\ArtRequestORM\EventQuery');
    }

    /**
     * Filter the query by a related ArtRequestArtRequestType object
     *
     * @param   ArtRequestArtRequestType|PropelObjectCollection $artRequestArtRequestType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestArtRequestType($artRequestArtRequestType, $comparison = null)
    {
        if ($artRequestArtRequestType instanceof ArtRequestArtRequestType) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $artRequestArtRequestType->getArtRequestId(), $comparison);
        } elseif ($artRequestArtRequestType instanceof PropelObjectCollection) {
            return $this
                ->useArtRequestArtRequestTypeQuery()
                ->filterByPrimaryKeys($artRequestArtRequestType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArtRequestArtRequestType() only accepts arguments of type ArtRequestArtRequestType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequestArtRequestType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinArtRequestArtRequestType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequestArtRequestType');

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
            $this->addJoinObject($join, 'ArtRequestArtRequestType');
        }

        return $this;
    }

    /**
     * Use the ArtRequestArtRequestType relation ArtRequestArtRequestType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestArtRequestTypeQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestArtRequestTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequestArtRequestType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequestArtRequestType', '\ArtRequestORM\ArtRequestArtRequestTypeQuery');
    }

    /**
     * Filter the query by a related ArtRequestAssignment object
     *
     * @param   ArtRequestAssignment|PropelObjectCollection $artRequestAssignment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestAssignment($artRequestAssignment, $comparison = null)
    {
        if ($artRequestAssignment instanceof ArtRequestAssignment) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $artRequestAssignment->getArtRequestId(), $comparison);
        } elseif ($artRequestAssignment instanceof PropelObjectCollection) {
            return $this
                ->useArtRequestAssignmentQuery()
                ->filterByPrimaryKeys($artRequestAssignment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArtRequestAssignment() only accepts arguments of type ArtRequestAssignment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequestAssignment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinArtRequestAssignment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequestAssignment');

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
            $this->addJoinObject($join, 'ArtRequestAssignment');
        }

        return $this;
    }

    /**
     * Use the ArtRequestAssignment relation ArtRequestAssignment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestAssignmentQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestAssignmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequestAssignment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequestAssignment', '\ArtRequestORM\ArtRequestAssignmentQuery');
    }

    /**
     * Filter the query by a related ArtRequestAttachment object
     *
     * @param   ArtRequestAttachment|PropelObjectCollection $artRequestAttachment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestAttachment($artRequestAttachment, $comparison = null)
    {
        if ($artRequestAttachment instanceof ArtRequestAttachment) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $artRequestAttachment->getArtRequestId(), $comparison);
        } elseif ($artRequestAttachment instanceof PropelObjectCollection) {
            return $this
                ->useArtRequestAttachmentQuery()
                ->filterByPrimaryKeys($artRequestAttachment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArtRequestAttachment() only accepts arguments of type ArtRequestAttachment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequestAttachment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinArtRequestAttachment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequestAttachment');

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
            $this->addJoinObject($join, 'ArtRequestAttachment');
        }

        return $this;
    }

    /**
     * Use the ArtRequestAttachment relation ArtRequestAttachment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestAttachmentQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestAttachmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequestAttachment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequestAttachment', '\ArtRequestORM\ArtRequestAttachmentQuery');
    }

    /**
     * Filter the query by a related BannerArtRequest object
     *
     * @param   BannerArtRequest|PropelObjectCollection $bannerArtRequest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByBannerArtRequest($bannerArtRequest, $comparison = null)
    {
        if ($bannerArtRequest instanceof BannerArtRequest) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $bannerArtRequest->getArtRequestId(), $comparison);
        } elseif ($bannerArtRequest instanceof PropelObjectCollection) {
            return $this
                ->useBannerArtRequestQuery()
                ->filterByPrimaryKeys($bannerArtRequest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBannerArtRequest() only accepts arguments of type BannerArtRequest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BannerArtRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinBannerArtRequest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BannerArtRequest');

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
            $this->addJoinObject($join, 'BannerArtRequest');
        }

        return $this;
    }

    /**
     * Use the BannerArtRequest relation BannerArtRequest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\BannerArtRequestQuery A secondary query class using the current class as primary query
     */
    public function useBannerArtRequestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBannerArtRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BannerArtRequest', '\ArtRequestORM\BannerArtRequestQuery');
    }

    /**
     * Filter the query by a related FlyerArtRequest object
     *
     * @param   FlyerArtRequest|PropelObjectCollection $flyerArtRequest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFlyerArtRequest($flyerArtRequest, $comparison = null)
    {
        if ($flyerArtRequest instanceof FlyerArtRequest) {
            return $this
                ->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $flyerArtRequest->getArtRequestId(), $comparison);
        } elseif ($flyerArtRequest instanceof PropelObjectCollection) {
            return $this
                ->useFlyerArtRequestQuery()
                ->filterByPrimaryKeys($flyerArtRequest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFlyerArtRequest() only accepts arguments of type FlyerArtRequest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FlyerArtRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function joinFlyerArtRequest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FlyerArtRequest');

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
            $this->addJoinObject($join, 'FlyerArtRequest');
        }

        return $this;
    }

    /**
     * Use the FlyerArtRequest relation FlyerArtRequest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\FlyerArtRequestQuery A secondary query class using the current class as primary query
     */
    public function useFlyerArtRequestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFlyerArtRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FlyerArtRequest', '\ArtRequestORM\FlyerArtRequestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ArtRequest $artRequest Object to remove from the list of results
     *
     * @return ArtRequestQuery The current query, for fluid interface
     */
    public function prune($artRequest = null)
    {
        if ($artRequest) {
            $this->addUsingAlias(ArtRequestPeer::ART_REQUEST_ID, $artRequest->getArtRequestId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

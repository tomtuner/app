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
use ArtRequestORM\ArtRequestAssignment;
use ArtRequestORM\ArtRequestAssignmentPeer;
use ArtRequestORM\ArtRequestAssignmentQuery;
use ArtRequestORM\Artist;

/**
 * Base class that represents a query for the 'art_request_assignment' table.
 *
 *
 *
 * @method ArtRequestAssignmentQuery orderByArtRequestId($order = Criteria::ASC) Order by the art_request_id column
 * @method ArtRequestAssignmentQuery orderByArtistId($order = Criteria::ASC) Order by the artist_id column
 *
 * @method ArtRequestAssignmentQuery groupByArtRequestId() Group by the art_request_id column
 * @method ArtRequestAssignmentQuery groupByArtistId() Group by the artist_id column
 *
 * @method ArtRequestAssignmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArtRequestAssignmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArtRequestAssignmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArtRequestAssignmentQuery leftJoinArtRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequest relation
 * @method ArtRequestAssignmentQuery rightJoinArtRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequest relation
 * @method ArtRequestAssignmentQuery innerJoinArtRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequest relation
 *
 * @method ArtRequestAssignmentQuery leftJoinArtist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artist relation
 * @method ArtRequestAssignmentQuery rightJoinArtist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artist relation
 * @method ArtRequestAssignmentQuery innerJoinArtist($relationAlias = null) Adds a INNER JOIN clause to the query using the Artist relation
 *
 * @method ArtRequestAssignment findOne(PropelPDO $con = null) Return the first ArtRequestAssignment matching the query
 * @method ArtRequestAssignment findOneOrCreate(PropelPDO $con = null) Return the first ArtRequestAssignment matching the query, or a new ArtRequestAssignment object populated from the query conditions when no match is found
 *
 * @method ArtRequestAssignment findOneByArtRequestId(int $art_request_id) Return the first ArtRequestAssignment filtered by the art_request_id column
 * @method ArtRequestAssignment findOneByArtistId(int $artist_id) Return the first ArtRequestAssignment filtered by the artist_id column
 *
 * @method array findByArtRequestId(int $art_request_id) Return ArtRequestAssignment objects filtered by the art_request_id column
 * @method array findByArtistId(int $artist_id) Return ArtRequestAssignment objects filtered by the artist_id column
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseArtRequestAssignmentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArtRequestAssignmentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'art_request', $modelName = 'ArtRequestORM\\ArtRequestAssignment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArtRequestAssignmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ArtRequestAssignmentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArtRequestAssignmentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArtRequestAssignmentQuery) {
            return $criteria;
        }
        $query = new ArtRequestAssignmentQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$art_request_id, $artist_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ArtRequestAssignment|ArtRequestAssignment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArtRequestAssignmentPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestAssignmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ArtRequestAssignment A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ART_REQUEST_ID`, `ARTIST_ID` FROM `art_request_assignment` WHERE `ART_REQUEST_ID` = :p0 AND `ARTIST_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ArtRequestAssignment();
            $obj->hydrate($row);
            ArtRequestAssignmentPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ArtRequestAssignment|ArtRequestAssignment[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ArtRequestAssignment[]|mixed the list of results, formatted by the current formatter
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
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ArtRequestAssignmentPeer::ART_REQUEST_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ArtRequestAssignmentPeer::ARTIST_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ArtRequestAssignmentPeer::ART_REQUEST_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ArtRequestAssignmentPeer::ARTIST_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByArtRequest()
     *
     * @param     mixed $artRequestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function filterByArtRequestId($artRequestId = null, $comparison = null)
    {
        if (is_array($artRequestId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtRequestAssignmentPeer::ART_REQUEST_ID, $artRequestId, $comparison);
    }

    /**
     * Filter the query on the artist_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistId(1234); // WHERE artist_id = 1234
     * $query->filterByArtistId(array(12, 34)); // WHERE artist_id IN (12, 34)
     * $query->filterByArtistId(array('min' => 12)); // WHERE artist_id > 12
     * </code>
     *
     * @see       filterByArtist()
     *
     * @param     mixed $artistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function filterByArtistId($artistId = null, $comparison = null)
    {
        if (is_array($artistId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtRequestAssignmentPeer::ARTIST_ID, $artistId, $comparison);
    }

    /**
     * Filter the query by a related ArtRequest object
     *
     * @param   ArtRequest|PropelObjectCollection $artRequest The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestAssignmentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequest($artRequest, $comparison = null)
    {
        if ($artRequest instanceof ArtRequest) {
            return $this
                ->addUsingAlias(ArtRequestAssignmentPeer::ART_REQUEST_ID, $artRequest->getArtRequestId(), $comparison);
        } elseif ($artRequest instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestAssignmentPeer::ART_REQUEST_ID, $artRequest->toKeyValue('PrimaryKey', 'ArtRequestId'), $comparison);
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
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
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
     * Filter the query by a related Artist object
     *
     * @param   Artist|PropelObjectCollection $artist The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestAssignmentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtist($artist, $comparison = null)
    {
        if ($artist instanceof Artist) {
            return $this
                ->addUsingAlias(ArtRequestAssignmentPeer::ARTIST_ID, $artist->getArtistId(), $comparison);
        } elseif ($artist instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestAssignmentPeer::ARTIST_ID, $artist->toKeyValue('PrimaryKey', 'ArtistId'), $comparison);
        } else {
            throw new PropelException('filterByArtist() only accepts arguments of type Artist or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Artist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function joinArtist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Artist');

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
            $this->addJoinObject($join, 'Artist');
        }

        return $this;
    }

    /**
     * Use the Artist relation Artist object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtistQuery A secondary query class using the current class as primary query
     */
    public function useArtistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Artist', '\ArtRequestORM\ArtistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ArtRequestAssignment $artRequestAssignment Object to remove from the list of results
     *
     * @return ArtRequestAssignmentQuery The current query, for fluid interface
     */
    public function prune($artRequestAssignment = null)
    {
        if ($artRequestAssignment) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ArtRequestAssignmentPeer::ART_REQUEST_ID), $artRequestAssignment->getArtRequestId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ArtRequestAssignmentPeer::ARTIST_ID), $artRequestAssignment->getArtistId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}

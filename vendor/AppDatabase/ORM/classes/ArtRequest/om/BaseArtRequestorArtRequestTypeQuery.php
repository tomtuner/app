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
use ArtRequestORM\ArtRequestType;
use ArtRequestORM\ArtRequestorArtRequestType;
use ArtRequestORM\ArtRequestorArtRequestTypePeer;
use ArtRequestORM\ArtRequestorArtRequestTypeQuery;

/**
 * Base class that represents a query for the 'art_requestor_art_request_type' table.
 *
 *
 *
 * @method ArtRequestorArtRequestTypeQuery orderByArtRequestTypeId($order = Criteria::ASC) Order by the art_request_type_id column
 * @method ArtRequestorArtRequestTypeQuery orderByArtRequestId($order = Criteria::ASC) Order by the art_request_id column
 *
 * @method ArtRequestorArtRequestTypeQuery groupByArtRequestTypeId() Group by the art_request_type_id column
 * @method ArtRequestorArtRequestTypeQuery groupByArtRequestId() Group by the art_request_id column
 *
 * @method ArtRequestorArtRequestTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArtRequestorArtRequestTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArtRequestorArtRequestTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArtRequestorArtRequestTypeQuery leftJoinArtRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequest relation
 * @method ArtRequestorArtRequestTypeQuery rightJoinArtRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequest relation
 * @method ArtRequestorArtRequestTypeQuery innerJoinArtRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequest relation
 *
 * @method ArtRequestorArtRequestTypeQuery leftJoinArtRequestType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestType relation
 * @method ArtRequestorArtRequestTypeQuery rightJoinArtRequestType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestType relation
 * @method ArtRequestorArtRequestTypeQuery innerJoinArtRequestType($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestType relation
 *
 * @method ArtRequestorArtRequestType findOne(PropelPDO $con = null) Return the first ArtRequestorArtRequestType matching the query
 * @method ArtRequestorArtRequestType findOneOrCreate(PropelPDO $con = null) Return the first ArtRequestorArtRequestType matching the query, or a new ArtRequestorArtRequestType object populated from the query conditions when no match is found
 *
 * @method ArtRequestorArtRequestType findOneByArtRequestTypeId(int $art_request_type_id) Return the first ArtRequestorArtRequestType filtered by the art_request_type_id column
 * @method ArtRequestorArtRequestType findOneByArtRequestId(int $art_request_id) Return the first ArtRequestorArtRequestType filtered by the art_request_id column
 *
 * @method array findByArtRequestTypeId(int $art_request_type_id) Return ArtRequestorArtRequestType objects filtered by the art_request_type_id column
 * @method array findByArtRequestId(int $art_request_id) Return ArtRequestorArtRequestType objects filtered by the art_request_id column
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseArtRequestorArtRequestTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArtRequestorArtRequestTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'art_request', $modelName = 'ArtRequestORM\\ArtRequestorArtRequestType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArtRequestorArtRequestTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ArtRequestorArtRequestTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArtRequestorArtRequestTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArtRequestorArtRequestTypeQuery) {
            return $criteria;
        }
        $query = new ArtRequestorArtRequestTypeQuery();
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
                         A Primary key composition: [$art_request_type_id, $art_request_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ArtRequestorArtRequestType|ArtRequestorArtRequestType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArtRequestorArtRequestTypePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArtRequestorArtRequestTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ArtRequestorArtRequestType A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ART_REQUEST_TYPE_ID`, `ART_REQUEST_ID` FROM `art_requestor_art_request_type` WHERE `ART_REQUEST_TYPE_ID` = :p0 AND `ART_REQUEST_ID` = :p1';
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
            $obj = new ArtRequestorArtRequestType();
            $obj->hydrate($row);
            ArtRequestorArtRequestTypePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ArtRequestorArtRequestType|ArtRequestorArtRequestType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ArtRequestorArtRequestType[]|mixed the list of results, formatted by the current formatter
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
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the art_request_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtRequestTypeId(1234); // WHERE art_request_type_id = 1234
     * $query->filterByArtRequestTypeId(array(12, 34)); // WHERE art_request_type_id IN (12, 34)
     * $query->filterByArtRequestTypeId(array('min' => 12)); // WHERE art_request_type_id > 12
     * </code>
     *
     * @see       filterByArtRequestType()
     *
     * @param     mixed $artRequestTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function filterByArtRequestTypeId($artRequestTypeId = null, $comparison = null)
    {
        if (is_array($artRequestTypeId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID, $artRequestTypeId, $comparison);
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
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function filterByArtRequestId($artRequestId = null, $comparison = null)
    {
        if (is_array($artRequestId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID, $artRequestId, $comparison);
    }

    /**
     * Filter the query by a related ArtRequest object
     *
     * @param   ArtRequest|PropelObjectCollection $artRequest The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequest($artRequest, $comparison = null)
    {
        if ($artRequest instanceof ArtRequest) {
            return $this
                ->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID, $artRequest->getArtRequestId(), $comparison);
        } elseif ($artRequest instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID, $artRequest->toKeyValue('PrimaryKey', 'ArtRequestId'), $comparison);
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
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
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
     * Filter the query by a related ArtRequestType object
     *
     * @param   ArtRequestType|PropelObjectCollection $artRequestType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestType($artRequestType, $comparison = null)
    {
        if ($artRequestType instanceof ArtRequestType) {
            return $this
                ->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID, $artRequestType->getArtRequestTypeId(), $comparison);
        } elseif ($artRequestType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID, $artRequestType->toKeyValue('PrimaryKey', 'ArtRequestTypeId'), $comparison);
        } else {
            throw new PropelException('filterByArtRequestType() only accepts arguments of type ArtRequestType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ArtRequestType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function joinArtRequestType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ArtRequestType');

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
            $this->addJoinObject($join, 'ArtRequestType');
        }

        return $this;
    }

    /**
     * Use the ArtRequestType relation ArtRequestType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ArtRequestORM\ArtRequestTypeQuery A secondary query class using the current class as primary query
     */
    public function useArtRequestTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtRequestType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ArtRequestType', '\ArtRequestORM\ArtRequestTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ArtRequestorArtRequestType $artRequestorArtRequestType Object to remove from the list of results
     *
     * @return ArtRequestorArtRequestTypeQuery The current query, for fluid interface
     */
    public function prune($artRequestorArtRequestType = null)
    {
        if ($artRequestorArtRequestType) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ArtRequestorArtRequestTypePeer::ART_REQUEST_TYPE_ID), $artRequestorArtRequestType->getArtRequestTypeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ArtRequestorArtRequestTypePeer::ART_REQUEST_ID), $artRequestorArtRequestType->getArtRequestId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}

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
use ArtRequestORM\ArtRequestAssignment;
use ArtRequestORM\Artist;
use ArtRequestORM\ArtistPeer;
use ArtRequestORM\ArtistQuery;

/**
 * Base class that represents a query for the 'artist' table.
 *
 *
 *
 * @method ArtistQuery orderByArtistId($order = Criteria::ASC) Order by the artist_id column
 * @method ArtistQuery orderByArtistDceName($order = Criteria::ASC) Order by the artist_dce_name column
 * @method ArtistQuery orderByArtistFirstName($order = Criteria::ASC) Order by the artist_first_name column
 * @method ArtistQuery orderByArtistLastName($order = Criteria::ASC) Order by the artist_last_name column
 *
 * @method ArtistQuery groupByArtistId() Group by the artist_id column
 * @method ArtistQuery groupByArtistDceName() Group by the artist_dce_name column
 * @method ArtistQuery groupByArtistFirstName() Group by the artist_first_name column
 * @method ArtistQuery groupByArtistLastName() Group by the artist_last_name column
 *
 * @method ArtistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArtistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArtistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArtistQuery leftJoinArtRequestAssignment($relationAlias = null) Adds a LEFT JOIN clause to the query using the ArtRequestAssignment relation
 * @method ArtistQuery rightJoinArtRequestAssignment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ArtRequestAssignment relation
 * @method ArtistQuery innerJoinArtRequestAssignment($relationAlias = null) Adds a INNER JOIN clause to the query using the ArtRequestAssignment relation
 *
 * @method Artist findOne(PropelPDO $con = null) Return the first Artist matching the query
 * @method Artist findOneOrCreate(PropelPDO $con = null) Return the first Artist matching the query, or a new Artist object populated from the query conditions when no match is found
 *
 * @method Artist findOneByArtistId(int $artist_id) Return the first Artist filtered by the artist_id column
 * @method Artist findOneByArtistDceName(string $artist_dce_name) Return the first Artist filtered by the artist_dce_name column
 * @method Artist findOneByArtistFirstName(string $artist_first_name) Return the first Artist filtered by the artist_first_name column
 * @method Artist findOneByArtistLastName(string $artist_last_name) Return the first Artist filtered by the artist_last_name column
 *
 * @method array findByArtistId(int $artist_id) Return Artist objects filtered by the artist_id column
 * @method array findByArtistDceName(string $artist_dce_name) Return Artist objects filtered by the artist_dce_name column
 * @method array findByArtistFirstName(string $artist_first_name) Return Artist objects filtered by the artist_first_name column
 * @method array findByArtistLastName(string $artist_last_name) Return Artist objects filtered by the artist_last_name column
 *
 * @package    propel.generator.ArtRequest.om
 */
abstract class BaseArtistQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArtistQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'art_request', $modelName = 'ArtRequestORM\\Artist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArtistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ArtistQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArtistQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArtistQuery) {
            return $criteria;
        }
        $query = new ArtistQuery();
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
     * @return   Artist|Artist[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArtistPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArtistPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Artist A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ARTIST_ID`, `ARTIST_DCE_NAME`, `ARTIST_FIRST_NAME`, `ARTIST_LAST_NAME` FROM `artist` WHERE `ARTIST_ID` = :p0';
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
            $obj = new Artist();
            $obj->hydrate($row);
            ArtistPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Artist|Artist[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Artist[]|mixed the list of results, formatted by the current formatter
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
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArtistPeer::ARTIST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArtistPeer::ARTIST_ID, $keys, Criteria::IN);
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
     * @param     mixed $artistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByArtistId($artistId = null, $comparison = null)
    {
        if (is_array($artistId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArtistPeer::ARTIST_ID, $artistId, $comparison);
    }

    /**
     * Filter the query on the artist_dce_name column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistDceName('fooValue');   // WHERE artist_dce_name = 'fooValue'
     * $query->filterByArtistDceName('%fooValue%'); // WHERE artist_dce_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artistDceName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByArtistDceName($artistDceName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artistDceName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artistDceName)) {
                $artistDceName = str_replace('*', '%', $artistDceName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArtistPeer::ARTIST_DCE_NAME, $artistDceName, $comparison);
    }

    /**
     * Filter the query on the artist_first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistFirstName('fooValue');   // WHERE artist_first_name = 'fooValue'
     * $query->filterByArtistFirstName('%fooValue%'); // WHERE artist_first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artistFirstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByArtistFirstName($artistFirstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artistFirstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artistFirstName)) {
                $artistFirstName = str_replace('*', '%', $artistFirstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArtistPeer::ARTIST_FIRST_NAME, $artistFirstName, $comparison);
    }

    /**
     * Filter the query on the artist_last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistLastName('fooValue');   // WHERE artist_last_name = 'fooValue'
     * $query->filterByArtistLastName('%fooValue%'); // WHERE artist_last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artistLastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function filterByArtistLastName($artistLastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artistLastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artistLastName)) {
                $artistLastName = str_replace('*', '%', $artistLastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArtistPeer::ARTIST_LAST_NAME, $artistLastName, $comparison);
    }

    /**
     * Filter the query by a related ArtRequestAssignment object
     *
     * @param   ArtRequestAssignment|PropelObjectCollection $artRequestAssignment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ArtistQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArtRequestAssignment($artRequestAssignment, $comparison = null)
    {
        if ($artRequestAssignment instanceof ArtRequestAssignment) {
            return $this
                ->addUsingAlias(ArtistPeer::ARTIST_ID, $artRequestAssignment->getArtistId(), $comparison);
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
     * @return ArtistQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Artist $artist Object to remove from the list of results
     *
     * @return ArtistQuery The current query, for fluid interface
     */
    public function prune($artist = null)
    {
        if ($artist) {
            $this->addUsingAlias(ArtistPeer::ARTIST_ID, $artist->getArtistId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\ClubSpace;
use NewClubsORM\ClubSpacePeer;
use NewClubsORM\ClubSpaceQuery;

/**
 * Base class that represents a query for the 'club_space' table.
 *
 * 
 *
 * @method     ClubSpaceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubSpaceQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ClubSpaceQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ClubSpaceQuery groupById() Group by the id column
 * @method     ClubSpaceQuery groupByLocation() Group by the location column
 * @method     ClubSpaceQuery groupByDescription() Group by the description column
 *
 * @method     ClubSpaceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubSpaceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubSpaceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubSpace findOne(PropelPDO $con = null) Return the first ClubSpace matching the query
 * @method     ClubSpace findOneOrCreate(PropelPDO $con = null) Return the first ClubSpace matching the query, or a new ClubSpace object populated from the query conditions when no match is found
 *
 * @method     ClubSpace findOneById(int $id) Return the first ClubSpace filtered by the id column
 * @method     ClubSpace findOneByLocation(string $location) Return the first ClubSpace filtered by the location column
 * @method     ClubSpace findOneByDescription(string $description) Return the first ClubSpace filtered by the description column
 *
 * @method     array findById(int $id) Return ClubSpace objects filtered by the id column
 * @method     array findByLocation(string $location) Return ClubSpace objects filtered by the location column
 * @method     array findByDescription(string $description) Return ClubSpace objects filtered by the description column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubSpaceQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubSpaceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\ClubSpace', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubSpaceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubSpaceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubSpaceQuery) {
			return $criteria;
		}
		$query = new ClubSpaceQuery();
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
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClubSpace|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubSpacePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubSpacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClubSpace A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `LOCATION`, `DESCRIPTION` FROM `club_space` WHERE `ID` = :p0';
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
			$obj = new ClubSpace();
			$obj->hydrate($row);
			ClubSpacePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ClubSpace|array|mixed the result, formatted by the current formatter
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
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
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
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubSpacePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubSpacePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubSpacePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the location column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
	 * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $location The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function filterByLocation($location = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($location)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $location)) {
				$location = str_replace('*', '%', $location);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubSpacePeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $description The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubSpacePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClubSpace $clubSpace Object to remove from the list of results
	 *
	 * @return    ClubSpaceQuery The current query, for fluid interface
	 */
	public function prune($clubSpace = null)
	{
		if ($clubSpace) {
			$this->addUsingAlias(ClubSpacePeer::ID, $clubSpace->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubSpaceQuery
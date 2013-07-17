<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\Messages;
use NewClubsORM\MessagesPeer;
use NewClubsORM\MessagesQuery;

/**
 * Base class that represents a query for the 'messages' table.
 *
 * 
 *
 * @method     MessagesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MessagesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     MessagesQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     MessagesQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     MessagesQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 *
 * @method     MessagesQuery groupById() Group by the id column
 * @method     MessagesQuery groupByType() Group by the type column
 * @method     MessagesQuery groupBySubject() Group by the subject column
 * @method     MessagesQuery groupByBody() Group by the body column
 * @method     MessagesQuery groupByNotes() Group by the notes column
 *
 * @method     MessagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MessagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MessagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Messages findOne(PropelPDO $con = null) Return the first Messages matching the query
 * @method     Messages findOneOrCreate(PropelPDO $con = null) Return the first Messages matching the query, or a new Messages object populated from the query conditions when no match is found
 *
 * @method     Messages findOneById(int $id) Return the first Messages filtered by the id column
 * @method     Messages findOneByType(int $type) Return the first Messages filtered by the type column
 * @method     Messages findOneBySubject(string $subject) Return the first Messages filtered by the subject column
 * @method     Messages findOneByBody(string $body) Return the first Messages filtered by the body column
 * @method     Messages findOneByNotes(string $notes) Return the first Messages filtered by the notes column
 *
 * @method     array findById(int $id) Return Messages objects filtered by the id column
 * @method     array findByType(int $type) Return Messages objects filtered by the type column
 * @method     array findBySubject(string $subject) Return Messages objects filtered by the subject column
 * @method     array findByBody(string $body) Return Messages objects filtered by the body column
 * @method     array findByNotes(string $notes) Return Messages objects filtered by the notes column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseMessagesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMessagesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\Messages', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MessagesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MessagesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MessagesQuery) {
			return $criteria;
		}
		$query = new MessagesQuery();
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
	 * @return    Messages|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MessagesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MessagesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Messages A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TYPE`, `SUBJECT`, `BODY`, `NOTES` FROM `messages` WHERE `ID` = :p0';
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
			$obj = new Messages();
			$obj->hydrate($row);
			MessagesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Messages|array|mixed the result, formatted by the current formatter
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
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MessagesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MessagesPeer::ID, $keys, Criteria::IN);
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
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MessagesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByType(1234); // WHERE type = 1234
	 * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
	 * $query->filterByType(array('min' => 12)); // WHERE type > 12
	 * </code>
	 *
	 * @param     mixed $type The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(MessagesPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(MessagesPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MessagesPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
	 * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $subject The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterBySubject($subject = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subject)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subject)) {
				$subject = str_replace('*', '%', $subject);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagesPeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the body column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBody('fooValue');   // WHERE body = 'fooValue'
	 * $query->filterByBody('%fooValue%'); // WHERE body LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $body The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($body)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $body)) {
				$body = str_replace('*', '%', $body);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagesPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the notes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
	 * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $notes The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function filterByNotes($notes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($notes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $notes)) {
				$notes = str_replace('*', '%', $notes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagesPeer::NOTES, $notes, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Messages $messages Object to remove from the list of results
	 *
	 * @return    MessagesQuery The current query, for fluid interface
	 */
	public function prune($messages = null)
	{
		if ($messages) {
			$this->addUsingAlias(MessagesPeer::ID, $messages->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMessagesQuery
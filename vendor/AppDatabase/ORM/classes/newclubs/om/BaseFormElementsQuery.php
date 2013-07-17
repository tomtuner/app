<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\FormElements;
use NewClubsORM\FormElementsPeer;
use NewClubsORM\FormElementsQuery;

/**
 * Base class that represents a query for the 'form_elements' table.
 *
 * 
 *
 * @method     FormElementsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FormElementsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     FormElementsQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     FormElementsQuery orderByElement($order = Criteria::ASC) Order by the element column
 * @method     FormElementsQuery orderByPosValues($order = Criteria::ASC) Order by the pos_values column
 * @method     FormElementsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     FormElementsQuery orderBySection($order = Criteria::ASC) Order by the section column
 *
 * @method     FormElementsQuery groupById() Group by the id column
 * @method     FormElementsQuery groupByName() Group by the name column
 * @method     FormElementsQuery groupByDisplay() Group by the display column
 * @method     FormElementsQuery groupByElement() Group by the element column
 * @method     FormElementsQuery groupByPosValues() Group by the pos_values column
 * @method     FormElementsQuery groupByPosition() Group by the position column
 * @method     FormElementsQuery groupBySection() Group by the section column
 *
 * @method     FormElementsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FormElementsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FormElementsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FormElements findOne(PropelPDO $con = null) Return the first FormElements matching the query
 * @method     FormElements findOneOrCreate(PropelPDO $con = null) Return the first FormElements matching the query, or a new FormElements object populated from the query conditions when no match is found
 *
 * @method     FormElements findOneById(int $id) Return the first FormElements filtered by the id column
 * @method     FormElements findOneByName(string $name) Return the first FormElements filtered by the name column
 * @method     FormElements findOneByDisplay(string $display) Return the first FormElements filtered by the display column
 * @method     FormElements findOneByElement(string $element) Return the first FormElements filtered by the element column
 * @method     FormElements findOneByPosValues(string $pos_values) Return the first FormElements filtered by the pos_values column
 * @method     FormElements findOneByPosition(int $position) Return the first FormElements filtered by the position column
 * @method     FormElements findOneBySection(int $section) Return the first FormElements filtered by the section column
 *
 * @method     array findById(int $id) Return FormElements objects filtered by the id column
 * @method     array findByName(string $name) Return FormElements objects filtered by the name column
 * @method     array findByDisplay(string $display) Return FormElements objects filtered by the display column
 * @method     array findByElement(string $element) Return FormElements objects filtered by the element column
 * @method     array findByPosValues(string $pos_values) Return FormElements objects filtered by the pos_values column
 * @method     array findByPosition(int $position) Return FormElements objects filtered by the position column
 * @method     array findBySection(int $section) Return FormElements objects filtered by the section column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseFormElementsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFormElementsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\FormElements', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FormElementsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FormElementsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FormElementsQuery) {
			return $criteria;
		}
		$query = new FormElementsQuery();
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
	 * @return    FormElements|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FormElementsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FormElementsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    FormElements A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `DISPLAY`, `ELEMENT`, `POS_VALUES`, `POSITION`, `SECTION` FROM `form_elements` WHERE `ID` = :p0';
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
			$obj = new FormElements();
			$obj->hydrate($row);
			FormElementsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    FormElements|array|mixed the result, formatted by the current formatter
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
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FormElementsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FormElementsPeer::ID, $keys, Criteria::IN);
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
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FormElementsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the display column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDisplay('fooValue');   // WHERE display = 'fooValue'
	 * $query->filterByDisplay('%fooValue%'); // WHERE display LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $display The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByDisplay($display = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($display)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $display)) {
				$display = str_replace('*', '%', $display);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::DISPLAY, $display, $comparison);
	}

	/**
	 * Filter the query on the element column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByElement('fooValue');   // WHERE element = 'fooValue'
	 * $query->filterByElement('%fooValue%'); // WHERE element LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $element The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByElement($element = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($element)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $element)) {
				$element = str_replace('*', '%', $element);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::ELEMENT, $element, $comparison);
	}

	/**
	 * Filter the query on the pos_values column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosValues('fooValue');   // WHERE pos_values = 'fooValue'
	 * $query->filterByPosValues('%fooValue%'); // WHERE pos_values LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $posValues The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByPosValues($posValues = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($posValues)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $posValues)) {
				$posValues = str_replace('*', '%', $posValues);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::POS_VALUES, $posValues, $comparison);
	}

	/**
	 * Filter the query on the position column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosition(1234); // WHERE position = 1234
	 * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
	 * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
	 * </code>
	 *
	 * @param     mixed $position The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(FormElementsPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(FormElementsPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the section column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySection(1234); // WHERE section = 1234
	 * $query->filterBySection(array(12, 34)); // WHERE section IN (12, 34)
	 * $query->filterBySection(array('min' => 12)); // WHERE section > 12
	 * </code>
	 *
	 * @param     mixed $section The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function filterBySection($section = null, $comparison = null)
	{
		if (is_array($section)) {
			$useMinMax = false;
			if (isset($section['min'])) {
				$this->addUsingAlias(FormElementsPeer::SECTION, $section['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($section['max'])) {
				$this->addUsingAlias(FormElementsPeer::SECTION, $section['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormElementsPeer::SECTION, $section, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FormElements $formElements Object to remove from the list of results
	 *
	 * @return    FormElementsQuery The current query, for fluid interface
	 */
	public function prune($formElements = null)
	{
		if ($formElements) {
			$this->addUsingAlias(FormElementsPeer::ID, $formElements->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFormElementsQuery
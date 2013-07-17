<?php

namespace NewClubsORM\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use NewClubsORM\FormSections;
use NewClubsORM\FormSectionsPeer;
use NewClubsORM\FormSectionsQuery;

/**
 * Base class that represents a query for the 'form_sections' table.
 *
 * 
 *
 * @method     FormSectionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FormSectionsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     FormSectionsQuery orderByDescrip($order = Criteria::ASC) Order by the descrip column
 * @method     FormSectionsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     FormSectionsQuery orderByForm($order = Criteria::ASC) Order by the form column
 *
 * @method     FormSectionsQuery groupById() Group by the id column
 * @method     FormSectionsQuery groupByName() Group by the name column
 * @method     FormSectionsQuery groupByDescrip() Group by the descrip column
 * @method     FormSectionsQuery groupByPosition() Group by the position column
 * @method     FormSectionsQuery groupByForm() Group by the form column
 *
 * @method     FormSectionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FormSectionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FormSectionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FormSections findOne(PropelPDO $con = null) Return the first FormSections matching the query
 * @method     FormSections findOneOrCreate(PropelPDO $con = null) Return the first FormSections matching the query, or a new FormSections object populated from the query conditions when no match is found
 *
 * @method     FormSections findOneById(int $id) Return the first FormSections filtered by the id column
 * @method     FormSections findOneByName(string $name) Return the first FormSections filtered by the name column
 * @method     FormSections findOneByDescrip(string $descrip) Return the first FormSections filtered by the descrip column
 * @method     FormSections findOneByPosition(int $position) Return the first FormSections filtered by the position column
 * @method     FormSections findOneByForm(int $form) Return the first FormSections filtered by the form column
 *
 * @method     array findById(int $id) Return FormSections objects filtered by the id column
 * @method     array findByName(string $name) Return FormSections objects filtered by the name column
 * @method     array findByDescrip(string $descrip) Return FormSections objects filtered by the descrip column
 * @method     array findByPosition(int $position) Return FormSections objects filtered by the position column
 * @method     array findByForm(int $form) Return FormSections objects filtered by the form column
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseFormSectionsQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFormSectionsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'newclubs', $modelName = 'NewClubsORM\\FormSections', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FormSectionsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FormSectionsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FormSectionsQuery) {
			return $criteria;
		}
		$query = new FormSectionsQuery();
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
	 * @return    FormSections|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FormSectionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FormSectionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    FormSections A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `DESCRIP`, `POSITION`, `FORM` FROM `form_sections` WHERE `ID` = :p0';
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
			$obj = new FormSections();
			$obj->hydrate($row);
			FormSectionsPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    FormSections|array|mixed the result, formatted by the current formatter
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
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FormSectionsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FormSectionsPeer::ID, $keys, Criteria::IN);
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
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FormSectionsPeer::ID, $id, $comparison);
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
	 * @return    FormSectionsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(FormSectionsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the descrip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescrip('fooValue');   // WHERE descrip = 'fooValue'
	 * $query->filterByDescrip('%fooValue%'); // WHERE descrip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descrip The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterByDescrip($descrip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descrip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descrip)) {
				$descrip = str_replace('*', '%', $descrip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormSectionsPeer::DESCRIP, $descrip, $comparison);
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
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(FormSectionsPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(FormSectionsPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormSectionsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the form column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByForm(1234); // WHERE form = 1234
	 * $query->filterByForm(array(12, 34)); // WHERE form IN (12, 34)
	 * $query->filterByForm(array('min' => 12)); // WHERE form > 12
	 * </code>
	 *
	 * @param     mixed $form The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function filterByForm($form = null, $comparison = null)
	{
		if (is_array($form)) {
			$useMinMax = false;
			if (isset($form['min'])) {
				$this->addUsingAlias(FormSectionsPeer::FORM, $form['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($form['max'])) {
				$this->addUsingAlias(FormSectionsPeer::FORM, $form['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormSectionsPeer::FORM, $form, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FormSections $formSections Object to remove from the list of results
	 *
	 * @return    FormSectionsQuery The current query, for fluid interface
	 */
	public function prune($formSections = null)
	{
		if ($formSections) {
			$this->addUsingAlias(FormSectionsPeer::ID, $formSections->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFormSectionsQuery
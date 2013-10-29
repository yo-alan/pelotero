<?php


/**
 * Base class that represents a query for the 'telefono' table.
 *
 *
 *
 * @method TelefonoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TelefonoQuery orderByReservaId($order = Criteria::ASC) Order by the reserva_id column
 * @method TelefonoQuery orderByNomPadre($order = Criteria::ASC) Order by the nom_padre column
 * @method TelefonoQuery orderByNomHijo($order = Criteria::ASC) Order by the nom_hijo column
 *
 * @method TelefonoQuery groupById() Group by the id column
 * @method TelefonoQuery groupByReservaId() Group by the reserva_id column
 * @method TelefonoQuery groupByNomPadre() Group by the nom_padre column
 * @method TelefonoQuery groupByNomHijo() Group by the nom_hijo column
 *
 * @method TelefonoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TelefonoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TelefonoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TelefonoQuery leftJoinReserva($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reserva relation
 * @method TelefonoQuery rightJoinReserva($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reserva relation
 * @method TelefonoQuery innerJoinReserva($relationAlias = null) Adds a INNER JOIN clause to the query using the Reserva relation
 *
 * @method Telefono findOne(PropelPDO $con = null) Return the first Telefono matching the query
 * @method Telefono findOneOrCreate(PropelPDO $con = null) Return the first Telefono matching the query, or a new Telefono object populated from the query conditions when no match is found
 *
 * @method Telefono findOneByReservaId(int $reserva_id) Return the first Telefono filtered by the reserva_id column
 * @method Telefono findOneByNomPadre(string $nom_padre) Return the first Telefono filtered by the nom_padre column
 * @method Telefono findOneByNomHijo(string $nom_hijo) Return the first Telefono filtered by the nom_hijo column
 *
 * @method array findById(int $id) Return Telefono objects filtered by the id column
 * @method array findByReservaId(int $reserva_id) Return Telefono objects filtered by the reserva_id column
 * @method array findByNomPadre(string $nom_padre) Return Telefono objects filtered by the nom_padre column
 * @method array findByNomHijo(string $nom_hijo) Return Telefono objects filtered by the nom_hijo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTelefonoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTelefonoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Telefono', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TelefonoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TelefonoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TelefonoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TelefonoQuery) {
            return $criteria;
        }
        $query = new TelefonoQuery();
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
     * @return   Telefono|Telefono[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TelefonoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TelefonoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Telefono A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Telefono A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `reserva_id`, `nom_padre`, `nom_hijo` FROM `telefono` WHERE `id` = :p0';
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
            $obj = new Telefono();
            $obj->hydrate($row);
            TelefonoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Telefono|Telefono[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Telefono[]|mixed the list of results, formatted by the current formatter
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
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TelefonoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TelefonoPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TelefonoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TelefonoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TelefonoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the reserva_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReservaId(1234); // WHERE reserva_id = 1234
     * $query->filterByReservaId(array(12, 34)); // WHERE reserva_id IN (12, 34)
     * $query->filterByReservaId(array('min' => 12)); // WHERE reserva_id >= 12
     * $query->filterByReservaId(array('max' => 12)); // WHERE reserva_id <= 12
     * </code>
     *
     * @see       filterByReserva()
     *
     * @param     mixed $reservaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterByReservaId($reservaId = null, $comparison = null)
    {
        if (is_array($reservaId)) {
            $useMinMax = false;
            if (isset($reservaId['min'])) {
                $this->addUsingAlias(TelefonoPeer::RESERVA_ID, $reservaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reservaId['max'])) {
                $this->addUsingAlias(TelefonoPeer::RESERVA_ID, $reservaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TelefonoPeer::RESERVA_ID, $reservaId, $comparison);
    }

    /**
     * Filter the query on the nom_padre column
     *
     * Example usage:
     * <code>
     * $query->filterByNomPadre('fooValue');   // WHERE nom_padre = 'fooValue'
     * $query->filterByNomPadre('%fooValue%'); // WHERE nom_padre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomPadre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterByNomPadre($nomPadre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomPadre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomPadre)) {
                $nomPadre = str_replace('*', '%', $nomPadre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TelefonoPeer::NOM_PADRE, $nomPadre, $comparison);
    }

    /**
     * Filter the query on the nom_hijo column
     *
     * Example usage:
     * <code>
     * $query->filterByNomHijo('fooValue');   // WHERE nom_hijo = 'fooValue'
     * $query->filterByNomHijo('%fooValue%'); // WHERE nom_hijo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomHijo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function filterByNomHijo($nomHijo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomHijo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomHijo)) {
                $nomHijo = str_replace('*', '%', $nomHijo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TelefonoPeer::NOM_HIJO, $nomHijo, $comparison);
    }

    /**
     * Filter the query by a related Reserva object
     *
     * @param   Reserva|PropelObjectCollection $reserva The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TelefonoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByReserva($reserva, $comparison = null)
    {
        if ($reserva instanceof Reserva) {
            return $this
                ->addUsingAlias(TelefonoPeer::RESERVA_ID, $reserva->getId(), $comparison);
        } elseif ($reserva instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TelefonoPeer::RESERVA_ID, $reserva->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByReserva() only accepts arguments of type Reserva or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reserva relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function joinReserva($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reserva');

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
            $this->addJoinObject($join, 'Reserva');
        }

        return $this;
    }

    /**
     * Use the Reserva relation Reserva object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ReservaQuery A secondary query class using the current class as primary query
     */
    public function useReservaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReserva($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reserva', 'ReservaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Telefono $telefono Object to remove from the list of results
     *
     * @return TelefonoQuery The current query, for fluid interface
     */
    public function prune($telefono = null)
    {
        if ($telefono) {
            $this->addUsingAlias(TelefonoPeer::ID, $telefono->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

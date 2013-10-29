<?php


/**
 * Base class that represents a query for the 'reserva' table.
 *
 *
 *
 * @method ReservaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ReservaQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method ReservaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method ReservaQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method ReservaQuery orderByVigente($order = Criteria::ASC) Order by the vigente column
 * @method ReservaQuery orderBySenia($order = Criteria::ASC) Order by the senia column
 *
 * @method ReservaQuery groupById() Group by the id column
 * @method ReservaQuery groupByClienteId() Group by the cliente_id column
 * @method ReservaQuery groupByFecha() Group by the fecha column
 * @method ReservaQuery groupByHora() Group by the hora column
 * @method ReservaQuery groupByVigente() Group by the vigente column
 * @method ReservaQuery groupBySenia() Group by the senia column
 *
 * @method ReservaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ReservaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ReservaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ReservaQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method ReservaQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method ReservaQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method ReservaQuery leftJoinTelefono($relationAlias = null) Adds a LEFT JOIN clause to the query using the Telefono relation
 * @method ReservaQuery rightJoinTelefono($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Telefono relation
 * @method ReservaQuery innerJoinTelefono($relationAlias = null) Adds a INNER JOIN clause to the query using the Telefono relation
 *
 * @method Reserva findOne(PropelPDO $con = null) Return the first Reserva matching the query
 * @method Reserva findOneOrCreate(PropelPDO $con = null) Return the first Reserva matching the query, or a new Reserva object populated from the query conditions when no match is found
 *
 * @method Reserva findOneByClienteId(int $cliente_id) Return the first Reserva filtered by the cliente_id column
 * @method Reserva findOneByFecha(string $fecha) Return the first Reserva filtered by the fecha column
 * @method Reserva findOneByHora(string $hora) Return the first Reserva filtered by the hora column
 * @method Reserva findOneByVigente(boolean $vigente) Return the first Reserva filtered by the vigente column
 * @method Reserva findOneBySenia(string $senia) Return the first Reserva filtered by the senia column
 *
 * @method array findById(int $id) Return Reserva objects filtered by the id column
 * @method array findByClienteId(int $cliente_id) Return Reserva objects filtered by the cliente_id column
 * @method array findByFecha(string $fecha) Return Reserva objects filtered by the fecha column
 * @method array findByHora(string $hora) Return Reserva objects filtered by the hora column
 * @method array findByVigente(boolean $vigente) Return Reserva objects filtered by the vigente column
 * @method array findBySenia(string $senia) Return Reserva objects filtered by the senia column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReservaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseReservaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Reserva', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ReservaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ReservaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ReservaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ReservaQuery) {
            return $criteria;
        }
        $query = new ReservaQuery();
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
     * @return   Reserva|Reserva[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ReservaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ReservaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Reserva A model object, or null if the key is not found
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
     * @return                 Reserva A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `cliente_id`, `fecha`, `hora`, `vigente`, `senia` FROM `reserva` WHERE `id` = :p0';
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
            $obj = new Reserva();
            $obj->hydrate($row);
            ReservaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Reserva|Reserva[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Reserva[]|mixed the list of results, formatted by the current formatter
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
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ReservaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ReservaPeer::ID, $keys, Criteria::IN);
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
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ReservaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ReservaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReservaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the cliente_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClienteId(1234); // WHERE cliente_id = 1234
     * $query->filterByClienteId(array(12, 34)); // WHERE cliente_id IN (12, 34)
     * $query->filterByClienteId(array('min' => 12)); // WHERE cliente_id >= 12
     * $query->filterByClienteId(array('max' => 12)); // WHERE cliente_id <= 12
     * </code>
     *
     * @see       filterByCliente()
     *
     * @param     mixed $clienteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByClienteId($clienteId = null, $comparison = null)
    {
        if (is_array($clienteId)) {
            $useMinMax = false;
            if (isset($clienteId['min'])) {
                $this->addUsingAlias(ReservaPeer::CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clienteId['max'])) {
                $this->addUsingAlias(ReservaPeer::CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReservaPeer::CLIENTE_ID, $clienteId, $comparison);
    }

    /**
     * Filter the query on the fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(ReservaPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(ReservaPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReservaPeer::FECHA, $fecha, $comparison);
    }

    /**
     * Filter the query on the hora column
     *
     * Example usage:
     * <code>
     * $query->filterByHora('fooValue');   // WHERE hora = 'fooValue'
     * $query->filterByHora('%fooValue%'); // WHERE hora LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hora The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByHora($hora = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hora)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hora)) {
                $hora = str_replace('*', '%', $hora);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReservaPeer::HORA, $hora, $comparison);
    }

    /**
     * Filter the query on the vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByVigente(true); // WHERE vigente = true
     * $query->filterByVigente('yes'); // WHERE vigente = true
     * </code>
     *
     * @param     boolean|string $vigente The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterByVigente($vigente = null, $comparison = null)
    {
        if (is_string($vigente)) {
            $vigente = in_array(strtolower($vigente), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ReservaPeer::VIGENTE, $vigente, $comparison);
    }

    /**
     * Filter the query on the senia column
     *
     * Example usage:
     * <code>
     * $query->filterBySenia(1234); // WHERE senia = 1234
     * $query->filterBySenia(array(12, 34)); // WHERE senia IN (12, 34)
     * $query->filterBySenia(array('min' => 12)); // WHERE senia >= 12
     * $query->filterBySenia(array('max' => 12)); // WHERE senia <= 12
     * </code>
     *
     * @param     mixed $senia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function filterBySenia($senia = null, $comparison = null)
    {
        if (is_array($senia)) {
            $useMinMax = false;
            if (isset($senia['min'])) {
                $this->addUsingAlias(ReservaPeer::SENIA, $senia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senia['max'])) {
                $this->addUsingAlias(ReservaPeer::SENIA, $senia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReservaPeer::SENIA, $senia, $comparison);
    }

    /**
     * Filter the query by a related Cliente object
     *
     * @param   Cliente|PropelObjectCollection $cliente The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReservaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof Cliente) {
            return $this
                ->addUsingAlias(ReservaPeer::CLIENTE_ID, $cliente->getId(), $comparison);
        } elseif ($cliente instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReservaPeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cliente');

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
            $this->addJoinObject($join, 'Cliente');
        }

        return $this;
    }

    /**
     * Use the Cliente relation Cliente object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienteQuery A secondary query class using the current class as primary query
     */
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
    }

    /**
     * Filter the query by a related Telefono object
     *
     * @param   Telefono|PropelObjectCollection $telefono  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReservaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTelefono($telefono, $comparison = null)
    {
        if ($telefono instanceof Telefono) {
            return $this
                ->addUsingAlias(ReservaPeer::ID, $telefono->getReservaId(), $comparison);
        } elseif ($telefono instanceof PropelObjectCollection) {
            return $this
                ->useTelefonoQuery()
                ->filterByPrimaryKeys($telefono->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTelefono() only accepts arguments of type Telefono or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Telefono relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function joinTelefono($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Telefono');

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
            $this->addJoinObject($join, 'Telefono');
        }

        return $this;
    }

    /**
     * Use the Telefono relation Telefono object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TelefonoQuery A secondary query class using the current class as primary query
     */
    public function useTelefonoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTelefono($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Telefono', 'TelefonoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Reserva $reserva Object to remove from the list of results
     *
     * @return ReservaQuery The current query, for fluid interface
     */
    public function prune($reserva = null)
    {
        if ($reserva) {
            $this->addUsingAlias(ReservaPeer::ID, $reserva->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

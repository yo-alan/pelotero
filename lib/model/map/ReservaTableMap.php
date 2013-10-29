<?php



/**
 * This class defines the structure of the 'reserva' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ReservaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ReservaTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('reserva');
        $this->setPhpName('Reserva');
        $this->setClassname('Reserva');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('cliente_id', 'ClienteId', 'INTEGER', 'cliente', 'id', true, null, null);
        $this->addColumn('fecha', 'Fecha', 'DATE', true, null, null);
        $this->addColumn('hora', 'Hora', 'CHAR', true, null, null);
        $this->getColumn('hora', false)->setValueSet(array (
  0 => '9:00',
  1 => '13:00',
  2 => '15:00',
  3 => '17:00',
  4 => '19:00',
  5 => '21:00',
));
        $this->addColumn('vigente', 'Vigente', 'BOOLEAN', true, 1, true);
        $this->addColumn('senia', 'Senia', 'DECIMAL', false, 11, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), null, null);
        $this->addRelation('Telefono', 'Telefono', RelationMap::ONE_TO_MANY, array('id' => 'reserva_id', ), null, null, 'Telefonos');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'true',
),
            'symfony_behaviors' =>  array (
),
        );
    } // getBehaviors()

} // ReservaTableMap

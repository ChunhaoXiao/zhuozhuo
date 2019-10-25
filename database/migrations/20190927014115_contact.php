<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Contact extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('contact');
        $table->addColumn('name', 'string', ['null' => true])
        ->addColumn('hot_line', 'string', ['null' => true])
        ->addColumn('email', 'string', ['null' => true])
        ->addColumn('online_chat', 'string', ['null' => true])
        ->addColumn('address', 'string', ['null' => true])
        ->addColumn('longitude', 'string', ['null' => true])
        ->addColumn('latitude', 'string', ['null' => true])
        ->addColumn('map', 'string', ['null' => true])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}

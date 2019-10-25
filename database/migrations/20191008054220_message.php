<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Message extends Migrator
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
        $table = $this->table('message');
        $table->addColumn('name', 'string', ['comment' => '留言者的姓名'])
        ->addColumn('phone', 'string', ['comment' => '留言者的联系电话', 'null' => true])
        ->addColumn('email', 'string', ['comment' => '留言者的email', 'null' => true])
        ->addColumn('content', 'text', ['comment' => '留言内容'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->addColumn('ip', 'string', ['null' => true, 'comment' => '留言者 ip 地址'])
        ->create();
    }
}

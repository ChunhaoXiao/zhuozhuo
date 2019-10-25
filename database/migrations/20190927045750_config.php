<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Config extends Migrator
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
        $table = $this->table('config');
        $table->addColumn('title', 'string', ['null' => true, 'comment' => '网站名称'])
        ->addColumn('logo', 'string', ['null' => true, 'comment' => '网站logo'])
        ->addColumn('keyword', 'string', ['comment' => '网站关键字', 'null' => true])
        ->addColumn('description', 'text', ['comment' => '网站描述', 'null' => true])
        ->addColumn('copy_right', 'string', ['null' => true, 'comment' => '版权信息'])
        ->addColumn('approve_number', 'string', ['null' => true, 'comment' => '网站备案号'])
        ->addColumn('enabled', 'boolean', ['default' => 1, 'comment' => '是否允许访问'])
        ->addColumn('statistic_code', 'text', ['comment' => '统计代码', 'null' => true])
        ->addColumn('allow_message', 'boolean', ['default' => 1, 'comment' => '是否允许留言'])
        ->addColumn('banner', 'string', ['null' => true, 'comment' => '首页banner'])
        ->addColumn('soft_background', 'string', ['null' => true, 'comment' => '首页软件简介背景图'])
        ->addColumn('index_news_picture', 'string', ['null' => true, 'comment' => '首页新闻资讯图'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}

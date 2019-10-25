<?php

use think\migration\Seeder;
use app\common\model\Config;
class ConfigSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            'title' => '卓客街',
            'keyword' => '卓客街',
            'description' => '卓客街将企业利润的一定比例以赠送爱心值的方式分配给消费者,老百姓的正常消费通过拙客街变成了“储蓄”,变成了“投资”，分享卓客街还能轻松创业',
            'logo' => 'logo.jpg',
            'banner' => [
                'index_banner11.jpg',
                'index_banner22.jpg',
            ],
            'copy_right' => '版权所有',
            'approve_number' => '辽IPC备123456号',
            'soft_background' => 'soft_background.jpg',
            'index_news_picture' => 'index_news_picture.jpg',
        ];
        if(!Config::find())
        {
            Config::create($data);
        }
    }
}
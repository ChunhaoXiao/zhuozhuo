<?php

use think\migration\Seeder;
use app\common\model\Navigator;

class NavigatorSeeder extends Seeder
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
        $datas = [
            [
                'name' => '首页',
                'link' => 'index/index',
                'order' => '1',
            ],
            [
                'name' => '公司概况',
                'link' => 'introduction/index',
                'order' => '2',
                'banner' => 'banner_introduction.jpg',
            ],
            [
                'name' => '软件简介',
                'link' => 'soft/index',
                'order' => '3',
                'banner' => 'banner_soft.jpg',
            ],
            [
                'name' => '新闻动态',
                'link' => 'news/index',
                'order' => '4',
                'banner' => 'banner_news.jpg',
            ],
            [
                'name' => '团队介绍',
                'link' => 'team/index',
                'order' => '5',
                'banner' => 'banner_team.jpg',
            ],
            [
                'name' => '联系我们',
                'link' => 'contact/index',
                'order' => '6',
                'banner' => 'banner_contact.jpg',
            ]
        ];

        foreach($datas as $v)
        {
            if(!Navigator::where('link', $v['link'])->find())
            {
                Navigator::create($v);
            }
        }
    }
}
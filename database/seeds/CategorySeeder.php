<?php

use think\migration\Seeder;
use app\common\model\Category;

class CategorySeeder extends Seeder
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
                'name' => '爱心值',
                'order' => 0,
                'type' => 'software',
            ],
            [
                'name' => '投资',
                'order' => 0,
                'type' => 'software',
            ],
            [
                'name' => '新闻动态',
                'order' => 0,
                'type' => 'news',
            ],
            [
                'name' => '业内动态',
                'order' => 0,
                'type' => 'news',
            ]
        ];

        foreach($datas as $v)
        {
            if(!Category::where(['name' => $v['name'], 'type' => $v['type']])->find())
            {
                Category::create($v);
            }
        }

    }
}
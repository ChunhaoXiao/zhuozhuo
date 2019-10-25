<?php

use think\migration\Seeder;
use app\common\model\ContactField;

class ContactFieldSeeder extends Seeder
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
                'name' => 'name',
                'label' => '联系人',
            ],

            [
                'name' => 'hot_line',
                'label' => '咨询热线',
            ],

            [
                'name' => 'email',
                'label' => '邮箱',
                'type' => 'email',
            ],

            [
                'name' => 'online_chat',
                'label' => '客服QQ',
            ],

            [
                'name' => 'address',
                'label' => '地址',
            ],

            [
                'name' => 'longitude',
                'label' => '经度',
                'type' => 'number',
            ],

            [
                'name' => 'latitude',
                'label' => '纬度',
                'type' => 'number'
            ],

            [
                'name' => 'map',
                'label' => '地图图片',
                'type' => 'file',
            ]
        ];

        foreach($datas as $v)
        {
            if(!ContactField::where('name', $v['name'])->find())
            {
                ContactField::create($v);
            }
        }
    }
}
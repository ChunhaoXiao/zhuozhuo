<?php

use think\migration\Seeder;
use app\common\model\Contact;

class ContactSeeder extends Seeder
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
            'name' => '李先生',
            'hot_line' => '123456789',
            'email' => 'xxx@hotmail.com',
            'online_chat' => 'wechat',
            'address' => '大连市中山区',
            'map' => 'map.png',
        ];
        
        if(!Contact::find())
        {
            Contact::create($datas);
        }
    }
}
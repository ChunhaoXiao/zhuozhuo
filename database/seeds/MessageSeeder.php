<?php

use think\migration\Seeder;
use app\common\model\Message;

class MessageSeeder extends Seeder
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
            'name' => '张三',
            'phone' =>'13399988569',
            'email' => 'mail@gmail.comp',
            'content' => '你好，有个问题',
            'ip' => '127.0.0.1', 
        ];
        Message::create($data);
    }
}
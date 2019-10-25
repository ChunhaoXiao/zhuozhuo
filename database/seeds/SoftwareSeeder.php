<?php

use think\migration\Seeder;
use app\common\model\Software;
use app\common\model\Category;

class SoftwareSeeder extends Seeder
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
        $cates = Category::softcate()->select();
        foreach($cates as $v)
        {
            if(!Software::where('category_id', $v->id)->find())
            {
                $v->software()->save([
                    'description' => $v->name == '爱心值' ? '“爱心值”是卓客街运营模式中的亮点，卓客街将每一位消费者的消费都视同是对该企业的投资，并按照一定的时间间隔将卓客街企业利润的一定比例以赠送爱心值的方式分配给消费者。卓客街-正常消费也能积累财富！' : '拙客街的购物模式一经推出，收到广大消费者的支持与认可？老百姓的日常消费通过拙客接变成了 "储蓄"，变成了"投资"。分享卓客街还能轻松创业。消费者在购物的同时实现了消费者、电商、厂家的多方共赢，带动了诸多实体行业的发展!',
                    'note' => $v->name == '爱心值' ? '卓客街将企业利润的一定比例以赠送爱心值的方式分配给消费者' : '老百姓的正常消费通过拙客街变成了“储蓄”,变成了“投资”，分享卓客街还能轻松创业',
                    'icon' => $v->name == '爱心值' ? 'love.png' : 'investment.png',
                    'picture' => $v->name == '爱心值' ? 'love_picture.jpg' : 'investment_picture.jpg',
                ]);
            }
        }
    }
}
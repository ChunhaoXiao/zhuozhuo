<?php

use think\migration\Seeder;
use app\common\model\Introduction;

class IntroductionSeeder extends Seeder
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
                'type' => 'company',
                'content' => '吉林伯卓网络科技有限公司是一家以电子商务、互联网零售、及网络科技开发为主营业务的公司。卓客街商城是其旗下的一家以消费资本论为理论的自营电商平台，“爱心值”是卓客街运营模式中的亮点，卓客街将每一位消费者的消费视同是对企业的投资，并按照一定的时间间隔将卓客街企业利润的一定比例以赠送爱心的方式分类给消费者。卓客街——正常消费也能积累财富',
                'pictures' => ['intro1.jpg', 'intro2.jpg', 'intro3.jpg'],
            ],

            [
                'type' => 'team',
                'content' => '我们的制作团队不光在技术上处于行业前端，我们更注重将客户的产品表达的清楚与准确，我们大多是理科出身，在机械、游戏、电子、物理等各学科我们都有研究，能轻松理解客户的构思，所以我们能更好的将客户的意图表现出来。我们拥有自己的专业三维动画、建筑动画、虚拟现实和影视拍摄制作团队。我们不断创新与提高三维动画、建筑动画、虚拟现实的制作水准，运用尖端的三维动画技术、虚拟现实技术，不断满足客户对数字体验服务的需求.。

我们的目标是将奇妙动画打造成国内演示动画行业第一品牌。'
            ]
        ];

        foreach($datas as $v)
        {
            if(!Introduction::where('type', $v['type'])->find())
            {
                Introduction::create($v);
            }
        }
    }
}
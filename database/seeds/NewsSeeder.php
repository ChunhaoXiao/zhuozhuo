<?php

use think\migration\Seeder;
use app\common\model\News;
use Faker\Factory;
use app\common\model\Category;

class NewsSeeder extends Seeder
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
        $faker = Factory::create();
        $cates = Category::newscate()->select();
        foreach($cates as $c)
        {
            for($i = 0; $i < 30; $i++)
            {
                $row['title'] = $faker->sentence();
                $row['source'] = $faker->words();
                $row['content'] = $faker->text();
                $c->news()->save($row);
            }
        }
        
    }
}
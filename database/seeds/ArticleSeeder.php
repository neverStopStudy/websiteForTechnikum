<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
  
    public function run():void
    {
        factory(App\Article::class, 10)->create();
    }
}

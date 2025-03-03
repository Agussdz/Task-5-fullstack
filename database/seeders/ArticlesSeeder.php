<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Agriculture News',
            'content' => 'Agriculture plays a crucial role in the economy of many countries. With advancements in technology, farming methods have become more efficient, leading to increased productivity and sustainability. Farmers are now using precision agriculture to monitor and manage crops more effectively, ensuring optimal growth and reducing waste. Additionally, organic farming practices are gaining popularity, promoting healthier food options and environmentally friendly methods.

            In recent years, there has been a growing focus on sustainable agriculture. This involves the use of renewable resources, conservation of water and soil, and the reduction of chemical inputs. Sustainable agriculture not only benefits the environment but also improves the livelihoods of farmers by providing them with more stable and resilient farming systems.

            One of the significant challenges faced by the agriculture sector is climate change. Extreme weather conditions, such as droughts and floods, can severely impact crop yields. However, innovative solutions, such as drought-resistant crops and smart irrigation systems, are being developed to help farmers adapt to these changes.

            In conclusion, the agriculture sector is continuously evolving, with new technologies and practices being implemented to ensure food security and environmental sustainability. It is essential to support and invest in these advancements to build a more sustainable and resilient agricultural future.',
            'image' => 'uploads/articles/agriculture_news.jpeg',
            'users_id' => '1',
            'categories_id' => '1',


        ]);
    }
}

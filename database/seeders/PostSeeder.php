<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'Technological Challenges In Society Today',
            'content' => 'The recent disruptions to OpenAI ChatGPT service, allegedly due to a cyberattack claimed by Anonymous Sudan, have raised serious concerns within the AI community.',
            'imgUrl' => 'https://bluesoft.com/wp-content/uploads/2022/05/MicrosoftTeams-image.jpg',
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'What’s the future of AI services?',
            'content' => 'Former PM Jacinda Ardern has been actively involved in the Christchurch Call, leveraging AI in the fight against extremist content. She has emphasized the potential uses of AI in reducing terrorist activity and improving content.',
            'imgUrl' => 'https://www.fujitsu.com/global/imagesgig5/ai-banner-800x450_tcm100-7204059_tcm100-6286607-32.jpg',
            'created_by' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Digital at UNGA78',
            'content' => 'In our October issue of the Digital Watch Monthly, we look at the coverage of digital issues at the General Debate of the UN General Assembly (UNGA), the State of the Union address, key takeaways from the most recent round of cybercrime negotiations and the upcoming Internet Governance Forum (IGF) 2023.',
            'imgUrl' => 'https://f.hubspotusercontent10.net/hubfs/4326216/Serious-Digital-Risk.jpg',
            'created_by' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Geneva Digital Atlas 2.0',
            'content' => 'The Geneva Digital Atlas represents the most comprehensive mapping of digital policy actors and Internet governance scene in Geneva. The Atlas provides in-depth coverage of the activities of over 40 actors, including analysing policy processes and cataloguing core instruments and featured events.',
            'imgUrl' => 'https://thejournalofmhealth.com/wp-content/uploads/2022/09/6-Technologies-All-Hospitals-Should-Consider-Investing-In-_AdobeStock.jpeg',
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Blockchain Technology and Cryptocurrency',
            'content' => 'Blockchain is a technology that enables secure and transparent record-keeping of various data types, including financial transactions, medical records, and intellectual property.',
            'imgUrl' => 'https://blogs.iadb.org/caribbean-dev-trends/wp-content/uploads/sites/34/2017/12/Blockchain1.jpg',
            'created_by' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}

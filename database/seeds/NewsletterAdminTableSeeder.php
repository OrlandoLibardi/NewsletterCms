<?php

use Illuminate\Database\Seeder;
use OrlandoLibardi\PageCms\app\Page;
use OrlandoLibardi\OlCms\AdminCms\app\Admin;

class NewsletterAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {             
        Admin::create([
            'name' => 'Newsletter',
            'route' => 'newsletters.index',
            'icon' => 'fa fa-envelope',
            'parent_id' => 0,
            'minimun_can' => 'list',
            'order_at' => 5
        ]);
    }
}

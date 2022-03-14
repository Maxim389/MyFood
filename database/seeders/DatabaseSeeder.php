<?php

namespace Database\Seeders;

use App\Models\PayStatus;
use App\Models\Status;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Status::factory()
        ->count(2)
        ->state(new Sequence(
        ['name'=>'новая'],
        ['name'=>'просмотренная'],
        ))
        ->create();

        Tag::factory()
        ->count(2)
        ->state(new Sequence(
        ['name'=>'Пиццерия'],
        ['name'=>'Шашлычная'],
        ))
        ->create();

        PayStatus::factory()
        ->count(2)
        ->state(new Sequence(
        ['name'=>'При получении'],
        ['name'=>'Онлайн оплата'],
        ))
        ->create();
    }
}

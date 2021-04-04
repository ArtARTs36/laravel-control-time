<?php

use Illuminate\Database\Seeder;

class SubjectTypeSeeder extends Seeder
{
    public function run(): void
    {
        $repo = app(\ArtARTs36\ControlTime\Repositories\SubjectTypeRepository::class);

        foreach (['task' => 'Задача', 'vacation' => 'Отпуск'] as $slug => $title) {
            $repo->create($slug, $title);
        }
    }
}

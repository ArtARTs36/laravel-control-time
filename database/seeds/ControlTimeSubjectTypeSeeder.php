<?php

use Illuminate\Database\Seeder;

class ControlTimeSubjectTypeSeeder extends Seeder
{
    public function run(): void
    {
        $repo = app(\ArtARTs36\ControlTime\Repositories\SubjectTypeRepository::class);

        foreach (['task' => 'Задача', 'vacation' => 'Отпуск', 'business_trip' => 'Командировка'] as $slug => $title) {
            $repo->create($slug, $title);
        }
    }
}

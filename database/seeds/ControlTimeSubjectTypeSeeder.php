<?php

use Illuminate\Database\Seeder;

class ControlTimeSubjectTypeSeeder extends Seeder
{
    public function run(): void
    {
        /** @var \ArtARTs36\ControlTime\Repositories\EloquentSubjectTypeRepository $repo */
        $repo = app(\ArtARTs36\ControlTime\Repositories\EloquentSubjectTypeRepository::class);

        foreach (['task' => 'Задача', 'vacation' => 'Отпуск', 'business_trip' => 'Командировка'] as $slug => $title) {
            $repo->create($slug, $title);
        }
    }
}

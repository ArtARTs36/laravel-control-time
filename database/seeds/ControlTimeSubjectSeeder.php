<?php

use ArtARTs36\ControlTime\Repositories\EloquentSubjectRepository;
use ArtARTs36\ControlTime\Repositories\EloquentSubjectTypeRepository;
use Illuminate\Database\Seeder;

class ControlTimeSubjectSeeder extends Seeder
{
    public function run(): void
    {
        /** @var EloquentSubjectRepository $repo */
        $repo = app(EloquentSubjectRepository::class);

        $data = [
            'vacation' => [
                'vacation_yearly' => 'Ежегодный отпуск',
                'vacation_studly' => 'Учебный отпуск',
                'vacation_free' => 'Отпуск за свой счет',
            ],
            'task' => [
                'task_office_visit' => 'Посещение офиса',
            ],
            'business_trip' => [
                'business_trip_in_moscow' => 'Командировка в Москву',
            ],
        ];

        foreach ($data as $typeSlug => $subjects) {
            /** @var \ArtARTs36\ControlTime\Models\SubjectType $type */
            $type = app(EloquentSubjectTypeRepository::class)->findBySlug($typeSlug);

            foreach ($subjects as $code => $title) {
                $repo->create($title, $code, $type->id);
            }
        }
    }
}

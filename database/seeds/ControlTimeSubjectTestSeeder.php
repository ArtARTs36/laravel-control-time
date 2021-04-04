<?php

use ArtARTs36\ControlTime\Repositories\SubjectRepository;
use ArtARTs36\ControlTime\Repositories\SubjectTypeRepository;
use Illuminate\Database\Seeder;

class ControlTimeSubjectTestSeeder extends Seeder
{
    public function run(): void
    {
        /** @var SubjectRepository $repo */
        $repo = app(SubjectRepository::class);

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
            $type = app(SubjectTypeRepository::class)->findBySlug($typeSlug);

            foreach ($subjects as $code => $title) {
                $repo->create($code, $title, $type->id);
            }
        }
    }
}

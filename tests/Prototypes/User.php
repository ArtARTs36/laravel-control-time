<?php

namespace ArtARTs36\ControlTime\Tests\Prototypes;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements \ArtARTs36\ControlTime\Contracts\User
{
    protected $table = 'test_users';

    protected $fillable = [
        'name',
    ];

    public function getId(): int
    {
        return 1;
    }
}

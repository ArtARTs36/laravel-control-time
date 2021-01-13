<?php

namespace Dba\ControlTime\Tests\Prototypes;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements \Dba\ControlTime\Contracts\User
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

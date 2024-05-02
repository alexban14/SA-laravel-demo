<?php

namespace App\Repositories;

use App\Models\User;

interface PostRepositoryInterface
{
    public function store(array $vaildatedInput, User $user): bool;
}

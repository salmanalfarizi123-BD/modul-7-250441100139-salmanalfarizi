<?php

namespace App\Policies;

use App\Models\Peminjaman;
use App\Models\User;

class PeminjamanPolicy
{
    public function view(User $user, Peminjaman $peminjaman): bool
    {
        return $user->hasAnyRole(['admin', 'petugas'])
            || (int) $peminjaman->user_id === (int) $user->id;
    }
}
<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Peminjaman;

class PeminjamanPolicy {
    public function view(User $user, Peminjaman $peminjaman): bool
{
    return $user->hasAnyRole(['admin', 'petugas'])
        || $peminjaman->user_id === $user->id;
}
}
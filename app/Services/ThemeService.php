<?php

namespace App\Services;

use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ThemeService
{

    public function updateStatus($id)
    {
        $data = Theme::findOrFail($id);

        if ($data->is_active) { //> jika active
            $status = 'Tema berhasil dinonaktifkan';
            $updatedStatus = 0;
        } else {
            $status = 'Tema berhasil diaktifkan';
            $updatedStatus = 1;
        }

        $data->update(['is_active' => $updatedStatus]);
        return $status;
    }
}

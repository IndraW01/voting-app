<?php

namespace App\Imports;

use App\Models\Admin\Pemilih;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PemilihImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            $user = User::create([
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);

            $user->pemilih()->create([
                'nama' => $row['nama'],
                'nim' => $row['nim'],
                'angkatan' => $row['angkatan'],
                'kelas' => $row['kelas'],
                'foto_pemilih' => $row['foto']
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.username' => ['unique:users,username', 'max:50'],
            '*.email' => ['email', 'unique:users,email'],
            '*.nim' => ['unique:pemilihs,nim', 'max:10', 'min:10'],
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Admin\Pemilih;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemilihsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithStyles
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pemilih::with('voting')->get();
    }

    public function map($pemilih): array
    {
        return [
            $pemilih->nama,
            $pemilih->nim,
            $pemilih->angkatan,
            $pemilih->kelas,
            $pemilih->voting->calon->nama ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIM',
            'Angkatan',
            'Kelas',
            'Voting',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}

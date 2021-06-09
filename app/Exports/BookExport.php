<?php

namespace App\Exports;

use App\Book;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BookExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Auth::user()->books;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Autor',
            'Data de publicação',
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice->id,
            $invoice->name,
            $invoice->author,
            date('d/m/Y', strtotime($invoice->date)),
        ];
    }
}

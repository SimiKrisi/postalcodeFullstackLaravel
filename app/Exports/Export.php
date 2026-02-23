<?php

namespace App\Exports;

use App\Models\Postalcode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export implements FromQuery, WithMapping, WithHeadings
{
   
    protected $query;
    protected $counties;
    public function __construct($query, )
    {
        $this->query = $query;
  
    }
    public function query()
    {
        return $this->query;
    }
    public function map($postalcode): array
    {
        return [
            $postalcode->code,
            $postalcode->placename,
            $postalcode->county ? $postalcode->county->name : 'Nincs megye',
        ];
    }
    public function headings(): array
    {
        return [
            'Irányítószám',
            'Település',
            'Megye',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Username;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return new EloquentCollection([
            ['Status GSM', 'GSM Number', 'Company', 'Serial Number', 'ICC ID', 'IMSI', 'Res ID',
            'Request Date', 'Expired Date', 'Active Date', 'Terminated Date', 'Note']
        ]);
    }
}

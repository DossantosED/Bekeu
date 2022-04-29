<?php

namespace App\Imports;

use App\Models\State;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StatesImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $date = new DateTime();
            State::create([
                'code' => $row[1],
                'name' => $row[2],
                'created_at' => $date->setTimestamp(strtotime($row[3])),
                'updated_at' => $date->setTimestamp(strtotime($row[4])),
            ]);
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
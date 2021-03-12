<?php

namespace App\Imports;

use App\Flight;
use Ramsey\Uuid\Uuid;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class FlightsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Flight([
            'uuid' => Uuid::uuid4(),
            'user_id' => Auth::user()->id,
            'passengerName'     => $row[1],
            'passengerEmail'    => $row[2], 
            'passengerPhone' => $row[3],
            'passportNumber' => $row[4],
            'airline' => $row[5],
            'time' => $row[6],
            'origin' => $row[7],
            'paymentType' => $row[8],
            'amount' => $row[9],
        ]);
    }
}

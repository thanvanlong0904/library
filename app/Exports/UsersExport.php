<?php

namespace App\Exports;

use App\Models\Card;


use App\Models\User;
use http\Env\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromView, WithStyles,ShouldAutoSize
{
    use Exportable;
    private $users;


    public function __construct(int $status)
    {
        $this->users = Card::where('status',$status)->get();
        $this->status = $status ;
    }


    public function view() : View{
        return view('excel.ex',[
            'status'=> $this->status,
            'users'=>$this->users
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
//            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.

        ];

    }
//    public function columnWidths(): array
//    {
//        return [
//            'A' => 55,
//            'B' => 45,
//        ];
//    }

}

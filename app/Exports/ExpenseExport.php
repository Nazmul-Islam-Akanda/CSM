<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenseExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $reports;
    function __construct ($reports) {
      $this->reports = $reports;
      // dd($this->reports);
    }
  
    public function collection() {
      return $this->reports;
    }
  
    public function map($reports): array
    {
      return [
          $reports->id,
          $reports->branch->name ?? "",
          $reports->date,
          $reports->time,
          $reports->expense,
          $reports->description ?? "",
          $reports->created_at,
          $reports->updated_at,
      ];
    }
  
    public function headings(): array
    {
      return[
          "Id",
          "Branch",
          "Date",
          "Time",
          "Cost",
          "Description",
          "Created at",
          "Updated at",
      ];
    }
}

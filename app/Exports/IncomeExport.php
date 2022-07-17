<?php

namespace App\Exports;

use App\Models\Income;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IncomeExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Income::all();
    // }
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
        $reports->from,
        $reports->branch->name ?? "",
        $reports->customer->name ?? "",
        $reports->from_branch->name ?? "",
        $reports->shipment->shipment_id ?? "",
        $reports->income,
        $reports->description ?? "",
        $reports->created_at,
        $reports->updated_at,
    ];
  }

  public function headings(): array
  {
    return[
        "Id",
        "From",
        "Beneficiary Branch",
        "From Customer",
        "From Branch",
        "Shipment Id",
        "Income",
        "Description",
        "Created at",
        "Updated at",
    ];
  }

}

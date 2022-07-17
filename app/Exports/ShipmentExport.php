<?php

namespace App\Exports;

use App\Models\Shipment;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShipmentExport implements FromCollection,WithMapping,WithHeadings
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
          $reports->shipment_id,
          $reports->type,
          $reports->branch->name ?? "",
          $reports->date,
          $reports->time,
          $reports->customer->name ?? "",
          $reports->customer->phone ?? "",
          $reports->customer->address ?? "",
          $reports->receiver_name,
          $reports->receiver_phone,
          $reports->receiver_address,
          $reports->tobranch->name ?? "",
          $reports->toarea->area ?? "",
          $reports->fromarea->area ?? "",
          $reports->payment_type,
          $reports->pay_method,
          $reports->pay_status,
          $reports->product_description,
          $reports->quantity,
          $reports->shipping_cost,
          $reports->status,
          $reports->shipment_direction,
          $reports->created_at,
          $reports->updated_at,
      ];
    }
  
    public function headings(): array
    {
      return[
          "Id",
          "Shipment ID",
          "Shipment Type",
          "Branch",
          "Shipping Date",
          "Collection Time",
          "Customer/Sender",
          "Customer Phone",
          "Customer Address",
          "Receiver Name",
          "Receiver Phone",
          "Receiver Address",
          "To Branch",
          "To Area",
          "From Area",
          "Payment Type",
          "Payment Method",
          "Payment Status",
          "Product Description",
          "Quantity",
          "Shipping Cost",
          "Status",
          "Shipment Direction",
          "Created at",
          "Updated at",
      ];
    }
}

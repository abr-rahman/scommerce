<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\CustomShipping;
use App\Models\Shipping;
use App\Models\Tag;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomeShippingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                if ($row->status == StatusEnum::Active->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('custom.shippings_active', $row->id) . '" class="btn btn-success" id="check_status"></a> </div>';
                    return $html;
                } 
                if ($row->status == StatusEnum::Inactive->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('custom.shippings_inactive', $row->id) . '" class="btn btn-danger" id="check_status"></a> </div>';
                    return $html;
                }
            })
          
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item edit-btn"  href="' . route('custom-shippings.edit', $row->id) . '">Edit</a>';
                $html .= '<a class="dropdown-item delete-btn" href="' . route('custom-shippings.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status']);
    }

   
    public function query(CustomShipping $model)
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tagdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex', 'S/L'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('area_name'),
            Column::make('charge'),
            Column::make('status'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Shipping_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\Coupon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CouponDataTable extends DataTable
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
                    $html = '<div class="col-sm-5"><a href="' . route('coupons.active', $row->id) . '" class="btn bg-success badge" id="check_status">Active</a> </div>';
                    return $html;
                } 
                if ($row->status == StatusEnum::Inactive->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('coupons.inactive', $row->id) . '" class="btn bg-danger badge" id="check_status">In-active</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Pending->value) {
                    $html = '<div class="col-sm-5"><a class="btn bg-info badge">Pending</a> </div>';
                    return $html;
                }
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item"  href="' . route('coupons.show', $row->id) . '">Show</a>';
                $html .= '<a class="dropdown-item edit-btn"  href="' . route('coupons.edit', $row->id) . '">Edit</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CouponDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Coupon $model)
    {
        return $model->newQuery()->orderBY('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('coupondatatable-table')
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
            Column::make('name'),
            Column::make('code'),
            Column::make('valid_from'),
            Column::make('valid_to'),
            Column::make('fixed_amount'),
            Column::make('percent_amount', 'null'),
            Column::make('minimum_order'),
            Column::make('use_limit'),
            Column::computed('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Coupon_' . date('YmdHis');
    }
}

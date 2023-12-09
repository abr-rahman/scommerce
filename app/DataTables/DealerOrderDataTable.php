<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\Dealership;
use App\Models\Order;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DealerOrderDataTable extends DataTable
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
                if ($row->status == StatusEnum::Pending->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-primary">Pending</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Approved->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-info">Confirmed</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Rejected->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-danger badge bg-danger">Canceled</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Processing->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-dark badge bg-dark">Processing</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::OnWay->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-yellow badge bg-yellow">In Transit</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Complete->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-success badge bg-success">Completed</a> </div>';
                    return $html;
                }
            })
            ->addColumn('district', function ($row) {
                return $row->district->name;
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item border show-btn"  href="' . route('order.show', $row->id) . '">View Order</a>';
                if ($row->status == StatusEnum::Pending->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.approve', $row->id) . '">Confirm</a>';
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.rejected', $row->id) . '">Cancel</a>';
                }
                if ($row->status == StatusEnum::Approved->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.complete', $row->id) . '">Complete</a>';
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.processing', $row->id) . '">Processing</a>';
                }
                if ($row->status == StatusEnum::Processing->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.complete', $row->id) . '">Complete</a>';
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.dispatch', $row->id) . '">Dispatch</a>';
                }
                if ($row->status == StatusEnum::OnWay->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.complete', $row->id) . '">Complete</a>';
                }
                if ($row->status == StatusEnum::Rejected->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('order.rejected', $row->id) . '">Cancel</a>';
                    $html .= '<a class="dropdown-item border delete-btn" href="' . route('order.destroy', $row->id) . '">Delete</a>';
                }
                // $html .= '<a class="dropdown-item delete-btn" href="' . route('order.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status', 'photo', 'name']);
    }

    public function query(Order $model)
    {
        return $model->newQuery()->where('role', 'dealer')->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dealershipdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
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
            Column::make('customer_name'),
            Column::make('payment_method'),
            Column::make('phone'),
            Column::make('grand_total'),
            Column::computed('district'),
            Column::make('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Orders_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\Dealership;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DealerApproveDataTable extends DataTable
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
                    $html = '<div class="col-sm-5"><a href="' . route('dealerships.active', $row->id) . '" class="btn btn-success" id="check_status"></a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Inactive->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('dealerships.inactive', $row->id) . '" class="btn btn-danger" id="check_status"></a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Pending->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-primary" id="check_status">Pending</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Approved->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-info" id="check_status">Approved</a> </div>';
                    return $html;
                }
            })
            ->editColumn('photo', function ($row) {
                $url = $row->photo;
                $src = (str_starts_with($url, 'http') ? $url : asset('uploads/dealership/' . $url));
                return '<img src="' . $src . '" alt="' . $row->photo . '" width="' . 40 . '"  />';
            })
            ->editColumn('name', function ($row) {
                $user = User::where('id', $row->user_id)->first();
                if($row->user_id == $user->id) {
                    return $user->name;
                }
            })
            ->editColumn('phone', function ($row) {
                $user = User::where('id', $row->user_id)->first();
                if($row->user_id == $user->id) {
                    return $user->phone;
                }
            })
            ->editColumn('email', function ($row) {
                $user = User::where('id', $row->user_id)->first();
                if($row->user_id == $user->id) {
                    return $user->email;
                }
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item edit-btn"  href="' . route('dealerships.show', $row->id) . '">View</a>';
                $html .= '<a class="dropdown-item delete-btn" href="' . route('dealerships.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status', 'photo', 'name']);
    }


    public function query(Dealership $model)
    {
        // here is status 4.. will be StatusEnum::Approved->value 
        return $model->newQuery()->where('status', StatusEnum::Approved->value)->orderBy('created_at', 'desc');
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
            Column::computed('name'),
            Column::make('business_name'),
            Column::make('phone'),
            Column::make('email'),
            Column::make('trade_license_number'),
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
        return 'Dealerships_' . date('YmdHis');
    }
}

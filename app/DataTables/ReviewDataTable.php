<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\Review;
use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReviewDataTable extends DataTable
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
                    $html = '<div class="col-sm-5"><a href="' . route('review.active', $row->id) . '" class="btn btn-success" id="check_status"></a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Inactive->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('review.inactive', $row->id) . '" class="btn btn-danger" id="check_status"></a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Approved->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-info" id="check_status">Approved</a> </div>';
                    return $html;
                }
                if ($row->status == StatusEnum::Pending->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-primary" id="check_status">Pending</a> </div>';
                    return $html;
                }
            })

            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item edit-btn"  href="' . route('review.edit', $row->id) . '">Edit</a>';
                $html .= '<a class="dropdown-item delete-btn" href="' . route('review.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->addColumn('avarage', function ($row) {
                // $product = Product::all();
                // $reviews = Review::where('product_id', $product->id)->get();
                // if ($reviews->average('rating')) {
                //     $average_rating = $reviews->average('rating');
                // } else {
                //     $average_rating = 0;
                // }
                // // echo $average_rating;
                // return $final_star = ((100 * $average_rating) / 5);
            })
            ->addColumn('product', function ($row) {
                return $row->product->product_name;
            })
            ->rawColumns(['action', 'status', 'avarage', 'product']);
    }


    public function query(Review $model)
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
                    ->setTableId('reviewdatatable-table')
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
            Column::computed('name'),
            Column::computed('product'),
            Column::make('email'),
            Column::make('rating'),
            // Column::computed('avarage'),
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
        return 'Review_' . date('YmdHis');
    }
}

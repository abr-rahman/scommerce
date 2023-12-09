<?php

namespace App\DataTables;

use App\Enums\ProductStatus;
use App\Models\Product;
use App\Models\RegularPrice;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                if ($row->status == ProductStatus::Active->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('product.active', $row->id) . '" class="btn bg-success badge" id="check_status">Active</a> </div>';
                    return $html;
                } 
                if ($row->status == ProductStatus::Inactive->value) {
                    $html = '<div class="col-sm-5"><a href="' . route('product.inactive', $row->id) . '" class="btn bg-danger badge" id="check_status">In-active</a> </div>';
                    return $html;
                }
                if ($row->status == ProductStatus::Arrival->value) {
                    $html = '<div class="col-sm-5"><a class="btn bg-dark badge">Arrival</a> </div>';
                    return $html;
                }
                if ($row->status == ProductStatus::Pending->value) {
                    $html = '<div class="col-sm-5"><a class="btn bg-info badge">Pending</a> </div>';
                    return $html;
                }
                if ($row->status == ProductStatus::Comming->value) {
                    $html = '<div class="col-sm-5"><a class="btn bg-info badge">Coming-Soon</a> </div>';
                    return $html;
                }
            })
            ->editColumn('a_status', function ($row) {
                if ($row->a_status == ProductStatus::Featured->value) {
                    $html = '<div class="col-sm-5"><a class="btn bg-info badge">Featured</a> </div>';
                    return $html;
                }
            })
            ->addColumn('regular_price', function ($row) {
                $regularPrice = RegularPrice::select('regular_price')->where('product_id', $row->id)->first();
                return $regularPrice->regular_price;
            })
            ->addColumn('product_code', function ($row) {
                $editUrl =  route('product.edit', $row->id);
                $lastVisitedUrl = session('last_visited_url');
                if ($lastVisitedUrl == $editUrl) {
                    $html = '<span class="brand-color">' . $row->product_code . '</span>';
                } else {
                    $html = '<span>' . $row->product_code . '</span>';
                }
                return $html;
            })
            
            ->editColumn('image', function ($row) {
                $url = $row->product_image;
                $src = (str_starts_with($url, 'http') ? $url : asset('uploads/product/' . $url));
                return '<img src="' . $src . '" alt="' . $row->product_image . '" width="' . 60 . '"  />';
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item"  href="' . route('product.show', $row->id) . '">Show</a>';
                $html .= '<a class="dropdown-item border"  href="' . route('product.edit', $row->id) . '">Edit</a>';
                $html .= '<a class="dropdown-item border"  href="' . route('product.qr_code', $row->id) . '">QR Code</a>';
                if ($row->status == ProductStatus::Active->value) {
                    $html .= '<a class="dropdown-item border"  href="' . route('product.featured', $row->id) . '">Add Featured</a>';
                    $html .= '<a class="dropdown-item" href="' . route('product.comming', $row->id) . '">Add Coming Soon </a>';
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('product.add_arrival', $row->id) . '">Add For Arrival</a>';
                }
                if ($row->status == ProductStatus::Arrival->value) {
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('product.remove_arrival', $row->id) . '">Remove Arrival</a>';
                }
                if ($row->status == ProductStatus::Comming->value) {
                    $html .= '<a class="dropdown-item border"  href="' . route('product.featured', $row->id) . '">Add Featured</a>';
                    $html .= '<a class="dropdown-item border" id="check_status" href="' . route('product.remove_comming', $row->id) . '">Remove Comming</a>';
                }
                if ($row->a_status == ProductStatus::Featured->value) {
                    $html .= '<a class="dropdown-item border"  href="' . route('product.featured_remove', $row->id) . '">Remove Featured</a>';
                }
                $html .= '<a class="dropdown-item border" id="create_review" href="' . route('product_review.create', $row->id) . '">Add Review</a>';
                $html .= '<a class="dropdown-item border" id="change_price" href="' . route('product.change_price', $row->id) . '">Change Price</a>';
                $html .= '<a class="dropdown-item delete-btn" href="' . route('products.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status', 'a_status', 'image', 'product_code']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
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
                    ->setTableId('productdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle()
                    // ->dom('Bfrtip')
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
            Column::make('product_name')
                    ->searchable(true)
                    ->title('Product Name'),
            Column::computed('regular_price'),
            Column::computed('product_code'),
            Column::computed('image'),
            Column::computed('status'),
            Column::computed('a_status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Product_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\ContactUs;
use App\Models\Tag;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
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

            // ->addColumn('action', function ($row) {
            //     $html = '<div class="dropdown">';
            //     $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
            //     $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
            //     $html .= '<a class="dropdown-item edit-btn"  href="' . route('tags.edit', $row->id) . '">Edit</a>';
            //     $html .= '<a class="dropdown-item delete-btn" href="' . route('tags.destroy', $row->id) . '">Delete</a>';
            //     $html .= '</div>';
            //     $html .= '</div>';

            //     return $html;
            // })
            ->rawColumns(['action', 'status']);
    }

   
    public function query(ContactUs $model)
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
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('name'),
            Column::make('email'),
            Column::make('subject'),
            Column::make('message'),
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
        return 'Contact_' . date('YmdHis');
    }
}

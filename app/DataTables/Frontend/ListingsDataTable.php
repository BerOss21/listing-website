<?php

namespace App\DataTables\Frontend;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ListingsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($listing) {
                return view('frontend.datatables.listings.actions', ['id' => $listing->id]);
            })
            ->editColumn('is_approved',function($listing){
                return $listing->is_approved? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('status',function($listing){
                return $listing->status? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('is_featured',function($listing){
                return $listing->is_featured? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('is_verified',function($listing){
                return $listing->is_verified? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('thumbnail_image',function($listing){
                return $listing->thumbnail_image?"<img src='{$listing->thumbnail_image}' width=100 height=100>":"";
            })
            ->editColumn('image',function($listing){
                return $listing->image?"<img src='{$listing->image}' width=100 height=100>":"";
            })
            ->rawColumns(['action','is_approved','status','thumbnail_image','image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $listing): QueryBuilder
    {
        return $listing->whereUserId(auth('web')->id())->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('listings-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->visible(false),
            Column::make('title'),
            Column::make('thumbnail_image'),
            Column::make('image'),
            Column::make('status'),
            Column::make('expire_date'),
            Column::make('is_approved'),
            Column::make('is_verified'),
            Column::make('is_featured'),
            Column::make('created_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Listings_' . date('YmdHis');
    }
}

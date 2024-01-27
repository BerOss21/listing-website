<?php

namespace App\DataTables;

use App\Helpers\Currency;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($order) {
                return view('admin.datatables.orders.actions', ['transaction_id' => $order->transaction_id]);
            })
            ->addColumn('payment_method',function($order){
                return $order->payment_method->name;
            })
            ->addColumn('package',function($order){
                return $order->package->name;
            })
            ->addColumn('user',function($order){
                return $order->user->firstname. ' ' .$order->user->lastname;
            })
            ->editColumn('paid_amount',function($order){
                return Currency::format($order->paid_amount,$order->paid_currency);
            })
            ->editColumn('base_amount',function($order){
                return Currency::format($order->base_amount,$order->base_currency);
            })
            ->editColumn('purchase_date',function($order){
                return $order->purchase_date->format('d/m/Y');
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->with(['package','user','payment_method'])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('orders-table')
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
            Column::make('transaction_id'),
            Column::make('base_amount'),
            Column::make('base_currency'),
            Column::make('paid_amount'),
            Column::make('paid_currency'),
            Column::make('purchase_date'),
            Column::computed('package'),
            Column::computed('payment_method'),
            Column::computed('user'),
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
        return 'Orders_' . date('YmdHis');
    }
}

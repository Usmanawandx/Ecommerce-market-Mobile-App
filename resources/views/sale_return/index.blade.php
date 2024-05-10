@extends('layouts.app')
@section('title', __( 'lang_v1.all_sales'))

@section('content')

<style>
        .btn-vew {
        font-size: 14px !important;
        padding: 7px 8px 7px 8px !important;
        border-radius: 50px !important;
        }
    
        .btn-edt {
        font-size: 14px !important;
        padding: 6px 7px 7px 9px !important;
        border-radius: 50px !important;
        margin: 0px 5px 0px 5px;
        }
    
        .btn-list {
        font-size: 14px !important;
        padding: 5px 9px 5px 9px !important;
        border-radius: 50px !important;
            
        }
        
        .btn-dlt {
        font-size: 14px !important;
        padding: 7px 9px 7px 9px !important;
        border-radius: 50px !important;
        margin-left: 0px;
        margin-right: 5px;
    }
    .mn-col {

width: 100% !Important;
}

    .dataTables_scrollHeadInner {
    width: 100% !important;
}

table.table.table-bordered.table-striped.ajax_view.dataTable {
    width: 100% !important;
}

table#sell_table {
    width: 100% !important;
}

</style>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    
    <h1>@lang( 'Sale Return Invoice')
        {{-- <span class="pull-right">Transaction No: {{$t_no }}</span> --}}
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    @component('components.filters', ['title' => __('report.filters')])
        @include('sell.partials.sell_list_filters')
        @if(!empty($sources))
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('sell_list_filter_source',  __('lang_v1.sources') . ':') !!}

                    {!! Form::select('sell_list_filter_source', $sources, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); !!}
                </div>
            </div>
        @endif
    @endcomponent
    @component('components.widget', ['class' => 'box-primary', 'title' => __( 'lang_v1.all_sales')])
        @can('sale.sale_return_invoice.add')
            @slot('tool')
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" href="{{action('SellController@salereturncreate')}}?sale_type=sale_return_invoice">
                    <i class="fa fa-plus"></i> @lang('messages.add')</a>
                </div>
            @endslot
        @endcan
        @php
            $custom_labels = json_decode(session('business.custom_labels'), true);
         @endphp
            <table class="table table-bordered table-striped ajax_view hide-footer dataTable table-styling table-hover table-primary" id="sell_table">
                <thead>
                <tr>
                    <th class="mn-col">@lang('messages.action')</th>
                        <th>@lang('Sno')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('Transaction No')</th>
                        <th>Sale Inoive No</th>
                        <th>Sale Type</th>
                        <th>@lang('sale.customer_name')</th>
                        <th>NTN / CNIC</th>
                        <th>Invoice Total</th>
                        <th>Transaction Account</th>
                        <th>Sales Man</th>
                        <th>Transporter</th>
                        <th>Vehicle</th>
                        <th>@lang('sale.status')</th>
                        <th>@lang('Remarks')</th>
                        <th>Created By</th>
                        <th>@lang('sale.location')</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <!--<tfoot>-->
                <!--    <tr class="bg-gray font-17 footer-total text-center">-->
                <!--        <td ><strong>@lang('sale.total'):</strong></td>-->
                <!--        <td class="footer_payment_status_count"></td>-->
                <!--        <td class="payment_method_count"></td>-->
                <!--        <td class="footer_sale_total"></td>-->
                <!--        <td class="footer_total_paid"></td>-->
                <!--        <td class="footer_total_remaining"></td>-->
                <!--        <td class="footer_total_sell_return_due"></td>-->
                <!--        <td class="service_type_count"></td>-->
                <!--    </tr>-->
                <!--</tfoot>-->
            </table>

    @endcomponent
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- This will be printed -->
<!-- <section class="invoice print_section" id="receipt_section">
</section> -->

@stop

@section('javascript')
<script type="text/javascript">
$(document).ready( function(){
    var i = 1;

    //Date range as a button
    $('#sell_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        sell_table.ajax.reload();
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[1, 'desc']],
        "ajax": {
            "url": "/Sale_Return",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 1;

                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sales_cmsn_agnt = $('#sales_cmsn_agnt').val();
                d.service_staffs = $('#service_staffs').val();

                if($('#shipping_status').length) {
                    d.shipping_status = $('#shipping_status').val();
                }

                if($('#sell_list_filter_source').length) {
                    d.source = $('#sell_list_filter_source').val();
                }

                if($('#only_subscriptions').is(':checked')) {
                    d.only_subscriptions = 1;
                }

                d = __datatable_ajax_callback(d);
            }
        },
        scrollY:        "75vh",
        scrollX:        true,
        scrollCollapse: true,
        columns: [
            { data: 'action', name: 'action'},
            {"render": function() { return i++;}, visible: false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'ref_no', name: 'ref_no'},
            { data: 'sin_no', name: 'sin_no', searchable: false, visible: false},
            { data: 'sales_type', name: 'sales_type'},
            { data: 'conatct_name', name: 'conatct_name'},
            { data: 'ntn_cnic_no', name: 'ntn_cnic_no'},
            { data: 'final_total', name: 'final_total'},
            { data: 'transaction_account', name: 'transaction_account'},
            { data: 'sales_man', name: 'sales_man'},
            { data: 'trnanspo_name', name: 'trnanspo_name'},
            { data: 'vehicle', name: 'vehicle'},
            { data: 'status', name: 'status', visible: false},
            { data: 'additional_notes', name: 'additional_notes'},
            { data: 'created_by', name: 'created_by'},
            { data: 'business_location', name: 'bl.name'},
            
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#sell_table'));
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var footer_sale_total = 0;
            var footer_total_paid = 0;
            var footer_total_remaining = 0;
            var footer_total_sell_return_due = 0;
            for (var r in data){
                footer_sale_total += $(data[r].final_total).data('orig-value') ? parseFloat($(data[r].final_total).data('orig-value')) : 0;
                footer_total_paid += $(data[r].total_paid).data('orig-value') ? parseFloat($(data[r].total_paid).data('orig-value')) : 0;
                footer_total_remaining += $(data[r].total_remaining).data('orig-value') ? parseFloat($(data[r].total_remaining).data('orig-value')) : 0;
                footer_total_sell_return_due += $(data[r].return_due).find('.sell_return_due').data('orig-value') ? parseFloat($(data[r].return_due).find('.sell_return_due').data('orig-value')) : 0;
            }

            $('.footer_total_sell_return_due').html(__currency_trans_from_en(footer_total_sell_return_due));
            $('.footer_total_remaining').html(__currency_trans_from_en(footer_total_remaining));
            $('.footer_total_paid').html(__currency_trans_from_en(footer_total_paid));
            $('.footer_sale_total').html(__currency_trans_from_en(footer_sale_total));

            $('.footer_payment_status_count').html(__count_status(data, 'payment_status'));
            $('.service_type_count').html(__count_status(data, 'types_of_service_name'));
            $('.payment_method_count').html(__count_status(data, 'payment_methods'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(6)').attr('class', 'clickable_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #created_by, #sales_cmsn_agnt, #service_staffs, #shipping_status, #sell_list_filter_source',  function() {
        sell_table.ajax.reload();
    });

    $('#only_subscriptions').on('ifChanged', function(event){
        sell_table.ajax.reload();
    });
});
</script>
<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
@endsection
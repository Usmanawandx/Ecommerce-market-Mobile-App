@extends('layouts.app')
@section('title', __('lang_v1.edit_purchase_order'))

@section('content')
<style>
    .select2-container--default{
        width:100% !Important;
    }
    #tbody textarea.form-control {
    height: 35px !important;
    width: 100% !important;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="top-heading">Update Purchase Requisition<i class="fa fa-keyboard-o hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="@include('purchase.partials.keyboard_shortcuts_details')" data-html="true" data-trigger="hover" data-original-title="" title=""></i>
      <span class="pull-right top_trans_no">{{$purchase->ref_no}}</span>
    </h1>

  </section>

<!-- Main content -->
<section class="content">

  <!-- Page level currency setting -->
  <input type="hidden" id="p_code" value="{{$currency_details->code}}">
  <input type="hidden" id="p_symbol" value="{{$currency_details->symbol}}">
  <input type="hidden" id="p_thousand" value="{{$currency_details->thousand_separator}}">
  <input type="hidden" id="p_decimal" value="{{$currency_details->decimal_separator}}">

  @include('layouts.partials.error')

  {!! Form::open(['url' =>  action('PurchaseOrderController@update_req' , [$purchase->id] ), 'method' => 'PUT', 'id' => 'add_purchase_form', 'files' => true ]) !!}

  <br/>
  


  @php
    $currency_precision = config('constants.currency_precision', 2);
  @endphp
  <input type="hidden" id="is_purchase_order">
  <input type="hidden" id="purchase_id" value="{{ $purchase->id }}">

    @component('components.widget', ['class' => 'box-primary'])
        <div class="row">


          
          <div class="col-sm-4">
            <div class="form-group">
              <label>Purchase Type</label>
              
              
          <div class="input-group">
				<select class="form-control purchase_category purchase__type_edit no-pointer-events" name="purchase_category"  readonly required>
                    <option selected disabled> Select</option>
                    @foreach ($purchase_category as $tp)
    
                    @if($tp->id == $purchase->purchase_category)
                    <option value="{{$tp->id}}" data-pf="{{$tp->prefix}}" selected>{{$tp->Type}}</option>
                    @else
                    <option value="{{$tp->id}}" data-pf="{{$tp->prefix}}">{{$tp->Type}}</option>
                    @endif
    
                    @endforeach
                </select>

				<span class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat btn-modal"
					data-href="{{action('PurchaseOrderController@Purchase_type_partial')}}" data-container=".view_modal"><i
					class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
              
            </div>
          </div>
    
            
         <div class="col-sm-4">
            <div class="form-group">
                <label>Product Type</label>
                <select class="form-control purchase_type no-pointer-events" name="purchase_type" readonly id="is_purchase_order_dd">
                    <option selected disabled> Select</option>
                    @foreach ($p_type as $tp)
                    @if($tp->id == $purchase->purchase_type)
                    <option value="{{$tp->id}}" selected data-purchasetype="{{ $tp->purchase_type }}">{{$tp->name}}</option>
                    @else
                    <option value="{{$tp->id}}" data-purchasetype="{{ $tp->purchase_type }}">{{$tp->name}}</option>
                    @endif
                    @endforeach
              </select>
    
            </div>
        </div>


            	<div class="@if(!empty($default_purchase_status)) col-sm-4 @else col-sm-4 @endif">
				<div class="form-group">
					{!! Form::label('ref_no', __('Transaction No').':') !!}
					
				 {!! Form::text('ref_no',$purchase->ref_no, ['class' => 'form-control tr_no__edit','readonly']); !!} 

				</div>
			</div>
           
            
       
            <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            {!! Form::label('transaction_date', __('Transaction Date') . ':*') !!}
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              {!! Form::text('transaction_date', @format_datetime($purchase->transaction_date), ['class' => 'form-control', 'required','id'=>'expense_transaction_date']); !!}
            </div>
          </div>
        </div>
          
           <div class="col-sm-4 hide">
              <div class="form-group">
                {!! Form::label('Posting Date', __('Posting Date') . ':*') !!}
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  {!! Form::text('posting_date', @format_date('now'), ['class' => 'form-control','readonly','required']); !!}
                </div>
              </div>
            </div>
            

           
            <div class="col-sm-4 hide" >
              <div class="form-group">
                {!! Form::label('transaction_date', __('Transaction Date') . ':*') !!}
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  {!! Form::text('expected_date', @format_datetime($purchase->expected_date), ['class' => 'form-control', 'required','id'=>'expense_transaction_date']); !!}
                </div>
              </div>
            </div>

            <div class="col-sm-4" >
            <div class="form-group">
              {!! Form::label('additional_notes',__('Remarks')) !!}
              {!! Form::textarea('additional_notes', $purchase->additional_notes, ['class' => 'form-control', 'rows' => 1]); !!}
            </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                {!! Form::label('location_id', __('purchase.business_location').':*') !!}
                @show_tooltip(__('tooltip.purchase_location'))
                {!! Form::select('location_id', $business_locations, $purchase->location_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
              </div>
            </div>
      
            <div class="col-sm-4">
              <div class="form-group">
                  {!! Form::label('document', __('purchase.attach_document') . ':') !!}
                  {!! Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); !!}
        
              </div>
          </div>
            
               
      
            <!-- Currency Exchange Rate -->
            <div class="col-sm-4 @if(!$currency_details->purchase_in_diff_currency) hide @endif">
              <div class="form-group">
                {!! Form::label('exchange_rate', __('purchase.p_exchange_rate') . ':*') !!}
                @show_tooltip(__('tooltip.currency_exchange_factor'))
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                  </span>
                  {!! Form::number('exchange_rate', $purchase->exchange_rate, ['class' => 'form-control', 'required', 'step' => 0.001]); !!}
                </div>
                <span class="help-block text-danger">
                  @lang('purchase.diff_purchase_currency_help', ['currency' => $currency_details->name])
                </span>
              </div>
            </div>

        <!--hide field-->
        <div class="col-sm-4 hide"  >
            <div class="form-group">
              {!! Form::label('sales Man ', __('Sales Man') . ':*') !!}
              <div class="input-group">
                
                <select name="sales_man" class="form-control select2">
                  <option selected disabled> Please Select</option>
                  
                  
                  @foreach ($sale_man as $s) 
                  @if($purchase->sales_man == $s->id)
                  
                    <option value="{{$s->id}}" selected>{{$s->supplier_business_name}}</option>
                  @else
                  <option value="{{$s->id}}">{{$s->supplier_business_name}}</option>
                  @endif
                  @endforeach
               
                </select>
              </div>
            </div>
          </div>
          
        
        </div>
    @endcomponent

    @component('components.widget', ['class' => 'box-primary'])
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
        
            </div>
            <div class="col-sm-2" style="display:none;">
              <div class="form-group">
                <button tabindex="-1" type="button" class="btn btn-link btn-modal"data-href="{{action('ProductController@quickAdd')}}" 
                      data-container=".quick_add_product_modal"><i class="fa fa-plus"></i> @lang( 'product.add_new_product' ) </button>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
              @include('purchase.partials.edit_purchase_entry_row_req', ['is_purchase_order' => true])

              <hr/>
              <button class="btn btn-md btn-primary addBtn" type="button"  onclick="add_req(this)" style=" padding: 0px 5px 2px 5px; ">Add Row</button>
              <div class="pull-right col-md-5">
                <table class="pull-right col-md-12 total_data">
                  <tr>
                    <th class="col-md-7 text-right">@lang( 'lang_v1.total_items' ):</th>
                    <td class="col-md-5 text-left">
                      <span id="total_quantity" class="display_currency" data-currency_symbol="false"></span>
                    </td>
                  </tr>
                  <tr class="hide">
                    <th class="col-md-7 text-right">@lang( 'purchase.total_before_tax' ):</th>
                    <td class="col-md-5 text-left">
                      <span id="total_st_before_tax" class="display_currency"></span>
                      <input type="hidden" id="st_before_tax_input" value=0>
                    </td>
                  </tr>
                  <tr class="hide">
                    <th class="col-md-7 text-right">@lang( 'purchase.net_total_amount' ):</th>
                    <td class="col-md-5 text-left">
                      <span id="total_subtotal" class="display_currency">{{$purchase->total_before_tax/$purchase->exchange_rate}}</span>
                      <!-- This is total before purchase tax-->
                      <input type="hidden" id="total_subtotal_input" value="{{$purchase->total_before_tax/$purchase->exchange_rate}}" name="total_before_tax">
                    </td>
                  </tr>
                  <tr>
					<th class="col-md-7 text-right">Total Gross Weight:</th>
					<td class="col-md-5 text-left">
						<span id="total_gross__weight" class="display_currency" data-currency_symbol="false"></span>
            <input type="hidden" name="total_gross__weight" class="total_gross__weight"/>
					</td>
				  </tr>
				  <tr>
					<th class="col-md-7 text-right">Total Net Weight:</th>
					<td class="col-md-5 text-left">
						<span id="total_net__weight" class="display_currency" data-currency_symbol="false"></span>
            <input type="hidden" name="total_net__weight" class="total_net__weight"/>
					</td>
				  </tr>
                </table>
              </div>

            </div>
        </div>
    @endcomponent

    @component('components.widget', ['class' => 'box-solid'])
      <div class="row" id="shipping_div" style="display:none" >
        <div class="col-md-4">
          <div class="form-group">
                  {!! Form::label('shipping_details', __('sale.shipping_details')) !!}
                  {!! Form::textarea('shipping_details',$purchase->shipping_details, ['class' => 'form-control','placeholder' => __('sale.shipping_details') ,'rows' => '3', 'cols'=>'30']); !!}
              </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
                  {!! Form::label('shipping_address', __('lang_v1.shipping_address')) !!}
                  {!! Form::textarea('shipping_address',$purchase->shipping_address, ['class' => 'form-control','placeholder' => __('lang_v1.shipping_address') ,'rows' => '3', 'cols'=>'30']); !!}
              </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!!Form::label('shipping_charges', __('sale.shipping_charges'))!!}
            <div class="input-group">
            <span class="input-group-addon">
            <i class="fa fa-info"></i>
            </span>
            {!!Form::text('shipping_charges',number_format($purchase->shipping_charges/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator),['class'=>'form-control input_number','placeholder'=> __('sale.shipping_charges')]);!!}
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="form-group">
                  {!! Form::label('shipping_status', __('lang_v1.shipping_status')) !!}
                  {!! Form::select('shipping_status',$shipping_statuses, $purchase->shipping_status, ['class' => 'form-control','placeholder' => __('messages.please_select')]); !!}
              </div>
        </div>
        <div class="col-md-4">
              <div class="form-group">
                  {!! Form::label('delivered_to', __('lang_v1.delivered_to') . ':' ) !!}
                  {!! Form::text('delivered_to', $purchase->delivered_to, ['class' => 'form-control','placeholder' => __('lang_v1.delivered_to')]); !!}
              </div>
          </div>
          @php
            $custom_labels = json_decode(session('business.custom_labels'), true);
              $shipping_custom_label_1 = !empty($custom_labels['shipping']['custom_field_1']) ? $custom_labels['shipping']['custom_field_1'] : '';

              $is_shipping_custom_field_1_required = !empty($custom_labels['shipping']['is_custom_field_1_required']) && $custom_labels['shipping']['is_custom_field_1_required'] == 1 ? true : false;

              $shipping_custom_label_2 = !empty($custom_labels['shipping']['custom_field_2']) ? $custom_labels['shipping']['custom_field_2'] : '';

              $is_shipping_custom_field_2_required = !empty($custom_labels['shipping']['is_custom_field_2_required']) && $custom_labels['shipping']['is_custom_field_2_required'] == 1 ? true : false;

              $shipping_custom_label_3 = !empty($custom_labels['shipping']['custom_field_3']) ? $custom_labels['shipping']['custom_field_3'] : '';
              
              $is_shipping_custom_field_3_required = !empty($custom_labels['shipping']['is_custom_field_3_required']) && $custom_labels['shipping']['is_custom_field_3_required'] == 1 ? true : false;

              $shipping_custom_label_4 = !empty($custom_labels['shipping']['custom_field_4']) ? $custom_labels['shipping']['custom_field_4'] : '';
              
              $is_shipping_custom_field_4_required = !empty($custom_labels['shipping']['is_custom_field_4_required']) && $custom_labels['shipping']['is_custom_field_4_required'] == 1 ? true : false;

              $shipping_custom_label_5 = !empty($custom_labels['shipping']['custom_field_5']) ? $custom_labels['shipping']['custom_field_5'] : '';
              
              $is_shipping_custom_field_5_required = !empty($custom_labels['shipping']['is_custom_field_5_required']) && $custom_labels['shipping']['is_custom_field_5_required'] == 1 ? true : false;
            @endphp

            @if(!empty($shipping_custom_label_1))
              @php
                $label_1 = $shipping_custom_label_1 . ':';
                if($is_shipping_custom_field_1_required) {
                  $label_1 .= '*';
                }
              @endphp

              <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_custom_field_1', $label_1 ) !!}
                    {!! Form::text('shipping_custom_field_1', $purchase->shipping_custom_field_1, ['class' => 'form-control','placeholder' => $shipping_custom_label_1, 'required' => $is_shipping_custom_field_1_required]); !!}
                </div>
            </div>
            @endif
            @if(!empty($shipping_custom_label_2))
              @php
                $label_2 = $shipping_custom_label_2 . ':';
                if($is_shipping_custom_field_2_required) {
                  $label_2 .= '*';
                }
              @endphp

              <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_custom_field_2', $label_2 ) !!}
                    {!! Form::text('shipping_custom_field_2', $purchase->shipping_custom_field_2, ['class' => 'form-control','placeholder' => $shipping_custom_label_2, 'required' => $is_shipping_custom_field_2_required]); !!}
                </div>
            </div>
            @endif
            @if(!empty($shipping_custom_label_3))
              @php
                $label_3 = $shipping_custom_label_3 . ':';
                if($is_shipping_custom_field_3_required) {
                  $label_3 .= '*';
                }
              @endphp

              <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_custom_field_3', $label_3 ) !!}
                    {!! Form::text('shipping_custom_field_3', $purchase->shipping_custom_field_3, ['class' => 'form-control','placeholder' => $shipping_custom_label_3, 'required' => $is_shipping_custom_field_3_required]); !!}
                </div>
            </div>
            @endif
            @if(!empty($shipping_custom_label_4))
              @php
                $label_4 = $shipping_custom_label_4 . ':';
                if($is_shipping_custom_field_4_required) {
                  $label_4 .= '*';
                }
              @endphp

              <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_custom_field_4', $label_4 ) !!}
                    {!! Form::text('shipping_custom_field_4', $purchase->shipping_custom_field_4, ['class' => 'form-control','placeholder' => $shipping_custom_label_4, 'required' => $is_shipping_custom_field_4_required]); !!}
                </div>
            </div>
            @endif
            @if(!empty($shipping_custom_label_5))
              @php
                $label_5 = $shipping_custom_label_5 . ':';
                if($is_shipping_custom_field_5_required) {
                  $label_5 .= '*';
                }
              @endphp

              <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_custom_field_5', $label_5 ) !!}
                    {!! Form::text('shipping_custom_field_5', $purchase->shipping_custom_field_4, ['class' => 'form-control','placeholder' => $shipping_custom_label_5, 'required' => $is_shipping_custom_field_5_required]); !!}
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('shipping_documents', __('lang_v1.shipping_documents') . ':') !!}
                    {!! Form::file('shipping_documents[]', ['id' => 'shipping_documents', 'multiple', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); !!}
                    <p class="help-block">
                      @lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])
                      @includeIf('components.document_help_text')
                    </p>
                    @php
                        $medias = $purchase->media->where('model_media_type', 'shipping_document')->all();
                    @endphp
                    @include('sell.partials.media_table', ['medias' => $medias, 'delete' => true])
                </div>
            </div>
          </div>
     
          <div class="row" style="display: none;">
            <div class="col-md-4 col-md-offset-8">
                {!! Form::hidden('final_total', $purchase->final_total , ['id' => 'grand_total_hidden']); !!}
                      <b>@lang('lang_v1.order_total'): </b><span id="grand_total" class="display_currency" data-currency_symbol='true'>{{$purchase->final_total}}</span>
            </div>
          </div>
    @endcomponent
              
    @component('components.widget', ['class' => 'box-solid'])
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                  <tr class="hide">
                    <td class="col-md-3" style="display: none;">
                      <div class="form-group">
                        {!! Form::label('discount_type', __( 'purchase.discount_type' ) . ':') !!}
                        {!! Form::select('discount_type', [ '' => __('lang_v1.none'), 'fixed' => __( 'lang_v1.fixed' ), 'percentage' => __( 'lang_v1.percentage' )], $purchase->discount_type, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
                      </div>
                    </td>
                    <td class="col-md-3" style="display: none;">
                      <div class="form-group">
                      {!! Form::label('discount_amount', __( 'purchase.discount_amount' ) . ':') !!}
                      {!! Form::text('discount_amount', 

                      ($purchase->discount_type == 'fixed' ? 
                        number_format($purchase->discount_amount/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator)
                      :
                        number_format($purchase->discount_amount, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator)
                      )
                      , ['class' => 'form-control input_number']); !!}
                      </div>
                    </td>
                    <td class="col-md-3" style="display: none;">
                      &nbsp;
                    </td>
                    <td class="col-md-3" style="display: none;">
                      <b>Discount:</b>(-) 
                      <span id="discount_calculated_amount" class="display_currency">0</span>
                    </td>
                  </tr>
                  <tr class="hide" style="display: none;">
                    <td>
                      <div class="form-group">
                      {!! Form::label('tax_id', __( 'purchase.purchase_tax' ) . ':') !!}
                      <select name="tax_id" id="tax_id" class="form-control select2" placeholder="'Please Select'">
                        <option value="" data-tax_amount="0" selected>@lang('lang_v1.none')</option>
                        @foreach($taxes as $tax)
                          <option value="{{ $tax->id }}" @if($purchase->tax_id == $tax->id) {{'selected'}} @endif data-tax_amount="{{ $tax->amount }}"
                          >
                            {{ $tax->name }}
                          </option>
                        @endforeach
                      </select>
                      {!! Form::hidden('tax_amount', $purchase->tax_amount, ['id' => 'tax_amount']); !!}
                      </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                      <b>@lang( 'purchase.purchase_tax' ):</b>(+) 
                      <span id="tax_calculated_amount" class="display_currency">0</span>
                    </td>
                  </tr>
                 

                </table>
            </div>
        </div>
    
        <div class="col-sm-4">
            <div class="form-group">
          <label>Term & Condtions</label>
              <select class="form-control" name="tandc_type" id="TCS">
                           <option selected disabled> Select</option>
                @foreach ($T_C as $tc)
                @if($tc->id == $purchase->tandc_type)
                <option value="{{$tc->id}}" selected>{{$tc->title}}</option>
                @else
                <option value="{{$tc->id}}" >{{$tc->title}}</option>
                @endif
                @endforeach
              </select>
    
            </div>
          </div>
          	<div class="col-sm-12">
			<div class="form-group" id="TandC" >
							{!! Form::label('tandc_title',__('Terms & Conditions')) !!}
							{!! Form::textarea('tandc_title', $purchase->tandc_title, ['class' => 'form-control name','id'=>'product_description1','rows' => 3]); !!}
						</div>
						</div>
    @endcomponent
                      
  
    <div class="col-sm-12 text-center fixed-button">
    {{-- <button type="button"  class="btn btn-primary pull-right btn-flat"><a style="color: white" href="{{action('PurchaseOrderController@convert_pr_to_po',$purchase->id )}}">Convert To PO</a></button> --}}
    @if($purchase->purchase_order_ids == 0)
   
    <a class="btn-big btn-primary " href="/purchase-order/create?convert_id={{$purchase->id}}">Convert To Purchase Order</a>
    @endif
    <button type="button" id="submit_purchase_form_req" class="btn-big btn-primary submit_purchase_form btn-flat" accesskey="s">Update & Close</button>
    <button class="btn-big btn-danger" type="button" onclick="window.history.back()">Close</button>  
  </div>
   

 
 
{!! Form::close() !!}
</section>
<!-- /.content -->
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  {{-- @include('contact.create', ['quick_add' => true]) --}}
</div>

@endsection

@section('javascript')

  <script src="{{ asset('js/purchase.js?v=' . $asset_v) }}"></script>
  <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/purchase_req.js') }}"></script>

  @include('purchase.partials.keyboard_shortcuts')
@endsection
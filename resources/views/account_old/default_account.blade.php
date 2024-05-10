@extends('layouts.app')
@section('title', __('business.business_settings'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Default Accounts</h1>
    <br>
</section>

<section class="content no-print">
    <div class="row">
    <div class="col-md-12">
       <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#sales_invoice" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> Sales Invoice</a>
                </li>
                <li>
                    <a href="#sales_return" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Sales Return</a>
                </li>
                <li>
                    <a href="#purchase_invoice" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Purchase Invoice</a>
                </li>
                <li>
                    <a href="#purchase_return" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Purchase Return</a>
                </li>
				<li>
                    <a href="#tank" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Tank</a>
                </li>
            </ul>
            @component('components.widget', ['class' => 'box-primary'])
            <div class="tab-content">
                <div class="tab-pane active" id="sales_invoice">
                    <form action="{{ action('AccountController@default_acc_store') }}" method="POST">
                    	    <div class="row">
                    	        
                    		        <div class="col-md-12">
                    		            @csrf
                    		            <input type="hidden" name="form_type" value="sale_invoice">
                    		            
                    		            <div class="col-md-4">
                        		            <label for="acc_type">Sale Account</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_account">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[0]->account_id == $account->id && $sale_invoice[0]->field_type == "sales_account" && $sale_invoice[0]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Add & Less Charges </label>
                        		            
                        		            <input type="hidden" name="field[]" value="addAndlessCharges">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[1]->account_id == $account->id && $sale_invoice[1]->field_type == "addAndlessCharges" && $sale_invoice[1]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Discount</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_discount">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[2]->account_id == $account->id && $sale_invoice[2]->field_type == "sales_discount" && $sale_invoice[2]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[3]->account_id == $account->id && $sale_invoice[3]->field_type == "sales_tax" && $sale_invoice[3]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Further Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="further_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[4]->account_id == $account->id && $sale_invoice[4]->field_type == "further_tax" && $sale_invoice[4]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Note</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_note">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[5]->account_id == $account->id && $sale_invoice[5]->field_type == "sales_note" && $sale_invoice[5]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Salesman Commission</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman_commission">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						         @if ($sale_invoice[6]->account_id == $account->id && $sale_invoice[6]->field_type == "salesman_commission" && $sale_invoice[6]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Contractor Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="contractor_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[7]->account_id == $account->id && $sale_invoice[7]->field_type == "contractor_exp" && $sale_invoice[7]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Vehicle Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="vehicle_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[8]->account_id == $account->id && $sale_invoice[8]->field_type == "vehicle_exp" && $sale_invoice[8]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">By Default Salesman</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if ($sale_invoice[9]->account_id == $account->id && $sale_invoice[9]->field_type == "salesman" && $sale_invoice[9]->form_type == "sale_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			
										<div class="col-md-4">
                        		            <label for="acc_type">Default Contractor</label>
                        		            
                        		            <input type="hidden" name="field[]" value="default_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if (isset($sale_invoice[10]) && $sale_invoice[10]->account_id == $contractor->id && $sale_invoice[10]->field_type == "default_contractor" && $sale_invoice[10]->form_type == "sale_invoice")
                                                            <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                        @else
                                                            <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Default Production Contractor</label>
                        		            
                        		            <input type="hidden" name="field[]" value="default_production_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if (isset($sale_invoice[11]) && $sale_invoice[11]->account_id == $contractor->id && $sale_invoice[11]->field_type == "default_production_contractor" && $sale_invoice[11]->form_type == "sale_invoice")
                                                            <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                        @else
                                                            <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            		
                            			<div class="col-md-12">
                            			    <input type="submit" class="btn btn-primary" value="Submit"/>
                            			</div>
                            			
                    		        </div>
                    		    </div>
                        </form>
                </div>
                <div class="tab-pane" id="sales_return">
                    <form action="{{ action('AccountController@default_acc_store') }}" method="POST">
                    	    <div class="row">
                    		        <div class="col-md-12">
                    		            @csrf
                    		            <input type="hidden" name="form_type" value="sale_return_invoice">
                    		            
                    		            <div class="col-md-4">
                        		            <label for="acc_type">Sale Return Account</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_account">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 0)
                            						        @if ($sale_return[0]->account_id == $account->id && $sale_return[0]->field_type == "sales_account" && $sale_return[0]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Add & Less Charges </label>
                        		            
                        		            <input type="hidden" name="field[]" value="addAndlessCharges">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 1)
                            						        @if ($sale_return[1]->account_id == $account->id && $sale_return[1]->field_type == "addAndlessCharges" && $sale_return[1]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Discount</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_discount">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 2)
                            						        @if ($sale_return[2]->account_id == $account->id && $sale_return[2]->field_type == "sales_discount" && $sale_return[2]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 3)
                            						        @if ($sale_return[3]->account_id == $account->id && $sale_return[3]->field_type == "sales_tax" && $sale_return[3]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Further Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="further_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 4)
                            						        @if ($sale_return[4]->account_id == $account->id && $sale_return[4]->field_type == "further_tax" && $sale_return[4]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Note</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_note">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($sale_return->count() > 5)
                            						        @if ($sale_return[5]->account_id == $account->id && $sale_return[5]->field_type == "sales_note" && $sale_return[5]->form_type == "sale_return_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Salesman Commission</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman_commission">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						         @if (isset($sale_return[6]) && $sale_return[6]->account_id == $account->id && $sale_return[6]->field_type == "salesman_commission" && $sale_return[6]->form_type == "sale_return_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Contractor Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="contractor_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if (isset($sale_return[7]) && $sale_return[7]->account_id == $account->id && $sale_return[7]->field_type == "contractor_exp" && $sale_return[7]->form_type == "sale_return_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Vehicle Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="vehicle_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if (isset($sale_return[8]) && $sale_return[8]->account_id == $account->id && $sale_return[8]->field_type == "vehicle_exp" && $sale_return[8]->form_type == "sale_return_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">By Default Salesman</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if (isset($sale_return[9]) && $sale_return[9]->account_id == $account->id && $sale_return[9]->field_type == "salesman" && $sale_return[9]->form_type == "sale_return_invoice")
                                                            <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                        @else
                                                            <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Default Contractor</label>
                        		            
                        		            <input type="hidden" name="field[]" value="default_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if (isset($sale_return[10]) && $sale_return[10]->account_id == $contractor->id && $sale_return[10]->field_type == "default_contractor" && $sale_return[10]->form_type == "sale_return_invoice")
                                                            <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                        @else
                                                            <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            		
                            			<div class="col-md-12">
                            			    <input type="submit" class="btn btn-primary" value="Submit"/>
                            			</div>
                            			
                    		        </div>
                    		    </div>
                        </form>
                </div>
                <div class="tab-pane" id="purchase_invoice">
                    <form action="{{ action('AccountController@default_acc_store') }}" method="POST">
                    	    <div class="row">
                    		        <div class="col-md-12">
                    		            @csrf
                    		            <input type="hidden" name="form_type" value="Purchase_invoice">
                    		            
                    		            <div class="col-md-4">
                        		            <label for="acc_type">Purchase Account</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_account">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 0)
                            						        @if ($purcase_invoice[0]->account_id == $account->id && $purcase_invoice[0]->field_type == "sales_account" && $purcase_invoice[0]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Add & Less Charges </label>
                        		            
                        		            <input type="hidden" name="field[]" value="addAndlessCharges">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 1)
                            						        @if ($purcase_invoice[1]->account_id == $account->id && $purcase_invoice[1]->field_type == "addAndlessCharges" && $purcase_invoice[1]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Purchase Discount</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_discount">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 2)
                            						        @if ($purcase_invoice[2]->account_id == $account->id && $purcase_invoice[2]->field_type == "sales_discount" && $purcase_invoice[2]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 3)
                            						        @if ($purcase_invoice[3]->account_id == $account->id && $purcase_invoice[3]->field_type == "sales_tax" && $purcase_invoice[3]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Further Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="further_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 4)
                            						        @if ($purcase_invoice[4]->account_id == $account->id && $purcase_invoice[4]->field_type == "further_tax" && $purcase_invoice[4]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Note</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_note">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 5)
                            						        @if ($purcase_invoice[5]->account_id == $account->id && $purcase_invoice[5]->field_type == "sales_note" && $purcase_invoice[5]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Salesman Commission</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman_commission">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 6)
                            						        @if ($purcase_invoice[6]->account_id == $account->id && $purcase_invoice[6]->field_type == "salesman_commission" && $purcase_invoice[6]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Contractor Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="contractor_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 7)
                            						        @if ($purcase_invoice[7]->account_id == $account->id && $purcase_invoice[7]->field_type == "contractor_exp" && $purcase_invoice[7]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Vehicle Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="vehicle_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 8)
                            						        @if ($purcase_invoice[8]->account_id == $account->id && $purcase_invoice[8]->field_type == "vehicle_exp" && $purcase_invoice[8]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">By Default Salesman</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_invoice->count() > 9)
                            						        @if ($purcase_invoice[9]->account_id == $account->id && $purcase_invoice[9]->field_type == "salesman" && $purcase_invoice[9]->form_type == "Purchase_invoice")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Default Contractor</label>
                        		            <input type="hidden" name="field[]" value="default_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if($purcase_invoice->count() > 10)
                            						        @if ($purcase_invoice[10]->account_id == $contractor->id && $purcase_invoice[10]->field_type == "default_contractor" && $purcase_invoice[10]->form_type == "Purchase_invoice")
                                                                <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                            @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Default Production Contractor</label>
                        		            <input type="hidden" name="field[]" value="default_production_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if($purcase_invoice->count() > 11)
                            						        @if ($purcase_invoice[11]->account_id == $contractor->id && $purcase_invoice[11]->field_type == "default_production_contractor" && $purcase_invoice[11]->form_type == "Purchase_invoice")
                                                                <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                            @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
										
                            		
                            			<div class="col-md-12">
                            			    <input type="submit" class="btn btn-primary" value="Submit"/>
                            			</div>
                            			
                    		        </div>
                    		    </div>
                        </form>
                </div>
                <div class="tab-pane" id="purchase_return">
                    <form action="{{ action('AccountController@default_acc_store') }}" method="POST">
                    	    <div class="row">
                    		        <div class="col-md-12">
                    		            @csrf
                    		            <input type="hidden" name="form_type" value="purchase_return">
                    		            
                    		            <div class="col-md-4">
                        		            <label for="acc_type">Purcase Return Account</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_account">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 0)
                            						        @if ($purcase_return[0]->account_id == $account->id && $purcase_return[0]->field_type == "sales_account" && $purcase_return[0]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Add & Less Charges </label>
                        		            
                        		            <input type="hidden" name="field[]" value="addAndlessCharges">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 1)
                            						        @if ($purcase_return[1]->account_id == $account->id && $purcase_return[1]->field_type == "addAndlessCharges" && $purcase_return[1]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">purchase Discount</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_discount">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 2)
                            						        @if ($purcase_return[2]->account_id == $account->id && $purcase_return[2]->field_type == "sales_discount" && $purcase_return[2]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Sales Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 3)
                            						        @if ($purcase_return[3]->account_id == $account->id && $purcase_return[3]->field_type == "sales_tax" && $purcase_return[3]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Further Tax</label>
                        		            
                        		            <input type="hidden" name="field[]" value="further_tax">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 4)
                            						        @if ($purcase_return[4]->account_id == $account->id && $purcase_return[4]->field_type == "further_tax" && $purcase_return[4]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Note</label>
                        		            
                        		            <input type="hidden" name="field[]" value="sales_note">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 5)
                            						        @if ($purcase_return[5]->account_id == $account->id && $purcase_return[5]->field_type == "sales_note" && $purcase_return[5]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Salesman Commission</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman_commission">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 6)
                            						        @if ($purcase_return[6]->account_id == $account->id && $purcase_return[6]->field_type == "salesman_commission" && $purcase_return[6]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Contractor Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="contractor_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 7)
                            						        @if ($purcase_return[7]->account_id == $account->id && $purcase_return[7]->field_type == "contractor_exp" && $purcase_return[7]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">Vehicle Exp</label>
                        		            
                        		            <input type="hidden" name="field[]" value="vehicle_exp">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 8)
                            						        @if ($purcase_return[8]->account_id == $account->id && $purcase_return[8]->field_type == "vehicle_exp" && $purcase_return[8]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            			<div class="col-md-4">
                        		            <label for="acc_type">By Default Salesman</label>
                        		            
                        		            <input type="hidden" name="field[]" value="salesman">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" disabled selected>Please Select</option>
                        						    @foreach($accounts as $account)
                        						        @if($purcase_return->count() > 9)
                            						        @if ($purcase_return[9]->account_id == $account->id && $purcase_return[9]->field_type == "salesman" && $purcase_return[9]->form_type == "purchase_return")
                                                                <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                                            @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $account->id }}" >{{ $account->name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>

										<div class="col-md-4">
                        		            <label for="acc_type">Default Contractor</label>
                        		            
                        		            <input type="hidden" name="field[]" value="default_contractor">
                            				<div class="form-group">
                        						<select class="form-control select2" name="account_id[]" >
                        						    <option value="" selected>Please Select</option>
                        						    @foreach($contractors as $contractor)
                        						        @if($purcase_return->count() > 10)
                            						        @if ($purcase_return[10]->account_id == $contractor->id && $purcase_return[10]->field_type == "default_contractor" && $purcase_return[10]->form_type == "purchase_return")
                                                                <option value="{{ $contractor->id }}" selected>{{ $contractor->supplier_business_name }}</option>
                                                            @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                            @endif
                                                        @else
                                                                <option value="{{ $contractor->id }}" >{{ $contractor->supplier_business_name }}</option>
                                                        @endif
                        						    @endforeach
                        						</select>
                            				</div>
                            			</div>
                            			
                            		
                            			<div class="col-md-12">
                            			    <input type="submit" class="btn btn-primary" value="Submit"/>
                            			</div>
                            			
                    		        </div>
                    		    </div>
                        </form>
                </div>
				<div class="tab-pane" id="tank">
					<form action="{{ action('AccountController@default_acc_store') }}" method="POST">
						<div class="row">
								<div class="col-md-12">
									@csrf
									<input type="hidden" name="form_type" value="tank">

									<div class="col-md-4">
										<label for="acc_type">Product Type</label>
										
										<input type="hidden" name="field[]" value="product_type">
										<div class="form-group">
											<select class="form-control select2" name="account_id[]" >
												<option value="" selected>Please Select</option>
												@foreach($product_types as $type)
													@if (isset($tank[0]) && $tank[0]->account_id == $type->id && $tank[0]->field_type == "product_type" && $tank[0]->form_type == "tank")
														<option value="{{ $type->id }}" selected>{{ $type->name }}</option>
													@else
														<option value="{{ $type->id }}" >{{ $type->name }}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>



									<div class="col-md-12">
										<input type="submit" class="btn btn-primary" value="Submit"/>
									</div>
									
								</div>
							</div>
					</form>
				</div>
            </div>
            @endcomponent
        </div>
    </div>
</div>
</section>
<!-- /.content -->
@endsection
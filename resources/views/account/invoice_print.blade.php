@extends('layouts.app')
@section('title', __('Reciept Voucher'))

@section('content')
    
    <style>
        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
    @php
        $net = 0;
    @endphp
    <div class="box-body" style="background: white;margin: 22px;">
        <section class="prnt">
            <div class="invoice-box">
                <center>
                    <h2>
                        <?php
                        if (str_contains($invoice[0]->reff_no, 'j-') || str_contains($invoice[0]->reff_no, 'J-')) {
                            echo 'Journal Voucher';
                        } elseif (str_contains($invoice[0]->reff_no, 'd-') || str_contains($invoice[0]->reff_no, 'D-')) {
                            echo 'Payment Voucher';
                        } elseif (str_contains($invoice[0]->reff_no, 'ab-') || str_contains($invoice[0]->reff_no, 'AB-')) {
                            echo 'Bank Book';
                        } elseif (str_contains($invoice[0]->reff_no, 'r-') || str_contains($invoice[0]->reff_no, 'R-')) {
                            echo 'Receipt Voucher';
                        }
                        ?>
                    </h2>
                </center>

                <div style="display: inline;">
                    <h6 style="display: inline-flex;">Voucher No: {{ $invoice[0]->reff_no }}</h6>
                    <h6 style="float: right;">Date: {{ date('Y-m-d', strtotime($invoice[0]->operation_date)) }}</h6>
                </div>
                </br>
                {{-- <!--<h6>Debit To:{{$invoice[0]->name}}</h6>
                <h6>Credit To:{{$invoice[1]->name}}</h6>--> --}}
                </br>
                </br>
                <table class="table table-bordered table-striped ajax_view">
                    <thead>
                        <tr>
                            <th style="width:100%">Particulars</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Attachment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $index = 0;
                        $colspan = 0;
                        ?>
                        <tr></tr>
                        @foreach ($invoice as $invoices)
                            <tr>
                                <td>{{ $invoices->acc_name }}</td>
                                <td>{{ $invoices->type == 'debit' ? number_format($invoices->amount) : '' }}</td>
                                <td>{{ $invoices->type == 'credit' ? number_format($invoices->amount) : '' }}</td>
                                <td>
                                    @if (str_contains($invoice[0]->reff_no, 'd-') || str_contains($invoice[0]->reff_no, 'D-')) 
                                        {{-- 'Payment voucher'; --}}
                                         @if($invoices->attachment)
                                        <a href="{{ asset("payment_voucher/{$invoices->attachment}") }}" target="_blank">View Attachment</a>
                                         @endif
                                    @elseif(str_contains($invoice[0]->reff_no, 'r-') || str_contains($invoice[0]->reff_no, 'R-'))
                                        {{-- 'Recipt voucher'; --}}
                                        @if($invoices->attachment)
                                        <a href="{{ asset("reciept_voucher/{$invoices->attachment}") }}" target="_blank">View Attachment</a>
                                         @endif
                                    @elseif(str_contains($invoice[0]->reff_no, 'ab-') || str_contains($invoice[0]->reff_no, 'Ab-') || str_contains($invoice[0]->reff_no, 'AB-'))
                                        {{-- 'Bank Book'; --}}
                                         @if($invoices->attachment)
                                        <a href="{{ asset("bank_book/{$invoices->attachment}") }}" target="_blank">View Attachment</a>
                                        @endif
                                    @elseif(str_contains($invoice[0]->reff_no, 'crv-') || str_contains($invoice[0]->reff_no, 'CRV-'))
                                        {{-- 'Cash Recipt Voucher'; --}}
                                      @if($invoices->attachment)
                                        <a href="{{ asset("reciept_voucher/{$invoices->attachment}") }}" target="_blank">View Attachment</a>
                                         @endif
                                    @elseif(str_contains($invoice[0]->reff_no, 'cpv-') || str_contains($invoice[0]->reff_no, 'CPV-'))
                                        {{-- 'Cash Payment Voucher'; --}}
                                        @if($invoices->attachment)
                                        <a href="{{ asset("payment_voucher/{$invoices->attachment}") }}" target="_blank">View Attachment</a>
                                         @endif
                                    @endif

                                </td>
                                <?php $index++;
                                $colspan++; ?>
                            </tr>
                        @endforeach
                        <!--<tr>-->
                        <!--	<td>Total</td>-->
                        <!--	<td></td>-->
                        <!--     <td>{{ $net = ($invoice_total[0]->total / 2) }}</td>-->
                        <!--</tr>-->
                    </tbody>
                </table>
                <b>Amount In Words :</b><?php echo convertNumber($net); ?>
                </br>
                </br>
                <b>Remarks:</b>
                </br>
                </br>
                <div style="display:flex;">
                    <div style="width:30%;">
                        <h5 style="width:30%;border-top:1px solid black;padding:0px 123px  0px 30px;">
                            Accounts
                        </h5>
                    </div>
                    <div style="width:35%;">
                        <h5 style="width:30%;border-top:1px solid black;padding:0px 150px  0px 30px;">
                            PROP/CEO//Direction
                        </h5>
                    </div>
                    <div style="width:30%;">
                        <h5 style="width:30%;border-top:1px solid black;padding:0px 123px  0px 30px;">
                            RECEIVE/SIGN
                        </h5>
                    </div>
                </div>
                
            </div>
        </section>
        <input style="padding:5px;" class="btn btn-primary no-print" value="Print Voucher" type="button" onclick="myFunction()">
    </div>
@endsection

<script>
    function myFunction() {
        window.print();
    }
</script>
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
<style media="print">
    @page {
        size: auto;
        margin: 0;
    }
</style>

<?php function convertNumber($num = false){
    $num = str_replace([',', ''], '', trim($num));
    if (!$num) {
        return false;
    }
    $num = (int) $num;
    $words = [];
    $list1 = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    $list2 = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred'];
    $list3 = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'];
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = $hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : '') . ' ' : '';
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
            $tens = $tens ? ' and ' . $list1[$tens] . ' ' : '';
        } elseif ($tens >= 20) {
            $tens = (int) ($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ($levels && (int) $num_levels[$i] ? ' ' . $list3[$levels] . ' ' : '');
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $words = implode(' ', $words);
    $words = preg_replace('/^\s\b(and)/', '', $words);
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words . '.';
    return $words;
} ?>

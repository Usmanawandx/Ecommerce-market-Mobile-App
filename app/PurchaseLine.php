<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseLine extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    public function transaction()
    {
        return $this->belongsTo(\App\Transaction::class);
    }

    public function purchasetransaction()
    {
        return $this->belongsTo(\App\Transaction::class, 'transaction_id')->where('type', 'Purchase_invoice');
    }
    public function purchaseReturntransaction()
    {
        return $this->belongsTo(\App\Transaction::class, 'transaction_id')->where('type', 'purchase_return');
    }
    public function brand()
    {
        return $this->belongsTo(\App\Brands::class, 'brand_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class, 'product_id');
    }

    public function variations()
    {
        return $this->belongsTo(\App\Variation::class, 'variation_id');
    }

    /**
     * Set the quantity.
     *
     * @param  string  $value
     * @return float $value
     */
    public function getQuantityAttribute($value)
    {
        return (float)$value;
    }

    /**
     * Get the unit associated with the purchase line.
     */
    public function sub_unit()
    {
        return $this->belongsTo(\App\Unit::class, 'sub_unit_id');
    }

    /**
     * Give the quantity remaining for a particular
     * purchase line.
     *
     * @return float $value
     */
    public function getQuantityRemainingAttribute()
    {
        return (float)($this->quantity - $this->quantity_used);
    }

    /**
     * Give the sum of quantity sold, adjusted, returned.
     *
     * @return float $value
     */
    public function getQuantityUsedAttribute()
    {
        return (float)($this->quantity_sold + $this->quantity_adjusted + $this->quantity_returned + $this->mfg_quantity_used);
    }

    public function line_tax()
    {
        return $this->belongsTo(\App\TaxRate::class, 'tax_id');
    }
    
    public function further_taxs()
    {
        return $this->belongsTo(\App\TaxRate::class, 'further_tax');
    }

    public function purchase_order_line()
    {
        return $this->belongsTo(\App\PurchaseLine::class, 'purchase_order_line_id');
    }
}

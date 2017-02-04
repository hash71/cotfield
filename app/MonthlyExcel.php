<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyExcel extends Model
{
    protected $guarded = ['id'];

    public function setImporterAttribute($value)
    {
        $this->attributes['importer'] = trim(strtolower($value));
    }

    public function setExporterAttribute($value)
    {
        $this->attributes['exporter'] = trim(strtolower($value));
    }

    public function setExporterOriginAttribute($value)
    {
        $this->attributes['exporter_origin'] = trim(strtolower($value));
    }

    public function setProductOriginAttribute($value)
    {
        $this->attributes['product_origin'] = trim(strtolower($value));
    }

    public function setGradeTypeAttribute($value)
    {
        $this->attributes['grade_type'] = trim(strtolower($value));
    }

    public function setStapleAttribute($value)
    {
        $value = strtolower($value);
        $this->attributes['staple'] = trim(preg_replace('/\s+/', '', $value));
    }

    public function setMicAttribute($value)
    {
        $value = strtolower($value);
        $this->attributes['mic'] = trim(preg_replace('/\s+/', '', $value));
    }

    public function setQtyMtAttribute($value)
    {
        $value = explode('.', $value);
        $this->attributes['qty_mt'] = $value[0];
    }

    public function setPortAttribute($value)
    {
        $this->attributes['port'] = trim(strtolower($value));
    }

    public function setMonthAttribute($value)
    {
        $this->attributes['month'] = (int)$value;
    }

    public function setYearAttribute($value)
    {
        $this->attributes['year'] = (int)$value;
    }


}

<?php

namespace App;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $guarded = ['id'];

//    public function setContractDateAttribute($value)
//    {
//        $this->attributes['contract_date'] = \DateTime::createFromFormat("d-m-Y", $value)->format("Y-m-d");
//    }


    public function getContractDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getPILatestDateOfLcOpeningAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getPILatestDateOfShipmentAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getLcDateOfIssueAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getIpDateAttribute($value)
    {

        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getIpExpiryDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getSroDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getEtaDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }


}

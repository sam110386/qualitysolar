<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadSurvey extends Model
{
    //use SoftDeletes;

    public $table = 'lead_surveys';

    protected $dates = [
        'created_at',
        'updated_at',
        'inspection_date',
    ];

    protected $fillable = [
        'lead_id',
        'created_at',
        'updated_at',
        'customer_name',
        'address',
        'permit_no',
        'inspection_date',
        'inspection_completed',
        'inspector_name',
        'charger_completion_of_installation',
        'how_use_charger',
        'demonstrate_charger',
        'interested_service_contract',
        'surveyed_name',
        'phone',
        'email',
        'detail',
        'charger_installed_image',
        'electrical_panel_image',
        'exterior_property_image',
        'permit_image',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}

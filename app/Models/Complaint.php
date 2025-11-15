<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'transaction_id',
        'last_name',
        'first_name',
        'complaint_type',
        'description',
        'date_filed',
        'status',
    ];
}

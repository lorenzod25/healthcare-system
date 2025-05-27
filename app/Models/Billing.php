<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    
protected $fillable = [
    'appointment_id',
    'amount',
    'status',
    'payment_method',
    'billing_date',
];



    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}

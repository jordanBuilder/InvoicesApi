<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;
    //fillable definit quels attributs peuvent être assignés en masse dans les methodes qu'on utilise pout agir sur la BD
    // si on ne met pas fillable, les attributs du model ne pourront pas être assignées en masse genre ça là:
    // User::create([
    // 'name' => "JordanBuilder",
    // 'age' => 25,
    //])
    //on pourra pas faire

    // mais on pourra toujours faire l'assignation individuelle
    //$post->name = "jordanBuilder"

    protected $fillable = [
        "invoice_number",
        "total_vat",
        "total_price_excluding_vat",
        "total_price",
        "user_id"
    ];

    protected $casts = [
        //on caste en decimal avec 2 chiffres après la virgule
        "total_vat" =>'decimal:2',
        "total_price_excluding_vat" => 'decimal:2',
        "total_price" => 'decimal:2',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}


<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $invoiceModel = Invoice::class;

    public function definition(): array
    {

        return [
            //
            "invoice_number" => $this->faker->unique()->randomNumber(8),
            "total_vat" => $this->faker->numberBetween(2,0,1000)/100,
            "total_price_excluding_vat" => $this->faker->numberBetween(2,0,1000)/100,
            "total_price" => $this->faker->numberBetween(2,0,1000)/100,

        ];
    }
}

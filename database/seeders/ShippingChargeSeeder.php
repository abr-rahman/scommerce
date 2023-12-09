<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
    {
        $shippings = array(
            array('id' => '1','division_id' => '1','district_id' => '1', 'charge' => '120'),
            array('id' => '2','division_id' => '1','district_id' => '2', 'charge' => '120'),
            array('id' => '3','division_id' => '1','district_id' => '3', 'charge' => '120'),
            array('id' => '4','division_id' => '1','district_id' => '4', 'charge' => '120'),
            array('id' => '5','division_id' => '1','district_id' => '5', 'charge' => '120'),
            array('id' => '6','division_id' => '1','district_id' => '6', 'charge' => '120'),
            array('id' => '7','division_id' => '1','district_id' => '7', 'charge' => '120'),
            array('id' => '8','division_id' => '1','district_id' => '8', 'charge' => '120'),
            array('id' => '9','division_id' => '1','district_id' => '9', 'charge' => '120'),
            array('id' => '10','division_id' => '1','district_id' => '10', 'charge' => '120'),
            array('id' => '11','division_id' => '1','district_id' => '11', 'charge' => '120'),
            array('id' => '12','division_id' => '2','district_id' => '12', 'charge' => '120'),
            array('id' => '13','division_id' => '2','district_id' => '13', 'charge' => '120'),
            array('id' => '14','division_id' => '2','district_id' => '14', 'charge' => '120'),
            array('id' => '15','division_id' => '2','district_id' => '15', 'charge' => '120'),
            array('id' => '16','division_id' => '2','district_id' => '16', 'charge' => '120'),
            array('id' => '17','division_id' => '2','district_id' => '17', 'charge' => '120'),
            array('id' => '18','division_id' => '2','district_id' => '18', 'charge' => '120'),
            array('id' => '19','division_id' => '2','district_id' => '19', 'charge' => '120'),
            array('id' => '20','division_id' => '3','district_id' => '20', 'charge' => '120'),
            array('id' => '21','division_id' => '3','district_id' => '21', 'charge' => '120'),
            array('id' => '22','division_id' => '3','district_id' => '22', 'charge' => '120'),
            array('id' => '23','division_id' => '3','district_id' => '23', 'charge' => '120'),
            array('id' => '24','division_id' => '3','district_id' => '24', 'charge' => '120'),
            array('id' => '25','division_id' => '3','district_id' => '25', 'charge' => '120'),
            array('id' => '26','division_id' => '3','district_id' => '26', 'charge' => '120'),
            array('id' => '27','division_id' => '3','district_id' => '27', 'charge' => '120'),
            array('id' => '28','division_id' => '3','district_id' => '28', 'charge' => '120'),
            array('id' => '29','division_id' => '3','district_id' => '29', 'charge' => '120'),
            array('id' => '30','division_id' => '4','district_id' => '30', 'charge' => '120'),
            array('id' => '31','division_id' => '4','district_id' => '31', 'charge' => '120'),
            array('id' => '32','division_id' => '4','district_id' => '32', 'charge' => '120'),
            array('id' => '33','division_id' => '4','district_id' => '33', 'charge' => '120'),
            array('id' => '34','division_id' => '4','district_id' => '34', 'charge' => '120'),
            array('id' => '35','division_id' => '4','district_id' => '35', 'charge' => '120'),
            array('id' => '36','division_id' => '5','district_id' => '36', 'charge' => '120'),
            array('id' => '37','division_id' => '5','district_id' => '37', 'charge' => '120'),
            array('id' => '38','division_id' => '5','district_id' => '38', 'charge' => '120'),
            array('id' => '39','division_id' => '5','district_id' => '39', 'charge' => '120'),
            array('id' => '40','division_id' => '6','district_id' => '40', 'charge' => '120'),
            array('id' => '41','division_id' => '6','district_id' => '41', 'charge' => '120'),
            array('id' => '42','division_id' => '6','district_id' => '42', 'charge' => '120'),
            array('id' => '43','division_id' => '6','district_id' => '43', 'charge' => '120'),
            array('id' => '44','division_id' => '6','district_id' => '44', 'charge' => '120'),
            array('id' => '45','division_id' => '6','district_id' => '45', 'charge' => '120'),
            array('id' => '46','division_id' => '6','district_id' => '46', 'charge' => '120'),
            array('id' => '47','division_id' => '6','district_id' => '47', 'charge' => '120'),
            array('id' => '48','division_id' => '6','district_id' => '48', 'charge' => '120'),
            array('id' => '49','division_id' => '6','district_id' => '49', 'charge' => '120'),
            array('id' => '50','division_id' => '6','district_id' => '50', 'charge' => '120'),
            array('id' => '51','division_id' => '6','district_id' => '51', 'charge' => '120'),
            array('id' => '52','division_id' => '6','district_id' => '52', 'charge' => '120'),
            array('id' => '53','division_id' => '7','district_id' => '53', 'charge' => '120'),
            array('id' => '54','division_id' => '7','district_id' => '54', 'charge' => '120'),
            array('id' => '55','division_id' => '7','district_id' => '55', 'charge' => '120'),
            array('id' => '56','division_id' => '7','district_id' => '56', 'charge' => '120'),
            array('id' => '57','division_id' => '7','district_id' => '57', 'charge' => '120'),
            array('id' => '58','division_id' => '7','district_id' => '58', 'charge' => '120'),
            array('id' => '59','division_id' => '7','district_id' => '59', 'charge' => '120'),
            array('id' => '60','division_id' => '7','district_id' => '60', 'charge' => '120'),
            array('id' => '61','division_id' => '8','district_id' => '61', 'charge' => '120'),
            array('id' => '62','division_id' => '8','district_id' => '62', 'charge' => '120'),
            array('id' => '63','division_id' => '8','district_id' => '63', 'charge' => '120'),
            array('id' => '64','division_id' => '8','district_id' => '64', 'charge' => '120')
        );

        DB::table('shippings')->insert($shippings);
    }
}

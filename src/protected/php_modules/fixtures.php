<?php
require_once '/var/www/vendor/autoload.php';

function generate_data(){
    $data = [];
    $faker = Faker\Factory::create('en_EN');

    for ($i = 0; $i < 50; $i++) {
        $data[] = [
            "name" => $faker->name,
            "age" => $faker->numberBetween(10,80),
            "cheque" => $faker->randomElement(array("0-1000", "1000-2000", "2000-5000", "5000+")),
            "tips" => $faker->randomElement(array("0%", "0%-10%", "10%+")),
            "day" => $faker->dayOfWeek
        ];
    }

    return $data;
}

?>
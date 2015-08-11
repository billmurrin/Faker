<?php

require_once 'src/autoload.php';

$faker = new Faker\Generator();
$faker->addProvider(new \Faker\Provider\Computer($faker));

echo "Random manufacturer\n";
echo $faker->systemManufacturer;
echo "\n\n";
echo "No manufacturer specified\n";
echo $faker->systemModel;
echo "\n\n";
echo "Specific Manufacturer Specified (Alienware)\n";
echo $faker->systemModel('Alienware');
echo "\n\n";
echo "Bogus Manufacturer Specified\n";
echo $faker->systemModel('Windooo');
echo "\n\n";
echo "Specific Manu and Type Specified (Dell, Laptop)\n";
echo $faker->systemModel('Dell', 'Laptop');
echo "\n\n";
echo "No manufacturer and bogus type ('', 'iPod')\n";
echo $faker->systemModel('', 'iPod');
echo "\n\n";
echo "Here are a few serial numbers for you\n";
echo $faker->serialNumber . "\n";
echo $faker->serialNumber . "\n";
echo $faker->serialNumber . "\n";
echo $faker->serialNumber . "\n";
echo $faker->serialNumber . "\n";
?>
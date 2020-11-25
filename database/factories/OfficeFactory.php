<?php

use Faker\Generator as Faker;

$factory->define(App\Office::class, function (Faker $faker) {
     return [
        'name' => $faker->name,
        'address'=>$faker->sentence(4),
        'postalCode' => $faker->numerify('#####'),
        'city'=> $faker->sentence(2),
        'country'=> $faker->sentence(1),
        'map'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29885.120444916156!2d-103.3366956!3d20.5619032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b32ccd34cd57%3A0x48ccedd3ba89ef28!2sAtlas%20Country%20Club!5e0!3m2!1ses!2smx!4v1598065336987!5m2!1ses!2smx" width="600" height="450" frameborder="0" style="border:0;" aria-hidden="false" tabindex="0"></iframe>'
      ];
});

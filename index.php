<?php
require_once './vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create();

require_once './vendor/autoload.php';
$loader = new Twig_Loader_Array(array(
    'companyName' => $faker->company,
    'logo' => $faker->imageUrl,
    'catchPhrase' => $faker->catchPhrase,
    'productAdjective' => $faker->word,
    'productName' => $faker->word,
    'productMaterial' => $faker->sentence,
    'price' => $faker->numberBetween($min = 10, $max = 99),
    'url' => $faker->url,
    'color' => $faker->safeColorName,
    'userName' => $faker->name,
    'photo' => $faker->imageUrl($width=200, $height=200, 'cats'),
    'job' => $faker->jobTitle,
    'email' => $faker->freeEmail,
    'phone' => $faker->e164PhoneNumber,
    'adressNbr' => $faker->buildingNumber,  
    'adressStreet' => $faker->streetName,    
    'adressPost' => $faker->postcode,    
    'adressCity' => $faker->city
));

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>PHP Templating</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- Semantic-ui CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css" rel="stylesheet" crossorigin="anonymous">
        <!-- CSS Reset -->
        <link href="css/knacss.css" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <div class="ui grid">
        <div class="ten wide column">
        <?php
            $company = new Twig_Environment($loader);
                echo '<h1>'.$company->render('companyName').'</h1>
                    <h4>'.$company->render('catchPhrase').'</h4>
                    <p>At '.$company->render('companyName').', we create<br>'
                    .$company->render('productAdjective').' '
                    .$company->render('productName').' made of '
                    .$company->render('productMaterial').'<br>
                    <a href="'.$company->render('url').'" target="_blank">Find out more on</a>';
        ?>
        <?php
            $companyCard = new Twig_Environment($loader);
                echo '<div class="ui card company">
                    <div class="image"> 
                    <img src="'.$companyCard->render('logo').'"></div>
                    <div class="content">
                    <span class="header">'.$company->render('productName').'</span>
                    <div class="description">
                    <p>Material: '.$company->render('productMaterial').'</p>
                    <p>Color: '.$company->render('color').'</p><br></div>
                    <span class="header">$'.$company->render('price').' Only!</span></div>
                    <div class="extra content">
                    <button class="ui button">Take my money</button>       
                    </div>';
        ?>                    
            </div>
        </div>
            
        <div class="six wide column">
            <div class="ui card">
            <?php
            $userCard = new Twig_Environment($loader);
                echo '<div class="image">
                    <img src="'.$userCard->render('photo').'" id="userImg"></div>
                    <div class="content">
                    <span class="header">'.$userCard->render('userName').'</span><br>
                    <span class="header">'.$userCard->render('job').'</span><br>
                    <strong>Contact info</strong><br>
                    <p>'.$userCard->render('email').'</p>
                    <p>'.$userCard->render('phone').'</p>
                    <p>'.$userCard->render('adressNbr').', '
                    .$userCard->render('adressStreet').'</p>'
                    .$userCard->render('adressPost').' '
                    .$userCard->render('adressCity').'</p>
                    </div>';
            ?>        
                </div>
            </div>
        </div>
   
    </body>

    </html>
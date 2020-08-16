<?php
require __DIR__ . "../../vendor/autoload.php";

//verification de l'existance du nom de la ville dans le post
if(!isset($_POST['ville']) || empty($_POST['ville'])){
  echo "<p class=\"error_meteo\">ville invalide</p>";
	exit;
}

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?q='.$_POST['ville'].'&lang=fr&appid=cf75fc0a5c64cdc036d02b971d4f9b69&units=metric');

//echo $response->getStatusCode(); // 200
//echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.

$test = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);

//dump($test);
for ($i=0; $i< 9; $i++){
  $meteos=[];
  foreach ($test['list'][$i] as $name => $value){

    if ($name==="weather"){
      $meteos["weather"]=$value[0]['description'];
    }

    if ($name==="dt_txt"){
      $meteos["date"]=$value[0]['dt_txt'];
    }

      if ($name==="main"){
        $meteos['temp']=$value['temp'];
      }
      if ($name==="main"){
        $meteos['temp_min']=$value['temp_min'];
      }
      if ($name==="main"){
        $meteos['temp_max']=$value['temp_max'];
      }
      if ($name==="main"){
        $meteos['pressure']=$value['pressure'];
      }
      if ($name==="main"){
        $meteos['humidity']=$value['humidity'];
      }

      if ($name==="wind"){
          $meteos["wind"]=$value["speed"]*3.6;
      }
      if ($name ==="dt_txt"){
          $meteos["date"]=$value;
      }
    /*echo $test['main']['temp'];echo " ";
    echo $test['main']['feels_like'];echo " ";
    echo $test['main']['temp_min'];echo " ";
    echo $test['main']['temp_max'];echo " ";
    echo $test['main']['pressure'];echo " ";
    echo $test['main']['humidity'];echo " ";
    echo $test['wind']['speed'];echo " ";
    echo $test['sys']['country'];*/
  }

  //var_dump($meteos);
  echo($meteos["date"]." ".$meteos["wind"]."km/h ".$meteos["temp"]."°C ".$meteos["temp_min"]."°C min ".$meteos["temp_max"]."°C max ".$meteos["pressure"]." pression ".$meteos["humidity"]. " humidité ".$meteos["weather"]."</br>");
}

?>

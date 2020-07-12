<?php
// An example of OOP in php
// Visit the blog post at ...
declare(strict_types = 1);

/**
 *  A base class for beverage
 */
class AlcoholicBeverage
{
  protected  $brand;
  protected  $origin;
  protected  $alcoholicGraduation;
  protected  $ml;
  protected  $price;
  //  Constructor initializes attributes
  function __construct(
                      string $brand,
                      string $origin,
                      float $alcoholicGraduation,
                      float $ml,
                      float $price
  ){
    $this->brand = $brand;
    $this->origin = $origin;
    $this->alcoholicGraduation = $alcoholicGraduation;
    $this->ml = $ml;
    $this->price = $price;
  }

  // Get all the data in an associative array
  public function getAllData()
  {
    return array(
      "brand"=>$this->brand,
      "origin"=>$this->origin,
      "graduation"=>$this->alcoholicGraduation,
      "ml"=>$this->ml,
      "price"=>$this->price
    );
  }
}

/**
 *  A class extending the basic one, with just one extra attribute
 */
class Beer extends AlcoholicBeverage
{
  private $type;
  function __construct(
                      string $brand,
                      string $origin,
                      float $alcoholicGraduation,
                      float $ml,
                      float $price,
                      string $type
  ){
    parent::__construct(
       $brand,
       $origin,
       $alcoholicGraduation,
       $ml,
       $price
     );
    $this->type = $type;
  }
  // Overrides inherited method
  public function getAllData()
  {
    $data = parent::getAllData();
    $data += [ "type" => $this->type ];
    return $data;
  }
}

/**
 *  A class extending the basic one, with just one extra attribute
 */
class Wine extends AlcoholicBeverage
{
  private $grape;
  function __construct(
                      string $brand,
                      string $origin,
                      float $alcoholicGraduation,
                      float $ml,
                      float $price,
                      string $grape
  ){
    parent::__construct(
       $brand,
       $origin,
       $alcoholicGraduation,
       $ml,
       $price
     );
    $this->grape = $grape;
  }

  // Overrides inherited method
  public function getAllData()
  {
    // Call the parent method.
    // A variation in one line
    $data = parent::getAllData()+[ "grape" => $this->grape ];
    return $data;
  }
}

// crete some instances

// A Beer
$lager = new Beer("Stella Artois","Belgium",4.8, 970.0, 100, "lager");
// var_dump($lager);
$lagerData = $lager->getAllData();
// var_dump($lagerData);

// A Wine
$malbec = new Wine("San Felipe", "Argentina", 7.5, 870, 250, "malbec");
// var_dump($malbec);
$malbecData = $malbec->getAllData();
// var_dump($malbecData);

// Traverse the data array
// foreach ($lagerData as $key => $value) {
//   echo "$key : $value<br>";
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP OOP</title>
    <style media="screen">
      body { background: lightgrey;}
      h1 { font-family: sans-serif;}
      .card {
        margin: 10px;
        padding: 5px;
        box-sizing: border-box;
        border: 1px solid navy;
      }
      th {
        background: dodgerblue;
        font-family: sans-serif;
        font-weight: bold;
        font-size: 1.2rem;
        text-transform: uppercase;
      }
      tr {
        background: #eaeaff;
      }
      tr:hover {
        background-color: #f8f8f8;
        color:black;
      }
      td {
        padding: 10px 7px;
      }
    </style>
  </head>
  <body>
    <h1>Php Object Oriented Programming</h1>
    <table class="card">
      <tr>
        <th>key</th>
        <th>value</th>
      </tr>
      <tbody>
          <?php foreach ($lagerData as $key => $value): ?>
            <tr>
              <td><?=$key?></td>
              <td><?=$value?></td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>

<?php
$host = 'localhost';
$username = 'lab5_user';
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$Country= $_GET['country'];
$Context = $_GET['context'];

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$Country%'");
$cities = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$Country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$queryCity= $cities->fetchAll(PDO::FETCH_ASSOC);

<?php if ($context != "cities"):?>
  <table>
      <thead>
        <tr>
          <th><?= "Name of Country"?></th>
          <th><?= "Continet"?></th>
          <th><?= "Year of Independence"?></th>
          <th><?= "Head of State"?></th>
        </tr>
      </thead>
      <tbody> 

<?php foreach ($Country as $location):?>
  <tr>
          <td><?= $location['name']?></td>
          <td><?= $location['continent']?></td>
          <td><?= $location['independence_year']?></td>
          <td><?= $location['head_of_state']?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
<?php else:?>
  <table>
      <thead>
        <tr>
          <th><?= "Name"?></th>
          <th><?= "District"?></th>
          <th><?= "Population"?></th>
        </tr>
      </thead>
      <tbody> 

  <?php foreach ($queryCity as $area): ?>
        <tr>
          <td><?= $area['name']?></td>
          <td><?= $area['district']?></td>
          <td><?= $area['population']?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <?php endif?>

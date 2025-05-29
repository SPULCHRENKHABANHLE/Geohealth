
<?php
require '../session/session_check.php';
require '../includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM hospitals WHERE id = ?");
$stmt->execute([$id]);
$hospital = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Hospital Status</title>
  <style>
    /* Base Styles */
    body {
      font-family: Arial, sans-serif;
      background-color:rgba(40, 40, 41, 0.44);
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #007BFF;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Responsive Styles */
    @media (max-width: 600px) {
      .form-container {
        padding: 15px;
      }

      button[type="submit"] {
        padding: 10px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <h2>Update Hospital Status</h2>
  <div class="form-container">
    <form action="../api/hospital_crud.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($hospital['id']) ?>">
      
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($hospital['name']) ?>" required>
      </div>

      <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" value="<?= htmlspecialchars($hospital['latitude']) ?>" required>
      </div>

      <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" value="<?= htmlspecialchars($hospital['longitude']) ?>" required>
      </div>

      <div class="form-group">
        <label for="doctors">Doctors:</label>
        <input type="number" id="doctors" name="doctors" value="<?= htmlspecialchars($hospital['doctors']) ?>" required>
      </div>

      <div class="form-group">
        <label for="medications">Medications:</label>
        <input type="text" id="medications" name="medications" value="<?= htmlspecialchars($hospital['medications']) ?>" required>
      </div>

      <div class="form-group">
        <label for="wards_occupied">Wards Occupied:</label>
        <input type="number" id="wards_occupied" name="wards_occupied" value="<?= htmlspecialchars($hospital['wards_occupied']) ?>" required>
      </div>

      <div class="form-group">
        <label for="wards_total">Wards Total:</label>
        <input type="number" id="wards_total" name="wards_total" value="<?= htmlspecialchars($hospital['wards_total']) ?>" required>
      </div>

      <div class="form-group">
        <label for="ambulances">Ambulances:</label>
        <input type="number" id="ambulances" name="ambulances" value="<?= htmlspecialchars($hospital['ambulances']) ?>" required>
      </div>

      <button type="submit" name="update">Update</button>
    </form>
  </div>
</body>
</html>
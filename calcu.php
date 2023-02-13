<?php
  $message = "";
  function add($x, $y){
    return $x + $y;
  }
  function subtract($x, $y){
    return $x - $y;
  }
  function multiply($x, $y){
    return $x * $y;
  }
  function divide($x, $y){
    return $x / $y;
  }

  function calculate()
  {
    $do_add = isset($_POST['add']);
    $do_subtract = isset($_POST['subtract']);
    $do_multiply = isset($_POST['multiply']);
    $do_divide = isset($_POST['divide']);
    if ($do_add || $do_subtract || $do_multiply || $do_divide) {
      if (!isset($_POST['num1']) || !isset($_POST['num2'])) {
        return "";
      }
      $x = $_POST['num1'];
      $y = $_POST['num2'];
      if (!is_numeric($x)) {
        return "Your first number isn't a number.";
      }
      if (!is_numeric($y)) {
        return "Your second number isn't a number.";
      }

      if ($do_add) {
        return add($x, $y);
      }
      if ($do_subtract) {
        return subtract($x, $y);
      }
      if ($do_multiply) {
        return multiply($x, $y);
      }
      if ($do_divide) {
        if ($y == 0) {
          return "Division by zero is undefined.";
        }
        return divide($x, $y);
      }
    }
    return "";
  }

  $message = calculate()
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100" style="flex-direction: column;">
      <form action="" method="POST" name="calculator-form"/>
      <div class="mb-3">
        <label for="first-operand" class="form-label">First Operand</label>
        <input id="first-operand" class="form-control" type="number" name="num1" placeholder="0" required/>
      </div>
      <br>
        <div class="mb-3">
          <label for="second-operand" class="form-label">Second Operand</label>
          <input id="second-operand" class="form-control" type="number" name="num2" placeholder="0" required/>
        </div>
      <br>
        <div style="text-align: center;">
          <input name="add" value="+" type="submit" class="btn btn-primary"/>
          <input name="subtract" value="-" type="submit" class="btn btn-primary"/>
          <input name="multiply" value="*" type="submit" class="btn btn-primary"/>
          <input name="divide" value="/" type="submit" class="btn btn-primary"/>
        </div>
        <br>
        <div style="text-align: center">
          <br>
          <?php echo $message?>
        </div>
    </div>
    </div>
</body>
</html>


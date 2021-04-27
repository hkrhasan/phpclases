<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <div class="mt-5 mb-5">
        <h1>Student Registration</h1>
    </div>
    <div class="mb-3">
        <form action="#" method="post">
            <label for="exampleFormControlInput1" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Student name" name="name">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Result</label>
            <select class="form-select" aria-label="Default select example" name="result">
                <option value="">------</option>
                <option value="comp">Comp</option>
                <option value="pass">Pass</option>
                <option value="fail">fail</option>
            </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Submit" name="submit">
            </div>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $result = $_POST['result'];
                
                // missing value check
                if(!$name || !$result){
                    $missing = !$name ? "Name" : "Result";
                    // if(!$name){
                    //     $missing = "name";
                    // } else {
                    //     $missing = "Result";
                    // }

                    echo '
                    <div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>'.$missing.'!</strong> is Required.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';

                    die();
                }

                include './conn.php';
                
                if(!$conn){
                    echo '
                    <div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>DATABASE!</strong> not connected.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';

                    die();
                }

                try {
                    
                    $sql = "INSERT INTO student (name, result) VALUES (?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$name, $result]);
                    
                    echo '
                    <div class="mt-5 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Submit</strong> successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';

                    $conn = null;

                } catch (\Throwable $th) {
                    echo '
                    <div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sumething </strong> went wrong.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                }

                
            }
        
        ?>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>

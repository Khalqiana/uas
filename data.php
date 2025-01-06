<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .container {
            margin: 0 auto;
            padding: 100px;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
    
</script>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="text-warning">Flower</span>Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="data.php">Data</a>

            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/toko_bunga/create.php" role="button">New Client</a>
        <br><br>
        <!-- <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="pencarian . . ."> -->
        <br>
        <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" id="live_search" autocomplete="off" placeholder="Pencari" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                
                </form>
        <table class="table">
            <thead>
            <div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    // ganti iki
        $("#live_search").keyup(function(){

            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({

                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");
                    }
                });
            }else{

                $("#searchresult").css("display","none");                    
            }
        });
    });
</script>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Bunga</th>
                    <th>Nomer Telepon</th>
                    <th>Alamat</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "toko";

                // Create connection 
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection 
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // read all row from database table
                $sql = "SELECT * FROM data";
                $result = $connection->query($sql);

                if (!$result) {
                    die("invalid query: " . $connection->error);
                }

                // read data of each row 
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[no]</td>
                    <td>$row[nama]</td>
                    <td>$row[jenis_bunga]</td>
                    <td>$row[nomer_telepon]</td>
                    <td>$row[alamat]</td>
                    <td>$row[created_at]</td>

                    <td>
                        <a class='btn btn-primary btn-sm' href='/toko_bunga/edit.php?no=$row[no]'>Edit</a>
                        <a class= 'btn btn-danger btn-sm' href='/toko_bunga/delete.php?no=$row[no]'>Delete</a>
                    </td>
                </tr>
                ";
                }
                ?>

            </tbody>
        </table>
    </div>

    

</body>

</html>
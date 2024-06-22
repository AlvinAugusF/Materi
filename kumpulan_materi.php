LOOPS
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercise Loops</title>
<link rel="stylesheet" href="exercise02.css">
</head>
<body>

<div class="container">
  <div class="card">
    <div class="large-text">Latihan Soal 01</div>
    <div class="middle-text">
        <?php
            for ($i = 1; $i <= 30; $i++) {
                if ($i % 2 != 0) {
                        echo "<div class='middle-text-item'>$i</div>";
                }
            }
        ?>
    </div>
    <div class="small-text">Buat kodingan looping yang menampilkan angka ganjil dari angka 1 sampai 30</div>
  </div>

  <div class="card">
    <div class="large-text">Latihan Soal 02</div>
    <div class="middle-text">
        <?php
            for ($i = 1; $i <= 30; $i++) {
                if ($i % 2 == 0) {
                        echo "<div class='middle-text-item'>$i</div>";
                }
            }
        ?>
    </div>
    <div class="small-text">Buat kodingan looping yang menampilkan angka genap dari angka 1 sampai 30</div>
  </div>

  <div class="card">
    <div class="large-text">Latihan Soal 03</div>
    <div class="middle-text">
        <?php
            for ($i = 1; $i <= 30; $i++) {
                if ($i % 2 != 0) {
                    if($i == 9 || $i == 19 || $i == 29){
                        continue;
                    }else{
                        echo "<div class='middle-text-item'>$i</div>";
                    }
                       
                }
            }
        ?>
    </div>
    <div class="small-text">Dari kodingan angka ganjil setiap angka yang mengandung angka 9 tidak boleh ditampilkan</div>
  </div>

  <div class="card">
    <div class="large-text">Latihan Soal 04</div>
    <div class="middle-text">
        <?php
            for ($i = 1; $i <= 30; $i++) {
                if ($i % 2 == 0) {
                    if($i == 24){
                        break;
                    }else{
                        echo "<div class='middle-text-item'>$i</div>";
                    }
                       
                }
            }
        ?>
    </div>
    <div class="small-text">Dari kodingan angka genap hentikan looping pada angka 22</div>
  </div>
</div>

</body>
</html>


CONDITIONAL STATEMENTS
<body>
    <h1>
    <?php
        for($x = 0; $x < 10; $x++){
            if($x == 6){
                continue; // skip kondisi if
            }else{
                echo"balonku ada : $x <br>";
            }
        }
    ?>
    </h1>
    <h1>
    <?php
        for($x = 0; $x < 10; $x++){
            if($x == 7){
                break; // berhenti pada kondisi if
            }else{
                echo"balonku ada : $x <br>";
            }
        }
    ?>
    </h1>

    <?php
    $a = 1;
    $b = 5;
    $c = 10;
    $d = 19;
    $e = 45;
    $nama = "Jason Himendrian Hofendi";
    $umur = 21;
    $selisih_umur = $d-21;

    // kodingan soal nomor 1
    if($a <= 1){
      $hasil1 = "a adalah bayi <br>";
    } else{
      $hasil1 = "data salah";
    }

    // kodingan soal nomor 2
    if($b < $c){
      echo"b adalah balita <br>";
    } else{
      echo"data salah";
    }

    //kodingan soal nomor 3
    if($d > $c){
      echo "d bukan anak-anak lagi ";
      if ($d<$e){
        echo "dia sudah masuk masa remaja <br>";
      }
      else{
        echo"data salah";
      }
    }

    //kodingan soal nomor 4
    if(($umur > $b)&&($umur > $c)){
      echo"saya $nama";
      if(($umur < $e) && ($umur < $d)){
        echo" sudah memasuki masa remaja karena saya telah berumur $umur tahun dan akan memasuki masa dewasa dalam $selisih_umur tahun lagi";
      } else{
        echo" Sudah Dewasa";
      }
    }
  ?>
    
</body>


READ DATA
<table>
      <thead>
        <tr>
          <th>nama_kolom_pertama</th>
          <th>nama_kolom_kedua</th>
          <th>nama_kolom_ketiga</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $sql = "SELECT * FROM `nama_tabel_database_kalian`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row["nama_kolom_pertama_sesuai_dengan_nama_pada_database"] ?></td>
                    <td><?php echo $row["nama_kolom_kedua_sesuai_dengan_nama_pada_database"] ?></td>
                    <td><?php echo $row["nama_kolom_ketiga_sesuai_dengan_nama_pada_database"] ?></td>
                </tr>
        <?php
            }
        ?>
      </tbody>
 </table>

 <div class="container">
      <div class="card-container">
         <?php
         $sql = "SELECT * FROM `nama_tabel`";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
         ?>
            <div class="card">
               <div class="card-body">
                  <p class="card-title"><?php echo $row["nama_kolom_pertama_sesuai_dengan_nama_pada_database"]?></p>
                  <div class="card-content">
                     <h5><?php echo $row["nama_kolom_kedua_sesuai_dengan_nama_pada_database"] ?></h5>
                     <p><?php echo $row["nama_kolom_ketiga_sesuai_dengan_nama_pada_database"] ?></p>
                  </div>
               </div>
            </div>
         <?php
         }
         ?>
      </div>
   </div>




ADD DATA
<?php
   include "db_conn.php";

   if (isset($_POST["submit"])) {
      $kolom_1 = $_POST['kolom_1'];
      $kolom_2 = $_POST['kolom_2'];
      $kolom_3 = $_POST['kolom_3'];

      $sql = "INSERT INTO `nama_tabel`(`nama_kolom_1`, `nama_kolom_2`, `nama_kolom_3`) VALUES ('$kolom_1','$kolom_2','$kolom_3')";

      $result = mysqli_query($conn, $sql);

      if ($result) {
         header("Location: index.php?msg=New record created successfully");
      } else {
         echo "Failed: " . mysqli_error($conn);
      }
   }
?>
<form action="post">
   <label>Kolom 1 :</label>
      <input type="text" name="kolom_1">
   <label>Kolom 2 :</label>
      <input type="text" name="kolom_2">
   <label>Kolom 3 :</label>
      <input type="text" name="kolom_3">
      <button name="submit"></button>
</form>
                 

DELETE DATA
<?php
   include "db_conn.php";
   $id = $_GET["id"];
   $sql = "DELETE FROM `nama_tabel` WHERE id = $id";
   $result = mysqli_query($conn, $sql);

   if ($result) {
         header("Location: index.php?msg=Data deleted successfully");
   } else {
         echo "Failed: " . mysqli_error($conn);
   }
?>

<a href="delete.php?id=<?php echo $row["id"] ?>"><button>Delete</button></a>

UPDATE DATA
<?php
        include "db_conn.php";
        $id = $_GET["id"];
        if (isset($_POST["submit"])) {
          $nama_kolom1 = $_POST['nama_input1'];
          $nama_kolom2 = $_POST['nama_input2'];
          $nama_kolom3 = $_POST['nama_input3'];
          $sql = "UPDATE `nama_tabel` SET `nama_kolom1`='$nama_kolom1', 
                  `nama_kolom2`='$nama_kolom2', `nama_kolom3`='$nama_kolom3' WHERE `id`='$id'";

          $result = mysqli_query($conn, $sql);
          if ($result) {
            header("Location: index.php?msg=Data updated successfully");
          } else {
            echo "Failed: " . mysqli_error($conn);
          }
        }
        $sql = "SELECT * FROM `nama_tabel` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
?>
<form action="" method="post">
      <label>Nama Barang:</label>
      <input type="text" name="nama_input1" value="<?php echo $row['nama_kolom1'] ?>">
         
      <label>Harga Barang:</label>
      <input type="text" name="nama_input2" value="<?php echo $row['nama_kolom2'] ?>">

      <label>Link:</label>
      <input type="text" name="nama_input3" value="<?php echo $row['nama_kolom3'] ?>">

      <button type="submit" name="submit">Update</button>
      <a href="index.php">Cancel</a>
 </form>

 <a href="edit.php?id=<?php echo $row["id"] ?>">
 <button>Edit</button> </a> // kodingan ini diletakkan pada index.php seperti button delete
<?php

require 'functions.php';
$pokemon = queryPokemon("SELECT * FROM pokemon_tb");

// cek apakah tombol submit di tekan atau belum
if (isset($_POST['tambahPokemon'])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahPokemon($_POST) > 0) {
        echo "
        <script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'pokemon.php';
        </script>
    ";
    } else {
        echo "
        <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'pokemon.php';
        </script>
    ";
    }
}

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submitubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahPokemon($_POST) > 0) {
        echo "
        <script>
          alert('data berhasil diubah!');
          document.location.href = 'pokemon.php';
        </script>
      ";
    } else {
        echo "
        <script>
          alert('data gagal diubah!');
          document.location.href = 'pokemon.php';
        </script>
      ";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Add Pekemon</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">PokeDumb Find</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- modal tambah data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class=" form-group">
                            <label for="nama">Name</label>
                            <input type="text" name="name" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambahPokemon" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah
        </button>
        <table class="table table-bordered mt-2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1;
            foreach ($pokemon as $row) : ?>
                <!-- modal tambah data -->
                <div class="modal fade" id="modaltambah<?php echo $row['id_pokemon']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php
                                    $id_pokemon = $row['id_pokemon'];
                                    $query_edit = mysqli_query($conn, "SELECT * FROM pokemon_tb WHERE id_pokemon='$id_pokemon'");
                                    while ($rows = mysqli_fetch_array($query_edit)) {
                                    ?>
                                        <input type="hidden" name="id_pokemon" value="<?= $rows["id_pokemon"]; ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $rows["photo"]; ?>">
                                        <div class=" form-group">
                                            <label for="nama">Name</label>
                                            <input type="text" name="name" class="form-control" id="nama" value="<?= $rows["name"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <img src="asset/<?php echo $rows['photo']; ?>" width="80px" height="80px" alt=""><br>
                                            <input type="file" name="gambar" id="gambar">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submitubah" class="btn btn-primary">Ubah</button>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["photo"]; ?></td>
                        <td>
                            <a href="#modaltambah<?php echo $row['id_pokemon']; ?>" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modaltambah<?php echo $row['id_pokemon']; ?>">Edit</a> |
                            <a href="hapusPokemon.php?id_pokemon=<?php echo $row['id_pokemon']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>
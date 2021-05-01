<?php

// koneksi
$conn = mysqli_connect("localhost", "root", "", "pokemon");

// tampilkan data pokemon
function queryPokemon($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryPokemonindex($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function tambahPokemon($data)
{
    // ambil data dati tiap elemen dalam form
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query inser data
    $query = "INSERT INTO pokemon_tb VALUES('', '$name', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// functuons upload
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
				<script>
					alert('pilih gambar terlebih dahulu');
				</script>
			";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
				<script>
					alert('yang anda aploud bukan gambar!');
				</script>
			";
        return false;
    }

    // cek ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
				<script>
					alert('ukuran gambar terlalu besar!');
				</script>
			";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'asset/' . $namaFileBaru);

    return $namaFileBaru;
}


// update data pokemon
function ubahPokemon($data)
{
    global $conn;

    $id_pokemon = $data["id_pokemon"];
    $name = htmlspecialchars($data["name"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE pokemon_tb SET

				name = '$name',
				photo = '$gambar'
			  WHERE id_pokemon = $id_pokemon
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function hapusPokemon($id_pokemon)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pokemon_tb WHERE id_pokemon = $id_pokemon");

    return mysqli_affected_rows($conn);
}

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


// tampilkan data pokemon dan element
function queryPokemonElement($query)
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
function tambahPokemonElement($data)
{
    // ambil data dati tiap elemen dalam form
    global $conn;
    $nama_pokemon = htmlspecialchars($data["nama_pokemon"]);
    $nama_element = htmlspecialchars($data["nama_element"]);

    // query inser data
    $query = "INSERT INTO element_pokemon VALUES('', '$nama_pokemon', '$nama_element')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// hapus data
function hapusPokemonElement($id_element)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM element_pokemon WHERE id_element = $id_element");

    return mysqli_affected_rows($conn);
}

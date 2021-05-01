<?php

require 'functions.php';

$id_pokemon = $_GET["id_pokemon"];

if (hapusPokemon($id_pokemon) > 0) {
    echo "
        <script>
          alert('data berhasil dihapus!');
          document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
          alert('data gagal dihapus');
          document.location.href = 'index.php';
        </script>
    ";
}

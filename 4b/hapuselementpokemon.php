<?php

require 'functions2.php';

$id_element = $_GET["id_element"];

if (hapusPokemonElement($id_element) > 0) {
    echo "
        <script>
          alert('data berhasil dihapus!');
          document.location.href = 'elemenPokemon.php';
        </script>
    ";
} else {
    echo "
        <script>
          alert('data gagal dihapus');
          document.location.href = 'elemenPokemon.php';
        </script>
    ";
}

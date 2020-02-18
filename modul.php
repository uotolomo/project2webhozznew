<?php

$mod = $_GET['mod'];

if ($mod == '') {
    include "beranda.php";
}else{
    include "$mod.php";
}

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];

//     switch ($page) {
//         case 'home':
//            include "beranda.php";
//             break;
//         case 'karyawan':
//             include "lihatkaryawan.php";
//             break;
//         default:
//             echo "<h1>404 PAGE NOT FOUND</h1>";
//             break;
//     }
// }

?>
<?php
require_once(__DIR__ . '/autoloader.php');

// Vérifiez que les classes sont correctement chargées
// if (class_exists('DefaultDAO') && class_exists('DAO')) {
//     $dao = new DefaultDAO();
//     $dao->testConnexion();
//     $data = $dao->getAll();
//     echo '<pre>';
//     print_r($data); // Affiche les données récupérées
// } else {
//     echo "Les classes nécessaires ne sont pas chargées.";
// }

// Vérifiez que les classes sont correctement chargées
// if (class_exists('DefaultDAO') && class_exists('DAO')) {
//     $dao = new DefaultDAO();
//     $dao->testConnexion();
//     $array = [
//         'firstname'=>'moi',
//         'lastname'=>'moche',
//         'email'=>'et@mechant.fr',
//         'password'=>'lefilm'
//     ];
//     try{
//         $data = $dao->create($array);
//     } catch (Exception $e){
//         echo 'Erreur : ' . $e->getMessage();
//     }
    
    
// } else {
//     echo "Les classes nécessaires ne sont pas chargées.";
// }

$dao = new DefaultDAO();
$dao->delete(21);

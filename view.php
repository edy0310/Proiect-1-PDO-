<?php
require_once 'connection.php'; // include fișierul de conexiune la baza de date

// Definește interogarea SQL pentru a selecta toate datele din tabel
$sql = "SELECT * FROM flori";

// Execută interogarea SQL1
$result = $con->query($sql);

// Verifică dacă interogarea a avut succes
if ($result) {
    // Verifică dacă există cel puțin o înregistrare returnată
    if ($result->rowCount() > 0) {
        // Începe afișarea tabelului HTML
        echo "<table>";
        echo "<tr><th>Nume</th><th>Culoare</th><th>Marime</th><th>Pret</th></tr>";
        
        // Iterează prin fiecare rând returnat din interogare și afișează valorile într-un rând de tabel
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nume']) . "</td>";
            echo "<td>" . htmlspecialchars($row['culoare']) . "</td>";
            echo "<td>" . htmlspecialchars($row['marime']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pret']) . "</td>";
            echo "</tr>";
        }
        
        // Încheie tabelul HTML
        echo "</table>";
    } else {
        echo "Nu sunt date disponibile.";
    }
} else {
    echo "Eroare la interogare: " . $con->errorInfo()[2];
}
?>

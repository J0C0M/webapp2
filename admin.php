<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/webapp2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //header include
    include("include/header.php");
    ?>
    <h1>Admin pagina</h1>
    <a href="index.php">Link naar home pag</a>
    <h2>List Of Menu Items</h2>
    <a class="btn" href="create.php" role="button">New Item</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include("conn.php");

            $sql = "SELECT * FROM menukaart";
            $stmt = $pdo->query($sql);

            while($menukaart = $stmt->fetch()) {
                echo "  
                <tr class='menukaart'>
                    <td>$menukaart[id]</td>
                    <td>$menukaart[name]</td>
                    <td>$menukaart[discription] </td>
                    <td>$menukaart[price]</td>
                    <td>
                        <a class='btn' href='edit.php?id=$menukaart[id]'>Edit</a>
                        <a class='btn' href='delete.php?id=$menukaart[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
            
        </tbody>
    </table>
    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>


</html>
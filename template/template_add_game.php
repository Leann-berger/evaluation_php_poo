<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Nom du jeu">
        <input type="text" name="type" placeholder="type du jeu">
        <input type="date" name="publish_at" placeholder="date de publication">
        <select name="console">
            <!-- <option value= "1">Playstation</option>
            <option value= "2">Switch</option>
            <option value= "3">Xbox Series X</option>
            <option value= "4">Steam Deck</option> -->
            <?php foreach($data["consoles"] ?? [] as $console): ?>
                <option value="<?= $console["id_console"] ?>"><?= htmlspecialchars($console["name"]) ?></option> 
            <?php endforeach ?>
        </select>
        <input type="submit" value="Valider" name="submit">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($data["games"] ?? [] as $game): ?>
        <p><?=  htmlspecialchars($game["title"] . "/ type: " . $game["type"] . "/ date de publication: " . $game["publish_at"] . "/ Jouable sur ". $game["name"]) ?></p>
    <?php endforeach ?>
</body>
</html>
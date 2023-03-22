<!DOCTYPE html>
<html lang="EN-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/app.css">

        <title>Blog</title>
    </head>
    <body>
        <h1>This is my awesome blog</h1>

        <?php foreach ($posts as $post) : ?>
            <article>
                <?= $post; ?>
            </article>
        <?php endforeach; ?>
    </body>
</html>

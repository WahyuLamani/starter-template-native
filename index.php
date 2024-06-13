<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Project with Vite and Bootstrap</title>
    <?php
    require('src/lib/env.php');
    var_dump($_ENV['APP_ENV']);
    die;
    if ($_ENV['APP_ENV'] === 'development') {
        // Sertakan file dari server pengembangan Vite
        echo '<script type="module" src="http://localhost:3000/assets/index.js"></script>';
        echo '<link rel="stylesheet" href="http://localhost:3000/assets/index.css">';
    } else {
        // Baca file manifest.json
        $manifestPath = 'dist/.vite/manifest.json';
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Periksa apakah file manifest.json valid
        if ($manifest) {
            // Ambil path file JavaScript dan CSS dari manifest
            $mainJsPath = $manifest['index.html']['file'];
            $mainCssPath = $manifest['index.html']['css'][0];

            // Sertakan file JavaScript dan CSS dari folder output build
            echo '<script type="module" src="dist/' . $mainJsPath . '"></script>';
            echo '<link rel="stylesheet" href="dist/' . $mainCssPath . '">';
        } else {
            // Tampilkan pesan kesalahan jika file manifest tidak valid
            echo '<!-- Error: Manifest file is not valid -->';
        }
    }
    ?>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Hello, PHP with Vite and Bootstrap!</h1>
    </div>
</body>
</html>

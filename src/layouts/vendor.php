<?php
    require_once dirname(__DIR__,2).('/src/lib/env.php');
    if (env('APP_ENV', 'production') === 'development') {
        // Sertakan file dari server pengembangan Vite
        echo '<script type="module" src="http://localhost:3000/js/main.js"></script>';
    } else {
        // Baca file manifest.json
        if(file_exists("dist/.vite/manifest.json")) {
            $manifest = json_decode(file_get_contents("dist/.vite/manifest.json"), true);
          } else {
            die("Please run : <code>npm run build</code>");
          }
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
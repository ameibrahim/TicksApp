<?php
    
    include 'cachebust.php';

    // These are for css files
    $cssPaths = array(
        "../css/main.css",
        "../css/root.css",
        "../css/popup.css",
        "../css/spinkit.css"
    );

    // These are for javascript files that you want
    // to run immediately before the page loads
    $jsPaths = array(
        "../js/GlobalCache.js",
        "../js/index.js",
        "../js/functions.js",
        "../js/predictImage.js",
    );

    // These are for javascript files that you want
    // to run when the page completes loading.
    $jsPaths_Defer = array(
    );

    foreach ($cssPaths as $path) {
        echo "<link rel='stylesheet' href='" .$path. "?" .cachebust($path). "'>";
    }

    foreach ($jsPaths as $path) {
        echo "<script src='" .$path. "?" .cachebust($path). "'></script>";
    }

    foreach ($jsPaths_Defer as $path) {
        echo "<script src='" .$path. "?" .cachebust($path). "' defer></script>";
    }

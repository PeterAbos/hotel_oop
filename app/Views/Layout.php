<?php

namespace App\Views;

class Layout
{
    public static function header($title = "Hotel") {
        echo <<<HTML
        <!DOCTYPE html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>$title</title>

                <link href="/fontawesome/css/all.css" rel="stylesheet" type="text/css">
                <link href="/css/school.css" rel="stylesheet" type="text/css">
                <link href="/css/sajat.css" rel="stylesheet" type="text/css">
            </head>
            <body>
        HTML;
        self::navbar();
        self::handleMessage();
        echo '<div class="container">';
    }

    private static function handleMessage(): void
    {
        $message = [
            'success_message' => 'success',
        ];
    }

    public static function navbar() {
        echo <<<HTML
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-button"><a href="/"><button style="button" title="Kezdőlap">Kezdőlap</button></a></li>
                <li class="nav-button"><a href="/rooms"><button style="button" title="Szobák">Szobák</button></a></li>
                <li class="nav-button"><a href="/guests"><button style="button" title="Vendégek">Vendégek</button></a></li>
                <li class="nav-button"><a href="/reservations"><button style="button" title="Foglalások">Foglalások</button></a></li>
            </ul>
        </nav>
        HTML;
    }

    public static function footer() {
        echo <<<HTML
        </div>
            <footer>
                <hr>
                <p>2025 &copy; Abos Péter</p>
            </footer>
        </body>
        </html>
        HTML;
    }
}
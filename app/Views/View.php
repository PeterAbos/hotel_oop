<?php

namespace App\Views;

class View
{
    public static function render(string $view, array $data = [], bool $useLayout = true) 
    {
        $viewFile = self::resolveViewPath($view);

        if (!file_exists($viewFile)) {
            self::handleMissingView($viewFile);
            return;
        }

        if ($useLayout) {
            Layout::header($data['title'] ?? 'Hotel');
        }

        extract($data);
        include($viewFile);

        if ($useLayout) {
            Layout::footer();
        }
    }

    private static function resolveViewPath(string $view): string 
    {
        return __DIR__ . DIRECTORY_SEPARATOR . "$view.php";
    }

    private static function handleMissingView(string $viewFile): void 
    {
        error_log("View not found: $viewFile");
        Display::message("View '$viewFile' not found.");
    }
}
<?php

namespace App;

class Autoloader 
{
  // Enregistrer la fonction d'autoloading + Enregistre l'autoloader de Composer et ajoute la fonction d'autoloader personnalisée.
    
    static function register()
    {
        // Register Composer's autoload
        require_once __DIR__ . '/vendor/autoload.php';

        // Register the custom autoloader function
        spl_autoload_register([
            __CLASS__,
            'Autoload'
        ]);
    }

   // Charge automatiquement le fichier de la classe lorsqu'une classe est instanciée.
    static function Autoload($class)
    {
        // Charger automatiquement les classes du namespace actuel
        if (strpos($class, __NAMESPACE__) === 0) {
            // Supprimer le préfixe 'App\' du nom de la classe
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            
             // Remplacer les séparateurs de namespace par des séparateurs de répertoires
            $class = str_replace('\\', '/', $class);

             // Construire le chemin complet du fichier de la classe
            $file = __DIR__ . '/' . $class . '.php';

             // Importer le fichier si il existe
            if (file_exists($file)) {
                require_once $file;
            } else {
                // Enregistrer une erreur si le fichier n'existe pas
                error_log("Autoloader error: Unable to load file: $file");
            }
        }
    }
}
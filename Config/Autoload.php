<?php

/**
 * Chargement automatique de tous les fichiers du nécessaire au programme
 * @package Config
 * @author Salva Sebastien
 */
class Autoload
{
        private static $_instance = null;
    /**
     * Méthode qui envoie exception lors de la chargement
     * @return Exception levé si un fichier est déjà lancé ou qu'il ne peux pas être lancé
     * @throws RuntimeException 
     */
        public static function charger()
    {
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();


        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }
    /**
     * Méthode qui arrête les fichiers autoloader 
     * @throws RunTimeException si le fichier n'a pas pu être arrêter
     */
        public static function shutDown()
    {
        if(null !== self::$_instance) {

            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }
    /**
     * Charge tous les fichiers présent dans les répertoires Modeles, config et controleurs
     * 
     * @param $class Nom du fichier a charger
     */
        private static function _autoload($class)
        {
            global $rep;
            $filename = $class.'.php';
            $dir =array('Modeles/','./','Config/','Controleurs/', 'Modeles/Gateway/', 'Modeles/Metier/');
            foreach ($dir as $d){
                $file=$rep.$d.$filename;
                if (file_exists($file)){
                    include $file;
                }
            }
        }
    }

?>
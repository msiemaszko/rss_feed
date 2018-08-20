<?php namespace MarekSiemaszko\classes;

    /**
     * klasa operująca na plikach CSV
     */
    class csvWritter {
        
        /**
         * metoda zapisująca przekazaną tablicę do pliku csv
         *
         * @param array $array tablica z danymi
         * @param string $CSVfile nazwa pliku csv
         * @return void
         */
        public static function writeArray($array = [], $CSVfile = null, $fileMode = "w") {
            if ($CSVfile == null) return false;
            
            $fx = file_exists($CSVfile);
            $fp = fopen($CSVfile, $fileMode);
            
            // put csv header (only when created file)
            if (!$fx)fputcsv($fp, array_keys($array[0]));
    
            // put all data
            foreach ($array as $fields) {
                $fds = array_values( $fields );
                fputcsv($fp, $fds);
            }
    
            fclose($fp);
            return true;
        }
    }
?>
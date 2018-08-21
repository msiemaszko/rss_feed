<?php namespace MarekSiemaszko\classes;

    /**
     * method used for operations on csv files
     */
    class csvWriter {
        
        /**
         * write array to csv file
         *
         * @param array $array data array
         * @param string $CSVfile name of csv file
         * @return void
         */
        public static function writeArray($array = [], $CSVfile = null, $fileMode = "w") {
            if ($CSVfile == null) return false;
            
            $fx = file_exists($CSVfile);
            $fp = fopen($CSVfile, $fileMode);
            
            // put csv header (only when created file)
            if ($fileMode == "w" || !$fx)fputcsv($fp, array_keys($array[0]));
    
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

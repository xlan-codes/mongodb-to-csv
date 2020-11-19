<?php


class CsvService
{

    function export_arry_to_csv($array = array(), $file_path = '', $csv_header=array()):bool {

        try {
            $file = fopen($file_path, 'wb');
            fputcsv( $file, $csv_header );
            foreach( $array as $row )
            {
                fputcsv( $file, array_values( $row ) );
            }
            fclose( $file );
            return true;
        } catch (Exception $e){
            throw $e;
        }

    }

}
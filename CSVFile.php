<?php
namespace Inanimatt\File;

/**
 * CSV file utility class
 * 
 * Extends SPLFileObject to allow iterating over a CSV file, returning each row
 * as a named array based on the column titles of the header row (optional, 
 * enabled by default, otherwise just returns each row as an indexed array).
 * 
 * Usage:
 * $file = new Inanimatt\File\CSVFile('testset.csv');
 * 
 * foreach($file as $idx => $row) {
 *     print_r($row);
 * }
 */
class CSVFile extends SPLFileObject
{
    protected $first_row = true;
    protected $columns;
    protected $has_header = true;
    
    public function __construct ($filename, $has_header = true, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        parent::__construct($filename);
        $this->setFlags(SPLFileObject::READ_CSV);
        $this->setCsvControl($delimiter, $enclosure, $escape);

        $this->has_header = $has_header;
    }
    
    public function current()
    {
        // Set the column names if first row
        if ($this->first_row && $this->has_header) {
            $this->first_row = false;
            $this->columns = parent::current();
            $this->next();
        }

        $row_data = parent::current();

        // Stop at end of file
        if (!$this->valid()) {
            return;
        }
        
        return $this->has_header ? array_combine($this->columns, $row_data) : $row_data;
    }
}

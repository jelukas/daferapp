<?php 
/**
 * 
 * Helper MultipleRecords
 *
 * How to easy edit and add multiple records. As the data format of Find->(all) is 
 * 
 * 
 * @name MultipleRecords
 * @abstract Do the job of Form->inputs() on multiple record sets.
 * @license MIT
 * @version 1.1.1
 * @modified 05. Jan. 2009
 * @author Eskil Mjelva Saatvedt
 * @author Ronny V Vindenes
 * @author Alexander Morland
 * @author Carl Erik Fyllingen
 *  
 */
class MultipleRecordsHelper extends AppHelper {
    /**
     * Helper name
     *
     * @var String
     */
    var $name = 'MultipleRecords';
    
    /**
     * Helpers used by this helper
     *
     * @var Array
     */
        var $helpers = array('Form','Html'); 
    
    /**
     * Number of record set, used by the add function
     *
     * @var int
     */
    var $numberOfRecords = 0;
    
    /**
     * Max number of record sets to display
     *
     * @var int
     */
    var $maxLimit = 10;
    
    /**
     * Replaces the Form->inputs() with MultipleRecords->inputs() 
     * Creating a form with multiple record sets
     *
     * For this to work, form->create() has be be run before MultipleRecords->inputs()
     * 
     * @param Array $fields which fields is to be displayed, also takes 
     * inn 'legend' => 'My legend', with possible 'legend'=>'My legend %n' where n is 
     * the $i+1 counter
     * @param int $count Number of record set to display, if not set, it uses 1 if 
     * there is no data, or the size of the dataset it there is data
     * @return String
     */
    function inputs($fields = array(), $numberOfRecords = false) {
        
        // If the number of record set is not set, use 1 if no data, and size of dataset 
        // if it is one
        if ($numberOfRecords === false || !is_numeric($numberOfRecords) || $numberOfRecords < 1) {
            $numberOfRecords = 1;
            if (sizeof($this->data[$this->model()])) {
                $numberOfRecords = sizeof($this->data[$this->model()]);
            }
        }
        $this->numberOfRecords = $numberOfRecords;
        
        // Check for max limit
        if ($this->numberOfRecords > $this->maxLimit) {
            $this->numberOfRecords = $this->maxLimit;
            // Display a warning if debug is on and the maxLimit is breached
            debug('Max limit of number of records reached. Can be set in 
            app/views/helpers/multiple_records.php');
        }
        
        // If ledgend is not set, use "New Modelname"
        $legend = __('New', true) . ' ' . $this->model();
        
        $fieldSet = null;
        
        // Code parts from Form helper, to manipulate the fields
        if (is_array($fields)) {
            if (array_key_exists('legend', $fields)) {
                $legend = $fields['legend'];
                unset($fields['legend']);
            }
            if (isset($fields['fieldset'])) {
                $fieldSet = $fields['legend'];
                unset($fields['fieldset']);
            }
        } elseif ($fields !== null) {
            $fields = array();
        }
        if (empty($fields)) {
            // For this to work, form->create() has be run before MultipleRecords->inputs()
            $fields = array_keys($this->Form->fieldset['fields']);
        }
        
        // String holding the output, all the form fields
        $output = '';
        
        // For $count number of times, call Form->inputs() with the correct field list, 
        // with the number added to be on the form: Model.2.field_name        
        for ($i = 0; $i < $this->numberOfRecords; $i++) {
            $fieldStrings = array();
            foreach ($fields as $value) {
                $modelPaths = explode('.', $value);
                if (sizeof($modelPaths) == 1) {
                    $fieldStrings[] = $this->model() . '.' . $i . '.' . $value;
                } else {
                    $fieldStrings[] = $modelPaths[0] . '.' . $i . '.' . $modelPaths[1];
                }
            }
            // Add a potensial counter to the ledgend
            $fieldStrings['legend'] = str_replace('%n', $i + 1, $legend);
            if ($fieldSet) {
                $fieldStrings['fieldset'] = $fieldSet;
            }
            $output .= $this->Form->inputs($fieldStrings);
        }
        
        return $output;
    }
    
    /**
     * Display the add one more empty record set button
     * 
     * If used before the record set, the $numberOfRecords has to be set
     * 
     * @param String $title the button title
     * @param int $n number of record set one want in total
     * @return String returns a form button if maxLimit is not reached
     */
    function add($title, $numberOfRecords = null) {
        if (!$numberOfRecords || !is_numeric($numberOfRecords) || $numberOfRecords < 1) {
            $numberOfRecords = $this->numberOfRecords;
        }
        // If maxLimit - 1 or higher stop displaying the add button
        if ($numberOfRecords < $this->maxLimit) {
            return $this->Form->submit($title, array(
                    'onClick' => 'this.form.action = "' . $this->Html->url(array(
                            ($numberOfRecords + 1))) . '"; return true;'));
        } else {
            return '';
        }
    }
}
?> 

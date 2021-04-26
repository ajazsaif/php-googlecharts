<?php

namespace Ajaz\Google;

/**
 * Pie chart widget.
 * A pie chart is a divided into sectors, illustrating numerical proportion.
 * In a pie chart, the arc length of each sector (and consequently its central angle and area), is proportional to the quantity it represents.
 * While it is named for its resemblance to a pie which has been sliced, there are variations on the way it can be presented.
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

class PieChart extends Chart
{
    /**
     * @var string unique id of chart
     */
    public $id;

    /**
     * @var array table of data
     * Example:
     * [
     *     ['Major', 'Degrees'],
     *     ['Business', 256070],
     *     ['Education', 108034],
     *     ['Social Sciences & History', 127101],
     *     ['Health', 81863],
     *     ['Psychology', 74194]
     * ]
     */

    public $data = [];

    /**
     * @var array table of extra data necessary for inner circle chart types
     * Example:
     * [
     *     ['Major', 'Degrees'],
     *     ['Business', 358293],
     *     ['Education', 101265],
     *     ['Social Sciences & History', 172780],
     *     ['Health', 129634],
     *     ['Psychology', 97216]
     * ]
     */

    public $extraData = [];

    /**
     * @var array options
     * Example:
     * [
     *     'fontName' => 'Verdana',
     *     'height' => 300,
     *     'width' => 500,
     *     'chartArea' => [
     *         'left' => 50,
     *         'width' => '90%',
     *         'height' => '90%'
     *     ],
     *     'diff' => [
     *         'oldData' => [
     *             'inCenter' => false
     *         ]
     *     ]
     * ]
     */

    public $options = [];

    /**
     * @var array div container html attributes
     * Example:
     * [
     *    'class'=>'your class'
     * ]
     */

    public $containerOption = [];

    /**
     * Initializes the constructor.
     * @param array $config
     */

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        //assign values
        $this->id = $config['id'];
        $this->data = $config['data'];
        $this->options = $config['options'];
        //validate extraData property
        if(isset($config['extraData']))
        {
            $this->extraData = $config['extraData'];
        }
    }

    /**
     * Return necessary javascript.
     */
    protected function getJs()
    {
        $uniqueInt = mt_rand(1, 999999);
        
        $js = "
            google.load('visualization', '1', {packages:['corechart']});
            google.setOnLoadCallback(drawChart". $uniqueInt .");
        ";
        if (!empty($this->extraData))
        {
            $js .= "
                function drawChart". $uniqueInt ."() {
                    var oldData". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->data) .");
                    var newData". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->extraData) .");
                    var options". $uniqueInt ." = ". json_encode($this->options) .";
                    var pie". $uniqueInt ." = new google.visualization.PieChart($('#". $this->id ."')[0]);
                    var diffData". $uniqueInt ." = pie". $uniqueInt .".computeDiff(oldData". $uniqueInt .", newData". $uniqueInt .");
                    pie". $uniqueInt .".draw(diffData". $uniqueInt .", options". $uniqueInt .");
                }
            ";
        } 
        else
        {
            $js .= "
                function drawChart". $uniqueInt ."() {
                    var data". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->data) .");
                    var options". $uniqueInt ." = ". json_encode($this->options) .";
                    var pie". $uniqueInt ." = new google.visualization.PieChart($('#". $this->id ."')[0]);
                    pie". $uniqueInt .".draw(data". $uniqueInt .", options". $uniqueInt .");
                }
            ";            
        }
        echo "<script type='text/javascript'>$js</script>";
    }
}
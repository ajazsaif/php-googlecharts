<?php

namespace Ajaz\Google;

/**
 * Geo chart widget.
 * A geochart is a map of a country, a continent, or a region with areas identified in one of three ways: region mode, markers mode and text mode.
 * A geochart is rendered within the browser using SVG or VML. Note that the geochart is not scrollable or draggable, and it's a line drawing rather than a terrain map.
 * The regions style fills entire regions (typically countries) with colors corresponding to the values that you assign.
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

class GeoChart extends Chart
{
    /**
     * @var string unique id of chart
     */
    public $id;

    /**
     * @var array table of data
     * Example:
     * [
     *     ['Country', 'Popularity'],
     *     ['Germany', 200],
     *     ['United States', 300],
     *     ['Brazil', 400],
     *     ['Canada', 500],
     *     ['France', 600],
     *     ['RU', 700]
     * ]
     */

    public $data = [];

    /**
     * @var array options
     * Example:
     * [
     *     'fontName' => 'Verdana',
     *     'height' => 500,
     *     'width' => '100%',
     *     'fontSize' => 12,
     *     'tooltip' => [
     *         'textStyle' => [
     *             'fontName' => 'Verdana',
     *             'fontSize' => 13
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
    }

    /**
     * Return necessary javascript.
     */

    protected function getJs()
    {
        $uniqueInt = mt_rand(1, 999999);

        $js = "
            google.load('visualization', '1', {packages:['corechart']});
            google.setOnLoadCallback(drawMap". $uniqueInt .");
        ";
        $js .= "
            function drawMap". $uniqueInt ."() {
                var data". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->data) .");
                var options". $uniqueInt ." = ". json_encode($this->options) .";
                var chart". $uniqueInt ." = new google.visualization.GeoChart($('#". $this->id ."')[0]);
                chart". $uniqueInt .".draw(data". $uniqueInt .", options". $uniqueInt .");
            }
        ";
        echo "<script type='text/javascript'>$js</script>";
    }
}
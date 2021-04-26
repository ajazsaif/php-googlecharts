<?php

namespace Ajaz\Google;

/**
 * Area chart widget.
 * An area chart or area graph displays graphically quantitive data. It is based on the line chart.
 * The area between axis and line are commonly emphasized with colors, textures and hatchings.
 * Commonly one compares with an area chart two or more quantities.
 * An area chart that is rendered within the browser using SVG or VML. Displays tips when hovering over points.
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

class AreaChart extends Chart
{
    /**
     * @var string unique id of chart
     */

    public $id;

    /**
     * @var array table of data
     * Example:
     * [
     *     ['Year', 'Sales', 'Expenses'],
     *     ['2004', 1000, 400],
     *     ['2005', 1170, 460],
     *     ['2006', 660, 1120],
     *     ['2007', 1030, 540]
     * ]
     */

    public $data = [];

    /**
     * @var array div container html attributes
     * Example:
     * [
     *    'class'=>'your class'
     * ]
     */

    public $containerOption = [];

    /**
     * @var array options
     * Example:
     * [
     *     'fontName' => 'Verdana',
     *     'height' => 400,
     *     'curveType' => 'function',
     *     'fontSize' => 12,
     *     'areaOpacity' => 0.4,
     *     'chartArea' => [
     *         'left' => '5%',
     *         'width' => '90%',
     *         'height' => 350
     *     ],
     *     'pointSize' => 4,
     *     'tooltip' => [
     *         'textStyle' => [
     *             'fontName' => 'Verdana',
     *             'fontSize' => 13
     *         ]
     *     ],
     *     'vAxis' => [
     *         'title' => 'Sales and Expenses',
     *         'titleTextStyle' => [
     *             'fontSize' => 13,
     *             'italic' => false
     *         ],
     *         'gridarea' => [
     *             'color' => '#e5e5e5',
     *             'count' => 10
     *         ],
     *         'minValue' => 0
     *     ],
     *     'legend' => [
     *         'position' => 'top',
     *         'alignment' => 'end',
     *         'textStyle' => [
     *             'fontSize' => 12
     *         ]
     *     ]
     * ]
     */

    public $options = [];

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
        $uniqueInt = mt_rand(1, 9999);
        $js = "
            google.load('visualization', '1', {packages:['corechart']});
            google.setOnLoadCallback(drawAreaChart". $uniqueInt .");
        ";
        $js .= "
            function drawAreaChart". $uniqueInt ."() {
                var data". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->data) .");
                var options". $uniqueInt ." = ". json_encode($this->options) .";
                var area_chart". $uniqueInt ." = new google.visualization.AreaChart($('#". $this->id ."')[0]);
                area_chart". $uniqueInt .".draw(data". $uniqueInt .", options". $uniqueInt .");
            }
        ";

        $js .= "
            $(function () {
                $(window).on('resize', resize);
                $('.sidebar-control').on('click', resize);
                function resize() {
                    drawAreaChart". $uniqueInt ."();
                }
            });
        ";

        echo "<script type='text/javascript'>$js</script>";
    }


}
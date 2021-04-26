<?php

namespace Ajaz\Google;

/**
 * Bar chart widget.
 * A bar graph is a chart that uses horizontal bars to show comparisons among categories.
 * One axis of the chart shows the specific categories being compared, and the other axis represents a discrete value.
 * Like all Google charts, column charts display tooltips when the user hovers over the data.
 * By default, text labels are hidden, but can be turned on in chart settings.
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

class BarChart extends Chart
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
     *     ['2004',  1000,      400],
     *     ['2005',  1170,      460],
     *     ['2006',  660,       1120],
     *     ['2007',  1030,      540]
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
     *     'fontSize' => 12,
     *     'chartArea' => [
     *         'left' => '5%',
     *         'width' => '90%',
     *         'height' => 350
     *     ],
     *     'tooltip' => [
     *         'textStyle' => [
     *             'fontName' => 'Verdana',
     *             'fontSize' => 13
     *         ]
     *     ],
     *     'vAxis' => [
     *         'gridlines' => [
     *             'color' => '#e5e5e5',
     *             'count' => 10
     *         ],
     *         'minValue' => 0
     *     ],
     *     'legend' => [
     *         'position' => 'top',
     *         'alignment' => 'center',
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
        $uniqueInt = mt_rand(1, 999999);

        $js = "
            google.load('visualization', '1', {packages:['corechart']});
            google.setOnLoadCallback(drawBar". $uniqueInt .");
        ";
        $js .= "
            function drawBar". $uniqueInt ."() {
                var data". $uniqueInt ." = google.visualization.arrayToDataTable(". json_encode($this->data) .");
                var options_bar". $uniqueInt ." = ". json_encode($this->options) .";
                var bar". $uniqueInt ." = new google.visualization.BarChart($('#". $this->id ."')[0]);
                bar". $uniqueInt .".draw(data". $uniqueInt .", options_bar". $uniqueInt .");
            }
        ";        
        $js .= "
            $(function () {
                $(window).on('resize', resize);
                $('.sidebar-control').on('click', resize);
                function resize() {
                    drawBar". $uniqueInt ."();
                }
            });
        ";

        echo "<script type='text/javascript'>$js</script>";
    }
}
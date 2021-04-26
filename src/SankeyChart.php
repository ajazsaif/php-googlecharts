<?php

namespace Ajaz\Google;

/**
 * Sankey diagram widget.
 * A sankey diagram is a visualization used to depict a flow from one set of values to another.
 * The things being connected are called nodes and the connections are called links.
 * Sankeys are best used when you want to show a many-to-many mapping between two domains (e.g., universities and majors) or multiple paths through a set of stages.
 * 
 * @author Ajaz Alam <ajazaalam@gmail.com>
 */

class SankeyChart extends Chart
{
    /**
     * @var string unique id of chart
     */
    public $id;

    /**
     * @var array table of data
     * Example:
     * [
     *     [ 'Brazil', 'Portugal', 4 ],
     *     [ 'Brazil', 'France', 1 ],
     *     [ 'Brazil', 'Spain', 1 ],
     *     [ 'Brazil', 'England', 1 ],
     *     [ 'Canada', 'Portugal', 1 ],
     *     [ 'Canada', 'France', 4 ],
     *     [ 'Canada', 'England', 1 ],
     *     [ 'Mexico', 'Portugal', 1 ],
     *     [ 'Mexico', 'France', 1 ],
     *     [ 'Mexico', 'Spain', 4 ],
     *     [ 'Mexico', 'England', 1 ],
     *     [ 'USA', 'Portugal', 1 ],
     *     [ 'USA', 'France', 1 ],
     *     [ 'USA', 'Spain', 1 ],
     *     [ 'USA', 'England', 4 ],
     *     [ 'Portugal', 'Angola', 2 ],
     *     [ 'Portugal', 'Senegal', 1 ],
     *     [ 'Portugal', 'Morocco', 1 ],
     *     [ 'Portugal', 'South Africa', 3 ],
     *     [ 'France', 'Angola', 1 ],
     *     [ 'France', 'Mali', 3 ],
     *     [ 'France', 'Morocco', 3 ],
     *     [ 'France', 'South Africa', 1 ],
     *     [ 'Spain', 'Senegal', 1 ],
     *     [ 'Spain', 'Morocco', 3 ],
     *     [ 'Spain', 'South Africa', 1 ],
     *     [ 'England', 'Angola', 1 ],
     *     [ 'England', 'Senegal', 1 ],
     *     [ 'England', 'Morocco', 2 ],
     *     [ 'England', 'South Africa', 4 ],
     *     [ 'South Africa', 'India', 1 ],
     *     [ 'South Africa', 'Japan', 3 ],
     *     [ 'Angola', 'China', 2 ],
     *     [ 'Angola', 'India', 1 ],
     *     [ 'Angola', 'Japan', 3 ],
     *     [ 'Senegal', 'China', 2 ],
     *     [ 'Senegal', 'India', 1 ],
     *     [ 'Senegal', 'Japan', 3 ],
     *     [ 'Mali', 'China', 2 ],
     *     [ 'Mali', 'India', 1 ],
     *     [ 'Mali', 'Japan', 3 ],
     *     [ 'Morocco', 'China', 2 ],
     *     [ 'Morocco', 'India', 1 ],
     *     [ 'Morocco', 'Japan', 3 ],
     *     [ 'Morocco', 'Senegal', 1 ]
     * ]
     */

    public $data = [];

    /**
     * @var array options
     * Example:
     * [
     *     'height' => 600,
     *     'sankey' => [
     *         'link' => [
     *             'color' => [
     *                 'fill' => '#eee',
     *                 'fillOpacity' => 0.3
     *             ]
     *         ],
     *         'node' => [
     *             'width' => 8,
     *             'nodePadding' => 80,
     *             'label' => [
     *                 'fontName' => 'Verdana',
     *                 'fontSize' => 13
     *             ]
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
            google.load('visualization', '1', {packages:['sankey']});
            google.setOnLoadCallback(drawSankey". $uniqueInt .");
        ";
        $js .= "
            function drawSankey". $uniqueInt ."() {
                var data". $uniqueInt ." = new google.visualization.DataTable();
                    data". $uniqueInt .".addColumn('string', 'From');
                    data". $uniqueInt .".addColumn('string', 'To');
                    data". $uniqueInt .".addColumn('number', 'Weight');
                data". $uniqueInt .".addRows(". json_encode($this->data) .");
                var options". $uniqueInt ." = ". json_encode($this->options) .";
                var chart". $uniqueInt ." = new google.visualization.Sankey($('#". $this->id ."')[0]);
                chart". $uniqueInt .".draw(data". $uniqueInt .", options". $uniqueInt .");
            }
        ";
        $js .= "
            $(function () {
                $(window).on('resize', resize);
                $('.sidebar-control').on('click', resize);
                function resize() {
                    drawSankey". $uniqueInt ."();
                }
            });
        ";
        echo "<script type='text/javascript'>$js</script>";
    }
}
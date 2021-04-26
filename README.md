Google Charts Extension for PHP
===============================

This extension contains a set of chart widgets based on [Google Charts API](https://developers.google.com/chart/).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ajaz/php-googlecharts
```

## Requirement

```html
<!DOCTYPE html>
<html>
<head>
<title>PHP Googel Charts</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
</head>
<body>

<h1>Google Chart</h1>
    your php code..
</body>
</html>
```

Usage
-----

To use any of these widgets,  simply add the following code in your Page.

### Column Chart Example
```php
...
use Ajaz\Google\ColumnChart;
...
```
1) Simple Column Chart

![demo](http://img.sbannikov.info/ColumnChartSimple.png)
```php
<?php $columnChart = new ColumnChart([
	'id' => 'my-column-chart-id',
    'data' => [
        ['Year', 'Sales', 'Expenses'],
        ['2013',  1000,      400],
        ['2014',  1170,      460],
        ['2015',  660,       1120],
        ['2016',  1030,      540]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'fontSize' => 12,
        'chartArea' => [
        	'left' => '5%',
        	'width' => '90%',
        	'height' => 350
        ],
        'tooltip' => [
        	'textStyle' => [
        		'fontName' => 'Verdana',
        		'fontSize' => 13
        	]
        ],
        'vAxis' => [
        	'title' => 'Sales and Expenses',
        	'titleTextStyle' => [
        		'fontSize' => 13,
        		'italic' => false
        	],
        	'gridlines' => [
        		'color' => '#e5e5e5',
        		'count' => 10
        	],            	
        	'minValue' => 0
        ],
        'legend' => [
        	'position' => 'top',
        	'alignment' => 'center',
        	'textStyle' => [
        		'fontSize' => 12
        	]
        ]            
    ]
]);

//render chart
echo $columnChart->render();

?>
```

2) Stacked Column Chart

![demo](http://img.sbannikov.info/ColumnChartStacked.png)
```php
<?php $stackedColumn = new ColumnChart([
	'id' => 'my-stacked-column-chart-id',
    'data' => [
		['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General', 'Western', 'Literature'],
		['2000', 20, 30, 35, 40, 45, 30],
		['2005', 14, 20, 25, 30, 48, 30],
		['2010', 10, 24, 20, 32, 18, 5],
		['2015', 15, 25, 30, 35, 20, 15],
		['2020', 16, 22, 23, 30, 16, 9],
		['2025', 12, 26, 20, 40, 20, 30],
		['2030', 28, 19, 29, 30, 12, 13]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'fontSize' => 12,
        'chartArea' => [
        	'left' => '5%',
        	'width' => '90%',
        	'height' => 350
        ],
        'isStacked' => true,
        'tooltip' => [
        	'textStyle' => [
        		'fontName' => 'Verdana',
        		'fontSize' => 13
        	]
        ],
        'vAxis' => [
        	'title' => 'Sales and Expenses',
        	'titleTextStyle' => [
        		'fontSize' => 13,
        		'italic' => false
        	],
        	'gridlines' => [
        		'color' => '#e5e5e5',
        		'count' => 10
        	],            	
        	'minValue' => 0
        ],
        'legend' => [
        	'position' => 'top',
        	'alignment' => 'center',
        	'textStyle' => [
        		'fontSize' => 12
        	]
        ]            
    ]
]);

echo $stackedColumn->render();

?>
```

3) Trendlines Column Chart

![demo](http://img.sbannikov.info/ColumnChartTrendlines.png)
```php
<?php $trendLines =  new ColumnChart([
    'id' => 'my-column-trendlines-chart-id',
    'data' => [
        ['Week', 'Bugs', 'Tests'],
        [1, 175, 10],
        [2, 159, 20],
        [3, 126, 35],
        [4, 129, 40],
        [5, 108, 60],
        [6, 92, 70],
        [7, 55, 72],
        [8, 50, 97]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 450,
        'curveType' => 'function',
        'fontSize' => 12,
        'chartArea' => [
            'left' => 50,
            'width' => '92%',
            'height' => 350
        ],
        'hAxis' => [
            'format' => '#',
            'viewWindow' => [
                'min' => 0,
                'max' => 9
            ],            
            'gridlines' => [
                'count' => 10
            ]
        ],   
        'vAxis' => [
            'title' => 'Bugs and tests',
            'titleTextStyle' => [
                'fontSize' => 13,
                'italic' => false
            ],            
            'gridlines' => [
                'color' => '#e5e5e5',
                'count' => 10
            ],
            'minValue' => 0
        ],
        'colors' => [
            '#6D4C41',
            '#FB8C00'
        ],
        'trendlines' => [
            0 => [
                'labelInLegend' => 'Bug line',
                'visibleInLegend' => true
            ],            
            1 => [
                'labelInLegend' => 'Test line',
                'visibleInLegend' => true
            ]
        ],             
        'legend' => [
            'position' => 'top',
            'alignment' => 'end',
            'textStyle' => [
                'fontSize' => 12
            ]
        ]
    ]
]);

echo $trendLines->render();

?>
```

4) Diff Column Chart

![demo](http://img.sbannikov.info/ColumnChartDiff.png)
```php
<?php $diffColumn = new ColumnChart([
    'id' => 'my-column-diff-chart-id',
    'data' => [
        ['Name', 'Popularity'],
        ['Cesar', 425],
        ['Rachel', 420],
        ['Patrick', 290],
        ['Eric', 620],
        ['Eugene', 520],
        ['John', 460],
        ['Greg', 420],
        ['Matt', 410]
    ],
    'extraData' => [
        ['Name', 'Popularity'],
        ['Cesar', 307],
        ['Rachel', 360],
        ['Patrick', 200],
        ['Eric', 550],
        ['Eugene', 460],
        ['John', 320],
        ['Greg', 390],
        ['Matt', 360]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'fontSize' => 12,
        'chartArea' => [
            'left' => '5%',
            'width' => '90%',
            'height' => 350
        ],
        'colors' => [
            '#4CAF50'
        ],
        'tooltip' => [
            'textStyle' => [
                'fontName' => 'Verdana',
                'fontSize' => 13
            ]
        ],              
        'hAxis' => [
            'format' => '#',
            'viewWindow' => [
                'min' => 0,
                'max' => 9
            ],            
            'gridlines' => [
                'count' => 10
            ]
        ],   
        'vAxis' => [
            'title' => 'Popularity',
            'titleTextStyle' => [
                'fontSize' => 13,
                'italic' => false
            ],            
            'gridlines' => [
                'color' => '#e5e5e5',
                'count' => 10
            ],
            'minValue' => 0
        ],
        'legend' => [
            'position' => 'top',
            'alignment' => 'end',
            'textStyle' => [
                'fontSize' => 12
            ]
        ]
    ]
]);

echo $diffColumn->render();

?>
```

### Bar Chart Example
```php
...
use Ajaz\Google\BarChart;
...
```
1) Simple Bar Chart

![demo](http://img.sbannikov.info/BarChart.png)
```php
<?php $barChart = new BarChart([
	'id' => 'my-bar-chart-id',
    'data' => [
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'fontSize' => 12,
        'chartArea' => [
        	'left' => '5%',
        	'width' => '90%',
        	'height' => 350
        ],
        'tooltip' => [
        	'textStyle' => [
        		'fontName' => 'Verdana',
        		'fontSize' => 13
        	]
        ],
        'vAxis' => [
        	'gridlines' => [
        		'color' => '#e5e5e5',
        		'count' => 10
        	],            	
        	'minValue' => 0
        ],
        'legend' => [
        	'position' => 'top',
        	'alignment' => 'center',
        	'textStyle' => [
        		'fontSize' => 12
        	]
        ]            
    ]
]);

echo $barChart->render();

?>
```

2) Stacked Bar Chart

![demo](http://img.sbannikov.info/BarChartStacked.png)
```php
<?php $stackedBar = new BarChart([
	'id' => 'my-stacked-bar-chart-id',
    'data' => [
		['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General', 'Western', 'Literature'],
		['2000', 20, 30, 35, 40, 45, 30],
		['2005', 14, 20, 25, 30, 48, 30],
		['2010', 10, 24, 20, 32, 18, 5],
		['2015', 15, 25, 30, 35, 20, 15],
		['2020', 16, 22, 23, 30, 16, 9],
		['2025', 12, 26, 20, 40, 20, 30],
		['2030', 28, 19, 29, 30, 12, 13]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'fontSize' => 12,
        'chartArea' => [
        	'left' => '5%',
        	'width' => '90%',
        	'height' => 350
        ],
        'isStacked' => true,
        'tooltip' => [
        	'textStyle' => [
        		'fontName' => 'Verdana',
        		'fontSize' => 13
        	]
        ],
        'hAxis' => [
        	'gridlines' => [
        		'color' => '#e5e5e5',
        		'count' => 10
        	],            	
        	'minValue' => 0
        ],
        'legend' => [
        	'position' => 'top',
        	'alignment' => 'center',
        	'textStyle' => [
        		'fontSize' => 12
        	]
        ]            
    ]
]);

echo $stackedBar->render();

?>
```

### Histogram Example
```php
...
use Ajaz\Google\HistogramChart;
...
```
![demo](http://img.sbannikov.info/Histogram.png)
```php
<?php $histogram = new HistogramChart([
	'id' => 'my-simple-histogram-id',
	'data' => [
		['Dinosaur', 'Length'],
		['Acrocanthosaurus (top-spined lizard)', 12.2],
		['Albertosaurus (Alberta lizard)', 9.1],
		['Allosaurus (other lizard)', 12.2],
		['Apatosaurus (deceptive lizard)', 22.9],
		['Archaeopteryx (ancient wing)', 0.9],
		['Argentinosaurus (Argentina lizard)', 36.6],
		['Baryonyx (heavy claws)', 9.1],
		['Brachiosaurus (arm lizard)', 30.5],
		['Ceratosaurus (horned lizard)', 6.1],
		['Coelophysis (hollow form)', 2.7],
		['Compsognathus (elegant jaw)', 0.9],
		['Deinonychus (terrible claw)', 2.7],
		['Diplodocus (double beam)', 27.1],
		['Dromicelomimus (emu mimic)', 3.4],
		['Gallimimus (fowl mimic)', 5.5],
		['Mamenchisaurus (Mamenchi lizard)', 21.0],
		['Megalosaurus (big lizard)', 7.9],
		['Microvenator (small hunter)', 1.2],
		['Ornithomimus (bird mimic)', 4.6],
		['Oviraptor (egg robber)', 1.5],
		['Plateosaurus (flat lizard)', 7.9],
		['Sauronithoides (narrow-clawed lizard)', 2.0],
		['Seismosaurus (tremor lizard)', 45.7],
		['Spinosaurus (spiny lizard)', 12.2],
		['Supersaurus (super lizard)', 30.5],
		['Tyrannosaurus (tyrant lizard)', 15.2],
		['Ultrasaurus (ultra lizard)', 30.5],
		['Velociraptor (swift robber)', 1.8]
	],
	'options' => [
	    'fontName' => 'Verdana',
	    'height' => 400,
	    'fontSize' => 12,
	    'chartArea' => [
	    	'left' => '5%',
	    	'width' => '90%',
	    	'height' => 350
	    ],
	    'isStacked' => true,
	    'tooltip' => [
	    	'textStyle' => [
	    		'fontName' => 'Verdana',
	    		'fontSize' => 13
	    	]
	    ],
	    'vAxis' => [
	    	'title' => 'Dinosaur length',
	    	'titleTextStyle' => [
	    		'fontSize' => 13,
	    		'italic' => false
	    	],        	
	    	'gridlines' => [
	    		'color' => '#e5e5e5',
	    		'count' => 10
	    	],            	
	    	'minValue' => 0
	    ],        
	    'hAxis' => [
	    	'gridlines' => [
	    		'color' => '#e5e5e5'
	    	],            	
	    	'minValue' => 0
	    ],
	    'legend' => [
	    	'position' => 'top',
	    	'alignment' => 'center',
	    	'textStyle' => [
	    		'fontSize' => 12
	    	]
	    ]            
	]
]);

echo $histogram->render();

?>
```

### Combo Chart Example
```php
...
use Ajaz\Google\ComboChart;
...
```
![demo](http://img.sbannikov.info/ComboChart.png)
```php
<?php $comboChart = new ComboChart([
	'id' => 'my-combo-chart-id',
	'data' => [
		['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
		['2004/05',  165,      938,         522,             998,           450,      614.6],
		['2005/06',  135,      1120,        599,             1268,          288,      682],
		['2006/07',  157,      1167,        587,             807,           397,      623],
		['2007/08',  139,      1110,        615,             968,           215,      609.4],
		['2008/09',  136,      691,         629,             1026,          366,      569.6]
	],
	'options' => [
	    'fontName' => 'Verdana',
	    'height' => 400,
	    'fontSize' => 12,
	    'chartArea' => [
	    	'left' => '5%',
	    	'width' => '90%',
	    	'height' => 350
	    ],
	    'seriesType' => 'bars',
		'series' => [
			5 => [
				'type' => 'line',
				'pointSize' => 5
			]
		],        
	    'tooltip' => [
	    	'textStyle' => [
	    		'fontName' => 'Verdana',
	    		'fontSize' => 13
	    	]
	    ],
	    'vAxis' => [
	    	'gridlines' => [
	    		'color' => '#e5e5e5',
	    		'count' => 10
	    	],            	
	    	'minValue' => 0
	    ],        
	    'legend' => [
	    	'position' => 'top',
	    	'alignment' => 'center',
	    	'textStyle' => [
	    		'fontSize' => 12
	    	]
	    ]            
	]
]);

echo $comboChart->render();

?>
```

### Line Chart Example
```php
...
use Ajaz\Google\LineChart;
...
```
1) Simple Line Chart

![demo](http://img.sbannikov.info/LineChartSimple.png)
```php
<?php $lineChart = new LineChart([
	'id' => 'my-simple-line-chart-id',
	'data' => [
		['Year', 'Sales', 'Expenses'],
		['2004',  1000,      400],
		['2005',  1170,      460],
		['2006',  660,       1120],
		['2007',  1030,      540]
	],
	'options' => [
	    'fontName' => 'Verdana',
	    'height' => 400,
	    'curveType' => 'function',
	    'fontSize' => 12,
	    'chartArea' => [
	    	'left' => '5%',
	    	'width' => '90%',
	    	'height' => 350
	    ],
	    'pointSize' => 4,
	    'tooltip' => [
	    	'textStyle' => [
	    		'fontName' => 'Verdana',
	    		'fontSize' => 13
	    	]
	    ],
	    'vAxis' => [
	    	'title' => 'Sales and Expenses',
			'titleTextStyle' => [
				'fontSize' => 13,
				'italic' => false
			],        	
	    	'gridlines' => [
	    		'color' => '#e5e5e5',
	    		'count' => 10
	    	],            	
	    	'minValue' => 0
	    ],        
	    'legend' => [
	    	'position' => 'top',
	    	'alignment' => 'center',
	    	'textStyle' => [
	    		'fontSize' => 12
	    	]
	    ]            
	]
]);

echo $lineChart->render();

?>
```

2) Line Intervals Chart

![demo](http://img.sbannikov.info/LineChartIntervals.png)
```php
<?php $lineInterVals = new LineChart([
	'id' => 'my-line-intervals-id',
	'isIntervalType' => true,
	'data' => [
		['a', 100, 90, 110, 85, 96, 104, 120],
		['b', 120, 95, 130, 90, 113, 124, 140],
		['c', 130, 105, 140, 100, 117, 133, 139],
		['d', 90, 85, 95, 85, 88, 92, 95],
		['e', 70, 74, 63, 67, 69, 70, 72],
		['f', 30, 39, 22, 21, 28, 34, 40],
		['g', 80, 77, 83, 70, 77, 85, 90],
		['h', 100, 90, 110, 85, 95, 102, 110]
	],
	'options' => [
		'fontName' => 'Verdana',
		'height' => 400,
		'curveType' => 'function',
		'fontSize' => 12,
		'chartArea' => [
			'left' => '5%',
			'width' => '90%',
			'height' => 350
		],
		'lineWidth' => 3,
		'tooltip' => [
			'textStyle' => [
				'fontName' => 'Verdana',
				'fontSize' => 13
			]
		],
		'series' => [
			[
				'color' => '#EF5350'
			]
		],
		'intervals' => [
			'style' => 'line'
		],
		'pointSize' => 5,	
		'vAxis' => [
			'title' => 'Number values',
			'titleTextStyle' => [
				'fontSize' => 13,
				'italic' => false
			],        	
			'gridlines' => [
				'color' => '#e5e5e5',
				'count' => 10
			],            	
			'minValue' => 0
		],        
		'legend' => 'none'            
	]
]);

echo $lineInterVals->render();

?>
```

3) Line Intervals Area Chart

![demo](http://img.sbannikov.info/LineChartIntervalsArea.png)
```php
<?php $lineAreaChart = new LineChart([
	'id' => 'my-area-intervals-id',
	'isIntervalType' => true,
	'data' => [
		['a', 100, 90, 110, 85, 96, 104, 120],
		['b', 120, 95, 130, 90, 113, 124, 140],
		['c', 130, 105, 140, 100, 117, 133, 139],
		['d', 90, 85, 95, 85, 88, 92, 95],
		['e', 70, 74, 63, 67, 69, 70, 72],
		['f', 30, 39, 22, 21, 28, 34, 40],
		['g', 80, 77, 83, 70, 77, 85, 90],
		['h', 100, 90, 110, 85, 95, 102, 110]
	],
	'options' => [
		'fontName' => 'Verdana',
		'height' => 400,
		'curveType' => 'function',
		'fontSize' => 12,
		'chartArea' => [
			'left' => '5%',
			'width' => '90%',
			'height' => 350
		],
		'lineWidth' => 2,
		'tooltip' => [
			'textStyle' => [
				'fontName' => 'Verdana',
				'fontSize' => 13
			]
		],
		'series' => [
			[
				'color' => '#43A047'
			]
		],
		'intervals' => [
			'style' => 'area'
		],
		'pointSize' => 5,	
		'vAxis' => [
			'title' => 'Number values',
			'titleTextStyle' => [
				'fontSize' => 13,
				'italic' => false
			],        	
			'gridlines' => [
				'color' => '#e5e5e5',
				'count' => 10
			],            	
			'minValue' => 0
		],        
		'legend' => 'none'            
	]
]);

echo $lineAreaChart->render();

?>
```

### Area Chart Example
```php
...
use Ajaz\Google\AreaChart;
...
```
1) Simple Area Chart

![demo](http://img.sbannikov.info/AreaChart.png)
```php
<?php $areaChart = new AreaChart([
	'id' => 'my-simple-area-chart-id',
    'data' => [
		['Year', 'Sales', 'Expenses'],
		['2004',  1000,      400],
		['2005',  1170,      460],
		['2006',  660,       1120],
		['2007',  1030,      540]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 400,
        'curveType' => 'function',
        'fontSize' => 12,
        'areaOpacity' => 0.4,
        'chartArea' => [
        	'left' => '5%',
        	'width' => '90%',
        	'height' => 350
        ],
        'pointSize' => 4,
        'tooltip' => [
        	'textStyle' => [
        		'fontName' => 'Verdana',
        		'fontSize' => 13
        	]
        ],
        'vAxis' => [
        	'title' => 'Sales and Expenses',
			'titleTextStyle' => [
				'fontSize' => 13,
				'italic' => false
			],        	
        	'gridarea' => [
        		'color' => '#e5e5e5',
        		'count' => 10
        	],            	
        	'minValue' => 0
        ],        
        'legend' => [
        	'position' => 'top',
        	'alignment' => 'end',
        	'textStyle' => [
        		'fontSize' => 12
        	]
        ]            
    ]
]);

echo $areaChart->render();

?>
```

2) Stacked Area Chart

![demo](http://img.sbannikov.info/AreaChartStacked.png)
```php
<?php $stackedAreaChart = new AreaChart([
	'id' => 'my-staked-area-chart-id',
	'data' => [
		['Year', 'Cars', 'Trucks', 'Drones', 'Segways'],
		['2013',  870,  460, 310, 220],
		['2014',  460,  720, 220, 460],
		['2015',  930,  640, 340, 330],
		['2016',  1000,  400, 180, 500]
	],
	'options' => [
		'fontName' => 'Verdana',
		'height' => 400,
		'curveType' => 'function',
		'fontSize' => 12,
		'areaOpacity' => 0.4,
		'chartArea' => [
			'left' => '5%',
			'width' => '90%',
			'height' => 350
		],
		'isStacked' => true,
		'pointSize' => 4,
		'tooltip' => [
			'textStyle' => [
				'fontName' => 'Verdana',
				'fontSize' => 13
			]
		],
		'lineWidth' => 1.5,
		'vAxis' => [
			'title' => 'Number values',
			'titleTextStyle' => [
				'fontSize' => 13,
				'italic' => false
			],        	
			'gridlines' => [
				'color' => '#e5e5e5',
				'count' => 10
			],            	
			'minValue' => 0
		],        
		'legend' => [
			'position' => 'top',
			'alignment' => 'end',
			'textStyle' => [
				'fontSize' => 12
			]
		]            
	]
]);

echo $stackedAreaChart->render();

?>
```


### Pie Chart Example
```php
...
use Ajaz\Google\PieChart;
...
```
![demo](http://img.sbannikov.info/PieChart.png)
```php
<?php $pieChart = new PieChart([
    'id' => 'my-pie-chart-id',
    'data' => [
        ['Major', 'Degrees'],
        ['Business', 256070],
        ['Education', 108034],
        ['Social Sciences & History', 127101],
        ['Health', 81863],
        ['Psychology', 74194]
    ],
    'extraData' => [
        ['Major', 'Degrees'],
        ['Business', 358293],
        ['Education', 101265],
        ['Social Sciences & History', 172780],
        ['Health', 129634],
        ['Psychology', 97216]
    ],                
    'options' => [
        'fontName' => 'Verdana',
        'height' => 300,
        'width' => 500,
        'chartArea' => [
            'left' => 50,
            'width' => '90%',
            'height' => '90%'
        ],
        'diff' => [
            'extraData' => [
                'inCenter' => false
            ]
        ]
    ]
]);

echo $pieChart->render();

?>
```

### Sankey Diagram Example
```php
...
use Ajaz\Google\SankeyChart;
...
```
![demo](http://img.sbannikov.info/Sankey.png)
```php
<?php $sankeyChart = new SankeyChart([
    'id' => 'my-sankey-diagram-id',
    'data' => [
        [ 'Brazil', 'Portugal', 4 ],
        [ 'Brazil', 'France', 1 ],
        [ 'Brazil', 'Spain', 1 ],
        [ 'Brazil', 'England', 1 ],
        [ 'Canada', 'Portugal', 1 ],
        [ 'Canada', 'France', 4 ],
        [ 'Canada', 'England', 1 ],
        [ 'Mexico', 'Portugal', 1 ],
        [ 'Mexico', 'France', 1 ],
        [ 'Mexico', 'Spain', 4 ],
        [ 'Mexico', 'England', 1 ],
        [ 'USA', 'Portugal', 1 ],
        [ 'USA', 'France', 1 ],
        [ 'USA', 'Spain', 1 ],
        [ 'USA', 'England', 4 ],
        [ 'Portugal', 'Angola', 2 ],
        [ 'Portugal', 'Senegal', 1 ],
        [ 'Portugal', 'Morocco', 1 ],
        [ 'Portugal', 'South Africa', 3 ],
        [ 'France', 'Angola', 1 ],
        [ 'France', 'Mali', 3 ],
        [ 'France', 'Morocco', 3 ],
        [ 'France', 'South Africa', 1 ],
        [ 'Spain', 'Senegal', 1 ],
        [ 'Spain', 'Morocco', 3 ],
        [ 'Spain', 'South Africa', 1 ],
        [ 'England', 'Angola', 1 ],
        [ 'England', 'Senegal', 1 ],
        [ 'England', 'Morocco', 2 ],
        [ 'England', 'South Africa', 4 ],
        [ 'South Africa', 'India', 1 ],
        [ 'South Africa', 'Japan', 3 ],
        [ 'Angola', 'China', 2 ],
        [ 'Angola', 'India', 1 ],
        [ 'Angola', 'Japan', 3 ],
        [ 'Senegal', 'China', 2 ],
        [ 'Senegal', 'India', 1 ],
        [ 'Senegal', 'Japan', 3 ],
        [ 'Mali', 'China', 2 ],
        [ 'Mali', 'India', 1 ],
        [ 'Mali', 'Japan', 3 ],
        [ 'Morocco', 'China', 2 ],
        [ 'Morocco', 'India', 1 ],
        [ 'Morocco', 'Japan', 3 ],
        [ 'Morocco', 'Senegal', 1 ]
    ],
    'options' => [
        'height' => 400,
        'sankey' => [
            'link' => [
                'color' => [
                    'fill' => '#eee',
                    'fillOpacity' => 0.3
                ]
            ],
            'node' => [
                'width' => 8,
                'nodePadding' => 80,
                'label' => [
                    'fontName' => 'Verdana',
                    'fontSize' => 13
                ]
            ]
        ]
    ]
]);

echo $sankeyChart->render();

?>
```

### Geo Chart Example
```php
...
use Ajaz\Google\GeoChart;
...
```
![demo](http://img.sbannikov.info/GeoChartRegions.png)
```php
<?php $geoChart = new GeoChart([
    'id' => 'my-regions-geo-chart-id',
    'data' => [
        ['Country', 'Popularity'],
        ['Germany', 200],
        ['United States', 300],
        ['Brazil', 400],
        ['Canada', 500],
        ['France', 600],
        ['RU', 700]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 500,
        'width' => '100%',
        'fontSize' => 12,
        'tooltip' => [
            'textStyle' => [
                'fontName' => 'Verdana',
                'fontSize' => 13
            ]
        ]              
    ]
]);

echo $geoChart->render();

?>
```

### Bubble Chart Example
```php
...
use Ajaz\Google\BubbleChart;
...
```
1) Simple Bubble Chart

![demo](http://img.sbannikov.info/BubbleChartSimple.png)
```php
<?php $bubbleChart = new BubbleChart([
    'id' => 'my-simple-bubble-chart-id',
    'data' => [
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region'],
        ['CAN',    82.66,              1.67,      'North America'],
        ['DEU',    79.84,              1.36,      'Europe'],
        ['DNK',    70.6,               1.84,      'Europe'],
        ['EGY',    72.73,              2.78,      'Middle East'],
        ['GBR',    75.05,              2,         'Europe'],
        ['IRN',    72.49,              0.7,       'Middle East'],
        ['IRQ',    68.09,              4.77,      'Middle East'],
        ['ISR',    81.55,              3.96,      'Middle East'],
        ['RUS',    68.6,               1.54,      'Europe'],
        ['USA',    78.09,              3.05,      'North America']
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 450,
        'fontSize' => 12,
        'chartArea' => [
            'left' => 50,
            'width' => '90%',
            'height' => 400
        ],
        'tooltip' => [
            'textStyle' => [
                'fontName' => 'Verdana',
                'fontSize' => 13
            ]
        ],
        'vAxis' => [
            'title' => 'Fertility Rate',
            'titleTextStyle' => [
                'fontSize' => 13,
                'italic' => false
            ],
            'gridlines' => [
                'color' => '#e5e5e5',
                'count' => 10
            ],
            'minValue' => 0
        ],
        'bubble' => [
            'textStyle' => [
                'auraColor' => 'none',
                'color' => '#fff'
            ],
            'stroke' => '#fff'
        ],
        'legend' => [
            'position' => 'top',
            'alignment' => 'center',
            'textStyle' => [
                'fontSize' => 12
            ]
        ]
    ]
]);

echo $bubbleChart->render();

?>
```

2) Bubble Chart Color by Numbers

![demo](http://img.sbannikov.info/BubbleChartColorByNumbers.png)
```php
<?php $bubbleChart1 = new BubbleChart([
    'id' => 'my-colnumb-bubble-chart-id',
    'data' => [
        ['ID', 'X', 'Y', 'Temperature'],
        ['',   80,  167,      120],
        ['',   79,  136,      130],
        ['',   78,  184,      50],
        ['',   72,  278,      230],
        ['',   81,  200,      210],
        ['',   72,  170,      100],
        ['',   68,  477,      80]
    ],
    'options' => [
        'fontName' => 'Verdana',
        'height' => 450,
        'fontSize' => 12,
        'chartArea' => [
            'left' => 50,
            'width' => '90%',
            'height' => 400
        ],
        'tooltip' => [
            'textStyle' => [
                'fontName' => 'Verdana',
                'fontSize' => 13
            ]
        ],
        'vAxis' => [
            'gridlines' => [
                'color' => '#e5e5e5',
                'count' => 10
            ],
            'minValue' => 0
        ],
        'bubble' => [
            'textStyle' => [
                'fontSize' => 11
            ],
            'stroke' => '#fff'
        ]
    ]
]);

echo $bubbleChart1->render();

?>
```
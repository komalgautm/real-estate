 /***********************Start js time_start**************************/
function waitAndshow() {
       var systemdate = new Date();
       document.getElementById("time_start").innerHTML = systemdate.toLocaleTimeString();
     }
      setInterval(waitAndshow, 4000);

 /***********************End time_start**************************/


$(document).ready(function() {
    $('#example').DataTable();
} );
/**/
 $(function(){
        $('.dropdown_position').hover(function() {
            $('.drpmenu').addClass('show');
        },
        function() {
            $('.drpmenu').removeClass('show');
        });
    });


 /***********************monthlygraph**************************/
  $(document).ready(function(){
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#monthlygraph").select2({
          data:sportslist
        });

        //dailygraph
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#dailyUpdated").select2({
          data:sportslist
        });

        //linegraphOne
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#linegraphOne").select2({
          data:sportslist
        });

        //linegraphTwo
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#linegraphTwo").select2({
          data:sportslist
        });

        //twoColorGraph
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#twoColorGraph").select2({
          data:sportslist
        });
        
        //fourColorGraph
        var sportslist=
        [
           "selectone","selecttow","selectthree","selectfor","selectfive"
        ];
        $("#fourColorGraph").select2({
          data:sportslist
        });
    });
 /*************************************************/

 /***********************For color graph**************************/
 var myConfig = {
  "type": "line",
  "utc": true,
  "title": {
    "text": "",
    "font-size": "24px",
    "adjust-layout": true
  },
  "plotarea": {
    "margin": "dynamic 45 60 dynamic",
  },
  "legend": {
    "layout": "float",
    "background-color": "none",
    "border-width": 0,
    "shadow": 0,
    "align": "center",
    "adjust-layout": true,
    "toggle-action": "remove",
    "item": {
      "padding": 7,
      "marginRight": 17,
      "cursor": "hand"
    }
  },
  "scale-x": {
    "min-value": 1383292800000,
    "shadow": 0,
    "step": 3600000,
    "transform": {
      "type": "date",
      "all": "%D, %d %M<br />%h:%i %A",
      "item": {
        "visible": false
      }
    },
    "label": {
      "visible": false
    },
    "minor-ticks": 0
  },
  "scale-y": {
    "line-color": "#f6f7f8",
    "shadow": 0,
    "guide": {
      "line-style": "dashed"
    },
    "label": {
      "text": "Page Views",
    },
    "minor-ticks": 0,
    "thousands-separator": ","
  },
  "crosshair-x": {
    "line-color": "#efefef",
    "plot-label": {
      "border-radius": "5px",
      "border-width": "1px",
      "border-color": "#f6f7f8",
      "padding": "10px",
      "font-weight": "bold"
    },
    "scale-label": {
      "font-color": "#000",
      "background-color": "#f6f7f8",
      "border-radius": "5px"
    }
  },
  "tooltip": {
    "visible": false
  },
  "plot": {
    "highlight": true,
    "tooltip-text": "%t views: %v<br>%k",
    "shadow": 0,
    "line-width": "2px",
    "marker": {
      "type": "circle",
      "size": 3
    },
    "highlight-state": {
      "line-width": 3
    },
    "animation": {
      "effect": 1,
      "sequence": 2,
      "speed": 100,
    }
  },
  "series": [{
      "values": [
        149.2,
        174.3,
        187.7,
        147.1,
        129.6,
        189.6,
        230,
        164.5,
        171.7,
        163.4,
        194.5,
        200.1,
        193.4,
        254.4,
        287.8,
        246,
        199.9,
        218.3,
        244,
        312.2,
        284.5,
        249.2,
        305.2,
        286.1,
        347.7,
        278,
        240.3,
        212.4,
        237.1,
        253.2,
        186.1,
        153.6,
        168.5,
        140.9,
        86.9,
        49.4,
        24.7,
        64.8,
        114.4,
        137.4
      ],
      "text": "",
      "line-color": "#007790",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#007790",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#69dbf1"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#007790",
      }
    },
    {
      "values": [
        714.6,
        656.3,
        660.6,
        729.8,
        731.6,
        682.3,
        654.6,
        673.5,
        700.6,
        755.2,
        817.8,
        809.1,
        815.2,
        836.6,
        897.3,
        896.9,
        866.5,
        835.8,
        797.9,
        784.7,
        802.8,
        749.3,
        722.1,
        688.1,
        730.4,
        661.5,
        609.7,
        630.2,
        633,
        604.2,
        558.1,
        581.4,
        511.5,
        556.5,
        542.1,
        599.7,
        664.8,
        725.3,
        694.2,
        690.5
      ],
      "text": "",
      "line-color": "#009872",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#009872",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#69f2d0"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#009872",
      }
    },
    {
      "values": [
        536.9,
        576.4,
        639.3,
        669.4,
        708.7,
        691.5,
        681.7,
        673,
        701.8,
        636.4,
        637.8,
        640.5,
        653.1,
        613.7,
        583.4,
        538,
        506.7,
        563.1,
        541.4,
        489.3,
        434.7,
        442.1,
        482.3,
        495.4,
        556.1,
        505.4,
        463.8,
        434.7,
        377.4,
        325.4,
        351.7,
        343.5,
        333.2,
        332,
        378.9,
        415.4,
        385,
        412.6,
        445.9,
        441.5
      ],
      "text": "",
      "line-color": "#da534d",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#da534d",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#faa39f"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#da534d",
      }
    }
  ]
};
 
zingchart.render({
  id: 'myChart',
  data: myConfig,
  height: '100%',
  width: '100%'
});

 /***********************For color graph**************************/
 var myConfig2 = {
  "type": "line",
  "utc": true,
  "title": {
    "text": "",
    "font-size": "24px",
    "adjust-layout": true
  },
  "plotarea": {
    "margin": "dynamic 45 60 dynamic",
  },
  "legend": {
    "layout": "float",
    "background-color": "none",
    "border-width": 0,
    "shadow": 0,
    "align": "center",
    "adjust-layout": true,
    "toggle-action": "remove",
    "item": {
      "padding": 7,
      "marginRight": 17,
      "cursor": "hand"
    }
  },
  "scale-x": {
    "min-value": 1383292800000,
    "shadow": 0,
    "step": 3600000,
    "transform": {
      "type": "date",
      "all": "%D, %d %M<br />%h:%i %A",
      "item": {
        "visible": false
      }
    },
    "label": {
      "visible": false
    },
    "minor-ticks": 0
  },
  "scale-y": {
    "line-color": "#f6f7f8",
    "shadow": 0,
    "guide": {
      "line-style": "dashed"
    },
    "label": {
      "text": "Page Views",
    },
    "minor-ticks": 0,
    "thousands-separator": ","
  },
  "crosshair-x": {
    "line-color": "#efefef",
    "plot-label": {
      "border-radius": "5px",
      "border-width": "1px",
      "border-color": "#f6f7f8",
      "padding": "10px",
      "font-weight": "bold"
    },
    "scale-label": {
      "font-color": "#000",
      "background-color": "#f6f7f8",
      "border-radius": "5px"
    }
  },
  "tooltip": {
    "visible": false
  },
  "plot": {
    "highlight": true,
    "tooltip-text": "%t views: %v<br>%k",
    "shadow": 0,
    "line-width": "2px",
    "marker": {
      "type": "circle",
      "size": 3
    },
    "highlight-state": {
      "line-width": 3
    },
    "animation": {
      "effect": 1,
      "sequence": 2,
      "speed": 100,
    }
  },
  "series": [{
      "values": [
        149.2,
        174.3,
        187.7,
        147.1,
        129.6,
        189.6,
        230,
        164.5,
        171.7,
        163.4,
        194.5,
        200.1,
        193.4,
        254.4,
        287.8,
        246,
        199.9,
        218.3,
        244,
        312.2,
        284.5,
        249.2,
        305.2,
        286.1,
        347.7,
        278,
        240.3,
        212.4,
        237.1,
        253.2,
        186.1,
        153.6,
        168.5,
        140.9,
        86.9,
        49.4,
        24.7,
        64.8,
        114.4,
        137.4
      ],
      "text": "",
      "line-color": "#007790",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#007790",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#69dbf1"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#007790",
      }
    },
    {
      "values": [
        714.6,
        656.3,
        660.6,
        729.8,
        731.6,
        682.3,
        654.6,
        673.5,
        700.6,
        755.2,
        817.8,
        809.1,
        815.2,
        836.6,
        897.3,
        896.9,
        866.5,
        835.8,
        797.9,
        784.7,
        802.8,
        749.3,
        722.1,
        688.1,
        730.4,
        661.5,
        609.7,
        630.2,
        633,
        604.2,
        558.1,
        581.4,
        511.5,
        556.5,
        542.1,
        599.7,
        664.8,
        725.3,
        694.2,
        690.5
      ],
      "text": "",
      "line-color": "#009872",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#009872",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#69f2d0"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#009872",
      }
    },
    {
      "values": [
        536.9,
        576.4,
        639.3,
        669.4,
        708.7,
        691.5,
        681.7,
        673,
        701.8,
        636.4,
        637.8,
        640.5,
        653.1,
        613.7,
        583.4,
        538,
        506.7,
        563.1,
        541.4,
        489.3,
        434.7,
        442.1,
        482.3,
        495.4,
        556.1,
        505.4,
        463.8,
        434.7,
        377.4,
        325.4,
        351.7,
        343.5,
        333.2,
        332,
        378.9,
        415.4,
        385,
        412.6,
        445.9,
        441.5
      ],
      "text": "",
      "line-color": "#da534d",
      "legend-item": {
        "background-color": "#fff",
        "borderRadius": 5,
        "font-color": "white"
      },
      "legend-marker": {
        "visible": false
      },
      "marker": {
        "background-color": "#da534d",
        "border-width": 1,
        "shadow": 0,
        "border-color": "#faa39f"
      },
      "highlight-marker": {
        "size": 6,
        "background-color": "#da534d",
      }
    }
  ]
};

zingchart.render({
  id: 'lineChart2',
  data: myConfig2,
  height: '100%',
  width: '100%'
});
 /***********************For color graph**************************/
 /***********************For color graph**************************/
 var myConfig33 = {
  type: "bar",
  plot: {
    stacked: true
  },
  series: [{
      values: [20, 40, 25, 50, 15, 45, 33, 34],
      stack: 1
    },
    {
      values: [5, 30, 21, 18, 59, 50, 28, 33],
      stack: 1
    }
  ]
};
 
zingchart.render({
  id: 'myChartHorigontal',
  data: myConfig33,
  height: "100%",
  width: "100%"
});
 /***********************For Two color graph**************************/
 /***********************For Four color graph**************************/

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "",
    fontFamily: "arial black",
    fontColor: "#695A42"
  },
  axisX: {
    interval: 1,
    intervalType: "year"
  },
  axisY:{
    valueFormatString:"#0",
    gridColor: "#B6B1A8",
    tickColor: "#B6B1A8"
  },
  toolTip: {
    shared: true,
    content: toolTipContent
  },
  data: [{
    type: "stackedColumn",
    showInLegend: true,
    color: "#acea8b",
    name: "Q1",
    dataPoints: [
      { y: 6.75, x: new Date(2010,0) },
      { y: 8.57, x: new Date(2011,0) },
      { y: 10.64, x: new Date(2012,0) },
      { y: 13.97, x: new Date(2013,0) },
      { y: 15.42, x: new Date(2014,0) },
      { y: 17.26, x: new Date(2015,0) },
      { y: 20.26, x: new Date(2016,0) }
    ]
    },
    {        
      type: "stackedColumn",
      showInLegend: true,
      name: "Q2",
      color: "#434348",
      dataPoints: [
        { y: 6.82, x: new Date(2010,0) },
        { y: 9.02, x: new Date(2011,0) },
        { y: 11.80, x: new Date(2012,0) },
        { y: 14.11, x: new Date(2013,0) },
        { y: 15.96, x: new Date(2014,0) },
        { y: 17.73, x: new Date(2015,0) },
        { y: 21.5, x: new Date(2016,0) }
      ]
    },
    {        
      type: "stackedColumn",
      showInLegend: true,
      name: "Q3",
      color: "#91b4e7",
      dataPoints: [
        { y: 7.28, x: new Date(2010,0) },
        { y: 9.72, x: new Date(2011,0) },
        { y: 13.30, x: new Date(2012,0) },
        { y: 14.9, x: new Date(2013,0) },
        { y: 18.10, x: new Date(2014,0) },
        { y: 18.68, x: new Date(2015,0) },
        { y: 22.45, x: new Date(2016,0) }
      ]
    },
    {        
      type: "stackedColumn",
      showInLegend: true,
      name: "Q4",
      color: "#ed7d31",
      dataPoints: [
        { y: 8.44, x: new Date(2010,0) },
        { y: 10.58, x: new Date(2011,0) },
        { y: 14.41, x: new Date(2012,0) },
        { y: 16.86, x: new Date(2013,0) },
        { y: 10.64, x: new Date(2014,0) },
        { y: 21.32, x: new Date(2015,0) },
        { y: 26.06, x: new Date(2016,0) }
      ]
  }]
});
chart.render();

function toolTipContent(e) {
  var str = "";
  var total = 0;
  var str2, str3;
  for (var i = 0; i < e.entries.length; i++){
    var  str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\"> "+e.entries[i].dataSeries.name+"</span>: $<strong>"+e.entries[i].dataPoint.y+"</strong>bn<br/>";
    total = e.entries[i].dataPoint.y + total;
    str = str.concat(str1);
  }
  str2 = "<span style = \"color:DodgerBlue;\"><strong>"+(e.entries[0].dataPoint.x).getFullYear()+"</strong></span><br/>";
  total = Math.round(total * 100) / 100;
  str3 = "<span style = \"color:Tomato\">Total:</span><strong> $"+total+"</strong>bn<br/>";
  return (str2.concat(str)).concat(str3);
}

}
 /***********************End Four color graph**************************/

 var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40, 60, 30, 50, 25, 10],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Mon", "Tue", "Wen", "Thu", "Fri", "Sat", "Sun"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 50],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
var BlankonChartFlot = function () {

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function () {
            BlankonChartFlot.basicChartFlot();
            BlankonChartFlot.barChartFlot();
            BlankonChartFlot.pieChartFlot();
            BlankonChartFlot.realtimeChartFlot();
            BlankonChartFlot.bar2ChartFlot();
            BlankonChartFlot.bar3ChartFlot();
        },

        // =========================================================================
        // FLOT CHART / BASIC
        // =========================================================================
        basicChartFlot: function () {
            function showTooltip(x, y, contents) {
                jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    top: y + 5,
                    left: x + 5
                }).appendTo("body").fadeIn(200);
            }

            if($('#flot-basic-chart').length){
                var series1 = [[Date.UTC(2016, 6, 30, 0, 0, 0), 65],[Date.UTC(2016, 6, 30, 1, 0, 0), 12],[Date.UTC(2016, 6, 30, 2, 0, 0), 1],[Date.UTC(2016, 6, 30, 3, 0, 0), 0],[Date.UTC(2016, 6, 30, 4, 0, 0), 0],[Date.UTC(2016, 6, 30, 5, 0, 0), 0],[Date.UTC(2016, 6, 30, 6, 0, 0), 0],[Date.UTC(2016, 6, 30, 7, 0, 0), 16],[Date.UTC(2016, 6, 30, 8, 0, 0), 57],[Date.UTC(2016, 6, 30, 9, 0, 0), 398], [Date.UTC(2016, 6, 30, 10, 0, 0), 668], [Date.UTC(2016, 6, 30, 11, 0, 0),568], [Date.UTC(2016, 6, 30, 12, 0, 0), 620], [Date.UTC(2016, 6, 30, 13, 0, 0), 538], [Date.UTC(2016, 6, 30, 14, 0, 0), 350], [Date.UTC(2016, 6, 30, 15, 0, 0), 576], [Date.UTC(2016, 6, 30, 16, 0, 0), 700], [Date.UTC(2016, 6, 30, 17, 0, 0), 812], [Date.UTC(2016, 6, 30, 18, 0, 0), 650], [Date.UTC(2016, 6, 30, 19, 0, 0), 358], [Date.UTC(2016, 6, 30, 20, 0, 0), 726], [Date.UTC(2016, 6, 30, 21, 0, 0), 282], [Date.UTC(2016, 6, 30, 22, 0, 0), 278], [Date.UTC(2016, 6, 30, 23, 0, 0), 80]];
                var series2 = [[Date.UTC(2016, 6, 30, 0, 0, 0), 37],[Date.UTC(2016, 6, 30, 1, 0, 0), 0],[Date.UTC(2016, 6, 30, 2, 0, 0), 0],[Date.UTC(2016, 6, 30, 3, 0, 0), 0],[Date.UTC(2016, 6, 30, 4, 0, 0), 0],[Date.UTC(2016, 6, 30, 5, 0, 0), 0],[Date.UTC(2016, 6, 30, 6, 0, 0), 0],[Date.UTC(2016, 6, 30, 7, 0, 0), 8],[Date.UTC(2016, 6, 30, 8, 0, 0), 12],[Date.UTC(2016, 6, 30, 9, 0, 0), 252], [Date.UTC(2016, 6, 30, 10, 0, 0), 574], [Date.UTC(2016, 6, 30, 11, 0, 0), 505], [Date.UTC(2016, 6, 30, 12, 0, 0), 478], [Date.UTC(2016, 6, 30, 13, 0, 0), 576], [Date.UTC(2016, 6, 30, 14, 0, 0), 334], [Date.UTC(2016, 6, 30, 15, 0, 0), 427], [Date.UTC(2016, 6, 30, 16, 0, 0), 577], [Date.UTC(2016, 6, 30, 17, 0, 0), 358], [Date.UTC(2016, 6, 30, 18, 0, 0), 426], [Date.UTC(2016, 6, 30, 19, 0, 0), 548], [Date.UTC(2016, 6, 30, 20, 0, 0), 458], [Date.UTC(2016, 6, 30, 21, 0, 0), 467], [Date.UTC(2016, 6, 30, 22, 0, 0), 124], [Date.UTC(2016, 6, 30, 23, 0, 0), 36]];

                var plot = $.plot($("#flot-basic-chart"),
                    [ { data: series1,
                        label: "Coupon generate",
                        color: "#E9573F"
                    },
                        { data: series2,
                            label: "Coupon Redeem",
                            color: "#00B1E1"
                        }
                    ],
                    {
                        series: {
                            lines: {
                                show: true,
                                fill: true,
                                lineWidth: 2,
                                fillColor: {
                                    colors: [ { opacity: 0.5 },
                                        { opacity: 0.5 }
                                    ]
                                }
                            },
                            points: {
                                show: true
                            },
                            shadowSize: 0
                        },
                        legend: {
                            position: 'nw'
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            borderColor: '#ddd',
                            borderWidth: 1,
                            labelMargin: 10,
                            backgroundColor: '#fff',
                            margin: {
                                top: 8,
                                bottom: 20,
                                left: 20
                            }
                        },
                        yaxis: {
                            color: '#eee'
                        },
                        xaxis: {
                            color: '#eee',
                            mode: 'time',
                            timeformat: "%H:%M"
                        }
                    });

                var previousPoint = null;
                $("#flot-basic-chart").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));

                    if(item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showTooltip(item.pageX, item.pageY,
                                item.series.label + " of " + x + " = " + y);
                        }

                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }

                });

                $("#flot-basic-chart").bind("plotclick", function (event, pos, item) {
                    if (item) {
                        plot.highlight(item.series, item.datapoint);
                    }
                });
            }

            var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>")
                .text("No. Of Coupons")
                .appendTo("#flot-basic-chart");

            var d = new Date();
            var datestring = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear();

            var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
                .text('Date: ' + datestring)
                .appendTo("#flot-basic-chart");
        },

        // =========================================================================
        // FLOT CHART / BAR
        // =========================================================================
        barChartFlot: function () {
            if($('#flot-bar-chart').length){
                var bardata = [ ["Jan", 937], ["Feb", 1070], ["Mar", 445], ["Apr", 370], ["May", 900], ["Jun", 321], ["Jul", 280], ["Aug", 290], ["Sep", 370], ["Oct", 1200], ["Nov", 500], ["Dec", 936] ];

                $.plot("#flot-bar-chart", [ bardata ], {
                    series: {
                        lines: {
                            lineWidth: 1
                        },
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center",
                            lineWidth: 0,
                            fillColor: "#81b71a"
                        }
                    },
                    grid: {
                        borderColor: '#ddd',
                        borderWidth: 1,
                        labelMargin: 10,
                        margin: {
                            top: 8,
                            bottom: 20,
                            left: 20
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });

                var yaxisLabel = $("<div class='axisLabel yaxisLabel2'></div>")
                    .text("No. Of Visitors")
                    .appendTo("#flot-bar-chart");

                var d = new Date();
                var datestring = d.getFullYear();

                var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
                    .text('Year: ' + datestring)
                    .appendTo("#flot-bar-chart");
            }
        },

        // =========================================================================
        // FLOT CHART / PIE
        // =========================================================================
        pieChartFlot: function () {
            if($('#flot-pie-chart').length){
                var piedata = [
                    { label: "Skyrail Rainforest", data: [[1,40]], color: '#37BC9B'},
                    { label: "Great Barrier Reef", data: [[1,70]], color: '#8CC152'},
                    { label: "Chillagoe Cave", data: [[1,50]], color: '#00B1E1'},
                    { label: "Trinity Beach", data: [[1,30]], color: '#E9573F'},
                    { label: "Raging Thunder Adventure", data: [[1,60]], color: '#906094'}
                ];

                function labelFormatter(label, series) {
                    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
                }

                $.plot('#flot-pie-chart', piedata, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 2/3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });

            }
        },

        // =========================================================================
        // FLOT CHART / REAL TIME UPDATE
        // =========================================================================
        realtimeChartFlot: function () {
            if($('#flot-realtime-chart').length){
                var data = [], totalPoints = 50;

                function getRandomData() {
                    return [[Date.UTC(2016, 6, 30, 0, 0, 0), 65],[Date.UTC(2016, 6, 30, 1, 0, 0), 12],[Date.UTC(2016, 6, 30, 2, 0, 0), 1],[Date.UTC(2016, 6, 30, 3, 0, 0), 0],[Date.UTC(2016, 6, 30, 4, 0, 0), 0],[Date.UTC(2016, 6, 30, 5, 0, 0), 0],[Date.UTC(2016, 6, 30, 6, 0, 0), 0],[Date.UTC(2016, 6, 30, 7, 0, 0), 16],[Date.UTC(2016, 6, 30, 8, 0, 0), 57],[Date.UTC(2016, 6, 30, 9, 0, 0), 398], [Date.UTC(2016, 6, 30, 10, 0, 0), 668], [Date.UTC(2016, 6, 30, 11, 0, 0),568], [Date.UTC(2016, 6, 30, 12, 0, 0), 620], [Date.UTC(2016, 6, 30, 13, 0, 0), 538], [Date.UTC(2016, 6, 30, 14, 0, 0), 350], [Date.UTC(2016, 6, 30, 15, 0, 0), 576], [Date.UTC(2016, 6, 30, 16, 0, 0), 700], [Date.UTC(2016, 6, 30, 17, 0, 0), 812], [Date.UTC(2016, 6, 30, 18, 0, 0), 650], [Date.UTC(2016, 6, 30, 19, 0, 0), 358], [Date.UTC(2016, 6, 30, 20, 0, 0), 726], [Date.UTC(2016, 6, 30, 21, 0, 0), 282], [Date.UTC(2016, 6, 30, 22, 0, 0), 278], [Date.UTC(2016, 6, 30, 23, 0, 0), 80]];
                }


                // Set up the control widget
                var updateInterval = 3600000;

                var plot4 = $.plot("#flot-realtime-chart", [getRandomData()], {
                    colors: ["#F6BB42"],
                    series: {
                        lines: {
                            fill: true,
                            lineWidth: 0
                        },
                        shadowSize: 0	// Drawing is faster without shadows
                    },
                    grid: {
                        borderColor: '#ddd',
                        borderWidth: 1,
                        labelMargin: 10,
                        margin: {
                            top: 8,
                            bottom: 20,
                            left: 20
                        }
                    },
                    xaxis: {
                        color: '#eee',
                        mode: 'time',
                        timeformat: "%H:%M"
                    },
                    yaxis: {
                        color: '#eee'
                    }
                });

                function update() {

                    plot4.setData(getRandomData());

                    // Since the axes don't change, we don't need to call plot.setupGrid()
                    plot4.draw();
                    setTimeout(update, updateInterval);
                }

                //update();
                plot4.draw();


                var yaxisLabel = $("<div class='axisLabel yaxisLabel4'></div>")
                    .text("Page View")
                    .appendTo("#flot-realtime-chart");

                var d = new Date();
                var datestring = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear();

                var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
                    .text('Year: ' + datestring)
                    .appendTo("#flot-realtime-chart");
            }
        },

        // =========================================================================
        // FLOT CHART / BAR
        // =========================================================================
        bar2ChartFlot: function () {
            if($('#flot-bar2-chart').length){
                var bardata = [ ["Jan", 93700], ["Feb", 107000], ["Mar", 44500], ["Apr", 37000], ["May", 90000], ["Jun", 32100], ["Jul", 28000], ["Aug", 29000], ["Sep", 37000], ["Oct", 120000], ["Nov", 50000], ["Dec", 93600] ];

                $.plot("#flot-bar2-chart", [ bardata ], {
                    series: {
                        lines: {
                            lineWidth: 1
                        },
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center",
                            lineWidth: 0,
                            fillColor: "#81b71a"
                        }
                    },
                    grid: {
                        borderColor: '#ddd',
                        borderWidth: 1,
                        labelMargin: 10,
                        margin: {
                            top: 8,
                            bottom: 20,
                            left: 20
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });


                var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>")
                    .text("Total Transaction")
                    .appendTo("#flot-bar2-chart");

                var d = new Date();
                var datestring = d.getFullYear();

                var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
                    .text('Year: ' + datestring)
                    .appendTo("#flot-bar2-chart");
            }
        },

        // =========================================================================
        // FLOT CHART / BAR
        // =========================================================================
        bar3ChartFlot: function () {
            if($('#flot-bar3-chart').length){
                var bardata = [ ["Jan", 1370], ["Feb", 3700], ["Mar", 2450], ["Apr", 1700], ["May", 4000], ["Jun", 2210], ["Jul", 1800], ["Aug", 1900], ["Sep", 2700], ["Oct", 5540], ["Nov", 2000], ["Dec", 3360] ];

                $.plot("#flot-bar3-chart", [ bardata ], {
                    series: {
                        lines: {
                            lineWidth: 1
                        },
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center",
                            lineWidth: 0,
                            fillColor: "#81b71a"
                        }
                    },
                    grid: {
                        borderColor: '#ddd',
                        borderWidth: 1,
                        labelMargin: 10,
                        margin: {
                            top: 8,
                            bottom: 20,
                            left: 20
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });


                var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>")
                    .text("Total Transaction")
                    .appendTo("#flot-bar3-chart");

                var d = new Date();
                var datestring = d.getFullYear();

                var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
                    .text('Year: ' + datestring)
                    .appendTo("#flot-bar3-chart");
            }
        },

    };

}();

// Call main app init
BlankonChartFlot.init();
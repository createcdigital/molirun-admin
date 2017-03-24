var BlankonDashboard = function () {

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function () {
            BlankonDashboard.counterOverview();
            //BlankonDashboard.callModal1();
            //BlankonDashboard.weatherIcons();
            //BlankonDashboard.gritterNotification();
            //BlankonDashboard.realtimeStatusChart();
            //BlankonDashboard.countNumber();
            //BlankonDashboard.dropzone();
        },

        // =========================================================================
        // COUNTER OVERVIEW
        // =========================================================================
        counterOverview: function () {
            if($('.counter').length){
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            }
        },

        // =========================================================================
        // CALL MODAL FIRST
        // =========================================================================
        callModal1: function () {
            $('#modal-bootstrap-tour').modal(
                {
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                }
            );
        },

        // =========================================================================
        // CALL MODAL SECOND
        // =========================================================================
        callModal2: function () {
            $('#modal-bootstrap-tour-new-features').modal(
                {
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                }
            );
        },

        // =========================================================================
        // INITIALIZE THE TOUR
        // =========================================================================
        handleTour: function () {
            // Instance the tour
            var tour = new Tour({
                name: "tour",
                steps: [
                    {
                        element: "#tour-1",
                        title: "Logo Website",
                        content: "Drop your company logo on here with size width: 175px & height: 50px",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-2",
                        title: "Sidebar Navigation",
                        content: "Click for change to sidebar default to sidebar minimize navigation.",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-3",
                        title: "Form Search",
                        content: "Search engine powerfull with autocomplete plugin. Just sample type blankon on here.",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-4",
                        title: "Navbar Messages",
                        content: "All messages shortcut can ben handle on here, plus with animation label for attention user.",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-5",
                        title: "Navbar Notifications",
                        content: "All notifications shortcut can ben handle on here, plus with animation label for attention user.",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-6",
                        title: "Menu Profile",
                        content: "Handle menu profile on here, just simple like this.",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-7",
                        title: "Sidebar Right Navigation",
                        content: "Click for show sidebar right to content Blankon.",
                        placement: "left"
                    },
                    {
                        element: "#tour-8",
                        title: "Sidebar Header Avatar",
                        content: "Drop your amazing avatar on here",
                        placement: "right"
                    },
                    {
                        element: "#tour-9",
                        title: "Sidebar Left Navigation",
                        content: "Main menu on sidebar left",
                        placement: "right"
                    },
                    {
                        element: "#tour-10",
                        title: "Sidebar Left Navigation",
                        content: "Additional tools sidebar",
                        placement: "top"
                    },
                    {
                        element: "#tour-11",
                        title: "Header Content",
                        content: "Title, subtitle and breadcrumb can be handle on here",
                        placement: "bottom"
                    },
                    {
                        element: "#tour-12",
                        title: "Page Content",
                        content: "Create your overview system website on here",
                        placement: "top"
                    },
                    {
                        element: "#tour-13",
                        title: "Page Content",
                        content: "Handle all daily visitor on here",
                        placement: "top"
                    },
                    {
                        element: "#tour-14",
                        title: "Page Content",
                        content: "Widget weather with animation icons weather",
                        placement: "left"
                    },
                    {
                        element: "#tour-15",
                        title: "Page Content",
                        content: "Simple post your blog on here",
                        placement: "left"
                    },
                    {
                        element: "#tour-16",
                        title: "Page Content",
                        content: "Sample your list members",
                        placement: "top"
                    },
                    {
                        element: "#tour-17",
                        title: "Page Content",
                        content: "Mini additional overview social media on here",
                        placement: "left"
                    },
                    {
                        element: "#tour-18",
                        title: "Page Content",
                        content: "Just sample upload system your application",
                        placement: "top"
                    },
                    {
                        element: "#tour-19",
                        title: "Footer Content",
                        content: "Handle copyright application",
                        placement: "top"
                    },
                    {
                        element: "#tour-20",
                        title: "Footer Content",
                        content: "Additional style for handle storage system",
                        placement: "top"
                    }
                ],
                container: "body",
                next: 0,
                prev: 0,
                keyboard: true,
                storage: false,
                debug: false,
                backdrop: false,
                backdropContainer: 'body',
                backdropPadding: 0,
                redirect: true,
                orphan: false,
                duration: false,
                delay: false,
                basePath: "",
                template: "<div class='popover tour'>" +
                "<div class='arrow'></div>" +
                "<h3 class='popover-title'></h3>" +
                "<div class='popover-content'></div>" +
                "<div class='popover-navigation'>" +
                "<button class='btn btn-primary btn-sm' data-role='prev'>« Prev</button>" +
                "<span data-role='separator'></span>" +
                "<button class='btn btn-primary btn-sm' data-role='next'>Next »</button>" +
                "<span data-role='separator'></span>" +
                "<button class='btn btn-danger btn-sm' data-role='end'>End tour</button>" +
                "</div>" +
                "</div>" +
                "</div>",
                afterGetState: function (key, value) {},
                afterSetState: function (key, value) {},
                afterRemoveState: function (key, value) {},
                onStart: function (tour) {},
                onEnd: function (tour) {
                    $('#modal-bootstrap-tour-end').modal(
                        {
                            show: true
                        }
                    );
                    $('#modal-bootstrap-tour-end').on('hide.bs.modal', function () {
                        BlankonDashboard.sessionTimeout();
                    });
                },
                onShow: function (tour) {},
                onShown: function (tour) {},
                onHide: function (tour) {},
                onHidden: function (tour) {},
                onNext: function (tour) {},
                onPrev: function (tour) {},
                onPause: function (tour, duration) {},
                onResume: function (tour, duration) {},
                onRedirectError: function (tour) {}
            });

            // Initialize the tour
            tour.init();

            // Start the tour
            tour.start();
        },

        // =========================================================================
        // WEATHER ICONS
        // =========================================================================
        weatherIcons: function () {
            var icons = new Skycons({"color": "white"},{"resizeClear": true}),
                list  = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for(i = list.length; i--; )
                icons.set(list[i], list[i]);

            icons.play();
        },

        // =========================================================================
        // GRITTER NOTIFICATION
        // =========================================================================
        gritterNotification: function () {
            // display marketing alert only once
            if($('#wrapper').css('opacity')) {
                if (!$.cookie('intro')) {

                    // Gritter notification intro 1
                    setTimeout(function () {
                        var unique_id = $.gritter.add({
                            // (string | mandatory) the heading of the notification
                            title: 'Welcome to Blankon',
                            // (string | mandatory) the text inside the notification
                            text: 'Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework.',
                            // (string | optional) the image to display on the left
                            image: BlankonApp.handleBaseURL()+'/assets/global/img/icon/64/contact.png',
                            // (bool | optional) if you want it to fade out on its own or just sit there
                            sticky: false,
                            // (int | optional) the time you want it to be alive for before fading out
                            time: ''
                        });

                        // You can have it return a unique id, this can be used to manually remove it later using
                        setTimeout(function () {
                            $.gritter.remove(unique_id, {
                                fade: true,
                                speed: 'slow'
                            });
                        }, 12000);
                    }, 5000);

                    // Gritter notification intro 2
                    setTimeout(function () {
                        $.gritter.add({
                            // (string | mandatory) the heading of the notification
                            title: 'Playing sounds',
                            // (string | mandatory) the text inside the notification
                            text: 'Blankon made for playing small sounds, will help you with this task. Please make your sound system is active',
                            // (string | optional) the image to display on the left
                            image: BlankonApp.handleBaseURL()+'/assets/global/img/icon/64/sound.png',
                            // (bool | optional) if you want it to fade out on its own or just sit there
                            sticky: true,
                            // (int | optional) the time you want it to be alive for before fading out
                            time: ''
                        });
                    }, 8000);

                    // Set cookie intro
                    $.cookie('intro',1, {expires: 1});
                }
            }
        },

        // =========================================================================
        // VISITOR CHART & SERVER STATUS
        // =========================================================================
        visitorChart: function () {
            if($('#visitor-chart').length){

                $.getJSON('/dashboard/visitors', function (rs) {
                    var data = [{label: "2017",
                                color: "rgba(0, 177, 225, 0.35)",
                                data: [
                                    ["Jan", 0],
                                    ["Feb", 0],
                                    ["Mar", 0],
                                    ["Apr", 0],
                                    ["May", 0],
                                    ["Jun", 0],
                                    ["Jul", 0],
                                    ["Aug", 0],
                                    ["Sep", 0],
                                    ["Oct", 0],
                                    ["Nov", 0],
                                    ["Dec", 0]
                                ]},
                                {label: "2016",
                                    color: "rgba(233, 87, 63, 0.36)",
                                    data: [
                                        ["Jan", 0],
                                        ["Feb", 0],
                                        ["Mar", 0],
                                        ["Apr", 0],
                                        ["May", 0],
                                        ["Jun", 0],
                                        ["Jul", 0],
                                        ["Aug", 0],
                                        ["Sep", 0],
                                        ["Oct", 0],
                                        ["Nov", 0],
                                        ["Dec", 0]
                                    ]
                                }
                    ];

                    $.each(rs, function(n, o){
                       switch(o.month)
                       {
                           case "2016-01":
                               data[1].data[0][1]= o.total;
                               break;
                           case "2016-02":
                               data[1].data[1][1] = o.total;
                               break;
                           case "2016-03":
                               data[1].data[2][1] = o.total;
                               break;
                           case "2016-04":
                               data[1].data[3][1] = o.total;
                               break;
                           case "2016-05":
                               data[1].data[4][1] = o.total;
                               break;
                           case "2016-06":
                               data[1].data[5][1] = o.total;
                               break;
                           case "2016-07":
                               data[1].data[6][1] = o.total;
                               break;
                           case "2016-08":
                               data[1].data[7][1] = o.total;
                               break;
                           case "2016-09":
                               data[1].data[8][1] = o.total;
                               break;
                           case "2016-10":
                               data[1].data[9][1] = o.total;
                               break;
                           case "2016-11":
                               data[1].data[10][1] = o.total;
                               break;
                           case "2016-12":
                               data[1].data[11][1] = o.total;
                               break;
                           case "2017-01":
                               data[0].data[0][1] = o.total;
                               break;
                           case "2017-02":
                               data[0].data[1][1] = o.total;
                               break;
                           case "2017-03":
                               data[0].data[2][1] = o.total;
                               break;
                           case "2017-04":
                               data[0].data[3][1] = o.total;
                               break;
                           case "2017-05":
                               data[0].data[4][1] = o.total;
                               break;
                           case "2017-06":
                               data[0].data[5][1] = o.total;
                               break;
                           case "2017-07":
                               data[0].data[6][1] = o.total;
                               break;
                           case "2017-08":
                               data[0].data[7][1] = o.total;
                               break;
                           case "2017-09":
                               data[0].data[8][1] = o.total;
                               break;
                           case "2017-10":
                               data[0].data[9][1] = o.total;
                               break;
                           case "2017-11":
                               data[0].data[10][1] = o.total;
                               break;
                           case "2017-12":
                               data[0].data[11][1] = o.total;
                               break;
                       }

                    });

                    $.plot("#visitor-chart", data, {
                        series: {
                            lines: { show: false },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 2,
                                fill: 0.5
                            },
                            points: {
                                show: true,
                                radius: 4
                            }
                        },
                        grid: {
                            borderColor: "transparent",
                            borderWidth: 0,
                            hoverable: true,
                            backgroundColor: "transparent"
                        },
                        tooltip: true,
                        tooltipOpts: { content: "%x : %y" + " Visitor" },
                        xaxis: {
                            tickColor: "transparent",
                            mode: "categories"
                        },
                        yaxis: { tickColor: "transparent" },
                        shadowSize: 0
                    });

                    BlankonDashboard.seasonChart(rs);
                });
            }
        },

        seasonChart: function(data){
            var count_2016 = [0,0,0,0];
            var count_2017 = [0,0,0,0];
            $.each(data, function(n, o){
                switch(o.month)
                {
                    case "2016-01":
                        count_2016[0] =+ o.total;
                        break;
                    case "2016-02":
                        count_2016[0] =+ o.total;
                        break;
                    case "2016-03":
                        count_2016[0] =+ o.total;
                        break;
                    case "2016-04":
                        count_2016[1] =+ o.total;
                        break;
                    case "2016-05":
                        count_2016[1] =+ o.total;
                        break;
                    case "2016-06":
                        count_2016[1] =+ o.total;
                        break;
                    case "2016-07":
                        count_2016[2] =+ o.total;
                        break;
                    case "2016-08":
                        count_2016[2] =+ o.total;
                        break;
                    case "2016-09":
                        count_2016[2] =+ o.total;
                        break;
                    case "2016-10":
                        count_2016[3] =+ o.total;
                        break;
                    case "2016-11":
                        count_2016[3] =+ o.total;
                        break;
                    case "2016-12":
                        count_2016[3] =+ o.total;
                        break;
                    case "2017-01":
                        count_2017[0] =+ o.total;
                        break;
                    case "2017-02":
                        count_2017[0] =+ o.total;
                        break;
                    case "2017-03":
                        count_2017[0] =+ o.total;
                        break;
                    case "2017-04":
                        count_2017[1] =+ o.total;
                        break;
                    case "2017-05":
                        count_2017[1] =+ o.total;
                        break;
                    case "2017-06":
                        count_2017[1] =+ o.total;
                        break;
                    case "2017-07":
                        count_2017[2] =+ o.total;
                        break;
                    case "2017-08":
                        count_2017[2] =+ o.total;
                        break;
                    case "2017-09":
                        count_2017[2] =+ o.total;
                        break;
                    case "2017-10":
                        count_2017[3] =+ o.total;
                        break;
                    case "2017-11":
                        count_2017[3] =+ o.total;
                        break;
                    case "2017-12":
                        count_2017[3] =+ o.total;
                        break;
                }

            });

            $("#q1_total").text(count_2017[0]);
            $("#percentage_q1").text(this.getPercentage(count_2017[0], count_2016[0]));
            $("#q2_total").text(count_2017[1]);
            $("#percentage_q2").text(this.getPercentage(count_2017[1], count_2016[1]));
            $("#q3_total").text(count_2017[2]);
            $("#percentage_q3").text(this.getPercentage(count_2017[2], count_2016[2]));
            $("#q4_total").text(count_2017[3]);
            $("#percentage_q4").text(this.getPercentage(count_2017[3], count_2016[3]));
        },

        getPercentage: function(thisYear, lastYear){
            var p = (thisYear && !lastYear) == true ? "100%" : (Math.round((thisYear - lastYear) / lastYear * 100) + "%");
            p = p == "NaN%" ? "0%" : p;

            return p.indexOf("-") == -1 ? "+" + p : p;
        },

        // =========================================================================
        // REAL TIME STATUS
        // =========================================================================
        realtimeStatusChart: function () {
            if($('#realtime-status-report').length){
                var data = [], totalPoints = 50;

                function getRandomData() {

                    if (data.length > 0)
                        data = data.slice(1);

                    // Do a random walk
                    while (data.length < totalPoints) {

                        var prev = data.length > 0 ? data[data.length - 1] : 50,
                            y = prev + Math.random() * 10 - 5;

                        if (y < 0) {
                            y = 0;
                        } else if (y > 100) {
                            y = 100;
                        }
                        data.push(y);
                    }

                    // Zip the generated y values with the x values
                    var res = [];
                    for (var i = 0; i < data.length; ++i) {
                        res.push([i, data[i]])
                    }
                    return res;
                }


                // Set up the control widget
                var updateInterval = 1000;

                var plot4 = $.plot("#realtime-status-report", [ getRandomData() ], {
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
                        labelMargin: 10
                    },
                    xaxis: {
                        color: '#eee'
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        color: '#eee'
                    }
                });

                function update() {

                    plot4.setData([getRandomData()]);

                    // Since the axes don't change, we don't need to call plot.setupGrid()
                    plot4.draw();
                    setTimeout(update, updateInterval);
                }

                update();
            }
        },

        // =========================================================================
        // DEMO COUNT NUMBER
        // =========================================================================
        countNumber: function () {
            $.fn.digits = function(){
                return this.each(function(){
                    $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
                })
            };
            function counter($selector){
                $({countNum: $('.counter-' + $selector).text()}).animate({countNum: $('.counter-' + $selector).data('counter')}, {
                    duration: 8000,
                    easing:'linear',
                    step: function() {
                        $('.counter-' + $selector).text(Math.floor(this.countNum)).digits();
                    },
                    complete: function() {
                        $('.counter-' + $selector).text(this.countNum).digits();
                    }
                });
            }
            // Check if wrapper design is opacity 1
            if($('#wrapper').css('opacity')) {
                counter('visit');
                counter('unique');
                counter('page');
            }
        },

        // =========================================================================
        // SESSION TIMEOUT
        // =========================================================================
        sessionTimeout: function () {
            if($('.demo-dashboard-session').length){
                $.sessionTimeout({
                    title: 'JUST DEMO Your session is about to expire!',
                    logoutButton: 'Logout',
                    keepAliveButton: 'Stay Connected',
                    countdownMessage: 'Your session will be redirecting in {timer} seconds.',
                    countdownBar: true,
                    keepAliveUrl: '#',
                    logoutUrl: 'page-signin.html',
                    redirUrl: 'page-lock-screen.html',
                    ignoreUserActivity: true,
                    warnAfter: 50000,
                    redirAfter: 65000
                });
            }
        },

        // =========================================================================
        // DROPZONE UPLOAD
        // =========================================================================
        dropzone: function () {
            Dropzone.options.myDropzone = {
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block btn-danger'>Remove file</button>");

                        // Capture the Dropzone instance as closure.
                        var _this = this;

                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                            // Make sure the button click doesn't submit the form:
                            e.preventDefault();
                            e.stopPropagation();

                            // Remove the file preview.
                            _this.removeFile(file);
                            // If you want to the delete the file on the server as well,
                            // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                }
            }
        }

    };

}();

// Call main app init
BlankonDashboard.init();

// ========================================================  init   ========================================================
// Client ID and API key from the Developer Console
var CLIENT_ID = '363120591876-if2sbvhge6ah5bkrfhlnriu98k4tfrib.apps.googleusercontent.com';
var API_KEY = 'AIzaSyDQ6qWKQEjk0-8R43y5swOG1hka5Fl_0u0';
// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = "https://www.googleapis.com/auth/calendar";

var authorizeButton = document.getElementById('authorize_button');
//   var signoutButton = document.getElementById('signout_button');
/**
 *  On load, called to load the auth2 library and API client library.
 */
function handleClientLoad() {
    gapi.load('client:auth2', initClient);
}

/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */
function initClient() {
    gapi.client.init({
        apiKey: API_KEY,
        clientId: CLIENT_ID,
        discoveryDocs: DISCOVERY_DOCS,
        scope: SCOPES
    }).then(function () {
        // Listen for sign-in state changes.
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
        // Handle the initial sign-in state.
        updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        authorizeButton.onclick = handleAuthClick;

    }, function (error) {
        // appendPre(JSON.stringify(error, null, 2));
    });
}
/**
 *  Sign in the user upon button click.
 */
function handleAuthClick(event) {
    gapi.auth2.getAuthInstance().signIn();
}
// ========================================================  on-click    ========================================================
/**
 *  Called when the signed in status changes, to update the UI
 *  appropriately. After a sign-in, the API is called.
 */
function updateSigninStatus(isSignedIn) {
    if (isSignedIn) {
        listUpcomingEvents();
    } 
}
// ========================================================  main function  ========================================================

/**
 * Print the summary and start datetime/date of the next 30 events in
 * the authorized user's calendar. If no events are found an
 * appropriate message is printed.
 * RETURNS calendarResponse
 */

function listUpcomingEvents() {
    gapi.client.calendar.events.list({
        'calendarId': 'primary',
        'timeMin': (new Date()).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        // change to any events
        'maxResults': 30,
        'orderBy': 'startTime'
    }).then(function (response) {
        //  create response locally and return!
        var calendarResponse = {
            events: Array(),
            error: ''
        };
        var events = response.result.items;
        calendarResponse = cleanData(calendarResponse, events)
        console.log(calendarResponse)
        let workLoadOutput = workloadStatus(calendarResponse)
        console.log(workLoadOutput[1])
        if (workLoadOutput[1] >= 65.6) {
            var in_num = 65.6
        } else {
            var in_num = workLoadOutput[1]
        }
        //clear default speedometer
        document.getElementById("speedometer").innerHTML = ""
        // display speedometer
        do_gauge(in_num)
        display(workLoadOutput[0], workLoadOutput[1])

    });
}

// ========================================================  helper functions  ========================================================
function cleanData(calendarResponse, events) {
    if (events.length > 0) {
        for (i = 0; i < events.length; i++) {
            // console.log(event)
            var event = events[i];
            var when = event.start.dateTime;
            // self added
            var end = event.end.dateTime;
            var s = new Date(when);
            var e = new Date(end);
            // convert to hours
            var duration = Number((e - s) / 60 / 60 / 1000)
            if (!when) {
                when = event.start.date;
                var duration = 24
            }
            calendarResponse.events.push({
                name: event.summary,
                date: when,
                duration: duration
            });
        }
    } else {
        calendarResponse.error = "Error: no events found!";

    }
    return calendarResponse
}

function workloadStatus(calendarResponse) {
    console.log("========start of workloadStatus=======")
    console.log(calendarResponse.events)
    var numHours = 0;
    for (resp of calendarResponse.events) {
        // console.log(resp)
        const checkDate = new Date(resp.date);
        // console.log(checkDate)
        if (isDateInNextSevenDays(checkDate)) {
            numHours += resp.duration
            // console.log(checkDate)
            console.log(resp.duration)
        }
    }
    console.log("========end of workloadStatus=======")
    if (numHours == 0) {
        return "error";
    }
    if (numHours > 44) {
        return ["red", numHours];
    }else {
        return ["green", numHours]
    }
}

function isDateInNextSevenDays(date) {
    var today = new Date();
    var nextWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
    const res = today.getTime() <= date.getTime() &&
        date.getTime() <= nextWeek;
    return res; // true / false
}

function displaySpeedometer(){
    do_gauge(0)
    return
}

function do_gauge(in_num) {

    // data which need to be fetched
    var value = in_num
    // max limit for speedometer
    var gaugeMaxValue = 65.6;

    // données à calculer 
    var percentValue = value / gaugeMaxValue;

    ////////////////////////

    var needleClient;



    (function () {

        var barWidth, chart, chartInset, degToRad, repaintGauge,
            height, margin, numSections, padRad, percToDeg, percToRad,
            percent, radius, sectionIndx, svg, totalPercent, width;



        percent = percentValue;

        numSections = 1;
        sectionPerc = 1 / numSections / 2;
        padRad = 0.025;
        chartInset = 10;

        // Orientation of gauge:
        totalPercent = .75;

        el = d3.select('.chart-gauge');

        margin = {
            top: 20,
            right: 20,
            bottom: 30,
            left: 20
        };

        width = el[0][0].offsetWidth - margin.left - margin.right;
        height = width;
        radius = Math.min(width, height) / 2;
        barWidth = 40 * width / 300;



        //Utility methods 

        percToDeg = function (perc) {
            return perc * 360;
        };

        percToRad = function (perc) {
            return degToRad(percToDeg(perc));
        };

        degToRad = function (deg) {
            return deg * Math.PI / 180;
        };

        // Create SVG element
        svg = el.append('svg').attr('width', width + margin.left + margin.right).attr('height', height + margin.top + margin.bottom).attr('overflow', 'hidden')

        ;

        // Add layer for the panel
        chart = svg.append('g').attr('transform', "translate(" + ((width + margin.left) / 2) + ", " + ((height + margin.top) / 2) + ")");


        chart.append('path').attr('class', "arc chart-first");
        // chart.append('path').attr('class', "arc chart-second");
        chart.append('path').attr('class', "arc chart-third");


        arc3 = d3.svg.arc().outerRadius(radius - chartInset).innerRadius(radius - chartInset - barWidth)
        // arc2 = d3.svg.arc().outerRadius(radius - chartInset).innerRadius(radius - chartInset - barWidth)
        arc1 = d3.svg.arc().outerRadius(radius - chartInset).innerRadius(radius - chartInset - barWidth)

        repaintGauge = function () {
            perc = 0.5;
            var next_start = totalPercent;
            arcStartRad = percToRad(next_start);
            arcEndRad = arcStartRad + 2 * percToRad(perc / 3);
            next_start += 2* perc / 3;
            // green zone
            arc1.startAngle(arcStartRad).endAngle(arcEndRad);
            
            arcStartRad = percToRad(next_start);
            arcEndRad = arcStartRad +  percToRad(perc / 3);
            next_start += perc / 3 /2;
            //  red zone
            arc3.startAngle(arcStartRad + padRad).endAngle(arcEndRad);

            chart.select(".chart-first").attr('d', arc1);
            chart.select(".chart-third").attr('d', arc3);


        }
        /////////

        var dataset = [{
            metric: '',
            value: ''
        }]

        var texts = svg.selectAll("text")
            .data(dataset)
            .enter();

        texts.append("text")
            .text(function () {
                return dataset[0].metric;
            })
            .attr('id', "Name")
            .attr('transform', "translate(" + ((width + margin.left) / 6) + ", " + ((height + margin.top) / 1.5) + ")")
            .attr("font-size", 25)
            .style("fill", "#000000");


        var trX = 180 - 210 * Math.cos(percToRad(percent / 2));
        var trY = 195 - 210 * Math.sin(percToRad(percent / 2));
        // (180, 195) are the coordinates of the center of the gauge.

        displayValue = function () {
            texts.append("text")
                .text(function () {
                    return dataset[0].value;
                })
                .attr('id', "Value")
                .attr('transform', "translate(" + trX + ", " + trY + ")")
                .attr("font-size", 18)
                .style("fill", '#000000');
        }
        // zero
        texts.append("text")
            .text(function () {
                return 0;
            })
            .attr('id', 'scale0')
            .attr('transform', "translate(" + ((width + margin.left) / 100) + ", " + ((height + margin.top) / 2) + ")")
            .attr("font-size", 15)
            .style("fill", "#000000");

        // red zone
        texts.append("text")
            .text(function () {
                return 44;
            })
            .attr('id', 'scale10')
            .attr('transform', "translate(" + ((width + margin.left) / 1.3) + ", " + ((height + margin.top) / 30) + ")")
            .attr("font-size", 15)
            .style("fill", "#E02401");

        var Needle = (function () {

            //Helper function that returns the `d` value for moving the needle
            var recalcPointerPos = function (perc) {
                var centerX, centerY, leftX, leftY, rightX, rightY, thetaRad, topX, topY;
                thetaRad = percToRad(perc / 2);
                centerX = 0;
                centerY = 0;
                topX = centerX - this.len * Math.cos(thetaRad);
                topY = centerY - this.len * Math.sin(thetaRad);
                leftX = centerX - this.radius * Math.cos(thetaRad - Math.PI / 2);
                leftY = centerY - this.radius * Math.sin(thetaRad - Math.PI / 2);
                rightX = centerX - this.radius * Math.cos(thetaRad + Math.PI / 2);
                rightY = centerY - this.radius * Math.sin(thetaRad + Math.PI / 2);
                return "M " + leftX + " " + leftY + " L " + topX + " " + topY + " L " + rightX + " " + rightY;
            };

            function Needle(el) {
                this.el = el;
                this.len = width / 2.5;
                this.radius = this.len / 8;
            }

            Needle.prototype.render = function () {
                this.el.append('circle').attr('class', 'needle-center').attr('cx', 0).attr('cy', 0).attr('r', this.radius);
                return this.el.append('path').attr('class', 'needle').attr('id', 'client-needle').attr('d', recalcPointerPos.call(this, 0));
            };

            Needle.prototype.moveTo = function (perc) {
                var self,
                    oldValue = this.perc || 0;

                this.perc = perc;
                self = this;

                // Reset pointer position
                this.el.transition().delay(100).ease('quad').duration(200).select('.needle').tween('reset-progress', function () {
                    return function (percentOfPercent) {
                        var progress = (1 - percentOfPercent) * oldValue;
                        repaintGauge(progress);
                        return d3.select(this).attr('d', recalcPointerPos.call(self, progress));
                    };
                });

                this.el.transition().delay(300).ease('bounce').duration(1500).select('.needle').tween('progress', function () {
                    return function (percentOfPercent) {
                        var progress = percentOfPercent * perc;

                        repaintGauge(progress);
                        return d3.select(this).attr('d', recalcPointerPos.call(self, progress));
                    };
                });

            };
            return Needle;

        })();
        needle = new Needle(chart);
        needle.render();
        needle.moveTo(percent);

        setTimeout(displayValue, 1350);
    })();

}
<?php
/**
 * The Template for displaying locations
 */
//$clubID = $post->club_id;
$clubID = get_query_var( 'club_id' );
$app_ID = get_query_var( 'app_id' );
$app_key = get_query_var( 'app_key' );
$category_display = get_query_var( 'category_display' );

if ($clubID != "") {

    if ($err) {
        $employeeResponse = "";
    }

    // Create array of days
    $daysArray = array();
    for ($i = 0; $i < 7; $i++) {
        date_default_timezone_set('US/Eastern');
        $thisDate                     = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $i, date("Y")));
        $daysArray[$i]["date"]        = $thisDate;
        $dayDateTime                  = DateTime::createFromFormat('Y-m-d', $thisDate);
        $weekDayName                  = $dayDateTime->format('D');
        $daysArray[$i]["dayName"]     = $weekDayName;
        $weekDayNameLong              = $dayDateTime->format('D n/j');
        $daysArray[$i]["dayNameLong"] = $weekDayNameLong;
    }
    $endDateRange = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y")));

    // Uses first day and last day for event/class request
    $eventRange = $daysArray[0]["date"] . "%2c" . $endDateRange;
    $curl       = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => "https://api.abcfinancial.com/rest/" . $clubID . "/calendars/events?eventDateRange=" . $eventRange . "&eventCategory=class",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "GET",
        CURLOPT_HTTPHEADER     => array(
            "Accept: application/json",
            "app_id: ".$app_ID,
            "app_key: ".$app_key,
            "cache-control: no-cache",
        ),
    ));
    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);
    if ($err) {
        $response = "";
    }

    // Get custom categories
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => "https://api.abcfinancial.com/rest/" . $clubID . "/calendars/customcategories",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "GET",
        CURLOPT_HTTPHEADER     => array(
            "Accept: application/json",
            "app_id: ".$app_ID,
            "app_key: ".$app_key,
            "cache-control: no-cache",
        ),
    ));
    $eventCategoryResponse = curl_exec($curl);
    $err                   = curl_error($curl);
    curl_close($curl);
    if ($err) {
        $eventCategoryResponse = "";
    }

    $eventCategoryJSON = json_decode($eventCategoryResponse, true);

    $customEventTypes       = array();
    $customEventTypeClasses = array();

    // svg icons
    $svg_info = '<svg class="svg-info" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 15.7 33.9" style="enable-background:new 0 0 15.7 33.9;" xml:space="preserve"><g><path class="svg-info-segment" d="M0,18.1c1.2-1.1,2.3-2.3,3.6-3.3c1.3-1.1,2.8-2,4.2-2.9c0.6-0.4,1.3-0.5,2-0.6c2-0.3,3.2,1,2.7,3
    c-0.4,1.7-1,3.4-1.4,5.1c-0.8,3-1.6,6-2.4,9c0,0.2-0.1,0.3,0.1,0.6c1.6-1.4,3.1-2.8,4.7-4.2c0.7,0.6,1.4,1.3,2.2,1.9
    c0,0.1,0,0.1,0,0.2c-1.4,1.3-2.9,2.6-4.3,3.9c-1.5,1.4-3.2,2.7-5.3,3.1c-0.1,0-0.2,0-0.3,0c-2.2-0.8-2.6-1.5-2.4-3.9
    c0-0.3,0-0.6,0.1-0.9c1.1-4.1,2.1-8.1,3.2-12.2c0.1-0.2,0.1-0.4,0.1-0.6c-0.1,0-0.1-0.1-0.2-0.1c-1.4,1.3-2.9,2.6-4.3,3.9
    C1.5,19.5,0.8,19,0,18.5C0,18.4,0,18.3,0,18.1z"/><path class="svg-info-segment" d="M10.4,0c0.1,0.1,0.2,0.1,0.4,0.2c1.4,0.3,2.2,1.2,2.5,2.5c0.4,1.9-0.9,4.2-2.7,4.8C9.3,7.9,8.1,7.8,7.1,6.8
    C6,5.6,6,4.2,6.5,2.8C7,1.1,8.3,0.4,9.9,0C10.1,0,10.3,0,10.4,0z"/></g>
    </svg>';

    $svg_close = '<svg class="svg-x" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 32.3 35" style="enable-background:new 0 0 32.3 35;" xml:space="preserve"><g><path class="svg-x-segment" d="M3.5,29.6L4,30.1c0.6,0.6,1.7,0.4,2.5-0.4L28.4,7.8c0.8-0.8,1-1.9,0.4-2.5l-0.5-0.5c-0.6-0.6-1.7-0.4-2.5,0.4
    L3.9,27.2C3.1,27.9,2.9,29,3.5,29.6z"/></g><g><path class="svg-x-segment" d="M28.3,30.1l0.5-0.5c0.6-0.6,0.4-1.7-0.4-2.5L6.5,5.2C5.7,4.5,4.6,4.3,4,4.9L3.5,5.4C2.9,6,3.1,7.1,3.9,7.8
    l21.9,21.9C26.6,30.5,27.7,30.7,28.3,30.1z"/></g>
    </svg>';

    $svg_calendar = '<svg class="svg-cal" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32.3 35" style="enable-background:new 0 0 32.3 35;" xml:space="preserve"><g><path class="svg-cal-segment" d="M29.3,4.4h-4.7v2.7c0,1.6-1.3,2.9-2.9,2.9h-1.5c-1.6,0-2.9-1.3-2.9-2.9V4.4H15v2.7c0,1.6-1.3,2.9-2.9,2.9h-1.5
    c-1.6,0-2.9-1.3-2.9-2.9V4.4H2.9C1.3,4.4,0,5.7,0,7.3v24.7C0,33.7,1.3,35,2.9,35h26.4c1.6,0,2.9-1.3,2.9-2.9V7.3
    C32.3,5.7,31,4.4,29.3,4.4z M15.8,26.6c-0.4,0.7-1,1.2-1.7,1.6c-0.7,0.4-1.7,0.6-2.9,0.6c-1.2,0-2.1-0.1-2.8-0.4
    c-0.7-0.3-1.2-0.7-1.7-1.2c-0.4-0.5-0.8-1.2-1-2l3.6-0.5c0.1,0.7,0.4,1.2,0.7,1.5c0.3,0.3,0.7,0.4,1.1,0.4c0.5,0,0.9-0.2,1.2-0.5
    c0.3-0.4,0.5-0.8,0.5-1.4c0-0.6-0.2-1.1-0.5-1.4c-0.3-0.3-0.7-0.5-1.2-0.5c-0.3,0-0.7,0.1-1.2,0.2l0.2-2.6c0.2,0,0.4,0,0.5,0
    c0.5,0,0.9-0.1,1.2-0.5c0.3-0.3,0.5-0.6,0.5-1.1c0-0.4-0.1-0.7-0.3-0.9c-0.2-0.2-0.6-0.3-1-0.3c-0.4,0-0.8,0.1-1,0.4
    c-0.3,0.3-0.4,0.7-0.5,1.3L6,18.8c0.3-1.1,0.8-1.9,1.6-2.5c0.8-0.6,1.9-0.9,3.4-0.9c1.7,0,2.9,0.3,3.6,0.9c0.8,0.6,1.1,1.4,1.1,2.4
    c0,0.6-0.2,1.1-0.5,1.5c-0.3,0.5-0.8,0.8-1.4,1.2c0.5,0.1,0.9,0.3,1.1,0.4c0.4,0.3,0.8,0.6,1,1c0.2,0.4,0.4,0.9,0.4,1.5
    C16.4,25.2,16.2,25.9,15.8,26.6z M22.3,28.5v-8.6c-0.6,0.4-1.1,0.8-1.7,1.1c-0.6,0.3-1.2,0.5-2.1,0.8v-2.9c1.2-0.4,2.2-0.9,2.8-1.4
    c0.7-0.6,1.2-1.2,1.6-2h3v13.1L22.3,28.5L22.3,28.5L22.3,28.5z"/><path class="svg-cal-segment" d="M20.6,7.8h0.7c0.8,0,1.5-0.9,1.5-2V2c0-1.1-0.7-2-1.5-2h-0.7c-0.8,0-1.5,0.9-1.5,2v3.7
    C19.1,6.9,19.8,7.8,20.6,7.8z"/><path class="svg-cal-segment" d="M10.9,7.8h0.7c0.8,0,1.5-0.9,1.5-2V2c0-1.1-0.7-2-1.5-2h-0.7c-0.8,0-1.5,0.9-1.5,2v3.7
    C9.5,6.9,10.1,7.8,10.9,7.8z"/></g>
    </svg>';
    foreach ($eventCategoryJSON['customCategories'] as $eventCategory) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.abcfinancial.com/rest/" . $clubID . "/calendars/events?eventDateRange=" . $eventRange . "&eventCategory=class&customCategoryId=" . $eventCategory['customCategoryId'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_HTTPHEADER     => array(
                "Accept: application/json",
                "app_id: ".$app_ID,
                "app_key: ".$app_key,
                "cache-control: no-cache",
            ),
        ));
        $eventCategoryClassesResponse = curl_exec($curl);
        $err                          = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $eventCategoryClassesResponse = "";
        }
        $eventCategoryClassesJSON = json_decode($eventCategoryClassesResponse, true);

        if ($eventCategoryClassesJSON['status']['count'] > 0) {
            for ($i = 0; $i < $eventCategoryClassesJSON['status']['count']; $i++) {
                foreach ($eventCategoryClassesJSON['events'] as $eventCategoryClass) {
                    $paidClass   = false;
                    $classPrefix = strtolower(substr($eventCategory['customCategoryName'], 0, 5));
                    if ($classPrefix == "paid ") {
                        $paidClass = true;
                    }
                    $customEventTypeClasses[count($customEventTypeClasses)] = array("classId" => $eventCategoryClass['eventId'], "eventTypeId" => $eventCategory['customCategoryId'], "isPaid" => $paidClass);
                }
            }
            // Only adds event type if there are actual events within the type.
            // This means that a filter button will only show up if there are classes in that group
            $customEventTypes[count($customEventTypes)] = array("eventTypeId" => $eventCategory['customCategoryId'], "eventTypeName" => $eventCategory['customCategoryName']);
        }
    }

    // End of cURL requests

    // Get number of employees for loops
    $employeeJSON = json_decode($employeeResponse, true);

    $numEmployees = $employeeJSON["request"]["size"];

    // Get number of classes for loops
    $ClassJSON  = json_decode($response, true);
    $numClasses = $ClassJSON["status"]["count"];

    // unset($ClassJSON["status"]);
    // unset($ClassJSON["request"]);

    // Find unique hours of classes - no minutes
    $classHoursArr = array();
    for ($k = 0; $k < $numClasses; $k++) {
        $datetime                             = $ClassJSON["events"][$k]["eventTimestamp"];
        $datetime                             = DateTime::createFromFormat('Y-m-d H:i:s.u', $datetime);
        $startTimestamp                       = $datetime->getTimestamp();
        $classHour                            = date('H', $startTimestamp);
        $ClassJSON["events"][$k]["startHour"] = $classHour;
        if (!in_array($classHour, $classHoursArr)) {
            $classHoursArr[] = $classHour;
        }
    }
    asort($classHoursArr);
    $sortedHourArr = array();
    // Create array with hours in order
    foreach ($classHoursArr as $hour) {
        $sortedHourArr[] = array($hour, absMilitaryTo12Hour($hour));
    }

    ////////////////////// ARRAYS
    // $sortedHourArr
    // $daysArray
    // $ClassJSON

    for ($i = 0; $i < $numClasses; $i++) {

        $datetime       = $ClassJSON["events"][$i]["eventTimestamp"];
        $datetime       = DateTime::createFromFormat('Y-m-d H:i:s.u', $datetime);
        $startTimestamp = $datetime->getTimestamp();
        $endTimestamp   = strtotime('+' . $ClassJSON["events"][$i]["duration"] . ' minutes', $startTimestamp);

        $ClassJSON["events"][$i]["endTime"]   = date('H:i', $endTimestamp);
        $ClassJSON["events"][$i]["startDate"] = date('Y-m-d', $startTimestamp);
        $ClassJSON["events"][$i]["startTime"] = date('H:i', $startTimestamp);

        if ((!empty($ClassJSON["events"][$i]["employeeId"]) ? $ClassJSON["events"][$i]["employeeId"] : "") != "") {
            for ($k = 0; $k < $numEmployees; $k++) {
                $employeeListID  = !empty($employeeJSON["employees"][$k]["employeeId"]) ? $employeeJSON["employees"][$k]["employeeId"] : "";
                $classEmployeeID = !empty($ClassJSON["events"][$i]["employeeId"]) ? $ClassJSON["events"][$i]["employeeId"] : "";
                if ($employeeListID == $classEmployeeID) {
                    $ClassJSON["events"][$i]["employeeFirstName"] = $employeeJSON["employees"][$k]["personal"]["firstName"];
                    $ClassJSON["events"][$i]["employeeLastName"]  = $employeeJSON["employees"][$k]["personal"]["lastName"];
                    $ClassJSON["events"][$i]["employeeBio"]       = !empty($employeeJSON["employees"][$k]["personal"]["profile"]) ? $employeeJSON["employees"][$k]["personal"]["profile"] : '';
                }
            }
        }

        // unset($ClassJSON["events"][$i]["allowCancelBefore"]);
        // unset($ClassJSON["events"][$i]["category"]);
        // unset($ClassJSON["events"][$i]["createdTimestamp"]);
        // unset($ClassJSON["events"][$i]["enrollAfterStartMinutes"]);
        // unset($ClassJSON["events"][$i]["eventTrainingLevel"]);
        // unset($ClassJSON["events"][$i]["eventTypeId"]);
        // unset($ClassJSON["events"][$i]["catelocationIdgory"]);
        // unset($ClassJSON["events"][$i]["modifiedTimestamp"]);
        // unset($ClassJSON["events"][$i]["startBookingTime"]);
        // unset($ClassJSON["events"][$i]["stopBookingTime"]);
        // unset($ClassJSON["events"][$i]["employeeId"]);
        // unset($ClassJSON["events"][$i]["eventId"]);
        // unset($ClassJSON["events"][$i]["locationId"]);
    }

    $classLocationsHTML = "";

    $classLocations = array();
    if ($category_display == "dropdown") {
        $classLocationsHTML .= '<select name="studio" class="custom-select" id="sel-studio">
          <option value="all" selected="">All Studio</option>';
        for ($k = 0; $k < $numClasses; $k++) {
            $classLocation = !empty($ClassJSON["events"][$k]["locationName"]) ? $ClassJSON["events"][$k]["locationName"] : null;
            if (!in_array($classLocation, $classLocations) && $classLocation != "") {
                $paidCSSClass        = "";
                $classLocations[]    = $classLocation;
                $classLocationsIds[] = array('name' => $classLocation, 'id' => $ClassJSON["events"][$k]["locationId"]);
                $locationPrefix      = strtolower(substr($classLocation, 0, 5));
                if ($locationPrefix == "paid ") {
                    $paidCSSClass  = "-paid";
                    $classLocation = substr($classLocation, 5);
                }
                $classLocationsHTML .= '<option class="'.$paidCSSClass.'" value="'.$ClassJSON["events"][$k]["locationId"].'">'.$classLocation.'</option>';
            }
        }
         $classLocationsHTML .= '</select>';
    } else {
        $classLocationsHTML .= '<div class="sort-class-button show-all -selected">View All</div>';
        for ($k = 0; $k < $numClasses; $k++) {
             $classLocation = !empty($ClassJSON["events"][$k]["locationName"]) ? $ClassJSON["events"][$k]["locationName"] : null;
            if (!in_array($classLocation, $classLocations) && $classLocation != "") {
                $paidCSSClass        = "";
                $classLocations[]    = $classLocation;
                $classLocationsIds[] = array('name' => $classLocation, 'id' => $ClassJSON["events"][$k]["locationId"]);
                $locationPrefix      = strtolower(substr($classLocation, 0, 5));
                if ($locationPrefix == "paid ") {
                    $paidCSSClass  = "-paid";
                    $classLocation = substr($classLocation, 5);
                }
                $classLocationsHTML .= "<div class='sort-class-button " . $paidCSSClass . "' data-class-name='" . $classLocation . "' data-class-id='" . $ClassJSON["events"][$k]["locationId"] . "'>" . $classLocation . "</div>";
            }
        }
    }
    

    $classTypesHTML = "";
    foreach ($customEventTypes as $customEventType) {
        // remove Paid from event type name
        $filteredClassName = $customEventType['eventTypeName'];
        $paidCSSClass      = "";
        $classPrefix       = strtolower(substr($customEventType['eventTypeName'], 0, 5));
        if ($classPrefix == "paid ") {
            $paidCSSClass      = "-paid";
            $filteredClassName = substr($customEventType['eventTypeName'], 4);
        }
        $classTypesHTML .= "<div class='sort-class-button " . $paidCSSClass . "' data-class-name='" . $customEventType['eventTypeId'] . "' data-class-id='" . $customEventType['eventTypeId'] . "'>" . $filteredClassName . "</div>";
    }

    // allow for download cal labels
    $totalClasses = 0;

    // Create HTML Table of Classes
    //
    $tableHTML = '<table class="class-calendar" cellspacing="0" cellpadding="0"><tbody><tr class="today_row r_one"><th class=' . '"cell-today"' . ">Today &rarr;</th>";
    // Create table header for each day
    foreach ($daysArray as $day) {
        $tableHTML .= '<th>' . $day["dayNameLong"] . "</th>";
    }
    // Close header row
    $tableHTML .= "</tr>";

    $currentHourNum    = "0";
    $twoQuarterHours   = floor((sizeOf($sortedHourArr) / 3) * 1);
    $threeQuarterHours = floor((sizeOf($sortedHourArr) / 3) * 2);
    $halfHours         = floor(sizeOf($sortedHourArr) / 2);

    // For each hour/row
    foreach ($sortedHourArr as $hour) {
        if (sizeOf($sortedHourArr) > 10) {
            if ($currentHourNum == $twoQuarterHours || $currentHourNum == $threeQuarterHours) {
                $tableHTML .= '<tr class="today_row r_two"><th class=' . '"cell-today"' . ">Today &rarr;</th>";
                foreach ($daysArray as $day) {
                    $tableHTML .= "<th>" . $day["dayNameLong"] . "</th>";
                }
                // Close header row
                $tableHTML .= "</tr>";
                $row_index++;
            }
        } else {
            if ($currentHourNum == $halfHours) {
                $tableHTML .= '<tr class="today_row r_two"><th class=' . '"cell-today"' . ">Today &rarr;</th>";
                foreach ($daysArray as $day) {
                    $tableHTML .= "<th>" . $day["dayNameLong"] . "</th>";
                }
                // Close header row
                $tableHTML .= "</tr>";
                $row_index++;
            }
        }
        $currentHourNum++;
        $tableHTML .= "<tr class='hour-row'>";
        $tableHTML .= '<td class="cal-hour">' . $hour[1] . "</td>";

        // For each day/column of hour/row
        foreach ($daysArray as $day) {
            $tableHTML .= "<td>";

            // Check each event to see if it is both during the hour and on the day
            foreach ($ClassJSON["events"] as $event) {
                if ($event["startHour"] == $hour[0] && $event["startDate"] == $day["date"]) {

                    $paidClass        = false;
                    $classEventTypeId = "";
                    foreach ($customEventTypeClasses as $customEventTypeClass) {
                        // if event is one of the custom event type classes...
                        if ($customEventTypeClass["classId"] == $event["eventId"]) {
                            $classEventTypeId = $customEventTypeClass["eventTypeId"];
                            if ($customEventTypeClass["isPaid"]) {
                                $paidClass = true;
                            }
                        }
                    }
                    $totalClasses++;
                    $eventLocationId   = isset($event["locationId"]) ? $event["locationId"] : '';
                    $eventName         = isset($event["eventName"]) ? $event["eventName"] : '';
                    $eventLocationName = isset($event["locationName"]) ? $event["locationName"] : 'a studio to be determined';
                    $locationPrefix    = strtolower(substr($eventLocationName, 0, 5));
                    if ($locationPrefix == "paid ") {
                        $paidClass         = true;
                        $eventLocationName = substr($eventLocationName, 5);
                    }
                    $eventTimestamp         = isset($event["eventTimestamp"]) ? $event["eventTimestamp"] : '';
                    $eventStartTime         = isset($event["startTime"]) ? $event["startTime"] : '';
                    $eventEndTime           = isset($event["endTime"]) ? $event["endTime"] : '';
                    $eventStartDate         = isset($event["startDate"]) ? $event["startDate"] : '';
                    $eventEmployeeFirstName = isset($event["employeeFirstName"]) ? $event["employeeFirstName"] : 'a teacher';
                    $gcalLocation           = "Our Fitness Club " . get_field('location_name') . " - " . $eventLocationName;
                    $gcalStartDate          = $eventStartDate . " " . $eventStartTime;
                    $gcalEndDate            = $eventStartDate . " " . $eventEndTime;
                    $gcalLink               = add_to_calendar("google", $eventName, $gcalStartDate, $gcalEndDate, '', $gcalLocation);
                    $yahooCalLink           = add_to_calendar("yahoo", $eventName, $gcalStartDate, $gcalEndDate, '', $gcalLocation);

                    $downloadIcsFileLink = '<form method="post" action="/download-ics.php">';
                    $downloadIcsFileLink .= '<input type="hidden" name="date_start" value="' . $gcalStartDate . '">';
                    $downloadIcsFileLink .= '<input type="hidden" name="date_end" value="' . $gcalEndDate . '">';
                    $downloadIcsFileLink .= '<input type="hidden" name="location" value="' . $gcalLocation . '">';
                    $downloadIcsFileLink .= '<input type="hidden" name="description" value="Join us at Our Fitness Club!">';
                    $downloadIcsFileLink .= '<input type="hidden" name="summary" value="' . $eventName . ' @ OurClub">';
                    $downloadIcsFileLink .= '<input type="hidden" name="url" value="' . get_permalink() . '">';
                    $downloadIcsFileLink .= '<input id="download-button-' . $totalClasses . '" type="submit" value="Download">';
                    $downloadIcsFileLink .= '</form>';

                    // $tableHTML .= "<div class='class-block ". $eventLocationId ."'>" . $eventName. ", " . militaryTo12Hour($eventStartTime) . "-" . militaryTo12Hour($eventEndTime) . ", " . $eventEmployeeFirstName . ", " . $eventLocationName . ", " . $gcalLink . ", " . $yahooCalLink . ", " . $downloadIcsFileLink . "</div>\n";
                    //$tableHTML .= "<div class='class-block ". $eventLocationId ."'>";
                    //$tableHTML .= "<div class='info-panel'></div>";
                    //$tableHTML .= "<h3>" . $eventName. "</h3><p class='class-times'>" . militaryTo12Hour($eventStartTime) . "-" . militaryTo12Hour($eventEndTime) . "</p></div>\n";

                    

                $paidStatus = '';
                if ($paidClass) {
                    $paidStatus = '<span class="paid-class-tag">$</span> ';
                }
              $tableHTML .= '<div class="single-class ' . $eventLocationId . ' ' . $classEventTypeId . '">'.$paidStatus.'
                                <div class="class-intro">'
                                    . '<h4>' . $eventName . '</h4>
                                    <p>' . militaryTo12Hour($eventStartTime) . "-" . militaryTo12Hour($eventEndTime) . '</p>
                                </div>
                                <div class="option-panel">
                                    <div class="info-button">
                                        '.$svg_info.'
                                        <div class="button-text">Info</div>
                                    </div>
                                    <div class="info-close-button -hidden">
                                        '.$svg_close.'
                                        <div class="button-text">Close</div>
                                    </div>
                                    <div class="calendar-button">
                                       '.$svg_calendar.'
                                        <div class="button-text">Add</div>
                                    </div>
                                </div>
                                <div class="info-panel -hidden">
                                    <p>' . $eventName . ' with ' . $eventEmployeeFirstName . ' in ' . $eventLocationName . ' from ' . militaryTo12Hour($eventStartTime) . " to " . militaryTo12Hour($eventEndTime).'</p>
                                </div>
                                <div class="add-to-cal-panel -hidden">'.$gcalLink . "\n" . $yahooCalLink . "\n" . '<label for="download-button-' . $totalClasses . '" class="surrogate">Download</label>' . $downloadIcsFileLink . '</div>' . "\n" . '
                                </div>
                            </div>';
                }
            }
            $tableHTML .= "</td>";
        }
        $tableHTML .= "</tr>";
    }
    $tableHTML .= '<tr class="today_row r_three"><th class="cell-today">Today &rarr;</th>';
    foreach ($daysArray as $day) {
        $tableHTML .= "<th>" . $day["dayNameLong"] . "</th>\n";
    }
    $tableHTML .= "</tr>\n</tbody>\n</table>";

    // End of HTML Table of Classes

    // HTML List of Classes

    $classListText = "";
    $isToday       = true;

    foreach ($classLocationsIds as $classLocation) {
        $isToday      = true;
        $paidCSSClass = "";
        $classListText .= "<div class='studio-wrapper'>";
        $locationPrefix = strtolower(substr($classLocation["name"], 0, 5));
        if ($locationPrefix == "paid ") {
            $paidCSSClass          = "-paid";
            $classLocation["name"] = substr($classLocation["name"], 5);
        }
        $classListText .= "<h3 class='studio-name " . $paidCSSClass . "'>" . $classLocation["name"] . "</h3>";
        $classListText .= "<div class='studio-classes-wrapper'>";
        $locationDaysArr = array();
        foreach ($ClassJSON["events"] as $event) {
            $eventLocationId = isset($event["locationId"]) ? $event["locationId"] : '';
            if ($eventLocationId == $classLocation["id"]) {
                if (!in_array($event["startDate"], $locationDaysArr)) {
                    $locationDaysArr[] = $event["startDate"];
                }
            }
        }

        foreach ($daysArray as $day) {
            foreach ($locationDaysArr as $locationDay) {
                if ($day["date"] == $locationDay) {
                    $classListText .= "<p class='class-date'>" . (($isToday) ? 'Today ' : '') . $day["dayNameLong"] . "</p>\n";
                    $isToday = false;
                    $classListText .= "<div class='day-class-wrapper'>\n";
                    foreach ($ClassJSON["events"] as $event) {

                        $eventLocationId = isset($event["locationId"]) ? $event["locationId"] : '';
                        if ($eventLocationId == $classLocation["id"] && $event["startDate"] == $day["date"]) {

                            $totalClasses++;

                            $paidClass        = false;
                            $classEventTypeId = "";
                            foreach ($customEventTypeClasses as $customEventTypeClass) {
                                // if event is one of the custom event type classes...
                                if ($customEventTypeClass["classId"] == $event["eventId"]) {
                                    $classEventTypeId = $customEventTypeClass["eventTypeId"];
                                    if ($customEventTypeClass["isPaid"]) {
                                        $paidClass = true;
                                    }
                                }
                            }

                            $eventLocationId   = isset($event["locationId"]) ? $event["locationId"] : '';
                            $eventName         = isset($event["eventName"]) ? $event["eventName"] : '';
                            $eventLocationName = isset($event["locationName"]) ? $event["locationName"] : 'a studio to be determined';
                            $locationPrefix    = strtolower(substr($eventLocationName, 0, 5));
                            if ($locationPrefix == "paid ") {
                                $paidClass         = true;
                                $eventLocationName = substr($eventLocationName, 5);
                            }
                            $eventTimestamp         = isset($event["eventTimestamp"]) ? $event["eventTimestamp"] : '';
                            $eventStartTime         = isset($event["startTime"]) ? $event["startTime"] : '';
                            $eventEndTime           = isset($event["endTime"]) ? $event["endTime"] : '';
                            $eventStartDate         = isset($event["startDate"]) ? $event["startDate"] : '';
                            $eventEmployeeFirstName = isset($event["employeeFirstName"]) ? $event["employeeFirstName"] : 'a teacher';

                            // Calendar Code
                            $gcalLocation  = "Our Fitness Club " . get_field('location_name') . " - " . $eventLocationName;
                            $gcalStartDate = $eventStartDate . " " . $eventStartTime;
                            $gcalEndDate   = $eventStartDate . " " . $eventEndTime;
                            $gcalLink      = add_to_calendar("google", $eventName, $gcalStartDate, $gcalEndDate, '', $gcalLocation);
                            $yahooCalLink  = add_to_calendar("yahoo", $eventName, $gcalStartDate, $gcalEndDate, '', $gcalLocation);

                            // Download Calendar Code
                            $downloadIcsFileLink = '<form method="post" action="/download-ics.php">';
                            $downloadIcsFileLink .= '<input type="hidden" name="date_start" value="' . $gcalStartDate . '">';
                            $downloadIcsFileLink .= '<input type="hidden" name="date_end" value="' . $gcalEndDate . '">';
                            $downloadIcsFileLink .= '<input type="hidden" name="location" value="' . $gcalLocation . '">';
                            $downloadIcsFileLink .= '<input type="hidden" name="description" value="Join us at Our Fitness Club!">';
                            $downloadIcsFileLink .= '<input type="hidden" name="summary" value="' . $eventName . ' @ OurClub">';
                            $downloadIcsFileLink .= '<input type="hidden" name="url" value="' . get_permalink() . '">';
                            $downloadIcsFileLink .= '<input id="download-button-' . $totalClasses . '" type="submit" value="Download">';
                            $downloadIcsFileLink .= '</form>';

                            //$tableHTML .= "<div class='class-block ". $eventLocationId ."'>" . $eventName. ", " . militaryTo12Hour($eventStartTime) . "-" . militaryTo12Hour($eventEndTime) . ", " . $eventEmployeeFirstName . ", " . $eventLocationName . ", " . $gcalLink . ", " . $yahooCalLink . ", " . $downloadIcsFileLink . "</div>\n";

                            $classListText .= '<div class="single-class">
                                        <div class="add-to-cal-panel -hidden">
                                            '.$gcalLink . "\n" . $yahooCalLink . "\n" . '<label for="download-button-' . $totalClasses . '" class="surrogate">Download</label>' . $downloadIcsFileLink . '
                                        </div>
                                        <div class="event-details ">
                                            <h5 class="event-title">' . $eventName . '</h5>
                                            <p class="event-time">' . militaryTo12Hour($eventStartTime) . "-" . militaryTo12Hour($eventEndTime) . '</p>
                                        </div>
                                        <div class="info-button">
                                            '.$svg_info.'
                                            <p class="button-text">info</p>
                                        </div>
                                        <div class="info-panel -hidden">
                                           <p>' . $eventName . ' with ' . $eventEmployeeFirstName . ' in ' . $eventLocationName . ' from ' . militaryTo12Hour($eventStartTime) . " to " . militaryTo12Hour($eventEndTime).'</p>
                                            <div class="calendar-button">
                                                '.$svg_calendar.'
                                                <p class="button-text">add</p>
                                            </div>
                                            <div class="info-close-button">
                                                '.$svg_close.'
                                                <p class="button-text">close</p>
                                            </div>
                                        </div>
                                    </div>';

                        }
                    }
                    $classListText .= "</div>";
                }
            }
        }
        $classListText .= "</div></div>";
    }

    $context['mobile_calendar']        = $classListText;
    $context['desktop_calendar']             = $tableHTML;
    $context['calendar_sort_studio'] = $classLocationsHTML;
    $context['calendar_sort_type']   = $classTypesHTML;
    $context['calendarJSON']         = json_encode($ClassJSON);

}
print_r('<div class="content__wrapper -calendar constrained">
    <!-- REMOVED 
    <h2 class="class-tab-header">Class Schedule '.$category_display.'</h2> 
    -->
    <div class="container">
        <div class="top_content_area">
        </div>
    </div>
    <div class="calendar">
    
        <p class="filter-title">View by:</p>
        <div id="class-sort-studio" class="class-sort-buttons -studio">
            '.$context['calendar_sort_studio'].'
        </div>
        <!-- REMOVE <p class="filter-title -by-type">View by Class Type</p> -->
        <div id="class-sort-type" class="class-sort-buttons -type">
        </div>
        <!-- USER EDITABLE CONTENT AREA TO BE BUILT OUT LATER -->
      
        <p class="paid-class-notice -ol" style="margin-bottom:5px;">All Kids Classes are held in the West Wing Studio Location</p>
        <p class="paid-class-notice -sr" style="margin-bottom:5px;">All Spin Classes are held in the Group ExFly Studio Location</p>
        <p class="paid-class-notice"><span class="paid-class-legend">$</span> Training not included with membership</p>
        
        <!-- END CONTENT AREA -->
        <!-- REMOVED This was moved to the  if ($category_display area 
        <div class="class-sort-buttons -all">
            <div class="sort-class-button show-all -selected">View All</div>
        </div>
        -->
        <div class="desktop-calendar">
        '.$context['desktop_calendar'].'
        </div>
        <div class="mobile-calendar">
        '.$context['mobile_calendar'].'
        </div>
        <div class="download-schedule-buttons">
        </div>
</div>');

function add_to_calendar(
    $calType,
    $name,
    $startdate,
    $enddate = false,
    $description = false,
    $location = false,
    $allday = false,
    $linktext = false) {
    // calculate the start and end dates, convert to ISO format
    if ($allday) {
        $startdate = date('Ymd', strtotime($startdate));
    } else {
        $startdate = date('Ymd\THis', strtotime($startdate));
    }
    if ($enddate && !empty($enddate) && strlen($enddate) > 2) {
        if ($allday) {
            $enddate = date('Ymd', strtotime($enddate . ' + 1 day'));
        } else {
            $enddate = date('Ymd\THis', strtotime($enddate));
        }
    } else {
        $enddate = date('Ymd\THis', strtotime($startdate . ' + 2 hours'));
    }

    $url = "";
    if ($calType == "yahoo") {
        $classes  = array('yahooCal-button', 'cal-button');
        $linktext = "Yahoo Calendar";
        $url      = 'https://calendar.yahoo.com/?v=60&view=d&type=20';
        $url .= '&title=' . rawurlencode($name . " @ OurClub");
        $url .= '&st=' . $startdate . '/' . $enddate;
        if ($description) {
            $url .= '&desc=' . rawurlencode($description);
        }
        if ($location) {
            $url .= '&in_loc=' . rawurlencode($location);
        }
    }
    if ($calType == "google") {
        $classes  = array('googleCal-button', 'cal-button');
        $linktext = "Google Calendar";
        $url      = 'http://www.google.com/calendar/event?action=TEMPLATE';
        $url .= '&text=' . rawurlencode($name . " @ OurClub");
        $url .= '&dates=' . $startdate . '/' . $enddate;
        if ($description) {
            $url .= '&details=' . rawurlencode($description);
        }
        if ($location) {
            $url .= '&location=' . rawurlencode($location);
        }
    }

    // build the link output
    $output = '<a target="_blank" href="' . $url . '" class="' . implode(' ', $classes) . '">' . $linktext . '</a>';
    return $output;
}

// Function used to convert from 24 to 12 hour time
function absMilitaryTo12Hour($time)
{
    $result = "";
    if ($time >= 12) {
        if (abs(($time - 12)) == 0) {
            $result = "12:00 pm";
        } else {
            $result = abs(($time - 12)) . ":00 pm";
        }
    } else {
        if ($time == 0) {
            $time = 12;
        }
        $result = $time . ":00 am";
    }
    return $result;
}

function militaryTo12Hour($time)
{
    $hour    = substr($time, 0, 2);
    $minutes = substr($time, 3, 2);
    if (substr($hour, 0, 1) == "0") {
        $hour = substr($hour, 1, 1);
    }
    $result = "";
    if ($hour >= 12) {
        if ($hour == 12) {
            $result = "12:" . $minutes . "pm";
        } else {
            $result = ($hour - 12) . ":" . $minutes . "pm";
        }
    } else {
        if ($hour == 0) {
            $hour = 12;
        }
        $result = $hour . ":" . $minutes . "am";
    }
    return $result;
}

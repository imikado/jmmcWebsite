<?php //$this->paramList['imageList'] 

use MyWebsite\Conf\Colors;

$dayWidth = (100 / 7) . '%';

$dayList = [
    'Lun',
    'Mar',
    'Mer',
    'Jeu',
    'Ven',
    'Sam',
    'Dim'
];
?>
<style>
    .calendar {
        padding: 10px;
        background-color: <?php echo Colors::CALENDAR_BACK ?>;
        color: <?php echo Colors::CALENDAR_TEXT ?>;
    }

    .week {
        display: flex;
        flex-direction: row;
        width: 100%;

    }

    .day span {
        font-weight: bold;
    }

    .week span {
        width: <?php echo $dayWidth ?>;
        display: flex;
        text-align: center;
        justify-content: space-around;
    }

    .week span.today {
        font-weight: bold;
        background-color: <?php echo Colors::CALENDAR_TODAY_BACK ?>;
        border-radius: 5px;
        color: <?php echo Colors::CALENDAR_TODAY_TEXT ?>;
    }

    .week span.afterMonth {
        color: #777;
    }

    .week a.event {
        background-color: <?php echo Colors::CALENDAR_TEXT ?>;
        border-radius: 10px;
        color: <?php echo Colors::CALENDAR_BACK ?>;
        padding: 0px 3px;
        font-weight: bold;
    }
</style>
<script>
    var indexedEventList = <?php echo json_encode((array)$this->props->indexedEventList) ?>;

    function buildCalendar() {

        let dateToday = new Date();

        let dayOneOfTheMonth = new Date();
        dayOneOfTheMonth.setDate(1)
        let dayOfTheWeek = dayOneOfTheMonth.getDay();


        let dayOfTheMonth = dateToday.getDate();
        let yearToday = dateToday.getFullYear();
        let monthToday = dateToday.getMonth() + 1;

        let numberDayOfTheMonth = new Date(yearToday, monthToday, 0).getDate();


        let displayDay = false;
        let afterMonth = false;

        let dayNumber = 0;
        let htmlCal = '';
        for (let weekN = 0; weekN < 6; weekN++) {
            htmlCal += '<div class="week">';

            for (let wd = 1; wd < 8; wd++) {

                if (weekN == 0) {

                    if (wd == 7 && 0 == dayOfTheWeek) {


                        displayDay = true;

                    } else if (wd == dayOfTheWeek) {
                        displayDay = true;
                    }

                } else {
                    displayDay = true;
                }

                if (displayDay) {

                    dayNumber++;

                    let classDay = '';

                    if (dayNumber > numberDayOfTheMonth) {
                        dayNumber = 1;
                        afterMonth = true;
                    }
                    let eventLink = false;

                    let keyDateTime = null;
                    if (!afterMonth) {
                        keyDateTime = yearToday + '-' + monthToday.toString().padStart(2, "0") + '-' + dayNumber.toString().padStart(2, "0");
                    }

                    if (!afterMonth && indexedEventList[keyDateTime]) {
                        eventLink = true;
                    } else {
                        console.log(keyDateTime);
                    }

                    if (afterMonth) {
                        classDay = ' class="afterMonth"';
                    } else if (dayNumber == dayOfTheMonth) {
                        classDay = ' class="today"';
                    }

                    if (eventLink) {
                        classDay = ' class="event"'
                        htmlCal += '<span><a href="' + indexedEventList[keyDateTime] + '"' + classDay + '>' + dayNumber + '</a></span>';

                    } else {
                        htmlCal += '<span' + classDay + '>' + dayNumber + '</span>';

                    }


                } else {
                    htmlCal += '<span> </span>';
                }



            }

            htmlCal += '</div>';
        }

        let calendarDivContent = document.getElementById('calendarContent');
        if (calendarDivContent) {
            calendarDivContent.innerHTML = htmlCal;
        }
    }
</script>


<div class="row">
    <div class="col s12">
        <div class="card calendar">

            <div class="week day">
                <?php foreach ($dayList as $dayLoop) : ?>
                    <span><?php echo $dayLoop ?></span>
                <?php endforeach; ?>
            </div>

            <div id="calendarContent">

            </div>

        </div>
    </div>
</div>

<script>
    buildCalendar();
</script>
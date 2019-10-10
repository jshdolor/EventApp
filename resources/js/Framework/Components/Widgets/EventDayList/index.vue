<template>
    <div>
        <h4 v-html="currentDate"></h4>
        <table class="table">
            <tr v-for="dateDay in dateDays" :key="dateDay.date">
                <td v-html="`${dateDay.date} ${dateDay.day}` "></td>
            </tr>
        </table>
    </div>
</template>
<script>
import {
    getMonthName,
    getDayName,
    createCalendarList
} from "~/Framework/Helpers/Date";

export default {
    name: "EventDayList",

    data() {
        return {
            currentDate: new Date().getMonth(),
            calendarTableSet: [],
            numOfDays: 0,
            dateDays: []
        };
    },

    methods: {
        setDefaults() {
            let currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();

            this.currentDate = `${getMonthName(
                currentMonth,
                true
            )} ${currentYear}`;
            this.dateDays = createCalendarList(currentMonth, currentYear);

            console.log(this.dateDays);
        }
    },

    mounted() {
        this.setDefaults();
    }
};
</script>
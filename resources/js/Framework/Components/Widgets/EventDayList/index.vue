<template>
    <div>
        <h4 v-html="currentDate"></h4>
        <table class="table">
            <tr :class="hasEvent? 'bg-success text-white': '' " v-for="{date, day, event, hasEvent} in dateDays" :key="date">
                <td v-html="`${date} ${day} ${event}` "></td>
            </tr>
        </table>
    </div>
</template>
<script>
import {
    getMonthName,
    getDayName,
    daysInMonth,
    
} from "~/Framework/Helpers/Date";

export default {
    name: "EventDayList",

    data() {
        return {
            currentDate: "",
            calendarTableSet: [],
            numOfDays: 0,
            dateDays: []
        };
    },

    methods: {
        setEventList() {
            let currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();

            this.currentDate = `${getMonthName(
                currentMonth,
                true
            )} ${currentYear}`;

            this.dateDays = this.createEventCalendarList(currentMonth, currentYear);

        },

        createEventCalendarList(month, year) {

            let dateDays = [];

            let numOfDays = daysInMonth(month, year);

            let startDate = new Date(this.startDate).getDate();
            let endDate = new Date(this.endDate).getDate();

            for(let i = 1; i <= numOfDays; i++) {

                const date = new Date(`${getMonthName(month)} ${i}, ${year}`);

                let hasEvent = false;

                if(i >= startDate && i <= endDate && this.days[date.getDay()]) {
                    hasEvent = true;
                }

                dateDays.push({
                    date: i,
                    day: getDayName(date.getDay()),
                    event: this.eventTitle,
                    hasEvent
                });
            }

            return dateDays;

        }
    },

    computed: {
        eventTitle() {
            return this.$store.state.event.eventTitle;
        },
        startDate() {
            return this.$store.state.event.startDate;
        },
        endDate() {
            return this.$store.state.event.endDate;
        },
        days() {
            return this.$store.state.event.days;
        }
    },

    mounted() {

        this.$root.$on('eventUpdate', () => {
            this.setEventList();
        })
    }
};
</script>
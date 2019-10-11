<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label class="form-label">Event</label>
            <input v-model="eventTitle" class="form-control" />
        </div>
        <div class="form-group">
            <DateRangePicker 
                v-on:startDate="updateStartDate"
                v-on:endDate="updateEndDate"
                :startDate="startDate"
                :endDate="endDate"
            ></DateRangePicker>
        </div>
        <div class="form-group">
            <DaysCheckBox :days="days" v-on:toggleDay="updateDays"></DaysCheckBox>
        </div>
        <div class="form-group">
            <Button native-type="submit" type="primary" block>Submit</Button>
        </div>
    </form>
</template>
<script>

import DateRangePicker from '~/Framework/Components/Widgets/DateRangePicker';
import DaysCheckBox from '~/Framework/Components/Widgets/DaysCheckBox';
import {
    Btn
} from '~/Framework/Plugins/BootstrapVue';

import EventService from '~/Application/Services/Events';
import AddEventRequest from '~/Application/Services/Events/Requests/AddEventRequest';


export default {
    name: 'EventForm',

    components: {
        DateRangePicker,
        DaysCheckBox,
        Button: Btn
    },

    data() {
        return {
            
        }
    },

    methods: {
        updateDays(dayValue) {
            this.$store.dispatch('event/setDay', dayValue);
        },
        updateStartDate(date) {
            this.$store.dispatch('event/setStartDate', date);
        },
        updateEndDate(date) {
            this.$store.dispatch('event/setEndDate', date);
        },
        submit() {

            let request = new AddEventRequest({
                eventTitle:this.eventTitle,
                endDate:this.endDate,
                startDate:this.startDate,
                days:this.days,
            });

            EventService
                .addEvent(request)
                .then(data => {
                    this.$emit('eventAdded', data);
                    this.$root.$emit('eventUpdate', true);

                });
        }
    },

    computed: {
        eventTitle: {
            get() {
                return this.$store.state.event.eventTitle;
            },
            set(val) {
                this.$store.dispatch('event/setEventTitle', val);
            }
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

}
</script>
<template>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Calendar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <EventForm></EventForm>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <EventDayList></EventDayList>
                    </div>
                </div>
            </div>
            <div class="container-fluid"></div>
        </div>
    </div>
</template>
<script>
import EventForm from "~/Framework/Components/Forms/Event";
import EventDayList from "~/Framework/Components/Widgets/EventDayList";
import EventService from "~/Application/Services/Events";

export default {
    name: "EventApp",

    components: {
        EventForm,
        EventDayList
    },

    data() {
        return {};
    },

    mounted() {
        EventService.getLatest().then(
            (data) => {

                if(data.length === 0) {
                    return ;
                }
    
                this.$store.dispatch("event/setEventTitle", data.eventTitle);
                this.$store.dispatch("event/setEndDate", data.endDate);
                this.$store.dispatch("event/setStartDate", data.startDate);
                this.$store.dispatch("event/setDays", data.days);

            }
        ).finally(() => {
            this.$root.$emit('eventUpdate', true);
        });
    }
};
</script>
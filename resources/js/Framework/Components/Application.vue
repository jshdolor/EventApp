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

export default {
    name: "EventApp",

    components: {
        EventForm,
        EventDayList
    },

    data() {
        return {};
    }
};
</script>
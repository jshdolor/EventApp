<template  >
    <div class="form-inline row">
        <div class="col-lg-6 col-md-6">
            <DateField label="From" :date="startDate" v-on:datefieldChange="updateStartDate"></DateField>
        </div>
        <div class="col-lg-6 col-md-6">
            <DateField label="To"  :date="endDate" v-on:datefieldChange="updateEndDate"></DateField>
        </div>
    </div>
</template>
<script>
import DateField from "~/Framework/Components/Widgets/DateField";

export default {
    name: "DateRangePicker",
    components: {
        DateField
    },
    data() {
        return {
           
        };
    },
    props: [
        'startDate',
        'endDate'
    ],
    methods: {
        updateStartDate(date) {
            this.$emit('startDate', date);
        },
        updateEndDate(date) {
            this.$emit('endDate', date);
        }
    },
};
</script>
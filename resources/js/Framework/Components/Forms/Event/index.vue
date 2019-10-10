<template>
    <form>
        <div class="form-group">
            <label class="form-label">Event</label>
            <input v-model="eventName" class="form-control" />
        </div>
        <div class="form-group">
            <DateRangePicker></DateRangePicker>
        </div>
        <div class="form-group">
            <DaysCheckBox></DaysCheckBox>
        </div>
        <div class="form-group">
            <Button  type="primary" block>Submit</Button>
        </div>
    </form>
</template>
<script>

import DateRangePicker from '~/Framework/Components/Widgets/DateRangePicker';
import DaysCheckBox from '~/Framework/Components/Widgets/DaysCheckBox';
import {
    Btn
} from '~/Framework/Plugins/BootstrapVue';

export default {
    name: 'EventForm',

    components: {
        DateRangePicker,
        DaysCheckBox,
        Button: Btn
    },

    data() {
        return {
            eventName: ""
        }
    }
}
</script>
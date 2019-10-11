<template>
    <div class="form-inline">
        <label v-for="(dayName, key) in daysName" :key="key">
            <input :checked="days[key]" type="checkbox" :name="key" @change="toggleDay"/>
            {{ dayName | shortName}}
        </label>
    </div>
</template>

<script>
import { daysName } from "~/Framework/Helpers/Date";

export default {
    name: "DaysCheckBox",
    data() {
        return {
            daysName
        };
    },

    methods: {
        toggleDay(e) {
            let day = e.target.name;
            let value = e.target.checked;
            this.$emit('toggleDay',{day, value});
        }
    },

    props: ['days'],

    filters: {
        shortName: function(value) {
            return value.substr(0, 3);
        }
    }
};
</script>
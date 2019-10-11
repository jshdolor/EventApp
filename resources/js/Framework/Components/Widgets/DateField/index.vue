<template>
    <Dropdown class="form-group" v-model="isDropdownOpen">
        <label v-html="label"></label>
        <div class="input-group">
            <input
                class="form-control"
                type="text"
                :value="date"
                readonly
                @focus="isDropdownOpen = true"
            />
            <div class="input-group-btn">
                <Button class="dropdown-toggle">
                    <i class="glyphicon glyphicon-calendar"></i>
                </Button>
            </div>
        </div>
        <template slot="dropdown">
            <li>
                <DatePicker :todayBtn="false" v-on:input="updateDate" :clearBtn="false" :value="date" />
            </li>
        </template>
    </Dropdown>
</template>

<script>
import { Dropdown, DatePicker, Btn } from "~/Framework/Plugins/BootstrapVue";

export default {
    name: "DateField",
    components: {
        Dropdown,
        DatePicker,
        Button: Btn
    },
    data() {
        return {
            isDropdownOpen: false
        };
    },

    methods: {
        updateDate(date) {
            this.$emit('datefieldChange', date);
        }
    },

    props: ['label', 'date']
};
</script>

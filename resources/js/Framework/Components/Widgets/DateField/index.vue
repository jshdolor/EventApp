<template>
    <Dropdown class="form-group">
        <label v-html="label"></label>
        <div class="input-group">
            <input class="form-control" type="text" v-model="date" />
            <div class="input-group-btn">
                <Button class="dropdown-toggle">
                    <i class="glyphicon glyphicon-calendar"></i>
                </Button>
            </div>
        </div>
        <template slot="dropdown">
            <li>
                <DatePicker v-show="showPicker" v-model="date" />
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
            date: null,
            showPicker: false
        };
    },
    props: {
      label: String
    }
};
</script>

<template  >
    <div class="form-inline row">
        <div class="col-lg-6 col-md-6">
            <DateField label="From"></DateField>
        </div>
        <div class="col-lg-6 col-md-6">
            <DateField label="To"></DateField>
        </div>
    </div>
</template>
<script>
import DateField from "~/Framework/Components/Widgets/DateField";

export default {
    name: "DateRangePicker",
    components: {
        DateField
    }
};
</script>
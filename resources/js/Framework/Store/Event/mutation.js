export default {

    setEventTitle(state, data) {
        state.eventTitle = data;
    },

    setEndDate(state, data) {
        state.endDate = data;
    },

    setStartDate(state, data) {
        state.startDate = data;
    },

    setDay(state, data) {
        state.days[data.day] = data.value;
    },

    setDays(state, data) {
        state.days = data;
    },


};
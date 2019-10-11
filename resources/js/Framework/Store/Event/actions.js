export default {

    setEventTitle({commit}, data) {
        commit('setEventTitle', data);
    },

    setEndDate({commit}, data) {
        commit('setEndDate', data);
    },

    setStartDate({commit}, data) {
        commit('setStartDate', data);
    },

    setDay({commit}, data) {
        commit('setDay', data);
    },

    setDays({commit}, data) {
        commit('setDays', data);
    },
}
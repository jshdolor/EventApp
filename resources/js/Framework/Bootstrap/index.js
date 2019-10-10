import App from "~/Framework/Components/Application";

class Bootstrap {
    init() {
        let app = new Vue({
            render: h => {
                return h(App);
            }
        });

        app.$mount("#app");
    }
}

export default Bootstrap;

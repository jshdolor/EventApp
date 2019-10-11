import ApiClient from '~/Infrastructure/Client/ApiClient';
import ExceptionHandler from '~/Infrastructure/Exception/Handler';
import EventModel from '~/Application/Models/Event';



class EventService {

    static endpoint = '/events';


    //no editing and no deleting.. so create and get latest?
    static getLatest() {

        return ApiClient.setUrl(this.endpoint).get()
            .then( ({data = []} ) => {
                
                if(data.length === 0) {
                    return data;
                }

                let latestEvent = data.reduce((a, b) => 
                    new Date(a.created_at).getTime() > new Date(b.created_at).getTime() ? a : b
                );

                return new EventModel(latestEvent);

            })
            .catch(e => {

                new ExceptionHandler(e);

            });
    }

    static addEvent(request) {
        let root = this.$root;
        return ApiClient.setUrl(this.endpoint)
            .post(request.toFormData())
            .then(data => {

                $notify.success({
                    title: 'Event Added!',
                    dismissible: false
                });

                return data;
            })
            .catch(e => {
                new ExceptionHandler(e);
            });
    } 
}

export default EventService;

import ToFormData from '~/Infrastructure/FormData';


class AddEventRequest extends ToFormData{

    constructor(data) {
        super();
        this._event_title = data.eventTitle;
        this._start_date = data.startDate;
        this._end_date = data.endDate;
        this._days = data.days;
    }

    getDays() {
        return this._days.join(',');
    }
}

export default AddEventRequest;
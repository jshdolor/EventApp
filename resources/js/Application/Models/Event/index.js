export default class Event {
    
    constructor(data = {}) {

        this._eventTitle = data.event_title;
        this._startDate = data.start_date;
        this._endDate = data.end_date;
        this._days = data.recurrence;

    }

    get eventTitle() {
        return this._eventTitle;
    }

    get startDate() {
        return this._startDate;
    }

    get endDate() {
        return this._endDate;
    }

    get days() {
        return this._days;
    }
}
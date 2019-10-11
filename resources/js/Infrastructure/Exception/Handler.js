class ExceptionHandler {
    
    constructor(e) {
        this._exception = e;

        this.throwException();
    }

    getStatus() {
        return this._exception.response.status;
    }

    throwException() {

        if(this.getStatus() === 422) {
            //validation
            try{
                let messages = this._exception.response.data.error.message;

                for(let key in messages) {  
                    $notify.error({
                        title: messages[key][0],
                        dismissible: false
                    })
                }

                
            }catch(e) {
                console.log(e);
            }
        }

        // throw this._exception;
    }
}

export default ExceptionHandler;
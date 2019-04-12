import React from 'react';
import {reduxForm} from 'redux-form';

const SignInForm = props => {
    return (
        <form>
            <h1>Form Goes Here</h1>
        </form>
    );
}

export default reduxForm({
    form: 'sign-in-form' //sets a unique name for the form to keep track of this form
})(SignInForm);

//reduxForm() returns a function
//param: enter a config object, name form by entering any name to the form property
//() calls the function returned by the redux form function call

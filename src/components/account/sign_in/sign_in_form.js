import React from 'react';
import {reduxForm, Field} from 'redux-form';
import Input from '../../general/input';

const SignInForm = props => {
    console.log('sign in from props', props)
    const {handleSubmit, signIn} = props;
    return (
        <form onSubmit={handleSubmit(signIn)}>
            <div className="row">
                <Field id="email" col="s12" name="email" component={Input} label="email" />
            </div>
            <div className="row">
                <Field id="password" col="s12" name="password" component={Input} type="password" label="password" />
            </div>
            <div className="row">
                <div className="col s12 right-align">
                    <button className="btn red darken-2">Sign In</button>
                </div>
            </div>
        </form>
    );
}

//<Field id="email" col="s12" name="email" component={Input} label="email" />
//default props are name and component
//component prop accepts a component for the input field layout, refer to input.js

export default reduxForm({
    form: 'sign-in-form' //sets a unique name for the form to keep track of this form
})(SignInForm);

//reduxForm() returns a function
//param: enter a config object, name form by entering any name to the form property
//() calls the function returned by the redux form function call

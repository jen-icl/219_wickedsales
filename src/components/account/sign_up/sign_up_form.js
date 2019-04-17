import React from 'react';
import {reduxForm, Field} from 'redux-form';
import Input from '../../general/input';

const SignUpForm = props => {
    const {handleSubmit, signUp} = props;
    return(
        <form onSubmit={handleSubmit(signUp)}>
            <div className="row">
                <Field id="name" col="s12" name="name" component={Input} label="Name" />
            </div>
            <div className="row">
                <Field id="email" col="s12" name="email" component={Input} label="Email" type="email" />
            </div>
            <div className="row">
                <Field id="password" col="s12" name="password" component={Input} label="Password" type="password" />
            </div>
            <div className="row">
                <Field id="confirmPassword" col="s12" name="confirmPassword" component={Input} label="Confirm Password" type="password" />
            </div>
            <div className="row">
                <div className="col s12 right-align">
                    <button className="btn red darken-2">Sign Up</button>
                </div>
            </div>
        </form>
    );
}

function validate({name, email, password, confirmPassword}){
    const errors = {};
    if(!name){
        errors.name = 'Please enter your name';
    }
    if(!email){
        errors.email = 'Please enter your email';
    }
    if(!password){
        errors.password = 'Please enter your password';
    }
    if(!confirmPassword){
        errors.confirmPassword = 'Please confirm your password';
    }
    if(password !== confirmPassword){
        errors.confirmPassword = 'Confirmation password does not match password';
    }
    return errors;
}

export default reduxForm({
    form: 'sign-up-form',
    validate: validate
})(SignUpForm);

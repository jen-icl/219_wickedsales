import React, {Component} from 'react';
import {connect} from 'react-redux';
import SignInForm from './sign_in_form';
import {signIn} from '../../../actions';

class SignIn extends Component {
    handleSignIn = (values) => {
        this.props.signIn(values);
        this.props.history.push('/products');
    }

    render(){
        return (
            <div>
                <h1 className="center">Sign In</h1>
                <SignInForm signIn={this.handleSignIn} />
            </div>
        );
    }
}

export default connect(null, {
    signIn: signIn //first signIn is the props name, second signIn is the function name from actions index.js
})(SignIn);

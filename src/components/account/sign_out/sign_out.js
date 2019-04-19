import React, {Component} from 'react';
import {connect} from 'react-redux';
import './sign_out.scss';
import {signOut} from '../../../actions';

class SignOut extends Component {
    componentDidMount(){
        this.props.signOut();
    }
    render(){
        return(
            <div className="sign-out">
                <div className="sign-out-header center">
                    <h1>Thank You for Visiting Our Site</h1>
                    <h2>You have been signed out</h2>
                </div>
            </div>
        );
    }
}

export default connect(null, {
    signOut: signOut
})(SignOut);

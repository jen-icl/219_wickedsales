import React, {Component, Fragment} from 'react';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import Sidenav from './sidenav';
import CartLink from './cart_link';
import './nav.scss';

class Nav extends Component {
    state = { //these links don't have to be in state, can be in a property
        authLinks: [
            {
                to: '/account/orders',
                text: 'My Orders'
            },
            {
                to: '/account/profile',
                text: 'My Profile'
            },
            {
                to: '/account/sign-out',
                text: 'Sign Out'
            }
        ],
        guestLinks: [
            {
                to: '/account/sign-in',
                text: 'Sign In'
            },
            {
                to: '/acount/sign-up',
                text: 'Sign Up'
            }
        ]
    }

    buildLink(link){
        return (
            <li key={link.to}>
                <Link to={link.to}>{link.text}</Link>
            </li>
        );
    }

    renderLinks(){
        const {userAuth} = this.props;
        const {authLinks, guestLinks} = this.state;
        let navLinks = null;

        if(userAuth){
            navLinks = authLinks.map(this.buildLink);
        } else {
            navLinks = guestLinks.map(this.buildLink);
        }

        return (
            <Fragment>
                <li className="sidenav-close">
                    <Link to="/">Home</Link>
                </li>
                <li className="sidenav-close">
                    <Link to="/products">Products</Link>
                </li>
                <li className="sidenav-close">
                    <CartLink items={this.props.cartItems} />
                </li>
                {navLinks}
            </Fragment>
        );
    }
    render(){
        const links = this.renderLinks();

        console.log('props' , this.props);
        return(
            <Fragment>
                <nav className="red darken-4">
                    <div className="nav-wrapper">
                        <Link className="brand-logo" to="/">Where's Wally Sales</Link>
                        <a href="#" data-target="sidenav" className="sidenav-trigger">
                            <i className="material-icons">menu</i>
                        </a>
                        <ul className="right hide-on-med-and-down">
                            {links}
                        </ul>
                    </div>
                </nav>
                <Sidenav links={links} />
            </Fragment>
        );
    }
}

function mapStateToProps(state){
    console.log('mstp', state)
    return {
        userAuth: state.user.auth
    }
}

export default connect(mapStateToProps)(Nav);

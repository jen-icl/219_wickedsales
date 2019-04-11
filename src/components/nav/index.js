import React, {Component, Fragment} from 'react';
import {Link} from 'react-router-dom';
import Sidenav from './sidenav';

class Nav extends Component {
    renderLinks(){
        return (
            <Fragment>
                <li className="sidenav-close">
                    <Link to="/">Home</Link>
                </li>
                <li className="sidenav-close">
                    <Link to="/products">Products</Link>
                </li>
            </Fragment>
        );
    }
    render(){
        const links = this.renderLinks();

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

export default Nav;

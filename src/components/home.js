import React from 'react';
import '../assets/css/app.scss';

export default props => (
    <div className="home">
        <h1 className="center red-text text-darken-4">Where's Wally Sales</h1>
        <div className="imgContainer s10 offset-s1 m8 offset-m2 l6 offset-l3">
            <img src="/dist/images/wallyHome.png" alt="Where's Wally" />
        </div>
    </div>
);

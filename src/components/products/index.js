import React from 'react';
import {Route} from 'react-router-dom';
import ProductList from './product_list';
import ProductDetails from './product_details';
import './products.scss';

export default props => {
    return(
        <div className="products">
            <Route exact path="/products" component={ProductList}/>
            <Route path="/products/:product_id" render={routingProps => {
                return <ProductDetails {...routingProps} updateCart={props.updateCart} />
            }} />
        </div>
    );
}

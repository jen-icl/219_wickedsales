import React, {Component} from 'react';
import {connect} from 'react-redux';
import ProductItem from './product_item';
import {getAllProducts} from '../../actions';

class ProductList extends Component {
    constructor(props){
        super(props);
        this.goToDetails = this.goToDetails.bind(this);
    }

    componentDidMount(){
        this.props.getAllProducts();
    }

    goToDetails(id){
        this.props.history.push(`/products/${id}`);
    }

    render(){
        console.log('product list props', this.props);
        const productList = this.props.products.map((product) => {
            return <ProductItem key={product.id} {...product} goToDetails={this.goToDetails} />;
        });

        return (
            <div className="product-list">
                <h1 className="center">Where's Wally Product List</h1>
                <ul className="collection">
                    {productList}
                </ul>
            </div>
        );
    }
}

function mapStateToProps(state){
    return {
        products: state.products.list
    }
}

export default connect(mapStateToProps, {
    getAllProducts: getAllProducts
})(ProductList);
